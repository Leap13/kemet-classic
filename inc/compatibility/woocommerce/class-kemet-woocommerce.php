<?php
/**
 * WooCommerce Compatibility File.
 *
 * @link https://woocommerce.com/
 *
 * @package Kemet
 */

// If plugin - 'WooCommerce' not exist then return.
if (!class_exists('WooCommerce')) {
    return;
}

/**
 * Kemet WooCommerce Compatibility
 */
if (!class_exists('Kemet_Woocommerce')):

    /**
     * Kemet WooCommerce Compatibility
     *
     * @since 1.0.0
     */
    class Kemet_Woocommerce
{

        /**
         * Member Variable
         *
         * @var object instance
         */
        private static $instance;

        /**
         * Initiator
         */
        public static function get_instance()
    {
            if (!isset(self::$instance)) {
                self::$instance = new self;
            }
            return self::$instance;
        }

        /**
         * Constructor
         */
        public function __construct()
    {
            require_once KEMET_THEME_DIR . 'inc/compatibility/woocommerce/woocommerce-common-functions.php';

            add_filter('woocommerce_enqueue_styles', array($this, 'woo_filter_style'));

            add_filter('kemet_theme_defaults', array($this, 'theme_defaults'));

            add_action('after_setup_theme', array($this, 'setup_theme'));

            // Register Store Sidebars.
            add_action('widgets_init', array($this, 'store_widgets_init'), 15);
            // Replace Store Sidebars.
            add_filter('kemet_get_sidebar', array($this, 'replace_store_sidebar'));
            // Store Sidebar Layout.
            add_filter('kemet_layout', array($this, 'store_sidebar_layout'));
            // Store Content Layout.
            add_filter('kemet_get_content_layout', array($this, 'store_content_layout'));

            add_action('woocommerce_before_main_content', array($this, 'before_main_content_start'));
            add_action('woocommerce_after_main_content', array($this, 'before_main_content_end'));
            add_filter('wp_enqueue_scripts', array($this, 'add_styles'));
            add_action('wp', array($this, 'shop_customization'), 5);
            add_action('wp_head', array($this, 'single_product_customization'), 5);
            add_action('wp', array($this, 'woocommerce_init'), 1);
            add_action('init', array($this, 'woocommerce_checkout'));
            add_action('wp', array($this, 'shop_meta_option'), 1);
            add_action('wp', array($this, 'cart_page_upselles'));
            add_filter('kemet_cart_in_menu_class', array($this, 'hide_cart_if_empty'));

            add_filter('loop_shop_columns', array($this, 'shop_columns'));
            add_filter('loop_shop_per_page', array($this, 'shop_no_of_products'));
            add_filter('body_class', array($this, 'shop_page_products_item_class'));
            add_filter('post_class', array($this, 'single_product_class'));
            add_filter('woocommerce_product_get_rating_html', array($this, 'rating_markup'), 10, 3);
            add_filter('woocommerce_output_related_products_args', array($this, 'related_products_args'));

            // Add Cart icon in Menu.
            add_filter('kemet_get_dynamic_header_content', array($this, 'woo_mini_cart_markup'), 10, 3);

            // Add Cart option in dropdown.
            add_filter('kemet_header_elements', array($this, 'header_section_elements'));

            // Cart fragment.
            if (defined('WC_VERSION') && version_compare(WC_VERSION, '2.3', '>=')) {
                add_filter('woocommerce_add_to_cart_fragments', array($this, 'cart_link_fragment'));
            } else {
                add_filter('add_to_cart_fragments', array($this, 'cart_link_fragment'));
            }

            add_action('woocommerce_before_shop_loop_item_title', array($this, 'product_flip_image'), 10);
            add_filter('woocommerce_subcategory_count_html', array($this, 'subcategory_count_markup'), 10, 2);

            add_action('customize_register', array($this, 'customize_register'), 11);

            add_filter('woocommerce_get_stock_html', 'kemet_woo_product_in_stock', 10, 2);
        }

        /**
         * Rating Markup
         *
         * @param  string $html  Rating Markup.
         * @param  float  $rating Rating being shown.
         * @param  int    $count  Total number of ratings.
         * @return string
         */
        public function rating_markup($html, $rating, $count)
    {
            if (0 == $rating) {
                $html = '<div class="star-rating">';
                $html .= wc_get_star_rating_html($rating, $count);
                $html .= '</div>';
            }
            return $html;
        }

        /**
         * Cart Page Upselles products.
         *
         * @return void
         */
        public function cart_page_upselles()
    {
            $upselles_enabled = kemet_get_option('enable-cart-upsells');
            if (!$upselles_enabled) {
                remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
            }
        }

