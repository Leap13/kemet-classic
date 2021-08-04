import PropTypes from 'prop-types';
import { useState, useEffect } from 'react';
import { Dashicon } from '@wordpress/components';
import KemetColorPickerControl from '../common/color';
import { __ } from '@wordpress/i18n';
import Responsive from '../common/responsive'


const BackgroundComponent = props => {
    let value = props.control.setting.get();


    let responsive = false;
    let defaultValue = {
        "background-attachment": '',
        "background-color": '',
        "background-image": '',
        "background-media": '',
        "background-position": '',
        "background-repeat": '',
        "background-size": '',
        "background-type": ""
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
            "background-type": ""
        },
        tablet: {
            "background-attachment": '',
            "background-color": '',
            "background-image": '',
            "background-media": '',
            "background-position": '',
            "background-repeat": '',
            "background-size": '',
            "background-type": ""
        },
        mobile: {
            "background-attachment": '',
            "background-color": '',
            "background-image": '',
            "background-media": '',
            "background-position": '',
            "background-repeat": '',
            "background-size": '',
            "background-type": ""
        }
    }


    let defaultValues = responsive ? ResDefaultParam : defaultValue;

    let defaultVals = props.control.params.default
        ? {

            ...props.control.params.default,
        }
        : defaultValues;

    value = value ? value : defaultVals;
    const [props_value, setPropsValue] = useState(value);
    const [device, setDevice] = useState('desktop');

    let responsiveHtml;

    const updateValues = (obj) => {
        setPropsValue(prevState => ({
            ...prevState,
            obj
        }));
        props.control.setting.set(obj);
    };
    const updateBackgroundType = (device) => {
        let value = props.control.setting.get();
        let obj = {
            ...value
        };

        if (obj !== props_value) {
            let deviceObj = {
                ...obj[device]
            };

            if (props_value[device]['background-color']) {
                deviceObj['background-type'] = 'color';
                obj[device] = deviceObj;
                updateValues(obj);

                if (props_value[device]['background-color'].includes('gradient')) {
                    deviceObj['background-type'] = 'gradient';
                    obj[device] = deviceObj;
                    updateValues(obj);
                }
            }

            if (props_value[device]['background-image']) {
                deviceObj['background-type'] = 'image';
                obj[device] = deviceObj;
                updateValues(obj);
            }
        }
    };
    useEffect(() => {
        updateBackgroundType(device);

    }, []);



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
                        props.control.setting.set(defaultVals);
                        setPropsValue(defaultVals);
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

        props.control.setting.set(obj);
        setPropsValue(obj);
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

        props.control.setting.set(obj);
        setPropsValue(obj);
    };

    const renderSettings = () => {
        let renderBackground = responsive ? props_value[device] : props_value;

        return <>
            <KemetColorPickerControl
                text={__('Background', 'Kemet')}
                color={undefined !== renderBackground['background-color'] && renderBackground['background-color'] ? renderBackground['background-color'] : ''}
                onChangeComplete={(color, backgroundType) => handleChangeComplete(color, backgroundType)}
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

    const handleChangeComplete = (color, backgroundType) => {
        let backgroundT = backgroundType ? backgroundType : 'color';
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
            obj[device]['background-type'] = backgroundT;
        } else {
            obj['background-color'] = value;
            obj['background-type'] = backgroundT;
        }

        props.control.setting.set(obj);
        setPropsValue(obj);
    };

    const {
        label,
        description
    } = props.control.params;

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