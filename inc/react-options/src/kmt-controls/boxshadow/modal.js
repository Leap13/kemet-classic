import { createPortal, useRef } from '@wordpress/element'
import { Transition } from 'react-spring/renderprops'
import bezierEasing from 'bezier-easing'
import ResponsiveSliderComponent from '../slider'
import usePopoverMaker from '../../common/popover-component'
const { __ } = wp.i18n;

const BoxShadowModal = ({
    value,
    onChange,
    picker,
    stopTransitioning,
    el,
    isTransitioning,
    isPicking,
}) => {
    const { styles, popoverProps } = usePopoverMaker({
        ref: el,
        defaultHeight: 437,
        shouldCalculate:
            isTransitioning === picker.id ||
            (isPicking || '').split(':')[0] === picker.id,
    })

    return (
        (isTransitioning === picker.id ||
            (isPicking || '').split(':')[0] === picker.id) &&
        createPortal(
            <Transition
                items={isPicking}
                onRest={(isOpen) => {
                    stopTransitioning()
                }}
                config={{
                    duration: 100,
                    easing: bezierEasing(0.25, 0.1, 0.25, 1.0),
                }}
                from={
                    (isPicking || '').indexOf(':') === -1
                        ? {
                            transform: 'scale3d(0.95, 0.95, 1)',
                            opacity: 0,
                        }
                        : { opacity: 1 }
                }
                enter={
                    (isPicking || '').indexOf(':') === -1
                        ? {
                            transform: 'scale3d(1, 1, 1)',
                            opacity: 1,
                        }
                        : {
                            opacity: 1,
                        }
                }
                leave={
                    (isPicking || '').indexOf(':') === -1
                        ? {
                            transform: 'scale3d(0.95, 0.95, 1)',
                            opacity: 0,
                        }
                        : {
                            opacity: 1,
                        }
                }>
                {(isPicking) =>
                    (isPicking || '').split(':')[0] === picker.id &&
                    ((props) => (
                        <div
                            style={{ ...props, ...styles }}
                            {...popoverProps}
                            className="kmt-option-modal kmt-box-shadow-modal"
                            onClick={(e) => {
                                e.preventDefault()
                                e.stopPropagation()
                            }}
                            onMouseDownCapture={(e) => {
                                e.nativeEvent.stopImmediatePropagation()
                                e.nativeEvent.stopPropagation()
                            }}
                            onMouseUpCapture={(e) => {
                                e.nativeEvent.stopImmediatePropagation()
                                e.nativeEvent.stopPropagation()
                            }}>

                            <div className="shadow-sliders">
                                <div key="offsetX" className={`customize-control-kmt-slider`}>
                                    <ResponsiveSliderComponent
                                        value={value.offsetX}
                                        values={value}
                                        id='offsetX'
                                        params={{
                                            id: 'offsetX',
                                            label: __('OffsetX', 'kemet'),
                                            value: 0,
                                            responsive: true,
                                            unit_choices: {
                                                'px': {
                                                    min: -100,
                                                    max: 100,
                                                    step: 1,
                                                },
                                            },
                                        }}
                                        onChange={(newValue) =>
                                            onChange({
                                                ...value,
                                                offsetX: newValue,
                                            })}

                                    />
                                </div>
                                <div key="offsetY" className={`customize-control-kmt-slider`}>
                                    <ResponsiveSliderComponent
                                        value={value.offsetY}
                                        values={value}
                                        id='offsetY'
                                        params={{
                                            id: 'offsetY',
                                            label: __('OffsetY', 'kemet'),
                                            value: 0,
                                            value: 10,
                                            responsive: true,
                                            unit_choices: {
                                                'px': {
                                                    min: -100,
                                                    max: 100,
                                                    step: 1,
                                                },
                                            },
                                        }}
                                        onChange={(newValue) =>
                                            onChange({
                                                ...value,
                                                offsetY: newValue,
                                            })}

                                    />
                                </div>
                                <div key="blur" className={`customize-control-kmt-slider`}>
                                    <ResponsiveSliderComponent
                                        value={value.blur}
                                        values={value}
                                        id='blur'
                                        params={{
                                            id: 'blur',
                                            label: __('Blur', 'kemet'),
                                            value: 0,
                                            value: 10,
                                            responsive: true,
                                            unit_choices: {
                                                'px': {
                                                    min: -100,
                                                    max: 100,
                                                    step: 1,
                                                },
                                            },
                                        }}
                                        onChange={(newValue) =>
                                            onChange({
                                                ...value,
                                                blur: newValue,
                                            })}

                                    />
                                </div>
                                <div key="spread" className={`customize-control-kmt-slider`}>
                                    <ResponsiveSliderComponent
                                        value={value.offsetY}
                                        values={value}
                                        id='spread'
                                        params={{
                                            id: 'spread',
                                            label: __('Spread', 'kemet'),
                                            value: 0,
                                            value: 10,
                                            responsive: true,
                                            unit_choices: {
                                                'px': {
                                                    min: -100,
                                                    max: 100,
                                                    step: 1,
                                                },
                                            },
                                        }}
                                        onChange={(newValue) =>
                                            onChange({
                                                ...value,
                                                spread: newValue,
                                            })}

                                    />
                                </div>
                            </div>
                        </div>
                    ))
                }
            </Transition>,
            document.body
        )
    )
}

export default BoxShadowModal
