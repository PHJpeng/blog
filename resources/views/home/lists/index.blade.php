
<!doctype html>
<html>
<head>
@include('home.public.header')
</head>
<body>
<!--  header 栏目  开始  -->
@include('home.public.header_cates')
<!--  header 栏目  结束  -->


<div class="pagebg sh"></div>
<div class="container">
  <h1 class="t_nav"><span>不要轻易放弃。学习成长的路上，我们长路漫漫，只因学无止境。 </span><a href="/" class="n1">网站首页</a><a href="/" class="n2">学无止境</a></h1>
  <!--blogsbox begin-->
  <div class="blogsbox">
    <!-- 显示文章 列表 开始 -->
    @foreach($cates_lists as $k=>$v)
    <div class="blogs" data-scroll-reveal="enter bottom over 1s" >
      <h3 class="blogtitle"><a href="/home/detail/index?id={{ $v->id }}&cid={{ $v->cid }}&tagname_id={{ $v->tid }}" target="_blank">{{ $v->title }}</a></h3>
      <span class="blogpic"><a href="/home/detail/index?id={{ $v->id }}&cid={{ $v->cid }}&tagname_id={{ $v->tid }}" title=""><img src="/uploads/{{ $v->thumb }}" alt=""></a></span>
      <p class="blogtext">
        {{ $v->desc }}
      </p>
      <div class="bloginfo">
        <ul>
          <li class="author"><a href="javascript:;">{{ $v->auth }}</a></li>
          <li class="lmname"><a href="javascript:;">{{ $cates_cname_data[$v->cid] }}</a></li>
          <li class="timer">{{ $v->ctime }}</li>
          <li class="view"><span>{{ $v->num }}</span>已阅读</li>
          <li class="like">{{ $v->goodnum }}</li>
        </ul>
      </div>
    </div>
    @endforeach
    <!-- 显示文章 列表 结束 -->
      
    <div class="pagelist"><a title="Total record">&nbsp;<b>45</b> </a>&nbsp;&nbsp;&nbsp;<b>1</b>&nbsp;<a href="/download/index_2.html">2</a>&nbsp;<a href="/download/index_2.html">下一页</a>&nbsp;<a href="/download/index_2.html">尾页</a></div>
    
  </div>
  <!--blogsbox end-->
   
  <!-- 右边侧边栏 开始  -->
  @include('home.public.slidebar')
  <!-- 右边侧边栏 结束  -->


</div>
<footer>
  <p>Design by <a href="http://www.yangqq.com" target="_blank">杨青个人博客</a> <a href="/">蜀ICP备11002373号-1</a></p>
</footer>
<a href="#" class="cd-top">Top</a>
</body>
</html>
