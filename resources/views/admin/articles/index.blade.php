<!DOCTYPE HTML>
<html>
<head>
 @include('admin.public.header')

 <style type="text/css">
	.hides{
	  	overflow:hidden;
		text-overflow:ellipsis;
		white-space:nowrap
	}
</style>
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		
		<!--  侧边栏 开始-->
		@include('admin.public.sidebar')
		<!-- 侧边栏 结束-->

		<!--  头部 开始-->
		@include('admin.public.header_userinfo')
		<!-- 头部 结束 -->
		
		<!-- 内容 开始 -->
		<div id="page-wrapper">
			<div class="main-page">
				<!-- 导入 提示消息 开始 -->
				@include('admin.public.message')
				<!-- 导入 提示消息 结束 -->
				
				<h3 class="title1">文章管理</h3>
				<!-- 搜索 开始 -->
				<div class="form-body" data-example-id="simple-form-inline">
				  <form class="form-inline" action="/admin/user/index">
				    <div class="form-group">
				      <label for="exampleInputName2">关键字</label>
				      <input type="text" class="form-control" name="search" value="" id="exampleInputName2" placeholder="文章名"></div>
				    <button type="submit" class="btn btn-success">搜索</button>
				</form>
				</div>
				<!-- 搜索 结束 -->
				<div class="panel-body widget-shadow">
						<h4>文章列表:</h4>
						<table class="table">
							<thead>
								<tr>
								  <th>ID</th>
								  <th>文章标题</th>
								  <th>作者</th>
								  <th>描述</th>
								  <th>创建时间</th>
								  <th>缩略图</th>
								  <th>浏览量</th>
								  <th>点赞量</th>
								  <th>操作</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $k=>$v)
									<tr>
										<th>{{ $v->id }}</th>
										<td>
											<p title="{{ $v->title }}" style="width: 200px;" class="hides">{{ $v->title }}</p>
										</td>
										<td>
											<p style="width:50px;" class="hides" title="{{ $v->auth }}">{{ $v->auth }}</p>
										</td>
										<td>
											
											<p title="{{  $v->desc }}" style="width: 150px;" class="hides">{{ $v->desc }}</p>
										</td>
										<td>{{ $v->ctime }}</td>
										<td>
											<img  style="width: 80px;" src="/uploads/{{ $v->thumb }}">
										</td>
										<td>{{ $v->num }}</td>
										<td>{{ $v->goodnum }}</td>
										
										<td>
											<a href="javascript:;" class="btn btn-default">删除</a>
											<a href="javascript:;" class="btn btn-default">修改</a>
											<a href="javascript:;" class="btn btn-info" onclick="shows(this)">查看文章内容</a>
										</td>
										<td class="template" style="display: none;">
											<span>{{ $v->title }}</span>
											<div>{!! $v->content !!}</div>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<script type="text/javascript">
							function shows(obj){
								// 获取标题
								let title = $(obj).parent().next().find('span').first().html();
								let content = $(obj).parent().next().find('div').first().html();


								// 赋值
								$('#myModal .modal-title').html(title);
								$('#myModal .modal-body').html(content);

								// 显示模态框
								$('#myModal').modal('show')
							}
					
						</script>					
					<!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">文章状态</h4>
					      </div>
					      <div class="modal-body">
					       	
					      </div>
					     
					    </div>
					  </div>
					</div>	


					</div>	
					

			</div>

		
			<div class="main-page" style="display: none;">
				<div class="row calender widget-shadow">
					<h4 class="title">Calender</h4>
					<div class="cal1">
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!-- 内容结束 -->

		<!-- 页脚 开始 -->
		@include('admin.public.footer')
        <!-- 页脚 结束 -->
        
	</div>
	<!-- 页脚 静态资源 开始 -->
	@include('admin.public.footer_static')
	<!-- 页脚 静态资源 结束 -->
</body>
</html>