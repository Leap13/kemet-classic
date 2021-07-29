(function ($) {
  var prefix = "search",
    parentSelector = ".kmt-header-item-search",
    selector = ".kmt-search-menu-icon form .search-field";

  kemet_slider(
    settingName(prefix + "-icon-size"),
    parentSelector + " .kemet-search-icon",
    "font-size"
  );
  kemet_css(
    settingName(prefix + "-icon-color"),
    "color",
    parentSelector + " .kemet-search-icon"
  );
  kemet_css(
    settingName(prefix + "-icon-h-color"),
    "color",
    parentSelector + " .kemet-search-icon:hover"
  );
  kemet_css(
    settingName(prefix + "-form-bg-color"),
    "background-color",
    parentSelector + " form"
  );
  kemet_css(settingName(prefix + "-input-text-color"), "color", selector);
  kemet_css(
    settingName(prefix + "-input-bg-color"),
    "background-color",
    selector
  );
  kemet_css(
    settingName(prefix + "-input-border-color"),
    "border-color",
    selector
  );
  kemet_slider(
    settingName(prefix + "-input-width"),
    selector,
    "width"
  );
  typography_css(prefix, selector);
})(jQuery);
