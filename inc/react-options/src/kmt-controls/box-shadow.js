import { useState } from "@wordpress/element";
import OutsideClickHandler from "../common/outside-component";
import classnames from "classnames";
import ColorComponent from "./color";
import { Fragment } from "react";
import Responsive from '../common/responsive';
import ResponsiveSliderComponent from './slider'
const { __ } = wp.i18n;

const BoxShadow = ({ 
    value, 
    onChange, 
    params, 
    defaults
}) => {
    let { secondColor, label, responsive } = params;
    const [isOpen, setIsOpen] = useState(false);
    const [device, setDevice] = useState(wp.customize && wp.customize.previewedDevice() ? wp.customize.previewedDevice() : 'desktop');
    let defaultValue = {
        /* offset-x | offset-y | blur-radius | spread-radius | color */
        //secondColor: true,
        offsetX: "",
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

    value = value ? value : defaultValues;


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
                            id="offsetX"
                            params={{
                                id: 'offsetX',
                                label: __('offsetX', 'kemet'),
                                value: 10,
                                responsive: true,
                                //default: default.offsetX ? default.offsetX : '',
                                unit_choices: {
                                    'px': {
                                        min: -100,
                                        max: 100,
                                        step: 1,
                                    },
                                },
                            }}
                            onChange={(newValue) =>
                                onChange({
                                    ...value,
                                    offsetX: newValue,
                                })
                            }
                        />
                    </div>
                    <div key="offsetY" className={`customize-control-kmt-slider`}>
                        <ResponsiveSliderComponent
                            value= {value.offsetY}
                            values={value}
                            id='offsetY'
                            params={{
                                id: 'offsetY',
                                label: __('offsetY', 'kemet'),
                                value: 0,
                                responsive: true,
                                unit_choices: {
                                    'px': {
                                        min: -100,
                                        max: 100,
                                       // step: 1,
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
                                responsive: true,
                                unit_choices: {
                                    'px': {
                                        min: -100,
                                        max: 100,
                                      //  step: 1,
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
                            value={value['spread']}
                            values={value}
                            id='spread'
                            params={{
                                id: 'spread',
                                label: __('Spread', 'kemet'),
                                value: 0,
                                responsive: true,
                                unit_choices: {
                                    'px': {
                                        min: -100,
                                        max: 100,
                                     //   step: 1,
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
    );
};

export default BoxShadow;
