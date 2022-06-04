<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'    => ['email', 'required', 'unique:users,email'],
            'username' => ['required', 'max:10'],
            'password' => ['required', 'max:6'],
        ];
    }
}
