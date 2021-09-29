import { createPortal, useRef, useState } from '@wordpress/element'
import PalettePreview from './color-palettes/PalettePreview'
import AddPaletteContainer from './color-palettes/AddPaletteContainer'
import ColorPalettesModal from './color-palettes/ColorPalettesModal'
import usePopoverMaker from '../common/popover-component'
import OutsideClickHandler from '../common/outside-component'
import { Transition } from '@react-spring/web'
import bezierEasing from 'bezier-easing'
import classnames from "classnames";

const ColorPalettes = ({ value, onChange, params: { label, default: defaultValue } }) => {
    const [state, setState] = useState(value)

    const colorPalettesWrapper = useRef()

    const [typeOfPalette, setTypeOfPalette] = useState('light')


    const [{ isOpen, isTransitioning }, setModalState] = useState({
        isOpen: false,
        isTransitioning: false,
    })

    const { styles, popoverProps } = usePopoverMaker({
        ref: colorPalettesWrapper,
        defaultHeight: 430,
        shouldCalculate: isTransitioning || isOpen,
    })

    const setIsOpen = (isOpen) => {
        setModalState((state) => ({
            ...state,
            isOpen,
            isTransitioning: true,
        }))
    }

    const stopTransitioning = () =>
        setModalState((state) => ({
            ...state,
            isTransitioning: false,
        }))

    const handleChangePalette = (active) => {
        let currentPalette = active.palettes.find(
            ({ id }) => id === active.current_palette
        )
        let { id, skin, type, name, ...colors } = { ...currentPalette };
        Object.values(colors).map((item, index) => {
            document.documentElement.style.setProperty(`--paletteColor${index + 1}`, item);
            return item;
        });
        setState(active);
        onChange({ ...active, flag: !value.flag })
    }

    const handleChangeComplete = (color, index) => {
        let newValue = { ...state };
        newValue[index] = color;
        let { current_palette, palettes, ...colors } = newValue;
        Object.values(colors).map((item, index) => {
            document.documentElement.style.setProperty(`--paletteColor${index + 1}`, item);
            return item;
        });
        setState({ ...state, ...colors, current_palette, palettes });
        onChange({ ...state, ...colors, flag: !value.flag, current_palette, palettes })
    }

    const handleAddPalette = (data) => {
        let { current_palette, palettes, ...colors } = { ...state };

        let newPalette = {
            'id': palettes.length + 1,
            ...colors,
            'type': "custom",
            'skin': data.type,
            'name': data.name
        }
        palettes.push(newPalette)
        onChange(value)
        setIsOpen(false)
    }

    const handleDeletePalette = (id) => {
        const newPalette = value.palettes.filter(palette => { return palette.id !== id })
        setState({ ...value, palettes: newPalette })
        onChange({ ...value, palettes: newPalette })
    }

    const handleResetColor = (id) => {
        let updateState = {
            ...state,
        };
        let currentPalette = updateState.palettes.find(
            ({ id }) => id === updateState.current_palette
        );
        let resetValue = value[id]


    }

    const [currentView, setCurrentView] = useState('modal')

    return (
        <div>
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
                            handleChangePalette(defaultValue);
                        }}
                    ></button>
                </div>
                <span className="customize-control-title kmt-control-title">{label}</span>
                <div className={`kmt-type-control`}>
                    <span className={classnames({ active: typeOfPalette === "light" })} onClick={() => { setTypeOfPalette("light") }}>Light</span>
                    <span className={classnames({ active: typeOfPalette === "dark" })} onClick={() => { setTypeOfPalette("dark") }}>Dark</span>
                </div>
            </header>
            <OutsideClickHandler
                disabled={!isOpen}
                useCapture={false}
                className="kmt-palettes-outside"
                additionalRefs={[popoverProps.ref]}
                onOutsideClick={(e) => {
                    if (
                        e.target.closest('.kmt-color-picker-modal') ||
                        e.target.classList.contains('kmt-color-picker-modal')
                    ) {
                        return
                    } else {
                        setIsOpen(false)
                    }
                    setCurrentView(" ")

                }}
                wrapperProps={{
                    ref: colorPalettesWrapper,
                    onClick: (e) => {
                        e.preventDefault()

                        if (!state.palettes) {
                            return
                        }
                        setCurrentView("modal")
                        setIsOpen(true)

                    },
                }}>
                <div className={`kmt-palettes-preview`}>
                    <PalettePreview
                        onClick={() => {
                            if (!state.palettes) {
                                return
                            }
                            setIsOpen(false)
                        }}
                        value={state}
                        onChange={(v, id) => handleChangeComplete(v, id)}
                        skipModal={false}
                        handleClickReset={(val) => { handleResetColor(val) }}

                    />
                    <span
                        className={`kmt-button-open-palette`}
                        onClick={e => {
                            e.preventDefault();
                            setIsOpen(true)
                            setCurrentView("modal")
                        }}></span>
                </div>


            </OutsideClickHandler>

            {
                (isTransitioning || isOpen) &&
                createPortal(
                    <Transition
                        items={isOpen}
                        onRest={(isOpen) => {
                            stopTransitioning()
                        }}
                        config={{
                            duration: 100,
                            easing: bezierEasing(0.25, 0.1, 0.25, 1.0),
                        }}
                        from={
                            isOpen
                                ? {
                                    transform: 'scale3d(0.95, 0.95, 1)',
                                    opacity: 0,
                                }
                                : { opacity: 1 }
                        }
                        enter={
                            isOpen
                                ? {
                                    transform: 'scale3d(1, 1, 1)',
                                    opacity: 1,
                                }
                                : {
                                    opacity: 1,
                                }
                        }
                        leave={
                            !isOpen
                                ? {
                                    transform: 'scale3d(0.95, 0.95, 1)',
                                    opacity: 0,
                                }
                                : {
                                    opacity: 1,
                                }
                        }>
                        {(style, item) => {
                            if (!item) {
                                return null
                            }
                            if (currentView === "add") {

                                return <AddPaletteContainer
                                    wrapperProps={{
                                        style: {
                                            ...style,
                                            ...styles,
                                        },
                                        ...popoverProps,
                                    }}
                                    onChange={(val, id) => { handleChangeComplete(val, id) }}
                                    value={state}
                                    option={state}
                                    handleAddPalette={handleAddPalette}
                                />
                            } else {
                                return <ColorPalettesModal
                                    wrapperProps={{
                                        style: {
                                            ...style,
                                            ...styles,
                                        },
                                        ...popoverProps,
                                    }}
                                    onChange={(val) => {
                                        setIsOpen(false)
                                        handleChangePalette(val)
                                    }}

                                    value={state}
                                    option={state}
                                    handleDeletePalette={(id) => handleDeletePalette(id)}
                                    typeOfPalette={typeOfPalette}
                                />
                            }



                        }}
                    </Transition>,
                    document.body
                )
            }
            <button className={`kmt-button-palette`} onClick={(e) => {
                e.stopPropagation();
                e.preventDefault();
                setCurrentView('add')
                setIsOpen(true)
            }} > Create New Palette</button>
        </div >
    )
}

export default ColorPalettes