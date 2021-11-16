import { useState } from "@wordpress/element";
import OutsideClickHandler from "../common/outside-component";
import classnames from "classnames";
import ColorComponent from "./color";
import { Fragment } from "react";
import Responsive from '../common/responsive';
const { __ } = wp.i18n;
const convert = (min, max, value) => Math.max(min, Math.min(max, value))

const BoxShadow = ({ value, onChange, params }) => {
    let { secondColor, label, responsive } = params;
    const [isOpen, setIsOpen] = useState(false);
    const [device, setDevice] = useState(wp.customize && wp.customize.previewedDevice() ? wp.customize.previewedDevice() : 'desktop');
    let defaultValue = {
        /* offset-x | offset-y | blur-radius | spread-radius | color */
        //secondColor: true,
        offsetX: "none",
        offsetY: "",
        blur: "",
        spread: "",
        color: "",
    };
    let ResDefaultParam = {
        desktop: { ...defaultValue },
        tablet: { ...defaultValue },
        mobile: { ...defaultValue },
    };

    let defaultValues = responsive ? ResDefaultParam : defaultValue;

    let defaultVals = params.default
        ? params.default
        : defaultValues;

    value = value ? value : defaultVals;


    const [state, setState] = useState(value);
    let shadowValue = responsive ? state[device] : state;

    const handleChangeComplete = (color, id) => {
        let obj = { ...state };
        let colorValue = responsive ? obj[device] : obj;
        (typeof color === "string") ?
            colorValue[id] = color
            : (
                undefined !== color.rgb &&
                undefined !== color.rgb.a &&
                1 !== color.rgb.a
            ) ?
                colorValue[id] = `rgba(${color.rgb.r},${color.rgb.g},${color.rgb.b},${color.rgb.a})`
                :
                colorValue[id] = color.hex

        setState(obj);
        onChange({ ...obj, flag: !value.flag });
    };
    const updateStyle = (style, name) => {
        let obj = { ...state };
        responsive ? obj[device][name] = style : obj[name] = style;
        setState(obj);
        onChange({ ...obj, flag: !value.flag })
    }
    return (
        <div className={`kmt-shadow-container`}>
            <header>
                {responsive ? (<Responsive
                    onChange={(currentDevice) => setDevice(currentDevice)}
                    label={label}
                />
                ) : <span className="customize-control-title kmt-control-title">{label}</span>}
            </header>
            <div className={`kmt-shadow__wrapper`}>
                <div className={classnames("kmt-option-shadow")}>
                    <div
                        // className={classnames("kmt-value-changer", {
                        //     ["active"]: isOpen,
                        //     ["kmt-disabled"]: shadowValue.style === "none",
                        // })}
                    >
                        <ColorComponent
                            onChangeComplete={(colorValue) =>
                                handleChangeComplete(colorValue, 'color')
                            }
                            picker={{
                                id: "default",
                                title: __("Initial", "kemet"),
                            }}
                            value={{ default: shadowValue.color }}
                        />
                        <input
                            type="number"
                            value={shadowValue.offsetX}
                            onChange={({ target: { value: offsetX } }) => {
                                updateStyle(convert(1, 10, parseInt(offsetX, 10) || 1), "offsetX")
                            }}
                        />

                        <input
                            type="number"
                            value={shadowValue.offsetY}
                            onChange={({ target: { value: offsetY } }) => {
                                updateStyle(convert(1, 10, parseInt(offsetY, 10) || 1), "offsetY")
                            }}
                        />

                        <input
                            type="number"
                            value={shadowValue.blur}
                            onChange={({ target: { value: blur } }) => {
                                updateStyle(convert(1, 10, parseInt(blur, 10) || 1), "blur")
                            }}
                        />

                        <input
                            type="number"
                            value={shadowValue.spread}
                            onChange={({ target: { value: spread } }) => {
                                updateStyle(convert(1, 10, parseInt(spread, 10) || 1), "spread")
                            }}
                        />

                        <span className="kmt-value-divider"></span>

                        <span
                            className="kmt-current-value"
                            data-style={shadowValue.inherit ? "none" : shadowValue.style}
                            onClick={() => setIsOpen(!isOpen)}
                        >
                            {shadowValue.style === "none" ? shadowValue.style : null}
                        </span>

                    </div>
                    {shadowValue.style !== "none" && <Fragment>
                        

                    </Fragment>}
                </div>
            </div>
        </div>
    );
};

export default BoxShadow;
