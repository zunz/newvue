<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$remove_padding = get_sub_field( 'remove_band_padding' );

$row_css_class = '';
if( in_array( 'top', $remove_padding ) ):
	$row_css_class .= ' p-top-none';
endif;

if( in_array( 'bottom', $remove_padding ) ):
	$row_css_class .= ' p-bottom-none';
endif;
?>

<!--=== Content - Inner ===-->
<div id="row<?php echo get_row_index(); ?>" class="content-inner wysiwyg-band off-<?php the_sub_field( 'background_color' ); ?>-bg <?php echo $row_css_class; ?>">
<div class="container">
	
	<div class="txt wow fadeInUp">
	<div class="max-1264">
		<?php the_sub_field( 'content' ); ?>
	</div>	
	</div>
	
</div>
</div>