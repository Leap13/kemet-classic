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
import { humanizeVariations, familyForDisplay } from "./typography/helpers";

import TypographyModal from "./typography/typo-modal";

const getLeftForEl = (modal, el) => {
    if (!modal) return;
    if (!el) return;

    let style = getComputedStyle(modal);

    let wrapperLeft = parseFloat(style.left);

    el = el.getBoundingClientRect();

    return {
        "--option-modal-arrow-position": `${el.left + el.width / 2 - wrapperLeft - 6
            }px`,
    };
};

const Typography = ({ value, onChange, params: { label } }) => {

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
    const arrowLeft = useMemo(() => {
        const view = currentView;

        const futureRef =
            view === "options"
                ? fontSizeRef.current
                : view === "fonts"
                    ? fontFamilyRef.current
                    : view === "variations"
                        ? fontWeightRef.current
                        : fontSizeRef.current;

        return (
            popoverProps.ref &&
            popoverProps.ref.current &&
            getLeftForEl(popoverProps.ref.current, futureRef)
        );
    }, [
        isOpen,
        currentView,
        popoverProps.ref,
        popoverProps.ref && popoverProps.ref.current,
        fontFamilyRef && fontFamilyRef.current,
        fontWeightRef && fontFamilyRef.current,
        fontSizeRef && fontFamilyRef.current,
    ]);

    const updateValues = (obj) => {
        onChange(obj);
    };

    return (
        <div className={classnames("kmt-typography", {})}>
            <header>
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
                <span className="customize-control-title kmt-control-title">{label}</span>
            </header>
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
                                : familyForDisplay(value.family)}
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

                        >{humanizeVariations(value.variation)}</span>
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
                                            ...arrowLeft,
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
                                />
                            );
                        }}
                    </Transition>,
                    document.body
                )}
        </div>
    );
};
export default Typography;