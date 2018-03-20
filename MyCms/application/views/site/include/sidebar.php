<!-- society -->

  <div class="row">
    <div class="col-sm-12" >
            <div class="society">
              <!-- <a ><img class="img-responsive" src='<?php echo site_url().'images/icons/owner.png' ?>'></a><hr> -->
              <a target="_blank" href="<?php echo strtolower(@config('fb_link')); ?>"><img src='<?php echo site_url().'images/icons/1.png' ?>'></a> Facebook<br>
              <a target="_blank" href="<?php echo strtolower(@config('tweet_link')); ?>"><img src='<?php echo site_url().'images/icons/2.png' ?>'></a> Tweeter<br>
              <a target="_blank" href="<?php echo strtolower(@config('yt_link')); ?>"><img src='<?php echo site_url().'images/icons/4.png' ?>'></a> YouTube<br>
            </div>
    </div>
  </div>
<br>

<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="active"><a href="#articles" data-toggle="tab">Popularne</a></li>
  <li><a href="#comments" data-toggle="tab">Ostatnie</a></li>
</ul>
<br>
<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane fade in active" id="articles">
      <?php if (!empty($popular_posts)): ?>
        <?php foreach($popular_posts as $row): ?>

          <h4 class="pull-left"><?php echo anchor('article/' . $row->alias, $row->title); ?></h4>
          <p class="pull-right" style="margin-top:10px;"><?php echo substr(($row->date),0,11); ?></p>
          <div class="clearfix"></div>
          <p><?php echo exept(($row->content),10); ?></p>

        <?php endforeach; ?>
      <?php else: ?>
      <h2>BRAK ARTYKUŁÓW</h2>
      <?php endif; ?>
  </div>
  <div class="tab-pane fade" id="comments">
    <?php if (!empty($last_comments)): ?>
      <?php foreach($last_comments as $row): ?>
      <p>
      <blockquote class="small">
          <p><?php echo exept(($row->content),7); ?></p>
          <footer><?php echo mailto($row->email,$row->name); ?></footer>
      </blockquote>
      </p>
      <?php endforeach; ?>
    <?php else: ?>
    <h2>BRAK KOMENTARZY</h2>
    <?php endif; ?>

  </div>
</div>
<hr>

<?php if($loged_in==FALSE): ?>

<div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><h4>Zaloguj się</h4></h3>
      </div>
  <div class="panel-body">
        <?php if(validation_errors()): ?>
          <div class="alert alert-danger">
            <?php echo validation_errors(); ?>
          </div>
        <?php endif; ?>
        <?php echo form_open('admin/panel/login');?>
        <?php echo form_input('email','','class="form-control text-center" placeholder="Podaj Email"'); ?><br>
        <?php echo form_password('password','','class="form-control text-center" placeholder="Podaj Hasło"'); ?>
            <br>
            <?php echo form_submit('submit', 'Zaloguj', 'class="btn btn-primary form-control'); ?>
        <?php echo form_close();?>
        <div class="clearfix"></div>
        <div class="text-center"><?php echo 'Nie masz konta?' . anchor('reg/index',' Zarejestruj się','class="navbar-link"' ); ?></div><br>
  </div>
</div><div class="clearfix"></div>

<?php else: ?>

<div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title "><h4 class="text-center">Jesteś zalogowany</h4></h3>
      </div>
  <div class="panel-body">
        <div class="row">
          <div class="col-sm-12 text-center" style="margin-top:-20px;">
            <br>
            <span class="glyphicon glyphicon-off"></span>
            <?php echo anchor('admin/panel/logout','Wyloguj','class="navbar-link"' ); ?>
          </div>
        </div>
  </div>
</div>

<?php endif; ?>