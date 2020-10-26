<?php
/**
 * Customizer Control: color.
 *
 * Creates a jQuery color control.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Color control (alpha).
 */
class Kemet_Control_Responsive_Color extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'kmt-reponsive-color';

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $suffix = '';

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

        if ( ! is_array( $val ) || is_numeric( $val ) ) {

			$val = array(
				'desktop'      => $val,
				'tablet'       => '',
				'mobile'       => '',
			);
        }
		$this->json['value']  = $val;
		$this->json['link']   = $this->get_link();
		$this->json['id']     = $this->id;
		$this->json['label']  = esc_html( $this->label );
		$this->json['suffix'] = $this->suffix;

		$this->json['inputAttrs'] = '';
		foreach ( $this->input_attrs as $attr => $value ) {
			$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
		}
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
	protected function content_template() {
		?>

		<#
		var defaultValueAttr = function(deviceDefaultValue){
			var defaultValue = '#RRGGBB', defaultValueAttr = '';

			if ( deviceDefaultValue ) {
				if ( '#' !== deviceDefaultValue.substring( 0, 1 ) ) {
					defaultValue = '#' + deviceDefaultValue;
				} else {
					defaultValue = deviceDefaultValue;
				}
				defaultValueAttr = ' data-default-color=' + defaultValue; // Quotes added automatically.
			}
			return defaultValueAttr;
		} 
		#>
		<label>
			<# if ( data.label ) { #>
				<span class="customize-control-title">{{{ data.label }}}</span>
				<ul class="kmt-responsive-color-btns kmt-responsive-control-btns">
					<li class="desktop active">
						<a href="#" class="preview-desktop active" data-device="desktop">
							<i class="dashicons dashicons-desktop"></i>
						</a>
					</li>
					<li class="tablet">
						<a href="#" class="preview-tablet" data-device="tablet">
							<i class="dashicons dashicons-tablet"></i>
						</a>
					</li>
					<li class="mobile">
						<a href="#" class="preview-mobile" data-device="mobile">
							<i class="dashicons dashicons-smartphone"></i>
						</a>
					</li>
				</ul>
			<# } #>
			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } 
			value_desktop = '';
			value_tablet  = '';
			value_mobile  = '';

			if ( data.value['desktop'] ) { 
				value_desktop = data.value['desktop'];
			} 

			if ( data.value['tablet'] ) { 
				value_tablet = data.value['tablet'];
			} 

			if ( data.value['mobile'] ) { 
				value_mobile = data.value['mobile'];
			}
			
            default_desktop = '';
			default_tablet  = '';
			default_mobile  = '';

			if ( data.default['desktop'] ) { 
				default_desktop = defaultValueAttr ( data.default['desktop'] );
			} 

			if ( data.default['tablet'] ) { 
				default_tablet = defaultValueAttr ( data.default['tablet'] );
			} 

			if ( data.default['mobile'] ) { 
				default_mobile = defaultValueAttr ( data.default['mobile'] );
			}
			 #>
			 <div class="responsive-color-control">
			 	<div class="customize-control-content desktop active" data-device="desktop">
				    <input class="kmt-color-picker-alpha color-picker-hex" type="text" data-alpha="true" placeholder="{{ value_desktop }}" {{ default_desktop }} value="{{value_desktop}}" />
				</div>
				<div class="customize-control-content tablet" data-device="tablet">
					<input class="kmt-color-picker-alpha color-picker-hex" type="text" data-alpha="true" placeholder="{{ value_tablet }}" {{ default_tablet }} value="{{value_tablet}}" />
				</div>
				<div class="customize-control-content mobile" data-device="mobile">
					<input class="kmt-color-picker-alpha color-picker-hex" type="text" data-alpha="true" placeholder="{{ value_mobile }}" {{ default_mobile }} value="{{value_mobile}}" />
				</div>
			 </div>
			
		</label>

		<?php
	}
}
