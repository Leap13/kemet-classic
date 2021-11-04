import { createPortal, useRef, useState } from "@wordpress/element";
import PalettePreview from "./color-palettes/PalettePreview";
import AddPaletteContainer from "./color-palettes/AddPaletteContainer";
import ColorPalettesModal from "./color-palettes/ColorPalettesModal";
import usePopoverMaker from "../common/popover-component";
import OutsideClickHandler from "../common/outside-component";
import { Transition } from "@react-spring/web";
import bezierEasing from "bezier-easing";
const { __, sprintf } = wp.i18n;
import { Modal } from '@wordpress/components';
import classnames from "classnames";

const ColorPalettes = ({
    value,
    onChange,
    params: { label, link },
}) => {
    const [state, setState] = useState(value);
    const colorPalettesWrapper = useRef();
    const buttonRef = useRef();

    const [{ isOpen, isTransitioning }, setModalState] = useState({
        isOpen: false,
        isTransitioning: false,
    });

    const [currentView, setCurrentView] = useState("");
    const [openModal, setOpenModal] = useState(false)
    const [delPalette, setDelPalette] = useState()
    const { styles, popoverProps } = usePopoverMaker({
        ref: currentView === "add" ? buttonRef : colorPalettesWrapper,
        defaultHeight: 430,
        shouldCalculate: isTransitioning || isOpen,
    });




    const handleChangePalette = (active) => {
        let currentPalette = active.palettes.find(
            ({ id }) => id === active.current_palette
        );
        let { id, skin, type, name, ...colors } = { ...currentPalette };
        Object.values(colors).map((item, index) => {
            document.documentElement.style.setProperty(
                `--paletteColor${index + 1}`,
                item
            );
            return item;
        });
        setState(active);
        onChange({ ...active, flag: !value.flag });
    };

    const handleChangeComplete = (color, index) => {
        let newValue = { ...state };
        newValue[index] = color;
        let { current_palette, palettes, ...colors } = newValue;
        Object.values(colors).map((item, index) => {
            document.documentElement.style.setProperty(
                `--paletteColor${index + 1}`,
                item
            );
            return item;
        });
        setState({ ...state, ...colors, current_palette, palettes });
        onChange({
            ...state,
            ...colors,
            flag: !value.flag,
            current_palette,
            palettes,
        });
    };

    const handleAddPalette = (data) => {
        let { current_palette, palettes, ...colors } = { ...state };

        let newPalette = {
            id: palettes.length + 1,
            ...colors,
            type: "custom",
            skin: data.type,
            name: data.name,
        };
        palettes.splice(0, 0, newPalette);
        onChange({
            ...value,
            flag: !value.flag,
        });
        setModalState(() => ({
            isOpen: null,
            isTransitioning: false,
        }))
    };

    const handleDeletePalette = (id) => {
        setOpenModal(true)
        const deletePalette = value.palettes.filter((palette) => {
            return palette.id === id;
        });

        setDelPalette({ ...deletePalette })

    };

    const ConfirmDelete = () => {

        let newPalette = value.palettes.filter((palette) => {
            return palette.id !== delPalette[0].id;
        });
        setState({ ...value, palettes: newPalette });
        onChange({ ...value, palettes: newPalette });
        setOpenModal(false)
    }

    const handleResetColor = (id) => {
        let updateState = {
            ...state,
        };
        let currentPalette = updateState.palettes.find(
            ({ id }) => id === updateState.current_palette
        );
        let resetColor = currentPalette[id];
        handleChangeComplete(resetColor, id);
    };

    return (
        <div>
            <header>
                <span className="customize-control-title kmt-control-title">
                    {label}
                </span>
                {label && <a href={link}> </a>}
            </header>
            <OutsideClickHandler
                disabled={!isOpen}
                useCapture={false}
                className="kmt-palettes-outside"
                additionalRefs={[popoverProps.ref]}
                onOutsideClick={(e) => {

                    if (
                        e.target.closest(".kmt-color-picker-modal") ||
                        e.target.classList.contains("kmt-color-picker-modal") ||
                        e.target.closest(".kmt-option-modal")
                    ) {
                        return;
                    }
                    setModalState(() => ({
                        isOpen: null,
                        isTransitioning: null,
                    }))
                    setCurrentView(" ");
                }}
                wrapperProps={{
                    ref: colorPalettesWrapper,

                }}
            >
                <div className={`kmt-palettes-preview`}>
                    <PalettePreview
                        onClick={() => {
                            if (!state.palettes) {
                                return;
                            }
                            setModalState(() => ({
                                isOpen: null,
                                isTransitioning: null,
                            }))
                        }}
                        value={state}
                        onChange={(v, id) => handleChangeComplete(v, id)}
                        skipModal={false}
                        handleClickReset={(val) => {
                            handleResetColor(val);
                        }}
                    />
                    <div className={`kmt-palette-toggle-modal `}
                        onClick={(e) => {
                            e.preventDefault();
                            setModalState(() => ({
                                isOpen: !isOpen,
                                isTransitioning: null,
                            }))
                            setCurrentView(!isOpen ? "modal" : "");
                        }}
                    >
                        <header>
                            {__(`Select Another Palette`, "kemet")}
                        </header>
                        <span
                            className={classnames(`kmt-button-open-palette`, { active: currentView === "modal" })}
                        ></span>
                    </div>

                </div>
                {isOpen &&
                    <ColorPalettesModal
                        wrapperProps={{
                            style: {

                                ...styles
                            },

                        }}
                        onChange={(val) => {
                            setModalState(() => ({
                                isOpen: false,
                                isTransitioning: null,
                            }))
                            handleChangePalette(val);
                            setCurrentView("")
                        }}
                        value={state}
                        option={state}
                        handleDeletePalette={(id) => handleDeletePalette(id)}

                    />}
            </OutsideClickHandler>
            <OutsideClickHandler
                disabled={!isTransitioning}
                useCapture={false}
                className="kmt-button-palettes-outside"
                additionalRefs={[popoverProps.ref]}
                onOutsideClick={(e) => {
                    if (
                        e.target.closest(".kmt-color-picker-modal") ||
                        e.target.classList.contains("kmt-color-picker-modal") ||
                        e.target.closest(".kmt-option-modal")
                    ) {
                        return;
                    }
                    setModalState(() => ({
                        isOpen: null,
                        isTransitioning: null,
                    }))
                    setCurrentView(" ");
                }}
                wrapperProps={{
                    ref: buttonRef,
                    onClick: (e) => {
                        e.preventDefault();
                        if (
                            e.target.closest(".kmt-color-picker-modal") ||
                            e.target.classList.contains("kmt-color-picker-modal")
                        ) {
                            return;
                        }
                        if (!state.palettes) {
                            return;
                        }
                        setModalState(() => ({
                            isOpen: null,
                            isTransitioning: true,
                        }))
                    },
                }}
            >
                <button
                    className={`kmt-button-palette`}
                    onClick={(e) => {
                        e.stopPropagation();
                        e.preventDefault();
                        setCurrentView("add");
                        setModalState(() => ({
                            isOpen: null,
                            isTransitioning: true,
                        }))

                    }}
                >

                    {__('Save New Palette', "kemet")}
                </button>
            </OutsideClickHandler>
            {isTransitioning && currentView === "add" &&
                createPortal(
                    <Transition
                        items={isTransitioning}
                        // onRest={(isOpen) => {
                        //     stopTransitioning();
                        // }}
                        config={{
                            duration: 100,
                            easing: bezierEasing(0.25, 0.1, 0.25, 1.0),
                        }}
                        from={
                            isTransitioning
                                ? {
                                    transform: "scale3d(0.95, 0.95, 1)",
                                    opacity: 0,
                                }
                                : { opacity: 1 }
                        }
                        enter={
                            isTransitioning
                                ? {
                                    transform: "scale3d(1, 1, 1)",
                                    opacity: 1,
                                }
                                : {
                                    opacity: 1,
                                }
                        }
                        leave={
                            !isTransitioning
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
                            } else
                                return (
                                    <AddPaletteContainer
                                        wrapperProps={{
                                            style: {
                                                ...style,
                                                ...styles,
                                            },
                                            ...popoverProps,
                                        }}
                                        onChange={(val, id) => {
                                            handleChangeComplete(val, id);
                                        }}
                                        value={state}
                                        option={state}
                                        handleAddPalette={handleAddPalette}
                                        handleCloseModal={() => { setCurrentView("") }}

                                    />
                                );
                        }}
                    </Transition>,
                    document.body
                )}

            {openModal && <Modal title={(<div className={`kmt-popup-modal__header`}><i className="dashicons dashicons-bell"></i> {__("Warning", "kemet")}</div>)}
                className={`kmt-color-palette-confrim__delete`}
                isDismissible={true}
                onRequestClose={() => { setOpenModal(false) }}
            >
                < p className={__(`kmt-palette-popup-content`)}>
                    {__(`You are about to delete `, "kemet")}<q className={`kmt-deleted-palette__name`}>"{delPalette[0].name}"</q>{__(`. This palette cannot be restored, are you sure you want to delete it?`, "kemet")}
                </p>
                <div className={__(`kmt-paltette-popup-action`)}>
                    <button type="button" class="button button-primary save has-next-sibling" onClick={() => {
                        setOpenModal(false)
                    }
                    }>{__("No", "kemet")}</button>
                    <button type="button" class="components-button  kmt-button__delete__palette" onClick={(e) => {
                        e.preventDefault();
                        ConfirmDelete()
                    }}>{__('Yes', "kemet")}</button>
                </div>
            </Modal>
            }

        </div >
    );
};

export default ColorPalettes;