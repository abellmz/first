<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends CommonController
{
    public function __construct()
    {
        // 除login外都需要验证 其他都需要接口验证？
        $this->middleware('auth:api',['except'=>['login']]);
    }
//    登录
    public function login(){
//                                      比对数据库中数据
        if (!$token =auth('api')->attempt(request()->only(['email', 'password']))){
//            登录失败
            return $this->response->errorUnauthorized('帐号或密码错误');
        }
//        登录成功  给令牌
        return $this->respondWithToken($token);
//        dd('1');
    }
//    响应token 即给临牌
    protected function respondWithToken($token){
        //获取 jwt.php 配置文件中 token 有效期 60min
//        dd(auth('api')->factory()->getTTL());
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,//3600s
        ]);
    }
    //获取⽤用户资料
    public function me(){
        return response()->json(auth('api')->user());
    }
    //注销登录
    public function logout(){
        auth('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
