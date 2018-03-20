<?php include APPPATH.'views/admin/include/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
		<h2><b>Utwórz artykuł</b></h2>
		<?php echo anchor('admin/blog', '<span class="glyphicon glyphicon-list"></span> Lista artykułów', 'class="btn btn-primary"'); ?><br><br>
		<?php if(validation_errors()): ?>
			<div class="alert alert-danger text-center">
				<?php echo validation_errors(); ?>
			</div>
		<?php endif; ?>
		<?php echo form_open('','class="form-horizontal"');?>
			<div class="form-group">
			    <label class="col-sm-2 control-label">Tytuł</label>
			    <div class="col-sm-8">
			    	<?php echo form_input('title','','class="form-control"'); ?>
				</div>
			</div>
			<div class="form-group">
			    <label class="col-sm-2 control-label">Alias</label>
			    <div class="col-sm-8">
			    	<?php echo form_input('alias','','class="form-control"'); ?>
				</div>
			</div>
			<div class="form-group">
			    <label class="col-sm-2 control-label">Data</label>
			    <div class="col-sm-8">
			    	<?php echo form_input('date',date('Y-m-d G-i-s'),'id="datepicker" class="form-control"'); ?>
				</div>
			</div>
			<div class="form-group">
			    <label class="col-sm-2 control-label">Treść</label>
			    <div class="col-sm-8">
			    	<?php echo form_textarea('content','','id="ckeditor" class="form-control"'); ?>
			  	</div>
			</div>
			<div class="form-group">
			    <label class="col-sm-5 control-label"><h2>Dodatkowe opcje:</h2></label>
			    <div class="col-sm-5">
			    	<label class="col-sm-5 control-label">Zdjęcie w nagłówku</label><br> <br> 
			    	<?php echo form_input('front_img','','class="form-control"'); ?>
				</div>
			</div>
			<div class="form-group">
			    <label class="col-sm-2 control-label"></label>
			    <div class="col-sm-8">
			   		<?php echo form_submit('submit', 'Dodaj artykuł', 'class="btn btn-primary form-control'); ?> 
			  	</div>
			</div>
		<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
		<?php echo form_close();?>
		</div>
	</div>
</div>

 <?php include APPPATH.'views/admin/include/footer.php'; ?>

