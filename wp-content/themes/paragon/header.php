<!DOCTYPE html>

<!-- BEGIN html -->
<html <?php language_attributes(); ?>>

<!-- A Siiimple design by Justin Young (http://justinyoung.me) - Proudly powered by WordPress (http://wordpress.org) -->

<!-- BEGIN head -->
<head>

	<!-- Meta Tags -->
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<!-- Favicon -->
	<?php if ( $favicon = get_option('of_custom_favicon') ) { ?>
	<link rel="shortcut icon" href="<?php echo $favicon; ?>" type="image/x-icon" />
	<?php }else { ?>
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/framework/images/favicon.ico" type="image/x-icon" />
	<?php }?>
	
	<!-- Title -->
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/framework/styles/<?php echo get_option('of_alt_stylesheet'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/framework/css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/framework/css/anythingslider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/framework/css/theme-minimalist-square.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/framework/css/kwicks.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/framework/css/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/framework/css/superfish.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/framework/css/tweetrotator.css" type="text/css" media="screen" />
	<link href="http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Lobster+Two:regular,regularitalic" rel="stylesheet" type="text/css">
	
	<!--[if IE]>
	<link href="<?php bloginfo('template_url'); ?>/framework/css/ie.css" rel="stylesheet" type="text/css">
	<![endif]-->
	
	<!-- RSS & Pingbacks -->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php if (get_option('of_feedburner')) { echo get_option('of_feedburner'); } else { bloginfo( 'rss2_url' ); } ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<!-- Style Options -->
	<?php include (TEMPLATEPATH . '/framework/styles/style-options.php'); ?>
	
	<!-- Load Fonts -->
	<?php include (TEMPLATEPATH . '/framework/fonts/fonts.php'); ?>
	
	<!-- Theme Hook -->
	<?php wp_head(); ?>

<!-- END head -->
</head>
	
<!-- BEGIN body -->
<body <?php body_class(); ?>>
	
<!-- BEGIN full-top-menu -->
<div class="full-top-menu">
		
	<!-- BEGIN main -->
	<div class="main">
	
		<!-- BEGIN g380 #logo -->
		<div class="g380" id="logo">
		
				<h1 class="logo-text">
				<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a>
				</h1>
		
		<!-- END g380 #logo -->
		</div>
	
		<!-- START g380 #navigation -->
		<div class="g380" id="navigation">
			
			<?php
			wp_nav_menu( array(
			'theme_location' => 'main-nav',
			'sort_column' => 'menu_order',
 			'container' =>false,
 			'menu_class' => 'sf-menu',
 			'echo' => true,
 			'before' => '',
 			'after' => '',
 			'link_before' => '',
 			'link_after' => '',
 			'depth' => 0 )
 			);
			?>
				
		<!-- END g380 #navigation -->
		</div>
	
	<!-- END main -->
	</div>
		
<!-- END full-top -->
</div>