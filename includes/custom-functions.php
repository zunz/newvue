<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// =================================================
//	:: Get Top Parent Page ::
// -------------------------------------------------
function theme_get_parent_page( $page_id ) {
	if( $page_id ) {
		$page_parent = get_post( $page_id );
		if ( $page_parent->post_parent )	{
			$ancestors=$page_parent->ancestors;
			$root=count( $ancestors )-1;
			$parent = $ancestors[$root];
		} else {
			$parent = $page_parent->ID;
		}
		return $parent;
	}
}

// =================================================
//	:: Get Image Attributes ::
// -------------------------------------------------
function theme_get_img( $attachment, $image_size = NULL, $attr_default_alt = '', $additional_attr = '' ){
	if( $attachment && !empty( $attachment ) ) {

		if( $image_size == NULL ) {
			$image_size = 'post-thumbnail';
		}

		// is attachment array or not?
		if ( ( array ) $attachment !== $attachment ) {
			$attachment_id = $attachment;
		} else {
			$attachment_id = $attachment['ID'];
		}

		$attr = array();

		if( is_array( $attr_default_alt ) ) {
			$attr = $attr_default_alt;
		} else {
			$alt = get_post_meta( $attachment_id , '_wp_attachment_image_alt', true );
			if( $alt ) {
				$attr['alt'] = $alt;
			} elseif( $attr_default_alt ) {
				$attr['alt'] = esc_attr( $attr_default_alt );
			}
		}
		if( is_array( $additional_attr ) ) {
			$attr = array_merge( $attr, $additional_attr );
		}

		return wp_get_attachment_image( $attachment_id, $image_size, false, $attr );
	} else {
		return false;
	}
}

function the_theme_img( $attachment, $image_size = NULL, $attr_default_alt = '', $additional_attr = '' ) {
	echo theme_get_img( $attachment, $image_size, $attr_default_alt, $additional_attr );
}


function theme_get_img_attr( $attachment_id, $image_size = NULL ){
	if( $attachment_id ):
		if( $image_size == NULL ) {
			$image_size = 'post-thumbnail';
		}

		$img_src = wp_get_attachment_image_url( $attachment_id, $image_size );
		$img_srcset = wp_get_attachment_image_srcset( $attachment_id, $image_size );
		$img_sizes = wp_get_attachment_image_sizes( $attachment_id, $image_size );

		if( $img_src ){
			return " src=\"{$img_src}\" srcset=\"{$img_srcset}\" sizes=\"{$img_sizes}\" ";
		}
	endif;
}

// =================================================
//	:: Get Image By Attachment ID ::
// -------------------------------------------------
function theme_get_src( $attachment, $image_size = NULL ){

	// is attachment array or not?
	if ( ( array ) $attachment !== $attachment ) {
		$attachment_id = $attachment;
	} else {
		$attachment_id = $attachment['ID'];
	}

	if( $attachment_id ) {
		if( $image_size == NULL ) {
			$image_size = 'post-thumbnail';
		}
		$image = wp_get_attachment_image_src( $attachment_id, $image_size );
		if( !empty( $image ) ){
			$image = $image[0];
			return $image;
		} else {
			return '';
		}
	} else {
		return '';
	}
}


// =================================================
//	:: Get Landing Page ::
// -------------------------------------------------
if ( !function_exists( 'theme_get_page_with_template' ) ){
	function theme_get_page_with_template( $template_name ) {
		if( !$template_name ) {
			return false;
		}

		$pages = get_posts( array(
			'post_type' => 'page',
			'meta_key' => '_wp_page_template',
			'meta_value' => $template_name
		) );

		if( !empty( $pages ) ){
			return $pages[0];
		} else {
			return false;
		}
	}
}

// =================================================
//	:: theme_is_has_content ::
// -------------------------------------------------
if ( !function_exists( 'theme_is_has_content' ) ){
	function theme_is_has_content( $str = false ) {

		if( !$str ) {
			global $post;
			$str = $post->post_content;
		}

		if( trim( str_replace( '&nbsp;','',strip_tags( $str ) ) ) == '' ) {
			return false;
		} else {
			return true;
		}
	}
}

