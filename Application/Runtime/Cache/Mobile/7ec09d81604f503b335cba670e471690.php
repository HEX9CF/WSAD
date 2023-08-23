<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML><head>
<title><?php echo $set['title'];?>&nbsp;-&nbsp;<?php echo $_SERVER['HTTP_HOST']; ?></title>
<script src="/Public/js/jquery-3.1.1.min.js"></script>
<link rel="stylesheet" href="/Public/bootstrap/css/bootstrap.css" />
<script src="/Public/bootstrap/js/bootstrap.js"></script>
<meta name="title" content="<?php echo $set['title'];?>" />
<meta name="keywords" content="<?php echo $set['keywords'];?>" />
<meta name="description" content="<?php echo $set['intro'];?>..." />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0 minimal-ui"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link href="/Public/mobile/css/style.css"     		 rel="stylesheet" type="text/css">
<link href="/Public/mobile/css/framework.css" 		 rel="stylesheet" type="text/css">
<link href="/Public/mobile/css/owl.theme.css" 		 rel="stylesheet" type="text/css">
<link href="/Public/mobile/css/swipebox.css"		 rel="stylesheet" type="text/css">
<link href="/Public/mobile/css/font-awesome.css"	 rel="stylesheet" type="text/css">
<link href="/Public/mobile/css/animate.css"			 rel="stylesheet" type="text/css">
<script type="text/javascript" src="/Public/mobile/js/jqueryui.js"></script>
<script type="text/javascript" src="/Public/mobile/js/framework.plugins.js"></script>
<script type="text/javascript" src="/Public/mobile/js/custom.js"></script>
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
<div class="all-elements">
    <div class="snap-drawers">
		<?php include(THEME_PATH . "nav.php"); ?>
    <div id="content" class="snap-content">
		<?php if($slides){ ?>
		<br><br><br>
		<div id="carousel-example-captions" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">
		  <?php $slideto=0; ?>
		  <?php foreach( $slides as $slide ): ?>
			<li data-target="#carousel-example-captions" data-slide-to="<?php echo $slideto;?>" class="<?php if($slideto == 0){echo 'active';}?>"></li>
			<?php $slideto++; ?>
		  <?php endforeach; ?>
		  </ol>
		  <div class="carousel-inner" role="listbox">
		  <?php $active = true;?>
		  <?php foreach( $slides as $slide ): ?>
			
				<div class="item<?php if($active == true){ echo ' active';}?>">
					<a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . U('/Mobile/Index/read'); ?>?pid=<?php echo $slide['pid']; ?>">
					  <img alt="<?php echo $slide['title']; ?>" style='width: 100%; height: 250px;' src="<?php echo $slide['img']; ?>" data-holder-rendered="true" class="img-thumbnail">
					  <div class="carousel-caption" style="opacity:0.5; filter: alpha(opacity=50); background-color:#000;">
						<h5><b><?php echo mb_substr($slide['title'],0,10); ?></b></h5><br>
					  </div>
				  </a>
				</div>
			<?php $active = false;?>

		  <?php endforeach; ?>
		  </div>
		  <a class="left carousel-control" href="#carousel-example-captions" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-captions" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		  </a>
		</div>
		</br>
		<?php } ?>
		
		<div class="thumbnail">
          <div class="caption" align=middle>
            <h3>欢迎，您是本站第<?php echo $vst ;?>位访客</h3>
            <p><?php echo $set['intro'] ;?></p>
            <p>
			<?php  if(!session('uid')){ ?>
				<a href="<?php echo U("/Mobile/Register/index");?>"><button type="button" class="btn btn-default">注册</button></a>
				<a href="<?php echo U("/Mobile/Login/index");?>"><button type="button" class="btn btn-success">登录</button></a>
			<?php
 }else{ ?>
				<a href="<?php echo U("/User/Submit/index");?>"><button type="button" class="btn btn-default">投稿</button></a>
				<a href="<?php echo U("/Mobile/Login/logout");?>"><button type="button" class="btn btn-danger">退出</button></a>
			<?php
 } ?>
			</p>
          </div>
        </div>
        <div>
				<?php foreach( $blogs as $blog ):?>
				<?php
 if(!$blog['img'] == false){ ?>
				<a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . U('/Mobile/Index/read'); ?>?pid=<?php echo $blog['pid']; ?>">
				<div class="thumbnail">
				  <div class="caption">
					<h5><span class="label label-info">
						<span class="glyphicon glyphicon-<?php  $classesmodel = D("classes"); $classwhere = array( 'name'=>$blog['class'], ); $class2 = $classesmodel->where($classwhere)->select(); $class = $class2[0]; echo $class['icon']; ?>" aria-hidden="true"></span>&nbsp;
						<?php if($blog['class']){echo $blog['class'];}else{echo '未分类';} ?></span>
						<b><?php echo mb_substr($blog['title'],0,18); ?>...</b><br></h5><br>
						<img class='media-object' alt='<?php echo $blog['title']; ?>' src='<?php echo $blog['img']; ?>' style='width: 100%; height: 200px; display: block;' class="img-thumbnail"><br>
						<span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;<?php echo date("Y-m-d H:i:s",$blog['intime']); ?></span><br>
						<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;人气(<?php echo $blog['read']; ?>)</span>
						<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;赞(<?php echo $blog['zan']; ?>)</span>
						<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;评论(<?php echo $blog['msg']; ?>)</span>
				  </div>
				</div>
				</a>
				<?php  }else{ ?>
				<a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . U('/Mobile/Index/read'); ?>?pid=<?php echo $blog['pid']; ?>">
				<div class="thumbnail">
				  <div class="caption">
					<h5><span class="label label-info">
						<span class="glyphicon glyphicon-<?php  $classesmodel = D("classes"); $classwhere = array( 'name'=>$blog['class'], ); $class2 = $classesmodel->where($classwhere)->select(); $class = $class2[0]; echo $class['icon']; ?>" aria-hidden="true"></span>&nbsp;
						<?php if($blog['class']){echo $blog['class'];}else{echo '未分类';} ?></span>
						<b><?php echo mb_substr($blog['title'],0,18); ?>...</b><br></h5><br>
						<?php echo mb_substr(strip_tags(html_entity_decode($blog['content'])),0,100); ?>......<br><br>
						<span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;<?php echo date("Y-m-d H:i:s",$blog['intime']); ?></span><br>
						<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;人气(<?php echo $blog['read']; ?>)</span>
						<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;赞(<?php echo $blog['zan']; ?>)</span>
						<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;评论(<?php echo $blog['msg']; ?>)</span>
				  </div>
				</div>
				</a>
				<?php
 } ?>
					<?php endforeach; ?>
					<div align=right>
					<?php echo $show; ?>
            </div>         
        </div>
        <div class="footer">
            <div class="footer-socials half-bottom">
            </div>
            <p class="center-text"><?php include("Public/foot/foot.php"); ?></p>
        </div>       
    </div>
</div>
</body>