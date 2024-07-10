<?php

if ( ! class_exists( 'Redux' ) ) {
	return;
}

// -> START Basic Fields
Redux::setSection( $opt_name, array(
	'title'            => __( 'Email', 'wp-total-branding' ),
	'id'               => 'email',
	'desc'             => __( 'Change default email sender info', 'wp-total-branding' ),
	'customizer_width' => '400px',
	'icon'             => 'el el-inbox-box',
	'fields'           => array(
		array(
			'id'       => 'custom-email-status',
			'type'     => 'switch',
			'title'    => __( 'Enable email branding', 'wp-total-branding' ),
			'default'  => 0,
			'on'       => 'Enabled',
			'off'      => 'Disabled',
		),
		array(
			'id'       => 'custom-email-from-name',
			'required' => array( 'custom-email-status', '=', '1' ),
			'default'  => 'WordPress',
			'type'     => 'text',
			'title'    => 'From Name',
			'validate' => 'not_empty',
			'sanitize' => 'sanitize_text_field',
		),
		array(
			'id'       => 'customemail-from-address',
			'required' => array( 'custom-email-status', '=', '1' ),
			'default' => 'wordpress@' . parse_url( home_url(), PHP_URL_HOST ),
			'validate' => 'email',
			'type'     => 'text',
			'title'    => 'From Address',
		),
	),
) );
