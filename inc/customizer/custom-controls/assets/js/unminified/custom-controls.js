/**
 * File sortable.js
 *
 * Handles sortable list
 *
 * @package Kemet
 */

	wp.customize.controlConstructor['kmt-sortable'] = wp.customize.Control.extend({

		ready: function() {

			'use strict';

			var control = this;

			// Set the sortable container.
			control.sortableContainer = control.container.find( 'ul.sortable' ).first();

			// Init sortable.
			control.sortableContainer.sortable({

				// Update value when we stop sorting.
				stop: function() {
					control.updateValue();
				}
			}).disableSelection().find( 'li' ).each( function() {

					// Enable/disable options when we click on the eye of Thundera.
					jQuery( this ).find( 'i.visibility' ).click( function() {
						jQuery( this ).toggleClass( 'dashicons-visibility-faint' ).parents( 'li:eq(0)' ).toggleClass( 'invisible' );
					});
			}).click( function() {

				// Update value on click.
				control.updateValue();
			});
		},

		/**
		 * Updates the sorting list
		 */
		updateValue: function() {

			'use strict';

			var control = this,
		    newValue = [];

			this.sortableContainer.find( 'li' ).each( function() {
				if ( ! jQuery( this ).is( '.invisible' ) ) {
					newValue.push( jQuery( this ).data( 'value' ) );
				}
			});

			control.setting.set( newValue );
		}
	});

/**
 * File slider.js
 *
 * Handles Slider control
 *
 * @package Kemet
 */

