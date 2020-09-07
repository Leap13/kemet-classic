<?php
/**
 * Customizer Control: typography.
 *
 * @package     Wiz
 * @author      Wiz
 * @copyright   Copyright (c) 2019, Wiz
 * @link        https://wiz.io/
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Typography control.
 */
final class Wiz_Control_Typography extends WP_Customize_Control {

	/**
	 * Used to connect controls to each other.
	 *
	 * @since 1.0.0
	 * @var bool $connect
	 */
	public $connect = false;

	/**
	 * Used to set the mode for code controls.
	 *
	 * @since 1.0.0
	 * @var bool $mode
	 */
	public $mode = 'html';

	/**
	 * Used to set the default font options.
	 *
	 * @since 1.0.0
	 * @var string $wiz_inherit
	 */
	public $wiz_inherit = '';

	/**
	 * If true, the preview button for a control will be rendered.
	 *
	 * @since 1.0.0
	 * @var bool $preview_button
	 */
	public $preview_button = false;

	/**
	 * Set the default font options.
	 *
	 * @since 1.0.0
	 * @param WP_Customize_Manager $manager Customizer bootstrap instance.
	 * @param string               $id      Control ID.
	 * @param array                $args    Default parent's arguments.
	 */
	public function __construct( $manager, $id, $args = array() ) {
		$this->wiz_inherit = __( 'Inherit', 'wiz' );
		parent::__construct( $manager, $id, $args );
	}
	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {

		$uri = WIZ_THEME_URI . 'inc/customizer/custom-controls/typography/';
		
		wp_enqueue_style( 'wiz-select-woo-style', $uri . 'selectWoo.css', null, WIZ_THEME_VERSION );
		wp_enqueue_script( 'wiz-select-woo-script', $uri . 'selectWoo.js', array( 'jquery' ), WIZ_THEME_VERSION, true );

		wp_enqueue_script( 'wiz-typography', $uri . 'typography.js', array( 'jquery', 'customize-base' ), WIZ_THEME_VERSION, true );

		wp_localize_script( 'wiz-typography', 
		'wizTypo',
		array(
			'inherit' => __( 'Inherit', 'wiz' ),
			'100'     => __( 'Thin 100', 'wiz' ),
			'200'     => __( 'Extra-Light 200', 'wiz' ),
			'300'     => __( 'Light 300', 'wiz' ),
			'400'     => __( 'Normal 400', 'wiz' ),
			'500'     => __( 'Medium 500', 'wiz' ),
			'600'     => __( 'Semi-Bold 600', 'wiz' ),
			'700'     => __( 'Bold 700', 'wiz' ),
			'800'     => __( 'Extra-Bold 800', 'wiz' ),
			'900'     => __( 'Ultra-Bold 900', 'wiz' ),
		)
	 );

	}

	/**
	 * Renders the content for a control based on the type
	 * of control specified when this class is initialized.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @return void
	 */
	protected function render_content() {

		switch ( $this->type ) {

			case 'wiz-font-family':
				$this->render_font( $this->wiz_inherit );
				break;

			case 'wiz-font-weight':
				$this->render_font_weight( $this->wiz_inherit );
				break;
		}
	}
	
	/**
	 * Renders the title and description for a control.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @return void
	 */
	protected function render_content_title() {
		if ( ! empty( $this->label ) ) {
			echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';
		}
		if ( ! empty( $this->description ) ) {
			echo '<span class="description customize-control-description">' . esc_html( $this->description ) . '</span>';
		}
	}

	/**
	 * Renders the connect attribute for a connected control.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @return void
	 */
	protected function render_connect_attribute() {
		if ( $this->connect ) {
			echo ' data-connected-control="' . esc_attr( $this->connect ) . '"';
			echo ' data-inherit="' . esc_attr( $this->wiz_inherit ) . '"';
		}
	}

	/**
	 * Renders a font control.
	 *
	 * @since 1.0.0 Added the action 'wiz_customizer_font_list' to support custom fonts.
	 * @since 1.0.0
	 * @param  string $default Inherit/Default.
	 * @access protected
	 * @return void
	 */
	protected function render_font( $default ) {
		echo '<label>';
		$this->render_content_title();
		echo '<select ';
		$this->link();
		$this->render_connect_attribute();
		echo '>';
		echo '<option value="inherit" ' . selected( 'inherit', $this->value(), false ) . '>' . esc_attr( $default ) . '</option>';
		echo '<optgroup label="Other System Fonts">';

		foreach ( Wiz_Font_Families::get_system_fonts() as $name => $variants ) {
			echo '<option value="' . esc_attr( $name ) . '" ' . selected( $name, $this->value(), false ) . '>' . esc_attr( $name ) . '</option>';
		}

		// Add Custom Font List Into Customizer.
		do_action( 'wiz_customizer_font_list', $this->value() );

		echo '<optgroup label="Google">';

		foreach ( Wiz_Font_Families::get_google_fonts() as $name => $single_font ) {
			$variants = wiz_prop( $single_font, '0' );
			$category = wiz_prop( $single_font, '1' );
			echo '<option value="\'' . esc_attr( $name ) . '\', ' . esc_attr( $category ) . '" ' . selected( $name, $this->value(), false ) . '>' . esc_attr( $name ) . '</option>';
		}

		echo '</select>';
		echo '</label>';
	}

	/**
	 * Renders a font weight control.
	 *
	 * @since 1.0.0
	 * @param  string $default Inherit/Default.
	 * @access protected
	 * @return void
	 */
	protected function render_font_weight( $default ) {
		echo '<label>';
		$this->render_content_title();
		echo '<select ';
		$this->link();
		$this->render_connect_attribute();
		echo '>';
		echo '<option value="inherit" ' . selected( 'inherit', $this->value(), false ) . '>' . esc_attr( $default ) . '</option>';
		echo '<option value="' . esc_attr( $this->value() ) . '" selected="selected">' . esc_attr( $this->value() ) . '</option>';
		echo '</select>';
		echo '</label>';
	}
}
