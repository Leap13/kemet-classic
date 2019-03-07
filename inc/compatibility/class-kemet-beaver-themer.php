<?php
/**
 * Beaver Themer Compatibility File.
 *
 * @package Kemet
 */

// If plugin - 'Beaver Themer' not exist then return.
if ( ! class_exists( 'FLThemeBuilderLoader' ) || ! class_exists( 'FLThemeBuilderLayoutData' ) ) {
	return;
}

/**
 * Kemet Beaver Themer Compatibility
 */
if ( ! class_exists( 'Kemet_Beaver_Themer' ) ) :

	/**
	 * Kemet Beaver Themer Compatibility
	 *
	 * @since 1.0.0
	 */
	class Kemet_Beaver_Themer {

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
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {
			add_action( 'after_setup_theme', array( $this, 'header_footer_support' ) );
			add_action( 'wp', array( $this, 'theme_header_footer_render' ) );
			add_filter( 'fl_theme_builder_part_hooks', array( $this, 'register_part_hooks' ) );
			add_filter( 'post_class', array( $this, 'render_post_class' ), 99 );
			add_action( 'fl_theme_builder_before_render_content', array( $this, 'builder_before_render_content' ), 10, 1 );
			add_action( 'fl_theme_builder_after_render_content', array( $this, 'builder_after_render_content' ), 10, 1 );
		}

		/**
		 * Builder Template Content layout set as Full Width / Stretched
		 *
		 * @param  string $layout Content Layout.
		 * @return string
		 */
		function builder_template_content_layout( $layout ) {

			$ids       = FLThemeBuilderLayoutData::get_current_page_content_ids();
			$post_type = get_post_type();

			if ( 'fl-theme-layout' == $post_type ) {
				remove_action( 'kemet_entry_after', 'kemet_single_post_navigation_markup' );
			}

			if ( empty( $ids ) && 'fl-theme-layout' != $post_type ) {
				return $layout;
			}

			return 'page-builder';
		}

		/**
		 * Remove theme post's default classes
		 *
		 * @param  array $classes Post Classes.
		 * @return array
		 */
		function render_post_class( $classes ) {

			$post_class = array( 'fl-post-grid-post', 'fl-post-gallery-post', 'fl-post-feed-post' );
			$result     = array_intersect( $classes, $post_class );

			if ( count( $result ) > 0 ) {
				$classes = array_diff( $classes, array( 'kmt-col-sm-12', 'kmt-article-post' ) );
				add_filter( 'kemet_post_link_enabled', '__return_false' );
			}
			return $classes;
		}

		/**
		 * Function to add Theme Support
		 *
		 * @since 1.0.0
		 */
		function header_footer_support() {

			add_theme_support( 'fl-theme-builder-headers' );
			add_theme_support( 'fl-theme-builder-footers' );
			add_theme_support( 'fl-theme-builder-parts' );
		}

		/**
		 * Function to update Kemet header/footer with Beaver template
		 *
		 * @since 1.0.0
		 */
		function theme_header_footer_render() {

			// Get the header ID.
			$header_ids = FLThemeBuilderLayoutData::get_current_page_header_ids();

			// If we have a header, remove the theme header and hook in Theme Builder's.
			if ( ! empty( $header_ids ) ) {
				remove_action( 'kemet_header', 'kemet_header_markup' );
				add_action( 'kemet_header', 'FLThemeBuilderLayoutRenderer::render_header' );
			}

			// Get the footer ID.
			$footer_ids = FLThemeBuilderLayoutData::get_current_page_footer_ids();

			// If we have a footer, remove the theme footer and hook in Theme Builder's.
			if ( ! empty( $footer_ids ) ) {
				remove_action( 'kemet_footer', 'kemet_footer_markup' );
				add_action( 'kemet_footer', 'FLThemeBuilderLayoutRenderer::render_footer' );
			}

			// BB Themer Support.
			$template_ids = FLThemeBuilderLayoutData::get_current_page_content_ids();

			if ( ! empty( $template_ids ) ) {

				$template_id   = $template_ids[0];
				$template_type = get_post_meta( $template_id, '_fl_theme_layout_type', true );

				if ( 'archive' === $template_type || 'singular' === $template_type || '404' === $template_type ) {

					$sidebar = get_post_meta( $template_id, 'site-sidebar-layout', true );

					if ( 'default' !== $sidebar ) {
						add_filter(
							'kemet_layout', function( $page_layout ) use ( $sidebar ) {

								return $sidebar;
							}
						);
					}

					$content_layout = get_post_meta( $template_id, 'site-content-layout', true );
					if ( 'default' !== $content_layout ) {
						add_filter(
							'kemet_get_content_layout', function( $layout ) use ( $content_layout ) {

								return $content_layout;
							}
						);
					}

					$main_header_display = get_post_meta( $template_id, 'kmt-main-header-display', true );
					if ( 'disabled' === $main_header_display ) {

						if ( 'archive' === $template_type ) {
							remove_action( 'kemet_masthead', 'kemet_masthead_primary_template' );
						} else {
							add_filter(
								'kmt_main_header_display', function( $display_header ) {

									return 'disabled';
								}
							);
						}
					}

					$footer_layout = get_post_meta( $template_id, 'footer-sml-layout', true );
					if ( 'disabled' === $footer_layout ) {

						add_filter(
							'kmt_footer_sml_layout', function( $is_footer ) {

								return 'disabled';
							}
						);
					}

					// Override! Footer Widgets.
					$footer_widgets = get_post_meta( $template_id, 'footer-adv-display', true );
					if ( 'disabled' === $footer_widgets ) {
						add_filter(
							'kemet_advanced_footer_disable', function() {
								return true;
							}
						);
					}
				}
			}
		}

		/**
		 * Function to Kemet theme parts
		 *
		 * @since 1.0.0
		 */
		function register_part_hooks() {

			return array(
				array(
					'label' => 'Page',
					'hooks' => array(
						'kemet_body_top'    => __( 'Before Page', 'kemet' ),
						'kemet_body_bottom' => __( 'After Page', 'kemet' ),
					),
				),
				array(
					'label' => 'Header',
					'hooks' => array(
						'kemet_header_before' => __( 'Before Header', 'kemet' ),
						'kemet_header_after'  => __( 'After Header', 'kemet' ),
					),
				),
				array(
					'label' => 'Content',
					'hooks' => array(
						'kemet_primary_content_top'    => __( 'Before Content', 'kemet' ),
						'kemet_primary_content_bottom' => __( 'After Content', 'kemet' ),
					),
				),
				array(
					'label' => 'Footer',
					'hooks' => array(
						'kemet_footer_before' => __( 'Before Footer', 'kemet' ),
						'kemet_footer_after'  => __( 'After Footer', 'kemet' ),
					),
				),
				array(
					'label' => 'Sidebar',
					'hooks' => array(
						'kemet_sidebars_before' => __( 'Before Sidebar', 'kemet' ),
						'kemet_sidebars_after'  => __( 'After Sidebar', 'kemet' ),
					),
				),
				array(
					'label' => 'Posts',
					'hooks' => array(
						'loop_start'                 => __( 'Loop Start', 'kemet' ),
						'kemet_entry_top'            => __( 'Before Post', 'kemet' ),
						'kemet_entry_content_before' => __( 'Before Post Content', 'kemet' ),
						'kemet_entry_content_after'  => __( 'After Post Content', 'kemet' ),
						'kemet_entry_bottom'         => __( 'After Post', 'kemet' ),
						'kemet_comments_before'      => __( 'Before Comments', 'kemet' ),
						'kemet_comments_after'       => __( 'After Comments', 'kemet' ),
						'loop_end'                   => __( 'Loop End', 'kemet' ),
					),
				),
			);
		}

		/**
		 * Function to theme before render content
		 *
		 * @param int $post_id Post ID.
		 */
		function builder_before_render_content( $post_id ) {

		?>
			<?php if ( 'left-sidebar' === kemet_layout() ) : ?>

				<?php get_sidebar(); ?>

			<?php endif ?>

			<div id="primary" <?php kemet_primary_class(); ?>>
		<?php
		}

		/**
		 * Function to theme after render content
		 *
		 * @param int $post_id Post ID.
		 * 
		 */
		function builder_after_render_content( $post_id ) {

		?>
			</div><!-- #primary -->

			<?php if ( 'right-sidebar' === kemet_layout() ) : ?>

				<?php get_sidebar(); ?>

			<?php endif ?>

		<?php
		}
	}

endif;

/**
 * Kicking this off by calling 'get_instance()' method
 */
Kemet_Beaver_Themer::get_instance();
