<?php

namespace App\Http\Controllers;

/* Import Application Models */

use App\Models\Catalog;

/* Import Resource Models */
use App\User;
use App\Models\Resources\Accomodation;
use \App\Models\Resources\AccomodationStudent;
use \App\Models\Resources\AccomodationService;
use \App\Models\Resources\Image;
use \Carbon\Carbon;

/* Import Form Requests */
use App\Http\Requests\AccomodationRequest;

/* Facade Auth di laravel ui */
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

/* Tools */
use Illuminate\Support\Facades\Log;

class LocatorController extends Controller {

    protected $_catalogModel;

    public function __construct() {
        /* Permette soltanto agli utenti di tipo locator di accedere ai metodi del controller */
        $this->middleware('can:isLocator');

        $this->_catalogModel = new Catalog;
    }

    public function my_accomodations($filter = false) {
        $my_accomodations = $this->_catalogModel->getMyAccomodations();

        return view('my-accomodations')
                        ->with('filter', $filter)
                        ->with('accomodations', $my_accomodations);
    }

    public function showAccomodation($accId) {
        $accomodation = Accomodation::find($accId);

        return view('accomodation')
                        ->with('accomodation', $accomodation);
    }

    public function assignAccomodation($accId, $userId) {
        if (Gate::allows('edit-accomodation', $accId)) {
            $accomodation = Accomodation::find($accId);

            $accomodation->optioningStudents()->updateExistingPivot($userId, [
                'relationship' => 'assigned',
                'dateAssign' => Carbon::now()->toDateTimeString()
            ]);

            $this->_catalogModel->deleteAllRequests($accId);
        }


        return redirect()->route('catalog.accomodation', $accId);
    }

    public function cancelAssignAccomodation($accId) {
        $accomodation = Accomodation::find($accId);

        $assignedStudent = $accomodation->assignedStudents()->first();
        if ($assignedStudent) {
            $assignedStudent->assignedAccomodations()->detach($accId);
        }


        return redirect()->route('catalog.accomodation', $accId);
    }

    public function showNewAccomodationForm() {
        return view('accomodation-add')
                        ->with('accomodation', null);
    }

    public function showEditAccomodationForm($accId) {
        $accomodation = Accomodation::find($accId);

        return view('accomodation-edit')
                        ->with('accomodation', $accomodation);
    }

    public function addAccomodation(AccomodationRequest $request) {
        $user = Auth::user();

        if ($request->hasFile('image')) {
            $file = $request->image;
            $imageName = $file->getClientOriginalName();
        } else {
            $imageName = null;
        }

        $accomodation = new Accomodation;
        $accomodation->fill($request->validated());

        if ($imageName) {
            if(Storage::disk('public')->exists($imageName)){
                $image = Image::where('imageName',$imageName)->first();
            }else{
                /* Crea un nuovo record nella tabella */
                $image = new Image;
                $image->imageName = $imageName;
                $image->save();
            }
            /* Associa l'alloggio all'immagine creata */
            $accomodation->image()->associate($image);
        }

        /* Associa l'alloggio all'utente loggato */
        $accomodation->locator()->associate($user);

        /* Registra la data i cui è stata caricata l'offerta */
        $accomodation->dateOffer = Carbon::now()->toDateTimeString();

        $accomodation->save();

        /* Aggiunta servizi */
        if ($request->filled('services')) {
            $serviceIds = $request->input('services');

            foreach ($serviceIds as $serviceId) {
                $accomodation->services()->attach($serviceId);
            }
        }
//        Log::info($imageName);
        if (!is_null($imageName)) {
            $destinationPath = '';
            $file->storeAs($destinationPath, $imageName, 'public');
        }

        return response()->json(['redirect' => url('/locator/my-acc')]);
    }

    public function updateAccomodation(AccomodationRequest $request) {
        if ($request->hasFile('image')) {
//            $file = $request->file('image');
            $file = $request->image;
            $imageName = $file->getClientOriginalName();
        } else {
            $imageName = null;
        }
        /* Chiamo il metodo validate per generare l'eccezione nel caso in cui i dati siano errati. Se il programma prosegue, i dati sono validi */
        $request->validated();

        $validated = $request->except(['image', 'services', '_token']);

        $accId = $request->input('accId');
        $accomodation = Accomodation::find($accId);

        if ($imageName) {
            if(Storage::disk('public')->exists($imageName)){
                $image = Image::where('imageName',$imageName)->first();
            }else{
                /* Crea un nuovo record nella tabella */
                $image = new Image;
                $image->imageName = $imageName;
                $image->save();
            }

            $accomodation->image()->dissociate();
            $accomodation->image()->associate($image);
        }

        /* Aggiorno le informazioni dell'alloggio */
        Accomodation::where('accId', $accId)
                ->update($validated);

        $accomodation->updated_at = Carbon::now()->toDateTimeString();
        $accomodation->save();

        /* Aggiungo servizi */
        if ($request->filled('services')) {
            $serviceIds = $request->input('services');
            $myServiceIds = $accomodation->serviceIds();

            /* Se l'utente ha selezionato un nuovo servizio lo aggiungo */
            foreach ($serviceIds as $serviceId) {
                if (!$myServiceIds->contains($serviceId)) {
                    $accomodation->services()->attach($serviceId);
                }
            }

            $serviceIds = collect($request->input('services'));
            /* Se l'utente ha deselezionato un servizio, allora lo cancello */
            foreach ($myServiceIds as $myService) {
                if (!$serviceIds->contains($myService)) {
                    $accomodation->services()->detach($myService);
                }
            }
        }

        if (!is_null($imageName)) {
//            $destinationPath = public_path() . '/images/accomodations';
            $destinationPath = '';
            $file->storeAs($destinationPath, $imageName, 'public');
        }

        return response()->json(['redirect' => url('/locator/my-acc')]);
    }

    public function deleteAccomodation($accId) {
        /* Elimino le richieste assoicate all'appartamento eliminato */
        AccomodationStudent::where('accId', $accId)
                ->delete();
        /* Elimino i servizi assoicati all'appartamento eliminato */
        AccomodationService::where('accId', $accId)
                ->delete();

        Accomodation::where('accId', $accId)
                ->delete();

        return redirect()->route('my-accomodations');
    }

}
