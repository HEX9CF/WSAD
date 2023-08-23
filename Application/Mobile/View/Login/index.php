<!DOCTYPE HTML><head>
<title><?php echo $set['title'];?>用户登录</title>
<script src="__PUBLIC__/js/jquery-3.1.1.min.js"></script>
<link rel="stylesheet" href="__PUBLIC__/bootstrap/css/bootstrap.css" />
<script src="__PUBLIC__/bootstrap/js/bootstrap.js"></script>
<meta name="title" content="<?php echo $set['title'];?>用户登录" />
<meta name="keywords" content="<?php echo $set['keywords'];?>" />
<meta name="description" content="<?php echo $set['intro'];?>..." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0 minimal-ui"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link href="__PUBLIC__/mobile/css/style.css"     		 rel="stylesheet" type="text/css">
<link href="__PUBLIC__/mobile/css/framework.css" 		 rel="stylesheet" type="text/css">
<link href="__PUBLIC__/mobile/css/owl.theme.css" 		 rel="stylesheet" type="text/css">
<link href="__PUBLIC__/mobile/css/swipebox.css"		 rel="stylesheet" type="text/css">
<link href="__PUBLIC__/mobile/css/font-awesome.css"	 rel="stylesheet" type="text/css">
<link href="__PUBLIC__/mobile/css/animate.css"			 rel="stylesheet" type="text/css">
<script type="text/javascript" src="__PUBLIC__/mobile/js/jqueryui.js"></script>
<script type="text/javascript" src="__PUBLIC__/mobile/js/framework.plugins.js"></script>
<script type="text/javascript" src="__PUBLIC__/mobile/js/custom.js"></script>
</head>
<body> 
<div class="all-elements">
    <div class="snap-drawers">
		<?php include(THEME_PATH . "nav.php"); ?>
    <!-- Page Content-->
    <div id="content" class="snap-content">
	 <div class="content">
	 <br><br><br>
				<div align=middle><h1><?php echo $set['title'];?>用户登录</h1><h5>请输入你的用户名与密码</h5></div>
				<form action="<?php echo U('/Mobile/Login/index?act=chk');?>" method="post">
					<input type="text" name='username'  class="login-username" placeholder="此处输入用户名" value="<?php echo $valuser?>">
					<input type="password" name='userpw'  class="login-password" placeholder="此处输入密码" value="<?php echo $valpw?>">
					<br><div align=middle><a href="<?php echo U('/Mobile/Login/index');?>"><img width="100%" height="20%" alt="验证码" src="{:U('/Mobile/Login/verify',array())}"></a></div><br>
					<input type="text" name='code' class="login-username" placeholder="此处输入验证码">
					<br>
					<div style="float:left;">
						<button class="button button-red">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;返回首页&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
					</div>
					<div style="float:right;">
						<button type="submit" class="button button-green">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;提交登录&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
					</div>
					<div class="clear"></div><br>
					<div style="float:left;">
						<a href="<?php echo U('/Mobile/Register/index');?>" class="button button-blue">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;注册账号&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
					</div>
					<div style="float:right;">
						<a href="<?php echo U('/Mobile/Login/forgotpw');?>" class="button button-yellow disabled">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;忘记密码&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
					</div>
					<div class="clear"></div>
				</form>
				</div>
     </div>
	</div>
<?php include("Public/foot/foot.php"); ?></p>
</body>
