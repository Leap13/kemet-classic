import PropTypes from 'prop-types';
import { useEffect, useState } from 'react';

const SliderComponent = props => {

    const [props_value, setPropsValue] = useState(props.control.setting.get());

    const {
        label,
        description,
        suffix,
        input_attrs,
    } = props.control.params;

    let inputContent = {};


    let defaultValue = props.control.params.default;

    let labelContent = label ? <label><span className="customize-control-title">{label}</span></label> : null;

    let descriptionContent = description ? <span className="description customize-control-description">{description}</span> : null;

    let suffixContent = suffix ? <span className="kmt-range-unit">{suffix}</span> : null;

    const updateValues = (newVal) => {
        if (!isNaN(newVal)) {
            const parsedValue = parseFloat(newVal)
            newVal = parsedValue;
        }
        if (min < -0.1) {
            if (newVal > max) {
                newVal = max;
            } else if (newVal < min && newVal !== '-') {
                newVal = min;
            }
        } else {
            if (newVal > max) {
                newVal = max
            } else if (newVal < -0.1) {
                newVal = min
            }
        }
        setPropsValue(newVal);
        props.control.setting.set(newVal);


    };
    let { min, max, step } = inputContent;


    let savedValue = (props_value || 0 === props_value) ? parseFloat(props_value) : '';

    if (1 === step) {
        savedValue = (props_value || 0 === props_value) ? parseInt(props_value) : '';
    }

    return (
        <div className="kemet-slider-wrap">
            {labelContent}
            <button className="kmt-slider-reset" disabled={JSON.stringify(props_value) === JSON.stringify(defaultValue)} onClick={e => {
                e.preventDefault();
                let value = JSON.parse(JSON.stringify(defaultValue));
                updateValues(value);
            }}>
                <span className="dashicons dashicons-image-rotate"></span>
            </button>
            <div className="wrapper">
                <input
                    type="range"
                    value={savedValue}
                    onChange={(value) => updateValues(event.target.value)}
                    min={input_attrs.min}
                    max={input_attrs.max}
                    step={input_attrs.step}

                />
                <div class="kemet_range_valueeee">
                    <input type="number" className="value kmt-range-value-input"
                        value={`${savedValue}`}
                        onChange={(value) => updateValues(event.target.value)}
                        min={input_attrs.min}
                        max={input_attrs.max}
                        step={input_attrs.step}
                    />
                    {suffixContent}
                </div>

            </div>


            {descriptionContent}
        </div>
    )
};

SliderComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(SliderComponent);