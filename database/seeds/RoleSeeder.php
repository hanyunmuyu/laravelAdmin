<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roleList = [
            [
                'role_name' => '管理员',
            ]
        ];
        foreach ($roleList as $role) {
            \App\Models\Role::firstOrCreate($role);
        }
    }
}
