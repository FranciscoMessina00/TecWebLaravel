<?php

namespace App\Models;

use App\Models\Resources\Accomodation;

class Catalog {

    public function getAccomodations()
    {
        return Accomodation::get();
    }

}
