<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Resources\Accomodation;

class Image extends Model {

    public $timestamps = true;
    protected $primaryKey = 'imageId';
    protected $fillable = ['imageName'];


    public function accomodations()
    {
        return $this->hasMany(Accomodation::class, 'imageId', 'imageId');
    }

}
