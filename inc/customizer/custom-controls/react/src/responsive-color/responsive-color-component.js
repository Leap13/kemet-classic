import PropTypes from 'prop-types';
import { useState } from 'react';
import { Dashicon } from '@wordpress/components';
import kemetColorPickerControl from '../common/color';

const ResponsiveColorComponent = props => {

    const [props_value, setPropsValue] = useState(props.control.setting.get());


    const updateValues = (value, key) => {
        const obj = {
            ...props_value
        };
        obj[key] = value;
        props.control.setting.set(obj);
        setPropsValue(obj);
    };

    const renderReset = () => {

        return <div className="kmt-color-btn-reset-wrap">
            <button
                className="kmt-reset-btn components-button components-circular-option-picker__clear is-secondary is-small"
                disabled={JSON.stringify(props_value) === JSON.stringify(props.control.params.default)} onClick={e => {
                    e.preventDefault();
                    let value = JSON.parse(JSON.stringify(props.control.params.default));

                    if (undefined !== value && '' !== value) {
                        for (let device in value) {
                            if (undefined === value[device] || '' === value[device]) {
                                value[device] = '';
                            }
                        }
                    }

                    props.control.setting.set(value);
                    setPropsValue(value);
                }}>
                <Dashicon icon='image-rotate' />
            </button>
        </div>;
    };

    const renderSettings = (key) => {
        return <kemetColorPickerControl
            color={undefined !== props_value[key] && props_value[key] ? props_value[key] : ''}
            onChangeComplete={(color, backgroundType) => handleChangeComplete(color, key)} backgroundType={'color'}
            allowGradient={false} allowImage={false} />;
    };

    const handleChangeComplete = (color, key) => {
        let value;

        if (typeof color === 'string' || color instanceof String) {
            value = color;
        } else if (undefined !== color.rgb && undefined !== color.rgb.a && 1 !== color.rgb.a) {
            value = `rgba(${color.rgb.r},${color.rgb.g},${color.rgb.b},${color.rgb.a})`;
        } else {
            value = color.hex;
        }

        updateValues(value, key);
    };

    const {
        label,
        description,
        responsive,
    } = props.control.params;

    let labelHtml = null;
    let descriptionHtml = null;
    let responsiveHtml = null;
    let inputHtml = null;

    if (label) {
        labelHtml = <span className="customize-control-title">{label}</span>;
    }

    if (description) {
        descriptionHtml = <span className="description customize-control-description">{description}</span>;
    }

    if (responsive) {
        responsiveHtml = <ul className="kmt-responsive-btns">
            <li className="desktop active">
                <button type="button" className="preview-desktop" data-device="desktop">
                    <i className="dashicons dashicons-desktop"></i>
                </button>
            </li>
            <li className="tablet">
                <button type="button" className="preview-tablet" data-device="tablet">
                    <i className="dashicons dashicons-tablet"></i>
                </button>
            </li>
            <li className="mobile">
                <button type="button" className="preview-mobile" data-device="mobile">
                    <i className="dashicons dashicons-smartphone"></i>
                </button>
            </li>
        </ul>;
        inputHtml = <>

            <div className="kmt-color-picker-alpha color-picker-hex kmt-responsive-color desktop active">
                {renderSettings('desktop')}
            </div>
            <div className="kmt-color-picker-alpha color-picker-hex kmt-responsive-color tablet">
                {renderSettings('tablet')}
            </div>
            <div className="kmt-color-picker-alpha color-picker-hex kmt-responsive-color mobile">
                {renderSettings('mobile')}
            </div>
        </>;
    }

    return <div className="kmt-control-wrap">
        <label>
            {labelHtml}
            {descriptionHtml}
        </label>
        {renderReset()}
        {responsiveHtml}

        <div className="customize-control-content">
            {inputHtml}
        </div>
    </div>;

};

ResponsiveColorComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(ResponsiveColorComponent);