<?php

namespace App\Http\Controllers\Role;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{//权限列表
    public function index(){
//        dd('1');
        //获取所有模块表 modules 数据
        $modules = Module::all();
        return view('role.permission.index',compact('modules'));
    }

    public function forgetPermissionCache(){
        app()['cache']->forget('spatie.permission.cache');
        return back()->with('success','缓存清理成功');
    }
}
