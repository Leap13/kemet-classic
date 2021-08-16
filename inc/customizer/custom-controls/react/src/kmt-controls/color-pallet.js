import {
    createPortal,
    useRef,
    useState,
} from '@wordpress/element'
import cls from 'classnames'
import PalettePreview from './color-palettes/PalettePreview'
import ColorPalettesModal from './color-palettes/ColorPalettesModal'

import usePopoverMaker from '../common/popover-component'
import OutsideClickHandler from '../common/outside-component'

import { Transition } from '@react-spring/web'
import bezierEasing from 'bezier-easing'

const { __ } = wp.i18n;

const ColorPalettes = (props) => {
    let value = props.params.value;

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
    const properValue = {
        ...value,
        ...Object.keys(value).reduce(
            (all, currentKey) => ({
                ...all,
                ...(value[currentKey]
                    ? {
                        [currentKey]: value[currentKey],
                    }
                    : {}),
            }),
            {}
        ),
        ...(value.palettes
            ? {
                palettes: value.palettes.map((p, index) => {
                    let maybeCurrentlyInValue = value.palettes.find(
                        ({ id }) => p.id === id
                    )

                    let maybeCurrentValue = {}

                    if (p.id === value.current_palette) {
                        Object.keys(p).map((maybeColor) => {
                            if (
                                maybeColor.indexOf('color') === 0 &&
                                value[maybeColor]
                            ) {
                                maybeCurrentValue[maybeColor] =
                                    value[maybeColor]
                            }
                        })
                    }

                    const result = {
                        ...Object.keys(p).reduce(
                            (all, currentKey) => ({
                                ...all,
                                ...(p[currentKey]
                                    ? {
                                        [currentKey]: p[currentKey],
                                    }
                                    : {}),
                            }),
                            {}
                        ),
                        ...Object.keys(maybeCurrentlyInValue || {}).reduce(
                            (all, currentKey) => ({
                                ...all,
                                ...(maybeCurrentlyInValue[currentKey]
                                    ? {
                                        [currentKey]:
                                            maybeCurrentlyInValue[
                                            currentKey
                                            ],
                                    }
                                    : {}),
                            }),
                            {}
                        ),
                        ...maybeCurrentValue,
                    }

                    return result
                }),
            }
            : {}),
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

                        if (!properValue.palettes) {
                            return
                        }

                        setIsOpen(true)
                    },
                }}>
                <PalettePreview
                    onClick={() => {
                        if (!properValue.palettes) {
                            return
                        }
                        setIsOpen(true)
                    }}
                    value={properValue}
                    onChange={(optionId, optionValue) => {
                        props.onChange({
                            ...properValue,
                            ...optionValue,
                            ...(properValue.palettes
                                ? {
                                    palettes: properValue.palettes.map(
                                        (p) =>
                                            p.id ===
                                                properValue.current_palette
                                                ? {
                                                    ...p,
                                                    ...optionValue,
                                                }
                                                : p
                                    ),
                                }
                                : {}),
                        })
                    }}
                />
            </OutsideClickHandler>

            {(isTransitioning || isOpen) &&
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
                                    onChange={(value) => {
                                        setIsOpen(false)
                                        props.onChange(value)
                                    }}
                                    value={properValue}
                                    option={value}
                                />
                            )
                        }}
                    </Transition>,
                    document.body
                )}
        </div>
    )
}

export default ColorPalettes
