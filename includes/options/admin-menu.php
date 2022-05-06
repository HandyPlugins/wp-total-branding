<?php

if ( ! class_exists( 'Redux' ) ) {
	return;
}

$menus = get_site_option( 'wptb_admin_menu' );


$menu_options = array();
foreach ( (array) $menus as $item ) {

	// Link Manager removed in WordPress 3.5
	if ( isset( $item[5] ) && 'menu-links' === $item[5] ) {
		continue;
	}

	if ( ! empty( $item[0] ) ) {
		$menu_options[ $item[2] ] = trim( preg_replace( '#<span[^>]*>(.*)</span>(.*)</span>#isU', "", $item[0] ) );
		$menu_options[ $item[2] ] = str_replace( '</span>', '', $menu_options[ $item[2] ] );
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
			'options' => $menu_options
		),
	),
) );
