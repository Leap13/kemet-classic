/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 *
 * @package Kemet
 */

/**
 * Generate font size in PX & REM
 */
function kemet_font_size_rem(size, with_rem, device) {
  var css = "";

  if (size != "") {
    var device = typeof device != undefined ? device : "desktop";

    // font size with 'px'.
    css = "font-size: " + size + "px;";

    // font size with 'rem'.
    if (with_rem) {
      var body_font_size = wp.customize("kemet-settings[font-size-body]").get();

      body_font_size["desktop"] =
        body_font_size["desktop"] != "" ? body_font_size["desktop"] : 15;
      body_font_size["tablet"] =
        body_font_size["tablet"] != ""
          ? body_font_size["tablet"]
          : body_font_size["desktop"];
      body_font_size["mobile"] =
        body_font_size["mobile"] != ""
          ? body_font_size["mobile"]
          : body_font_size["tablet"];

      css += "font-size: " + size / body_font_size[device] + "rem;";
    }
  }

  return css;
}

/**
 * Responsive Font Size CSS
 */
function kemet_responsive_font_size(control, selector) {
  wp.customize(control, function (value) {
    value.bind(function (value) {
      if (value.desktop || value.mobile || value.tablet) {
        // Remove <style> first!
        control = control.replace("[", "-");
        control = control.replace("]", "");
        jQuery("style#" + control).remove();

        var fontSize = "",
          TabletFontSize = "",
          MobileFontSize = "";

        if ("" != value.desktop) {
          fontSize = "font-size: " + value.desktop + value["desktop-unit"];
        }
        if ("" != value.tablet) {
          TabletFontSize = "font-size: " + value.tablet + value["tablet-unit"];
        }
        if ("" != value.mobile) {
          MobileFontSize = "font-size: " + value.mobile + value["mobile-unit"];
        }

        if (value["desktop-unit"] == "px") {
          fontSize = kemet_font_size_rem(value.desktop, true, "desktop");
        }

        // Concat and append new <style>.
        jQuery("head").append(
          '<style id="' +
            control +
            '">' +
            selector +
            "	{ " +
            fontSize +
            " }" +
            "@media (max-width: 768px) {" +
            selector +
            "	{ " +
            TabletFontSize +
            " } }" +
            "@media (max-width: 544px) {" +
            selector +
            "	{ " +
            MobileFontSize +
            " } }" +
            "</style>"
        );
      } else {
        jQuery("style#" + control).remove();
      }
    });
  });
}

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
        // Remove <style> first!
        control = control.replace("[", "-");
        control = control.replace("]", "");
        jQuery(
          "style#" + control + "-" + spacingType + "-" + sidesString
        ).remove();

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
        jQuery("head").append(
          '<style id="' +
            control +
            "-" +
            spacingType +
            "-" +
            sidesString +
            '">' +
            selector +
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
            " } }" +
            "</style>"
        );
      } else {
        wp.customize.preview.send("refresh");
        jQuery(
          "style#" + control + "-" + spacingType + "-" + sidesString
        ).remove();
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
      // Remove <style> first!
      control = control.replace("[", "-");
      control = control.replace("]", "");
      jQuery("style#" + control + "-" + type).remove();
      // Concat and append new <style>.
      jQuery("head").append(
        '<style id="' +
          control +
          "-" +
          type +
          '">' +
          selector +
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
          " } }" +
          "</style>"
      );
    });
  });
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
        // Remove <style> first!
        control = control.replace("[", "-");
        control = control.replace("]", "");
        jQuery("style#" + control + "-" + spacingType).remove();

        var desktopWidth = "",
          tabletWidth = "",
          mobileWidth = "";

        desktopWidth +=
          spacingType + ": " + value["desktop"] + value["desktop-unit"] + " ;";

        tabletWidth +=
          spacingType + ": " + value["tablet"] + value["tablet-unit"] + " ;";

        mobileWidth +=
          spacingType + ": " + value["mobile"] + value["mobile-unit"] + " ;";

        // Concat and append new <style>.
        jQuery("head").append(
          '<style id="' +
            control +
            "-" +
            spacingType +
            '">' +
            selector +
            "	{ " +
            desktopWidth +
            " }" +
            "@media (max-width: 768px) {" +
            selector +
            "	{ " +
            tabletWidth +
            " } }" +
            "@media (max-width: 544px) {" +
            selector +
            "	{ " +
            mobileWidth +
            " } }" +
            "</style>"
        );
      } else {
        wp.customize.preview.send("refresh");
        jQuery("style#" + control + "-" + spacingType).remove();
      }
    });
  });
}
/**
 * Responsive Icons Select CSS
 */
