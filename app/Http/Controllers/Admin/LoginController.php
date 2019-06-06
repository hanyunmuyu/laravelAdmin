<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Admins\LoginRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    private $loginRepository;
    public function __construct(LoginRepository $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }

    public function index()
    {
        return view('admins.login.index');
    }

    public function doLogin(Request $request)
    {
        $messages = [
            'email.required' => '邮箱地址不能为空!',
            'password.required' => '密码不可以为空!',
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return redirect('/admin/login')
                ->withErrors($validator)
                ->withInput();
        }
        $admin = $this->loginRepository->login($request->get('name'));
        if (!$admin) {
            $validator->errors()->add('name', '用户不存在');
            return redirect('/admin/login')
                ->withErrors($validator)
                ->withInput();
        } else {
            try {
                if (decrypt($admin->password) != $request->get('password')) {
                    $validator->errors()->add('password', '密码错误');
                    return redirect('/admin/login')
                        ->withErrors($validator)
                        ->withInput();
                } else {
                    if ($request->get('remember') == 'on') {
                        auth('admin')->login($admin, true);
                    } else {
                        auth('admin')->login($admin);
                        return redirect('/admin/index');
                    }

                }
            } catch (\Exception $exception) {
                $validator->errors()->add('password', '密码错误');
            }
        }
    }

    public function logout()
    {
        auth('admin')->logout();
        return redirect('/admin/login');
    }
}
