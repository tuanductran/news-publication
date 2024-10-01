<?php
/**
 * Customizer dynamic Css | Output customize CSS
 *
 * @return void
 */
function npub_wp_customize_css()
{
    ?>
	<style type="text/css">
		:root {
			--accent: <?php echo esc_html(
       get_theme_mod('accent_color_picker_setting', '#CCFF2E')
   ); ?>;
			--body-background: <?php echo esc_html(
       get_theme_mod('body_bg_color_picker_setting', '#150E20')
   ); ?>;
			--body-secondary-color: <?php echo esc_html(
       get_theme_mod('body_secondary_color_picker_setting', '#392E49')
   ); ?>;
			--headers-color: <?php echo esc_html(
       get_theme_mod('headers_color_picker_setting', '#ffffff')
   ); ?>;
			--text-color: <?php echo esc_html(
       get_theme_mod('text_color_picker_setting', '#7E7689')
   ); ?>;
			--secondary-text-color: <?php echo esc_html(
       get_theme_mod('secondary_text_color_picker_setting', '#7E7689')
   ); ?>;
			--link-color: <?php echo esc_html(
       get_theme_mod('link_color_picker_setting', '#FFFFFF')
   ); ?>;
			--postcard-hover-color: <?php echo esc_html(
       get_theme_mod('post_card_color_picker_setting', '#21172E')
   ); ?>;
			--headline-bg-color: <?php echo esc_html(
       get_theme_mod('headline_background_color_picker_setting', '#211732')
   ); ?>;
			--headline-text-color: <?php echo esc_html(
       get_theme_mod('headline_text_color_picker_setting', '#ffffff')
   ); ?>;
			--gradient-color: <?php echo esc_html(
       get_theme_mod('overlay_background_color_picker_setting', '#190D29')
   ); ?>;
			--desktop-logo-width: <?php echo esc_html(
       get_theme_mod('logo_width', 240) . 'px'
   ); ?>;
			--mobile-logo-width: <?php echo esc_html(
       get_theme_mod('mobile_logo_width', 240) . 'px'
   ); ?>;
			--desktop-footer-logo-width: <?php echo esc_html(
       get_theme_mod('footer_logo_width', 240) . 'px'
   ); ?>;
			--mobile-footer-logo-width: <?php echo esc_html(
       get_theme_mod('footer_mobile_logo_width', 240) . 'px'
   ); ?>;
		}
	</style>
	<?php
}

add_action('wp_head', 'npub_wp_customize_css');

/**
 * Dark News Theme header
 *
 * @return void
 */
function npub_headers_callback()
{
    $header_layout = get_theme_mod('header_layout_setting', 'header-default');
    switch ($header_layout) {
        case 'header-left':
            get_template_part('inc/templates/headers/template-header', 'left');
            break;
        case 'header-default':
            get_template_part(
                'inc/templates/headers/template-header',
                'default'
            );
            break;
        default:
            get_template_part(
                'inc/templates/headers/template-header',
                'default'
            );
    }
}
add_action('npub_header', 'npub_headers_callback');

/**
 * Dark News Theme header
 *
 * @return void
 */
function npub_footer_callback()
{
    $header_layout = get_theme_mod('footer_layout_setting', 'header-default');
    switch ($header_layout) {
        case 'footer-default-col':
            get_template_part(
                'inc/templates/footers/template-footer',
                'default-col'
            );
            break;
        case 'footer-default':
            get_template_part(
                'inc/templates/footers/template-footer',
                'default'
            );
            break;
        case 'footer-modern':
            get_template_part(
                'inc/templates/footers/template-footer',
                'modern'
            );
            break;
        default:
            get_template_part(
                'inc/templates/footers/template-footer',
                'default'
            );
    }
}
add_action('npub_footer', 'npub_footer_callback');

/**
 * Register Widgets | Enable widgets to the right of the header
 *
 * @return void
 */
function npub_widget_area_init()
{
    register_sidebar([
        'name' => 'Header Top Right Widget Area',
        'id' => 'top_right_widget_area',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
    ]);
    register_sidebar([
        'name' => 'Header Top Left Widget Area',
        'id' => 'top_left_widget_area',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
    ]);
    register_sidebar([
        'name' => 'Header Overlay Widget Area',
        'id' => 'overlay_widget_area',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
    ]);
    register_sidebar([
        'name' => 'Single Article Side Widget Area',
        'id' => 'single_article_side_widget_area',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
    ]);
    register_sidebar([
        'name' => 'Footer Posts Widget Area',
        'id' => 'footer_post_widget_area',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
    ]);
    register_sidebar([
        'name' => 'Footer Widget Area',
        'id' => 'footer_widget_area',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
    ]);
}
add_action('widgets_init', 'npub_widget_area_init');

/**
 * Registers an editor stylesheet for the theme.
 */
function npub_editor_stylesheet()
{
    add_theme_support('editor-styles');
    add_editor_style('assets/css/bootstrap.css');
}
add_action('admin_init', 'npub_editor_stylesheet');

/**
 * Exclude Pages from search in WordPress
 *
 * @param  object $query Search Query.
 * @return object
 */
function npub_search_filter_pages($query)
{
    if (is_admin()) {
        return $query;
    }
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts', 'npub_search_filter_pages');
