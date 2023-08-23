<!DOCTYPE html>
<html>
	<head>
		<title>博客系统管理面板</title>
		<script src="__PUBLIC__/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="__PUBLIC__/bootstrap/css/bootstrap.css" />
		<script src="__PUBLIC__/bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<?php include(THEME_PATH . "nav.php"); ?>
		<div class="container">
			<div class="page-header">
			  <h1>博客管理员管理面板
				  <small class="pull-right">
					  <a href="<?php echo U("/Admin/Auser/index");?>" class="btn btn-success">返回</a>
				  </small>
			  </h1>
			</div>
			<div class="container">
				<form action="<?php echo U('/Admin/Auser/save');?>?aid=<?php echo $user['aid']; ?>" method="post">
				  <div class="form-group">
					<label for="exampleInputEmail1">账号</label>
					<input type="text" name='admin' class="form-control" placeholder="此处输入用户名" value="<?php echo $user['admin']; ?>">
				  </div>
				  <div class="form-group">
					<label for="exampleInputPassword1">密码</label>
					<input type="password" name='adminpw'  class="form-control" placeholder="此处输入密码" value="<?php echo $user['adminpw']; ?>">
				  </div>
				  <div align=right>
				  <button type="submit" class="btn btn-success">提交表单</button>
				  </div>
				</form>
			</div>
		</div>
	</body>
</html>