<?php include APPPATH.'views/site/include/header.php'; ?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<?php if(validation_errors()): ?>
				<div class="alert alert-danger text-center">
					<?php echo validation_errors(); ?>
				</div>
			<?php endif; ?>
			<?php echo form_open('user/index', 'class="form-horizontal"'); ?>
				<div class="col-sm-4">
					  <div class="form-group">
					    <label class="col-sm-5 control-label">Nazwa</label>
					    <div class="col-sm-7">
					      <p class="form-control-static"><?php echo $user->name; ?></p>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="col-sm-5 control-label">Email</label>
					    <div class="col-sm-7">
					      <p class="form-control-static"><?php echo $user->email; ?></p>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="col-sm-6 control-label"><h4>Zmiana hasła:</h4></label><br><br><br><br>
					    <label class="col-sm-5 control-label">Hasło</label>
					    <div class="col-sm-6">
					      <?php echo form_password('password','','class="form-control" placeholder=" Hasło"'); ?>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="col-sm-5 control-label">Potwierdzenie hasła</label>
					    <div class="col-sm-6">
					      <?php echo form_password('passconf','','class="form-control" placeholder=" Potwierdź hasło"'); ?>
					    </div>
					  </div>
				</div>
				<!--<div class="col-sm-7">
					  <div class="form-group">
					  	<label class="col-sm-5 control-label"><h4>Dane do wysyłki:</h4></label><br><br><br>
					    <label class="col-sm-3 control-label">Imię</label>
					    <div class="col-sm-9">
					      <?php echo form_input('names',set_value('names',$user->names),'class="form-control" placeholder=" Imię"'); ?>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="col-sm-3 control-label">Nazwisko</label>
					    <div class="col-sm-9">
					      <?php echo form_input('names1',set_value('names1',$user->names1),'class="form-control" placeholder=" Nazwisko"'); ?>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="col-sm-3 control-label">Miejscowość</label>
					    <div class="col-sm-9">
					      <?php echo form_input('place',set_value('place',$user->place),'class="form-control" placeholder=" Miejscowość"'); ?>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="col-sm-3 control-label">Numer domu/mieszkania</label>
					    <div class="col-sm-9">
					      <?php echo form_input('number',set_value('number',$user->number),'class="form-control" placeholder=" Numer domu/mieszkania"'); ?>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="col-sm-3 control-label">Kod pocztowy</label>
					    <div class="col-sm-9">
					      <?php echo form_input('code',set_value('code',$user->code),'class="form-control" placeholder=" Kod pocztowy"'); ?>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="col-sm-3 control-label">Poczta</label>
					    <div class="col-sm-9">
					      <?php echo form_input('post',set_value('post',$user->post),'class="form-control" placeholder=" Poczta"'); ?>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="col-sm-3 control-label">Telefon</label>
					    <div class="col-sm-9">
					      <?php echo form_input('phone',set_value('phone',$user->phone),'class="form-control" placeholder=" Telefon"'); ?>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="col-sm-3 control-label">Dodatkowe informacje</label>
					    <div class="col-sm-9">
					      <?php echo form_textarea('extra',set_value('extra',$user->extra),'class="form-control" placeholder=" Dodatkowe informacje"'); ?>
					    </div>
					  </div>
				</div> -->
				<div class="col-sm-12">
					<?php echo form_submit('submit', 'Zmiana danych', 'class="btn btn-primary form-control'); ?> 	
				</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

 <?php include APPPATH.'views/site/include/footer.php'; ?>