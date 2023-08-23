<?php if (!defined('THINK_PATH')) exit(); date_default_timezone_set("Asia/Hong_Kong"); $t = date("Y年m月d日 H:i:s",$msg['time']); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>评论管理面板</title>
			<script src="/Public/js/jquery-3.1.1.min.js"></script>
			<link rel="stylesheet" href="/Public/bootstrap/css/bootstrap.css" />
			<script src="/Public/bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<?php include(THEME_PATH . "nav.php"); ?>
		<div class="container">
			<div class="page-header">
			  <h1>评论管理面板
				  <small class="pull-right">
					  <a href="<?php echo U("/Admin/Msg/index");?>" class="btn btn-success">返回</a>
				  </small>
			  </h1>
			</div>
			<ul class="list-group">
			  <li class="list-group-item">
					<span style="float:left;"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;<?php echo $msg['user'];?></span>
					<span style="float:right;"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;<?php echo $t;?></span>
					<div style="clear:both;"></div></br>
					<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;<?php echo $msg['msg'];?>
					<span style="float:right;">
					<button type="button" class="btn btn-info btn-xs">
					  <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;<?php echo $msg['msgzan']?>
					</button>
				</li>
			</ul>
			<br>
			<div align=right>
				<a href="<?php echo U('/Home/Index/read'); ?>?pid=<?php echo $msg['pid']; ?>" class="btn btn-warning">查看</a>
				&nbsp;
				<a href="<?php echo U("/Admin/Msg/delete"); ?>?mid=<?php echo $msg['mid']; ?>" class="btn btn-danger">删除</a>
			</div>
		</div>
	</body>
</html>