import { ColorPicker } from '@wordpress/components'

const ColorPickerIris = ({ value, onChange }) => {



    return (
        <div>
            <ColorPicker
                color={value}
                onChangeComplete={(val) => onChange(val.hex)}
            />
        </div>
    )
}

export default ColorPickerIris