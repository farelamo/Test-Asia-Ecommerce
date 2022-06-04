<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth()->user()->role != 'Admin'){
            return response()->json([
                'response_code' => '01',
                'response_Message' => 'Sorry, this is admin area',
            ], 401);
        }
        return $next($request);
    }
}
