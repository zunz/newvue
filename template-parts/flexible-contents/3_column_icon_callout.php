<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!--=== Icons - List2 ===-->
<div id="<?php echo get_row_index(); ?>" class="icons-list2 off-<?php the_sub_field( 'background_color' ); ?>-bg">
<div class="container">
	
	<?php the_theme_output( get_sub_field( 'title' ), '<div class="heading-center wow fadeInUp"><h2>', '</h2></div>' ); ?>
	
	<?php if( have_rows( 'panels' ) ): ?>
	<div class="row">
	
		<?php while( have_rows( 'panels' ) ): the_row(); ?>
			<div class="col-lg-4 wow fadeInUp">
			<div class="box">
			<div class="icon"><?php the_theme_img( get_sub_field( 'panel_icon' ), 'square-75' ); ?></div>
			<?php
			the_theme_output( get_sub_field( 'panel_heading' ), '<h3>', '</h3>' );
			the_sub_field( 'description' );
			the_theme_link_button( get_sub_field( 'cta_button' ) );
			?>			
			</div>
			</div>
		<?php endwhile; ?>
		
	</div>
	<?php endif; ?>
	
</div>
</div>
