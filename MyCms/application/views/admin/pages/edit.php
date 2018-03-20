<?php include APPPATH.'views/admin/include/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h2><b>Edytuj stronę <?php echo '"'.$page->title.'"';  ?></b></h2>
			<?php echo anchor('admin/pages', '<span class="glyphicon glyphicon-list"></span> Lista stron', 'class="btn btn-primary"'); ?><br><br>
			<?php if(validation_errors()): ?>
				<div class="alert alert-danger text-center">
					<?php echo validation_errors(); ?>
				</div>
			<?php endif; ?>
			<?php echo form_open('','class="form-horizontal"');?>
				<div class="form-group">
				    <label class="col-sm-2 control-label">Tytuł</label>
				    <div class="col-sm-8">
				    	<?php echo form_input('title',set_value('title',$page->title),'class="form-control"'); ?>
					</div>
				</div>
				<div class="form-group">
				    <label class="col-sm-2 control-label">Alias</label>
				    <div class="col-sm-8">
				    	<?php echo form_input('alias',set_value('alias',$page->alias),'class="form-control"'); ?>
					</div>
				</div>
				<div class="form-group">
				    <label class="col-sm-2 control-label">Treść</label>
				    <div class="col-sm-8">
				    	<?php echo form_textarea('content',set_value('content',$page->content),'id="ckeditor" class="form-control"'); ?>
				  	</div>
				</div>
				<div class="form-group">
				    <label class="col-sm-2 control-label"></label>
				    <div class="col-sm-8">
				   		<?php echo form_submit('submit', 'Zapisz', 'class="btn btn-primary form-control'); ?> 
				  	</div>
				</div>
			<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
			<?php echo form_close();?>
		</div>
	</div>
</div>

  <?php include APPPATH.'views/admin/include/footer.php'; ?>