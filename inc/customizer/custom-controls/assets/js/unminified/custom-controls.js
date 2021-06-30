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
