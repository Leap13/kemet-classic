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
    let predefined = props.params.predefined ? props.params.predefined : false;
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
        // If settings are changed externally.
        if (state.value !== value) {
            setState(value);
        }
    }, []);

    const updateValues = (value) => {
        let UpdatedState = { ...state };
        if (responsive) {
            UpdatedState[device] = value
        }
        else {

            UpdatedState = value
        }
        setState(UpdatedState)
        props.onChange({ ...UpdatedState, flag: !value.flag });

    };

    const renderOperationButtons = () => {
        return <>
            <div className="kmt-color-btn-reset-wrap">
                <button
                    className="kmt-reset-btn "
                    disabled={(JSON.stringify(state) === JSON.stringify(defaultValue))}
                    onClick={e => {
                        e.preventDefault();
                        let value = responsive ? JSON.parse(JSON.stringify(defaultValue[device])) : JSON.parse(JSON.stringify(defaultValue));

                        if (undefined === value || '' === value) {
                            value = 'unset';
                        }

                        updateValues(value);
                    }}>
                </button>
            </div>
        </>;
    };

    const handleChangeComplete = (color, id) => {

        let value = responsive ? state[device] : state;

        if (typeof color === 'string') {
            value[`${id}`] = color;
        } else if (undefined !== color.rgb && undefined !== color.rgb.a && 1 !== color.rgb.a) {
            value[`${id}`] = `rgba(${color.rgb.r},${color.rgb.g},${color.rgb.b},${color.rgb.a})`;
        } else {
            value[`${id}`] = color.hex;
        }

        updateValues(value);
    };


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
                        predefined={predefined}
                        onChangeComplete={(color) => handleChangeComplete(color, picker[`id`])}

                    />
                )
            } else {
                return (
                    <ColorComponent
                        value={state}
                        picker={picker}
                        onChangeComplete={(color) => handleChangeComplete(color, picker[`id`])}


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

        <div className={`kmt-color-container`}>

            <header>
                {renderOperationButtons()}
                {labelHtml}
                {responsiveHtml}
            </header>
            < div className={`kmt-color-picker-container`}>
                {optionsHtml}
            </div>

        </div>
        {descriptionHtml}
    </div>;

}


ColorComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default KemetColorComponent;