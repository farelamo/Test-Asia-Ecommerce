<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'response_code'     => '00',
            'response_message'  => 'Login Successfully',
            'data' => [
                'token' => auth()->attempt($request->only('email', 'password')),
                'user'  => auth()->user()
            ]
        ];
    }
}
