<?php
/**
* Customizer Control: icon-select
*
* @package     Kemet
* @author      Kemet
* @copyright   Copyright ( c ) 2019, Kemet
* @link        https://kemet.io/
* @since       1.0.0
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
* Notice Control
*/

class Kemet_Control_Notice extends WP_Customize_Control {

    /**
    * The control type.
    *
    * @access public
    * @var string
    */
    public $type = 'kmt-notice';

    /**
     * Notice Url
     * @access public
     * @var string
     */
    public $button = array();

    /**
    * Refresh the parameters passed to the JavaScript via JSON.
    *
    * @see WP_Customize_Control::to_json()
    */

    public function to_json() {
        parent::to_json();

        $this->json['label'] = esc_html( $this->label );
        
        foreach ( $this->button as $key => $value ) {

            switch($key){

                case 'url':
                $this->json['url'] = $value;
                    break;
                case 'text':
                $this->json['button_text'] = $value;
                    break;
                    case 'target':
                $this->json['target'] = !empty($value) ? $value : '';
                    break;
                default:
                    break;
            }
        }

        $this->json['button'] = $this->button;
		$this->json['description'] = $this->description;
    
    }
    
    /**
    * An Underscore ( JS ) template for this control's content ( but not its container ).
    *
    * Class variables for this control class are available in the `data` JS object;
    * export custom variables by overriding {
        *@see WP_Customize_Control::to_json()}
        *.
        *
        * @see WP_Customize_Control::print_template()
        *
        * @access protected
        */
        protected function content_template() {
		?>

		<label class="customizer-text" data-visible='{{ data.visibility }}'>
			<# if ( data.label ) { #>
				<span class="customize-control-title">{{{ data.label }}}</span>
			<# } #>
			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
            <# } #>
            <a class="button button-primary" href="{{data.url}}" target="{{data.target}}"> {{{data.button_text}}} </a>
		</label>

        

		<?php
	}
}
