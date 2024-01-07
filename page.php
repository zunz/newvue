<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<?php
if(have_posts()): while(have_posts()): the_post();
	
	theme_display_flexible_contents('flexible_content');
	
endwhile; endif;
?>

<?php
get_footer();