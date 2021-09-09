import {
	Fragment,
	createElement,
	createPortal,
	useState,
	useMemo,
} from '@wordpress/element'
import classnames from 'classnames'

const { __ } = wp.i18n;

import IconsList from './IconsList'
import CustomIcon from './CustomIcon'
import PopoverComponent from '../../common/popover-component';
import { Transition, animated } from '@react-spring/web'
import bezierEasing from 'bezier-easing'

import { packs } from '../icon'

const IconPickerModal = ({
	value,
	onChange,
	picker,
	stopTransitioning,
	el,
	searchString,
	setSearchString,
	isTransitioning,
	isPicking,
}) => {
	const filteredPacks = useMemo(
		() =>
			packs.filter(({ icons }) =>
				searchString.trim().length > 0
					? !!icons.find(
						({ icon }) => icon.indexOf(searchString) > -1
					)
					: true
			),
		[searchString]
	)
	const { styles, popoverProps } = PopoverComponent({
		ref: el,
		defaultHeight: 400,
		shouldCalculate:
			isTransitioning === picker.id ||
			(isPicking || '').split('')[0] === picker.id,
	})

	return (
		(isTransitioning === picker.id ||
			(isPicking || '').split('')[0] === picker.id) &&
		createPortal(
			<Transition
				items={isPicking}
				onRest={(isOpen) => {
					stopTransitioning()
				}}
				config={{
					delay: 50,
					duration: 100,
					easing: bezierEasing(0.25, 0.1, 0.25, 1.0),
				}}
				from={
					(isPicking || '').indexOf('') === -1
						? {
							transform: 'scale3d(0.95, 0.95, 1)',
							opacity: 0,
						}
						: { opacity: 1 }
				}
				enter={
					(isPicking || '').indexOf('') === -1
						? {
							transform: 'scale3d(1, 1, 1)',
							opacity: 1,
						}
						: {
							opacity: 1,
						}
				}
				leave={
					(isPicking || '').indexOf('') === -1
						? {
							transform: 'scale3d(0.95, 0.95, 1)',
							opacity: 0,
						}
						: {
							opacity: 1,
						}
				}>
				{() => isPicking && (
					<animated.div
						style={styles}
						{...popoverProps}
						className="kmt-option-modal kmt-icon-picker-modal"
						onClick={(e) => {
							e.preventDefault()
							e.stopPropagation()
						}}
						onMouseDownCapture={(e) => {
							e.nativeEvent.stopImmediatePropagation()
							e.nativeEvent.stopPropagation()
						}}
						onMouseUpCapture={(e) => {
							e.nativeEvent.stopImmediatePropagation()
							e.nativeEvent.stopPropagation()
						}}>
						<ul className="kmt-modal-tabs">
							<li
								onClick={() => {
									onChange({
										...value,
										source: 'default',
									})
								}}
								className={classnames({
									active: value.source !== 'attachment',
								})}>
								{__('Predefined', 'Kemet')}
							</li>

							<li
								onClick={() => {
									onChange({
										...value,
										source: 'attachment',
									})
								}}
								className={classnames({
									active: value.source === 'attachment',
								})}>
								{__('Custom', 'Kemet')}
							</li>
						</ul>

						{value.source !== 'attachment' && (
							<IconsList
								searchString={searchString}
								filteredPacks={filteredPacks}
								setSearchString={setSearchString}
								onChange={onChange}
								value={value}
							/>
						)}

						{value.source === 'attachment' && (
							<CustomIcon onChange={onChange} value={value} />
						)}
					</animated.div>
				)
				}
			</Transition >,
			document.body
		)
	)
}

export default IconPickerModal
