<?php

namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Resources\Service;
use App\Models\Resources\Image;

use Carbon\Carbon;

class Accomodation extends Model {

    public $timestamps = true;
    protected $primaryKey = 'accId';
    protected $dates = ['dateOffer', 'dateStart', 'dateFinish'];
    
    protected $fillable = [
        'name', 'tipology', 'city', 'address', 'description', 'dimBedroom', 'dimAppartment', 'rooms', 'totBeds'
        , 'totBedRoom', 'ageMax', 'ageMin', 'price', 'dateStart', 'dateFinish'
    ];
    
    protected $guarded = [
        'accId', 'userId','imageId'
    ];

    public function locator() {
        return $this->belongsTo(User::class, 'userId', 'userId');
    }
    
    public function image()
    {
        return $this->belongsTo(Image::class, 'imageId', 'imageId');
    }

    public function students() {
        return $this->belongsToMany(User::class, 'accomodation_student', 'accId', 'userId');
    }
    
    public function services() {
        return $this->belongsToMany(Service::class, 'accomodation_service', 'accId', 'serviceId');
    }
    
    public function serviceIds()
    {
        return $this->services->pluck('serviceId');
    }

    public function dateAssign() {
        $date = AccomodationStudent::where('accId',$this->accId)
                ->where('relationship','assigned')->get()->first()->dateAssign;
        
        return Carbon::parse($date)->format('d/m/Y');
    }
    
    public function timeAssign() {
        $date = AccomodationStudent::where('accId',$this->accId)
                ->where('relationship','assigned')->get()->first()->dateAssign;
        
        return Carbon::parse($date)->format('H:i');
    }
    
    public function dateOption($userId) {
        $date =  AccomodationStudent::where('accId',$this->accId)
                ->where('userId', $userId)
                ->where('relationship','optioned')->get()->first()->dateOption;
        
        return Carbon::parse($date)->format('d/m/Y');
    }
    
    public function timeOption($userId) {
        $date = AccomodationStudent::where('accId',$this->accId)
                ->where('userId', $userId)
                ->where('relationship','optioned')->get()->first()->dateOption;
        
        return Carbon::parse($date)->format('H:i');
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
        $optioningStudents = $this->optioningStudents;

        if ($optioningStudents) {
            return count($this->optioningStudents);
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
    
    public function dateStart() {
        return Carbon::parse($this->dateStart)->format('d/m/Y');
    }
    
    public function dateFinish() {
        return Carbon::parse($this->dateFinish)->format('d/m/Y');
    }
    
    

}
