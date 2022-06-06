<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Rule;

use \Illuminate\Contracts\Validation\Validator;
use  \Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Exceptions\HttpResponseException;

class NewAccomodationRequest extends FormRequest {

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
        return [
            'name' => 'required',
            'tipology' => 'integer|required',
            'city'=> 'required|max:20',
            'address'=> 'required',
            'image'=> 'nullable',
            'description'=> 'required',
            'dimBedroom'=> 'integer|nullable',
            'dimAppartment'=> 'integer|nullable',
            'rooms'=> 'integer|nullable',
            'totBeds'=> 'integer|required',
            'totBedRoom'=> 'integer|nullable',
            'ageMax'=> 'integer|required',
            'ageMin'=> 'integer|required',
            'price'=> 'integer|numeric|gt:0|required',
            'dateStart' => ['date', 'date_format:Y-m-d', 'required'],
            'dateFinish' => ['date', 'date_format:Y-m-d', 'required']
        ];
    }

    public function messages(): array {
        return ['bornDate.date_format' => 'Insert a valid date',
            'dateFinish.date_format' => 'Insert a valid date',
            'tipology.required' => 'Select the accomodation tipology first'];
    }
    
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_FORBIDDEN));
    }

}
