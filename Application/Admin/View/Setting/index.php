<!DOCTYPE html>
<html>
	<head>
		<title>系统管理面板</title>
		<script src="__PUBLIC__/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="__PUBLIC__/bootstrap/css/bootstrap.css" />
		<script src="__PUBLIC__/bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<?php include(THEME_PATH . "nav.php"); ?>
		<div class="container">
			<div class="page-header">
			  <h1>系统设置面板
				  <small class="pull-right">
					  <a href="<?php echo U("/Admin/Index/index");?>" class="btn btn-success">返回</a>
				  </small>
			  </h1>
			</div>
			<div class="container">
				<form action="<?php echo U('/Admin/Setting/save');?>" method="post">
				<?php foreach( $setting as $cname=>$val ):?>
					  <div class="form-group">
						<label for="exampleInputEmail1"><?php echo $cname; ?></label>
						<input type="text" name='<?php echo $cname; ?>' class="form-control" placeholder="此处输入<?php echo $cname; ?>" value="<?php echo $val; ?>">
					  </div>
				<?php endforeach;?>

				  <div align=right>
				  <button type="submit" class="btn btn-success">提交表单</button>
				  </div>
				</form>
			</div>
		</div>
	</body>
</html>