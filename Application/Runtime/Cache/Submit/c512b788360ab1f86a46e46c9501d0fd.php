<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title>我的投稿</title>
		<script src="/Public/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="/Public/bootstrap/css/bootstrap.css" />
		<script src="/Public/bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<?php include("Application\Home\View\nav.php"); ?>
		<div class="container">
			<div class="page-header">
			  <h1>我的投稿
				  <small class="pull-right">
					  <a href="<?php echo U("/Admin/Blog/add");?>" class="btn btn-success">添加</a>
				  </small>
			  </h1>
			</div>
			<table class="table table-hover">
			  <thead>
				<tr>
				  <th>pid</th>
				  <th>标题</th>
				  <th>作者</th>
				  <th>添加时间</th>
				  <th>修改时间</th>
				  <th>编辑</th>
				  <th>删除</th>
				</tr>
			  </thead>
			  <tbody>
			      <?php foreach( $blogs as $blog ): ?>
					<tr>
					  <th scope="row"><?php echo $blog['pid']; ?></th>
					  <td><?php echo $blog['title']; ?></td>
					  <td><?php echo $blog['author']; ?></td>
					  <td><?php echo date("Y-m-d H:i:s",$blog['intime']); ?></td>
					  <td><?php echo date("Y-m-d H:i:s",$blog['uptime']); ?></td>
					  <td><a href="<?php echo U("/Admin/Blog/add"); ?>?pid=<?php echo $blog['pid']; ?>" class="btn btn-warning">编辑</a></td>
					  <td><a href="<?php echo U("/Admin/Blog/delete"); ?>?pid=<?php echo $blog['pid']; ?>" class="btn btn-danger">删除</a></td>
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