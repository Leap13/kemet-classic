import PropTypes from 'prop-types';
import { useState } from 'react';


const TextComponent = props => {

    const [props_value, setPropsValue] = useState(props.control.get());

    const HandleChange = (value) => {
        setPropsValue(value);
        props.onChange(props.id, value);
    };

    const {
        label,
    } = props.params;

    let labelContent = label ? <span className="customize-control-title">{label}</span> : null;

    return <>
        {labelContent}
        <div className="customize-control-content">
            <input type='text' value={props_value} onChange={(event) => {
                HandleChange(event.target.value)
            }} />
        </div>
    </>;

};

TextComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(TextComponent);