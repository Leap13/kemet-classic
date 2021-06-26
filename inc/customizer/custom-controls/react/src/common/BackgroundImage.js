import React from 'react'
import { PatternPicker } from './pattern';
import { ImagePicker } from './ImagePicker';
export default function BackgroundImage(props) {
    return (
        <>
            <ul
                className="ct-radio-option ct-buttons-group"
                onMouseUp={(e) => {
                    e.preventDefault()
                }}>
                {['image', 'pattern'].map((type) => (
                    <li
                        data-type={type}
                        key={type}
                        className={classnames({
                            active: type === value.backgroundImage_type,
                        })}
                        onClick={() =>
                            onChange({
                                ...value,
                                backgroundImage_type: type,
                            })
                        }>
                        {
                            {
                                pattern: __('Pattern', 'blocksy'),
                                image: __('Image', 'blocksy'),
                            }[type]
                        }
                    </li>
                ))}
            </ul>
            {value.backgroundImage_type === 'pattern' && (
                <PatternPicker
                    option={option}
                    onChange={onChange}
                    value={value}
                />
            )}
            {value.background_type === 'image' && (
                <ImagePicker
                    setOutsideClickFreezed={setOutsideClickFreezed}
                    option={option}
                    onChange={onChange}
                    value={value}
                />
            )}
        </>
    )
}
