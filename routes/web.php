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

Route::get('/', 'HomeController@index')->name('home');
//               路由名？                                 地址                        别名
Route::get('/register','UserController@register')->name('register');
Route::get('/login','UserController@login')->name('login');
Route::post('/register','UserController@store')->name('register');

Route::any('/code/send','Util\CodeController@send')->name('code.send');