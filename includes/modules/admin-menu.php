<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'admin_menu', 'wptb_remove_admin_menu', PHP_INT_MAX );

function wptb_remove_admin_menu() {
	global $menu;
	$admin_menus   = wptb_get_option( 'removed-admin-menu' );
	$original_menu = $menu;

	foreach ( (array) $admin_menus as $page => $status ) {
		if ( 1 === (int) $status ) {
			remove_menu_page( $page );
		}
	}

	$cap = is_multisite() ? 'manage_network' : 'manage_options';

	// put back original list
	if ( current_user_can( $cap ) ) {
		update_site_option( 'wptb_admin_menu', $original_menu );
	}

}
