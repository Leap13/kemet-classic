import { useMemo, Fragment, useState } from '@wordpress/element'
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

    const [UpdatedState, setUpdate] = useState(value)

    const handleChangeComplete = (color, id) => {
        if (typeof color === 'string') {
            value[`${id}`] = color;
        } else if (undefined !== color.rgb && undefined !== color.rgb.a && 1 !== color.rgb.a) {
            value[`${id}`] = `rgba(${color.rgb.r},${color.rgb.g},${color.rgb.b},${color.rgb.a})`;
        } else {
            value[`${id}`] = color.hex;
        }

        console.log(id, picker[`id`])

        updateValues(value);
    };

    const updateValues = (val) => {
        setUpdate(val)


        onChange({ ...UpdatedState, flag: !value.flag });
    };

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
                {/* {
                    !option.predefined &&
                    } */}
                <div className="kmt-color-picker-top">
                    <ul className="kmt-color-picker-skins">
                        {[
                            '#000000',
                            '#ffffff',
                            '#dd3333',
                            '#dd9933',
                            '#eeee22',
                            '#81d742',
                            '#1e73be',
                            "#e2e7ed"
                        ].map((color, index) => (
                            <li
                                key={color}
                                style={{
                                    background: color,
                                }}
                                className={classnames({
                                    active:
                                        valueToCheck === color,
                                })}
                                onClick={() =>
                                    handleChangeComplete(color, picker[`id`])
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
                    onChange={(color, id) => handleChangeComplete(color, picker[`id`])}
                    values={UpdatedState}
                    picker={[picker.id]}
                    value={UpdatedState[picker.id]}

                />
            </div>
        </Fragment >
    )
}

export default PickerModal