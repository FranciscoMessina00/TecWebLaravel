<?php

namespace App\Http\Controllers;

/*Import Application Models*/
use App\Models\Catalog;

/*Import Resource Models*/
use App\User;
use App\Models\Resources\Accomodation;
use \App\Models\Resources\AccomodationStudent;
use \App\Models\Resources\AccomodationService;
use \App\Models\Resources\Image;

use \Illuminate\Support\Facades\File;

use \Carbon\Carbon;


/*Import Form Requests*/
use App\Http\Requests\NewAccomodationRequest;

/*Facade Auth di laravel ui*/
use Illuminate\Support\Facades\Auth;

/*Tools*/
use Illuminate\Support\Facades\Log;


class LocatorController extends Controller {

    protected $_catalogModel;

    public function __construct() {
        /*Permette soltanto agli utenti di tipo locator di accedere ai metodi del controller*/
        $this->middleware('can:isLocator');
        
        $this->_catalogModel = new Catalog;
        
    }
    
    public function my_accomodations($filter = false)
    {
        $my_accomodations = $this->_catalogModel->getMyAccomodations();
        
        return view('my-accomodations')
            ->with('filter', $filter)
            ->with('accomodations', $my_accomodations);
    }
    
    public function showAccomodation($accId)
    {
        $accomodation = Accomodation::find($accId);
        
        return view('accomodation')
            ->with('accomodation', $accomodation);
    }
    
    public function assignAccomodation($accId, $userId)
    {
        $accomodation = Accomodation::find($accId);
        
        $accomodation->students()->updateExistingPivot($userId, ['relationship' => 'assigned', 'updated_at' => Carbon::now()->toDateTimeString()]);
        $accomodation->dateBooking = Carbon::now()->toDateTimeString();
        
        $this->_catalogModel->deleteAllRequests($accId);
        
        return redirect()->route('my-accomodations');
    }
    
    public function showNewAccomodationForm()
    {
        return view('accomodation-add')
        ->with('accomodation', null);
    }
    
    public function showEditAccomodationForm($accId)
    {
        $accomodation = Accomodation::find($accId);
        
        return view('accomodation-edit')
        ->with('accomodation', $accomodation);
    }
    
    public function addAccomodation(NewAccomodationRequest $request)
    {
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $imageName = $file->getClientOriginalName();
        }
        else
        {
            $imageName = null;
        }
        
        $accomodation = new Accomodation;
        $accomodation->fill($request->validated());
        
        if($imageName)
        {
            /*Crea un nuovo record nella tabella*/
            $image = new Image;
            
            $image->imageName = $imageName;
            $image->save();
            
            $accomodation->image()->associate($image);
        }
        
        /*Associa l'alloggio al proprietario*/
        $accomodation->userId = Auth::id();
        
        /*Registra la data i cui è stata caricata l'offerta*/
        $accomodation->dateOffer = Carbon::now()->toDateTimeString();
        
        $accomodation->save();
        
        /*Aggiunta servizi*/
        if($request->filled('services'))
        {
            $serviceIds = $request->input('services');

            foreach ($serviceIds as $serviceId) {
                $accomodation->services()->attach($serviceId);
            }
        }
        
        if (!is_null($imageName))
        {
            $destinationPath = public_path() . '/images/accomodations';
            $file->move($destinationPath, $imageName);
        }
        
        return response()->json(['redirect' => url('/locator/my-acc')]);
    }
    
    public function updateAccomodation(NewAccomodationRequest $request)
    {
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $imageName = $file->getClientOriginalName();
        }
        else
        {
            $imageName = null;
        }
        $request->validated();
        
        $validated = $request->except(['image', 'services', '_token']);
        
        $accId = $request->input('accId');
        $accomodation = Accomodation::find($accId);
        
        if($imageName)
        {
            /*Crea un nuovo record nella tabella e sovrascrive quello vecchio*/
            $image = new Image;
            
            $image->imageName = $imageName;
            $image->save();
            
            $accomodation->image()->dissociate();
            $accomodation->image()->associate($image);
        }
        
        /*Aggiorno le informazioni dell'alloggio*/
        Accomodation::where('accId', $accId)
                ->update($validated);
        
        $accomodation->updated_at = Carbon::now()->toDateTimeString();
        $accomodation->save();
        
        /*Aggiungo servizi*/
        if($request->filled('services'))
        {
            $serviceIds = $request->input('services');
            $myServiceIds = $accomodation->serviceIds();

            /*Se l'utente ha selezionato un nuovo servizio lo aggiungo*/
            foreach ($serviceIds as $serviceId) {
                if (!$myServiceIds->contains($serviceId))
                {
                    $accomodation->services()->attach($serviceId);
                }
            }
            
            $serviceIds = collect($request->input('services'));
            /*Se l'utente ha deselezionato un servizio, allora lo cancello*/
            foreach ($myServiceIds as $myService)
            {
                if(!$serviceIds->contains($myService))
                {
                    $accomodation->services()->detach($myService);
                }
            }
        }
        
        if (!is_null($imageName))
        {
            $destinationPath = public_path() . '/images/accomodations';
            $file->move($destinationPath, $imageName);
        }
        
        return response()->json(['redirect' => url('/locator/my-acc')]);
    }
    
    public function deleteAccomodation($accId)
    {
        AccomodationStudent::where('accId', $accId)->delete();
        AccomodationService::where('accId', $accId)->delete();
        
        Accomodation::where('accId', $accId)->delete();
        
        return redirect()->route('my-accomodations');
    }
    
}
