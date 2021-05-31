import PropTypes from "prop-types";
import { Fragment } from "react";
const { __ } = wp.i18n;

const TabsComponent = (props) => {
  let defaultTabs = {
    general: { label: __("General", "kemet") },
    design: { label: __("Design", "kemet") },
  };

  let tabs = props.control.params.tabs
    ? {
        ...defaultTabs,
        ...props.control.params.tabs,
      }
    : defaultTabs;
  const active = props.control.params.active_tab
    ? props.control.params.active_tab
    : "general";
  return (
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
  );
};

TabsComponent.propTypes = {
  control: PropTypes.object.isRequired,
  customizer: PropTypes.func.isRequired,
};

export default React.memo(TabsComponent);
