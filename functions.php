<?php

// Enqueue CSS and scripts

function load_cornerstone_child_scripts() {
	wp_enqueue_style(
		'cornerstone_child_css',
		get_stylesheet_directory_uri() . '/style.css',
		array('foundation_css'),
		false,
		'all'
	);
}

if ( ! function_exists( 'load_cornerstone_css' ) ) {

	function load_cornerstone_css() {

		global $wp_styles;

		wp_enqueue_style(
			'normalize',
			get_template_directory_uri() . '/../cornerstone/css/normalize.css',
			array(),
			'3.0.1',
			'all'
		);

		wp_enqueue_style(
			'foundation_css',
			get_template_directory_uri() . '/../cornerstone/css/foundation.min.css',
			array('normalize'),
			'5.4.5',
			'all'
		);

		wp_enqueue_style(
			'foundation_ie8_grid',
			get_template_directory_uri() . '/../cornerstone/css/ie8-grid-foundation-4.css',
			array( 'foundation_css' ),
			'1.0',
			'all'
		);

		$wp_styles->add_data( 'foundation_ie8_grid', 'conditional', 'lt IE 8' );

	}

}

// load Foundation initialisation script in footer
if ( ! function_exists( 'cornerstone_foundation_init' ) ) {
	function cornerstone_foundation_init() { ?>
	<script type="text/javascript">jQuery.noConflict();jQuery(document).foundation();</script>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';

			$("#simple").click(function(){
				$.ajax({
     				url: ajaxurl,
     				data: ({
     					action : 'my_action_callback',
     					whatever: '10'
     				}),
     				type: 'POST',
     				success: function(data) {
      					//Do stuff here
      					alert(data);
     				}
     			});
			});
		});
	</script>
	<?php }
}

add_action( 'wp_enqueue_scripts', 'load_cornerstone_child_scripts',50);
add_action( 'wp_enqueue_scripts', 'load_cornerstone_css', 0 );
add_action( 'wp_enqueue_scripts', 'load_cornerstone_scripts', 0 );
add_action( 'wp_footer', 'cornerstone_foundation_init', 9999 );

if ( ! function_exists( 'load_cornerstone_scripts' ) ) {

	function load_cornerstone_scripts() {

		wp_enqueue_script(
			'foundation_modernizr_js',
			get_template_directory_uri() . '/../cornerstone/js/modernizr.js',
			array(),
			'2.8.3',
			false
		);

		wp_enqueue_script(
			'foundation_js',
			get_template_directory_uri() . '/../cornerstone/js/foundation.min.js',
			array('jquery'),
			'5.4.5',
			true
		);

	}

}


add_action( 'wp_ajax_my_action', 'my_action_callback' );
add_action( 'wp_ajax_nopriv_my_action', 'my_action_callback' );

function my_action_callback() {
	global $wpdb; // this is how you get access to the database

	$whatever = intval( $_POST['whatever'] );

	$whatever += 10;

    echo $whatever;

	die(); // this is required to terminate immediately and return a proper response
}
?>