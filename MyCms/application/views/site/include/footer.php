    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url() . 'bootstrap/js/bootstrap.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'bootstrap/js/ekko-lightbox.js'; ?>"></script>

<div class="container">
	<div class="row">
		<div class="col-sm-12" >

<script>
$(function() { //ikonki social
    $(".society a img").mouseover(function() { 
            $(this).fadeTo("fast",0.8).clearQueue();
                    }).mouseout(function() {
            $(this).fadeTo('slow',1.0).clearQueue();
        });
})
</script>

<script>
  $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
  }); 
</script>

<?php
  $i=($this->cart->total_items()); 
    if($i>0): ?>
      <script>
      $(function() {
        $('#popup').fadeTo('fast', 1).show();
      });
      </script>
    <?php else: ?>
      <script>
      $(function() {
        $('#popup').hide();
      });
      </script>
<?php endif; ?>

      <?php if(config('text_foot')!=''): ?>
          <div class="text-center" style="margin-bottom:-65px;"><?php echo config('text_foot'); ?></div>
      <?php endif; ?>
        <div class="col-sm-12" style="margin-top:70px;">
           <div class="panel-footer text-left" >

           </div>
        </div>

    </div>
	</div>
</div>



  </body>
</html>