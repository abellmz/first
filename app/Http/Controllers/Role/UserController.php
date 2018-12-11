<?php

namespace App\Http\Controllers\Role;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
//    展示所有用户
    public function index(){
//        dd('1');
        $users =User::paginate(5);
//        dd($users);
        return view('role.user.index',compact('users'));
    }
//    用户设置角色
    public function userSetRoleCreate(User $user){
//        获取所有角色
        $roles=Role::all();
        return view('role.user.set_role',compact('user','roles'));
    }
//    用户设置角色保存
    public function userSetRoleStore(User $user,Request $request){
//        dd($request->roles);
//     该用户  同步角色    要求角色
        $user ->syncRoles($request->roles);
        return back()->with('success','设置成功');
    }
}
