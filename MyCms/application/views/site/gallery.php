<?php include APPPATH.'views/site/include/header.php'; ?>

<div class="container gallery">
	<div class="row">
		<div class="col-sm-12">
			<h2>Galeria</h2>
		</div>
		<?php switch(config('num_gal'))
		{
			case 1: 
				$col = 12;
				break;
			case 2: 
				$col = 6;
				break;
			case 3: 
				$col = 4;
				break;
			case 4: 
				$col = 3;
				break;
			case 6: 
				$col = 2;
				break;
		}
		?>
		<div class="gallery">
			<?php foreach($files as $file): ?>
				<div class="col-sm-<?php echo $col; ?>">
					<a href="<?php echo base_url() . 'images/' . $file; ?>" data-toggle="lightbox" data-gallery="Gallery" data-parent=".gallery">
						<img class="img-thumbnail" src="<?php echo base_url() . 'images/' . $file; ?>" alt="">
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div><br><br><br>

<?php include APPPATH.'views/site/include/footer.php'; ?>