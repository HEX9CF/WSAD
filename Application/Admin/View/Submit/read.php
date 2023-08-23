<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $set['title'];?></title>
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
					  <a href="<?php echo U("/Admin/Submit/index"); ?>" class="btn btn-success">返回</a>
				  </small>
			  </h1>
			</div>
			<div class="col-md-12">
				
				<div class="panel panel-info">
				  <div class="panel-heading"><span class="label label-info"><span class="glyphicon glyphicon-<?php 
					$classesmodel = D("classes");
					$classwhere = array(
						'name'=>$blog['class'],
					);
					$class2 = $classesmodel->where($classwhere)->select();
					$class = $class2[0];
					echo $class['icon'];
					?>" aria-hidden="true"></span>&nbsp; 
				  <?php if($blog['class']){echo $blog['class'];}else{echo '未分类';} ?></span>
				  <?php echo $blog['title']; ?></div>
				  <div class="panel-body">
					  <div align=middle><img src="<?php echo $blog['img']; ?>" alt="<?php echo $blog['img']; ?>" class="img-rounded" style='width: 500px; height: 300px;' ></br><h1><b><?php echo $blog['title'];?></b></h1></div>
					  <div align=middle>
					    <p>
							<span class="label label-info"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;作者/投稿人：<?php echo $blog['author']; ?></span>&nbsp;&nbsp;
						</p>
						<p>
						  <span class="label label-info"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;创建时间：<?php echo date("Y-m-d H:i:s",$blog['intime']); ?></span>&nbsp;&nbsp;
						  <span class="label label-info"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;修改时间：<?php echo date("Y-m-d H:i:s",$blog['uptime']); ?></span>
						  </p>
					  </div>
						</br>
						<?php echo html_entity_decode($blog['content']); ?>
				  </div>
				</div>
			</div>
			<div align=right>
				<a href="<?php echo U("/Admin/Submit/index"); ?>" class="btn btn-success">返回</a>
			</div>
		</div>
	</body>
</html>
