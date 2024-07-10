<?php

if ( ! class_exists( 'Redux' ) ) {
	return;
}

Redux::setSection( $opt_name, array(
	'title'            => __( 'Dashboard', 'wp-total-branding' ),
	'id'               => 'dashboard',
	'desc'             => __( 'Change WordPress dashboard screen', 'wp-total-branding' ),
	'customizer_width' => '400px',
	'icon'             => 'el el-dashboard',
	'fields'           => array(
		array(
			'id'      => 'hide-welcome-panel',
			'type'    => 'switch',
			'title'   => __( 'Hide dashboard welcome screen', 'wp-total-branding' ),
			'default' => true,
		),
		array(
			'id'      => 'remove-dashboard-widgets',
			'type'    => 'switch',
			'title'   => __( 'Remove dashboard widgets', 'wp-total-branding' ),
			'default' => true,
		),
		array(
			'id'       => 'dashboard-footer-content',
			'type'     => 'editor',
			'title'    => __( 'Dashboard Footer Content', 'wp-total-branding' ),
			'default'  => '',
			'sanitize' => 'wp_kses_post',
			'args'     => array(
				'wpautop'       => false,
				'media_buttons' => false,
				'textarea_rows' => 5,
				'teeny'         => false,
				'quicktags'     => false,
			),
		),
	)
) );
