<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!--=== Content - Inner ===-->
<div id="row<?php echo get_row_index(); ?>" class="content-inner off-<?php the_sub_field( 'background_color' ); ?>-bg two-three-column-text-grids">
<div class="container">
	
	<?php the_theme_output( get_sub_field( 'title' ), '<div class="heading-left wow fadeInUp"><h2>', '</h2></div>' ); ?>
		
	<div class="row">
		<?php
		for( $i = 1; $i <= 3; $i++ ):
		
			$text = get_sub_field( 'column_'.$i.'_text' );
			if( $text ):
			?>
			<div class="col-lg-4 col-md-6 wow fadeInUp">
			<?php echo $text; ?>
			</div>
			<?php
			endif;
		endfor;
		?>
	</div>
	
</div>
</div>