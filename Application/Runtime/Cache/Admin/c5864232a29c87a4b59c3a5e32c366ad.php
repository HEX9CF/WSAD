<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title>博客系统管理面板</title>
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
			  <h1>博客管理面板
				  <small class="pull-right">
					  <a href="<?php echo U("/Admin/Blog/index");?>" class="btn btn-success">返回</a>
				  </small>
			  </h1>
			</div>
			<div class="container">
				<form action="<?php echo U('/Admin/Blog/save');?>?pid=<?php echo $blog['pid']?>" method="post">

				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">分类</label>
					<div class="col-sm-10">
					  <select name="class" id="Select" class="form-control">
					  	<?php if($blog['class']){?>
								<option><?php echo $blog['class']; ?></option>
						<?php }?>
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
					  <input type="text" name='title' class="form-control" placeholder="此处输入标题" value="<?php echo $blog['title']; ?>">
					</div>
				  </div>
				  </br>
				  </br>

				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">作者</label>
					<div class="col-sm-10">
					  <input type="text" name='author' class="form-control" placeholder="此处输入作者" value="<?php echo $blog['author']; ?>">
					</div>
				  </div>
				  </br>
				  </br>

				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">封面图片路径</label>
					<div class="col-sm-10">
					  <input type="text" name='img' class="form-control" placeholder="此处输入封面图片路径" value="<?php echo $blog['img']; ?>">
					</div>
				  </div>
				  </br>
				  </br>

				  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label" name="content">正文</label>
					<div class="col-sm-10">
					  <textarea id="content" style="height:400px;" class="form-control" name="content"><?php echo $blog['content']; ?></textarea>
					  <script>
						  var editor = new Simditor({
							  textarea: $('#content'),
							  upload:{
								  url:"<?php echo U('/Admin/Blog/upload');?>",
								  fileKey:"upload_file",
							  }
							  //optional options
						  });
					  </script>
					</div>
				  </div>


				  <div align=right>
				  <button type="submit" class="btn btn-success">提交表单</button>
				  </div>
				</form>
			</div>
		</div>
	</body>
</html>