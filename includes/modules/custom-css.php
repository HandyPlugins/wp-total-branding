<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
add_action( 'login_enqueue_scripts', 'wptb_login_css' );
add_action( 'admin_enqueue_scripts', 'wptb_admin_css' );
add_action( 'wp_enqueue_scripts', 'wptb_site_css' );

function wptb_login_css() {
	$enable_login_css = (bool) wptb_get_option( 'custom-css-login-enable' );
	if ( true !== $enable_login_css ) {
		return;
	}

	$css = wptb_get_option( 'custom-css-login-content' );
	?>
	<style type="text/css">
		<?php echo $css;?>
	</style>
	<?php
}


function wptb_admin_css() {
	$enable_admin_css = (bool) wptb_get_option( 'custom-css-admin-enable' );
	if ( true !== $enable_admin_css ) {
		return;
	}

	$css = wptb_get_option( 'custom-css-admin-content' );
	?>
	<style type="text/css">
		<?php echo $css;?>
	</style>
	<?php
}

function wptb_site_css() {
	$enable_site_css = (bool) wptb_get_option( 'custom-css-site-enable' );
	if ( true !== $enable_site_css ) {
		return;
	}


	$css = wptb_get_option( 'custom-css-site-content' );
	?>
	<style type="text/css">
		<?php echo $css;?>
	</style>
	<?php
}