function kemet_responsive_icon_select(control, selector, type) {
  wp.customize(control, function (value) {
    value.bind(function (value) {
      var selectType = "text-align";

      if (value.desktop || value.tablet || value.mobile) {
        if (typeof type != undefined) {
          selectType = type + "";
        }
        // Remove <style> first!
        control = control.replace("[", "-");
        control = control.replace("]", "");
        jQuery("style#" + control + "-" + selectType).remove();

        var desktopSelect = "",
          tabletSelect = "",
          mobileSelect = "";

        desktopSelect += selectType + ": " + value["desktop"] + " ;";

        tabletSelect += selectType + ": " + value["tablet"] + " ;";

        mobileSelect += selectType + ": " + value["mobile"] + " ;";

        // Concat and append new <style>.
        jQuery("head").append(
          '<style id="' +
            control +
            "-" +
            selectType +
            '">' +
            selector +
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
            " } }" +
            "</style>"
        );
      } else {
        wp.customize.preview.send("refresh");
        jQuery("style#" + control + "-" + selectType).remove();
      }
    });
  });
}
/**
 * Responsive Icons Select CSS
 */
function kemet_responsive_css(control, selector, type) {
  wp.customize(control, function (value) {
    value.bind(function (value) {
      var selectType = "color";

      if (value.desktop || value.tablet || value.mobile) {
        if (typeof type != undefined) {
          selectType = type + "";
        }
        // Remove <style> first!
        control = control.replace("[", "-");
        control = control.replace("]", "");
        jQuery("style#" + control + "-" + selectType).remove();

        var desktopSelect = "",
          tabletSelect = "",
          mobileSelect = "";

        desktopSelect += selectType + ": " + value["desktop"] + " ;";

        tabletSelect += selectType + ": " + value["tablet"] + " ;";

        mobileSelect += selectType + ": " + value["mobile"] + " ;";

        // Concat and append new <style>.
        jQuery("head").append(
          '<style id="' +
            control +
            "-" +
            selectType +
            '">' +
            selector +
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
            " } }" +
            "</style>"
        );
      } else {
        wp.customize.preview.send("refresh");
        jQuery("style#" + control + "-" + selectType).remove();
      }
    });
  });
}
/**
 * CSS
 */
function kemet_css_font_size(control, selector) {
  wp.customize(control, function (value) {
    value.bind(function (size) {
      if (size) {
        // Remove <style> first!
        control = control.replace("[", "-");
        control = control.replace("]", "");
        jQuery("style#" + control).remove();

        var fontSize = "font-size: " + size;
        if (!isNaN(size) || size.indexOf("px") >= 0) {
          size = size.replace("px", "");
          fontSize = kemet_font_size_rem(size, true);
        }

        // Concat and append new <style>.
        jQuery("head").append(
          '<style id="' +
            control +
            '">' +
            selector +
            "	{ " +
            fontSize +
            " }" +
            "</style>"
        );
      } else {
        jQuery("style#" + control).remove();
      }
    });
  });
}

/**
 * Return get_hexdec()
 */
function get_hexdec(hex) {
  var hexString = hex.toString(16);
  return parseInt(hexString, 16);
}

/**
 * Apply CSS for the element
 */
