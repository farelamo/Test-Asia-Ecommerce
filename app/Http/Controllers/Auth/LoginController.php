<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Auth\LoginResource;

class LoginController extends Controller
{
    public function login(LoginRequest $request){

        if(!$token = auth()->attempt($request->only('email', 'password'))){
            return response()->json([
                'response_code' => '01',
                'response_message' => 'E-mail / Password Salah ! !',
            ], 200);
        }
        return new LoginResource($request);
    }
}
