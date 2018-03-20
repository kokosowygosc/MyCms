<?php include APPPATH.'views/site/include/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-sm-9">

			<?php if (!empty($blog)): ?>
				<?php foreach($blog as $row): ?>
					<h2 class="pull-left" style="margin-left:5px;"><?php echo anchor('article/' . $row->alias, $row->title); ?></h2>
					<h4><span class="label label-info pull-right" style="margin-top:15px;"><span class="glyphicon glyphicon-calendar"></span><?php echo substr(($row->date),0,11); ?></span></h3><br><br><br>
					<?php if($row->front_img != ""): ?>
					<img class="img-thumbnail" src="<?php echo $row->front_img; ?>" alt="" style="width:900px; height:400px;">
					<?php endif; ?>
					<div class="clearfix"></div><br>
						<p style="margin-left:15px;"><em>
							<?php echo exept(($row->content),30); ?></em>
						</p>
						<br>
				<?php endforeach; ?>
			<?php else: ?>
			<h2>BRAK ARTYKUŁÓW</h2>
			<?php endif; ?>
			
			<div class="text-center"><?php echo $pagination; ?></div>
		</div>

		<div class="col-sm-3">
				 <?php include APPPATH.'views/site/include/sidebar.php'; ?>
		</div>
	</div>
</div>

 <?php include APPPATH.'views/site/include/footer.php'; ?>