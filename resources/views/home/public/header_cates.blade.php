<header> 
  <!--menu begin-->
  <div class="menu">
    <nav class="nav" id="topnav">
      <h1 class="logo"><a href="/home/index/index">BLOG</a></h1>
   <!--    <li><a href="index.html">网站首页</a> </li>
      <li><a href="about.html">关于我</a> </li> -->
      	
	  <!-- 显示栏目 开始 -->
	  @foreach($cates_data as $k=>$v)
      <li><a href="javascript:;">{{ $v->cname }}</a>
        <ul class="sub-nav">
          @foreach($v->sub as $kk=>$vv)
          <li><a href="/home/lists/index?cid={{ $vv->id }}">{{ $vv->cname }}</a></li>
          @endforeach
        </ul>
      </li>
      @endforeach
	  <!-- 显示栏目 结束 -->
		

      <!--search begin-->
      <div id="search_bar" class="search_bar" style="position: relative;left:-100px;">
        <form  id="searchform" action="[!--news.url--]e/search/index.php" method="post" name="searchform">
          <input class="input" placeholder="想搜点什么呢..." type="text" name="keyboard" id="keyboard">
          <input type="hidden" name="show" value="title" />
          <input type="hidden" name="tempid" value="1" />
          <input type="hidden" name="tbname" value="news">
          <input type="hidden" name="Submit" value="搜索" />
          <span class="search_ico"></span>
        </form>
      </div>
      <!--search end-->
      @if(session('home_login')) 
       <div style="position: relative;right:-685px;">
        <a href="/home/login/login" style="color:#fff;">{{ session('home_userinfo')->uname }}</a>
        <a href="/home/login/logout" style="color:#fff;">退出</a>
      </div>
      @else 
      <div style="position: relative;right:-685px;">
        <a href="/home/login/login" style="color:#fff;">登录</a>
        <a href="javascript:;" onclick="register()" style="color:#fff;">注册</a>
      </div>
      @endif 
    </nav>

  </div>
  <link rel="stylesheet" href="/layui-v2.4.5/layui/css/layui.css">
  <script src="/layui-v2.4.5/layui/layui.js"></script>

  <script>
//一般直接写在一个js文件中
layui.use(['layer', 'form'], function(){
  var layer = layui.layer;
});
</script>
  <script type="text/javascript">
    function register(){
      //iframe层-父子操作
        layer.open({
          type: 2,
          title: '注册',
          area: ['700px', '450px'],
          fixed: false, //不固定
          maxmin: true,
          content: '/home/register/index'
        });
    }

  </script>


  <!--menu end--> 
  <!--mnav begin-->
  <div id="mnav">
    <h2><a href="http://www.yangqq.com" class="mlogo">杨青博客</a><span class="navicon"></span></h2>
    <dl class="list_dl">
      <dt class="list_dt"> <a href="index.html">网站首页</a> </dt>
      <dt class="list_dt"> <a href="about.html">关于我</a> </dt>
      <dt class="list_dt"> <a href="#">模板分享</a> </dt>
      <dd class="list_dd">
        <ul>
          <li><a href="share.html">个人博客模板</a></li>
          <li><a href="share.html">国外Html5模板</a></li>
          <li><a href="share.html">企业网站模板</a></li>
        </ul>
      </dd>
      <dt class="list_dt"> <a href="#">学无止境</a> </dt>
      <dd class="list_dd">
        <ul>
          <li><a href="list.html">心得笔记</a></li>
          <li><a href="list.html">CSS3|Html5</a></li>
          <li><a href="list.html">网站建设</a></li>
          <li><a href="list.html">推荐工具</a></li>
          <li><a href="list.html">JS实例索引</a></li>
        </ul>
      </dd>
      <dt class="list_dt"> <a href="#">慢生活</a> </dt>
      <dd class="list_dd">
        <ul>
          <li><a href="life.html">日记</a></li>
          <li><a href="life.html">欣赏</a></li>
          <li><a href="life.html">程序人生</a></li>
          <li><a href="life.html">经典语录</a></li>
        </ul>
      </dd>
      <dt class="list_dt"> <a href="time.html">时间轴</a> </dt>
      <dt class="list_dt"> <a href="gbook.html">留言</a> </dt>
    </dl>
  </div>
  <!--mnav end--> 
</header>