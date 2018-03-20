<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?php echo config('meta_desc'); ?>">
	<title><?php echo config('site_name'); ?></title>

	<!-- Bootstrap -->
	<?php if(config('back_theme') == "Default"): ?>
	<link rel="stylesheet" href="<?php echo base_url() . 'bootstrap/css/bootstrap.min.css'; ?>">
	<?php else: ?>
	<link rel="stylesheet" href="http://bootswatch.com//<?php echo strtolower(config('back_theme')); ?>/bootstrap.min.css">
	<?php endif; ?>
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
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
			  	<nav class="navbar navbar-inverse" role="navigation">
					  <div class="container-fluid">
					    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					      <?php echo anchor(site_url(),config('site_name') , 'class="navbar-brand"'); ?>
					    </div>

					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<?php if($loged_in == TRUE):  ?>
						  <ul class="nav navbar-nav">
								<li><?php echo anchor('admin/panel','Panel admina '); ?></li>
								<li><?php echo anchor('admin/users','Użytkownicy '); ?></li>
								<li><?php echo anchor('admin/blog','Blog '); ?></li>
								<li><?php echo anchor('admin/gallery','Galeria '); ?></li>
								<!-- <li><?php echo anchor('admin/comments','Komentarze '); ?></li> -->
								<li><?php echo anchor('admin/pages','Lista stron '); ?></li>
								<!-- <li><?php echo anchor('admin/shop','Sklep '); ?></li> -->
						  </ul>		
								<p class="navbar-text navbar-right">
									<span class="glyphicon glyphicon-off"></span>
									<?php echo anchor('admin/panel/logout','Wyloguj ', 'class="navbar-link"'); ?>
								</p>
							<?php endif; ?>
					      
					    </div><!-- /.navbar-collapse -->
					  </div><!-- /.container-fluid -->
				</nav>
			</div>
		</div>
	</div>