import { ColorPicker } from '@wordpress/components'

const ColorPickerIris = ({ value, onChange }) => {

    return (
        <div>
            <ColorPicker
                color={value}
                onChangeComplete={(color) => onChange(color)}
            />
        </div>
    )
}

export default ColorPickerIris