/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 *
 * @package Kemet
 */

/**
 * Responsive Spacing CSS
 */
function kemet_responsive_spacing_sides(control, selector, type, side) {
  wp.customize(control, function (value) {
    value.bind(function (value) {
      var sidesString = "";
      var spacingType = "padding";
      if (
        value.desktop.top ||
        value.desktop.right ||
        value.desktop.bottom ||
        value.desktop.left ||
        value.tablet.top ||
        value.tablet.right ||
        value.tablet.bottom ||
        value.tablet.left ||
        value.mobile.top ||
        value.mobile.right ||
        value.mobile.bottom ||
        value.mobile.left
      ) {
        if (typeof side != undefined) {
          sidesString = side + "";
          sidesString = sidesString.replace(/,/g, "-");
        }
        if (typeof type != undefined) {
          spacingType = type + "";
        }

        var desktopPadding = "",
          tabletPadding = "",
          mobilePadding = "";

        var paddingSide =
          typeof side != undefined ? side : ["top", "bottom", "right", "left"];

        jQuery.each(paddingSide, function (index, sideValue) {
          if ("" != value["desktop"][sideValue]) {
            var sideName = sideValue;
            if ("border" === spacingType) {
              sideName = sideName + "-width";
            }
            desktopPadding +=
              spacingType +
              "-" +
              sideName +
              ": " +
              value["desktop"][sideValue] +
              value["desktop-unit"] +
              ";";
          }
        });

        jQuery.each(paddingSide, function (index, sideValue) {
          if ("" != value["tablet"][sideValue]) {
            var sideName = sideValue;
            if ("border" === spacingType) {
              sideName = sideName + "-width";
            }
            tabletPadding +=
              spacingType +
              "-" +
              sideName +
              ": " +
              value["tablet"][sideValue] +
              value["tablet-unit"] +
              ";";
          }
        });

        jQuery.each(paddingSide, function (index, sideValue) {
          if ("" != value["mobile"][sideValue]) {
            var sideName = sideValue;
            if ("border" === spacingType) {
              sideName = sideName + "-width";
            }
            mobilePadding +=
              spacingType +
              "-" +
              sideName +
              ": " +
              value["mobile"][sideValue] +
              value["mobile-unit"] +
              ";";
          }
        });

        // Concat and append new <style>.
        var dynamicStyle = selector +
          "	{ " +
          desktopPadding +
          " }" +
          "@media (max-width: 768px) {" +
          selector +
          "	{ " +
          tabletPadding +
          " } }" +
          "@media (max-width: 544px) {" +
          selector +
          "	{ " +
          mobilePadding +
          " } }";

        kemet_add_dynamic_css(control, dynamicStyle);
      } else {
        wp.customize.preview.send("refresh");
      }
    });
  });
}

/**
 * Responsive Spacing CSS
 */
function kemet_responsive_spacing(control, selector, type) {
  wp.customize(control, function (value) {
    value.bind(function (value) {
      var spacing = {
        desktopSpacing: "",
        tabletSpacing: "",
        mobileSpacing: "",
      };
      var deviceValue = function (device) {
        var hasValues = false;
        value[device] = jQuery.map(value[device], function (deviceVal, index) {
          if ("" !== deviceVal && undefined !== deviceVal) {
            hasValues = true;
            deviceVal = deviceVal + value[device + "-unit"];
          } else {
            deviceVal = 0;
          }
          return deviceVal;
        });
        if (hasValues) {
          spacing[device + "Spacing"] = type + ": " + value[device].join(" ");
        }
      };
      if ("" != value["desktop"]) {
        deviceValue("desktop");
      }

      if ("" != value["tablet"]) {
        deviceValue("tablet");
      }

      if ("" != value["mobile"]) {
        deviceValue("mobile");
      }
      // Concat and append new <style>.
      var dynamicStyle = selector +
        "	{ " +
        spacing.desktopSpacing +
        " }" +
        "@media (max-width: 768px) {" +
        selector +
        "	{ " +
        spacing.tabletSpacing +
        " } }" +
        "@media (max-width: 544px) {" +
        selector +
        "	{ " +
        spacing.mobileSpacing +
        " } }";

      kemet_add_dynamic_css(control, dynamicStyle);
    });
  });
}

