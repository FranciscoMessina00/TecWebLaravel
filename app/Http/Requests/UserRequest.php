<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        
        return [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required','email', Rule::unique('users', 'email')->ignore($user->userId, 'userId')],
            'username' => ['required', 'string', 'min:4', Rule::unique('users', 'username')->ignore($user->userId, 'userId')],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'gender' => ['string'],
            'bornDate' => ['required', 'date', 'before:-18 years']
        ];
    }
}

