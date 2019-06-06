<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $adminList = [
            [
                'email' => '1355081829@qq.com',
                'name' => 'admin',
                'password' => encrypt("1355081829@qq.com"),
                'avatar'=>'avatar.jpg'
            ],
        ];
        foreach ($adminList as $admin) {
            \App\Admin::create($admin);
        }
    }
}
