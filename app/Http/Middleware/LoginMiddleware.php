<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class LoginMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = User::where('email', $request->email)->first();
        if($user->is_approve == 0){
            return response()->json([
                'response_code' => '01',
                'response_message' => 'Your account is disabled',
            ]);
        }
        return $next($request);
    }
}
