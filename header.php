<?php
$post = get_post(); 
$userdata =  get_userdata($post->post_author);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php bloginfo('name'); ?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<meta name="description" content="<?php bloginfo('description'); ?>">
    	<meta name="author" content="<?php echo $userdata->display_name; ?>">
    	<!-- Foundation -->
    	<link href="<?php echo get_stylesheet_uri(); ?>" rel="stylesheet" media="screen">
    	<script src="<?php bloginfo('template_directory'); ?>/foundation-5.4.5/js/vendor/modernizr.js"></script>

		<?php wp_head(); ?>
		
	</head>
	<body class="body">
