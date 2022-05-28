<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {

    public $timestamps = true;
    protected $primaryKey = 'serviceId';
    
    public function accomodations()
    {
        return $this->belongsToMany(Accomodation::class, 'accomodation_service', 'serviceId', 'accId');
    }

}
