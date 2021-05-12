<?php
/**
 * Helper Class
 *
 * @package UltraEmbed
 * @since 1.0.0
 */

namespace ultraDevs\UltraEmbed;

/**
 * Helper Class
 *
 * @package UltraEmbed
 * @since 1.0.0
 */
class Helper {

	/**
	 * Constructor
	 */
	public function __construct() {
	}

	/**
	 * Add Option
	 *
	 * @param string $key Option Key.
	 * @param mixed  $value Option Value.
	 */
	public static function add_option( $key, $value ) {
		// Add Option.
		add_option( $key, $value );
	}

	/**
	 * Get Option
	 *
	 * @param string $key Option Key.
	 * @param mixed  $default Option Default.
	 */
	public static function get_option( $key, $default ) {
		// Get Option.
		$value = get_option( $key, $default );
		return $value;
	}

	/**
	 * Update Option
	 *
	 * @param string $key Option Key.
	 * @param mixed  $value Option Value.
	 */
	public static function update_option( $key, $value ) {
		// Update Option.
		update_option( $key, $value );
	}

	/**
	 * Delete Option
	 *
	 * @param string $key Option Key.
	 */
	public static function delete_option( $key ) {
		// Delete Option.
		delete_option( $key );
	}

	/**
	 * Multiple in_array
	 *
	 * @param array $needles needles.
	 * @param array $haystack haystack.
	 * @return boolean
	 */
	public function multiple_in_array( $needles, $haystack ) {
		return (bool) array_intersect( $needles, $haystack );
	}

	/**
	 * Recursive sanitation for text or array
	 *
	 * @param (array|string) $array_or_string Array OR String.
	 * @since  0.1
	 * @return mixed
	 */
	public static function sanitize_text_or_array_field( $array_or_string ) {
		if ( is_string( $array_or_string ) ) {
			$array_or_string = sanitize_text_field( $array_or_string );
		} elseif ( is_array( $array_or_string ) ) {
			foreach ( $array_or_string as $key => &$value ) {
				if ( is_array( $value ) ) {
					$value = sanitize_text_or_array_field( $value );
				} else {
					$value = sanitize_text_field( $value );
				}
			}
		}

		return $array_or_string;
	}
}
