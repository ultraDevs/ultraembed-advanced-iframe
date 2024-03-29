<?php
/**
 * Dashboard
 *
 * @package UltraEmbed
 * @since 1.0.0
 */

namespace ultraDevs\UltraEmbed\Admin;

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
		?>
		<div class="ud-ultraembed">
			<div class="ud-ultraembed__box">
				<p>Simply use [iframe] shortcode with the src attribute. Example [iframe src=”https://ultradevs.com”]
				you can also use other parameters ( width, height, style, class ).</p>
				<p>Other attributes</p>
				<ul>
					<li>
						<strong>width</strong> - To set width (e.g., width="100%")
					</li>
					<li>
						<strong>height</strong> - To set height (e.g., height="100%")
					</li>
					<li>
						<strong>style</strong> - To add CSS style (e.g., style="overflow: hidden; height: 220px;")
					</li>
					<li>
						<strong>class</strong> - To add CSS class (e.g., class="ultraframe")
					</li>
					<li>
						<strong>login</strong> - It will show iframe data for logged-in users. Default is false (e.g., login="true")
					</li>
				</ul>
			</div>
			<div class="ud-ultraembed__box">
				<p>Also you can use our <strong>Gutenberg Block</strong>. Just select or write /iframe</p>

				<img src="<?php echo UD_ULTRA_EMBED_ASSETS . 'images/block.png'; ?>" alt="Gutenberg Block">
			</div>
		</div>
		<div class="ud-info">
			<div class="ud-row">
				<div class="ud-col">
					<div class="ud-box">
						<div class="ud-box-header">
							<h2>Technical Support</h2>
						</div>
						<div class="ud-box-content">
							<p>Tried but didn't find any solution? We are is there to help you.</p>
							<div class="ud-btns">
								<a class="ud-btn-lm" href="https://wordpress.org/support/plugin/powerful-blocks" target="_blank">Free Support</a>
								<a class="ud-btn-lm" href="https://web.facebook.com/hello.ultradevs" target="_blank">Live Chat</a>
							</div>
						</div>
					</div>
				</div>
				<div class="ud-col">
					<div class="ud-box">
						<div class="ud-box-header">
							<h2>Rate US</h2>
						</div>
						<div class="ud-box-content">
							<p>Your rating motivates us to do better and more. Your rating means a lot to us!</p>
							<strong>Rate US On</strong>
							<div class="ud-btns">
								<a class="ud-btn-lm" href="https://wordpress.org/support/plugin/powerful-blocks/reviews/#new-post" target="_blank">WordPress</a>
								<a class="ud-btn-lm" href="https://web.facebook.com/hello.ultradevs/reviews" target="_blank">Facebook</a>
							</div>
						</div>
					</div>
				</div>
				<div class="ud-col">
					<div class="ud-box">
						<div class="ud-box-header">
							<h2>Connect With US</h2>
						</div>
						<div class="ud-box-content">
							<p>Connect with us to know about our plugin updates, cool tips & tricks, offers & many more things!</p>
							<div class="ud-socials">
								<ul>
									<li>
										<a href="https://web.facebook.com/groups/powerfulblocks/" target="_blank">
											<svg style="fill:#5820e5" viewBox="0 0 512 512"><path d="M211.9 197.4h-36.7v59.9h36.7V433.1h70.5V256.5h49.2l5.2-59.1h-54.4c0 0 0-22.1 0-33.7 0-13.9 2.8-19.5 16.3-19.5 10.9 0 38.2 0 38.2 0V82.9c0 0-40.2 0-48.8 0 -52.5 0-76.1 23.1-76.1 67.3C211.9 188.8 211.9 197.4 211.9 197.4z"/></svg>
										</a>
									</li>
									<li>
										<a href="https://web.facebook.com/hello.ultradevs" target="_blank">
											<svg viewBox="0 0 512 512"><path d="M211.9 197.4h-36.7v59.9h36.7V433.1h70.5V256.5h49.2l5.2-59.1h-54.4c0 0 0-22.1 0-33.7 0-13.9 2.8-19.5 16.3-19.5 10.9 0 38.2 0 38.2 0V82.9c0 0-40.2 0-48.8 0 -52.5 0-76.1 23.1-76.1 67.3C211.9 188.8 211.9 197.4 211.9 197.4z"/></svg>
										</a>
									</li>
									<li>
										<a href="https://twitter.com/ultraDevsBD" target="_blank">
											<svg viewBox="0 0 512 512"><path d="M419.6 168.6c-11.7 5.2-24.2 8.7-37.4 10.2 13.4-8.1 23.8-20.8 28.6-36 -12.6 7.5-26.5 12.9-41.3 15.8 -11.9-12.6-28.8-20.6-47.5-20.6 -42 0-72.9 39.2-63.4 79.9 -54.1-2.7-102.1-28.6-134.2-68 -17 29.2-8.8 67.5 20.1 86.9 -10.7-0.3-20.7-3.3-29.5-8.1 -0.7 30.2 20.9 58.4 52.2 64.6 -9.2 2.5-19.2 3.1-29.4 1.1 8.3 25.9 32.3 44.7 60.8 45.2 -27.4 21.4-61.8 31-96.4 27 28.8 18.5 63 29.2 99.8 29.2 120.8 0 189.1-102.1 185-193.6C399.9 193.1 410.9 181.7 419.6 168.6z"/></svg>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/ultradevs/" target="_blank">
											<svg viewBox="0 0 512 512"><g><path d="M256 109.3c47.8 0 53.4 0.2 72.3 1 17.4 0.8 26.9 3.7 33.2 6.2 8.4 3.2 14.3 7.1 20.6 13.4 6.3 6.3 10.1 12.2 13.4 20.6 2.5 6.3 5.4 15.8 6.2 33.2 0.9 18.9 1 24.5 1 72.3s-0.2 53.4-1 72.3c-0.8 17.4-3.7 26.9-6.2 33.2 -3.2 8.4-7.1 14.3-13.4 20.6 -6.3 6.3-12.2 10.1-20.6 13.4 -6.3 2.5-15.8 5.4-33.2 6.2 -18.9 0.9-24.5 1-72.3 1s-53.4-0.2-72.3-1c-17.4-0.8-26.9-3.7-33.2-6.2 -8.4-3.2-14.3-7.1-20.6-13.4 -6.3-6.3-10.1-12.2-13.4-20.6 -2.5-6.3-5.4-15.8-6.2-33.2 -0.9-18.9-1-24.5-1-72.3s0.2-53.4 1-72.3c0.8-17.4 3.7-26.9 6.2-33.2 3.2-8.4 7.1-14.3 13.4-20.6 6.3-6.3 12.2-10.1 20.6-13.4 6.3-2.5 15.8-5.4 33.2-6.2C202.6 109.5 208.2 109.3 256 109.3M256 77.1c-48.6 0-54.7 0.2-73.8 1.1 -19 0.9-32.1 3.9-43.4 8.3 -11.8 4.6-21.7 10.7-31.7 20.6 -9.9 9.9-16.1 19.9-20.6 31.7 -4.4 11.4-7.4 24.4-8.3 43.4 -0.9 19.1-1.1 25.2-1.1 73.8 0 48.6 0.2 54.7 1.1 73.8 0.9 19 3.9 32.1 8.3 43.4 4.6 11.8 10.7 21.7 20.6 31.7 9.9 9.9 19.9 16.1 31.7 20.6 11.4 4.4 24.4 7.4 43.4 8.3 19.1 0.9 25.2 1.1 73.8 1.1s54.7-0.2 73.8-1.1c19-0.9 32.1-3.9 43.4-8.3 11.8-4.6 21.7-10.7 31.7-20.6 9.9-9.9 16.1-19.9 20.6-31.7 4.4-11.4 7.4-24.4 8.3-43.4 0.9-19.1 1.1-25.2 1.1-73.8s-0.2-54.7-1.1-73.8c-0.9-19-3.9-32.1-8.3-43.4 -4.6-11.8-10.7-21.7-20.6-31.7 -9.9-9.9-19.9-16.1-31.7-20.6 -11.4-4.4-24.4-7.4-43.4-8.3C310.7 77.3 304.6 77.1 256 77.1L256 77.1z"/><path d="M256 164.1c-50.7 0-91.9 41.1-91.9 91.9s41.1 91.9 91.9 91.9 91.9-41.1 91.9-91.9S306.7 164.1 256 164.1zM256 315.6c-32.9 0-59.6-26.7-59.6-59.6s26.7-59.6 59.6-59.6 59.6 26.7 59.6 59.6S288.9 315.6 256 315.6z"/><circle cx="351.5" cy="160.5" r="21.5"/></g></svg>
										</a>
									</li>
									<li>
										<a href="https://www.youtube.com/channel/UCc2yL-QGQjscXpPx9Pp7J8w" target="_blank">
											<svg viewBox="0 0 512 512"><path d="M422.6 193.6c-5.3-45.3-23.3-51.6-59-54 -50.8-3.5-164.3-3.5-215.1 0 -35.7 2.4-53.7 8.7-59 54 -4 33.6-4 91.1 0 124.8 5.3 45.3 23.3 51.6 59 54 50.9 3.5 164.3 3.5 215.1 0 35.7-2.4 53.7-8.7 59-54C426.6 284.8 426.6 227.3 422.6 193.6zM222.2 303.4v-94.6l90.7 47.3L222.2 303.4z"/></svg>
										</a>
									</li>
									<li>
										<a href="https://github.com/ultraDevs" target="_blank">
											<svg viewBox="0 0 512 512"><path d="M256 70.7c-102.6 0-185.9 83.2-185.9 185.9 0 82.1 53.3 151.8 127.1 176.4 9.3 1.7 12.3-4 12.3-8.9V389.4c-51.7 11.3-62.5-21.9-62.5-21.9 -8.4-21.5-20.6-27.2-20.6-27.2 -16.9-11.5 1.3-11.3 1.3-11.3 18.7 1.3 28.5 19.2 28.5 19.2 16.6 28.4 43.5 20.2 54.1 15.4 1.7-12 6.5-20.2 11.8-24.9 -41.3-4.7-84.7-20.6-84.7-91.9 0-20.3 7.3-36.9 19.2-49.9 -1.9-4.7-8.3-23.6 1.8-49.2 0 0 15.6-5 51.1 19.1 14.8-4.1 30.7-6.2 46.5-6.3 15.8 0.1 31.7 2.1 46.6 6.3 35.5-24 51.1-19.1 51.1-19.1 10.1 25.6 3.8 44.5 1.8 49.2 11.9 13 19.1 29.6 19.1 49.9 0 71.4-43.5 87.1-84.9 91.7 6.7 5.8 12.8 17.1 12.8 34.4 0 24.9 0 44.9 0 51 0 4.9 3 10.7 12.4 8.9 73.8-24.6 127-94.3 127-176.4C441.9 153.9 358.6 70.7 256 70.7z"/></svg>
										</a>
									</li>
									<!-- <li>
										<a href="" target="_blank">
											
										</a>
									</li> -->
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="ud-footer-c">
				<p>Made With Love By ❤️ <a href="https://ultradevs.com" target="__blank">ultraDevs</a></p>
			</div>
		</div>
		<?php
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
