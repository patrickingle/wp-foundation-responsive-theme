		<?php wp_footer(); ?>
		
    	<script src="<?php echo site_url(); ?>/wp-includes/js/jquery/jquery.js"></script>
    	<script src="<?php bloginfo('template_directory'); ?>/foundation-5.4.5/js/foundation.min.js"></script>
    	
		<script type="text/javascript">
		var $j = jQuery.noConflict();

		$j(function(){
			$j(document).foundation();
		});
		</script>
	</body>
</html>
