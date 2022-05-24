<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Rule;


class UserRequest extends FormRequest
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
            'username' => 'max:10',
            'password' => 'required',
            'name' => 'required|min:3|max:25',
            'surname' => 'required|min:3|max:25',
            'email' => 'required|email|max:255|unique:users,email',
            
            
        ];
    }
}
