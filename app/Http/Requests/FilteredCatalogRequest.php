<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Rule;


class FilteredCatalogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tipology' => 'required|integer',
            'city' => 'max:20|nullable',
            'priceMin' => 'integer|numeric|gt:0|nullable',
            'priceMax' => 'integer|numeric|gt:0|nullable',
            'dateStart' => ['date', 'date_format:Y-m-d', 'nullable'],
            'dateFinish' => ['date', 'date_format:Y-m-d', 'nullable']
        ];
    }
    
    public function messages(): array {
        return ['bornDate.date_format' => 'Insert a valid date',
            'dateFinish.date_format' => 'Insert a valid date',
            'tipology.required' => 'Select the accomodation tipology first'];
    }
}
