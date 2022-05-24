<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Accomodation extends Model {

    public $timestamps = true;
    protected $primaryKey = 'accId';

    public function locator() {
        return $this->belongsTo(User::class, 'userId', 'userId');
    }

    public function students() {
        return $this->belongsToMany(User::class, 'accomodation_student', 'accId', 'userId')
                        ->wherePivot('relationship', 'optioned');
    }

    public function assignedStudents() {
        return $this->belongsToMany(User::class, 'accomodation_student', 'accId', 'userId')
                        ->wherePivot('relationship', 'assigned');
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
    
    

}
