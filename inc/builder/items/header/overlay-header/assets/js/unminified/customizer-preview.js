(function ($) {
  var prefix = "overlay-header",
    selector = ".kmt-" + prefix + " #sitehead",
    menuSelector = selector + " .main-header-menu",
    searchSelector = selector + " .kmt-header-item-search",
    searchBoxSelector = selector + " .kmt-header-item-search-box",
    widgetSelector = selector + " .kmt-widget-area",
    htmlSelector = selector + " .kmt-custom-html";

  kemet_responsive_css(
    settingName(prefix + "-bg-color"),
    selector +
      " .top-header-bar, " +
      selector +
      " .main-header-bar, " +
      selector +
      " .bottom-header-bar",
    "background-color"
  );
  // Menu
  kemet_responsive_css(
    settingName(prefix + "-menu-bg-color"),
    menuSelector,
    "background-color"
  );
  kemet_responsive_css(
    settingName(prefix + "-menu-link-color"),
    menuSelector + " > li > a",
    "color"
  );
  kemet_responsive_css(
    settingName(prefix + "-menu-link-h-color"),
    menuSelector + " > li > a:hover",
    "color"
  );
  // Submenu
  kemet_responsive_css(
    settingName(prefix + "-submenu-bg-color"),
    menuSelector + " > li ul > li > a",
    "background-color"
  );
  kemet_responsive_css(
    settingName(prefix + "-submenu-link-color"),
    menuSelector + " > li ul > li > a",
    "color"
  );
  kemet_responsive_css(
    settingName(prefix + "-submenu-link-h-color"),
    menuSelector + " > li ul > li > a:hover",
    "color"
  );
  kemet_responsive_css(
    settingName(prefix + "-submenu-bg-h-color"),
    menuSelector + " > li ul > li > a:hover",
    "background-color"
  );
  // Search
  kemet_css(
    settingName(prefix + "-search-icon-color"),
    "color",
    searchSelector + " .kemet-search-icon"
  );
  kemet_css(
    settingName(prefix + "-search-icon-h-color"),
    "color",
    searchSelector + " .kemet-search-icon:hover"
  );
  kemet_css(
    settingName(prefix + "-search-border-color"),
    "border-color",
    searchSelector + " .kmt-search-menu-icon form .search-field"
  );
  kemet_css(
    settingName(prefix + "-search-bg-color"),
    "background-color",
    searchSelector + " form"
  );
  kemet_css(
    settingName(prefix + "-search-input-bg-color"),
    "background-color",
    searchSelector + " .kmt-search-menu-icon form .search-field"
  );
  kemet_css(
    settingName(prefix + "-search-text-color"),
    "color",
    searchSelector + " .kmt-search-menu-icon form .search-field"
  );
  // Search Box
  kemet_css(
    settingName(prefix + "-search-box-icon-color"),
    "color",
    searchBoxSelector + " .kmt-search-box-form::after"
  );
  kemet_css(
    settingName(prefix + "-search-box-icon-h-color"),
    "color",
    searchBoxSelector + " .kmt-search-box-form:hover::after"
  );
  kemet_css(
    settingName(prefix + "-search-box-border-color"),
    "border-color",
    searchBoxSelector + " .kmt-search-box-form .search-field"
  );
  kemet_css(
    settingName(prefix + "-search-box-bg-color"),
    "background-color",
    searchBoxSelector + " .kmt-search-box-form .search-field"
  );
  kemet_css(
    settingName(prefix + "-search-box-text-color"),
    "color",
    searchBoxSelector + " .kmt-search-box-form .search-field"
  );
  // Html
  kemet_responsive_css(
    settingName(prefix + "-html-text-color"),
    htmlSelector,
    "color"
  );
  kemet_responsive_css(
    settingName(prefix + "-html-link-color"),
    htmlSelector + " a",
    "color"
  );
  kemet_responsive_css(
    settingName(prefix + "-html-link-h-color"),
    htmlSelector + " a:hover",
    "color"
  );
  // Widgets
  kemet_responsive_css(
    settingName(prefix + "-widget-title-color"),
    widgetSelector + " .widget-title",
    "color"
  );
  kemet_responsive_css(
    settingName(prefix + "-widget-content-color"),
    widgetSelector + " .widget-content",
    "color"
  );
  kemet_responsive_css(
    settingName(prefix + "-widget-link-color"),
    widgetSelector + " .widget-content a",
    "color"
  );
  kemet_responsive_css(
    settingName(prefix + "-widget-link-h-color"),
    widgetSelector + " .widget-content a:hover",
    "color"
  );
})(jQuery);
