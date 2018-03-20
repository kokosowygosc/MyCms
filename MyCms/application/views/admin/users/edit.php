<?php include APPPATH.'views/admin/include/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h2><b>Edytuj użytkownika</b></h2>
			<?php echo anchor('admin/users', '<span class="glyphicon glyphicon-list"></span> Lista użytkowników', 'class="btn btn-primary"'); ?>
			<?php if(validation_errors()): ?>
				<div class="alert alert-danger text-center">
					<?php echo validation_errors(); ?>
				</div>
			<?php endif; ?>
			<?php echo form_open();?>
			<div class="row">
				<div class="col-sm-12"><br><br>
					<div class="col-sm-6">
						<div class="form-group">
						    <label class="">Imię</label>
						    <?php echo form_input('name',set_value('name',$user->name) ,'class="form-control"'); ?>
							<br>
						    <label class="">Email</label>
						    <?php echo form_input('email', set_value('email',$user->email),'class="form-control"'); ?>
							<br>
						    <?php echo form_password('password','','class="form-control" placeholder=" Hasło"'); ?>
							<br>
						    <label class="sr-only">Potwierdzenie hasła</label>
						    <?php echo form_password('passconf','','class="form-control" placeholder=" Potwierdź hasło"'); ?>
							<br>
						  	<label class="sr-only">Administrator</label>
						  	<h4>Administator:</h4>
						  	<?php
							  	if($user->dostep=='user')
							  	{
									echo 'Tak ' . form_radio('dostep','admin');
									echo 'Nie ' . form_radio('dostep','user', TRUE);
								}
								else
								{
									echo 'Tak ' . form_radio('dostep','admin', TRUE);
									echo 'Nie ' . form_radio('dostep','user');
								}
							?><br><hr>
						</div>
					</div>
				  	<div class="col-sm-6">
				  		<div class="form-group">
							<label class="">Imię</label>
						    <?php echo form_input('names',set_value('names',$user->names) ,'class="form-control"'); ?>
							<br>
							<label class="">Nazwisko</label>
						    <?php echo form_input('names1',set_value('names1',$user->names1) ,'class="form-control"'); ?>
							<br>
						    <label class="">Miejscowość</label>
						    <?php echo form_input('place', set_value('place',$user->place),'class="form-control"'); ?>
							<br>
						    <label class="">Numer domu/mieszkania</label>
						    <?php echo form_input('number',set_value('number',$user->number) ,'class="form-control"'); ?>
							<br>
						    <label class="">Kod pocztowy</label>
						    <?php echo form_input('code', set_value('code',$user->code),'class="form-control"'); ?>
							<br>
							<label class="">Poczta</label>
						    <?php echo form_input('post',set_value('post',$user->post) ,'class="form-control"'); ?>
							<br>
						    <label class="">Telefon</label>
						    <?php echo form_input('phone', set_value('phone',$user->phone),'class="form-control"'); ?>
							<br>
						    <label class="">Dodatkowe informacje</label>
						    <?php echo form_textarea('extra',set_value('extra',$user->extra) ,'class="form-control"'); ?>
							<br>
				  		</div>
				  	</div>
				  <div class="form-group">
				   <?php echo form_submit('submit', 'Zapisz zmiany', 'class="btn btn-primary form-control'); ?> 
				  </div>
				</div>
			</div>
			<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
			<?php echo form_close();?>
		</div>
	</div>
</div>

  <?php include APPPATH.'views/admin/include/footer.php'; ?>