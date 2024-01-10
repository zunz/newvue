<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<!--=== Hero - Inner ===-->
<div class="hero-inner">
<div class="container">	
	<div class="aside wow zoomIn">
	<h1><?php echo get_the_title( get_option( 'page_for_posts' ) ); ?></h1>
	</div>	
</div>
</div>


<!--=== Content - Inner2 ===-->
<div class="content-inner2">
<div class="container">
	
	
	<div class="articles-list-wrap">
		<div class="articles-list wow fadeInUp" id="sec-first-time-homebuyer-classes">
		
			<?php if( is_archive() ): ?>
				<div class="heading-center wow fadeInUp">
					<h2><?php the_archive_title(); ?></h2>
				</div>
			<?php endif; ?>
			
			
			<div class="row">
			
				<?php if( have_posts() ): while( have_posts() ): the_post(); ?>
					<div class="col-sm-6 col-lg-4 wow fadeInUp"><a href="<?php the_permalink(); ?>" class="box">
					<div class="figure"><?php the_post_thumbnail(); ?></div>
					<div class="aside">
					<div class="date"><?php echo get_the_date(); ?></div>
					<h3><?php the_title(); ?></h3>
					<div class="read-more"><span class="a">Read More <em class="fas fa-long-arrow-right"></em></span></div>
					</div>
					</a></div>
				<?php endwhile; endif; ?>
				
			</div>
			
			<?php if( get_next_posts_link() ): ?>
				<div class="load-more-btn-wrap">
					<?php next_posts_link( __( 'Load More', 'newvue' ) ); ?>
				</div>
			<?php endif; ?>
			
		</div>
	</div>
	
</div>
</div>
	
	
	
<?php
get_footer();