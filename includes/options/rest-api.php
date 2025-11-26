<?php

if ( ! class_exists( 'Redux' ) ) {
	return;
}


Redux::setSection( $opt_name, array(
	'title'            => __( 'REST API', 'wp-total-branding' ),
	'id'               => 'rest-api',
	'customizer_width' => '400px',
	'icon'             => 'el el-network',
	'fields'           => array(
		array(
			'id'       => 'rest-api-status',
			'type'     => 'switch',
			'title'    => __( 'REST-API status', 'wp-total-branding' ),
			'subtitle' => __( 'You can control REST-API. Block Editor uses rest endpoints, so do not disable it if you are using block editor.', 'wp-total-branding' ),
			'default'  => 1,
			'off'      => 'Disable',
			'on'       => 'Enable',
		),
		array(
			'id'          => 'rest-api-custom-base',
			'required'    => array( 'rest-api-status', '=', '1' ),
			'desc'        => __( 'Modify url base from wp-json to custom', 'wp-total-branding' ),
			'placeholder' => 'wp-json',
			'type'        => 'text',
			'title'       => 'REST API Base Prefix',
			'hint'        => array(
				'title'   => __( 'Do not forget to update rewrite', 'wp-total-branding' ),
				'content' => __( 'Flush rewrite rules by visiting permalinks after the change', 'wp-total-branding' ),
			),
		),
	),
) );
