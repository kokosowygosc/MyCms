<?php include APPPATH.'views/site/include/header.php'; ?>

<div class="container">
	<div class="row">
	<div class="col-sm-12">
		<h1 class="pull-left" style="margin-left:5px;"><?php echo $article->title; ?></h1>
			<h4>
				<span class="label label-info pull-right" style="margin-top:15px;">
					<span class="glyphicon glyphicon-calendar"></span>
					<?php echo substr(($article->date),0,11); ?>
				</span><br><br><br>
			</h4>
		<?php if($article->front_img != ""): ?>
		<img class="img-thumbnail" src="<?php echo $article->front_img; ?>" alt="">
		<?php endif; ?>
		<div class="clearfix"></div>
			<p style="margin-left:10px;">
				<?php echo $article->content; ?> <br><br><br><br>
			</p>
		<?php if (!empty($comments)): ?>
			
			<h4>Komentarze</h4>
			<?php foreach($comments as $row): ?>
			<div class="panel panel-default" >
			  <div class="panel-heading" style="height:40px;">
			    <h3 class="panel-title pull-left">
			    	<h5 >
			    		<span class="glyphicon glyphicon-user"></span> 
			    		<?php echo mailto($row->email,$row->name); ?>
			    	</h5>
			    </h3>
			    <span class="pull-right" style="margin-top:-30px;"> 
			    	<span class="glyphicon glyphicon-calendar"></span>
			    	<?php echo substr(($row->date),0,16); ?>
			    </span>
			    <div class="clearfix"></div>
			  </div>
			  <div class="panel-body">
			    <?php echo ($row->content); ?>
			  </div>
			</div>
			<?php endforeach; ?>
		<?php else: ?>
		<h3>BRAK KOMENTARZY</h3>
		<?php endif; ?>
		<hr>
		<h2>Skomentuj:</h2>
		<?php echo validation_errors(); ?>
		<?php echo form_open();?>
		<?php if($loged_in!=TRUE): ?>
		<div class="row">
			<div class="col-sm-6">
			  <div class="form-group">
			    <label class="sr-only" for="exampleInputEmail2">Imię</label>
			    <?php echo form_input('name', '','class="form-control"placeholder=" Imię"'); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6" style="margin-left:-15px;">
			    <label class="sr-only" for="exampleInputEmail2">Email</label>
			    <?php echo form_input('email', '','class="form-control" placeholder=" Email"'); ?>
			  </div>
		</div>
			</div>
			  <div class="form-group">
			    <label class="sr-only" for="exampleInputEmail2">Komentarz</label>
			    <?php echo form_textarea('content', '','class="form-control" placeholder=" Komentarz"'); ?>
			  </div>
			  <div class="form-group">
			   <?php echo form_hidden('date', date('Y-m-d G:i:s')); ?>
			   <?php echo form_hidden('article_id', $article->id); ?>
			   <?php echo form_submit('submit', 'Dodaj komentarz', 'class="btn btn-primary form-control'); ?> 
			  </div>
				<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
		<?php else: ?>
			  <div class="form-group">
			    <label class="sr-only" for="exampleInputEmail2">Komentarz</label>
			    <?php echo form_textarea('content', '','class="form-control" placeholder=" Komentarz"'); ?>
			  </div>
			  <div class="form-group">
			   <?php echo form_hidden('name',$this->session->userdata('name')); ?>
			   <?php echo form_hidden('email',$this->session->userdata('email')); ?>
			   <?php echo form_hidden('date', date('Y-m-d G-i-s')); ?>
			   <?php echo form_hidden('article_id', $article->id); ?>
			   <?php echo form_submit('submit', 'Dodaj komentarz', 'class="btn btn-primary form-control'); ?> 
			  </div>
				<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
		<?php endif; ?>
		 <?php echo form_close();?>
	</div>
	</div>
</div>
 <?php include APPPATH.'views/site/include/footer.php'; ?>