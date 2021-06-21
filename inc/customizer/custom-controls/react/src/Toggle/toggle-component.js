import PropTypes from 'prop-types';
import { Fragment } from '@wordpress/element';
import { useState } from 'react';
import { ToggleControl } from '@wordpress/components';

const ToggleControlComponent = props => {

    const [props_value, setPropsValue] = useState(props.control.setting.get());

    const { title } = props.control.params;

    let titleContent = title ? <span className="toggle-control-label">{title}</span> : null;


    const updateValues = () => {
        setPropsValue(!props_value);
        props.control.setting.set(!props_value);
    };

    return <Fragment>
        <div className="toggleControl-wrapper">
            {titleContent}
            <ToggleControl
                label={titleContent}
                checked={props_value}
                onChange={() => updateValues()}
            />
        </div>
    </Fragment>;
};

ToggleControlComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(ToggleControlComponent);