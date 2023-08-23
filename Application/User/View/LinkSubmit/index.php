<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $set['title'];?>&nbsp;-&nbsp;申请友情链接</title>
		<script src="__PUBLIC__/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="__PUBLIC__/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="__PUBLIC__/simditor/styles/simditor.css" />
		<script src="__PUBLIC__/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="__PUBLIC__/simditor/scripts/module.js"></script>
		<script type="text/javascript" src="__PUBLIC__/simditor/scripts/hotkeys.js"></script>
		<script type="text/javascript" src="__PUBLIC__/simditor/scripts/uploader.js"></script>
		<script type="text/javascript" src="__PUBLIC__/simditor/scripts/simditor.js"></script>
	</head>
	<body>
		<div class="container">
			<?php include("./Application/Home/View/nav.php"); ?>
			<div class="page-header">
			  <h1><?php echo $set['title'];?>&nbsp;-&nbsp;申请友情链接
				  <small class="pull-right">
					  <a href="<?php echo U("/Home/Index/index");?>" class="btn btn-success">返回</a>
				  </small>
			  </h1>
			</div>
			<div class="container">
				<form action="<?php echo U('/User/Linksubmit/save');?>" method="post">

				<div class="form-group">

				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">网站名称</label>
					<div class="col-sm-10">
					  <input type="text" name='name' class="form-control" placeholder="此处输入网站名称" value="<?php echo $valname; ?>">
					</div>
				  </div>
				  </br>
				  </br>

				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">网站图标地址</label>
					<div class="col-sm-10">
					  <input type="text" name='img' class="form-control" placeholder="此处输入网站图片地址" value="<?php echo $valimg; ?>">
					</div>
				  </div>
				  </br>
				  </br>

				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">网站首页网址</label>
					<div class="col-sm-10">
					  <input type="text" name='url' class="form-control" placeholder="网站首页网址" value="<?php echo $valurl; ?>">
					</div>
				  </div>
				  </br>
				  </br>

				<p>
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">验证码</label>
					<div class="col-sm-10">
					  <div class="input-group">
					  <input type="text" name='code'  class="form-control" height="50" placeholder="此处输入验证码">
					  <span class="input-group-addon" id="basic-addon2"><a href="<?php echo U('User/Submit/submit'); ?>"><img width="200" height="50" alt="验证码" src="{:U('/User/Submit/verify',array())}"></a></span>
					  </div>
					</div>
				  </div>
				</p>

				  <div align=right>
				  <button type="submit" class="btn btn-success">提交表单</button>
				  </div>
				</form>
			</div>
			<?php include("Public/footer/footer.php"); ?>
		</div>
	</body>
</html>