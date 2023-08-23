<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title>友情链接管理面板</title>
		<script src="/Public/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="/Public/bootstrap/css/bootstrap.css" />
		<script src="/Public/bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<?php include(THEME_PATH . "nav.php"); ?>
		<div class="container">
			<div class="page-header">
			  <h1>友情链接管理面板
				  <small class="pull-right">
					  <a href="<?php echo U("/Admin/Linkexch/add");?>" class="btn btn-success">添加</a>
				  </small>
			  </h1>
			</div>
			<table class="table table-hover">
			  <thead>
				<tr>
				  <th><span class="label label-default">lid</span></th>
				  <th><span class="label label-primary">名称</span></th>
				  <th><span class="label label-primary">url</span></th>
				  <th><span class="label label-success">img</span></th>
				  <th><span class="label label-warning">编辑</span></th>
				  <th><span class="label label-danger">删除</span></th>
				</tr>
			  </thead>
			  <tbody>
			      <?php foreach( $Link_exchs as $Link_exch ): ?>
					<tr>
					  <th scope="row"><span class="label label-default"><?php echo $Link_exch['lid']; ?></span></th>
					  <td><span class="label label-primary"><span class="glyphicon glyphicon-link" aria-hidden="true"></span>&nbsp;<?php echo mb_substr($Link_exch['name'],0,20); ?>...</span></td>
					  <td><span class="label label-primary"><span class="glyphicon glyphicon-link" aria-hidden="true"></span>&nbsp;<?php echo mb_substr($Link_exch['url'],0,20); ?>...</span></td>
					  <td>
					  <?php if($Link_exch['img']){ ?>
					  <span class="label label-success">有</span>
					  <?php }else{ ?>
					  <span class="label label-danger">无</span>
					  <?php } ?>
					  </td>
					  <td><a href="<?php echo U("/Admin/Linkexch/add"); ?>?lid=<?php echo $Link_exch['lid']; ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;编辑</a></td>
					  <td><a href="<?php echo U("/Admin/Linkexch/delete"); ?>?lid=<?php echo $Link_exch['lid']; ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;删除</a></td>
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