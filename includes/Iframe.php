<?php
/**
 * Iframe Class
 *
 * @package UltraEmbed
 * @since 1.0.0
 */

namespace ultraDevs\UltraEmbed;

/**
 * Iframe Class
 *
 * @package UltraEmbed
 * @since 1.0.0
 */
class Iframe {

	/**
	 * Constructor
	 */
	public function __construct() {
	}

	/**
	 * Iframe View Generator
	 *
	 * @param array $atts Shortcode Attributes.
	 */
	public function iframe_view( $atts ) {
		// Validing all attribute.
		$atts = shortcode_atts(
			array(
				'login'  => false,
				'src'    => '',
				'width'  => '',
				'height' => '',
				'class'  => '',
				'style'  => '',
			),
			$atts
		);

		$login = $atts['login'];

		// Removing login attr.
		unset( $atts['login'] );

		if ( isset( $atts['src'] ) && ! empty( $atts['src'] ) ) {
			$attr = '';
			foreach ( $atts as $name => $value ) {
				if ( isset( $value ) && ! empty( $value ) ) {
					$attr .= $name . '="' . $value . '" ';
				}
			}
			$html = "<iframe $attr></iframe>";
		}

		// Checking need log in or not.
		if ( false !== $login ) {
			if ( is_user_logged_in() ) {
				return $html;
			}
			return;
		} else {
			return $html;
		}
	}
}
