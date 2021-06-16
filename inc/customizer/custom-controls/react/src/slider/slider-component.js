import PropTypes from 'prop-types';
import { useEffect, useState } from 'react';

const SliderComponent = props => {

    const [props_value, setPropsValue] = useState(props.control.setting.get());

    const {
        label,
        description,
        suffix,
        inputAttrs,
    } = props.control.params;

    let inputContent = {};
    if (inputAttrs) {
        inputAttrs.split(" ").map((item, i) => {
            let item_values = item.split("=");
            if (undefined !== item_values[1]) {
                inputContent[item_values[0]] = item_values[1].replace(/"/g, "");
            }

        })
    }


    let defaultValue = props.control.params.default;

    let labelContent = label ? <label><span className="customize-control-title">{label}</span></label> : null;

    let descriptionContent = description ? <span className="description customize-control-description">{description}</span> : null;

    let suffixContent = suffix ? <span className="ast-range-unit">{suffix}</span> : null;

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
            <div className="wrapper">
                <input
                    type="range"
                    value={savedValue}
                    onChange={(value) => updateValues(event.target.value)}
                    min={min}
                    max={max}
                    step={step}

                />
                <div class="kemet_range_value">
                    <input type="number" className="value kmt-range-value-input"
                        value={`${savedValue}`}
                        onChange={(value) => updateValues(event.target.value)}
                        min={min}
                        max={max}
                        step={step} />
                    {suffixContent}
                </div>
                <button className="kmt-slider-reset" disabled={JSON.stringify(props_value) === JSON.stringify(defaultValue)} onClick={e => {
                    e.preventDefault();
                    let value = JSON.parse(JSON.stringify(defaultValue));
                    updateValues(value);
                }}>
                    <span className="dashicons dashicons-image-rotate"></span>
                </button>
            </div>


            {descriptionContent}
        </div>
    )
};

SliderComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(SliderComponent);