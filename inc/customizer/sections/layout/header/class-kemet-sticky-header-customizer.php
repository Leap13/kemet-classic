<?php
/**
 * Kemet Theme Customizer Register
 *
 * @package Kemet
 */

if ( ! class_exists( 'Kemet_Sticky_Header_Customizer' ) ) :

	/**
	 * Customizer Register
	 */
	class Kemet_Sticky_Header_Customizer extends Kemet_Customizer_Register {

		/**
		 * Register Customizer Options
		 *
		 * @param array $options options.
		 * @return array
		 */
		public function register_options( $options ) {

			$sticky_options = array(
				'foucs-sticky-section'          => array(
					'section'       => 'section-header-builder-layout',
					'priority'      => 5,
					'type'          => 'kmt-focus-button',
					'button_params' => array(
						'title'   => __( 'Sticky Header', 'kemet-addons' ),
						'section' => 'section-sticky-header-options',
					),
				),
				'sticky-logo'                   => array(
					'type'           => 'image',
					'section'        => 'section-sticky-header-options',
					'priority'       => 5,
					'label'          => __( 'Logo Image', 'kemet-addons' ),
					'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
				),
				'sticky-logo-width'             => array(
					'type'         => 'kmt-responsive-slider',
					'transport'    => 'postMessage',
					'section'      => 'section-sticky-header-options',
					'priority'     => 5,
					'label'        => __( 'Logo Width', 'kemet-addons' ),
					'unit_choices' => array(
						'px' => array(
							'min'  => 1,
							'step' => 1,
							'max'  => 300,
						),
						'em' => array(
							'min'  => 0.1,
							'step' => 0.1,
							'max'  => 10,
						),
						'%'  => array(
							'min'  => 1,
							'step' => 1,
							'max'  => 100,
						),
					),
				),
				'enable-sticky-top'             => array(
					'section'  => 'section-sticky-header-options',
					'priority' => 5,
					'label'    => __( 'Sticky Top Header', 'kemet' ),
					'type'     => 'kmt-switcher',
				),
				'enable-sticky-main'            => array(
					'section'  => 'section-sticky-header-options',
					'priority' => 10,
					'label'    => __( 'Sticky Main Header', 'kemet' ),
					'type'     => 'kmt-switcher',
				),
				'enable-sticky-bottom'          => array(
					'section'  => 'section-sticky-header-options',
					'priority' => 15,
					'label'    => __( 'Sticky Bottom Header', 'kemet' ),
					'type'     => 'kmt-switcher',
				),
				'enable-shrink-main'            => array(
					'section'  => 'section-sticky-header-options',
					'priority' => 20,
					'label'    => __( 'Enable Main Row Shrinking', 'kemet' ),
					'type'     => 'kmt-switcher',
					'context'  => array(
						array(
							'setting' => 'enable-sticky-main',
							'value'   => true,
						),
					),
				),
				'main-row-shrink-height'        => array(
					'type'        => 'kmt-slider',
					'section'     => 'section-sticky-header-options',
					'priority'    => 25,
					'label'       => __( 'Main Row Shrink Height', 'kemet' ),
					'suffix'      => '',
					'input_attrs' => array(
						'min'  => 5,
						'step' => 1,
						'max'  => 400,
					),
					'context'     => array(
						array(
							'setting' => 'enable-sticky-main',
							'value'   => true,
						),
						array(
							'setting' => 'enable-shrink-main',
							'value'   => true,
						),
					),
				),
				'sticky-mobile-settings'        => array(
					'type'     => 'kmt-title',
					'label'    => __( 'Mobile Sticky', 'kemet' ),
					'section'  => 'section-sticky-header-options',
					'priority' => 30,
				),
				'enable-sticky-mobile-top'      => array(
					'section'  => 'section-sticky-header-options',
					'priority' => 35,
					'label'    => __( 'Sticky Mobile Top Header', 'kemet' ),
					'type'     => 'kmt-switcher',
				),
				'enable-sticky-mobile-main'     => array(
					'section'  => 'section-sticky-header-options',
					'priority' => 40,
					'label'    => __( 'Sticky Mobile Main Header', 'kemet' ),
					'type'     => 'kmt-switcher',
				),
				'enable-sticky-mobile-bottom'   => array(
					'section'  => 'section-sticky-header-options',
					'priority' => 45,
					'label'    => __( 'Sticky Mobile Bottom Header', 'kemet' ),
					'type'     => 'kmt-switcher',
				),
				'enable-shrink-main-mobile'     => array(
					'section'  => 'section-sticky-header-options',
					'priority' => 50,
					'label'    => __( 'Enable Main Row Shrinking', 'kemet' ),
					'type'     => 'kmt-switcher',
					'context'  => array(
						array(
							'setting' => 'enable-sticky-mobile-main',
							'value'   => true,
						),
					),
				),
				'mobile-main-row-shrink-height' => array(
					'type'        => 'kmt-slider',
					'section'     => 'section-sticky-header-options',
					'priority'    => 55,
					'label'       => __( 'Main Row Shrink Height', 'kemet' ),
					'suffix'      => '',
					'input_attrs' => array(
						'min'  => 5,
						'step' => 1,
						'max'  => 400,
					),
					'context'     => array(
						array(
							'setting' => 'enable-sticky-mobile-main',
							'value'   => true,
						),
						array(
							'setting' => 'enable-shrink-main-mobile',
							'value'   => true,
						),
					),
				),
			);
			return array_merge( $options, $sticky_options );
		}

		/**
		 * Register Customizer Sections
		 *
		 * @param array $sections sections.
		 * @return array
		 */
		public function register_sections( $sections ) {
			$sticky_sections = array(
				'section-sticky-header-options' => array(
					'priority' => 35,
					'title'    => __( 'Sticky Header', 'kemet' ),
					'panel'    => 'panel-header-builder-group',
				),
			);

			return array_merge( $sections, $sticky_sections );

		}
	}

	new Kemet_Sticky_Header_Customizer();
endif;


