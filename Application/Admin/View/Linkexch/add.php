<!DOCTYPE html>
<html>
	<head>
		<title>友情链接管理面板</title>
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
		<?php include(THEME_PATH . "nav.php"); ?>
		<div class="container">
			<div class="page-header">
			  <h1>友情链接管理面板
				  <small class="pull-right">
					  <a href="<?php echo U("/Admin/Linkexch/index");?>" class="btn btn-success">返回</a>
				  </small>
			  </h1>
			</div>
			<div class="container">
				<form action="<?php echo U('/Admin/Linkexch/save');?>?lid=<?php echo $link['lid']?>" method="post">
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">网站名称</label>
					<div class="col-sm-10">
					  <input type="text" name='name' class="form-control" placeholder="此处输入网站名称" value="<?php echo $link['name']; ?>">
					</div>
				  </div>
				  </br>
				  </br>

				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">网站URL</label>
					<div class="col-sm-10">
					  <input type="text" name='url' class="form-control" placeholder="此处输入网站URL" value="<?php echo $link['url']; ?>">
					</div>
				  </div>
				  </br>
				  </br>

				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">LOGO图片路径</label>
					<div class="col-sm-10">
					  <input type="text" name='img' class="form-control" placeholder="此处输入LOGO图片路径" value="<?php echo $link['img']; ?>">
					</div>
				  </div>
				  </br>
				  </br>
				  <div align=right>
				  <button type="submit" class="btn btn-success">提交表单</button>
				  </div>
				</form>
			</div>
		</div>
	</body>
</html>