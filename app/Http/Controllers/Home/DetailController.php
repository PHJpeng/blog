<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class DetailController extends Controller
{   
    private function prev($id,$cid)
    {
        $data = DB::table('articles')->where('id','<',$id)->where('cid',$cid)->orderBy('id','desc')->first();
        if($data){
            return $data;
        }else{
            return false;
        }
    }
    private function next($id,$cid)
    {
        $data = DB::table('articles')->where('id','>',$id)->where('cid',$cid)->orderBy('id','asc')->first();
        if($data){
            return $data;
        }else{
            return false;
        }
    }


    // 显示 主页
    public function index(Request $request)
    {
    	// 获取 栏目 数据
    	$cates_data = IndexController::getPidCates();

    	// 文章id
    	$id = $request->input('id',0);


        // 修改 该 文章 的 阅读量
        DB::update("update articles set num = num+1 where id = ".$id);


    	// 获取文章 详情
    	$data = DB::table('articles')->where('id',$id)->first();

    	// 标签云id
    	$tagname_id = $request->input('tagname_id',0);

    	// 获取对应的标签云信息
    	$tagname_data = DB::table('tagnames')->where('id',$tagname_id)->first();


        // 获取 标签云 数据
        $tagnames_data = DB::table('tagnames')->get();


        // // 栏目的 名称 获取
        $cates_cname_data = IndexController::getCatesCname();



        


        // 上一条
        $article_prev = self::prev($id,$request->input('cid',0));


        $article_next = self::next($id,$request->input('cid',0));



    	// 显示 详情 页面
    	return view('home.detail.index',['article_next'=>$article_next,'article_prev'=>$article_prev,'cates_cname_data'=>$cates_cname_data,'tagnames_data'=>$tagnames_data,'tagname_data'=>$tagname_data,'data'=>$data,'cates_data'=>$cates_data]);
    }


    // 点赞
    public function goodnum(Request $request)
    {
        $id = $request->input('id',0);

        // 检查当前该用户是否给该文章 点赞过
        
        // 检查用户是否登录
        if(!session('home_login')){
            echo json_encode(['msg'=>'err','info'=>'请先登录']);
            exit;
        } 

        // 获取用户id
        $uid = session('home_userinfo')->id;
        // 所有 点赞文章
        $tids = DB::table('users_articles')->where('uid',$uid)->select('tid')->get();
        $tids_all = [];
        foreach ($tids as $key => $value) {
            $tids_all[] = $value->tid;
        }

            
        // 检查是否点赞
        if(in_array($id,$tids_all)){
            echo json_encode(['msg'=>'err','info'=>'已点赞']);
            exit;
        }


        // 修改点赞字段
        $res = DB::update('update articles set goodnum=goodnum+1 where id = '.$id);

        // 记录点赞信息
        DB::table('users_articles')->insert(['uid'=>$uid,'tid'=>$id]);

        if($res){   
            echo json_encode(['msg'=>'ok','info'=>'+1']);
            exit;
        }else{
            echo json_encode(['msg'=>'err','info'=>'点赞失败']);
            exit;
        }

    }
}
