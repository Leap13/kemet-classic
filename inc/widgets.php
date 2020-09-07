<?php
/**
 * Widget and sidebars related functions
 *
 * @package     Wiz
 * @author      Wiz
 * @copyright   Copyright (c) 2019, Wiz
 * @link        https://wiz.io/
 * @since       Wiz 1.0.0
 */

/**
 * WordPress filter - Widget Tags
 */
if ( ! function_exists( 'wiz_widget_tag_cloud_args' ) ) :

	/**
	 * WordPress filter - Widget Tags
	 *
	 * @param  array $args Tag arguments.
	 * @return array       Modified tag arguments.
	 */
	function wiz_widget_tag_cloud_args( $args = array() ) {

		$sidebar_link_font_size            = wiz_get_option( 'font-size-body' );
		$sidebar_link_font_size['desktop'] = ( '' != $sidebar_link_font_size['desktop'] ) ? $sidebar_link_font_size['desktop'] : 15;

		$args['smallest'] = intval( $sidebar_link_font_size['desktop'] ) - 2;
		$args['largest']  = intval( $sidebar_link_font_size['desktop'] ) + 3;
		$args['unit']     = 'px';

		return apply_filters( 'wiz_widget_tag_cloud_args', $args );
	}
	add_filter( 'widget_tag_cloud_args', 'wiz_widget_tag_cloud_args', 90 );

endif;

/**
 * WordPress filter - Widget Categories
 */
if ( ! function_exists( 'wiz_filter_widget_tag_cloud' ) ) :

	/**
	 * WordPress filter - Widget Categories
	 *
	 * @param  array $tags_data Tags data.
	 * @return array            Modified tags data.
	 */
	function wiz_filter_widget_tag_cloud( $tags_data ) {

		if ( is_tag() ) {
			foreach ( $tags_data as $key => $tag ) {
				if ( get_queried_object_id() === (int) $tags_data[ $key ]['id'] ) {
					$tags_data[ $key ]['class'] = $tags_data[ $key ]['class'] . ' current-item';
				}
			}
		}

		return apply_filters( 'wiz_filter_widget_tag_cloud', $tags_data );
	}
	add_filter( 'wp_generate_tag_cloud_data', 'wiz_filter_widget_tag_cloud' );

endif;

/**
 * Register widget area.
 */
if ( ! function_exists( 'wiz_widgets_init' ) ) :

	/**
	 * Register widget area.
	 *
	 * @see https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function wiz_widgets_init() {

		/**
		 * Register Main Sidebar
		 */
		register_sidebar(
			apply_filters(
				'wiz_widgets_init', array(
					'name'          => esc_html__( 'Main Sidebar', 'wiz' ),
					'id'            => 'sidebar-1',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="widget-head"><div class="title"><h4 class="widget-title">',
					'after_title'   => '</h4></div></div>',
				)
			)
		);

		/**
		 * Register Header Widgets area
		 */
		register_sidebar(
			apply_filters(
				'wiz_header_widgets_init', array(
					'name'          => esc_html__( 'Header', 'wiz' ),
					'id'            => 'header-widget',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="widget-head"><div class="title"><h4 class="widget-title">',
					'after_title'   => '</h4></div></div>',
				)
			)
		);

		register_sidebar(
			apply_filters(
				'wiz_header_right_section', array(
				'name'          => esc_html__( 'Header Right Section', 'wiz' ),
				'id'            => 'header-right-section',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-head"><div class="title"><h4 class="widget-title">',
				'after_title'   => '</h4></div></div>',
			)
			)
		);
		
		/**
		 * Register Footer Bar Widgets area
		 */
		register_sidebar(
			apply_filters(
				'wiz_footer_1_widgets_init', array(
					'name'          => esc_html__( 'Footer Bar Section 1', 'wiz' ),
					'id'            => 'copyright-widget-1',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="widget-head"><div class="title"><h4 class="widget-title">',
					'after_title'   => '</h4></div></div>',
				)
			)
		);

		register_sidebar(
			apply_filters(
				'wiz_footer_2_widgets_init', array(
					'name'          => esc_html__( 'Footer Bar Section 2', 'wiz' ),
					'id'            => 'copyright-widget-2',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="widget-head"><div class="title"><h4 class="widget-title">',
					'after_title'   => '</h4></div></div>',
				)
			)
		);

		/**
		 * Register Footer Widgets area
		 */
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Widget 1', 'wiz' ),
				'id'            => 'main-footer-widget-1',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-head"><div class="title"><h4 class="widget-title">',
				'after_title'   => '</h4></div></div>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Widget 2', 'wiz' ),
				'id'            => 'main-footer-widget-2',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-head"><div class="title"><h4 class="widget-title">',
				'after_title'   => '</h4></div></div>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Widget 3', 'wiz' ),
				'id'            => 'main-footer-widget-3',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-head"><div class="title"><h4 class="widget-title">',
				'after_title'   => '</h4></div></div>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Widget 4', 'wiz' ),
				'id'            => 'main-footer-widget-4',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-head"><div class="title"><h4 class="widget-title">',
				'after_title'   => '</h4></div></div>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer Widget 5', 'wiz' ),
				'id'            => 'main-footer-widget-5',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-head"><div class="title"><h4 class="widget-title">',
				'after_title'   => '</h4></div></div>',
			)
		);


	}
	add_action( 'widgets_init', 'wiz_widgets_init' );

endif;
