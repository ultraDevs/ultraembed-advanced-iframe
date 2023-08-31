<?php
/**
 * Main Plugin File
 *
 * @package UltraEmbed
 */

/**
 * Plugin Name:       UltraEmbed (Advanced Iframe)
 * Plugin URI:        https://ultradevs.com/wp/plugins/ultraembed-advanced-iframe
 * Description:       Use Iframe with more features using shortcode [iframe src="Link"]
 * Version:           1.0.2
 * Author:            ultraDevs
 * Author URI:        https://ultradevs.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       ultraembed-advanced-iframe
 * Domain Path:       /languages
 */

// If this file is called directly, abort!
defined( 'ABSPATH' ) || exit( 'bYe bYe!' );

// Constant.
define( 'UD_ULTRA_EMBED_VERSION', '1.0.0' );
define( 'UD_ULTRA_EMBED_NAME', plugin_basename( __FILE__ ) );
define( 'UD_ULTRA_EMBED_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'UD_ULTRA_EMBED_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'UD_ULTRA_EMBED_ASSETS', UD_ULTRA_EMBED_DIR_URL . 'assets/' );
define( 'UD_ULTRA_EMBED_MENU_SLUG', 'ultraembed-advanced-iframe' );

/**
 * Require Composer Autoload
 */
require_once UD_ULTRA_EMBED_DIR_PATH . 'vendor/autoload.php';

if ( ! function_exists( 'ud_uei' ) ) {
	// Create a helper function for easy SDK access.
	function ud_uei() {
		global $ud_uei;

		if ( ! isset( $ud_uei ) ) {
			// Include Freemius SDK.
			require_once dirname(__FILE__) . '/freemius/start.php';

			$ud_uei = fs_dynamic_init( array(
				'id'                  => '12775',
				'slug'                => 'ultraembed-advanced-iframe',
				'type'                => 'plugin',
				'public_key'          => 'pk_cf1ffd01996fff55d6437bb3fa364',
				'is_premium'          => false,
				'has_addons'          => false,
				'has_paid_plans'      => false,
				'menu'                => array(
					'slug'           => 'ultraembed-advanced-iframe',
				),
			) );
		}

		return $ud_uei;
	}

	// Init Freemius.
	ud_uei();
	// Signal that SDK was initiated.
	do_action( 'ud_uei_loaded' );
}

/**
 * Ultra Embed class
 */
final class UD_Ultra_Embed {

	/**
	 * Constructor
	 */
	public function __construct() {

		$this->appsero_init_tracker_ud_ultra_embed();

		add_action( 'plugins_loaded', array( $this, 'init' ) );

		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		add_action( 'init', array( $this, 'load_text_domain' ) );

		do_action( 'ultraembed_loaded' );
	}

	/**
	 * Begin execution of the plugin
	 *
	 * @return \UD_Ultra_Embed
	 */
	public static function run() {
		/**
		 * Instance
		 *
		 * @var boolean
		 */
		static $instance = false;

		if ( ! $instance ) {
			$instance = new self();
		}

		return $instance;
	}

	/**
	 * Plugin Init
	 */
	public function init() {

		// Iframe Class.
		$iframe = new ultraDevs\UltraEmbed\Iframe();

		if ( is_admin() ) {

			$review = new \ultraDevs\UltraEmbed\Review();
			$review->register();

			// Admin Dashboard.
			$dashboard = new ultraDevs\UltraEmbed\Admin\Dashboard();
			$dashboard->register();

			// Plugin Action Links.
			add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), array( $this, 'plugin_action_links' ) );

		} else {
			// Register Shortcode.
			add_shortcode( 'iframe', array( $iframe, 'iframe_view' ) );
		}
	}

	/**
	 * The code that runs during plugin activation.
	 */
	/**
	 * Plugin Activation.
	 *
	 * @return void
	 */
	public function activate() {
		$activate = new ultraDevs\UltraEmbed\Activate();
		$activate->run();
	}

	/**
	 * Loads a plugin’s translated strings.
	 *
	 * @return void
	 */
	public function load_text_domain() {
		load_plugin_textdomain( 'ultraembed-advanced-iframe', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Plugin Action Links
	 *
	 * @param array $links Links.
	 * @return array
	 */
	public function plugin_action_links( $links ) {
		$links[] = '<a href="https://ultradevs.com/donate" target="_blank">Donate</a>';
		$links[] = '<a href="https://ultradevs.com/support" target="blank">Support</a>';
		return $links;
	}

	/**
	 * Initialize the plugin tracker
	 *
	 * @return void
	 */
	public function appsero_init_tracker_ud_ultra_embed() {

		if ( ! class_exists( 'Appsero\Client' ) ) {
			require_once __DIR__ . '/appsero/src/Client.php';
		}

		$client = new Appsero\Client( '89c0b59f-b4ad-466c-b5a7-9ac9a00b5c4f', 'UltraEmbed (Advanced Iframe For WordPress)', __FILE__ );

		// Active insights.
		$client->insights()->init();

	}
}
/**
 * Check if ud_ultra_embed doesn't exist
 */
if ( ! function_exists( 'ud_ultra_embed' ) ) {
	/**
	 * Load Ultra Embed
	 *
	 * @return UD_Ultra_Embed
	 */
	function ud_ultra_embed() {
		return UD_Ultra_Embed::run();
	}
}
ud_ultra_embed();
