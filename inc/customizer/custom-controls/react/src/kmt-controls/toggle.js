import PropTypes from "prop-types";
import { Fragment } from "@wordpress/element";
import { useState } from "react";
import { ToggleControl } from "@wordpress/components";

const ToggleControlComponent = ({ params, value, onChange }) => {
  const { default: defaultValue, label } = params;
  value = value ? value : defaultValue;
  const [props_value, setPropsValue] = useState(value);
  let labelContent = label ? (
    <span className="toggle-control-label">{label}</span>
  ) : null;

  const updateValues = () => {
    setPropsValue(!props_value);
    onChange(!props_value);
  };

  return (
    <Fragment>
      <div className="toggleControl-wrapper">
        <ToggleControl
          label={labelContent}
          checked={props_value}
          onChange={() => updateValues()}
        />
      </div>
    </Fragment>
  );
};

ToggleControlComponent.propTypes = {
  control: PropTypes.object.isRequired,
};

export default React.memo(ToggleControlComponent);
