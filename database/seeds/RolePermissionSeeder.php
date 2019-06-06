<?php

use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissions = \App\Models\Permission::all();
        foreach ($permissions as $permission) {
            $data['role_id'] = 1;
            $data['permission_id'] = $permission->id;
            \App\Models\RolePermission::firstOrCreate($data);
        }
    }
}
