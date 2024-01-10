<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!--=== Two Column - Content ===-->
<div id="row<?php echo get_row_index(); ?>" class="two-col-cont p-top-none">
<div class="container">
	
	<div class="row-out col-reverse alt-group">
		<div class="row">
			<div class="col-lg-6 wow fadeInLeft">
			<div class="aside">
			<?php
			the_theme_output( get_sub_field( 'title' ), '<h2>', '</h2>' );
			the_sub_field( 'description' );
			the_theme_link_button( get_sub_field( 'cta_button' ) );
			?>			
			</div>
			</div>					
			<div class="col-lg-6 wow fadeInRight">
			<div class="collage-wrap">
				<?php
				the_theme_img( get_sub_field( 'collage_image_1' ), 'half-width', array( 'class' => 'collage-1' ) );
				the_theme_img( get_sub_field( 'collage_image_3' ), 'half-width', array( 'class' => 'collage-3' ) );
				the_theme_img( get_sub_field( 'collage_image_2' ), 'half-width', array( 'class' => 'collage-2' ) );
				?>
			</div>
			</div>		
		</div>
	</div>
	
</div>
</div>