<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\RegisterResource;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $result = User::create([
            'email'      => $request->email,
            'username'   => $request->username,
            'password'   => bcrypt($request->password),
            'role'       => $request->role != null ? $request->role : 'Guest',
            'is_approve' => 0,
        ]);

        return new RegisterResource($result);
    }
}
