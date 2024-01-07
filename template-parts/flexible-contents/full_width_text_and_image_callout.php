<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$band_template = get_sub_field( 'band_template' );

$css_class = ( 'list' == $band_template ) ? 'alt' : '';
?>

<!--=== Split - Content ===-->
<div id="<?php echo get_row_index(); ?>" class="split-cont full-width-text-and-image-callout <?php echo $css_class; ?>">
<div class="row">
	
	<div class="col-lg-6 wow fadeInLeft">
		<div class="aside">
		<div class="txt-max">
		<?php
		the_theme_output( get_sub_field( 'title' ), '<h2>', '</h2>' );
		
		if( 'list' == $band_template ):
			if( have_rows( 'list_items' ) ):
			?>
			<div class="bullet-list">
			<ul>
			<?php
			while( have_rows( 'list_items' ) ): the_row();
				the_theme_output( get_sub_field( 'list_item_text' ), '<li>', '</li>' );
			endwhile;
			?>			
			</ul>	
			</div>
			<?php
			endif;
		else:
			?>
			<div class="txt-split2">
				<div class="txt">
					<?php echo wpautop( get_sub_field( 'column_1_text' ) ); ?>
				</div>
				<div class="txt">
					<?php echo wpautop( get_sub_field( 'column_2_text' ) ); ?>
				</div>
			</div>
			<?php
		endif;
		?>	
		
		</div>
		</div>
	</div>
	
	<div class="col-lg-6 wow fadeInRight">
		<div class="figure"><?php the_theme_img( get_sub_field( 'image' ), 'half-width' ); ?></div>
	</div>
	
</div>
</div>
