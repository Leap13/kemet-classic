(function ($) {
  var prefix = "offcanvas-menu",
    selector = "#" + prefix;

  kemet_responsive_css(
    settingName(prefix + "-link-bg-color"),
    selector + " li > a, " + selector + " li > .kmt-menu-item-wrap",
    "background-color"
  );
  kemet_responsive_css(
    settingName(prefix + "-link-color"),
    selector + " li > a, " + selector + " li > .kmt-menu-item-wrap",
    "color"
  );
  kemet_responsive_css(
    settingName(prefix + "-link-border-color"),
    selector + " li > a, " + selector + " li > .kmt-menu-item-wrap",
    "border-bottom-color"
  );
  kemet_responsive_css(
    settingName(prefix + "-link-h-bg-color"),
    selector + " li > a:hover, " + selector + " li > .kmt-menu-item-wrap:hover",
    "background-color"
  );
  kemet_responsive_css(
    settingName(prefix + "-link-h-color"),
    selector + " li > a:hover, " + selector + " li > .kmt-menu-item-wrap:hover",
    "color"
  );
  kemet_responsive_css(
    settingName(prefix + "-link-h-border-color"),
    selector + " li > a:hover, " + selector + " li > .kmt-menu-item-wrap:hover",
    "border-bottom-color"
  );

  kemet_responsive_css(
    settingName(prefix + "-submenu-link-bg-color"),
    selector +
    " > li ul > li > a, " +
    selector +
    " > li ul > li > .kmt-menu-item-wrap",
    "background-color"
  );
  kemet_responsive_css(
    settingName(prefix + "-submenu-link-color"),
    selector +
    " > li ul > li > a, " +
    selector +
    " > li ul > li > .kmt-menu-item-wrap",
    "color"
  );
  kemet_responsive_css(
    settingName(prefix + "-submenu-link-border-color"),
    selector +
    " > li ul > li > a, " +
    selector +
    " > li ul > li > .kmt-menu-item-wrap",
    "border-bottom-color"
  );
  kemet_responsive_css(
    settingName(prefix + "-submenu-link-h-bg-color"),
    selector +
    " > li ul > li > a:hover, " +
    selector +
    " > li ul > li > .kmt-menu-item-wrap:hover",
    "background-color"
  );
  kemet_responsive_css(
    settingName(prefix + "-submenu-link-h-color"),
    selector +
    " > li ul > li > a:hover, " +
    selector +
    " > li ul > li > .kmt-menu-item-wrap:hover",
    "color"
  );
  kemet_responsive_css(
    settingName(prefix + "-submenu-link-h-border-color"),
    selector +
    " > li ul > li > a:hover, " +
    selector +
    " > li ul > li > .kmt-menu-item-wrap:hover",
    "border-bottom-color"
  );

  kemet_slider(
    settingName(prefix + "-border-bottom-width"),
    selector + " li > a, " + selector + " li > .kmt-menu-item-wrap",
    "border-bottom-width"
  );
  kemet_responsive_spacing(
    settingName(prefix + "-item-spacing"),
    selector + " li > a",
    "padding",
    ["top", "bottom", "right", "left"]
  );
  typography_css(
    prefix,
    selector + " li > a, " + selector + " li > .kmt-menu-item-wrap"
  );
  typography_css(
    prefix + "-submenu",
    selector +
    " > li ul > li > a, " +
    selector +
    " > li ul > li > .kmt-menu-item-wrap"
  );
})(jQuery);
