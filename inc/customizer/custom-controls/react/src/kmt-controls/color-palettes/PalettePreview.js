import { createElement, useRef, Fragment, useMemo } from '@wordpress/element'
const { __ } = wp.i18n;
import classnames from 'classnames'


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
				{Object.entries(currentPalette).map((val, index) => (
					<div className={`kmt-color-picker-single`} >
						<span tabIndex={index}>
							<span tabIndex={index} style={{ backgroundColor: val[1].color }}></span>
							<i class="kmt-tooltip-top">{val[0]}</i>
						</span>
					</div>
				))}
			</div>

		</div>
	)
}

export default PalettePreview
