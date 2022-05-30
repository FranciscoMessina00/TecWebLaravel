<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Resources\Service;

class Accomodation extends Model {

    public $timestamps = true;
    protected $primaryKey = 'accId';
    protected $dates = ['dateOffer', 'dateBooking', 'dateStart', 'dateFinish'];

    public function locator() {
        return $this->belongsTo(User::class, 'userId', 'userId');
    }

    public function students() {
        return $this->belongsToMany(User::class, 'accomodation_student', 'accId', 'userId')
                        ->wherePivot('relationship', 'optioned');
    }
    
    public function services() {
        return $this->belongsToMany(Service::class, 'accomodation_service', 'accId', 'serviceId');
    }

    public function assignedDate() {
        return AccomodationStudent::where('accId',$this->accId)
                ->where('relationship','assigned')->get()->first()->updated_at;
                
    }
    
    public function assignedStudents() {
        return $this->belongsToMany(User::class, 'accomodation_student', 'accId', 'userId')
                        ->wherePivot('relationship', 'assigned');
    }
    
    public function optioningStudents() {
        return $this->belongsToMany(User::class, 'accomodation_student', 'accId', 'userId')
                        ->wherePivot('relationship', 'optioned');
    }

    public function hasBeenAssigned() {
        return count($this->assignedStudents) > 0;
    }
    
    public function hasRequests()
    {
        return $this->requests() > 0;
    }

    public function requests() {
        $optioningStudents = $this->students;

        if ($optioningStudents) {
            return count($this->students);
        } else {
            return 0;
        }
    }
    public function assigned() {
        $assignedStudents = $this->assignedStudents;

        if ($assignedStudents) {
            return count($this->assignedStudents);
        } else {
            return 0;
        }
    }

}
