<?php

namespace App\Models;

use App\Models\Resources\Accomodation;
use App\Models\Resources\Service;
use Illuminate\Support\Facades\Auth;
use App\User;

class Catalog {

    public function getAccomodations(int $paged = 1) {
        return Accomodation::paginate($paged);
    }

    public function getAccomodationsById($id) {
        return User::find($id)->accomodations;
    }

    public function getSpotAccomodations(int $quantity = 3) {

        $accomodations = Accomodation::all()
                        ->sortByDesc(function ($accomodation) {
                            return $accomodation->requests();
                        })->take($quantity);

        return $accomodations;
    }

    public function getMyAccomodations() {
        $accomodations = Auth::user()->accomodations;

        return $accomodations;
    }

    public function getAccomodationsFilteredBy($request) {

        $accomodations = Accomodation::where('tipology', $request->tipology);

        if ($request->filled('services')) {
            $serviceIds = $request->input('services');

            foreach ($serviceIds as $serviceId) 
            {
                $accomodations = $accomodations->whereHas('services', function ($query) use ($serviceId) 
                {
                    $query->where('accomodation_service.serviceId', '=', $serviceId);
                });
            }
        }

        foreach ($request->except(['_token', 'page', 'services']) as $field => $value) {
            if ($value) {
                if ($field == 'dateFinish' || $field == 'priceMin') {
                    $condition = '>=';
                } elseif ($field == 'dateStart' || $field == 'priceMax') {
                    $condition = '<=';
                } else {
                    $condition = '=';
                }

                if ($field == 'priceMin' || $field == 'priceMax') {
                    $field = 'price';
                } elseif ($field == 'dateStart' || $field == 'dateFinish') {
                    $value = new \DateTime($value);
                }

                $accomodations = $accomodations->where($field, $condition, $value);
            }
        }


        return $accomodations->paginate(3);
    }

}
