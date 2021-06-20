(function ($) {
  var prefix = "main-header",
    selector = ".kmt-main-header-wrap .main-header-bar";

  wp.customize(settingName(prefix + "-min-height"), function (value) {
    value.bind(function (value) {
      var spacingType = "min-height";
      var selectorRow = selector + " .kmt-grid-row";
      var control = settingName(prefix + "-min-height");
      var type = "min-height";

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
            selectorRow +
            "	{ " +
            desktopWidth +
            " }" +
            "@media (max-width: 768px) {" +
            selectorRow +
            "	{ " +
            tabletWidth +
            " } }" +
            "@media (max-width: 544px) {" +
            selectorRow +
            "	{ " +
            mobileWidth +
            " } }" +
            "</style>"
        );
      } else {
        wp.customize.preview.send("refresh");
        jQuery("style#" + control + "-" + spacingType).remove();
      }
      document.dispatchEvent(new CustomEvent("kmtHeaderBarHeightChanged"));
    });
  });
  kemet_responsive_spacing(
    settingName(prefix + "-border-width"),
    selector,
    "border",
    ["top", "bottom", "right", "left"]
  );
  kemet_css(settingName(prefix + "-border-color"), "border-color", selector);
  wp.customize(settingName(prefix + "-background"), function (value) {
    value.bind(function (bg_obj) {
      var dynamicStyle = selector + " { {{css}} }";

      kemet_background_obj_css(
        wp.customize,
        bg_obj,
        prefix + "-background",
        dynamicStyle
      );
    });
  });
  wp.customize(settingName(prefix + "-sticky-background"), function (value) {
    value.bind(function (bg_obj) {
      var dynamicStyle = selector + ".kmt-is-sticky { {{css}} }";

      kemet_background_obj_css(
        wp.customize,
        bg_obj,
        prefix + "-sticky-background",
        dynamicStyle
      );
    });
  });
})(jQuery);
