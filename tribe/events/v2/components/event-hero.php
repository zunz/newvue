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