import { createElement, useRef, Fragment, useMemo } from '@wordpress/element'
const { __ } = wp.i18n;
import classnames from 'classnames'
import ColorComponent from '../color'

const PalettePreview = ({
	renderBefore = () => null,
	value,
	onChange,
	onClick,
	currentPalette = null,
	className,
}) => {
	if (!currentPalette) {
		currentPalette = value

		if (value.palettes) {
			currentPalette = value.palettes.find(
				({ id }) => id === value.current_palette
			)
		}
	}

	const handleChangeComplete = (optionId, optionValue) => {
		console.log(optionId, optionValue)
		// if (optionId !== 'color') {
		// 	return
		// }

		// onChange(
		// 	optionId,
		// 	Object.keys(optionValue).reduce(
		// 		(finalValue, currentId) => ({
		// 			...finalValue,
		// 			...(currentId.indexOf('color') === 0
		// 				? { [currentId]: optionValue[currentId] }
		// 				: {}),
		// 		}),

		// 		{}
		// 	)
		// )
	}


	const pickers = Object.keys(currentPalette)
		.filter((k) => k.indexOf('color') === 0)
		.map((key, index) => ({
			title: `Color${index}`,
			id: key,
		}))

	return (
		<div
			className={classnames('kmt-single-palette', className)}
			onClick={(e) => {
				if (
					e.target.closest('.kmt-color-picker-modal') ||
					e.target.classList.contains('kmt-color-picker-modal')
				) {
					return
				}

				onClick()
			}}>
			{renderBefore()}

			<div className={`kmt-color-picker-container`}>
				{pickers.map((picker) => (

					<ColorComponent
						picker={picker}
						onChangeComplete={(optionId, optionValue) => {
							onChange(optionId,
								Object.keys(optionValue).reduce(
									(finalValue, currentId) => ({
										...finalValue,
										...(currentId.indexOf('color') === 0
											? { [currentId]: optionValue[currentId] }
											: {}),
									}),

									{}
								))
						}}
						value={currentPalette}
					/>
				))}
			</div>

		</div>
	)
}

export default PalettePreview
