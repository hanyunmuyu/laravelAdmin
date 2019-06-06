<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Api
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::guard('api')->check()) {
            return response()->json([
                'code' => 4000,
                'status' => 'error',
                'msg' => '认证失败',
                'data'=>[]
            ]);
        }
        return $next($request);
    }
}
