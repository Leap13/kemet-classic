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
    const [value, setValue] = useState(props.params.value)

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
    const updateValues = (val) => {
        setValue({ ...value, ...val });
        props.onChange({ ...val, flag: !value.flag })
    }

    const handleChangePalette = (active) => {
        let currentPalette = active.palettes.find(
            ({ id }) => id === active.current_palette
        )
        const newItems = Object.values(currentPalette).map((item, index) => {
            document.documentElement.style.setProperty('--paletteColor' + index, item);
            return item;
        });

        updateValues(active)
    }

    const handleChangeComplete = (color, index) => {


        let newColor = {};
        if (undefined !== color.rgb && undefined !== color.rgb.a && 1 !== color.rgb.a) {
            newColor.color = 'rgba(' + color.rgb.r + ',' + color.rgb.g + ',' + color.rgb.b + ',' + color.rgb.a + ')';
        } else {
            newColor.color = color.hex;
        }

        l
        // let value = this.state.value;
        // const newItems = this.state.value[this.state.value.active].map((item, thisIndex) => {
        //     if (parseInt(index) === parseInt(thisIndex)) {
        //         item = { ...item, ...newColor };
        //         document.documentElement.style.setProperty('--global-' + this.state.value[this.state.value.active][index].slug, newColor.color);
        //     }

        //     return item;
        // });
        // value[this.state.value.active] = newItems;
        // updateValues(value);
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
                    onChange={(v, id) => handleChangeComplete(v, id)}
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
                                    value={properValue}
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
