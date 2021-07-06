import { createElement, Component, createRef } from '@wordpress/element'
import { ColorPicker } from '@wordpress/components'
import $ from 'jquery'
import { __ } from '@wordpress/i18n'

const ColorPickerIris = ({ onChange, value, value: { color } }) => {
    return (
        <div>
            <ColorPicker
                color={color}
                onChangeComplete={({ color, hex }) => {
                    onChange({
                        ...value,
                        color:
                            color.getAlpha() === 1 ? hex : color.toRgbString()
                    })
                }}
            />
        </div>
    )
}

export default ColorPickerIris
