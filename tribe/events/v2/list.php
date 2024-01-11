<?php
/**
 * View: List View
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe/events/v2/list.php
 *
 * See more documentation about our views templating system.
 *
 * @link    http://evnt.is/1aiy
 *
 * @since   6.1.4 Changing our nonce verification structures.
 *
 * @version 6.2.0
 * @since 6.2.0 Moved the header information into a new components/header.php template.
 *
 * @var array    $events               The array containing the events.
 * @var string   $rest_url             The REST URL.
 * @var string   $rest_method          The HTTP method, either `POST` or `GET`, the View will use to make requests.
 * @var int      $should_manage_url    int containing if it should manage the URL.
 * @var bool     $disable_event_search Boolean on whether to disable the event search.
 * @var string[] $container_classes    Classes used for the container of the view.
 * @var array    $container_data       An additional set of container `data` attributes.
 * @var string   $breakpoint_pointer   String we use as pointer to the current view we are setting up with breakpoints.
 */

$header_classes = [ 'tribe-events-header' ];
if ( empty( $disable_event_search ) ) {
	$header_classes[] = 'tribe-events-header--has-event-search';
}


$container_classes[] = 'content-inner2';
//unset($container_classes[0])
?>

<div
	<?php tribe_classes( $container_classes ); ?>
	data-js="tribe-events-view"
	data-view-rest-url="<?php echo esc_url( $rest_url ); ?>"
	data-view-rest-method="<?php echo esc_attr( $rest_method ); ?>"
	data-view-manage-url="<?php echo esc_attr( $should_manage_url ); ?>"
	<?php foreach ( $container_data as $key => $value ) : ?>
		data-view-<?php echo esc_attr( $key ) ?>="<?php echo esc_attr( $value ) ?>"
	<?php endforeach; ?>
	<?php if ( ! empty( $breakpoint_pointer ) ) : ?>
		data-view-breakpoint-pointer="<?php echo esc_attr( $breakpoint_pointer ); ?>"
	<?php endif; ?>
>
	<div class="tribe-common-l-container tribe-events-l-container">
		<?php $this->template( 'components/loader', [ 'text' => __( 'Loading...', 'the-events-calendar' ) ] ); ?>

		<?php $this->template( 'components/json-ld-data' ); ?>

		<?php $this->template( 'components/data' ); ?>

		<?php $this->template( 'components/before' ); ?>

		<?php $this->template( 'components/header' ); ?>

		<?php $this->template( 'components/filter-bar' ); ?>

		<div class="articles-list-wrap">
	
			<?php
			global $post;
			$terms = get_terms( array('taxonomy' => 'tribe_events_cat' ) );
			if( !empty( $terms ) ):
			foreach( $terms as $term ):
				?>
				<div class="articles-list wow fadeInUp" id="<?php echo $term->slug; ?>">
					<div class="heading-center wow fadeInUp">
						<h2><?php echo $term->name; ?></h2>
					</div>
					
					<div class="row">
						<?php
						$posts = tribe_get_events( array( 
						'ends_after' => 'now',
						'posts_per_page' => -1,
						'tax_query' => array(
							array(
								'taxonomy' => 'tribe_events_cat',
								'terms' => $term->term_id,
							)
						)
						) );
						if(!empty($posts)): foreach($posts as $post):
							setup_postdata($post );
							get_template_part( 'template-parts/item', 'event' );
						endforeach; endif;
						wp_reset_postdata();
						?>							
					</div>
				</div>
				<?php
			endforeach;
			endif;
			?>	
			
		</div>

		<?php $this->template( 'components/after' ); ?>

	</div>
</div>