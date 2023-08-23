<!DOCTYPE html>
<html>
<head>
    <title><?php echo $set['title']; ?>&nbsp;-&nbsp;账号注册</title>
    <script src="__PUBLIC__/js/jquery-3.1.1.min.js"></script>
    <link rel="stylesheet" href="__PUBLIC__/bootstrap/css/bootstrap.css"/>
    <script src="__PUBLIC__/bootstrap/js/bootstrap.js"></script>
</head>
<body>
<div class="container">
    <?php include("./Application/Home/View/nav.php"); ?>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel panel-info" style="margin-top:50px;">
            <ul class="nav nav-tabs">
                <li role="presentation" class="active"><a href="<?php echo U("/User/Register/index"); ?>">注册</a></li>
                <li role="presentation"><a href="<?php echo U("/User/Login/index"); ?>">登录</a></li>
<!--                <li role="presentation"><a href="--><?php //echo U("/User/Login/forgotpw"); ?><!--">找回密码</a></li>-->
            </ul>
            <div class="panel-body">
                <form action="<?php echo U('/User/Register/index?act=chk'); ?>" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">用户名</label>
                        <input type="text" name='username' class="form-control" placeholder="此处输入用户名"
                               value="<?php echo $valuser ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">电子邮箱</label>
                        <input type="email" name='email' class="form-control" placeholder="此处输入电子邮箱地址"
                               value="<?php echo $valemail ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">新密码</label>
                        <input type="password" name='userpw' class="form-control" placeholder="此处输入密码"
                               value="<?php echo $valpw ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">再输入一次新密码</label>
                        <input type="password" name='userpw2' class="form-control" placeholder="此处输入密码"
                               value="<?php echo $valpw2 ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">验证码</label>
                        <div class="input-group">
                            <input type="text" name='code' class="form-control" height="50"
                                   placeholder="此处输入验证码">
                            <div class="input-group-addon"><a href="<?php echo U('/User/Register/index') ?>"><img
                                            width="200" height="50" alt="验证码"
                                            src="{:U('/User/Register/verify',array())}"></a></div>
                        </div>
                    </div>
                    <div style="float:left;">
                        <ul class="nav nav-pills">
                            <li role="presentation"><a
                                        href="<?php echo U('/User/Login/index'); ?>">已有账号？立即登录！</a></li>
                        </ul>
                    </div>
                    <div style="float:right;">
                        <a href="<?php echo U("/Home/Index/index"); ?>" class="btn btn-danger">返回首页</a>
                        <button type="submit" class="btn btn-success">申请账号</button>
                    </div>
                </form>
            </div>
            <div class="panel-footer text-right"><?php echo $set['title']; ?></div>
        </div>
    </div>
</div>
</body>
</html>