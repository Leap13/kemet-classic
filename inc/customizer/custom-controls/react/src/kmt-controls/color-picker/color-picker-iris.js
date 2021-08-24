import { ColorPicker } from '@wordpress/components'

const ColorPickerIris = ({ values, value, onChange, picker }) => {



    return (
        <div>
            <ColorPicker
                color={value}
                onChangeComplete={({ color, hex }) => {
                    onChange({
                        ...values,
                        [picker]:
                            color.getAlpha() === 1 ? hex : color.toRgbString()
                    })

                }}
            />
        </div>
    )
}

export default ColorPickerIris