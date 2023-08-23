<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title><?php echo $set['title'];?>&nbsp;-&nbsp;我的投稿</title>
		<script src="/Public/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="/Public/bootstrap/css/bootstrap.css" />
		<script src="/Public/bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<div class="container">
			<?php include("./Application/Home/View/nav.php"); ?>
			<div class="page-header">
			  <h1><?php echo $set['title'];?>&nbsp;-&nbsp;我的投稿
				  <small class="pull-right">
					  <a href="<?php echo U("/User/Submit/submit");?>" class="btn btn-success">投稿</a>
				  </small>
			  </h1>
			</div>
			<table class="table table-hover">
			  <thead>
				<tr>
				  <th>投稿id</th>
				  <th>pid</th>
				  <th>标题</th>
				  <th>分类</th>
				  <th>作者</th>
				  <th>提交时间</th>
				  <th>状态</th>
				  <th>操作</th>
				</tr>
			  </thead>
			  <tbody>
			      <?php foreach( $subs as $sub ): ?>
						<tr>
							  <th scope="row"><?php echo $sub['subid']; ?></th>
							  <th scope="row"><?php echo $sub['pid']; ?></th>
							  <td><?php echo $sub['title']; ?></td>
							  <td><span class="label label-info"><span class="glyphicon glyphicon-<?php  $classesmodel = D("classes"); $classwhere = array( 'name'=>$sub['class'], ); $class2 = $classesmodel->where($classwhere)->select(); $class = $class2[0]; echo $class['icon']; ?>" aria-hidden="true"></span>&nbsp;  <?php echo $sub['class'];?></span></td>
							  <td><?php echo $sub['author']; ?></td>
							  <td><?php echo date("Y-m-d H:i:s",$sub['intime']); ?></td>
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
								<?php if($sub['pid']){ ?>
								  <a href="<?php echo U('/Home/Index/read'); ?>?pid=<?php echo $sub['pid']; ?>" ><button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;查看</button></a>
								<?php }else{ ?>
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
			<div class="alert alert-warning" role="alert">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  <span class="sr-only">警告:</span>
			  如果你有关于游戏方面的文章，欢迎给本网站投稿，让更多的人了解这方面的知识。但本网站预先说明，投稿后本站不会支付稿费。
			</div>
			<?php include("Public/foot/foot.php"); ?>
		</div>
	</body>
</html>