/**
 * Spacing CSS
 */
function kemet_spacing_sides(control, selector, type, side) {
  wp.customize(control, function (value) {
    value.bind(function (newValue) {
      var sidesString = "";
      var spacingType = "padding";
      if (
        newValue.value.top ||
        newValue.value.right ||
        newValue.value.bottom ||
        newValue.value.left
      ) {
        if (typeof side != undefined) {
          sidesString = side + "";
          sidesString = sidesString.replace(/,/g, "-");
        }
        if (typeof type != undefined) {
          spacingType = type + "";
        }

        var spacing = "";

        var paddingSide =
          typeof side != undefined ? side : ["top", "bottom", "right", "left"];

        jQuery.each(paddingSide, function (index, sideValue) {
          if ("" != newValue["value"][sideValue]) {
            var sideName = sideValue;
            if ("border" === spacingType) {
              sideName = sideName + "-width";
            }
            spacing +=
              spacingType +
              "-" +
              sideName +
              ": " +
              newValue["value"][sideValue] +
              newValue["unit"] +
              ";";
          }
        });

        // Concat and append new <style>.
        var dynamicStyle = selector +
          "	{ " +
          spacing +
          " }";

        kemet_add_dynamic_css(control, dynamicStyle);
      } else {
        wp.customize.preview.send("refresh");
      }
    });
  });
}

/**
 * Spacing CSS
 */
function kemet_spacing(control, selector, type) {
  wp.customize(control, function (value) {
    value.bind(function (newValue) {
      var spacing = '';
      var hasValues = false;
      newValue['value'] = jQuery.map(newValue['value'], function (val, index) {
        if ("" !== val && undefined !== val) {
          hasValues = true;
          val = val + newValue['unit'];
        } else {
          val = 0;
        }
        return val;
      });
      if (hasValues) {
        spacing = type + ": " + newValue['value'].join(" ");
      }

      // Concat and append new <style>.
      var dynamicStyle = selector +
        "	{ " +
        spacing +
        " }";

      kemet_add_dynamic_css(control, dynamicStyle);
    });
  });
}

/**
 * Slider
 */
function kemet_slider(control, selector, type) {
  wp.customize(control, function (value) {
    value.bind(function (new_value) {

      if (!new_value || new_value == "") {
        wp.customize.preview.send("refresh");
        return;
      }

      new_value = new_value.value + new_value.unit;
      // Concat and append new <style>.
      var dynamicStyle = selector +
        "	{ " +
        type +
        ": " +
        new_value +
        " }";

      kemet_add_dynamic_css(control, dynamicStyle);
    })
  })
}

/**
 * Responsive Spacing CSS
 */
function kemet_responsive_slider(control, selector, type) {
  wp.customize(control, function (value) {
    value.bind(function (value) {
      var spacingType = "width";

      if (value.desktop || value.tablet || value.mobile) {
        if (typeof type != undefined) {
          spacingType = type + "";
        }

        var dynamicStyle = kemet_responsive_slider_css(value, spacingType, selector)

        kemet_add_dynamic_css(control, dynamicStyle);
      } else {
        wp.customize.preview.send("refresh");
      }
    });
  });
}

function kemet_responsive_slider_css(value, type, selector) {
  var desktop = "",
    tablet = "",
    mobile = "";

  desktop +=
    type + ": " + value["desktop"] + value["desktop-unit"] + " ;";

  tablet +=
    type + ": " + value["tablet"] + value["tablet-unit"] + " ;";

  mobile +=
    type + ": " + value["mobile"] + value["mobile-unit"] + " ;";

  // Concat and append new <style>.
  var dynamicStyle = selector +
    "	{ " +
    desktop +
    " }" +
    "@media (max-width: 768px) {" +
    selector +
    "	{ " +
    tablet +
    " } }" +
    "@media (max-width: 544px) {" +
    selector +
    "	{ " +
    mobile +
    " } }";

  return dynamicStyle;
}
/**
 * Responsive Icons Select CSS
 */
