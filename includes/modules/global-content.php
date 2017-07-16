<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'wp_footer', 'wptb_render_global_content' );

/**
 * Injects header content after the body and puts footer content.
 * @since 1.0
 */
function wptb_render_global_content() {

	$enable_global_content = (bool) wptb_get_option( 'global-content-enable' );
	if ( true !== $enable_global_content ) {
		return;
	}

	$header_content = trim( wptb_get_option( 'global-content-header' ) );
	$footer_content = trim( wptb_get_option( 'global-content-footer' ) );

	if ( ! empty( $header_content ) ) {
		?>
		<script type="text/javascript">
			var node = document.createElement("div");
			var att = document.createAttribute("id");
			att.value = "wptb_global_header";
			node.setAttributeNode(att);
			node.innerHTML = <?php echo json_encode( stripslashes( $header_content ) ); ?>;
			document.getElementsByTagName("body")[0].insertBefore(node, document.getElementsByTagName("body")[0].firstChild);
		</script>
		<?php
	}

	if ( ! empty( $footer_content ) ) {
		echo '<div id="wptb_global_footer">' . stripslashes( $footer_content ) . '</div>';
	}

}

