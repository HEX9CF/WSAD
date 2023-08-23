<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo U("/Admin/Index/index"); ?>">Admin</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo U("/Admin/Index/index"); ?>"><span
                                class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;面板首页<span
                                class="sr-only">(current)</span></a></li>
                <li><a href="<?php echo U("/Admin/Blog/index"); ?>"><span class="glyphicon glyphicon-file"
                                                                          aria-hidden="true"></span>&nbsp;文章管理</a>
                </li>
                <li><a href="<?php echo U("/Admin/Msg/index"); ?>"><span class="glyphicon glyphicon-comment"
                                                                         aria-hidden="true"></span>&nbsp;评论管理</a>
                </li>
                <li><a href="<?php echo U("/Admin/Class/index"); ?>"><span class="glyphicon glyphicon-tags"
                                                                           aria-hidden="true"></span>&nbsp;分类管理</a>
                </li>
                <li><a href="<?php echo U("/Admin/Submit/index"); ?>"><span class="glyphicon glyphicon-pencil"
                                                                            aria-hidden="true"></span>&nbsp;审核投稿</a>
                </li>
                <li><a href="<?php echo U("/Admin/Register/index"); ?>"><span class="
glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;注册审核</a></li>
                <li><a href="<?php echo U("/Admin/User/index"); ?>"><span class="glyphicon glyphicon-user"
                                                                          aria-hidden="true"></span>&nbsp;用户设置</a>
                </li>
                <li><a href="<?php echo U("/Admin/Auser/index"); ?>"><span class="glyphicon glyphicon-user"
                                                                           aria-hidden="true"></span>&nbsp;管理员管理</a>
                </li>
                <li><a href="<?php echo U("/Admin/Linkexch/index"); ?>"><span class="glyphicon glyphicon-link"
                                                                              aria-hidden="true"></span>&nbsp;友情链接</a>
                </li>
                <li><a href="<?php echo U("/Admin/Setting/index"); ?>"><span class="
glyphicon glyphicon-cog" aria-hidden="true"></span>&nbsp;系统设置</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><span class="glyphicon glyphicon-user"
                                                   aria-hidden="true"></span>&nbsp;<?php echo session('admin'); ?><span
                                class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo U("/Home/Index/index"); ?>"><span class="glyphicon glyphicon-home"
                                                                                  aria-hidden="true"></span>&nbsp;返回首页</a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo U("/Admin/Login/index"); ?>"><span
                                        class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;切换用户</a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo U("/Admin/Login/logout"); ?>"><span class="glyphicon glyphicon-log-out"
                                                                                    aria-hidden="true"></span>&nbsp;退出</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>