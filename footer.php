		<?php wp_footer(); ?>
		
    	<script src="<?php echo site_url(); ?>/wp-includes/js/jquery/jquery.js"></script>
    	<script src="<?php bloginfo('template_directory'); ?>/foundation-5.4.5/js/foundation.min.js"></script>
    	
		<script type="text/javascript">
			jQuery.noConflict();
			jQuery(document).ready(function($){
				$(document).foundation();
				
				var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
				$('#simple').click(function(){
					$.ajax({
						url: ajaxurl,
						data: ({
							action: 'my_action',
							whatever: '10'
						}),
						type: 'POST',
						success: function(data) {
							$('#simple').attr('value','Button Clicked');
						},
						failure: function(data) {
							//alert('Error' + data);
						}
					});
				});
			});
		</script>
	</body>
</html>
