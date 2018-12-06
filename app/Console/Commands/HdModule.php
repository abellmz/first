<?php

namespace App\Console\Commands;

use App\Models\Module;
use App\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class HdModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hd_module';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '命令描述';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //扫描出 app/Http/Controllers里面所有文件以及文件夹
        $modules=glob('app/Http/Controllers/*');
//        dd($modules);值为路径（字符串）数组
       foreach ($modules as $module){
//           dump($module);//值为字符串为什么就不能用dd打印？ 答：dd只能打印一次，不能循环
           if (is_dir($module.'/System')){
//               dump($module);
//               获取整个路径最后一部分
               $moduleName =basename($module);
//               dump($moduleName);//admin或者。。。
               $config =include $module . '/System/config.php';
               dump($config);
               $permissions =include $module . '/System/permission.php';
//               dump($permissions);得到的$permissions为文件中的内容
               Module::firstOrNew(['name'=>$moduleName])->fill([
                   'title'=>$config['app'],'permissions'=>$permissions//权限->开关：有则能进
               ])->save();
//               dump($permissions);
               foreach ($permissions as $permission){
                   Permission::firstOrNew(['name'=>$moduleName . '-' . $permission['name']])->fill([
                       'title'=>$permission['title'],
                       'module'=>$moduleName
                   ])->save();
               }
           }
       }
//================
//        角色表中 找到站长这个角色对象
        $role =Role::where('name','webmaster')->first();
        //获取所有权限
       $permissions =Permission::pluck('name');
//        dd($permissions);
        //执行完成后 role_has_permissions表有数据 获得所有权限
 //     角色表name   同步到 权限表的name  即站长有了所有权限
        $role->syncPermissions($permissions);
        //获得    设置成站长的那个用户
        $user =User::find(1);
        //      分配角色    给用户步权限
        $user->assignRole('webmaster');
        //清除权限缓存
        app()['cache']->forget('spatie.permission.cache');
        //命令执行成功提示信息
        $this->info('permission init successfully');
    }
}
