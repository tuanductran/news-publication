<?php
/**
 * Dark News Filters
 */
function npub_body_custom_class( $classes ) {
	$single_article_banner  = get_theme_mod( 'single_article_banner_setting', 'article-banner-middle-title' );
	$single_article_content = get_theme_mod( 'single_article_content_setting', 'article-content' );
	if ( is_singular( 'post' ) ) {
		$classes[] = $single_article_banner;
		$classes[] = $single_article_content;
	}
	return $classes;
}
add_filter( 'body_class', 'npub_body_custom_class' );


/**
 * Header Logo Section.
 *
 * @return void
 */
function npub_headers_logo_callback() {
	ob_start();
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	if ( has_custom_logo() ) {
		echo '<a href="' . esc_url( get_home_url() ) . '">';
		echo wp_get_attachment_image(
			$custom_logo_id,
			'full',
			false,
			array(
				'class' => 'nlogo-1 npub_logo',
				'alt'   => get_bloginfo( 'name' ), 
			)
		);
		echo '</a>';
	} else {
		echo '<h1>' . esc_html( get_bloginfo( 'name' ) ) . '</h1>';
	}
	$logo = ob_get_clean();
	echo wp_kses_post( $logo );
}
add_filter( 'get_custom_logo', 'npub_headers_logo_callback' );

/**
 * Show ... after short string.
 *
 * @param  string $more More content.
 * @return string
 */
function npub_excerpt_more( $more ) {
	if ( ! is_single() ) {
		$more = '...';
	}
	return $more;
}
add_filter( 'excerpt_more', 'npub_excerpt_more' );


/**
 * Set length of excerpt content of the post.
 *
 * @param  int $length excerpt content length.
 * @return int
 */
function npub_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'npub_custom_excerpt_length', 999 );

/**
 * Body Class.
 *
 * @param  array $classes Body Classes.
 * @return array
 */
function npub_body_class( $classes ) {
	$current_demo = get_option( 'current_demo', 'npub_demo_modern' );
	$classes[]    = $current_demo;
	return $classes;
}
add_filter( 'body_class', 'npub_body_class' );
