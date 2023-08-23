<!DOCTYPE html>
<html>
	<head>
		<title>文章分类管理面板</title>
		<script src="__PUBLIC__/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="__PUBLIC__/bootstrap/css/bootstrap.css" />
		<script src="__PUBLIC__/bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<?php include(THEME_PATH . "nav.php"); ?>
		<div class="container">
			<div class="page-header">
			  <h1>文章分类管理面板
				  <small class="pull-right">
					  <a href="<?php echo U("/Admin/Class/add");?>" class="btn btn-success">添加</a>
				  </small>
			  </h1>
			</div>
			<table class="table table-hover">
			  <thead>
				<tr>
				  <th><span class="label label-default">lid</span></th>
				  <th><span class="label label-info">分类</span></th>
				  <th><span class="label label-info">图标</span></th>
				  <th><span class="label label-warning">编辑</span></th>
				  <th><span class="label label-danger">删除</span></th>
				</tr>
			  </thead>
			  <tbody>
			      <?php foreach( $classes as $class ): ?>
					<tr>
					  <th scope="row"><span class="label label-default"><?php echo $class['cid']; ?></span></th>
					  <td><span class="label label-info"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span>&nbsp;<?php echo $class['name']; ?></span></td>
					  <td><span class="label label-info"><span class="glyphicon glyphicon-<?php echo $class['icon']; ?>" aria-hidden="true"></span>&nbsp;</span></td>
					  <td><a href="<?php echo U("/Admin/Class/add"); ?>?cid=<?php echo $class['cid']; ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;编辑</a></td>
					  <td><a href="<?php echo U("/Admin/Class/delete"); ?>?cid=<?php echo $class['cid']; ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;删除</a></td>
					</tr>
				  <?php endforeach; ?>
			  </tbody>
			</table>
			<div align=right>
				<?php echo $show; ?>
			</div>
		</div>
	</body>
</html>

