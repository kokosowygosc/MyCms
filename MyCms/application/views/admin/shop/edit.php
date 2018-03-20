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
							<?php echo form_input('name',set_value('name',$shop->name)); ?>
							<?php echo form_hidden('name_old', $shop->name); ?>
						</div>
					</div>
					<div class="form-group">
					    <label class="col-sm-2 control-label">Cena</label>
					    <div class="col-sm-10" style="margin-top:10px;">
					    	<?php echo form_input('price',set_value('name',$shop->price)).' zł/szt.'; ?>
						</div>
					</div>
					<div class="form-group">
					    <label class="col-sm-2 control-label">Dostępna ilość</label>
					    <div class="col-sm-10" style="margin-top:10px;">
					    	<?php echo form_input('qtys',set_value('name',$shop->qtys)); ?>
						</div>
					</div>
					<div class="form-group">
					    <label class="col-sm-2 control-label">Opcje:</label>
					    	<label class="col-sm-1 control-label">Kolory:</label>
					    	<?php $data = json_decode($shop->options, true); $color = $data['color'];?>
							<div class="col-sm-2" style="margin-top:10px;">
								<?php $c='czerwony'; ?>
						    	<input type="checkbox" name="colors[]" <?php if(@$color[0]==$c || @$color[1]==$c || @$color[2]==$c || @$color[3]==$c || @$color[4]==$c || @$color[5]==$c || @$color[6]==$c || @$color[7]==$c || @$color[8]==$c) : echo 'checked'; endif;?> value="czerwony" /> Czerwony <br>
								<?php $c='zielony'; ?>
								<input type="checkbox" name="colors[]"  <?php if(@$color[0]==$c || @$color[1]==$c || @$color[2]==$c || @$color[3]==$c || @$color[4]==$c || @$color[5]==$c || @$color[6]==$c || @$color[7]==$c || @$color[8]==$c) : echo 'checked'; endif;?> value="zielony" /> Zielony <br>
								<?php $c='biały'; ?>
								<input type="checkbox" name="colors[]" <?php if(@$color[0]==$c || @$color[1]==$c || @$color[2]==$c || @$color[3]==$c || @$color[4]==$c || @$color[5]==$c || @$color[6]==$c || @$color[7]==$c || @$color[8]==$c) : echo 'checked'; endif;?> value="biały" /> Biały <br>
								<?php $c='żółty'; ?>
								<input type="checkbox" name="colors[]" <?php if(@$color[0]==$c || @$color[1]==$c || @$color[2]==$c || @$color[3]==$c || @$color[4]==$c || @$color[5]==$c || @$color[6]==$c || @$color[7]==$c || @$color[8]==$c) : echo 'checked'; endif;?> value="żółty" /> Żółty <br>
								<?php $c='pomarańczowy'; ?>
								<input type="checkbox" name="colors[]" <?php if(@$color[0]==$c || @$color[1]==$c || @$color[2]==$c || @$color[3]==$c || @$color[4]==$c || @$color[5]==$c || @$color[6]==$c || @$color[7]==$c || @$color[8]==$c) : echo 'checked'; endif;?> value="pomarańczowy" /> Pomarańczowy <br>
								<?php $c='czarny'; ?>
								<input type="checkbox" name="colors[]" <?php if(@$color[0]==$c || @$color[1]==$c || @$color[2]==$c || @$color[3]==$c || @$color[4]==$c || @$color[5]==$c || @$color[6]==$c || @$color[7]==$c || @$color[8]==$c) : echo 'checked'; endif;?> value="czarny" /> Czarny <br>
								<?php $c='fioletowy'; ?>
								<input type="checkbox" name="colors[]" <?php if(@$color[0]==$c || @$color[1]==$c || @$color[2]==$c || @$color[3]==$c || @$color[4]==$c || @$color[5]==$c || @$color[6]==$c || @$color[7]==$c || @$color[8]==$c) : echo 'checked'; endif;?> value="fioletowy" /> Fioletowy <br>
								<?php $c='różowy'; ?>
								<input type="checkbox" name="colors[]" <?php if(@$color[0]==$c || @$color[1]==$c || @$color[2]==$c || @$color[3]==$c || @$color[4]==$c || @$color[5]==$c || @$color[6]==$c || @$color[7]==$c || @$color[8]==$c) : echo 'checked'; endif;?> value="różowy" /> Różowy <br>
								<?php $c='niebieski'; ?>
								<input type="checkbox" name="colors[]" <?php if(@$color[0]==$c || @$color[1]==$c || @$color[2]==$c || @$color[3]==$c || @$color[4]==$c || @$color[5]==$c || @$color[6]==$c || @$color[7]==$c || @$color[8]==$c) : echo 'checked'; endif;?> value="niebieski" /> Niebieski <br>

							</div>
					    	<label class="col-sm-1 control-label">Rozmiary:</label>
					    	<?php $data = json_decode($shop->options, true); $size = $data['size'];?>
							    <div class="col-sm-2" style="margin-top:10px;">
								<input type="checkbox" name="size[]" <?php if(@$size[0]=='xs' || @$size[1]=='xs' || @$size[2]=='xs' || @$size[3]=='xs' || @$size[4]=='xs' || @$size[5]=='xs') : echo 'checked'; endif;?> value="xs"  /> XS <br>
								<input type="checkbox" name="size[]" <?php if(@$size[0]=='s' || @$size[1]=='s' || @$size[2]=='s' || @$size[3]=='s' || @$size[4]=='s' || @$size[5]=='s') : echo 'checked'; endif;?> value="s" /> S <br>
								<input type="checkbox" name="size[]" <?php if(@$size[0]=='m' || @$size[1]=='m' || @$size[2]=='m' || @$size[3]=='m' || @$size[4]=='m' || @$size[5]=='m') : echo 'checked'; endif;?> value="m" /> M <br>
								<input type="checkbox" name="size[]" <?php if(@$size[0]=='l' || @$size[1]=='l' || @$size[2]=='l' || @$size[3]=='l' || @$size[4]=='l' || @$size[5]=='l') : echo 'checked'; endif;?> value="l" /> L <br>
								<input type="checkbox" name="size[]" <?php if(@$size[0]=='xl' || @$size[1]=='xl' || @$size[2]=='xl' || @$size[3]=='xl' || @$size[4]=='xl' || @$size[5]=='xl') : echo 'checked'; endif;?> value="xl" /> XL <br>
								<input type="checkbox" name="size[]" <?php if(@$size[0]=='xxl' || @$size[1]=='xxl' || @$size[2]=='xxl' || @$size[3]=='xxl' || @$size[4]=='xxl' || @$size[5]=='xxl') : echo 'checked'; endif;?> value="xxl" /> XXL <br>
								</div>
					</div>
				<div class="col-sm-12">
					<?php echo form_submit('submit', 'Zapisz zmiany', 'class="btn btn-primary form-control"'); ?>
				<?php echo form_close(); ?>
				</div><br><br><br>
			</div>
		</div>
	</div>	
</div>	

<?php include APPPATH.'views/admin/include/footer.php'; ?>