import PropTypes from "prop-types";
import { Fragment } from "react";
const { Dashicon } = wp.components;
const { __ } = wp.i18n;

const TabsComponent = ({ control }) => {
  let defaultTabs = {
    general: { label: __("General", "kemet") },
    design: { label: __("Design", "kemet") },
  };

  let tabs = control.params.tabs
    ? {
        ...defaultTabs,
        ...control.params.tabs,
      }
    : defaultTabs;
  const active = control.params.active_tab
    ? control.params.active_tab
    : "general";
  const type = control.params.tabs_type ? control.params.tabs_type : "default";
  const responsive = control.params.responsive
    ? control.params.responsive
    : false;
  return (
    <Fragment>
      {"builder-controls" == type && (
        <div
          className={`kmt-control-tabs ${
            !responsive ? "kmt-control-tabs-responsive" : ""
          }`}
        >
          {responsive && (
            <div className="kmt-build-tabs nav-tab-wrapper wp-clearfix">
              <a
                href="#"
                className="nav-tab preview-desktop kmt-build-tabs-button nav-tab-active"
                data-device="desktop"
              >
                <span className="dashicons dashicons-desktop"></span>
                <span>{__("Desktop", "kemet")}</span>
              </a>
              <a
                href="#"
                className="nav-tab preview-tablet preview-mobile kmt-build-tabs-button"
                data-device="tablet"
              >
                <span className="dashicons dashicons-smartphone"></span>
                <span>{__("Tablet / Mobile", "kemet")}</span>
              </a>
            </div>
          )}
          <span className="button button-secondary kmt-builder-hide-button kmt-builder-tab-toggle">
            <Dashicon icon="no" />
            {__("Hide", "kemet")}
          </span>
          <span className="button button-secondary kmt-builder-show-button kmt-builder-tab-toggle">
            <Dashicon icon="edit" />
            {__("Show Builder", "kemet")}
          </span>
        </div>
      )}
      {"default" == type && (
        <div className="kmt-compontent-tabs nav-tab-wrapper wp-clearfix">
          {Object.keys(tabs).map((tab) => {
            return (
              <a
                href="#"
                className={`nav-tab kmt-${tab}-tab kmt-compontent-tabs-button ${
                  active === tab ? "nav-tab-active" : ""
                }`}
                data-tab={tab}
              >
                <span>{tabs[tab].label}</span>
              </a>
            );
          })}
        </div>
      )}
    </Fragment>
  );
};

TabsComponent.propTypes = {
  control: PropTypes.object.isRequired,
  customizer: PropTypes.func.isRequired,
};

export default React.memo(TabsComponent);
