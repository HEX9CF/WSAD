<!DOCTYPE HTML><head>
<title>修改密码</title>
<script src="__PUBLIC__/js/jquery-3.1.1.min.js"></script>
<link rel="stylesheet" href="__PUBLIC__/bootstrap/css/bootstrap.css" />
<script src="__PUBLIC__/bootstrap/js/bootstrap.js"></script>
<meta name="title" content="修改密码" />
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
					<div align=middle><h1>修改密码</h1><h5>请输入你的旧密码与新密码<br>并在最后一个框中再输入一遍新密码</h5></div>
				<form action="<?php echo U('/Mobile/Changepw/index?act=chk');?>" method="post">
					用户名：<button type="button" class="login-username" disabled><div align=left><?php echo session('username'); ?></div></button>
					旧密码<input type="password" name='oldpw'  class="login-password" placeholder="此处输入旧密码" value="<?php echo $valoldpw ?>">
					新密码<input type="password" name='newpw'  class="login-password" placeholder="此处输入新密码" value="<?php echo $valnewpw ?>">
					再输入一次新密码<input type="password" name='new2pw'  class="login-password" placeholder="此处再输入一次新密码" value="<?php echo $valnew2pw ?>">
					<br><div align=middle><a href="<?php echo U('/Mobile/Login/index');?>"><img width="100%" height="20%" alt="验证码" src="{:U('/Mobile/Login/verify',array())}"></a></div><br>
					验证码<input type="text" name='code' class="login-username" placeholder="此处输入验证码">
					<br>
						<div style="float:left;"><a href="/"><button class="button button-red">返回首页</button></a></div>
						<div style="float:right;"><button type="submit" class="button button-green">提交表单</button></div>
					<div class="clear"></div>
				</form>       
			</div>
    </div>
</div>
<?php include("Public/foot/foot.php"); ?></p>
</body>
