<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( wptb_get_option( 'remove-site-generator' ) ) {
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );

	// remove feed Generator Tags
	foreach ( array( 'rss2_head', 'commentsrss2_head', 'rss_head', 'rdf_header', 'atom_head', 'comments_atom_head', 'opml_head', 'app_head' ) as $action ) {
		remove_action( $action, 'the_generator' );
	}

	return;
}

add_filter( 'get_the_generator_html', 'wptb_get_the_generator', PHP_INT_MAX, 2 );
add_filter( 'get_the_generator_xhtml', 'wptb_get_the_generator', PHP_INT_MAX, 2 );
add_filter( 'get_the_generator_atom', 'wptb_get_the_generator', PHP_INT_MAX, 2 );
add_filter( 'get_the_generator_rss2', 'wptb_get_the_generator', PHP_INT_MAX, 2 );
add_filter( 'get_the_generator_rdf', 'wptb_get_the_generator', PHP_INT_MAX, 2 );
add_filter( 'get_the_generator_comment', 'wptb_get_the_generator', PHP_INT_MAX, 2 );
add_filter( 'get_the_generator_export', 'wptb_get_the_generator', PHP_INT_MAX, 2 );

/**
 * Prepares generator output
 *
 * @param string $gen
 * @param string $type
 *
 * @since 1.0
 * @return string
 */
function wptb_get_the_generator( $gen, $type ) {
	$generator_name = wptb_get_option( 'generator-text' );
	$generator_link = esc_url( wptb_get_option( 'generator-link' ) );

	switch ( $type ) {
		case 'html':
			$gen = '<meta name="generator" content="' . $generator_name . '">';
			break;
		case 'xhtml':
			$gen = '<meta name="generator" content="' . $generator_name . '" />';
			break;
		case 'atom':
			$gen = '<generator uri="' . $generator_link . '" version="' . get_bloginfo_rss( 'version' ) . '">' . $generator_name . '</generator>';
			break;
		case 'rss2':
			$gen = '<generator>' . $generator_link . '</generator>';
			break;
		case 'rdf':
			$gen = '<admin:generatorAgent rdf:resource="' . $generator_link . '" />';
			break;
		case 'comment':
			$gen = '<!-- generator="' . $generator_name . '" -->';
			break;
		case 'export':
			$gen = '<!-- generator="' . $generator_name . '" created="' . date( 'Y-m-d H:i' ) . '" -->';
			break;
	}

	return $gen;
}