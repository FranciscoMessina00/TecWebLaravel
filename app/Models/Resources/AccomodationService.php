<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Resources\Service;

class AccomodationService extends Model {

    public $timestamps = true;
    protected $primaryKey = 'accServId';
    protected $table = 'accomodation_service';

}
