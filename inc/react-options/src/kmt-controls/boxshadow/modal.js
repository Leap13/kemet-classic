import { createPortal, useRef } from '@wordpress/element'
import PickerModal from './picker-modal'
import { Transition } from 'react-spring/renderprops'
import bezierEasing from 'bezier-easing'
import classnames from 'classnames'
import usePopoverMaker from '../../common/popover-component';
const { __ } = wp.i18n;

const BoxShadowModal = ({
    option,
    value,
    onChange,
    picker,

    onPickingChange,
    stopTransitioning,

    el,

    hOffsetRef,
    vOffsetRef,
    blurRef,
    spreadRef,

    isTransitioning,
    isPicking,
}) => {
    const { styles, popoverProps } = usePopoverMaker({
        ref: el,
        defaultHeight: !option.hide_shadow_placement ? 507 : 437,
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
                            <div className="kmt-shadow-trigger">
                                <label>{__('Enable/Disable', 'blocksy')}</label>
                                {/* <Switch
                                    value={value.enable ? 'yes' : 'no'}
                                    onChange={() => {
                                        onChange({
                                            ...value,
                                            enable: !value.enable,
                                        })
                                    }}
                                /> */}
                            </div>

                            <div className="shadow-sliders">
                                <span>helloooooo</span>
                            </div>

                            {!option.hide_shadow_placement && (
                                <ul className="kmt-shadow-style">
                                    <li
                                        onClick={() =>
                                            onChange({
                                                ...value,
                                                inset: false,
                                            })
                                        }
                                        className={classnames({
                                            active: !value.inset,
                                        })}>
                                        Outline
									</li>
                                    <li
                                        onClick={() =>
                                            onChange({
                                                ...value,
                                                inset: true,
                                            })
                                        }
                                        className={classnames({
                                            active: value.inset,
                                        })}>
                                        Inset
									</li>
                                </ul>
                            )}
                        </div>
                    ))
                }
            </Transition>,
            document.body
        )
    )
}

export default BoxShadowModal
