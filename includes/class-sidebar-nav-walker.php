<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class Theme_Sidebar_Nav_Walker extends Walker_Nav_Menu {
	
	public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
		if( 0 == $depth ) {
			$menu_item = $data_object;
			$title = apply_filters( 'the_title', $menu_item->title, $menu_item->ID );
			
			$output .= '<div class="submenu-item"><div class="submenu-title"><a href="javascript:;">'.$title.'</a></div><div class="submenu-list">';
		} else {
			parent::start_el( $output, $data_object, $depth, $args, $current_object_id );
		}
	}
	
	public function end_el( &$output, $data_object, $depth = 0, $args = null ) {
		if( 0 == $depth ) {
			$output .= '</div></div>';
		} else {
			parent::end_el( $output, $data_object, $depth, $args );
		}
	}
	
}