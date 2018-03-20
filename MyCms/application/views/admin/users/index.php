<?php include APPPATH.'views/admin/include/header.php'; ?>

<div class="container">
  <div class="row">
	<div class="col-sm-12">
	  <h2><b>Lista użytkowników</b></h2>
	  <?php echo anchor('admin/users/create', '<span class="glyphicon glyphicon-plus"></span> Utwórz użytkownika', 'class="btn btn-primary"'); ?>
	  <br><br>
	  	<?php if (!empty($users)): ?>
		<div class="table-responsive">
		  <table class="table table-hover">
		  	<thead>
		  		<tr>
		  			<th>ID</th>
		  			<th>IMIĘ</th>
		  			<th>EMAIL</th>
		  			<th>DOSTĘP</th>
		  			<th class="text-center">EDYCJA</th>
		  			<th class="text-center">USUŃ</th>
		  		</tr>
		  	</thead>
		  	<tbody>
				<?php foreach($users as $row): ?>
				<tr>
					<td><?php echo ($row->id); ?></td>
					<td><?php echo ($row->name); ?></td>
					<td><?php echo ($row->email); ?></td>
					<td><?php echo ($row->dostep); ?></td>
					<?php if ($this->session->userdata('email')!=$row->email):?>
					<?php if ($row->dostep!='super_admin'):?>
					<td class="text-center"><?php echo anchor('admin/users/edit/'.$row->id,'<span class="glyphicon glyphicon-edit"></span>', 'class="btn-info"'); ?></td>
					<td class="text-center"><?php echo anchor('admin/users/delete/'.$row->id,'<span class="glyphicon glyphicon-remove"></span>', array('onclick'=>"return confirm('Czy na pewno chcesz usunąć?');", 'class' => 'btn-info')); ?></td>
					<?php endif; ?>
					<?php else: ?>
					<td class="text-center"></td>
					<td class="text-center"></td>
					<?php endif; ?>
				</tr>
				<?php endforeach; ?>
			</tbody>
			<?php else: ?> 
		  </table>
		</div>
		<h2 style="margin-left:15px;">BRAK UŻYTKOWNIKÓW</h2>
		<?php endif; ?>		
	</div>
  </div>
</div>



 <?php include APPPATH.'views/admin/include/footer.php'; ?>