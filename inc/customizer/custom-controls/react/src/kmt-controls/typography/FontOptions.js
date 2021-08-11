import {
	Fragment,
	createElement,
	Component,
	useRef,
	useEffect,
	useState,
} from '@wordpress/element'
import classnames from 'classnames'
import { __ } from '@wordpress/i18n';

import { animated } from '@react-spring/web'

import ResponsiveSliderComponent from '../slider'

const FontOptions = ({ option, value, sizeRef, onChange, props }) => {
	return (
		<animated.ul
			style={props}
			className="kmt-typography-options"
			key="options">
			<li key="size" className={`customize-control-kmt-slider`}>
				<ResponsiveSliderComponent
					value={value.size}
					values={value}
					id="size"
					params={{
						id: 'size',
						label: __('Font Size', 'blocksy'),
						value: 35,
						responsive: true,
						unit_choices: {

							'px': {
								min: 0,
								max: 200,
								step: 1,
							},
							'em': {
								min: 0,
								max: 50,
								step: 1
							},





						},



						onChange: () => onChange()
					}

					}
				/>
			</li>

			<li key="line-height" className={`customize-control-kmt-slider`}>
				<ResponsiveSliderComponent
					value={value.size}
					values={value}
					id="size"
					params={{
						id: 'size',
						label: __('Font Size', 'blocksy'),
						value: 35,
						responsive: true,
						unit_choices: {

							'px': {
								min: 0,
								max: 200,
								step: 1,
							},
							'em': {
								min: 0,
								max: 50,
								step: 1
							},





						},



						onChange: () => onChange()
					}

					}
				/>
			</li>

			<li key="letter-space" className={`customize-control-kmt-slider`}>
				<ResponsiveSliderComponent
					value={value.size}
					values={value}
					id="size"
					params={{
						id: 'size',
						label: __('Font Size', 'blocksy'),
						value: 35,
						responsive: true,
						unit_choices: {

							'px': {
								min: 0,
								max: 200,
								step: 1,
							},
							'em': {
								min: 0,
								max: 50,
								step: 1
							},





						},



						onChange: () => onChange()
					}

					}
				/>
			</li>


			<li key="variant" className="kmt-typography-variant">
				<ul className={classnames('kmt-text-transform')}>
					{['capitalize', 'uppercase'].map((variant) => (
						<li
							key={variant}
							onClick={() =>
								onChange({
									...value,
									'text-transform':
										value['text-transform'] === variant
											? 'none'
											: variant,
								})
							}
							className={classnames({
								active: variant === value['text-transform'],
							})}
							data-variant={variant}>
							<i className="kmt-tooltip-top">
								{variant}
							</i>
						</li>
					))}
				</ul>

				<ul className={classnames('kmt-text-decoration')}>
					{['line-through', 'underline'].map((variant) => (
						<li
							key={variant}
							onClick={() =>
								onChange({
									...value,
									'text-decoration':
										value['text-decoration'] === variant
											? 'none'
											: variant,
								})
							}
							className={classnames({
								active: variant === value['text-decoration'],
							})}
							data-variant={variant}>
							<i className="kmt-tooltip-top">
								{variant}
							</i>
						</li>
					))}
				</ul>
			</li>
		</animated.ul>
	)
}

export default FontOptions
