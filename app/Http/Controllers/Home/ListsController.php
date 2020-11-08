<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ListsController extends Controller
{
    //
    public function index(Request $request)
    {

        // 获取 栏目 数据
    	$cates_data = IndexController::getPidCates();

        // 获取栏目 id
        $cid = $request->input('cid',0);
        // 获取当前标签云 id
        $tagname_id = $request->input('tagname_id',0);

        if($tagname_id != 0){
            // 获取标签云对应的文章
            $cates_lists = DB::table('articles')->where('tid',$tagname_id)->orderBy('ctime','desc')->get();
        }else{
            // 获取该栏目下的文章
            $cates_lists = DB::table('articles')->where('cid',$cid)->orderBy('ctime','desc')->get();
        }
        
        // 获取 标签云 数据
        $tagnames_data = DB::table('tagnames')->get();


        // // 栏目的 名称 获取
        $cates_cname_data = IndexController::getCatesCname();


    	// 加载页面
    	return view('home.lists.index',['cates_cname_data'=>$cates_cname_data,'tagnames_data'=>$tagnames_data,'cates_data'=>$cates_data,'cates_lists'=>$cates_lists]);
    }
}
