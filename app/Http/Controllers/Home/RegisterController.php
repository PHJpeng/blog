<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Captcha;
class RegisterController extends Controller
{
    // 显示  注册的页面
    public function index()
    {	


    	return view('home.register.index');
    }



    public function store(Request $request)
    {
    	// 验证  验证码
    	if(!Captcha::check($request->input('code'))){
		  	echo json_encode(['msg'=>'err','info'=>'验证码错误']);
		  	exit;
		}

		// 注册
		echo json_encode(['msg'=>'ok','info'=>'注册成功']);

    }

}
