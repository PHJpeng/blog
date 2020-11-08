<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Redis;
class IndexController extends Controller
{
    
	// 前台 栏目 数据
	public static function getPidCates()
	{	
		/*
    		[

				[
					id=>1,
					came=>'生活'
				],
				[
					id=>2,
					cname=>'旅游'
				],

				[
					id=>3,
					cname=>'美食'
				],·
				[
					id=>4,
					came=>'技术'
				],
				[
					id=>5,
					cname=>'html'
				],

				[
					id=>6,
					cname=>'PHP'
				],·
    		]

    		[

				[
					id=>1,
					came=>'生活',
					'sub'=>[
						[
							id=>2,
							cname=>'旅游'
						],

						[
							id=>3,
							cname=>'美食'
						],
						
					]
				],
				
				[
					id=>4,
					came=>'技术',
					'sub'=>[
						[
							id=>5,
							cname=>'html'
						],

						[
							id=>6,
							cname=>'PHP'
						],
					]
				],
				
    		]
    	 */	

		// 获取 栏目
    	$cates_parent_data = DB::table('cates')->where('pid',0)->orderBy('id','asc')->get();

    	$temp = [];	
    	foreach ($cates_parent_data as $key => $value) {
    	    // 获取当前栏目下的 子栏目
    		$cates_child_data = DB::table('cates')->where('pid',$value->id)->get();
    		$value->sub = $cates_child_data;
    		$temp[] = $value;
    	}

    	return $temp;
	}

	// 封装 栏目的 名称 获取
	public static function getCatesCname()
	{
		// 获取所有的栏目id和名称
    	$cates_cname_data = DB::table('cates')->select('id','cname')->get();
    	// dd($cates_cname_data);
    	$temp = [];
    	foreach($cates_cname_data as $k=>$v){
    		$temp[$v->id] = $v->cname;
    	}
    	return $temp;
	}

    // 主页面
    public function index()
    {

    	if(Redis::exists('cates_redis_data')){
    		$cates_data = json_decode(Redis::get('cates_redis_data'));
    	}else{
    		// 获取栏目的数据
    		$cates_data = self::getPidCates();	
			// 压入到redis中
    		Redis::setex('cates_redis_data',600,json_encode($cates_data));
    	}	
    	
    	// 获取 轮播 数据
    	$banners_data = DB::table('banners')->where('status',1)->get();

    	// 获取 标签云 数据
    	$tagnames_data = DB::table('tagnames')->get();

    	//  获取 首页 默认显示的 最新数据 默认显示 12 条 
    	$articles_data = DB::table('articles')->orderBy('ctime','desc')->skip(0)->take(12)->get();	
    	
    	// 栏目的 名称 获取
    	$cates_cname_data = self::getCatesCname();

    	// 显示模板
    	return view('home.index.index',['cates_cname_data'=>$cates_cname_data,'articles_data'=>$articles_data,'tagnames_data'=>$tagnames_data,'cates_data'=>$cates_data,'banners_data'=>$banners_data]);
    }
}
