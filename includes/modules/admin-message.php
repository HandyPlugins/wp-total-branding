<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


add_action( 'admin_notices', 'wptb_admin_message' );
add_action( 'network_admin_notices', 'wptb_admin_message' );


function wptb_admin_message() {

	$status = wptb_get_option( 'admin-message-status' );
	if ( true === (bool) $status ) {
		$content = trim( wptb_get_option( 'admin-message' ) );

		if ( ! empty( $content ) ) {
			echo '<div class="updated" style="border-left-color:#FFC107;">' . stripslashes( $content ) . '</div>';
		}
	}

}
