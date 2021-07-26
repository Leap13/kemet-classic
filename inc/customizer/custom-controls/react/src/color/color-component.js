import PropTypes from 'prop-types';
import KemetColorPickerControl from '../common/color';
import { useEffect, useState } from 'react';
import Responsive from '../common/responsive'
const { __ } = wp.i18n;

const ColorComponent = props => {
    let value = props.control.setting.get();
    let defaultValue = props.control.params.default;
    let { pickers, responsive } = props.control.params;
    const [state, setState] = useState(value);
    const [device, setDevice] = useState('desktop');
    let responsiveHtml = null;
    let optionsHtml = null;
    let innerOptionsHtml = null;



    useEffect(() => {
        // If settings are changed externally.
        if (state !== value) {
            setState(value);
        }
    }, [props]);

    const updateValues = (value) => {
        let UpdatedState = { ...state };
        if (responsive) {
            UpdatedState[device] = value
        }
        else {

            UpdatedState = value

        }
        setState(UpdatedState)
        props.control.setting.set(UpdatedState);
    };

    const renderOperationButtons = () => {
        return <>
            <div className="kmt-color-btn-reset-wrap">
                <button
                    className="kmt-reset-btn components-button components-circular-option-picker__clear is-secondary is-small"
                    disabled={(JSON.stringify(state) === JSON.stringify(defaultValue))}
                    onClick={e => {
                        e.preventDefault();
                        let value = responsive ? JSON.parse(JSON.stringify(defaultValue[device])) : JSON.parse(JSON.stringify(defaultValue));

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

    const handleChangeComplete = (color, id) => {

        let value = responsive ? state[device] : state;

        if (typeof color === 'string') {
            value[`${id}`] = color;
        } else if (undefined !== color.rgb && undefined !== color.rgb.a && 1 !== color.rgb.a) {
            value[`${id}`] = `rgba(${color.rgb.r},${color.rgb.g},${color.rgb.b},${color.rgb.a})`;
        } else {
            value[`${id}`] = color.hex;
        }


        updateValues(value);
    };


    if (responsive) {
        responsiveHtml = <Responsive
            onChange={(currentDevice) => setDevice(currentDevice)}
        />
    }


    const renderInputHtml = (device) => {

        innerOptionsHtml = Object.entries(pickers).map(([key, val]) => {

            if (responsive) {
                return (
                    <KemetColorPickerControl
                        text={val[`title`]}
                        color={state[device][val[`id`]]}
                        onChangeComplete={(color, backgroundType) => handleChangeComplete(color, val[`id`])}
                        backgroundType={'color'}
                        allowGradient={false}
                        allowImage={false}
                    />
                )
            } else {
                return (
                    <KemetColorPickerControl
                        text={val[`title`]}
                        color={state[val[`id`]]}
                        onChangeComplete={(color) => handleChangeComplete(color, val[`id`])}
                        backgroundType={'color'}
                        allowGradient={false}
                        allowImage={false}
                    />
                )
            }

        })
        return innerOptionsHtml

    }


    if (responsive) {
        optionsHtml = <>
            {renderInputHtml(device, 'active')}
        </>;
    } else {
        optionsHtml = <>
            {renderInputHtml('')}
        </>;
    }

    const {
        label,
        description
    } = props.control.params;

    let labelHtml = label ? <span className="customize-control-title">{label}</span> : null;
    let descriptionHtml = (description !== '' && description) ? <span className="description customize-control-description" > {description}</span> : null;


    return <div className="kmt-control-wrap kmt-color-control-wrap">
        {renderOperationButtons()}
        <div className={`kmt-color-container`}>
            <label>
                {labelHtml}
                {descriptionHtml}
                {responsiveHtml}
            </label>

            <div className={`kmt-color-picker-container`}>
                {optionsHtml}
            </div>
        </div>
    </div>;

}


ColorComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default ColorComponent;