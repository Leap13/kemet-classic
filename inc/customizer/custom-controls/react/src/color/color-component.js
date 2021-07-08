import PropTypes from 'prop-types';
import KemetColorPickerControl from '../common/color';
import { useEffect, useState } from 'react';
const { __ } = wp.i18n;
import { Tooltip } from '@wordpress/components';

const ColorComponent = props => {
    let value = props.control.setting.get();
    let defaultValue = props.control.params.default;
    let { pickers, responsive } = props.control.params;
    const [state, setState] = useState(value);
    const [device, setDevice] = useState('desktop');

    useEffect(() => {
        // If settings are changed externally.
        if (state.value !== value) {
            setState(value);
        }
    }, [props]);

    const updateValues = (value) => {
        setState(value)
        props.control.setting.set(value);
    };


    const renderOperationButtons = (device) => {
        return <>
            <div className="kmt-color-btn-reset-wrap">
                <button
                    className="kmt-reset-btn components-button components-circular-option-picker__clear is-secondary is-small"
                    disabled={(JSON.stringify(state) === JSON.stringify(defaultValue))}
                    onClick={e => {
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

    const handleChangeComplete = (color, id) => {

        let value = state;

        if (typeof color === 'string') {
            value[`${id}`] = color;
        } else if (undefined !== color.rgb && undefined !== color.rgb.a && 1 !== color.rgb.a) {
            value[`${id}`] = `rgba(${color.rgb.r},${color.rgb.g},${color.rgb.b},${color.rgb.a})`;
        } else {
            value[`${id}`] = color.hex;
        }
        updateValues(value);
    };


    const HandleColorComponent = () => {
        let colorComponent = []
        pickers.map((i) => {

            colorComponent.push(<KemetColorPickerControl
                text={i[`title`]}
                color={state[i[`id`]]}
                onChangeComplete={(color, backgroundType) => handleChangeComplete(color, i[`id`])}
                backgroundType={'color'}
                allowGradient={false}
                allowImage={false}
            />
            )
        })
        return (
            colorComponent.map((item) => {
                return <Tooltip text={"Color"} position="top center">
                    {item}
                </Tooltip>
            })
        )
        // return <Tooltip  text={"Color"} position="top center">
        //     {colorComponent.map(elem => elem)}
        // </Tooltip>
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
            </label>

            <div className={`kmt-color-picker-container`}>
                {HandleColorComponent()}
            </div>
        </div>
    </div>;

};

ColorComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default ColorComponent;