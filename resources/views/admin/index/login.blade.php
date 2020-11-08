
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>dj-a</title>
		<style type="text/css">
			.msg-err{
				background: #A34343;
				display: flex;
				justify-content: center;
				height: 40px;
				align-items: center;
				font-size: 14px;
				color:#333;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="/admins/login/css/detailsmusic.css" />
	</head>

	<body>
		<div class="music-lgin">
			<div class="music-lgin-all">
				<!--左手-->
				<div class="music-lgin-left ovhd">
					<div class="music-hand">
						<div class="music-lgin-hara"></div>
						<div class="music-lgin-hars"></div>
					</div>
				</div>

				<!--脑袋-->
				<div class="music-lgin-dh">
					<div class="music-lgin-alls">
						<div class="music-lgin-eyeleft">
							<div class="music-left-eyeball yeball-l"></div>
						</div>
						<div class="music-lgin-eyeright">
							<div class="music-right-eyeball yeball-r"></div>
						</div>
						<div class="music-lgin-cl"></div>
					</div>
					<!--鼻子-->
					<div class="music-nose"></div>
					<!--嘴-->
					<div class="music-mouth music-mouth-ds"></div>
					<!--肩-->
					<div class="music-shoulder-l">
						<div class="music-shoulder"></div>
					</div>
					<div class="music-shoulder-r">
						<div class="music-shoulder"></div>
					</div>
					<!--消息框-->
					<div class="music-news">来了,老弟！</div>
				</div>

				<!--右手-->
				<div class="music-lgin-right ovhd">
					<div class="music-hand">
						<div class="music-lgin-hara"></div>
						<div class="music-lgin-hars"></div>
					</div>
				</div>

			</div>
			@if(session('error'))
			<div class="msg-err">{{ session('error') }}</div>
			@endif
			<form action="/admin/dologin" method="post" >
				{{ csrf_field() }}
				<!--1-->
				<div class="music-lgin-text">
					<input class="inputname inputs" name="uname" type="text" placeholder="用户名" value="admin"/>
				</div>
				<!--2-->
				<div class="music-lgin-text">
					<input type="password" name="pass" class="mima inputs" placeholder="密码" />
				</div>
				<!--3-->
				<div class="music-lgin-text">
					<input class="music-qd inputs" type="submit" value="确定" />
				</div>
			</form>
		</div>

		<script src="/admins/login/js/jquery-1.9.1.min.js"></script>
	</body>

</html>