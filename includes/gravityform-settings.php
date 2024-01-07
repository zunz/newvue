<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// =================================================
//	:: Replace Submit Button ::
// -------------------------------------------------
	
	// -- Old style ---
	
	/* add_filter( 'gform_submit_button', 'theme_gform_replace_submit_button', 10, 2 );
	function theme_gform_replace_submit_button( $button_input, $form ) {
		
		//save attribute string to $button_match[1]
		preg_match( "/<input([^\/>]*)(\s\/)*>/", $button_input, $button_match );

		//remove value attribute
		$button_atts = str_replace( "value='".$form['button']['text']."' ", "", $button_match[1] );
		//var_dump($button_match);
		//add classname
		$button_atts = str_replace( "class='", "class='btn ", $button_match[1] );

		return '<button '.$button_atts.'>'.$form['button']['text'].' <em class="fas fa-caret-right"></em></button>';
	} */
	
	
	add_filter( 'gform_next_button', 'theme_gform_input_to_button', 10, 2 );
	add_filter( 'gform_previous_button', 'theme_gform_input_to_button', 10, 2 );
	add_filter( 'gform_submit_button', 'theme_gform_input_to_button', 10, 2 );
	function theme_gform_input_to_button( $button, $form ) {
		$dom = new DOMDocument();
		$dom->loadHTML( '<?xml encoding="utf-8" ?>' . $button );
		$input = $dom->getElementsByTagName( 'input' )->item( 0 );
		
		$new_button = $dom->createElement( 'button' );
		$new_button->appendChild( $dom->createTextNode( $input->getAttribute( 'value' ) . ' ' ) );
		
		// $caret = $dom->createElement( 'em' );
		// $caret->setAttribute( 'class', 'fas fa-caret-right' );
		// $new_button->appendChild( $caret );		
		
		$input->removeAttribute( 'value' );
		foreach( $input->attributes as $attribute ) {			
			if( $attribute->name == 'class' ) {
				$new_button->setAttribute( $attribute->name, $attribute->value . ' btn' );				
			} else {
				$new_button->setAttribute( $attribute->name, $attribute->value );
			}
		}		
		
		$input->parentNode->replaceChild( $new_button, $input );
		
		$btn = $dom->saveHtml( $new_button );
		return $btn;
	}
	
	

// =================================================
//	:: Disable form theme ::
// -------------------------------------------------	
	add_filter( 'gform_disable_form_theme_css', '__return_true' );