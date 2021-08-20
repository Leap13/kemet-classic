import { ColorPicker } from '@wordpress/components'

const ColorPickerIris = (props) => {


    return (
        <div>
            <ColorPicker
                color={props.value}
                onChangeComplete={(val) => props.onChange(val)}
            />
        </div>
    )
}

export default ColorPickerIris