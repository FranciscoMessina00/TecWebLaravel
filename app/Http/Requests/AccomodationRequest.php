<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Rule;
use \Illuminate\Contracts\Validation\Validator;
use \Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Exceptions\HttpResponseException;

class AccomodationRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $bedroomRule = '|nullable';
        $appartmentRule = '|nullable';

        if ($this->request->get('tipology') != 'null') {
            //Log::info($this->request->get('tipology'));
            
            switch ($this->request->get('tipology')) {
                case(0):
                    $appartmentRule = '|required';
                    $bedroomRule = '|nullable';
                    break;
                case(1):
                    $bedroomRule = '|required';
                    $appartmentRule = '|nullable';
                    break;
                default:
                    $bedroomRule = '|nullable';
                    $appartmentRule = '|nullable';
            }
        }
        
        //Log::info($bedroomRule);
        //Log::info($appartmentRule);

        return [
            'name' => 'required',
            'tipology' => 'required',
            'city' => 'required|max:20',
            'address' => 'required',
            'image' => 'nullable',
            'description' => 'required',
            'totBeds' => 'integer|numeric|gt:0|required',
            'dimBedroom' => 'integer|numeric|gt:0' . $bedroomRule,
            'dimAppartment' => 'integer|numeric|gt:0' . $appartmentRule,
            'rooms' => 'integer|numeric|gt:0|' . $appartmentRule,
            'totBedRoom' => 'integer|numeric|gt:0|' . $bedroomRule,
            'ageMax' => 'integer|numeric|gt:0|required',
            'ageMin' => 'integer|numeric|gt:0|required',
            'price' => 'integer|numeric|gt:0|required',
            'dateStart' => ['date', 'date_format:Y-m-d', 'required'],
            'dateFinish' => ['date', 'date_format:Y-m-d', 'required']
        ];
    }

    public function messages(): array {
        return ['bornDate.date_format' => 'Inserisci una data valida',
            'dateFinish.date_format' => 'Inserisci una data valida',
            'tipology.required' => 'Seleziona la tipologia di alloggio'];
    }

    public function failedValidation(Validator $validator) {
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_FORBIDDEN));
    }

}
