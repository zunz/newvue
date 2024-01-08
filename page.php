<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<?php
if( have_posts() ): while( have_posts() ): the_post();
	
	if( have_rows( 'flexible_content' ) ):
		theme_display_flexible_contents( 'flexible_content' );
	else:
		get_template_part( 'template-parts/content', 'page' );
	endif;
	
endwhile; endif;
?>

<?php
get_footer();