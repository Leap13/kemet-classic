/**
 * File slider.js
 *
 * Handles Slider control
 *
 * @package Kemet
 */

	wp.customize.controlConstructor['kmt-slider'] = wp.customize.Control.extend({

		ready: function() {

			'use strict';

			var control = this,
				value,
				thisInput,
				inputDefault,
				changeAction;

			// Update the text value.
			jQuery( 'input[type=range]' ).on( 'input change', function() {
				var value 		 = jQuery( this ).attr( 'value' ),
					input_number = jQuery( this ).closest( '.wrapper' ).find( '.kemet_range_value .value' );

				input_number.val( value );
				input_number.change();
			});

			// Save changes.
			this.container.on( 'input change', 'input[type=number]', function() {
				var value = jQuery( this ).val();
				jQuery( this ).closest( '.wrapper' ).find( 'input[type=range]' ).val( value );
				control.setting.set( value );
			});
		}
	});
