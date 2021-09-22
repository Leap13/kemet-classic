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
			$selector       = '.kmt-is-sticky';
			$sticky_options = array(
				'sticky-logo-width'             => array(
					'type'         => 'kmt-slider',
					'responsive'   => true,
					'transport'    => 'postMessage',
					'label'        => __( 'Logo Width', 'kemet' ),
					'unit_choices' => array(
						'px' => array(
							'min'  => 1,
							'step' => 1,
							'max'  => 300,
						),
						'em' => array(
							'min'  => 0.1,
							'step' => 0.1,
							'max'  => 12,
						),
						'%'  => array(
							'min'  => 1,
							'step' => 1,
							'max'  => 100,
						),
					),
					'context'      => array(
						array(
							'setting'  => 'sticky-logo',
							'operator' => 'not_empty',
						),
					),
					'preview'      => array(
						'selector'   => '#sitehead ' . $selector . ' .custom-logo-link.sticky-custom-logo img',
						'property'   => '--logoWidth',
						'responsive' => true,
					),
				),
				'enable-sticky-top'             => array(
					'label' => __( 'Sticky Top Header', 'kemet' ),
					'type'  => 'kmt-switcher',
				),
				'enable-sticky-main'            => array(
					'label' => __( 'Sticky Main Header', 'kemet' ),
					'type'  => 'kmt-switcher',
				),
				'enable-sticky-bottom'          => array(
					'label' => __( 'Sticky Bottom Header', 'kemet' ),
					'type'  => 'kmt-switcher',
				),
				'enable-shrink-main'            => array(
					'label'   => __( 'Enable Main Row Shrinking', 'kemet' ),
					'type'    => 'kmt-switcher',
					'context' => array(
						array(
							'setting' => 'enable-sticky-main',
							'value'   => true,
						),
					),
				),
				'main-row-shrink-height'        => array(
					'type'         => 'kmt-slider',
					'label'        => __( 'Main Row Shrink Height', 'kemet' ),
					'suffix'       => '',
					'unit_choices' => array(
						'px' => array(
							'min'  => 5,
							'step' => 1,
							'max'  => 400,
						),
					),
					'context'      => array(
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
					'type'  => 'kmt-title',
					'label' => __( 'Mobile Sticky', 'kemet' ),
				),
				'enable-sticky-mobile-top'      => array(
					'label' => __( 'Sticky Mobile Top Header', 'kemet' ),
					'type'  => 'kmt-switcher',
				),
				'enable-sticky-mobile-main'     => array(
					'label' => __( 'Sticky Mobile Main Header', 'kemet' ),
					'type'  => 'kmt-switcher',
				),
				'enable-sticky-mobile-bottom'   => array(
					'label' => __( 'Sticky Mobile Bottom Header', 'kemet' ),
					'type'  => 'kmt-switcher',
				),
				'enable-shrink-main-mobile'     => array(
					'label'   => __( 'Enable Main Row Shrinking', 'kemet' ),
					'type'    => 'kmt-switcher',
					'context' => array(
						array(
							'setting' => 'enable-sticky-mobile-main',
							'value'   => true,
						),
					),
				),
				'mobile-main-row-shrink-height' => array(
					'type'         => 'kmt-slider',
					'label'        => __( 'Main Row Shrink Height', 'kemet' ),
					'unit_choices' => array(
						'px' => array(
							'min'  => 5,
							'step' => 1,
							'max'  => 400,
						),
					),
					'context'      => array(
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

			$sticky_options = array(
				'sticky-logo'           => array(
					'type'           => 'image',
					'section'        => 'section-sticky-header-options',
					'priority'       => 5,
					'label'          => __( 'Logo Image', 'kemet' ),
					'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
				),
				'sticky-header-options' => array(
					'section' => 'section-sticky-header-options',
					'type'    => 'kmt-options',
					'data'    => array(
						'options' => $sticky_options,
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


