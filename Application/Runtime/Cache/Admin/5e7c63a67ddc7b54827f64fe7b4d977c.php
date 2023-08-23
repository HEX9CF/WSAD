<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title>博客系统管理面板</title>
		<script src="/Public/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="/Public/bootstrap/css/bootstrap.css" />
		<script src="/Public/bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<?php include(THEME_PATH . "nav.php"); ?>
		<div class="container">
			<div class="jumbotron">
			  <h1>博客系统管理面板</h1>
			  <p>当前程序版本：<?php include("./v.php"); ?> </p>
			</div>
			<div class="col-md-8">
				<div class="panel panel-info">
				  <div class="panel-heading"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;</div>
				  <div class="panel-body">
					<ul class="list-group">
					  <?php foreach( $setting as $name=>$val ):?>
						  <li class="list-group-item">
							<span class="label label-info"><?php echo $name;?></span><br><br><?php echo $val;?>
						  </li>
					  <?php endforeach;?>
					  </ul>
				  </div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-info">
				  <div class="panel-heading"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;统计数据</div>
				  <div class="panel-body">
					<ul class="list-group">
					  <?php foreach( $nums as $cname=>$val ):?>
						  <li class="list-group-item">
							<span class="badge"><?php echo $val;?></span>
							<span class="label label-info"><?php echo $cname;?></span>
						  </li>
					  <?php endforeach;?>
					  </ul>
				  </div>
				</div>
			</div>
		</div>
	</body>
</html>