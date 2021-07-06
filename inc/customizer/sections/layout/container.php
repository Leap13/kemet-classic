<?php
/**
 * General Options for Kemet Theme.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       Kemet 1.0.0
 */

/**
 * Option: Boxed Inner Background
 */
$fields = array(
	/**
	 * Option: Body Background
	 */
	array(
		'id'           => '[site-boxed-inner-bg]',
		'default'      => $defaults['site-boxed-inner-bg'],
		'type'         => 'option',
		'control_type' => 'kmt-background',
		'section'      => 'section-container-layout',
		'priority'     => 1,
		'transport'    => 'postMessage',
	),

);
$group_settings = array(
	'parent_id' => KEMET_THEME_SETTINGS . '[kmt-boxed-bg-obj]',
	'type'      => 'kmt-group',
	'label'     => __( 'Boxed Background', 'kemet' ),
	'section'   => 'section-container-layout',
	'priority'  => 40,
	'settings'  => array(),
);
new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );

/**
* Option: Colors
*/
$fields = array(
	/**
	 * Option: Body Background
	 */
	array(
		'id'           => '[site-layout-outside-bg-obj]',
		'default'      => $defaults['site-layout-outside-bg-obj'],
		'type'         => 'option',
		'control_type' => 'kmt-background',
		'section'      => 'section-container-layout',
		'priority'     => 1,
		'transport'    => 'postMessage',
	),

);
$group_settings = array(
	'parent_id' => KEMET_THEME_SETTINGS . '[kmt-body-bg-obj]',
	'type'      => 'kmt-group',
	'label'     => __( 'Body Background', 'kemet' ),
	'section'   => 'section-container-layout',
	'priority'  => 30,
	'settings'  => array(),
);
new Kemet_Generate_Control_Group( $wp_customize, $group_settings, $fields );
