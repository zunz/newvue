<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
if( have_rows( 'social_media_links', 'options' ) ):
?>
	<div class="social-links">
	<ul>
	<?php while( have_rows( 'social_media_links', 'options' ) ): the_row(); ?>	
		<li><a href="<?php the_sub_field( 'social_media_url' ); ?>" class="<?php the_sub_field( 'social_media_icon' ); ?>" target="_blank" rel="noopener noreferrer"><span class="sr-only"><?php the_sub_field( 'text' ); ?></span></a></li>
	<?php endwhile; ?>			
	</ul>
	</div>
<?php
endif;