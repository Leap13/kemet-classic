import {
	Fragment,
	createElement,
	Component,
	useRef,
	useEffect,
	useMemo,
	useCallback,
	useState,
} from '@wordpress/element'
import classnames from 'classnames'
const { __, sprintf } = wp.i18n;
import { Transition, animated } from '@react-spring/web'
import PalettePreview from './PalettePreview'

const ColorPalettesModal = ({ option, value, onChange, wrapperProps = {} }) => {
	return (
		<animated.div
			className="kmt-option-modal kmt-palettes-modal"
			{...wrapperProps}>
			{value.palettes.map((palette, index) => (
				<PalettePreview
					currentPalette={palette}
					className={
						value.current_palette === palette.id ? 'kmt-active' : ''
					}
					renderBefore={() => (
						<label>
							{sprintf(__('Palette #%s', 'Kemet'), index + 1)}
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
				/>
			))}
		</animated.div>
	)
}

export default ColorPalettesModal