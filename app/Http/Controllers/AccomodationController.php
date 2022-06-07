<?php

namespace App\Http\Controllers;

/* Import Application Models */

use App\Models\Catalog;

/* Import Resource Models */
use App\User;
use App\Models\Resources\Faq;
use App\Models\Resources\Accomodation;

use Illuminate\Support\Facades\Gate;

/* Facade Auth di laravel ui */
use Illuminate\Support\Facades\Auth;

/* Tools */
use Illuminate\Support\Facades\Log;

class AccomodationController extends Controller {
    /*
     * 
     * Questo motodo è accessibile soltanto agli utenti di tipo studente oppure i locatori proprietari dell'alloggio visionato. 
     * L'autorizzazione viene eseguita preventivamente alla chiamata della rotta

     *  */
    public function showAccomodation($accId) {
       // $user = Auth::user();
        $accomodation = Accomodation::find($accId);
        
        if(Gate::allows('see-accomodation-details', $accomodation))
        {
            return view('accomodation')
                ->with('accomodation', $accomodation);
             //   ->with('user', $user);
        }
        else
        {
            abort(403);
        }
        
    }
    
    public function showContract($accId)
    {
        $accomodation = Accomodation::find($accId);
        $student = $accomodation->assignedStudents()->first();
        $locator = $accomodation->locator;
        
        return view('contract')
                ->with('accomodation', $accomodation)
                ->with('student', $student)
                ->with('locator', $locator);
    }

}
