<?php

if ( ! class_exists( 'Redux' ) ) {
	return;
}

Redux::setSection( $opt_name, array(
	'title'            => __( 'Admin Message', 'wp-total-branding' ),
	'id'               => 'opt-admin-menu-message',
	//	'desc'             => __( 'Change WordPress dashboard screen', 'wp-total-branding' ),
	'customizer_width' => '400px',
	'icon'             => 'el el-bullhorn',
	'fields'           => array(
		array(
			'id'      => 'admin-message-status',
			'type'    => 'switch',
			'title'   => __( 'Enable admin message', 'wp-total-branding' ),
			'default' => 0,
			'on'      => 'Enabled',
			'off'     => 'Disabled',
		),
		array(
			'required'   => array( 'admin-message-status', '=', '1' ),
			'id'         => 'admin-message',
			'type'       => 'editor',
			'title'      => __( 'Message', 'wp-total-branding' ),
			'full_width' => true,
			'sanitize'   => 'wp_kses_post',
			'args'       => array(
				'wpautop'       => false,
				'media_buttons' => false,
				'textarea_rows' => 5,
				'teeny'         => false,
				'quicktags'     => false,
			),
		),

	),
) );

