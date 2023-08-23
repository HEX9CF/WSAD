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
				<div class="item<?php if($active == true){ echo ' active';}?>" style='width: 100%; height: 100%;'>
					<a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . U('/Home/Index/read'); ?>?pid=<?php echo $slide['pid']; ?>">
					  <img alt="<?php echo $slide['title']; ?>" style='width: 100%; height: 100%;' src="<?php echo $slide['img']; ?>" data-holder-rendered="true" class="img-thumbnail">
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
	</body>
</html>