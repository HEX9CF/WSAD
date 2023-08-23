<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title>博客系统管理面板</title>
		<script src="/Public/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="/Public/bootstrap/css/bootstrap.css" />
		<script src="/Public/bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel panel-info" style="margin-top:200px;">
				  <div class="panel-heading">登录博客系统管理面板</div>
				  <div class="panel-body">
					<form action="<?php echo U('Admin/Index/login?act=chk');?>" method="post">
					  <div class="form-group">
						<label for="exampleInputEmail1">账号</label>
						<input type="text" name='admin' class="form-control" placeholder="此处输入用户名">
					  </div>
					  <div class="form-group">
						<label for="exampleInputPassword1">密码</label>
						<input type="password" name='adminpw'  class="form-control" placeholder="此处输入密码">
					  </div>
					  <div align=right>
					  <button type="submit" class="btn btn-success">提交表单</button>
					  </div>
					</form>
				  </div>
				  <div class="panel-footer text-right">版权所有 盗版必究</div>
				</div>
			</div>
		</div>
	</body>
</html>