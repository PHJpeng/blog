<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ArticlesController extends Controller
{
    //
    public function index()
    {
    	$data = DB::table('articles')->orderBy('id','asc')->paginate(10);

    	// 显示列表页面
    	return view('admin.articles.index',['data'=>$data]);
    }

    public function create()
    {
    	// 获取所有的标签云
    	$tagnames_data = DB::table('tagnames')->get();

    	// 获取所有的 栏目
    	$cates_data = CatesController::getCates();


    	// 显示 页面
    	return view('admin.articles.create',['tagnames_data'=>$tagnames_data,'cates_data'=>$cates_data]);
    }

    public function store(Request $request)
    {
        // 数据验证
        $this->validate($request, [
            'title' => 'required|max:123',
            'auth' => 'required|max:32',
            'desc' => 'required|max:255',
        ],[
            'title.required'=>'标题必填',
            'title.max'=>'标题过长',
            'auth.required'=>'作者必填',
            'auth.max'=>'作者过长',
            'desc.required'=>'描述必填',
            'desc.max'=>'描述过长', 
        ]);


        // dd($request->all());
    	if($request->hasFile('thumb')){
    		$thumb = $request->file('thumb')->store(date('Ymd'));
    	}else{
    		return back()->with('error','请选择图片');
    	}

    	// 获取数据
    	$data = $request->except(['_token','thumb']);
    	$data['ctime'] = date('Y-m-d H:i:s',time());
    	$data['thumb'] = $thumb;
    	$data['num'] = rand(1500,4321);
    	$data['goodnum'] = rand(500,1000);


    	// 执行添加
    	$res = DB::table('articles')->insert($data);
    	// 判断
    	if($res){
            return redirect('admin/articles/index')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }


    }
}
