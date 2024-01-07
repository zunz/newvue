<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$row_idx = get_row_index();

$slides = get_sub_field( 'slides' );
if( have_rows( 'slides' ) ):
$slides_count = count( $slides );
?>

<!--=== CTA - Content ===-->
<div id="row<?php echo $row_idx; ?>" class="cta-cont off-white-bg">
<div class="container">
	
	<?php
	$wrapper_start = ( $slides_count > 1 ) ? '<div class="owl-carousel wow fadeInUp" id="cta-slider">' : '';
	$wrapper_end = ( $slides_count > 1 ) ? '</div>' : '';
	$box_css_class = ( $slides_count > 1 ) ? '' : ' wow fadeInUp';
	?>
	
	<?php echo $wrapper_start; ?>
	
	<?php while( have_rows( 'slides' ) ): the_row(); ?>
		<div class="box <?php echo $box_css_class; ?>">
		<div class="aside">
		<div class="txt">
		<?php
		the_theme_output( get_sub_field( 'slide_title' ), '<h2>', '</h2>' );
		echo wpautop( get_sub_field( 'slide_text' ) );
		the_theme_link_button( get_sub_field( 'cta' ), array( 'class' => 'btn btn-white' ) );
		?>		
		</div>
		</div>
		<div class="figure"><?php the_theme_img( get_sub_field( 'image' ), 'half-width' ); ?></div>
		</div>
	<?php endwhile; ?>		
	
	<?php echo $wrapper_end; ?>
	
</div>
</div>
<?php
endif;