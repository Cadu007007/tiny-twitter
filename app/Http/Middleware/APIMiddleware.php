<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class APIMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth('api')->user()) {

            return $next($request);
        } else {
            return response()->json([

                'status' => false,
                'message' => 'You Have To Log in',

            ]);
        }
    }
}
