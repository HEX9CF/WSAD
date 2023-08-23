<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title>注册审核面板</title>
		<script src="/Public/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="/Public/bootstrap/css/bootstrap.css" />
		<script src="/Public/bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<?php include(THEME_PATH . "nav.php"); ?>
		<div class="container">
			<div class="page-header">
			  <h1>注册审核面板
				  <small class="pull-right">
					  <a href="<?php echo U("/User/Submit/submit");?>" class="btn btn-success">投稿</a>
				  </small>
			  </h1>
			</div>
			<table class="table table-hover">
			  <thead>
				<tr>
				  <th><span class="label label-default">rid</span></th>
				  <th><span class="label label-default">uid</span></th>
				  <th><span class="label label-primary">用户名</span></th>
				  <th><span class="label label-primary">email</span></th>
				  <th><span class="label label-primary">提交时间</span></th>
				  <th><span class="label label-success">状态</span></th>
				  <th><span class="label label-danger">操作</span></th>
				</tr>
			  </thead>
			  <tbody>
			      <?php foreach( $regs as $reg ): ?>
						<tr>
							  <th scope="row"><span class="label label-default"><?php echo $reg['rid']; ?></span></th>
							  <th scope="row"><span class="label label-default"><?php echo $reg['uid']; ?></span></th>
							  <td><span class="label label-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;<?php echo mb_substr($reg['username'],0,20); ?>...</span></td>
							  <td><span class="label label-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;<?php echo mb_substr($reg['email'],0,20); ?>...</span></td>
							  <td><span class="label label-primary"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;<?php echo date("Y-m-d H:i:s",$reg['time']); ?></span></td>
							  <td>
								  <?php if($reg['state'] == 'wait'){ ?>
									<span class="label label-warning">审核中</span>
								  <?php } ?>
								  <?php if($reg['state'] == 'true'){ ?>
									<span class="label label-success">已通过</span>
								  <?php } ?>
								  <?php if($reg['state'] == 'false'){ ?>
									<span class="label label-danger">未通过</span>
								  <?php } ?>
							  </td>
							  <td>
							  	<?php if($reg['state'] == 'wait'){ ?>
								  <a href="<?php echo U('/Admin/Register/pass'); ?>?rid=<?php echo $reg['rid']; ?>" ><button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;通过</button></a>
								  <a href="<?php echo U('/Admin/Register/false'); ?>?rid=<?php echo $reg['rid']; ?>" ><button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;拒绝</button></a>
								<?php } ?>
								<?php if($reg['state'] == 'true'){ ?>
								  <button type="button" class="btn btn-success btn-xs" disabled="disabled"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;通过</button>
								  <button type="button" class="btn btn-danger btn-xs" disabled="disabled"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;拒绝</button>
								<?php } ?>
								<?php if($reg['state'] == 'false'){ ?>
								  <button type="button" class="btn btn-success btn-xs" disabled="disabled"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;通过</button>
								  <button type="button" class="btn btn-danger btn-xs" disabled="disabled"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;拒绝</button>
								<?php } ?>
							  </td>
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