        /**
         * Subcategory Count Markup
         *
         * @param  array $styles  Css files.
         *
         * @return array
         */
        public function woo_filter_style($styles)
    {

            /* Directory and Extension */
            $file_prefix = (SCRIPT_DEBUG) ? '' : '.min';
            $dir_name = (SCRIPT_DEBUG) ? 'unminified' : 'minified';

            $css_uri = KEMET_THEME_URI . 'assets/css/' . $dir_name . '/compatibility/woocommerce/';
            $key = 'kemet-woocommerce';

            // Register & Enqueue Styles.
            // Generate CSS URL.
            $css_file = $css_uri . '' . $file_prefix . '.css';

            $styles = array(
                'woocommerce-layout' => array(
                    'src' => $css_uri . 'woocommerce-layout' . $file_prefix . '.css',
                    'deps' => '',
                    'version' => KEMET_THEME_VERSION,
                    'media' => 'all',
                    'has_rtl' => true,
                ),
                'woocommerce-smallscreen' => array(
                    'src' => $css_uri . 'woocommerce-smallscreen' . $file_prefix . '.css',
                    'deps' => 'woocommerce-layout',
                    'version' => KEMET_THEME_VERSION,
                    'media' => 'only screen and (max-width: ' . apply_filters('woocommerce_style_smallscreen_breakpoint', '768px') . ')',
                    'has_rtl' => true,
                ),
                'woocommerce-general' => array(
                    'src' => $css_uri . 'woocommerce' . $file_prefix . '.css',
                    'deps' => '',
                    'version' => KEMET_THEME_VERSION,
                    'media' => 'all',
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
        public function subcategory_count_markup($content, $category)
    {
            $content = sprintf( // WPCS: XSS OK.
                /* translators: 1: number of products */
                _nx('<mark class="count">%1$s Product</mark>', '<mark class="count">%1$s Products</mark>', $category->count, 'product categories', 'kemet'),
                number_format_i18n($category->count)
            );

            return $content;
        }

        /**
         * Product Flip Image
         */
        public function product_flip_image()
    {
            global $product;

            $hover_style = kemet_get_option('shop-hover-style');

            if ('swap' === $hover_style) {
                $attachment_ids = $product->get_gallery_image_ids();

                if ($attachment_ids) {
                    $image_size = apply_filters('single_product_archive_thumbnail_size', 'shop_catalog');

                    echo apply_filters('kemet_woocommerce_product_flip_image', wp_get_attachment_image(reset($attachment_ids), $image_size, false, array('class' => 'show-on-hover')));
                }
            }
        }

        /**
         * Theme Defaults.
         *
         * @param array $defaults Array of options value.
         * @return array
         */
        public function theme_defaults($defaults)
    {

            // Container.
            $defaults['woocommerce-content-layout'] = 'plain-container';

            // Sidebar.
            $defaults['woocommerce-sidebar-layout'] = 'no-sidebar';
            $defaults['single-product-sidebar-layout'] = 'no-sidebar';

            /* Shop */
            $defaults['shop-grids'] = array(
                'desktop' => 4,
                'tablet' => 3,
                'mobile' => 2,
            );
            $defaults['shop-no-of-products'] = '12';
            $defaults['shop-product-structure'] = array(
                'category',
                'add_cart',
            );
            $defaults['disable-shop-breadcrumb'] = true;
            $defaults['shop-hover-style'] = '';
            $defaults['product-title-text-color'] = '';
            $defaults['product-title-font-size'] = '';
            $defaults['product-title-font-family'] = '';
            $defaults['product-title-font-weight'] = '';
            $defaults['product-title-text-transform'] = '';
            $defaults['product-title-line-height'] = '';
            $defaults['letter-spacing-product-title'] = '';
            $defaults['product-content-text-color'] = '';
            $defaults['product-content-font-size'] = '';
            $defaults['product-content-font-family'] = '';
            $defaults['product-content-font-weight'] = '';
            $defaults['product-content-text-transform'] = '';
            $defaults['product-content-line-height'] = '';
            $defaults['letter-spacing-product-content'] = '';
            $defaults['product-price-font-size'] = '';
            $defaults['product-price-text-color'] = '';
            $defaults['product-price-font-family'] = '';
            $defaults['product-price-font-weight'] = '';
            $defaults['product-price-text-transform'] = '';
            $defaults['product-price-line-height'] = '';
            $defaults['letter-spacing-product-price'] = '';

            /* Single */
            $defaults['single-product-breadcrumb-disable'] = false;

            /* Cart */
            $defaults['enable-cart-upsells'] = true;

            $defaults['shop-archive-width'] = 'default';
            $defaults['shop-archive-max-width'] = 1200;
            $defaults['rating-color'] = '';
            $defaults['cart-dropdown-width'] = 350;
            $defaults['cart-dropdown-border-size'] = 1;
            $defaults['cart-dropdown-bg-color'] = '';
            $defaults['cart-dropdown-border-color'] = '';
            $defaults['disable-cart-if-empty'] = false;
            $defaults['cart-icon-display'] = 'icon-count';
            $defaults['cart-icon-size'] = '';
            $defaults['cart-icon-center-vertically'] = '';
            $defaults['shop-cart-icon'] = 'icon-cart';
            $defaults['product-title-spacing'] = '';
            $defaults['product-price-spacing'] = '';
            $defaults['product-rating-font-size'] = '';
            $defaults['product-rating-spacing'] = '';

            return $defaults;
        }

        /**
         * Update Shop page grid
         *
         * @param  int $col Shop Column.
         * @return int
         */
        public function shop_columns($col)
    {
            $col = kemet_get_option('shop-grids');
            return $col['desktop'];
        }

        /**
         * Update Shop page grid
         *
         * @return int
         */
        public function shop_no_of_products()
    {
            $products = kemet_get_option('shop-no-of-products');
            return $products;
        }

        /**
         * Add products item class on shop page
         *
         * @param Array $classes product classes.
         *
         * @return array.
         */
        public function shop_page_products_item_class($classes = '')
    {
            if (is_shop() || is_product_taxonomy() || is_cart()) {
                $shop_grid = kemet_get_option('shop-grids');
                $classes[] = 'columns-' . $shop_grid['desktop'];
                $classes[] = 'tablet-columns-' . $shop_grid['tablet'];
                $classes[] = 'mobile-columns-' . $shop_grid['mobile'];

                $classes[] = 'kmt-woo-shop-archive';
            }
            $classes[] = 'shop-grid';
            // Cart menu is emabled.
            $rt_section = kemet_get_option('header-main-rt-section');

            if ('woocommerce' === $rt_section) {
                $classes[] = 'kmt-woocommerce-cart-menu';
            }

            return $classes;
        }

        /**
         * Add class on single product page
         *
         * @param Array $classes product classes.
         *
         * @return array.
         */
        public function single_product_class($classes)
    {
            if (is_product() && 0 == get_post_meta(get_the_ID(), '_wc_review_count', true)) {
                $classes[] = 'kmt-woo-product-no-review';
            }

            if (is_shop() || is_product_taxonomy()) {
                $hover_style = kemet_get_option('shop-hover-style');

                if ('' !== $hover_style) {
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
        public function related_products_args($args)
    {
            $col = kemet_get_option('shop-grids');
            $args['posts_per_page'] = $col['desktop'];
            return $args;
        }

        /**
         * Setup theme
         *
         * @since 1.0.0
         */
        public function setup_theme()
    {

            // WooCommerce.
            add_theme_support('wc-product-gallery-zoom');
            add_theme_support('wc-product-gallery-lightbox');
            add_theme_support('wc-product-gallery-slider');
        }

        /**
         * Store widgets init.
         */
        public function store_widgets_init()
    {
            register_sidebar(
                array(
                    'name' => esc_html__('WooCommerce Sidebar', 'kemet'),
                    'id' => 'kemet-woo-shop-sidebar',
                    'description' => __('This sidebar will be used on Product archive, Cart, Checkout and My Account pages.', 'kemet'),
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget' => '</div>',
                    'before_title' => '<div class="widget-head"><div class="title"><h4 class="widget-title">',
                    'after_title' => '</h4></div></div>',
                )
            );
            register_sidebar(
                array(
                    'name' => esc_html__('Product Sidebar', 'kemet'),
                    'id' => 'kemet-woo-single-sidebar',
                    'description' => __('This sidebar will be used on Single Product page.', 'kemet'),
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget' => '</div>',
                    'before_title' => '<div class="widget-head"><div class="title"><h4 class="widget-title">',
                    'after_title' => '</h4></div></div>',
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
        public function replace_store_sidebar($sidebar)
    {
            if (is_shop() || is_product_taxonomy() || is_checkout() || is_cart() || is_account_page()) {
                $sidebar = 'kemet-woo-shop-sidebar';
            } elseif (is_product()) {
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
    public function store_sidebar_layout($sidebar_layout)
    {
        if (is_shop() || is_product_taxonomy() || is_checkout() || is_cart() || is_account_page()) {
            $woo_sidebar = kemet_get_option('woocommerce-sidebar-layout');
            $shop_sidebar = '';
            if ('default' !== $woo_sidebar) {
                $sidebar_layout = $woo_sidebar;
            }

            if (is_shop()) {
                $shop_page_id = get_option('woocommerce_shop_page_id');
                $meta = get_post_meta($shop_page_id, 'kemet_page_options', true);
                $shop_sidebar = (isset($meta['site-sidebar-layout']) && $meta['site-sidebar-layout']) ? $meta['site-sidebar-layout'] : 'default';
            } elseif (is_product_taxonomy()) {
                $shop_sidebar = 'default';
            } else {
                if (class_exists('KFW')) {
                    $meta = get_post_meta(get_the_ID(), 'kemet_page_options', true);
                    $shop_sidebar = (isset($meta['site-sidebar-layout']) && $meta['site-sidebar-layout']) ? $meta['site-sidebar-layout'] : 'default';
                }
            }

            if ('default' !== $shop_sidebar && !empty($shop_sidebar)) {
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
    public function store_content_layout($layout)
    {
        if (is_woocommerce() || is_checkout() || is_cart() || is_account_page()) {
            $woo_layout = kemet_get_option('woocommerce-content-layout');
            $shop_layout = 'default';

            if ('default' !== $woo_layout) {
                $layout = $woo_layout;
            }

            if (is_shop()) {
                $shop_page_id = get_option('woocommerce_shop_page_id');
                $shop_layout = get_post_meta($shop_page_id, 'site-content-layout', true);
            } elseif (is_product_taxonomy()) {
                $shop_layout = 'default';
            } elseif (class_exists('KFW')) {
                $meta = get_post_meta(get_the_ID(), 'kemet_page_options', true);
                $shop_layout = (isset($meta['site-content-layout']) && $meta['site-content-layout']) ? $meta['site-content-layout'] : 'default';
            }

            if ('default' !== $shop_layout && !empty($shop_layout)) {
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
    public function shop_meta_option()
    {

        // Page Title.
        if (is_shop()) {
            $shop_page_id = get_option('woocommerce_shop_page_id');
            $shop_title = get_post_meta($shop_page_id, 'site-post-title', true);
            $main_header_display = get_post_meta($shop_page_id, 'kmt-main-header-display', true);
            $footer_layout = get_post_meta($shop_page_id, 'copyright-footer-layout', true);

            if ('disabled' === $shop_title) {
                add_filter('woocommerce_show_page_title', '__return_false');
            }

            if ('disabled' === $main_header_display) {
                remove_action('kemet_sitehead', 'kemet_sitehead_primary_template');
            }

            if ('disabled' === $footer_layout) {
                remove_action('kemet_footer_content', 'kemet_footer_copyright_footer_template', 5);
            }
        }
    }

    /**
     * Shop customization.
     *
     * @return void
     */
    public function shop_customization()
    {
        if (!apply_filters('kemet_woo_shop_product_structure_override', false)) {
            add_action('woocommerce_before_shop_loop_item', 'kemet_woo_shop_thumbnail_wrap_start', 6);
            /**
             * Add sale flash before shop loop.
             */
            add_action('woocommerce_before_shop_loop_item', 'woocommerce_show_product_loop_sale_flash', 9);

            add_action('woocommerce_after_shop_loop_item', 'kemet_woo_shop_thumbnail_wrap_end', 8);
            /**
             * Add Out of Stock to the Shop page
             */
            add_action('woocommerce_shop_loop_item_title', 'kemet_woo_shop_out_of_stock', 8);

            remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

            /**
             * Shop Page Product Content Sorting
             */
            add_action('woocommerce_after_shop_loop_item', 'kemet_woo_woocommerce_shop_product_content', 2);
        }
    }

    /**
     * Checkout customization.
     *
     * @return void
     */
    public function woocommerce_checkout()
    {
        if (!apply_filters('kemet_woo_shop_product_structure_override', false)) {

            /**
             * Checkout Page
             */
            add_action('woocommerce_checkout_billing', array(WC()->checkout(), 'checkout_form_shipping'));
        }

        // Checkout Page.
        remove_action('woocommerce_checkout_shipping', array(WC()->checkout(), 'checkout_form_shipping'));
    }

    /**
     * Single product customization.
     *
     * @return void
     */
    public function single_product_customization()
    {
        if (!is_product()) {
            return;
        }

        add_filter('woocommerce_product_description_heading', '__return_false');
        add_filter('woocommerce_product_additional_information_heading', '__return_false');

        // Breadcrumb.

        if (kemet_get_option('single-product-breadcrumb-disable') && is_product()) {
            remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
        }
    }

    /**
     * Remove Woo-Commerce Default actions
     */
    public function woocommerce_init()
    {
        remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
        remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
        remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
        remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
        remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
        remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
        remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
        remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
        remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
        // Breadcrumb.
        if (kemet_get_option('disable-shop-breadcrumb') && (is_shop() || is_product_taxonomy())) {
            remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
        }
    }

    /**
     * Add start of wrapper
     */
    public function before_main_content_start()
    {
        $site_sidebar = kemet_layout();
        if ('left-sidebar' == $site_sidebar) {
            get_sidebar();
        }?>
			<div id="primary" class="content-area primary">

				<?php kemet_primary_content_top();?>

				<main id="main" class="site-main" role="main">
					<div class="kmt-woocommerce-container">
			<?php
}

    /**
     * Add end of wrapper
     */
    public function before_main_content_end()
    {
        ?>
					</div> <!-- .kmt-woocommerce-container -->
				</main> <!-- #main -->

				<?php kemet_primary_content_bottom();?>

			</div> <!-- #primary -->
			<?php
$site_sidebar = kemet_layout();
        if ('right-sidebar' == $site_sidebar) {
            get_sidebar();
        }
    }

    /**
     * Enqueue styles
     *
     * @since 1.0.0
     */
    public function add_styles()
    {

        /* Directory and Extension */
        $file_prefix = (SCRIPT_DEBUG) ? '' : '.min';
        $dir_name = (SCRIPT_DEBUG) ? 'unminified' : 'minified';

        $css_uri = KEMET_THEME_URI . 'assets/css/' . $dir_name . '/';

        $new_style = 'compatibility/woocommerce-new';
        $new_key = 'kemet-woocommerce-new';

        // Register & Enqueue Styles.
        // Generate CSS URL.
        $new_css_file = $css_uri . $new_style . $file_prefix . '.css';

        /**
         * - Variable Declaration
         */
        $theme_color = kemet_get_option('theme-color');
        $headings_links_color = kemet_get_option('headings-links-color');
        $text_meta_color = kemet_get_option('text-meta-color');
        $global_border_color = kemet_get_option('global-border-color');
        $global_bg_color = kemet_get_option('global-background-color');
        $body_bg_color = kemet_get_option('site-layout-outside-bg-obj', array('background-color' => $global_bg_color));
        $global_footer_text_color = kemet_get_option('global-footer-text-color');
        $kemet_footer_link_color = kemet_get_option('footer-link-color', $global_footer_text_color);

        $btn_color = kemet_get_option('button-color', '#ffffff');
        $btn_h_color = kemet_get_option('button-h-color', $btn_color);
        $btn_bg_color = kemet_get_option('button-bg-color', $theme_color);
        $btn_bg_h_color = kemet_get_option('button-bg-h-color', kemet_color_brightness($theme_color, 0.8, 'dark'));
        $btn_border_color = kemet_get_option('btn-border-color');
        $btn_padding = kemet_get_option('button-spacing');
        $btn_border_size = kemet_get_option('btn-border-size');
        $btn_border_color = kemet_get_option('btn-border-color');
        $btn_border_h_color = kemet_get_option('btn-border-h-color');

        $btn_border_radius = kemet_get_option('button-radius');

        $site_content_width = kemet_get_option('site-content-width', 1200);
        $woo_shop_archive_width = kemet_get_option('shop-archive-width');
        $woo_shop_archive_max_width = kemet_get_option('shop-archive-max-width');
        $product_title_font_color = kemet_get_option('product-title-text-color');
        $product_title_font_size = kemet_get_option('product-title-font-size');
        $product_title_font_family = kemet_get_option('product-title-font-family');
        $product_title_font_weight = kemet_get_option('product-title-font-weight');
        $product_title_text_transform = kemet_get_option('product-title-text-transform');
        $product_title_line_height = kemet_get_option('product-title-line-height');
        $product_title_letter_spacing = kemet_get_option('letter-spacing-product-title');
        $product_content_font_color = kemet_get_option('product-content-text-color');
        $product_content_font_size = kemet_get_option('product-content-font-size');
        $product_content_font_family = kemet_get_option('product-content-font-family');
        $product_content_font_weight = kemet_get_option('product-content-font-weight');
        $product_content_text_transform = kemet_get_option('product-content-text-transform');
        $product_content_line_height = kemet_get_option('product-content-line-height');
        $product_content_letter_spacing = kemet_get_option('letter-spacing-product-content');
        $product_price_font_color = kemet_get_option('product-price-text-color');
        $product_price_font_size = kemet_get_option('product-price-font-size');
        $product_price_font_family = kemet_get_option('product-price-font-family');
        $product_price_font_weight = kemet_get_option('product-price-font-weight');
        $product_price_text_transform = kemet_get_option('product-price-text-transform');
        $product_price_line_height = kemet_get_option('product-price-line-height');
        $product_price_letter_spacing = kemet_get_option('letter-spacing-product-price');
        $rating_color = kemet_get_option('rating-color', $theme_color);
        $product_rating_font_size = kemet_get_option('product-rating-font-size');
        $product_rating_spacing = kemet_get_option('product-rating-spacing');
        $product_title_spacing = kemet_get_option('product-title-spacing');
        $product_price_spacing = kemet_get_option('product-price-spacing');

        //General
        $cart_dropdown_width = kemet_get_option('cart-dropdown-width');
        $cart_icon_size = kemet_get_option('cart-icon-size');
        $cart_icon_center_vertically = kemet_get_option('cart-icon-center-vertically');
        $cart_dropdown_border_size = kemet_get_option('cart-dropdown-border-size');
        $cart_dropdown_border_color = kemet_get_option('cart-dropdown-border-color', $global_border_color);
        $cart_dropdown_bg_color = kemet_get_option('cart-dropdown-bg-color', $global_bg_color);
        // Widget Separator
			$widget_list_border       = kemet_get_option( 'enable-widget-list-separator' );
			$widget_list_border_color = kemet_get_option( 'widget-list-border-color', $global_border_color );

        $css_output = array(
            'ul.product_list_widget li ins .amount , ul.product_list_widget li > .amount' => array(
                'color' => esc_attr( $theme_color ),
            ),
            '.woocommerce ul.product_list_widget li img , ul.product_list_widget li img' => array(
                'border-color' => esc_attr( $global_border_color ),
            ),
            '.kmt-site-header-cart .widget_shopping_cart .product_list_widget li, .woocommerce .kmt-site-header-cart .widget_shopping_cart .product_list_widget li' => array(
                'border-color' => esc_attr( $cart_dropdown_border_color ),
            ),
            '.site-header .kmt-site-header-cart .widget_shopping_cart, .woocommerce .site-header .kmt-site-header-cart .widget_shopping_cart' => array(
                'width' => kemet_get_css_value($cart_dropdown_width, 'px'),
                'background-color' => esc_attr($cart_dropdown_bg_color),
                'border-width' => kemet_get_css_value($cart_dropdown_border_size, 'px'),
                'border-color' => esc_attr($cart_dropdown_border_color),
            ),
            '.kmt-cart-menu-wrap .count.icon-cart:before , .kmt-cart-menu-wrap .count.icon-bag:before' => array(
                'font-size' => kemet_get_css_value($cart_icon_size, 'px'),
                'top' => kemet_get_css_value($cart_icon_center_vertically, 'px'),
            ),
            '.woocommerce div.product form.cart .variations' => array(
                'border-bottom-color' => esc_attr($global_border_color),
            ),
            '.woocommerce div.product form.cart .group_table td' => array(
                'border-color' => esc_attr($global_border_color),
            ),
            '.woocommerce div.product .product_meta' => array(
                'border-color' => esc_attr($global_border_color),
            ),
            '.woocommerce .site-header .kmt-site-header-cart .widget_shopping_cart:before, .woocommerce .site-header .kmt-site-header-cart .widget_shopping_cart:before ,.woocommerce .site-header .kmt-site-header-cart .widget_shopping_cart:after, .woocommerce .site-header .kmt-site-header-cart .widget_shopping_cart:after' => array(
                'border-bottom-color' => esc_attr($cart_dropdown_bg_color),
            ),
            '.woocommerce span.onsale' => array(
                'background-color' => esc_attr($theme_color),
                'color' => esc_attr($btn_color),
            ),
            '.woocommerce table.shop_table thead, .woocommerce-page table.shop_table thead , table.shop_table tr:nth-child(even) , table.shop_table thead tr' => array(
                'background-color' => esc_attr(kemet_color_brightness($global_bg_color, 0.94, 'dark')),
            ),
            '.kmt-separate-container.woocommerce .product ,.kmt-separate-container.woocommerce li.product .kemet-shop-thumbnail-wrap .kemet-shop-summary-wrap' => array(
                'background-color' => esc_attr(kemet_color_brightness($global_bg_color, 0.97, 'dark')),
                'border-color' => esc_attr($global_border_color),
            ),
            '.woocommerce table.shop_table td, .woocommerce-page table.shop_table td , .woocommerce table.shop_table, .woocommerce-page table.shop_table , .woocommerce-cart .cart-collaterals .cross-sells , .woocommerce-cart .cart-collaterals .cart_totals>h2, .woocommerce-cart .cart-collaterals .cross-sells>h2' => array(
                'border-color' => esc_attr($global_border_color),
            ),
            '.woocommerce-tabs .entry-content' => array(
                'border-color' => esc_attr($global_border_color),
            ),
            '.woocommerce-message , .woocommerce-error , .woocommerce-info' => array(
                'border-color' => esc_attr($global_border_color),
            ),
            '.order-total' => array(
                'color' => esc_attr($theme_color),
            ),
            '.woocommerce .woocommerce-message .button' => array(
                'color' => esc_attr($headings_links_color),
            ),
            '.woocommerce .woocommerce-message .button:hover' => array(
                'color' => esc_attr($theme_color),
            ),
            '.woocommerce div.product .woocommerce-tabs ul.tabs li.active a , .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover' => array(
                'background-color' => esc_attr($global_bg_color),
                'color' => esc_attr($theme_color),
                'border-color' => esc_attr($global_border_color),
            ),
            '.woocommerce div.product .woocommerce-tabs ul.tabs li a' => array(
                'background-color' => esc_attr($global_bg_color),
                'color' => esc_attr($text_meta_color),
                'border-color' => esc_attr($global_border_color),
            ),
            '.woocommerce li.product .kemet-shop-thumbnail-wrap .kemet-shop-summary-wrap ,.woocommerce li.product .kemet-shop-thumbnail-wrap .product-list-details' => array(
                'background-color' => esc_attr(kemet_color_brightness($body_bg_color['background-color'], 0.55, 'light')),
            ),
            'body:not(.shop-grid) a.button , .woocommerce button.button, .woocommerce #respond input#submit.alt,body:not(.shop-grid) a.button.alt,  .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button,.woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled], .woocommerce input.button:disabled:hover, .woocommerce input.button:disabled[disabled]:hover, .woocommerce #respond input#submit, .woocommerce button.button.alt.disabled ,.woocommerce a.checkout-button , #yith-wcwl-form .button, .woocommerce-js .yith-woocompare-widget a.compare' => array(
                'color' => esc_attr($btn_color),
                'background-color' => esc_attr($btn_bg_color),
                'border' => 'solid',
                'border-color' => esc_attr($btn_border_color),
                'border-width' => kemet_get_css_value($btn_border_size, 'px'),
                'border-radius' => kemet_responsive_slider($btn_border_radius, 'desktop'),
                'padding-top' => kemet_responsive_spacing($btn_padding, 'top', 'desktop'),
                'padding-bottom' => kemet_responsive_spacing($btn_padding, 'bottom', 'desktop'),
                'padding-right' => kemet_responsive_spacing($btn_padding, 'right', 'desktop'),
                'padding-left' => kemet_responsive_spacing($btn_padding, 'left', 'desktop'),
            ),
            '.shop-grid ul.products li.product .button'  => array(
                'color' => esc_attr( $headings_links_color ),
            ),
            '.shop-grid ul.products li.product .button:hover , .woocommerce-info .button:hover, .woocommerce-info a:hover'  => array(
                'color' => esc_attr( $theme_color ),
            ),
            '.single-product .product a.compare.button, .woocommerce .widget_shopping_cart a:not(.button)' => array(
                'color' => esc_attr( $headings_links_color )
            ),
            '.single-product .product a.compare.button:hover, .woocommerce .widget_shopping_cart a:not(.button):hover' => array(
                'color' => esc_attr( $theme_color )
            ),
            '.shop-grid.woocommerce ul.products li.product .kemet-shop-thumbnail-wrap , .shop-grid.woocommerce ul.products li.product .kemet-shop-thumbnail-wrap .kemet-shop-summary-wrap>* , .shop-grid.woocommerce ul.products li.product .kemet-shop-thumbnail-wrap .kemet-shop-summary-wrap , .shop-grid.woocommerce-page ul.products li.product .kemet-shop-thumbnail-wrap , .shop-grid.woocommerce-page ul.products li.product .kemet-shop-thumbnail-wrap .kemet-shop-summary-wrap>* , .shop-grid.woocommerce-page ul.products li.product .kemet-shop-thumbnail-wrap .kemet-shop-summary-wrap, body.shop-grid ul.products li.product .kemet-shop-thumbnail-wrap , body.shop-grid ul.products li.product .kemet-shop-thumbnail-wrap .kemet-shop-summary-wrap>* , body.shop-grid ul.products li.product .kemet-shop-thumbnail-wrap .kemet-shop-summary-wrap' => array(
                'border-color' => esc_attr($global_border_color),
            ),
            '.woocommerce button.button:hover , body:not(.shop-grid) a.button:hover,.woocommerce #respond input#submit:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce button.button.alt:hover,body:not(.shop-grid) a.button.alt, .woocommerce input.button.alt:hover, .woocommerce input.button:hover, .woocommerce button.button.alt.disabled:hover ,.woocommerce a.checkout-button:hover, #yith-wcwl-form .button:hover,.woocommerce-js .yith-woocompare-widget a.compare:hover' => array(
                'color' => esc_attr($btn_h_color),
                'border-color' => esc_attr($btn_border_h_color),
                'background-color' => esc_attr($btn_bg_h_color),
            ),
            '.woocommerce-message, .woocommerce-info' => array(
                'border-top-color' => esc_attr($global_border_color),
            ),
            '.woocommerce-message::before,.woocommerce-info::before' => array(
                'color' => esc_attr($headings_links_color),
            ),
            '.woocommerce div.product p.price, .woocommerce div.product span.price, .widget_layered_nav_filters ul li.chosen a, .woocommerce-page ul.products li.product .kmt-woo-product-category, .wc-layered-nav-rating a' => array(
                'color' => esc_attr($text_meta_color),
            ),
            // Form Fields, Pagination border Color.
            '.woocommerce nav.woocommerce-pagination ul,.woocommerce nav.woocommerce-pagination ul li' => array(
                'border-color' => esc_attr($global_border_color),
            ),
            '.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current' => array(
                'background' => esc_attr($theme_color),
                'color' => esc_attr($btn_color),
            ),
            '.woocommerce-MyAccount-navigation-link.is-active a, .woocommerce ul.products li.product .price' => array(
                'color' => esc_attr($theme_color),
            ),
            '.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle' => array(
                'background-color' => esc_attr($theme_color),
            ),
            // Button Typography.
            '.woocommerce .star-rating, .woocommerce .comment-form-rating .stars a, .woocommerce .star-rating::before , .product_list_widget .star-rating' => array(
                'color' => esc_attr( $rating_color ),
            ),
            '.woocommerce .widget .amount, .woocommerce .widget ins , ul.product_list_widget .amount, ul.product_list_widget ins' => array(
					'color' => esc_attr( $theme_color ),
				),
            '.woocommerce div.product .woocommerce-tabs ul.tabs li.active:before' => array(
                'background' => esc_attr($headings_links_color),
            ),

            /**
             * Cart in menu
             */
            '.kmt-site-header-cart .widget_shopping_cart .total .woocommerce-Price-amount' => array(
                'color' => esc_attr($headings_links_color),
            ),
            '.woocommerce .widget_shopping_cart .total,.widget_shopping_cart .total' => array(
                'border-color' => esc_attr($global_border_color),
            ),
            '.woocommerce .site-footer a' => array(
                'color' => esc_attr($kemet_footer_link_color),
            ),
            '.woocommerce .site-footer a:hover' => array(
                'color' => esc_attr($theme_color),
            ),
            '.woocommerce .widget .amount, .woocommerce .widget ins' => array(
                'color' => esc_attr($theme_color),
            ),
            '.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title, ul.products li.product .woocommerce-loop-product__title' => array(
                'font-size' => kemet_responsive_slider($product_title_font_size, 'desktop'),
                'color' => esc_attr($product_title_font_color),
                'letter-spacing' => kemet_responsive_slider($product_title_letter_spacing, 'desktop'),
                'font-family' => kemet_get_font_family($product_title_font_family),
                'font-weight' => esc_attr($product_title_font_weight),
                'text-transform' => esc_attr($product_title_text_transform),
                'line-height' => kemet_responsive_slider($product_title_line_height, 'desktop'),
                'margin-top' => kemet_responsive_spacing($product_title_spacing, 'top', 'desktop'),
                'margin-right' => kemet_responsive_spacing($product_title_spacing, 'right', 'desktop'),
                'margin-bottom' => kemet_responsive_spacing($product_title_spacing, 'bottom', 'desktop'),
                'margin-left' => kemet_responsive_spacing($product_title_spacing, 'left', 'desktop'),
            ),
            '.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,.woocommerce ul.products li.product .price ins' => array(
                'font-size' => kemet_responsive_slider($product_price_font_size, 'desktop'),
                'color' => esc_attr($product_price_font_color),
                'letter-spacing' => kemet_responsive_slider($product_price_letter_spacing, 'desktop'),
                'font-family' => kemet_get_font_family($product_price_font_family),
                'font-weight' => esc_attr($product_price_font_weight),
                'text-transform' => esc_attr($product_price_text_transform),
                'line-height' => kemet_responsive_slider($product_price_line_height, 'desktop'),
            ),
            '.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price , ul.products li.product .price' => array(
                'margin-top' => kemet_responsive_spacing($product_price_spacing, 'top', 'desktop'),
                'margin-right' => kemet_responsive_spacing($product_price_spacing, 'right', 'desktop'),
                'margin-bottom' => kemet_responsive_spacing($product_price_spacing, 'bottom', 'desktop'),
                'margin-left' => kemet_responsive_spacing($product_price_spacing, 'left', 'desktop'),
            ),
            '.woocommerce ul.products li.product .star-rating ,  ul.products li.product .star-rating' => array(
                'font-size' => kemet_responsive_slider($product_rating_font_size, 'desktop'),
                'margin-top' => kemet_responsive_spacing($product_rating_spacing, 'top', 'desktop'),
                'margin-right' => kemet_responsive_spacing($product_rating_spacing, 'right', 'desktop'),
                'margin-bottom' => kemet_responsive_spacing($product_rating_spacing, 'bottom', 'desktop'),
                'margin-left' => kemet_responsive_spacing($product_rating_spacing, 'left', 'desktop'),
            ),
            '.woocommerce ul.products li.product .kmt-woo-product-category, .woocommerce-page ul.products li.product .kmt-woo-product-category, .woocommerce ul.products li.product .kmt-woo-shop-product-description, .woocommerce-page ul.products li.product .kmt-woo-shop-product-description' => array(
                'font-size' => kemet_responsive_slider($product_content_font_size, 'desktop'),
                'color' => esc_attr($product_content_font_color),
                'letter-spacing' => kemet_responsive_slider($product_content_letter_spacing, 'desktop'),
                'font-family' => kemet_get_font_family($product_content_font_family),
                'font-weight' => esc_attr($product_content_font_weight),
                'text-transform' => esc_attr($product_content_text_transform),
                'line-height' => kemet_responsive_slider($product_content_line_height, 'desktop'),
            ),
        );
        
        /* Parse CSS from array() */
        $css_output = kemet_parse_css($css_output);

        if ( $widget_list_border ) {
				$widget_list_style = array(
					'ul.product_list_widget > li' => array(
						'border-bottom-style' => esc_attr( 'solid' ),
						'border-bottom-width' => esc_attr( '1px' ),
						'border-bottom-color' => esc_attr( $widget_list_border_color ),
					),
				);
				$css_output        .= kemet_parse_css( $widget_list_style );
			}

        $tablet_typography = array(
            '.woocommerce button.button , body:not(.shop-grid) a.button , body:not(.shop-grid) a.button.alt, .woocommerce #respond input#submit.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button,.woocommerce-cart table.cart td.actions .button, .woocommerce form.checkout_coupon .button, .woocommerce #respond input#submit' => array(
                'border-radius' => kemet_responsive_slider($btn_border_radius, 'tablet'),
            ),
            '.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title , ul.products li.product .woocommerce-loop-product__title' => array(
                'font-size' => kemet_responsive_slider($product_title_font_size, 'tablet'),
                'letter-spacing' => kemet_responsive_slider($product_title_letter_spacing, 'tablet'),
                'line-height' => kemet_responsive_slider($product_title_line_height, 'tablet'),
                'margin-top' => kemet_responsive_spacing($product_title_spacing, 'top', 'tablet'),
                'margin-right' => kemet_responsive_spacing($product_title_spacing, 'right', 'tablet'),
                'margin-bottom' => kemet_responsive_spacing($product_title_spacing, 'bottom', 'tablet'),
                'margin-left' => kemet_responsive_spacing($product_title_spacing, 'left', 'tablet'),
            ),
            '.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,.woocommerce ul.products li.product .price ins' => array(
                'font-size' => kemet_responsive_slider($product_price_font_size, 'tablet'),
                'letter-spacing' => kemet_responsive_slider($product_price_letter_spacing, 'tablet'),
                'line-height' => kemet_responsive_slider($product_price_line_height, 'tablet'),
            ),
            '.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price , ul.products li.product .price' => array(
                'margin-top' => kemet_responsive_spacing($product_price_spacing, 'top', 'tablet'),
                'margin-right' => kemet_responsive_spacing($product_price_spacing, 'right', 'tablet'),
                'margin-bottom' => kemet_responsive_spacing($product_price_spacing, 'bottom', 'tablet'),
                'margin-left' => kemet_responsive_spacing($product_price_spacing, 'left', 'tablet'),
            ),
            '.woocommerce ul.products li.product .star-rating ,  ul.products li.product .star-rating' => array(
                'font-size' => kemet_responsive_slider($product_rating_font_size, 'tablet'),
                'margin-top' => kemet_responsive_spacing($product_rating_spacing, 'top', 'tablet'),
                'margin-right' => kemet_responsive_spacing($product_rating_spacing, 'right', 'tablet'),
                'margin-bottom' => kemet_responsive_spacing($product_rating_spacing, 'bottom', 'tablet'),
                'margin-left' => kemet_responsive_spacing($product_rating_spacing, 'left', 'tablet'),
            ),
            '.woocommerce ul.products li.product .kmt-woo-product-category, .woocommerce-page ul.products li.product .kmt-woo-product-category, .woocommerce ul.products li.product .kmt-woo-shop-product-description, .woocommerce-page ul.products li.product .kmt-woo-shop-product-description' => array(
                'font-size' => kemet_responsive_slider($product_content_font_size, 'tablet'),
                'letter-spacing' => kemet_responsive_slider($product_content_letter_spacing, 'tablet'),
                'line-height' => kemet_responsive_slider($product_content_line_height, 'tablet'),
            ),
        );
        /* Parse CSS from array()*/
        $css_output .= kemet_parse_css($tablet_typography, '', '768');
        $mobile_typography = array(
            '.woocommerce button.button, body:not(.shop-grid) a.button,body:not(.shop-grid) a.button.alt, .woocommerce #respond input#submit.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button,.woocommerce-cart table.cart td.actions .button, .woocommerce form.checkout_coupon .button, .woocommerce #respond input#submit' => array(
                'border-radius' => kemet_responsive_slider($btn_border_radius, 'mobile'),
            ),
            '.woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title , ul.products li.product .woocommerce-loop-product__title' => array(
                'font-size' => kemet_responsive_slider($product_title_font_size, 'mobile'),
                'letter-spacing' => kemet_responsive_slider($product_title_letter_spacing, 'mobile'),
                'line-height' => kemet_responsive_slider($product_title_line_height, 'mobile'),
                'margin-top' => kemet_responsive_spacing($product_title_spacing, 'top', 'mobile'),
                'margin-right' => kemet_responsive_spacing($product_title_spacing, 'right', 'mobile'),
                'margin-bottom' => kemet_responsive_spacing($product_title_spacing, 'bottom', 'mobile'),
                'margin-left' => kemet_responsive_spacing($product_title_spacing, 'left', 'mobile'),
            ),
            '.woocommerce ul.products li.product .star-rating ,  ul.products li.product .star-rating' => array(
                'font-size' => kemet_responsive_slider($product_rating_font_size, 'mobile'),
                'margin-top' => kemet_responsive_spacing($product_rating_spacing, 'top', 'mobile'),
                'margin-right' => kemet_responsive_spacing($product_rating_spacing, 'right', 'mobile'),
                'margin-bottom' => kemet_responsive_spacing($product_rating_spacing, 'bottom', 'mobile'),
                'margin-left' => kemet_responsive_spacing($product_rating_spacing, 'left', 'mobile'),
            ),
            '.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,.woocommerce ul.products li.product .price ins' => array(
                'font-size' => kemet_responsive_slider($product_price_font_size, 'mobile'),
                'letter-spacing' => kemet_responsive_slider($product_price_letter_spacing, 'mobile'),
                'line-height' => kemet_responsive_slider($product_price_line_height, 'mobile'),
            ),
            '.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price , ul.products li.product .price' => array(
                'margin-top' => kemet_responsive_spacing($product_price_spacing, 'top', 'mobile'),
                'margin-right' => kemet_responsive_spacing($product_price_spacing, 'right', 'mobile'),
                'margin-bottom' => kemet_responsive_spacing($product_price_spacing, 'bottom', 'mobile'),
                'margin-left' => kemet_responsive_spacing($product_price_spacing, 'left', 'mobile'),
            ),
            '.woocommerce ul.products li.product .kmt-woo-product-category, .woocommerce-page ul.products li.product .kmt-woo-product-category, .woocommerce ul.products li.product .kmt-woo-shop-product-description, .woocommerce-page ul.products li.product .kmt-woo-shop-product-description' => array(
                'font-size' => kemet_responsive_slider($product_content_font_size, 'mobile'),
                'letter-spacing' => kemet_responsive_slider($product_content_letter_spacing, 'mobile'),
                'line-height' => kemet_responsive_slider($product_content_line_height, 'mobile'),
            ),
        );
        /* Parse CSS from array()*/
        $css_output .= kemet_parse_css($mobile_typography, '', '544');

        /* Woocommerce Shop Archive width */
        if ('custom' === $woo_shop_archive_width):
            // Woocommerce shop archive custom width.
            $site_width = array(
                '.kmt-woo-shop-archive .site-content > .kmt-container' => array(
                    'max-width' => kemet_get_css_value($woo_shop_archive_max_width, 'px'),
                ),
            );
            $css_output .= kemet_parse_css($site_width, '769');else:
            // Woocommerce shop archive default width.
            $site_width = array(
                '.kmt-woo-shop-archive .site-content > .kmt-container' => array(
                    'max-width' => kemet_get_css_value($site_content_width + 40, 'px'),
                ),
            );

            /* Parse CSS from array()*/
            $css_output .= kemet_parse_css($site_width, '769');
        endif;

        wp_add_inline_style('woocommerce-general', apply_filters('kemet_theme_woocommerce_dynamic_css', $css_output));

        /**
         * YITH WooCommerce Wishlist Style
         */
        $yith_wcwl_main_style = array(
            '.yes-js.js_active .kmt-plain-container.kmt-single-post #primary' => array(
                'margin' => esc_attr('4em 0'),
            ),
            '.js_active .kmt-plain-container.kmt-single-post .entry-header' => array(
                'margin-top' => esc_attr('0'),
            ),
            '.woocommerce table.wishlist_table' => array(
                'font-size' => esc_attr('100%'),
            ),
            '.woocommerce table.wishlist_table tbody td.product-name' => array(
                'font-weight' => esc_attr('700'),
            ),
            '.woocommerce table.wishlist_table thead th' => array(
                'border-top' => esc_attr('0'),
            ),
            '.woocommerce table.wishlist_table tr td.product-remove' => array(
                'padding' => esc_attr('.7em 1em'),
            ),
            '.woocommerce table.wishlist_table tbody td' => array(
                'border-right' => esc_attr('0'),
            ),
            '.woocommerce .wishlist_table td.product-add-to-cart a' => array(
                'display' => esc_attr('inherit !important'),
            ),
            '.wishlist_table tr td, .wishlist_table tr th.wishlist-delete, .wishlist_table tr th.product-checkbox' => array(
                'text-align' => esc_attr('left'),
            ),
            '.woocommerce #content table.wishlist_table.cart a.remove' => array(
                'display' => esc_attr('inline-block'),
                'vertical-align' => esc_attr('middle'),
                'font-size' => esc_attr('18px'),
                'font-weight' => esc_attr('normal'),
                'width' => esc_attr('24px'),
                'height' => esc_attr('24px'),
                'line-height' => esc_attr('21px'),
                'color' => esc_attr('#ccc !important'),
                'text-align' => esc_attr('center'),
                'border' => esc_attr('1px solid #ccc'),
            ),
            '.woocommerce #content table.wishlist_table.cart a.remove:hover' => array(
                'color' => esc_attr($headings_links_color . '!important'),
                'border-color' => esc_attr($headings_links_color),
                'background-color' => esc_attr('#ffffff'),
            ),
        );
        /* Parse CSS from array() */
        $yith_wcwl_main_style = kemet_parse_css($yith_wcwl_main_style);

        $yith_wcwl_main_style_small = array(
            '.yes-js.js_active .kmt-plain-container.kmt-single-post #primary' => array(
                'padding' => esc_attr('1.5em 0'),
                'margin' => esc_attr('0'),
            ),
        );
        /* Parse CSS from array()*/
        $yith_wcwl_main_style .= kemet_parse_css($yith_wcwl_main_style_small, '', '768');

        wp_add_inline_style('yith-wcwl-main', $yith_wcwl_main_style);
    }

    /**
     * Register Customizer sections and panel for woocommerce
     *
     * @since 1.0.0
     * @param WP_Customize_Manager $wp_customize Theme Customizer object.
     */
    public function customize_register($wp_customize)
    {

        /**
         * Register Sections & Panels
         */
        require KEMET_THEME_DIR . 'inc/compatibility/woocommerce/customizer/register-panels-and-sections.php';

        /**
         * Sections
         */
        require KEMET_THEME_DIR . 'inc/compatibility/woocommerce/customizer/sections/section-container.php';
        require KEMET_THEME_DIR . 'inc/compatibility/woocommerce/customizer/sections/section-sidebar.php';
        require KEMET_THEME_DIR . 'inc/compatibility/woocommerce/customizer/sections/layout/woo-shop.php';
        require KEMET_THEME_DIR . 'inc/compatibility/woocommerce/customizer/sections/layout/woo-shop-single.php';
        require KEMET_THEME_DIR . 'inc/compatibility/woocommerce/customizer/sections/layout/woo-shop-cart.php';
        require KEMET_THEME_DIR . 'inc/compatibility/woocommerce/customizer/sections/layout/woo-general.php';
        require KEMET_THEME_DIR . 'inc/compatibility/woocommerce/customizer/sections/layout/woo-cart-menu-items.php';
    }

    /**
     * Woocommerce mini cart markup markup
     *
     * @return html
     */
    public function woo_mini_cart_markup()
    {
        if (is_cart()) {
            $class = 'current-menu-item';
        } else {
            $class = '';
        }

        $cart_menu_classes = apply_filters('kemet_cart_in_menu_class', array('kmt-menu-cart-with-border'));

        ob_start();?>
			<div id="kmt-site-header-cart" class="kmt-site-header-cart <?php echo esc_html(implode(' ', $cart_menu_classes)); ?>">
				<div class="kmt-site-header-cart-li <?php echo esc_attr($class); ?>">
					<?php $this->kemet_get_cart_link();?>
				</div>
				<div class="kmt-site-header-cart-data">
					<?php the_widget('WC_Widget_Cart', 'title=');?>
				</div>
			</div>
			<?php
return ob_get_clean();
    }

    /**
     * Add Cart icon markup
     *
     * @param Array $options header options array.
     *
     * @return Array header options array.
     * @since 1.0.0
     */
    public function header_section_elements($options)
    {
        $options['woocommerce'] = 'WooCommerce';

        return $options;
    }

    /**
     * Cart Link
     * Displayed a link to the cart including the number of items present and the cart total
     *
     * @return void
     *
     */
    public function kemet_get_cart_link()
    {
        global $woocommerce;

        $view_shopping_cart = apply_filters('kemet_woo_view_shopping_cart_title', __('View your shopping cart', 'kemet'));
        $cart_display = kemet_get_option('cart-icon-display');
        $cart_icon = kemet_get_option('shop-cart-icon');
        $display = '';
        switch ($cart_display) {
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
                $display = $woocommerce->cart->cart_contents_count . " " . $woocommerce->cart->get_cart_total();
                break;
        }?>
			<a class="cart-container" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php echo esc_attr($view_shopping_cart); ?>">

						<?php
do_action('kemet_woo_header_cart_icons_before');

        if (apply_filters('kemet_woo_default_header_cart_icon', true)) {
            ?>
							<div class="kmt-cart-menu-wrap">

								<span class="count <?php echo $cart_icon; ?>">
									<?php
if (apply_filters('kemet_woo_header_cart_total', true) && null != WC()->cart) {
                echo wp_kses_post($display);
            }?>
								</span>
							</div>
						<?php
}

        do_action('kemet_woo_header_cart_icons_after');?>
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
    public function cart_link_fragment($fragments)
    {
        ob_start();
        $this->kemet_get_cart_link();
        $fragments['a.cart-container'] = ob_get_clean();

        return $fragments;
    }

    /**
     * Hide Cart Icon If Cart Empty
     */
    public function hide_cart_if_empty($classes)
    {
        global $woocommerce;

        $disable_cart = kemet_get_option('disable-cart-if-empty');
        $cart_count = $woocommerce->cart->cart_contents_count;

        if ($cart_count == 0 && $disable_cart) {
            $classes[] = 'hide-cart';
        }

        return $classes;
    }
}

endif;

if (apply_filters('kemet_enable_woocommerce_integration', true)) {
    Kemet_Woocommerce::get_instance();
}