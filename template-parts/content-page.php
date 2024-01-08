<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<!--=== Hero - Inner ===-->
<div class="hero-inner">
<div class="container">
	
	<div class="figure wow fadeIn"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/hero-our-programs.png" alt="" /></div>
	
	<div class="aside wow zoomIn">
	<?php
	$parent_page = theme_get_parent_page( $post->ID );
	if( $parent_page != $post->ID ):
		?>
		<div class="sub-title"><?php get_the_title( $parent_page ); ?></div>	
		<?php
	endif;
	?>
	
	<h1><?php the_title(); ?></h1>
	</div>
	
</div>
</div>


<!--=== Content - Inner ===-->
<div class="content-inner">
<div class="container max-1264">	
	
	<?php the_content(); ?>
	
</div>
</div>