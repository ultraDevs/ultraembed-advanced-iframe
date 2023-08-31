<?php
/**
 * Dashboard
 *
 * @package UltraEmbed
 * @since 1.0.0
 */

namespace ultraDevs\UltraEmbed\Admin;

use ultraDevs\UltraEmbed\Helper;

/**
 * Dashboard Class
 *
 * @package UltraEmbed
 * @since 1.0.0
 */
class Dashboard {
	/**
	 * Menu
	 *
	 * @var string
	 */
	public static $menu = '';

	/**
	 * Register
	 */
	public function register() {
		add_action( 'admin_menu', array( __CLASS__, 'register_menu' ) );

		if ( is_admin() && isset( $_GET[ 'page' ] ) && UD_ULTRA_EMBED_MENU_SLUG === wp_unslash( $_GET['page'] ) ) { // phpcs:ignore
			add_action( 'in_admin_header', array( $this, 'remove_notices' ) );
		}
	}


	/**
	 * Register Admin Menu
	 */
	public static function register_menu() {
		self::$menu = add_menu_page( __( ' UltraEmbed (Advanced Iframe)', 'ultraembed-advanced-iframe' ), __( 'UltraEmbed', 'ultraembed-advanced-iframe' ), 'manage_options', UD_ULTRA_EMBED_MENU_SLUG, array( __CLASS__, 'view_main' ), 'dashicons-editor-code', 56 );
	}

	/**
	 * Main View
	 */
	public static function view_main() {
		echo '<div id="ud-id-app">Hola</div>';
	}

	/**
	 * Remove All Notices.
	 *
	 * @return void
	 */
	public function remove_notices() {
		remove_all_actions( 'admin_notices' );
		remove_all_actions( 'all_admin_notices' );
	}
}
