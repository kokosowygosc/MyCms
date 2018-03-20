<?php include APPPATH.'views/admin/include/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="modal-dialog text-center">
				<div class="modal-content">
					<div class="modal-body">

						<?php if(validation_errors()): ?>
							<div class="alert alert-danger">
								<?php echo validation_errors(); ?>
							</div>
						<?php endif; ?>

						<?php echo form_open();?>
						<h4>Podaj dane do logowania:</h4>
			  		<div class="form-group">
			    		<?php echo form_input('email','','class="form-control text-center" placeholder="Podaj Email"'); ?><br>
			  		</div>
			  		<div class="form-group">
			    		<?php echo form_password('password','','class="form-control text-center" placeholder="Podaj Hasło"'); ?>
			  		</div>
					    <?php echo form_submit('submit', 'Zaloguj', 'class="btn btn-primary"'); ?>
					    <?php echo form_close();?>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>
	</div>
</div>

  <?php include APPPATH.'views/admin/include/footer.php'; ?>