import { createElement, Component, createRef } from '@wordpress/element'
import { ColorPicker } from '@wordpress/components'
import $ from 'jquery'
const { __ } = wp.i18n;

const ColorPickerIris = ({ onChange, value, value: { color } }) => {
	console.log(value)
	return (
		<div>
			<ColorPicker
				color={color}
				onChangeComplete={({ color, hex }) => {
					console.log(value,color,hex)
				}}
			/>
		</div>
	)
}

export default ColorPickerIris
