<?php

namespace App\Models;

use App\Models\Resources\Accomodation;

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

}
