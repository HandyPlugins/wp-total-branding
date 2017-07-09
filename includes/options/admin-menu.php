<?php

if ( ! class_exists( 'Redux' ) ) {
	return;
}

//global $menu;

//var_dump($GLOBALS['menu']);
//exit;
// -> START Basic Fields

$menus = get_option( 'wptb_admin_menu' );


$menu_options = array();
foreach ( $menus as $item ) {
	if ( ! empty( $item[0] ) ) {
		$menu_options[ $item[2] ] = trim( preg_replace( '#<span[^>]*>(.*)</span>(.*)</span>#isU', "", $item[0] ) );
	}
}



Redux::setSection( $opt_name, array(
	'title'            => __( 'Admin Menu', 'wp-total-branding' ),
	'id'               => 'admin-menu',
	'customizer_width' => '400px',
	'icon'             => 'el el-adjust-alt',
	'fields'           => array(
		array(
			'id'      => 'removed-admin-menu',
			'type'    => 'checkbox',
			'title'   => __( 'Choose menu items to remove', 'wp-total-branding' ),
//			'desc'    => __( 'You can literally translate the values via key.', 'wp-total-branding' ),
			//Must provide key => value pairs for multi checkbox options
			'options' => $menu_options
		),
	),
) );
