<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_shortcode( 'arrowlink', 'theme_arrowlink_shortcode_func' );
function theme_arrowlink_shortcode_func( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		'href' => '#',
	), $atts );
	
	return ' <span class="read-more"><a href="'.$atts['href'].'">'.$content.' <em class="fas fa-long-arrow-right"></em></a></span> ';	
}
