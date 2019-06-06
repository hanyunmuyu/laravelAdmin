<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if (!auth('admin')->check()) {
            if ($request->ajax()) {
                response()->json([
                    'code' => 4000,
                    'status' => 'error',
                    'msg' => '认证失败'
                ]);
            }
            return redirect('/admin/login');
        }
        return $next($request);
    }
}
