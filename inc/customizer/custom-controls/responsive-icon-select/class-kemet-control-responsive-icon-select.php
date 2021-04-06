<?php
/**
 * Customizer Control: icon-select
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright ( c ) 2020, Kemet
 * @link        https://kemet.io/
 * @since       1.1.4
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Icon Select
 */
class Kemet_Control_Responsive_Icon_Select extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'kmt-responsive-icon-select';

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
				'desktop' => $val,
				'tablet'  => '',
				'mobile'  => '',
			);
		}

		foreach ( $this->choices as $key => $value ) {
			$this->json['choices_icon'][ $key ] = $value['icon'];
		}

		$this->json['value']   = $val;
		$this->json['choices'] = $this->choices;
		$this->json['link']    = $this->get_link();
		$this->json['id']      = $this->id;

	}

	/**
	 * An Underscore ( JS ) template for this control's content ( but not its container ).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {
	 *
	 * @see WP_Customize_Control::to_json()}
	 * .
	 *
	 * @see WP_Customize_Control::print_template()
	 *
	 * @access protected
	 */
	protected function content_template() {
		$rtl_class = is_rtl() ? 'rtl' : '';
		?>
		<label class="customizer-text">
			<# if ( data.label ) { #>
				<span class="customize-control-title">{{{ data.label }}}</span>

				<ul class="kmt-responsive-icon-select-btns kmt-responsive-control-btns">
					<li class="desktop active">
						<button type="button" class="preview-desktop active" data-device="desktop">
							<i class="dashicons dashicons-desktop"></i>
						</button>
					</li>
					<li class="tablet">
						<button type="button" class="preview-tablet" data-device="tablet">
							<i class="dashicons dashicons-tablet"></i>
						</button>
					</li>
					<li class="mobile">
						<button type="button" class="preview-mobile" data-device="mobile">
							<i class="dashicons dashicons-smartphone"></i>
						</button>
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
			#>
		</label>
		<div id="input_{{ data.id }}" class="desktop active responsive-icon-select <?php echo esc_attr( $rtl_class ); ?>" data-device="desktop">  
			<# for ( key in data.choices ) { #>	
				<label>
					<input class="icon-select-input kmt-responsive-desktop-input" type="radio" value="{{ key }}" name="{{ data.id }}-desktop" <# if ( value_desktop == key ) { #> checked<# } #> />
					<span class="icon-select-label">
						<div class="dashicons {{ data.choices_icon[ key ] }}"></div>
					</span>
				</label>
			<# } #>
		</div>
		<div id="input_{{ data.id }}" class="tablet responsive-icon-select <?php echo esc_attr( $rtl_class ); ?>" data-device="tablet">  
			<# for ( key in data.choices ) { #>	
				<label>
					<input class="icon-select-input kmt-responsive-desktop-tablet" type="radio" value="{{ key }}" name="{{ data.id }}-tablet" <# if ( value_tablet == key ) { #> checked<# } #> />
					<span class="icon-select-label">
						<div class="dashicons {{ data.choices_icon[ key ] }}"></div>
					</span>
				</label>
			<# } #>
		</div>
		<div id="input_{{ data.id }}" class="mobile responsive-icon-select <?php echo esc_attr( $rtl_class ); ?>" data-device="mobile">  
			<# for ( key in data.choices ) { #>	
				<label>
					<input class="icon-select-input kmt-responsive-desktop-mobile" type="radio" value="{{ key }}" name="{{ data.id }}-mobile" <# if ( value_mobile == key ) { #> checked<# } #> />
					<span class="icon-select-label">
						<div class="dashicons {{ data.choices_icon[ key ] }}"></div>
					</span>
				</label>
			<# } #>
		</div>
		<?php
	}

	/**
	 * Render the control's content.
	 *
	 * @see WP_Customize_Control::render_content()
	 */
	protected function render_content() {}
}
