<?php
/**
 * WooCommerce General Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

class Kemet_Woo_General_Customizer extends Kemet_Customizer_Register {

	/**
	 * prefix
	 *
	 * @access private
	 * @var string
	 */
	private static $prefix;

	/**
	 * Register Customizer Options
	 *
	 * @param array $options options.
	 * @return array
	 */
	public function register_options( $options ) {
		self::$prefix     = 'woo-general';
		$selector         = '';
		$register_options = array(
			self::$prefix . '-tabs' => array(
				'type' => 'kmt-tabs',
				'tabs' => array(
					'general' => array(
						'title'   => __( 'General', 'kemet' ),
						'options' => array(
							'sale-content' => array(
								'type'    => 'kmt-select',
								'label'   => __( 'Sale Notification Content', 'kemet' ),
								'choices' => array(
									'sale-text' => __( 'Text', 'kemet' ),
									'percent'   => __( 'Percentage', 'kemet' ),
								),
							),
						),
					),
					'design'  => array(
						'title'   => __( 'Design', 'kemet' ),
						'options' => array(
							'kmt-sale-title'      => array(
								'type'  => 'kmt-title',
								'label' => __( 'On Sale Badge', 'kemet' ),
							),
							'sale-text-color'       => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'label'     => __( 'Color', 'kemet' ),
								'pickers'   => array(
									array(
										'id'    => 'initial',
										'title' => __( 'Initial', 'kemet' ),
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => '.woocommerce .product .onsale , .product .onsale',
										'property' => '--buttonColor',
									),
								),
							),
							'sale-background-color' => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'label'     => __( 'Background Color', 'kemet' ),
								'pickers'   => array(
									array(
										'id'    => 'initial',
										'title' => __( 'Initial', 'kemet' ),
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => '.woocommerce .product .onsale , .product .onsale',
										'property' => '--buttonBackgroundColor',
									),
								),
							),
							'kmt-rating-title'      => array(
								'type'  => 'kmt-title',
								'label' => __( 'Rating Style', 'kemet' ),
							),
							'rating-color'          => array(
								'type'      => 'kmt-color',
								'transport' => 'postMessage',
								'label'     => __( 'Rating color', 'kemet' ),
								'pickers'   => array(
									array(
										'id'    => 'initial',
										'title' => __( 'Initial', 'kemet' ),
									),
								),
								'preview'   => array(
									'initial' => array(
										'selector' => '.woocommerce .star-rating, .woocommerce .comment-form-rating .stars a, .woocommerce .star-rating::before , .product_list_widget .star-rating',
										'property' => 'color',
									),
								),
							),
						),
					),
				),
			),
			'wishlist-title'        => array(
				'type'        => 'kmt-title',
				'label'       => __( 'Wishlist', 'kemet' ),
				'description' => sprintf( '%s <a href="%s" target="%s">%s</a> %s', esc_html__( 'You need to activate the', 'kemet' ), esc_url( 'https://wordpress.org/plugins/yith-woocommerce-wishlist/' ), esc_attr( '_blank' ), esc_html__( 'YITH WooCommerce Wishlist', 'kemet' ), esc_html__( 'plugin to add a wishlist button and icon', 'kemet' ) ),
			),
		);

		if ( file_exists( WP_PLUGIN_DIR . '/yith-woocommerce-wishlist/init.php' ) ) {
			$register_options['wishlist-in-header'] = array(
				'type'  => 'kmt-switcher',
				'label' => __( 'Add Wishlist Header', 'kemet' ),
			);
		}

		$register_options = array(
			self::$prefix . '-options' => array(
				'section' => 'section-' . self::$prefix,
				'type'    => 'kmt-options',
				'data'    => array(
					'options' => $register_options,
				),
			),
		);

		return array_merge( $options, $register_options );
	}

	/**
	 * Register Customizer Sections
	 *
	 * @param array $sections sections.
	 * @return array
	 */
	public function register_sections( $sections ) {
		$register_sections = array(
			'section-' . self::$prefix => array(
				'priority' => 10,
				'title'    => __( 'General', 'kemet' ),
				'panel'    => 'woocommerce',
			),
		);

		return array_merge( $sections, $register_sections );

	}
}

new Kemet_Woo_General_Customizer();



