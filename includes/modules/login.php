<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class WPTB_Login {
	private $login_logo;
	const MAX_WIDTH = 320;

	function __construct() {
		add_action( 'login_head', array( $this, 'login_head' ) );
		add_filter( 'login_headerurl', array( $this, 'header_url' ) );
		add_filter( 'login_headertext', array( $this, 'header_title' ) );
	}


	public function login_head() {
		if ( ! wptb_get_option( 'login-logo-enable' ) ) {
			return;
		}

		$this->login_logo = wptb_get_option( 'login-logo' );
		if ( empty( $this->login_logo['url'] ) || wptb_default_login_logo() == $this->login_logo['url'] ) {
			return;
		}


		$width  = $this->login_logo['width'];
		$height = $this->login_logo['height'];

		if ( $width > self::MAX_WIDTH ) {
			$ratio  = $height / $width;
			$height = ceil( $ratio * self::MAX_WIDTH );
			$width  = self::MAX_WIDTH;
		}

		$width .= 'px';
		$height .= 'px';

		?>
		<style type="text/css">
			.login h1 a {
				background-image: url("<?php echo  esc_url_raw($this->login_logo['url']); ?>");
				background-size: <?php echo $width; ?> <?php echo $height; ?>;
				background-position: top center;
				background-repeat: no-repeat;
				height: <?php echo $height; ?>;
				text-decoration: none;
				width: <?php echo $width; ?>;
				overflow: hidden;
				display: block;
			}
		</style>
		<?php

	}


	/**
	 * Target url for the login logo
	 *
	 * @param string $url
	 *
	 * @since 1.0
	 * @return string $url
	 */
	public function header_url( $url ) {
		$custom_url = trim( wptb_get_option( 'login-header-url' ) );

		if ( ! empty( $custom_url ) ) {
			$url = esc_url( $custom_url );
		}

		return $url;
	}

	/**
	 * Modify login header
	 *
	 * @param string $title
	 *
	 * @return string $title
	 * @since 1.0
	 */
	public function header_title( $title ) {
		$custom_title = trim( wptb_get_option( 'login-header-title' ) );

		if ( ! empty( $custom_title ) ) {
			$title = $custom_title;
		}

		return esc_html( $title );
	}

}


new WPTB_Login;
