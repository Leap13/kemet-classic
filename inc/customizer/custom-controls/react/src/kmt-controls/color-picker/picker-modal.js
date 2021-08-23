import { useMemo, Fragment, useState } from '@wordpress/element'
import { ColorPicker } from '@wordpress/components'
import ColorPickerIris from './color-picker-iris'
import classnames from 'classnames'
const { __ } = wp.i18n;


const getLeftForEl = (modal, el) => {
    if (!modal) return
    if (!el) return

    let style = getComputedStyle(modal)

    let wrapperLeft = parseFloat(style.left)

    el = el.firstElementChild.getBoundingClientRect()

    return {
        '--option-modal-arrow-position': `${el.left + el.width / 2 - wrapperLeft - 6
            }px`,
    }
}




const PickerModal = ({
    el,
    value,
    picker,
    onChange,
    style,
    wrapperProps = {},
    inline_modal,
    appendToBody
}) => {




    let valueToCheck = value

    const arrowLeft = useMemo(
        () =>
            wrapperProps.ref &&
            wrapperProps.ref.current &&
            el &&
            getLeftForEl(wrapperProps.ref.current, el.current),
        [wrapperProps.ref && wrapperProps.ref.current, el && el.current]
    )
    const onPaletteChangeComplete = (val) => {

        le
    }

    return (
        <Fragment>
            <div
                tabIndex="0"
                className={classnames(
                    `kmt-color-picker-modal`,
                    {
                        'kmt-option-modal': !inline_modal && appendToBody,
                    },
                )}
                style={{
                    ...arrowLeft,
                    ...(style ? style : {}),
                }}
                {...wrapperProps}>
                <div className="kmt-color-picker-top">
                    <ul className="kmt-color-picker-skins">
                        {[
                            'paletteColor1',
                            'paletteColor2',
                            'paletteColor3',
                            'paletteColor4',
                            'paletteColor5',
                            'paletteColor6',
                            'paletteColor7',
                            'paletteColor8',
                        ].map((color, index) => (
                            <li
                                key={color}
                                style={{
                                    background: `var(--${color}) `,
                                }}
                                className={classnames({
                                    active:
                                        valueToCheck === `var(--${color})`,
                                })}
                                onClick={() =>
                                    onChange({ value: `var(--${color})` })
                                }>
                                <div className="kmt-tooltip-top">
                                    {
                                        {
                                            paletteColor1: 'Color 1',
                                            paletteColor2: 'Color 2',
                                            paletteColor3: 'Color 3',
                                            paletteColor4: 'Color 4',
                                            paletteColor5: 'Color 5',
                                            paletteColor6: 'Color 6',
                                            paletteColor7: 'Color 7',
                                            paletteColor8: 'Color 8',
                                        }[color]
                                    }
                                </div>
                            </li>
                        ))}
                    </ul>
                </div>

                <ColorPickerIris
                    onChange={(v) => onChange(v)}
                    value={{
                        value: value,
                    }}
                />
            </div>
        </Fragment >
    )
}

export default PickerModal