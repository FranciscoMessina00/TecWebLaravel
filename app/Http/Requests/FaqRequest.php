<?php

namespace App\Http\Requests;
use App\Models\Resources\Faq;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FaqRequest extends FormRequest{
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
        if ($this->request->get('faqId')){
            $faqId=$this->request->get('faqId');
            return [
            'question' => ['required','max:50',Rule::unique('faqs')->ignore($faqId, 'faqId')],
            'answer' => 'required|max:200'
        ];
        }else{
            return [
            'question' => ['required','max:50',Rule::unique('faqs')],
            'answer' => 'required|max:200'
        ];
        }
        
        
    }
}