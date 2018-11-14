<?php

namespace App\Http\Controllers\Util;

use App\Notifications\RegisterNotify;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CodeController extends Controller
{
    public function send(Request $request){
//        dd($request->all());
//        dd($request->username);
        $code=$this->random();
        $user=User::firstOrNew(['email'=>$request->username]);
//        dd($user);
        $user->notify(new RegisterNotify($code));
        session()->put('code',$code);
        return ['code'=>1,'message'=>'验证码发送成功'];
    }
    public function random($len=4){
        $str='';
        for($i=0;$i<$len;$i++){
            $str.=mt_rand(0,9);
        }
        return $str;
    }
}
