import PropTypes from 'prop-types';
import { useState } from 'react';
const IconSelectComponent = props => {
    const [value, setValue] = useState(props.value);

    const onLayoutChange = (value) => {
        setValue(value);
        props.onChange(value);
    };
    const {
        label,
        description,
        id,
        choices,
    } = props.params;
    let ContentHTML = [];

    let labelContent = label ? <span className="customize-control-title">{label}</span> : null;

    let descriptionContent = (description || description !== '') ? <span className="description customize-control-description">{description}</span> : null;
    for (const [key, icon] of Object.entries(choices)) {

        ContentHTML.push(<label>
            <input className="icon-select-input" type="radio" value={key} name={`_customize-icon-select-${id}`} checked={value === key} onChange={() => onLayoutChange(key)} />
            <span className="icon-select-label">
                <div className={`dashicons ${icon['icon']}`}></div>
            </span>
        </label>)
    }
    return (
        <label className="customizer-text">
            {labelContent}
            {descriptionContent}
            <div id={id} className={`icon-select `}>
                {
                    ContentHTML.map((elem) => {
                        return elem;
                    })
                }
            </div>
        </label>
    )
};

IconSelectComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(IconSelectComponent);