import { array, func } from "prop-types";

(function ($, api) {
  var $window = $(window),
    $body = $("body");
  var expandedPanel = "";
  api.bind("ready", function () {
    api.state.create("kemetTab");
    api.state("kemetTab").set("general");

    // Set handler when custom responsive toggle is clicked.
    $("#customize-theme-controls").on(
      "click",
      ".kmt-build-tabs-button",
      function (e) {
        e.preventDefault();
        api.previewedDevice.set($(this).data("device"));
      }
    );
    // Set handler when custom responsive toggle is clicked.
    $("#customize-theme-controls").on(
      "click",
      ".kmt-compontent-tabs-button:not(.kmt-nav-tabs-button)",
      function (e) {
        e.preventDefault();

        api.state("kemetTab").set($(this).data("tab"));
      }
    );
    var setTabDisplay = function () {
      var tabState = api.state("kemetTab").get(),
        $tabs = $(".kmt-compontent-tabs-button:not(.kmt-nav-tabs-button)");
      $tabs
        .removeClass("nav-tab-active")
        .filter(".kmt-" + tabState + "-tab")
        .addClass("nav-tab-active");
    };
    // Refresh all responsive elements when previewedDevice is changed.
    api.state("kemetTab").bind(setTabDisplay);

    $("#customize-theme-controls").on(
      "click",
      "customize-section-back",
      function (e) {
        api.state("kemetTab").set("general");
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

    // Refresh all responsive elements when any section is expanded.
    // This is required to set responsive elements on newly added controls inside the section.
    api.section.each(function (section) {
      section.expanded.bind(setBuilderResponsiveDisplay);
    });

    /**
     * Resize Preview Frame when show / hide Builder.
     */
    const resizePreviewer = function () {
      var section = $(
        ".control-section.kmt-header-builder-active .customize-control-kmt-builder"
      );
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

      section.css("overflow", "visible");
      footer.css("overflow", "visible");
    };

    $window.on("resize", resizePreviewer);

    api.previewedDevice.bind(function (device) {
      api.previewer.container.css({ bottom: "0px" });
      resizePreviewer();
    });
    if (KemetCustomizerData && KemetCustomizerData.contexts) {
      /**
       * Active callback script (JS version)
       * ref: https://make.xwp.co/2016/07/24/dependently-contextual-customizer-controls/
       */
      _.each(KemetCustomizerData.contexts, function (rules, key) {
        // Control Display.
        var setupControl = function (element) {
          var setting;
          var getSetting = function (settingName) {
            var setting;
            switch (settingName) {
              case "device":
                setting = api.previewedDevice;
                break;
              case "tab":
                setting = api.state("kemetTab");
                break;
              default:
                var wpOptions = ["custom_logo"];
                setting = wpOptions.includes(settingName)
                  ? settingName
                  : KemetCustomizerData.setting.replace(
                      "setting_name",
                      settingName
                    );
                setting = wp.customize(setting);
            }

            return setting;
          };
          var isDisplay = function () {
            var relation = undefined != rules.relation ? rules.relation : "AND",
              isVisible = "AND" === relation ? true : false;
            _.each(rules, function (rule, ruleKey) {
              if ("relation" == ruleKey) {
                return;
              }
              var boolean = false,
                operator = undefined != rule.operator ? rule.operator : "=",
                ruleValue = rule.value;
              setting = getSetting(rule.setting);
              var settingValue = setting.get();
              switch (operator) {
                case "in_array":
                  boolean = ruleValue.includes(settingValue);
                  break;

                case "contain":
                  boolean = settingValue.includes(ruleValue);
                  break;

                case ">":
                  boolean = settingValue > ruleValue;
                  break;

                case "<":
                  boolean = settingValue < ruleValue;
                  break;

                case ">=":
                  boolean = settingValue >= ruleValue;
                  break;

                case "<=":
                  boolean = settingValue <= ruleValue;
                  break;

                case "not_empty":
                  boolean =
                    typeof settingValue !== "undefined" &&
                    undefined !== settingValue &&
                    null !== settingValue &&
                    "" !== settingValue;
                  break;

                case "!=":
                  boolean = settingValue !== ruleValue;
                  break;

                default:
                  boolean = settingValue == ruleValue;
                  break;
              }
              isVisible =
                "OR" === relation ? isVisible || boolean : isVisible && boolean;
            });
            return isVisible;
          };

          var setActiveState = function () {
            element._toggleActive(isDisplay(), { duration: 0 });
          };

          _.each(rules, function (rule, ruleKey) {
            setting = getSetting(rule.setting);
            if (undefined != setting) {
              setting.bind(setActiveState);
            }
          });

          element.active.validate = isDisplay;
          setActiveState();
        };
        api.control(key, setupControl);
      });
    }
    /**
     * Init Kemet Header & Footer Builder
     */
    const initKmtBuilderPanel = function (panel) {
      let builderType = panel.id.includes("-header-") ? "header" : "footer";
      var section = api.section("section-" + builderType + "-builder");

      if (undefined !== section) {
        var $section = section.contentContainer,
          section_layout = api.section(
            "section-" + builderType + "-builder-layout"
          );

        panel.expanded.bind(function (isExpanded) {
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

            api.state("kemetTab").set("general");
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
})(jQuery, wp.customize);
