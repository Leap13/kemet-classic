import PropTypes from 'prop-types';
import { __ } from '@wordpress/i18n';
import { useEffect, useState } from 'react';
import { Fragment } from 'react';
import Responsive from '../common/responsive';

const SpacingComponent = props => {
	let value = props.value
	const [device, setDevice] = useState('desktop');
	let responsive = props.params.responsive;
	let defaultValue = {
		value: {
			'top': '',
			'right': '',
			'bottom': '',
			'left': ''
		},
		unit: 'px'
	}
	let ResDefaultParam = {
		"desktop": defaultValue.value,
		"tablet": defaultValue.value,
		"mobile": defaultValue.value,
		"desktop-unit": defaultValue.unit,
		'tablet-unit': defaultValue.unit,
		'mobile-unit': defaultValue.unit
	}
	let defaultValues = responsive ? ResDefaultParam : defaultValue;
	let defaultVals = props.params.default
		? {
			...defaultValues,
			...props.params.default,
		}
		: defaultValues;

	value = value
		? {
			...defaultVals,
			...value,
		}
		: defaultVals
		;
	const [state, setState] = useState(value);

	useEffect(() => {
		if (state !== value) {
			setState(value);
		}
	}, [props]);


	const handleToggleClick = (text) => {
		let parent = event.target.parentElement.parentElement;
		let inputs = parent.querySelectorAll('.kmt-spacing-input');
		let elements = event.target.dataset.elementConnect;
		for (let i = 0; i < inputs.length; i++) {
			inputs[i].classList.toggle('connected');
			text === "disconnect" ? inputs[i].setAttribute('data-element-connect', elements) : inputs[i].setAttribute('data-element-connect', '')
		}
		event.target.parentElement.classList.toggle('disconnected');
	};

	const onSpacingChange = (device, choiceID) => {
		const {
			choices
		} = props.params;
		let updateState = {
			...state
		};

		let deviceUpdateState = responsive ? {
			...updateState[device]
		} : {
			...updateState[`value`]
		};

		if (!event.target.classList.contains('connected')) {
			deviceUpdateState[choiceID] = event.target.value;
		} else {
			for (let choiceID in choices) {
				deviceUpdateState[choiceID] = event.target.value;
			}
		}
		responsive ? updateState[device] = deviceUpdateState : updateState[`value`] = deviceUpdateState;
		props.onChange(updateState);
		setState(updateState);
	};

	const onUnitChange = (device, unitKey = '') => {
		let updateState = {
			...state
		};
		responsive ? updateState[`${device}-unit`] = unitKey : updateState[`unit`] = unitKey;
		props.onChange(updateState);
		setState(updateState);
	};

	const renderInputHtml = (device, active = '') => {
		const {
			linked_choices,
			id,
			title,
			choices,
			inputAttrs,
			connected
		} = props.params;

		let connectedClass = false === connected ? '' : 'connected';
		let disconnectedClass = false === connected ? '' : 'disconnected';
		let htmlChoices = null;
		if (choices) {
			htmlChoices = Object.keys(choices).map(choiceID => {
				let inputValue = responsive ? state[device][choiceID] : state[`value`][choiceID];

				let html = <li key={choiceID} {...inputAttrs} className='kmt-spacing-input-item'>
					<input type='number' className={`kmt-spacing-input kmt-spacing-${device} ${connectedClass}`} data-id={choiceID}
						value={inputValue} onChange={() => onSpacingChange(device, choiceID)}
						data-element-connect={id} />
					<span className="kmt-spacing-title">{choices[choiceID]}</span>
				</li>;
				return html;
			});
		}

		let linkHtml = linked_choices ? (
			<li key={'connect-disconnect' + device} className={`kmt-spacing-input-item-link ${disconnectedClass}`}>
				<span title={title}
					className="dashicons  dashicons-editor-unlink  kmt-spacing-disconnected "
					onClick={() => {
						handleToggleClick("disConnect");
					}} data-element-connect={id} >
				</span>
				<span title={title} className="dashicons dashicons-admin-links kmt-spacing-connected "
					onClick={() => {
						handleToggleClick("Connect");
					}} data-element-connect={id} > </span>
			</li>
		) : null;
		return <ul key={device} className={`kmt-spacing-wrapper ${device} ${active}`}>
			{htmlChoices}
			{linkHtml}

		</ul>;
	};

	let responsiveUnit = null;
	const renderUnit = () => {
		const { unit_choices } = props.params;
		if (unit_choices) {
			responsiveUnit = Object.values(unit_choices).map(unitKey => {
				let unitClass;
				if (responsive) {
					(state[`${device}-unit`] === unitKey) ?
						unitClass = 'active' : unitClass = ''

				} else {
					(state[`unit`] === unitKey) ?
						unitClass = 'active' : unitClass = ''
				}
				let html = <li key={unitKey} className={`single-unit ${unitClass}`}
					onClick={() => onUnitChange(device, unitKey)} data-unit={unitKey}>
					<span className="unit-text">{unitKey}</span>
				</li>;
				return html;
			});
		}
		return (<ul key={'responsive-units'}
			className={`kmt-spacing-responsive-units kmt-spacing-${device}-responsive-units`}>
			{responsiveUnit}
		</ul>)
	}

	const handleReset = (e) => {
		e.preventDefault();
		if (responsive) {
			let defUnit = defaultVals[`${device}-unit`],
				size = defaultVals[device];
			let updateState = {
				...defaultVals
			};
			updateState[`${device}-unit`] = defUnit;
			updateState[device] = size;
			props.onChange(updateState);
			setState(updateState);
		} else {
			let defUnit = defaultVals[`unit`],
				size = defaultVals[`value`];
			let updateState = {
				...defaultVals
			};
			updateState[`unit`] = defUnit;
			updateState[`value`] = size;
			props.onChange(updateState);
			setState(updateState);
		}
	}

	const { label, description } = props.params;

	let inputHtml = null;
	let descriptionContent = (description || description !== '') ? <span className="description customize-control-description">{description}</span> : null;
	inputHtml = <Fragment>
		{renderInputHtml(device, 'active')}
	</Fragment>;

	return <div key={'kmt-spacing-responsive'} className='kmt-spacing-responsive' >
		<div className="kmt-spacing-btn-reset-wrap">
			<button
				className="kmt-reset-btn components-button components-circular-option-picker__clear is-small"
				disabled={JSON.stringify(state) === JSON.stringify(defaultVals)}
				onClick={e => handleReset(e)}>
				<span className="dashicons dashicons-image-rotate"></span>
			</button>
		</div>
		{responsive ? <Responsive
			onChange={(currentDevice) => setDevice(currentDevice)}
			label={label}
		/> : <span className="customize-control-title">{label}</span>}
		{renderUnit()}

		{descriptionContent}
		<div className="kmt-spacing-responsive-outer-wrapper">
			<div className="input-wrapper kmt-spacing-responsive-wrapper">
				{inputHtml}
			</div>

		</div>
	</div>;

};

SpacingComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default SpacingComponent;