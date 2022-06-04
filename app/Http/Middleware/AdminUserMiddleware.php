<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminUserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if(
            Auth()->user()->role != 'Admin' ||
            Auth()->user()->role != null
        ){
            return response()->json([
                'response_code' => '01',
                'response_Message' => 'Sorry, this is admin and user area',
            ], 401);
        }
        
        return $next($request);
    }
}
