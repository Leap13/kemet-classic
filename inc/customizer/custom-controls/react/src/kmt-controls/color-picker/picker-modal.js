import { useMemo, Fragment } from '@wordpress/element'
import ColorPickerIris from './color-picker-iris.js'
import classnames from 'classnames'
const { __ } = wp.i18n;


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
	el,
	value,
	picker,
	onChange,
	style,
	wrapperProps = {},
	inline_modal,
	appendToBody
}) => {

	const getValueForPicker = useMemo(() => {
		if ((value || '').indexOf('var') > -1) {
			return {
				key: 'var' + value,
				color: getComputedStyle(document.documentElement)
					.getPropertyValue(
						value.replace(/var\(/, '').replace(/\)/, '')
					)
					.trim()
					.replace(/\s/g, ''),
			}
		}

		return { key: 'color', color: value }
	}, [value, picker])

	let valueToCheck = value

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
					`kmt-color-picker-modal`,
					{
						'kmt-option-modal': !inline_modal && appendToBody,
					},
				)}
				style={{
					...arrowLeft,
					...(style ? style : {}),
				}}
				{...wrapperProps}>
				<div className="kmt-color-picker-top">
					<ul className="kmt-color-picker-skins">
						{[
							'#000000',
							'#ffffff',
							'#dd3333',
							'#dd9933',
							'#eeee22',
							'#81d742',
							'#1e73be',
							"#e2e7ed"

						].map((color, index) => (
							<li
								key={color}
								style={{
									background: color,
								}}
								className={classnames({
									active:
										valueToCheck === color,
								})}
								onClick={() =>
									onChange(color)
								}>
								<div className="kmt-tooltip-top">
									{
										`Color`
									}
								</div>
							</li>
						))}
					</ul>
				</div>


				<ColorPickerIris
					key={getValueForPicker.key}
					onChange={(v) => onChange(v)}
					value={value}
				/>
			</div>
		</Fragment>
	)
}

export default PickerModal
