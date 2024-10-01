<?php
/**
 * Theme constants
 */
if (!defined('NPUB_THEME_DIR')) {
    define('NPUB_THEME_DIR', trailingslashit(get_template_directory()));
}
if (!defined('NPUB_THEME_URI')) {
    define('NPUB_THEME_URI', trailingslashit(get_template_directory_uri()));
}

if (!defined('NPUB_THEME_CUSTOMIZER_DIR')) {
    define(
        'NPUB_THEME_CUSTOMIZER_DIR',
        trailingslashit(NPUB_THEME_DIR . 'inc/customizer/')
    );
}
if (!defined('NPUB_THEME_CUSTOMIZER_URI')) {
    define(
        'NPUB_THEME_CUSTOMIZER_URI',
        trailingslashit(NPUB_THEME_URI . 'inc/customizer/')
    );
}

if (!defined('NPUB_THEME_VERSION')) {
    $npub_theme = wp_get_theme();
    define('NPUB_THEME_VERSION', $npub_theme->get('Version'));
}

/**
 * Required files for theme
 */
require_once NPUB_THEME_DIR . '/inc/function-admin.php';
require_once NPUB_THEME_DIR . '/inc/assets.php';
require_once NPUB_THEME_DIR . '/inc/theme-support.php';
require_once NPUB_THEME_CUSTOMIZER_DIR . 'class-customizer.php';
require_once NPUB_THEME_DIR . '/inc/actions.php';
require_once NPUB_THEME_DIR . '/inc/filters.php';
require_once NPUB_THEME_DIR . '/inc/functions.php';
require_once NPUB_THEME_DIR . '/inc/shortcodes.php';
require_once NPUB_THEME_DIR . '/inc/tgmpa/tgmpa-configuration.php';
