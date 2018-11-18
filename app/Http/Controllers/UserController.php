<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordResetRequest;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest',[
           'only'=>['login','loginForm','register','store','passwordReset','passwordResetForm']
        ]);
    }

    //注册
    public function register(){
        return view('user.register');
    }
//    登录
    public function login(){
        return view('user.login');
    }
//重置表单
    public function passwordReset(){
        return view('user.password_reset');
    }
    //接收重置的表单
    public function passwordResetForm(PasswordResetRequest $request){
        $user=User::where('email',$request->email)->first();
        if ($user){
            $user->password=bcrypt($request->password);
            $user->save();
            return redirect()->route('login')->with('success','密码重置成功');
        }
        return redirect()->back()->with('danger','该邮箱未注册');
    }
    //接收登录表单
    public  function  loginForm(Request $request){
        //验证    2参数 （要求，错误提示）
        $this->validate($request,[
            'email'=>'email',
            'password'=>'required|min:3'
        ],[
            'email.email'=>'请输入邮箱',
            'password.required'=>'请输入登录密码',
            'password.min'=>'密码不得少于3位置'
        ]);

        $credentials = $request->only('email', 'password');
        if (\Auth::attempt($credentials,$request->remember)) {
            // Authentication passed...
            return redirect()->route('home')->with('success','登录成功');
        }
        return redirect()->back()->with('danger','用户名或密码不正确');
    }

    public function logout(){
        \Auth::logout();
        return redirect()->route('home');
    }
//存储注册数据
    public function store(UserRequest $request){
//        dd($request->all());
        $data=$request->all();
        $data['password']=bcrypt($data['password']);
        User::create($data);
//        数据库填数据
//        重定向，即跳转，三村  需要模板调用才会提示
        return redirect()->route('login')->with('success','注册成功');
    }
}
