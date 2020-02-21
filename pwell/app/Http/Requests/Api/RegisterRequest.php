<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>['required', 'string'],
            'email'=>['required', 'email', 'unique:users'],
            'phone'=>['required', 'numeric', 'regex:/(01)[0-9]{9}/'],
            'password'=>['required', 'min:8', 'confirmed'],
            'token'=>['required', 'string'],
            'device'=>['required'],
        ];
    }


}
