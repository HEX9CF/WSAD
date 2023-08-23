<!DOCTYPE html>
<html>
	<head>
		<title>普通用户管理面板</title>
		<script src="__PUBLIC__/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="__PUBLIC__/bootstrap/css/bootstrap.css" />
		<script src="__PUBLIC__/bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<?php include(THEME_PATH . "nav.php"); ?>
		<div class="container">
			<div class="page-header">
			  <h1>普通用户管理面板
				  <small class="pull-right">
					  <a href="<?php echo U("/Admin/User/add");?>" class="btn btn-success">添加</a>
				  </small>
			  </h1>
			</div>
			<table class="table table-hover">
			  <thead>
				<tr>
				  <th><span class="label label-default">uid</span></th>
				  <th><span class="label label-primary">用户名</span></th>
				  <th><span class="label label-danger">封禁情况</span></th>
				  <th><span class="label label-primary">首次登陆</span></th>
				  <th><span class="label label-primary">上次登陆</span></th>
				  <th><span class="label label-primary">首次IP</span></th>
				  <th><span class="label label-primary">上次IP</span></th>
				  <th><span class="label label-warning">编辑</span></th>
				  <th><span class="label label-danger">封禁</span></th>
				  <th><span class="label label-danger">删除</span></th>
				</tr>
			  </thead>
			  <tbody>
			      <?php foreach( $data['users'] as $user ): ?>
					<tr>
					  <th scope="row"><span class="label label-default"><?php echo $user['uid']; ?></span></th>
					  <td><span class="label label-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;<?php echo mb_substr($user['username'],0,20); ?>...</span></td>
					  <td><?php if($user['ban']){?>
					  <span class="label label-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;封禁</span>
					  <?php }else{ ?>
					  <span class="label label-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;正常</span>
					  <?php } ?></td>
					  <td><span class="label label-primary"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;<?php echo date("Y-m-d H:i:s",$user['firstlogin']); ?></span></td>
					  <td><span class="label label-primary"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;<?php echo date("Y-m-d H:i:s",$user['lastlogin']); ?></span></td>
					  <td><span class="label label-primary"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>&nbsp;<?php echo $user['firstloginip']; ?></span></td>
					  <td><span class="label label-primary"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>&nbsp;<?php echo $user['lastloginip']; ?></span></td>
					  <td><a href="<?php echo U("/Admin/User/add"); ?>?uid=<?php echo $user['uid']; ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;编辑</a></td>
					  <td><?php if(!$user['ban']){ ?>
					  <a href="<?php echo U("/Admin/User/ban"); ?>?uid=<?php echo $user['uid']; ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;封禁</a></td>
					  <?php }else{ ?>
					  <a href="<?php echo U("/Admin/User/unban"); ?>?uid=<?php echo $user['uid']; ?>" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;解封</a></td>
					  <?php } ?>
					  <td><a href="<?php echo U("/Admin/User/delete"); ?>?uid=<?php echo $user['uid']; ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;删除</a></td>
					</tr>
				  <?php endforeach; ?>
			  </tbody>
			</table>
		</div>
	</body>
</html>
