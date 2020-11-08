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




// 后台首页的路由(加载登录页面)
Route::get('admin','Admin\IndexController@login')->name('admin_login');
Route::post('admin/dologin','Admin\IndexController@dologin');
Route::get('admin/logout','Admin\IndexController@logout');

Route::group(['prefix'=>'admin','middleware'=>'login'],function(){

	// 后台 用户 列表
	Route::get('user/index','Admin\UsersController@index');
	// 后台 用户 添加
	Route::get('user/create','Admin\UsersController@create');
	// 后台 执行 用户 添加
	Route::post('user/store','Admin\UsersController@store');
	// 后台 用户 删除 路由
	Route::get('user/destroy','Admin\UsersController@destroy');
	// 后台 用户  修改
	Route::get('user/edit/{id}/{token}','Admin\UsersController@edit');
	// 后台 执行 修改 用户
	Route::post('user/update/{id}','Admin\UsersController@update');


	// 后台 栏目 列表
	Route::get('cates/index','Admin\CatesController@index');
	// 后台 栏目 添加
	Route::get('cates/create','Admin\CatesController@create');
	// 后台 执行 添加 操作
	Route::post('cates/store','Admin\CatesController@store');


	// 后台 轮播 列表
	Route::get('banners/index','Admin\BannersController@index');
	// 后台 轮播 添加
	Route::get('banners/create','Admin\BannersController@create');
	// 后台 执行 添加 操作
	Route::post('banners/store','Admin\BannersController@store');
	// 修改状态
	Route::get('banners/changeStatus','Admin\BannersController@changeStatus');

	// 后台 标签云 列表
	Route::get('tagnames/index','Admin\TagnamesController@index');
	// 后台 标签云 添加
	Route::get('tagnames/create','Admin\TagnamesController@create');
	// 后台 标签云 执行 添加
	Route::post('tagnames/store','Admin\TagnamesController@store');
	 
	// 后台 文章 列表
	Route::get('articles/index','Admin\ArticlesController@index');
	// 后台 文章 添加 
	Route::get('articles/create','Admin\ArticlesController@create');
	// 后台 文章 执行 添加
	Route::post('articles/store','Admin\ArticlesController@store');
	
});

Route::get('/', 'Home\IndexController@index');
// 前台路由
Route::group(['prefix'=>'home'],function(){

	// 前台登录  路由
	Route::get('login/login','Home\LoginController@login');
	// 验证登录路由
	Route::post('login/dologin','Home\LoginController@dologin');
	// 退出
	Route::get('login/logout','Home\LoginController@logout');

	// 前台 首页 
	Route::get('index/index','Home\IndexController@index');

	// 前台 列表页
	Route::get('lists/index','Home\ListsController@index');

	// 前台 内容 详情页
	Route::get('detail/index','Home\DetailController@index');
	// 前台 内容 点赞
	Route::get('detail/goodnum','Home\DetailController@goodnum');
	

	// 前台 注册
	Route::get('register/index','Home\RegisterController@index');

	// 前台 执行 注册
	Route::post('register/store','Home\RegisterController@store');

});