import PropTypes from "prop-types";
import { useState, useEffect } from "react";
import { Dashicon } from "@wordpress/components";
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
        "background-type": "color",
        "background-gradient": "",
    };

    let ResDefaultParam = {
        desktop: { ...defaultValue },
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
        setPropsValue(obj);
        props.onChange({ ...obj, flag: !value.flag });
    };

    let responsiveHtml = responsive ? (
        <Responsive onChange={(device) => setDevice(device)} />
    ) : null;

    const renderReset = () => {
        return (
            <header >
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
                <label>
                    {labelHtml}
                    {descriptionHtml}
                </label>
                {responsiveHtml}
            </header>
        );
    };

    const onSelectImage = (media) => {
        let obj = {
            ...props_value,
        };
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
        if (responsive) {
            obj[device][mainKey] = value;
        } else {
            obj[mainKey] = value;
        }
        updateValue(obj);
    };
    const onSelectType = (type) => {
        let obj = {
            ...props_value,
        };
        if (responsive) {
            obj[device]["background-type"] = type;
        } else {
            obj["background-type"] = type;
        }
        updateValue(obj);
    };

    const renderSettings = () => {
        let renderBackground = responsive ? props_value[device] : props_value;

        return (
            <>
                <Background
                    text={__("Background", "Kemet")}
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
                    onSelectImage={(media) => onSelectImage(media)}
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
        if (responsive) {
            obj[device]["background-gradient"] = gradient;
        } else {
            obj["background-gradient"] = gradient;
        }
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
            {label ? label : __("Background")}
        </span>
    );
    let descriptionHtml = description ? (
        <span className="description customize-control-description">
            {description}
        </span>
    ) : null;
    let inputHtml = null;
    inputHtml = (
        <div className="background-container">
            {renderReset()}
            {renderSettings()}
        </div>
    );

    return <>{inputHtml}</>;
};

BackgroundComponent.propTypes = {
    control: PropTypes.object.isRequired,
};

export default React.memo(BackgroundComponent);