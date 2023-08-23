<!DOCTYPE HTML><head>
<title><?php echo $blog['title'];?></title>
<script src="__PUBLIC__/js/jquery-3.1.1.min.js"></script>
<link rel="stylesheet" href="__PUBLIC__/bootstrap/css/bootstrap.css" />
<script src="__PUBLIC__/bootstrap/js/bootstrap.js"></script>
<meta name="title" content="<?php echo $blog['title'];?>" />
<meta name="keywords" content="<?php $con = strip_tags(html_entity_decode($blog['title'])); include("Public/keyword/index.php");echo get_keywords_str($con);?>" />
<meta name="description" content="<?php echo mb_substr(strip_tags(html_entity_decode($blog['content'])),0,200); ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0 minimal-ui"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link href="__PUBLIC__/mobile/css/style.css"     		 rel="stylesheet" type="text/css">
<link href="__PUBLIC__/mobile/css/framework.css" 		 rel="stylesheet" type="text/css">
<link href="__PUBLIC__/mobile/css/owl.theme.css" 		 rel="stylesheet" type="text/css">
<link href="__PUBLIC__/mobile/css/swipebox.css"		 rel="stylesheet" type="text/css">
<link href="__PUBLIC__/mobile/css/font-awesome.css"	 rel="stylesheet" type="text/css">
<link href="__PUBLIC__/mobile/css/animate.css"			 rel="stylesheet" type="text/css">
<script type="text/javascript" src="__PUBLIC__/mobile/js/jqueryui.js"></script>
<script type="text/javascript" src="__PUBLIC__/mobile/js/framework.plugins.js"></script>
<script type="text/javascript" src="__PUBLIC__/mobile/js/custom.js"></script>
<style type="text/css">
<!--
img{
	max-width:100%;
	height:auto;
}
-->
</style>
</head>
<body>
<div class="all-elements">
    <div class="snap-drawers">
		<?php include(THEME_PATH . "nav.php"); ?>
    <div id="content" class="snap-content">
		<br><br><br>
        <div class="content">
            <div class="container large-title no-bottom">
			<!--<div class="alert alert-danger alert-dismissible fade in" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
				  <span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;<strong>额...好像哪里出错了！</strong><br> 手机页面暂时无法显示本文图片，请使用电脑查看本文图片吧！。
			</div>-->
			<div class="panel panel-info">
				  <div class="panel-body">
					  <div align=middle><span class="label label-info">
					  <span class="glyphicon glyphicon-<?php 
						$classesmodel = D("classes");
						$classwhere = array(
							'name'=>$blog['class'],
						);
						$class2 = $classesmodel->where($classwhere)->select();
						$class = $class2[0];
						echo $class['icon'];
						?>" aria-hidden="true"></span>&nbsp;
					  <?php if($blog['class']){echo $blog['class'];}else{echo '未分类';} ?></span><h1><b><?php echo $blog['title'];?></b></h1></div>
					  <div align=middle>
					    <p>
						  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;作者/投稿人：<?php echo $blog['author']; ?><br>
						  <span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;创建时间：<?php echo date("Y-m-d H:i:s",$blog['intime']);?><br>
						  <span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;修改时间：<?php echo date("Y-m-d H:i:s",$blog['uptime']); ?><br>
						  <!--
						  <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;阅读：<?php echo $blog['read']; ?>&nbsp;
						  <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;点赞：<?php echo $blog['zan']; ?>&nbsp;
						  <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;评论：<?php echo $blog['msg']; ?>
						  -->
						  </p>
					  </div>
						</br>
						<?php echo html_entity_decode($blog['content']); ?>
				  </div>
				</div>
				<div align=middle>
					<div class="btn-group" role="group">
						<span><a href="/">
						  <button type="button" class="btn btn-info btn-sm">
						  <span class="glyphicon glyphicon-eye-open" aria-hidden="true">&nbsp;<?php echo $blog['read']; ?>
						  </button>
						</a></span>
						<span><a href="<?php echo U('/Mobile/Index/zan'); ?>?pid=<?php echo $blog['pid']; ?>">
						  <button type="button" class="btn btn-danger btn-lg">
							 <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true">&nbsp;<?php echo $blog['zan']; ?>
						  </button>
						</a></span>
						<span><a href="#msg">
						  <button type="button" class="btn btn-success btn-sm">
							 <span class="glyphicon glyphicon-comment" aria-hidden="true">&nbsp;<?php echo $blog['msg']; ?>
						  </button>
						</a></span>
					</div>
				</div>
				<br>
				<div class="alert alert-info" role="alert">
				  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				  <span class="sr-only">警告:</span>
				  本网站所有文章如无特别注明均为原创或用户主动投稿。本文作者/投稿人：<?php echo $blog['author']; ?> ，转载需经过本文作者同意 。
				</div>
				<div class="panel panel-info">
				  <div class="panel-heading"><a name="msg"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;评论</a></div>
					    <div class="panel-body">
						<div class="panel panel-default">
						  <div class="panel-body">
								<?php if(session('username') == false){ ?>
									<a href="<?php echo U("/Mobile/Login/index");?>">
									<div style="float:left;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;游客，请登录。<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></div>
									</a>
								<?php }else{ ?>
									<div style="float:left;"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;
									<?php echo session('username') ?></div>
								<?php } ?>
								<br>
								<form action="<?php echo U('/Mobile/Index/msg');?>?pid=<?php echo $blog['pid']?>" method="post">
									<textarea name="msg" class="form-control" style="height:100px;"><?php echo $valmsg; ?></textarea>
										<a href="<?php echo U('/Mobile/Index/read');?>?pid=<?php echo $blog['pid']?>">&nbsp;<img width="100%" height="20%" alt="验证码" src="{:U('Home/Index/verify',array())}"></a><br>
										<input type="text" name='code' class="login-username" placeholder="此处输入验证码">
									<br>
									<input class="btn btn-success btn-sm" type='submit' value='发表评论' style="float:right;" />
								</form>
						  </div>
						</div>
						  <ul class="list-group">
							<?php
							foreach( $msgs as $msg){
								date_default_timezone_set("Asia/Hong_Kong");
								$t = date("Y年m月d日 H:i:s",$msg['time']);
							?>
								<li class="list-group-item">
									<span style="float:left;"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;<?php echo $msg['user'];?></span><br>
									<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;<?php echo $msg['msg'];?><br>
									<span style="float:left;"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;<?php echo $t;?></span>
									<span style="float:right;">
									<a href="<?php echo U('/Mobile/Index/msgzan'); ?>?pid=<?php echo $blog['pid']?>&mid=<?php echo $msg['mid']; ?>">
									<button type="button" class="btn btn-info btn-xs">
									  <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;<?php echo $msg['msgzan']?>
									</button>
									</a>
									</span>
									<br><br>
								</li>
							<?php } ?>
						  </ul>
				  </div>
				  <div class="panel-footer" align=right>声明：用户在评论区发表的言论仅代表用户个人观点，并不代表本站立场。</div>
				</div>
			</div>
			 </div> 
			</div>
        <div class="footer">
            <div class="footer-socials half-bottom">
            </div>
            <p class="center-text"><?php include("Public/footer/footer.php"); ?></p>
        </div>       
    </div>
</div>
</body>
