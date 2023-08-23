<!DOCTYPE html>
<html>
	<head>
		<title>博客管理员管理面板</title>
		<script src="__PUBLIC__/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="__PUBLIC__/bootstrap/css/bootstrap.css" />
		<script src="__PUBLIC__/bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<?php include(THEME_PATH . "nav.php"); ?>
		<div class="container">
			<div class="page-header">
			  <h1>博客管理员管理面板
				  <small class="pull-right">
					  <a href="<?php echo U("/Admin/Auser/add");?>" class="btn btn-success">添加</a>
				  </small>
			  </h1>
			</div>
			<table class="table table-hover">
			  <thead>
				<tr>
				  <th><span class="label label-default">aid</span></th>
				  <th><span class="label label-primary">用户名</span></th>
				  <th><span class="label label-warning">编辑</span></th>
				  <th><span class="label label-danger">删除</span></th>
				</tr>
			  </thead>
			  <tbody>
			      <?php foreach( $data['users'] as $user ): ?>
					<tr>
					  <th scope="row"><span class="label label-default"><?php echo $user['aid']; ?></span></th>
					  <td><span class="label label-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;<?php echo mb_substr($user['admin'],0,20); ?>...</span></td>
					  <td><a href="<?php echo U("/Admin/Auser/add"); ?>?aid=<?php echo $user['aid']; ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;编辑</a></td>
					  <td><a href="<?php echo U("/Admin/Auser/delete"); ?>?aid=<?php echo $user['aid']; ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;删除</a></td>
					</tr>
				  <?php endforeach; ?>
			  </tbody>
			</table>
		</div>
	</body>
</html>
