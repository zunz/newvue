</main>



<!-- Footer - Main
======================== -->
<footer class="footer-main">
<div class="container">
	
	<div class="brand"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"><?php the_theme_img( get_field( 'footer_company_logo', 'options' ), 'quarter-width', array( 'alt' => get_bloginfo( 'name' ) ) ); ?></a></div>
		
	<div class="pre-footer">
		<div class="left-cont">
			<?php echo wpautop( get_field( 'footer_text', 'options' ) ); ?>
			<div class="address-txt">
			<?php echo wpautop( get_field( 'address', 'options' ) ); ?>
			<div class="p-wrap">
				<?php
				$phone_number = trim( get_field( 'phone_number', 'options' ) );
				$email = trim( get_field( 'email', 'options' ) );
				if( $phone_number ):
					?>
					<p><a href="<?php echo esc_url( 'tel:'.theme_phone_number_cleanup( $phone_number ) ); ?>"><?php echo $phone_number; ?></a></p>
					<?php
				endif;
				
				if( $email ):
					?>
					<p><a href="<?php echo esc_url( 'mailto:'.antispambot( $email ) ); ?>"><?php echo antispambot( $email ); ?></a></p>
					<?php
				endif;
				?>			
			</div>
			</div>
			<div class="logo"><?php the_theme_img( get_field( 'partner_logo', 'options' ), 'quarter-width' ); ?></div>
		</div>		
		
		<div class="right-cont">
			<div class="aside-wrap">
				<?php
				for( $i = 1; $i <= 4; $i++ ):
					$menu_title = get_field( 'footer_menu_'.$i.'_title', 'options' );
					$nav_menu = get_field( 'nav_menu_'.$i, 'options' );
					?>
					<div class="aside-cont">
					<?php
					the_theme_output($menu_title, '<h2>', '</h2>');
					if( $nav_menu ):
						$args = array(
							'container'		=> '',
							'menu'			=> $nav_menu,
							'depth'			=> 1,
							'fallback_cb' 	=> false,
						);
						wp_nav_menu( $args );
					endif;
					?>					
					</div>
					<?php
				endfor;
				?>
			</div>
			
			<div class="newsletter-form">
				<div class="txt-wrap">
				<?php the_field( 'subscription_form_text', 'options' ); ?>
				</div>
				<div class="field-wrap">
				<?php
				$subscribe_form = get_field( 'subscribe_form', 'options' );
				if( $subscribe_form && function_exists( 'gravity_form' ) ):
					gravity_form( $subscribe_form, $display_title = false, $display_description = false, $display_inactive = false, $field_values = null, $ajax = true );
				endif;
				?>				
				</div>
			</div>
		</div>
	</div>
	
	
	<div class="copy-rights">
		<div class="inn-wrap">
			<p><a href="http://www.3mediaweb.com/" title="Biotech startup web design company" target="_blank" class="icon-logo">Biotech startup web design company</a> &copy; 2023 NewVue Communites <br /> <span class="divid">|</span> All Rights Reserved</p>			
			<div class="foot-links">
			<?php
			$menu_id = get_field( 'privacy_menu', 'options' );
			if( $menu_id ):
				$args = array(
					'container'		=> '',
					'menu'			=> $menu_id,
					'depth'			=> 1,
					'fallback_cb' 	=> false,
				);
				wp_nav_menu( $args );
			endif;
			?>			
			</div>
		</div>
		
		<?php get_template_part( 'template-parts/social_links' ); ?>
		
	</div>
	
</div>
</footer>

</div>

	
<?php wp_footer(); ?>
<script>
// Using jQuery (version that supports IE < 9)
jQuery( document ).ready(function() {
	outdatedBrowser({
		bgColor: '#f25648',
		color: '#ffffff',
		lowerThan: 'transform',
		languagePath: 'outdatedbrowser/lang/en.html'
	});
});
</script>
	
	
</body>
</html>