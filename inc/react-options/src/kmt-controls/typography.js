import {
    createPortal,
    useRef,
    useMemo,
    useCallback,
    useState,
    useEffect,
} from "@wordpress/element";
import classnames from "classnames";
import OutsideComponent from "../common/outside-component";
import PopoverComponent from "../common/popover-component";
import { Transition } from "@react-spring/web";
import bezierEasing from "bezier-easing";
import { __ } from "@wordpress/i18n";
import { convertVariations, familyToDisplay } from "./typography/helpers";

import TypographyModal from "./typography/typo-modal";



const Typography = ({ value, onChange, params: { label, default: optionDefault } }) => {

    let defaultValue = {
        family: "System Default",
        variation: 'n4',
        size: {
            desktop: "15",
            "desktop-unit": "px",
            tablet: "",
            "tablet-unit": "px",
            mobile: "",
            "mobile-unit": "px",
        },
        "line-height": {
            desktop: "",
            "desktop-unit": "px",
            tablet: "",
            "tablet-unit": "px",
            mobile: "",
            "mobile-unit": "px",
        },
        "letter-spacing": {
            desktop: "",
            "desktop-unit": "px",
            tablet: "",
            "tablet-unit": "px",
            mobile: "",
            "mobile-unit": "px",
        },

        "text-transform": "none",
        "text-decoration": "none",
    };
    useEffect(() => {
        getInitialDevice();
    }, []);
    const getInitialDevice = () => {
        return wp.customize.previewedDevice();
    };
    defaultValue = optionDefault ? { ...defaultValue, ...optionDefault } : defaultValue
    value = value ? { ...defaultValue, ...value } : defaultValue;
    const [currentViewCache, setCurrentViewCache] = useState("_:_");
    const [device, setInnerDevice] = useState(getInitialDevice());
    const listener = () => {
        setInnerDevice(getInitialDevice());
    };
    useEffect(() => {
        if (wp.customize) {
            setInterval(() => wp.customize.previewedDevice.bind(listener), 1000);
        }
    })

    const typographyWrapper = useRef();

    let [currentView, previousView] = useMemo(
        () => currentViewCache.split(":"),
        [currentViewCache]
    );
    const [{ isOpen, isTransitioning }, setModalState] = useState({
        isOpen: false,
        isTransitioning: false,
    });

    const { styles, popoverProps } = PopoverComponent({
        ref: typographyWrapper,
        defaultHeight: 430,
        shouldCalculate: isTransitioning || isOpen,
    });
    const setCurrentView = useCallback(
        (newView) => setCurrentViewCache(`${newView}:${currentView}`),
        [currentView]
    );

    const setIsOpen = (isOpen) => {
        setModalState((state) => ({
            ...state,
            isOpen,
            isTransitioning: true,
        }));
    };

    const stopTransitioning = () =>
        setModalState((state) => ({
            ...state,
            isTransitioning: false,
        }));

    const fontFamilyRef = useRef();
    const fontSizeRef = useRef();
    const fontWeightRef = useRef();


    const updateValues = (obj) => {
        onChange(obj);
    };

    return (
        <div className={classnames("kmt-typography", {})}>
            <header>
                <span className="customize-control-title kmt-control-title">{label}</span>
            </header>
            <div className={`kmt-typography-wrapper`}>
                <OutsideComponent
                    disabled={!isOpen}
                    useCapture={false}
                    className="kmt-typohraphy-value"
                    additionalRefs={[popoverProps.ref]}
                    onOutsideClick={() => {
                        setIsOpen(false);
                        setCurrentView('')
                    }}
                    wrapperProps={{
                        ref: typographyWrapper,
                        onClick: (e) => {
                            e.preventDefault();

                        },
                    }}
                >
                    <div className={`kmt-typography-title-container`}>
                        <span
                            className={classnames("kmt-font", {
                                active: currentView === "fonts"
                            })}
                            ref={fontFamilyRef}
                            onClick={(e) => {
                                e.stopPropagation();

                                if (isOpen) {
                                    setCurrentView("fonts");
                                    return;
                                }
                                setCurrentViewCache("fonts:_");
                                setIsOpen("fonts");
                            }}
                        >
                            <span

                            >
                                {value.family === "Default"
                                    ? "Default Family"
                                    : familyToDisplay(value.family)}
                            </span>
                        </span>

                        <span
                            className={classnames('kmt-size', {
                                active: currentView === "options",
                            })}
                            ref={fontSizeRef}
                            onClick={(e) => {
                                e.stopPropagation();

                                if (isOpen) {
                                    setCurrentView("options");
                                    return;
                                }
                                setCurrentViewCache("options:_");
                                setIsOpen("font_size");
                            }}


                        >
                            <span

                            >
                                {`${value.size[device]}${value.size[`${device}-unit`]
                                    } `}
                            </span>
                        </span>

                        <span
                            ref={fontWeightRef}
                            className={classnames('kmt-weight', {
                                active: currentView === "variations"
                            })}

                            onClick={(e) => {
                                e.stopPropagation();

                                if (isOpen) {
                                    setCurrentView("variations");
                                    return;
                                }
                                setCurrentViewCache("variations:_");
                                setIsOpen("variations");
                            }}
                        >
                            <span

                            >{convertVariations(value.variation)}</span>
                        </span>
                    </div>


                </OutsideComponent>
                {(isTransitioning || isOpen) &&
                    createPortal(
                        <Transition
                            items={isOpen}
                            onRest={(isOpen) => {
                                stopTransitioning();
                            }}
                            config={{
                                duration: 100,
                                easing: bezierEasing(0.25, 0.1, 0.25, 1.0),
                            }}
                            from={
                                isOpen
                                    ? {
                                        transform: "scale3d(0.95, 0.95, 1)",
                                        opacity: 0,
                                    }
                                    : { opacity: 1 }
                            }
                            enter={
                                isOpen
                                    ? {
                                        transform: "scale3d(1, 1, 1)",
                                        opacity: 1,
                                    }
                                    : {
                                        opacity: 1,
                                    }
                            }
                            leave={
                                !isOpen
                                    ? {
                                        transform: "scale3d(0.95, 0.95, 1)",
                                        opacity: 0,
                                    }
                                    : {
                                        opacity: 1,
                                    }
                            }
                        >
                            {(style, item) => {
                                if (!item) {
                                    return null;
                                }

                                return (
                                    <TypographyModal
                                        wrapperProps={{
                                            style: {
                                                ...style,
                                                ...styles,

                                            },
                                            ...popoverProps,
                                        }}
                                        onChange={onChange}
                                        value={value}
                                        initialView={item}
                                        setInititialView={(initialView) =>
                                            setIsOpen(initialView)
                                        }
                                        currentView={currentView}
                                        previousView={previousView}
                                        setCurrentView={setCurrentView}
                                        defaults={defaultValue}
                                    />
                                );
                            }}
                        </Transition>,
                        document.body
                    )}

                <div className={`kmt-btn-reset-wrap`}>
                    <button
                        className="kmt-reset-btn "
                        disabled={
                            JSON.stringify(value) ===
                            JSON.stringify(defaultValue)
                        }
                        onClick={(e) => {
                            e.preventDefault();
                            let resetValue = JSON.parse(
                                JSON.stringify(defaultValue)
                            );
                            if (undefined === resetValue || "" === resetValue) {
                                resetValue = "unset";
                            }
                            updateValues(resetValue);
                            setCurrentView("")
                        }}
                    ></button>
                </div>
            </div>
        </div>
    );
};
export default Typography;