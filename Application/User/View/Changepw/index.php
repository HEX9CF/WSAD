<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $set['title'];?>&nbsp;-&nbsp;修改密码</title>
		<script src="__PUBLIC__/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="__PUBLIC__/bootstrap/css/bootstrap.css" />
		<script src="__PUBLIC__/bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<div class="container">
			<?php include("./Application/Home/View/nav.php"); ?>
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel panel-danger" style="margin-top:50px;">
				  <div class="panel-heading"><?php echo $set['title'];?>&nbsp;-&nbsp;修改密码</div>
				  <div class="panel-body">
					<form action="<?php echo U('/User/Changepw/index?act=chk');?>" method="post">
					  <div class="form-group">
						<p><label for="exampleInputEmail1">账号</label></p>
						<p><button type="button" class="form-control" disabled><div align=left><?php echo session('username'); ?></div></button></p>
					  </div>
					  <div class="form-group">
						<label for="exampleInputPassword1">旧密码</label>
						<input type="password" name='oldpw'  class="form-control" placeholder="此处输入旧密码" value="<?php echo $valoldpw ?>">
					  </div>
					  <div class="form-group">
						<label for="exampleInputPassword1">新密码</label>
						<input type="password" name='newpw'  class="form-control" placeholder="此处输入新密码" value="<?php echo $valnewpw ?>">
					  </div>
					  <div class="form-group">
						<label for="exampleInputPassword1">再输入一次新密码</label>
						<input type="password" name='new2pw'  class="form-control" placeholder="此处再输入一次新密码" value="<?php echo $valnew2pw ?>">
					  </div>
					  <div class="form-group">
						<label for="exampleInputEmail1">验证码</label>
						<div class="input-group">
						  <input type="text" name='code'  class="form-control" height="50" placeholder="此处输入验证码">
						  <div class="input-group-addon"><a href="<?php echo U('/User/Changepw/index');?>"><img width="200" height="50" alt="验证码" src="{:U('User/Login/verify',array())}"><a></div>
						</div>
					  </div>
					  <div style="float:right;">
						<a href="<?php echo U("/Home/Index/index");?>" class="btn btn-danger">返回首页</a>
						<a href="<?php echo U("/User/Login/index");?>" class="btn btn-warning">切换账号</a>
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