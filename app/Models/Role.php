<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public function permission()
    {
        return $this->hasManyThrough('App\Models\Permission', 'App\Models\RolePermission', 'role_id', 'id', 'id', 'permission_id')->get();
    }
}
