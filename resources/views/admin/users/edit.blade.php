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

				<!-- 显示 错误 -->
				@if (count($errors) > 0)
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif

				<div class="forms">
					<h3 class="title1">用户管理</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>用户修改 :</h4>
						</div>
						<div class="form-body">
						  <form action="/admin/user/update/{{ $data->id }}" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
						    <div class="form-group">
						      <label for="uname">用户名</label>
						      <input type="text" class="form-control" value="{{ $data->uname }}" name="uname" id="uname" placeholder="用户名">
						  	</div>
						   <div class="form-group">
						      <label for="email">邮箱</label>
						      <input type="text" class="form-control" value="{{ $data->email }}" name="email" id="email" placeholder="邮箱">
						  	</div>
							<img src="/uploads/{{ $data->profile }}" class="img-thumbnail" style="width:80px;">
						   <div class="form-group">
						      <label for="exampleInputFile">头像</label>
						      <input type="file" name="profile" id="exampleInputFile">
						     <input type="hidden" name="profile_path" value="{{ $data->profile }}">
						   </div>

						   <button type="submit" class="btn btn-default">Submit</button>
						</form>
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