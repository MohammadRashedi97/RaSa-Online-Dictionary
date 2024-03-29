<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WordCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //Default return false
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'word' => 'required|unique:words,word|max:255|string',
            'category_id' => 'required',
            'persianDefinition' => 'required|max:255|string'
        ];

        return $rules;
    }
}
