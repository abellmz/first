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

Route::get('/', function () {
    return view('welcome');
});
//               路由名？                                 地址                        别名
Route::get('/edu/article/index','Edu\ArticleController@index')->name('edu.article.index');
Route::get('/edu/article/aa','Edu\ArticleController@aa')->name('edu.article.aa');
Route::post('/edu/article/store','Edu\ArticleController@store')->name('edu.article.store');

Route::resource('/edu/phpto','Edu\PhotoController');