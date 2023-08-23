<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title>文章分类管理面板</title>
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
		<?php include(THEME_PATH . "nav.php"); ?>
		<div class="container">
			<div class="page-header">
			  <h1>文章分类管理面板
				  <small class="pull-right">
					  <a href="<?php echo U("/Admin/Class/index");?>" class="btn btn-success">返回</a>
				  </small>
			  </h1>
			</div>
			<div class="container">
				<form action="<?php echo U('/Admin/Class/save');?>?cid=<?php echo $class['cid']?>" method="post">
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">分类名称</label>
					<div class="col-sm-10">
					  <input type="text" name='name' class="form-control" placeholder="分类名称" value="<?php echo $class['name']; ?>">
					</div>
				  </div>
				  </br>
				  </br>
				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">图标名</label>
					<div class="col-sm-10">
					  <input type="text" name='icon' class="form-control" placeholder="此处输入图标名" value="<?php echo $class['icon']; ?>">
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