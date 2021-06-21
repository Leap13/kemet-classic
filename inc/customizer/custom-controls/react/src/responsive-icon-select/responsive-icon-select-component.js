import PropTypes from 'prop-types';
import { __ } from '@wordpress/i18n';
import { useEffect, useState } from 'react';
import { Fragment } from 'react';

const ResponsiveIconSelectComponent = props => {


    let value = props.control.setting.get()
    value = (undefined === value || '' === value) ? props.control.params.value : value;
    const [state, setState] = useState(value);

    useEffect(() => {
        if (state !== value) {
            setState(value);
        }
    }, [props]);

    const onLayoutChange = (device, value) => {
        const {
            choices
        } = props.control.params;
        let updateState = {
            ...state
        };
        let deviceUpdateState = {
            ...updateState[device]
        };
        deviceUpdateState = value;
        updateState[device] = deviceUpdateState;
        props.control.setting.set(updateState);
        setState(updateState);

    };

    const renderInputHtml = (device, active = '') => {
        const {
            id,
            title,
            choices,
            inputAttrs,
        } = props.control.params;

        let ContentHTML = [];


        if (choices) {
            for (const [key, icon] of Object.entries(choices)) {

                ContentHTML.push(<label>
                    <input className="icon-select-input" type="radio" value={key} name={`_customize-icon-select-${id}`} checked={value === key} onChange={() => onLayoutChange(device, key)} />
                    <span className="icon-select-label">
                        <div className={`dashicons ${icon['icon']}`}></div>
                    </span>
                </label>)
            }
        }






        return <ul key={device} className={`kmt-spacing-wrapper ${device} ${active}`}>
            {
                ContentHTML.map((elem) => {
                    return elem;
                })
            }
            {linkHtml}

        </ul>;
    };

    const {
        label,
        description
    } = props.control.params;

    let inputHtml = null;
    let responsiveHtml = null;


    let labelContent = label ? <span className="customize-control-title">{label}</span> : null;

    let descriptionContent = <span className="description customize-control-description">{description}</span>;
    inputHtml = <Fragment>
        {renderInputHtml('desktop', 'active')}
        {renderInputHtml('tablet')}
        {renderInputHtml('mobile')}
    </Fragment>;
    responsiveHtml = <Fragment>

        {renderResponsiveInput('desktop')}
        {renderResponsiveInput('tablet')}
        {renderResponsiveInput('mobile')}


    </Fragment>;

    return <label key={'kmt-spacing-responsive'} className='kmt-spacing-responsive' htmlFor="kmt-spacing">
        {labelContent}
        <ul class="kmt-responsive-icon-select-btns kmt-responsive-control-btns">
            <li class="desktop active">
                <button type="button" class="preview-desktop active" data-device="desktop">
                    <i class="dashicons dashicons-desktop"></i>
                </button>
            </li>
            <li class="tablet">
                <button type="button" class="preview-tablet" data-device="tablet">
                    <i class="dashicons dashicons-tablet"></i>
                </button>
            </li>
            <li class="mobile">
                <button type="button" class="preview-mobile" data-device="mobile">
                    <i class="dashicons dashicons-smartphone"></i>
                </button>
            </li>
        </ul>


        {descriptionContent}
        <div className="kmt-spacing-responsive-outer-wrapper">
            <div className="input-wrapper kmt-spacing-responsive-wrapper">
                {inputHtml}
            </div>


            {responsiveHtml}


        </div>
    </label>;

};

ResponsiveIconSelectComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default ResponsiveIconSelectComponent;