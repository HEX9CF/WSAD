<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title>博客系统管理面板</title>
		<script src="/Public/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="/Public/bootstrap/css/bootstrap.css" />
		<script src="/Public/bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<?php include(THEME_PATH . "nav.php"); ?>
		<div class="container">
			<div class="page-header">
			  <h1>博客管理员管理面板
				  <small class="pull-right">
					  <a href="<?php echo U("/Admin/Auser/add");?>" class="btn btn-success">添加</a>
				  </small>
			  </h1>
			</div>
			<div class="container">
				<form action="<?php echo U('/Admin/Auser/add/save');?>" method="post">
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
		</div>
	</body>
</html>