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
        
        $this->_catalogModel->deleteAllRequests($accId);
        
        return redirect()->route('my-accomodations');
    }
    
    public function showNewAccomodationForm()
    {
        return view('new-accomodation');
    }
    
    public function addAccomodation(NewAccomodationRequest $request)
    {
        if($request->hasFile('image'))
        {
            $file = $requets->file('image');
            $imageName = $file->getClientOriginalName();
        }
        else
        {
            $imageName = null;
        }
        
        $accomodation = new Accomodation;
        $accomodation->fill($request->validated());
        
        $image = Image::find(1);
        
        if($imageName)
        {
            $image = new Image;
            
            $image->imageName = $imageName;
        }
        
        $accomodation->image()->associate($image);
        $accomodation->userId = Auth::id();
        $accomodation->dateOffer = Carbon::now()->toDateTimeString();
        
        $accomodation->save();
        $image->save();
        
        if (!is_null($imageName))
        {
            $destinationPath = public_path() . 'images/accomodations';
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
