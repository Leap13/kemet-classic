function get_selector() {
  var prefix = "overlay-header",
    selector = ".kmt-" + prefix,
    enable = wp.customize._value[settingName(prefix + "-enable-device")]._value;

  if ("desktop" === enable) {
    selector = selector + ":not(.kmt-header-break-point)";
  } else if ("mobile" === enable) {
    selector = selector + ".kmt-header-break-point";
  }
  selector = selector + " #sitehead";
  return selector;
}

/**
 * Apply CSS for the element
 */
function kemet_custom_css(control, css_property, selector, unit) {
  wp.customize(control, function (value) {
    value.bind(function (new_value) {
      // Selector class.
      selector = selector.replaceAll("parent_selector", get_selector());
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

function kemet_custom_responsive_css(control, selector, type) {
  wp.customize(control, function (value) {
    value.bind(function (value) {
      var selectType = "color";
      selector = selector.replaceAll("parent_selector", get_selector());
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

(function ($) {
  var prefix = "overlay-header",
    menuSelector = "parent_selector .main-header-menu",
    searchSelector = "parent_selector .kmt-header-item-search",
    searchBoxSelector = "parent_selector .kmt-header-item-search-box",
    widgetSelector = "parent_selector .kmt-widget-area",
    htmlSelector = "parent_selector .kmt-custom-html";
  kemet_custom_responsive_css(
    settingName(prefix + "-bg-color"),
    "parent_selector .top-header-bar, parent_selector .main-header-bar, parent_selector .bottom-header-bar",
    "background-color"
  );
  // Menu
  kemet_custom_responsive_css(
    settingName(prefix + "-menu-bg-color"),
    menuSelector,
    "background-color"
  );
  kemet_custom_responsive_css(
    settingName(prefix + "-menu-link-color"),
    menuSelector + " > li > a",
    "color"
  );
  kemet_custom_responsive_css(
    settingName(prefix + "-menu-link-h-color"),
    menuSelector + " > li > a:hover",
    "color"
  );
  // Submenu
  kemet_custom_responsive_css(
    settingName(prefix + "-submenu-bg-color"),
    menuSelector + " > li ul > li > a",
    "background-color"
  );
  kemet_custom_responsive_css(
    settingName(prefix + "-submenu-link-color"),
    menuSelector + " > li ul > li > a",
    "color"
  );
  kemet_custom_responsive_css(
    settingName(prefix + "-submenu-link-h-color"),
    menuSelector + " > li ul > li > a:hover",
    "color"
  );
  kemet_custom_responsive_css(
    settingName(prefix + "-submenu-bg-h-color"),
    menuSelector + " > li ul > li > a:hover",
    "background-color"
  );
  // Search
  kemet_custom_css(
    settingName(prefix + "-search-icon-color"),
    "color",
    searchSelector + " .kemet-search-icon"
  );
  kemet_custom_css(
    settingName(prefix + "-search-icon-h-color"),
    "color",
    searchSelector + " .kemet-search-icon:hover"
  );
  kemet_custom_css(
    settingName(prefix + "-search-border-color"),
    "border-color",
    searchSelector + " .kmt-search-menu-icon form .search-field"
  );
  kemet_custom_css(
    settingName(prefix + "-search-bg-color"),
    "background-color",
    searchSelector + " form"
  );
  kemet_custom_css(
    settingName(prefix + "-search-input-bg-color"),
    "background-color",
    searchSelector + " .kmt-search-menu-icon form .search-field"
  );
  kemet_custom_css(
    settingName(prefix + "-search-text-color"),
    "color",
    searchSelector + " .kmt-search-menu-icon form .search-field"
  );
  // Search Box
  kemet_custom_css(
    settingName(prefix + "-search-box-icon-color"),
    "color",
    searchBoxSelector + " .kmt-search-box-form::after"
  );
  kemet_custom_css(
    settingName(prefix + "-search-box-icon-h-color"),
    "color",
    searchBoxSelector + " .kmt-search-box-form:hover::after"
  );
  kemet_custom_css(
    settingName(prefix + "-search-box-border-color"),
    "border-color",
    searchBoxSelector + " .kmt-search-box-form .search-field"
  );
  kemet_custom_css(
    settingName(prefix + "-search-box-bg-color"),
    "background-color",
    searchBoxSelector + " .kmt-search-box-form .search-field"
  );
  kemet_custom_css(
    settingName(prefix + "-search-box-text-color"),
    "color",
    searchBoxSelector + " .kmt-search-box-form .search-field"
  );
  // Html
  kemet_custom_responsive_css(
    settingName(prefix + "-html-text-color"),
    htmlSelector,
    "color"
  );
  kemet_custom_responsive_css(
    settingName(prefix + "-html-link-color"),
    htmlSelector + " a",
    "color"
  );
  kemet_custom_responsive_css(
    settingName(prefix + "-html-link-h-color"),
    htmlSelector + " a:hover",
    "color"
  );
  // Widgets
  kemet_custom_responsive_css(
    settingName(prefix + "-widget-title-color"),
    widgetSelector + " .widget-title",
    "color"
  );
  kemet_custom_responsive_css(
    settingName(prefix + "-widget-content-color"),
    widgetSelector + " .widget-content",
    "color"
  );
  kemet_custom_responsive_css(
    settingName(prefix + "-widget-link-color"),
    widgetSelector + " .widget-content a",
    "color"
  );
  kemet_custom_responsive_css(
    settingName(prefix + "-widget-link-h-color"),
    widgetSelector + " .widget-content a:hover",
    "color"
  );
})(jQuery);
