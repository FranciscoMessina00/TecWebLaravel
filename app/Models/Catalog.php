<?php

namespace App\Models;

use App\Models\Resources\Accomodation;
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

        foreach ($request->input() as $field => $value) {
            if ($value and $field != '_token' and $field != 'page') {
                if ($field == 'dateFinish' || $field == 'priceMin') {
                    $condition = '>=';
                } elseif ($field == 'dateStart' || $field == 'priceMax') {
                    $condition = '<=';
                } else {
                    $condition = '=';
                }

                if ($field == 'priceMin' || $field == 'priceMax') {
                    $field = 'price';
                }
                elseif ($field == 'dateStart' || $field == 'dateFinish')
                {
                    $value = new \DateTime($value);
                }

                $accomodations = $accomodations->where($field, $condition, $value);
            }
        }

        return $accomodations->paginate(3);
    }

}
