<?php
/**
 * Kemet Admin Notice Class
 *
 * @package  Kemet
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Kmt_Admin_Notices' ) ) :
	/**
	 * The Admin Notice Class
	 */
	class Kmt_Admin_Notices {

		/**
		 * Instance
		 *
		 * @var instance
		 */
		private static $instance;

		/**
		 *  Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Setup class.
		 */
		public function __construct() {

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
			if( ! defined('PREMIUM_ADDONS_VERSION' ) ){
				/* TO DO */
				add_action( 'admin_notices', array( $this, 'kemet_admin_notice' ) );
				return;
			}
		}

		/**
		 * Add admin notice
		 */
		public function kemet_admin_notice() {

				?>
				<div class="notice kmt-notice is-dismissible">
						<div class="kemet-notice-logo">
						    <span class="kmticon-AncientOwl" style="font-size: 55px;"></span>
						</div>
						<div class="kemet-notice-text">
							<p><strong><?php esc_html_e( 'Thanks for Installing Kemet Theme!', 'kemet' ); ?></strong>
                            <span><?php esc_html_e( ' To fully take advantage of the best our theme we recommend the Kemet Addons plugin to be active.', 'kemet' ); ?></span></p>
								<?php
                                    $plugin = 'premium-addons-for-elementor/premium-addons-for-elementor.php';

                                    if ( is_addons_installed() ) {
                                        if ( ! current_user_can( 'activate_plugins' ) ) {
                                            return;
                                        }
                                        $action_url   = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin );
                                        $button_label = __( 'Activate Kemet Addons', 'kemet' );

                                    } else {
                                        if ( ! current_user_can( 'install_plugins' ) ) {
                                            return;
                                        }
                                        $action_url   = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=premium-addons-for-elementor' ), 'install-plugin_premium-addons-for-elementor' );
                                        $button_label = __( 'Install Kemet Addons', 'kemet' );
                                    }

                                    $button = '<a href="' . $action_url . '" class="button-primary">' . $button_label . '</a>';

                                    printf( '<div>%1$s</div>', $button );
								?>
						</div>
					</div>

				<?php
			//}
		}

		public function enqueue_scripts()  {
			wp_enqueue_style( 'kmt-admin-notice', KEMET_THEME_URI . 'functions/admin/assets/css/style.css', array(), KEMET_THEME_VERSION );
		}


    }
         /**
         * Is elementor plugin installed.
         */
        if ( ! function_exists( 'is_addons_installed' ) ) {

            /**
             * Check if Elementor Pro is installed
             *
             * @since 1.0.0
             *
             * @access public
             */
            function is_addons_installed() {
                $path    = 'premium-addons-for-elementor/premium-addons-for-elementor.php';
                $plugins = get_plugins();

                return isset( $plugins[ $path ] );
            }
        }

	Kmt_Admin_Notices::get_instance();

endif;
