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
			//'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
//			'desc'     => __( 'Basic media uploader with disabled URL input field.', 'wp-total-branding' ),
			'subtitle' => __( '32px X 32px fits good', 'wp-total-branding' ),
//			'default'  => array( 'url' => ''),
			//'hint'      => array(
			//    'title'     => 'Hint Title',
			//    'content'   => 'This is a <b>hint</b> for the media field with a Title.',
			//)
		),
	),
) );
