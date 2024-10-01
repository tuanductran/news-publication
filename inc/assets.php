<?php
/**
 * Admin Enqueue functions
 *
 * @param  mixed $hook Hooks.
 * @return void
 */
function npub_load_admin_scripts($hook)
{
    if ('toplevel_page_newspub_panel' != $hook) {
        return;
    }

    /**
     * Backend Register Styles
     */
    wp_register_style(
        'newspub_admin',
        NPUB_THEME_URI . 'assets/css/newspub.admin.css',
        [],
        NPUB_THEME_VERSION,
        'all'
    );
    wp_enqueue_style('newspub_admin');

    wp_enqueue_media();

    /**
     * Backend Register Scripts
     */
    wp_register_script(
        'newspub-admin-script',
        NPUB_THEME_URI . 'assets/js/newspub.admin.js',
        ['jquery'],
        NPUB_THEME_VERSION,
        true
    );
    wp_enqueue_script('newspub-admin-script');
}

add_action('admin_enqueue_scripts', 'npub_load_admin_scripts');

/**
 * Darknews Enqueue Css and js.
 *
 * @return void
 */
function npub_enqueue_assets()
{
    /**
     * Frontend Register Styles
     */
    wp_register_style(
        'npub-newsreader',
        'https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,200;0,6..72,300;0,6..72,400;0,6..72,500;0,6..72,600;0,6..72,700;0,6..72,800;1,6..72,200;1,6..72,300;1,6..72,400;1,6..72,500;1,6..72,600;1,6..72,700;1,6..72,800&display=swap',
        [],
        NPUB_THEME_VERSION,
        'all'
    );
    wp_enqueue_style('npub-newsreader');

    wp_register_style(
        'npub-bootstrap',
        NPUB_THEME_URI . 'assets/css/bootstrap.min.css',
        [],
        NPUB_THEME_VERSION,
        'all'
    );
    wp_enqueue_style('npub-bootstrap');

    wp_register_style(
        'npub-font-awesome',
        NPUB_THEME_URI . 'assets/css/font-awesome.css',
        [],
        NPUB_THEME_VERSION,
        'all'
    );
    wp_enqueue_style('npub-font-awesome');

    wp_register_style(
        'npub-pt-sans-fonts',
        'https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap',
        [],
        NPUB_THEME_VERSION,
        'all'
    );
    wp_enqueue_style('npub-pt-sans-fonts');

    wp_enqueue_style(
        'npub-style',
        get_stylesheet_uri(),
        [],
        NPUB_THEME_VERSION,
        'all'
    );

    /**
     * Frontend Register Scripts
     */
    wp_register_script(
        'npub-customjs',
        NPUB_THEME_URI . 'assets/js/scripts.js',
        ['jquery'],
        NPUB_THEME_VERSION,
        true
    );
    wp_enqueue_script('npub-customjs');

    wp_enqueue_style('dashicons');

    if (is_singular()) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'npub_enqueue_assets');
