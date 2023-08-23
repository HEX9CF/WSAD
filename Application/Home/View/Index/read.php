<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $blog['title']; ?></title>
		<script src="__PUBLIC__/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="__PUBLIC__/bootstrap/css/bootstrap.css" />
		<script src="__PUBLIC__/bootstrap/js/bootstrap.js"></script>
		<meta name="title" content="<?php echo $blog['title']; ?>" />
		<meta name="keywords" content="<?php $con = strip_tags(html_entity_decode($blog['title'])); include("Public/keyword/index.php");$keywords = get_keywords_str($con); echo $keywords;?>" />
		<meta name="description" content="<?php echo mb_substr(strip_tags(html_entity_decode($blog['content'])),0,200); ?>" />
		<meta property="og:type" content="article"/>
		<meta property="og:image" content="<?php echo $blog['img'];?>"/>
		<meta property="og:release_date" content="<?php echo date("Y年m月d日 H:i:s",$blog['intime']); ?>"/>
		<meta property="og:title" content="<?php echo $blog['title']; ?>"/>
		<meta property="og:description" content="<?php echo mb_substr(strip_tags(html_entity_decode($blog['content'])),0,200); ?>"/>
	</head>
	<body>
		<div class="container">
			<?php if($set['logo']){?>
			<?php include(THEME_PATH . "nav.php"); ?>
				<div class="page-header">
				  <div align=left><h1><img class='media-object' alt='<?php echo $set['title'];?>' src='<?php echo $set['logo'];?>' data-holder-rendered='true'></h1></div>
				</div>
			<?php }else{ ?>
			<?php include(THEME_PATH . "nav.php"); ?>
				<div class="jumbotron">
				  <h1><?php echo $set['title'];?></h1>
				  <p><?php echo $set['intro'];?></p>
				</div>
			<?php } ?>
			<?php include(THEME_PATH . "nav2.php"); ?><br>
			<ol class="breadcrumb">
				 <li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;首页</a></li>
				 <li><a href="/"><span class="glyphicon glyphicon-<?php 
					$classesmodel = D("classes");
					$classwhere = array(
						'name'=>$blog['class'],
					);
					$class2 = $classesmodel->where($classwhere)->select();
					$class = $class2[0];
					echo $class['icon'];
					?>" aria-hidden="true"></span>&nbsp;<?php if($blog['class']){echo $blog['class'];}else{echo '未分类';} ?></a></li>
				 <li class="active"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>&nbsp;<?php echo strip_tags($blog['title']); ?></li>
			</ol>
			<div class="col-md-12">
				<div class="panel panel-info">
				  <div class="panel-heading"><span class="label label-info">
				  <span class="glyphicon glyphicon-<?php 
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
					  <div align=middle><h3><b><?php if($blog['top'] == 'true'){ ?> <span class="label label-danger"><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>&nbsp;置顶</span>&nbsp;<?php } ?><?php echo $blog['title'];?></b></h1></div>
					  <div align=middle>
					    <p>
							<span class="label label-info"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;作者：<?php echo $blog['author']; ?></span>&nbsp;&nbsp;
						</p>
						<p>
						  <span class="label label-info"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;阅读：<?php echo $blog['read']; ?></span>&nbsp;&nbsp;
						  <span class="label label-info"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;点赞：<?php echo $blog['zan']; ?></span>&nbsp;&nbsp;
						  <span class="label label-info"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;评论：<?php echo $blog['msg']; ?></span>&nbsp;&nbsp;
						</p>
						<p>
						  <span class="label label-info"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span>&nbsp;关键词:&nbsp;<?php echo $keywords;?></span>
						  <span class="label label-info"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;创建时间：<?php echo date("Y-m-d H:i:s",$blog['intime']); ?></span>&nbsp;&nbsp;
						  <span class="label label-info"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;修改时间：<?php echo date("Y-m-d H:i:s",$blog['uptime']); ?></span>
						  </p>
					  </div>
						</br>
						<?php echo html_entity_decode($blog['content']); ?><br>
				  </div>
				</div>
			
				<div align=middle>
					<div class="btn-group" role="group">

						<a href="/">
						  <button type="button" class="btn btn-info btn-lg">
						  <span class="glyphicon glyphicon-eye-open" aria-hidden="true">&nbsp;<?php echo $blog['read']; ?>
						  </button>
						</a>

						<a href="<?php echo U('/Home/Index/zan'); ?>?pid=<?php echo $blog['pid']; ?>">
						  <button type="button" class="btn btn-danger btn-lg">
							 <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true">&nbsp;<?php echo $blog['zan']; ?>
						  </button>
						</a>

						<a href="#msg">
						  <button type="button" class="btn btn-success btn-lg">
							 <span class="glyphicon glyphicon-comment" aria-hidden="true">&nbsp;<?php echo $blog['msg']; ?>
						  </button>
						</a>
					</div>
				</div>
				</br>
				<div class="alert alert-info" role="alert">
				  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				  <span class="sr-only">警告:</span>
				  本网站所有文章如无特别注明均为原创或用户主动投稿。本文作者：<?php echo $blog['author']; ?> ，转载需经过本文作者同意 。
				</div>
				</br>
				<div class="panel panel-info">
				  <div class="panel-heading"><a name="msg"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;评论</a></div>
					    <div class="panel-body">
						<div class="panel panel-default">
						  <div class="panel-body">
								<form action="<?php echo U('/Home/Index/msg');?>?pid=<?php echo $blog['pid']?>" method="post">
									<?php if(session('username') == false){ ?>
										<div style="float:left;">
										<button type="button" class="btn btn-sm" data-toggle="modal" data-target="#login">
										  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;游客，请登录。<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
										</button>
										</div>
										<br>
									<?php }else{ ?>
										<div style="float:left;"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;
										<?php echo session('username') ?></div><br>
									<?php } ?>
									<textarea name="msg" class="form-control" style="height:150px;"><?php echo $valmsg; ?></textarea></br>
									<div class="panel panel-default" style="float:left;"><div class="panel-body">
										<input type="text" name='code' placeholder="此处输入验证码">
									    <a href="<?php echo U('/Home/Index/read');?>?pid=<?php echo $blog['pid']?>">&nbsp;<img width="100" height="30" alt="验证码" src="{:U('Home/Index/verify',array())}"></a>
									</div></div><br>
									<input class="btn btn-success" type='submit' value='发表评论' style="float:right;" />
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
									<span style="float:left;"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;<?php echo $msg['user'];?></span>
									<span style="float:right;"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;<?php echo $t;?></span>
									<div style="clear:both;"></div></br>
									<span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;<?php echo $msg['msg'];?>
									<span style="float:right;"><a href="<?php echo U('/Home/Index/msgzan'); ?>?pid=<?php echo $blog['pid']?>&mid=<?php echo $msg['mid']; ?>">
									<button type="button" class="btn btn-info btn-xs">
									  <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;<?php echo $msg['msgzan']?>
									</button>
									</a>
								</li>
							<?php } ?>
						  </ul>
				  </div>
				  <div class="panel-footer" align=right>声明：用户在评论区发表的言论仅代表用户个人观点，并不代表本站立场。</div>
				</div>
			</div>
			<?php include("Public/foot/foot.php"); ?>
		</div>

		<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">登录</h4>
			  </div>
			  <div class="modal-body">
			<form action="<?php echo U('/User/Login/index?act=chk');?>" method="post">
			  <div class="form-group">
				<label for="exampleInputEmail1">账号</label>
				<input type="text" name='username' class="form-control" placeholder="此处输入用户名" value="<?php echo $valuser ?>">
			  </div>
			  <div class="form-group">
				<label for="exampleInputPassword1">密码</label>
				<input type="password" name='userpw'  class="form-control" placeholder="此处输入密码" value="<?php echo $valpw ?>">
			  </div>
			  <div class="form-group">
				<label for="exampleInputEmail1">验证码</label>
				<div class="input-group">
				  <input type="text" name='code'  class="form-control" height="50" placeholder="此处输入验证码">
				  <div class="input-group-addon"><img width="200" height="50" alt="验证码" src="{:U('User/Login/verify',array())}"></div>
				</div>
			  </div>
			  <div class="checkbox" align=right>
				<label>
				  <input type="checkbox" name='rem'> 记住我
				</label>
			  </div>
			  </div>
			  <div class="modal-footer">
			  <div style="float:left;">
			  <ul class="nav nav-pills">
				<li role="presentation"><a href="<?php echo U('/User/Register/index');?>">没有账号？立即注册！</a></li>
			  </ul>
			  </div>
				<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
				<a href="<?php echo U("/Home/Login/forgotpw");?>" class="btn btn-warning">忘记密码？</a>
				<button type="submit" class="btn btn-success">提交表单</button>
			  </div>
			  </form>
			</div>
		  </div>
		</div>

		<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">注册</h4>
			  </div>
			  <div class="modal-body">
				<form action="<?php echo U('/User/Register/index?act=chk');?>" method="post">
				  <div class="form-group">
					<label for="exampleInputEmail1">用户名</label>
					<input type="text" name='username' class="form-control" placeholder="此处输入用户名" value="<?php echo $valuser ?>">
				  </div>
				  <div class="form-group">
					<label for="exampleInputPassword1">电子邮箱</label>
					<input type="email" name='email'  class="form-control" placeholder="此处输入电子邮箱地址" value="<?php echo $valemail ?>">
				  </div>
				  <div class="form-group">
					<label for="exampleInputPassword1">新密码</label>
					<input type="password" name='userpw'  class="form-control" placeholder="此处输入密码" value="<?php echo $valpw ?>">
				  </div>
				  <div class="form-group">
					<label for="exampleInputPassword1">再输入一次新密码</label>
					<input type="password" name='userpw2'  class="form-control" placeholder="此处输入密码" value="<?php echo $valpw2 ?>">
				  </div>
				  <div class="form-group">
					<label for="exampleInputEmail1">验证码</label>
					<div class="input-group">
					  <input type="text" name='code'  class="form-control" height="50" placeholder="此处输入验证码">
					  <div class="input-group-addon"><img width="200" height="50" alt="验证码" src="{:U('/User/Register/verify',array())}"></div>
					</div>
				  </div>
			  </div>
			  <div class="modal-footer">
			  	<div style="float:left;">
					  <ul class="nav nav-pills">
						<li role="presentation"><a href="<?php echo U('/User/Login/index');?>">已有账号？立即登录！</a></li>
					  </ul>
				 </div>
				<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
				<button type="submit" class="btn btn-success">申请账号</button>
			  </div>
			  </form>
			</div>
		  </div>
		</div>

	</body>
</html>
<script>window._bd_share_config={"common":{"bdSnsKey":{"tsina":"<?php echo $blog['title'];?>","tqq":"<?php echo $blog['title'];?>","t163":"<?php echo $blog['title'];?>","tsohu":"<?php echo $blog['title'];?>"},"bdText":"<?php echo $blog['title'];?>","bdMini":"2","bdMiniList":false,"bdPic":"<?php echo $blog['img'];?>","bdStyle":"0","bdSize":"16"},"slide":{"type":"slide","bdImg":"6","bdPos":"right","bdTop":"100"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>