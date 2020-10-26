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
