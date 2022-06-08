<?php

namespace App\Models;

use App\Models\Resources\Accomodation;
use App\Models\Resources\Service;
use App\Models\Resources\AccomodationStudent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\User;

class Stats {

    public function getStats($tipo, $filter, $request) {
        $accomodations = Accomodation::where('tipology', $tipo);

        if ($filter) {
            $number = $this->dateFilter($accomodations, $request)->count();
            $assigned = $this->dateFilterState($tipo, $request,'assigned',true);
            $optioned = $this->dateFilterState($tipo, $request,'optioned',true);
        }else{
            $assigned = $this->dateFilterState($tipo, $request,'assigned',false);
            $optioned = $this->dateFilterState($tipo, $request,'optioned',false);
            $number = $accomodations->count();
        }

        $result = collect(['number' => $number, 'assigned' => $assigned, 'optioned' => $optioned]);
        return $result;
    }

    public function dateFilter($accomodationPartial, $request) {

        $filterList = $request->except(['_token', 'tipology']);
        foreach ($filterList as $field => $value) {
            if ($value) {
                $condition = $this->getCondition($field);

                if ($field == 'dateStart' || $field == 'dateFinish') {
                    $value = new \DateTime($value);
                }

                $accomodationPartial = $accomodationPartial->where('dateOffer', $condition, $value);
            }
        }


        return $accomodationPartial;
    }

    public function dateFilterState($tipology,$request,$state,$filter) {
        
        $optioned = AccomodationStudent::where('relationship', $state)->get();
        $type=$this->getType($state);
        if($filter){
            $filterList = $request->except(['_token', 'tipology']);
                foreach ($filterList as $field => $value) {
                    if ($value) {
                        $condition = $this->getCondition($field);

                        if ($field == 'dateStart' || $field == 'dateFinish') {
                            $value = new \DateTime($value);
                        }
                        $optioned = $optioned->where($type, $condition, $value);
                    }
                }
        }
        
        
        
        $number=0;
        foreach($optioned as $option){
                $number+=Accomodation::where('accId',$option->accId)->where('tipology',$tipology)->get()->count();
            
        }
        return $number;
    }

    private function getCondition($field) {
        if ($field == 'dateFinish') {
            $condition = '<=';
        } elseif ($field == 'dateStart') {
            $condition = '>=';
        } else {
            $condition = '=';
        }

        return $condition;
    }
    private function getType($state){
        if($state=='optioned'){
            return 'dateOption';
        }elseif ($state=='assigned') {
            return 'dateAssign';
        }else{
            return null;
        }
    }
}
