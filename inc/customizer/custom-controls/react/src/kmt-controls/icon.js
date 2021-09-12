import { Fragment, useMemo, useRef, useState } from "@wordpress/element";
import OutsideComponent from "../common/outside-component";
const { __, sprintf } = wp.i18n;

import Dashicons from "../common/iconList";
import IconPickerModal from "./Icon-control/Modal";

export const packs = Dashicons;

const IconPicker = ({ value, onChange, params, option }) => {
    const correctIcon = useMemo(() => {
        return value.icon && packs
            ? packs.find((icon) => icon === value.icon)
            : null;
    }, [value.icon]);

    let { label } = params;
    const el = useRef();
    let defaultValue = {
        icon: "",
    };
    const [searchString, setSearchString] = useState("");

    const [{ isPicking, isTransitioning }, setAnimationState] = useState({
        isPicking: null,
        isTransitioning: null,
    });

    return (
        <div className={`kmt-icon-container `}>
            <header>
                <div className="kmt-btn-reset-wrap">
                    <button
                        className="kmt-reset-btn "
                        disabled={
                            JSON.stringify(defaultValue) ===
                            JSON.stringify(value)
                        }
                        onClick={(e) => {
                            e.preventDefault();
                            onChange({ ...defaultValue });
                        }}
                    ></button>
                </div>
                <span className="customize-control-title">{label}</span>
            </header>
            <div ref={el}>
                <OutsideComponent
                    useCapture={false}
                    disabled={!isPicking}
                    className="kmt-icon-picker-value"
                    additionalRefs={[]}
                    onOutsideClick={(e) => {
                        if (!isPicking) {
                            return;
                        }
                        if (e.target.closest(".media-modal-content")) {
                            return;
                        }
                        setAnimationState({
                            isTransitioning: isPicking.split(":")[0],
                            isPicking: null,
                        });
                    }}
                    wrapperProps={{
                        onClick: (e) => {
                            e.preventDefault();

                            let futureIsPicking = isPicking
                                ? isPicking.split(":")[0] === "opts"
                                    ? null
                                    : `opts:${isPicking.split(":")[0]}`
                                : "opts";

                            setAnimationState({
                                isTransitioning: "opts",
                                isPicking: futureIsPicking,
                            });

                            setSearchString("");
                        },
                    }}
                >
                    {correctIcon ? (
                        <Fragment>
                            {value.source !== "attachment" && (
                                <i
                                    className={`kmt-icon-preview ${value.icon}`}
                                />
                            )}

                            {value.source === "attachment" && (
                                <i className="kmt-icon-preview">
                                    <img src={value.url} />
                                </i>
                            )}

                            <div>
                                <span className="kmt-edit">
                                    <span className="kmt-tooltip-top">
                                        {__("Change Icon", "Kemet")}
                                    </span>
                                </span>

                                <i className="divider"></i>

                                <span
                                    className="kmt-remove"
                                    onClick={(e) => {
                                        e.preventDefault();
                                        e.stopPropagation();
                                        onChange({
                                            ...value,
                                            icon: "",
                                        });
                                    }}
                                >
                                    <span className="kmt-tooltip-top">
                                        {__("Remove Icon", "Kemet")}
                                    </span>
                                </span>
                            </div>
                        </Fragment>
                    ) : (
                        <div>{__("Select", "Kemet")}</div>
                    )}
                </OutsideComponent>

                <IconPickerModal
                    el={el}
                    value={value}
                    onChange={onChange}
                    option={option}
                    isPicking={isPicking}
                    isTransitioning={isTransitioning}
                    searchString={searchString}
                    setSearchString={setSearchString}
                    picker={{
                        id: "opts",
                    }}
                    onPickingChange={(isPicking) => {
                        setAnimationState({
                            isTransitioning: "opts",
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
    );
};

IconPicker.ControlEnd = () => {
    return <div className="kmt-color-modal-wrapper" />;
};

export default IconPicker;
