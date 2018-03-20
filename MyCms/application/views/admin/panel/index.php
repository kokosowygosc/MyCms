<?php include APPPATH.'views/admin/include/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h2><b>Panel Admina </b></h2><hr>
			<?php if(validation_errors()): ?>
				<div class="alert alert-danger text-center">
					<?php echo validation_errors(); ?>
				</div>
			<?php endif; ?>
			<?php echo form_open(); ?>
			<div class="form-group">
			    <label class="col-sm-3 control-label">Nazwa strony</label>
			    <div class="col-sm-9">
			    	<?php echo form_input('site_name',config('site_name'),'class="form-control"'); ?>
				</div><br><br>
			</div>
			<div class="form-group">
			    <label class="col-sm-3 control-label">Tekst na stopce</label>
			    <div class="col-sm-9">
			    	<?php echo form_input('text_foot',config('text_foot'),'class="form-control"'); ?>
				</div><br><br>
			</div>
			<div class="form-group">
			    <label class="col-sm-3 control-label">Opis strony głównej</label>
			    <div class="col-sm-9">
			    	<?php echo form_input('meta_desc',config('meta_desc'),'class="form-control"'); ?>
				</div><br><br>
			</div>
			<div class="form-group">
			    <label class="col-sm-3 control-label">Szablon strony</label>
			    <div class="col-sm-9">
			    	<select name="front_theme"class="form-control">
					<?php 
						$option = array(
							 'Amelia',
							 'Cerulean',
							 'Cosmo',
							 'Cyborg',
							 'Flatly',
							 'Journal',
							 'Lumen',
							 'Readable',
							 'Simplex',
							 'Slate',
							 'Spacelab',
							 'Superhero',
							 'United',
							 'Yeti',
							 'Default',
						 );
						foreach($option as $item)
						{
							if(config('front_theme')== $item)
							{
								
							echo '<option selected>'.$item.'</option>';
							}
							else
							{
							echo '<option>'.$item.'</option>';
							}
						}
					?>
					</select>
				</div><br><br>
			</div>
			<div class="form-group">
			    <label class="col-sm-3 control-label">Szablon zaplecza admina</label>
			    <div class="col-sm-9">
			    	<select name="back_theme"class="form-control">
					<?php 
						$option = array(
							 'Amelia',
							 'Cerulean',
							 'Cosmo',
							 'Cyborg',
							 'Flatly',
							 'Journal',
							 'Lumen',
							 'Readable',
							 'Simplex',
							 'Slate',
							 'Spacelab',
							 'Superhero',
							 'United',
							 'Yeti',
							 'Default',
						 );
						foreach($option as $item)
						{
							if(config('back_theme')== $item)
							{
								
							echo '<option selected>'.$item.'</option>';
							}
							else
							{
							echo '<option>'.$item.'</option>';
							}
						}
					?>
					</select>
				</div><br><br>
			</div>
			<div class="form-group">
			    <label class="col-sm-3 control-label">Ilość postów</label>
			    <div class="col-sm-9">
			    	<?php echo form_input('num_posts',config('num_posts'),'class="form-control"'); ?>
				</div><br><br>
			</div>
			<div class="form-group">
			    <label class="col-sm-3 control-label">Ilość kolumn w galerii</label>
			    <div class="col-sm-9">
			    	<select name="num_gal"class="form-control">
					<?php 
						$option = array(1,2,3,4,6);
						foreach($option as $item)
						{
							if(config('num_gal')== $item)
							{
							echo '<option selected>'.$item.'</option>';
							}
							else
							{
							echo '<option>'.$item.'</option>';
							}
						}
					?>
					</select>
				</div><br><br>
			</div>
			<div class="form-group">
			    <label class="col-sm-3 control-label">Linki do portali społecznościowych</label>
			    <div class="col-sm-9">
			    	<?php echo "Facebook".@form_input('fb_link',config('fb_link'),'class="form-control"'); ?>
			    	<?php echo "Twitter".@form_input('tweet_link',config('tweet_link'),'class="form-control"'); ?>
			    	<?php echo "YouTube".@form_input('yt_link',config('yt_link'),'class="form-control"'); ?><br>
				</div><br><br>
			</div>
			<div class="form-group">
			    <label class="col-sm-3 control-label">Moduły</label>
			    <div class="col-sm-9">
			    	<?php echo "Galeria"?>
			    	<select name="gallery"class="form-control">
					<?php	
						$option = array(TAK,NIE);
						foreach($option as $item)
						{
							if(config('gallery')== $item)
							{
							echo '<option selected>'.$item.'</option>';
							}
							else
							{
							echo '<option>'.$item.'</option>';
							}
						}
					?>
					</select><br><br>
				</div>
			</div>
			<div class="form-group ">
			    	<?php echo form_submit('submit','Zapisz zmiany','class="btn btn-primary col-sm-12"'); ?>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>


 <?php include APPPATH.'views/admin/include/footer.php'; ?>