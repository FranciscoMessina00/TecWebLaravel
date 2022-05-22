<?php

namespace App\Models;

use App\Models\Resources\Accomodation;
use Illuminate\Support\Facades\Auth;

use App\User;

class Catalog {

    public function getAccomodations(int $paged = 1)
    {
        return Accomodation::paginate($paged);
    }
    
    public function getAccomodationsById($id)
    {
        return User::find($id)->accomodations;
    }
    
    public function getSpotAccomodations(int $quantity=3)
    {
        return Accomodation::orderBy('requests', 'desc')
                ->take($quantity)
                ->get();
    }
    
    public function getMyAccomodations()
    {
        $accomodations = Auth::user()->accomodations;
        
        return $accomodations;
    }
    

}
