import {
	createElement,
	Component,
	useRef,
	useCallback,
	useMemo,
	createRef,
	Fragment,
} from '@wordpress/element'
import ColorPickerIris from './color-picker-iris.js'
import classnames from 'classnames'
const { __ } = wp.i18n;

import { nullifyTransforms } from '../../helpers/usePopoverMaker'


const focusOrOpenCustomizerSectionProps = (section) => ({
	target: '_blank',
	href: `${window.ct_localizations ? window.ct_localizations.customizer_url : ''
		}${encodeURIComponent(`[section]=${section}`)}`,
	...(wp && wp.customize && wp.customize.section
		? {
			onClick: (e) => {
				e.preventDefault()
				wp.customize.section(section).expand()
			},
		}
		: {}),
})

const getLeftForEl = (modal, el) => {
	if (!modal) return
	if (!el) return

	let style = getComputedStyle(modal)

	let wrapperLeft = parseFloat(style.left)

	el = el.firstElementChild.getBoundingClientRect()

	return {
		'--option-modal-arrow-position': `${el.left + el.width / 2 - wrapperLeft - 6
			}px`,
	}
}

const PickerModal = ({
	containerRef,
	el,
	value,
	picker,
	onChange,
	style,
	wrapperProps = {},
	inline_modal,
	appendToBody,
	inheritValue,
}) => {
	const getValueForPicker = useMemo(() => {




		if ((value.color || '').indexOf('var') > -1) {
			return {
				key: 'var' + value.color,
				color: getComputedStyle(document.documentElement)
					.getPropertyValue(
						value.color.replace(/var\(/, '').replace(/\)/, '')
					)
					.trim()
					.replace(/\s/g, ''),
			}
		}

		return { key: 'color', color: value.color }
	}, [value, picker])

	let valueToCheck = value.color



	const arrowLeft = useMemo(
		() =>
			wrapperProps.ref &&
			wrapperProps.ref.current &&
			el &&
			getLeftForEl(wrapperProps.ref.current, el.current),
		[wrapperProps.ref && wrapperProps.ref.current, el && el.current]
	)

	return (
		<Fragment>
			<div
				tabIndex="0"
				className={classnames(
					`ct-color-picker-modal`,
					{
						'ct-option-modal': !inline_modal && appendToBody,
					},
					option.modalClassName
				)}
				style={{
					...arrowLeft,
					...(style ? style : {}),
				}}
				{...wrapperProps}>
				<div className="ct-color-picker-top">
					<ul className="ct-color-picker-skins">
						{[
							'paletteColor1',
							'paletteColor2',
							'paletteColor3',
							'paletteColor4',
							'paletteColor5',
							'paletteColor6',
							'paletteColor7',
							'paletteColor8',
						].map((color) => (
							<li
								key={color}
								style={{
									background: `var(--${color})`,
								}}
								className={classnames({
									active:
										valueToCheck === `var(--${color})`,
								})}
								onClick={() =>
									onChange({
										...value,
										color: `var(--${color})`,
									})
								}>
								<div className="ct-tooltip-top">
									{
										{
											paletteColor1: 'Color 1',
											paletteColor2: 'Color 2',
											paletteColor3: 'Color 3',
											paletteColor4: 'Color 4',
											paletteColor5: 'Color 5',
											paletteColor6: 'Color 6',
											paletteColor7: 'Color 7',
											paletteColor8: 'Color 8',
										}[color]
									}
								</div>
							</li>
						))}

						{!option.skipNoColorPill && false && (
							<li
								onClick={() =>
									onChange({
										...value
									})
								}
							>
								<i className="ct-tooltip-top">
									{__('No Color', 'blocksy')}
								</i>
							</li>
						)}
					</ul>
				</div>


				<ColorPickerIris
					key={getValueForPicker.key}
					onChange={(v) => onChange(v)}
					value={{
						...value,
						color: getValueForPicker.color,
					}}
				/>
			</div>
		</Fragment>
	)
}

export default PickerModal
