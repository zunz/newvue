<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!--=== Hero - Main ===-->
<div id="row<?php echo get_row_index(); ?>" class="hero-main">
<div class="container max-1264">
	
	<div class="figure wow fadeIn"><?php the_theme_img( get_sub_field( 'background_image' ), 'full-width' ); ?></div>
	
	<div class="aside wow fadeInLeft">
		<?php the_theme_output( get_sub_field( 'page_title' ), '<h1>', '</h1>' ); ?>	
		<div class="btn-wrap">
			<?php the_theme_link_button( get_sub_field( 'transparent_cta_button' ), array( 'class' => 'btn btn-white', 'before' => '', 'after' => '' ) ); ?>
			<?php the_theme_link_button( get_sub_field( 'green_cta_button' ), array( 'class' => 'btn btn-fill', 'before' => '', 'after' => '' ) ); ?>		
		</div>
	</div>
	
</div>
</div>

<?php
$posts = array();
$featured_posts_feed = get_sub_field( 'featured_posts_feed' );
if( 'upcoming-events' == $featured_posts_feed ):
	$posts = tribe_get_events( array( 'ends_after' => 'now', 'posts_per_page' => 2 ) );
elseif( 'recent-news' == $featured_posts_feed ):
	$posts = get_posts( array( 'post_type' => 'post', 'posts_per_page' => 2 ) );
elseif( 'all-posts' == $featured_posts_feed ):
	$posts = get_posts( array( 'post_type' => array( 'post', 'tribe_events' ), 'posts_per_page' => 2 ) );
else:
	$posts = get_sub_field( 'manual_featured_posts' );
endif;

if( !empty( $posts ) ):
	?>
	<!--=== Latest - Feeds ===-->
	<div class="latest-feeds">
	<div class="container">
		
		<div class="row wow fadeInUp">
			<?php
			foreach( $posts as $post ):
				setup_postdata( $post );
				get_template_part( 'template-parts/item', 'hero_band' );
			endforeach;
			wp_reset_postdata();
			?>				
		</div>
		
	</div>
	</div>
<?php
endif;