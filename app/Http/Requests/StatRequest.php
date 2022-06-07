<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StatRequest extends FormRequest
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
            'dateStart' => ['nullable', 'date', 'date_format:Y-m-d'],
            'dateFinish' => ['nullable', 'date', 'date_format:Y-m-d'],
        ];
    }
    
    public function messages(): array {
        return ['dateStart.date_format' => 'Inserisci una data valida',
                'dateFinish.date_format' => 'Inserisci una data valida'];
    }
}