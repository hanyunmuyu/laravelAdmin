<?php
/**
 * Created by 莘莘
 * User: 寒云
 * Email: 1355081829@qq.com
 * Date: 2019/6/7
 * Time: 0:05
 */

namespace App\Repositories\Admins;


use App\Models\Role;

class RoleRepository
{
    public function getRoleList()
    {
        return Role::all();
    }
}
