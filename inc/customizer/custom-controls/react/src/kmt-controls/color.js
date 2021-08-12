import PropTypes from 'prop-types';
import KemetColorPickerControl from '../common/color';
import { useEffect, useState } from 'react';
import Responsive from '../common/responsive'
const { __ } = wp.i18n;

const ColorComponent = props => {
    let value = props.value;

    let responsiveBaseDefault = {
        'desktop': {},
        'tablet': {},
        'mobile': {}
    }
    let { pickers, responsive } = props.params;
    let baseDefault = responsive ? responsiveBaseDefault : {};
    pickers.map(({ id }) => {
        if (responsive) {
            baseDefault['desktop'][id] = '';
            baseDefault['tablet'][id] = '';
            baseDefault['mobile'][id] = '';
        } else {
            baseDefault[id] = '';
        }
    })
    baseDefault = props.params.default ? props.params.default : baseDefault;

    let defaultValue = props.params.default ? props.params.default : baseDefault;
    value = value ? value : defaultValue;
    const [state, setState] = useState(value);
    const [device, setDevice] = useState('desktop');
    let responsiveHtml = null;
    let optionsHtml = null;
    let innerOptionsHtml = null;

    const updateValues = (obj) => {
        let UpdatedState = { ...state };
        if (responsive) {
            UpdatedState[device] = obj
        }
        else {

            UpdatedState = obj
        }
        props.onChange({ ...UpdatedState, flag: !value.flag });
        setState(UpdatedState)
    };

    const renderOperationButtons = () => {
        return <>
            <div className="kmt-color-btn-reset-wrap">
                <button
                    className="kmt-reset-btn "
                    disabled={JSON.stringify(state) === JSON.stringify(defaultValue) ? true : false}
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
        innerOptionsHtml = Object.entries(pickers).map(([key, value]) => {
            if (responsive) {
                return (
                    <KemetColorPickerControl
                        text={value[`title`]}
                        color={state[device][value[`id`]]}
                        onChangeComplete={(color, backgroundType) => handleChangeComplete(color, value[`id`])}
                        backgroundType={'color'}
                        allowGradient={false}
                        allowImage={false}
                    />
                )
            } else {
                return (
                    <KemetColorPickerControl
                        text={value[`title`]}
                        color={state[value[`id`]]}
                        onChangeComplete={(color, backgroundType) => handleChangeComplete(color, value[`id`])}
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
    } = props.params;

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