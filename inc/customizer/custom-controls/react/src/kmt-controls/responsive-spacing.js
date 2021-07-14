import PropTypes from 'prop-types';
import { __ } from '@wordpress/i18n';
import { useEffect, useState } from 'react';
import { Fragment } from 'react';
import Responsive from '../common/responsive';

const ResponsiveSpacingComponent = props => {

    let value = props.control.get()
    let defaultValue = {
        desktop: {
            'top': '',
            'right': '',
            'bottom': '',
            'left': '',
        },
        tablet: {
            'top': '',
            'right': '',
            'bottom': '',
            'left': '',
        },
        mobile: {
            'top': '',
            'right': '',
            'bottom': '',
            'left': '',
        },
        'desktop-unit': 'px',
        'tablet-unit': 'px',
        'mobile-unit': 'px'
    }
    value = value ? value : defaultValue;
    const [state, setState] = useState(value);
    const [device, setDevice] = useState('desktop');

    useEffect(() => {
        if (state !== value) {
            setState(value);
        }
    }, [value]);

    const onConnectedClick = () => {
        let parent = event.target.parentElement.parentElement;
        let inputs = parent.querySelectorAll('.kmt-spacing-input');

        for (let i = 0; i < inputs.length; i++) {
            inputs[i].classList.remove('connected');
            inputs[i].setAttribute('data-element-connect', '');
        }

        event.target.parentElement.classList.remove('disconnected');
    };

    const onDisconnectedClick = () => {
        let elements = event.target.dataset.elementConnect;
        let parent = event.target.parentElement.parentElement;
        let inputs = parent.querySelectorAll('.kmt-spacing-input');

        for (let i = 0; i < inputs.length; i++) {
            inputs[i].classList.add('connected');
            inputs[i].setAttribute('data-element-connect', elements);
        }

        event.target.parentElement.classList.add('disconnected');
    };

    const onSpacingChange = (device, choiceID) => {
        const {
            choices
        } = props.params;
        let updateState = {
            ...state
        };
        let deviceUpdateState = {
            ...updateState[device]
        };

        if (!event.target.classList.contains('connected')) {
            deviceUpdateState[choiceID] = event.target.value;
        } else {
            for (let choiceID in choices) {
                deviceUpdateState[choiceID] = event.target.value;
            }
        }

        updateState[device] = deviceUpdateState;
        props.onChange(props.id, updateState);
        setState(updateState);
    };

    const onUnitChange = (device, unitKey = '') => {
        let updateState = {
            ...state
        };
        updateState[`${device}-unit`] = unitKey;
        props.onChange(props.id, updateState);
        setState(updateState);
    };

    const renderResponsiveInput = (device) => {
        return <input key={device} type='hidden' onChange={() => onUnitChange(device, '')}
            className={`kmt-spacing-unit-input kmt-spacing-${device}-unit`} data-device={`${device}`}
            value={state[`${device}-unit`]}></input>;
    };

    const renderInputHtml = (device, active = '') => {
        const {
            linked_choices,
            id,
            title,
            choices,
            inputAttrs,
            unit_choices,
            connected
        } = props.params;

        let connectedClass = false === connected ? '' : 'connected';
        let disconnectedClass = false === connected ? '' : 'disconnected';


        let htmlChoices = null;

        if (choices) {
            htmlChoices = Object.keys(choices).map(choiceID => {
                let html = <li key={choiceID} {...inputAttrs} className='kmt-spacing-input-item'>
                    <input type='number' className={`kmt-spacing-input kmt-spacing-${device} ${connectedClass}`} data-id={choiceID}
                        value={state[device][choiceID]} onChange={() => onSpacingChange(device, choiceID)}
                        data-element-connect={id} />
                    <span className="kmt-spacing-title">{choices[choiceID]}</span>
                </li>;
                return html;
            });
        }

        let linkHtml = linked_choices ? (
            <li key={'connect-disconnect' + device} className={`kmt-spacing-input-item-link ${disconnectedClass}`}>
                <span title={title}
                    className="dashicons dashicons-admin-links kmt-spacing-connected "
                    onClick={() => {
                        onConnectedClick();
                    }} data-element-connect={id} ></span>
                <span title={title} className="dashicons dashicons-editor-unlink kmt-spacing-disconnected wp-ui-highlight"
                    onClick={() => {
                        onDisconnectedClick();
                    }} data-element-connect={id} ></span>
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
                let unitClass = '';

                if (state[`${device}-unit`] === unitKey) {
                    unitClass = 'active';
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

    const {
        label,
        description
    } = props.params;

    let inputHtml = null;
    let responsiveHtml = null;


    let labelContent = label ? <span className="customize-control-title">{label}</span> : null;

    let descriptionContent = (description && description !== '') ? <span className="description customize-control-description">{description}</span> : null;
    inputHtml = <Fragment>
        {renderInputHtml(device, 'active')}

    </Fragment>;

    responsiveHtml = <Fragment>
        <div className="unit-input-wrapper kmt-spacing-unit-wrapper">
            {renderResponsiveInput(device)}

        </div>

    </Fragment>;

    return <div key={'kmt-spacing-responsive'} className='kmt-spacing-responsive' >

        <Responsive
            onChange={(currentDevice) => setDevice(currentDevice)}
            label={label}
        />
        {renderUnit()}

        {descriptionContent}
        <div className="kmt-spacing-responsive-outer-wrapper">
            <div className="input-wrapper kmt-spacing-responsive-wrapper">
                {inputHtml}
            </div>
            <div className="kmt-spacing-responsive-units-screen-wrap">
                {responsiveHtml}
            </div>
        </div>
    </div>;

};

ResponsiveSpacingComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default ResponsiveSpacingComponent;