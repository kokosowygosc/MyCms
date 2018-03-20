<?php include APPPATH.'views/admin/include/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
				<div class="col-sm-12">
					<?php echo form_open('','class="form-horizontal"');?>
						<?php if(validation_errors()): ?>
							<div class="alert alert-danger text-center">
								<?php echo validation_errors(); ?>
							</div>
						<?php endif; ?>
						<div class="form-group">
					    	<label class="col-sm-2 control-label">Nazwa</label>
						    <div class="col-sm-10" style="margin-top:10px;">
								<?php echo form_input('name',''); ?>
							</div>
						</div>
						<div class="form-group">
						    <label class="col-sm-2 control-label">Cena</label>
						    <div class="col-sm-10" style="margin-top:10px;">
						    	<?php echo form_input('price','').' zł/szt.'; ?>
							</div>
						</div>
						<div class="form-group">
						    <label class="col-sm-2 control-label">Dostępna ilość</label>
						    <div class="col-sm-10" style="margin-top:10px;">
						    	<?php echo form_input('qtys',''); ?>
							</div>
						</div>
						<div class="form-group">
						    <label class="col-sm-2 control-label">Opcje:</label>
						    	<label class="col-sm-1 control-label">Kolory:</label>
								    <div class="col-sm-2" style="margin-top:10px;">
									<input type="checkbox" name="colors[]" value="czerwony" /> Czerwony <br>
									<input type="checkbox" name="colors[]" value="zielony" /> Zielony <br>
									<input type="checkbox" name="colors[]" value="biały" /> Biały <br>
									<input type="checkbox" name="colors[]" value="żółty" /> Żółty <br>
									<input type="checkbox" name="colors[]" value="pomarańczowy" /> Pomarańczowy <br>
									<input type="checkbox" name="colors[]" value="czarny" /> Czarny <br>
									<input type="checkbox" name="colors[]" value="fioletowy" /> Fioletowy <br>
									<input type="checkbox" name="colors[]" value="różowy" /> Różowy <br>
									<input type="checkbox" name="colors[]" value="niebieski" /> Niebieski <br>
									</div>
						    	<label class="col-sm-1 control-label">Rozmiary:</label>
								    <div class="col-sm-2" style="margin-top:10px;">
									<input type="checkbox" name="size[]" value="xs" /> XS <br>
									<input type="checkbox" name="size[]" value="s" /> S <br>
									<input type="checkbox" name="size[]" value="m" /> M <br>
									<input type="checkbox" name="size[]" value="l" /> L <br>
									<input type="checkbox" name="size[]" value="xl" /> XL <br>
									<input type="checkbox" name="size[]" value="xxl" /> XXL <br>
									</div>

						</div>
					<div class="col-sm-12">
						<?php echo form_submit('submit', 'Dodaj przedmiot', 'class="btn btn-primary form-control"'); ?>
					<?php echo form_close(); ?>
					</div><br><br><br>
				</div>
		</div>
	</div>	
</div>	

<?php include APPPATH.'views/admin/include/footer.php'; ?>