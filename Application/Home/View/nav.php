<nav class="navbar navbar-inverse">
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
        <li class="active"><a href="<?php echo U("/Home/Index/index");?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;首页<span class="sr-only">(current)</span></a></li>
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

	  <form name="f1" class="navbar-form navbar-left" onsubmit="return g(this)" target="_blank">
		<div class="form-group">
		  <input type="text" name="word" class="form-control" onfocus="checkHttps" placeholder="站内搜索" maxlength="100">
		</div>
		<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;搜索</button><br>
		<input name="tn" type="hidden" value="SE_zzsearchcode_shhzc78w">
		<input name="cl" type="hidden" value="3">
		<input name="ct" type="hidden">
		<input name="si" type="hidden" value="<?php echo $_SERVER['HTTP_HOST']; ?>">
		<div class="mt10">
		<input name="s" type="hidden"><input name="s" type="hidden" checked>
		</div>
	  </form>
		<script src="http://s1.bdstatic.com/r/www/cache/global/js/BaiduHttps_20150714_zhanzhang.js"></script>
		<script>
			function checkHttps () {
				BaiduHttps.useHttps();
			};
			function g(formname) {
				var data = BaiduHttps.useHttps();
				var url = '';
				url = data.s == 0 ? "http://www.baidu.com/baidu" : 'https://www.baidu.com/baidu' + '?ssl_s=1&ssl_c' + data.ssl_code;
				if (formname.s[1].checked) {
					formname.ct.value = "2097152";
				}
				else {
					formname.ct.value = "0";
				}
				formname.action = url;
				return true;
			};
		</script>
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
			<li><a href="<?php echo U("/User/Changepw/index");?>"><span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>&nbsp;修改密码</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo U("/User/Login/index");?>"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;切换账号</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo U("/User/Login/logout");?>"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;退出</a></li>
          </ul>
        </li>
		<?php
		}else{
		?>
		<li><a href="<?php echo U("/User/Register/index");?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;注册</a></li>
		<li><a href="<?php echo U("/User/Login/index");?>"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;登录</a></li>
		<?php
		}
		?>
      </ul>
    </div>
  </div>
</nav>