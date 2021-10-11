
const { __, sprintf } = wp.i18n;
import { animated } from '@react-spring/web'
import { Fragment } from 'react';
import PalettePreview from './PalettePreview'
import classnames from "classnames";
import { useState } from 'react';

const ColorPalettesModal = ({ value, onChange, wrapperProps = {}, handleDeletePalette }) => {
	const [typeOfPalette, setTypeOfPalette] = useState("light");
	const paletteColors = value.palettes.filter(palette => { return palette.skin === typeOfPalette })
	return (
		<animated.div
			className="kmt-option-modal kmt-palettes-modal"
			{...wrapperProps}>
			<div className={`kmt-type-control`}>
				<span
					className={classnames({ active: typeOfPalette === "light" })}
					onClick={() => {
						setTypeOfPalette("light");
					}}
				>
					Light
        </span>
				<span
					className={classnames({ active: typeOfPalette === "dark" })}
					onClick={() => {
						setTypeOfPalette("dark");
					}}
				>
					Dark
        </span>
			</div>
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
								{palette[`type`] === "custom" && <button className={`kmt-delete-palette`} onClick={(e) => {
									e.preventDefault();
									e.stopPropagation();
									handleDeletePalette(palette.id)
								}}></button>}
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