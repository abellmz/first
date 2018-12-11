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
//前台
Route::group(['prefix'=>'home','namespace'=>'Home','as'=>'home.'],function (){
    Route::get('/','HomeController@index')->name('index');
    Route::resource('article','ArticleController');
    //评论
    Route::resource('comment','CommentController');
    //点赞
    Route::get('zan/make','ZanController@make')->name('zan.make');
    //收藏
    Route::get('collection/make','CollectionController@make')->name('collection.make');
//    搜索
    Route::get('search','HomeController@search')->name('search');
});
//会员中心
Route::group(['prefix'=>'member','namespace'=>'Member','as'=>'member.'],function (){
    Route::resource('user','UserController');
    //关注和取消关注          由于自己定义的方法laravel不识别  需要加上参数
    Route::get('attention/{user}','UserController@attention')->name('attention');
    //我的粉丝
    Route::get('get_fans/{user}','UserController@myFans')->name('my_fans');
//    我的关注
    Route::get('get_following/{user}','UserController@myFollowing')->name('my_following');
//    我的点赞
    Route::get('get_zan/{user}','UserController@myZan')->name('my_zan');
    //我的所有通知
    Route::get('notify/{user}','NotifyController@index')->name('notify');
//    b标记已读
    Route::get('notify/show/{notify}','NotifyController@show')->name('notify.show');
    //我的收藏
    Route::get('get_collection/{user}','UserController@myCollection')->name('my_collection');
});
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
Route::group(['prefix'=>'util','namespace'=>'Util','as'=>'util.'],function (){
    Route::any('/code/send','CodeController@send')->name('code.send');
    //上传
    Route::any('/upload','UploadController@uploader')->name('upload');
    Route::any('/filesLists','UploadController@filesLists')->name('filesLists');
});

//后台路由
//路由群组      中间件                         前缀              命名空间            别名
Route::group(['middleware'=>['admin.auth'],'prefix'=>'admin','namespace'=>'Admin','as'=>'admin.'],function(){
        Route::get('index','IndexController@index')->name('index');
    //创建模型 同时 创建迁移文件和工厂
    //artisan make:model --migration --factory Models/Category
    //创建控制器指定模型        --参数：指定注入的方法、参数等         空间和类名
    //artisan make:controller --model=Models/Category Admin/CategoryController
    //资源路由                                  控制器名    省略方法
    Route::resource('category','CategoryController');
    //配置项管理
    Route::get('config/edit/{name}','ConfigController@edit')->name('config.edit');
    Route::post('config/update/{name}','ConfigController@update')->name('config.update');
//    轮播图
    Route::resource('flash','FlashController');
});
//微信管理
Route::group(['prefix'=>'wechat','namespace'=>'Wechat','as'=>'wechat.'],function (){
//    菜单管理
    Route::resource('button','ButtonController');
    Route::get('button/push/{button}','ButtonController@push')->name('button.push');
//微信 接口配置信息的url（即调用该方法的路径--url  ）
    Route::any('api/handler','ApiController@handler')->name('api.handler');
//    基本文本回复
    Route::resource('response_text','ResponseTextController');
//    基本图文回复
    Route::resource('response_news','ResponseNewsController');
//   基本回复 关注回复和默认回复
    Route::resource('response_base','ResponseBaseController');
});
Route::group(['prefix'=>'role','namespace'=>'Role','as'=>'role.'],function (){
//    权限列表
    Route::get('permission/indx','PermissionController@index')->name('permission.index');
//    清除权限缓存
    Route::get('permission/forget_permission_cache','PermissionController@forgetPermissionCache')->name('permission.forget_permission_cache');
//角色管理
    Route::resource('role','RoleController');
//设置角色权限
    Route::post('role/set_role_permission/{role}','RoleController@setRolePermission')->name('role.set_role_permission');
//用户管理
    Route::get('user/index','UserController@index')->name('user.index');
    Route::get('user/user_set_role_create/{user}','UserController@userSetRoleCreate')->name('user.user_set_role_create');
    Route::post('user/user_set_role_store/{user}','UserController@userSetRoleStore')->name('user.user_set_role_store');
});



