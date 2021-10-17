
const { __, sprintf } = wp.i18n;
import { animated } from '@react-spring/web'
import { Fragment } from 'react';
import PalettePreview from './PalettePreview'
import classnames from "classnames";
import { useState } from 'react';

const ColorPalettesModal = ({ value, onChange, wrapperProps = {}, handleDeletePalette }) => {
	const [typeOfPalette, setTypeOfPalette] = useState("light");
	const kemetPaletteColors = value.palettes.filter(palette => { return palette.skin === typeOfPalette && palette.type === "system" })
	const customPaletteColors = value.palettes.filter(palette => { return palette.skin === typeOfPalette && palette.type === "custom" })
	return (
		<animated.div
			className="kmt-option-modal kmt-palettes-modal"
			{...wrapperProps}>
			<div className={`kmt-type-control`}>
				<span className={classnames({ active: typeOfPalette === "light" })}
					onClick={() => {
						setTypeOfPalette("light");
					}}>Light
                </span>
				<span className={classnames({ active: typeOfPalette === "dark" })}
					onClick={() => {
						setTypeOfPalette("dark");
					}}
				>	Dark
                </span>
			</div>
			{ customPaletteColors.length > 0 && <div className={`kmt_label_type__palette`}>{__(`my palettes`, "kemet")}</div>}
			{customPaletteColors.map((palette, index) => (
				<Fragment>
					<PalettePreview
						currentPalette={palette}
						className={classnames(`kmt-custom-palette__container`, {
							'kmt-active': value.current_palette === palette.id
						})
						}
						renderBefore={() => (
							<Fragment>
								<label>
									{palette.name ? palette.name : sprintf(__('Palette #%s', 'Kemet'), index + 1)}
								</label>
								<button className={`kmt-delete-palette`} onClick={(e) => {
									e.preventDefault();
									e.stopPropagation();
									handleDeletePalette(palette.id)
								}}></button>
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


			))
			}
			<div className={`kmt_label_type__palette`}>{__(`kemet palettes`, "kemet")}</div>
			{kemetPaletteColors.map((palette, index) => (
				<Fragment>
					<PalettePreview
						currentPalette={palette}
						className={
							value.current_palette === palette.id ? 'kmt-active' : ''
						}
						renderBefore={() => (
							<label>
								{palette.name ? palette.name : sprintf(__('Palette #%s', 'Kemet'), index + 1)}
							</label>
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


			))
			}
		</animated.div >
	)
}

export default ColorPalettesModal