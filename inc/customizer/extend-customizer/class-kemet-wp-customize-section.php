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
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'WP_Customize_Section' ) ) {

	/**
	 * Adds a custom Customize Section for nested sections.
	 *
	 * @link https://gist.github.com/OriginalEXE/9a6183e09f4cae2f30b006232bb154af
	 * @see WP_Customize_Section
	 */
	class Kemet_WP_Customize_Section extends WP_Customize_Section {

		/**
		 * Section
		 *
		 * @var string
		 */
		public $section;

		/**
		 * Control type.
		 *
		 * @var string
		 */
		public $type = 'kmt_section';

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
			$array                   = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section' ) );
			$array['title']          = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
			$array['content']        = $this->get_content();
			$array['active']         = $this->active();
			$array['instanceNumber'] = $this->instance_number;
			$array['infoLink']       = $this->infoLink;

			if ( $this->panel ) {
				$array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
			} else {
				$array['customizeAction'] = 'Customizing';
			}

			return $array;
		}

		/**
		 * An Underscore (JS) template for rendering this section.
		 *
		 * Class variables for this section class are available in the `data` JS object;
		 * export custom variables by overriding WP_Customize_Section::json().
		 *
		 * @since 4.3.0
		 *
		 * @see WP_Customize_Section::print_template()
		 */
		protected function render_template() {
			?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }}">
			<h3 class="accordion-section-title" tabindex="0">
				{{ data.title }}
				<span class="screen-reader-text"><?php _e( 'Press return or enter to open this section' ); ?></span>
			</h3>
			<ul class="accordion-section-content">
				<li class="customize-section-description-container section-meta <# if ( data.description_hidden ) { #>customize-info<# } #>">
					<div class="customize-section-title">
						<button class="customize-section-back" tabindex="-1">
							<span class="screen-reader-text"><?php _e( 'Back' ); ?></span>
						</button>
						<h3>
							<span class="customize-action">
								{{{ data.customizeAction }}}
							</span>
							{{ data.title }}
							<# if(data.infoLink){ #>
								<a href='{{data.infoLink}}' class='kmt-docs-link' target='_blank'><span class="dashicons dashicons-editor-help"></span></a>
							<# } #>
						</h3>
						<# if ( data.description && data.description_hidden ) { #>
							<button type="button" class="customize-help-toggle dashicons dashicons-editor-help" aria-expanded="false"><span class="screen-reader-text"><?php _e( 'Help' ); ?></span></button>
							<div class="description customize-section-description">
								{{{ data.description }}}
							</div>
						<# } #>
 
						<div class="customize-control-notifications-container"></div>
					</div>
 
					<# if ( data.description && ! data.description_hidden ) { #>
						<div class="description customize-section-description">
							{{{ data.description }}}
						</div>
					<# } #>
				</li>
			</ul>
		</li>
			<?php
		}
	}
}
