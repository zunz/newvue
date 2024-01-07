<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!--=== Content - Inner ===-->
<div id="row<?php echo get_row_index(); ?>" class="content-inner text-and-icon-block off-white-bg">
<div class="container">
	
	<div class="icons-list off-<?php the_sub_field( 'background_color' ); ?>-bg wow fadeInUp">
		<div class="heading-left wow fadeInUp">
			<?php the_theme_output( get_sub_field( 'section_heading' ), '<h2>', '</h2>' ); ?>			
		</div>
		
		<?php if( have_rows( 'programs' ) ): ?>
		
			<div class="row">
			
				<?php while( have_rows( 'programs' ) ): the_row(); ?>
					<?php
					$link = get_sub_field( 'learn_more_link' );
					$link_title = '';
					if( $link ):
						$link_url = $link['url'];
						$link_title = $link['title'] ?: 'Learn More';
						$link_target = $link['target'] ?: '_self';
						
						$opening_tag = '<a class="box" href="'.$link_url.'" target="'.$link_target.'">';
						$closing_tag = '</a>';
					else:
						$opening_tag = '<div class="box">';
						$closing_tag = '</div>';
					endif;
					?>
					<div class="col-md-6 wow fadeInUp"><?php echo $opening_tag; ?>
					<div class="icon"><?php the_theme_img( get_sub_field( 'icon' ), 'quarter-width' ); ?></div>
					<?php
					the_theme_output( get_sub_field( 'program_title' ), '<h3>', '</h3>' );
					the_sub_field( 'description' );					
					if( $link ):
						?>
						<div class="read-more"><span class="a"><?php echo $link_title; ?> <em class="fas fa-long-arrow-right"></em></span></div>
						<?php
					endif;
					?>					
					<?php echo $closing_tag; ?></div>
				<?php endwhile; ?>			
				
			</div>
		
		<?php endif; ?>
		
	</div>
	
</div>
</div>