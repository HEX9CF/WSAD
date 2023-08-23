<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $set['title'];?>&nbsp;-&nbsp;网站后台</title>
		<script src="__PUBLIC__/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="__PUBLIC__/bootstrap/css/bootstrap.css" />
		<script src="__PUBLIC__/bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel panel-info" style="margin-top:200px;">
				  <div class="panel-heading"><?php echo $set['title'];?>&nbsp;-&nbsp;网站后台</div>
				  <div class="panel-body">
					<form action="<?php echo U('/Admin/Login/index?act=chk');?>" method="post">
					  <div class="form-group">
						<label for="exampleInputEmail1">账号</label>
						<input type="text" name='admin' class="form-control" placeholder="此处输入用户名" value="<?php echo $valuser ?>">
					  </div>
					  <div class="form-group">
						<label for="exampleInputPassword1">密码</label>
						<input type="password" name='adminpw'  class="form-control" placeholder="此处输入密码" value="<?php echo $valpw ?>">
					  </div>
					  <div class="form-group">
						<label for="exampleInputEmail1">验证码</label>
						  <input type="text" name='code'  class="form-control" placeholder="此处输入验证码"><br>
						<a href="<?php echo U('/Admin/Login/index') ?>"><img width="100%" height="100" alt="验证码" src="{:U('/Admin/Login/verify',array())}"></a>
					  </div>
					  <div align=right>
					  <a href="<?php echo U("/Home/Index/index");?>" class="btn btn-danger">返回首页</a>
					  <button type="submit" class="btn btn-success">提交表单</button>
					  </div>
					</form>
				  </div>
				  <div class="panel-footer text-right"><?php echo $set['title'];?>&nbsp;-&nbsp;网站后台</div>
				</div>
			</div>
		</div>
	</body>
</html>