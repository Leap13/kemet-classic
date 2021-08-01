import PropTypes from 'prop-types';
import { useState } from 'react';
import { Dashicon } from '@wordpress/components';
import KemetColorPickerControl from '../common/color';
import { __ } from '@wordpress/i18n';

const BackgroundComponent = props => {

    let ResDefaultParam = {
        backgroundImage: "",
        backgroundPosition: "",
        backgroundRepeat: "",
        backgroundSize: "",
        backgroundAttachment: ""
    }
    let defaultValue = {
        desktop: {
            backgroundImage: "",
            backgroundPosition: "",
            backgroundRepeat: "",
            backgroundSize: "",
            backgroundAttachment: ""
        },
        tablet: {
            backgroundImage: "",
            backgroundPosition: "",
            backgroundRepeat: "",
            backgroundSize: "",
            backgroundAttachment: ""
        },
        mobile: {
            backgroundImage: "",
            backgroundPosition: "",
            backgroundRepeat: "",
            backgroundSize: "",
            backgroundAttachment: ""
        }
    }


    let defaultVals = props.control.params.default
        ? {
            ...defaultValues,
            ...props.control.params.default,
        }
        : defaultValues;

    value = value
        ? {
            ...defaultVals,
            ...value,
        }
        : defaultVals
        ;
    let defaultValues = responsive ? responsiveDefault : defaultValue;
    const [props_value, setPropsValue] = useState(defaultValues);

    console.log(props_value)
    const renderReset = () => {
        return <span className="customize-control-title">

            <div className="kmt-color-btn-reset-wrap">
                <button
                    className="kmt-reset-btn components-button components-circular-option-picker__clear is-secondary is-small"
                    disabled={JSON.stringify(props_value) === JSON.stringify(props.control.params.default)} onClick={e => {
                        e.preventDefault();
                        let value = JSON.parse(JSON.stringify(props.control.params.default));

                        if (undefined !== value && '' !== value) {
                            if (undefined === value['background-color'] || '' === value['background-color']) {
                                value['background-color'] = '';
                            }

                            if (undefined === value['background-image'] || '' === value['background-image']) {
                                value['background-image'] = '';
                            }

                            if (undefined === value['background-media'] || '' === value['background-media']) {
                                value['background-media'] = '';
                            }
                        }

                        props.control.setting.set(value);
                        setPropsValue(value);
                    }}>
                    <Dashicon icon='image-rotate' />
                </button>
            </div>
            <label>
                {labelHtml}
                {descriptionHtml}
            </label>
        </span>;
    };

    const onSelectImage = (media, backgroundType) => {
        let obj = {
            ...props_value
        };
        obj['background-media'] = media.id;
        obj['background-image'] = media.url;
        obj['background-type'] = backgroundType;
        props.control.setting.set(obj);
        setPropsValue(obj);
    };

    const onChangeImageOptions = (mainKey, value, backgroundType) => {
        let obj = {
            ...props_value
        };
        obj[mainKey] = value;
        obj['background-type'] = backgroundType;
        props.control.setting.set(obj);
        setPropsValue(obj);
    };

    const renderSettings = () => {
        return <>
            <KemetColorPickerControl
                color={undefined !== props_value['background-color'] && props_value['background-color'] ? props_value['background-color'] : ''}
                onChangeComplete={(color, backgroundType) => handleChangeComplete(color, backgroundType)}
                media={undefined !== props_value['background-media'] && props_value['background-media'] ? props_value['background-media'] : ''}
                backgroundImage={undefined !== props_value['background-image'] && props_value['background-image'] ? props_value['background-image'] : ''}
                backgroundAttachment={undefined !== props_value['background-attachment'] && props_value['background-attachment'] ? props_value['background-attachment'] : ''}
                backgroundPosition={undefined !== props_value['background-position'] && props_value['background-position'] ? props_value['background-position'] : ''}
                backgroundRepeat={undefined !== props_value['background-repeat'] && props_value['background-repeat'] ? props_value['background-repeat'] : ''}
                backgroundSize={undefined !== props_value['background-size'] && props_value['background-size'] ? props_value['background-size'] : ''}
                onSelectImage={(media, backgroundType) => onSelectImage(media, backgroundType)}
                onChangeImageOptions={(mainKey, value, backgroundType) => onChangeImageOptions(mainKey, value, backgroundType)}
                backgroundType={undefined !== props_value['background-type'] && props_value['background-type'] ? props_value['background-type'] : 'color'}
                allowGradient={true}
                allowImage={true} />
        </>;
    };

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
        obj['background-color'] = value;
        obj['background-type'] = backgroundType;
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


        <div className="customize-control-content">
            {inputHtml}
        </div>
    </>;

};

BackgroundComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(BackgroundComponent);