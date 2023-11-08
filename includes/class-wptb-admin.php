<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class WPTB_Admin {
	function __construct() { }

	function setup() {
		if ( ! class_exists( 'ReduxFramework' ) && file_exists( WPTB_INC_DIR . 'libs/redux-core/framework.php' ) ) {
			require_once( WPTB_INC_DIR . 'libs/redux-core/framework.php' );
		}
		$redux = ReduxFrameworkInstances::get_instance( WPTB_OPTION );


		Redux::set_extensions( WPTB_OPTION, WPTB_INC_DIR . 'libs/redux-vendor-support/vendor_support/extension_vendor_support.php' );

		if ( ! isset( $redux_demo ) && file_exists( WPTB_INC_DIR . 'settings.php' ) ) {
			require_once( WPTB_INC_DIR . 'settings.php' );
		}
		Redux::disable_demo();

		add_action( 'admin_menu', array( $this, 'set_global_menu' ), 999 );

		add_action( 'redux/loaded', array( $this, 'maybe_remove_admin_menu' ) );
	}

	/**
	 * Save temprorary global admin menu items
	 * @since 1.0
	 */
	public function set_global_menu() {

		global $menu;
		$cap = is_multisite() ? 'manage_network' : 'manage_options';

		if ( is_user_logged_in() && current_user_can( $cap ) ) {
			update_site_option( 'wptb_admin_menu', $menu );
		}

		remove_submenu_page('options-general.php', 'redux-framework');
	}

	/**
	 * Remove admin settings on multisite setups
	 *
	 * @since 1.0
	 *
	 * @param $redux
	 */
	public function maybe_remove_admin_menu( $redux ) {
		if ( is_multisite() ) {
			remove_action( 'admin_menu', array( $redux, '_options_page' ) );
		}

		return;
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
