import PropTypes from "prop-types";
import { Fragment, useState } from "react";
import Responsive from '../common/responsive'
const { __ } = wp.i18n;
const { ButtonGroup, Button } = wp.components;
import kmtEvents from "../common/events";

const RadioComponent = (props) => {
    let value = props.value;
    const [device, setDevice] = useState('desktop');

    const HandleChange = (value) => {

        if (responsive) {
            props.onChange({ ...value, flag: !props.value.flag });
        } else {
            props.onChange(value);
        }

        if (props.id.includes('footer-columns')) {
            let row = props.id.replace('-footer-columns', '');
            kmtEvents.trigger("KemetUpdateFooterColumns", row);
        }

        setState(value);
    };

    const {
        label,
        name,
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
    value = value ? value : defaultVal;
    const [state, setState] = useState(value);

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
    const renderButtons = () => {
        let currentChoices = choices
        const currentVal = getCurrentDeviceValue();

        return <Fragment>
            {Object.keys(currentChoices).map((choice) => {
                const currentValue = responsive ? currentVal[device] : currentVal
                return <Button
                    isTertiary
                    className={choice == currentValue ? 'active-radio' : ''}
                    onClick={() => {
                        let newValue = { ...state }
                        if (responsive) {
                            newValue[device] = choice;
                        } else {
                            newValue = choice;
                        }
                        HandleChange(newValue)
                    }}
                >
                    {currentChoices[choice]}
                </Button>
            })}
        </Fragment>
    }
    return <Fragment>
        {responsive ? <Responsive
            onChange={(currentDevice) => setDevice(currentDevice)}
            label={label}
        /> : <span className="customize-control-title kmt-control-title">{label}</span>}
        <ButtonGroup className="kmt-radio-container-control">
            {renderButtons()}
        </ButtonGroup>
    </Fragment>
}

RadioComponent.propTypes = {
    control: PropTypes.object.isRequired,
    customizer: PropTypes.func.isRequired,
};

export default React.memo(RadioComponent);