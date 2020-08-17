(function ($) {
  var api = wp.customize;

  wp.customize.controlConstructor["kmt-group"] = wp.customize.Control.extend({
    ready: function () {
      var control = this,
        controlTypes = [],
        fields = control.params.group;

      var group = control.getGroupContent(fields);
      control.container.find(".model-list").append(group.html);
      _.each(group.controls, function (attrs, key) {
        controlTypes.push({
          id: attrs.id,
          value: attrs.value,
          type: attrs.type,
        });
      });

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

            var controlID = attrs.id;
            $(".kmt-group-model ul li#customize-control-" + controlContainerID)
              .find("select")
              .html(kemet.font_family_select);

            $(".kmt-group-model ul li#customize-control-" + controlContainerID)
              .find("select").val(attrs.value);

            $(".kmt-group-model ul li#customize-control-" + controlContainerID)
              .find("select")
              .select2().css('width', '100%');

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
                family = 'li#customize-control-' + controlContainerID,
                weight = attrs.connect.replace("kemet-settings[", ""),
                weight = 'li#customize-control-' + weight.replace("]", "");

              control.setFontWeightOptions(
                family,
                weight,
                attrs.connect
              );
              api.control(attrs.connect).setting.set('');
            });

            break;
          case "kmt-font-weight":
            var attrs = control.getField(fields, attrs.id),
              weight = 'li#customize-control-' + controlContainerID,
              family = (attrs.connect).replace("kemet-settings[", ""),
              family = 'li#customize-control-' + family.replace("]", ""),
              value = attrs.value != '' ? attrs.value : 400;
            controlID = attrs.id;

            control.setFontWeightOptions(
              family,
              weight,
              "kemet-settings" + controlID
            );

            $(".kmt-group-model ul li#customize-control-" + controlContainerID)
              .find("select").val(value);

            $(
              ".kmt-group-model ul li#customize-control-" + controlContainerID
            ).on("change", "select", function () {
              var select = $(this),
                value = select.val();

              control.initSelect(value, controlID);
            });
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

            control.initBackgroundColor(controlContainerID, controlID, controlValue);
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
      var controlAttrs = '';
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
    setFontWeightOptions: function (select, fontWeightContainer, weightKey) {
      var i = 0,
        fontValue = $(select).find("select").val(),
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
    initSelect: function (value, controlID) {

      var control_id = "kemet-settings" + controlID;
      api.control(control_id).setting.set(value);
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
    initColor: function (controlContainer, control) {

      $("li#customize-control-" + controlContainer).find('.kmt-color-picker-alpha').wpColorPicker({
				/**
         * @param {Event} event - standard jQuery event, produced by whichever
         * control was changed.
         * @param {Object} ui - standard jQuery UI object, with a color member
         * containing a Color.js object.
         */
        change: function (event, ui) {
          var element = event.target;
          var color = ui.color.toString();

          if (jQuery('html').hasClass('colorpicker-ready')) {
            api.control(control).setting.set(color);
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
            api.control(control).setting.set(color);
          }
        }
      });

    },
    initBackgroundColor: function (controlContainer, controlID, controlValue) {

      var control = this,
        defaults = {
          'background-color': "",
          'background-image': "",
          'background-repeat': "repeat",
          'background-position': "center center",
          'background-size': "auto",
          'background-attachment': "scroll",
        },
        value = controlValue != '' ? controlValue : defaults,
        picker = $("li#customize-control-" + controlContainer).find('.kmt-color-control');

      // Hide unnecessary controls if the value doesn't have an image.
      if (_.isUndefined(value['background-image']) || '' === value['background-image']) {
        $("li#customize-control-" + controlContainer).find('.background-wrapper > .background-repeat').hide();
        $("li#customize-control-" + controlContainer).find('.background-wrapper > .background-position').hide();
        $("li#customize-control-" + controlContainer).find('.background-wrapper > .background-size').hide();
        $("li#customize-control-" + controlContainer).find('.background-wrapper > .background-attachment').hide();
      }

      // Color.
      picker.wpColorPicker({
        change: function () {
          if (jQuery('html').hasClass('background-colorpicker-ready')) {
            setTimeout(function () {
              value['background-color'] = picker.val();
              control.saveBackgroundValue(value, controlContainer, controlID);
            }, 100);
          }
        },

        /**
           * @param {Event} event - standard jQuery event, produced by "Clear"
           * button.
           */
        clear: function (event) {
          var element = jQuery(event.target).closest('.wp-picker-input-wrap').find('.wp-color-picker')[0];

          if (element) {
            value['background-color'] = '';
            control.saveBackgroundValue(value, controlContainer, controlID);
          }
        }
      });

      // Background-Repeat.
      $("li#customize-control-" + controlContainer).on('change', '.background-repeat select', function () {
        value['background-repeat'] = jQuery(this).val();
        control.saveBackgroundValue(value, controlContainer, controlID);
      });

      // Background-Size.
      $("li#customize-control-" + controlContainer).on('change click', '.background-size input', function () {
        value['background-size'] = jQuery(this).val();
        control.saveBackgroundValue(value, controlContainer, controlID);
      });

      // Background-Position.
      $("li#customize-control-" + controlContainer).on('change', '.background-position select', function () {
        value['background-position'] = jQuery(this).val();
        control.saveBackgroundValue(value, controlContainer, controlID);
      });

      // Background-Attachment.
      $("li#customize-control-" + controlContainer).on('change click', '.background-attachment input', function () {
        value['background-attachment'] = jQuery(this).val();
        control.saveBackgroundValue(value, controlContainer, controlID);
      });

      // Background-Image.
      $("li#customize-control-" + controlContainer).on('click', '.background-image-upload-button', function (e) {
        var image = wp.media({ multiple: false }).open().on('select', function () {

          // This will return the selected image from the Media Uploader, the result is an object.
          var uploadedImage = image.state().get('selection').first(),
            previewImage = uploadedImage.toJSON().sizes.full.url,
            imageUrl,
            imageID,
            imageWidth,
            imageHeight,
            preview,
            removeButton;

          if (!_.isUndefined(uploadedImage.toJSON().sizes.medium)) {
            previewImage = uploadedImage.toJSON().sizes.medium.url;
          } else if (!_.isUndefined(uploadedImage.toJSON().sizes.thumbnail)) {
            previewImage = uploadedImage.toJSON().sizes.thumbnail.url;
          }

          imageUrl = uploadedImage.toJSON().sizes.full.url;
          imageID = uploadedImage.toJSON().id;
          imageWidth = uploadedImage.toJSON().width;
          imageHeight = uploadedImage.toJSON().height;

          // Show extra controls if the value has an image.
          if ('' !== imageUrl) {
            $("li#customize-control-" + controlContainer).find('.background-wrapper > .background-repeat, .background-wrapper > .background-position, .background-wrapper > .background-size, .background-wrapper > .background-attachment').show();
            $("li#customize-control-" + controlContainer).find('.more-settings').attr('data-direction', 'up');
            $("li#customize-control-" + controlContainer).find('.message').html(kemetCustomizerControlBackground.lessSettings)
          }

          value['background-image'] = imageUrl;
          control.saveBackgroundValue(value, controlContainer, controlID);
          preview = $("li#customize-control-" + controlContainer).find('.placeholder, .thumbnail');
          removeButton = $("li#customize-control-" + controlContainer).find('.background-image-upload-remove-button');

          if (preview.length) {
            preview.removeClass().addClass('thumbnail thumbnail-image').html('<img src="' + previewImage + '" alt="" />');
          }
          if (removeButton.length) {
            removeButton.show();
          }
        });

        e.preventDefault();
      });

      $("li#customize-control-" + controlContainer).on('click', '.background-image-upload-remove-button', function (e) {

        var preview,
          removeButton;

        e.preventDefault();

        value['background-image'] = '';
        control.saveBackgroundValue(value, controlContainer, controlID);

        preview = $("li#customize-control-" + controlContainer).find('.placeholder, .thumbnail');
        removeButton = $("li#customize-control-" + controlContainer).find('.background-image-upload-remove-button');

        // Hide unnecessary controls.
        $("li#customize-control-" + controlContainer).find('.background-wrapper > .background-repeat').hide();
        $("li#customize-control-" + controlContainer).find('.background-wrapper > .background-position').hide();
        $("li#customize-control-" + controlContainer).find('.background-wrapper > .background-size').hide();
        $("li#customize-control-" + controlContainer).find('.background-wrapper > .background-attachment').hide();

        $("li#customize-control-" + controlContainer).find('.more-settings').attr('data-direction', 'down');
        $("li#customize-control-" + controlContainer).find('.more-settings').find('.message').html(kemetCustomizerControlBackground.moreSettings);

        if (preview.length) {
          preview.removeClass().addClass('placeholder').html(kemetCustomizerControlBackground.placeholder);
        }
        if (removeButton.length) {
          removeButton.hide();
        }
      });

      $("li#customize-control-" + controlContainer).on('click', '.more-settings', function (e) {

        var $this = jQuery(this);
        // Hide unnecessary controls.
        $("li#customize-control-" + controlContainer).find('.background-wrapper > .background-repeat').toggle();
        $("li#customize-control-" + controlContainer).find('.background-wrapper > .background-position').toggle();
        $("li#customize-control-" + controlContainer).find('.background-wrapper > .background-size').toggle();
        $("li#customize-control-" + controlContainer).find('.background-wrapper > .background-attachment').toggle();

        if ('down' === $this.attr('data-direction')) {
          $this.attr('data-direction', 'up');
          $this.find('.message').html(kemetCustomizerControlBackground.lessSettings)
        } else {
          $this.attr('data-direction', 'down');
          $this.find('.message').html(kemetCustomizerControlBackground.moreSettings)
        }
      });
    },
    saveBackgroundValue: function (value, controlContainerID, control) {
      var input = jQuery('li#customize-control-' + controlContainerID + ' .background-hidden-value');

      jQuery(input).attr('value', JSON.stringify(value)).trigger('change');

      api.control(control).setting.set(value);
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
