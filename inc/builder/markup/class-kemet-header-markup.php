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
			add_action( 'kemet_mobile_header', array( $this, 'mobile_header' ) );
			add_action( 'kemet_top_header', array( $this, 'top_header' ) );
			add_action( 'kemet_main_header', array( $this, 'main_header' ) );
			add_action( 'kemet_bottom_header', array( $this, 'bottom_header' ) );
			add_action( 'kemet_top_mobile_header', array( $this, 'top_mobile_header' ) );
			add_action( 'kemet_main_mobile_header', array( $this, 'main_mobile_header' ) );
			add_action( 'kemet_bottom_mobile_header', array( $this, 'bottom_mobile_header' ) );
			add_action( 'kemet_render_header_column', array( $this, 'render_column' ), 10, 2 );
			add_action( 'kemet_render_mobile_header_column', array( $this, 'render_mobile_column' ), 10, 2 );
			add_action( 'kemet_render_desktop_popup', array( $this, 'render_column' ), 10, 2 );
			add_action( 'kemet_render_mobile_popup', array( $this, 'render_mobile_column' ), 10, 2 );
			add_action( 'kemet_site_identity', array( $this, 'site_identity_markup' ) );
			add_action( 'kemet_header_menu', array( $this, 'menu_markup' ), 10, 1 );
			add_action( 'kemet_header_search', array( $this, 'search_markup' ) );
			add_action( 'kemet_header_search_box', array( $this, 'search_box_markup' ) );
			add_action( 'kemet_header_button', array( $this, 'button_markup' ) );
			add_action( 'kemet_header_mobile_button', array( $this, 'mobile_button_markup' ) );
			add_action( 'kemet_header_widget', array( $this, 'widget_markup' ), 10, 1 );
			add_action( 'widgets_init', array( $this, 'widgets_init' ) );
			add_action( 'kemet_header_html', array( $this, 'render_html' ), 10, 1 );
			add_action( 'init', array( $this, 'register_menu_locations' ) );
			add_action( 'kemet_mobile_toggle', array( $this, 'mobile_toggle_buttons_markup' ) );
			add_action( 'kemet_desktop_toggle', array( $this, 'desktop_toggle_buttons_markup' ) );
			add_action( 'wp_footer', array( $this, 'mobile_popup' ) );
			add_action( 'wp_footer', array( $this, 'desktop_popup' ) );
		}

		/**
		 * Register menus
		 */
		function register_menu_locations() {
			$menu_items                   = apply_filters(
				'kemet_header_register_menu_items',
				array(
					'primay-menu'    => 'Primary Menu',
					'secondary-menu' => 'Secondary Menu',
				)
			);
			$menu_items['offcanvas-menu'] = __( 'Off-Canvas Menu', 'kemet' );
			/**
			 * Menus
			 */
			register_nav_menus(
				$menu_items
			);
		}
		/**
		 * Register widget area.
		 *
		 * @see https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
		 */
		public function widgets_init() {
			register_sidebar(
				apply_filters(
					'kemet_header_widgets_1',
					array(
						'name'          => esc_html__( 'Header Widget 1', 'kemet' ),
						'id'            => 'header-widget-1',
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<div class="widget-head"><div class="title"><h4 class="widget-title">',
						'after_title'   => '</h4></div></div>',
					)
				)
			);

			register_sidebar(
				apply_filters(
					'kemet_header_widgets_2',
					array(
						'name'          => esc_html__( 'Header Widget 2', 'kemet' ),
						'id'            => 'header-widget-2',
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<div class="widget-head"><div class="title"><h4 class="widget-title">',
						'after_title'   => '</h4></div></div>',
					)
				)
			);
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
		 * Mobile Header
		 */
		public function mobile_header() {
			get_template_part( 'templates/header/header-mobile-layout' );
		}

		/**
		 * Top Header
		 */
		public function top_header() {
			set_query_var( 'row', 'top' );
			get_template_part(
				'templates/header/header',
				'row',
				array(
					'row' => 'top',
				)
			);
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
		 * Bottom Header
		 */
		public function bottom_header() {
			set_query_var( 'row', 'bottom' );
			get_template_part(
				'templates/header/header',
				'row',
				array(
					'row' => 'bottom',
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
		 * Render Builder Colunm
		 *
		 * @param string $column column.
		 * @param string $row row.
		 */
		public function render_mobile_column( $column, $row ) {
			if ( Kemet_Builder_Helper::column_has_items( $column, $row, 'header', 'mobile' ) ) {
				self::render_column_content( $column, $row, 'header', 'mobile' );
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
					$type = false !== strpos( $item, 'mobile' ) && false !== strpos( $item, 'html' ) ? explode( '-', str_replace( 'mobile-', '', $item ) )[1] : explode( '-', $item )[1];
					get_template_part( 'templates/' . $builder . '/components/' . $type, 'type', array( 'type' => $item ) );
				} else {
					get_template_part( 'templates/' . $builder . '/components/' . $item );
				}
			}
		}

		/**
		 * Html
		 *
		 * @param string $html html name.
		 */
		public function render_html( $html ) {
			echo Kemet_Builder_Helper::kemet_get_custom_html( $html . '-text', 'kmt-' . $html );
		}

		/**
		 * Html 1
		 */
		public function render_html_1() {
			return $this->get_html( 'header-html-1' );
		}

		/**
		 * Html 2
		 */
		public function render_html_2() {
			return $this->get_html( 'header-html-2' );
		}

		/**
		 * Html 1
		 */
		public function render_html_mobile_1() {
			return $this->get_html( 'header-mobile-html-1' );
		}

		/**
		 * Html 2
		 */
		public function render_html_mobile_2() {
			return $this->get_html( 'header-mobile-html-2' );
		}

		/**
		 * Html callback
		 *
		 * @param string $option option name.
		 * @return string
		 */
		public function get_html( $option ) {
			$html = kemet_get_option( $option . '-text' );

			return do_shortcode( $html );
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
				'menu_id'        => $menu,
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
				'menu_id'         => $menu,
				'menu_class'      => 'main-header-menu kmt-flex kmt-justify-content-flex-end' . $submenu_class . $submenu_has_boxshadow,
				'container'       => 'div',
				'container_class' => 'main-header-bar-navigation ' . $menu,
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
			$box_shadow        = '';
			$search_box_shadow = kemet_get_option( 'search-box-shadow' );
			if ( true == $search_box_shadow ) {
				$box_shadow = 'search-box-shadow';
			}

			$search_html  = '<div class="kmt-search-container">';
			$search_html .= '<div class="kmt-search-icon"><a class="kemet-search-icon" href="#"><span class="screen-reader-text">' . esc_html__( 'Search', 'kemet' ) . '</span></a></div>';
			$search_html .= '<div class="kmt-search-menu-icon ' . $box_shadow . '" id="kmt-search-form">';
			$search_html .= get_search_form( false );
			$search_html .= '</div>';
			$search_html .= '</div>';

			echo $search_html;
		}

		/**
		 * Search
		 */
		public function search_box_markup() {
			$search_html  = '<div class="kmt-search-box-container">';
			$search_html .= '<div class="kmt-search-box-form" id="kmt-search-form">';
			$search_html .= get_search_form( false );
			$search_html .= '</div>';
			$search_html .= '</div>';

			echo $search_html;
		}
		/**
		 * Button
		 */
		public function button_markup() {
			$text   = kemet_get_option( 'header-button-label' );
			$url    = kemet_get_option( 'header-button-url' );
			$target = kemet_get_option( 'header-button-open-new-tab' ) ? '_blank' : '_self';
			echo '<a href="' . esc_url( $url ) . '" class="button header-button" target="' . esc_attr( $target ) . '">' . esc_html( $text ) . '</a>';
		}

		/**
		 * Button
		 */
		public function mobile_button_markup() {
			$text = esc_html__( 'Mobile Button', 'kemet' );
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

		/**
		 * Top Header
		 */
		public function top_mobile_header() {
			set_query_var( 'row', 'top' );
			get_template_part(
				'templates/header/header-mobile',
				'row',
				array(
					'row' => 'top',
				)
			);
		}

		/**
		 * Main Header
		 */
		public function main_mobile_header() {
			set_query_var( 'row', 'main' );
			get_template_part(
				'templates/header/header-mobile',
				'row',
				array(
					'row' => 'main',
				)
			);
		}

		/**
		 * Bottom Header
		 */
		public function bottom_mobile_header() {
			set_query_var( 'row', 'bottom' );
			get_template_part(
				'templates/header/header-mobile',
				'row',
				array(
					'row' => 'bottom',
				)
			);
		}

		/**
		 * Toggle Button Markup
		 */
		function mobile_toggle_buttons_markup() {
			$this->get_toggle_button( 'mobile' );
		}

		/**
		 * Toggle Button Markup
		 */
		function desktop_toggle_buttons_markup() {
			$this->get_toggle_button( 'desktop' );
		}

		/**
		 * Popup Toggle Button Markup
		 *
		 * @param string $device device type.
		 */
		public function get_toggle_button( $device ) {
			$toggle_title        = trim( apply_filters( 'kemet_' . $device . '_toggle_label', kemet_get_option( 'header-' . $device . '-toggle-label' ) ) );
			$toggle_icon         = apply_filters( 'kemet_' . $device . '_toggle_icon', 'toggle-button-icon' );
			$toggle_label_class  = '';
			$screen_reader_title = __( 'Desktop Popup', 'kemet' );
			if ( '' !== $toggle_title ) {
				$toggle_label_class  = 'kmt-popup-label';
				$screen_reader_title = $toggle_title;
			}
			?>
			<button type="button" class="<?php echo esc_attr( $device ); ?>-toggle-button toggle-button header-toggle-button <?php echo esc_attr( $toggle_label_class ); ?>" rel="main-header-menu" data-target="#site-navigation" aria-controls='site-navigation' aria-expanded='false'>
				<span class="screen-reader-text"><?php echo esc_html( $screen_reader_title ); ?></span>
				<i class="<?php echo esc_attr( $toggle_icon ); ?>"></i>
				<?php if ( '' != $toggle_title ) { ?>
					<span class="<?php echo esc_attr( $device ); ?>-popup-wrap">
						<span class="<?php echo esc_attr( $device ); ?>-popup"><?php echo esc_html( $toggle_title ); ?></span>
					</span>
				<?php } ?>
			</button>
			<?php
		}
		/**
		 * Mobile Popup content
		 */
		public function mobile_popup() {
			$this->get_popup_content( 'mobile' );
		}

		/**
		 * Desktop Popup content
		 */
		public function desktop_popup() {
			$this->get_popup_content( 'desktop' );
		}

		/**
		 * Get Popup Markup
		 *
		 * @param string $device device type.
		 */
		public function get_popup_content( $device ) {
			$popup_layout         = kemet_get_option( $device . '-popup-layout' );
			$popup_side           = kemet_get_option( $device . '-popup-slide-side' );
			$popup_align          = kemet_get_option( $device . '-popup-content-align' );
			$popup_vertical_align = kemet_get_option( $device . '-popup-content-vertical-align' );
			$classes              = array();
			if ( 'slide' === $popup_layout ) {
				$classes[] = 'kmt-popup-' . $popup_side;
			} else {
				$classes[] = 'kmt-popup-full-width';
			}
			$classes[] = 'kmt-popup-align-' . $popup_align;
			$classes[] = 'kmt-popup-valign-' . $popup_vertical_align;

			$classes = array_map( 'sanitize_html_class', $classes );
			?>
			<div id="kmt-<?php echo esc_attr( $device ); ?>-popup" class="kmt-<?php echo esc_attr( $device ); ?>-popup kmt-popup-main <?php echo esc_attr( join( ' ', $classes ) ); ?> ">
				<div class="kmt-popup-overlay"></div>
				<div class="kmt-popup-content kmt-<?php echo esc_attr( $device ); ?>-popup-content">
					<div class="kmt-popup-header">
						<button id="kmt-toggle-button-close" class="toggle-button-close">
							<span class="kmt-close-icon"></span>
						</button>
					</div>
					<div class="kmt-popup-body-content">
						<?php
						/**
						 * Kemet Render Header Column
						 */
						do_action( 'kemet_render_' . $device . '_popup', 'content', 'popup' );
						?>
					</div>
				</div>
			</div>		
			<?php
		}
	}
	/**
	 * Kicking this off by calling 'get_instance()' method
	 */
	Kemet_Header_Markup::get_instance();
endif;
