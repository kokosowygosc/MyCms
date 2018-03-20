<?php include APPPATH.'views/admin/include/header.php'; ?>

<div class="container gallery">
	<div class="row">
		<div class="col-sm-12">
			<h2><b>Galeria</b></h2><hr>
		</div>
		<div class="col-sm-12">
					<?php echo form_open_multipart('admin/gallery');?>
						<?php echo form_upload('userfile'); ?>
						<br> 
					<input type="submit" name="upload" class="btn btn-xs btn-primary" value="Wczytaj zdjęcie" /><br><br>
					<?php echo form_close(); ?>
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

		<?php foreach($files as $file): ?>
		<div style = "position:relative;">
			<div class="col-sm-<?php echo $col; ?>">
				<a href="<?php echo base_url() . 'images/' . $file; ?>">
					<img class="img-thumbnail" src="<?php echo base_url() . 'images/' . $file; ?>" alt="">
				</a>
				<?php echo form_open('admin/gallery/delete'); ?>
					<?php echo form_hidden('image_name', $file); ?>
					<button type="submit" class="btn btn-xs btn-primary" name="delete" style ="position:absolute; top:10px; right:25px;"> <span class="glyphicon glyphicon-remove"></span> </button>
				<?php echo form_close(); ?>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>

<?php include APPPATH.'views/admin/include/footer.php'; ?>