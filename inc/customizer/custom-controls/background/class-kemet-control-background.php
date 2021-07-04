<?php
/**
 * Customizer Control: background.
 *
 * Creates a jQuery background control.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       1.0.0
 */

/**
 * Field overrides.
 */
if ( ! class_exists( 'Kemet_Control_Background' ) && class_exists( 'WP_Customize_Control' ) ) :

	/**
	 * Background Control
	 */
	class Kemet_Control_Background extends WP_Customize_Control {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'kmt-background';

		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 */
		public function to_json() {
			parent::to_json();

			$this->json['default'] = $this->setting->default;
			if ( isset( $this->default ) ) {
				$this->json['default'] = $this->default;
			}

			$val = maybe_unserialize( $this->value() );

			if ( ! is_array( $val ) || is_numeric( $val ) || empty( $val ) ) {

				$val = array(
					'background-color'      => '',
					'background-image'      => '',
					'background-repeat'     => 'repeat',
					'background-position'   => 'center center',
					'background-size'       => 'auto',
					'background-attachment' => 'scroll',
					'background-pattern' => '',
					'patternColor' =>''
				);
			}

			$this->json['value'] = $val;
			$this->json['link']  = $this->get_link();
			$this->json['id']    = $this->id;
			$this->json['label'] = esc_html( $this->label );

		
		}

		/**
		 * An Underscore (JS) template for this control's content (but not its container).
		 *
		 * Class variables for this control class are available in the `data` JS object;
		 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
		 *
		 * @see WP_Customize_Control::print_template()
		 *
		 * @access protected
		 */
	

		/**
		 * Render the control's content.
		 *
		 * @see WP_Customize_Control::render_content()
		 */
		protected function render_content() {}
	}
endif;
