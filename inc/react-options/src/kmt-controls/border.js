import { useState } from "@wordpress/element";
import OutsideClickHandler from "../common/outside-component";
import classnames from "classnames";
import ColorComponent from "./color";
import { Fragment } from "react";
import Responsive from '../common/responsive';
const { __ } = wp.i18n;
const convert = (min, max, value) => Math.max(min, Math.min(max, value))

const Border = ({ value, onChange, params }) => {
    let { secondColor, label, responsive = true } = params;
    const [isOpen, setIsOpen] = useState(false);
    const [device, setDevice] = useState(wp.customize && wp.customize.previewedDevice() ? wp.customize.previewedDevice() : 'desktop');
    let defaultValue = {
        secondColor: true,
        style: "none",
        width: "",
        color: "",
        secondColor: "",
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
    let borderValue = responsive ? state[device] : state;

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
        <div className={`kmt-border-container`}>
            <header>
                {responsive ? (<Responsive
                    onChange={(currentDevice) => setDevice(currentDevice)}
                    label={label}
                />
                ) : <span className="customize-control-title kmt-control-title">{label}</span>}
            </header>
            <div className={`kmt-border__wrapper`}>
                <div className={classnames("kmt-option-border")}>
                    <div
                        className={classnames("kmt-value-changer", {
                            ["active"]: isOpen,
                            ["kmt-disabled"]: borderValue.style === "none",
                        })}
                    >
                        <input
                            type="number"
                            value={borderValue.width}
                            onChange={({ target: { value: width } }) => {
                                updateStyle(convert(1, 10, parseInt(width, 10) || 1), "width")
                            }}
                        />

                        <span className="kmt-value-divider"></span>

                        <span
                            className="kmt-current-value"
                            data-style={borderValue.inherit ? "none" : borderValue.style}
                            onClick={() => setIsOpen(!isOpen)}
                        >
                            {borderValue.style === "none" ? borderValue.style : null}
                        </span>
                        <OutsideClickHandler
                            disabled={!isOpen}
                            onOutsideClick={() => {
                                if (!isOpen) return;
                                setIsOpen(false);
                            }}
                        >
                            <ul className="kmt-styles-list">
                                {["solid", "dashed", "dotted", "none"]
                                    .reduce(
                                        (current, el, index) => [
                                            ...current.slice(
                                                0,
                                                index % 2 === 0 ? undefined : -1
                                            ),
                                            ...(index % 2 === 0
                                                ? [[el]]
                                                : [
                                                    [
                                                        current[
                                                        current.length - 1
                                                        ][0],
                                                        el,
                                                    ],
                                                ]),
                                        ],
                                        []
                                    )
                                    .map((group) =>
                                    (
                                        <li key={group[0]}>
                                            {group.map((style) => (
                                                <span
                                                    className={classnames({
                                                        active:
                                                            style === borderValue.style,
                                                    })}
                                                    key={style}
                                                    onClick={() => {
                                                        updateStyle(style, "style")
                                                        setIsOpen(false);
                                                    }}
                                                    data-style={style}
                                                >
                                                    {style === "none"
                                                        ? __("None", "kemet")
                                                        : null}
                                                </span>
                                            ))}
                                        </li>
                                    ))}
                            </ul>
                        </OutsideClickHandler>
                    </div>
                    {borderValue.style !== "none" && <Fragment>
                        <ColorComponent
                            onChangeComplete={(colorValue) =>
                                handleChangeComplete(colorValue, 'color')
                            }
                            picker={{
                                id: "default",
                                title: __("Initial", "kemet"),
                            }}
                            value={{ default: borderValue.color }}
                        />

                        {secondColor && (
                            <ColorComponent
                                onChangeComplete={(colorValue) =>
                                    handleChangeComplete(colorValue, 'secondColor')
                                }
                                picker={{
                                    id: "default",
                                    title: __("Hover", "kemet"),
                                }}
                                value={{ default: borderValue.secondColor }}
                            />
                        )}
                    </Fragment>}
                </div>
                <div className="kmt-btn-reset-wrap">
                    <button
                        className="kmt-reset-btn "
                        disabled={
                            JSON.stringify(defaultVals) ===
                            JSON.stringify(state)
                        }
                        onClick={(e) => {
                            e.preventDefault();
                            setState({ ...defaultVals });
                            onChange({ ...defaultVals });
                        }}
                    ></button>
                </div>
            </div>
        </div>
    );
};

export default Border;
