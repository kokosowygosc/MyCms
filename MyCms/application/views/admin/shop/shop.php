<?php include APPPATH.'views/admin/include/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h2><b>Przedmioty w sklepie</b></h2>
			<?php echo anchor('admin/shop/add_item', '<span class="glyphicon glyphicon-plus"></span> Dodaj przedmiot', 'class="btn btn-primary"'); ?>
		</div>
		<div class="col-sm-12">
			<?php foreach ($item as $row):?>
				<div class="col-sm-6">
					<div class="form-horizontal">
						<div class="form-group">
					    	<label class="col-sm-2 control-label">Nazwa</label>
						    <div class="col-sm-6" style="margin-top:10px;">
								<?php echo $row->name; ?> 
								<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
							</div>
						</div>
						<div class="form-group">
					    	<label class="col-sm-2 control-label">Zdjęcia:</label>
							    <div class="col-sm-12"  >
								<?php echo form_open_multipart('admin/shop/index/'.$row->id);?>
									<?php echo form_upload('userfile'); ?>
									<input type="submit" name="upload" class="btn btn-xs btn-primary" value="Wczytaj zdjęcie" /><br><br>
								<?php echo form_close(); ?>

								    	<?php 
										@$names=$this->panel_m->clearDiacritics($row->name);
								    	$image=$images[$names];
								    	$i=2;
								    	$a=sizeof($images[$names])+2;
								    	while($a>$i)
								    	{?>
										    <div class="col-sm-4">
									    		<div style = "position:relative;">
								    			<img class="img-thumbnail" src="<?php echo base_url() . 'images/shop/' . $names. "/" . $image[$i] ?>" style="height:130px; width:150px;" alt=""><br>
								    			<?php echo form_open('admin/shop/delete_img'); ?>
													<?php echo form_hidden('image_name', $image[$i]); ?>
													<?php echo form_hidden('place_name', $row->name); ?>
													<button type="submit" class="btn btn-xs btn-primary" name="delete" style ="position:absolute; top:10px; right:10px;"> <span class="glyphicon glyphicon-remove"></span> </button>
												<?php echo form_close(); ?>
								    			</div>
							    			</div>
									    	<?php $i++;
								    	}?>
								    
								
								</div>
						</div>

						<div class="form-group">
						    <label class="col-sm-2 control-label">Cena</label>
						    <div class="col-sm-6" style="margin-top:10px;">
						    	<?php echo $row->price; ?> PLN/szt.
							</div>
						</div>
						<div class="form-group">
						    <label class="col-sm-2 control-label">Ilość</label>
						    <div class="col-sm-6" style="margin-top:10px;">
						    	<?php echo $row->qtys; ?>
							</div>
						</div>
						<div class="form-group">
						    <label class="col-sm-2 control-label">Opcje:</label>
						    <div class="col-sm-10" style="margin-top:10px; height:210px;">
								 <b>Dostępne kolory:</b><br>
								 <div class="well well">
								 <?php 
								 
								 $data=json_decode($row->options, true);
								 $color=$data['color']; 
								 if($color!=''){
								 $b=sizeof($color);
								 for ($i=0; $i < $b ; $i++) {echo $color[$i]." ";}	
								 }else echo"Brak wyboru";
								
								 ?>
								 </div>
								 <b>Dostępne rozmiary:</b>
								 <div class="well well">
								 <?php 
								 
								 $size=$data['size']; 
								 if($size!=''){
								 $b=sizeof($size);
								 for ($i=0; $i < $b ; $i++) {echo $size[$i]." ";}	
								 }else echo"Brak wyboru";

								 ?>
								 </div>
							</div>
						</div>
						<div class="col-sm-12" style="margin-top:-190px;">
							<?php echo anchor('admin/shop/edit/'.$row->id, '<span class="glyphicon glyphicon-edit"></span> ', 'class="btn-sm btn-info"'); ?>
						</div>
						<div class="col-sm-12" style="margin-top:-130px;">
							<?php echo anchor('admin/shop/delete/'.$row->id, '<span class="glyphicon glyphicon-remove"></span> ', 'class="btn-sm btn-info"'); ?>
						</div>
					</div><hr>
				</div>
			<?php endforeach; ?>
		</div>
	<div class="text-center"><?php echo $pagination; ?></div>
	</div>	
</div>	

<?php include APPPATH.'views/admin/include/footer.php'; ?>