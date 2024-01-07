<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!--=== Testimonial - Content ===-->
<div id="<?php echo get_row_index(); ?>" class="testimonial-cont alt off-<?php the_sub_field( 'background_color' ); ?>-bg">
<div class="container max-1264">
	
	<?php if( have_rows( 'slides' ) ): ?>
	<div class="owl-carousel" id="testimonial-slider">
		<?php while( have_rows( 'slides' ) ): the_row(); ?>
			<div class="item">
			<div class="figure"><div class="inn"><?php the_theme_img( get_sub_field( 'image' ), 'square-592', array( 'class' => 'no-lazy' ) ); ?></div></div>
			<div class="aside">
			<?php
			echo wpautop( get_sub_field( 'testimonial' ) );
			the_theme_output( get_sub_field( 'quote_name' ), '<div class="author-name">', '</div>' );
			?>
			</div>
			</div>
		<?php break; endwhile; ?>
	</div>
	<?php endif; ?>
	
</div>
</div>