<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// =================================================
//	:: Admin Favicon ::
// -------------------------------------------------
function add_favicon() {
	$favicon_url = get_stylesheet_directory_uri() . '/assets/fav/favicon.ico';
	echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}
add_action( 'login_head', 'add_favicon' );
add_action( 'admin_head', 'add_favicon' );


// =================================================
//	:: Enqueue Scripts ::
// -------------------------------------------------
	function theme_enqueue_scripts(){

		$css_version = filemtime( get_template_directory() . '/assets/css/custom-styles.css' );
		$js_version = filemtime( get_template_directory() . '/assets/js/custom.js' );

		/* -- Enqueue CSS File -- */
		wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css' );
		wp_enqueue_style( 'animate', get_template_directory_uri().'/assets/css/animate.css' );
		wp_enqueue_style( 'fa-brands', get_template_directory_uri().'/assets/css/brands.min.css' );
		wp_enqueue_style( 'fa-light', get_template_directory_uri().'/assets/css/light.min.css' );
		wp_enqueue_style( 'fa-regular', get_template_directory_uri().'/assets/css/regular.min.css' );
		wp_enqueue_style( 'fa-solid', get_template_directory_uri().'/assets/css/solid.min.css' );
		//wp_enqueue_style( 'fa-duotone', get_template_directory_uri().'/assets/css/duotone.min.css' );
		wp_enqueue_style( 'fa-core', get_template_directory_uri().'/assets/css/fontawesome.min.css' );		
		wp_enqueue_style( 'theme-style', get_template_directory_uri().'/assets/css/custom-styles.css', array(), $css_version );
		wp_enqueue_style( 'outdatedbrowser-style', get_template_directory_uri().'/outdatedbrowser/outdatedbrowser.min.css' );

		/* -- Enqueue JS File -- */
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js', array( 'jquery' ), false, true );		
		wp_enqueue_script( 'inview', get_template_directory_uri() . '/assets/js/inview.js', array( 'jquery' ), false, true );

		wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), $js_version, true );
		wp_enqueue_script( 'outdatedbrowser', get_template_directory_uri() . '/outdatedbrowser/outdatedbrowser.min.js', array( 'jquery' ), false, true );

	}
	add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );



// =================================================
//	:: Theme Configuration ::
// -------------------------------------------------
	function theme_configuration(){

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
		add_theme_support( 'title-tag' );
		add_theme_support( 'menus' );
		add_editor_style( 'custom-editor-style.css' );

		/* -------------------------------------------------
		*	Post Thumbnail Config
		* ------------------------------------------------- */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 432, 285, true );
		add_image_size( 'full-width', 1920, 99999, false );
		add_image_size( 'half-width', 1008, 9999, false );
		add_image_size( 'quarter-width', 480, 9999, false );
		add_image_size( 'square-592', 592, 592, true );
		add_image_size( 'square-470', 470, 470, true );
		add_image_size( 'square-75', 75, 75, true );
		


	}
	add_action( 'after_setup_theme', 'theme_configuration' );


// =================================================
//	:: Max Width Image Fix ::
// -------------------------------------------------
	function custom_max_srcset_image_width( $max_width, $size_array ) {
		return 3200;
	}
	add_filter( 'max_srcset_image_width', 'custom_max_srcset_image_width', 10, 2 );


// =================================================
//	:: The Excerpt Filter ::
// -------------------------------------------------
	function theme_custom_excerpt_length( $length ) {
		return 20;
	}
	add_filter( 'excerpt_length', 'theme_custom_excerpt_length', 999 );

	function theme_custom_excerpt_more( $more ) {
		return '...';
	}
	add_filter( 'excerpt_more', 'theme_custom_excerpt_more' );


// =================================================
//	:: Archive Title Filter ::
// -------------------------------------------------
	function theme_archive_title_func( $title, $original_title, $prefix ) {
		if ( is_category() ) {
			$title = $original_title;
		}
		return $title;
	}
	add_filter( 'get_the_archive_title', 'theme_archive_title_func', 3, 10 );


