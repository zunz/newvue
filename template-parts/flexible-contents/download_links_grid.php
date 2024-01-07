<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!--=== Content - Inner ===-->
<div id="<?php echo get_row_index(); ?>" class="content-inner off-white-bg download-links-grid">
<div class="container">
	
	<?php the_theme_output( get_sub_field( 'section_heading' ), '<div class="heading-left wow fadeInUp"><div class="aside"><h2>', '</h2></div></div>' ); ?>	
	
	<?php if( have_rows( 'downloads' ) ): ?>
		<div class="pdf-links wow fadeInUp">	
			<ul>
			<?php
			while( have_rows( 'downloads' ) ): the_row();
				$a_css_class = get_sub_field( 'icon' ) ?: '';
				?>
				<li><?php the_theme_link_button( get_sub_field( 'link' ), array( 'class' => '', 'before_label' => '<i class="'.$a_css_class.'"></i>', 'before' => '', 'after' => '' ) ); ?></li>
				<?php
			endwhile;
			?>			
			</ul>
		</div>
	<?php endif; ?>
	
</div>
</div>