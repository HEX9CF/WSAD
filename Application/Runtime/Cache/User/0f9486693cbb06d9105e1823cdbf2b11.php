<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title><?php echo $set['title'];?>&nbsp;-&nbsp;投稿</title>
		<script src="/Public/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="/Public/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="/Public/simditor/styles/simditor.css" />
		<script src="/Public/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="/Public/simditor/scripts/module.js"></script>
		<script type="text/javascript" src="/Public/simditor/scripts/hotkeys.js"></script>
		<script type="text/javascript" src="/Public/simditor/scripts/uploader.js"></script>
		<script type="text/javascript" src="/Public/simditor/scripts/simditor.js"></script>
	</head>
	<body>
		<div class="container">
			<?php include("./Application/Home/View/nav.php"); ?>
			<div class="page-header">
			  <h1><?php echo $set['title'];?>&nbsp;-&nbsp;投稿
				  <small class="pull-right">
					  <a href="<?php echo U("/User/Submit/index");?>" class="btn btn-success">返回</a>
				  </small>
			  </h1>
			</div>
			<div class="container">
			<?php if($set['submitintro']){ ?>
			<div class="alert alert-warning" role="alert">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  <span class="sr-only">警告:</span>
			  <?php echo $set['submitintro']; ?>
			</div>
			<?php } ?>
				<form action="<?php echo U('/User/Submit/save');?>" method="post">

				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">分类</label>
					<div class="col-sm-10">
					  <select name="class" id="Select" class="form-control" value="<?php echo $valclass ?>">
						<?php foreach( $classes as $class ): ?>
								<option><?php echo $class['name']; ?></option>
						<?php endforeach; ?>
					  </select>
					</div>
				  </div>
				  </br>
				  </br>

				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">标题</label>
					<div class="col-sm-10">
					  <input type="text" name='title' class="form-control" placeholder="此处输入标题" value="<?php echo $valtitle ?>">
					</div>
				  </div>
				  </br>
				  </br>

				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">作者</label>
					<div class="col-sm-10">
						<ul class="list-group">
						  <button type="button" class="list-group-item"><?php echo session('username'); ?></button>
						</ul>
					</div>
				  </div>
				  </br>
				  </br>

				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">封面图片路径</label>
					<div class="col-sm-10">
					  <input type="text" name='img' class="form-control" placeholder="此处输入封面图片路径" value="<?php echo $valimg ?>">
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
					  <span class="input-group-addon" id="basic-addon2"><a href="<?php echo U('User/Submit/submit') ?>"><img width="200" height="50" alt="验证码" src="<?php echo U('/User/Submit/verify',array());?>"></a></span>
					  </div>
					</div>
				  </div>
				</p>


				<p>
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label" name="content">正文</label>
					<div class="col-sm-10">
					  <textarea id="content" style="height:400px;" class="form-control" name="content"><?php echo $valcontent ?></textarea>
					  <script>
						  var editor = new Simditor({
							  textarea: $('#content'),
							  //optional options
						  });
					  </script>
					</div>
				  </div>
				</p>

				  <div align=right>
				  <button type="submit" class="btn btn-success">提交表单并同意将此作品免费提供给本站使用</button>
				  </div>
				</form>
			</div>
			<?php include("Public/foot/foot.php"); ?>
		</div>
	</body>
</html>