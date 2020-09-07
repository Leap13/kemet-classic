/**
 * File spacing.js
 *
 * Handles the spacing
 *
 * @package Wiz
 */

	wp.customize.controlConstructor['wiz-responsive-spacing'] = wp.customize.Control.extend({

		ready: function() {

			'use strict';

			var control = this,
		    value;
		    
		    control.wizResponsiveInit();

			// Save the value.
			this.container.on( 'change keyup paste', 'input.wiz-spacing-input', function() {

				value = jQuery( this ).val();

				// Update value on change.
				control.updateValue();
			});
		},

		/**
		 * Updates the spacing values
		 */
		updateValue: function() {

			'use strict';

			var control = this,
				newValue = {
					'desktop' 		: {},
					'tablet'  		: {},
					'mobile'  		: {},
					'desktop-unit'	: 'px',
					'tablet-unit'	: 'px',
					'mobile-unit'	: 'px',
				};

			control.container.find( 'input.wiz-spacing-desktop' ).each( function() {
				var spacing_input = jQuery( this ),
				item = spacing_input.data( 'id' ),
				item_value = spacing_input.val();

				newValue['desktop'][item] = item_value;
			});

			control.container.find( 'input.wiz-spacing-tablet' ).each( function() {
				var spacing_input = jQuery( this ),
				item = spacing_input.data( 'id' ),
				item_value = spacing_input.val();

				newValue['tablet'][item] = item_value;
			});

			control.container.find( 'input.wiz-spacing-mobile' ).each( function() {
				var spacing_input = jQuery( this ),
				item = spacing_input.data( 'id' ),
				item_value = spacing_input.val();

				newValue['mobile'][item] = item_value;
			});

			control.container.find('.wiz-spacing-unit-wrapper .wiz-spacing-unit-input').each( function() {
				var spacing_unit 	= jQuery( this ),
					device 			= spacing_unit.attr('data-device'),
					device_val 		= spacing_unit.val(),
					name 			= device + '-unit';
					
				newValue[ name ] = device_val;
			});

			control.setting.set( newValue );
		},

		/**
		 * Set the responsive devices fields
		 */
		wizResponsiveInit : function() {
			
			'use strict';

			var control = this;
			
			control.container.find( '.wiz-spacing-responsive-btns button' ).on( 'click', function( event ) {

				var device = jQuery(this).attr('data-device');
				if( 'desktop' == device ) {
					device = 'tablet';
				} else if( 'tablet' == device ) {
					device = 'mobile';
				} else {
					device = 'desktop';
				}

				jQuery( '.wp-full-overlay-footer .devices button[data-device="' + device + '"]' ).trigger( 'click' );
			});

			// Unit click
			control.container.on( 'click', '.wiz-spacing-responsive-units .single-unit', function() {
				
				var $this 		= jQuery(this);

				if ( $this.hasClass('active') ) {
					return false;
				}

				var	unit_value 	= $this.attr('data-unit'),
					device 		= jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device');
				
				$this.siblings().removeClass('active');
				$this.addClass('active');

				control.container.find('.wiz-spacing-unit-wrapper .wiz-spacing-' + device + '-unit').val( unit_value );

				// Update value on change.
				control.updateValue();
			});
		},
	});

	jQuery( document ).ready( function( ) {

		// Connected button
		jQuery( '.wiz-spacing-connected' ).on( 'click', function() {

			// Remove connected class
			jQuery(this).parent().parent( '.wiz-spacing-wrapper' ).find( 'input' ).removeClass( 'connected' ).attr( 'data-element-connect', '' );
			
			// Remove class
			jQuery(this).parent( '.wiz-spacing-input-item-link' ).removeClass( 'disconnected' );

		} );

		// Disconnected button
		jQuery( '.wiz-spacing-disconnected' ).on( 'click', function() {

			// Set up variables
			var elements 	= jQuery(this).data( 'element-connect' );
			
			var linkedInputs = jQuery(this).parent().parent('.wiz-spacing-wrapper').find('.wiz-spacing-input');

			linkedInputs.each(function(){
				var input_val = jQuery(this).val();
				if (input_val != ''){
					jQuery(this).parent().parent('.wiz-spacing-wrapper').find('.wiz-spacing-input').each(function (key, value) {
						jQuery(this).val(input_val).change();
					});
				}
			});

			// Add connected class
			jQuery(this).parent().parent( '.wiz-spacing-wrapper' ).find( 'input' ).addClass( 'connected' ).attr( 'data-element-connect', elements );

			// Add class
			jQuery(this).parent( '.wiz-spacing-input-item-link' ).addClass( 'disconnected' );

		} );

		// Values connected inputs
		jQuery( '.wiz-spacing-input-item' ).on( 'input', '.connected', function() {

			var dataElement 	  = jQuery(this).attr( 'data-element-connect' ),
				currentFieldValue = jQuery( this ).val();

			jQuery(this).parent().parent( '.wiz-spacing-wrapper' ).find( '.connected[ data-element-connect="' + dataElement + '" ]' ).each( function( key, value ) {
				jQuery(this).val( currentFieldValue ).change();
			} );

		} );
	});

	jQuery('.wp-full-overlay-footer .devices button ').on('click', function() {

		var device = jQuery(this).attr('data-device');
		jQuery( '.customize-control-wiz-responsive-spacing .input-wrapper .wiz-spacing-wrapper, .customize-control .wiz-spacing-responsive-btns > li' ).removeClass( 'active' );
		jQuery( '.customize-control-wiz-responsive-spacing .input-wrapper .wiz-spacing-wrapper.' + device + ', .customize-control .wiz-spacing-responsive-btns > li.' + device ).addClass( 'active' );
	});
