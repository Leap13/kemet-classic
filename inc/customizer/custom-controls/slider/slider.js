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
				changeAction,
				sliderInput = this.container.find('input[type=range]'),
				numberInput = this.container.find('input[type=number]'),
				defaultValue = control.params.default,
				startPoint = control.params.start_point,
				startPoint = 'undefined' != typeof startPoint && startPoint != '' ? startPoint : 0;
			
			//If input dosen't have default value start with min
			if (defaultValue == ''){
				sliderInput.val(startPoint);
				numberInput.val(startPoint);
			}	
			// Update the text value.
			jQuery( 'input[type=range]' ).on( 'input change', function() {
				var value 		 = jQuery( this ).attr( 'value' ),
					input_number = jQuery( this ).closest( '.wrapper' ).find( '.kemet_range_value .value' );
				input_number.val( value );
				input_number.change();
			});
			// Handle the reset button.
			jQuery('.kmt-slider-reset').click(function () {
				var wrapper = jQuery(this).closest('.wrapper'),
					input_range = wrapper.find('input[type=range]'),
					input_number = wrapper.find('.kemet_range_value .value'),
					default_value = input_range.data('reset_value');

				input_range.val(default_value);
				input_number.val(default_value);
				input_number.change();
			});
			// Save changes.
			this.container.on( 'input change', 'input[type=number]', function() {
				var value = jQuery( this ).val(),
					input_range = jQuery(this).closest('.wrapper').find('input[type=range]'),
					inputRangeVal = jQuery(this).val();

				if ('undefined' == typeof value || value == '') {
					inputRangeVal = startPoint;
				}
				control.setting.set( value );
				input_range.val( inputRangeVal );
				jQuery(this).val( inputRangeVal );
			});
		}
	});
