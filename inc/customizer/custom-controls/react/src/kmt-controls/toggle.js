import PropTypes from "prop-types";
import { Fragment } from "@wordpress/element";
import { useState } from "react";
import { ToggleControl } from "@wordpress/components";

const ToggleControlComponent = (props) => {
  const [props_value, setPropsValue] = useState(props.value);

  const { label } = props.params;

  let labelContent = label ? (
    <span className="toggle-control-label">{label}</span>
  ) : null;

  const updateValues = () => {
    setPropsValue(!props_value);
    props.onChange(!props_value);
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
