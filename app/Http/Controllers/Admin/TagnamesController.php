<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class TagnamesController extends Controller
{
    //
    public function index()
    {
    	$data = DB::table('tagnames')->orderBy('id','asc')->get();

    	// 显示 表格
    	return view('admin.tagnames.index',['data'=>$data]);
    }

    public function create()
    {
    	return view('admin.tagnames.create');
    }

    // 执行添加操作
    public function store(Request $request)
    {
    	$this->validate($request, [
	        'tagname' => 'required',
	        'bgcolor' => 'required',
	    ],[
	    	'tagname.required'=>'名称必填',
	    	'bgcolor.required'=>'请选择颜色',
	    ]);

    	$data['tagname'] =  $request->input('tagname','');
    	$data['bgcolor'] =  $request->input('bgcolor','');

    	// 执行添加
    	$res = DB::table('tagnames')->insert($data);
    	// 判断
    	if($res){
            return redirect('admin/tagnames/index')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }

    }	
}

