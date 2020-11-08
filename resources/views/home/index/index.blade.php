
<!doctype html>
<html>
<head>
@include('home.public.header')
</head>
<body>
<!--  header 栏目  开始  -->
@include('home.public.header_cates')
<!--  header 栏目  结束  -->

<article> 
  <!--轮播 开始-->
 <div class="picsbox"> 
  <div class="banner">
    <div id="banner" class="fader">
      @foreach($banners_data as $k=>$v)
      <li class="slide" ><a href="/" target="_blank"><img src="/uploads/{{ $v->url }}"><span class="imginfo">{{ $v->title }}</span></a></li>
      @endforeach
      <div class="fader_controls">
        <div class="page prev" data-target="prev">&lsaquo;</div>
        <div class="page next" data-target="next">&rsaquo;</div>
        <ul class="pager_list">
        </ul>
      </div>
    </div>
  </div>
  <!-- 轮播 结束-->
  <div class="toppic">
    <li> <a href="/" target="_blank"> <i><img src="/homes/images/toppic01.jpg"></i>
      <h2>别让这些闹心的fadsfsafd套路，毁了你的网页设计!</h2>
      <span>学无止境</span> </a> </li>
    <li> <a href="/" target="_blank"> <i><img src="/homes/images/zd01.jpg"></i>
      <h2>个人博客，属于我的小世界！</h2>
      <span>学无止境</span> </a> </li>
  </div>
  </div>
  <div class="blank"></div>
  <!--blogsbox begin-->
  <div class="blogsbox">
    <!-- 遍历 文章 开始 -->
    @foreach($articles_data as $k=>$v)
    <div class="blogs" data-scroll-reveal="enter bottom over 1s" >
      <h3 class="blogtitle"><a href="/home/detail/index?id={{ $v->id }}&tagname_id={{ $v->tid }}" target="_blank">{{ $v->title }}</a></h3>
      <span class="blogpic"><a href="/home/detail/index?id={{ $v->id }}&tagname_id={{ $v->tid }}" title=""><img src="/uploads/{{ $v->thumb }}" alt=""></a></span>
      <p class="blogtext">{{ $v->desc }}</p>
      <div class="bloginfo">
        <ul>
          <li class="author"><a href="/">{{ $v->auth }}</a></li>
          <li class="lmname"><a href="/">{{ $cates_cname_data[$v->cid] }}</a></li>
          <li class="timer">{{ $v->ctime }}</li>
          <li class="view"><span>{{ $v->num }}</span>已阅读</li>
          <li class="like">{{ $v->goodnum }}</li>
        </ul>
      </div>
    </div>
    @endforeach
    <!-- 遍历 文章 结束 -->

  </div>
  <!--blogsbox end-->
  @include('home.public.slidebar')
</article>
<footer>
  <p>Design by <a href="http://www.yangqq.com" target="_blank">杨青个人博客</a> <a href="/">蜀ICP备11002373号-1</a></p>
</footer>
<a href="#" class="cd-top">Top</a>
</body>
</html>
