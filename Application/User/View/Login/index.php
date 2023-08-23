<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $set['title'];?>&nbsp;-&nbsp;用户登录</title>
		<script src="__PUBLIC__/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="__PUBLIC__/bootstrap/css/bootstrap.css" />
		<script src="__PUBLIC__/bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<div class="container">
			<?php include("./Application/Home/View/nav.php"); ?>
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel panel-info" style="margin-top:200px;">
				<ul class="nav nav-tabs">
					  <li role="presentation"><a href="<?php echo U("/User/Register/index"); ?>">注册</a></li>
					  <li role="presentation" class="active"><a href="<?php echo U("/User/Login/index"); ?>">登录</a></li>
					  <!--<li role="presentation"><a href="<?php echo U("/User/Login/forgotpw");?>">找回密码</a></li>-->
				</ul>
				  <div class="panel-body">
					<form action="<?php echo U('/User/Login/index?act=chk');?>" method="post">
					  <div class="form-group">
						<label for="exampleInputEmail1">账号</label>
						<input type="text" name='username' class="form-control" placeholder="此处输入用户名" value="<?php echo $valuser ?>">
					  </div>
					  <div class="form-group">
						<label for="exampleInputPassword1">密码</label>
						<input type="password" name='userpw'  class="form-control" placeholder="此处输入密码" value="<?php echo $valpw ?>">
					  </div>
					  <div class="form-group">
						<label for="exampleInputEmail1">验证码</label>
						<div class="input-group">
						  <input type="text" name='code'  class="form-control" height="50" placeholder="此处输入验证码">
						  <div class="input-group-addon"><a href="<?php echo U('/User/Login/index') ?>"><img width="200" height="50" alt="验证码" src="{:U('User/Login/verify',array())}"></a></div>
						</div>
					  </div>
					  <div class="checkbox" align=right>
						<label>
						  <input type="checkbox" name='rem' disabled> 记住我
						</label>
					  </div>
					  <div style="float:left;">
					  <ul class="nav nav-pills">
						<li role="presentation"><a href="<?php echo U('/User/Register/index');?>">没有账号？立即注册！</a></li>
					  </ul>
					  </div>
					  <div style="float:right;">
					  	<a href="<?php echo U("/Home/Index/index");?>" class="btn btn-danger">返回首页</a>
						<a href="<?php echo U("/User/Login/forgotpw");?>" class="btn btn-warning disabled">忘记密码？</a>
						<button type="submit" class="btn btn-success">提交表单</button>
					  </div>
					</form>
				  </div>
				  <div class="panel-footer text-right"><?php echo $set['title'];?></div>
				</div>
			</div>
		</div>
	</body>
</html>