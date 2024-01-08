<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$term = get_queried_object();
?>
<!--=== Hero - Inner ===-->
<div class="hero-inner alt">
<div class="container">
	
	<div class="aside wow zoomIn">
	<div class="sub-title"><?php _e( 'Affordable Housing', 'newvue' ); ?></div>
	<h1><?php echo $term->name; ?></h1>
	</div>
	
</div>
</div>

<!--=== Content - Inner5 ===-->
<div class="content-inner5">
<div class="container">
<div class="sticky-col-wrap">
	
	<div class="left-cl">
	<div class="left-in">
		<?php
		$term_desc = trim( $term->description );
		if($term_desc):
			?>
			<div class="txt wow fadeInUp">
				<?php echo wpautop($term_desc); ?>
			</div>
			<?php
		endif;
		?>
		
		<div class="articles-list">			
			<div class="row">
				<?php
				if( have_posts() ):
					while( have_posts() ):
						the_post();
						?>
						<div class="col-sm-6 wow fadeInUp">
							<div class="box-wrap">
								<a class="box" href="#<?php echo $post->post_name; ?>" data-bs-toggle="modal">
									<div class="figure"><?php the_post_thumbnail( 'square-470' ); ?></div>
									<div class="aside">
									<?php
									the_theme_output( get_field( 'address' ), '<div class="location">', '</div>' );
									the_title( '<h3>', '</h3>' );
									?>
									</div>
								</a>
								<div class="read-more"><a href="<?php the_permalink(); ?>">View Project <em class="fas fa-long-arrow-right"></em></a></div>								
							</div>
							
							<!-- Modal -->
							<div class="modal property-modal fade" id="<?php echo $post->post_name; ?>">
							<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">		
							<div class="container">
							<div class="row projects-detail">
								<div class="col-md-6">
								<div class="figure"><?php the_post_thumbnail( 'square-470' ); ?></div>
								</div>			
								<div class="col-md-6">
								<?php
								the_theme_output( get_field( 'address' ), '<div class="location">', '</div>' );
								the_title( '<h2>', '</h2>' );
								the_content();
								
								$architect = trim( get_field( 'architect' ) );
								$developer = trim( get_field( 'developer' ) );
								$unit_number = trim( get_field( 'unit_number' ) );
								
								if( $architect || $developer || $unit_number ):
									?>				
									<div class="smart-info">
										<?php
										the_theme_output( $architect, '<p>' . __( 'Architect:', 'newvue' ) . ' <strong>', '</strong></p>' );
										the_theme_output( $developer, '<p>' . __( 'Developer:', 'newvue' ) . ' <strong>', '</strong></p>' );
										the_theme_output( $unit_number, '<p>' . __( 'Number of Units:', 'newvue' ) . ' <strong>', '</strong></p>' );
										?>
									</div>
									<?php
								endif;
								
								$feature_information = trim( get_field( 'feature_information' ) );
								if( $feature_information ):
								?>
								<div class="ulbx">
								<?php echo $feature_information; ?>
								</div>
								<?php
								endif;
								?>
								</div>
							</div>		
							</div>
							</div>
							</div>
							</div>
							
						</div>
						<?php
					endwhile;
				endif;
				?>
			</div>
		</div>						
	</div>
	</div>
	
	
	<div class="right-cl">
	<div class="right-in wow fadeInRight">		
		<h3><?php _e( 'Affordable Housing', 'newvue' ); ?></h3>		
		<div class="submenu-list">
		<ul>
		<?php
		$args = array(
			'taxonomy' => 'status',
			'title_li' => '',
			'depth' => 1,
			'hide_empty' => false,
		);
		
		wp_list_categories( $args );
		?>		
		</ul>
		</div>
	</div>
	</div>		
	
</div>
</div>
</div>

<?php
get_footer();