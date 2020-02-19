<?php

namespace App\Http\Requests\BackEnd\Users;

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
            'name' => ['required', 'string', 'max:255'],
            'email'=>['required', 'email','unique:users'],
            'password'=>['required', 'min:8'],
            'phone'=>['required', 'numeric', 'regex:/(01)[0-9]{9}/'],
        ];
    }
}
