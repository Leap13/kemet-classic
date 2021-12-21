import { useState, useRef } from "@wordpress/element";
import OutsideClickHandler from "../common/outside-component";
import classnames from "classnames";
import ColorComponent from "./color";
import Responsive from '../common/responsive';
import BoxShadowModal from './boxshadow/modal';
const { __ } = wp.i18n;
const convert = (min, max, value) => Math.max(min, Math.min(max, value))

const BoxShadow = ({ value, onChange, params }) => {
    let { secondColor, label, responsive } = params;
     const [{ isPicking, isTransitioning }, setAnimationState] = useState({
        isPicking: null,
        isTransitioning: null,
    })
    const [isOpen, setIsOpen] = useState(false);
    const [device, setDevice] = useState(wp.customize && wp.customize.previewedDevice() ? wp.customize.previewedDevice() : 'desktop');
    let defaultValue = {
        /* offset-x | offset-y | blur-radius | spread-radius | color */

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
    const colorPicker = useRef()
    const modalRef = useRef()
    const el = useRef();

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
                            innerRef={colorPicker}
                            onChangeComplete={(colorValue) =>
                                handleChangeComplete(colorValue, 'color')
                            }
                            picker={{
                                id: "default",
                                title: __("Initial", "kemet"),
                            }}
                            value={{ default: shadowValue.color }}
                        />

                        <OutsideClickHandler
				useCapture={false}
				disabled={!isPicking}
                onOutsideClick={() => {
					if (!isPicking) {
						return
					}

					setAnimationState({
						isTransitioning: isPicking.split(':')[0],
						isPicking: null,
					})
				}}
				className="kmt-box-shadow-values"
				additionalRefs={[colorPicker, modalRef]}
                wrapperProps={{
                            onClick: (e) => {
                                e.preventDefault();
                                let futureIsPicking = isPicking
                                    ? isPicking.split(":")[0] === "obj"
                                        ? null
                                        : `obj:${isPicking.split(":")[0]}`
                                    : "obj";

                                setAnimationState({
                                    isTransitioning: "obj",
                                    isPicking: futureIsPicking,
                                });

                            },
                        }}
				>
				<span>	
                             { __('Adjust', 'kemet')}
				</span>
			</OutsideClickHandler>
             <BoxShadowModal
                            el={el}
                            value={value}
                            onChange={(value) =>
                                onChange({
                                    ...value,
                                    inherit: false,
                                })
                            }
                            isPicking={isPicking}
                            isTransitioning={isTransitioning}
                            picker={{
                                id: 'obj',
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

export default BoxShadow;