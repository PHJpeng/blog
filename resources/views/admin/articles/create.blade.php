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
					<h3 class="title1">文章管理</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>文章添加 :</h4>
						</div>
						<div class="form-body">
						  <form action="/admin/articles/store" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
						    <div class="form-group">
						      <label for="title">标题</label>
						      <input type="text" class="form-control" value="{{ old('title') }}" name="title" id="title" placeholder="标题">
						  	</div>
							<div class="form-group">
						      <label for="auth">作者</label>
						      <input type="text" class="form-control" value="{{ old('auth') }}" name="auth" id="auth" placeholder="作者">
						  	</div>


						  	<div class="form-group">
						      <label for="desc">描述</label>
						  	  <textarea class="form-control" name="desc" id="desc"></textarea>
						  	</div>

							
							<div class="form-group">
						      <label for="tid">标签云</label>
						  	  <select class="form-control" name="tid" id="tid">
						  	  		@foreach($tagnames_data as $k=>$v)
									<option value="{{ $v->id }}">--{{ $v->tagname }}--</option>
						  	  		@endforeach
						  	  </select>
						  	</div>
				
						 	<div class="form-group">
						      <label for="cid">所属栏目</label>
						       <select class="form-control" name="cid" id="cid">
						       		@foreach($cates_data as $k=>$v)
									<option value="{{ $v->id }}" {{ $v->pid == 0 ? 'disabled' : ''}}>{{ $v->cname }}</option>
									@endforeach
						  	  </select>
						  	</div>
								

							<div class="form-group">
						      <label for="thumb">文章缩略图</label>
						      <input type="file" name="thumb"  id="thumb" class="form-control">
						  	</div>
							

							<div class="form-group">
						      <label for="content">文章内容</label>
						       <!-- <textarea class="form-control" name="content" id="content"></textarea> -->
						  		<!-- 加载编辑器的容器 -->
							    <script style="min-height: 200px;" id="content" name="content" type="text/plain"></script>
						  	</div>
							
						   <button type="submit" class="btn btn-default">Submit</button>
						</form>
						</div>
					</div>
					<!-- 配置文件 -->
				    <script type="text/javascript" src="/utf8-php/ueditor.config.js"></script>
				    <!-- 编辑器源码文件 -->
				    <script type="text/javascript" src="/utf8-php/ueditor.all.js"></script>
					 <!-- 实例化编辑器 -->
				    <script type="text/javascript">
				        var ue = UE.getEditor('content',{toolbars: [
											    ['fullscreen', 'simpleupload','emotion','source', 'undo', 'redo', 'bold']
											]});
				    </script>	
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