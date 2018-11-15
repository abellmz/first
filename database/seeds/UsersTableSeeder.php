<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //模型工厂填充数据
        factory(\App\User::class,8)->create();
//        修改第一条数据，成为管理员信息
        $user=\App\User::find(1);
        $user->name='李敏樟';
        $user->email='1114708936@qq.com';
        $user->password=bcrypt('123456');
        $user->is_admin=true;
        $user->save();
    }
}
