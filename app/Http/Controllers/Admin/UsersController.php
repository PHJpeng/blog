<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Illuminate\Support\Facades\Storage;
class UsersController extends Controller
{
    //
    public function index(Request $request)
    {
        // 接受搜索条件
        $search = $request->input('search','');

        // $data = DB::table('users')->get();
        // 查询数据 并且 分页
    	$data = DB::table('users')->where('uname','like','%'.$search.'%')->paginate(5);

    	return view('admin.users.index',['data'=>$data,'search'=>$search]);
    }

    // 显示添加 页面
    public function create()
    {
    	return view('admin.users.create');
    }
    // 执行 添加 操作
    public function store(Request $request)
    {
        // 验证表单
        $this->validate($request, [
            'uname' => 'required|regex:/^[a-z]{1}[\w]{5,17}$/',
            'upass' => 'required|regex:/^[\w]{6,18}$/',
            'repass' => 'required|same:upass',
        ],[
            'uname.required'=>'用户名必填',
            'uname.regex'=>'用户名格式错误',
            'upass.regex'=>'密码格式错误',
            'upass.required'=>'密码必填',
            'repass.required'=>'确认密码必填',
            'repass.same'=>'俩次密码不一致',
        ]);


        // 执行文件上传
        if($request->hasFile('profile')){
            $path = $request->file('profile')->store(date('Ymd'));
        }else{
            $path = '';
        }
       

        // 接收值
        $data['profile'] = $path;
        $data['uname'] = $request->input('uname','');
        $data['upass'] = Hash::make($request->input('upass',''));
        $data['token'] = str_random(50);
        $data['status'] = 0;
        $data['ctime'] = date('Y-m-d H:i:s',time());

        // 执行添加
        $res = DB::table('users')->insert($data);
        if($res){
            return redirect('admin/user/index')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }

    }


    // 执行删除
    public function destroy(Request $request)
    {

       

        $id =  $request->input('id',0);
        $token =  $request->input('token',0);

        // 获取数据token
        $data_token = DB::table('users')->select('token')->where('id',$id)->first();
        // 验证token
        if($data_token->token != $token){
            echo "err";
            exit;
        }

        // 删除
        $res = DB::table('users')->where('id',$id)->delete();
        
        if($res){
            echo "ok";
        }else{
            echo "err";
        }
    } 


    // 用户修改
    public function edit($id,$token)
    {
        // 获取当前要修改的数据
        $data = DB::table('users')->where('id',$id)->first();

        // 验证token
        if($data->token != $token){
            return back()->with('error','token验证失败');
        }

        // 显示页面  显示要修改的数据
        return view('admin.users.edit',['data'=>$data]);
    } 


    public function update(Request $request,$id)
    {   
         // 1232@  qq.com
        // adsfasf_123@163.com
        
        // 验证数据
        $this->validate($request, [
            'uname' => 'required|regex:/^[a-zA-Z]{1}[\w]{5,17}$/',
            'email' => 'required|regex:/^[\w]+@[\w]+\.[\w]+$/',
        ],[
            'uname.required'=>'用户必填',
            'uname.regex'=>'用户格式错误',

            'email.required'=>'邮箱必填',
            'email.regex'=>'邮箱格式错误',
        ]);

        // 执行文件上传
        if($request->hasFile('profile')){
            // 删除以前 旧图片
            Storage::delete($request->input('profile_path'));
            $path = $request->file('profile')->store(date('Ymd'));
        }else{
            $path = $request->input('profile_path','');
        }


        // 接收用户提交的值
        $data['uname'] = $request->input('uname','');    
        $data['email'] = $request->input('email','');    
        $data['profile'] = $path;
        $data['token'] = str_random(50);
        // 执行修改
        $res = DB::table('users')->where('id',$id)->update($data);
      
        // 判断逻辑
        if($res){
            return redirect('admin/user/index')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }



    }
}
