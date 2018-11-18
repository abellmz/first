<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//根路由
Route::get('/', 'Home\HomeController@index')->name('home');
// 登录
Route::get('/login','UserController@login')->name('login');
Route::post('/login','UserController@loginForm')->name('login');

//注册
Route::get('/register','UserController@register')->name('register');
Route::post('/register','UserController@store')->name('register');
//密码重置和注销
Route::get('/password_reset','UserController@passwordReset')->name('password_reset');
Route::post('/password_reset','UserController@passwordResetForm')->name('password_reset');
Route::get('/logout','UserController@logout')->name('logout');

//工具类：验证码
Route::any('/code/send','Util\CodeController@send')->name('code.send');

//路由群组      中间件                         前缀              命名空间            别名
Route::group(['middleware'=>['admin.auth'],'prefix'=>'admin','namespace'=>'Admin','as'=>'admin.'],function(){
        Route::get('index','IndexController@index')->name('index');
    //创建模型 同时 创建迁移文件和工厂
    //artisan make:model --migration --factory Models/Category
    //创建控制器指定模型        --参数：指定注入的方法、参数等         空间和类名
    //artisan make:controller --model=Models/Category Admin/CategoryController
    //资源路由                                  控制器名    省略方法
Route::resource('category','CategoryController');
});
