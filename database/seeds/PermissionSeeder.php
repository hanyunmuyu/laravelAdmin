<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permissionList = [
            [

                'permission_name' => '首页',
                'url' => '/admin/index',
            ],
            [

                'permission_name' => '角色管理',
                'url' => null,
                'subList' => [
                    [
                        'permission_name' => '角色列表',
                        'url' => '/admin/role',
                    ],
                    [
                        'permission_name' => '编辑角色',
                        'is_show' => 0,
                        'url' => '/admin/role/edit',
                    ]
                ]
            ]
        ];
        foreach ($permissionList as $permission) {
            $this->addPermission($permission);
        }
    }

    private function addPermission($permission)
    {
        if (isset($permission['subList'])) {
            $subList = $permission['subList'];
            unset($permission['subList']);
            $p = \App\Models\Permission::firstOrCreate($permission);
            if ($p) {
                foreach ($subList as $sub) {
                    $sub['pid'] = $p->id;
                    $this->addPermission($sub);
                }
            }
        } else {
            \App\Models\Permission::firstOrCreate($permission);
        }

    }
}
