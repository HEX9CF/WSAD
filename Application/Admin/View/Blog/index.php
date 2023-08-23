<!DOCTYPE html>
<html>
	<head>
		<title>博客管理面板</title>
		<script src="__PUBLIC__/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="__PUBLIC__/bootstrap/css/bootstrap.css" />
		<script src="__PUBLIC__/bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<?php include(THEME_PATH . "nav.php"); ?>
        <div class="container">
			<div class="page-header">
			  <h1>博客管理面板
				  <small class="pull-right">
					  <a href="<?php echo U("/Admin/Blog/add");?>" class="btn btn-success">添加</a>
				  </small>
			  </h1>
			</div>
			<table class="table table-hover">
			  <thead>
				<tr>
				  <th><span class="label label-default">pid</span></th>
				  <th><span class="label label-primary">标题</span></th>
				  <th><span class="label label-info">分类</span></th>
				  <th><span class="label label-primary">作者</span></th>
				  <th><span class="label label-info">阅读</span></th>
				  <th><span class="label label-danger">点赞</span></th>
				  <th><span class="label label-success">评论</span></th>
				  <th><span class="label label-primary">添加时间</span></th>
				  <th><span class="label label-primary">修改时间</span></th>
				  <th><span class="label label-danger">置顶</span></th>
				  <th><span class="label label-success">查看</span></th>
				  <th><span class="label label-warning">编辑</span></th>
				  <th><span class="label label-danger">删除</span></th>
				</tr>
			  </thead>
			  <tbody>
			      <?php foreach( $blogs as $blog ): ?>
					<tr>
					  <th scope="row"><span class="label label-default"><?php echo $blog['pid']; ?></span></th>
					  <td><span class="label label-primary"><?php echo mb_substr($blog['title'],0,10); ?>...</span></td>
					  <td><span class="label label-info">
					  <span class="glyphicon glyphicon-<?php 
						$classesmodel = D("classes");
						$classwhere = array(
							'name'=>$blog['class'],
						);
						$class2 = $classesmodel->where($classwhere)->select();
						$class = $class2[0];
						echo $class['icon'];
						?>" aria-hidden="true"></span>&nbsp;
					  <?php echo $blog['class'];?></span></td>
					  <td><span class="label label-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;<?php echo mb_substr($blog['author'],0,5); ?>...</span></td>
					  <td><span class="label label-info"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;<?php echo $blog['read']; ?></span></td>
					  <td><span class="label label-danger"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;<?php echo $blog['zan']; ?></span></td>
					  <td><span class="label label-success"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;<?php echo $blog['msg']; ?></span></td>
					  <td><span class="label label-primary"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;<?php echo date("Y-m-d H:i:s",$blog['intime']); ?></span></td>
					  <td><span class="label label-primary"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;<?php echo date("Y-m-d H:i:s",$blog['uptime']); ?></span></td>
					  <td>
					  <?php if($blog['top'] == 'true' ){ ?>
					  <a href="<?php echo U("/Admin/Blog/untop"); ?>?pid=<?php echo $blog['pid']; ?>" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>&nbsp;取消</a>
					  <?php }else{ ?>
					  <a href="<?php echo U("/Admin/Blog/top"); ?>?pid=<?php echo $blog['pid']; ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>&nbsp;置顶</a>
					  <?php } ?>
					  </td>
					  <td><a href="<?php echo U('/Home/Index/read'); ?>?pid=<?php echo $blog['pid']; ?>" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;查看</a></td>
					  <td><a href="<?php echo U("/Admin/Blog/add"); ?>?pid=<?php echo $blog['pid']; ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;编辑</a></td>
					  <td><a href="<?php echo U("/Admin/Blog/delete"); ?>?pid=<?php echo $blog['pid']; ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;删除</a></td>
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

