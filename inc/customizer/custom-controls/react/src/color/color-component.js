import PropTypes from 'prop-types';
const { Fragment } = wp.element;
const { Tooltip, Button, Dashicon } = wp.components;
import KemetColorPickerControl from '../common/color';
import { useEffect, useState } from 'react';

const ColorComponent = props => {

    let value = props.control.setting.get();

    let defaultValue = props.control.params.default;

    const [state, setState] = useState({
        value: value,
    });

    useEffect(() => {
        // If settings are changed externally.
        if (state.value !== value) {
            setState(value);
        }
    }, [props]);

    const updateValues = (value) => {
        setState(prevState => ({
            ...prevState,
            value: value
        }));
        props.control.setting.set(value);
    };
    let resetButton = true;
    const tempValue = state.value.replace('unset', '');

    if (JSON.stringify(tempValue) !== JSON.stringify(defaultValue)) {
        resetButton = false;
    }


    const handleChangeComplete = (color) => {
        let value;

        if (typeof color === 'string') {
            value = color;
        } else if (undefined !== color.rgb && undefined !== color.rgb.a && 1 !== color.rgb.a) {
            value = `rgba(${color.rgb.r},${color.rgb.g},${color.rgb.b},${color.rgb.a})`;
        } else {
            value = color.hex;
        }

        updateValues(value);
    };


    const {
        label
    } = props.control.params;

    return <div className="kemet-control-field kemet-color-control">
        <span className="customize-control-title">
            <Fragment>
                <Tooltip text={__('Reset Values')}>
                    <Button
                        className="reset kemet-reset"
                        disabled={resetButton}
                        onClick={(e) => {
                            e.preventDefault();
                            let value = JSON.parse(JSON.stringify(defaultValue));

                            if (undefined === value || '' === value) {
                                value = 'unset';
                            }

                            updateValues(value);
                        }}
                    >
                        <Dashicon icon='image-rotate' />
                    </Button>
                </Tooltip>
                {props.control.params.label && (
                    props.control.params.label
                )}
            </Fragment>
        </span>
        <div className="kmt-color-picker-alpha color-picker-hex">
            <KemetColorPickerControl
                color={undefined !== state.value && state.value ? state.value : ''}
                onChangeComplete={(color, backgroundType) => handleChangeComplete(color)}
                backgroundType={'color'}
                allowGradient={false}
                allowImage={false}
            />
        </div>
    </div >;

};


ColorComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default ColorComponent;