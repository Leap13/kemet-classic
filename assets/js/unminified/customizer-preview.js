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
function kemet_responsive_spacing(control, selector, type, side) {
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
            desktopPadding +=
              spacingType +
              "-" +
              sideValue +
              ": " +
              value["desktop"][sideValue] +
              value["desktop-unit"] +
              ";";
          }
        });

        jQuery.each(paddingSide, function (index, sideValue) {
          if ("" != value["tablet"][sideValue]) {
            tabletPadding +=
              spacingType +
              "-" +
              sideValue +
              ": " +
              value["tablet"][sideValue] +
              value["tablet-unit"] +
              ";";
          }
        });

        jQuery.each(paddingSide, function (index, sideValue) {
          if ("" != value["mobile"][sideValue]) {
            mobilePadding +=
              spacingType +
              "-" +
              sideValue +
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

function settingName(settingName) {
  var setting = KemetCustomizerPrevData.setting.replace(
    "setting_name",
    settingName
  );

  return setting;
}
function kemet_html_css(prefix) {
  var selector = ".kmt-" + prefix;
  kemet_css(settingName(prefix + "-color"), "color", selector);
  kemet_css(settingName(prefix + "-link-color"), "color", selector + " a");
  kemet_css(
    settingName(prefix + "-link-hover-color"),
    "color",
    selector + " a:hover"
  );
}
(function ($) {
  // Global custom event which triggers when partial refresh occurs.
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
  kemet_responsive_slider(
    "kemet-settings[kmt-header-responsive-logo-width]",
    "#sitehead .site-logo-img .custom-logo-link img",
    "max-width"
  );
  kemet_responsive_slider(
    "kemet-settings[kmt-header-responsive-logo-width]",
    ".kemet-logo-svg",
    "width"
  );
  /*
   * Full width layout
   */
  wp.customize("kemet-settings[site-content-width]", function (setting) {
    setting.bind(function (width) {
      var dynamicStyle = "@media (min-width: 554px) {";
      dynamicStyle +=
        ".kmt-container, .fl-builder #content .entry-header { max-width: " +
        (40 + parseInt(width)) +
        "px } ";
      dynamicStyle += "}";
      if (jQuery("body").hasClass("kmt-page-builder-template")) {
        dynamicStyle += "@media (min-width: 554px) {";
        dynamicStyle +=
          ".kmt-page-builder-template .comments-area { max-width: " +
          (40 + parseInt(width)) +
          "px } ";
        dynamicStyle += "}";
      }

      kemet_add_dynamic_css("site-content-width", dynamicStyle);
    });
  });

  /*
   * Full width layout
   */
  wp.customize("kemet-settings[header-main-menu-label]", function (setting) {
    setting.bind(function (label) {
      if (
        $("button.main-header-menu-toggle .mobile-menu-wrap .mobile-menu")
          .length > 0
      ) {
        if (label != "") {
          $(
            "button.main-header-menu-toggle .mobile-menu-wrap .mobile-menu"
          ).text(label);
        } else {
          $("button.main-header-menu-toggle .mobile-menu-wrap").remove();
        }
      } else {
        var html = $("button.main-header-menu-toggle").html();
        if ("" != label) {
          html +=
            '<div class="mobile-menu-wrap"><span class="mobile-menu">' +
            label +
            "</span> </div>";
        }
        $("button.main-header-menu-toggle").html(html);
      }
    });
  });

  /*
   * Layout Body Background
   */
  wp.customize("kemet-settings[site-layout-outside-bg-obj]", function (value) {
    value.bind(function (bg_obj) {
      var dynamicStyle = "body,.kmt-separate-container { {{css}} }";

      kemet_background_obj_css(
        wp.customize,
        bg_obj,
        "site-layout-outside-bg-obj",
        dynamicStyle
      );
    });
  });

  /*
   * Boxed Inner Background
   */
  wp.customize("kemet-settings[site-boxed-inner-bg]", function (value) {
    value.bind(function (bg_obj) {
      var dynamicStyle =
        ".kmt-separate-container .kmt-article-post,.kmt-separate-container .kmt-article-single ,.kmt-separate-container .comment-respond ,.kmt-separate-container .kmt-author-box-info , .kmt-separate-container .kmt-woocommerce-container ,.kmt-separate-container .kmt-comment-list li ,.kmt-separate-container .comments-count-wrapper ,.kmt-separate-container.kmt-two-container div.widget { {{css}} }";

      kemet_background_obj_css(
        wp.customize,
        bg_obj,
        "site-boxed-inner-bg",
        dynamicStyle
      );
    });
  });

  /*
   * Blog Custom Width
   */
  wp.customize("kemet-settings[blog-max-width]", function (setting) {
    setting.bind(function (width) {
      var dynamicStyle = "@media all and ( min-width: 921px ) {";

      if (!jQuery("body").hasClass("kmt-woo-shop-archive")) {
        dynamicStyle +=
          ".blog .site-content > .kmt-container,.archive .site-content > .kmt-container{ max-width: " +
          parseInt(width) +
          "px } ";
      }

      if (jQuery("body").hasClass("kmt-fluid-width-layout")) {
        dynamicStyle +=
          ".blog .site-content > .kmt-container,.archive .site-content > .kmt-container{ padding-left:20px; padding-right:20px; } ";
      }
      dynamicStyle += "}";
      kemet_add_dynamic_css("blog-max-width", dynamicStyle);
    });
  });

  /*
   * Sub Menu Width
   */
  wp.customize("kemet-settings[submenu-width]", function (setting) {
    setting.bind(function (width) {
      dynamicStyle =
        "body:not(.kmt-header-break-point) .main-header-menu ul.sub-menu{ width: " +
        parseInt(width) +
        "px } ";
      kemet_add_dynamic_css("submenu-width", dynamicStyle);
    });
  });

  /*
   * Single Blog Custom Width
   */
  wp.customize("kemet-settings[blog-single-max-width]", function (setting) {
    setting.bind(function (width) {
      var dynamicStyle = "@media all and ( min-width: 921px ) {";

      dynamicStyle +=
        ".single-post .site-content > .kmt-container{ max-width: " +
        (40 + parseInt(width)) +
        "px } ";

      if (jQuery("body").hasClass("kmt-fluid-width-layout")) {
        dynamicStyle +=
          ".single-post .site-content > .kmt-container{ padding-left:20px; padding-right:20px; } ";
      }
      dynamicStyle += "}";
      kemet_add_dynamic_css("blog-single-max-width", dynamicStyle);
    });
  });
  //Single Post Content Separator Color
  wp.customize("kemet-settings[content-separator-color]", function (value) {
    value.bind(function (border_color) {
      jQuery(
        "body .kmt-article-post > div, body #primary,body #secondary, .single-post:not(.kmt-separate-container) .post-navigation ,.single-post:not(.kmt-separate-container) .comments-area ,.single-post:not(.kmt-separate-container) .kmt-author-box-info , .single-post:not(.kmt-separate-container) .comments-area .kmt-comment"
      ).css("border-color", border_color);
    });
  });
  /**
   * Primary Width Option
   */
  wp.customize("kemet-settings[site-sidebar-width]", function (setting) {
    setting.bind(function (width) {
      if (!jQuery("body").hasClass("kmt-no-sidebar")) {
        var dynamicStyle = "@media (min-width: 769px) {";

        dynamicStyle += "#primary { width: " + (100 - parseInt(width)) + "% } ";
        dynamicStyle += "#secondary { width: " + width + "% } ";
        dynamicStyle += "}";

        kemet_add_dynamic_css("site-sidebar-width", dynamicStyle);
      }
    });
  });

  /**
   * Small Footer Top Border
   */
  wp.customize("kemet-settings[footer-copyright-divider]", function (value) {
    value.bind(function (border_width) {
      jQuery(".kmt-footer-copyright").css(
        "border-top-width",
        border_width + "px"
      );
    });
  });

  /**
   * Small Footer Top Border Color
   */
  wp.customize(
    "kemet-settings[footer-copyright-divider-color]",
    function (value) {
      value.bind(function (border_color) {
        jQuery(".kmt-footer-copyright").css("border-top-color", border_color);
      });
    }
  );
  kemet_responsive_slider(
    "kemet-settings[product-title-font-size]",
    ".woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title",
    "font-size"
  );
  kemet_responsive_spacing(
    "kemet-settings[product-title-spacing]",
    ".woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title, ul.products li.product .woocommerce-loop-product__title",
    "margin",
    ["top", "bottom", "right", "left"]
  );
  kemet_responsive_slider(
    "kemet-settings[product-price-font-size]",
    ".woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,.woocommerce ul.products li.product .price ins",
    "font-size"
  );
  kemet_responsive_spacing(
    "kemet-settings[product-price-spacing]",
    ".woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price , ul.products li.product .price",
    "margin",
    ["top", "bottom", "right", "left"]
  );
  kemet_responsive_slider(
    "kemet-settings[product-rating-font-size]",
    ".woocommerce ul.products li.product .star-rating ,  ul.products li.product .star-rating",
    "font-size"
  );
  kemet_responsive_spacing(
    "kemet-settings[product-rating-spacing]",
    ".woocommerce ul.products li.product .star-rating ,  ul.products li.product .star-rating",
    "margin",
    ["top", "bottom", "right", "left"]
  );
  kemet_responsive_slider(
    "kemet-settings[product-content-font-size]",
    ".woocommerce ul.products li.product .kmt-woo-product-category, .woocommerce-page ul.products li.product .kmt-woo-product-category, .woocommerce ul.products li.product .kmt-woo-shop-product-description, .woocommerce-page ul.products li.product .kmt-woo-shop-product-description",
    "font-size"
  );
  var $btn_selectors =
    '.menu-toggle,button,.button,.kmt-button,input#submit,input[type="button"],input[type="submit"],input[type="reset"]';
  if (
    jQuery("body").hasClass("woocommerce") ||
    jQuery("body").hasClass("woocommerce-page")
  ) {
    $btn_selectors +=
      " .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button,.woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled]";
  }
  kemet_responsive_slider(
    "kemet-settings[buttons-font-size]",
    $btn_selectors,
    "font-size"
  );
  kemet_css(
    "kemet-settings[buttons-text-transform]",
    "text-transform",
    $btn_selectors
  );
  kemet_css("kemet-settings[buttons-font-style]", "font-style", $btn_selectors);
  kemet_responsive_slider(
    "kemet-settings[buttons-line-height]",
    $btn_selectors,
    "line-height"
  );
  kemet_responsive_slider(
    "kemet-settings[buttons-letter-spacing]",
    $btn_selectors,
    "letter-spacing"
  );
  /**
   * Button Border Radius
   */
  kemet_responsive_slider(
    "kemet-settings[button-radius]",
    $btn_selectors,
    "border-radius"
  );
  /**
   * Button Border Color
   */

  wp.customize("kemet-settings[btn-border-color]", function (value) {
    value.bind(function (border_color) {
      jQuery("").css("border-color", border_color);
      var dynamicStyle =
        '.menu-toggle,button,.button,.kmt-button,input#submit,input[type="button"],input[type="submit"],input[type="reset"] { border-color: ' +
        border_color +
        "; } ";
      if (
        jQuery("body").hasClass("woocommerce") ||
        jQuery("body").hasClass("woocommerce-page")
      ) {
        dynamicStyle +=
          ".woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button,.woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled] { border-color: " +
          border_color +
          "; } ";
      }
      kemet_add_dynamic_css("btn-border-color", dynamicStyle);
    });
  });
  wp.customize("kemet-settings[btn-border-h-color]", function (value) {
    value.bind(function (color) {
      if (color == "") {
        wp.customize.preview.send("refresh");
      }
      if (color) {
        var dynamicStyle =
          'button:focus, .menu-toggle:hover, button:hover, .kmt-button:hover, a.button:hover, .button:hover, input[type=reset]:hover, input[type=reset]:focus, input#submit:hover, input#submit:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="submit"]:hover, input[type="submit"]:focus { border-color: ' +
          color +
          "; } ";
      }
      if (
        jQuery("body").hasClass("woocommerce") ||
        jQuery("body").hasClass("woocommerce-page")
      ) {
        dynamicStyle +=
          ".woocommerce #respond input#submit:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce input.button:hover, .woocommerce button.button.alt.disabled:hover ,.woocommerce a.checkout-button:hover { border-color: " +
          color +
          "; } ";
      }
      kemet_add_dynamic_css("btn-border-h-color", dynamicStyle);
    });
  });
  wp.customize("kemet-settings[btn-border-size]", function (setting) {
    setting.bind(function (border) {
      var dynamicStyle =
        '.menu-toggle,button,.button,.kmt-button,input#submit,input[type="button"],input[type="submit"],input[type="reset"] { border-width: ' +
        border +
        "px }";

      if (
        jQuery("body").hasClass("woocommerce") ||
        jQuery("body").hasClass("woocommerce-page")
      ) {
        dynamicStyle +=
          ".woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button,.woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled] { border-width: " +
          border +
          "px }";
      }

      kemet_add_dynamic_css("btn-border-size", dynamicStyle);
    });
  });

  /**
   * Button Horizontal Padding
   */
  kemet_responsive_spacing(
    "kemet-settings[button-spacing]",
    '.menu-toggle,button,.kmt-button,input#submit,input[type="button"],input[type="submit"],input[type="reset"]',
    "padding",
    ["top", "bottom", "right", "left"]
  );
  if (
    jQuery("body").hasClass("woocommerce") ||
    jQuery("body").hasClass("woocommerce-page")
  ) {
    kemet_responsive_spacing(
      "kemet-settings[button-spacing]",
      ".woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button,.woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled]",
      "padding",
      ["top", "bottom", "right", "left"]
    );
  }

  /**
   * Header Bottom Border width
   */
  kemet_responsive_slider(
    "kemet-settings[header-main-sep]",
    "body:not(.kmt-header-break-point) .main-header-bar, .header-main-layout-4 .main-header-container.logo-menu-icon",
    "border-bottom-width"
  );

  /**
   * widget Padding
   */
  kemet_responsive_spacing(
    "kemet-settings[widget-padding]",
    ".sidebar-main .widget",
    "padding",
    ["top", "bottom", "right", "left"]
  );

  // widget margin bottom.
  wp.customize("kemet-settings[widget-margin-bottom]", function (value) {
    value.bind(function (marginBottom) {
      if (marginBottom == "") {
        wp.customize.preview.send("refresh");
      }

      if (marginBottom) {
        var dynamicStyle =
          ".widget { margin-bottom: " + marginBottom + "px; } ";
        kemet_add_dynamic_css("widget-margin-bottom", dynamicStyle);
      }
    });
  });

  /**
   * Header Bottom Border color
   */
  wp.customize("kemet-settings[header-main-sep-color]", function (value) {
    value.bind(function (color) {
      if (color == "") {
        wp.customize.preview.send("refresh");
      }

      if (color) {
        var dynamicStyle =
          " body:not(.kmt-header-break-point) .main-header-bar, .header-main-layout-4 .main-header-container.logo-menu-icon { border-bottom-color: " +
          color +
          "; } ";
        dynamicStyle +=
          " .kmt-header-break-point .site-header .main-header-bar ,.kmt-header-break-point .header-main-layout-4 .main-header-container.logo-menu-icon { border-bottom-color: " +
          color +
          "; } ";

        kemet_add_dynamic_css("header-main-sep-color", dynamicStyle);
      }
    });
  });
  /**
   * Header background
   */
  wp.customize("kemet-settings[header-bg-obj]", function (value) {
    value.bind(function (bg_obj) {
      var dynamicStyle =
        ".site-header:not(.kmt-is-sticky) .main-header-bar ,.site-header:not(.kmt-is-sticky) .kemet-merged-top-bar-header { {{css}} }";
      kemet_background_obj_css(
        wp.customize,
        bg_obj,
        "header-bg-obj",
        dynamicStyle
      );
    });
  });

  /**
   * Header Spacing
   */
  kemet_responsive_spacing(
    "kemet-settings[header-padding]",
    ".site-header:not(.kmt-is-sticky) .main-header-bar",
    "padding",
    ["top", "bottom", "right", "left"]
  );
  kemet_responsive_spacing(
    "kemet-settings[last-menu-item-spacing]",
    ".site-header .kmt-sitehead-custom-menu-items > * , .site-header .kmt-outside-menu .kmt-sitehead-custom-menu-items > * ",
    "padding",
    ["top", "bottom", "right", "left"]
  );
  kemet_responsive_slider(
    "kemet-settings[last-menu-items-font-size]",
    ".site-header .kmt-sitehead-custom-menu-items > * , .site-header .kmt-outside-menu .kmt-sitehead-custom-menu-items > *, .woocommerce.kmt-sitehead-custom-menu-items a:not(.button)",
    "font-size"
  );
  kemet_responsive_slider(
    "kemet-settings[last-menu-items-line-height]",
    ".site-header .kmt-sitehead-custom-menu-items > * , .site-header .kmt-outside-menu .kmt-sitehead-custom-menu-items > *, .woocommerce.kmt-sitehead-custom-menu-items a:not(.button)",
    "line-height"
  );
  kemet_responsive_slider(
    "kemet-settings[last-menu-items-letter-spacing]",
    ".site-header .kmt-sitehead-custom-menu-items > * , .site-header .kmt-outside-menu .kmt-sitehead-custom-menu-items > *, .woocommerce.kmt-sitehead-custom-menu-items a:not(.button)",
    "letter-spacing"
  );
  kemet_css(
    "kemet-settings[last-menu-items-text-transform]",
    "text-transform",
    ".site-header .kmt-sitehead-custom-menu-items > * , .site-header .kmt-outside-menu .kmt-sitehead-custom-menu-items > *, .woocommerce.kmt-sitehead-custom-menu-items a:not(.button)"
  );
  kemet_css(
    "kemet-settings[last-menu-items-font-style]",
    "font-style",
    ".site-header .kmt-sitehead-custom-menu-items > * , .site-header .kmt-outside-menu .kmt-sitehead-custom-menu-items > *, .woocommerce.kmt-sitehead-custom-menu-items a:not(.button)"
  );
  /**
   * menu background
   */
  kemet_responsive_css(
    "kemet-settings[menu-bg-color]",
    "ul.main-header-menu , .toggle-on ul.main-header-menu , .toggle-on ul.main-header-menu ul.sub-menu",
    "background-color"
  );
  kemet_responsive_spacing(
    "kemet-settings[main-menu-item-spacing]",
    ".kmt-sitehead-custom-menu-items > *, .main-header-menu li > a , .kmt-header-break-point .main-navigation ul li a",
    "padding",
    ["top", "bottom", "right", "left"]
  );
  kemet_responsive_spacing(
    "kemet-settings[main-menu-spacing]",
    ".main-navigation ul.main-header-menu",
    "padding",
    ["top", "bottom", "right", "left"]
  );
  kemet_responsive_css(
    "kemet-settings[menu-link-color]",
    ".kmt-sitehead-custom-menu-items > *, .main-header-menu li > a , .kmt-header-break-point .main-navigation ul li a, .kmt-header-break-point .main-header-bar .main-header-bar-navigation .menu-item-has-children>.kmt-menu-toggle, .kmt-header-break-point .main-header-bar .main-header-bar-navigation .page_item_has_children>.kmt-menu-toggle",
    "color"
  );
  kemet_css(
    "kemet-settings[menu-link-bottom-border-color]",
    "border-bottom-color",
    ".site-header .main-header-menu > .menu-item:hover > a, .ss-content .main-header-menu .menu-item:hover>a, .ss-content .main-header-menu li.menu-item:last-child:hover>a, .ss-content .main-header-menu .page_item:hover>a, .ss-content .main-header-menu li.page_item:last-child:hover>a"
  );
  kemet_css(
    "kemet-settings[menu-items-text-transform]",
    "text-transform",
    ".main-header-menu a"
  );
  kemet_css(
    "kemet-settings[menu-items-font-style]",
    "font-style",
    ".main-header-menu a , .vertical-navigation a"
  );
  kemet_responsive_slider(
    "kemet-settings[menu-items-line-height]",
    ".kmt-sitehead-custom-menu-items , .main-header-menu > .menu-item > a, .main-header-menu > .menu-item",
    "line-height"
  );

  kemet_responsive_css(
    "kemet-settings[menu-link-h-color]",
    ".main-header-menu li:hover > a, .main-header-menu .kmt-sitehead-custom-menu-items a:not(.button):hover , .kmt-header-break-point .main-navigation ul li:hover > a , .vertical-navigation ul li:hover > a, .kmt-header-break-point .main-header-bar .main-header-bar-navigation .menu-item-has-children:hover>.kmt-menu-toggle, .kmt-header-break-point .main-header-bar .main-header-bar-navigation .page_item_has_children:hover>.kmt-menu-toggle",
    "color"
  );
  kemet_css(
    "kemet-settings[menu-link-active-color]",
    "color",
    ".main-header-menu li.current-menu-item a, .main-header-menu li.current_page_item a, .main-header-menu .current-menu-ancestor > a"
  );
  kemet_css(
    "kemet-settings[menu-link-active-bg-color]",
    "background-color",
    ".main-header-menu li.current-menu-item a, .main-header-menu li.current_page_item a, .main-header-menu .current-menu-ancestor > a"
  );
  kemet_responsive_slider(
    "kemet-settings[menu-link-active-radius]",
    ".main-header-menu li.current-menu-item a, .main-header-menu li.current_page_item a, .main-header-menu .current-menu-ancestor > a",
    "border-radius"
  );

  /**
   * submenu background
   */
  kemet_css(
    "kemet-settings[sub-menu-items-text-transform]",
    "text-transform",
    ".main-header-menu .sub-menu li a"
  );
  kemet_css(
    "kemet-settings[sub-menu-items-font-style]",
    "font-style",
    ".main-header-menu .sub-menu li a"
  );
  kemet_responsive_slider(
    "kemet-settings[sub-menu-items-line-height]",
    ".main-header-menu .sub-menu li a",
    "line-height"
  );
  kemet_responsive_spacing(
    "kemet-settings[sub-menu-item-spacing]",
    ".main-header-menu .sub-menu li a,.kmt-header-break-point .main-navigation ul.children li a, .kmt-header-break-point .main-navigation ul.sub-menu li a ",
    "padding",
    ["top", "bottom", "right", "left"]
  );

  kemet_css(
    "kemet-settings[submenu-bg-color]",
    "background-color",
    ".main-header-menu ul.sub-menu li.menu-item"
  );

  kemet_css(
    "kemet-settings[submenu-bg-hover-color]",
    "background-color",
    ".main-header-menu ul.sub-menu li.menu-item:hover"
  );
  //Search
  kemet_css(
    "kemet-settings[search-btn-bg-color]",
    "background-color",
    ".kmt-search-menu-icon .search-submit"
  );
  kemet_css(
    "kemet-settings[search-btn-h-bg-color]",
    "background-color",
    ".kmt-search-menu-icon .search-submit:hover"
  );
  kemet_css(
    "kemet-settings[search-btn-color]",
    "color",
    ".kmt-search-menu-icon .search-submit"
  );
  kemet_css(
    "kemet-settings[search-input-bg-color]",
    "background-color",
    ".kmt-search-menu-icon form"
  );
  kemet_css(
    "kemet-settings[search-input-color]",
    "color",
    ".kmt-search-menu-icon form .search-field"
  );
  wp.customize("kemet-settings[search-border-size]", function (setting) {
    setting.bind(function (border) {
      var dynamicStyle =
        ".search-box .kmt-search-menu-icon form .search-field { border-width: " +
        border +
        "px } .top-bar-search-box .kemet-top-header-section .kmt-search-menu-icon .search-form .search-field { border-width: " +
        border +
        "px }";

      kemet_add_dynamic_css("search-border-size", dynamicStyle);
    });
  });
  wp.customize("kemet-settings[search-border-color]", function (value) {
    value.bind(function (border_color) {
      jQuery(".kmt-search-menu-icon form .search-field").css(
        "border-color",
        border_color
      );
    });
  });
  /**submenu color */
  kemet_css(
    "kemet-settings[submenu-link-color]",
    "color",
    ".main-header-menu .sub-menu li a"
  );
  kemet_css(
    "kemet-settings[submenu-link-h-color]",
    "color",
    ".main-header-menu .sub-menu li:hover > a"
  );

  /**
   * SubMenu Top Border
   */
  wp.customize("kemet-settings[submenu-top-border-size]", function (setting) {
    setting.bind(function (border) {
      var dynamicStyle =
        ".main-header-menu ul.sub-menu { border-top-width: " + border + "px }";
      dynamicStyle +=
        ".main-header-menu ul.sub-menu li.menu-item-has-children:hover > ul , .main-header-menu ul.children li.page_item_has_children:hover > ul { top: -" +
        border +
        "px }";
      kemet_add_dynamic_css("submenu-top-border-size", dynamicStyle);
    });
  });

  /**
   * SubMenu Top Border color
   */
  wp.customize("kemet-settings[submenu-top-border-color]", function (value) {
    value.bind(function (color) {
      if (color == "") {
        wp.customize.preview.send("refresh");
      }

      if (color) {
        var dynamicStyle =
          ".main-header-menu ul.sub-menu { border-top-color: " + color + "; } ";

        kemet_add_dynamic_css("submenu-top-border-color", dynamicStyle);
      }
    });
  });

  /**
   * SubMenu Border color
   */
  wp.customize("kemet-settings[submenu-border-color]", function (value) {
    value.bind(function (border_color) {
      jQuery(".main-header-menu .sub-menu a").css("border-color", border_color);
    });
  });

  kemet_css(
    "kemet-settings[submenu-link-h-color]",
    "color",
    ".main-header-menu .sub-menu li:hover > a"
  );

  /**
   * Mobile Menu color
   */
  kemet_css(
    "kemet-settings[mobile-menu-icon-color]",
    "color",
    ".kmt-mobile-menu-buttons .menu-toggle .menu-toggle-icon"
  );
  kemet_css(
    "kemet-settings[mobile-menu-icon-h-color]",
    "color",
    ".kmt-mobile-menu-buttons .menu-toggle:hover .menu-toggle-icon, .kmt-mobile-menu-buttons .menu-toggle.toggled .menu-toggle-icon"
  );
  kemet_css(
    "kemet-settings[mobile-menu-icon-bg-color]",
    "background-color",
    ".kmt-mobile-menu-buttons .menu-toggle"
  );
  kemet_css(
    "kemet-settings[mobile-menu-icon-bg-h-color]",
    "background-color",
    ".kmt-mobile-menu-buttons .menu-toggle:hover, .kmt-mobile-menu-buttons .menu-toggle.toggled"
  );
  kemet_css(
    "kemet-settings[mobile-menu-items-border-color]",
    "border-color",
    ".kmt-header-break-point .kmt-main-header-bar-alignment .main-header-menu a, .kmt-header-break-point .kmt-main-header-bar-alignment .main-navigation ul li a ,.kmt-header-break-point .kmt-main-header-bar-alignment .main-header-menu .sub-menu li a, .kmt-header-break-point .kmt-main-header-bar-alignment .main-navigation ul.children li a, .kmt-header-break-point .kmt-main-header-bar-alignment .main-navigation ul.sub-menu li a"
  );

  wp.customize(
    "kemet-settings[mobile-menu-items-border-size]",
    function (setting) {
      setting.bind(function (border) {
        var dynamicStyle =
          ".kmt-header-break-point .kmt-main-header-bar-alignment .main-header-menu a, .kmt-header-break-point .kmt-main-header-bar-alignment .main-navigation ul li a ,.kmt-header-break-point .kmt-main-header-bar-alignment .main-header-menu .sub-menu li a, .kmt-header-break-point .kmt-main-header-bar-alignment .main-navigation ul.children li a, .kmt-header-break-point .kmt-main-header-bar-alignment .main-navigation ul.sub-menu li a { border-bottom-width: " +
          border +
          "px }";
        kemet_add_dynamic_css("mobile-menu-items-border-size", dynamicStyle);
      });
    }
  );

  wp.customize("kemet-settings[menu-item-border-bottom]", function (setting) {
    setting.bind(function (border) {
      var dynamicStyle =
        ".main-header-menu > li.menu-item > a,.main-header-menu > li.page_item > a { border-bottom-width: " +
        border +
        "px }";
      kemet_add_dynamic_css("menu-item-border-bottom", dynamicStyle);
    });
  });

  /**
   * Container Inner Spacing
   */
  kemet_responsive_spacing(
    "kemet-settings[container-inner-spacing]",
    ".kmt-separate-container .kmt-article-post, .kmt-separate-container .kmt-article-single, .kmt-separate-container .comment-respond, .single.kmt-separate-container .kmt-author-details, .kmt-separate-container .kmt-related-posts-wrap, .kmt-separate-container .kmt-woocommerce-container",
    "padding",
    ["top", "bottom", "right", "left"]
  );
  kemet_responsive_spacing(
    "kemet-settings[content-padding]",
    ".site-content #primary",
    "padding",
    ["top", "bottom"]
  );
  /**
   * Site Identity Spacing
   */
  kemet_responsive_spacing(
    "kemet-settings[site-identity-spacing]",
    "#sitehead.site-header:not(.kmt-is-sticky) .kmt-site-identity",
    "padding",
    ["top", "right", "bottom", "left"]
  );

  /**
   * Footer Padding
   */
  kemet_responsive_spacing(
    "kemet-settings[footer-padding]",
    ".kemet-footer .kemet-footer-overlay",
    "padding",
    ["top", "bottom", "right", "left"]
  );
  kemet_responsive_spacing(
    "kemet-settings[footer-widget-padding]",
    ".kemet-footer .kemet-footer-widget",
    "padding",
    ["top", "bottom", "right", "left"]
  );
  kemet_responsive_spacing(
    "kemet-settings[footer-inner-widget-padding]",
    ".kemet-footer .widget , .kmt-footer-copyright .widget",
    "padding",
    ["top", "bottom", "right", "left"]
  );
  kemet_responsive_slider(
    "kemet-settings[menu-font-size]",
    ".kmt-sitehead-custom-menu-items > *, .main-header-menu li > a, .kmt-header-break-point .main-navigation ul li a , .kmt-header-break-point .main-header-bar .main-header-bar-navigation .menu-item-has-children>.kmt-menu-toggle::before, .kmt-header-break-point .main-header-bar .main-header-bar-navigation .page_item_has_children>.kmt-menu-toggle::before",
    "font-size"
  );
  kemet_responsive_slider(
    "kemet-settings[submenu-font-size]",
    ".main-header-menu .sub-menu li a",
    "font-size"
  );
  kemet_responsive_slider(
    "kemet-settings[font-size-site-tagline]",
    ".site-header .site-description",
    "font-size"
  );
  kemet_responsive_slider(
    "kemet-settings[site-title-font-size]",
    ".site-title",
    "font-size"
  );
  kemet_responsive_slider(
    "kemet-settings[font-size-entry-title]",
    ".kmt-single-post .entry-header .entry-title",
    "font-size"
  );
  kemet_responsive_slider(
    "kemet-settings[footer-widget-title-font-size]",
    ".kemet-footer .widget-head .widget-title , .kmt-footer-copyright .widget-head .widget-title",
    "font-size"
  );
  kemet_responsive_slider(
    "kemet-settings[font-size-page-title]",
    ".blog-posts-container .entry-title , .blog-posts-container .entry-title a",
    "font-size"
  );
  kemet_responsive_slider(
    "kemet-settings[post-title-line-height]",
    ".blog-posts-container .entry-title , .blog-posts-container .entry-title a",
    "line-height"
  );
  kemet_css(
    "kemet-settings[post-title-text-transform]",
    "text-transform",
    ".blog-posts-container .entry-title , .blog-posts-container .entry-title a"
  );
  kemet_css(
    "kemet-settings[post-title-font-style]",
    "font-style",
    ".blog-posts-container .entry-title , .blog-posts-container .entry-title a"
  );
  kemet_responsive_slider(
    "kemet-settings[font-size-post-meta]",
    ".blog-posts-container .entry-meta , .blog-posts-container .entry-meta *",
    "font-size"
  );
  kemet_responsive_slider(
    "kemet-settings[post-meta-line-height]",
    ".blog-posts-container .entry-meta , .blog-posts-container .entry-meta *",
    "line-height"
  );
  kemet_responsive_slider(
    "kemet-settings[letter-spacing-post-meta]",
    ".blog-posts-container .entry-meta , .blog-posts-container .entry-meta *",
    "letter-spacing"
  );
  kemet_css(
    "kemet-settings[post-meta-text-transform]",
    "text-transform",
    ".blog-posts-container .entry-meta , .blog-posts-container .entry-meta *"
  );
  kemet_css(
    "kemet-settings[post-meta-font-style]",
    "font-style",
    ".blog-posts-container .entry-meta , .blog-posts-container .entry-meta *"
  );
  kemet_responsive_slider(
    "kemet-settings[font-size-h1]",
    "h1, .entry-content h1, .entry-content h1 a",
    "font-size"
  );
  kemet_responsive_slider(
    "kemet-settings[font-size-h2]",
    "h2, .entry-content h2, .entry-content h2 a",
    "font-size"
  );
  kemet_responsive_slider(
    "kemet-settings[font-size-h3]",
    "h3, .entry-content h3, .entry-content h3 a",
    "font-size"
  );
  kemet_responsive_slider(
    "kemet-settings[font-size-h4]",
    "h4, .entry-content h4, .entry-content h4 a",
    "font-size"
  );
  kemet_responsive_slider(
    "kemet-settings[font-size-h5]",
    "h5, .entry-content h5, .entry-content h5 a",
    "font-size"
  );
  kemet_responsive_slider(
    "kemet-settings[font-size-h6]",
    "h6, .entry-content h6, .entry-content h6 a",
    "font-size"
  );
  /**
   * Content Heading Color
   */
  kemet_css(
    "kemet-settings[font-color-h1]",
    "color",
    "h1, .entry-content h1, .entry-content h1 a"
  );
  kemet_css(
    "kemet-settings[font-color-h2]",
    "color",
    "h2, .entry-content h2, .entry-content h2 a"
  );
  kemet_css(
    "kemet-settings[font-color-h3]",
    "color",
    "h3, .entry-content h3, .entry-content h3 a"
  );
  kemet_css(
    "kemet-settings[font-color-h4]",
    "color",
    "h4, .entry-content h4, .entry-content h4 a"
  );
  kemet_css(
    "kemet-settings[font-color-h5]",
    "color",
    "h5, .entry-content h5, .entry-content h5 a"
  );
  kemet_css(
    "kemet-settings[font-color-h6]",
    "color",
    "h6, .entry-content h6, .entry-content h6 a"
  );
  kemet_css("kemet-settings[site-title-color]", "color", ".site-title a");
  kemet_css(
    "kemet-settings[site-title-h-color]",
    "color",
    ".site-title a:hover"
  );
  kemet_css(
    "kemet-settings[tagline-color]",
    "color",
    ".site-header .site-description"
  );

  kemet_responsive_slider(
    "kemet-settings[body-line-height]",
    "body, button, input, select, textarea, .button",
    "line-height"
  );
  // paragraph margin bottom.
  wp.customize("kemet-settings[para-margin-bottom]", function (value) {
    value.bind(function (marginBottom) {
      if (marginBottom == "") {
        wp.customize.preview.send("refresh");
      }

      if (marginBottom) {
        var dynamicStyle =
          " p, .entry-content p { margin-bottom: " + marginBottom + "em; } ";
        kemet_add_dynamic_css("para-margin-bottom", dynamicStyle);
      }
    });
  });

  kemet_css(
    "kemet-settings[body-text-transform]",
    "text-transform",
    "body, button, input, select, textarea, .button"
  );

  kemet_css(
    "kemet-settings[body-font-style]",
    "font-style",
    "body, button, input, select, textarea, .button"
  );

  kemet_css(
    "kemet-settings[headings-text-transform]",
    "text-transform",
    "h1, .entry-content h1, .entry-content h1 a, h2, .entry-content h2, .entry-content h2 a, h3, .entry-content h3, .entry-content h3 a, h4, .entry-content h4, .entry-content h4 a, h5, .entry-content h5, .entry-content h5 a, h6, .entry-content h6, .entry-content h6 a"
  );

  /**
   * widget Padding
   */
  kemet_responsive_spacing(
    "kemet-settings[widget-padding]",
    ".sidebar-main .widget",
    "padding",
    ["top", "bottom", "right", "left"]
  );
  //Sidebar Widget Title Typography
  kemet_css(
    "kemet-settings[widget-title-text-transform]",
    "text-transform",
    ".widget-head .widget-title , .widget-title"
  );
  kemet_css(
    "kemet-settings[widget-title-font-style]",
    "font-style",
    ".widget-head .widget-title , .widget-title"
  );
  kemet_responsive_slider(
    "kemet-settings[widget-title-line-height]",
    ".widget-head .widget-title",
    "line-height"
  );
  kemet_responsive_slider(
    "kemet-settings[widget-title-font-size]",
    ".widget-head .widget-title",
    "font-size"
  );
  kemet_responsive_slider(
    "kemet-settings[sidebar-input-border-size]",
    '.sidebar-main input,.sidebar-main input[type="text"],.sidebar-main input[type="email"],.sidebar-main input[type="url"],.sidebar-main input[type="password"],.sidebar-main input[type="reset"],.sidebar-main input[type="search"],.sidebar-main textarea ,.sidebar-main select',
    "border-width"
  );
  kemet_responsive_slider(
    "kemet-settings[sidebar-input-border-radius]",
    '.sidebar-main input,.sidebar-main input[type="text"],.sidebar-main input[type="email"],.sidebar-main input[type="url"],.sidebar-main input[type="password"],.sidebar-main input[type="reset"],.sidebar-main input[type="search"],.sidebar-main textarea ,.sidebar-main select',
    "border-radius"
  );
  kemet_css(
    "kemet-settings[widget-title-color]",
    "color",
    ".widget-head .widget-title"
  );
  kemet_responsive_slider(
    "kemet-settings[sidebar-content-font-size]",
    "#secondary .sidebar-main",
    "font-size"
  );
  /**
   * widget Title Border width
   */
  wp.customize("kemet-settings[widget-title-border-size]", function (value) {
    value.bind(function (border) {
      var dynamicStyle =
        ".widget .widget-head { border-bottom-width: " + border + "px }";
      dynamicStyle += "}";

      kemet_add_dynamic_css("widget-title-border-size", dynamicStyle);
    });
  });
  /**
   * widget Title Border width
   */
  wp.customize(
    "kemet-settings[footer-widget-title-border-size]",
    function (value) {
      value.bind(function (border) {
        var dynamicStyle =
          ".kemet-footer .widget .widget-head , .kmt-footer-copyright .widget .widget-head { border-bottom-width: " +
          border +
          "px }";
        dynamicStyle += "}";

        kemet_add_dynamic_css("footer-widget-title-border-size", dynamicStyle);
      });
    }
  );
  /**
   * widget Title Border color
   */
  wp.customize("kemet-settings[widget-title-border-color]", function (value) {
    value.bind(function (color) {
      if (color == "") {
        wp.customize.preview.send("refresh");
      }

      if (color) {
        var dynamicStyle =
          ".widget .widget-head { border-bottom-color: " + color + "; } ";

        kemet_add_dynamic_css("widget-title-border-color", dynamicStyle);
      }
    });
  });
  wp.customize("kemet-settings[widget-list-border-color]", function (value) {
    value.bind(function (color) {
      if (color == "") {
        wp.customize.preview.send("refresh");
      }

      var dynamicStyle =
        "#secondary .widget ul > li ,.kfw-widget-posts-list .kmt-wdg-posts-list li, .tweets-container>div:not(:last-child) { border-bottom-color: " +
        color +
        "; } ";
      dynamicStyle +=
        ".widget_shopping_cart .total{ border-color: " + color + "; }";
      kemet_add_dynamic_css("widget-list-border-color", dynamicStyle);
    });
  });
  /**
   * Widget Title Font
   */
  kemet_css(
    "kemet-settings[footer-wgt-title-text-transform]",
    "text-transform",
    ".kemet-footer .widget-head .widget-title, .kmt-footer-copyright .widget-head .widget-title"
  );
  kemet_css(
    "kemet-settings[footer-wgt-title-font-style]",
    "font-style",
    ".kemet-footer .widget-head .widget-title, .kmt-footer-copyright .widget-head .widget-title"
  );
  kemet_responsive_slider(
    "kemet-settings[footer-wgt-title-line-height]",
    ".kemet-footer .widget-head .widget-title , .kmt-footer-copyright .widget-head .widget-title",
    "line-height"
  );
  kemet_css(
    "kemet-settings[footer-wgt-bg-color]",
    "background-color",
    ".kemet-footer .widget , .kmt-footer-copyright .widget"
  );
  kemet_css(
    "kemet-settings[footer-wgt-title-separator-color]",
    "border-color",
    ".kemet-footer .widget .widget-head , .kmt-footer-copyright .widget .widget-head"
  );
  // Footer Bar.
  kemet_css("kemet-settings[footer-color]", "color", ".kmt-footer-copyright");
  kemet_css(
    "kemet-settings[copyright-link-color]",
    "color",
    ".kmt-footer-copyright a"
  );
  kemet_css(
    "kemet-settings[copyright-link-h-color]",
    "color",
    ".kmt-footer-copyright a:hover"
  );
  kemet_css(
    "kemet-settings[font-color-entry-title]",
    "color",
    ".kmt-single-post .entry-header .entry-title, .page-title"
  );
  kemet_css(
    "kemet-settings[single-post-meta-color]",
    "color",
    ".kmt-single-post .entry-meta,.kmt-single-post  .entry-meta *"
  );
  kemet_responsive_spacing(
    "kemet-settings[comment-button-spacing]",
    ".comments-area .form-submit input#submit",
    "margin",
    ["top", "bottom", "right", "left"]
  );
  wp.customize(
    "kemet-settings[footer-widget-list-border-color]",
    function (value) {
      value.bind(function (color) {
        if (color == "") {
          wp.customize.preview.send("refresh");
        }

        var dynamicStyle =
          ".kemet-footer .widget ul > li , .kmt-footer-copyright .widget ul > li { border-bottom-color: " +
          color +
          "; } ";
        dynamicStyle +=
          ".kemet-footer .woocommerce .widget_shopping_cart .total,.kemet-footer .woocommerce.widget_shopping_cart .total, .kmt-footer-copyright .woocommerce .widget_shopping_cart .total, .	kmt-footer-copyright .woocommerce.widget_shopping_cart .total{ border-color: " +
          color +
          "; }";
        kemet_add_dynamic_css("footer-widget-list-border-color", dynamicStyle);
      });
    }
  );
  wp.customize("kemet-settings[footer-bar-bg-obj]", function (value) {
    value.bind(function (bg_obj) {
      var dynamicStyle =
        " .kmt-footer-copyright > .kmt-footer-copyright-content { {{css}} }";

      kemet_background_obj_css(
        wp.customize,
        bg_obj,
        "footer-bar-bg-obj",
        dynamicStyle
      );
    });
  });
  kemet_responsive_spacing(
    "kemet-settings[footer-bar-padding]",
    ".kmt-footer-copyright .kmt-footer-copyright-content",
    "padding",
    ["top", "bottom", "right", "left"]
  );
  // Footer Font
  kemet_css(
    "kemet-settings[footer-text-transform]",
    "text-transform",
    ".kemet-footer"
  );
  kemet_css("kemet-settings[footer-font-style]", "font-style", ".kemet-footer");
  kemet_responsive_slider(
    "kemet-settings[footer-line-height]",
    ".kemet-footer",
    "line-height"
  );
  kemet_responsive_slider(
    "kemet-settings[footer-font-size]",
    ".kemet-footer",
    "font-size"
  );

  // Footer Widgets.
  kemet_css(
    "kemet-settings[footer-wgt-title-color]",
    "color",
    ".kemet-footer .widget-head .widget-title, .kemet-footer .widget-head .widget-title a , .kmt-footer-copyright .widget-head .widget-title, .kmt-footer-copyright .widget-head .widget-title a"
  );
  kemet_css("kemet-settings[footer-text-color]", "color", ".site-footer");
  kemet_css(
    "kemet-settings[footer-widget-meta-color]",
    "color",
    ".kemet-footer .post-date"
  );
  wp.customize("kemet-settings[footer-bg-obj]", function (value) {
    value.bind(function (bg_obj) {
      var dynamicStyle = " .kemet-footer-overlay { {{css}} }";

      kemet_background_obj_css(
        wp.customize,
        bg_obj,
        "footer-bg-obj",
        dynamicStyle
      );
    });
  });
  var footerBtn =
      ".kemet-footer button, .kemet-footer .button, .kemet-footer a.button, .kemet-footer .kmt-button,.kemet-footer .button, .kemet-footer .button, .kemet-footer input#submit, .kemet-footer input[type=button], .kemet-footer input[type=submit], .kemet-footer input[type=reset]",
    footerBtnHover =
      '.kemet-footer button:focus, .kemet-footer button:hover, .kemet-footer .kmt-button:hover, .kemet-footer .button:hover, .kemet-footer a.button:hover, .kemet-footer input[type=reset]:hover, .kemet-footer input[type=reset]:focus, .kemet-footer input#submit:hover, .kemet-footer input#submit:focus, .kemet-footer input[type="button"]:hover, .kemet-footer input[type="button"]:focus, .kemet-footer input[type="submit"]:hover, .kemet-footer input[type="submit"]:focus';
  kemet_css("kemet-settings[footer-button-color]", "color", footerBtn);
  kemet_css("kemet-settings[footer-button-h-color]", "color", footerBtnHover);
  kemet_css(
    "kemet-settings[footer-button-bg-color]",
    "background-color",
    footerBtn
  );
  kemet_css(
    "kemet-settings[footer-button-bg-h-color]",
    "background-color",
    footerBtnHover
  );
  /**
   * Footer Button Border Radius
   */
  kemet_responsive_slider(
    "kemet-settings[footer-button-radius]",
    footerBtn,
    "border-radius"
  );
  kemet_responsive_slider(
    "kemet-settings[footer-button-border-width]",
    footerBtn,
    "border-width"
  );
  kemet_css(
    "kemet-settings[footer-button-border-color]",
    "border-color",
    footerBtn
  );
  kemet_css(
    "kemet-settings[footer-button-border-h-color]",
    "border-color",
    footerBtnHover
  );
  kemet_responsive_slider(
    "kemet-settings[footer-input-border-radius]",
    '.kemet-footer input,.kemet-footer input[type="text"],.kemet-footer input[type="email"],.kemet-footer input[type="url"],.kemet-footer input[type="password"],.kemet-footer input[type="reset"],.kemet-footer input[type="search"],.kemet-footer textarea',
    "border-radius"
  );
  kemet_responsive_slider(
    "kemet-settings[footer-input-border-size]",
    '.kemet-footer input,.kemet-footer input[type="text"],.kemet-footer input[type="email"],.kemet-footer input[type="url"],.kemet-footer input[type="password"],.kemet-footer input[type="reset"],.kemet-footer input[type="search"],.kemet-footer textarea',
    "border-width"
  );
  kemet_responsive_spacing(
    "kemet-settings[footer-widget-input-padding]",
    '.kemet-footer input,.kemet-footer input[type="text"],.kemet-footer input[type="email"],.kemet-footer input[type="url"],.kemet-footer input[type="password"],.kemet-footer input[type="reset"],.kemet-footer input[type="search"],.kemet-footer textarea',
    "padding",
    ["top", "bottom", "right", "left"]
  );
  /*
   * Woocommerce Shop Archive Custom Width
   */
  wp.customize("kemet-settings[shop-archive-max-width]", function (setting) {
    setting.bind(function (width) {
      var dynamicStyle = "@media all and ( min-width: 921px ) {";

      dynamicStyle +=
        ".kmt-woo-shop-archive .site-content > .kmt-container{ max-width: " +
        parseInt(width) +
        "px } ";

      if (jQuery("body").hasClass("kmt-fluid-width-layout")) {
        dynamicStyle +=
          ".kmt-woo-shop-archive .site-content > .kmt-container{ padding-left:20px; padding-right:20px; } ";
      }
      dynamicStyle += "}";
      kemet_add_dynamic_css("shop-archive-max-width", dynamicStyle);
    });
  });
  //Input
  //Input
  $inputs_selectors =
    'input, input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="reset"], input[type="search"], textarea, select, .widget_search .search-field, .widget_search .search-field:focus, .kmt-single-post .wpcf7 input:not([type=submit]), .kmt-single-post .wpcf7 input:not([type=submit]):focus, .kmt-single-post .wpcf7 select:focus, .kmt-single-post .wpcf7 textarea:focus';
  kemet_responsive_slider(
    "kemet-settings[inputs-font-size]",
    $inputs_selectors,
    "font-size"
  );
  kemet_responsive_slider(
    "kemet-settings[inputs-line-height]",
    $inputs_selectors,
    "line-height"
  );
  kemet_responsive_slider(
    "kemet-settings[inputs-letter-spacing]",
    $inputs_selectors,
    "letter-spacing"
  );
  kemet_css(
    "kemet-settings[inputs-text-transform]",
    "text-transform",
    $inputs_selectors
  );
  kemet_css(
    "kemet-settings[inputs-font-style]",
    "font-style",
    $inputs_selectors
  );
  kemet_responsive_slider(
    "kemet-settings[input-radius]",
    $inputs_selectors,
    "border-radius"
  );
  kemet_responsive_slider(
    "kemet-settings[input-border-size]",
    $inputs_selectors,
    "border-width"
  );
  kemet_css("kemet-settings[input-text-color]", "color", $inputs_selectors);
  kemet_css(
    "kemet-settings[input-bg-color]",
    "background-color",
    $inputs_selectors
  );
  kemet_css(
    "kemet-settings[input-border-color]",
    "border-color",
    $inputs_selectors
  );
  kemet_responsive_spacing(
    "kemet-settings[input-spacing]",
    $inputs_selectors,
    "padding",
    ["top", "bottom", "right", "left"]
  );
  kemet_css("kemet-settings[input-label-color]", "color", "form label");
  /**
   * widget background
   */
  kemet_css(
    "kemet-settings[widget-bg-color]",
    "background-color",
    ".kmt-separate-container.kmt-two-container #secondary div.widget , div.widget"
  );
  kemet_responsive_spacing(
    "kemet-settings[sidebar-padding]",
    "div.sidebar-main",
    "padding",
    ["top", "bottom", "right", "left"]
  );
  /**
   * sidebar Background
   */
  kemet_css("kemet-settings[sidebar-text-color]", "color", ".sidebar-main");
  kemet_css("kemet-settings[sidebar-link-color]", "color", ".sidebar-main a");
  kemet_css(
    "kemet-settings[sidebar-link-h-color]",
    "color",
    ".sidebar-main a:hover"
  );
  kemet_css(
    "kemet-settings[sidebar-input-color]",
    "color",
    '.sidebar-main input,.sidebar-main input[type="text"],.sidebar-main input[type="email"],.sidebar-main input[type="url"],.sidebar-main input[type="password"],.sidebar-main input[type="reset"],.sidebar-main input[type="search"],.sidebar-main textarea ,.sidebar-main select'
  );
  wp.customize("kemet-settings[sidebar-bg-obj]", function (value) {
    value.bind(function (bg_obj) {
      var dynamicStyle = " .sidebar-main { {{css}} }";

      kemet_background_obj_css(
        wp.customize,
        bg_obj,
        "sidebar-bg-obj",
        dynamicStyle
      );
    });
  });
  /**
   * sidebar input backgroundcolor
   */
  wp.customize("kemet-settings[sidebar-input-bg-color]", function (value) {
    value.bind(function (bg_obj) {
      var dynamicStyle =
        '.sidebar-main input,.sidebar-main input[type="text"],.sidebar-main input[type="email"],.sidebar-main input[type="url"],.sidebar-main input[type="password"],.sidebar-main input[type="reset"],.sidebar-main input[type="search"],.sidebar-main textarea ,.sidebar-main select { {{css}} }';

      kemet_background_obj_css(
        wp.customize,
        bg_obj,
        "sidebar-input-bg-color",
        dynamicStyle
      );
    });
  });
  /**
   * sidebar input border color
   */
  wp.customize("kemet-settings[sidebar-input-border-color]", function (value) {
    value.bind(function (border_color) {
      jQuery(
        '.sidebar-main input,.sidebar-main input[type="text"],.sidebar-main input[type="email"],.sidebar-main input[type="url"],.sidebar-main input[type="password"],.sidebar-main input[type="reset"],.sidebar-main input[type="search"],.sidebar-main textarea ,.sidebar-main select'
      ).css("border-color", border_color);
    });
  });
  /**
   * Content Text Color
   */
  kemet_css(
    "kemet-settings[listing-post-title-hover-color]",
    "color",
    ".content-area .entry-title a:hover"
  );
  kemet_css(
    "kemet-settings[main-entry-content-color]",
    "color",
    ".content-area .entry-content"
  );
  kemet_css("kemet-settings[content-text-color]", "color", ".entry-content");
  wp.customize("kemet-settings[listing-post-meta-color]", function (value) {
    value.bind(function (color) {
      var dynamicStyle =
        ".blog-posts-container .entry-meta * { color: " + color + "; } ";
      dynamicStyle +=
        ".blog-posts-container .entry-meta { color: " + color + "; } ";
      kemet_add_dynamic_css("listing-post-meta-color", dynamicStyle);
    });
  });
  //Content Link Color
  kemet_css("kemet-settings[content-link-color]", "color", ".entry-content a");
  /**
   * Content link Hover Color
   */
  kemet_css(
    "kemet-settings[content-link-h-color]",
    "color",
    ".entry-content a:not(.button):hover"
  );
  /**
   * Listing Post
   */
  kemet_responsive_spacing(
    "kemet-settings[pagination-padding]",
    ".site-content .kmt-pagination",
    "padding",
    ["top", "bottom", "right", "left"]
  );
  kemet_css(
    "kemet-settings[listing-post-title-color]",
    "color",
    ".content-area .entry-title a"
  );
  kemet_css(
    "kemet-settings[readmore-text-color]",
    "color",
    ".content-area .read-more a"
  );
  kemet_css(
    "kemet-settings[readmore-text-h-color]",
    "color",
    ".content-area .read-more a:hover"
  );
  kemet_responsive_spacing(
    "kemet-settings[readmore-padding]",
    "body .content-area .read-more a",
    "padding",
    ["top", "bottom", "right", "left"]
  );
  kemet_css(
    "kemet-settings[readmore-bg-color]",
    "background-color",
    ".content-area .read-more a"
  );
  kemet_css(
    "kemet-settings[readmore-bg-h-color]",
    "background-color",
    ".content-area .read-more a:hover"
  );
  kemet_responsive_slider(
    "kemet-settings[read-more-border-size]",
    ".content-area .read-more a",
    "border-width"
  );

  kemet_responsive_slider(
    "kemet-settings[read-more-border-radius]",
    ".content-area .read-more a",
    "border-radius"
  );

  wp.customize("kemet-settings[readmore-border-color]", function (value) {
    value.bind(function (border_color) {
      var dynamicStyle =
        ".content-area .read-more a { border-color: " + border_color + "; } ";

      kemet_add_dynamic_css("readmore-border-color", dynamicStyle);
    });
  });
  wp.customize("kemet-settings[readmore-border-h-color]", function (value) {
    value.bind(function (color) {
      if (color == "") {
        wp.customize.preview.send("refresh");
      }

      if (color) {
        var dynamicStyle =
          ".content-area .read-more a:hover { border-color: " + color + "; } ";

        kemet_add_dynamic_css("readmore-border-h-color", dynamicStyle);
      }
    });
  });
  kemet_responsive_slider(
    "kemet-settings[footer-copyright-font-size]",
    ".kmt-footer-copyright",
    "font-size"
  );
  //Letter Spacing
  kemet_responsive_slider(
    "kemet-settings[site-title-letter-spacing]",
    ".site-title a",
    "letter-spacing"
  );
  kemet_responsive_slider(
    "kemet-settings[tagline-letter-spacing]",
    ".site-description",
    "letter-spacing"
  );
  kemet_responsive_slider(
    "kemet-settings[menu-letter-spacing]",
    ".main-header-menu a",
    "letter-spacing"
  );
  kemet_responsive_slider(
    "kemet-settings[submenu-letter-spacing]",
    ".main-header-menu .sub-menu li a",
    "letter-spacing"
  );
  kemet_responsive_slider(
    "kemet-settings[footer-widget-title-letter-spacing]",
    ".kemet-footer .widget-head .widget-title , .kmt-footer-copyright .widget-head .widget-title",
    "letter-spacing"
  );
  kemet_responsive_slider(
    "kemet-settings[footer-letter-spacing]",
    ".kemet-footer",
    "letter-spacing"
  );
  kemet_responsive_slider(
    "kemet-settings[footer-copyright-letter-spacing]",
    ".kmt-footer-copyright",
    "letter-spacing"
  );
  kemet_responsive_slider(
    "kemet-settings[letter-spacing-h1]",
    "h1, .entry-content h1, .entry-content h1 a",
    "letter-spacing"
  );
  kemet_responsive_slider(
    "kemet-settings[letter-spacing-h2]",
    "h2, .entry-content h2, .entry-content h2 a",
    "letter-spacing"
  );
  kemet_responsive_slider(
    "kemet-settings[letter-spacing-h3]",
    "h3, .entry-content h3, .entry-content h3 a",
    "letter-spacing"
  );
  kemet_responsive_slider(
    "kemet-settings[letter-spacing-h4]",
    "h4, .entry-content h4, .entry-content h4 a",
    "letter-spacing"
  );
  kemet_responsive_slider(
    "kemet-settings[letter-spacing-h5]",
    "h5, .entry-content h5, .entry-content h5 a",
    "letter-spacing"
  );
  kemet_responsive_slider(
    "kemet-settings[letter-spacing-h6]",
    "h1, .entry-content h6, .entry-content h6 a",
    "letter-spacing"
  );
  kemet_responsive_slider(
    "kemet-settings[widget-title-letter-spacing]",
    ".widget .widget-head .widget-title",
    "letter-spacing"
  );
  kemet_responsive_slider(
    "kemet-settings[letter-spacing-page-title]",
    ".blog-posts-container .entry-title",
    "letter-spacing"
  );
  kemet_responsive_slider(
    "kemet-settings[letter-spacing-entry-title]",
    ".kmt-single-post .entry-header .entry-title",
    "letter-spacing"
  );
  /*
   * Woocommerce
   */
  /**
   * Product Title
   */
  kemet_responsive_slider(
    "kemet-settings[letter-spacing-product-title]",
    ".woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title",
    "letter-spacing"
  );
  kemet_css(
    "kemet-settings[product-title-text-color]",
    "color",
    ".woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title"
  );
  kemet_css(
    "kemet-settings[product-title-text-transform]",
    "text-transform",
    ".woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title"
  );
  kemet_css(
    "kemet-settings[product-title-font-style]",
    "font-style",
    ".woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title"
  );
  kemet_responsive_slider(
    "kemet-settings[product-title-line-height]",
    ".woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce-page ul.products li.product .woocommerce-loop-product__title",
    "line-height"
  );
  /**
   * Product Content
   */
  kemet_responsive_slider(
    "kemet-settings[letter-spacing-product-content]",
    ".woocommerce ul.products li.product .kmt-woo-product-category, .woocommerce-page ul.products li.product .kmt-woo-product-category, .woocommerce ul.products li.product .kmt-woo-shop-product-description, .woocommerce-page ul.products li.product .kmt-woo-shop-product-description",
    "letter-spacing"
  );
  kemet_css(
    "kemet-settings[product-content-text-color]",
    "color",
    ".woocommerce ul.products li.product .kmt-woo-product-category, .woocommerce-page ul.products li.product .kmt-woo-product-category, .woocommerce ul.products li.product .kmt-woo-shop-product-description, .woocommerce-page ul.products li.product .kmt-woo-shop-product-description"
  );
  kemet_css(
    "kemet-settings[product-content-text-transform]",
    "text-transform",
    ".woocommerce ul.products li.product .kmt-woo-product-category, .woocommerce-page ul.products li.product .kmt-woo-product-category, .woocommerce ul.products li.product .kmt-woo-shop-product-description, .woocommerce-page ul.products li.product .kmt-woo-shop-product-description"
  );
  kemet_css(
    "kemet-settings[product-content-font-style]",
    "font-style",
    ".woocommerce ul.products li.product .kmt-woo-product-category, .woocommerce-page ul.products li.product .kmt-woo-product-category, .woocommerce ul.products li.product .kmt-woo-shop-product-description, .woocommerce-page ul.products li.product .kmt-woo-shop-product-description"
  );
  kemet_responsive_slider(
    "kemet-settings[product-content-line-height]",
    ".woocommerce ul.products li.product .kmt-woo-product-category, .woocommerce-page ul.products li.product .kmt-woo-product-category, .woocommerce ul.products li.product .kmt-woo-shop-product-description, .woocommerce-page ul.products li.product .kmt-woo-shop-product-description",
    "line-height"
  );
  /**
   * Product Price
   */
  kemet_responsive_slider(
    "kemet-settings[letter-spacing-product-price]",
    ".woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,.woocommerce ul.products li.product .price ins",
    "letter-spacing"
  );
  kemet_css(
    "kemet-settings[product-price-text-color]",
    "color",
    ".woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,.woocommerce ul.products li.product .price ins"
  );
  kemet_css(
    "kemet-settings[product-price-text-transform]",
    "text-transform",
    ".woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,.woocommerce ul.products li.product .price ins"
  );
  kemet_css(
    "kemet-settings[product-price-font-style]",
    "font-style",
    ".woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,.woocommerce ul.products li.product .price ins"
  );
  kemet_responsive_slider(
    "kemet-settings[product-price-line-height]",
    ".woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price,.woocommerce ul.products li.product .price ins",
    "line-height"
  );

  kemet_css(
    "kemet-settings[rating-color]",
    "color",
    ".woocommerce .star-rating, .woocommerce .comment-form-rating .stars a, .woocommerce .star-rating::before"
  );
  /**
   * DropDown
   */
  wp.customize("kemet-settings[cart-dropdown-width]", function (setting) {
    setting.bind(function (width) {
      var dynamicStyle =
        ".kmt-site-header-cart .widget_shopping_cart { width: " +
        parseInt(width) +
        "px }";

      kemet_add_dynamic_css("cart-dropdown-width", dynamicStyle);
    });
  });
  /**
   * Cart Icon Size
   */
  wp.customize("kemet-settings[cart-icon-size]", function (setting) {
    setting.bind(function (size) {
      var dynamicStyle =
        ".kmt-cart-menu-wrap .count.icon-cart:before , .kmt-cart-menu-wrap .count.icon-bag:before { font-size: " +
        parseInt(size) +
        "px }";

      kemet_add_dynamic_css("cart-icon-size", dynamicStyle);
    });
  });

  wp.customize(
    "kemet-settings[cart-icon-center-vertically]",
    function (setting) {
      setting.bind(function (top) {
        var dynamicStyle =
          ".kmt-cart-menu-wrap .count:before { top: " + parseInt(top) + "px }";

        kemet_add_dynamic_css("cart-icon-center-vertically", dynamicStyle);
      });
    }
  );

  wp.customize("kemet-settings[cart-dropdown-border-size]", function (setting) {
    setting.bind(function (border) {
      var dynamicStyle =
        ".kmt-site-header-cart .widget_shopping_cart { border-width: " +
        parseInt(border) +
        "px }";

      kemet_add_dynamic_css("cart-dropdown-border-size", dynamicStyle);
    });
  });

  wp.customize("kemet-settings[cart-dropdown-bg-color]", function (setting) {
    setting.bind(function (color) {
      var dynamicStyle =
        ".kmt-site-header-cart .widget_shopping_cart { background-color: " +
        color +
        " }";
      dynamicStyle +=
        ".kmt-site-header-cart .widget_shopping_cart:before, .kmt-site-header-cart .widget_shopping_cart:after { border-bottom-color: " +
        color +
        " }";
      kemet_add_dynamic_css("cart-dropdown-bg-color", dynamicStyle);
    });
  });
  kemet_css(
    "kemet-settings[cart-dropdown-border-color]",
    "border-color",
    ".kmt-site-header-cart .widget_shopping_cart"
  );

  wp.customize("kemet-settings[shop-cart-icon]", function (setting) {
    setting.bind(function (icon) {
      var $cart_icon = $(".kmt-cart-menu-wrap .count");
      $cart_icon.removeClass("icon-bag icon-cart");
      $cart_icon.addClass(icon);
    });
  });
})(jQuery);
