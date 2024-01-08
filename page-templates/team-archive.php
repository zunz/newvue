<?php
/* Template Name: Team Archive */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<?php
if( have_posts() ): while( have_posts() ): the_post();
	
	theme_display_flexible_contents( 'flexible_content' );
	
endwhile; endif;
?>

<?php
$terms = get_terms( array( 'taxonomy' => 'department' ) );
if( !empty( $terms ) ):
?>

<!--=== Content - Inner ===-->
<div class="content-inner">
<div class="container">
	
	<?php foreach( $terms as $term ): ?>
		<div class="team-list">
			<div class="heading-left wow fadeInUp">
				<h2><?php echo $term->name; ?></h2>
			</div>
			
			<div class="row">
				<?php
				$cta_image = get_field( 'team_cta_image', $term );
				$cta_content = get_field( 'team_cta_content', $term );
				$display_title = get_field( 'display_team_member_titles', $term );
				$title_location = get_field( 'team_member_title_display_location', $term );
				$display_location = get_field( 'display_team_member_locations', $term );
				$display_join = get_field( 'display_team_member_join_dates', $term );				
				
				$query_args = array(
					'post_type' => 'team_member',
					'posts_per_page' => -1,
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy' => 'department',
							'terms' => $term->term_id
						),
					),
				);
				
				$loop = new WP_Query( $query_args );
				if( $loop->have_posts() ): while( $loop->have_posts() ): $loop->the_post();
					?>
						<div class="col-sm-6 col-lg-3 wow fadeInUp team-entry">
						<?php						
						if( $display_title && 'above-name' == $title_location ):
							the_theme_output( get_field( 'title' ), '<div class="position">', '</div>' );
						endif;
						the_title( '<h4>', '</h4>' );
						if( $display_title && 'below-name' == $title_location ):
							the_theme_output( get_field( 'title' ), '<p>', '</p>' );
						endif;
						the_content();
						
						$text_array = array();						
						$location = trim( get_field( 'location' ) );
						$join_date = trim( get_field( 'join_date' ) );						
						if( $display_location && $location ):
							$text_array[] = $location;
						endif;
						if( $display_join && $join_date ):
							$text_array[] = sprintf( __( 'Joined %s', 'newvue' ), $join_date );
						endif;
						echo wpautop( implode( '<br /> ', $text_array ) );
						?>
						</div>
					<?php
				endwhile; endif;
				wp_reset_postdata();
				?>
				
				
				<?php if( $cta_image || $cta_content ): ?>
					<div class="col-lg-9 wow fadeInUp">
					<div class="box-logo">
					<div class="logo"><?php the_theme_img($cta_image, 'quarter-width'); ?></div>
					<div class="aside">
					<?php echo $cta_content; ?>
					</div>
					</div>
					</div>
				<?php endif; ?>
				
			</div>
		</div>
	<?php endforeach; ?>
	
	
	
</div>
</div>


<?php
endif;
?>

<?php
get_footer();