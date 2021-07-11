import PropTypes from 'prop-types';
import { useEffect, useState } from 'react';

const SliderComponent = props => {

    const [props_value, setPropsValue] = useState(props.control.get());

    const {
        label,
        description,
        suffix,
        input_attrs,
    } = props.params;

    let inputContent = {};


    let defaultValue = '';

    let labelContent = label ? <label><span className="customize-control-title">{label}</span></label> : null;

    let descriptionContent = (description || description !== '') ? <span className="description customize-control-description">{description}</span> : null;

    let suffixContent = suffix ? <span className="kmt-range-unit">{suffix}</span> : null;
    let { min, max, step } = inputContent;

    const onChangInput = (event) => {
        if (event.target.value === '') {
            updateValues(undefined);
            return;
        }
        const newValue = Number(event.target.value);
        if (newValue === '') {
            updateValues(undefined);
            return;
        }
        if (min < -0.1) {
            if (newValue > max) {
                updateValues(max);
            } else if (newValue < min && newValue !== '-') {
                updateValues(min);
            } else {
                updateValues(newValue);
            }
        } else {
            if (newValue > max) {
                updateValues(max);
            } else if (newValue < -0.1) {
                updateValues(min);
            } else {
                updateValues(newValue);
            }
        }
    };
    const updateValues = (newVal) => {
        setPropsValue(newVal);
        props.onChange(props.id, newVal);
    };


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
                    min={input_attrs.min}
                    max={input_attrs.max}
                    step={input_attrs.step}

                />
                <div class="kemet_range_value">
                    <input type="number" className="value kmt-range-value-input"
                        value={`${savedValue}`}
                        onChange={(value) => onChangInput(event)}
                        min={input_attrs.min}
                        max={input_attrs.max}
                        step={input_attrs.step}
                    />
                    {suffixContent}
                </div>
                <div className="kmt-slider-reset" disabled={JSON.stringify(props_value) === JSON.stringify(defaultValue)} onClick={e => {
                    e.preventDefault();
                    let value = JSON.parse(JSON.stringify(defaultValue));
                    updateValues(value);
                }}>
                    <span className="dashicons dashicons-image-rotate"></span>
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