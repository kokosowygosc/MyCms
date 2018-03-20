<?php include APPPATH.'views/site/include/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<?php if(sizeof($this->cart->contents())>=5): ?>
				<div class="alert alert-danger text-center">
					<?php echo "Więcej do koszyka się nie zmieści:)" ?>
				</div>
			<?php endif; ?>
			<h2><b>Koszyk:</b></h2>
			<div class="table-responsive">
				<table class="table ">
				<thead>
					<tr>
					  <th>Ilość</th>
					  <th>Opis</th>
					  <th style="text-align:right">Cena</th>
					  <th style="text-align:right">Cała cena</th>
					  <th style="text-align:right">Usuń</th>
				  	</tr>
				</thead>
				<tbody>
				<?php $i = 1; ?>
				<?php foreach ($this->cart->contents() as $items): ?> <!--każdy przedmiot -->
				<?php echo form_open('cart/update/'.$i.'/'.$items['id']); ?>
					<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
					<tr>
					  <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?>
							<button type="submit" class="glyphicon glyphicon-refresh btn-primary" style="margin-top:-7px;"></button>
					  </td> <!-- Ilość przedmiotów-->
					  <td>
						<?php echo $items['name']; ?> <!-- nazwa przedmiotu -->
							<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
								<p>
									<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?> <!-- Dokładne informacje o przedmiocie -->
										<?php if($option_value==''): ?>
										<strong><?php echo $option_name; ?>:</strong> <?php echo "Brak wyboru"; ?><br />
										<?php else: ?>
										<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
										<?php endif; ?>
										<?php $name[$i]=$items['name'] ?>
										<?php $rowid[$i]=$items['rowid']; ?>
										<?php $qty[$i]=$items['qty']; ?>
									<?php endforeach; ?>
								</p>
							<?php endif; ?>
					  </td>
					  <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
					  <td style="text-align:right">PLN <?php echo $this->cart->format_number($items['subtotal']); ?></td>
					  <td style="text-align:right">
							<?php echo anchor('cart/delete/'.$items['rowid'],'<span class="glyphicon glyphicon-remove"></span>','class="btn btn-xs btn-primary"'); ?>
					  </td>
					</tr>
				<?php $i++; ?>
				<?php echo form_close(); ?>
				<?php endforeach; ?>
					<tr>
					  <td colspan="3"> </td>
					  <td class="right"><strong>Razem:</strong></td>
					  <td class="right">PLN <?php echo $this->cart->format_number($this->cart->total()); ?></td>
					</tr>
				</table>
			</div>
		<div class="col-sm-12">
		  		<form action="https://secure.transferuj.pl" method="post" accept-charset="utf-8"> 
		  			<?php if(!empty($rowid)): ?>
		  			<?php $size=sizeof($rowid);  ?>
		  			<?php for ($i=1; $i <= $size ; $i++) { $options[$i]=$this->cart->product_options($rowid[$i]); } ?>
		  			<?php $size=sizeof($name); ?>
		  			<?php $i=1; $y=1; foreach ($options as $op) {$n[$i]="$name[$i]"." il:"."$qty[$i]"." "; $i++; foreach ($op as $o) {if(!empty($o)): $c[$y]=substr($o,0,3).","; endif; $y++; }}?>
		  			<br>
		  			<?php for ($i=1; $i <= $size; $i++) {
		  				 	for ($y=1; $y < 2*$i; $y++) { @$crc[$i]=$n[$i].$c[$y].$c[$y+1];  };
		  			}?>
		  			<?php foreach ($crc as $cr) {$ce=@$ce.$cr;}; $crc=$ce;?>
		  			<?php $id=14141; $kwota=$this->cart->total(); $kod='2oBloUL8GflTl1zS'; ?>
					<?php endif; ?>
				 <input type="hidden" name="md5sum" value="<?= md5(@$id.@$kwota.@$crc.@$kod); ?>">
				 <input type="hidden" name="id" value="14141"> 
				 <input type="hidden" name="kwota" value="<?php echo @$this->cart->total(); ?>"> 
				 <input type="hidden" name="opis" value="<?php  echo @$user->extra; ?>">
				 <input type="hidden" name="crc" value="<?php echo @$crc; ?>"> 
				 <input type="hidden" name="wyn_url" value="<?php echo site_url().'cart/add_to_base' ?>"> 
				 <input type="hidden" name="wyn_email" value="mateuszkoski@gmail.com"> 
				 <input type="hidden" name="opis_sprzed" value="Mateusz Marcinkowski Dobrzeń 41 ble ble ble"> 
				 <input type="hidden" name="pow_url" value="<?php echo site_url().'cart/done'; ?>"> 
				 <input type="hidden" name="pow_url_blad" value="<?php echo site_url().'cart/index'; ?>"> 
				 <input type="hidden" name="email" value="<?php echo @$user->email ?>"> 
				 <input type="hidden" name="nazwisko" value="<?php echo @$user->names1; ?>"> 
				 <input type="hidden" name="imie" value="<?php echo @$user->names; ?>"> 
				 <input type="hidden" name="adres" value="<?php echo @$user->place." ".@$user->number; ?>"> 
				 <input type="hidden" name="miasto" value="<?php echo @$user->post; ?>"> 
				 <input type="hidden" name="kod" value="<?php echo @$user->code; ?>"> 
				 <input type="hidden" name="telefon" value="<?php echo @$user->phone; ?>"> 
				 <?php form_checkbox('akceptuje_regulamin', 1); ?>
				 <?php 
					if($_SERVER['REMOTE_ADDR']=='195.149.229.109' && !empty($_POST)){ 
						$this->cart->destroy();
						$data=array(
							'id_sprzedawcy' => $_POST['id'], 
							'status_transakcji' => $_POST['tr_status'], 
							'id_transakcji' => $_POST['tr_id'], 
							'kwota_transakcji' => $_POST['tr_amount'], 
							'kwota_zaplacona' => $_POST['tr_paid'], 
							'blad' => $_POST['tr_error'], 
							'data_transakcji' => $_POST['tr_date'], 
							'opis_transakcji' => $_POST['tr_desc'], 
							'ciag_pomocniczy' => $_POST['tr_crc'], 
							'email_klienta' => $_POST['tr_email'],
							'suma_kontrolna' => $_POST['md5sum'],
						);
						if($status_transakcji=='TRUE' && $blad=='none')
						{
							$this->panel_m->create('order', $data);
						} 
						else
						{ 
							echo "Błąd";
						} 
					echo 'TRUE';
					}
				  ?>

		  	<?php if(empty($user)): ?>
				<div class="col-sm-12">
					<?php echo anchor('reg', 'Zarejestruj się', 'class="btn btn-primary form-control"'); ?>
				</div>
			<?php elseif(empty($user->names) and empty($user->place) and empty($user->number) and empty($user->code) and empty($user->post) and empty($user->phone)): ?>
				<div class="col-sm-12">
					<?php echo anchor('user', 'Uzupełnij dane', 'class="btn btn-primary form-control"'); ?>	
				</div>
			<?php else: ?>
				<div class="col-sm-12">
					<?php echo form_submit('submit', 'Realizacja płatności', 'class="btn btn-primary form-control'); ?>
				</div>
			<?php endif; ?>
			<?php echo form_close(); ?>
		</div>
		</div>
	</div>
</div>

<?php include APPPATH.'views/site/include/footer.php'; ?>