function kemet_responsive_css(control, selector, type) {
  wp.customize(control, function (value) {
    value.bind(function (value) {

      var selectType = "text-align";
      if (value.desktop || value.tablet || value.mobile) {
        if (typeof type != undefined) {
          selectType = type + "";
        }

        var desktopSelect = "",
          tabletSelect = "",
          mobileSelect = "";

        desktopSelect += selectType + ": " + value["desktop"] + " ;";

        tabletSelect += selectType + ": " + value["tablet"] + " ;";

        mobileSelect += selectType + ": " + value["mobile"] + " ;";

        // Concat and append new <style>.
        var dynamicStyle = selector +
          "	{ " +
          desktopSelect +
          " }" +
          "@media (max-width: 768px) {" +
          selector +
          "	{ " +
          tabletSelect +
          " } }" +
          "@media (max-width: 544px) {" +
          selector +
          "	{ " +
          mobileSelect +
          " } }";

        kemet_add_dynamic_css(control, dynamicStyle);
      } else {
        wp.customize.preview.send("refresh");
      }
    });
  });
}

/**
 * Apply CSS for the element
 */
function kemet_css(control, css_property, selector, unit) {
  wp.customize(control, function (value) {
    value.bind(function (new_value) {

      if (new_value != "") {
        /**
         *	If ( unit == 'url' ) then = url('{VALUE}')
         *	If ( unit == 'px' ) then = {VALUE}px
         *	If ( unit == 'em' ) then = {VALUE}em
         *	If ( unit == 'rem' ) then = {VALUE}rem.
         */
        if ("undefined" != typeof unit) {
          if ("url" === unit) {
            new_value = "url(" + new_value + ")";
          } else {
            new_value = new_value + unit;
          }
        }

        // Concat and append new <style>.
        var dynamicStyle = selector +
          "	{ " +
          css_property +
          ": " +
          new_value +
          " }";

        kemet_add_dynamic_css(control, dynamicStyle);
      } else {
        wp.customize.preview.send("refresh");
      }
    });
  });
}

/**
 * Dynamic Internal/Embedded Style for a Control
 */
function kemet_add_dynamic_css(control, style) {
  control = control.replace("[", "-");
  control = control.replace("]", "");
  jQuery("style#" + control).remove();

  jQuery("head").append('<style id="' + control + '">' + style + "</style>");
}

/**
 * Generate background_obj CSS
 */
function kemet_background(control, selector) {
  wp.customize(control, function (value) {
    value.bind(function (bg_obj) {
      var dynamicStyle = get_background_css(bg_obj);
      dynamicStyle = selector + '{' + dynamicStyle + '}';
      kemet_add_dynamic_css(control, dynamicStyle);
    })
  })
}

/**
 * Background Css
 */
function get_background_css(bg_obj) {
  var gen_bg_css = "";
  var bg_type = bg_obj["background-type"];
  var bg_img = bg_obj["background-image"];
  var bg_color = bg_obj["background-color"];
  var bg_gradient = bg_obj["background-gradient"];

  if (!bg_color && !bg_img && !bg_gradient) {
    return '';
  } else {
    switch (bg_type) {
      case 'color':
        if (bg_color) {
          gen_bg_css = "background-color: " + bg_color + ";";
          gen_bg_css += "background-image: none;";
        }
        break;
      case 'gradient':
        if (bg_gradient) {
          gen_bg_css += "background-image: " + bg_gradient + ";";
        }
        break;
      case 'image':
        if (bg_img) {
          gen_bg_css = "background-image: url(" + bg_img + ");";
          var backgroundRepeat =
            "undefined" != typeof bg_obj["background-repeat"]
              ? bg_obj["background-repeat"]
              : "repeat",
            backgroundPosition =
              "undefined" != typeof bg_obj["background-position"]

              && bg_obj["background-position"],
            backgroundSize =
              "undefined" != typeof bg_obj["background-size"]
                ? bg_obj["background-size"]
                : "auto",
            backgroundAttachment =
              "undefined" != typeof bg_obj["background-attachment"]
                ? bg_obj["background-attachment"]
                : "inherit";

          if (backgroundPosition) {
            if (backgroundPosition.x) {
              gen_bg_css += "background-position-x: " + (backgroundPosition.x * 100) + "%;";
            }
            if (backgroundPosition.y) {
              gen_bg_css += "background-position-y: " + (backgroundPosition.y * 100) + "%;";
            }
          }
          if (backgroundRepeat) {
            gen_bg_css += "background-repeat: " + backgroundRepeat + ";";
          }
          if (backgroundSize) {
            gen_bg_css += "background-size: " + backgroundSize + ";";
          }
          if (backgroundAttachment) {
            gen_bg_css += "background-attachment: " + backgroundAttachment + ";";
          }
        }
        if (bg_color) {
          gen_bg_css += "background-color: " + bg_color + ";";
        }
        break;
    }

    return gen_bg_css;
  }
}
/**
 * Responsive Spacing CSS
 */
