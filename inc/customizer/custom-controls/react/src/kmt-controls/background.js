import PropTypes from 'prop-types';
import { useState, useEffect } from 'react';
import { Dashicon } from '@wordpress/components';
import KemetColorPickerControl from '../common/color';
import { __ } from '@wordpress/i18n';
import Responsive from '../common/responsive'


const BackgroundComponent = props => {
    let value = props.value;

    let responsive = props.params.responsive;
    let defaultValue = {
        "background-attachment": '',
        "background-color": '',
        "background-image": '',
        "background-media": '',
        "background-position": '',
        "background-repeat": '',
        "background-size": '',
        "background-type": "",
        "background-gradient": ''
    }

    let ResDefaultParam = {
        desktop: {
            "background-attachment": '',
            "background-color": '',
            "background-image": '',
            "background-media": '',
            "background-position": '',
            "background-repeat": '',
            "background-size": '',
            "background-type": "",
            "background-gradient": ''
        },
        tablet: {
            "background-attachment": '',
            "background-color": '',
            "background-image": '',
            "background-media": '',
            "background-position": '',
            "background-repeat": '',
            "background-size": '',
            "background-type": "",
            "background-gradient": ''
        },
        mobile: {
            "background-attachment": '',
            "background-color": '',
            "background-image": '',
            "background-media": '',
            "background-position": '',
            "background-repeat": '',
            "background-size": '',
            "background-type": "",
            "background-gradient": ''
        }
    }

    let defaultValues = responsive ? ResDefaultParam : defaultValue;

    let defaultVals = props.params.default
        ? props.params.default
        : defaultValues;

    value = value ? value : defaultVals;
    const [props_value, setPropsValue] = useState(value);
    const [device, setDevice] = useState('desktop');

    const updateValue = (obj) => {
        console.log(obj);
        setPropsValue(obj);
        props.onChange({ ...obj, flag: !value.flag });
    }

    const updateBackgroundType = (device) => {
        let value = props.value;
        let obj = {
            ...value
        };

        if (!props_value[device]['background-type']) {
            let deviceObj = {
                ...obj[device]
            };

            if (props_value[device]['background-color']) {
                deviceObj['background-type'] = 'color';
                obj[device] = deviceObj;
                updateValue(obj);


            }
            if (props_value[device]['background-gradient']) {
                deviceObj['background-type'] = 'gradient';
                obj[device] = deviceObj;
                updateValue(obj);
            }

            if (props_value[device]['background-image']) {
                deviceObj['background-type'] = 'image';
                obj[device] = deviceObj;
                updateValue(obj);
            }
        }
    };

    let responsiveHtml;

    if (responsive) {
        responsiveHtml = <Responsive
            onChange={(device) => setDevice(device)}
        />
    }



    const renderReset = () => {
        return <span className="customize-control-title">

            <div className="kmt-color-btn-reset-wrap">
                <button
                    className="kmt-reset-btn components-button components-circular-option-picker__clear is-secondary is-small"
                    disabled={(JSON.stringify(props_value) === JSON.stringify(defaultVals))} onClick={e => {
                        e.preventDefault();
                        updateValue(defaultVals)
                    }}>
                    <Dashicon icon='image-rotate' />
                </button>
            </div>
            <label>
                {labelHtml}
                {descriptionHtml}
            </label>
            {responsiveHtml}
        </span >;
    };

    const onSelectImage = (media, backgroundType) => {
        let obj = {
            ...props_value
        };
        if (responsive) {
            obj[device]['background-media'] = media.id;
            obj[device]['background-image'] = media.url;
            obj[device]['background-type'] = backgroundType;
        } else {
            obj['background-media'] = media.id;
            obj['background-image'] = media.url;
            obj['background-type'] = backgroundType;
        }
        updateValue(obj)

    };

    const onChangeImageOptions = (mainKey, value, backgroundType) => {
        let obj = {
            ...props_value
        };
        if (responsive) {
            obj[device][mainKey] = value;
            obj[device]['background-type'] = backgroundType;
        } else {
            obj[mainKey] = value;
            obj['background-type'] = backgroundType;
        }
        updateValue(obj)

    };
    useEffect(() => {
        if (responsive) {
            let devices = ['desktop', 'mobile', 'tablet'];
            for (let device of devices) {
                updateBackgroundType(device);
            }
        }

    }, []);

    const renderSettings = () => {
        let renderBackground = responsive ? props_value[device] : props_value;

        return <>
            <KemetColorPickerControl
                text={__('Background', 'Kemet')}
                color={undefined !== renderBackground['background-color'] && renderBackground['background-color'] ? renderBackground['background-color'] : ''}
                gradient={undefined !== renderBackground['background-gradient'] && renderBackground['background-gradient'] ? renderBackground['background-gradient'] : ''}
                onChangeComplete={(color, backgroundType) => handleChangeComplete(color, backgroundType)}
                onChangeGradient={(gradient, backgroundType) => handleChangeGradient(gradient, backgroundType)}
                media={undefined !== renderBackground['background-media'] && renderBackground['background-media'] ? renderBackground['background-media'] : ''}
                backgroundImage={undefined !== renderBackground['background-image'] && renderBackground['background-image'] ? renderBackground['background-image'] : ''}
                backgroundAttachment={undefined !== renderBackground['background-attachment'] && renderBackground['background-attachment'] ? renderBackground['background-attachment'] : ''}
                backgroundPosition={undefined !== renderBackground['background-position'] && renderBackground['background-position'] ? renderBackground['background-position'] : ''}
                backgroundRepeat={undefined !== renderBackground['background-repeat'] && renderBackground['background-repeat'] ? renderBackground['background-repeat'] : ''}
                backgroundSize={undefined !== renderBackground['background-size'] && renderBackground['background-size'] ? renderBackground['background-size'] : ''}
                onSelectImage={(media, backgroundType) => onSelectImage(media, backgroundType)}
                onChangeImageOptions={(mainKey, value, backgroundType) => onChangeImageOptions(mainKey, value, backgroundType)}
                backgroundType={undefined !== renderBackground['background-type'] && renderBackground['background-type'] ? renderBackground['background-type'] : 'color'}
                allowGradient={true}
                allowImage={true}
            />
        </>;


    };
    const handleChangeGradient = (gradient, backgroundType) => {
        let obj = {
            ...props_value
        };
        if (responsive) {
            obj[device]['background-gradient'] = gradient;
            obj[device]['background-type'] = 'gradient';
        } else {
            obj['background-gradient'] = gradient;
            obj['background-type'] = 'gradient';
        }
        updateValue(obj)
    }

    const handleChangeComplete = (color, backgroundType) => {
        let value = '';

        if (color) {
            if (typeof color === 'string' || color instanceof String) {
                value = color;
            } else if (undefined !== color.rgb && undefined !== color.rgb.a && 1 !== color.rgb.a) {
                value = `rgba(${color.rgb.r},${color.rgb.g},${color.rgb.b},${color.rgb.a})`;
            } else {
                value = color.hex;
            }
        }

        let obj = {
            ...props_value
        };
        if (responsive) {
            obj[device]['background-color'] = value;
            obj[device]['background-type'] = 'color';
        } else {
            obj['background-color'] = value;
            obj['background-type'] = 'color';
        }
        updateValue(obj)
    };

    const {
        label,
        description
    } = props.params;

    let labelHtml = <span className="customize-control-title">{label ? label : __('Background')}</span>;
    let descriptionHtml = description ?
        <span className="description customize-control-description">{description}</span> : null;
    let inputHtml = null;
    inputHtml =
        <div className="background-container">
            {renderReset()}
            {renderSettings()}
        </div>
        ;

    return <>
        {inputHtml}
    </>;

};

BackgroundComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(BackgroundComponent);