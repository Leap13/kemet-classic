import PropTypes from "prop-types";
import { Fragment, useState } from "react";
import ColorComponent from '../color/color-component';
import ResponsiveSliderComponent from '../responsive-slider/responsive-slider-component';
import SliderComponent from '../slider/slider-component';
const { Dashicon } = wp.components;
const { __ } = wp.i18n;


const TabsComponent = (props) => {
  let tabs = props.control.params.tabs
    ? props.control.params.tabs
    : {};
  const [state, setState] = useState({
    currentTab: 0,
  });
  const currentTab = tabs[Object.keys(tabs)[state.currentTab]];
  const routes = {
    "kmt-color": ColorComponent,
    "kmt-responsive-slider": ResponsiveSliderComponent,
    "kmt-slider": SliderComponent,
  };
  const controlType = (control) => {
    const ControlType = routes[control.params.type];

    return <ControlType control={control} />
  };
  const renderControl = (control) => {
    return <Fragment>
      <li className={`customize-control-${control.params.type}`}>
        {controlType(control)}
      </li>
    </Fragment>

  };

  return (
    <Fragment>
      <ul className="tabs">
        {Object.keys(tabs).map((tab, index) => {
          return <li
            onClick={() =>
              setState({ currentTab: index })
            }
            className={index === state.currentTab && 'active'}>
            {tabs[tab].title}
          </li>
        })}
      </ul>
      <div className="kmt-options">
        {Object.keys(currentTab.options).map((optionId) => {
          let control = props.customizer.control('kemet-settings[' + optionId + ']');
          let option = currentTab.options[optionId];
          control.params = Object.assign(control.params, option);
          return renderControl(control);
        })}
      </div>
    </Fragment>
  );
};

TabsComponent.propTypes = {
  control: PropTypes.object.isRequired,
  customizer: PropTypes.func.isRequired,
};

export default React.memo(TabsComponent);
