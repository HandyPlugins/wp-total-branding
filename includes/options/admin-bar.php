<?php

if ( ! class_exists( 'Redux' ) ) {
	return;
}

Redux::setSection( $opt_name, array(
	'title'            => __( 'Admin Bar', 'wp-total-branding' ),
	'id'               => 'opt-admin-bar',
	'desc'             => __( 'Change WordPress dashboard screen', 'wp-total-branding' ),
	'customizer_width' => '400px',
	'icon'             => 'el el-bookmark',
	'fields'           => array(
		array(
			'id'      => 'hide-wp-admin-bar-logo',
			'type'    => 'switch',
			'title'   => __( 'Hide WordPress Logos', 'wp-total-branding' ),
			'default' => 0,
			'on'      => 'Enabled',
			'off'     => 'Disabled',
		),
		array(
			'id'       => 'admin-bar-logo',
			'required' => array( 'hide-wp-admin-bar-logo', '=', '0' ),
			'type'     => 'media',
			'url'      => true,
			'title'    => __( 'Custom Admin Bar Logo', 'wp-total-branding' ),
			'compiler' => 'true',
			'subtitle' => __( '32px X 32px fits good', 'wp-total-branding' ),
		),
	),
) );
