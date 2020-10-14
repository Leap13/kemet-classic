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
