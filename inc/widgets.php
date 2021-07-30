<?php
/**
 * Widget and sidebars related functions
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

/**
 * WordPress filter - Widget Tags
 */
if ( ! function_exists( 'kemet_widget_tag_cloud_args' ) ) :

	/**
	 * WordPress filter - Widget Tags
	 *
	 * @param  array $args Tag arguments.
	 * @return array       Modified tag arguments.
	 */
	function kemet_widget_tag_cloud_args( $args = array() ) {

		$sidebar_link_font_size            = kemet_get_option( 'font-size-body' );
		$sidebar_link_font_size['desktop'] = ( '' != $sidebar_link_font_size['desktop'] ) ? $sidebar_link_font_size['desktop'] : 15;

		$args['smallest'] = intval( $sidebar_link_font_size['desktop'] ) - 2;
		$args['largest']  = intval( $sidebar_link_font_size['desktop'] ) + 3;
		$args['unit']     = 'px';

		return apply_filters( 'kemet_widget_tag_cloud_args', $args );
	}
	add_filter( 'widget_tag_cloud_args', 'kemet_widget_tag_cloud_args', 90 );

endif;

/**
 * WordPress filter - Widget Categories
 */
if ( ! function_exists( 'kemet_filter_widget_tag_cloud' ) ) :

	/**
	 * WordPress filter - Widget Categories
	 *
	 * @param  array $tags_data Tags data.
	 * @return array            Modified tags data.
	 */
	function kemet_filter_widget_tag_cloud( $tags_data ) {

		if ( is_tag() ) {
			foreach ( $tags_data as $key => $tag ) {
				if ( get_queried_object_id() === (int) $tags_data[ $key ]['id'] ) {
					$tags_data[ $key ]['class'] = $tags_data[ $key ]['class'] . ' current-item';
				}
			}
		}

		return apply_filters( 'kemet_filter_widget_tag_cloud', $tags_data );
	}
	add_filter( 'wp_generate_tag_cloud_data', 'kemet_filter_widget_tag_cloud' );

endif;

/**
 * Register widget area.
 */
if ( ! function_exists( 'kemet_widgets_init' ) ) :

	/**
	 * Register widget area.
	 *
	 * @see https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function kemet_widgets_init() {

		/**
		 * Register Main Sidebar
		 */
		register_sidebar(
			apply_filters(
				'kemet_widgets_init',
				array(
					'name'          => esc_html__( 'Main Sidebar', 'kemet' ),
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
				'kemet_header_widgets_init',
				array(
					'name'          => esc_html__( 'Header', 'kemet' ),
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
				'kemet_header_right_section',
				array(
					'name'          => esc_html__( 'Header Right Section', 'kemet' ),
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
				'kemet_footer_1_widgets_init',
				array(
					'name'          => esc_html__( 'Footer Bar Section 1', 'kemet' ),
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
				'kemet_footer_2_widgets_init',
				array(
					'name'          => esc_html__( 'Footer Bar Section 2', 'kemet' ),
					'id'            => 'copyright-widget-2',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<div class="widget-head"><div class="title"><h4 class="widget-title">',
					'after_title'   => '</h4></div></div>',
				)
			)
		);

	}
	add_action( 'widgets_init', 'kemet_widgets_init' );

endif;
/**
 * Insert Widget attributes
 */
if ( ! function_exists( 'insert_attributes' ) ) :

	/**
	 * Insert Widget attributes
	 */
	function insert_attributes( $params ) {
			global $wp_registered_widgets;

			$settings_getter = $wp_registered_widgets[ $params[0]['widget_id'] ]['callback'][0];
			$settings_get    = $settings_getter->get_settings();
			$settings        = $settings_get[ $params[1]['number'] ];

		if ( empty( $settings['title'] ) ) {
			$params[0]['before_widget'] .= '<div class="widget-content">';
			$params[0]['after_widget']   = '</div>' . $params[0]['after_widget'];
		} elseif ( isset( $settings['title'] ) ) {
			$params[0]['after_title'] .= '<div class="widget-content">';
			$params[0]['after_widget'] = '</div>' . $params[0]['after_widget'];
		} else {
			$params[0]['before_widget'] .= '<div class="widget-content">';
			$params[0]['after_widget']   = '</div>' . $params[0]['after_widget'];
		}

			$widget_id = $params[0]['widget_id'];

			$widget_style = kemet_get_option( 'widgets-style' );

			$kmt_widget_class = '';
		if ( ! empty( $widget_style ) ) {
			$kmt_widget_class = 'kmt-widget-' . $widget_style;
		}

			// Footer Custom Style.
			$kmt_footet_widget_class = '';
			$footer_widget_style     = kemet_get_option( 'footer-widgets-style' );

		if ( ( ! empty( $footer_widget_style ) ) && ( strpos( $params[0]['id'], 'main-footer-widget' ) !== false || strpos( $params[0]['id'], 'copyright-widget' ) !== false ) ) {
			$kmt_widget_class = 'kmt-widget-' . $footer_widget_style;
		}
		if ( ! empty( $kmt_widget_class ) && ( strpos( $params[0]['id'], 'header-widget' ) !== 0 ) ) {
			$params[0] = array_replace( $params[0], array( 'before_widget' => str_replace( 'widget ', 'widget ' . $kmt_widget_class . ' ', $params[0]['before_widget'] ) ) );
		}

			return $params;
	}
	add_filter( 'dynamic_sidebar_params', 'insert_attributes' );
endif;
