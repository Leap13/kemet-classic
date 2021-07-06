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
			// Footer Builder.
			add_action( 'kemet_footer_content', array( $this, 'footer_markup' ), 10 );

			add_action( 'kemet_top_footer', array( $this, 'top_footer' ), 10 );
			add_action( 'kemet_primary_footer', array( $this, 'primary_footer' ), 10 );
			add_action( 'kemet_bottom_footer', array( $this, 'bottom_footer' ), 10 );

			add_action( 'kemet_render_footer_column', array( $this, 'render_column' ), 10, 2 );


			add_action( 'kemet_footer_menu', array( $this, 'menu_markup' ), 10, 1 );
			add_action( 'kemet_footer_button', array( $this, 'button_markup' ) );
			add_action( 'kemet_footer_widget', array( $this, 'widget_markup' ), 10, 1 );
			add_action( 'widgets_init', array( $this, 'widgets_init' ) );
			add_action( 'kemet_footer_html', array( $this, 'render_html' ), 10, 1 );
			add_action( 'init', array( $this, 'register_menu_locations' ) );

			//add_filter( 'customize_section_active', array( $this, 'display_sidebar' ), 99, 2 );

			// Core Components.
			//add_action( 'astra_footer_copyright', array( $this, 'footer_copyright' ), 10 );

			// for ( $index = 1; $index <= Astra_Builder_Helper::$component_limit; $index++ ) {

			// 	// Buttons.
			// 	add_action( 'astra_footer_button_' . $index, array( $this, 'button_' . $index ) );
			// 	self::$methods[] = 'button_' . $index;

			// 	// Htmls.
			// 	add_action( 'astra_footer_html_' . $index, array( $this, 'footer_html_' . $index ) );
			// 	self::$methods[] = 'footer_html_' . $index;

			// 	// Social Icons.
			// 	add_action( 'astra_footer_social_' . $index, array( $this, 'footer_social_' . $index ) );
			// 	self::$methods[] = 'footer_social_' . $index;

			// }


			// Navigation menu.
			//add_action( 'kemet_footer_menu', array( $this, 'footer_menu' ) );
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
		public function primary_footer() {
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
			echo "beforeee";
			//if ( Kemet_Builder_Helper::column_has_items( $column, $row, 'footer', 'desktop' ) ) {
				self::render_column_content( $column, $row, 'footer', 'desktop' );
				echo "afteeeer";
			//}
		}

		
		/**
		 * Get Column Content
		 *
		 * @param string $column column.
		 * @param string $row row.
		 * @param string $builder builder type.
		 * @param string $device device.
		 */
		public static function render_column_contentt( $column, $row, $builder = 'footer', $device = 'desktop' ) {
			echo "fffffff";
			 $item = kemet_get_option( $builder . '-' . $device . '-items' );
			// if ( isset( $items ) && isset( $items[ $row ] ) && isset( $items[ $row ][ $row . '_' . $column ] ) && is_array( $items[ $row ][ $row . '_' . $column ] ) && ! empty( $items[ $row ][ $row . '_' . $column ] ) ) {
			// foreach ( $items as $item ) {
				// if ( false !== strpos( $item, 'html' ) || false !== strpos( $item, 'menu' ) || false !== strpos( $item, 'widget' ) || false !== strpos( $item, 'button' ) ) {
				// 	$type = ( false !== strpos( $item, 'mobile' ) && false !== strpos( $item, 'html' ) ) || ( false !== strpos( $item, 'mobile' ) && false !== strpos( $item, 'button' ) ) ? explode( '-', str_replace( 'mobile-', '', $item ) )[1] : explode( '-', $item )[1];
				// 	get_template_part( 'templates/' . $builder . '/components/' . $type, 'type', array( 'type' => $item ) );
				// } else {
					echo 'kkkkkkk';
					get_template_part( 'templates/' . $builder . '/components/' . $item );
				//}
		//	}
		//}
		}

		public static function render_column_content( $column, $row, $builder = 'footer', $device = 'desktop' ) {
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
		 * Widget
		 *
		 * @param string $widget widget type.
		 */
		public function widget_markup( $widget ) {
			Kemet_Builder_Helper::get_custom_widget( $widget );
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

	}

	/**
	 * Kicking this off by calling 'get_instance()' method
	 */
	Kemet_Footer_Markup::get_instance();
endif;
