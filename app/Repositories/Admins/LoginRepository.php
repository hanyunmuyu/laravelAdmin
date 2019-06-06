<?php
/**
 * Created by 莘莘
 * User: 寒云
 * Email: 1355081829@qq.com
 * Date: 2019/5/12
 * Time: 0:34
 */

namespace App\Repositories\Admins;


use App\Admin;

class LoginRepository
{
    public function login($email)
    {
        return Admin::where('name', $email)->first();
    }
}
