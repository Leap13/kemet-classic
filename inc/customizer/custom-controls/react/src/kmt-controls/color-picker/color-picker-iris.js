import { ColorPicker } from '@wordpress/components'
const { __ } = wp.i18n;

const ColorPickerIris = ({ onChange, value }) => {

	return (
		<div>
			<ColorPicker
				color={value}
				onChangeComplete={(value) => onChange(value)}
			/>
		</div>
	)
}

export default ColorPickerIris
