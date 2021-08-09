import { createPortal, useRef, useMemo, useCallback, useState, } from '@wordpress/element';
import classnames from 'classnames';
import OutsideComponent from '../common/outside-component';
import PopoverComponent from '../common/popover-component';
import { Transition } from '@react-spring/web'
import bezierEasing from 'bezier-easing'
import { __ } from '@wordpress/i18n';
import { humanizeVariations, familyForDisplay } from '../common/typo-helper'

import TypographyModal from './typography/typo-modal'

const getLeftForEl = (modal, el) => {
    if (!modal) return
    if (!el) return

    let style = getComputedStyle(modal)

    let wrapperLeft = parseFloat(style.left)

    el = el.getBoundingClientRect()

    return {
        '--option-modal-arrow-position': `${el.left + el.width / 2 - wrapperLeft - 6
            }px`,
    }
}

const Typography = (props) => {
    let value = props.value;
    let defaultValue = {
        'family': 'System Default',
        'variation': 'n4',
        'size': '16px',
        'line-height': '1.65',
        'letter-spacing': '0em',
        'text-transform': 'none',
        'text-decoration': 'none',
    }
    value = value ? value : defaultValue;
    const [currentViewCache, setCurrentViewCache] = useState('_:_')

    const typographyWrapper = useRef()

    let [currentView, previousView] = useMemo(
        () => currentViewCache.split(':'),
        [currentViewCache]
    )
    const [{ isOpen, isTransitioning }, setModalState] = useState({
        isOpen: false,
        isTransitioning: false,
    })

    const { styles, popoverProps } = PopoverComponent({
        ref: typographyWrapper,
        defaultHeight: 430,
        shouldCalculate: isTransitioning || isOpen,
    })
    const setCurrentView = useCallback(
        (newView) => setCurrentViewCache(`${newView}:${currentView}`),
        [currentView]
    )

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

    const fontFamilyRef = useRef()
    const fontSizeRef = useRef()
    const fontWeightRef = useRef()
    const dotsRef = useRef()

    const arrowLeft = useMemo(() => {
        const view = currentView

        const futureRef =
            view === 'options'
                ? fontSizeRef.current
                : view === 'fonts'
                    ? fontFamilyRef.current
                    : view === 'variations'
                        ? fontWeightRef.current
                        : fontSizeRef.current

        return (
            popoverProps.ref &&
            popoverProps.ref.current &&
            getLeftForEl(popoverProps.ref.current, futureRef)
        )
    }, [
        isOpen,
        currentView,
        popoverProps.ref,
        popoverProps.ref && popoverProps.ref.current,
        fontFamilyRef && fontFamilyRef.current,
        fontWeightRef && fontWeightRef.current,
        fontSizeRef && fontSizeRef.current,
        dotsRef && dotsRef.current,
    ])
    console.log(currentView)
    return (
        <div className={classnames('ct-typography', {})}>
            <OutsideComponent
                disabled={!isOpen}
                useCapture={false}
                className="ct-typohraphy-value"
                additionalRefs={[popoverProps.ref]}
                onOutsideClick={() => {
                    setIsOpen(false)
                }}
                wrapperProps={{
                    ref: typographyWrapper,
                    onClick: (e) => {
                        e.preventDefault()

                        if (isOpen) {
                            setCurrentView('options')
                            return
                        }

                        setCurrentViewCache('options:_')
                        setIsOpen('options')
                    },
                }}>
                <div>
                    <span
                        onClick={(e) => {
                            e.stopPropagation()

                            if (isOpen) {
                                setCurrentView('fonts')
                                return
                            }

                            setCurrentViewCache('fonts:_')
                            setIsOpen('fonts')
                        }}
                        className="ct-font"
                        ref={fontFamilyRef}>
                        <span>
                            {value.family === 'Default'
                                ? 'Default Family'
                                : 'Default Family'}
                        </span>
                    </span>
                    <i>/</i>
                    <span
                        onClick={(e) => {
                            e.stopPropagation()

                            if (isOpen) {
                                setCurrentView('options')
                                return
                            }

                            setCurrentViewCache('options:_')
                            setIsOpen('font_size')
                        }}
                        ref={fontSizeRef}
                        className="ct-size">
                        <span>
                            {/* {maybePromoteScalarValueIntoResponsive(
                                value['size']
                            )[device] === 'CT_CSS_SKIP_RULE'
                                ? __('Default Size', 'blocksy')
                                : maybePromoteScalarValueIntoResponsive(
                                    value['size']
                                )[device]} */}
                                font Size
                        </span>
                    </span>
                    <i>/</i>
                    <span
                        ref={fontWeightRef}
                        onClick={(e) => {
                            e.stopPropagation()

                            if (isOpen) {
                                setCurrentView('variations')
                                return
                            }

                            setCurrentViewCache('variations:_')
                            setIsOpen('variations')
                        }}
                        className="ct-weight">
                        {/* <span>{humanizeVariations(value.variation)}</span> */}
                        <span>font weight</span>
                    </span>
                </div>

                <a ref={dotsRef} />

            </OutsideComponent>
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
                                return <div>
                                    Salma2
                                </div>
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
                                    onChange={props.onChange}
                                    value={value}
                                    option={props}
                                    initialView={item}
                                    setInititialView={(initialView) =>
                                        setIsOpen(initialView)
                                    }
                                    currentView={currentView}
                                    previousView={previousView}
                                    setCurrentView={setCurrentView}
                                />
                            )


                        }}
                    </Transition>,
                    document.body
                )}
        </div>)
}
export default Typography