// =================================================
//	:: the_theme_output ::
// -------------------------------------------------
if ( !function_exists( 'the_theme_output' ) ){
	function the_theme_output( $content, $before = '', $after = '', $echo = true ) {
		if( !$content || !trim( $content ) ) {
			return;
		}
		$content = $before . $content . $after;
		if ( $echo ) {
			echo nl2br( $content );
		} else {
			return nl2br( $content );
		}
	}
}

// =================================================
//	:: get link label ::
// -------------------------------------------------
if ( !function_exists( 'get_link_label' ) ){
	function get_link_label( $label = '', $default_label = 'Learn More' ) {
		$label = trim( $label );
		if( !$label ) {
			$label = $default_label;
		}
		return $label;
	}
}

// =================================================
//	:: Convert Hex to RGBA ::
// -------------------------------------------------
if ( !function_exists( 'hex_to_rgba' ) ){
	function hex_to_rgba( $color, $percentage = false ) {
		$output = 'rgb( 0,0,0 )';
		if ( $color[0] == '#' ) {
				$color = substr( $color, 1 );
		}
		if ( strlen( $color ) == 6 ) {
				list( $r, $g, $b ) = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
		} elseif ( strlen( $color ) == 3 ) {
				list( $r, $g, $b ) = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
		} else {
				return false;
		}
		$r = hexdec( $r );
		$g = hexdec( $g );
		$b = hexdec( $b );

		if( $percentage ) {
			if( intval( $percentage ) > 99 ) {
				$opacity = 1;
			} else {
				$opacity = '.'.$percentage;
			}
			$output = 'rgba( '.$r.','.$g.','.$b.','.$opacity.' )';
		} else {
			$output = 'rgb( '.$r.','.$g.','.$b.' )';
		}

		return $output;
	}
}


// =================================================
//	:: Display Flexible Content ::
// -------------------------------------------------
/**
 * Loop through and output ACF flexible content blocks for the current page.
 */
function theme_display_flexible_contents( $field_name, $post_id = false ) {
	if( !$post_id ) {
		$post_id = get_the_ID();
	}
	if ( have_rows( $field_name, $post_id ) ) :

		while ( have_rows( $field_name, $post_id ) ) : the_row();

			get_template_part( 'template-parts/flexible-contents/' . get_row_layout() ); // Template part name MUST match layout ID.

		endwhile;

	endif;
}


// =================================================
//	:: Open link in new window ::
// -------------------------------------------------
if( !function_exists( 'open_new_tab' ) ) {
	function open_new_tab( $is_new_window, $echo = true ) {
		if( $is_new_window ) {
			if( $echo ) {
				echo ' target="_blank" rel="noopener noreferrer" ';
			} else {
				return ' target="_blank" rel="noopener noreferrer" ';
			}
		}
	}
}

// =================================================
//	:: Get First / Primary Category ::
// -------------------------------------------------
function theme_get_first_term( $taxonomy, $post = false ) {
	if( !$post ) {
		global $post;
	}
	$terms = get_the_terms( $post, $taxonomy );

	if ( $terms ) {
		if ( class_exists( 'WPSEO_Primary_Term' ) ) {

			// Show the post's 'Primary' category, if this Yoast feature is available, & one is set
			$wpseo_primary_term = new WPSEO_Primary_Term( $taxonomy, $post->ID );
			$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
			$term = get_term( $wpseo_primary_term );
			if ( is_wp_error( $term ) ) {
				return $terms[0];
			} else {
				return $term;
			}

		} else {
			return $terms[0];
		}
	} else {
		return false;
	}
}

// =================================================
//	:: Button ::
// -------------------------------------------------
if( !function_exists( 'the_theme_button' ) ) {

	function the_theme_button( $args ) {

		$defaults = array(
			'url' => false,
			'label' => false,
			'new_tab' => false,
			'class' => 'btn',
			'arrow' => false, // boolean or string
			'echo' => true,
			'before' => '<div class="btn-out">',
			'after' => '</div>',
			'before_label' => '',
			'after_label' => '',
			'additional_attr' => ''
		);

		$r = wp_parse_args( $args, $defaults );

		$btn_url = esc_url( $r['url'] );
		$btn_label = get_link_label( $r['label'] );
		$btn_arrow =  '';
		if( $btn_url ) {
			$btn_classname = ( esc_attr( $r['class'] ) ) ? esc_attr( $r['class'] ) : '';
			if( $r['arrow'] ) {
				if( is_string( $r['arrow'] ) ) {
					$btn_arrow = ' '.$r['arrow'];
				} else {
					$btn_arrow = ' <em class="fas fa-long-arrow-right"></em>';
				}
			}
			$output = $r['before'].'<a '.$r['additional_attr'].' href="'.$btn_url.'" class="'.$btn_classname.'" '.open_new_tab( $r['new_tab'], false ).'>'.$r['before_label'].$btn_label.$r['after_label'].$btn_arrow.'</a>'.$r['after'];

			if( $r['echo'] ) {
				echo $output;
			} else {
				return $output;
			}
		} else {
			return false;
		}
	}
}