wp.customize.controlConstructor['kmt-slider'] = wp.customize.Control.extend({

	ready: function () {

		'use strict';

		var control = this,
			value,
			thisInput,
			inputDefault,
			changeAction;

		
		// Update the text value.
		this.container.on('input change', 'input[type=range]', function () {
			var value = jQuery(this).val(),
				input_number = jQuery(this).closest('.wrapper').find('input[type=number]');
			
			input_number.val(value);
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
		this.container.on('input change', 'input[type=number]', function () {
			var value = jQuery(this).val();
			jQuery(this).closest('.wrapper').find('input[type=range]').val(value);
			control.setting.set(value);
		});
	}
});

/**
 * File slider.js
 *
 * Handles Slider control
 *
 * @package Kemet
 */

jQuery(window).on("load", function() {
  	jQuery('html').addClass('colorpicker-ready');
});

	wp.customize.controlConstructor['kmt-color'] = wp.customize.Control.extend({

		ready: function() {

			'use strict';

			var control = this,
				value,
				thisInput,
				inputDefault,
				changeAction;			

			this.container.find('.kmt-color-picker-alpha' ).wpColorPicker({
				/**
			     * @param {Event} event - standard jQuery event, produced by whichever
			     * control was changed.
			     * @param {Object} ui - standard jQuery UI object, with a color member
			     * containing a Color.js object.
			     */
			    change: function (event, ui) {
			        var element = event.target;
			        var color = ui.color.toString();

			        if ( jQuery('html').hasClass('colorpicker-ready') ) {
						control.setting.set( color );
			        }
			    },

			    /**
			     * @param {Event} event - standard jQuery event, produced by "Clear"
			     * button.
			     */
			    clear: function (event) {
			        var element = jQuery(event.target).closest('.wp-picker-input-wrap').find('.wp-color-picker')[0];
			        var color = '';

			        if (element) {
			            // Add your code here
			        	control.setting.set( color );
			        }
			    }
			});
		}
	});

/**
 * File icon-select.js
 *
 * Handles Icon Select
 *
 * @package Kemet
 */
wp.customize.controlConstructor['kmt-icon-select'] = wp.customize.Control.extend({

    ready: function () {

        'use strict';

        var control = this;

        // Change the value
        this.container.on('change', 'input', function () {
            control.setting.set(jQuery(this).val());
        });

    }

});
/**
 * File radio-image.js
 *
 * Handles toggling the radio images button
 *
 * @package Kemet
 */

	wp.customize.controlConstructor['kmt-radio-image'] = wp.customize.Control.extend({

		ready: function() {

			'use strict';

			var control = this;

			// Change the value.
			this.container.on( 'click', 'input', function() {
				control.setting.set( jQuery( this ).val() );
			});

		}

	});

/**
 * File responsive.js
 *
 * Handles the responsive
 *
 * @package Kemet
 */

	wp.customize.controlConstructor['kmt-responsive'] = wp.customize.Control.extend({

		// When we're finished loading continue processing.
		ready: function() {

			'use strict';

			var control = this,
		    value;

			control.kmtResponsiveInit();
			
			/**
			 * Save on change / keyup / paste
			 */
			this.container.on( 'change keyup paste', 'input.kmt-responsive-input, select.kmt-responsive-select', function() {

				value = jQuery( this ).val();

				// Update value on change.
				control.updateValue();
			});

			/**
			 * Refresh preview frame on blur
			 */
			this.container.on( 'blur', 'input', function() {

				value = jQuery( this ).val() || '';

				if ( value == '' ) {
					wp.customize.previewer.refresh();
				}

			});

		},

		/**
		 * Updates the sorting list
		 */
		updateValue: function() {

			'use strict';

			var control = this,
		    newValue = {};

		    // Set the spacing container.
			control.responsiveContainer = control.container.find( '.kmt-responsive-wrapper' ).first();

			control.responsiveContainer.find( 'input.kmt-responsive-input' ).each( function() {
				var responsive_input = jQuery( this ),
				item = responsive_input.data( 'id' ),
				item_value = responsive_input.val();

				newValue[item] = item_value;

			});

			control.responsiveContainer.find( 'select.kmt-responsive-select' ).each( function() {
				var responsive_input = jQuery( this ),
				item = responsive_input.data( 'id' ),
				item_value = responsive_input.val();

				newValue[item] = item_value;
			});

			control.setting.set( newValue );
		},

		kmtResponsiveInit : function() {
			
			'use strict';
			this.container.find( '.kmt-responsive-btns button' ).on( 'click', function( event ) {

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
		},
	});
	
	jQuery(' .wp-full-overlay-footer .devices button ').on('click', function() {

		var device = jQuery(this).attr('data-device');

		jQuery( '.customize-control-kmt-responsive .input-wrapper input, .customize-control .kmt-responsive-btns > li' ).removeClass( 'active' );
		jQuery( '.customize-control-kmt-responsive .input-wrapper input.' + device + ', .customize-control .kmt-responsive-btns > li.' + device ).addClass( 'active' );
	});

/**
 * File responsive.js
 *
 * Handles the responsive
 *
 * @package Kemet
 */

wp.customize.controlConstructor[
  "kmt-responsive-select"
] = wp.customize.Control.extend({
  // When we're finished loading continue processing.
  ready: function() {
    "use strict";

    var control = this,
      value;

    control.kmtResponsiveInit();

    /**
     * Save on change / keyup / paste
     */
    this.container.on(
      "change keyup paste",
      "select.kmt-responsive-select",
      function() {
        value = jQuery(this).val();

        // Update value on change.
        control.updateValue();
      }
    );

    /**
     * Refresh preview frame on blur
     */
    this.container.on("blur", "input", function() {
      value = jQuery(this).val() || "";

      if (value == "") {
        wp.customize.previewer.refresh();
      }
    });
  },

  /**
   * Updates the sorting list
   */
  updateValue: function() {
    "use strict";

    var control = this,
      newValue = {};

    // Set the spacing container.
    control.responsiveContainer = control.container
      .find(".kmt-responsive-wrapper")
      .first();

    control.responsiveContainer
      .find("select.kmt-responsive-select")
      .each(function() {
        var responsive_input = jQuery(this),
          item = responsive_input.data("id"),
          item_value = responsive_input.val();

        newValue[item] = item_value;
      });

    control.setting.set(newValue);
  },

  kmtResponsiveInit: function() {
    "use strict";

    var control = this;

    this.container.on("click", ".kmt-responsive-select-btns button", function(
      event
    ) {
      event.preventDefault();

      var device = jQuery(this).attr("data-device");

      if ("desktop" == device) {
        device = "tablet";
      } else if ("tablet" == device) {
        device = "mobile";
      } else {
        device = "desktop";
      }

      jQuery(
        '.wp-full-overlay-footer .devices button[data-device="' + device + '"]'
      ).trigger("click");
    });
  }
});

jQuery(" .wp-full-overlay-footer .devices button ").on("click", function() {
  var device = jQuery(this).attr("data-device");

  jQuery(
    ".customize-control-kmt-responsive-select .input-wrapper select, .customize-control .kmt-responsive-select-btns > li"
  ).removeClass("active");
  jQuery(
    ".customize-control-kmt-responsive-select .input-wrapper select." +
      device +
      ", .customize-control .kmt-responsive-select-btns > li." +
      device
  ).addClass("active");
});

/**
 * File slider.js
 *
 * Handles Slider control
 *
 * @package Kemet
 */

wp.customize.controlConstructor['kmt-responsive-slider'] = wp.customize.Control.extend({

	ready: function () {

		'use strict';

		var control = this,
			value,
			thisInput,
			inputDefault,
			changeAction;

		control.kmtResponsiveInit();

		// Update the text value.
		this.container.on('input change', 'input[type=range]', function () {
			var value = jQuery(this).val(),
				input_number = jQuery(this).closest('.input-field-wrapper').find('.kmt-responsive-range-value-input');

			input_number.val(value);
			input_number.trigger('change');
		});

		// Handle the reset button.
		this.container.on('click', '.kmt-responsive-slider-reset', function () {

			var wrapper = jQuery(this).parent().find('.input-field-wrapper.active'),
				input_range = wrapper.find('input[type=range]'),
				input_number = wrapper.find('.kmt-responsive-range-value-input'),
				default_value = input_range.data('reset_value');

			input_range.val(default_value);
			input_number.val(default_value);
			input_number.trigger('change');
		});

		// Save changes.
		this.container.on('input change', 'input[type=number]', function () {
			var value = jQuery(this).val();
			jQuery(this).closest('.input-field-wrapper').find('input[type=range]').val(value);

			control.updateValue();
		});
	},

	/**
	 * Updates the sorting list
	 */
	updateValue: function () {

		'use strict';

		var control = this,
			newValue = {
				'desktop': '',
				'tablet': '',
				'mobile': '',
				'desktop-unit': 'px',
				'tablet-unit': 'px',
				'mobile-unit': 'px',
			};

		// Set the Slider container.
		control.responsiveContainer = control.container.find('.wrapper').first();

		control.responsiveContainer.find('.kmt-responsive-range-value-input').each(function () {
			var responsive_input = jQuery(this),
				item = responsive_input.data('id'),
				item_value = responsive_input.val();

			newValue[item] = item_value;

		});
		control.container.find('.kmt-slider-unit-wrapper .kmt-slider-unit-input').each(function () {
			var slider_unit = jQuery(this),
				device = slider_unit.attr('data-device'),
				device_val = slider_unit.val(),
				name = device + '-unit';

			newValue[name] = device_val;
		});

		control.setting.set(newValue);
	},

	kmtResponsiveInit: function () {
		'use strict';

		var control = this;

		this.container.on('click', '.kmt-responsive-slider-btns button', function (event) {

			event.preventDefault();
			var device = jQuery(this).attr('data-device');
			if ('desktop' == device) {
				device = 'tablet';
			} else if ('tablet' == device) {
				device = 'mobile';
			} else {
				device = 'desktop';
			}

			jQuery('.wp-full-overlay-footer .devices button[data-device="' + device + '"]').trigger('click');
		});

		// Unit click
		control.container.on('click', '.kmt-slider-responsive-units .single-unit', function () {

			var $this = jQuery(this);

			if ($this.hasClass('active')) {
				return false;
			}
			var unit_value = $this.attr('data-unit'),
				unit_min = $this.attr('data-min'),
				unit_max = $this.attr('data-max'),
				unit_step = $this.attr('data-step'),
				device = jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device');

			$this.siblings().removeClass('active');
			$this.addClass('active');
			control.container.find('.input-field-wrapper.' + device + ' .kmt-responsive-range-' + device + '-input ,.input-field-wrapper.' + device + ' input[type=range]').attr('min', unit_min);
			control.container.find('.input-field-wrapper.' + device + ' .kmt-responsive-range-' + device + '-input ,.input-field-wrapper.' + device + ' input[type=range]').attr('max', unit_max);
			control.container.find('.input-field-wrapper.' + device + ' .kmt-responsive-range-' + device + '-input ,.input-field-wrapper.' + device + ' input[type=range]').attr('step', unit_step);
			control.container.find('.input-field-wrapper.' + device + ' .kmt-responsive-range-' + device + '-input ,.input-field-wrapper.' + device + ' input[type=range]').val('');

			control.container.find('.kmt-slider-unit-wrapper .kmt-slider-' + device + '-unit').val(unit_value);

			// Update value on change.
			control.updateValue();
		});
	},
});

jQuery(' .wp-full-overlay-footer .devices button ').on('click', function () {

	var device = jQuery(this).attr('data-device');

	jQuery('.customize-control-kmt-responsive-slider .input-field-wrapper, .customize-control .kmt-responsive-slider-btns > li').removeClass('active');
	jQuery('.customize-control-kmt-responsive-slider .input-field-wrapper.' + device + ', .customize-control .kmt-responsive-slider-btns > li.' + device).addClass('active');
});

/**
 * File spacing.js
 *
 * Handles the spacing
 *
 * @package Kemet
 */

	wp.customize.controlConstructor['kmt-responsive-spacing'] = wp.customize.Control.extend({

		ready: function() {

			'use strict';

			var control = this,
		    value;
		    
		    control.kmtResponsiveInit();

			// Save the value.
			this.container.on( 'change keyup paste', 'input.kmt-spacing-input', function() {

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

			control.container.find( 'input.kmt-spacing-desktop' ).each( function() {
				var spacing_input = jQuery( this ),
				item = spacing_input.data( 'id' ),
				item_value = spacing_input.val();

				newValue['desktop'][item] = item_value;
			});

			control.container.find( 'input.kmt-spacing-tablet' ).each( function() {
				var spacing_input = jQuery( this ),
				item = spacing_input.data( 'id' ),
				item_value = spacing_input.val();

				newValue['tablet'][item] = item_value;
			});

			control.container.find( 'input.kmt-spacing-mobile' ).each( function() {
				var spacing_input = jQuery( this ),
				item = spacing_input.data( 'id' ),
				item_value = spacing_input.val();

				newValue['mobile'][item] = item_value;
			});

			control.container.find('.kmt-spacing-unit-wrapper .kmt-spacing-unit-input').each( function() {
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
		kmtResponsiveInit : function() {
			
			'use strict';

			var control = this;
			
			control.container.find( '.kmt-spacing-responsive-btns button' ).on( 'click', function( event ) {

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
			control.container.on( 'click', '.kmt-spacing-responsive-units .single-unit', function() {
				
				var $this 		= jQuery(this);

				if ( $this.hasClass('active') ) {
					return false;
				}

				var	unit_value 	= $this.attr('data-unit'),
					device 		= jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device');
				
				$this.siblings().removeClass('active');
				$this.addClass('active');

				control.container.find('.kmt-spacing-unit-wrapper .kmt-spacing-' + device + '-unit').val( unit_value );

				// Update value on change.
				control.updateValue();
			});
		},
	});

	jQuery( document ).ready( function( ) {

		// Connected button
		jQuery( '.kmt-spacing-connected' ).on( 'click', function() {

			// Remove connected class
			jQuery(this).parent().parent( '.kmt-spacing-wrapper' ).find( 'input' ).removeClass( 'connected' ).attr( 'data-element-connect', '' );
			
			// Remove class
			jQuery(this).parent( '.kmt-spacing-input-item-link' ).removeClass( 'disconnected' );

		} );

		// Disconnected button
		jQuery( '.kmt-spacing-disconnected' ).on( 'click', function() {

			// Set up variables
			var elements 	= jQuery(this).data( 'element-connect' );
			
			var linkedInputs = jQuery(this).parent().parent('.kmt-spacing-wrapper').find('.kmt-spacing-input');

			linkedInputs.each(function(){
				var input_val = jQuery(this).val();
				if (input_val != ''){
					jQuery(this).parent().parent('.kmt-spacing-wrapper').find('.kmt-spacing-input').each(function (key, value) {
						jQuery(this).val(input_val).change();
					});
				}
			});

			// Add connected class
			jQuery(this).parent().parent( '.kmt-spacing-wrapper' ).find( 'input' ).addClass( 'connected' ).attr( 'data-element-connect', elements );

			// Add class
			jQuery(this).parent( '.kmt-spacing-input-item-link' ).addClass( 'disconnected' );

		} );

		// Values connected inputs
		jQuery( '.kmt-spacing-input-item' ).on( 'input', '.connected', function() {

			var dataElement 	  = jQuery(this).attr( 'data-element-connect' ),
				currentFieldValue = jQuery( this ).val();

			jQuery(this).parent().parent( '.kmt-spacing-wrapper' ).find( '.connected[ data-element-connect="' + dataElement + '" ]' ).each( function( key, value ) {
				jQuery(this).val( currentFieldValue ).change();
			} );

		} );
	});

	jQuery('.wp-full-overlay-footer .devices button ').on('click', function() {

		var device = jQuery(this).attr('data-device');
		jQuery( '.customize-control-kmt-responsive-spacing .input-wrapper .kmt-spacing-wrapper, .customize-control .kmt-spacing-responsive-btns > li' ).removeClass( 'active' );
		jQuery( '.customize-control-kmt-responsive-spacing .input-wrapper .kmt-spacing-wrapper.' + device + ', .customize-control .kmt-spacing-responsive-btns > li.' + device ).addClass( 'active' );
	});

/**
 * File responsive-icon-select.js
 *
 * Handles Responsive Icon Select
 *
 * @package Kemet
 */
wp.customize.controlConstructor[
  "kmt-responsive-icon-select"
] = wp.customize.Control.extend({
  ready: function() {
    ("use strict");

    var control = this;

    control.kmtResponsiveInit();

    // Change the value
    /**
     * Save on change / keyup / paste
     */
    control.container.on("change", "input.icon-select-input", function() {
      value = jQuery(this).val();

      // Update value on change.
      control.updateValue();
    });
  },
  /**
   * Updates the sorting list
   */
  updateValue: function() {
    "use strict";

    var control = this,
      newValue = {
        desktop: "",
        tablet: "",
        mobile: ""
      };

    control.container.find(".responsive-icon-select").each(function() {
      var responsive_input = jQuery(this).find("input:checked"),
        item = jQuery(this).data("device"),
        item_value =
          responsive_input.val() != undefined ? responsive_input.val() : "";

      newValue[item] = item_value;
    });

    control.setting.set(newValue);
  },
  kmtResponsiveInit: function() {
    "use strict";

    var control = this;

    control.container.on(
      "click",
      ".kmt-responsive-icon-select-btns button",
      function(event) {
        event.preventDefault();

        var device = jQuery(this).attr("data-device");

        if ("desktop" == device) {
          device = "tablet";
        } else if ("tablet" == device) {
          device = "mobile";
        } else {
          device = "desktop";
        }

        jQuery(
          '.wp-full-overlay-footer .devices button[data-device="' +
            device +
            '"]'
        ).trigger("click");
      }
    );
  }
});
jQuery(" .wp-full-overlay-footer .devices button ").on("click", function() {
  var device = jQuery(this).attr("data-device");

  jQuery(
    ".customize-control-kmt-responsive-icon-select .responsive-icon-select, .customize-control .kmt-responsive-icon-select-btns > li"
  ).removeClass("active");
  jQuery(
    ".customize-control-kmt-responsive-icon-select .responsive-icon-select." +
      device +
      ", .customize-control .kmt-responsive-icon-select-btns > li." +
      device
  ).addClass("active");
});

/**
 * File slider.js
 *
 * Handles Slider control
 *
 * @package Kemet
 */

jQuery(window).on("load", function() {
  jQuery("html").addClass("colorpicker-ready");
});

wp.customize.controlConstructor[
  "kmt-reponsive-color"
] = wp.customize.Control.extend({
  ready: function() {
    "use strict";

    var control = this;

    control.kmtResponsiveInit();

    this.container.find(".kmt-color-picker-alpha").wpColorPicker({
      /**
       * @param {Event} event - standard jQuery event, produced by whichever
       * control was changed.
       * @param {Object} ui - standard jQuery UI object, with a color member
       * containing a Color.js object.
       */
      change: function(event, ui) {
        var element = jQuery(event.target);
        var color = ui.color.toString();

        if (jQuery("html").hasClass("colorpicker-ready")) {
          control.updateValues(color, element);
        }
      },

      /**
       * @param {Event} event - standard jQuery event, produced by "Clear"
       * button.
       */
      clear: function(event) {
        var element = jQuery(event.target);
        var color = "";

        if (element) {
          // Add your code here
          control.updateValues(color, element);
        }
      }
    });
  },
  updateValues: function(color, element) {
    var control = this,
      controlValue =
        typeof control.setting.get() === "object"
          ? control.setting.get()
          : {
              desktop: "",
              tablet: "",
              mobile: ""
            },
      newValue = {
        desktop: controlValue["desktop"],
        tablet: controlValue["tablet"],
        mobile: controlValue["mobile"]
      },
      device = element.parents(".customize-control-content").data("device");

    newValue[device] = color;

    control.setting.set(newValue);
  },
  kmtResponsiveInit: function() {
    "use strict";

    var control = this;

    control.container
      .find(".kmt-responsive-color-btns a")
      .click(function(event) {
        event.preventDefault();

        var device = jQuery(this).attr("data-device");

        if ("desktop" == device) {
          device = "tablet";
        } else if ("tablet" == device) {
          device = "mobile";
        } else {
          device = "desktop";
        }

        jQuery(
          '.wp-full-overlay-footer .devices button[data-device="' +
            device +
            '"]'
        ).trigger("click");
      });
  }
});
jQuery(" .wp-full-overlay-footer .devices button ").on("click", function() {
  var device = jQuery(this).attr("data-device");

  jQuery(
    ".customize-control-kmt-reponsive-color .customize-control-content, .customize-control .kmt-responsive-color-btns > li"
  ).removeClass("active");
  jQuery(
    ".customize-control-kmt-reponsive-color .customize-control-content." +
      device +
      ", .customize-control .kmt-responsive-color-btns > li." +
      device
  ).addClass("active");
});

(function ($) {
  var api = wp.customize;

  wp.customize.controlConstructor["kmt-group"] = wp.customize.Control.extend({
    ready: function () {
      var control = this;

      /* Model Popup */
      $(".wp-full-overlay-sidebar-content, .wp-picker-container").click(
        function (e) {
          if (
            !$(e.target).closest(".kmt-group-model").length &&
            !$(e.target).closest(".model-button").length
          ) {
            $(".model-button.open").trigger("click");
          }
        }
      );
      control.container.on(
        "click",
        ".kmt-group-control .model-button",
        function () {
          var $this = $(this),
            parentWrap = $this.closest(".customize-control-kmt-group"),
            Section = parentWrap.parents(".control-section");

          if ($this.hasClass("open")) {
            parentWrap.find(".kmt-group-model").hide();
          } else {
            /* Close popup when another popup is clicked to open */
            var getOpenPopup = Section.find(".model-button.open");
            if (getOpenPopup.length > 0) {
              getOpenPopup.trigger("click");
            }

            if (!$.trim(parentWrap.find(".model-list").html())) {
              control.loadModelPopup();
            }
            parentWrap.find(".kmt-group-model").show();
          }
          $(this).toggleClass("open");
        }
      );
    },
    loadModelPopup: function () {
      var control = this,
        controlTypes = [],
        html = "",
        fields = control.params.group;

      if ("undefined" != typeof fields.tabs) {
        var controlID = control.params.id.replace("[", "-"),
          controlID = controlID.replace("]", ""),
          count = 0;

        html += "<div id=" + controlID + ' class="kmt-group-tabs">';
        html += '<ul class="kmt-tabs-list">';

        _.each(fields.tabs, function (value, key) {
          var classes = "";

          if (count == 0) {
            classes += "active";
          }

          html +=
            '<li class="' +
            classes +
            '"><a href="#' +
            key +
            '-tab"><span>' +
            key +
            "</span></a></li>";

          count++;
        });

        html += "</ul>";

        html += '<div class="kmt-tab-wrap" >';

        _.each(fields.tabs, function (tab, key) {
          html += '<div id="' + key + '-tab" class="tab">';

          var group = control.getGroupContent(tab);

          html += group.html;

          _.each(group.controls, function (attrs, key) {
            controlTypes.push({
              id: attrs.id,
              value: attrs.value,
              type: attrs.type,
            });
          });

          html += "</div>";
        });

        html += "</div></div>";

        control.container.find(".model-list").append(html);

        $("#" + controlID + ".kmt-group-tabs").tabs({ active: 0 });
      } else {
        var group = control.getGroupContent(fields);
        html += group.html;
        control.container.find(".model-list").append(html);
        _.each(group.controls, function (attrs, key) {
          controlTypes.push({
            id: attrs.id,
            value: attrs.value,
            type: attrs.type,
          });
        });
      }

      _.each(controlTypes, function (attrs, index) {
        var controlContainerID = attrs.id.replace("[", "");
        controlContainerID = controlContainerID.replace("]", "");

        switch (attrs.type) {
          case "kmt-responsive-slider":
            //Save Value on In put Change
            $(
              ".kmt-group-model ul li#customize-control-" + controlContainerID
            ).on("input change", "input[type=range]", function () {
              var value = $(this).val(),
                input_number = $(this)
                  .closest(".input-field-wrapper")
                  .find(".kmt-responsive-range-value-input");

              input_number.val(value);
              input_number.trigger("change");
            });

            // Handle the reset button.
            $(
              ".kmt-group-model ul li#customize-control-" + controlContainerID
            ).on("click", ".kmt-responsive-slider-reset", function () {
              var wrapper = jQuery(this)
                  .parent()
                  .find(".input-field-wrapper.active"),
                input_range = wrapper.find("input[type=range]"),
                input_number = wrapper.find(
                  ".kmt-responsive-range-value-input"
                ),
                default_value = input_range.data("reset_value");

              input_range.val(default_value);
              input_number.val(default_value);
              input_number.trigger("change");
            });

            // Save changes.
            $(
              ".kmt-group-model ul li#customize-control-" + controlContainerID
            ).on("input change", "input[type=number]", function () {
              var value = $(this).val();
              input_number = $(this)
                .closest(".input-field-wrapper")
                .find("input[type=range]");

              input_number.val(value);
              control.initResponsiveSlider(controlContainerID, attrs.id);
            });

            //Get Unit Attrs
            $(
              ".kmt-group-model ul li#customize-control-" + controlContainerID
            ).on(
              "click",
              ".kmt-slider-responsive-units .single-unit",
              function () {
                var unit = $(this);
                var controlID = $(
                  ".kmt-group-model ul li#customize-control-" +
                    controlContainerID
                );
                if (unit.hasClass("active")) {
                  return false;
                }
                var unit_value = unit.attr("data-unit"),
                  unit_min = unit.attr("data-min"),
                  unit_max = unit.attr("data-max"),
                  unit_step = unit.attr("data-step"),
                  device = $(
                    ".wp-full-overlay-footer .devices button.active"
                  ).attr("data-device");

                unit.siblings().removeClass("active");
                unit.addClass("active");
                console.log(controlID);
                $(controlID)
                  .find(
                    ".input-field-wrapper." +
                      device +
                      " .kmt-responsive-range-" +
                      device +
                      "-input ,.input-field-wrapper." +
                      device +
                      " input[type=range]"
                  )
                  .attr("min", unit_min);
                $(controlID)
                  .find(
                    ".input-field-wrapper." +
                      device +
                      " .kmt-responsive-range-" +
                      device +
                      "-input ,.input-field-wrapper." +
                      device +
                      " input[type=range]"
                  )
                  .attr("max", unit_max);
                $(controlID)
                  .find(
                    ".input-field-wrapper." +
                      device +
                      " .kmt-responsive-range-" +
                      device +
                      "-input ,.input-field-wrapper." +
                      device +
                      " input[type=range]"
                  )
                  .attr("step", unit_step);
                $(controlID)
                  .find(
                    ".input-field-wrapper." +
                      device +
                      " .kmt-responsive-range-" +
                      device +
                      "-input ,.input-field-wrapper." +
                      device +
                      " input[type=range]"
                  )
                  .val("");

                $(controlID)
                  .find(
                    ".kmt-slider-unit-wrapper .kmt-slider-" + device + "-unit"
                  )
                  .val(unit_value);

                // Update value on change.
                control.initResponsiveSlider(
                  "#" + controlContainerID,
                  attrs.id
                );
              }
            );

            control.initResponsiveTrigger();
            break;
          case "kmt-font-family":
            var controlID = attrs.id;
            $(".kmt-group-model ul li#customize-control-" + controlContainerID)
              .find("select")
              .html(kemet.font_family_select);

            $(".kmt-group-model ul li#customize-control-" + controlContainerID)
              .find("select")
              .val(attrs.value);

            $(".kmt-group-model ul li#customize-control-" + controlContainerID)
              .find("select")
              .select2({ width: "100%" })
              .css("width", "100%");

            $(
              ".kmt-group-model ul li#customize-control-" + controlContainerID
            ).on("change", "select", function () {
              var select = $(this),
                value = select.val();

              control.initSelect(value, controlID);
            });

            $(
              ".kmt-group-model ul li#customize-control-" + controlContainerID
            ).on("change", "select", function () {
              var attrs = control.getField(fields, controlID),
                family = "li#customize-control-" + controlContainerID,
                weight = attrs.connect.replace("kemet-settings[", ""),
                weight = "li#customize-control-" + weight.replace("]", "");

              control.setFontWeightOptions(family, weight, attrs.connect);
              api.control(attrs.connect).setting.set("");
            });

            break;
          case "kmt-font-weight":
            var attrs = control.getField(fields, attrs.id),
              weight = "li#customize-control-" + controlContainerID,
              family = attrs.connect.replace("kemet-settings[", ""),
              family = "li#customize-control-" + family.replace("]", ""),
              value = attrs.value != "" ? attrs.value : 400;
            controlID = attrs.id;

            control.setFontWeightOptions(
              family,
              weight,
              "kemet-settings" + controlID
            );

            $(".kmt-group-model ul li#customize-control-" + controlContainerID)
              .find("select")
              .val(value);

            $(
              ".kmt-group-model ul li#customize-control-" + controlContainerID
            ).on("change", "select", function () {
              var select = $(this),
                value = select.val();

              control.initSelect(value, controlID);
            });
            control.inlineControls();
            break;
          case "kmt-select":
            controlID = attrs.id;

            $(
              ".kmt-group-model ul li#customize-control-" + controlContainerID
            ).on("change", "select", function () {
              var select = $(this),
                value = select.val();

              control.initSelect(value, controlID);
            });
            break;
          case "kmt-color":
            var controlID = "kemet-settings" + attrs.id;
            control.initColor(controlContainerID, controlID);

            break;
          case "kmt-background":
            var controlID = "kemet-settings" + attrs.id,
              controlValue = attrs.value;

            control.initBackgroundColor(
              controlContainerID,
              controlID,
              controlValue
            );
            break;
          case "kmt-responsive-select":
            var controlID = "kemet-settings" + attrs.id,
              controlValue = attrs.value;

            /**
             * Save on change / keyup / paste
             */
            $(
              ".kmt-group-model ul li#customize-control-" + controlContainerID
            ).on(
              "change keyup paste",
              "select.kmt-responsive-select",
              function () {
                value = $(this).val();

                // Update value on change.
                control.initResponsiveSelect(controlContainerID, controlID);
              }
            );

            /**
             * Refresh preview frame on blur
             */
            $(
              ".kmt-group-model ul li#customize-control-" + controlContainerID
            ).on("blur", "input", function () {
              value = $(this).val() || "";

              if (value == "") {
                wp.customize.previewer.refresh();
              }
            });

            control.initResponsiveTrigger();
            break;
          case "kmt-responsive-spacing":
            var controlID = "kemet-settings" + attrs.id,
              controlValue = attrs.value;
            // Save the value.
            $(
              ".kmt-group-model ul li#customize-control-" + controlContainerID
            ).on("change keyup paste", "input.kmt-spacing-input", function () {
              // Update value on change.
              control.initResponsiveSpacing(controlContainerID, controlID);
            });
            control.responsiveSpacingConnect();
            control.initResponsiveTrigger();
            break;
          case "kmt-slider":
            var controlID = "kemet-settings" + attrs.id;

            // Update the text value.
            $("input[type=range]").on("input change", function () {
              var value = $(this).val(),
                input_number = $(this)
                  .closest(".wrapper")
                  .find(".kemet_range_value .value");

              input_number.val(value);
              input_number.change();
            });
            // Handle the reset button.
            $(".kmt-slider-reset").click(function () {
              var wrapper = $(this).closest(".wrapper"),
                input_range = wrapper.find("input[type=range]"),
                input_number = wrapper.find(".kemet_range_value .value"),
                default_value = input_range.data("reset_value");

              input_range.val(default_value);
              input_number.val(default_value);
              input_number.change();
            });

            control.initSlider(controlContainerID, controlID);
            break;
        }
      });
    },
    getGroupContent: function (fields) {
      "use strict";

      var controlTypes = [],
        fieldsHtml = "";

      _.each(fields, function (attr, index) {
        var control_id = "kemet-settings" + attr.id;
        var values = api.get();
        var newValue = values[control_id] ? values[control_id] : "";
        var type = attr.control_type;
        switch (type) {
          case "kmt-font-family":
            type = "kmt-select";
            break;
          case "kmt-font-weight":
            type = "kmt-select";
            break;
        }
        var templateId = "customize-control-" + type + "-content";
        var template = wp.template(templateId);
        var value = newValue || attr.default;
        attr.value = value;
        var control_clean_name = attr.id.replace("[", "");
        control_clean_name = control_clean_name.replace("]", "");
        fieldsHtml +=
          "<li id='customize-control-" +
          control_clean_name +
          "' class='customize-control customize-control-" +
          attr.control_type +
          "' >";
        fieldsHtml += template(attr);
        fieldsHtml += "</li>";

        controlTypes.push({
          id: attr.id,
          value: value,
          type: attr.control_type,
        });
      });
      var result = new Object();

      result.controls = controlTypes;
      result.html = fieldsHtml;

      return result;
    },
    getField: function (fields, fieldID) {
      "use strict";
      var controlAttrs = "";
      _.each(fields, function (attrs, index) {
        if (fieldID == attrs.id) {
          controlAttrs = attrs;
        }
      });
      return controlAttrs;
    },
    initResponsiveSlider: function (controlContainer, control) {
      "use strict";

      var newValue = {
        desktop: "",
        tablet: "",
        mobile: "",
        "desktop-unit": "px",
        "tablet-unit": "px",
        "mobile-unit": "px",
      };

      // Set the Slider container.
      $("li#customize-control-" + controlContainer)
        .find(".kmt-responsive-range-value-input")
        .each(function () {
          var responsive_input = $(this),
            item = responsive_input.data("id"),
            item_value = responsive_input.val();

          newValue[item] = item_value;
        });
      $("li#customize-control-" + controlContainer)
        .find(".kmt-slider-unit-wrapper .kmt-slider-unit-input")
        .each(function () {
          var slider_unit = $(this),
            device = slider_unit.attr("data-device"),
            device_val = slider_unit.val(),
            name = device + "-unit";

          newValue[name] = device_val;
        });
      var control_id = "kemet-settings" + control;
      api.control(control_id).setting.set(newValue);
    },
    setFontWeightOptions: function (select, fontWeightContainer, weightKey) {
      var i = 0,
        fontValue = $(select).find("select").val()
          ? $(select).find("select").val()
          : "inherit",
        selected = "",
        weightSelect = $(fontWeightContainer).find("select"),
        currentWeightTitle = weightSelect.data("inherit"),
        weightValue = weightSelect.val(),
        inheritWeightObject = ["inherit"],
        weightObject = ["400", "600"],
        weightOptions = "",
        weightMap = kemetTypo;

      if (fontValue == "inherit") {
        weightOptions +=
          '<option value="inherit" selected="selected">Inherit</option>';
      }
      var fontValue = KmtTypography._cleanGoogleFonts(fontValue);

      if (fontValue == "inherit") {
        weightObject = ["400", "500", "600", "700"];
      } else if ("undefined" != typeof KmtFontFamilies.system[fontValue]) {
        weightObject = KmtFontFamilies.system[fontValue].weights;
      } else if ("undefined" != typeof KmtFontFamilies.google[fontValue]) {
        weightObject = KmtFontFamilies.google[fontValue][0];
        weightObject = Object.keys(weightObject).map(function (k) {
          return weightObject[k];
        });
      } else if (
        "undefined" != typeof KmtFontFamilies.custom[fontValue.split(",")[0]]
      ) {
        weightObject = KmtFontFamilies.custom[fontValue.split(",")[0]].weights;
      }

      weightObject = $.merge(inheritWeightObject, weightObject);
      weightMap["inherit"] = currentWeightTitle;
      for (; i < weightObject.length; i++) {
        if (0 === i && -1 === $.inArray(weightValue, weightObject)) {
          weightValue = weightObject[0];
          selected = ' selected="selected"';
        } else {
          selected =
            weightObject[i] == weightValue ? ' selected="selected"' : "";
        }
        if ("undefined" != typeof weightMap[weightObject[i]]) {
          weightOptions +=
            '<option value="' +
            weightObject[i] +
            '"' +
            selected +
            ">" +
            weightMap[weightObject[i]] +
            "</option>";
        }
      }

      weightSelect.html(weightOptions);
    },
    initSelect: function (value, controlID) {
      var control_id = "kemet-settings" + controlID;
      api.control(control_id).setting.set(value);
    },
    initResponsiveTrigger: function () {
      this.initResponsiveBtn();
      $(".kmt-group-model ul li")
        .find(".kmt-responsive-control-btns button")
        .on("click", function (event) {
          event.preventDefault();

          var device = $(this).attr("data-device");

          if ("desktop" == device) {
            device = "tablet";
          } else if ("tablet" == device) {
            device = "mobile";
          } else {
            device = "desktop";
          }
          $(
            '.wp-full-overlay-footer .devices button[data-device="' +
              device +
              '"]'
          ).trigger("click");
        });
      this.deviceBtnTrigger();
    },
    initColor: function (controlContainer, control) {
      $("li#customize-control-" + controlContainer)
        .find(".kmt-color-picker-alpha")
        .wpColorPicker({
          /**
           * @param {Event} event - standard $ event, produced by whichever
           * control was changed.
           * @param {Object} ui - standard $ UI object, with a color member
           * containing a Color.js object.
           */
          change: function (event, ui) {
            var element = event.target;
            var color = ui.color.toString();

            if ($("html").hasClass("colorpicker-ready")) {
              api.control(control).setting.set(color);
            }
          },

          /**
           * @param {Event} event - standard $ event, produced by "Clear"
           * button.
           */
          clear: function (event) {
            var element = $(event.target)
              .closest(".wp-picker-input-wrap")
              .find(".wp-color-picker")[0];
            var color = "";

            if (element) {
              // Add your code here
              api.control(control).setting.set(color);
            }
          },
        });
    },
    initBackgroundColor: function (controlContainer, controlID, controlValue) {
      var control = this,
        defaults = {
          "background-color": "",
          "background-image": "",
          "background-repeat": "repeat",
          "background-position": "center center",
          "background-size": "auto",
          "background-attachment": "scroll",
        },
        value = controlValue != "" ? controlValue : defaults,
        picker = $("li#customize-control-" + controlContainer).find(
          ".kmt-color-control"
        );

      // Hide unnecessary controls if the value doesn't have an image.
      if (
        _.isUndefined(value["background-image"]) ||
        "" === value["background-image"]
      ) {
        $("li#customize-control-" + controlContainer)
          .find(".background-wrapper > .background-repeat")
          .hide();
        $("li#customize-control-" + controlContainer)
          .find(".background-wrapper > .background-position")
          .hide();
        $("li#customize-control-" + controlContainer)
          .find(".background-wrapper > .background-size")
          .hide();
        $("li#customize-control-" + controlContainer)
          .find(".background-wrapper > .background-attachment")
          .hide();
      }

      // Color.
      picker.wpColorPicker({
        change: function () {
          if ($("html").hasClass("background-colorpicker-ready")) {
            setTimeout(function () {
              value["background-color"] = picker.val();
              control.saveBackgroundValue(value, controlContainer, controlID);
            }, 100);
          }
        },

        /**
         * @param {Event} event - standard $ event, produced by "Clear"
         * button.
         */
        clear: function (event) {
          var element = $(event.target)
            .closest(".wp-picker-input-wrap")
            .find(".wp-color-picker")[0];

          if (element) {
            value["background-color"] = "";
            control.saveBackgroundValue(value, controlContainer, controlID);
          }
        },
      });

      // Background-Repeat.
      $("li#customize-control-" + controlContainer).on(
        "change",
        ".background-repeat select",
        function () {
          value["background-repeat"] = $(this).val();
          control.saveBackgroundValue(value, controlContainer, controlID);
        }
      );

      // Background-Size.
      $("li#customize-control-" + controlContainer).on(
        "change click",
        ".background-size input",
        function () {
          value["background-size"] = $(this).val();
          control.saveBackgroundValue(value, controlContainer, controlID);
        }
      );

      // Background-Position.
      $("li#customize-control-" + controlContainer).on(
        "change",
        ".background-position select",
        function () {
          value["background-position"] = $(this).val();
          control.saveBackgroundValue(value, controlContainer, controlID);
        }
      );

      // Background-Attachment.
      $("li#customize-control-" + controlContainer).on(
        "change click",
        ".background-attachment input",
        function () {
          value["background-attachment"] = $(this).val();
          control.saveBackgroundValue(value, controlContainer, controlID);
        }
      );

      // Background-Image.
      $("li#customize-control-" + controlContainer).on(
        "click",
        ".background-image-upload-button",
        function (e) {
          var image = wp
            .media({ multiple: false })
            .open()
            .on("select", function () {
              // This will return the selected image from the Media Uploader, the result is an object.
              var uploadedImage = image.state().get("selection").first(),
                previewImage = uploadedImage.toJSON().sizes.full.url,
                imageUrl,
                imageID,
                imageWidth,
                imageHeight,
                preview,
                removeButton;

              if (!_.isUndefined(uploadedImage.toJSON().sizes.medium)) {
                previewImage = uploadedImage.toJSON().sizes.medium.url;
              } else if (
                !_.isUndefined(uploadedImage.toJSON().sizes.thumbnail)
              ) {
                previewImage = uploadedImage.toJSON().sizes.thumbnail.url;
              }

              imageUrl = uploadedImage.toJSON().sizes.full.url;
              imageID = uploadedImage.toJSON().id;
              imageWidth = uploadedImage.toJSON().width;
              imageHeight = uploadedImage.toJSON().height;

              // Show extra controls if the value has an image.
              if ("" !== imageUrl) {
                $("li#customize-control-" + controlContainer)
                  .find(
                    ".background-wrapper > .background-repeat, .background-wrapper > .background-position, .background-wrapper > .background-size, .background-wrapper > .background-attachment"
                  )
                  .show();
                $("li#customize-control-" + controlContainer)
                  .find(".more-settings")
                  .attr("data-direction", "up");
                $("li#customize-control-" + controlContainer)
                  .find(".message")
                  .html(kemetCustomizerControlBackground.lessSettings);
              }

              value["background-image"] = imageUrl;
              control.saveBackgroundValue(value, controlContainer, controlID);
              preview = $("li#customize-control-" + controlContainer).find(
                ".placeholder, .thumbnail"
              );
              removeButton = $("li#customize-control-" + controlContainer).find(
                ".background-image-upload-remove-button"
              );

              if (preview.length) {
                preview
                  .removeClass()
                  .addClass("thumbnail thumbnail-image")
                  .html('<img src="' + previewImage + '" alt="" />');
              }
              if (removeButton.length) {
                removeButton.show();
              }
            });

          e.preventDefault();
        }
      );

      $("li#customize-control-" + controlContainer).on(
        "click",
        ".background-image-upload-remove-button",
        function (e) {
          var preview, removeButton;

          e.preventDefault();

          value["background-image"] = "";
          control.saveBackgroundValue(value, controlContainer, controlID);

          preview = $("li#customize-control-" + controlContainer).find(
            ".placeholder, .thumbnail"
          );
          removeButton = $("li#customize-control-" + controlContainer).find(
            ".background-image-upload-remove-button"
          );

          // Hide unnecessary controls.
          $("li#customize-control-" + controlContainer)
            .find(".background-wrapper > .background-repeat")
            .hide();
          $("li#customize-control-" + controlContainer)
            .find(".background-wrapper > .background-position")
            .hide();
          $("li#customize-control-" + controlContainer)
            .find(".background-wrapper > .background-size")
            .hide();
          $("li#customize-control-" + controlContainer)
            .find(".background-wrapper > .background-attachment")
            .hide();

          $("li#customize-control-" + controlContainer)
            .find(".more-settings")
            .attr("data-direction", "down");
          $("li#customize-control-" + controlContainer)
            .find(".more-settings")
            .find(".message")
            .html(kemetCustomizerControlBackground.moreSettings);

          if (preview.length) {
            preview
              .removeClass()
              .addClass("placeholder")
              .html(kemetCustomizerControlBackground.placeholder);
          }
          if (removeButton.length) {
            removeButton.hide();
          }
        }
      );

      $("li#customize-control-" + controlContainer).on(
        "click",
        ".more-settings",
        function (e) {
          var $this = $(this);
          // Hide unnecessary controls.
          $("li#customize-control-" + controlContainer)
            .find(".background-wrapper > .background-repeat")
            .toggle();
          $("li#customize-control-" + controlContainer)
            .find(".background-wrapper > .background-position")
            .toggle();
          $("li#customize-control-" + controlContainer)
            .find(".background-wrapper > .background-size")
            .toggle();
          $("li#customize-control-" + controlContainer)
            .find(".background-wrapper > .background-attachment")
            .toggle();

          if ("down" === $this.attr("data-direction")) {
            $this.attr("data-direction", "up");
            $this
              .find(".message")
              .html(kemetCustomizerControlBackground.lessSettings);
          } else {
            $this.attr("data-direction", "down");
            $this
              .find(".message")
              .html(kemetCustomizerControlBackground.moreSettings);
          }
        }
      );
    },
    saveBackgroundValue: function (value, controlContainerID, control) {
      var input = $(
        "li#customize-control-" +
          controlContainerID +
          " .background-hidden-value"
      );

      $(input).attr("value", JSON.stringify(value)).trigger("change");

      api.control(control).setting.set("");
      api.control(control).setting.set(value);
    },
    initResponsiveSelect: function (controlContainerID, control) {
      // Set the spacing container.
      var responsiveContainer = $("li#customize-control-" + controlContainerID)
          .find(".kmt-responsive-wrapper")
          .first(),
        newValue = {};

      responsiveContainer
        .find("select.kmt-responsive-select")
        .each(function () {
          var responsive_input = $(this),
            item = responsive_input.data("id"),
            item_value = responsive_input.val();

          newValue[item] = item_value;
        });

      api.control(control).setting.set(newValue);
    },
    initResponsiveSpacing: function (controlContainerID, control) {
      "use strict";

      var newValue = {
        desktop: {},
        tablet: {},
        mobile: {},
        "desktop-unit": "px",
        "tablet-unit": "px",
        "mobile-unit": "px",
      };

      $("li#customize-control-" + controlContainerID)
        .find("input.kmt-spacing-desktop")
        .each(function () {
          var spacing_input = $(this),
            item = spacing_input.data("id"),
            item_value = spacing_input.val();

          newValue["desktop"][item] = item_value;
        });

      $("li#customize-control-" + controlContainerID)
        .find("input.kmt-spacing-tablet")
        .each(function () {
          var spacing_input = $(this),
            item = spacing_input.data("id"),
            item_value = spacing_input.val();

          newValue["tablet"][item] = item_value;
        });

      $("li#customize-control-" + controlContainerID)
        .find("input.kmt-spacing-mobile")
        .each(function () {
          var spacing_input = $(this),
            item = spacing_input.data("id"),
            item_value = spacing_input.val();

          newValue["mobile"][item] = item_value;
        });

      $("li#customize-control-" + controlContainerID)
        .find(".kmt-spacing-unit-wrapper .kmt-spacing-unit-input")
        .each(function () {
          var spacing_unit = $(this),
            device = spacing_unit.attr("data-device"),
            device_val = spacing_unit.val(),
            name = device + "-unit";

          newValue[name] = device_val;
        });

      api.control(control).setting.set(newValue);
    },
    responsiveSpacingConnect: function () {
      // Connected button
      $(".kmt-spacing-connected").on("click", function () {
        // Remove connected class
        $(this)
          .parent()
          .parent(".kmt-spacing-wrapper")
          .find("input")
          .removeClass("connected")
          .attr("data-element-connect", "");

        // Remove class
        $(this)
          .parent(".kmt-spacing-input-item-link")
          .removeClass("disconnected");
      });

      // Disconnected button
      $(".kmt-spacing-disconnected").on("click", function () {
        // Set up variables
        var elements = $(this).data("element-connect");

        var linkedInputs = $(this)
          .parent()
          .parent(".kmt-spacing-wrapper")
          .find(".kmt-spacing-input");

        linkedInputs.each(function () {
          var input_val = $(this).val();
          if (input_val != "") {
            $(this)
              .parent()
              .parent(".kmt-spacing-wrapper")
              .find(".kmt-spacing-input")
              .each(function (key, value) {
                $(this).val(input_val).change();
              });
          }
        });

        // Add connected class
        $(this)
          .parent()
          .parent(".kmt-spacing-wrapper")
          .find("input")
          .addClass("connected")
          .attr("data-element-connect", elements);

        // Add class
        $(this).parent(".kmt-spacing-input-item-link").addClass("disconnected");
      });

      // Values connected inputs
      $(".kmt-spacing-input-item").on("input", ".connected", function () {
        var dataElement = $(this).attr("data-element-connect"),
          currentFieldValue = $(this).val();

        $(this)
          .parent()
          .parent(".kmt-spacing-wrapper")
          .find('.connected[ data-element-connect="' + dataElement + '" ]')
          .each(function (key, value) {
            $(this).val(currentFieldValue).change();
          });
      });
    },
    initSlider: function (controlContainerID, control) {
      // Save changes.
      $("li#customize-control-" + controlContainerID).on(
        "input change",
        "input[type=number]",
        function () {
          var value = jQuery(this).val();
          jQuery(this).closest(".wrapper").find("input[type=range]").val(value);
          api.control(control).setting.set(value);
        }
      );
    },
    inlineControls: function () {
      //Inline Style
      var font_weight_controls = jQuery("#customize-theme-controls").find(
        ".customize-control-kmt-font-weight"
      );
      font_weight_controls.each(function () {
        var font_weight_control = jQuery(this);
        var font_tranform_control = font_weight_control.next(
            ".customize-control-select"
          ),
          font_tranform_control_kmt_select = font_weight_control.next(
            ".customize-control-kmt-select"
          );

        font_weight_control.addClass("controls-inline");
        font_weight_control.css("padding-right", "5px");
        font_tranform_control.addClass("controls-inline");
        font_tranform_control.css("padding-left", "5px");
        font_tranform_control_kmt_select.addClass("controls-inline");
        font_tranform_control_kmt_select.css("padding-left", "5px");
      });
    },
    deviceBtnTrigger: function () {
      $(" .wp-full-overlay-footer .devices button ").on("click", function () {
        var device = $(this).attr("data-device");

        $(".customize-control .kmt-responsive-control-btns > li").removeClass(
          "active"
        );
        $(
          ".customize-control .kmt-responsive-control-btns > li." + device
        ).addClass("active");
      });
    },
    initResponsiveBtn: function () {
      var active = "";
      $(" .wp-full-overlay-footer .devices button").each(function () {
        var device = $(this).attr("data-device");

        if ($(this).hasClass("active")) {
          active += device;
        }
      });

      $(".kmt-responsive-control-btns > li." + active).addClass("active");
      $(".kmt-responsive-control-btns > li." + active)
        .siblings()
        .removeClass("active");
    },
  });
})(jQuery);
