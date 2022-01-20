import PropTypes from 'prop-types';
import { useState } from 'react';
import Icons from '../common/icons'
import Responsive from '../common/responsive'

const IconSelectComponent = props => {
    const {
        label,
        description,
        choices,
        responsive,
        default: defaultValue
    } = props.params;

    let defaultVal = responsive ? {
        desktop: '',
        tablet: '',
        mobile: ''
    } : '';

    defaultVal = defaultValue ? defaultValue : defaultVal;
    value = props.value ? props.value : defaultVal;

    const [state, setState] = useState(value);
    const [device, setDevice] = useState('desktop');

    const onLayoutChange = (value) => {
        let updateValue = responsive ? { ...state } : state;
        if (responsive) {
            updateValue[device] = value;
        } else {
            updateValue = value;
        }
        setState(updateValue);
        props.onChange(updateValue);
    };

    const getCurrentDeviceValue = () => {
        let currentValue = state;
        if (responsive) {
            currentValue = { ...state };
            const largerDevice = device === 'mobile' ? state['tablet'] ? 'tablet' : 'desktop' : 'desktop';
            if (!currentValue[device]) {
                currentValue[device] = currentValue[largerDevice];
            }
        }

        return currentValue;
    }

    let ContentHTML = [];

    let labelContent = label ? <span className="customize-control-title kmt-control-title">{label}</span> : null;

    let descriptionContent = (description && description !== '') ? <span className="description customize-control-description">{description}</span> : null;

    ContentHTML = Object.entries(choices).map(([key, icon]) => {
        let currentValue = getCurrentDeviceValue();
        currentValue = responsive ? currentValue[device] : currentValue;
        let iconHtml = Icons[icon['icon']] ? <div>{Icons[icon['icon']]}</div> : <div className={`dashicons ${icon['icon']}`}></div>;
        return <label>
            <input type="radio" className="icon-select-input" value={key} name={`_customize-icon-select-${props.id}`} checked={currentValue === key} onChange={() => onLayoutChange(key)} />
            <span className="icon-select-label">
                {iconHtml}
            </span>
        </label>
    })
    return (
        <label className="customizer-text">
            {responsive ? <Responsive
                onChange={(currentDevice) => setDevice(currentDevice)}
                label={label}
            /> : labelContent}
            {descriptionContent}
            <div id={props.id} className={`icon-select`}>
                {ContentHTML}
            </div>
        </label>
    )
};

IconSelectComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(IconSelectComponent);