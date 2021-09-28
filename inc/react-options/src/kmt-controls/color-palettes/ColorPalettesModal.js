const { __, sprintf } = wp.i18n;
import { animated } from '@react-spring/web'
import { Fragment } from 'react';
import PalettePreview from './PalettePreview'
const ColorPalettesModal = ({ value, onChange, wrapperProps = {}, handleDeletePalette, typeOfPalette }) => {
	const paletteColors = value.palettes.filter(palette => { return palette.skin === typeOfPalette })
	return (
		<animated.div
			className="kmt-option-modal kmt-palettes-modal"
			{...wrapperProps}>
			{paletteColors.map((palette, index) => (
				<Fragment>
					<PalettePreview
						currentPalette={palette}
						className={
							value.current_palette === palette.id ? 'kmt-active' : ''
						}
						renderBefore={() => (
							<Fragment>
								<label>
									{palette.name ? palette.name : sprintf(__('Palette #%s', 'Kemet'), index + 1)}
								</label>
								{palette[`type`] === "custom" && <button onClick={(e) => {
									e.preventDefault();
									e.stopPropagation();
									handleDeletePalette(palette.id)
								}}>Delete</button>}
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