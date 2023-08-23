<nav class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  <a class="navbar-brand" href="/">
        <img alt="icon" src="/favicon.ico">
      </a>
      <a class="navbar-brand" href="/">
	  <?php echo $set['title'];?>
	  </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo U("/Mobile/Index/index");?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;首页<span class="sr-only">(current)</span></a></li>
        <li><a href="<?php echo U("/User/Submit/index");?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;投稿</a></li>
        <!--
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#"></a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#"></a></li>
          </ul>
        </li>
		-->
      </ul>
      <ul class="nav navbar-nav navbar-right">
		<?php 
		if(!session('uid') == false){
		?>
		  <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;<?php echo session('username'); ?><span class="caret"></span></a>
          <ul class="dropdown-menu">

		    <?php if($set['submit']){ ?>
			<li><a href="<?php echo U("/User/Submit/index");?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;投稿</a></li>
            <li role="separator" class="divider"></li>
			<?php } ?>
			<li><a href="<?php echo U("/Mobile/Changepw/index");?>"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>&nbsp;修改密码</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo U("/Mobile/Login/index");?>"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;切换账号</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo U("/Mobile/Login/logout");?>"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;退出</a></li>
          </ul>
        </li>
		<?php
		}else{
		?>
		<li><a href="<?php echo U("/Mobile/Register/index");?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;注册</a></li>
		<li><a href="<?php echo U("/Mobile/Login/index");?>"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;登录</a></li>
		<?php
		}
		?>
      </ul>
    </div>
  </div>
</nav>