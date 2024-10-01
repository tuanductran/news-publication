<?php
/**
 * Admin Menu Page.
 *
 * @return void
 */
function npub_add_admin_page() {

	add_menu_page( 'News Publication Theme Options', 'News Publication Theme', 'manage_options', 'newspub_panel', 'npub_theme_create_page', NPUB_THEME_URI . 'assets/img/newspub-icon.svg', 59 );
	add_submenu_page( 'newspub_panel', 'General Theme Settings', 'General Settings', 'manage_options', 'newspub_panel', 'npub_theme_create_page' );

}
add_action( 'admin_menu', 'npub_add_admin_page' );


/**
 * Admin Menu Page Callback Function.
 *
 * @return void
 */
function npub_theme_create_page() {
	require_once get_template_directory() . '/inc/templates/newspub-admin.php';
}
