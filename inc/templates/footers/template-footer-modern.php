	<div class="row">
		<div class="footer-two pb-0 mordern-footer">
			<div class="container px-3">
				<?php
    $footer_logo = get_theme_mod('footer_custom_logo');
    if (!empty($footer_logo)) { ?>
					<div class="wp-block-image">
						<a href="<?php echo esc_url(site_url()); ?>">
							<figure class="aligncenter">
								<img class="npub_footer_logo" src="<?php echo esc_url(
            $footer_logo
        ); ?>" width="241" height="32" loading="lazy" alt="logo">
							</figure>
						</a>
					</div>	
					<?php }
    if (is_active_sidebar('footer_widget_area')) {
        dynamic_sidebar('footer_widget_area');
    }
    ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="footer-one mt-3">
			<div class="container px-3">
				<?php if (is_active_sidebar('footer_post_widget_area')) {
        dynamic_sidebar('footer_post_widget_area');
    } ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="footer-two pt-0">
			<div class="container">
				<?php
    if (has_nav_menu('footer-menu1')) {
        wp_nav_menu([
            'theme_location' => 'footer-menu1',
            'menu_class' => 'footer-menu1 menu',
        ]);
    }
    if (has_nav_menu('footer-menu2')) {
        wp_nav_menu([
            'theme_location' => 'footer-menu2',
            'menu_class' => 'footer-menu2 menu',
        ]);
    }
    ?>
			</div>
		</div>
	</div>
	<?php $copyright_text = get_theme_mod(
     'footer_copyright_setting',
     'Copy2022 Lorem ipsum Lorem ipsum Lorem ipsum'
 ); ?>
	<div class="row ">
	<div class="footer-three">
		<p class="has-text-align-center"><?php echo wp_kses_post(
      $copyright_text
  ); ?></p>
	</div>
	</div>

