<?php

namespace App\Models;

use App\Models\Resources\Accomodation;

class Catalog {

    public function getAccomodations($paged = 1)
    {
        return Accomodation::paginate($paged);
    }

}
