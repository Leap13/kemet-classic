import PropTypes from 'prop-types';
import AstraColorPickerControl from '../common/kmtra-color-picker-control';
import { __ } from '@wordpress/i18n';
import { useEffect, useState } from 'react';

const ResponsiveBackground = props => {


    let value = props.control.setting.get();
    let defaultPropsValue = props.control.params.default;

    const [state, setState] = useState({
        value: value,
    }
    );
    const [device, setDevice] = useState('desktop');

    const updateValues = (obj) => {
        setState(prevState => ({
            ...prevState,
            value: obj
        }));
        props.control.setting.set(obj);
    };

    const updateBackgroundType = (device) => {
        let value = props.control.setting.get();
        let obj = {
            ...value
        };

        if (!state.value[device]['background-type']) {
            let deviceObj = {
                ...obj[device]
            };

            if (state.value[device]['background-color']) {
                deviceObj['background-type'] = 'color';
                obj[device] = deviceObj;
                updateValues(obj);

                if (state.value[device]['background-color'].includes('gradient')) {
                    deviceObj['background-type'] = 'gradient';
                    obj[device] = deviceObj;
                    updateValues(obj);
                }
            }

            if (state.value[device]['background-image']) {
                deviceObj['background-type'] = 'image';
                obj[device] = deviceObj;
                updateValues(obj);
            }
        }
    };

    const renderReset = () => {
        let reserBtnDisabled = true;
        let devices = ['desktop', 'mobile', 'tablet'];

        for (let device of devices) {

            if (state.value[device]['background-color'] !== defaultPropsValue[device]['background-image'] || state.value[device]['background-image'] !== defaultPropsValue[device]['background-color'] || state.value[device]['background-media'] !== defaultPropsValue[device]['background-media']) {
                reserBtnDisabled = false;
            }
        }

        return <div className="kmt-color-btn-reset-wrap">
            <button
                className="kmt-reset-btn components-button components-circular-option-picker__clear is-secondary is-small"
                disabled={reserBtnDisabled} onClick={e => {
                    e.preventDefault();
                    let value = JSON.parse(JSON.stringify(defaultPropsValue));

                    if (undefined !== value && '' !== value) {
                        for (let device in value) {
                            if (undefined === value[device]['background-color'] || '' === value[device]['background-color']) {
                                value[device]['background-color'] = '';
                            }

                            if (undefined === value[device]['background-image'] || '' === value[device]['background-image']) {
                                value[device]['background-image'] = '';
                            }

                            if (undefined === value[device]['background-media'] || '' === value[device]['background-media']) {
                                value[device]['background-media'] = '';
                            }
                        }
                    }

                    updateValues(value);

                }}>
                <span className="dashicons dashicons-image-rotate"></span>
            </button>
        </div>;
    };

    const onSelectImage = (media, key, backgroundType) => {
        let obj = {
            ...state.value
        };
        let deviceObj = {
            ...obj[key]
        };
        deviceObj['background-image'] = media.url;
        deviceObj['background-media'] = media.id;
        deviceObj['background-type'] = backgroundType;
        obj[key] = deviceObj;
        updateValues(obj);
    };

    const onChangeImageOptions = (mainKey, value, device, backgroundType) => {
        let obj = {
            ...state.value
        };
        let deviceObj = {
            ...obj[device]
        };
        deviceObj[mainKey] = value;
        deviceObj['background-type'] = backgroundType;
        obj[device] = deviceObj;
        updateValues(obj);
    };

    useEffect(() => {

        let devices = ['desktop', 'mobile', 'tablet'];
        for (let device of devices) {
            updateBackgroundType(device);
        }

    }, []);

    const renderSettings = (key) => {
        return <>
            <AstraColorPickerControl
                color={undefined !== state.value[key]['background-color'] && state.value[key]['background-color'] ? state.value[key]['background-color'] : ''}
                onChangeComplete={(color, backgroundType) => handleChangeComplete(color, key, backgroundType)}
                media={undefined !== state.value[key]['background-media'] && state.value[key]['background-media'] ? state.value[key]['background-media'] : ''}
                backgroundImage={undefined !== state.value[key]['background-image'] && state.value[key]['background-image'] ? state.value[key]['background-image'] : ''}
                backgroundAttachment={undefined !== state.value[key]['background-attachment'] && state.value[key]['background-attachment'] ? state.value[key]['background-attachment'] : ''}
                backgroundPosition={undefined !== state.value[key]['background-position'] && state.value[key]['background-position'] ? state.value[key]['background-position'] : ''}
                backgroundRepeat={undefined !== state.value[key]['background-repeat'] && state.value[key]['background-repeat'] ? state.value[key]['background-repeat'] : ''}
                backgroundSize={undefined !== state.value[key]['background-size'] && state.value[key]['background-size'] ? state.value[key]['background-size'] : ''}
                onSelectImage={(media, backgroundType) => onSelectImage(media, key, backgroundType)}
                onChangeImageOptions={(mainKey, value, backgroundType) => onChangeImageOptions(mainKey, value, key, backgroundType)}
                backgroundType={undefined !== state.value[key]['background-type'] && state.value[key]['background-type'] ? state.value[key]['background-type'] : 'color'}
                allowGradient={true} allowImage={true}
            />
        </>;
    };

    const handleChangeComplete = (color, key, backgroundType) => {
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
            ...state.value
        };
        let deviceObj = {
            ...obj[key]
        };
        deviceObj['background-color'] = value;
        deviceObj['background-type'] = backgroundType;
        obj[key] = deviceObj;
        updateValues(obj);
    };

    const {
        label,
        description
    } = props.control.params;
    let responsiveHtml = null;
    let inputHtml = null;

    let labelHtml = (label && '' !== label && undefined !== label) ? labelHtml = <span className="customize-control-title">{label}</span> : labelHtml = <span className="customize-control-title">{__('Background')}</span>;

    let descriptionHtml = (description && '' !== description && undefined !== description) ? <span className="description customize-control-description">{description}</span> : null;


    responsiveHtml = <ul className="kmt-responsive-btns">
        <li className="desktop active">
            <button type="button" className="preview-desktop" data-device="desktop" onClick={() => setDevice('tablet')}>
                <i className="dashicons dashicons-desktop"></i>
            </button>
        </li>
        <li className="tablet">
            <button type="button" className="preview-tablet" data-device="tablet" onClick={() => setDevice('mobile')}>
                <i className="dashicons dashicons-tablet"></i>
            </button>
        </li>
        <li className="mobile">
            <button type="button" className="preview-mobile" data-device="mobile" onClick={() => setDevice('desktop')}>
                <i className="dashicons dashicons-smartphone"></i>
            </button>
        </li>
    </ul>;

    inputHtml = <div className="background-wrapper">
        <div className="background-container desktop active">
            {renderSettings(device)}
        </div>
    </div>;

    return <>
        <label>
            {labelHtml}
            {descriptionHtml}
        </label>
        {responsiveHtml}
        {renderReset()}
        <div className="customize-control-content">
            {inputHtml}
        </div>
    </>;
};

ResponsiveBackground.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(ResponsiveBackground);