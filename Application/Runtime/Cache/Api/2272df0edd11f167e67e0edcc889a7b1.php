<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title></title>
		<script src="/Public/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="/Public/bootstrap/css/bootstrap.css" />
		<script src="/Public/bootstrap/js/bootstrap.js"></script>
		<meta name="title" content="" />
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<style type="text/css">
		<!--
		a:link {
			text-decoration: none;
		}
		a:visited {
			text-decoration: none;
		}
		a:hover {
			text-decoration: none;
		}
		a:active {
			text-decoration: none;
		}
		-->
		</style>
	</head>
	<body>
	<br>
			<div class="col-md-6">
				<?php  if($blogs == false){?>
					<div align=middle>
						站长很懒，这里什么也没有。。。。。。
					</div>
				<?php }?>
				<?php foreach( $blogs as $blog ): ?>
					<a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . U('/Home/Index/read'); ?>?pid=<?php echo $blog['pid']; ?>">
						<div class="panel panel-info">
							<div class="panel-body">
								<div class="media">
									<?php
 if(!$blog['img'] == false){ ?>
										<div class='media-left'>
											  <img class='media-object' alt='<?php echo $blog['title']; ?>' src='<?php echo $blog['img']; ?>' data-holder-rendered='true' style='width: 200px; height: 150px;' class="img-thumbnail">
										</div>
										<div class="media-body">
										<p><span class="label label-info"><span class="glyphicon glyphicon-<?php  $classesmodel = D("classes"); $classwhere = array( 'name'=>$blog['class'], ); $class2 = $classesmodel->where($classwhere)->select(); $class = $class2[0]; echo $class['icon']; ?>" aria-hidden="true"></span>&nbsp;
										 <?php if($blog['class']){echo $blog['class'];}else{echo '未分类';} ?></span>
										<b><?php echo mb_substr($blog['title'],0,25); ?></b></h4></p><p>
										<span class="label label-primary"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;<?php echo date("Y-m-d H:i:s",$blog['intime']); ?></span>
										<span class="label label-primary"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;人气(<?php echo $blog['read']; ?>)</span>
										<span class="label label-primary"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;赞(<?php echo $blog['zan']; ?>)</span>
										<span class="label label-primary"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;评论(<?php echo $blog['msg']; ?>)</span></p>
										<p><?php echo mb_substr(strip_tags(html_entity_decode($blog['content'])),0,125); ?>......</p>
									  </div>
										<?php  }else{ ?>
										<div class="media-body">
										<h4 class="media-heading">
										<span class="label label-info"><span class="glyphicon glyphicon-<?php  $classesmodel = D("classes"); $classwhere = array( 'name'=>$blog['class'], ); $class2 = $classesmodel->where($classwhere)->select(); $class = $class2[0]; echo $class['icon']; ?>" aria-hidden="true"></span>&nbsp;
										 <?php if($blog['class']){echo $blog['class'];}else{echo '未分类';} ?></span>
										<b><?php echo mb_substr($blog['title'],0,25); ?></b></h4>
										<?php echo mb_substr(strip_tags(html_entity_decode($blog['content'])),0,200); ?>......<br>
										<span class="label label-primary"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;<?php echo date("Y-m-d H:i:s",$blog['intime']); ?></span>
										<span class="label label-primary"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;人气(<?php echo $blog['read']; ?>)</span>
										<span class="label label-primary"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;赞(<?php echo $blog['zan']; ?>)</span>
										<span class="label label-primary"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;评论(<?php echo $blog['msg']; ?>)</span>
									  </div>
										<?php
 } ?>
									</div>
								</div>
							</div>
						</a>
					<?php endforeach; ?>
					<div align=right>
						<?php echo $show; ?>
					</div>
			</div>
	</body>
</html>