function kemet_responsive_background(control, selector) {
  wp.customize(control, function (value) {
    value.bind(function (value) {
      var background = {
        desktop: "",
        tablet: "",
        mobile: "",
      };

      if ("" != value["desktop"]) {
        background.desktop = get_background_css(value["desktop"]);
      }

      if ("" != value["tablet"]) {
        background.tablet = get_background_css(value["tablet"]);
      }

      if ("" != value["mobile"]) {
        background.mobile = get_background_css(value["mobile"]);
      }
      var dynamicStyle =
        selector +
        "	{ " +
        background.desktop +
        " }" +
        "@media (max-width: 768px) {" +
        selector +
        "	{ " +
        background.tablet +
        " } }" +
        "@media (max-width: 544px) {" +
        selector +
        "	{ " +
        background.mobile +
        " } }";

      kemet_add_dynamic_css(control, dynamicStyle);
    });
  });
}

function kemet_typography_css(control, selector) {
  wp.customize(control, function (value) {
    value.bind(function (value) {
      var dynamicStyle = '',
        controlName = control.replace('[', '-').replace(']', '');
      if (value.family) {
        var fontName = value.family;
        if (value.variation) {
          var weight = value.variation[1] + '00',
            link = '',
            style = 'i' === value.variation[0] ? 'italic' : 'normal';
          jQuery("link#" + controlName).remove();
          if (fontName in previewData.googleFonts) {
            fontName = fontName.split(" ").join("+");
            var weightLink = 'italic' === style ? weight + value.variation[0] : weight,
              weightLink = weightLink ? weightLink : 400;
            link =
              '<link rel="stylesheet" id="' +
              controlName +
              '" href="https://fonts.googleapis.com/css?family=' +
              fontName +
              ':' + weightLink +
              '&display=swap" media="all">';
            jQuery("head").append(link);
          }
        }
        if (value.family) {
          dynamicStyle += '--fontFamily: ' + value.family + ';';
        }
        if (weight) {
          dynamicStyle += '--fontWeight: ' + weight + ';';
        }
        if (style) {
          dynamicStyle += '--fontStyle: ' + style + ';';
        }
        if (value['text-transform']) {
          dynamicStyle += '--textTransform: ' + value['text-transform'] + ';';
        }
        if (value['text-decoration']) {
          dynamicStyle += '--textDecoration: ' + value['text-decoration'] + ';';
        }
        dynamicStyle = selector + '{' + dynamicStyle + '}';
      }

      if (value.size) {
        dynamicStyle += kemet_responsive_slider_css(value.size, '--fontSize', selector);
      }
      if (value['letter-spacing']) {
        dynamicStyle += kemet_responsive_slider_css(value['letter-spacing'], '--letterSpacing', selector);
      }
      if (value['line-height']) {
        dynamicStyle += kemet_responsive_slider_css(value['line-height'], '--lineHeight', selector);
      }
      kemet_add_dynamic_css(control, dynamicStyle);
    })
  })
}

