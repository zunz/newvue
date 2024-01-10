<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$post_type = get_post_type();
?>

<div class="col-lg-6"><a href="<?php the_permalink(); ?>" class="box <?php echo ( 'post' == $post_type ) ? 'post-box' : ''; ?>">
<div class="figure"><?php the_post_thumbnail( 'hero-band' ); ?></div>
<div class="aside">
<div class="top-wrap">		
<div class="category-name"><?php echo ( 'post' == $post_type ) ? __( 'RECENT NEWS', 'newvue' ) :  __( 'UPCOMING EVENT', 'newvue' ); ?></div>
<div class="date"><?php
	if( 'post' == $post_type ):
		echo get_the_date();
	else:
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
		
		echo $date;
		
	endif;
?></div>
<h3><?php the_title(); ?></h3>
</div>
<div class="btm-wrap">
<div class="read-more"><span class="a">Sign Up <em class="fas fa-long-arrow-right"></em></span></div>
</div>
</div>
</a></div>