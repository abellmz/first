<?php

namespace App\Http\Controllers\Role;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        //获取所有角色
        $roles = Role::paginate(10);
//        dd($roles);
        return view('role.role.index',compact('roles'));
    }
    public function create()
    {
//        dd('1');
        return view('role.role.create');
    }
    public function store(Request $request)
    {
//        dd('1');
        Role::create($request->all());
        return redirect()->route('role.role.index')->with('success','操作成功');
    }
    public function show(Role $role)
    {
        //
    }
    public function edit(Role $role)
    {
//        dd($role);
        return view('role.role.edit',compact('role'));
    }
    public function update(Request $request, Role $role)
    {
//        dd($request->all());
        $role->update($request->all());
//        dd('1');
        return redirect()->route('role.role.index')->with('success','操作成功');
    }
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role.role.index')->with('success','删除成功');
    }
}
