import { Fragment } from "react";

const { __ } = wp.i18n;
const { Dashicon } = wp.components;
const ControlTabsComponent = ({ responsive }) => {
  return (
    <div
      className={`kmt-control-tabs ${
        !responsive && `kmt-control-tabs-responsive`
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
  );
};

export default React.memo(ControlTabsComponent);
