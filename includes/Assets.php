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

		// Block Editor Assets.
		add_action( 'enqueue_block_editor_assets', array( $this, 'public_scripts' ) );
	}

	public function public_scripts() {
		$js_file = UD_ULTRA_EMBED_DIR_PATH . 'assets/js/public.js';

		// iframeResizer.min.js
		wp_enqueue_script(
			'iframe-resizer',
			UD_ULTRA_EMBED_URL . 'assets/js/iframeResizer.min.js',
			array( 'jquery' ),
			'4.3.5',
			true
		);

		wp_enqueue_script(
			'ultra-embed-public',
			UD_ULTRA_EMBED_URL . 'assets/js/public.js',
			array( 'jquery', 'iframe-resizer' ),
			filemtime( $js_file ),
			true
		);
	}
	
}
