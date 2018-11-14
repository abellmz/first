<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(){
        return view('user.register');
    }
    public function login(){
        return view('user.login');
    }
    public function store(UserRequest $request){
//        dd($request->all());
        $data=$request->all();
        $data['password']=bcrypt($data['password']);
        User::create($data);
        return redirect()->route('login')->with('success','注册成功');
    }
}
