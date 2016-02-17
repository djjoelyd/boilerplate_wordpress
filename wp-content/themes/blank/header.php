<!DOCTYPE html>
	<html <?php language_attributes(); ?>>
		<head>
			<meta charset="<?php bloginfo( 'charset' ); ?>" />
			<meta name="viewport" content="width=device-width" />
			<title><?php wp_title( ' | ', true, 'right' ); ?></title>
			<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.ico" type="image/x-icon" />
	        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-touch-icon-144x144.png" />
	        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-touch-icon-152x152.png" />
	        <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon-32x32.png" sizes="32x32" />
	        <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon-16x16.png" sizes="16x16" />
			
			<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
			
			<script type="text/javascript" src="<?php echo get_bloginfo('template_directory');?>/assets/javascripts/libs/modernizer.js"></script>
			<?php wp_head(); ?>
		</head>
		<body <?php body_class(); ?>>
		<div id="wptime-plugin-preloader"></div>
		<div id="header">
			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('name'); ?></a></h1>
			<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo('description'); ?></a></h2>
			<div class="nav">
				<div class="menu-bg"></div>
				<a class="menu-text">Menu</a>
				<div class="menu-burger"><span></span></div>
				<?php
					$defaults = array(
					'theme_location'  => '',
					'menu'            => '',
					'container'       => 'div',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 'menu-items',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
				  	'after'           => '',
				  	'link_before'     => '',
				  	'link_after'      => '',
				  	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				  	'depth'           => 0,
				  	'walker'          => ''
					);
					wp_nav_menu( $defaults );
				?>
			</div>
		</div>
	