import { Fragment, useMemo, useRef, useState } from "@wordpress/element";
import OutsideComponent from "../common/outside-component";
const { __ } = wp.i18n;

import Dashicons from "../common/iconList";
import IconPickerModal from "./Icon-control/Modal";

export const packs = Dashicons;

const IconPicker = ({ value, onChange, params }) => {
    const correctIcon = useMemo(() => {
        return (value.icon || value.url) && packs
            ? (packs.find((icon) => icon === value.icon) || value.url)
            : null;
    }, [value]);

    let { label } = params;
    const el = useRef();
    let defaultValue = {
        icon: null,
    };

    const [searchString, setSearchString] = useState("");

    const [{ isPicking, isTransitioning }, setAnimationState] = useState({
        isPicking: null,
        isTransitioning: null,
    });
    console.log(value)

    const handleRemoveIcon = () => {
        value.source !== "attachment" ? onChange({ ...value, icon: '' }) : onChange({ ...value, url: '' });
    }
    return (
        <div className={`kmt-icon-container `}>
            <header>
                <span className="customize-control-title">{label}</span>
            </header>
            <div ref={el}>
                <div className={`kmt-icon__Wrapper`}>
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
                                    ? isPicking.split(":")[0] === "obj"
                                        ? null
                                        : `obj:${isPicking.split(":")[0]}`
                                    : "obj";

                                setAnimationState({
                                    isTransitioning: "obj",
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
                                {value.source === "attachment" && value.url && (
                                    <i className="kmt-icon-preview">
                                        <img src={value.url} />
                                    </i>
                                )}

                                <div>
                                    <span className="kmt-edit">
                                        <span className="kmt-tooltip-top">
                                            {__("Change Icon", "kemet")}
                                        </span>
                                    </span>
                                    <i className="divider"></i>
                                    <span
                                        className="kmt-remove"
                                        onClick={(e) => {
                                            e.preventDefault();
                                            e.stopPropagation();
                                            handleRemoveIcon()
                                        }}
                                    >
                                        <span className="kmt-tooltip-top">
                                            {__("Remove Icon", "kemet")}
                                        </span>
                                    </span>
                                </div>
                            </Fragment>
                        ) : (
                            <div >{__("Select", "emet")}</div>
                        )}
                    </OutsideComponent>
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
                </div>
                <IconPickerModal
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
    );
};


export default IconPicker;
