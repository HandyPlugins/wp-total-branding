<?php
// global header + footer contents

if ( ! class_exists( 'Redux' ) ) {
	return;
}

Redux::setSection( $opt_name, array(
	'title'            => __( 'Global Content', 'wp-total-branding' ),
	'id'               => 'global-content',
	'customizer_width' => '400px',
	'icon'             => 'el el-globe-alt',
	'fields'           => array(
		array(
			'id'      => 'global-content-enable',
			'type'    => 'switch',
			'title'   => __( 'Enable global contents', 'wp-total-branding' ),
			'default' => 0,
			'on'      => 'Enabled',
			'off'     => 'Disabled',
		),
		array(
			'required' => array( 'global-content-enable', '=', '1' ),
			'id'       => 'global-content-header',
			'type'     => 'editor',
			'title'    => __( 'Header', 'wp-total-branding' ),
			'subtitle' => __( 'will be display on every page of your network. You can add tracking code, embeds, etc.', 'wp-total-branding' ),
			'default'  => '',
			'sanitize' => 'wp_kses_post',
			'args'     => array(
				'wpautop'       => false,
				'media_buttons' => false,
				'textarea_rows' => 5,
				'teeny'         => false,
				'quicktags'     => true,
			),
		),
		array(
			'required' => array( 'global-content-enable', '=', '1' ),
			'id'       => 'global-content-footer',
			'type'     => 'editor',
			'title'    => __( 'Footer', 'wp-total-branding' ),
			'default'  => '',
			'sanitize' => 'wp_kses_post',
			'args'     => array(
				'wpautop'       => false,
				'media_buttons' => false,
				'textarea_rows' => 5,
				'teeny'         => false,
				'quicktags'     => true,
			),
		),
	),
) );
