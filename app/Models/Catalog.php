<?php

namespace App\Models;

use App\Models\Resources\Accomodation;
use App\Models\Resources\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
    
    public function deleteAllRequests($accId)
    {
        DB::table('accomodation_student')->where('accId', $accId)
                ->where('relationship', 'optioned')
                ->delete();
    }

    public function getAccomodationsFilteredBy($request) {

        $filterList = $request->except(['_token', 'page', 'services', 'tipology']);
        $tipologyList = $request->tipology == 2 ? [0, 1] : [$request->tipology];

        /*Array in cui specifico quali sono i parametri da escludere durante il filtraggio per tipologia di alloggio.
            Esempio: siccome l'appartamento non ha la proprietà dimBedroom, devo escludere questa proprietà dal filtraggio.*/
        $excludeAppartment = ['dimBedroom'];
        $excludeBedroom = ['dimAppartment', 'rooms'];

        $filtersToExclude = [0 => $excludeAppartment, 1 => $excludeBedroom];

        foreach ($tipologyList as $index => $tipology) {
            /*Faccio una query che ritorna tutti gli alloggi per tipologia*/
            $accomodationPartial = Accomodation::where('tipology', $tipology);

            $exclude = collect($filtersToExclude[$tipology]);

            /*Applico i filtri, escludendo quelli specificati nell'array $exclude*/
            foreach ($filterList as $field => $value) {
                if ($value) {
                    if (!$exclude->contains($field)) {
                        $condition = $this->getCondition($field);

                        if ($field == 'priceMin' || $field == 'priceMax') {
                            $field = 'price';
                        } elseif ($field == 'dateStart' || $field == 'dateFinish') {
                            $value = new \DateTime($value);
                        }
                        
                        $accomodationPartial = $accomodationPartial->where($field, $condition, $value);
                    }
                }
            }
            
            /*Filtro gli alloggi in base ai servizi*/
            if ($request->filled('services')) {
                $serviceIds = $request->input('services');

                foreach ($serviceIds as $serviceId) {
                    $serviceTipology = Service::find($serviceId)->tipology;
                    
                    /*Siccome i servizi sono specifici per tipologia di alloggio, prima di applicare il filtro controllo
                    se la tipologia di servizio si applica all'alloggio oppure no. I servizi che si applicano a tutte le tipologie di alloggio, hanno tipologia = 2.*/
                    if($serviceTipology==$tipology || $serviceTipology==2)
                    {
                        $accomodationPartial = $accomodationPartial->whereHas('services', function ($query) use ($serviceId, $tipology) {
                        $query->where('accomodation_service.serviceId', '=', $serviceId);
                    });
                    }
                }
            }
            
            /*Se sono al primo ciclo di foreach, allora valorizzo la variabile accomodations, mentre dal secondo ciclo in poi ne aggiorno il valore
            realizzando una union con i risultati estratti al ciclo precedente*/
            if ($index > 0) {
                $accomodations = $accomodations->union($accomodationPartial);
            } else {
                $accomodations = $accomodationPartial;
            }
        }

        return $accomodations->paginate(3);
    }

    
    /*Metodo che estrare, in base al nome del campo del filtro, la condizione da applicare al campo stesso.*/
    private function getCondition($field) {
        if ($field == 'dateFinish' || $field == 'priceMin') {
            $condition = '>=';
        } elseif ($field == 'dateStart' || $field == 'priceMax') {
            $condition = '<=';
        } else {
            $condition = '=';
        }

        return $condition;
    }

}
