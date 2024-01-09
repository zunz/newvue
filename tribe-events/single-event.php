<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


$events_label_singular = tribe_get_event_label_singular();
$events_label_plural   = tribe_get_event_label_plural();

$event_id = Tribe__Events__Main::postIdHelper( get_the_ID() );

/**
 * Allows filtering of the event ID.
 *
 * @since 6.0.1
 *
 * @param int $event_id
 */
$event_id = apply_filters( 'tec_events_single_event_id', $event_id );

/**
 * Allows filtering of the single event template title classes.
 *
 * @since 5.8.0
 *
 * @param array  $title_classes List of classes to create the class string from.
 * @param string $event_id The ID of the displayed event.
 */
$title_classes = apply_filters( 'tribe_events_single_event_title_classes', [ 'tribe-events-single-event-title' ], $event_id );
$title_classes = implode( ' ', tribe_get_classes( $title_classes ) );

/**
 * Allows filtering of the single event template title before HTML.
 *
 * @since 5.8.0
 *
 * @param string $before HTML string to display before the title text.
 * @param string $event_id The ID of the displayed event.
 */
$before = apply_filters( 'tribe_events_single_event_title_html_before', '<h1 class="' . $title_classes . '">', $event_id );

/**
 * Allows filtering of the single event template title after HTML.
 *
 * @since 5.8.0
 *
 * @param string $after HTML string to display after the title text.
 * @param string $event_id The ID of the displayed event.
 */
$after = apply_filters( 'tribe_events_single_event_title_html_after', '</h1>', $event_id );

/**
 * Allows filtering of the single event template title HTML.
 *
 * @since 5.8.0
 *
 * @param string $after HTML string to display. Return an empty string to not display the title.
 * @param string $event_id The ID of the displayed event.
 */
$title = apply_filters( 'tribe_events_single_event_title_html', the_title( $before, $after, false ), $event_id );
$cost  = tribe_get_formatted_cost( $event_id );

?>
<?php while ( have_posts() ) :  the_post(); ?>
<!--=== Content - Inner3 ===-->
<div class="content-inner3">
<div class="container max-1264">
	
	<div class="single-title wow fadeInUp delay-4">
		<h1><?php the_title(); ?></h1>
	</div>	
	
	<div class="row events-detail">
		<div class="col-lg-8 wow fadeInLeft delay-6">
		<div class="col-in">
			<?php
			$date = '';
			$start_date = tribe_get_start_date( null, false, 'F jS' );
			$end_date = tribe_get_end_date( null, false, 'F jS' );
			
			if( $start_date == $end_date ):
				$date = $start_date;
			else:
				$start_month = tribe_get_start_date( null, false, 'F' );
				$end_month = tribe_get_end_date( null, false, 'F' );
				if( $start_month == $end_month ):
					$start_day = tribe_get_start_date( null, false, 'j' );
					$end_day = tribe_get_end_date( null, false, 'j' );
					$dates = array();
					for( $n = $start_day; $n <= $end_day; $n++ ):
						$dates[] = date_format( date_create( 'Jan '.$n ), 'jS' );
					endfor;
					
					$last_date = array_pop( $dates );
					$date = $end_month . ' ' . implode( ', ', $dates ) . ' &amp; ' . $last_date;					
				else:
					$date = $start_date . ' - ' . $end_date;
				endif;
			endif;
			
			?>
			
			<div class="date"><?php echo $date; ?></div>
			
			<div class="txt">
			<?php the_content(); ?>
			</div>
			
			<?php if( have_rows( 'steps' ) ): ?>
				<div class="divider"><span class="d">Divider</span></div>				
								
				<div class="regis-steps">
					<h3><?php _e( 'Event Registration', 'newvue' ); ?></h3>
					<?php
					$steps = array( 'Zero', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen' );
					while( have_rows( 'steps' ) ):
						the_row();
						?>	
						<div class="step">
						<div class="tlbx">STEP <?php echo $steps[get_row_index()]; ?></div>
						<?php the_sub_field( 'step_description' ); ?>
						</div>
						<?php
					endwhile;
					?>					
				</div>
					
			<?php endif; ?>
			
			<?php
			$ticket_form = get_field( 'ticket_form' );
			if( $ticket_form ):
				?>				
				<div class="divider"><span class="d">Divider</span></div>
				
				<div class="book-class" id="sec-add-to-cart">
					<h3>Virtual Class:</h3>							
					<div class="add-to-cart-form">
					<?php gravity_form( $ticket_form, $display_title = false, $display_description = false, $display_inactive = false, $field_values = null, $ajax = true ); ?>
					</div>
				</div>
				<?php
			endif;
			?>
			
		</div>
		</div>
		
		
		<div class="col-lg-4 wow fadeInRight delay-6">
			<div class="figure"><?php the_post_thumbnail( 'single-post' ); ?></div>
		</div>
	</div>
	
</div>
</div>

<?php endwhile;