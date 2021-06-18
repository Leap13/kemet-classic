(function ($) {
  var prefix = "search-box",
    selector = ".kmt-search-box-form .search-field";

  kemet_css(
    settingName(prefix + "-text-color"),
    "color",
    selector + ", .kmt-search-box-form::after"
  );
  kemet_css(settingName(prefix + "-bg-color"), "background-color", selector);
  kemet_css(settingName(prefix + "-border-color"), "border-color", selector);
  kemet_responsive_slider(
    settingName(prefix + "-border-width"),
    selector,
    "border-width"
  );
  kemet_responsive_slider(settingName(prefix + "-width"), selector, "width");
  typography_css(prefix, selector);
})(jQuery);
