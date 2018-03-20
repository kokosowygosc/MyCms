<?php include APPPATH.'views/admin/include/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h2><b>Edytuj komentarz użytkownika <?php echo '"'.$comment->name.'"'; ?></b></h2>
			<?php echo anchor('admin/comments/', '<span class="glyphicon glyphicon-list"></span> Lista komentarzy', 'class="btn btn-primary"'); ?><br><br>
			<?php echo form_open('','class="form-horizontal"');?><br>
			<?php if(validation_errors()): ?>
				<div class="alert alert-danger text-center">
					<?php echo validation_errors(); ?>
				</div>
			<?php endif; ?>
			<?php echo form_open();?>
			<div class="form-group">
			    <label class="col-sm-2 control-label">Treść</label>
			    <div class="col-sm-8">
			    	<?php echo form_textarea('content',set_value('content',$comment->content),'class="form-control"'); ?>
			  	</div>
			</div>
			<div class="form-group">
			    <label class="col-sm-2 control-label"></label>
			    <div class="col-sm-8">
			   		<?php echo form_submit('submit', 'Zapisz zmiany', 'class="btn btn-primary form-control'); ?> 
			  	</div>
			</div>
			<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
			<?php echo form_close();?>
		</div>
	</div>
</div>

  <?php include APPPATH.'views/admin/include/footer.php'; ?>