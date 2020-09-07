<?php
/**
 * Beaver Themer Compatibility File.
 *
 * @package Wiz
 */

// If plugin - 'Beaver Builder' not exist then return.
if ( ! class_exists( 'FLThemeBuilderLoader' ) || ! class_exists( 'FLThemeBuilderLayoutData' ) ) {
	return;
}

/**
 * Wiz Beaver Themer Compatibility
 */
if ( ! class_exists( 'Wiz_Beaver_Themer' ) ) :

	/**
	 * Wiz Beaver Themer Compatibility
	 *
	 * @since 1.0.6
	 */
	class Wiz_Beaver_Themer {

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
		function __construct() {
            add_action( 'after_setup_theme', array( $this, 'header_footer_support' ) );
            add_action( 'wp', array( $this, 'replace_theme_header_footer' ) );
            add_filter( 'post_class', array( $this, 'remove_theme_post_class' ), 99 );
            add_action( 'fl_theme_builder_before_render_content', array( $this, 'before_content' ), 10, 1 );
			add_action( 'fl_theme_builder_after_render_content', array( $this, 'after_content' ), 10, 1 );
        }

        /**
		 * Function to add Theme Support
		 *
		 */
		public function header_footer_support() {

			add_theme_support( 'fl-theme-builder-headers' );
			add_theme_support( 'fl-theme-builder-footers' );
			add_theme_support( 'fl-theme-builder-parts' );
        }
        
        
		/**
		 * Function to update Wiz header/footer with Beaver template
		 *
		 */
		public function replace_theme_header_footer() {

			// Get the header ID.
			$header_ids = FLThemeBuilderLayoutData::get_current_page_header_ids();

			// If we have a header, remove the theme header and hook in Theme Builder's.
			if ( ! empty( $header_ids ) ) {
				remove_action( 'wiz_header', 'wiz_header_markup' );
				add_action( 'wiz_header', 'FLThemeBuilderLayoutRenderer::render_header' );
			}

			// Get the footer ID.
			$footer_ids = FLThemeBuilderLayoutData::get_current_page_footer_ids();

			// If we have a footer, remove the theme footer and hook in Theme Builder's.
			if ( ! empty( $footer_ids ) ) {
				remove_action( 'wiz_footer', 'wiz_footer_markup' );
				add_action( 'wiz_footer', 'FLThemeBuilderLayoutRenderer::render_footer' );
			}

        }
        
        /**
		 * Remove theme post's default classes when Beaver Themer template builder is activated.
		 *
		 * @param  array $classes Post Classes.
		 * @return array
		 */
		public function remove_theme_post_class( $classes ) {
			$post_class = array( 'fl-post-grid-post', 'fl-post-gallery-post', 'fl-post-feed-post' );
			$result     = array_intersect( $classes, $post_class );

			if ( count( $result ) > 0 ) {
				$classes = array_diff(
					$classes,
					array(
						// Wiz common grid.
						'wiz-col-xs-1',
						'wiz-col-xs-2',
						'wiz-col-xs-3',
						'wiz-col-xs-4',
						'wiz-col-xs-5',
						'wiz-col-xs-6',
						'wiz-col-xs-7',
						'wiz-col-xs-8',
						'wiz-col-xs-9',
						'wiz-col-xs-10',
						'wiz-col-xs-11',
						'wiz-col-xs-12',
						'wiz-col-sm-1',
						'wiz-col-sm-2',
						'wiz-col-sm-3',
						'wiz-col-sm-4',
						'wiz-col-sm-5',
						'wiz-col-sm-6',
						'wiz-col-sm-7',
						'wiz-col-sm-8',
						'wiz-col-sm-9',
						'wiz-col-sm-10',
						'wiz-col-sm-11',
						'wiz-col-sm-12',
						'wiz-col-md-1',
						'wiz-col-md-2',
						'wiz-col-md-3',
						'wiz-col-md-4',
						'wiz-col-md-5',
						'wiz-col-md-6',
						'wiz-col-md-7',
						'wiz-col-md-8',
						'wiz-col-md-9',
						'wiz-col-md-10',
						'wiz-col-md-11',
						'wiz-col-md-12',
						'wiz-col-lg-1',
						'wiz-col-lg-2',
						'wiz-col-lg-3',
						'wiz-col-lg-4',
						'wiz-col-lg-5',
						'wiz-col-lg-6',
						'wiz-col-lg-7',
						'wiz-col-lg-8',
						'wiz-col-lg-9',
						'wiz-col-lg-10',
						'wiz-col-lg-11',
						'wiz-col-lg-12',
						'wiz-col-xl-1',
						'wiz-col-xl-2',
						'wiz-col-xl-3',
						'wiz-col-xl-4',
						'wiz-col-xl-5',
						'wiz-col-xl-6',
						'wiz-col-xl-7',
						'wiz-col-xl-8',
						'wiz-col-xl-9',
						'wiz-col-xl-10',
						'wiz-col-xl-11',
                        'wiz-col-xl-12',
                        // Wiz Blog / Single Post.
						'wiz-article-post',
						'wiz-article-single',
                    )
				);
			}

			return $classes;
        }
        
        /**
		 * Function to theme before render content
		 *
		 * @param int $post_id Post ID.
		 */
		public function before_content( $post_id ) {

			?>
			<?php if ( 'left-sidebar' === wiz_layout() ) : ?>

				<?php get_sidebar(); ?>

			<?php endif ?>

			<div id="primary" <?php wiz_content_class(); ?>>
			<?php
		}

		/**
		 * Function to theme after render content
		 *
		 * @param int $post_id Post ID.
		 */
		public function after_content( $post_id ) {

			?>
			</div><!-- #primary -->

			<?php if ( 'right-sidebar' === wiz_layout() ) : ?>

				<?php get_sidebar(); ?>

			<?php endif ?>

			<?php
		}
	}

endif;

/**
 * Kicking this off by calling 'get_instance()' method
 */
Wiz_Beaver_Themer::get_instance();
