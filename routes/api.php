<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//框架自带  权限验证api接口
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
$api =app(\Dingo\Api\Routing\Router::class);
#默认配置指定的是v1版本，可以直接通过 {host}/api/version 访问到
$api->version('v1',['namespace'=>'\App\Http\Controllers\Api'],function ($api){
//    接口访问version 则返回v1
    $api->get('version',function (){
        return 'v1';
    });
    //获取文章数据
    $api->get('articles', 'ArticleController@articles');
    $api->get('show/{id}','ArticleController@show');
    //获取栏目数据
    $api->get('categories', 'CategoryController@categories');
    //获取轮播图数据
    $api->get('flashs', 'FlashController@flashs');
    //登录请求
    $api->post('login', 'AuthController@login');
    //退出
    $api->get('logout', 'AuthController@logout');
    //我的
    $api->get('me', 'AuthController@me');
});
