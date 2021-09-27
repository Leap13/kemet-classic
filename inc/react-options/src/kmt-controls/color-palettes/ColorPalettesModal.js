const { __, sprintf } = wp.i18n;
import { animated } from '@react-spring/web'
import { Fragment } from 'react';
import PalettePreview from './PalettePreview'
const ColorPalettesModal = ({ value, onChange, wrapperProps = {} }) => {
	console.log(value)
	return (
		<animated.div
			className="kmt-option-modal kmt-palettes-modal"
			{...wrapperProps}>
			{value.palettes.map((palette, index) => (
				<Fragment>

					<PalettePreview
						currentPalette={palette}
						className={
							value.current_palette === palette.id ? 'kmt-active' : ''
						}
						renderBefore={() => (
							<Fragment>
								<label>
									{sprintf(__('Palette #%s', 'Kemet'), index + 1)}
								</label>
								{palette[`type`] === "custom" && <button>Delete</button>}
							</Fragment>
						)}
						onClick={() => {
							const { id, ...colors } = palette
							onChange({
								...value,
								current_palette: id,
								...colors,
							})
						}}
						skipModal={true}
					/>
				</Fragment>


			))}
		</animated.div>
	)
}

export default ColorPalettesModal