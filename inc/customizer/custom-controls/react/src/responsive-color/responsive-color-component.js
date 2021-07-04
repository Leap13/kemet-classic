import PropTypes from 'prop-types';
import { useState } from 'react';
import KemetColorPickerControl from '../common/color';

const ResponsiveColorComponent = props => {

    const [props_value, setPropsValue] = useState(props.control.setting.get());

    const [device, setDevice] = useState('desktop');

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
                <span className="dashicons dashicons-image-rotate"></span>

            </button>
        </div>;
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

    let labelHtml = label ? <span className="customize-control-title">{label}</span> : null;

    let descriptionHtml = (description !== '' && description) ? <span className="description customize-control-description" > {description}</span> : null;


    return <div className="kmt-control-wrap">
        <label>
            {labelHtml}
            {descriptionHtml}
        </label>
        {renderReset()}
        <Responsive
            onChange={(currentDevice) => setDevice(currentDevice)}
        />
        <KemetColorPickerControl
            color={undefined !== props_value[device] && props_value[device] ? props_value[device] : ''}
            onChangeComplete={(color, backgroundType) => handleChangeComplete(color, device)}
            backgroundType={'color'}
            allowGradient={false}
            allowImage={false}
        />



    </div>;

};

ResponsiveColorComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(ResponsiveColorComponent);