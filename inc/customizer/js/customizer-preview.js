	/*
 * Script run inside a Customizer preview frame.
 */
( function( $ ) {
    /**
	 * Change Logo width
	 * 'logo_width' is the name of the setting, as added by the $wp_customize->add_setting call
	 * @type {String}
	 */
    wp.customize( 'logo_width', function( value ) {
		value.bind( function( to ) {
			//$( '.npub_logo' ).width( to );
		} );
	} );

} )( jQuery );