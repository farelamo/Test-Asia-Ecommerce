<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Auth\LogoutResource;

class LogoutController extends Controller
{
    public function logout(){
        return new LogoutResource(auth()->logout());
    }
}
