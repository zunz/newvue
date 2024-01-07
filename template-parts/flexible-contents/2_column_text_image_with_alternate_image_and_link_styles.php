<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!--=== Two Column - Content ===-->
<div id="row<?php echo get_row_index(); ?>" class="two-col-cont p-top-none">
<div class="container">
	
	<div class="row-out col-reverse alt-group">
		<div class="row">
			<div class="col-lg-6 wow fadeInLeft">
			<div class="aside">
			<?php
			the_theme_output( get_sub_field( 'title' ), '<h2>', '</h2>' );
			the_sub_field( 'description' );
			the_theme_link_button( get_sub_field( 'cta_button' ) );
			?>			
			</div>
			</div>					
			<div class="col-lg-6 wow fadeInRight">
			<div class="figure"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/aboutnewvue-group.png" alt="aboutnewvue-group" /></div>
			</div>		
		</div>
	</div>
	
</div>
</div>