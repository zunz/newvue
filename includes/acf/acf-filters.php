<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// =================================================
//	:: ACF FontAwesome Fix ::
// -------------------------------------------------
	/*
	function theme_get_fa_url() {
		return get_template_directory_uri().'/assets/css/fa-acf.all.css';
	}
	add_filter( 'ACFFA_get_fa_url', 'theme_get_fa_url', 10, 1 );
	*/

// =================================================
//	:: Custom WYSIWYG toolbar ::
// -------------------------------------------------
	function theme_acf_custom_wysiwyg_toolbar( $toolbars ) {

		$toolbars['Italic Only'] = array( 1 => array( 'italic' ) );
		$toolbars['Bold Only'] = array( 1 => array( 'bold' ) );
		$toolbars['Link Only'] = array( 1 => array( 'link' ) );
		$toolbars['Underline Only'] = array( 1 => array( 'underline' ) );
		$toolbars['Bold & Italic Only'] = array( 1 => array( 'bold', 'italic' ) );

		return $toolbars;
	}
	add_filter( 'acf/fields/wysiwyg/toolbars' , 'theme_acf_custom_wysiwyg_toolbar' );


// =================================================
//	:: ACF JS ::
// -------------------------------------------------	
	function theme_acf_input_admin_footer() {
		?>
		<script type="text/javascript">
		( function( $ ) {
			 acf.add_action( 'wysiwyg_tinymce_init', function( ed, id, mceInit, $field ) {
				// reduce iframe's 'height' style to match tinymce settings
				$( '.acf-editor-wrap[data-toolbar]:not([data-toolbar="full"]):not([data-toolbar="basic"]) iframe' ).css( 'min-height', '100px' );
				$( '.acf-editor-wrap[data-toolbar]:not([data-toolbar="full"]):not([data-toolbar="basic"]) iframe' ).css( 'height', '100px' );
			  } );
		} )( jQuery );
		</script>
		<?php
	}
	add_action( 'acf/input/admin_footer', 'theme_acf_input_admin_footer' );



// =================================================
//	:: Google Maps API ::
// -------------------------------------------------
	// function theme_acf_map_api( $key ) {
		// $api['key'] = get_field( 'google_maps_api_key', 'options' );
		// return $api;
	// }
	//add_filter( 'acf/fields/google_map/api', 'theme_acf_map_api' );