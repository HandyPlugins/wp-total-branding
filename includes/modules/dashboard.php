<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


// remove hide panel
if ( wptb_get_option( 'hide-welcome-panel' ) ) {
	remove_action( 'welcome_panel', 'wp_welcome_panel' );
}

// remove dashboard widgets
if ( wptb_get_option( 'remove-dashboard-widgets' ) ) {
	add_action( 'admin_menu', 'wptb_remove_dashboard_widgets' );
}

// add custom admin-footer message
add_filter( 'admin_footer_text', 'wptb_admin_footer' );

/**
 * @param string $footer_text
 *
 * @since 1.0
 * @return mixed|void
 */
function wptb_admin_footer( $footer_text ) {
	$custom_footer = wptb_get_option( 'dashboard-footer-content' );
	if ( ! empty( $custom_footer ) ) {
		$footer_text = $custom_footer;
	}

	return $footer_text;
}


function wptb_remove_dashboard_widgets() {
	remove_meta_box( 'dashboard_activity', 'dashboard', 'core' );
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'core' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'core' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'core' );

	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'core' );
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'core' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'core' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'core' );
}
