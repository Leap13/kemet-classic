import {
	createElement,
	Component,
	createPortal,
	useRef,
	createRef,
} from '@wordpress/element'
import PickerModal from './picker-modal'
import { Transition } from 'react-spring/renderprops'
import bezierEasing from 'bezier-easing'
import classnames from 'classnames'
const { __ } = wp.i18n;

import usePopoverMaker from '../../helpers/usePopoverMaker'



const SinglePicker = ({
	value,
	onChange,
	picker,

	onPickingChange,
	stopTransitioning,

	innerRef,

	containerRef,
	modalRef,

	isTransitioning,
	isPicking,
}) => {
	const el = useRef()

	const appendToBody = true

	const { refreshPopover, styles, popoverProps } = usePopoverMaker({
		contentRef: modalRef,
		ref: containerRef || {},
		defaultHeight: 379,
		shouldCalculate: appendToBody,
	})



	let modal = null


	modal = createPortal(
		<Transition
			items={isPicking}
			onRest={() => stopTransitioning()}
			config={{
				duration: 100,
				easing: bezierEasing(0.25, 0.1, 0.25, 1.0),
			}}
			from={
				(isPicking || '').indexOf(':') === -1
					? {
						transform: 'scale3d(0.95, 0.95, 1)',
						opacity: 0,
					}
					: { opacity: 1 }
			}
			enter={
				(isPicking || '').indexOf(':') === -1
					? {
						transform: 'scale3d(1, 1, 1)',
						opacity: 1,
					}
					: {
						opacity: 1,
					}
			}
			leave={
				(isPicking || '').indexOf(':') === -1
					? {
						transform: 'scale3d(0.95, 0.95, 1)',
						opacity: 0,
					}
					: {
						opacity: 1,
					}
			}>
			{(isPicking) =>
				(isPicking || '').split(':')[0] === picker.id &&
				((props) => (
					<PickerModal
						style={{
							...props,
							...(appendToBody ? styles : {}),
						}}
						onChange={onChange}
						picker={picker}
						value={value}
						el={el}

						wrapperProps={
							appendToBody
								? popoverProps
								: {
									ref: modalRef,
								}
						}
						appendToBody={appendToBody}
					/>
				))
			}
		</Transition>,
		appendToBody
			? document.body
			: el.current.closest('section').parentNode
	)

	return (
		<div
			ref={(instance) => {
				el.current = instance

				if (innerRef) {
					innerRef.current = instance
				}
			}}
			className={classnames('kmt-color-picker-single', {})}>
			<span tabIndex="0">
				<span
					tabIndex="0"

					onClick={(e) => {

						e.stopPropagation()

						refreshPopover()

						let futureIsPicking = isPicking
							? isPicking.split(':')[0] === picker.id
								? null
								: `${picker.id}:${isPicking.split(':')[0]}`
							: picker.id

						onPickingChange(futureIsPicking)
					}}
					style={{background:value}}
				>
					<i className="kmt-tooltip-top">

					</i>


				</span>
			</span>

			{modal}
		</div>
	)
}

export default SinglePicker
