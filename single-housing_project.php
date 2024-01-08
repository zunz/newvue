<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
if( have_posts() ): while( have_posts() ): the_post();
?>
<!--=== Hero - Inner ===-->
<div class="hero-inner alt">
<div class="container">
	
	<div class="aside wow zoomIn">
	<?php
	$term = theme_get_first_term( 'status' );
	if( $term ):
		echo '<div class="sub-title">'.$term->name.'</div>';
	endif;
	?>	
	<h1><?php the_title(); ?></h1>
	</div>
	
</div>
</div>

<!--=== Content - Inner5 ===-->
<div class="content-inner5">
<div class="container">
<div class="sticky-col-wrap">
	
	<div class="left-cl">
	<div class="left-in">		
		<div class="row projects-detail">
		
			<div class="col-md-6 wow fadeInUp">
				<?php $images = get_field( 'images' ); ?>
				<?php if( $images ): ?>
				<div class="figure-wrap">
				<div class="owl-carousel" id="gallery-slider">
					<?php foreach( $images as $img ): ?>
						<div class="figure"><?php the_theme_img( $img, 'square-470', array( 'class' => 'no-lazy' ) ); ?></div>
					<?php endforeach; ?>				
				</div>
				<div class="figure-caption">Short caption or label for before/after carousel</div>
				</div>
				<?php endif; ?>
			</div>
			
			<div class="col-md-6 wow fadeInUp">
				<?php
				the_theme_output( get_field( 'address' ), '<div class="location">', '</div>' );
				the_title( '<h2>', '</h2>' );
				the_content();

				$architect = trim( get_field( 'architect' ) );
				$developer = trim( get_field( 'developer' ) );
				
				if( $architect || $developer ):
					?>				
					<div class="smart-info">
						<?php
						the_theme_output( $architect, '<p>' . __( 'Architect:', 'newvue' ) . ' <strong>', '</strong></p>' );
						the_theme_output( $developer, '<p>' . __( 'Developer:', 'newvue' ) . ' <strong>', '</strong></p>' );
						?>
					</div>
					<?php
				endif;
				?>
			</div>
			
		</div>				
		
		<?php $phase = get_field( 'project_timeline_phase' ); ?>
		<div class="timeline-cont wow fadeInUp">
			<h3><?php _e( 'Project Timeline', 'newvue' ); ?></h3>
			<ul>
			<li class="<?php echo ( 1 == $phase ) ? 'active' : ''; ?>"><?php _e( 'Purchased the property', 'newvue' ); ?></li>
			<li class="<?php echo ( 2 == $phase ) ? 'active' : ''; ?>"><?php _e( 'Secured permits and approvals', 'newvue' ); ?></li>
			<li class="<?php echo ( 3 == $phase ) ? 'active' : ''; ?>"><?php _e( 'Finance closing', 'newvue' ); ?></li>
			<li class="<?php echo ( 4 == $phase ) ? 'active' : ''; ?>"><?php _e( 'Construction starts', 'newvue' ); ?></li>
			<li class="<?php echo ( 5 == $phase ) ? 'active' : ''; ?>"><?php _e( 'Construction completed', 'newvue' ); ?></li>
			<li class="<?php echo ( 6 == $phase ) ? 'active' : ''; ?>"><?php _e( 'Available to Rent', 'newvue' ); ?></li>
			</ul>
		</div>		
		
		<?php
		$featured_posts = get_field( 'featured_posts' );
		if( $featured_posts ):
		?>		
		<div class="articles-list2 wow fadeInUp">
			<h3><?php _e( 'Read All About It', 'newvue' ); ?></h3>
			<div class="row">
			<?php
			foreach( $featured_posts as $post ):
				setup_postdata( $post );
				?>
				<div class="col-12"><a href="<?php the_permalink(); ?>" class="box">
				<div class="date"><?php echo get_the_date( 'F js' ); ?></div>
				<h4><?php the_title(); ?></h4>
				</a></div>
				<?php
			endforeach;
			wp_reset_postdata();
			?>			
			</div>
		</div>
		<?php
		endif;
		?>
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
		
		$term = theme_get_first_term( 'status' );
		if( $term ):
			$args['current_category'] = $term->term_id;
		endif;
		
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
endwhile; endif;
get_footer();