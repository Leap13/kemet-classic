import {
	useState,
	useEffect,
} from '@wordpress/element'
import classnames from 'classnames'
import { __ } from '@wordpress/i18n';

import { animated } from '@react-spring/web'


import ResponsiveSliderComponent from '../slider'

const FontOptions = ({ value, defaults, onChange, props }) => {
	return (
		<animated.ul
			style={props}
			className="kmt-typography-options"
			key="options"
		>
			<li key="size" className={`customize-control-kmt-slider`}>

				<ResponsiveSliderComponent
					value={value.size}
					values={value}
					id="size"
					params={{
						id: 'size',
						label: __('Font Size', 'kemet'),
						value: 35,
						responsive: true,
						default: defaults.size ? defaults.size : '',
						unit_choices: {
							'px': {
								min: 0,
								max: 200,
								step: 1,
							},
							'em': {
								min: 0,
								max: 12,
								step: 0.1
							},
						},
					}}
					onChange={(newValue) =>
						onChange({
							...value,
							size: newValue,
						})}
				/>
			</li>

			<li key="line-height" className={`customize-control-kmt-slider`}>
				<ResponsiveSliderComponent
					value={value['line-height']}
					values={value}
					id='line-height'
					params={{
						id: 'size',
						label: __('Line Height', 'kemet'),
						value: 35,
						default: defaults['line-height'] ? defaults['line-height'] : '',
						responsive: true,
						unit_choices: {

							'px': {
								min: 0,
								max: 100,
								step: 1,
							},
							'em': {
								min: 0,
								max: 12,
								step: 0.1
							},
						},
					}}
					onChange={(newValue) =>
						onChange({
							...value,
							'line-height': newValue,
						})}
				/>
			</li>

			<li key="letter-space" className={`customize-control-kmt-slider`}>
				<ResponsiveSliderComponent
					value={value['letter-spacing']}
					values={value}
					id='letter-spacing'
					params={{
						id: 'size',
						label: __('Letter Spacing', 'kemet'),
						value: 35,
						responsive: true,
						default: defaults['letter-spacing'] ? defaults['letter-spacing'] : '',
						unit_choices: {

							'px': {
								min: -20,
								max: 20,
								step: 0.1,
							},
							'em': {
								min: -5,
								max: 5,
								step: 1
							},
						},
					}}
					onChange={(newValue) =>
						onChange({
							...value,
							'letter-spacing': newValue,
						})
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