<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	
	<!-- Meta, Viewport & Title
	================================================== -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
	<link href="https://fonts.googleapis.com" rel="preconnect">
	<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">		
		
	<?php wp_head(); ?>	
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/assets/fav/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/assets/fav/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/assets/fav/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/assets/fav/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/assets/fav/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/assets/fav/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/assets/fav/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/assets/fav/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/fav/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_template_directory_uri(); ?>/assets/fav/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/fav/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/assets/fav/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/fav/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/fav/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/fav/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	
	<script>window.devicePixelRatio = 2;</script>
	
</head>
<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>

<div class="container-main" id="page">

<!-- Header - Main
======================== -->
<header class="header-main">
<div class="container">
	
	<a href="#content-main" class="skip-btn">Skip to Main Content</a>
	
	<div class="brand"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"><?php the_theme_img( get_field( 'company_logo', 'options' ), 'quarter-width', array( 'alt' => get_bloginfo( 'name' ) ) ); ?></a></div>
	
	<div class="menu-btn"><a href="javascript:;"><span class="menu-bar">Menu Button</span></a></div>	
	
	<div class="nav-bar">
		<div class="brand-sm"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"><?php the_theme_img( get_field( 'company_logo_white', 'options' ), 'quarter-width', array( 'alt' => get_bloginfo( 'name' ) ) ); ?></a></div>
		
		<div class="top-bar">
		<div class="top-inn">
			<div class="top-menu fc-menu">
			<ul>
			<?php
			$menu_id = get_field( 'top_bar_navigation_menu', 'options' );
			if( $menu_id ):
				$args = array(
					'container'		=> '',
					'menu'			=> $menu_id,
					'depth'			=> 2,
					'fallback_cb' 	=> false,
					'items_wrap'	=> '%3$s'
				);
				wp_nav_menu( $args );
			endif;
			
			$header_cta_btn = get_field( 'header_cta_button', 'options' );
			if( $header_cta_btn ):
				$li_class = '';
				if( is_singular() && get_permalink() == $header_cta_btn['url'] ):
					$li_class = 'current-menu-item';
				endif;
				the_theme_link_button( $header_cta_btn, array( 'before' => '<li class="menu-item-give '.$li_class.'">', 'after' => '</li>', 'class' => '' ) );
			endif;
			?>				
			</ul>
			</div>
			
			<div class="search-box btn-disabled">
			<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<input type="text" name="s" id="search-header" placeholder="Search..." />
			<input type="submit" id="submit-header" value="Search" />
			</form>
			</div>

			<?php get_template_part( 'template-parts/social_links' ); ?>
			
		</div>
		</div>
		
	
		<div class="primary-bar">
		<div class="primary-inn">
			<div class="primary-menu fc-menu">
			<ul>
			<?php
			$menu_id = get_field( 'primary_navigation_menu', 'options' );
			if( $menu_id ):
				$args = array(
					'container'		=> '',
					'menu'			=> $menu_id,
					'depth'			=> 2,
					'fallback_cb' 	=> false,
					'items_wrap'	=> '%3$s',
					'mega_menu'		=> true,
				);
				wp_nav_menu( $args );
			endif;
			
			if( $header_cta_btn ):
				$li_class = '';
				if( is_singular() && get_permalink() == $header_cta_btn['url'] ):
					$li_class = 'current-menu-item';
				endif;
				the_theme_link_button( $header_cta_btn, array( 'before' => '<li class="menu-item-give '.$li_class.'">', 'after' => '</li>', 'class' => '' ) );
			endif;			
			?>
			</ul>
			</div>
		</div>
		</div>
		
	</div>	
	
</div>
</header>




<!-- Content - Main
========================================= -->
<main class="content-main" id="content-main">