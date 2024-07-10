<?php
/**
 * Plugin Name:       WP Total Branding
 * Plugin URI:        https://handyplugins.co/wp-total-branding/
 * Description:       Simple and powerful branding solution for WordPress.
 * Version:           1.3
 * Requires at least: 5.2
 * Requires PHP:      7.1
 * Author:            HandyPlugins
 * Author URI:        https://handyplugins.co
 * Text Domain:       wp-total-branding
 * Domain Path:       /languages
 *
 * @package WP_Total_Branding
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'WPTB_REQUIRED_WP_VERSION', '5.2' );


if ( ! class_exists( 'WP_Total_Branding' ) ) :

	 class WP_Total_Branding {

		/**
		 * Stores the single instance of this plugin.
		 * @since 1.0
		 */
		private static $instance;


		/**
		 *  A dummy constructor
		 *
		 *  @since 1.0
		 */
		protected function __construct() { }


		/**
		 * Singleton instance of the current class
		 *
		 * @since 1.0
		 * @return WP_Total_Branding
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new WP_Total_Branding();
				self::$instance->setup_constants();
				self::$instance->includes();
				self::$instance->setup();
			}

			return self::$instance;
		}


		/**
		 * Setup plugin constants.
		 *
		 * @since 1.0
		 * @return void
		 */
		private function setup_constants() {

			if ( ! defined( 'WPTB_PLUGIN_FILE' ) ) {
				define( 'WPTB_PLUGIN_FILE', __FILE__ );
			}

			if ( ! defined( 'WPTB_OPTION' ) ) {
				define( 'WPTB_OPTION', 'wptb_options' );
			}

			if ( ! defined( 'WPTB_PLUGIN_VERSION' ) ) {
				define( 'WPTB_PLUGIN_VERSION', '1.3' );
			}

			if ( ! defined( 'WPTB_PLUGIN_DIR' ) ) {
				define( 'WPTB_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
			}

			if ( ! defined( 'WPTB_INC_DIR' ) ) {
				define( 'WPTB_INC_DIR', WPTB_PLUGIN_DIR . 'includes/' );
			}

			if ( ! defined( 'WPTB_PLUGIN_URL' ) ) {
				define( 'WPTB_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
			}
		}


		/**
		 * Include required files
		 *
		 * @since 1.0
		 */
		 private function includes() {
			 require_once WPTB_INC_DIR . 'functions.php';
			 require_once WPTB_INC_DIR . 'module-loader.php';
			 require_once WPTB_INC_DIR . 'class-wptb-admin.php';
		 }


		/**
		 * Setup plugin functionality
		 * @since 1.0
		 */
		private function setup() {
			add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );

			if ( is_admin() || is_network_admin() ) {
				WPTB_Admin::factory();
			}

		}


		 /**
		  * Loads the language packs
		  *
		  * @access public
		  * @since  1.0
		  * @return bool
		  */
		 public function load_textdomain() {
			 return load_plugin_textdomain( 'wp-total-branding', false, basename( WPTB_PLUGIN_DIR ) . '/languages/' );
		 }


	}


endif;



/**
 * The main function for that returns WP_Total_Branding
 *
 * @since 1.0
 * @return WP_Total_Branding
 */
function wp_total_branding() {
	return WP_Total_Branding::instance();
}


/**
 * Check requirement
 */
function wptb_requirements_notice() {
	if ( ! current_user_can( 'update_core' ) ) {
		return;
	}
	?>

	<div id="message" class="error notice">
		<p><strong><?php esc_html_e( 'Your site does not support WP Total Branding.', 'wp-total-branding' ); ?></strong></p>

		<p><?php printf( esc_html__( 'Your site is currently running WordPress version %1$s, while WP Total Branding requires version %2$s or greater.', 'wp-total-branding' ), esc_html( get_bloginfo( 'version' ) ), WPTB_REQUIRED_WP_VERSION ); ?></p>

		<p><?php esc_html_e( 'Please update your WordPress or deactivate WP Total Branding.', 'wp-total-branding' ); ?></p>
	</div>

	<?php
}

if ( version_compare( get_bloginfo( 'version' ), WPTB_REQUIRED_WP_VERSION, '<' ) ) {
	add_action( 'admin_notices', 'wptb_requirements_notice' );
	add_action( 'network_admin_notices', 'wptb_requirements_notice' );

	return;
}

// run
wp_total_branding();
