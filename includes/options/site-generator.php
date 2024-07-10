<?php

if ( ! class_exists( 'Redux' ) ) {
	return;
}

Redux::setSection( $opt_name, array(
	'title'            => __( 'Site Generator', 'wp-total-branding' ),
	'id'               => 'generator',
	'customizer_width' => '400px',
	'icon'             => 'el el-wordpress',
	'fields'           => array(
		array(
			'id'      => 'remove-site-generator',
			'type'    => 'switch',
			'title'   => __( 'Remove site generator info', 'wp-total-branding' ),
			'default' => 0,
			'hint'    => array(
				'title'   => __( 'Generator', 'wp-total-branding' ),
				'content' => __( 'Remove generator meta tags from pages', 'wp-total-branding' ),
			),
		),
		array(
			'required' => array( 'remove-site-generator', '=', '0' ),
			'id'       => 'generator-text',
			'type'     => 'text',
			'title'    => 'Site Generator Name',
			'subtitle' => 'Enter custom generator name',
			'default' => 'WordPress ' . get_bloginfo( 'version' ),
			'sanitize' => 'sanitize_text_field',
		),
		array(
			'required' => array( 'remove-site-generator', '=', '0' ),
			'id'       => 'generator-link',
			'type'     => 'text',
			'url'      => true,
			'title'    => 'Site Generator Link',
			'subtitle' => 'Enter custom generator link',
			'default'  => 'https://wordpress.org',
			'sanitize' => 'esc_url_raw',
		),
	),
) );
