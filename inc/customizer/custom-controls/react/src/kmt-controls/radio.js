import PropTypes from "prop-types";
import { Fragment, useState } from "react";
import Responsive from '../common/responsive'

const { __ } = wp.i18n;
const { ButtonGroup, Dashicon, Tooltip, Button } = wp.components;

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
            let event = new CustomEvent(
                'KemetUpdateFooterColumns', {
                'detail': row,
            });
            document.dispatchEvent(event);
        }

        setState((prevState) => ({
            ...prevState,
            value,
        }));
    };

    const {
        label,
        name,
        choices,
        responsive,
        defaultValue
    } = props.params;

    let defaultVal = responsive ? {
        desktop: '',
        tablet: '',
        mobile: ''
    } : '';
    defaultVal = defaultValue ? defaultValue : defaultVal;
    value = value ? value : defaultVal;
    const [state, setState] = useState({
        value
    });

    const renderButtons = () => {
        let currentChoices = choices

        return <Fragment>
            {Object.keys(currentChoices).map((choice) => {
                const currentValue = responsive ? state.value[device] : state.value
                return <Button
                    isTertiary
                    className={choice === currentValue ? 'active-radio' : ''}
                    onClick={() => {
                        let newValue = state.value
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
            onChange={(currentDevice) => setDevice({ currentDevice })}
            label={label}
        /> : <span className="customize-control-title">{label}</span>}
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