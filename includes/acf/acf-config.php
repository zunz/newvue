<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/* ====================================================
** Create Options Page
====================================================== */

	if( function_exists( 'acf_add_options_page' ) ) {

		//Adds Theme Options
		acf_add_options_page( array(
			'page_title' 	=> 'Theme Options',
			'menu_title'	=> 'Theme Options',
			'menu_slug' 	=> 'theme-options',
			'capability'	=> 'edit_theme_options',
		) );	

		acf_add_options_sub_page( array(
			'page_title' 	=> 'Header Options',
			'menu_title'	=> 'Header',
			'parent_slug'	=> 'theme-options',
		) );

		acf_add_options_sub_page( array(
			'page_title' 	=> 'Footer Options',
			'menu_title'	=> 'Footer',
			'parent_slug'	=> 'theme-options',
		) );
		
		acf_add_options_sub_page( array(
			'page_title' 	=> 'Page Settings',
			'menu_title'	=> 'Page Settings',
			'parent_slug'	=> 'theme-options',
		) );
		
	}

/* ====================================================
** Load Addons
====================================================== */
include ( trailingslashit( get_template_directory() ).'includes/acf/acf-filters.php' );