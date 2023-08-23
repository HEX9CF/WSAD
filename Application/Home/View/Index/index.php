<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $set['title'];?>&nbsp;-&nbsp;<?php echo $_SERVER['HTTP_HOST']; ?></title>
		<script src="__PUBLIC__/js/jquery-3.1.1.min.js"></script>
		<link rel="stylesheet" href="__PUBLIC__/bootstrap/css/bootstrap.css" />
		<script src="__PUBLIC__/bootstrap/js/bootstrap.js"></script>
		<meta name="title" content="<?php echo $set['title'];?>" />
		<meta name="keywords" content="<?php echo $set['keywords'];?>" />
		<meta name="description" content="<?php echo $set['intro'];?>..." />
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
		<div class="container">
		<?php if($set['logo']){?>
		<?php include(THEME_PATH . "nav.php"); ?>
			<div class="page-header">
			  <div align=left><h1><a href="/"><img class='media-object' alt='<?php echo $set['title'];?>' src='<?php echo $set['logo'];?>' data-holder-rendered='true'></a></h1></div>
			</div>
		<?php }else{ ?>
		<?php include(THEME_PATH . "nav.php"); ?>
			<div class="jumbotron">
			  <h1><a href="/"><?php echo $set['title'];?></a></h1>
			  <p><?php echo $set['intro'];?></p>
			</div>
		<?php } ?>
		<?php include(THEME_PATH . "nav2.php"); ?><br>
			<ol class="breadcrumb">
				 <li class="active"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;首页</li>
			</ol>
			<div class="col-md-8">
				<?php 
				if($blogs == false){?>
					<div align=middle>
						站长很懒，这里什么也没有。。。。。。
					</div>
				<?php }?>
				<?php if($slides){ ?>
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
							<a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . U('/Home/Index/read'); ?>?pid=<?php echo $slide['pid']; ?>">
							  <img alt="<?php echo $slide['title']; ?>" style='width: 100%; height: 300px;' src="<?php echo $slide['img']; ?>" data-holder-rendered="true" class="img-thumbnail">
							  <div class="carousel-caption" style="opacity:0.5; filter: alpha(opacity=50); background-color:#000;">
								<h5><b><?php echo mb_substr($slide['title'],0,20); ?></b></h5>
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
				<?php foreach( $tops as $top ): ?>
					<a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . U('/Home/Index/read'); ?>?pid=<?php echo $top['pid']; ?>">
						<div class="panel panel-danger">
							<div class="panel-body">
								<div class="media">
									<?php
									//判断此博客是否设置封面图片
									if(!$top['img'] == false){
									//若有，将调用有图片框模板
									?>
										<div class='media-left'>
											  <img class='media-object' alt='<?php echo $top['title']; ?>' src='<?php echo $top['img']; ?>' data-holder-rendered='true' style='width: 200px; height: 150px;' class="img-thumbnail">
										</div>
										<div class="media-body">
										<p><span class="label label-info"><span class="glyphicon glyphicon-<?php 
										$classesmodel = D("classes");
										$classwhere = array(
											'name'=>$top['class'],
										);
										$class2 = $classesmodel->where($classwhere)->select();
										$class = $class2[0];
										echo $class['icon'];
										?>" aria-hidden="true"></span>&nbsp;
										 <?php if($top['class']){echo $top['class'];}else{echo '未分类';} ?></span>
										<b><?php echo mb_substr($top['title'],0,25); ?>&nbsp;<span class="label label-danger"><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>&nbsp;置顶</span></b></h4></p><p>
										<span class="label label-primary"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;<?php echo date("Y-m-d H:i:s",$top['intime']); ?></span>
										<span class="label label-primary"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;人气(<?php echo $top['read']; ?>)</span>
										<span class="label label-primary"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;赞(<?php echo $top['zan']; ?>)</span>
										<span class="label label-primary"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;评论(<?php echo $top['msg']; ?>)</span></p>
										<p><?php echo mb_substr(strip_tags(html_entity_decode($top['content'])),0,125); ?>......</p>
									  </div>
										<?php 
										}else{
										//若没有，调用无图片框模板
										?>
										<div class="media-body">
										<h4 class="media-heading">
										<span class="label label-info"><span class="glyphicon glyphicon-<?php 
										$classesmodel = D("classes");
										$classwhere = array(
											'name'=>$top['class'],
										);
										$class2 = $classesmodel->where($classwhere)->select();
										$class = $class2[0];
										echo $class['icon'];
										?>" aria-hidden="true"></span>&nbsp;
										 <?php if($top['class']){echo $top['class'];}else{echo '未分类';} ?></span>
										<b><?php echo mb_substr($top['title'],0,25); ?></b>&nbsp;<span class="label label-danger"><span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>&nbsp;置顶</span></h4>
										<?php echo mb_substr(strip_tags(html_entity_decode($top['content'])),0,200); ?>......<br>
										<span class="label label-primary"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;<?php echo date("Y-m-d H:i:s",$top['intime']); ?></span>
										<span class="label label-primary"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;人气(<?php echo $top['read']; ?>)</span>
										<span class="label label-primary"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;赞(<?php echo $top['zan']; ?>)</span>
										<span class="label label-primary"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;评论(<?php echo $top['msg']; ?>)</span>
									  </div>
										<?php
										}
										?>
									</div>
								</div>
							</div>
						</a>
				<?php endforeach; ?>
				<?php foreach( $blogs as $blog ): ?>
					<a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . U('/Home/Index/read'); ?>?pid=<?php echo $blog['pid']; ?>">
						<div class="panel panel-info">
							<div class="panel-body">
								<div class="media">
									<?php
									//判断此博客是否设置封面图片
									if(!$blog['img'] == false){
									//若有，将调用有图片框模板
									?>
										<div class='media-left'>
											  <img class='media-object' alt='<?php echo $blog['title']; ?>' src='<?php echo $blog['img']; ?>' data-holder-rendered='true' style='width: 200px; height: 150px;' class="img-thumbnail">
										</div>
										<div class="media-body">
										<p><span class="label label-info"><span class="glyphicon glyphicon-<?php 
										$classesmodel = D("classes");
										$classwhere = array(
											'name'=>$blog['class'],
										);
										$class2 = $classesmodel->where($classwhere)->select();
										$class = $class2[0];
										echo $class['icon'];
										?>" aria-hidden="true"></span>&nbsp;
										 <?php if($blog['class']){echo $blog['class'];}else{echo '未分类';} ?></span>
										<b><?php echo mb_substr($blog['title'],0,25); ?></b></h4></p><p>
										<span class="label label-primary"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;<?php echo date("Y-m-d H:i:s",$blog['intime']); ?></span>
										<span class="label label-primary"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;人气(<?php echo $blog['read']; ?>)</span>
										<span class="label label-primary"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;赞(<?php echo $blog['zan']; ?>)</span>
										<span class="label label-primary"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;评论(<?php echo $blog['msg']; ?>)</span></p>
										<p><?php echo mb_substr(strip_tags(html_entity_decode($blog['content'])),0,125); ?>......</p>
									  </div>
										<?php 
										}else{
										//若没有，调用无图片框模板
										?>
										<div class="media-body">
										<h4 class="media-heading">
										<span class="label label-info"><span class="glyphicon glyphicon-<?php 
										$classesmodel = D("classes");
										$classwhere = array(
											'name'=>$blog['class'],
										);
										$class2 = $classesmodel->where($classwhere)->select();
										$class = $class2[0];
										echo $class['icon'];
										?>" aria-hidden="true"></span>&nbsp;
										 <?php if($blog['class']){echo $blog['class'];}else{echo '未分类';} ?></span>
										<b><?php echo mb_substr($blog['title'],0,25); ?></b></h4>
										<?php echo mb_substr(strip_tags(html_entity_decode($blog['content'])),0,200); ?>......<br>
										<span class="label label-primary"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;<?php echo date("Y-m-d H:i:s",$blog['intime']); ?></span>
										<span class="label label-primary"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;人气(<?php echo $blog['read']; ?>)</span>
										<span class="label label-primary"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;赞(<?php echo $blog['zan']; ?>)</span>
										<span class="label label-primary"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;评论(<?php echo $blog['msg']; ?>)</span>
									  </div>
										<?php
										}
										?>
									</div>
								</div>
							</div>
						</a>
					<?php endforeach; ?>
					<div align=right>
					<?php echo $show; ?>
				</div>
			</div>
			<div class="col-md-4">

				<div class="panel panel-success">
				  <div class="panel-heading"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;欢迎访客</div>
				  <div class="panel-body">
					<div align=middle>
						欢迎，您是本站第<?php echo $vst ;?>位访客
						<?php 
						if(!session('uid')){
						?>
						<br><br>
						<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#register">
						  注册
						</button>
						<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#login">
						  登录
						</button>
						<?php
						}
						?>
					</div>
				  </div>
				</div>

				<div class="panel panel-info">
				  <div class="panel-heading"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>&nbsp;网站简介</div>
				  <div class="panel-body">
					<?php echo $set['intro'];?>
				  </div>
				</div>

				<div class="panel panel-info">
				  <div class="panel-heading"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>&nbsp;网站公告</div>
				  <div class="panel-body">
					<?php echo $set['motd'];?>
				  </div>
				</div>

				<div class="panel panel-info">
				  <div class="panel-heading"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;最新评论</div>
					<ul class="list-group">
					<?php foreach( $newmsgs as $newmsg ):?>
					  <li class="list-group-item">
					  <a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . U('/Home/Index/read'); ?>?pid=<?php echo $newmsg['pid']; ?>">
					  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;<?php echo $newmsg['user'] ?><br>
					  <span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;<?php echo date("Y-m-d H:i:s",$newmsg['time']); ?><br>
					  <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>&nbsp;
					  <?php echo mb_substr(strip_tags(html_entity_decode($newmsg['msg'])),0,18); ?>...<br>
					  </a>
					  </li>
					<?php endforeach;?>
					</ul>
				</div>

				<div class="panel panel-info">
				  <div class="panel-heading"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>&nbsp;联系管理员</div>
				  <div class="panel-body">
					<?php echo $set['admininfo'];?>
				  </div>
				</div>

				<div class="panel panel-info">
				  <div class="panel-heading"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;投稿系统</div>
				  <div class="panel-body">
					<?php if($set['submitintro']){echo $set['submitintro'].'<br><br>';}?>
					<div align=middle><span><a href="<?php echo U("/User/Submit/submit");?>"><button type="button" class="btn btn-success">马上投稿</button></a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><a href="<?php echo U("/User/Submit/index");?>"><button type="button" class="btn btn-info">我的投稿</button></a></span></div>
				  </div>
				</div>

				<div class="panel panel-info">
				  <div class="panel-heading"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;统计数据</div>
					<ul class="list-group">
					  <?php foreach( $nums as $cname=>$val ):?>
						  <li class="list-group-item">
							<span class="badge"><?php echo $val;?></span>
							<span class="label label-info"><?php echo $cname;?></span>
						  </li>
					  <?php endforeach;?>
					  </ul>
				</div>

				<div class="panel panel-info">
				  <div class="panel-heading"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>&nbsp;系统信息</div>
				  <div class="panel-body">
					<div align=middle>
					<a href="<?php echo U("Admin/Index/index"); ?>" class="btn btn-danger" rel="nofollow">网站后台</a>
					<br>
					<br>
					<b>系统版本： <?php include("./v.php"); ?> </b></br>
					<b>© 2016-<?php echo date("Y",time()); ?> HEX9CF</b>
					</div>
				  </div>
				</div>

			</div>
		</div>
		<div class="container">
			<div class="panel panel-info">
			  <div class="panel-heading"><span class="glyphicon glyphicon-link" aria-hidden="true"></span>&nbsp;友情链接</div>
			  <div class="panel-body">
				<div>
					<?php foreach( $link_exchs as $link_exch ): ?>
						<?php if($link_exch['img']){ ?>
							<a href="<?php echo $link_exch['url']; ?>" target="_blank"><img src="<?php echo $link_exch['img']; ?>" border="0" style='width: 88px; height: 31px;' alt="<?php echo $link_exch['name']; ?>"></a>
						<?php }else{ ?>
							<a href="<?php echo $link_exch['url']; ?>"><span class="label label-info"><?php echo $link_exch['name']; ?></span></a>
						<?php } ?>
					<?php endforeach; ?>
					<a href="<?php echo U(""); ?>"><span class="label label-danger">申请友链</span></a>
				</div>
				</br>
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
				<a href="<?php echo U("/User/Login/forgotpw");?>" class="btn btn-warning disabled">忘记密码？</a>
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
<script>window._bd_share_config={"common":{"bdSnsKey":{"tsina":"<?php echo $set['title'];?>","tqq":"<?php echo $set['title'];?>","t163":"<?php echo $set['title'];?>","tsohu":"<?php echo $set['title'];?>"},"bdText":"<?php echo $set['intro']; ?>","bdMini":"2","bdMiniList":false,"bdPic":"http://<?php echo $_SERVER['HTTP_HOST'];?>/favicon.ico","bdStyle":"0","bdSize":"16"},"slide":{"type":"slide","bdImg":"6","bdPos":"right","bdTop":"100"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>