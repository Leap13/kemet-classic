(function ($) {
  var api = wp.customize;

  wp.customize.controlConstructor["kmt-group"] = wp.customize.Control.extend({
    ready: function () {
      var control = this,
        controlTypes = [],
        fields = control.params.group;

      var group = control.getGroupContent(fields);

      _.each(group.controls, function (attrs, key) {
        controlTypes.push({
          id: attrs.id,
          value: attrs.value,
          type: attrs.type,
        });
      });

      control.container.find(".model-list").append(group.html);

      _.each(controlTypes, function (attrs, index) {
        var controlContainerID = attrs.id.replace("[", "");
        controlContainerID = controlContainerID.replace("]", "");

        switch (attrs.type) {
          case "kmt-responsive-slider":
            //Save Value on In put Change
            $(
              ".kmt-group-model ul li#customize-control-" + controlContainerID
            ).on("input change", "input[type=range]", function () {
              var value = jQuery(this).val(),
                input_number = jQuery(this)
                  .closest(".input-field-wrapper")
                  .find(".kmt-responsive-range-value-input");

              input_number.val(value);
              input_number.trigger("change");
            });

            // Save changes.
            $(
              ".kmt-group-model ul li#customize-control-" + controlContainerID
            ).on("input change", "input[type=number]", function () {
              var value = jQuery(this).val();
              input_number = jQuery(this)
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
                var unit = jQuery(this);
                var control = $(".kmt-group-model ul li#" + controlContainerID);
                if (unit.hasClass("active")) {
                  return false;
                }
                var unit_value = unit.attr("data-unit"),
                  unit_min = unit.attr("data-min"),
                  unit_max = unit.attr("data-max"),
                  unit_step = unit.attr("data-step"),
                  device = jQuery(
                    ".wp-full-overlay-footer .devices button.active"
                  ).attr("data-device");

                unit.siblings().removeClass("active");
                unit.addClass("active");
                $(control)
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
                $(control)
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
                $(control)
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
                $(control)
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

                $(control)
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

            control.initResponsiveTrigger(".kmt-group-model ul li");

            break;
          case "kmt-font-family":
            $(".kmt-group-model ul li#customize-control-" + controlContainerID)
              .find("select")
              .selectWoo({
                width: "100%",
              });

            $(
              ".kmt-group-model ul li#customize-control-" + controlContainerID
            ).on("change", "select", function () {
              var select = $(this),
                link = select.data("customize-setting-link"),
                weight = select.data("connected-control");

              var fontFamilyContainer = $(
                ".kmt-group-model ul li#customize-control-" +
                  api.control(link).container.attr("id")
              );
              var fontWeightContainer = $(
                ".kmt-group-model ul li#customize-control-" +
                  api.control(weight).container.attr("id")
              );

              $this.setFontWeightOptions(
                fontFamilyContainer,
                fontWeightContainer
              );
            });

            break;
          case "kmt-font-weight":
            $(".kmt-group-model ul li#customize-control-" + controlContainerID)
              .find("select")
              .each(function () {
                var select = $(this),
                  weight = select.data("customize-setting-link"),
                  family = select.data("connected-control");

                var fontFamilyContainer = $(
                  ".kmt-group-model ul li#customize-control-" +
                    api.control(family).container.attr("id")
                );
                var fontWeightContainer = $(
                  ".kmt-group-model ul li#customize-control-" +
                    api.control(weight).container.attr("id")
                );

                $this.setFontWeightOptions(
                  fontFamilyContainer,
                  fontWeightContainer
                );
              });

            $(
              ".kmt-group-model ul li#customize-control-" + controlContainerID
            ).on("change", "select", function () {
              var value = $(this).val();

              api.control(val).setting.set(value);
            });
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
          var responsive_input = jQuery(this),
            item = responsive_input.data("id"),
            item_value = responsive_input.val();

          newValue[item] = item_value;
        });
      $("li#customize-control-" + controlContainer)
        .find(".kmt-slider-unit-wrapper .kmt-slider-unit-input")
        .each(function () {
          var slider_unit = jQuery(this),
            device = slider_unit.attr("data-device"),
            device_val = slider_unit.val(),
            name = device + "-unit";

          newValue[name] = device_val;
        });
      var control_id = "kemet-settings" + control;
      api.control(control_id).setting.set(newValue);
    },
    setFontWeightOptions: function (select, fontWeightContainer) {
      var i = 0,
        fontValue = select.find("select").val(),
        selected = "",
        weightSelect = $(fontWeightContainer).find("select"),
        currentWeightTitle = weightSelect.data("inherit"),
        weightValue = weightSelect.val(),
        inheritWeightObject = ["inherit"],
        weightObject = ["400", "600"],
        weightOptions = "",
        weightMap = kemetTypo;

      if (fontValue == "inherit") {
        weightValue = weightSelect.val();
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
    initResponsiveTrigger: function (wrap) {
      $(wrap)
        .find(".kmt-responsive-control-btns button")
        .on("click", function (event) {
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
    },
  });

  $(function () {
    var modelButton = $(".model-button");
    $(modelButton).click(function () {
      $(this).toggleClass("open");
      $(this)
        .parent()
        .parent()
        .parent()
        .find(".kmt-group-model")
        .toggleClass("open");
    });
  });
})(jQuery);
