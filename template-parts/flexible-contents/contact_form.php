<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!--=== Content - Inner5 ===-->
<div id="row<?php echo get_row_index(); ?>" class="content-inner5">
<div class="container">
	
	<div class="contact-cont">
	
		<?php the_theme_output( get_sub_field( 'title' ), '<div class="heading-left wow fadeInDown"><h2>', '</h2></div>' ); ?>
		
		<div class="row">
			<div class="col-lg-5 wow fadeInLeft">
			<div class="address-cont">
				<div class="content-text txt-28">
					<?php echo wpautop( get_sub_field( 'description' ) ); ?>
				</div>
				
				<?php if( have_rows( 'locations' ) ): ?>
				<div class="sml-txt">
					<?php
					while( have_rows( 'locations' ) ): the_row();
						$text = '';
						$location_title = trim( get_sub_field( 'location_title' ) );
						$location_info = trim( get_sub_field( 'location_info', false ) );
						if( $location_title ):
							$text .= '<strong>'.$location_title.'</strong>';
						endif;
						if( $location_title && $location_info ):
							$text .= '<br /> ';
						endif;
						
						$text .= $location_info;
						echo wpautop( $text );
						
					endwhile;
					?>
				</div>
				<?php endif; ?>
				
			<?php get_template_part( 'template-parts/social_links' ); ?>
			</div>
			</div>
			
			
			<div class="col-lg-7 wow fadeInRight">			
				<div class="form-block">
				<?php
				$form = get_sub_field('form');
				if( $form && function_exists( 'gravity_form' ) ):
					gravity_form( $form, $display_title = false, $display_description = false, $display_inactive = false, $field_values = null, $ajax = true );
				endif;
				?>				
				</div>
			</div>
		</div>
	</div>
	
</div>
</div>