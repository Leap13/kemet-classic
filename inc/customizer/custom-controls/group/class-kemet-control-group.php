<?php
/**
 * Customizer Control: group
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
 * Group
 */
class Kemet_Control_Group extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'kmt-group';

	/**
	 * The control childern.
	 *
	 * @access public
	 * @var array
	 */
	public $fields = array();

	/**
	 * The control childern.
	 *
	 * @access public
	 * @var array
	 */
	public $group = array();

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();

		$this->json['description'] = $this->description;
		$this->json['label']       = esc_html( $this->label );
		$this->json['id']          = $this->id;
		$this->json['fields']      = $this->fields;
		$this->json['group']       = $this->group;
		$sorted_data               = wp_list_sort( $this->fields, 'priority' );
		foreach ( $sorted_data as  $field ) {
			if ( array_key_exists( 'tab', $field ) ) {
				$this->json['group']['tabs'][ $field['tab'] ][] = $field;
			} else {
				$this->json['group'][] = $field;
			}
		}
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

		?>
		<div class="kmt-group-control">
			<label class="customizer-text">
				<# if ( data.label ) { #>
					<span class="customize-control-title">{{{ data.label }}}</span>
					<# } #>
					<# if ( data.description ) { #>
						<span class="description customize-control-description">{{{ data.description }}}</span>
					<# } #>
					<span class="dashicons dashicons-edit model-button"></span>
			</label>
		</div>
		<div class="kmt-group-wrap">
			<div class="kmt-group-model">
				<ul class="model-list">
				</ul>
			</div>
		</div>
		<?php
	}
}
