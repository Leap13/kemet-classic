<?php
/**
 * Kemet Header Markup
 *
 * @package Kemet Theme
 */

/**
 * Customizer Callback
 */
if ( ! class_exists( 'Kemet_Header_Markup' ) ) :

	/**
	 * Customizer Callback
	 */
	class Kemet_Header_Markup {
		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'kemet_sitehead', array( $this, 'desktop_header' ) );
			add_action( 'kemet_main_header', array( $this, 'main_header' ) );
			add_action( 'kemet_render_header_column', array( $this, 'render_column' ), 10, 2 );
			add_action( 'kemet_site_identity', array( $this, 'site_identity_markup' ) );
			add_action( 'kemet_header_menu', array( $this, 'menu_markup' ), 10, 1 );
			add_action( 'kemet_header_search', array( $this, 'search_markup' ) );
			add_action( 'kemet_header_button', array( $this, 'button_markup' ) );
			add_action( 'kemet_header_html', array( $this, 'html_markup' ), 10, 1 );
			add_action( 'kemet_header_widget', array( $this, 'widget_markup' ), 10, 1 );
		}

		/**
		 * Function to get site Header
		 */
		public function header_markup() {
			do_action( 'kemet_header' );
		}

		/**
		 * Header
		 */
		public function desktop_header() {
			get_template_part( 'templates/header/header-desktop-layout' );
		}

		/**
		 * Main Header
		 */
		public function main_header() {
			set_query_var( 'row', 'main' );
			get_template_part(
				'templates/header/header',
				'row',
				array(
					'row' => 'main',
				)
			);
		}

		/**
		 * Render Builder Colunm
		 *
		 * @param string $column column.
		 * @param string $row row.
		 */
		public function render_column( $column, $row ) {
			if ( Kemet_Builder_Helper::column_has_items( $column, $row, 'header', 'desktop' ) ) {
				self::render_column_content( $column, $row, 'header', 'desktop' );
			}
		}

		/**
		 * Get Column Content
		 *
		 * @param string $column column.
		 * @param string $row row.
		 * @param string $builder builder type.
		 * @param string $device device.
		 */
		public static function render_column_content( $column, $row, $builder = 'header', $device = 'desktop' ) {
			$items = kemet_get_option( $builder . '-' . $device . '-items' );
			foreach ( $items[ $row ][ $row . '_' . $column ] as $key => $item ) {
				if ( false !== strpos( $item, 'html' ) || false !== strpos( $item, 'menu' ) || false !== strpos( $item, 'widget' ) ) {
					$type = explode( '-', $item )[0];
					get_template_part( 'templates/' . $builder . '/components/' . $type, 'type', array( 'type' => $item ) );
				} else {
					get_template_part( 'templates/' . $builder . '/components/' . $item );
				}
			}
		}

		/**
		 * Site Title / Logo
		 */
		public function site_identity_markup() { ?>
			<div class="site-branding">
				<div class="kmt-site-identity" itemscope="itemscope" itemtype="https://schema.org/Organization">
						<?php kemet_logo(); ?>
				</div>
			</div>
			<!-- .site-branding -->
			<?php
		}

		/**
		 * Header Menu Markup
		 *
		 * @param string $menu menu slug.
		 */
		public function menu_markup( $menu ) {
			$custom_header_section   = kemet_get_option( 'header-main-rt-section' );
			$submenu_has_boxshadow   = kemet_get_option( 'submenu-box-shadow' ) ? ' submenu-box-shadow' : '';
			$kemet_submenu_animation = kemet_get_option( 'sub-menu-animation' );
			$kmt_submenu_classes     = array();
			$kmt_submenu_classes[]   = $submenu_has_boxshadow;
			if ( 'none' != $kemet_submenu_animation ) {
				$kmt_submenu_classes[] = 'submenu-' . $kemet_submenu_animation;
			}
			$kmt_submenu_classes[] = 'submenu-with-border';
			$submenu_class         = apply_filters( $menu . '_submenu_classes', implode( ' ', $kmt_submenu_classes ) );

			// Fallback Menu if menu not set.
			$fallback_menu_args = array(
				'theme_location' => $menu,
				'menu_id'        => $menu . '-menu',
				'menu_class'     => 'main-navigation',
				'container'      => 'div',
				'before'         => '<ul class="main-header-menu kmt-flex kmt-justify-content-flex-end' . $submenu_class . '">',
				'after'          => '</ul>',
			);

			$items_wrap  = '<nav itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope" id="site-navigation" class="kmt-flex-grow-1" role="navigation" aria-label="' . esc_html__( 'Site Navigation', 'kemet' ) . '">';
			$items_wrap .= '<div class="main-navigation">';
			$items_wrap .= '<ul id="%1$s" class="%2$s">%3$s</ul>';
			$items_wrap .= '</div>';
			$items_wrap .= '</nav>';

			// Menu.
			$menu_args = array(
				'theme_location'  => $menu,
				'menu'            => apply_filters( 'kemet_' . $menu . '_slug', $menu ),
				'menu_id'         => $menu . '-menu',
				'menu_class'      => 'main-header-menu kmt-flex kmt-justify-content-flex-end' . $submenu_class . $submenu_has_boxshadow,
				'container'       => 'div',
				'container_class' => 'main-header-bar-navigation ' . $menu . '-menu',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			);

			if ( has_nav_menu( $menu ) ) {
				// To add default alignment for navigation which can be added through any third party plugin.
				// Do not add any CSS from theme except header alignment.
				echo '<div class="kmt-main-header-bar-alignment">';
				echo '<nav itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope" id="site-navigation" class="kmt-flex-grow-1" role="navigation" aria-label="' . esc_html__( 'Site Navigation', 'kemet' ) . '">';
				echo '<div class="main-navigation">';
				wp_nav_menu( $menu_args );
				echo '</div>';
				echo '</nav>';
				echo '</div>';
			} else {
				echo '<div class="main-header-bar-navigation">';
				echo '<nav itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope" id="site-navigation" class="kmt-flex-grow-1" role="navigation" aria-label="' . esc_html__( 'Site Navigation', 'kemet' ) . '">';
				wp_page_menu( $fallback_menu_args );
				echo '</nav>';
				echo '</div>';
			}
		}

		/**
		 * Search
		 */
		public function search_markup() {
			$search_style      = kemet_get_option( 'search-style' );
			$box_shadow        = '';
			$search_box_shadow = kemet_get_option( 'search-box-shadow' );
			if ( true == $search_box_shadow ) {
				$box_shadow = 'search-box-shadow';
			}

			$search_html  = '<div class="kmt-search-container">';
			$search_html .= '<div class="kmt-search-icon"><a class="kemet-search-icon" href="#"><span class="screen-reader-text">' . esc_html__( 'Search', 'kemet' ) . '</span></a></div>';
			$search_html .= '<div class="kmt-search-menu-icon ' . $box_shadow . '" id="kmt-search-form" data-type="' . $search_style . '">';
			$search_html .= get_search_form( false );
			$search_html .= '</div>';
			$search_html .= '</div>';

			echo $search_html;
		}

		/**
		 * Button
		 */
		public function button_markup() {
			$text = esc_html__( 'Button', 'kemet' );
			echo '<a href=' . esc_url( admin_url() ) . ' class="button" target="_blank">' . esc_html( $text ) . '</a>';
		}

		/**
		 * Html
		 *
		 * @param string $html html type.
		 */
		public function html_markup( $html ) {
			$option = 'header-main-rt-section-html';
			echo kemet_get_custom_html( $option );
		}

		/**
		 * Widget
		 *
		 * @param string $widget widget type.
		 */
		public function widget_markup( $widget ) {
			Kemet_Builder_Helper::get_custom_widget( $widget );
		}
	}

	/**
	 * Kicking this off by calling 'get_instance()' method
	 */
	Kemet_Header_Markup::get_instance();
endif;
