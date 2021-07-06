<?php
/**
 * Kemet Footer Markup
 *
 * @package Kemet Theme
 */

/**
 * Customizer Callback
 */
if ( ! class_exists( 'Kemet_Footer_Markup' ) ) :

	/**
	 * Customizer Callback
	 */
	class Kemet_Footer_Markup {

	/**
	 * Footer Row layout
	 *
	 * @var array
	 */
	public static $footer_row_layouts;

	/**
	 *  No. Of. Footer Columns.
	 *
	 * @var int
	 */
	public static $num_of_footer_columns;

	/**
	 * Member Variable
	 *
	 * @var instance
	 */
	public static $loaded_grid = null;

	/**
	 * Footer Desktop Items
	 *
	 * @var array
	 */
	public static $footer_desktop_items = null;

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

			/**
			 * Member Variable
			 *
			 * @var grid_size_mapping
			 */
			public static $grid_size_mapping = array(
				'6-equal'    => 'repeat( 6, 1fr )',
				'5-equal'    => 'repeat( 5, 1fr )',
				'4-equal'    => 'repeat( 4, 1fr )',
				'4-lheavy'   => '2fr 1fr 1fr 1fr',
				'4-rheavy'   => '1fr 1fr 1fr 2fr',
				'3-equal'    => 'repeat( 3, 1fr )',
				'3-lheavy'   => '2fr 1fr 1fr',
				'3-rheavy'   => '1fr 1fr 2fr',
				'3-cheavy'   => '1fr 2fr 1fr',
				'3-cwide'    => '1fr 3fr 1fr',
				'3-firstrow' => '1fr 1fr',
				'3-lastrow'  => '1fr 1fr',
				'2-equal'    => 'repeat( 2, 1fr )',
				'2-lheavy'   => '2fr 1fr',
				'2-rheavy'   => '1fr 2fr',
				'2-full'     => '2fr',
				'full'       => '1fr',
			);

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
			// Footer Builder.
			add_action( 'kemet_footer_content', array( $this, 'footer_markup' ), 10 );

			add_action( 'kemet_top_footer', array( $this, 'top_footer' ), 10 );
			add_action( 'kemet_primary_footer', array( $this, 'main_footer' ), 10 );
			add_action( 'kemet_bottom_footer', array( $this, 'bottom_footer' ), 10 );

			add_action( 'kemet_render_footer_column', array( $this, 'render_column' ), 10, 2);


			add_action( 'kemet_footer_menu', array( $this, 'menu_markup' ), 10, 1 );
			add_action( 'kemet_footer_button', array( $this, 'button_markup' ) );
			add_action( 'kemet_footer_widget', array( $this, 'widget_markup' ), 10, 1 );
			add_action( 'widgets_init', array( $this, 'widgets_init' ) );
			add_action( 'kemet_footer_html', array( $this, 'render_html' ), 10, 1 );
			add_action( 'init', array( $this, 'register_menu_locations' ) );
			add_filter( 'customize_section_active', array( $this, 'display_sidebar' ), 99, 2 );
			
			self::$num_of_footer_columns =  apply_filters( 'kemet_footer_column_count', 6 );

			self::$footer_row_layouts = apply_filters(
			'kemet_footer_row_layout',
			array(
				'desktop'    => array(
					'6' => array(
						'6-equal' => array(
							'icon' => 'sixcol',
						),
					),
					'5' => array(
						'5-equal' => array(
							'icon' => 'fivecol',
						),
					),
					'4' => array(
						'4-equal'  => array(
							'icon' => 'fourcol',
						),
						'4-lheavy' => array(
							'icon' => 'lfourforty',
						),
						'4-rheavy' => array(
							'icon' => 'rfourforty',
						),
					),
					'3' => array(
						'3-equal'  => array(
							'icon' => 'threecol',
						),
						'3-lheavy' => array(
							'icon' => 'lefthalf',
						),
						'3-rheavy' => array(
							'icon' => 'righthalf',
						),
						'3-cheavy' => array(
							'icon' => 'centerhalf',
						),
						'3-cwide'  => array(
							'icon' => 'widecenter',
						),
					),
					'2' => array(
						'2-equal'  => array(
							'icon' => 'twocol',
						),
						'2-lheavy' => array(
							'icon' => 'twoleftgolden',
						),
						'2-rheavy' => array(
							'icon' => 'tworightgolden',
						),
					),
					'1' => array(
						'full' => array(
							'icon' => 'row',
						),
					),
				),
				'tablet'     => array(
					'6' => array(
						'6-equal' => array(
							'tooltip' => __( 'Equal Width Columns', 'kemet' ),
							'icon'    => 'sixcol',
						),
						'full'    => array(
							'tooltip' => __( 'Collapse to Rows', 'kemet' ),
							'icon'    => 'collapserowsix',
						),
					),
					'5' => array(
						'5-equal' => array(
							'tooltip' => __( 'Equal Width Columns', 'kemet' ),
							'icon'    => 'fivecol',
						),
						'full'    => array(
							'tooltip' => __( 'Collapse to Rows', 'kemet' ),
							'icon'    => 'collapserowfive',
						),
					),
					'4' => array(
						'4-equal' => array(
							'tooltip' => __( 'Equal Width Columns', 'kemet' ),
							'icon'    => 'fourcol',
						),
						'2-equal' => array(
							'tooltip' => __( 'Two Column Grid', 'kemet' ),
							'icon'    => 'grid',
						),
						'full'    => array(
							'tooltip' => __( 'Collapse to Rows', 'kemet' ),
							'icon'    => 'collapserowfour',
						),
					),
					'3' => array(
						'3-equal'    => array(
							'tooltip' => __( 'Equal Width Columns', 'kemet' ),
							'icon'    => 'threecol',
						),
						'3-lheavy'   => array(
							'tooltip' => __( 'Left Heavy 50/25/25', 'kemet' ),
							'icon'    => 'lefthalf',
						),
						'3-rheavy'   => array(
							'tooltip' => __( 'Right Heavy 25/25/50', 'kemet' ),
							'icon'    => 'righthalf',
						),
						'3-cheavy'   => array(
							'tooltip' => __( 'Center Heavy 25/50/25', 'kemet' ),
							'icon'    => 'centerhalf',
						),
						'3-cwide'    => array(
							'tooltip' => __( 'Wide Center 20/60/20', 'kemet' ),
							'icon'    => 'widecenter',
						),
						'3-firstrow' => array(
							'tooltip' => __( 'First Row, Next Columns 100 - 50/50', 'kemet' ),
							'icon'    => 'firstrow',
						),
						'3-lastrow'  => array(
							'tooltip' => __( 'Last Row, Previous Columns 50/50 - 100', 'kemet' ),
							'icon'    => 'lastrow',
						),
						'full'       => array(
							'tooltip' => __( 'Collapse to Rows', 'kemet' ),
							'icon'    => 'collapserowthree',
						),
					),
					'2' => array(
						'2-equal'  => array(
							'tooltip' => __( 'Equal Width Columns', 'kemet' ),
							'icon'    => 'twocol',
						),
						'2-lheavy' => array(
							'tooltip' => __( 'Left Heavy 66/33', 'kemet' ),
							'icon'    => 'twoleftgolden',
						),
						'2-rheavy' => array(
							'tooltip' => __( 'Right Heavy 33/66', 'kemet' ),
							'icon'    => 'tworightgolden',
						),
						'full'     => array(
							'tooltip' => __( 'Collapse to Rows', 'kemet' ),
							'icon'    => 'collapserow',
						),
					),
					'1' => array(
						'full' => array(
							'tooltip' => __( 'Single Row', 'kemet' ),
							'icon'    => 'row',
						),
					),
				),
				'mobile'     => array(
					'6' => array(
						'6-equal' => array(
							'tooltip' => __( 'Equal Width Columns', 'kemet' ),
							'icon'    => 'sixcol',
						),
						'full'    => array(
							'tooltip' => __( 'Collapse to Rows', 'kemet' ),
							'icon'    => 'collapserowsix',
						),
					),
					'5' => array(
						'5-equal' => array(
							'tooltip' => __( 'Equal Width Columns', 'kemet' ),
							'icon'    => 'fivecol',
						),
						'full'    => array(
							'tooltip' => __( 'Collapse to Rows', 'kemet' ),
							'icon'    => 'collapserowfive',
						),
					),
					'4' => array(
						'4-equal' => array(
							'icon' => 'fourcol',
						),
						'2-equal' => array(
							'icon' => 'grid',
						),
						'full'    => array(
							'icon' => 'collapserowfour',
						),
					),
					'3' => array(
						'3-equal'    => array(
							'icon' => 'threecol',
						),
						'3-lheavy'   => array(
							'icon' => 'lefthalf',
						),
						'3-rheavy'   => array(
							'icon' => 'righthalf',
						),
						'3-cheavy'   => array(
							'icon' => 'centerhalf',
						),
						'3-cwide'    => array(
							'icon' => 'widecenter',
						),
						'3-firstrow' => array(
							'icon' => 'firstrow',
						),
						'3-lastrow'  => array(
							'icon' => 'lastrow',
						),
						'full'       => array(
							'icon' => 'collapserowthree',
						),
					),
					'2' => array(
						'2-equal'  => array(
							'icon' => 'twocol',
						),
						'2-lheavy' => array(
							'icon' => 'twoleftgolden',
						),
						'2-rheavy' => array(
							'icon' => 'tworightgolden',
						),
						'full'     => array(
							'icon' => 'collapserow',
						),
					),
					'1' => array(
						'full' => array(
							'icon' => 'row',
						),
					),
				),
				'responsive' => true,
			)
		);
		}

		/**
		 * Display sidebar as section.
		 *
		 * @param bool   $active ios active.
		 * @param object $section section.
		 * @return bool
		 */
		public function display_sidebar( $active, $section ) {
			if ( strpos( $section->id, 'footer-widget-' ) ) {
				$active = true;
			}
			return $active;
		}

		/**
		 * Register menus
		 */
		function register_menu_locations() {
			$menu_items                   = apply_filters(
				'kemet_footer_register_menu_items',
				array(
					'footer-menu'   => 'Footer Menu',
				)
			);
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
					'kemet_footer_widgets_1',
					array(
						'name'          => esc_html__( 'Footer Widget 1', 'kemet' ),
						'id'            => 'footer-widget-1',
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<div class="widget-head"><div class="title"><h4 class="widget-title">',
						'after_title'   => '</h4></div></div>',
					)
				)
			);

			register_sidebar(
				apply_filters(
					'kemet_footer_widgets_2',
					array(
						'name'          => esc_html__( 'Footer Widget 2', 'kemet' ),
						'id'            => 'footer-widget-2',
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget'  => '</div>',
						'before_title'  => '<div class="widget-head"><div class="title"><h4 class="widget-title">',
						'after_title'   => '</h4></div></div>',
					)
				)
			);
		}

		/**
		 * Function to get site Footer
		 */
		public function footer_markup() {
			get_template_part( 'templates/footer/footer-desktop-layout' );
		}

		/**
		 * Top Footer
		 */
		public function top_footer() {
			set_query_var( 'row', 'top' );
			get_template_part(
				'templates/footer/footer',
				'row',
				array(
					'row' => 'top',
				)
			);
		}

		/**
		 * Primary Footer
		 */
		public function main_footer() {
			set_query_var( 'row', 'main' );
			get_template_part(
				'templates/footer/footer',
				'row',
				array(
					'row' => 'main',
				)
			);
		}

		/**
		 * Bottom Footer
		 */
		public function bottom_footer() {
			set_query_var( 'row', 'bottom' );
			get_template_part(
				'templates/footer/footer',
				'row'
			);
		}
		
		/**
		 * Render Builder Colunm
		 *
		 * @param string $column column.
		 * @param string $row row.
		 */
		public function render_column($column, $row) {

			//if ( Kemet_Builder_Helper::column_has_items( $column, $row, 'footer', 'desktop' ) ) {
				self::render_column_content( $column, $row, 'footer', 'desktop' );
			//}
			echo "beforeeeeee";

		}

		/**
		 * Get Column Content
		 *
		 * @param string $column column.
		 * @param string $row row.
		 * @param string $builder builder type.
		 * @param string $device device.
		 */
		public static function render_column_content( $column, $row, $builder = 'footer', $device = 'desktop' ) {
			echo 'ppppppppppp ';
			$items = kemet_get_option( $builder . '-' . $device . '-items' );
			foreach ( $items as $item ) {
				// if ( false !== strpos( $item, 'html' ) || false !== strpos( $item, 'menu' ) || false !== strpos( $item, 'widget' ) || false !== strpos( $item, 'button' ) ) {
				 	//$type = (  explode( '-', str_replace( 'mobile-', '', $item ) )[1] : explode( '-', $item )[1];
				// 	get_template_part( 'templates/' . $builder . '/components/' . $type, 'type', array( 'type' => $item ) );
				// } else {
					get_template_part( 'templates/' . $builder . '/components/widget');
			//	}
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
			return $this->get_html( 'footer-html-1' );
		}

		/**
		 * Html 2
		 */
		public function render_html_2() {
			return $this->get_html( 'footer-html-2' );
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
			echo '<a href="' . esc_url( $url ) . '" class="button footer-button ' . esc_attr( $button ) . '" target="' . esc_attr( $target ) . '" ' . ( ! empty( $rel ) ? ' rel="' . esc_attr( implode( ' ', $rel ) ) . '"' : '' ) . ( $download ? ' download' : '' ) . '>' . esc_html( $text ) . '</a>';
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
	Kemet_Footer_Markup::get_instance();
endif;
