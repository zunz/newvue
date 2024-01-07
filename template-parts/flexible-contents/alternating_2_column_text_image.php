<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$row_idx = get_row_index();

$initial_row_layout = get_sub_field( 'initial_row_layout' );
$row_size = get_sub_field( 'row_size' );
if( have_rows( 'row' ) ):
	$container_css_class = ( 'smaller' == $row_size ) ? 'max-1264' : '';
	?>
	<!--=== Two Column - Content ===-->
	<div id="row<?php echo $row_idx; ?>" class="two-col-cont <?php echo ( 'image-left' == $initial_row_layout ) ? 'alt' : ''; ?>">
	<div class="container <?php echo $container_css_class; ?>">
	<div class="row-out">	

		<?php while( have_rows( 'row' ) ): the_row(); ?>		
			
			<div class="row frame-style-<?php the_sub_field( 'image_frame' ); ?> off-<?php the_sub_field( 'background_color' ); ?>-bg">
				<div class="col-lg-6 wow fadeInLeft">
				<div class="aside">
				<?php
				the_theme_output( get_sub_field( 'title' ), '<h2>', '</h2>' );
				the_sub_field( 'description' );
				the_theme_link_arrow( get_sub_field( 'cta' ) );
				?>					
				</div>
				</div>					
				<div class="col-lg-6 wow fadeInRight">
					<?php
					$image = get_sub_field( 'image' );					
					if( $image ):
						?>
						<div class="figure">
						<div class="inn"><?php the_theme_img( $image, 'square-592' ); ?></div>
						<div class="circle-lrg wow zoomIn"><span class="sr-only">Circle Large</span></div>
						<div class="circle-sml wow zoomIn"><span class="sr-only">Circle Small</span></div>
						</div>
						<?php
					endif;
					?>
				</div>		
			</div>
		
		<?php endwhile; ?>
		
	</div>
	</div>
	</div>
	<?php
endif;