<?php
/**
 * Assets
 *
 * @package UltraEmbed
 * @since 1.0.0
 */

namespace ultraDevs\UltraEmbed;

/**
 * Asstes Class
 *
 * @package UltraEmbed
 * @since 1.0.0
 */
class Assets {

	/**
	* Register
	*
	* @return void
	*/
	public function register() {
		add_action( 'wp_enqueue_scripts', array( $this, 'public_scripts' ) );

		// Admin Assets.
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_assets' ) );

		// Block Editor Assets.
		add_action( 'enqueue_block_editor_assets', array( $this, 'public_scripts' ) );
	}

	public function admin_assets() {

		$css_file = UD_ULTRA_EMBED_DIR_PATH . 'assets/css/admin.css';

		wp_enqueue_style(
			'ultra-embed-admin',
			UD_ULTRA_EMBED_DIR_URL . 'assets/css/admin.css',
			array(),
			filemtime( $css_file )
		);
	}

	public function public_scripts() {
		$js_file = UD_ULTRA_EMBED_DIR_PATH . 'assets/js/public.js';

		// iframeResizer.min.js
		// wp_enqueue_script(
		// 	'iframe-resizer',
		// 	UD_ULTRA_EMBED_DIR_URL . 'assets/js/iframeResizer.min.js',
		// 	array( 'jquery' ),
		// 	'4.3.5',
		// 	true
		// );

		wp_enqueue_script(
			'ultra-embed-public',
			UD_ULTRA_EMBED_DIR_URL . 'assets/js/public.js',
			array( 'jquery' ),
			filemtime( $js_file ),
			true
		);
		$licensing = array(
			'current_plan'         => ud_uei()->get_plan_name(),
			'can_use_premium_code' => ud_uei()->can_use_premium_code(),
			'is_plan_pro'          => ud_uei()->is_plan( 'pro' ),
		);
		wp_localize_script(
			'ultra-embed-public',
			'ultraEmbed',
			$licensing
		);
	}
	
}
