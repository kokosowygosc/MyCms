<?php include APPPATH.'views/admin/include/header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
		<h2><b>Lista komentarzy</b></h2>
		  	<?php if (!empty($comments)): ?>
			<div class="table-responsive">
			  <table class="table table-hover">
			  	<thead>
			  		<tr>
			  			<th>ID</th>
			  			<th>ID ART</th>
			  			<th>IMIĘ</th>
			  			<th>EMAIL</th>
			  			<th>DATA</th>
			  			<th>TREŚĆ</th>
			  			<th class="text-center">EDYCJA</th>
			  			<th class="text-center">USUŃ</th>
			  		</tr>
			  	</thead>
			  	<tbody>
					<?php foreach($comments as $row): ?>
					<tr>
						<td><?php echo ($row->id); ?></td>
						<td><?php echo ($row->article_id); ?></td>
						<td><?php echo ($row->name); ?></td>
						<td><?php echo mailto($row->email,$row->email); ?></td>
						<td><?php echo ($row->date); ?></td>
						<td><?php echo exept(($row->content),6); ?></td>
						<td class="text-center"><?php echo anchor('admin/comments/edit/'.$row->id,'<span class="glyphicon glyphicon-edit"></span>', 'class="btn-info"'); ?></td>
						<td class="text-center"><?php echo anchor('admin/comments/delete/'.$row->id,'<span class="glyphicon glyphicon-remove"></span>', array('onclick'=>"return confirm('Czy na pewno chcesz usunąć?');", 'class' => 'btn-info')); ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
				<?php else: ?> 
			  </table>
			</div>
			<h2 style="margin-left:15px;">BRAK KOMENTARZY</h2>
			<?php endif; ?>
		</div>
	</div>
</div>

 <?php include APPPATH.'views/admin/include/footer.php'; ?>