function settingName(settingName) {
  var setting = previewData.setting.replace("setting_name", settingName);

  return setting;
}
function kemet_button_css(buttonItems) {
  jQuery.each(buttonItems, function (index, prefix) {
    var selector = "." + prefix;
    wp.customize(settingName(prefix + "-label"), function (setting) {
      setting.bind(function (label) {
        jQuery(selector).text(label);
      });
    });
    wp.customize(settingName(prefix + "-url"), function (setting) {
      setting.bind(function (url) {
        jQuery(selector).attr("href", url);
      });
    });
    wp.customize(settingName(prefix + "-open-new-tab"), function (setting) {
      setting.bind(function (newTab) {
        var target = newTab ? "_blank" : "_self";
        jQuery(selector).attr("target", target);
      });
    });
    wp.customize(settingName(prefix + "-link-nofollow"), function (setting) {
      setting.bind(function (noFollow) {
        var rel = jQuery(selector).attr("rel"),
          rel = rel ? rel.replace("nofollow", "").replace(/ /g, "") : "";
        if (noFollow) {
          jQuery(selector).attr("rel", rel + " nofollow");
        } else {
          jQuery(selector).attr("rel", rel);
        }
      });
    });
    wp.customize(settingName(prefix + "-link-sponsored"), function (setting) {
      setting.bind(function (sponsored) {
        var rel = jQuery(selector).attr("rel"),
          rel = rel ? rel.replace("sponsored", "").replace(/ /g, "") : "";
        if (sponsored) {
          jQuery(selector).attr("rel", rel + " sponsored");
        } else {
          jQuery(selector).attr("rel", rel);
        }
      });
    });
    wp.customize(settingName(prefix + "-link-download"), function (setting) {
      setting.bind(function (download) {
        if (download) {
          jQuery(selector).attr("download", true);
        } else {
          jQuery(selector).attr("download", false);
        }
      });
    });
  });
}
function toggle_button_css(buttons) {
  jQuery.each(buttons, function (index, prefix) {
    var selector = "." + prefix;
    wp.customize(settingName(prefix + "-float"), function (value) {
      value.bind(function (position) {
        var floatPosition =
          wp.customize._value[settingName(prefix + "-float-position")]._value;

        jQuery(selector).removeClass(
          "toggle-button-fixed float-top-left float-top-right float-bottom-left float-bottom-right"
        );
        if (position) {
          jQuery(selector).addClass("toggle-button-fixed float-" + floatPosition);
        }
      });
    });
    wp.customize(settingName(prefix + "-label"), function (setting) {
      setting.bind(function (label) {
        jQuery(selector + ' .kmt-popup-label').text(label);
      });
    });
    wp.customize(settingName(prefix + "-float-position"), function (value) {
      value.bind(function (floatPosition) {
        var position = floatPosition.split("-"),
          vOffset =
            wp.customize._value[settingName(prefix + "-vertical-offset")]._value,
          hOffset =
            wp.customize._value[settingName(prefix + "-horizontal-offset")]
              ._value;
        jQuery(selector).removeClass(
          "float-top-left float-top-right float-bottom-left float-bottom-right"
        );
        jQuery(selector).addClass("float-" + floatPosition);

        dynamicStyle =
          selector +
          ".toggle-button-fixed.float-" +
          floatPosition +
          " { " +
          position[0] +
          ": " +
          vOffset.value + vOffset.unit +
          "; " +
          position[1] +
          ": " +
          hOffset.value + hOffset.unit +
          "; } ";
        kemet_add_dynamic_css(
          settingName(prefix + "-float-position"),
          dynamicStyle
        );
      });
    });
    wp.customize(settingName(prefix + "-vertical-offset"), function (value) {
      value.bind(function (offset) {
        var floatPosition =
          wp.customize._value[settingName(prefix + "-float-position")]._value,
          position = floatPosition.split("-");
        dynamicStyle =
          selector +
          ".toggle-button-fixed.float-" +
          floatPosition +
          " { " +
          position[0] +
          ": " +
          offset.value + offset.unit
        "; } ";
        kemet_add_dynamic_css(
          settingName(prefix + "-vertical-offset"),
          dynamicStyle
        );
      });
    });
    wp.customize(settingName(prefix + "-horizontal-offset"), function (value) {
      value.bind(function (offset) {
        var floatPosition =
          wp.customize._value[settingName(prefix + "-float-position")]._value,
          position = floatPosition.split("-");
        dynamicStyle =
          selector +
          ".toggle-button-fixed.float-" +
          floatPosition +
          " { " +
          position[1] +
          ": " +
          offset.value + offset.unit +
          "; } ";
        kemet_add_dynamic_css(
          settingName(prefix + "-horizontal-offset"),
          dynamicStyle
        );
      });
    });
  });
}
function header_rows_css(rows) {
  jQuery.each(rows, function (index, row) {
    var prefix = row + "-header",
      selector = ".kmt-" + row + "-header-wrap ." + row + "-header-bar";

    wp.customize(settingName(prefix + "-layout"), function (value) {
      value.bind(function (layout) {
        var dynamicStyle = "";
        jQuery(selector + " ." + row + "-header-inner").removeClass(
          "header-bar-content"
        );
        if ("full" === layout) {
          dynamicStyle +=
            "@media (min-width: 921px){ " +
            selector +
            " .kmt-container { max-width: 100%; padding-left: 35px; padding-right: 35px; } }";
        } else if ("stretched" === layout) {
          dynamicStyle +=
            "@media (min-width: 921px){ " +
            selector +
            " .kmt-container { max-width: 100%; padding-left: 0; padding-right: 0; } }";
        } else {
          dynamicStyle +=
            "@media (min-width: 769px){ " +
            selector +
            " .kmt-container { max-width: 1240px; padding-left: 20px; padding-right: 20px; } }";
        }

        if ("stretched" === layout || "boxed" === layout) {
          jQuery(selector + " ." + row + "-header-inner").addClass(
            "header-bar-content"
          );
        }

        kemet_add_dynamic_css(prefix + "-layout", dynamicStyle);
      });
    });
    wp.customize(settingName(prefix + "-min-height"), function (value) {
      value.bind(function (value) {
        document.dispatchEvent(new CustomEvent("kmtHeaderBarHeightChanged"));
      });
    });
  })
}
function popup_css(popups) {
  jQuery.each(popups, function (index, prefix) {
    var selector = "#kmt-" + prefix + "-popup",
      contentSelector = ".kmt-" + prefix + "-popup-content";

    wp.customize(settingName(prefix + "-popup-slide-width"), function (value) {
      value.bind(function (width) {
        if (width == "") {
          wp.customize.preview.send("refresh");
        }

        if (width) {
          var dynamicStyle =
            ".kmt-popup-left " +
            contentSelector +
            ", .kmt-popup-right " +
            contentSelector +
            " { max-width: " +
            width.value + width.unit +
            "; } ";
          kemet_add_dynamic_css(
            settingName(prefix + "-popup-slide-width"),
            dynamicStyle
          );
        }
      });
    });

    wp.customize(settingName(prefix + "-popup-layout"), function (value) {
      value.bind(function (layout) {
        if (layout == "") {
          wp.customize.preview.send("refresh");
        }
        if ("full" === layout) {
          jQuery(selector).removeClass("kmt-popup-left");
          jQuery(selector).removeClass("kmt-popup-right");
          jQuery(selector).addClass("kmt-popup-full-width");
        } else {
          var popupSideControl = settingName(prefix + "-popup-slide-side"),
            popupSide = wp.customize._value[popupSideControl]._value;
          jQuery(selector).removeClass(
            "kmt-popup-left kmt-popup-right kmt-popup-full-width"
          );
          jQuery(selector).addClass("kmt-popup-" + popupSide);
        }
      });
    });

    wp.customize(settingName(prefix + "-popup-slide-side"), function (value) {
      value.bind(function (side) {
        if (side == "") {
          wp.customize.preview.send("refresh");
        }
        jQuery(selector).removeClass("kmt-popup-left kmt-popup-right");
        jQuery(selector).addClass("kmt-popup-" + side);
      });
    });

    wp.customize(settingName(prefix + "-popup-content-align"), function (value) {
      value.bind(function (contentAlign) {
        if (contentAlign == "") {
          wp.customize.preview.send("refresh");
        }
        jQuery(selector).removeClass(
          "kmt-popup-align-left kmt-popup-align-center kmt-popup-align-right"
        );
        jQuery(selector).addClass("kmt-popup-align-" + contentAlign);
      });
    });

    wp.customize(
      settingName(prefix + "-popup-content-vertical-align"),
      function (value) {
        value.bind(function (contentAlign) {
          if (contentAlign == "") {
            wp.customize.preview.send("refresh");
          }
          jQuery(selector).removeClass(
            "kmt-popup-valign-top kmt-popup-valign-center kmt-popup-valign-bottom"
          );
          jQuery(selector).addClass("kmt-popup-valign-" + contentAlign);
        });
      }
    );
  })
}

