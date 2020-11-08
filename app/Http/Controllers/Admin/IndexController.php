<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class IndexController extends Controller
{
    //
    public function login()
    {
    	// 加载后台登录页面
    	return view('admin.index.login');
    }


    public function dologin(Request $request)
    {	
    	// dump($request->all());

    	$uname = $request->input('uname','');
    	$pass = $request->input('pass','');


    	// 获取数据
    	$data = DB::table('users')->where('uname',$uname)->first();


    	// 用户错误
    	if(empty($data)){
    		return back()->with('error','用户名或密码错误');
    	}

    	// 验证密码
    	if (!Hash::check($pass, $data->upass)) {
		    return back()->with('error','用户名或密码错误');
		}


        // 检测权限
        if($data->type != 1){
            return back()->with('error','没有权限');
        }



		// 登录
		session(['admin_login'=>true]);
		session(['admin_userinfo'=>$data]);

		// 跳转
		return redirect('admin/user/index');

    }


    // 退出
    public function logout()
    {
    	session(['admin_login'=>false]);
		session(['admin_userinfo'=>false]);
		return back();
    }
}
