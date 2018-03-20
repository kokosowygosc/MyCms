<?php include APPPATH.'views/site/include/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<?php foreach ($item as $row):?>
				<div class="col-sm-6"><hr>
					<?php 
						@$names=$this->panel_m->clearDiacritics($row->name);
				    	@$image=$images[$names];
				    	$i=2;
				    	$a=sizeof($image)+2;
						if(!empty($image[$i])):	?>
							<div class="gallery">
								<ul class="bxslider">
								    		<?php while($a>$i){ ?>
												<li>
													<a href="<?php echo base_url() . 'images/shop/' . $names. "/" . $image[$i] ?>" class="image img-responsive" data-toggle="lightbox" data-gallery="Gallery"  data-parent=".gallery">
														<img class="image img-responsive" src="<?php echo base_url() . 'images/shop/' . $names. "/" . $image[$i] ?>" alt="">
													</a>
												</li>
											<?php $i++;}?>
								</ul>
							</div>
						<?php else: ?>
						<h3 class="text-center">Brak zdjęć</h3>
						<?php endif; ?>
				</div>
				<div class="col-sm-6"><hr>
					<?php echo form_open('shop/add','class="form-horizontal"','');?>
						<div class="form-group">
					    	<label class="col-sm-3 control-label">Nazwa</label>
						    <div class="col-sm-9" style="margin-top:10px;">
								<?php echo $row->name; ?>
								<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
							</div>
						</div>
						<div class="form-group">
						    <label class="col-sm-3 control-label">Cena</label>
						    <div class="col-sm-4" style="margin-top:10px;">
						    	<?php echo $row->price; ?> PLN
							</div>
						</div>
						<div class="form-group">
						    <label class="col-sm-3 control-label">Ilość</label>
						    <div class="col-sm-6">
						    	<?php echo form_input('qty','','class="form-control"'); ?>Dostępne: <?php echo $row->qtys; ?>
							</div>
						</div>
						<div class="form-group">
						    <label class="col-sm-3 control-label">Opcje</label>
						    <div class="col-sm-7" style="margin-top:10px;">
								 <label class="col-sm-2 control-label">Kolor:</label> 
								 <br><br>
								 <?php 
								 	$data=json_decode($row->options, true); 
									$color=$data['color']; 
									
									if($color[0]=="")
										echo "Brak wyboru "."<br><br>";
									else
									{ 
									?>
									 <select name="color" class="form-control">
										<?php
											$a=sizeof($color);
											for ($i=0; $i < $a; $i++) 
											{ 
												echo "<option>".$color[$i]."</option>";
											}
										?>
									 </select>
									 <?php }; ?>

								 <label class="col-sm-2 control-label">Rozmiar:</label> 
								 <br><br>
								 <?php 
								 	$data=json_decode($row->options, true); 
									$size=$data['size']; 
									
									if($size[0]=="")
										echo "Brak wyboru "."<br><br>";
									else
									{ 
									?>
									 <select name="size" class="form-control">
										<?php
											$a=sizeof($size);
											
											for ($i=0; $i < $a; $i++) 
											{ 
												echo "<option>".$size[$i]."</option>";
											}

										?>
									 </select>
									 <?php }; ?>
							</div>
						</div>
					<div class="col-sm-12">
						<?php echo form_submit('submit', 'Dodaj do koszyka', 'class="btn btn-primary form-control"'); ?>
					<?php echo form_close(); ?>
					</div><br><br><br>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="text-center"><?php echo $pagination; ?></div>
	</div>	
</div>	

<?php include APPPATH.'views/site/include/footer.php'; ?>

<script src="<?php echo base_url() . 'bootstrap/js/jquery.bxslider.js'; ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
  		$('.bxslider').bxSlider({
		  adaptiveHeight: true,
		});
	});
</script>
