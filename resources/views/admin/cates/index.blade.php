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
				
				<h3 class="title1">栏目管理</h3>
				<!-- 搜索 开始 -->
				<div class="form-body" data-example-id="simple-form-inline">
				  <form class="form-inline" action="/admin/user/index">
				    <div class="form-group">
				      <label for="exampleInputName2">关键字</label>
				      <input type="text" class="form-control" name="search" value="" id="exampleInputName2" placeholder="栏目名"></div>
				    <button type="submit" class="btn btn-success">搜索</button>
				</form>
				</div>
				<!-- 搜索 结束 -->
				<div class="panel-body widget-shadow">
						<h4>栏目列表:</h4>
						<table class="table">
							<thead>
								<tr>
								  <th>ID</th>
								  <th>栏目名称</th>
								  <th>父级ID</th>
								  <th>栏目路径</th>
								  <th>操作</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $k=>$v)
								<tr>
								  <th>{{ $v->id }}</th>
								  <td>
								  	@if($v->pid == 0)
								  	<span style="font-weight: bold;">{{ $v->cname }}</span>
									@else
								  	<span>{{ $v->cname }}</span>
									@endif
								  	
								  </td>
								  <td>{{ $v->pid }}</td>
								  <td>{{ $v->path }}</td>
								  <th>
									<a href="javascript:;" class="btn btn-danger">删除</a>
									<a href="javascript:;" class="btn btn-danger">修改</a>
								  	@if($v->pid == 0)
									<a href="/admin/cates/create?id={{ $v->id }}" class="btn btn-info">添加子栏目</a>
								  	@endif
								  </th>
								</tr>
								@endforeach
							</tbody>
						</table>
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