<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
if( have_posts() ): while( have_posts() ): the_post();
?>

<!--=== Content - Inner3 ===-->
<div class="content-inner3">
<div class="container max-1264">
	
	<div class="single-title wow fadeInUp delay-4">
		<h1><?php the_title(); ?></h1>
	</div>	
	
	<div class="row events-detail">
		<div class="col-lg-8 wow fadeInLeft delay-6">
		<div class="col-in">			
			<div class="date"><?php the_date(); ?></div>
			
			<div class="txt">
			<?php the_content(); ?>
			</div>			
			
		</div>
		</div>
		
		
		<div class="col-lg-4 wow fadeInRight delay-6">
			<div class="figure"><?php the_post_thumbnail( 'single-post' ); ?></div>
		</div>
	</div>
	
</div>
</div>

<?php
endwhile; endif;

get_footer();