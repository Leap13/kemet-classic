<?php
/**
 * Register customizer Aspra Pro Section.
 *
 * @package   Kemet
 * @author    Kemet
 * @copyright Copyright (c) 2018, Kemet
 * @link      http://wpastra.com/
 * @since     Kemet 1.0.10
 */

// Register custom section types.
$wp_customize->register_section_type( 'Kemet_Pro_Customizer' );

// Register sections.
$wp_customize->add_section(
	new Kemet_Pro_Customizer(
		$wp_customize, 'astra-pro', array(
			'title'    => esc_html__( 'More Options Available in Kemet Pro!', 'astra' ),
			'pro_url'  => htmlspecialchars_decode( astra_get_pro_url( 'https://wpastra.com/pricing/', 'customizer', 'upgrade-link', 'upgrade-to-pro' ) ),
			'priority' => 1,
		)
	)
);