// =================================================
//	:: Search WP Fix ::
// -------------------------------------------------
	function my_searchwp_common_words( $terms ) {
		// do not exclude any words from the index
		return array();
	}
	add_filter( 'searchwp_stopwords', 'my_searchwp_common_words' );


// =================================================
//	:: Move Yoast SEO metabox to bottom ::
// -------------------------------------------------
	function theme_move_yoastbox_tobottom() {
		return 'low';
	}
	add_filter( 'wpseo_metabox_prio', 'theme_move_yoastbox_tobottom' );


// =================================================
//	:: Maximum Image Width Threshold ::
// -------------------------------------------------
	// increase the image size threshold to 3000px
	function theme_big_image_size_threshold( $threshold ) {
		return 3000; // new threshold
	}
	add_filter( 'big_image_size_threshold', 'theme_big_image_size_threshold', 999, 1  );
	
// =================================================
//	:: Style Format ::
// -------------------------------------------------
	function theme_mce_buttons_2( $buttons ) {
		array_unshift( $buttons, 'styleselect' );
		return $buttons;
	}
	add_filter( 'mce_buttons_2', 'theme_mce_buttons_2' );

	function theme_before_init_insert_formats( $init_array ) {
		$style_formats = array(
			array(
				'title' => 'Introduction',
				'selector' => 'p',
				'classes' => 'txt-28',
			),			

		);

		$init_array['style_formats'] = json_encode( $style_formats );
		return $init_array;
	}
	add_filter( 'tiny_mce_before_init', 'theme_before_init_insert_formats' );
	
	
// =================================================
//	:: Add mega menu to nav menu ::
// -------------------------------------------------
	function theme_mega_menu_css_class( $classes, $menu_item, $args, $depth ) {
		if( isset( $args->mega_menu ) && $args->mega_menu && 0 == $depth ) {
			if( get_field( 'enable_mega_menu', $menu_item ) ) {
				$classes[] = 'mega-menu-item';				
			}
		}
		return $classes;
	}
	add_filter( 'nav_menu_css_class', 'theme_mega_menu_css_class', 10, 4  );
	
	function theme_add_mega_menu( $item_output, $menu_item, $depth, $args ) {
		if( isset( $args->mega_menu ) && $args->mega_menu && 0 == $depth ) {
			if( get_field( 'enable_mega_menu', $menu_item ) ) {
				ob_start();
				?>
				<div class="mega-menu sub-menu">		
				<div class="mega-menu-inn">
				<div class="aside-wrap">
					<div class="aside-cont">
					<?php
					the_theme_output( get_field( 'cta_heading', $menu_item ), '<h2>', '</h2>' );
					echo wpautop( get_field( 'cta_text', $menu_item ) );
					the_theme_link_arrow( get_field( 'cta_link', $menu_item ) );
					?>
					</div>

					<?php
					for($i = 1; $i <= 3; $i++):
						$heading = get_field( 'menu_column_'.$i.'_heading', $menu_item );
						?>
						<div class="aside-cont">
							<?php
							the_theme_output($heading, '<h3>', '</h3>');
							if( have_rows( 'menu_column_'.$i.'_links', $menu_item ) ):
								?>
								<ul>
								<?php
								while( have_rows( 'menu_column_'.$i.'_links', $menu_item ) ): the_row();
									$link = get_sub_field( 'link' );
									if( $link ):
										?>
										<li><?php the_theme_link( $link ); ?></li>
										<?php
									endif;
								endwhile;
								?>
								</ul>
								<?php
							endif;
							?>
						</div>
						<?php
					endfor;
					?>
					
				</div>
				</div>
				</div>
				<?php
				$item_output .= ob_get_clean();
			}
		}
		return $item_output;
	}
	add_filter( 'walker_nav_menu_start_el', 'theme_add_mega_menu', 10, 4  );