<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

//	:: Custom Post Type :: Housing Project ::
// -------------------------------------------------
	add_action( 'init', 'theme_register_housing_project_post_type' );
	function theme_register_housing_project_post_type() {
		$labels = array(
				'singular_name' => _x( 'Housing Project', 'post type singular name' ),
				'add_new' => _x( 'Add New', 'housing_project' ),
				'add_new_item' => __( 'Add Housing Project' ),
				'edit_item' => __( 'Edit Housing Project' ),
				'new_item' => __( 'New Housing Project' ),
				'view_item' => __( 'View Housing Project' ),
				'all_items' => __( 'All Housing Projects' ),
				'search_items' => __( 'Search Housing Projects' ),
				'not_found' => __( 'No Housing Projects found' ),
				'not_found_in_trash' => __( 'No Housing Projects found in Trash' ),
				'menu_name' => 'Housing Projects',
				'name' => _x( 'Housing Projects', 'post type general name' ),
				'parent_item_colon' => '',
		);

		$args = array(
				'labels' => $labels,
				'public' => true,
				'_builtin' =>  false,
				'capability_type' => 'post',
				'hierarchical' => false,
				'has_archive' => false,
				'menu_icon' => 'dashicons-admin-home',
				'show_in_rest' => false,
				'rewrite' => array( 'slug' => 'housing-project' ),
				'supports' => array( 'title', 'thumbnail', 'editor' )
		);
		register_post_type( 'housing_project' , $args );

		// Register Status Taxonomy
		$taxonomy_labels = array(
			'name'              => _x( 'Statuses', 'taxonomy general name' ),
			'singular_name'     => _x( 'Status', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Statuses' ),
			'all_items'         => __( 'All Statuses' ),
			'parent_item'       => __( 'Parent Status' ),
			'parent_item_colon' => __( 'Parent Status:' ),
			'edit_item'         => __( 'Edit Status' ),
			'update_item'       => __( 'Update Status' ),
			'add_new_item'      => __( 'Add New Status' ),
			'new_item_name'     => __( 'New Status Name' ),
			'menu_name'         => __( 'Statuses' ),
		);

		$args = array(
			'labels'			=> $taxonomy_labels,
			'hierarchical'		=> true,
			'public'			=> true,
			'show_ui' 			=> true,
			'show_admin_column' => true,
			'show_in_rest' 		=> true,
		);

		register_taxonomy( 'status', 'housing_project', $args );		

	}
	
//	:: Custom Post Type :: Team ::
// -------------------------------------------------
	add_action( 'init', 'theme_register_team_member_post_type' );
	function theme_register_team_member_post_type() {
		$labels = array(
				'singular_name' => _x( 'Team Member', 'post type singular name' ),
				'add_new' => _x( 'Add New', 'team_member' ),
				'add_new_item' => __( 'Add Team Member' ),
				'edit_item' => __( 'Edit Team Member' ),
				'new_item' => __( 'New Team Member' ),
				'view_item' => __( 'View Team Member' ),
				'all_items' => __( 'All Team Members' ),
				'search_items' => __( 'Search Team Members' ),
				'not_found' => __( 'No Team Members found' ),
				'not_found_in_trash' => __( 'No Team Members found in Trash' ),
				'menu_name' => 'Team Members',
				'name' => _x( 'Team Members', 'post type general name' ),
				'parent_item_colon' => '',
		);

		$args = array(
				'labels' => $labels,
				'public' => false,
				'show_ui' => true,
				'_builtin' =>  false,
				'capability_type' => 'post',
				'hierarchical' => false,
				'has_archive' => false,
				'menu_icon' => 'dashicons-admin-users',
				'show_in_rest' => false,
				'supports' => array( 'title', 'editor' )
		);
		register_post_type( 'team_member' , $args );
		
		
		// Register Department Taxonomy
		$taxonomy_labels = array(
			'name'              => _x( 'Departments', 'taxonomy general name' ),
			'singular_name'     => _x( 'Department', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Departments' ),
			'all_items'         => __( 'All Departments' ),
			'parent_item'       => __( 'Parent Department' ),
			'parent_item_colon' => __( 'Parent Department:' ),
			'edit_item'         => __( 'Edit Department' ),
			'update_item'       => __( 'Update Department' ),
			'add_new_item'      => __( 'Add New Department' ),
			'new_item_name'     => __( 'New Department Name' ),
			'menu_name'         => __( 'Departments' ),
		);

		$args = array(
			'labels'			=> $taxonomy_labels,
			'hierarchical'		=> true,
			'public'			=> false,
			'show_ui' 			=> true,
			'show_admin_column' => true,
			'show_in_rest' 		=> true,
		);

		register_taxonomy( 'department', 'team_member', $args );		
		
	}