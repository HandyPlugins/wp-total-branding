<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class WPTB_Admin {
	function __construct() { }

	function setup() {

		if ( ! class_exists( 'ReduxFramework' ) && file_exists( WPTB_INC_DIR . 'libs/ReduxCore/framework.php' ) ) {
			require_once( WPTB_INC_DIR . 'libs/ReduxCore/framework.php' );
		}
		$redux = ReduxFrameworkInstances::get_instance( WPTB_OPTION );


		Redux::setExtensions( WPTB_OPTION, WPTB_INC_DIR . 'libs/redux-vendor-support/vendor_support/extension_vendor_support.php' );

		if ( ! isset( $redux_demo ) && file_exists( WPTB_INC_DIR . 'settings.php' ) ) {
			require_once( WPTB_INC_DIR . 'settings.php' );
		}

		add_action( 'admin_menu', array( $this, 'set_global_menu' ) );
	}

	/**
	 * Save temprorary global admin menu items
	 * @since 1.0
	 */
	public function set_global_menu() {

		global $menu;
		$cap = is_multisite() ? 'manage_network' : 'manage_options';

		if ( is_user_logged_in() && current_user_can( $cap ) ) {
			update_option( 'wptb_admin_menu', $menu );
		}

	}


	/**
	 * Return an instance of the current class
	 *
	 * @since 1.0
	 * @return WPTB_Admin
	 */
	public static function factory() {
		static $instance = false;

		if ( ! $instance ) {
			$instance = new self();
			$instance->setup();
		}

		return $instance;
	}
}