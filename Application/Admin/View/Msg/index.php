<!DOCTYPE html>
<html>
	<head>
		<title>评论管理面板</title>
			<script src="/Public/js/jquery-3.1.1.min.js"></script>
			<link rel="stylesheet" href="/Public/bootstrap/css/bootstrap.css" />
			<script src="/Public/bootstrap/js/bootstrap.js"></script>
			<script>
			function wsug(e, str){
				var oThis = arguments.callee;
				if(!str) {
					oThis.sug.style.visibility = 'hidden';
					document.onmousemove = null;
					return;
				}		
				if(!oThis.sug){
					var div = document.createElement('div'), css = 'top:0; left:0; position:absolute; z-index:100; visibility:hidden';
						div.style.cssText = css;
						div.setAttribute('style',css);
					var sug = document.createElement('div'), css= 'font:normal 12px/16px "宋体"; white-space:nowrap; color:#666; padding:3px; position:absolute; left:0; top:0; z-index:10; background:#f9fdfd; border:1px solid #0aa';
						sug.style.cssText = css;
						sug.setAttribute('style',css);
					var dr = document.createElement('div'), css = 'position:absolute; top:3px; left:3px; background:#333; filter:alpha(opacity=50); opacity:0.5; z-index:9';
						dr.style.cssText = css;
						dr.setAttribute('style',css);
					var ifr = document.createElement('iframe'), css='position:absolute; left:0; top:0; z-index:8; filter:alpha(opacity=0); opacity:0';
						ifr.style.cssText = css;
						ifr.setAttribute('style',css);
					div.appendChild(ifr);
					div.appendChild(dr);
					div.appendChild(sug);
					div.sug = sug;
					document.body.appendChild(div);
					oThis.sug = div;
					oThis.dr = dr;
					oThis.ifr = ifr;
					div = dr = ifr = sug = null;
				}
				var e = e || window.event, obj = oThis.sug, dr = oThis.dr, ifr = oThis.ifr;
				obj.sug.innerHTML = str;
				var w = obj.sug.offsetWidth, h = obj.sug.offsetHeight, dw = document.documentElement.clientWidth||document.body.clientWidth; dh = document.documentElement.clientHeight || document.body.clientHeight;
				var st = document.documentElement.scrollTop || document.body.scrollTop, sl = document.documentElement.scrollLeft || document.body.scrollLeft;
				var left = e.clientX +sl +17 + w < dw + sl && e.clientX + sl + 15 || e.clientX +sl-8 - w, top = e.clientY + st + 17;
				obj.style.left = left+ 10 + 'px';
				obj.style.top = top + 10 + 'px';
				dr.style.width = w + 'px';
				dr.style.height = h + 'px';
				ifr.style.width = w + 3 + 'px';
				ifr.style.height = h + 3 + 'px';
				obj.style.visibility = 'visible';
				document.onmousemove = function(e){
					var e = e || window.event, st = document.documentElement.scrollTop || document.body.scrollTop, sl = document.documentElement.scrollLeft || document.body.scrollLeft;
					var left = e.clientX +sl +17 + w < dw + sl && e.clientX + sl + 15 || e.clientX +sl-8 - w, top = e.clientY + st +17 + h < dh + st && e.clientY + st + 17 || e.clientY + st - 5 - h;
					obj.style.left = left + 'px';
					obj.style.top = top + 'px';
				}
			}</script>
	</head>
	<body>
		<?php include(THEME_PATH . "nav.php"); ?>
		<div class="container">
			<div class="page-header">
			  <h1>评论管理面板
				  <small class="pull-right">
					  <a href="<?php echo U("/Admin/Msg/index");?>" class="btn btn-success">刷新</a>
				  </small>
			  </h1>
			</div>
			<table class="table table-hover">
			  <thead>
				<tr>
				  <th><span class="label label-default">mid</span></th>
				  <th><span class="label label-default">pid</span></th>
				  <th><span class="label label-primary">作者</span></th>
				  <th><span class="label label-danger">点赞</span></th>
				  <th><span class="label label-primary">添加时间</span></th>
				  <th><span class="label label-success">预览</span></th>
				  <th><span class="label label-warning">查看</span></th>
				  <th><span class="label label-danger">删除</span></th>
				</tr>
			  </thead>
			  <tbody>
			      <?php foreach( $msgs as $msg ): ?>
					<tr>
					  <th scope="row"><span class="label label-default"><?php echo $msg['mid']; ?></span></th>
					  <td><span class="label label-default"><?php echo $msg['pid']; ?></span></td>
					  <td><span class="label label-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;<?php echo mb_substr($msg['user'],0,15); ?>...</span></td>
					  <td><span class="label label-danger"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;<?php echo $msg['msgzan']; ?></span></td>
					  <td><span class="label label-primary"><span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;<?php echo date("Y-m-d H:i:s",$msg['time']); ?></span></td>
					  <td><a href="<?php echo U("/Admin/Msg/read"); ?>?mid=<?php echo $msg['mid']; ?>" onmouseover="wsug(event, '<?php echo $msg['msg']; ?>')" onmouseout="wsug(event, 0)" class="btn btn-success btn-xs" target="_blank"><span class="glyphicon glyphicon-sunglasses" aria-hidden="true"></span>&nbsp;预览</a></td>
					  <td><a href="<?php echo U('/Home/Index/read'); ?>?pid=<?php echo $msg['pid']; ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>&nbsp;查看</a></td>	
					  <td><a href="<?php echo U("/Admin/Msg/delete"); ?>?mid=<?php echo $msg['mid']; ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;删除</a></td>
					</tr>
				  <?php endforeach; ?>
			  </tbody>
			</table>
			<div align=right>
				<?php echo $show; ?>
			</div>
		</div>
	</body>
</html>
