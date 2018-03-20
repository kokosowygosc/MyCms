<?php include APPPATH.'views/admin/include/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h2><b>Lista stron</b></h2>
			<?php echo anchor('admin/pages/create', '<span class="glyphicon glyphicon-plus"></span> Utwórz stronę', 'class="btn btn-primary"'); ?><br><br>
		  	<?php if (!empty($pages)): ?>
			<div class="table-responsive">
			  <table id="sortable" class="table table-hover">
			  	<thead>
			  		<tr>
			  			<th>ID</th>
			  			<th>TYTUŁ</th>
			  			<th>ALIAS</th>
			  			<th>TREŚĆ</th>
			  			<th class="text-center">EDYCJA</th>
			  			<th class="text-center">USUŃ</th>
			  		</tr>
			  	</thead>
			  	<tbody>
					<?php foreach($pages as $row): ?>
					<tr id="<?php echo ($row->id); ?>">
						<td><?php echo ($row->id); ?></td>
						<td><?php echo ($row->title); ?></td>
						<td><?php echo ($row->alias); ?></td>
						<td><?php echo exept(($row->content),4); ?></td>
						<td class="text-center"><?php echo anchor('admin/pages/edit/'.$row->id,'<span class="glyphicon glyphicon-edit"></span>', 'class="btn-info"'); ?></td>
						<td class="text-center"><?php echo anchor('admin/pages/delete/'.$row->id,'<span class="glyphicon glyphicon-remove"></span>', array('onclick'=>"return confirm('Czy na pewno chcesz usunąć?');", 'class' => 'btn-info')); ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
				<?php else: ?> 
			  </table>
			</div>
			<h2 style="margin-left:15px;">BRAK STRON</h2>
			<?php endif; ?>	
		</div>
	</div>
</div>

 <?php include APPPATH.'views/admin/include/footer.php'; ?>