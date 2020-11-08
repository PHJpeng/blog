<!DOCTYPE HTML>
<html>
<head>
 @include('admin.public.header')
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
				
				<h3 class="title1">轮播图管理</h3>
				<!-- 搜索 开始 -->
				<div class="form-body" data-example-id="simple-form-inline">
				  <form class="form-inline" action="/admin/user/index">
				    <div class="form-group">
				      <label for="exampleInputName2">关键字</label>
				      <input type="text" class="form-control" name="search" value="" id="exampleInputName2" placeholder="轮播图名"></div>
				    <button type="submit" class="btn btn-success">搜索</button>
				</form>
				</div>
				<!-- 搜索 结束 -->
				<div class="panel-body widget-shadow">
						<h4>轮播图列表:</h4>
						<table class="table">
							<thead>
								<tr>
								  <th>ID</th>
								  <th>轮播图标题</th>
								  <th>图片</th>
								  <th>状态</th>
								  <th>操作</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $k=>$v)
								<tr>
									<th>{{ $v->id }}</th>
									<td>
										<p style="width: 200px;">{{ $v->title }}</p>
										
									</td>

									<td>
										<img title="{{ $v->desc }}" src="/uploads/{{ $v->url }}" style="width: 150px;">	
									</td>
									<td>	
										@if($v->status == 0)
										<kbd>未激活</kbd>
										@else 
										<kbd style="background: #52A052">激活</kbd>
										@endif
										
									</td>
									<td>
										<a href="javascript:;" class="btn btn-info">删除</a>
										<a href="javascript:;" class="btn btn-danger">修改</a>
										@if($v->status == 0)
										<a href="javascript:;" class="btn btn-success" onclick="changeStatus({{ $v->id }},0)">激活</a>
										@else
										<a href="javascript:;" class="btn btn-primary" onclick="changeStatus({{ $v->id }},1)">停止</a>
										@endif
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<script type="text/javascript">
							function changeStatus(id,sta)
							{
								if(sta == 1){
									// 赋值
									$('#myModal form input[type=radio]').eq(1).attr('checked',true);
								}else{
									$('#myModal form input[type=radio]').eq(0).attr('checked',true);
								}

								// 赋值
								$('#myModal form input[type=hidden]').eq(0).val(id);

								$('#myModal').modal('show')
							}
					
						</script>

					<!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">轮播图状态</h4>
					      </div>
					      <div class="modal-body">
					       	<form action="/admin/banners/changeStatus" method="get">
								<input type="hidden" name="id" value="">
								<div class="form-group">
								 <br>
									未开启:<input type="radio" name="status" value="0">
									&nbsp;&nbsp;&nbsp;&nbsp;
									开启：<input type="radio" name="status" value="1">
							  	</div>
								
							  	<input type="submit" class="btn btn-success">
					       	</form>
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