<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


$status = (bool) wptb_get_option( 'custom-email-status' );

if ( true === $status ) {
	add_filter( 'wp_mail_from', 'wptb_mail_from' );
	add_filter( 'wp_mail_from_name', 'wptb_mail_from_name' );
}


function wptb_mail_from( $mail_from ) {
	$email = wptb_get_option( 'custom-email-from' );
	if ( filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
		$mail_from = $email;
	}

	return $mail_from;
}

function wptb_mail_from_name( $mail_from_name ) {
	$from_name = wptb_get_option( 'custom-email-from-name' );

	if ( ! empty( $from_name ) ) {
		$mail_from_name = $from_name;
	}

	return $mail_from_name;
}