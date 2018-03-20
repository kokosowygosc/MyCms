<?php include APPPATH.'views/site/include/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
		<h2><b>Załóż konto:</b></h2>
		<?php if(validation_errors()): ?>
			<div class="alert alert-danger text-center">
				<?php echo validation_errors(); ?>
			</div>
		<?php else: ?>
			<?php if(!empty($success)): ?>
			<div class="alert alert-info text-center">
				<?php echo $success; ?>
			</div>
			<?php endif; ?>
			<?php if(!empty($fail)): ?>
			<div class="alert alert-danger text-center">
				<?php echo $fail; ?>
			</div>
			<?php endif; ?>
		<?php endif; ?>
		<?php echo form_open();?>
		<div class="row">
			<div class="modal-dialog">
			<div class="col-sm-12">
			  <div class="form-group">
			    <label class="sr-only">Imię</label>
			    <?php echo form_input('name','','class="form-control" placeholder=" Imię"'); ?><br>

			    <label class="sr-only">Email</label>
			    <?php echo form_input('email','','class="form-control" placeholder=" Email"'); ?><br>

			    <label class="sr-only">Hasło</label>
			    <?php echo form_password('password','','class="form-control" placeholder=" Podaj hasło"'); ?><br>

			    <label class="sr-only">Potwierdzenie hasła</label>
				<?php echo form_password('passconf','','class="form-control" placeholder=" Potwierdź hasło"'); ?><br>
				
				<a href="<?php echo  base_url('bootstrap/reg.pdf') ?>" target="_blank">Regulamin</a><br>
		        <?php echo form_checkbox('conf','', FALSE); ?> Potwierdż regulamin
			  </div>
			  <div class="form-group">
			   <?php echo form_submit('submit', 'Zarejestruj', 'class="btn btn-primary form-control'); ?> 
			  </div>
			</div>
			</div>
		</div>
		<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
		<?php echo form_close();?>
		</div><div class="clearfix"></div><br><br><br><br>
	</div>
</div>

<?php include APPPATH.'views/site/include/footer.php'; ?>