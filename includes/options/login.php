<?php

if ( ! class_exists( 'Redux' ) ) {
	return;
}

Redux::setSection( $opt_name, array(
	'title'            => __( 'Login logo', 'wp-total-branding' ),
	'id'               => 'login-logo',
	'subsection'       => false,
	'icon'             => 'el el-screen',
	'customizer_width' => '450px',
	'desc'             => __( 'Change default WordPress login logo by uploading new one.', 'wp-total-branding' ),
	'fields'           => array(
		array(
			'id'      => 'login-logo-enable',
			'type'    => 'switch',
			'title'   => __( 'Enable custom logo', 'wp-total-branding' ),
			'default' => 0,
		),
		array(
			'required' => array( 'login-logo-enable', '=', '1' ),
			'id'       => 'login-logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => __( 'Login Logo', 'wp-total-branding' ),
			'compiler' => 'true',
			'subtitle' => __( 'Upload a logo ', 'wp-total-branding' ),
			'default'  => array( 'url' => wptb_default_login_logo() ),
			'preview' => false,
			'hint' => array(
				'title'   => __( 'Logo size', 'wp-total-branding' ),
				'content' => __( 'Please use max 320px for best result.', 'wp-total-branding' ),
			),
		),
		array(
			'id'       => 'login-header-title',
			'type'     => 'text',
			'title'    => __( 'Header Title', 'wp-total-branding' ),
			'sanitize' => 'sanitize_text_field',
		),
		array(
			'id'       => 'login-header-url',
			'type'     => 'text',
			'url'      => true,
			'title'    => __( 'Header URL', 'wp-total-branding' ),
			'subtitle' => __( 'Target URL when clicking login logo', 'wp-total-branding' ),
		),
	),
) );

