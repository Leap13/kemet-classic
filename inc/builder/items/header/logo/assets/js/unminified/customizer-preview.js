(function ($) {
  kemet_responsive_slider(
    "kemet-settings[site-title-font-size]",
    ".site-title",
    "font-size"
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
    "kemet-settings[font-size-site-tagline]",
    ".site-header .site-description",
    "font-size"
  );
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
  kemet_responsive_spacing(
    "kemet-settings[site-identity-spacing]",
    "#sitehead.site-header:not(.kmt-is-sticky) .kmt-site-identity",
    "padding",
    ["top", "right", "bottom", "left"]
  );
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
})(jQuery);