// =================================================
//	:: ACF Link Field ::
// -------------------------------------------------
if( !function_exists( 'the_theme_link' ) ) {

	function the_theme_link( $link, $args = array() ) {
		if( !empty( $link ) ) {

			$url = esc_url( $link['url'] );
			$label = get_link_label( $link['title'] );
			$new_tab = $link['target'];

			$defaults = array(
				'echo' => true,
				'arrow' => false,
				'class' => false,
				'title' => false,
			);

			$r = wp_parse_args( $args, $defaults );

			$class = $r['class'] ? esc_attr( $r['class'] ) : '';
			$title = $r['title'] ? esc_attr( $r['title'] ) : '';

			if( $r['arrow'] ) {
				if( is_string( $r['arrow'] ) ) {
					$label .= ' '.$r['arrow'];
				} else {
					$label .= ' <em class="far fa-long-arrow-right"></em>';
				}
			}

			$output = '<a class="'.$class.'" href="'.$url.'" '.open_new_tab( $new_tab, false ).' title="' . $title . '">'.$label.'</a>';

			if( $r['echo'] ) {
				echo $output;
			} else {
				return $output;
			}

		} else {
			return false;
		}
	}

}

// =================================================
//	:: ACF Link Field - Button ::
// -------------------------------------------------
if( !function_exists( 'the_theme_link_button' ) ) {

	function the_theme_link_button( $link, $args = array(), $default_label = 'Learn more' ) {
		if( !empty( $link ) ) {

			$btn_args = array(
				'url' => $link['url'],
				'label' => get_link_label( $link['title'], $default_label ),
				'new_tab' => $link['target']
			);

			$btn_args = array_merge( $btn_args, $args );

			the_theme_button( $btn_args );

		} else {
			return false;
		}
	}
}

// =================================================
//	:: ACF Link Field - Arrow Link ::
// -------------------------------------------------
if( !function_exists( 'the_theme_link_arrow' ) ) {

	function the_theme_link_arrow( $link, $args = array(), $default_label = 'Learn More' ) {
		if( !empty( $link ) ) {

			$btn_args = array(
				'url' => $link['url'],
				'label' => get_link_label( $link['title'], $default_label ),
				'new_tab' => $link['target'],
				'before'  => '<div class="read-more">',
				'class'  => '',
				'arrow' => true
			);

			$btn_args = array_merge( $btn_args, $args );

			the_theme_button( $btn_args );

		} else {
			return false;
		}
	}
}

// =================================================
//	:: Divide Items into columns ::
// -------------------------------------------------
	function theme_divide_array_to_cols( $list, $p ) {
		$listlen = count( $list );
		$partlen = floor( $listlen / $p );
		$partrem = $listlen % $p;
		$partition = array();
		$mark = 0;
		for ( $px = 0; $px < $p; $px++ ) {
			$incr = ( $px < $partrem ) ? $partlen + 1 : $partlen;
			$partition[$px] = array_slice( $list, $mark, $incr );
			$mark += $incr;
		}
		return $partition;
	}

// =================================================
//	:: Get Address by google map field ::
// -------------------------------------------------
	function theme_map_address( $address, $echo = true ) {
		$output_addr = '';
		if( !empty( $address ) ) {

			if( isset( $address['address'] ) ) {
				$output_addr = $address['address'];
			}

		}

		if( $echo ) {
			echo $output_addr;
		} else {
			return $output_addr;
		}
	}


// =================================================
//	:: Clean Up Phone Number ::
// -------------------------------------------------
	function theme_phone_number_cleanup( $phone ) {
		return preg_replace( '/[^0-9+-]/', '', $phone );
	}
