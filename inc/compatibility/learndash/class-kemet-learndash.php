<?php
/**
 * LearnDash Compatibility File.
 *
 * @package Kemet
 */

// If plugin - 'LearnDash' not exist then return.
if ( ! class_exists( 'SFWD_LMS' ) ) {
	return;
}

/**
 * Kemet LearnDash Compatibility
 */
if ( ! class_exists( 'Kemet_LearnDash' ) ) :

	/**
	 * Kemet LearnDash Compatibility
	 */
	class Kemet_LearnDash {

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
			add_action( 'customize_register', array( $this, 'customize_register' ) );
			// Content Layout.
			add_filter( 'kemet_get_content_layout', array( $this, 'content_layout' ) );
			// Sidebar Layout.
			add_filter( 'kemet_layout', array( $this, 'sidebar_layout' ) );
			add_filter( 'kemet_dynamic_css', array( $this, 'dynamic_css' ) );
		}

		/**
		 * Register Customizer sections and panel for learnDash
		 *
		 * @since 1.0.0
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public function customize_register( $wp_customize ) {

            // @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			/**
			 * Register Sections & Panels
			 */
			require_once KEMET_THEME_DIR . 'inc/compatibility/learndash/customizer/register-panels-and-sections.php';
            require_once KEMET_THEME_DIR . 'inc/compatibility/learndash/customizer/sections/section-container.php';
            require_once KEMET_THEME_DIR . 'inc/compatibility/learndash/customizer/sections/section-sidebar.php';
            // @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		}

		/**
		 * LearnDash Container
		 *
		 * @param string $sidebar_layout Layout type.
		 *
		 * @return string $sidebar_layout Layout type.
		 */
		public function sidebar_layout( $sidebar_layout ) {
			if ( is_singular( 'sfwd-courses' ) || is_singular( 'sfwd-lessons' ) || is_singular( 'sfwd-topic' ) || is_singular( 'sfwd-quiz' ) || is_singular( 'sfwd-certificates' ) || is_singular( 'sfwd-assignment' ) ) {
				$learndash_sidebar = kemet_get_option( 'learndash-sidebar-layout' );
				$sidebar           = '';
				if ( 'default' !== $learndash_sidebar ) {
					$sidebar_layout = $learndash_sidebar;
				}

				if ( class_exists( 'KFW' ) ) {
					$meta    = get_post_meta( get_the_ID(), 'kemet_page_options', true );
					$sidebar = ( isset( $meta['site-sidebar-layout'] ) && $meta['site-sidebar-layout'] ) ? $meta['site-sidebar-layout'] : 'default';
				}

				if ( 'default' !== $sidebar && ! empty( $sidebar ) ) {
					$sidebar_layout = $sidebar;
				}
			}

			return $sidebar_layout;
		}

		/**
		 * LearnDash Container
		 *
		 * @param string $layout Layout type.
		 *
		 * @return string $layout Layout type.
		 */
		public function content_layout( $layout ) {
			if ( is_singular( 'sfwd-courses' ) || is_singular( 'sfwd-lessons' ) || is_singular( 'sfwd-topic' ) || is_singular( 'sfwd-quiz' ) || is_singular( 'sfwd-certificates' ) || is_singular( 'sfwd-assignment' ) ) {
				$learndash_layout = kemet_get_option( 'learndash-content-layout' );
				$shop_layout      = 'default';

				if ( 'default' !== $learndash_layout ) {
					$layout = $learndash_layout;
				}

				if ( class_exists( 'KFW' ) ) {
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
		 * Dynamic CSS
		 *
		 * @param  string $dynamic_css dynamic css.
		 * @return string
		 */
		public function dynamic_css( $dynamic_css ) {

			$is_site_rtl     = is_rtl();
			$link_color      = kemet_get_option( 'content-link-color' );
			$theme_color     = kemet_get_option( 'theme-color' );
			$text_meta_color = kemet_get_option( 'text-meta-color' );
			$link_h_color    = kemet_get_option( 'content-link-h-color' );

			$body_font_family = kemet_body_font_family();

			$link_forground_color         = kemet_get_foreground_color( $link_color );
			$theme_forground_color        = kemet_get_foreground_color( $theme_color );
			$btn_text_color               = kemet_get_option( 'button-color', '#ffffff' );
			$btn_font_size                = kemet_get_option( 'buttons-font-size' );
			$btn_font_family              = kemet_get_option( 'buttons-font-family' );
			$btn_font_weight              = kemet_get_option( 'buttons-font-weight' );
			$btn_text_tranform            = kemet_get_option( 'buttons-text-transform' );
			$btn_font_style               = kemet_get_option( 'buttons-font-style' );
			$btn_line_height              = kemet_get_option( 'buttons-line-height' );
			$btn_letter_spacing           = kemet_get_option( 'buttons-letter-spacing' );
			$btn_border_radius            = kemet_get_option( 'button-radius' );
			$btn_padding                  = kemet_get_option( 'button-spacing' );
			$btn_text_hover_color         = kemet_get_option( 'button-h-color' );
			$btn_bg_color                 = kemet_get_option( 'button-bg-color', $theme_color );
			$btn_border_size              = kemet_get_option( 'btn-border-size' );
			$btn_border_color             = kemet_get_option( 'btn-border-color' );
			$btn_border_h_color           = kemet_get_option( 'btn-border-h-color' );
			$btn_bg_hover_color           = kemet_get_option( 'button-bg-h-color', kemet_color_brightness( $theme_color, 0.8, 'dark' ) );
			$archive_post_title_font_size = kemet_get_option( 'font-size-page-title' );

			$css_output = array(
				'body #learndash_lessons a, body #learndash_quizzes a, body .expand_collapse a, body .learndash_topic_dots a, body .learndash_topic_dots a > span, body #learndash_lesson_topics_list span a, body #learndash_profile a, body #learndash_profile a span' => array(
					'font-family' => kemet_get_font_family( $body_font_family ),
				),
				'body #ld_course_list .btn, body a.btn-blue, body a.btn-blue:visited, body a#quiz_continue_link, body .btn-join, body .learndash_checkout_buttons input.btn-join[type="button"], body #btn-join, body .learndash_checkout_buttons input.btn-join[type="submit"], body .wpProQuiz_content .wpProQuiz_button2' => array(
					'border-radius'    => kemet_responsive_slider( $btn_border_radius, 'desktop' ),
					'color'            => esc_attr( $btn_text_color ),
					'background-color' => esc_attr( $btn_bg_color ),
					'border'           => 'solid',
					'border-color'     => esc_attr( $btn_border_color ),
					'border-width'     => kemet_get_css_value( $btn_border_size, 'px' ),
					'padding-top'      => kemet_responsive_spacing( $btn_padding, 'top', 'desktop' ),
					'padding-bottom'   => kemet_responsive_spacing( $btn_padding, 'bottom', 'desktop' ),
					'padding-right'    => kemet_responsive_spacing( $btn_padding, 'right', 'desktop' ),
					'padding-left'     => kemet_responsive_spacing( $btn_padding, 'left', 'desktop' ),
					'font-size'        => kemet_responsive_slider( $btn_font_size, 'desktop' ),
					'font-family'      => kemet_get_font_family( $btn_font_family ),
					'font-weight'      => esc_attr( $btn_font_weight ),
					'text-transform'   => esc_attr( $btn_text_tranform ),
					'font-style'       => esc_attr( $btn_font_style ),
					'line-height'      => kemet_responsive_slider( $btn_line_height, 'desktop' ),
					'letter-spacing'   => kemet_responsive_slider( $btn_letter_spacing, 'desktop' ),
				),
				'body #ld_course_list .btn:hover, body #ld_course_list .btn:focus, body a.btn-blue:hover, body a.btn-blue:focus, body a#quiz_continue_link:hover, body a#quiz_continue_link:focus, body .btn-join:hover, body .learndash_checkout_buttons input.btn-join[type="button"]:hover, body .btn-join:focus, body .learndash_checkout_buttons input.btn-join[type="button"]:focus, .wpProQuiz_content .wpProQuiz_button2:hover, .wpProQuiz_content .wpProQuiz_button2:focus, body #btn-join:hover, body .learndash_checkout_buttons input.btn-join[type="submit"]:hover, body #btn-join:focus, body .learndash_checkout_buttons input.btn-join[type="submit"]:focus' => array(
					'color'            => esc_attr( $btn_text_hover_color ),
					'border-color'     => esc_attr( $btn_border_h_color ),
					'background-color' => esc_attr( $btn_bg_hover_color ),
				),
				'body dd.course_progress div.course_progress_blue, body .wpProQuiz_content .wpProQuiz_time_limit .wpProQuiz_progress' => array(
					'background-color' => $theme_color,
				),
				'body #learndash_lessons a, body #learndash_quizzes a, body .expand_collapse a, body .learndash_topic_dots a, body .learndash_topic_dots a > span, body #learndash_lesson_topics_list span a, body #learndash_profile a, #learndash_profile .profile_edit_profile a, body #learndash_profile .expand_collapse a, body #learndash_profile a span, #lessons_list .list-count, #quiz_list .list-count' => array(
					'color' => $link_color,
				),
				'.learndash .notcompleted:before, #learndash_profile .notcompleted:before, .learndash_topic_dots ul .topic-notcompleted span:before, .learndash_navigation_lesson_topics_list .topic-notcompleted span:before, .learndash_navigation_lesson_topics_list ul .topic-notcompleted span:before, .learndash .topic-notcompleted span:before' => array(
					'color' => kemet_hex_to_rgba( $text_meta_color, .5 ),
				),
				'body .thumbnail.course .ld_course_grid_price, body .thumbnail.course .ld_course_grid_price.ribbon-enrolled, body #learndash_lessons #lesson_heading, body #learndash_profile .learndash_profile_heading, body #learndash_quizzes #quiz_heading, body #learndash_lesson_topics_list div > strong, body .learndash-pager span a, body #learndash_profile .learndash_profile_quiz_heading' => array(
					'background-color' => $theme_color,
					'color'            => $theme_forground_color,
				),
				'.learndash .completed:before, #learndash_profile .completed:before, .learndash_topic_dots ul .topic-completed span:before, .learndash_navigation_lesson_topics_list .topic-completed span:before, .learndash_navigation_lesson_topics_list ul .topic-completed span:before, .learndash .topic-completed span:before, body .list_arrow.lesson_completed:before' => array(
					'color' => $theme_color,
				),
				'body .thumbnail.course .ld_course_grid_price:before' => array(
					'border-top-color'   => kemet_hex_to_rgba( $theme_color, .75 ),
					'border-right-color' => kemet_hex_to_rgba( $theme_color, .75 ),
				),
				'body .wpProQuiz_loadQuiz, body .wpProQuiz_lock' => array(
					'border-color'     => kemet_hex_to_rgba( $link_color, .5 ),
					'background-color' => kemet_hex_to_rgba( $link_color, .1 ),
				),
				'#ld_course_list .entry-title' => array(
					'font-size' => kemet_responsive_font( $archive_post_title_font_size, 'desktop' ),
				),
			);

			/* Parse CSS from array() */
			$css_output = kemet_parse_css( $css_output );

			$tablet_typography = array(
				'#ld_course_list .entry-title' => array(
					'font-size' => kemet_responsive_font( $archive_post_title_font_size, 'tablet', 30 ),
				),
				'body #learndash_lessons a, body #learndash_quizzes a, body .expand_collapse a, body .learndash_topic_dots a, body .learndash_topic_dots a > span, body #learndash_lesson_topics_list span a, body #learndash_profile a, body #learndash_profile a span' => array(
					'font-family' => kemet_get_font_family( $body_font_family ),
				),
				'body #ld_course_list .btn, body a.btn-blue, body a.btn-blue:visited, body a#quiz_continue_link, body .btn-join, body .learndash_checkout_buttons input.btn-join[type="button"], body #btn-join, body .learndash_checkout_buttons input.btn-join[type="submit"], body .wpProQuiz_content .wpProQuiz_button2' => array(
					'border-radius'  => kemet_responsive_slider( $btn_border_radius, 'tablet' ),
					'border-width'   => kemet_get_css_value( $btn_border_size, 'px' ),
					'padding-top'    => kemet_responsive_spacing( $btn_padding, 'top', 'tablet' ),
					'padding-bottom' => kemet_responsive_spacing( $btn_padding, 'bottom', 'tablet' ),
					'padding-right'  => kemet_responsive_spacing( $btn_padding, 'right', 'tablet' ),
					'padding-left'   => kemet_responsive_spacing( $btn_padding, 'left', 'tablet' ),
					'font-size'      => kemet_responsive_slider( $btn_font_size, 'tablet' ),
					'line-height'    => kemet_responsive_slider( $btn_line_height, 'tablet' ),
					'letter-spacing' => kemet_responsive_slider( $btn_letter_spacing, 'tablet' ),
				),
			);
			/* Parse CSS from array()*/
			$css_output .= kemet_parse_css( $tablet_typography, '', '768' );

			if ( $is_site_rtl ) {
				$mobile_min_width_css = array(
					'body #learndash_profile .profile_edit_profile' => array(
						'position' => 'absolute',
						'top'      => '15px',
						'left'     => '15px',
					),
				);
			} else {
				$mobile_min_width_css = array(
					'body #learndash_profile .profile_edit_profile' => array(
						'position' => 'absolute',
						'top'      => '15px',
						'right'    => '15px',
					),
				);
			}

			/* Parse CSS from array() -> min-width: (mobile-breakpoint + 1) px */
			$css_output .= kemet_parse_css( $mobile_min_width_css, '', '544' );

			$mobile_typography = array(
				'#ld_course_list .entry-title'          => array(
					'font-size' => kemet_responsive_font( $archive_post_title_font_size, 'mobile', 30 ),
				),
				'#learndash_next_prev_link a'           => array(
					'width' => '100%',
				),
				'#learndash_next_prev_link a.prev-link' => array(
					'margin-bottom' => '1em',
				),
				'#ld_course_info_mycourses_list .ld-course-info-my-courses .ld-entry-title' => array(
					'margin' => '0 0 20px',
				),
				'body #ld_course_list .btn, body a.btn-blue, body a.btn-blue:visited, body a#quiz_continue_link, body .btn-join, body .learndash_checkout_buttons input.btn-join[type="button"], body #btn-join, body .learndash_checkout_buttons input.btn-join[type="submit"], body .wpProQuiz_content .wpProQuiz_button2' => array(
					'border-radius'  => kemet_responsive_slider( $btn_border_radius, 'mobile' ),
					'border-width'   => kemet_get_css_value( $btn_border_size, 'px' ),
					'padding-top'    => kemet_responsive_spacing( $btn_padding, 'top', 'mobile' ),
					'padding-bottom' => kemet_responsive_spacing( $btn_padding, 'bottom', 'mobile' ),
					'padding-right'  => kemet_responsive_spacing( $btn_padding, 'right', 'mobile' ),
					'padding-left'   => kemet_responsive_spacing( $btn_padding, 'left', 'mobile' ),
					'font-size'      => kemet_responsive_slider( $btn_font_size, 'mobile' ),
					'line-height'    => kemet_responsive_slider( $btn_line_height, 'mobile' ),
					'letter-spacing' => kemet_responsive_slider( $btn_letter_spacing, 'mobile' ),
				),
			);

			/* Parse CSS from array() -> max-width: (mobile-breakpoint) px */
			$css_output .= kemet_parse_css( $mobile_typography, '', kemet_get_mobile_breakpoint() );

			if ( $is_site_rtl ) {
				$mobile_typography_direction_css = array(
					'#ld_course_info_mycourses_list .ld-course-info-my-courses img' => array(
						'display'      => 'block',
						'margin-right' => 'initial',
						'max-width'    => '100%',
						'margin'       => '10px 0',
					),
				);
			} else {
				$mobile_typography_direction_css = array(
					'#ld_course_info_mycourses_list .ld-course-info-my-courses img' => array(
						'display'     => 'block',
						'margin-left' => 'initial',
						'max-width'   => '100%',
						'margin'      => '10px 0',
					),
				);
			}

			/* Parse CSS from array() -> max-width: (mobile-breakpoint) px */
			$css_output .= kemet_parse_css( $mobile_typography_direction_css, '', '544' );

			$dynamic_css .= apply_filters( 'kemet_theme_learndash_dynamic_css', $css_output );

			return $dynamic_css;
		}
	}

endif;

if ( apply_filters( 'kemet_enable_learndash_integration', true ) ) {
	Kemet_Learndash::get_instance();
}
