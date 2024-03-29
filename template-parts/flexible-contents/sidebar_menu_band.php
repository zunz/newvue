<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<!--=== Content - Inner ===-->
<div id="row<?php echo get_row_index(); ?>" class="content-inner sidebar-menu-band">
<div class="container">
<div class="sticky-col-wrap">
	
	<div class="left-cl">
	<div class="left-in">		
		<div class="txt wow fadeInUp body-text">
		<?php the_sub_field( 'body_text' ); ?>
		</div>
		
		<?php
		$image = get_sub_field( 'image' );
		if( $image ):
			?>		
			<div class="figure-circle wow fadeInUp">
			<?php
			the_theme_img( $image, 'half-width' );
			the_theme_output( $image['caption'], '<span class="figure-caption">', '</span>' );
			?>
			</div>
			<?php
		endif;
		?>
		
		<?php
		while( have_rows( 'two_column_content' ) ): the_row();
			$title = trim( get_sub_field( 'title' ) );
			if( have_rows( 'row' ) ):
				?>
				<div class="row-cont wow fadeInUp">
					<?php the_theme_output( $title, '<h2>', '</h2>' ); ?>
					<div class="row">
						<?php
						while( have_rows( 'row' ) ): the_row();
							$left_column_content = trim( get_sub_field( 'left_column_content' ) );
							$right_column_content = trim( get_sub_field( 'right_column_content' ) );
							if( $left_column_content ):
								?>
								<div class="col-md-6">
									<?php echo $left_column_content; ?>
								</div>
								<?php
							endif;
							
							if( $right_column_content ):
								?>
								<div class="col-md-6">
									<?php echo $right_column_content; ?>
								</div>
								<?php
							endif;
						endwhile;
						?>
					</div>
				</div>				
				<?php
			endif;
		endwhile;
		?>
		
		<?php while( have_rows( 'rows' ) ): the_row(); ?>
			<div class="txt-split wow fadeInUp">
				<?php
				the_theme_output( get_sub_field( 'row_title' ), '<h2>', '</h2>' );
				echo wpautop( get_sub_field( 'row_description' ) );
				?>
			</div>
		<?php endwhile; ?>	
		
	</div>
	</div>
	
	
	<div class="right-cl">
	<div class="right-in wow fadeInRight">
		<?php
		if( 'buttons' == get_sub_field( 'menu_format' ) ):
			if( have_rows( 'buttons' ) ):
				?>
				<div class="submenu-btns">
				<ul>
				<?php while( have_rows( 'buttons' ) ): the_row(); ?>
					<li><?php the_theme_link( get_sub_field( 'button_link' ) ); ?></li>
				<?php endwhile; ?>
				</ul>
				</div>
				<?php
			endif;
		else:
			the_theme_output( get_sub_field( 'menu_title' ), '<h3>', '</h3>' );
			$menu_id = get_sub_field( 'menu' );
			if( $menu_id ):
				$args = array(
					'container'		=> '',
					'menu'			=> $menu_id,
					'depth'			=> 2,
					'fallback_cb' 	=> false,
					'items_wrap'	=> '<div class="submenu-items">%3$s</div>',
					'walker' 		=> new Theme_Sidebar_Nav_Walker(),
				);			
				wp_nav_menu( $args );				
			endif;			
		endif;
		?>
	</div>
	</div>		
	
</div>
</div>
</div>