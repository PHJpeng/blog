<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class LoginController extends Controller
{
    // 显示 登录 模板
    public function login()
    {
    	return view('home.login.login');
    }

    public function dologin(Request $request)
    {
    	$uname = $request->input('uname','');
    	$pass = $request->input('upass','');


    	// 获取数据
    	$data = DB::table('users')->where('uname',$uname)->first();


    	// 用户错误
    	if(empty($data)){

    		echo json_encode(['msg'=>'err','info'=>'用户名或密码错误']);
    		exit;
    	}

    	// 验证密码
    	if (!Hash::check($pass, $data->upass)) {
		    echo json_encode(['msg'=>'err','info'=>'用户名或密码错误']);
    		exit;
		}


		// 登录
		session(['home_login'=>true]);
		session(['home_userinfo'=>$data]);

		// 跳转
		echo json_encode(['msg'=>'ok','info'=>'登录成功']);
    }

    public function logout()
    {
    	session(['home_login'=>false]);
		session(['home_userinfo'=>false]);
		return back();
    }
}
