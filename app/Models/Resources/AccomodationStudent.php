<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Resources\Service;

class AccomodationStudent extends Model {

    public $timestamps = true;
    protected $primaryKey = 'accStudId';
    protected $table = 'accomodation_student';
    
    protected $dates = ['dateOption', 'dateAssign'];

}
