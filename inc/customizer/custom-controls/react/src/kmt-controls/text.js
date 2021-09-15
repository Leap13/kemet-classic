import PropTypes from 'prop-types';
import { useState } from 'react';

const TextComponent = ({ onChange, value, params }) => {

    const [props_value, setPropsValue] = useState(value);
    const { label } = params;

    let labelContent = label ? <span className="customize-control-title kmt-control-title">{label}</span> : null;

    return <>
        {labelContent}
        <div className="customize-control-content">
            <input type='text' value={props_value} onChange={({ target: { value: input } }) => {
                setPropsValue(input);
                onChange(input);
            }}
            />
        </div>
    </>;

};

TextComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(TextComponent);