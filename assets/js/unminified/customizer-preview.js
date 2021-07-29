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
        jQuery("footer").append(
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
      jQuery("footer").append(
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
 * Slider
 */
function kemet_slider(control, selector, type) {
  wp.customize(control, function (value) {
    value.bind(function (new_value) {
      // Remove old.
      control = control.replace("[", "-");
      control = control.replace("]", "");
      jQuery("style#" + control).remove();

      if (!new_value || new_value == "") {
        return;
      }

      new_value = new_value.value + new_value.unit;
      // Concat and append new <style>.
      jQuery("footer").append(
        '<style id="' +
        control +
        '">' +
        selector +
        "	{ " +
        type +
        ": " +
        new_value +
        " }" +
        "</style>"
      );
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
        jQuery("footer").append(
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
        jQuery("footer").append(
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
        jQuery("footer").append(
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

  jQuery("footer").append('<style id="' + control + '">' + style + "</style>");
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
      jQuery("footer").append(link);
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
      jQuery("footer").append(link);
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
          vOffset +
          "px; " +
          position[1] +
          ": " +
          hOffset +
          "px; } ";
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
          offset +
          "px; } ";
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
          offset +
          "px; } ";
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
            width +
            "%; } ";
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

      // Remove <style> first!
      control = control.replace("[", "-");
      control = control.replace("]", "");

      // Remove old.
      jQuery("style#" + control).remove();

      if (new_value == '') {
        wp.customize.preview.send("refresh");
        // Remove old.
        jQuery("style#" + control).remove();
        return;
      }

      var dynamicStyle = '';
      jQuery.each(new_value, function (id, val) {
        if (val) {
          var previewData = data[id];
          dynamicStyle += previewData.selector +
            "	{ " +
            previewData.property +
            ": " +
            val +
            " }";
        }
      })

      // Concat and append new <style>.
      jQuery("footer").append(
        '<style id="' +
        control +
        '">' +
        dynamicStyle +
        "</style>"
      );
    })
  })
}

function kemet_responsive_color_css(control, data) {
  wp.customize(control, function (value) {
    value.bind(function (new_value) {

      // Remove <style> first!
      control = control.replace("[", "-");
      control = control.replace("]", "");

      // Remove old.
      jQuery("style#" + control).remove();

      if (Object.keys(new_value).length === 0) {
        // Remove old.
        jQuery("style#" + control).remove();
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
      jQuery("footer").append(
        '<style id="' +
        control +
        '">' +
        desktopStyle +
        "@media (max-width: 768px) {" +
        tabletStyle +
        " }" +
        "@media (max-width: 544px) {" +
        mobileStyle +
        " }" +
        "</style>"
      );
    })
  })
}

(function ($) {
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
      case "kmt-color":
        if (data.responsive) {
          delete data.responsive;
          kemet_responsive_color_css(control, data);
        } else {
          kemet_color_css(control, data);
        }
        break;
      case "kmt-reponsive-color":
        kemet_responsive_css(control, data.selector, data.property);
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
  // Other preview
  var btnSelector = 'button, .button, .kmt-button, input[type=button], input[type=reset], input[type="submit"], .wp-block-button a.wp-block-button__link, .wp-block-search button.wp-block-search__button';
  var btnHoverSelector = 'button:focus, .button:hover, button:hover, .kmt-button:hover, .button:hover, input[type=reset]:hover, input[type=reset]:focus, input#submit:hover, input#submit:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="submit"]:hover, input[type="submit"]:focus, .button:focus, .button:focus, .wp-block-button a.wp-block-button__link:hover, .wp-block-search button.wp-block-search__button:hover';
  wp.customize(settingName('button-effect'), function (value) {
    value.bind(function (new_value) {
      var hoverEffect = wp.customize(settingName('button-hover-effect')).get();
      var dynamicStyle = '';
      if (new_value) {
        dynamicStyle = btnSelector + "{"
          + "--buttonShadow: 2px 2px 10px -3px;"
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
          + "--buttonShadow: 2px 2px 10px -3px;"
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
      if (new_value) {
        $('.kmt-read-more').addClass('button');
      }
    })
  });
})(jQuery);