function kemet_color_css(control, data) {
  wp.customize(control, function (value) {
    value.bind(function (new_value) {

      if (new_value == '') {
        wp.customize.preview.send("refresh");
        return;
      }

      var dynamicStyle = '';
      jQuery.each(new_value, function (id, val) {
        if (id !== 'flag' && val) {
          var previewData = data[id];
          dynamicStyle += previewData.selector +
            "	{ " +
            previewData.property +
            ": " +
            val +
            " }";
        }
      })

      kemet_add_dynamic_css(control, dynamicStyle);
    })
  })
}

function kemet_responsive_color_css(control, data) {
  wp.customize(control, function (value) {
    value.bind(function (new_value) {

      if (Object.keys(new_value).length === 0) {
        wp.customize.preview.send("refresh");
        return;
      }

      var desktopStyle = '';
      var tabletStyle = '';
      var mobileStyle = '';
      jQuery.each(data, function (index, colorData) {

        var desktopVal = new_value.desktop[index],
          tabletVal = new_value.tablet[index],
          mobileVal = new_value.mobile[index];
        if (desktopVal) {
          desktopStyle += colorData.selector +
            "	{ " +
            colorData.property +
            ": " +
            desktopVal +
            " }";
        }
        if (tabletVal) {
          tabletStyle += colorData.selector +
            "	{ " +
            colorData.property +
            ": " +
            tabletVal +
            " }";
        }
        if (mobileVal) {
          mobileStyle += colorData.selector +
            "	{ " +
            colorData.property +
            ": " +
            mobileVal +
            " }";
        }
      })

      // Concat and append new <style>.
      var dynamicStyle = desktopStyle +
        "@media (max-width: 768px) {" +
        tabletStyle +
        " }" +
        "@media (max-width: 544px) {" +
        mobileStyle +
        " }";

      kemet_add_dynamic_css(control, dynamicStyle);
    })
  })
}

