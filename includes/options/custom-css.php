<?php
Redux::setSection( $opt_name, array(
	'title'            => __( 'Custom CSS', 'wp-total-branding' ),
	'id'               => 'custom-css',
	'desc'             => __( 'Change WordPress dashboard screen', 'wp-total-branding' ),
	'customizer_width' => '400px',
	'icon'             => 'el el-css',
) );

Redux::setSection( $opt_name, array(
	'title'            => __( 'Login CSS', 'wp-total-branding' ),
	'id'               => 'basic-login-css',
	'subsection'       => true,
	'customizer_width' => '500px',
	'fields'           => array(
		array(
			'id'      => 'custom-css-login-enable',
			'type'    => 'switch',
			'title'   => __( 'Module Status', 'wp-total-branding' ),
			'default' => 0,
		),
		array(
			'required' => array( 'custom-css-login-enable', '=', '1' ),
			'id'       => 'custom-css-login-content',
			'type'     => 'ace_editor',
			'title'    => __( 'CSS Code', 'wp-total-branding' ),
			'subtitle' => __( 'Paste your CSS code here.', 'wp-total-branding' ),
			'mode'     => 'css',
			'theme'    => 'monokai',
			'default'  => "#header{\n   margin: 0 auto;\n}",
		),
	),
) );


Redux::setSection( $opt_name, array(
	'title'            => __( 'Admin CSS', 'wp-total-branding' ),
	'id'               => 'opt-admin-css',
	'subsection'       => true,
	'customizer_width' => '400px',
	'fields'           => array(
		array(
			'id'      => 'custom-css-admin-enable',
			'type'    => 'switch',
			'title'   => __( 'Module Status', 'wp-total-branding' ),
			'default' => false,
		),
		array(
			'required' => array( 'custom-css-admin-enable', '=', '1' ),
			'id'       => 'custom-css-admin-content',
			'type'     => 'ace_editor',
			'title'    => __( 'CSS Code', 'wp-total-branding' ),
			'subtitle' => __( 'Paste your CSS code here.', 'wp-total-branding' ),
			'mode'     => 'css',
			'theme'    => 'monokai',
			'default'  => "#header{\n   margin: 0 auto;\n}",
		),
	),
) );


Redux::setSection( $opt_name, array(
	'title'            => __( 'Frontend CSS', 'wp-total-branding' ),
	'id'               => 'opt-frontend-css',
	'subsection'       => true,
	'customizer_width' => '400px',
	'fields'           => array(
		array(
			'id'      => 'custom-css-site-enable',
			'type'    => 'switch',
			'title'   => __( 'Module Status', 'wp-total-branding' ),
			'default' => false,
		),
		array(
			'required' => array( 'custom-css-site-enable', '=', '1' ),
			'id'       => 'custom-css-site-content',
			'type'     => 'ace_editor',
			'title'    => __( 'CSS Code', 'wp-total-branding' ),
			'subtitle' => __( 'Paste your CSS code here.', 'wp-total-branding' ),
			'mode'     => 'css',
			'theme'    => 'monokai',
			'default'  => "#header{\n   margin: 0 auto;\n}",
		),
	),
) );
