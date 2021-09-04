import { useMemo, Fragment, useState, useEffect } from '@wordpress/element'
import { ColorPicker } from '@wordpress/components'
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
    appendToBody,
    predefined,
    className
}) => {

    const getValueForPicker = useMemo(() => {
        if ((value || '').indexOf('var') > -1) {
            return {
                key: 'var' + value,
                color: getComputedStyle(document.documentElement)
                    .getPropertyValue(
                        value.replace(/var\(/, '').replace(/\)/, '')
                    )
                    .trim()
                    .replace(/\s/g, ''),
            }
        }

        return { key: 'color', color: value }
    }, [value, picker])

    const [refresh, setRefresh] = useState(false)

    let valueToCheck = value

    const arrowLeft = useMemo(
        () =>
            wrapperProps.ref &&
            wrapperProps.ref.current &&
            el &&
            getLeftForEl(wrapperProps.ref.current, el.current),
        [wrapperProps.ref && wrapperProps.ref.current, el && el.current]
    )

    const handleTopPart = (colorValue) => {
        if (refresh) {
            setRefresh(false)
        } else {
            setRefresh(true)
        }
        onChange(colorValue)
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
                    className
                )}
                style={{
                    ...arrowLeft,
                    ...(style ? style : {}),
                }}
                {...wrapperProps}>
                {!predefined && <div className="kmt-color-picker-top">
                    <ul className="kmt-color-picker-skins">
                        {['paletteColor1',
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
                                    background: `var(--${color})`,
                                }}
                                className={classnames({
                                    active:
                                        valueToCheck === `var(--${color})`,
                                })}
                                onClick={() =>
                                    handleTopPart(`var(--${color})`)
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
                </div>}

                <>
                    <ColorPicker
                        color={getValueForPicker.color}
                        onChangeComplete={(color) => onChange(color)}
                    />
                </>


            </div>
        </Fragment >
    )
}

export default PickerModal