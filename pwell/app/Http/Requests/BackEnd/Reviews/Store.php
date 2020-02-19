<?php

namespace App\Http\Requests\BackEnd\Reviews;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'rate'=>['required', 'integer', 'regex:[0-5]'],
            'feedback'=>['required', 'string'],
        ];
    }
}
