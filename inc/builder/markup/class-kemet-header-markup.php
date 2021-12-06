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
			add_action( 'kemet_header_divider', array( $this, 'divider_markup' ) );
			add_action( 'kemet_header_button', array( $this, 'button_markup' ) );
			add_action( 'kemet_header_mobile_button', array( $this, 'button_markup' ) );
			add_action( 'kemet_header_widget', array( $this, 'widget_markup' ), 10, 1 );
			add_action( 'widgets_init', array( $this, 'widgets_init' ) );
			add_action( 'kemet_header_html', array( $this, 'render_html' ), 10, 1 );
			add_action( 'init', array( $this, 'register_menu_locations' ) );
			add_action( 'kemet_mobile_toggle', array( $this, 'mobile_toggle_buttons_markup' ) );
			add_action( 'kemet_desktop_toggle', array( $this, 'desktop_toggle_buttons_markup' ) );
			add_action( 'wp_footer', array( $this, 'mobile_popup' ) );
			add_action( 'wp_footer', array( $this, 'desktop_popup' ) );
			add_filter( 'customize_section_active', array( $this, 'display_sidebar' ), 99, 2 );
			add_filter( 'body_class', array( $this, 'body_classes' ) );
			add_action( 'kemet_header', array( $this, 'mobile_header_logo' ), 9 );
			add_filter( 'kemet_header_class', array( $this, 'header_classes' ), 10, 1 );
			add_filter( 'customizer_widgets_section_args', array( $this, 'customizer_custom_widget_areas' ), 10, 3 );
			add_filter( 'get_search_form', array( $this, 'add_search_icon' ), 99 );
			add_filter( 'get_product_search_form', array( $this, 'add_search_icon' ), 99 );
		}

		/**
		 * Filter footer widget areas.
		 *
		 * @param array  $section_args the widget sections args.
		 * @param string $section_id the widget sections id.
		 * @param string $sidebar_id the widget area id.
		 */
		public function customizer_custom_widget_areas( $section_args, $section_id, $sidebar_id ) {
			if ( strpos( $section_id, 'header-widget-' ) ) {
				$section_args['panel'] = 'panel-header-builder-group';
			}
			return $section_args;
		}

		/**
		 * different_mobile_logo
		 *
		 * @return boolean
		 */
		public static function different_mobile_logo() {
			return kemet_get_option( 'different-logo-for-mobile' );
		}
		/**
		 * mobile_header_logo
		 *
		 * @return void
		 */
		public function mobile_header_logo() {
			if ( self::different_mobile_logo() ) {
				// Logo For None Effect.
				add_filter( 'kemet_has_custom_logo', '__return_true' );
				add_filter( 'get_custom_logo', array( $this, 'kemet_mobile_header_logo' ), 10, 2 );
			}
		}

		/**
		 * mobile header markup
		 *
		 * @param string $html logo html.
		 * @return string
		 */
		public function kemet_mobile_header_logo( $html ) {
			if ( self::different_mobile_logo() ) {
				$mobile_logo = kemet_get_option( 'kmt-header-mobile-logo' );
				add_filter( 'wp_get_attachment_image_attributes', array( $this, 'replace_mobile_header_attr' ), 10, 3 );
				$custom_logo_id = attachment_url_to_postid( $mobile_logo );
				$size           = 'full';
				$html          .= sprintf(
					'<a href="%1$s" class="custom-logo-link custom-mobile-logo" rel="home" itemprop="url">%2$s</a>',
					esc_url( home_url( '/' ) ),
					wp_get_attachment_image(
						apply_filters( 'kemet_custom_mobile_logo_id', $custom_logo_id ), // Attachment id.
						'kmt-logo-size', // Attachment size.
						false, // Attachment icon.
						array(
							'class' => 'custom-logo',
						)
					)
				);
			}
			return $html;
		}

		/**
		 * Replace mobile header attributes
		 *
		 * @param object $attr
		 * @param object $attachment
		 * @param mixed  $size
		 * @return object
		 */
		public function replace_mobile_header_attr( $attr, $attachment, $size ) {
			if ( self::different_mobile_logo() ) {
				$mobile_logo    = kemet_get_option( 'kmt-header-mobile-logo' );
				$custom_logo_id = attachment_url_to_postid( $mobile_logo );
				if ( $custom_logo_id == $attachment->ID ) {
					$attach_data = array();
					if ( ! is_customize_preview() ) {
						$attach_data = wp_get_attachment_image_src( $attachment->ID, 'full' );
						if ( isset( $attach_data[0] ) ) {
							$attr['src'] = $attach_data[0];
						}
					}
					$attr['srcset'] = '';

					if ( '' !== $mobile_logo ) {
						$cutom_logo     = wp_get_attachment_image_src( $custom_logo_id, 'full' );
						$cutom_logo_url = $cutom_logo[0];
						$attr['srcset'] = $cutom_logo_url;
					}
					$attr['srcset'] = $cutom_logo_url;
				}
			}
			return $attr;
		}

		/**
		 * Header classes
		 *
		 * @param array $classes array of classes.
		 * @return array
		 */
		public function body_classes( $classes ) {
			// Overlay Header.
			if ( self::enable_overlay_header() ) {
				$classes[] = 'kmt-overlay-header';
			}

			return $classes;
		}

		/**
		 * Add sticky header classes to header
		 *
		 * @param array $classes header classes.
		 * @return array
		 */
		public function header_classes( $classes ) {
			if ( self::different_mobile_logo() ) {
				$mobile_logo = kemet_get_option( 'kmt-header-mobile-logo' );
				if ( '' !== $mobile_logo ) {
					$classes[] = 'kmt-mobile-logo';
				}
			}
			return $classes;
		}

		/**
		 * Enable Overlay Header
		 */
		public static function enable_overlay_header() {
			$header_transparent = kemet_get_option( 'overlay-header-enable' );

			return apply_filters( 'kemet_enable_overlay_header', $header_transparent );
		}

		/**
		 * Display sidebar as section.
		 *
		 * @param bool   $active ios active.
		 * @param object $section section.
		 * @return bool
		 */
		public function display_sidebar( $active, $section ) {
			if ( strpos( $section->id, 'header-widget-' ) ) {
				$active = true;
			}
			return $active;
		}

		/**
		 * Register menus
		 */
		public function register_menu_locations() {
			$menu_items                   = apply_filters(
				'kemet_header_register_menu_items',
				array(
					'primary-menu'   => 'Primary Menu',
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
		 * Checks to see if the row has any content.
		 *
		 * @param string $row the name of the row.
		 * @return bool
		 */
		public static function is_empty_row( $row = 'main', $device = 'desktop' ) {
			$helper = new Kemet_Builder_Helper();
			if ( $helper::column_has_items( 'left', $row, 'header', $device ) || $helper::column_has_items( 'right', $row, 'header', $device ) || $helper::column_has_items( 'left_center', $row, 'header', $device ) || $helper::column_has_items( 'center', $row, 'header', $device ) || $helper::column_has_items( 'right_center', $row, 'header', $device ) ) {
				return false;
			}
			return true;
		}

		/**
		 * Header
		 */
		public function desktop_header() {
			if ( apply_filters( 'kemet_display_header', true ) ) {
				get_template_part( 'templates/header/header-desktop-layout' );
			}

		}

		/**
		 * Mobile Header
		 */
		public function mobile_header() {
			if ( apply_filters( 'kemet_display_header', true ) ) {
				get_template_part( 'templates/header/header-mobile-layout' );
			}
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
			$items = apply_filters( 'kemet_' . $device . '_header_items', kemet_get_option( $builder . '-' . $device . '-items' ) );
			foreach ( $items[ $row ][ $row . '_' . $column ] as $key => $item ) {
				if ( false !== strpos( $item, 'html' ) || false !== strpos( $item, 'menu' ) || false !== strpos( $item, 'widget' ) || false !== strpos( $item, 'button' ) ) {
					$type = ( false !== strpos( $item, 'mobile' ) && false !== strpos( $item, 'html' ) ) || ( false !== strpos( $item, 'mobile' ) && false !== strpos( $item, 'button' ) ) ? explode( '-', str_replace( 'mobile-', '', $item ) )[1] : explode( '-', $item )[1];
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
			$submenu_has_boxshadow   = kemet_get_option( $menu . '-box-shadow' ) ? ' submenu-box-shadow' : '';
			$kemet_submenu_animation = kemet_get_option( $menu . '-submenu-effect' );
			$item_hover_effect       = kemet_get_option( $menu . '-items-hover-effect' );
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
				'before'         => '<ul class="main-header-menu kmt-flex kmt-justify-content-flex-end' . $submenu_class . '" data-effect="' . esc_attr( $item_hover_effect ) . '">',
				'after'          => '</ul>',
			);

			if ( has_nav_menu( $menu ) ) {
				// To add default alignment for navigation which can be added through any third party plugin.
				// Do not add any CSS from theme except header alignment.
				echo '<div class="kmt-main-header-bar-alignment">';
				echo '<nav itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope" id="site-navigation" class="kmt-flex-grow-1" aria-label="' . esc_html__( 'Site Navigation', 'kemet' ) . '">';
				echo '<div class="main-navigation">';
				wp_nav_menu(
					array(
						'theme_location'  => $menu,
						'menu'            => apply_filters( 'kemet_' . $menu . '_slug', $menu ),
						'menu_id'         => $menu,
						'menu_class'      => 'main-header-menu kmt-flex kmt-justify-content-flex-end' . $submenu_class . $submenu_has_boxshadow,
						'container'       => 'div',
						'container_class' => 'main-header-bar-navigation ' . $menu,
						'items_wrap'      => '<ul id="%1$s" data-effect="' . esc_attr( $item_hover_effect ) . '" class="%2$s">%3$s</ul>',
					)
				);
				echo '</div>';
				echo '</nav>';
				echo '</div>';
			} else {
				echo '<div class="main-header-bar-navigation">';
				echo '<nav itemtype="https://schema.org/SiteNavigationElement" itemscope="itemscope" id="site-navigation" class="kmt-flex-grow-1" aria-label="' . esc_html__( 'Site Navigation', 'kemet' ) . '">';
				wp_page_menu( $fallback_menu_args );
				echo '</nav>';
				echo '</div>';
			}
		}

		/**
		 * Add Search Icon
		 *
		 * @param string $markup search form markup.
		 *
		 * @return mixed
		 */
		public function add_search_icon( $markup ) {
			$markup = str_replace( '</form>', '<div class="kemet-search-svg-icon-wrap">' . Kemet_Svg_Icons::get_icons( 'search' ) . '</div></form>', $markup );
			return $markup;
		}

		/**
		 * Divider
		 */
		public function divider_markup() {
			$divider_style       = kemet_get_option( 'divider-item-style' );
			$divider_html  = '<div class="kmt-divider-container ' . esc_attr($divider_style) . '">';
			$divider_html .= '</div>';

			echo $divider_html;
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
			$search_html .= '<div class="kmt-search-icon"><a class="kemet-search-icon" href="#">' . Kemet_Svg_Icons::get_icons( 'search' ) . '<span class="screen-reader-text">' . esc_html__( 'Search', 'kemet' ) . '</span></a></div>';
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
		public function button_markup( $button ) {
			$text      = kemet_get_option( $button . '-label' );
			$url       = kemet_get_option( $button . '-url' );
			$rel       = array();
			$target    = kemet_get_option( $button . '-open-new-tab' ) ? '_blank' : '_self';
			$nofollow  = kemet_get_option( $button . '-link-nofollow' );
			$sponsored = kemet_get_option( $button . '-link-sponsored' );
			$download  = kemet_get_option( $button . '-link-download' );
			if ( $nofollow ) {
				$rel[] = 'nofollow';
			}
			if ( $sponsored ) {
				$rel[] = 'sponsored';
			}
			echo '<a href="' . esc_url( $url ) . '" class="button header-button ' . esc_attr( $button ) . '" target="' . esc_attr( $target ) . '" ' . ( ! empty( $rel ) ? ' rel="' . esc_attr( implode( ' ', $rel ) ) . '"' : '' ) . ( $download ? ' download' : '' ) . '>' . esc_html( $text ) . '</a>';
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
			$enable_label   = kemet_get_option( $device . '-toggle-button-enable-label' );
			$toggle_title   = trim( apply_filters( 'kemet_' . $device . '_toggle_label', kemet_get_option( $device . '-toggle-button-label' ) ) );
			$toggle_icon    = apply_filters( 'kemet_' . $device . '_toggle_icon', 'toggle-button-icon' );
			$design         = kemet_get_option( $device . '-toggle-button-design' );
			$floating       = kemet_get_option( $device . '-toggle-button-float' );
			$style          = kemet_get_option( $device . '-toggle-button-style' );
			$visibility     = kemet_get_option( $device . '-toggle-button-label-visibility' );
			$float_position = kemet_get_option( $device . '-toggle-button-float-position' );
			$label_position = kemet_get_option( $device . '-toggle-button-label-position', 'left' );
			$classes        = array();

			if ( $floating ) {
				$classes[] = 'toggle-button-fixed';
				$classes[] = 'float-' . $float_position;
			}
			?>
			<a class="<?php echo esc_attr( $device ); ?>-toggle-button toggle-button header-toggle-button <?php echo esc_attr( implode( ' ', $classes ) ); ?>" rel="main-header-menu" data-target="#site-navigation" data-label="<?php echo esc_attr( $label_position ); ?>" data-style="<?php echo esc_attr( $style ); ?>" aria-controls='site-navigation' aria-expanded='false'>
				<?php Kemet_Builder_Helper::customizer_edit_link(); ?>
				<?php if ( $enable_label ) { ?>
					<span class="kmt-popup-label <?php echo get_visibility_class( $visibility ); ?>"><?php echo esc_html( $toggle_title ); ?></span>
				<?php } ?>
				<?php echo Kemet_Svg_Icons::get_icons( 'menu' ); ?>
			</a>
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
							<span class="kmt-close-icon">
								<?php echo Kemet_Svg_Icons::get_icons( 'close' ); ?> 
							</span>
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
