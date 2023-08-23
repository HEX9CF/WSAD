<!DOCTYPE html>
<html>
	<head>
		<title>普通用户管理面板</title>
		<script src="__PUBLIC__/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="__PUBLIC__/bootstrap/css/bootstrap.css" />
		<script src="__PUBLIC__/bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<?php include(THEME_PATH . "nav.php"); ?>
		<div class="container">
			<div class="page-header">
			  <h1>普通用户管理面板
				  <small class="pull-right">
					  <a href="<?php echo U("/Admin/User/index");?>" class="btn btn-success">返回</a>
				  </small>
			  </h1>
			</div>
			<div class="container">
				<form action="<?php echo U('/Admin/User/save');?>?uid=<?php echo $user['uid']; ?>" method="post">
				  <div class="form-group">
					<label for="exampleInputEmail1">账号</label>
					<input type="text" name='username' class="form-control" placeholder="此处输入用户名" value="<?php echo $user['username']; ?>">
				  </div>
				  <div class="form-group">
					<label for="exampleInputPassword1">密码</label>
					<input type="password" name='userpw'  class="form-control" placeholder="此处输入密码" value="<?php echo $user['userpw']; ?>">
				  </div>
				  <div class="form-group">
					<label for="exampleInputPassword1">电子邮箱</label>
					<input type="email" name='email'  class="form-control" placeholder="此处输入电子邮箱" value="<?php echo $user['email']; ?>">
				  </div>
				  <div align=right>
				  <button type="submit" class="btn btn-success">提交表单</button>
				  </div>
				</form>
			</div>
		</div>
	</body>
</html>