<?php include APPPATH.'views/admin/include/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h2><b>Lista artykułów</b></h2>
			<?php echo anchor('admin/blog/create', '<span class="glyphicon glyphicon-plus"></span> Utwórz artykuł', 'class="btn btn-primary"'); ?><br><br>
		  	<?php if (!empty($blog)): ?>
			<div class="table-responsive">
			  <table class="table table-hover">
			  	<thead>
			  		<tr>
			  			<th>ID</th>
			  			<th>TYTUŁ</th>
			  			<th>ALIAS</th>
			  			<th>DATA</th>
			  			<th>ODSŁONY</th>
			  			<th>TREŚĆ</th>
			  			<th class="text-center">EDYCJA</th>
			  			<th class="text-center">USUŃ</th>
			  		</tr>
			  	</thead>
			  	<tbody>
					<?php foreach($blog as $row): ?>
					<tr>

						<td><?php echo ($row->id); ?></td>
						<td><?php echo ($row->title); ?></td>
						<td><?php echo ($row->alias); ?></td>
						<td><?php echo substr(($row->date),0,11); ?></td>
						<td><?php echo ($row->views); ?></td>
						<td><?php echo exept(($row->content),3); ?></td>
						<td class="text-center"><?php echo anchor('admin/blog/edit/'.$row->id,'<span class="glyphicon glyphicon-edit"></span>', 'class="btn-info"'); ?></td>
						<td class="text-center"><?php echo anchor('admin/blog/delete/'.$row->id,'<span class="glyphicon glyphicon-remove"></span>', array('onclick'=>"return confirm('Czy na pewno chcesz usunąć?');", 'class' => 'btn-info')); ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
				<?php else: ?> 
			  </table>
			</div>
			<h2 style="margin-left:15px;">BRAK ARTYKUŁÓW</h2>
			<?php endif; ?>		
		</div>
	</div>
</div>

 <?php include APPPATH.'views/admin/include/footer.php'; ?>