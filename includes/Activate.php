<?php
/**
 * Activate
 *
 * @package UltraEmbed
 * @since 1.0.0
 */

namespace ultraDevs\UltraEmbed;

use ultraDevs\UltraEmbed\Helper;

/**
 * Activate Class
 *
 * @package UltraEmbed
 * @since 1.0.0
 */
class Activate {
	/**
	 * The code that runs during plugin activation.
	 *
	 * @return void
	 */
	public function run() {
		$this->plugin_data();
	}

	/**
	 * Save Plugin's Data
	 */
	public function plugin_data() {
		Helper::update_option( 'ultra_embed_version', UD_ULTRA_EMBED_VERSION );

		$installed_time = Helper::get_option( 'ultra_embed_installed_time', false );
		if ( ! $installed_time ) {
			Helper::update_option( 'ultra_embed_installed_time', time() );
		}
	}
}
