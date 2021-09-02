import {
    createPortal,
    useRef,
    useState,
} from '@wordpress/element'
import PalettePreview from './color-palettes/PalettePreview'
import ColorPalettesModal from './color-palettes/ColorPalettesModal'
import usePopoverMaker from '../common/popover-component'
import OutsideClickHandler from '../common/outside-component'
import { Transition } from '@react-spring/web'
import bezierEasing from 'bezier-easing'
const { __ } = wp.i18n;

const ColorPalettes = (props) => {
    const [value, setValue] = useState(props.value)

    const colorPalettesWrapper = useRef()

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

    const updateValues = (val) => {
        setValue(val);
        props.onChange({ ...val, flag: !value.flag })
    }

    const handleChangePalette = (active) => {
        let currentPalette = active.palettes.find(
            ({ id }) => id === active.current_palette
        )
        Object.values(currentPalette).map((item, index) => {
            document.documentElement.style.setProperty('--paletteColor' + index, item);
            return item;
        });

        updateValues(active)
    }

    const handleChangeComplete = (color, index) => {
        let currentPalette = value.palettes.find(
            ({ id }) => id === value.current_palette
        )
        let newValue = currentPalette;
        newValue[index] = color;
        let { id, ...colors } = newValue;
        Object.values(newValue).map((item, index) => {
            document.documentElement.style.setProperty('--paletteColor' + index, item);
            return item;
        });
        updateValues({ ...value, current_palette: id, ...colors })
    }

    return (
        <div>
            <OutsideClickHandler
                disabled={!isOpen}
                useCapture={false}
                className="kmt-palettes-preview"
                additionalRefs={[popoverProps.ref]}
                onOutsideClick={() => {
                    setIsOpen(false)
                }}
                wrapperProps={{
                    ref: colorPalettesWrapper,
                    onClick: (e) => {
                        e.preventDefault()

                        if (
                            e.target.closest('.kmt-color-picker-modal') ||
                            e.target.classList.contains('kmt-color-picker-modal')
                        ) {
                            return
                        }

                        if (!value.palettes) {

                            return
                        }

                        setIsOpen(true)
                    },
                }}>
                <PalettePreview
                    onClick={() => {
                        if (!value.palettes) {
                            return
                        }
                        setIsOpen(false)
                    }}
                    value={value}
                    onChange={(v, id) => handleChangeComplete(v, id)}
                    skipModal={false}
                />
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

                            return (
                                <ColorPalettesModal
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
                                    value={value}
                                    option={value}
                                />
                            )
                        }}
                    </Transition>,
                    document.body
                )
            }
        </div >
    )
}

export default ColorPalettes
