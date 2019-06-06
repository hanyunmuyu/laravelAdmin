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
        $admin = auth('admin')->user();
        view()->share('admin', $admin);
        $permissionList = $admin->permission()->toArray();
        $permissions = [];
        foreach ($permissionList as $permission) {
            if ($permission['pid'] != 0) {
                if (!isset($parent[$permission['pid']])) {
                    $permissions[$permission['pid']]['subList'][] = $permission;
                } else {
                    $permissions[$permission['id']] = $permission;
                }
            } else {
                $permissions[$permission['id']] = $permission;
            }
        }
        view()->share('permissionList', $permissions);
        return $next($request);
    }
}
