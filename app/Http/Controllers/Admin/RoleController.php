<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Admins\RoleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class RoleController extends Controller
{
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $permissionList = Cache::get('permissionList');
        $map = [];
        foreach ($permissionList as $permission) {
            $tmp = [];
            $tmp['href'] = $permission['url'];
            $tmp['tags'] = $permission['id'];
            $tmp['state']['checked'] = true;
            $tmp['text'] = $permission['permission_name'];
            if ($permission['pid'] == 0) {
                $map[$permission['id']] = $tmp;
            } else {
                $map[$permission['pid']]['nodes'][] = $tmp;
            }
        }
        $pageData['roleList'] = $this->roleRepository->getRoleList();
        $pageData['jsonStr'] = json_encode(array_values($map));
        return view('admins.role.index', $pageData);
    }

    public function edit()
    {
        return view('admins.role.edit');
    }
}
