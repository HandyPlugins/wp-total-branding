<?php


/**
 * Get default logo path
 *
 * @since 1.0
 * @return string|void
 */
function wptb_default_login_logo() {
	$response = wp_remote_head( admin_url() . 'images/wordpress-logo.svg' );

	if ( ! is_wp_error( $response ) && isset( $response['response']['code'] ) && '200' == $response['response']['code'] ) {
		return admin_url( 'images/wordpress-logo.svg' );
	}

	// fallback
	return admin_url( 'images/wordpress-logo.png' );
}


/**
 * Get single option of plugin
 *
 * @since 1.0
 *
 * @param string     $key
 * @param bool|false $default
 *
 * @return mixed|void
 */
function wptb_get_option( $key = '', $default = false ) {
	$plugin_options = get_site_option( WPTB_OPTION );
	$value          = ! empty( $plugin_options[ $key ] ) ? $plugin_options[ $key ] : $default;
	$value          = apply_filters( 'wptb_get_option', $value, $key, $default );

	return apply_filters( 'wptb_get_option_' . $key, $value, $key, $default );
}
