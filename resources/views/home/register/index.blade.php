<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="https://cdn.bootcss.com/twitter-bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdn.bootcss.com/twitter-bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">

	  <link rel="stylesheet" href="/layui-v2.4.5/layui/css/layui.css">
	  <script src="/layui-v2.4.5/layui/layui.js"></script>

	  <script>
	//一般直接写在一个js文件中
	layui.use(['layer', 'form'], function(){
	  var layer = layui.layer;
	});
</script>
</head>
<body>
	<div class="container">

		<form action="/home/register/store" method="post">
		  <div class="form-group">
		    <label for="exampleInputEmail1">用户名</label>
		    <input type="text" name="uname" class="form-control" id="exampleInputEmail1" placeholder="Email">
		  </div>
		  <div class="form-group">
		    <label for="pass">密码</label>
		    <input type="password" name="pass" class="form-control" id="pass" placeholder="密码">
		  </div>
		 <div class="form-group">
		    <label for="repass">确认密码</label>
		    <input type="password" name="repass" class="form-control" id="repass" placeholder="确认密码">
		  </div>
		 <div class="form-group">
		    <label for="code">验证码</label>
		    <br>
		    <input  type="text" class="form-control" name="code" id="code" placeholder="验证码" style="width: 40%;display: inline;">
			<img src="{{captcha_src()}}" style="border-radius: 5px;" onclick="this.src='{{captcha_src()}}'+Math.random()">
		  </div>
		 				
		  <button type="submit" class="btn btn-success form-control">注册</button>
		</form>
	</div>
	<script type="text/javascript">
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});


		$('form:first').submit(function(){

			// 数据验证
			// var preg_uname = ''
			let uname= $('form input[name=uname]').val();
			let pass = $('form input[name=pass]').val();
			let repass = $('form input[name=repass]').val();
			// 获取 输入
			let code = $('form input[name=code]').val();

			if(pass != repass){
				layer.msg('俩次密码不一致')
				return false;	
			}

			// 发送ajax
			$.post('/home/register/store',{uname,pass,code},function(res){
				if(res.msg == 'ok'){
					layer.msg('注册成功');


					setTimeout(function(){
						// 关闭当前打开的窗口
						window.parent.location.reload();
						var index = parent.layer.getFrameIndex(window.name);
						let res = parent.layer.close(index);

						// 跳转
						window.location.href = '/home/login/login';
						return false;
					},800);	
				}else{
					alert(res.info);
				}

			},'json');

			return false;
		})
		
	</script>
</body>
</html>