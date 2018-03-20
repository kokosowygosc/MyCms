<script src="//code.jquery.com/jquery.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url() . 'bootstrap/js/bootstrap.min.js'; ?>"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="<?php echo base_url() . 'ckeditor/ckeditor.js'; ?>"></script>
    <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'ckeditor' );
    </script>
    <script> //datepicker
    	$(function() 
    		{
    			$( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
    		}
    	);
    </script>

    <script> //sortowanie z ajaxem
      $(function() {
        $( "#sortable" ).sortable(
        	{ 
        		update: function( event, ui ) {
        			var order = $(this).sortable("toArray");
        			$.ajax({
        				type: "POST",
    					url: "<?php echo base_url();?>admin/pages/ajax",
    					data: { items:  order },
    					success: function(msg)
    					{
    						
    					}
        			})
        		},
        		items: "tbody > tr",
        		axis: 'y',
        	});

        $( "#sortable" ).disableSelection();
      });
      </script>
  </body>
</html>