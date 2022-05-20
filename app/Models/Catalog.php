<?php

namespace App\Models;

use App\Models\Resources\Accomodation;
use App\Models\Resources\User;

class Catalog {

    public function getAccomodations(int $paged = 1)
    {
        return Accomodation::paginate($paged);
    }
    
    public function getSpotAccomodations(int $quantity=3)
    {
        return Accomodation::orderBy('requests', 'desc')
                ->take($quantity)
                ->get();
    }
    
    public function getMyAccomodations(int $locId)
    {
        $locator = User::find($locId);
        
        $accomodations = $locator->accomodations;
        
        return $accomodations;
    }
    

}
