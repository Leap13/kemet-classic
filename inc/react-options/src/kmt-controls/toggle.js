import PropTypes from "prop-types";
import { Fragment } from "@wordpress/element";
import { useState } from "react";
import { ToggleControl } from "@wordpress/components";

const ToggleControlComponent = (props) => {
  const { default: defaultValue, label,description } = props.params;
  let value = props.value ? props.value : defaultValue;
  const [props_value, setPropsValue] = useState(value);
  let labelContent = label ? (
    <span className="toggle-control-label kmt-control-title">{label}</span>
  ) : null;
  let descriptionHtml =
    description !== "" && description ? (
      <span className="description customize-control-description">
        {description}
      </span>
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
        {descriptionHtml}
      </div>
    </Fragment>
  );
};

ToggleControlComponent.propTypes = {
  control: PropTypes.object.isRequired,
};

export default React.memo(ToggleControlComponent);