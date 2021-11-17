<?php
/**
 * Customizer Control: panel.
 *
 * Creates a jQuery color control.
 *
 * @package     Kemet
 * @author      Kemet
 * @copyright   Copyright (c) 2019, Kemet
 * @link        https://kemet.io/
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'WP_Customize_Panel' ) ) {

	/**
	 * Adds a custom Panel for nested panels / sections.
	 *
	 * @link https://gist.github.com/OriginalEXE/9a6183e09f4cae2f30b006232bb154af
	 * @see WP_Customize_Panel
	 */
	class Kemet_WP_Customize_Panel extends WP_Customize_Panel {

		/**
		 * Panel
		 *
		 * @var string
		 */
		public $panel;

		/**
		 * Control type.
		 *
		 * @var string
		 */
		public $type = 'kmt_panel';

		/**
		 * Control type.
		 *
		 * @var string
		 */
		public $infoLink = '';

		/**
		 * Get section parameters for JS.
		 *
		 * @return array Exported parameters.
		 */
		public function json() {

			$array                   = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel' ) );
			$array['title']          = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content']        = $this->get_content();
			$array['active']         = $this->active();
			$array['instanceNumber'] = $this->instance_number;
			$array['infoLink']       = $this->infoLink;

			return $array;
		}

		/**
		 * An Underscore (JS) template for this panel's content (but not its container).
		 *
		 * Class variables for this panel class are available in the `data` JS object;
		 * export custom variables by overriding WP_Customize_Panel::json().
		 *
		 * @see WP_Customize_Panel::print_template()
		 *
		 * @since 4.3.0
		 */
		protected function content_template() {
			?>
		<li class="panel-meta customize-info accordion-section <# if ( ! data.description ) { #> cannot-expand<# } #>">
			<button class="customize-panel-back" tabindex="-1"><span class="screen-reader-text"><?php _e( 'Back' ); ?></span></button>
			<div class="accordion-section-title">
				<span class="preview-notice">
				<?php
					$info_link = "<# if(data.infoLink){ #>
									<a href='{{data.infoLink}}' class='kmt-docs-link' target='_blank'><span class='dashicons dashicons-editor-help'></span></a>
								<# } #>";
					/* translators: %s: The site/panel title in the Customizer. */
					printf( __( 'You are customizing <strong class="panel-title">%1$s%2$s</strong>' ), '{{ data.title }}', $info_link );
				?>
				
				</span>
				<# if ( data.description ) { #>
					<button type="button" class="customize-help-toggle dashicons dashicons-editor-help" aria-expanded="false"><span class="screen-reader-text"><?php _e( 'Help' ); ?></span></button>
				<# } #>
			</div>
			<# if ( data.description ) { #>
				<div class="description customize-panel-description">
					{{{ data.description }}}
				</div>
			<# } #>
 
			<div class="customize-control-notifications-container"></div>
		</li>
			<?php
		}
	}

}

