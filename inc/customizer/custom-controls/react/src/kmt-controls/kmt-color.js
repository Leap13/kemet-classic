import PropTypes from 'prop-types';
import ColorComponent from './color';
import { useEffect, useState } from 'react';
import Responsive from '../common/responsive'
const { __ } = wp.i18n;

const KemetColorComponent = props => {
    let value = props.value;

    let responsiveBaseDefault = {
        'desktop': {},
        'tablet': {},
        'mobile': {}
    }
    let { pickers, responsive } = props.params;
    let baseDefault = responsive ? responsiveBaseDefault : {};
    pickers.map(({ id }) => {
        if (responsive) {
            baseDefault['desktop'][id] = '';
            baseDefault['tablet'][id] = '';
            baseDefault['mobile'][id] = '';
        } else {
            baseDefault[id] = '';
        }
    })
    baseDefault = props.params.default ? props.params.default : baseDefault;

    let defaultValue = props.params.default ? props.params.default : baseDefault;

    value = value ? value : defaultValue;
    const [state, setState] = useState(value);
    const [device, setDevice] = useState('desktop');
    let responsiveHtml = null;
    let optionsHtml = null;
    let innerOptionsHtml = null;

    useEffect(() => {

        if (state.value !== value) {
            setState(value);
        }
    }, []);

    const renderOperationButtons = () => {
        return <>
            <div className="kmt-color-btn-reset-wrap">
                <button
                    className="kmt-reset-btn components-button components-circular-option-picker__clear is-small"
                    disabled={(JSON.stringify(state) === JSON.stringify(defaultValue))}
                    onClick={e => {
                        e.preventDefault();
                        let val = responsive ? JSON.parse(JSON.stringify(defaultValue[device])) : JSON.parse(JSON.stringify(defaultValue));
                        setState(val)
                        props.onChange(val);
                    }}>
                    <span className="dashicons dashicons-image-rotate"></span>
                </button>
            </div>
        </>;
    };



    console.log(value)

    if (responsive) {
        responsiveHtml = <Responsive
            onChange={(currentDevice) => setDevice(currentDevice)}
        />
    }

    const renderInputHtml = (device) => {
        innerOptionsHtml = Object.entries(pickers).map(([key, picker]) => {

            if (responsive) {
                return (
                    <ColorComponent
                        value={state[device]}
                        picker={picker}
                        onChange={props.onChange}
                    />
                )
            } else {
                return (
                    <ColorComponent
                        value={state}
                        picker={picker}
                        onChange={props.onChange}
                    />
                )
            }

        })
        return innerOptionsHtml

    }


    if (responsive) {
        optionsHtml = <>
            {renderInputHtml(device, 'active')}
        </>;
    } else {
        optionsHtml = <>
            {renderInputHtml('')}
        </>;
    }

    const {
        label,
        description
    } = props.params;

    let labelHtml = label ? <span className="customize-control-title">{label}</span> : null;
    let descriptionHtml = (description !== '' && description) ? <span className="description customize-control-description" > {description}</span> : null;

    return <div className="kmt-control-wrap kmt-color-control-wrap">
        {renderOperationButtons()}
        <div className={`kmt-color-container`}>
            <label>
                {labelHtml}
                {descriptionHtml}
                {responsiveHtml}
            </label>
            <div className={` className="kmt-color-picker-container`}>
                {optionsHtml}
            </div>
        </div>
    </div>;

}


ColorComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default KemetColorComponent;