<?php
/**
 * WooCommerce Compatibility File.
 *
 * @link https://woocommerce.com/
 *
 * @package Kemet
 */

// If plugin - 'WooCommerce' not exist then return.
if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

/**
 * Kemet WooCommerce Compatibility
 */
if ( ! class_exists( 'Kemet_Woocommerce' ) ) :

	/**
	 * Kemet WooCommerce Compatibility
	 *
	 * @since 1.0.0
	 */
	class Kemet_Woocommerce {


		/**
		 * Member Variable
		 *
		 * @var object instance
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
			 require_once KEMET_THEME_DIR . 'inc/compatibility/woocommerce/woocommerce-common-functions.php'; // phpcs:ignore: WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			$this->customizer_options_register();
			add_filter( 'woocommerce_enqueue_styles', array( $this, 'woo_filter_style' ) );

			add_filter( 'kemet_theme_defaults', array( $this, 'theme_defaults' ) );

			add_action( 'after_setup_theme', array( $this, 'setup_theme' ) );

			// Register Store Sidebars.
			add_action( 'widgets_init', array( $this, 'store_widgets_init' ), 15 );
			// Replace Store Sidebars.
			add_filter( 'kemet_get_sidebar', array( $this, 'replace_store_sidebar' ) );
			// Store Sidebar Layout.
			add_filter( 'kemet_layout', array( $this, 'store_sidebar_layout' ) );
			// Store Content Layout.
			add_filter( 'kemet_get_content_layout', array( $this, 'store_content_layout' ) );

			add_action( 'woocommerce_before_main_content', array( $this, 'before_main_content_start' ) );
			add_action( 'woocommerce_after_main_content', array( $this, 'before_main_content_end' ) );
			add_filter( 'wp_enqueue_scripts', array( $this, 'add_styles' ) );
			add_action( 'wp', array( $this, 'shop_customization' ), 5 );
			add_action( 'wp_head', array( $this, 'single_product_customization' ), 5 );
			add_action( 'wp', array( $this, 'woocommerce_init' ), 1 );
			add_action( 'init', array( $this, 'woocommerce_checkout' ) );
			add_action( 'wp', array( $this, 'shop_meta_option' ), 1 );
			add_action( 'wp', array( $this, 'cart_page_upselles' ) );
			add_filter( 'kemet_cart_in_menu_class', array( $this, 'hide_cart_if_empty' ) );

			add_filter( 'loop_shop_columns', array( $this, 'shop_columns' ) );
			add_filter( 'loop_shop_per_page', array( $this, 'shop_no_of_products' ) );
			add_filter( 'body_class', array( $this, 'shop_page_products_item_class' ) );
			add_filter( 'post_class', array( $this, 'single_product_class' ) );
			add_filter( 'woocommerce_product_get_rating_html', array( $this, 'rating_markup' ), 10, 3 );
			add_filter( 'woocommerce_output_related_products_args', array( $this, 'related_products_args' ) );

			// Add Cart icon in Menu.
			add_filter( 'kemet_header_cart', array( $this, 'woo_mini_cart_markup' ) );
			add_filter( 'header_desktop_items', array( $this, 'add_cart_header_item' ) );

			// Add Cart option in dropdown.
			add_filter( 'kemet_header_elements', array( $this, 'header_section_elements' ) );

			// Cart fragment.
			if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '2.3', '>=' ) ) {
				add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'cart_link_fragment' ) );
			} else {
				add_filter( 'add_to_cart_fragments', array( $this, 'cart_link_fragment' ) );
			}

			add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'product_flip_image' ), 10 );
			add_filter( 'woocommerce_subcategory_count_html', array( $this, 'subcategory_count_markup' ), 10, 2 );

			add_action( 'customize_register', array( $this, 'customize_register' ), 11 );

			add_filter( 'woocommerce_get_stock_html', 'kemet_woo_product_in_stock', 10, 2 );

			add_filter( 'woocommerce_output_related_products_args', array( $this, 'related_product_args' ) );

			add_filter( 'post_class', array( $this, 'product_classes' ) );

			add_filter( 'body_class', array( $this, 'shop_layout' ) );
			// Wishlist.
			add_filter( 'wp_nav_menu_items', array( $this, 'menu_wishlist_icon' ), 10, 2 );
			add_filter( 'yith_wcwl_product_already_in_wishlist_text_button', array( $this, 'kemet_added_to_wishlist' ) );
			add_action( 'kemet_woo_shop_add_to_cart_after', array( $this, 'kemet_get_wishlist' ) );
			add_filter( 'yith_wcwl_browse_wishlist_label', '__return_false' );
			add_filter( 'yith_wcwl_loop_positions', array( $this, 'kemet_wishlist_position' ) );
			add_filter( 'yith_wcwl_button_label', array( $this, 'add_to_wishlist_text' ) );
			add_filter( 'yith_wcwl_positions', array( $this, 'kemet_wishlist_position' ) );
			add_filter( 'yith_wcwl_positions', array( $this, 'kemet_wishlist_position' ) );
			add_filter( 'woocommerce_single_product_summary', array( $this, 'kemet_single_wishlist' ), 31 );
		}

		/**
		 * Customizer options default values
		 *
		 * @param object $defaults object of default values.
		 * @return object
		 */
		public function theme_defaults( $defaults ) {
			$defaults['woo-shop-product-structure']         = array(
				'category',
				'add_cart',
			);
			$defaults['woo-shop-no-of-products']            = array( 'value' => 12 );
			$defaults['woo-shop-product-content-alignment'] = 'center';
			$defaults['woo-shop-disable-breadcrumb']        = true;
			$defaults['woo-shop-grids']                     = array(
				'desktop' => '4',
				'tablet'  => '3',
				'mobile'  => '2',
			);
			$defaults['woo-shop-archive-width']             = 'default';
			$defaults['woo-shop-archive-max-width']         = array(
				'value' => 1200,
				'unit'  => 'px',
			);
			$defaults['woo-single-disable-breadcrumb']      = false;
			$defaults['shop-cart-icon']                     = 'icon-cart';
			$defaults['disable-cart-if-empty']              = false;
			$defaults['cart-icon-display']                  = 'icon-count';
			$defaults['cart-icon-size']                     = array(
				'value' => 20,
				'unit'  => 'px',
			);
			$defaults['cart-dropdown-width']                = array(
				'value' => 350,
				'unit'  => 'px',
			);
			$defaults['cart-dropdown-border-size']          = array(
				'value' => 1,
				'unit'  => 'px',
			);
			$defaults['enable-cart-upsells']                = false;
			$defaults['woocommerce-container-layout']       = 'plain-container';
			$defaults['woocommerce-sidebar-layout']         = 'no-sidebar';
			$defaults['single-product-sidebar-layout']      = 'no-sidebar';

			return $defaults;
		}

		/**
		 * Single Product wishlist position
		 *
		 * @param string $content product summary content.
		 * @return void
		 */
		public function kemet_single_wishlist( $content ) {
			global $product, $yith_wcwl;

			if ( isset( $yith_wcwl ) ) {
				$content .= do_shortcode( '[yith_wcwl_add_to_wishlist]' );
				printf( '%s', $content ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

		}

		/**
		 * Wishlist Position
		 *
		 * @param string $hooks wishlist type.
		 * @return string
		 */
		public function kemet_wishlist_position( $hooks ) {
			return 'shortcode';

		}

		/**
		 * Add to Wishlist Text
		 *
		 * @param string $text wishlist text.
		 * @return string
		 */
		public function add_to_wishlist_text( $text ) {
			$text = __( 'Wishlist', 'kemet' );
			return $text;
		}

		/**
		 * Wishlist button
		 *
		 * @return void
		 */
		public function kemet_get_wishlist() {

			if ( class_exists( 'YITH_WCWL' ) ) {
				if ( 'yes' == get_option( 'yith_wcwl_show_on_loop', 'no' ) ) {
					echo '<div class="woo-wishlist-btn button">' . do_shortcode( '[yith_wcwl_add_to_wishlist]' ) . '</div>';
				}
			}
		}

		/**
		 * Wishlist button text
		 *
		 * @param string $default wishlist added text.
		 * @return string
		 */
		public function kemet_added_to_wishlist( $default ) {
			$default = __( 'Added', 'kemet' );
			return $default;
		}

			/**
			 * Adds wishlist icon to menu
			 *
			 * @param mixed $items header items.
			 * @param array $args header items args.
			 * @return mixed
			 */
		public function menu_wishlist_icon( $items, $args ) {
			$wishlist_in_header = kemet_get_option( 'wishlist-in-header' );

			if ( class_exists( 'YITH_WCWL' ) && $wishlist_in_header && ( 'primary-menu' == $args->theme_location || 'secondary-menu' == $args->theme_location ) ) {
				// get wishlist url.
				$wishlist_url = YITH_WCWL()->get_wishlist_url();
				// Add wishlist link to menu items.
				$item  = '<li class="woo-wishlist-link">';
				$item .= '<a href="' . esc_url( $wishlist_url ) . '" class="kmt-wishlist">';
				$item .= '<i class="fa fa-heart-o"></i>';
				$item .= '<span class="kmt-wishlist-text">' . YITH_WCWL()->count_products() . '</span>';
				$item .= '</a>';
				$item .= '</li>';

				$items .= $item;
			}

			// Return menu items.
			return $items;
		}

		/**
		 * Rating Markup
		 *
		 * @param  string $html  Rating Markup.
		 * @param  float  $rating Rating being shown.
		 * @param  int    $count  Total number of ratings.
		 * @return string
		 */
		public function rating_markup( $html, $rating, $count ) {
			if ( 0 == $rating ) {
				$html  = '<div class="star-rating">';
				$html .= wc_get_star_rating_html( $rating, $count );
				$html .= '</div>';
			}
			return $html;
		}

		/**
		 * Cart Page Upselles products.
		 *
		 * @return void
		 */
		public function cart_page_upselles() {
			$upselles_enabled = kemet_get_option( 'enable-cart-upsells' );
			if ( ! $upselles_enabled ) {
				remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
			}
		}

		/**
		 * Subcategory Count Markup
		 *
		 * @param  array $styles  Css files.
		 *
		 * @return array
		 */
		public function woo_filter_style( $styles ) {
			/* Directory and Extension */
			$file_prefix = ( SCRIPT_DEBUG ) ? '' : '.min';
			$dir_name    = ( SCRIPT_DEBUG ) ? 'unminified' : 'minified';

			$css_uri = KEMET_THEME_URI . 'assets/css/' . $dir_name . '/compatibility/woocommerce/';
			$key     = 'kemet-woocommerce';

			// Register & Enqueue Styles.
			// Generate CSS URL.
			$css_file = $css_uri . '' . $file_prefix . '.css';

			$styles = array(
				'woocommerce-layout'      => array(
					'src'     => $css_uri . 'woocommerce-layout' . $file_prefix . '.css',
					'deps'    => '',
					'version' => KEMET_THEME_VERSION,
					'media'   => 'all',
					'has_rtl' => true,
				),
				'woocommerce-smallscreen' => array(
					'src'     => $css_uri . 'woocommerce-smallscreen' . $file_prefix . '.css',
					'deps'    => 'woocommerce-layout',
					'version' => KEMET_THEME_VERSION,
					'media'   => 'only screen and (max-width: ' . apply_filters( 'woocommerce_style_smallscreen_breakpoint', '768px' ) . ')',
					'has_rtl' => true,
				),
				'woocommerce-general'     => array(
					'src'     => $css_uri . 'woocommerce' . $file_prefix . '.css',
					'deps'    => '',
					'version' => KEMET_THEME_VERSION,
					'media'   => 'all',
					'has_rtl' => true,
				),
			);

			return $styles;
		}

		/**
		 * Subcategory Count Markup
		 *
		 * @param  mixed  $content  Count Markup.
		 * @param  object $category Object of Category.
		 * @return mixed
		 */
		public function subcategory_count_markup( $content, $category ) {
			$content = sprintf( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					/* translators: 1: number of products */
				_nx( '%1$s Product', '%1$s Products', $category->count, 'product categories', 'kemet' ),
				number_format_i18n( $category->count )
			);

			return '<mark class="count">' . $content . '</mark>';
		}

		/**
		 * Product Flip Image
		 */
		public function product_flip_image() {
			global $product;

			$hover_style = kemet_get_option( 'woo-shop-hover-style' );

			if ( 'swap' === $hover_style ) {
				$attachment_ids = $product->get_gallery_image_ids();

				if ( $attachment_ids ) {
					$image_size = apply_filters( 'single_product_archive_thumbnail_size', 'shop_catalog' );

					echo apply_filters( 'kemet_woocommerce_product_flip_image', wp_get_attachment_image( reset( $attachment_ids ), $image_size, false, array( 'class' => 'show-on-hover' ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				}
			}
		}

		/**
		 * Update Shop page grid
		 *
		 * @param  int $col Shop Column.
		 * @return int
		 */
		public function shop_columns( $col ) {
			$col = kemet_get_option( 'woo-shop-grids' );
			return $col['desktop'];
		}

		/**
		 * Update Shop page grid
		 *
		 * @return int
		 */
		public function shop_no_of_products() {
			$products = kemet_get_option( 'woo-shop-no-of-products' );
			$products = kemet_slider( $products );

			return $products;
		}

		/**
		 * Add products item class on shop page
		 *
		 * @param Array $classes product classes.
		 *
		 * @return array.
		 */
		public function shop_page_products_item_class( $classes = '' ) {
			if ( is_shop() || is_product_taxonomy() || is_cart() ) {
				$shop_grid = kemet_get_option( 'woo-shop-grids' );
				$classes[] = 'columns-' . $shop_grid['desktop'];
				$classes[] = 'tablet-columns-' . $shop_grid['tablet'];
				$classes[] = 'mobile-columns-' . $shop_grid['mobile'];

				$classes[] = 'kmt-woo-shop-archive';
			}
			$classes[] = 'shop-grid';

			return $classes;
		}

		/**
		 * Add class on single product page
		 *
		 * @param Array $classes product classes.
		 *
		 * @return array.
		 */
		public function single_product_class( $classes ) {
			if ( is_product() && 0 == get_post_meta( get_the_ID(), '_wc_review_count', true ) ) {
				$classes[] = 'kmt-woo-product-no-review';
			}

			if ( is_shop() || is_product_taxonomy() ) {
				$hover_style = kemet_get_option( 'woo-shop-hover-style' );

				if ( '' !== $hover_style ) {
					$classes[] = 'kemet-woo-hover-' . $hover_style;
				}
			}

			return $classes;
		}

		/**
		 * Update woocommerce related product numbers
		 *
		 * @param  array $args Related products array.
		 * @return array
		 */
		public function related_products_args( $args ) {
			$col                    = kemet_get_option( 'woo-shop-grids' );
			$args['posts_per_page'] = $col['desktop'];
			return $args;
		}

		/**
		 * Setup theme
		 *
		 * @since 1.0.0
		 */
		public function setup_theme() {
			// WooCommerce.
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
		}

		/**
		 * Store widgets init.
		 */
		public function store_widgets_init() {
			register_sidebar(
				array(
					'name'          => esc_html__( 'WooCommerce Sidebar', 'kemet' ),
					'id'            => 'kemet-woo-shop-sidebar',
					'description'   => __( 'This sidebar will be used on Product archive, Cart, Checkout and My Account pages.', 'kemet' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="widget-head"><div class="title"><h4 class="widget-title">',
					'after_title'   => '</h4></div></div>',
				)
			);
			register_sidebar(
				array(
					'name'          => esc_html__( 'Product Sidebar', 'kemet' ),
					'id'            => 'kemet-woo-single-sidebar',
					'description'   => __( 'This sidebar will be used on Single Product page.', 'kemet' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="widget-head"><div class="title"><h4 class="widget-title">',
					'after_title'   => '</h4></div></div>',
				)
			);
		}

		/**
		 * Assign shop sidebar for store page.
		 *
		 * @param String $sidebar Sidebar.
		 *
		 * @return String $sidebar Sidebar.
		 */
		public function replace_store_sidebar( $sidebar ) {
			if ( is_shop() || is_product_taxonomy() || is_checkout() || is_cart() || is_account_page() ) {
				$sidebar = 'kemet-woo-shop-sidebar';
			} elseif ( is_product() ) {
				$sidebar = 'kemet-woo-single-sidebar';
			}

			return $sidebar;
		}

		/**
		 * WooCommerce Container
		 *
		 * @param String $sidebar_layout Layout type.
		 *
		 * @return String $sidebar_layout Layout type.
		 */
		public function store_sidebar_layout( $sidebar_layout ) {
			if ( is_shop() || is_product_taxonomy() || is_checkout() || is_cart() || is_account_page() ) {
				$woo_sidebar  = kemet_get_option( 'woocommerce-sidebar-layout' );
				$shop_sidebar = '';
				if ( 'default' !== $woo_sidebar ) {
					$sidebar_layout = $woo_sidebar;
				}

				if ( is_shop() ) {
					$shop_page_id = get_option( 'woocommerce_shop_page_id' );
					$meta         = get_post_meta( $shop_page_id, 'kemet_page_options', true );
					$shop_sidebar = ( isset( $meta['site-sidebar-layout'] ) && $meta['site-sidebar-layout'] ) ? $meta['site-sidebar-layout'] : 'default';
				} elseif ( is_product_taxonomy() ) {
					$shop_sidebar = 'default';
				} else {
					if ( class_exists( 'KFW' ) ) {
						$meta         = get_post_meta( get_the_ID(), 'kemet_page_options', true );
						$shop_sidebar = ( isset( $meta['site-sidebar-layout'] ) && $meta['site-sidebar-layout'] ) ? $meta['site-sidebar-layout'] : 'default';
					}
				}

				if ( 'default' !== $shop_sidebar && ! empty( $shop_sidebar ) ) {
					$sidebar_layout = $shop_sidebar;
				}
			}

			return $sidebar_layout;
		}
		/**
		 * WooCommerce Container
		 *
		 * @param String $layout Layout type.
		 *
		 * @return String $layout Layout type.
		 */
		public function store_content_layout( $layout ) {
			if ( is_woocommerce() || is_checkout() || is_cart() || is_account_page() ) {
				$woo_layout  = kemet_get_option( 'woocommerce-content-layout' );
				$shop_layout = 'default';

				if ( 'default' !== $woo_layout ) {
					$layout = $woo_layout;
				}

				if ( is_shop() ) {
					$shop_page_id = get_option( 'woocommerce_shop_page_id' );
					$shop_layout  = get_post_meta( $shop_page_id, 'site-content-layout', true );
				} elseif ( is_product_taxonomy() ) {
					$shop_layout = 'default';
				} elseif ( class_exists( 'KFW' ) ) {
					$meta        = get_post_meta( get_the_ID(), 'kemet_page_options', true );
					$shop_layout = ( isset( $meta['site-content-layout'] ) && $meta['site-content-layout'] ) ? $meta['site-content-layout'] : 'default';
				}

				if ( 'default' !== $shop_layout && ! empty( $shop_layout ) ) {
					$layout = $shop_layout;
				}
			}

			return $layout;
		}

		/**
		 * Shop Page Meta
		 *
		 * @return void
		 */
		public function shop_meta_option() {
			// Page Title.
			if ( is_shop() ) {
				$shop_page_id        = get_option( 'woocommerce_shop_page_id' );
				$shop_title          = get_post_meta( $shop_page_id, 'site-post-title', true );
				$main_header_display = get_post_meta( $shop_page_id, 'kmt-main-header-display', true );
				$footer_layout       = get_post_meta( $shop_page_id, 'copyright-footer-layout', true );

				if ( 'disabled' === $shop_title ) {
					add_filter( 'woocommerce_show_page_title', '__return_false' );
				}

				if ( 'disabled' === $main_header_display ) {
					remove_action( 'kemet_sitehead', 'kemet_sitehead_primary_template' );
				}

				if ( 'disabled' === $footer_layout ) {
					remove_action( 'kemet_footer_content', 'kemet_footer_copyright_footer_template', 5 );
				}
			}
		}

		/**
		 * Shop customization.
		 *
		 * @return void
		 */
		public function shop_customization() {
			if ( ! apply_filters( 'kemet_woo_shop_product_structure_override', false ) ) {
				add_action( 'woocommerce_before_shop_loop_item', 'kemet_woo_shop_thumbnail_wrap_start', 6 );
				/**
				 * Add sale flash before shop loop.
				 */
				add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_show_product_loop_sale_flash', 9 );

				add_action( 'woocommerce_after_shop_loop_item', 'kemet_woo_shop_thumbnail_wrap_end', 8 );
				/**
				 * Add Out of Stock to the Shop page
				 */
				add_action( 'woocommerce_shop_loop_item_title', 'kemet_woo_shop_out_of_stock', 8 );

				remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

				/**
				 * Shop Page Product Content Sorting
				 */
				add_action( 'woocommerce_after_shop_loop_item', 'kemet_woo_woocommerce_shop_product_content', 2 );
			}
		}

		/**
		 * Checkout customization.
		 *
		 * @return void
		 */
		public function woocommerce_checkout() {
			if ( ! apply_filters( 'kemet_woo_shop_product_structure_override', false ) ) {

				/**
				 * Checkout Page
				 */
				add_action( 'woocommerce_checkout_billing', array( WC()->checkout(), 'checkout_form_shipping' ) );
			}

			// Checkout Page.
			remove_action( 'woocommerce_checkout_shipping', array( WC()->checkout(), 'checkout_form_shipping' ) );
		}

		/**
		 * Single product customization.
		 *
		 * @return void
		 */
		public function single_product_customization() {
			if ( ! is_product() ) {
				return;
			}

			add_filter( 'woocommerce_product_description_heading', '__return_false' );
			add_filter( 'woocommerce_product_additional_information_heading', '__return_false' );

			// Breadcrumb.

			if ( kemet_get_option( 'woo-single-disable-breadcrumb' ) && is_product() ) {
				remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
			}
		}

		/**
		 * Remove Woo-Commerce Default actions
		 */
		public function woocommerce_init() {
			remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
			remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
			remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
			remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
			remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
			remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
			remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
			remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
			remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

			// Breadcrumb.
			if ( kemet_get_option( 'woo-shop-disable-breadcrumb' ) && ( is_shop() || is_product_taxonomy() ) ) {
				remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
			}
			/**
			 * Disable Related Products.
			 */
			$disable_related_products = kemet_get_option( 'woo-single-disable-related-products' );

			if ( $disable_related_products ) {
				remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
			}

			/**
			 * Disable Up-Sells Products.
			 */
			$disable_up_sells_products = kemet_get_option( 'woo-single-disable-up-sells-products' );

			if ( ! $disable_up_sells_products ) {
				remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
				add_action( 'woocommerce_after_single_product_summary', array( $this, 'up_sell_product' ), 15 );
			} else {
				remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
			}

			/**
			 * Enable Single Product Nav Links
			 */
			$enable_nav_links = kemet_get_option( 'woo-single-enable-navigation' );
			if ( $enable_nav_links ) {
				add_action( 'woocommerce_single_product_summary', array( $this, 'product_nav_links' ), 1, 0 );
			}

			/**
			 * Sale badge content
			 */
			$sale_content = kemet_get_option( 'sale-content' );

			if ( 'percent' == $sale_content ) {
				add_filter( 'woocommerce_sale_flash', array( $this, 'kemet_sale_flash_content' ), 10, 3 );
			}

		}

		/**
		 * Single product next and previous links
		 *
		 * @return void
		 */
		public function product_nav_links() {
			if ( ! is_product() ) {
				return;
			}
			?>
			<div class="kmt-product-navigation">
				<div class="kmt-product-links">
					<?php
						previous_post_link( '%link', '<span class="prev"></span>' );
						next_post_link( '%link', '<span class="next"></span>' );
					?>
				</div>
			</div>
			<?php
		}

		/**
		 * Up-sell product arguments
		 *
		 * @return void
		 */
		public function up_sell_product() {

			// up-sell posts per page.
			$products_per_page = kemet_get_option( 'woo-single-up-sell-products-count' );
			$products_per_page = $products_per_page ? kemet_slider( $products_per_page ) : '3';

			// up-sell columns.
			$columns = kemet_get_option( 'woo-single-up-sell-products-columns' );
			$columns = $columns ? kemet_slider( $columns ) : '4';

			woocommerce_upsell_display( $products_per_page, $columns );
		}

		/**
		 * Product Classes
		 *
		 * @param array $classes single post classes.
		 * @return array
		 */
		public function product_classes( $classes ) {
			$gallay_style = kemet_get_option( 'woo-single-gallery-style' );

			if ( post_type_exists( 'product' ) && is_product() && 'product' == get_post_type() ) {
				$product        = wc_get_product();
				$attachment_ids = $product->get_gallery_image_ids( 'view' );
				if ( count( $attachment_ids ) > 1 ) {
					$classes[] = 'kmt-product-has-v-gallary';
				}
				$classes[] = 'kmt-gallary-' . $gallay_style;
			}

			return $classes;
		}

		/**
		 * Sale badge content
		 *
		 * @return string
		 */
		public function kemet_sale_flash_content() {
			global $product;

			if ( $product->is_type( 'simple' ) || $product->is_type( 'external' ) ) {
				$product_price = $product->get_regular_price();
				$sale_price    = $product->get_sale_price();
				$percent       = round( ( ( floatval( $product_price ) - floatval( $sale_price ) ) / floatval( $product_price ) ) * 100 );
			} elseif ( $product->is_type( 'variable' ) ) {
				$available_variations = $product->get_available_variations();
				$maximumper           = 0;
				$counter              = count( $available_variations );
				for ( $i = 0; $i < $counter; ++$i ) {
					$variation_id     = $available_variations[ $i ]['variation_id'];
					$variable_product = new WC_Product_Variation( $variation_id );

					if ( ! $variable_product->is_on_sale() ) {
						continue;
					}

					$product_price = $variable_product->get_regular_price();
					$sale_price    = $variable_product->get_sale_price();
					$percent       = round( ( ( floatval( $product_price ) - floatval( $sale_price ) ) / floatval( $product_price ) ) * 100 );

					if ( $percent > $maximumper ) {
						$maximumper = $percent;
					}
				}

				$percent = sprintf( esc_html( '%s' ), $maximumper );
			} else {
				$percent = '<span class="onsale">' . esc_html__( 'Sale!', 'kemet' ) . '</span>';
				return $percent;
			}

			$value = '-' . esc_html( $percent ) . '%';

			return '<span class="onsale">' . esc_html( $value ) . '</span>';
		}

		/**
		 * Related product arguments
		 *
		 * @return array
		 */
		public function related_product_args() {
			global $product, $orderby, $related;

			// Related posts per page.
			$products_per_page = kemet_get_option( 'woo-single-related-products-count' );
			$products_per_page = $products_per_page ? kemet_slider( $products_per_page ) : '3';

			// Related columns.
			$columns = kemet_get_option( 'woo-single-related-products-columns' );
			$columns = $columns ? kemet_slider( $columns ) : '3';

			$args = array(
				'posts_per_page' => $products_per_page,
				'columns'        => $columns,
			);

			return $args;
		}

		/**
		 * Shop Layout
		 *
		 * @param array $classes body classes.
		 * @return array
		 */
		public function shop_layout( $classes ) {
			$content_alignment = kemet_get_option( 'woo-shop-product-content-alignment' );
			$classes[]         = 'content-align-' . $content_alignment;
			return $classes;
		}

		/**
		 * Add start of wrapper
		 */
		public function before_main_content_start() {
			$site_sidebar = kemet_layout();
			if ( 'left-sidebar' == $site_sidebar ) {
				get_sidebar();
			}
			?>
			<div id="primary" class="content-area primary">

				<?php kemet_primary_content_top(); ?>

				<main id="main" class="site-main" role="main">
					<div class="kmt-woocommerce-container">
			<?php
		}

		/**
		 * Add end of wrapper
		 */
		public function before_main_content_end() {
			?>
					</div> <!-- .kmt-woocommerce-container -->
				</main> <!-- #main -->

				<?php kemet_primary_content_bottom(); ?>

			</div> <!-- #primary -->
			<?php
			$site_sidebar = kemet_layout();
			if ( 'right-sidebar' == $site_sidebar ) {
				get_sidebar();
			}
		}

		/**
		 * Enqueue styles
		 *
		 * @since 1.0.0
		 */
		public function add_styles() {
			/* Directory and Extension */
			$file_prefix = ( SCRIPT_DEBUG ) ? '' : '.min';
			$dir_name    = ( SCRIPT_DEBUG ) ? 'unminified' : 'minified';

			$css_uri = KEMET_THEME_URI . 'assets/css/' . $dir_name . '/';

			$new_style = 'compatibility/woocommerce-new';
			$new_key   = 'kemet-woocommerce-new';

			// Register & Enqueue Styles.
			// Generate CSS URL.
			$new_css_file = $css_uri . $new_style . $file_prefix . '.css';

			/**
			 * - Variable Declaration
			 */
			$theme_color                  = kemet_get_sub_option( 'theme-color', 'initial' );
			$headings_links_color         = kemet_get_sub_option( 'headings-links-color', 'initial' );
			$text_meta_color              = kemet_get_sub_option( 'text-meta-color', 'initial' );
			$global_border_color          = kemet_get_sub_option( 'global-border-color', 'initial' );
			$global_bg_color              = kemet_get_sub_option( 'global-background-color', 'initial' );
			$global_footer_bg_color       = kemet_get_sub_option( 'global-footer-bg-color', 'initial' );
			$global_footer_text_color     = kemet_get_sub_option( 'global-footer-text-color', 'initial' );
			$kemet_footer_widget_bg_color = kemet_get_sub_option( 'footer-wgt-bg-color', 'initial' );

			$site_content_width         = kemet_get_option( 'site-content-width' );
			$woo_shop_archive_width     = kemet_get_option( 'shop-archive-width' );
			$woo_shop_archive_max_width = kemet_get_option( 'shop-archive-max-width' );
			$product_title_font_color   = kemet_get_sub_option( 'woo-shop-product-title-color', 'initial' );
			$product_content_font_color = kemet_get_sub_option( 'woo-shop-product-content-color', 'initial' );
			$product_price_font_color   = kemet_get_sub_option( 'woo-shop-product-price-color', 'initial' );
			$rating_color               = kemet_get_sub_option( 'rating-color', 'initial', $theme_color );
			$product_rating_font_size   = kemet_get_option( 'woo-shop-product-rating-font-size' );
			$product_rating_spacing     = kemet_get_option( 'woo-shop-product-rating-spacing' );
			$product_title_spacing      = kemet_get_option( 'woo-shop-product-title-spacing' );
			$product_price_spacing      = kemet_get_option( 'woo-shop-product-price-spacing' );

			// General.
			$cart_dropdown_width         = kemet_get_option( 'cart-dropdown-width' );
			$cart_icon_size              = kemet_get_option( 'cart-icon-size' );
			$cart_icon_center_vertically = kemet_get_option( 'cart-icon-center-vertically' );
			$cart_dropdown_border_size   = kemet_get_option( 'cart-dropdown-border-size' );
			$cart_dropdown_border_color  = kemet_get_sub_option( 'cart-dropdown-border-color', 'initial', $global_border_color );
			$cart_dropdown_bg_color      = kemet_get_sub_option( 'cart-dropdown-bg-color', 'initial', $global_bg_color );
			// Widget Separator.
			$widget_list_border       = kemet_get_option( 'enable-widget-list-separator' );
			$widget_list_border_color = kemet_get_sub_option( 'widget-list-border-color', 'initial', $global_border_color );
			// Single Product.
			$image_width = ! empty( kemet_get_option( 'woo-single-image-width' ) ) ? kemet_get_option( 'woo-single-image-width' ) : array(
				'value' => 50,
				'unit'  => '%',
			);

			// sale
			$sale_color    = kemet_get_sub_option( 'sale-text-color', 'initial' );
			$sale_bg_color = kemet_get_sub_option( 'sale-background-color', 'initial' );

			$css_output = array(
				'.woocommerce .product .onsale , .product .onsale' => array(
					'--buttonColor'           => esc_attr( $sale_color ),
					'--buttonBackgroundColor' => esc_attr( $sale_bg_color ),
				),
				'.woocommerce #content .kmt-woocommerce-container div.product div.images,.woocommerce .kmt-woocommerce-container div.product div.images' => array(
					'width'     => kemet_slider( $image_width ),
					'max-width' => kemet_slider( $image_width ),
				),
				'.woocommerce #content .kmt-woocommerce-container div.product div.summary,.woocommerce .kmt-woocommerce-container div.product div.summary' => array(
					'width'     => kemet_get_css_value( ( 100 - $image_width['value'] ) - 3, '%' ),
					'max-width' => kemet_get_css_value( ( 100 - $image_width['value'] ) - 3, '%' ),
				),
				'.woocommerce .woocommerce-message .button ,.woocommerce-info .button, .woocommerce-info a' => array(
					'color' => 'var(--headingLinksColor)',
				),
				'ul.product_list_widget li ins .amount , ul.product_list_widget li > .amount' => array(
					'color' => 'var(--themeColor)',
				),
				'.woocommerce ul.product_list_widget li img , ul.product_list_widget li img' => array(
					'border-color' => 'var(--borderColor)',
				),
				'.kmt-site-header-cart .widget_shopping_cart .product_list_widget li, .kmt-site-header-cart .widget_shopping_cart .total' => array(
					'border-color' => 'var(--borderColor)',
				),
				'.kmt-site-header-cart .widget_shopping_cart' => array(
					'border-color'     => 'var(--borderColor)',
					'width'            => kemet_slider( $cart_dropdown_width ),
					'background-color' => esc_attr( $cart_dropdown_bg_color ),
					'border-width'     => kemet_slider( $cart_dropdown_border_size ),
					'--borderColor'    => esc_attr( $cart_dropdown_border_color ),
				),
				'.kmt-cart-menu-wrap .count.icon-cart:before , .kmt-cart-menu-wrap .count.icon-bag:before' => array(
					'--fontSize' => kemet_slider( $cart_icon_size ),
					'font-size'  => 'var(--fontSize)',
					'top'        => kemet_slider( $cart_icon_center_vertically ),
				),
				'.shop-list ul.products li.product .kemet-shop-thumbnail-wrap .kemet-shop-summary-wrap .woo-wishlist-btn' => array(
					'border-color' => 'var(--borderColor)',
				),
				'.woocommerce div.product form.cart .variations' => array(
					'border-bottom-color' => 'var(--borderColor)',
				),
				'.woocommerce div.product form.cart .group_table td' => array(
					'border-color' => 'var(--borderColor)',
				),
				'.woocommerce div.product .product_meta' => array(
					'border-color' => 'var(--borderColor)',
				),
				'.kmt-site-header-cart .widget_shopping_cart:before, .kmt-site-header-cart .widget_shopping_cart:after' => array(
					'border-bottom-color' => esc_attr( $cart_dropdown_bg_color ),
				),
				'.woocommerce span.onsale'               => array(
					'background-color' => 'var(--buttonBackgroundColor)',
					'color'            => 'var(--buttonColor)',
				),
				'.woocommerce table.shop_table thead, .woocommerce-page table.shop_table thead , table.shop_table tr:nth-child(even) , table.shop_table thead tr' => array(
					'background-color' => esc_attr( kemet_color_brightness( $global_bg_color, 0.94, 'dark' ) ),
				),
				'.kmt-separate-container.woocommerce .product ,.kmt-separate-container.woocommerce li.product .kemet-shop-thumbnail-wrap .kemet-shop-summary-wrap' => array(
					'background-color' => esc_attr( kemet_color_brightness( $global_bg_color, 0.97, 'dark' ) ),
					'border-color'     => 'var(--borderColor)',
				),
				'.woocommerce table.shop_table td, .woocommerce-page table.shop_table td , .woocommerce table.shop_table, .woocommerce-page table.shop_table , .woocommerce-cart .cart-collaterals .cross-sells , .woocommerce-cart .cart-collaterals .cart_totals>h2, .woocommerce-cart .cart-collaterals .cross-sells>h2' => array(
					'border-color' => 'var(--borderColor)',
				),
				'.woocommerce-tabs .entry-content'       => array(
					'border-color' => 'var(--borderColor)',
				),
				'.woocommerce .woocommerce-message ,.woocommerce .woocommerce-error ,.woocommerce .woocommerce-info' => array(
					'border-color' => 'var(--borderColor)',
				),
				'.order-total'                           => array(
					'color' => 'var(--themeColor)',
				),
				'.woocommerce .woocommerce-message .button' => array(
					'color' => 'var(--headingLinksColor)',
				),
				'.woocommerce .woocommerce-message .button:hover' => array(
					'color' => 'var(--themeColor)',
				),
				'.woocommerce div.product .woocommerce-tabs ul.tabs li.active a , .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover' => array(
					'background-color' => 'var(--globalBackgroundColor)',
					'color'            => 'var(--themeColor)',
					'border-color'     => 'var(--borderColor)',
				),
				'.woocommerce div.product .woocommerce-tabs ul.tabs li a' => array(
					'background-color' => 'var(--globalBackgroundColor)',
					'color'            => 'var(--textColor)',
					'border-color'     => 'var(--borderColor)',
				),
				'.woocommerce li.product .kemet-shop-thumbnail-wrap .kemet-shop-summary-wrap ,.woocommerce li.product .kemet-shop-thumbnail-wrap .product-list-details' => array(
					'background-color' => 'var(--globalBackgroundColor)',
				),
				// '.woocommerce-js .yith-woocompare-widget a.compare' => array(
				// 'color'            => esc_attr( $btn_color ),
				// 'background-color' => esc_attr( $btn_bg_color ),
				// 'border'           => 'solid',
				// 'border-color'     => esc_attr( $btn_border_color ),
				// 'border-width'     => kemet_get_css_value( $btn_border_size, 'px' ),
				// 'border-radius'    => kemet_responsive_slider( $btn_border_radius, 'desktop' ),
				// 'padding'      => kemet_responsive_spacing( $btn_padding, 'all', 'desktop' ),
				// ),
				'.single-product div.product .entry-summary .yith-wcwl-add-to-wishlist .yith-wcwl-icon, .single-product div.product .entry-summary .compare:before' => array(
					'background-color' => esc_attr( kemet_color_brightness( $global_bg_color, 0.97, 'dark' ) ),
				),
				'.single-product div.product .entry-summary .compare' => array(
					'border' => 'none',
				),
				'.added_to_cart'                         => array(
					'background-color'    => 'var(--buttonBackgroundColor)',
					'--headingLinksColor' => 'var(--buttonColor)',
				),
				'.shop-grid .added_to_cart'              => array(
					'--headingLinksColor' => 'var(--textColor)',
				),
				'.added_to_cart:hover, .added_to_cart:focus' => array(
					'background-color'  => 'var(--buttonBackgroundHoverColor)',
					'--linksHoverColor' => 'var(--buttonHoverColor, var(--buttonColor))',
				),
				'.shop-grid ul.products li.product .button , .shop-grid ul.products li.product .added_to_cart' => array(
					'color' => 'var(--headingLinksColor)',
				),
				'.shop-grid ul.products li.product .button:hover , .woocommerce-info .button:hover, .woocommerce-info a:hover, .shop-grid ul.products li.product .added_to_cart:hover' => array(
					'color' => 'var(--themeColor)',
				),
				'.single-product .product a.compare.button, .woocommerce .widget_shopping_cart a:not(.button)' => array(
					'color' => 'var(--headingLinksColor)',
				),
				'.widget_shopping_cart'                  => array(
					'color' => 'var(--textColor)',
				),
				'.kemet-footer .widget_shopping_cart'    => array(
					'color' => 'var(--footerTextColor)',
				),
				'.single-product .product a.compare.button:hover, .woocommerce .widget_shopping_cart a:not(.button):hover' => array(
					'color' => 'var(--themeColor)',
				),
				'.shop-grid ul.products li.product .kemet-shop-thumbnail-wrap , .shop-grid ul.products li.product .kemet-shop-thumbnail-wrap .kemet-shop-summary-wrap>* , .shop-grid ul.products li.product .kemet-shop-thumbnail-wrap .kemet-shop-summary-wrap' => array(
					'border-color' => 'var(--borderColor)',
				),
				'.woocommerce .woocommerce-message,.woocommerce .woocommerce-info' => array(
					'border-top-color' => 'var(--borderColor)',
				),
				'.woocommerce-message::before,.woocommerce-info::before' => array(
					'color' => 'var(--headingLinksColor)',
				),
				'.woocommerce div.product p.price, .woocommerce div.product span.price, .widget_layered_nav_filters ul li.chosen a, .woocommerce-page ul.products li.product .kmt-woo-product-category, .wc-layered-nav-rating a' => array(
					'color' => 'var(--textColor)',
				),
				// Form Fields, Pagination border Color.
				'.woocommerce nav.woocommerce-pagination ul,.woocommerce nav.woocommerce-pagination ul li' => array(
					'border-color' => 'var(--borderColor)',
				),
				'.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current' => array(
					'background-color' => 'var(--buttonBackgroundColor)',
					'color'            => 'var(--buttonColor)',
				),
				'.woocommerce-MyAccount-navigation-link.is-active a, .woocommerce ul.products li.product .price' => array(
					'color' => 'var(--themeColor)',
				),
				'.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle' => array(
					'background-color' => 'var(--themeColor)',
				),
				// Button Typography.
				'.woocommerce .star-rating, .woocommerce .comment-form-rating .stars a, .woocommerce .star-rating::before , .product_list_widget .star-rating' => array(
					'color' => esc_attr( $rating_color ),
				),
				'.woocommerce .widget .amount, .woocommerce .widget ins , ul.product_list_widget .amount, ul.product_list_widget ins' => array(
					'color' => 'var(--themeColor)',
				),
				'.woocommerce div.product .woocommerce-tabs ul.tabs li.active:before' => array(
					'background' => 'var(--headingLinksColor)',
				),

				/**
				 * Cart in menu
				 */
				'.kmt-site-header-cart .widget_shopping_cart .total .woocommerce-Price-amount' => array(
					'color' => 'var(--headingLinksColor)',
				),
				'.woocommerce a.remove, .woocommerce-page a.remove' => array(
					'color'        => 'var(--headingLinksColor)',
					'border-color' => 'var(--borderColor)',
				),
				'.woocommerce a.remove:hover, .woocommerce-page a.remove:hover' => array(
					'color'        => 'var(--themeColor)',
					'border-color' => esc_attr( kemet_color_brightness( $global_border_color, 0.9, 'dark' ) ),
				),
				'.woocommerce .kemet-footer a.remove, .woocommerce-page .kemet-footer a.remove' => array(
					'border-color' => esc_attr( kemet_color_brightness( $global_footer_bg_color, 0.9, 'light' ) ),
				),
				'.woocommerce .kemet-footer a.remove:hover, .woocommerce-page .kemet-footer a.remove:hover' => array(
					'border-color' => esc_attr( kemet_color_brightness( $global_footer_bg_color, 0.8, 'light' ) ),
				),
				'.woocommerce .widget .amount, .woocommerce .widget ins' => array(
					'color' => 'var(--themeColor)',
				),
				'.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title, ul.products li.product .woocommerce-loop-product__title' => array(
					'--headingLinksColor' => esc_attr( $product_title_font_color ),
					'margin'              => kemet_responsive_spacing( $product_title_spacing, 'all', 'desktop' ),
				),
				'.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,.woocommerce ul.products li.product .price ins' => array(
					'color' => esc_attr( $product_price_font_color ),
				),
				'.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price , ul.products li.product .price' => array(
					'margin' => kemet_responsive_spacing( $product_price_spacing, 'all', 'desktop' ),
				),
				'.woocommerce ul.products li.product .star-rating ,  ul.products li.product .star-rating' => array(
					'font-size' => kemet_responsive_slider( $product_rating_font_size, 'desktop' ),
					'margin'    => kemet_responsive_spacing( $product_rating_spacing, 'all', 'desktop' ),
				),
				'.woocommerce ul.products li.product .kmt-woo-product-category, .woocommerce-page ul.products li.product .kmt-woo-product-category, .woocommerce ul.products li.product .kmt-woo-shop-product-description, .woocommerce-page ul.products li.product .kmt-woo-shop-product-description' => array(
					'color' => esc_attr( $product_content_font_color ),
				),
			);

			/* Parse CSS from array() */
			$css_output = kemet_parse_css( $css_output );
			/* Typography */
			$css_output .= Kemet_Dynamic_Css_Generator::typography_css( 'woo-shop-product-title', '.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title, ul.products li.product .woocommerce-loop-product__title' );
			$css_output .= Kemet_Dynamic_Css_Generator::typography_css( 'woo-shop-product-content', '.woocommerce ul.products li.product .kmt-woo-product-category, .woocommerce-page ul.products li.product .kmt-woo-product-category, .woocommerce ul.products li.product .kmt-woo-shop-product-description, .woocommerce-page ul.products li.product .kmt-woo-shop-product-description' );
			$css_output .= Kemet_Dynamic_Css_Generator::typography_css( 'woo-shop-product-price', '.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,.woocommerce ul.products li.product .price ins' );

			if ( $widget_list_border ) {
				$widget_list_style = array(
					'ul.product_list_widget > li, #secondary ul.product_list_widget > li' => array(
						'border-bottom-style' => esc_attr( 'solid' ),
						'border-bottom-width' => esc_attr( '1px' ),
						'border-bottom-color' => esc_attr( $widget_list_border_color ),
					),
				);
				$css_output       .= kemet_parse_css( $widget_list_style );
			}

			$tablet_typography = array(
				'.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title, ul.products li.product .woocommerce-loop-product__title' => array(
					'--headingLinksColor' => esc_attr( $product_title_font_color ),
					'margin'              => kemet_responsive_spacing( $product_title_spacing, 'all', 'tablet' ),
				),
				'.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price , ul.products li.product .price' => array(
					'margin' => kemet_responsive_spacing( $product_price_spacing, 'all', 'tablet' ),
				),
				'.woocommerce ul.products li.product .star-rating ,  ul.products li.product .star-rating' => array(
					'font-size' => kemet_responsive_slider( $product_rating_font_size, 'tablet' ),
					'margin'    => kemet_responsive_spacing( $product_rating_spacing, 'all', 'tablet' ),
				),
			);
			/* Parse CSS from array()*/
			$css_output       .= kemet_parse_css( $tablet_typography, '', '768' );
			$mobile_typography = array(
				'.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title, ul.products li.product .woocommerce-loop-product__title' => array(
					'--headingLinksColor' => esc_attr( $product_title_font_color ),
					'margin'              => kemet_responsive_spacing( $product_title_spacing, 'all', 'mobile' ),
				),
				'.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price , ul.products li.product .price' => array(
					'margin' => kemet_responsive_spacing( $product_price_spacing, 'all', 'mobile' ),
				),
				'.woocommerce ul.products li.product .star-rating ,  ul.products li.product .star-rating' => array(
					'font-size' => kemet_responsive_slider( $product_rating_font_size, 'mobile' ),
					'margin'    => kemet_responsive_spacing( $product_rating_spacing, 'all', 'mobile' ),
				),
			);
			/* Parse CSS from array()*/
			$css_output .= kemet_parse_css( $mobile_typography, '', '544' );

			/* Woocommerce Shop Archive width */
			if ( 'custom' === $woo_shop_archive_width ) :
				// Woocommerce shop archive custom width.
				$site_width  = array(
					'.kmt-woo-shop-archive .site-content > .kmt-container' => array(
						'max-width' => kemet_slider( $woo_shop_archive_max_width ),
					),
				);
				$css_output .= kemet_parse_css( $site_width, '769' );else :
					// Woocommerce shop archive default width.
					$site_width = array(
						'.kmt-woo-shop-archive .site-content > .kmt-container' => array(
							'max-width' => kemet_get_css_value( $site_content_width['value'] + 40, 'px' ),
						),
					);

					/* Parse CSS from array()*/
					$css_output .= kemet_parse_css( $site_width, '769' );
			endif;

				wp_add_inline_style( 'woocommerce-general', apply_filters( 'kemet_theme_woocommerce_dynamic_css', $css_output ) );

				/**
				 * YITH WooCommerce Wishlist Style
				 */
				$yith_wcwl_main_style = array(
					'.js_active .kmt-plain-container.kmt-single-post .entry-header' => array(
						'margin-top' => esc_attr( '0' ),
					),
					'.woocommerce table.wishlist_table' => array(
						'font-size' => esc_attr( '100%' ),
					),
					'.woocommerce table.wishlist_table tbody td.product-name' => array(
						'font-weight' => esc_attr( '700' ),
					),
					'.woocommerce table.wishlist_table thead th' => array(
						'border-top' => esc_attr( '0' ),
					),
					'.woocommerce table.wishlist_table tr td.product-remove' => array(
						'padding' => esc_attr( '.7em 1em' ),
					),
					'.woocommerce table.wishlist_table tbody td' => array(
						'border-right' => esc_attr( '0' ),
					),
					'.woocommerce .wishlist_table td.product-add-to-cart a' => array(
						'display' => esc_attr( 'inherit !important' ),
					),
					'.wishlist_table tr td, .wishlist_table tr th.wishlist-delete, .wishlist_table tr th.product-checkbox' => array(
						'text-align' => esc_attr( 'left' ),
					),
				);
				/* Parse CSS from array() */
				$yith_wcwl_main_style = kemet_parse_css( $yith_wcwl_main_style );

				wp_add_inline_style( 'yith-wcwl-main', $yith_wcwl_main_style );
		}

		/**
		 * Register Customizer sections and panel for woocommerce
		 *
		 * @since 1.0.0
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public function customize_register( $wp_customize ) {
			/**
			 * Register Sections & Panels
			 */
			require KEMET_THEME_DIR . 'inc/compatibility/woocommerce/customizer/register-panels-and-sections.php';// phpcs:ignore: WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		}

		/**
		 * Register Customizer sections and panel for woocommerce
		 */
		public function customizer_options_register() {
			// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			require KEMET_THEME_DIR . 'inc/compatibility/woocommerce/customizer/sections/section-container.php';
			require KEMET_THEME_DIR . 'inc/compatibility/woocommerce/customizer/sections/section-sidebar.php';
			require KEMET_THEME_DIR . 'inc/compatibility/woocommerce/customizer/sections/layout/class-kemet-woo-shop-customizer.php';
			require KEMET_THEME_DIR . 'inc/compatibility/woocommerce/customizer/sections/layout/class-kemet-woo-shop-single-customizer.php';
			require KEMET_THEME_DIR . 'inc/compatibility/woocommerce/customizer/sections/layout/class-kemet-woo-cart-page-customizer.php';
			require KEMET_THEME_DIR . 'inc/compatibility/woocommerce/customizer/sections/layout/class-kemet-woo-general-customizer.php';
			require KEMET_THEME_DIR . 'inc/compatibility/woocommerce/customizer/sections/layout/class-kemet-woo-cart-customizer.php';
			// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		}

		/**
		 * Add cart item to header items
		 *
		 * @param array $items header items.
		 * @return array
		 */
		public function add_cart_header_item( $items ) {
			$items['cart'] = array(
				'name'    => __( 'Cart', 'kemet' ),
				'icon'    => 'cart',
				'section' => 'section-woo-cart-menu-items',
			);

			return $items;
		}
		/**
		 * Woocommerce mini cart markup markup
		 *
		 * @return html
		 */
		public function woo_mini_cart_markup() {
			if ( is_cart() ) {
				$class = 'current-menu-item';
			} else {
				$class = '';
			}

			$cart_menu_classes = apply_filters( 'kemet_cart_in_menu_class', array( 'kmt-menu-cart-with-border' ) );

			ob_start();
			?>
			<div id="kmt-site-header-cart" class="kmt-site-header-cart <?php echo esc_html( implode( ' ', $cart_menu_classes ) ); ?>">
				<div class="kmt-site-header-cart-li <?php echo esc_attr( $class ); ?>">
					<?php $this->kemet_get_cart_link(); ?>
				</div>
				<div class="kmt-site-header-cart-data">
					<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
				</div>
			</div>
			<?php
			echo ob_get_clean();
		}

		/**
		 * Add Cart icon markup
		 *
		 * @param Array $options header options array.
		 *
		 * @return Array header options array.
		 * @since 1.0.0
		 */
		public function header_section_elements( $options ) {
			$options['woocommerce'] = 'WooCommerce';

			return $options;
		}

		/**
		 * Cart Link
		 * Displayed a link to the cart including the number of items present and the cart total
		 *
		 * @return void
		 */
		public function kemet_get_cart_link() {
			global $woocommerce;

			$view_shopping_cart = apply_filters( 'kemet_woo_view_shopping_cart_title', __( 'View your shopping cart', 'kemet' ) );
			$cart_display       = kemet_get_option( 'cart-icon-display' );
			$cart_icon          = kemet_get_option( 'shop-cart-icon' );
			$display            = '';
			switch ( $cart_display ) {
				case 'icon':
					$display = '';
					break;
				case 'icon-total':
					$display = $woocommerce->cart->get_cart_total();
					break;
				case 'icon-count':
					$display = $woocommerce->cart->cart_contents_count;
					break;
				case 'icon-count-total':
					$display = $woocommerce->cart->cart_contents_count . ' ' . $woocommerce->cart->get_cart_total();
					break;
			}
			?>
			<a class="cart-container" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php echo esc_attr( $view_shopping_cart ); ?>">

						<?php
						do_action( 'kemet_woo_header_cart_icons_before' );

						if ( apply_filters( 'kemet_woo_default_header_cart_icon', true ) ) {
							?>
							<div class="kmt-cart-menu-wrap">

								<span class="count <?php echo esc_attr( $cart_icon ); ?>">
									<?php
									if ( apply_filters( 'kemet_woo_header_cart_total', true ) && null != WC()->cart ) {
										echo wp_kses_post( $display );
									}
									?>
								</span>
							</div>
							<?php
						}

						do_action( 'kemet_woo_header_cart_icons_after' );
						?>
			</a>
			<?php
		}

		/**
		 * Cart Fragments
		 * Ensure cart contents update when products are added to the cart via AJAX
		 *
		 * @param  array $fragments Fragments to refresh via AJAX.
		 * @return array            Fragments to refresh via AJAX
		 */
		public function cart_link_fragment( $fragments ) {
			ob_start();
			$this->kemet_get_cart_link();
			$fragments['a.cart-container'] = ob_get_clean();

			return $fragments;
		}

		/**
		 * Hide Cart Icon If Cart Empty
		 *
		 * @param array $classes cart item classes.
		 * @return array
		 */
		public function hide_cart_if_empty( $classes ) {
			global $woocommerce;

			$disable_cart = kemet_get_option( 'disable-cart-if-empty' );
			$cart_count   = $woocommerce->cart->cart_contents_count;

			if ( 0 == $cart_count && $disable_cart ) {
				$classes[] = 'hide-cart';
			}

			return $classes;
		}
	}

endif;

if ( apply_filters( 'kemet_enable_woocommerce_integration', true ) ) {
	Kemet_Woocommerce::get_instance();
}
