import { useState } from "@wordpress/element";
import OutsideClickHandler from "../common/outside-component";
import classnames from "classnames";
import ResponsiveSliderComponent from './slider'
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
                        <div key="offsetX" className={`customize-control-kmt-slider`}>
                            <ResponsiveSliderComponent
                                value={value.offsetX}
                                values={value}
                                id='offsetX'
                                params={{
                                    id: 'offsetX',
                                    label: __('offsetX', 'kemet'),
                                    value: 0,
                                    value: 10,
                                    responsive: true,
                                    //default: default.offsetX ? default.offsetX : '',
                                    unit_choices: {
                                        'px': {
                                            min: -100,
                                            max: 100,
                                            // step: 1,
                                            step: 1,
                                        },
                                    },
                                }}
                                onChange={(newValue) =>
                                    onChange({
                                        ...value,
                                        offsetX: newValue,
                                    })}
                                
                        />
                    </div>
                        <div key="offsetY" className={`customize-control-kmt-slider`}>
                            <ResponsiveSliderComponent
                                value={value.offsetY}
                                values={value}
                                id='offsetY'
                                params={{
                                    id: 'offsetY',
                                    label: __('offsetY', 'kemet'),
                                    value: 0,
                                    value: 10,
                                    responsive: true,
                                    //default: default.offsetX ? default.offsetX : '',
                                    unit_choices: {
                                        'px': {
                                            min: -100,
                                            max: 100,
                                            // step: 1,
                                            step: 1,
                                        },
                                    },
                                }}
                                onChange={(newValue) =>
                                    onChange({
                                        ...value,
                                        offsetY: newValue,
                                    })}

                            />
                        </div>
                        <div key="blur" className={`customize-control-kmt-slider`}>
                            <ResponsiveSliderComponent
                                value={value.blur}
                                values={value}
                                id='blur'
                                params={{
                                    id: 'blur',
                                    label: __('Blur', 'kemet'),
                                    value: 0,
                                    value: 10,
                                    responsive: true,
                                    //default: default.offsetX ? default.offsetX : '',
                                    unit_choices: {
                                        'px': {
                                            min: -100,
                                            max: 100,
                                            // step: 1,
                                            step: 1,
                                        },
                                    },
                                }}
                                onChange={(newValue) =>
                                    onChange({
                                        ...value,
                                        blur: newValue,
                                    })}

                            />
                        </div>
                        <div key="spread" className={`customize-control-kmt-slider`}>
                            <ResponsiveSliderComponent
                                value={value.offsetY}
                                values={value}
                                id='spread'
                                params={{
                                    id: 'spread',
                                    label: __('spread', 'kemet'),
                                    value: 0,
                                    value: 10,
                                    responsive: true,
                                    //default: default.offsetX ? default.offsetX : '',
                                    unit_choices: {
                                        'px': {
                                            min: -100,
                                            max: 100,
                                            // step: 1,
                                            step: 1,
                                        },
                                    },
                                }}
                                onChange={(newValue) =>
                                    onChange({
                                        ...value,
                                        spread: newValue,
                                    })}

                            />
                        </div>
                <BoxShadowModal
                    el={el}
                    value={value}
                    onChange={onChange}
                    isPicking={isPicking}
                    isTransitioning={isTransitioning}
                    searchString={searchString}
                    setSearchString={setSearchString}
                    picker={{
                        id: "obj",
                    }}
                    onPickingChange={(isPicking) => {
                        setAnimationState({
                            isTransitioning: "obj",
                            isPicking,
                        });
                    }}
                    stopTransitioning={() =>
                        setAnimationState({
                            isPicking,
                            isTransitioning: false,
                        })
                    }
                />

                    </div>

                </div>
            </div>
        </div>
    );
};

export default BoxShadow;