<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class BannersController extends Controller
{
    //
    public function index()
    {
    	$data = DB::table('banners')->get();

    	// 加载列页面
    	return view('admin.banners.index',['data'=>$data]);
    }

    public function create()
    {
    	return view('admin.banners.create');
    }


    public function store(Request $request)
    {
    	// 检查文件上传
    	if($request->hasFile('url')){
    		$url = $request->file('url')->store(date('Ymd'));
    	}else{
    		return back()->with('error','请选择图片');
    	}

    	// 接收数据
    	$data['title'] = $request->input('title','');
    	$data['desc'] = $request->input('desc','');
    	$data['url'] = $url;
    	$data['status'] = $request->input('status','');

    	// 执行 添加到数据库
    	$res  = DB::table('banners')->insert($data);
    	if($res){
            return redirect('admin/banners/index')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }


    public function changeStatus(Request $request)
    {
    	$status = $request->input('status');

    	$id = $request->input('id');


    	// 执行修改
    	$res = DB::table('banners')->where('id',$id)->update(['status'=>$status]);
		if($res){
            return back()->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }

    }

}
