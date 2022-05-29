<?php

namespace App\Models;

use App\Models\Resources\Accomodation;
use App\Models\Resources\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\User;

class Stats {

    public function getStats($tipo, $filter, $request) {
        $accomodations = Accomodation::where('tipology', $tipo);

        if ($filter) {
            $accomodations = $this->dateFilter($accomodations, $request);
        }


        $assigned = 0;
        $optioned = 0;

        $number = $accomodations->count();

        foreach ($accomodations->get() as $accomodation) {
            $assigned += $accomodation->assigned();
            $optioned += $accomodation->requests();
        }

        $result = collect(['number' => $number, 'assigned' => $assigned, 'optioned' => $optioned]);
        return $result;
    }

    public function dateFilter($accomodationPartial, $request) {

        $filterList = $request->except(['_token','tipology']);
        foreach ($filterList as $field => $value) {
            if ($value) {
                $condition = $this->getCondition($field);

                if ($field == 'dateStart' || $field == 'dateFinish') {
                    $value = new \DateTime($value);
                }

                $accomodationPartial = $accomodationPartial->where($field, $condition, $value);
            }
        }


        return $accomodationPartial;
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

}
