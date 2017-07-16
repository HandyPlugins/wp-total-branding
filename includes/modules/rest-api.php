<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}



$rest_status = (bool) wptb_get_option( 'rest-api-status' );


if ( false === $rest_status ) { // remove REST-API related things

	if ( version_compare( get_bloginfo( 'version' ), '4.7', '>=' ) ) {
		add_filter( 'rest_endpoints', '__return_empty_array' );
	} else {
		add_filter( 'json_enabled', '__return_false' );
		add_filter( 'json_jsonp_enabled', '__return_false' );

		add_filter( 'rest_enabled', '__return_false' );
		add_filter( 'rest_jsonp_enabled', '__return_false' );

		remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
		remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
		remove_action( 'template_redirect', 'rest_output_link_header', 11 );
	}
} else {
	add_filter( 'rest_url_prefix', 'wptb_custom_rest_base' );
}

/**
 * Returns REST API base prefix
 *
 * @param string $rest_base
 * @since 1.0
 *
 * @return string $rest_base
 */
function wptb_custom_rest_base( $rest_base ) {
	$custom_prefix = wptb_get_option( 'rest-api-custom-base' );

	if ( $custom_prefix ) {
		$rest_base = $custom_prefix;
	}

	return $rest_base;
}

