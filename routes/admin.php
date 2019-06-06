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
//登录
Route::get('/login','LoginController@index');
Route::post('/login','LoginController@doLogin');
//退出
Route::get('/logout','LoginController@logout');
Route::group(['middleware'=>['admin.auth']], function () {
    //后台首页
    Route::get('/index', 'IndexController@index');
    Route::get('/role', 'RoleController@index');
});
