const { __ } = wp.i18n;
import classnames from 'classnames'
import ColorComponent from '../color'

const PalettePreview = ({
	renderBefore = () => null,
	value,
	onChange,
	onClick,
	currentPalette,
	className,
	skipModal
}) => {
	if (!currentPalette) {
		currentPalette = value


	}
	const handleChangeColor = (color, optionId) => {
		let newColor;
		if (typeof color === 'string') {
			newColor = color;
		} else if (undefined !== color.rgb && undefined !== color.rgb.a && 1 !== color.rgb.a) {
			newColor = `rgba(${color.rgb.r},${color.rgb.g},${color.rgb.b},${color.rgb.a})`;
		} else {
			newColor = color.hex;
		}
		onChange(newColor, optionId)
	}
	const pickers = Object.keys(currentPalette)
		.filter((k) => k.indexOf('color') === 0)
		.map((key, index) => ({
			title: `Color ${index + 1}`,
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
			<div className={`kmt-color-palette-container`}>
				{pickers.map((picker) => (
					<ColorComponent
						picker={picker}
						onChangeComplete={(color, id) => handleChangeColor(color, picker[`id`])}
						value={currentPalette}
						predefined={true}
						className={'kmt-color-palette-modal'}
						skipModal={skipModal}

					/>
				))}
			</div>

		</div>
	)
}

export default PalettePreview