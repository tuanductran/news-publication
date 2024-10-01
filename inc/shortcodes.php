<?php

/**
 * Npub Date Shortcode
 *
 * @return void
 */
function npub_date_shortcode_callback()
{
    // Formate: Tuesday, March 12th 2023.
    ob_start();
    echo wp_date('l, F jS Y');
    return ob_get_clean();
}
add_shortcode('npub_date', 'npub_date_shortcode_callback');
