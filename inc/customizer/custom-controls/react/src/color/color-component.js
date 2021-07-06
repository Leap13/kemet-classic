import PropTypes from 'prop-types';
import KemetColorPickerControl from '../common/color';
import { useEffect, useState } from 'react';
const { __ } = wp.i18n;

const ColorComponent = props => {
    let value = props.control.setting.get();
    let defaultValue = props.control.params.default;
    let pickers = props.control.params.pickers;

    let colorComponent = [];

    const [state, setState] = useState(value);

    useEffect(() => {
        // If settings are changed externally.
        if (state.value !== value) {
            setState(value);
        }
    }, [props]);

    const updateValues = (value) => {
        setState(prevState => ({
            ...prevState,
            value
        }));
        props.control.setting.set(value);
        console.log("value from update", value, state)
    };

    const renderOperationButtons = () => {

        let resetFlag = true;
        const tempVal = '';

        if (JSON.stringify(tempVal) !== JSON.stringify(defaultValue)) {
            resetFlag = false;
        }
        return <>
            <div className="kmt-color-btn-reset-wrap">
                <button
                    className="kmt-reset-btn components-button components-circular-option-picker__clear is-secondary is-small"
                    disabled={resetFlag} onClick={e => {
                        e.preventDefault();
                        let value = JSON.parse(JSON.stringify(defaultValue));

                        if (undefined === value || '' === value) {
                            value = 'unset';
                        }

                        updateValues(value);
                    }}>
                    <span className="dashicons dashicons-image-rotate"></span>
                </button>
            </div>
        </>;
    };

    const handleChangeComplete = (color) => {

        console.log('handleChangeComplete', color)
        let value;

        if (typeof color === 'string') {
            value = color;
        } else if (undefined !== color.rgb && undefined !== color.rgb.a && 1 !== color.rgb.a) {
            value = `rgba(${color.rgb.r},${color.rgb.g},${color.rgb.b},${color.rgb.a})`;
        } else {
            value = color.hex;
        }
        console.log("value from function ", value)
        updateValues(value);
    };

    for (const [key, value] of Object.entries(pickers)) {
        let colorValue = pickers[key][`id`]
        colorComponent.push(<KemetColorPickerControl
            text={value}
            color={state[colorValue]}
            onChangeComplete={(color, backgroundType) => handleChangeComplete(color)}
            backgroundType={'color'}
            allowGradient={false}
            allowImage={false}
        />
        )
    }


    const {
        label,
        description
    } = props.control.params;


    let labelHtml = label ? <span className="customize-control-title">{label}</span> : "color";
    let descriptionHtml = (description !== '' && description) ? <span className="description customize-control-description" > {description}</span> : null;


    return <div className="kmt-control-wrap kmt-color-control-wrap">
        {renderOperationButtons()}
        <div className={`kmt-color-container`}>
            <label>
                {labelHtml}
                {descriptionHtml}
            </label>

            <div className={`kmt-color-picker-container`}>
                {colorComponent.map(elem => elem)}
            </div>
        </div>
    </div>;

};

ColorComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default ColorComponent;