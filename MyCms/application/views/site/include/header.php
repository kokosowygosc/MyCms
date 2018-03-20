<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo config('meta_desc'); ?>">
	<title><?php echo config('site_name'); ?></title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url() . 'bootstrap/css/ekko-lightbox.css'; ?>">
	<?php if(config('front_theme') == "Default"): ?>
	<link rel="stylesheet" href="<?php echo base_url() . 'bootstrap/css/bootstrap.min.css'; ?>">
	<?php else: ?>
	<link rel="stylesheet" href="http://bootswatch.com/<?php echo strtolower(config('front_theme')); ?>/bootstrap.min.css">
	<?php endif; ?>
	<link href="<?php echo base_url() . 'bootstrap/css/jquery.bxslider.css'; ?>" rel="stylesheet" />
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style>
		.gallery .img-thumbnail 
		{
			margin-bottom:25px;
		}
		#popup
		{
			opacity: 0;
			margin-top:10px;
			margin-bottom:-15px;
		}
		.bxslider .image
		{
			max-height: 400px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="navbar navbar-default" role="navigation">
						<img class="img-responsive center-block" src='<?php echo site_url().'images/icons/head.png' ?>'>
					  <div class="container-fluid">
					    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					      <?php echo anchor(site_url()," ", 'class="navbar-brand btn-lg glyphicon glyphicon-home"'); ?>
					    </div>

					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					      <ul class="nav navbar-nav">
					        <li><?php echo anchor(site_url(),' Blog '); ?></li>
							<?php if(config('gallery')=="TAK"): ?>
					        <li><?php echo anchor(base_url() . 'gallery',' Galeria '); ?></li>
							<?php endif; ?>


							<?php if (!empty($pages)): ?>
								<?php foreach($pages as $row): ?>
										<li><?php echo anchor('/page/' . $row->alias, $row->title); ?></li>
								<?php endforeach; ?>
							<?php endif; ?>
							<!-- <li><?php echo anchor(site_url().'shop',' Sklep '); ?></li> -->
					      </ul>
					    
					    <?php if($loged_in==TRUE): ?>
					    <p class="navbar-text navbar-right">Zalogowany jako <a href="/user/index" class="navbar-link"><?php echo $this->session->userdata('name'); ?></a></p>
						<?php else: ?>
						<p class="navbar-text navbar-right navbar-link"><a href="<?php echo base_url(); ?>" class="navbar-link">Zaloguj się</a></p>
						<?php endif; ?>
						<p class="navbar-text navbar-right navbar-link" id="popup"><a href="/cart" class="navbar-link glyphicon glyphicon-shopping-cart btn btn btn-default">Koszyk</a></p>
					    </div><!-- /.navbar-collapse -->
					  </div><!-- /.container-fluid -->
				</nav>
			</div>
		</div>
	</div>

