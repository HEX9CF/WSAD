<!DOCTYPE html>
<html>
	<head>
		<title>投稿审核面板</title>
		<script src="__PUBLIC__/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="__PUBLIC__/bootstrap/css/bootstrap.css" />
		<script src="__PUBLIC__/bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<?php include(THEME_PATH . "nav.php"); ?>
		<div class="container">
			<div class="page-header">
			  <h1>投稿审核面板
				  <small class="pull-right">
					  <a href="<?php echo U("/User/Submit/submit");?>" class="btn btn-success">投稿</a>
				  </small>
			  </h1>
			</div>
			<table class="table table-hover">
			  <thead>
				<tr>
				  <th><span class="label label-default">投稿</span></th>
				  <th><span class="label label-default">pid</span></th>
				  <th><span class="label label-primary">标题</span></th>
				  <th><span class="label label-info">分类</span></th>
				  <th><span class="label label-primary">作者</span></th>
				  <th><span class="label label-primary">提交时间</span></th>
				  <th><span class="label label-success">状态</span></th>
				  <th><span class="label label-danger">操作</span></th>
				</tr>
			  </thead>
			  <tbody>
			      <?php foreach( $subs as $sub ): ?>
						<tr>
							  <th scope="row"><span class="label label-default"><?php echo $sub['subid']; ?></span></th>
							  <th scope="row"><span class="label label-default"><?php echo $sub['pid']; ?></span></th>
							  <td><span class="label label-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;<?php echo mb_substr($sub['title'],0,15); ?>...</span></td>
							  <td><span class="label label-info"><span class="glyphicon glyphicon-<?php 
								$classesmodel = D("classes");
								$classwhere = array(
									'name'=>$sub['class'],
								);
								$class2 = $classesmodel->where($classwhere)->select();
								$class = $class2[0];
								echo $class['icon'];
								?>" aria-hidden="true"></span>&nbsp; <?php echo $sub['class'];?></span></td>
							  <td><span class="label label-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;<?php echo mb_substr($sub['author'],0,5); ?>...</span></td>
							  <td><span class="label label-primary"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;<?php echo date("Y-m-d H:i:s",$sub['intime']); ?></span></td>
							  <td>
								  <?php if($sub['state'] == 'wait'){ ?>
									<span class="label label-warning">审核中</span>
								  <?php } ?>
								  <?php if($sub['state'] == 'true'){ ?>
									<span class="label label-success">已通过</span>
								  <?php } ?>
								  <?php if($sub['state'] == 'false'){ ?>
									<span class="label label-danger">未通过</span>
								  <?php } ?>
							  </td>
							  <td>
							  	<?php if($sub['state'] == 'wait'){ ?>
								  <a href="<?php echo U('/Admin/Submit/pass'); ?>?subid=<?php echo $sub['subid']; ?>" ><button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;通过</button></a>
								  <a href="<?php echo U('/Admin/Submit/false'); ?>?subid=<?php echo $sub['subid']; ?>" ><button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;拒绝</button></a>
								  <a href="<?php echo U('/Admin/Submit/read'); ?>?subid=<?php echo $sub['subid']; ?>" ><button type="button" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span>&nbsp;预览</button></a>
								  <button type="button" class="btn btn-danger btn-xs" disabled="disabled"><span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>&nbsp;查看</button>
								<?php } ?>
								<?php if($sub['state'] == 'true'){ ?>
								  <button type="button" class="btn btn-success btn-xs" disabled="disabled"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;通过</button>
								  <a href="<?php echo U('/Admin/Submit/false'); ?>?subid=<?php echo $sub['subid']; ?>" ><button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;拒绝</button></a>
								  <a href="<?php echo U('/Admin/Submit/read'); ?>?subid=<?php echo $sub['subid']; ?>" ><button type="button" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span>&nbsp;预览</button></a>
								  <a href="<?php echo U('/Home/Index/read'); ?>?pid=<?php echo $sub['pid']; ?>" ><button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;查看</button></a>
								<?php } ?>
								<?php if($sub['state'] == 'false'){ ?>
								  <a href="<?php echo U('/Admin/Submit/pass'); ?>?subid=<?php echo $sub['subid']; ?>" ><button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;通过</button></a>
								  <button type="button" class="btn btn-danger btn-xs" disabled="disabled"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;拒绝</button>
								  <a href="<?php echo U('/Admin/Submit/read'); ?>?subid=<?php echo $sub['subid']; ?>" ><button type="button" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span>&nbsp;预览</button></a>
								  <button type="button" class="btn btn-danger btn-xs" disabled="disabled"><span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>&nbsp;查看</button>
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