function kemet_change_attr(control, selector, attr) {
  wp.customize(control, function (value) {
    value.bind(function (new_value) {
      if (new_value) {
        jQuery(selector).attr(attr, new_value)
      }
    })
  })
}

(function ($) {
  wp.customize.bind('preview-ready', function () {
    setTimeout(() => {
      $('.customize-partial-edit-shortcut:not(.kmt-custom-partial-edit-shortcut):not(.kmt-custom-partial-edit)').remove();
    }, 0)
    var defaultTarget = window.parent === window ? null : window.parent;
    $(document).on(
      'click',
      '.site-builder-focus-item .item-customizer-focus, .kmt-item-focus .edit-buidler-item',
      function (e) {
        e.preventDefault();
        e.stopPropagation();
        var item = $(this).hasClass('item-customizer-focus') ? $(this).parents('.site-builder-focus-item') : $(this).parents('.kmt-item-focus');
        var section_id = item.attr('data-section') || '';
        if (section_id) {
          if (defaultTarget.wp.customize.section(section_id)) {
            defaultTarget.wp.customize.section(section_id).focus();
          }
        }
      }
    );
  });
  // Trigger.
  wp.customize.bind("preview-ready", function () {
    wp.customize.selectiveRefresh.bind(
      "partial-content-rendered",
      function (response) {
        if (
          response.partial.id.includes("header-desktop-items") ||
          response.partial.id.includes("header-mobile-items")
        ) {
          document.dispatchEvent(
            new CustomEvent("kmtPartialContentRendered", {
              detail: { response: response },
            })
          );
        }
      }
    );
  });

  function responsive_spacing(control, data) {
    if (false === data.sides) {
      kemet_responsive_spacing(control, data.selector, data.property);
    } else {
      kemet_responsive_spacing_sides(
        control,
        data.selector,
        data.property,
        Object.keys(data.choices)
      );
    }
  }

  function spacing(control, data) {
    if (false === data.sides) {
      kemet_spacing(control, data.selector, data.property);
    } else {
      kemet_spacing_sides(
        control,
        data.selector,
        data.property,
        Object.keys(data.choices)
      );
    }
  }

  // Button Preview.
  kemet_button_css(
    $.merge(previewData.buttonItems, previewData.mobileButtonItems)
  );
  popup_css(["desktop", "mobile"]);
  toggle_button_css(["desktop-toggle-button", "mobile-toggle-button"]);
  header_rows_css(['top', 'main', 'bottom']);
  $.each(previewData.preview, function (control, data) {
    var type = data.type;
    delete data.type;
    switch (type) {
      case "kmt-slider":
        if (data.responsive) {
          delete data.responsive;
          kemet_responsive_slider(control, data.selector, data.property);
        } else {
          kemet_slider(control, data.selector, data.property);
        }
        break;
      case "kmt-select":
        kemet_css(control, data.property, data.selector);
        break;
      case "kmt-typography":
        kemet_typography_css(control, data.selector);
        break;
      case "kmt-color":
        if (data.responsive) {
          delete data.responsive;
          kemet_responsive_color_css(control, data);
        } else {
          kemet_color_css(control, data);
        }
        break;
      case "kmt-radio":
        if (data.attr) {
          kemet_change_attr(control, data.selector, data.attr);
          return;
        }
        if (data.responsive) {
          delete data.responsive;
          kemet_responsive_css(control, data.selector, data.property);
        } else {
          kemet_css(control, data.property, data.selector);
        }
        break;
      case "kmt-number":
        kemet_css(control, data.property, data.selector);
        break;
      case "kmt-spacing":
        if (data.responsive) {
          delete data.responsive;
          responsive_spacing(control, data);
        } else {
          spacing(control, data);
        }
        break;
      case "kmt-background":
        if (data.responsive) {
          delete data.responsive;
          kemet_responsive_background(control, data.selector);
        } else {
          kemet_background(control, data.selector);
        }
        break;
    }
  });
  // Other preview
  var btnSelector = 'button, .button, .kmt-button, input[type=button], input[type=reset], input[type="submit"], .wp-block-button a.wp-block-button__link, .wp-block-search button.wp-block-search__button';
  var btnHoverSelector = 'button:focus, .button:hover, button:hover, .kmt-button:hover, .button:hover, input[type=reset]:hover, input[type=reset]:focus, input#submit:hover, input#submit:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="submit"]:hover, input[type="submit"]:focus, .button:focus, .button:focus, .wp-block-button a.wp-block-button__link:hover, .wp-block-search button.wp-block-search__button:hover';
  wp.customize(settingName('button-effect'), function (value) {
    value.bind(function (new_value) {
      var dynamicStyle = '';
      if (new_value) {
        dynamicStyle = btnSelector + "{"
          + "--buttonShadow: 2px 2px 10px -3px var(--buttonBackgroundColor) !important;"
          + "}"
      } else {
        dynamicStyle = btnSelector + "{"
          + "--buttonShadow: none;"
          + "}"
      }
      kemet_add_dynamic_css(
        settingName('button-effect'),
        dynamicStyle
      );
    })
  })

  wp.customize(settingName('button-hover-effect'), function (value) {
    value.bind(function (new_value) {
      var dynamicStyle = '';
      if (new_value) {
        dynamicStyle = btnHoverSelector + "{"
          + "--buttonShadow: 2px 2px 10px -3px var(--buttonBackgroundHoverColor,var(--buttonBackgroundColor)) !important;"
          + "}"
      } else {
        dynamicStyle = btnHoverSelector + "{"
          + "--buttonShadow: none;"
          + "}"
      }
      kemet_add_dynamic_css(
        settingName('button-hover-effect'),
        dynamicStyle
      );
    })
  })

  wp.customize(settingName('readmore-as-button'), function (value) {
    value.bind(function (new_value) {
      $('.kmt-read-more').removeClass('button');
      $('.kmt-read-more').parent().removeAttr('data-align');
      if (new_value) {
        var alignControl = settingName("readmore-button-align"),
          align = wp.customize._value[alignControl]._value;
        $('.kmt-read-more').parent().attr('data-align', align);
        $('.kmt-read-more').addClass('button');
      }
    })
  });
})(jQuery);
