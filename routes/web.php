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

//后台首页路由
Route::get('admin/index/index', 'Admin\IndexController@index')->name('dashboard');//
Route::get('admin/index/welcome', 'Admin\IndexController@welcome')->name('welcome');//

//运动员管理
// 人员列表展示
Route::get('user/index'.'Admin\UserController@index')-> name('user_index');
//人员添加
Route::any('user/add'.'Admin\UserController@add')->name('user_add');
//头像上传
Route::post('uploader/webuploader','Admin\UploadController@webuploader');
//


//后台管理页面 ByPliaf
Route::get('admin/manager/index','Admin\ManagerController@index')-> name('manager_index');

