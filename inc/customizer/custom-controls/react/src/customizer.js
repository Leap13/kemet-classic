(function ($, api) {
  var $window = $(window),
    $body = $("body");
  var expandedPanel = "";
  api.bind("ready", function () {
    /**
     * Resize Preview Frame when show / hide Builder.
     */
    const resizePreviewer = function () {
      var section = $(".control-section.kmt-header-builder-active");
      var footer = $(".control-section.kmt-footer-builder-active");
      var sidebar_widgets = $("#available-widgets");
      sidebar_widgets.css("bottom", "289px");

      if (
        $body.hasClass("kmt-header-builder-is-active") ||
        $body.hasClass("kmt-footer-builder-is-active")
      ) {
        if (
          $body.hasClass("kmt-footer-builder-is-active") &&
          0 < footer.length &&
          !footer.hasClass("kmt-builder-hide")
        ) {
          api.previewer.container.css("bottom", footer.outerHeight() + "px");
        } else if (
          $body.hasClass("kmt-header-builder-is-active") &&
          0 < section.length &&
          !section.hasClass("kmt-builder-hide")
        ) {
          sidebar_widgets.css("bottom", "289px");
          api.previewer.container.css({
            bottom: section.outerHeight() + "px",
          });
        } else {
          sidebar_widgets.css("bottom", "46px");
          api.previewer.container.css("bottom", "");
        }
      } else {
        api.previewer.container.css("bottom", "");
      }

      section.css("overflow", "visible");
      footer.css("overflow", "visible");
    };
    /**
     * Init Kemet Header & Footer Builder
     */
    const initKmtBuilderPanel = function (panel) {
      let builderType = panel.id.includes("-header-") ? "header" : "footer";
      var section = api.section("section-" + builderType + "-builder");

      if (undefined !== section) {
        var $section = section.contentContainer,
          section_layout = api.section("section-" + builderType);
        panel.expanded.bind(function (isExpanded) {
          Promise.all([
            _.each(section.controls(), function (control) {
              if ("resolved" === control.deferred.embedded.state()) {
                return;
              }
              control.renderContent();
              control.deferred.embedded.resolve(); // This triggers control.ready().

              // Fire event after control is initialized.
              control.container.trigger("init");
            }),
            _.each(section_layout.controls(), function (control) {
              if ("resolved" === control.deferred.embedded.state()) {
                return;
              }
              control.renderContent();
              control.deferred.embedded.resolve(); // This triggers control.ready().

              // Fire event after control is initialized.
              control.container.trigger("init");
            }),
          ]).then(function () {
            resizePreviewer();
          });

          if (isExpanded) {
            expandedPanel = panel.id;
            $body.addClass("kmt-" + builderType + "-builder-is-active");
            $section.addClass("kmt-" + builderType + "-builder-active");
            $(
              "#sub-accordion-panel-" + expandedPanel + " li.control-section"
            ).hide();

            if ("header" === builderType) {
              $("#sub-accordion-section-section-footer-builder").css(
                "overflow",
                "hidden"
              );
            } else {
              $("#sub-accordion-section-section-header-builder").css(
                "overflow",
                "hidden"
              );
            }
          } else {
            $("#sub-accordion-section-section-footer-builder").css(
              "overflow",
              "hidden"
            );
            $("#sub-accordion-section-section-header-builder").css(
              "overflow",
              "hidden"
            );

            // api.state("kemet-customizer-tab").set("general");
            $body.removeClass("kmt-" + builderType + "-builder-is-active");
            $section.removeClass("kmt-" + builderType + "-builder-active");
          }
        });
      }
    };
    api.panel("panel-header-builder-group", initKmtBuilderPanel);
    // api.panel("panel-footer-builder-group", initKmtBuilderPanel);
  });
})(jQuery, wp.customize);
