import { isDisplay, getSetting, getSettingId } from './options/options-component'
import { kemetGetResponsiveJs } from './common/responsive-helper';
(function ($, api) {
  var $window = $(window),
    $body = $("body");
  var expandedPanel = "";
  api.bind("ready", function () {
    // Set handler when custom responsive toggle is clicked.
    $("#customize-theme-controls").on(
      "click",
      ".kmt-build-tabs-button",
      function (e) {
        e.preventDefault();
        var device = $(this).data("device");
        api.previewedDevice.set(device);
        jQuery('.wp-full-overlay-footer .devices button[data-device="' + device + '"]').trigger('click');
      }
    );

    // Set all custom responsive toggles and fieldsets.
    var setBuilderResponsiveDisplay = function () {
      var device = api.previewedDevice.get(),
        $tabs = $(".kmt-build-tabs-button.nav-tab");
      $tabs
        .removeClass("nav-tab-active")
        .filter(".preview-" + device)
        .addClass("nav-tab-active");
    };
    // Refresh all responsive elements when previewedDevice is changed.
    api.previewedDevice.bind(setBuilderResponsiveDisplay);

    // Controls preivew
    var setOptionsResponsiveButtons = function () {
      kemetGetResponsiveJs();
    }
    // Refresh all responsive elements when previewedDevice is changed.
    api.previewedDevice.bind(setOptionsResponsiveButtons);
    // Refresh all responsive elements when any section is expanded.
    // This is required to set responsive elements on newly added controls inside the section.
    api.section.each(function (section) {
      section.expanded.bind(setBuilderResponsiveDisplay);
    });

    /**
     * Resize Preview Frame when show / hide Builder.
     */
    const resizePreviewer = function () {
      var section = $(".control-section.kmt-header-builder-active");
      var footer = $(".control-section.kmt-footer-builder-active");

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
          api.previewer.container.css({
            bottom: section.outerHeight() + "px",
          });
        } else {
          api.previewer.container.css("bottom", "");
        }
      } else {
        api.previewer.container.css("bottom", "");
      }
    };

    $window.on("resize", resizePreviewer);

    api.previewedDevice.bind(function (device) {
      api.previewer.container.css({ bottom: "0px" });
      resizePreviewer();
    });

    /**
     * Init Kemet Header & Footer Builder
     */
    const initKmtBuilderPanel = function (panel) {
      let builderType = panel.id.includes("-header-") ? "header" : "footer";
      let section = api.section("section-" + builderType + "-builder");

      if (undefined !== section) {
        var $section = section.contentContainer,
          section_layout = api.section(
            "section-" + builderType + "-builder-layout"
          );

        panel.expanded.bind(function (isExpanded) {
          let options = $.merge(section.controls(), section_layout.controls());
          if (isExpanded) {
            _.each(options, function (control) {
              document.dispatchEvent(new CustomEvent("kmtExpandedBuilder", {
                detail: { control, isExpanded: true }
              }));
            })
          } else {
            _.each(options, function (control) {
              document.dispatchEvent(new CustomEvent("kmtExpandedBuilder", {
                detail: { control, isExpanded: false }
              }));
            })
          }
          Promise.all([
            _.each(section.controls(), function (control) {
              if ("resolved" === control.deferred.embedded.state()) {
                return;
              }
              if (isExpanded) {
                $body.addClass("kmt-" + builderType + "-builder-is-active");
                $section.addClass("kmt-" + builderType + "-builder-active");
                $section.css("display", "none").height();
                $section.css("display", "block");
              } else {
                $body.removeClass("kmt-" + builderType + "-builder-is-active");
                $section.removeClass("kmt-" + builderType + "-builder-active");
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
          } else {
            $body.removeClass("kmt-" + builderType + "-builder-is-active");
            $section.removeClass("kmt-" + builderType + "-builder-active");
          }
        });
      }
      $section.on("click", ".kmt-builder-tab-toggle", function (e) {
        e.preventDefault();
        api.previewer.container.css({ bottom: "0" });
        setTimeout(function () {
          $section.toggleClass("kmt-builder-hide");
          resizePreviewer();
        }, 120);
      });
    };
    api.panel("panel-header-builder-group", initKmtBuilderPanel);
    api.panel("panel-footer-builder-group", initKmtBuilderPanel);
  });

  // Default contexts
  if (KemetCustomizerData && KemetCustomizerData.contexts) {
    const context = KemetCustomizerData.contexts;
    let mobileLogo = getSettingId('kmt-header-mobile-logo');
    const setupControl = (element) => {
      const rules = context[element.id];
      var setActiveState = function () {
        if (isDisplay(rules)) {
          element.container.show();
        } else {
          element.container.hide();
        }
      };

      _.each(rules, function (rule, ruleKey) {
        let setting = getSetting(rule.setting);
        if (undefined != setting) {
          setting.bind(setActiveState);
        }
      });

      element.active.validate = isDisplay(rules);
      setActiveState();
    }
    api.control(mobileLogo, setupControl);
  }

})(jQuery, wp.customize);
