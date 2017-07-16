<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$status = (bool) wptb_get_option( 'hide-wp-admin-bar-logo' );
if ( true === $status ) { // hooked only when hiden
	add_action( 'admin_init', 'wptb_maybe_remove_admin_bar_logo' );

	return;
}

/**
 * Remove default admin bar logo
 */
function wptb_maybe_remove_admin_bar_logo() {
	remove_action( 'admin_bar_menu', 'wp_admin_bar_wp_menu', 10 );
}


$custom_logo = wptb_get_option( 'admin-bar-logo' );

if ( ! empty( $custom_logo['url'] ) ) {
	add_action( 'admin_bar_menu', 'wptb_custom_admin_bar_wp_menu', 15 );
	add_action( 'wp_before_admin_bar_render', 'no_wp_logo_admin_bar_remove', 0 );
}

function wptb_custom_admin_bar_wp_menu( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
	$wp_admin_bar->add_node( array(
		'id'    => 'wp-logo',
		'title' => '<span class="ab-icon"></span>',
		'href'  => ( is_multisite() ? network_home_url() : site_url() ),
	) );
}


function no_wp_logo_admin_bar_remove() {
	global $wp_admin_bar;
	$custom_logo = wptb_get_option( 'admin-bar-logo' );
	if ( ! empty( $custom_logo['url'] ) ) {
		$wp_admin_bar->remove_menu( 'about' );            // Remove the about WordPress link
		$wp_admin_bar->remove_menu( 'wporg' );            // Remove the WordPress.org link
		$wp_admin_bar->remove_menu( 'documentation' );    // Remove the WordPress documentation link
		$wp_admin_bar->remove_menu( 'support-forums' );   // Remove the support forums link
		$wp_admin_bar->remove_menu( 'feedback' );         // Remove the feedback link
	}
	?>
	<style type="text/css">
		#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
			color: transparent;
			background: url(<?php echo $custom_logo['url'];?>) no-repeat scroll 0 0 / 100% auto;
		}
	</style>
	<?php
}