function kemet_css(control, css_property, selector, unit) {
  wp.customize(control, function (value) {
    value.bind(function (new_value) {
      // Remove <style> first!
      control = control.replace("[", "-");
      control = control.replace("]", "");

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

        // Remove old.
        jQuery("style#" + control).remove();

        // Concat and append new <style>.
        jQuery("head").append(
          '<style id="' +
            control +
            '">' +
            selector +
            "	{ " +
            css_property +
            ": " +
            new_value +
            " }" +
            "</style>"
        );
      } else {
        wp.customize.preview.send("refresh");

        // Remove old.
        jQuery("style#" + control).remove();
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
function kemet_background_obj_css(wp_customize, bg_obj, ctrl_name, style) {
  var gen_bg_css = "";
  var bg_img = bg_obj["background-image"];
  var bg_color = bg_obj["background-color"];

  if ("" === bg_color && "" === bg_img) {
    wp_customize.preview.send("refresh");
  } else {
    if (
      "undefined" != typeof bg_img &&
      "" !== bg_img &&
      "undefined" != typeof bg_color &&
      "" !== bg_color
    ) {
      if ("" != bg_color) {
        gen_bg_css =
          "background-image: linear-gradient(to right, " +
          bg_color +
          ", " +
          bg_color +
          ") , url(" +
          bg_img +
          ");";
      }
    } else if ("undefined" != typeof bg_img && "" != bg_img) {
      gen_bg_css = "background-image: url(" + bg_img + ");";
    } else if ("undefined" != typeof bg_color && "" != bg_color) {
      gen_bg_css = "background-color: " + bg_color + ";";
      gen_bg_css += "background-image: none;";
    }

    if ("undefined" != typeof bg_img && "" !== bg_img) {
      var backgroundRepeat =
          "undefined" != typeof bg_obj["background-repeat"]
            ? bg_obj["background-repeat"]
            : "repeat",
        backgroundPosition =
          "undefined" != typeof bg_obj["background-position"]
            ? bg_obj["background-position"]
            : "center center",
        backgroundSize =
          "undefined" != typeof bg_obj["background-size"]
            ? bg_obj["background-size"]
            : "auto",
        backgroundAttachment =
          "undefined" != typeof bg_obj["background-attachment"]
            ? bg_obj["background-attachment"]
            : "inherit";

      gen_bg_css += "background-repeat: " + backgroundRepeat + ";";
      gen_bg_css += "background-position: " + backgroundPosition + ";";
      gen_bg_css += "background-size: " + backgroundSize + ";";
      gen_bg_css += "background-attachment: " + backgroundAttachment + ";";
    }
    var dynamicStyle = style.replace("{{css}}", gen_bg_css);

    kemet_add_dynamic_css(ctrl_name, dynamicStyle);
  }
}

function kemet_font_family_css(control, selector) {
  wp.customize(control, function (value) {
    value.bind(function (value) {
      var fontName = value.split(",")[0],
        link = "";
      // Replace ' character with space, necessary to separate out font prop value.
      fontName = fontName.replace(/'/g, "");
      if (fontName in previewData.googleFonts) {
        jQuery("link#" + control).remove();

        var fontName = fontName.split(" ").join("+");
        link =
          '<link id="' +
          control +
          '" href="https://fonts.googleapis.com/css?family=' +
          fontName +
          '"  rel="stylesheet">';
      }

      var dynamicStyle = selector + "{ --fontFamily: " + value + "; }";
      kemet_add_dynamic_css(control, dynamicStyle);
      jQuery("head").append(link);
    });
  });
}

function kemet_font_weight_css(control, selector) {
  wp.customize(control, function (value) {
    value.bind(function (value) {
      var fontControl = control.replace("weight", "family"),
        fontName = wp.customize._value[fontControl]._value,
        link = "";
      fontName = fontName.split(",")[0];
      fontName = fontName.replace(/'/g, "");

      if (fontName in previewData.googleFonts) {
        jQuery("link#" + fontControl).remove();
        if (value === "inherit") {
          link =
            '<link id="' +
            fontControl +
            '" href="https://fonts.googleapis.com/css?family=' +
            fontName +
            '"  rel="stylesheet">';
        } else {
          link =
            '<link id="' +
            fontControl +
            '" href="https://fonts.googleapis.com/css?family=' +
            fontName +
            "%3A" +
            value +
            '"  rel="stylesheet">';
        }
      }
      var dynamicStyle = selector + "{ --fontWeight: " + value + "; }";
      kemet_add_dynamic_css(control, dynamicStyle);
      jQuery("head").append(link);
    });
  });
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
(function ($) {
  // Button Preview.
  kemet_button_css(
    $.merge(previewData.buttonItems, previewData.mobileButtonItems)
  );
  $.each(previewData.preview, function (control, data) {
    switch (data.type) {
      case "kmt-responsive-slider":
        kemet_responsive_slider(control, data.selector, data.property);
        break;
      case "kmt-color":
      case "select":
        kemet_css(control, data.property, data.selector);
        break;
      case "kmt-slider":
        var unit =
          null !== data.unit && undefined !== data.unit ? data.unit : "px";
        kemet_css(control, data.property, data.selector, unit);
        break;
      case "kmt-responsive-spacing":
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
        break;
    }
  });
})(jQuery);
