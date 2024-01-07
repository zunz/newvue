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

	
<!--=== Latest - Feeds ===-->
<div class="latest-feeds">
<div class="container">
	
	<div class="row wow fadeInUp">
		<div class="col-lg-6"><a href="upcoming-events.html" class="box">
		<div class="figure"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/latest-feeds-upcomingevents.png" alt="latest-feeds-upcomingevents" /></div>
		<div class="aside">
		<div class="top-wrap">		
		<div class="category-name">UPCOMING EVENT</div>
		<div class="date">October 24th, 25th & 26th</div>
		<h3>First-Time Homebuyer Education Classes</h3>
		</div>
		<div class="btm-wrap">
		<div class="read-more"><span class="a">Sign Up <em class="fas fa-long-arrow-right"></em></span></div>
		</div>
		</div>
		</a></div>
		
		<div class="col-lg-6"><a href="news.html" class="box">
		<div class="figure"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/latest-feeds-news.png" alt="latest-feeds-news" /></div>
		<div class="aside">
		<div class="top-wrap">		
		<div class="category-name">RECENT NEWS</div>
		<div class="date">May 27, 2023</div>
		<h3>Congressman Mcgovern Brings Great News To Anthol</h3>
		</div>
		<div class="btm-wrap">
		<div class="read-more"><span class="a">Read More <em class="fas fa-long-arrow-right"></em></span></div>
		</div>
		</div>
		</a></div>		
	</div>
	
</div>
</div>