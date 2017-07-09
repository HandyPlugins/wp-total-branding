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
//			'subtitle' => __( 'Look, it\'s on! Also hidden child elements!', 'wp-total-branding' ),
			'default'  => 0,
			'on'       => 'Enabled',
			'off'      => 'Disabled',
		),
		array(
			'id'       => 'custom-email-from-name',
			'required' => array( 'custom-email-status', '=', '1' ),
//			'desc'     => __( 'Items set with a fold to this ID will hide unless this is set to the appropriate value.', 'wp-total-branding' ),
			'default'  => 'WordPress',
			'type'     => 'text',
			'title'    => 'From Name',
//			'subtitle' => '',
			'validate' => 'not_empty',
		),
		array(
			'id'       => 'customemail-from-address',
			'required' => array( 'custom-email-status', '=', '1' ),
//			'subtitle' => __( 'Also called a "fold" parent.', 'wp-total-branding' ),
//			'desc'     => __( 'Items set with a fold to this ID will hide unless this is set to the appropriate value.', 'wp-total-branding' ),
			'default' => 'wordpress@' . parse_url( home_url(), PHP_URL_HOST ),
			'validate' => 'email',
			'type'     => 'text',
			'title'    => 'From Address',
		),
	),
) );
