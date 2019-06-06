<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Admins\RoleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $pageData['roleList'] = $this->roleRepository->getRoleList();
        return view('admins.role.index', $pageData);
    }

    public function edit()
    {

    }
}
