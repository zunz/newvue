<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$classes = array(
	'solid-top-left' => '',
	'dotted-top-right' => 'alt2',
	'solid-top-right' => 'alt',
);

$overlay_texture = get_sub_field( 'overlay_texture' );
?>

<!--=== Hero - Inner ===-->
<div id="row<?php echo get_row_index(); ?>" class="hero-inner <?php echo $classes[$overlay_texture]; ?>">
<div class="container">
	
	<div class="figure wow fadeIn"><?php the_theme_img( get_sub_field( 'background_image' ), 'full-width' ); ?></div>
	
	<div class="aside wow zoomIn">
	<?php
	the_theme_output( get_sub_field( 'subtitle' ), '<div class="sub-title">', '</div>' );
	the_theme_output( get_sub_field( 'page_title' ), '<h1>', '</h1>' );
	?>
	</div>
	
</div>
</div>