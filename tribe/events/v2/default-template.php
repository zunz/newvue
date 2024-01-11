<?php
/**
 * View: Default Template for Events
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/default-template.php
 *
 * See more documentation about our views templating system.
 *
 * @link http://evnt.is/1aiy
 *
 * @version 5.0.0
 */

use Tribe\Events\Views\V2\Template_Bootstrap;

get_header();

?>

<?php if( !is_singular( 'tribe_events' ) ): ?>
<!--=== Hero - Inner ===-->
<div class="hero-inner alt3">
<div class="container max-1264">
	
	<h1 class="sub-title wow fadeInUp"><?php _e( 'Upcoming Events', 'newvue' ); ?></h1>
	
	<div class="filter-dropdown wow fadeInUp">
	<div class="filter-wrap">
		<div class="filter-label">I’m interested in:</div>
		<div class="filter-links">
		<?php
		$terms = get_terms( array( 'taxonomy' => 'tribe_events_cat' ) );
		if( !empty( $terms ) ):
		?>
			<button class="dropdown-toggle" data-bs-toggle="dropdown"><?php echo $terms[0]->name; ?></button>	
			<div class="dropdown-menu">
			<ul>
			<?php foreach( $terms as $term ): ?>
				<li><a href="#<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
			<?php endforeach; ?>			
			</ul>
			</div>
		<?php endif; ?>
		</div>
	</div>
	</div>
	
</div>
</div>
<?php endif; ?>

<?php
echo tribe( Template_Bootstrap::class )->get_view_html();

get_footer();
