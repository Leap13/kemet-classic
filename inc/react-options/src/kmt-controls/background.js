import PropTypes from "prop-types";
import { useState, useEffect } from "react";
import Background from "./kmt-background";
import { __ } from "@wordpress/i18n";
import Responsive from "../common/responsive";

const BackgroundComponent = (props) => {
    let value = props.value;
    let responsive = props.params.responsive;
    let defaultValue = {
        "background-attachment": "",
        "background-color": "",
        "background-image": "",
        "background-media": "",
        "background-position": { x: "", y: "" },
        "background-repeat": "",
        "background-size": "",
        "background-type": "",
        "background-gradient": "",
    };

    let ResDefaultParam = {
        desktop: { ...defaultValue, "background-type": "color" },
        tablet: { ...defaultValue },
        mobile: { ...defaultValue },
    };

    let defaultValues = responsive ? ResDefaultParam : defaultValue;

    let defaultVals = props.params.default
        ? props.params.default
        : defaultValues;

    value = value ? value : defaultVals;
    const [props_value, setPropsValue] = useState(value);
    const [device, setDevice] = useState("desktop");

    const updateValue = (obj) => {
        if (responsive) {
            if (device === 'tablet') {
                obj.tablet = overwriteValues(obj.tablet, obj.desktop);
                obj.mobile = overwriteValues(obj.mobile, obj.tablet);
            }
        }
        setPropsValue(obj);
        props.onChange({ ...obj, flag: !value.flag });
    };

    let responsiveHtml = responsive ? (
        <Responsive onChange={(device) => setDevice(device)} />
    ) : null;

    const renderReset = () => {
        return (
            <header >
                <label>
                    {labelHtml}
                    {descriptionHtml}
                </label>
                {responsiveHtml}
            </header>
        );
    };

    const onSelectImage = (media) => {
        let obj = { ...props_value };
        if (responsive) {
            obj[device]["background-media"] = media.id;
            obj[device]["background-image"] = media.url;
        } else {
            obj["background-media"] = media.id;
            obj["background-image"] = media.url;
        }
        updateValue(obj);
    };

    const onChangeImageOptions = (mainKey, value) => {
        let obj = {
            ...props_value,
        };
        responsive ? obj[device][mainKey] = value : obj[mainKey] = value;
        updateValue(obj);
    };
    const onSelectType = (type) => {
        let obj = {
            ...props_value,
        };
        responsive ? obj[device]["background-type"] = type : obj["background-type"] = type;
        updateValue(obj);
    };

    const overwriteValues = (obj1, obj2) => {
        const obj3 = {};
        obj3['background-attachment'] = obj1['background-attachment'] ? obj1['background-attachment'] : obj2['background-attachment'];
        obj3['background-color'] = obj1['background-color'] ? obj1['background-color'] : obj2['background-color'];
        obj3['background-image'] = obj1['background-image'] ? obj1['background-image'] : obj2['background-image'];
        obj3['background-media'] = obj1['background-media'] ? obj1['background-media'] : obj2['background-media'];
        obj3['background-position'] = obj1['background-position'] ? obj1['background-position'] : obj2['background-position'];
        obj3['background-repeat'] = obj1['background-repeat'] ? obj1['background-repeat'] : obj2['background-repeat'];
        obj3['background-size'] = obj1['background-size'] ? obj1['background-size'] : obj2['background-size'];
        obj3['background-type'] = obj1['background-type'] ? obj1['background-type'] : obj2['background-type'];
        obj3['background-gradient'] = obj1['background-gradient'] ? obj1['background-gradient'] : obj2['background-gradient'];

        return obj3;
    }
    const renderSettings = () => {
        let value = { ...props_value };
        if (responsive) {
            value.tablet = overwriteValues(value.tablet, value.desktop);
            value.mobile = overwriteValues(value.mobile, value.tablet);
        }
        let renderBackground = responsive ? value[device] : value;

        return (
            <>
                <Background
                    text={__("Background", "kemet")}
                    onSelect={(type) => onSelectType(type)}
                    color={
                        undefined !== renderBackground["background-color"] &&
                            renderBackground["background-color"]
                            ? renderBackground["background-color"]
                            : ""
                    }
                    gradient={
                        undefined !== renderBackground["background-gradient"] &&
                            renderBackground["background-gradient"]
                            ? renderBackground["background-gradient"]
                            : ""
                    }
                    onChangeComplete={(color) => handleChangeComplete(color)}
                    onChangeGradient={(gradient) =>
                        handleChangeGradient(gradient)
                    }
                    media={
                        undefined !== renderBackground["background-media"] &&
                            renderBackground["background-media"]
                            ? renderBackground["background-media"]
                            : ""
                    }
                    backgroundImage={
                        undefined !== renderBackground["background-image"] &&
                            renderBackground["background-image"]
                            ? renderBackground["background-image"]
                            : ""
                    }
                    backgroundAttachment={
                        undefined !==
                            renderBackground["background-attachment"] &&
                            renderBackground["background-attachment"]
                            ? renderBackground["background-attachment"]
                            : ""
                    }
                    backgroundPosition={
                        undefined !== renderBackground["background-position"] &&
                            renderBackground["background-position"]
                            ? renderBackground["background-position"]
                            : ""
                    }
                    backgroundRepeat={
                        undefined !== renderBackground["background-repeat"] &&
                            renderBackground["background-repeat"]
                            ? renderBackground["background-repeat"]
                            : ""
                    }
                    backgroundSize={
                        undefined !== renderBackground["background-size"] &&
                            renderBackground["background-size"]
                            ? renderBackground["background-size"]
                            : ""
                    }
                    onSelectImg={(media) => onSelectImage(media)}
                    onChangeImageOptions={(mainKey, value) =>
                        onChangeImageOptions(mainKey, value)
                    }
                    backgroundType={
                        undefined !== renderBackground["background-type"] &&
                            renderBackground["background-type"]
                            ? renderBackground["background-type"]
                            : "color"
                    }
                />
            </>
        );
    };
    const handleChangeGradient = (gradient) => {
        let obj = {
            ...props_value,
        };
        responsive ? obj[device]["background-gradient"] = gradient : obj["background-gradient"] = gradient;

        updateValue(obj);
    };

    const handleChangeComplete = (color) => {
        let value = "";
        if (color) {
            if (typeof color === "string" || color instanceof String) {
                value = color;
            } else if (
                undefined !== color.rgb &&
                undefined !== color.rgb.a &&
                1 !== color.rgb.a
            ) {
                value = `rgba(${color.rgb.r},${color.rgb.g},${color.rgb.b},${color.rgb.a})`;
            } else {
                value = color.hex;
            }
        }

        let obj = {
            ...props_value,
        };
        if (responsive) {
            obj[device]["background-color"] = value;
        } else {
            obj["background-color"] = value;
        }
        updateValue(obj);
    };

    const { label, description } = props.params;

    let labelHtml = (
        <span className="customize-control-title kmt-control-title">
            {label ? label : __("Background", "kemet")}
        </span>
    );
    let descriptionHtml = (description && description !== "") ? (
        <span className="description customize-control-description">
            {description}
        </span>
    ) : null;
    let inputHtml = null;
    inputHtml = (
        <div className="background-container">
            {renderReset()}
            {renderSettings()}
            <div className="kmt-background-btn-reset-wrap">
                <button
                    className="kmt-reset-btn "
                    disabled={
                        JSON.stringify(props_value) ===
                        JSON.stringify(defaultVals)
                    }
                    onClick={(e) => {
                        e.preventDefault();
                        updateValue(defaultVals);
                    }}
                >
                </button>
            </div>
        </div>
    );

    return <>{inputHtml}</>;
};

BackgroundComponent.propTypes = {
    control: PropTypes.object.isRequired,
};

export default React.memo(BackgroundComponent);