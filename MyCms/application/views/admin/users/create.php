<?php include APPPATH.'views/admin/include/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
		<h2><b>Utwórz użytkownika</b></h2>
		<?php echo anchor('admin/users', '<span class="glyphicon glyphicon-list"></span> Lista użytkowników', 'class="btn btn-primary"'); ?>
		<?php if(validation_errors()): ?>
			<div class="alert alert-danger text-center">
				<?php echo validation_errors(); ?>
			</div>
		<?php endif; ?>
		<?php echo form_open();?>
		<div class="row">
			<div class="modal-dialog">
			<div class="col-sm-12">
			  <div class="form-group">
			    <label class="sr-only">Imię</label>
			    <?php echo form_input('name','','class="form-control" placeholder=" Imię"'); ?>

			    <label class="sr-only">Email</label>
			    <?php echo form_input('email','','class="form-control" placeholder=" Email"'); ?>

			    <label class="sr-only">Hasło</label>
			    <?php echo form_password('password','','class="form-control" placeholder=" Hasło"'); ?>

			    <label class="sr-only">Potwierdzenie hasła</label>
			    <?php echo form_password('passconf','','class="form-control" placeholder=" Potwierdź hasło"'); ?>
			  </div>
			  <div class="form-group">
			   <?php echo form_submit('submit', 'Dodaj użytkownika', 'class="btn btn-primary form-control'); ?> 
			  </div>
			</div>
			</div>
		</div>
		<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
		<?php echo form_close();?>
		</div>
	</div>
</div>



  <?php include APPPATH.'views/admin/include/footer.php'; ?>