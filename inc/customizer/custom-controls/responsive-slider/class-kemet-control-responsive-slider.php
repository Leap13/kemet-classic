<?php
/**
 * Customizer Control: slider.
 *
 * Creates a jQuery slider control.
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
 * Responsive Slider control (range).
 */
class Kemet_Control_Responsive_Slider extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'kmt-responsive-slider';

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $suffix = '';

	/**
	 * The unit type.
	 *
	 * @access public
	 * @var array
	 */
	public $unit_choices = array( 'px' => 'px' );
	public $units_range = '';
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
				'desktop'      => '',
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
		}

		/* Control Units */
		$units = array(
			'desktop-unit' => 'px',
			'tablet-unit'  => 'px',
			'mobile-unit'  => 'px',
		);

		foreach ( $units as $unit_key => $unit_value ) {
			if ( ! isset( $val[ $unit_key ] ) ) {
				$val[ $unit_key ] = $unit_value;
			}
		}

		$this->json['value']  = $val;
		$this->json['link']   = $this->get_link();
		$this->json['id']     = $this->id;
		$this->json['label']  = esc_html( $this->label );
		$this->json['suffix'] = $this->suffix;

		$this->json['unit_choices']   = $this->unit_choices;
		
		$this->json['unitsRange'] 	  = '';

		

		$this->json['desktopInputAttrs']     = '';
		$this->json['tabletInputAttrs']     = '';
		$this->json['mobileInputAttrs']     = '';
		
		foreach ( $this->input_attrs as $unit => $attrs ) {
			if($unit == $val['desktop-unit']){
				foreach($attrs as $attr => $value){
					$this->json['desktopInputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
				}
			}
			if($unit == $val['tablet-unit']){
				foreach($attrs as $attr => $value){
					$this->json['tabletInputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
				}
			}
			if($unit == $val['mobile-unit']){
				foreach($attrs as $attr => $value){
					$this->json['mobileInputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
				}
			}
		}


	}

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {
		$css_uri = KEMET_THEME_URI . 'inc/customizer/custom-controls/responsive-slider/';
		$js_uri  = KEMET_THEME_URI . 'inc/customizer/custom-controls/responsive-slider/';

		wp_enqueue_script( 'kemet-responsive-slider', $js_uri . 'responsive-slider.js', array( 'jquery', 'customize-base' ), KEMET_THEME_VERSION, true );
		wp_enqueue_style( 'kemet-responsive-slider', $css_uri . 'responsive-slider.css', null, KEMET_THEME_VERSION );
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
		<label for="">
			<# if ( data.label ) { #>
				<span class="customize-control-title">{{{ data.label }}}</span>
				<ul class="kmt-responsive-slider-btns">
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
			desktop_unit_val = 'px';
			tablet_unit_val  = 'px';
			mobile_unit_val  = 'px';

			if ( data.value['desktop-unit'] ) { 
				desktop_unit_val = data.value['desktop-unit'];
			} 

			if ( data.value['tablet-unit'] ) { 
				tablet_unit_val = data.value['tablet-unit'];
			} 

			if ( data.value['mobile-unit'] ) { 
				mobile_unit_val = data.value['mobile-unit'];
			} 

			value_desktop = '';
			value_tablet  = '';
			value_mobile  = '';
			default_desktop = '';
			default_tablet  = '';
			default_mobile  = '';

			if ( data.value['desktop'] ) { 
				value_desktop = data.value['desktop'];
			} 

			if ( data.value['tablet'] ) { 
				value_tablet = data.value['tablet'];
			} 

			if ( data.value['mobile'] ) { 
				value_mobile = data.value['mobile'];
			}

			if ( data.default['desktop'] ) { 
				default_desktop = data.default['desktop'];
			} 

			if ( data.default['tablet'] ) { 
				default_tablet = data.default['tablet'];
			} 

			if ( data.default['mobile'] ) { 
				default_mobile = data.default['mobile'];
			} #>
			<div class="wrapper">
				<div class="input-field-wrapper desktop active">
					<input {{{ data.desktopInputAttrs }}} type="range" value="{{ value_desktop }}" data-reset_value="{{ default_desktop }}" />
					<div class="kemet_range_value">
						<input type="number" data-id='desktop' class="kmt-responsive-range-value-input" value="{{ value_desktop }}" {{{ data.desktopInputAttrs }}} ><#
						if ( data.suffix ) {
						#><span class="kmt-range-unit">{{ data.suffix }}</span><#
						} #>
					</div>
					<ul class="kmt-slider-responsive-units kmt-slider-desktop-responsive-units">
						<#_.each( data.unit_choices, function( unit_key ) { 
							unit_class = '';
							if ( desktop_unit_val === unit_key ) { 
								unit_class = 'active';
							}
						#><li class='single-unit {{ unit_class }}' data-unit='{{ unit_key }}' >
							<span class="unit-text">{{{ unit_key }}}</span>
						</li><# 
						});#>
					</ul>
				</div>
				<div class="input-field-wrapper tablet">
					<input {{{ data.tabletInputAttrs }}} type="range" value="{{ value_tablet }}" data-reset_value="{{ default_tablet }}" />
					<div class="kemet_range_value">
						<input type="number" data-id='tablet' class="kmt-responsive-range-value-input" value="{{ value_tablet }}" {{{ data.tabletInputAttrs }}} ><#
						if ( data.suffix ) {
						#><span class="kmt-range-unit">{{ data.suffix }}</span><#
						} #>
					</div>
					<ul class="kmt-slider-responsive-units kmt-slider-tablet-responsive-units">
						<#_.each( data.unit_choices, function( unit_key ) { 
							unit_class = '';
							if ( tablet_unit_val === unit_key ) { 
								unit_class = 'active';
							}
						#><li class='single-unit {{ unit_class }}' data-unit='{{ unit_key }}' >
							<span class="unit-text">{{{ unit_key }}}</span>
						</li><# 
						});#>
					</ul>
				</div>
				<div class="input-field-wrapper mobile">
					<input {{{ data.mobileInputAttrs }}} type="range" value="{{ value_mobile }}" data-reset_value="{{ default_mobile }}" />
					<div class="kemet_range_value">
						<input type="number" data-id='mobile' class="kmt-responsive-range-value-input" value="{{ value_mobile }}" {{{ data.mobileInputAttrs }}} ><#
						if ( data.suffix ) {
						#><span class="kmt-range-unit">{{ data.suffix }}</span><#
						} #>
					</div>
					<ul class="kmt-slider-responsive-units kmt-slider-mobile-responsive-units">
						<#_.each( data.unit_choices, function( unit_key ) { 
							unit_class = '';
							if ( mobile_unit_val === unit_key ) { 
								unit_class = 'active';
							}
						#><li class='single-unit {{ unit_class }}' data-unit='{{ unit_key }}' >
							<span class="unit-text">{{{ unit_key }}}</span>
						</li><# 
						});#>
					</ul>
				</div>
				<div class="kmt-responsive-slider-reset">
					<span class="dashicons dashicons-image-rotate"></span>
				</div>
			</div>
			<div class="kmt-slider-responsive-units-screen-wrap">
				<div class="unit-input-wrapper kmt-slider-unit-wrapper">
					<input type='hidden' class='kmt-slider-unit-input kmt-slider-desktop-unit' data-device='desktop' value='{{desktop_unit_val}}'>
					<input type='hidden' class='kmt-slider-unit-input kmt-slider-tablet-unit' data-device='tablet' value='{{tablet_unit_val}}'>
					<input type='hidden' class='kmt-slider-unit-input kmt-slider-mobile-unit' data-device='mobile' value='{{mobile_unit_val}}'>
				</div>
			</div>
		</label>
		<?php
	}

	/**
	 * Render the control's content.
	 *
	 * @see WP_Customize_Control::render_content()
	 */
	protected function render_content() {}
}
