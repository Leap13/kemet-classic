import PropTypes from 'prop-types';
import { Dashicon } from '@wordpress/components';
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

    const renderRessetButton = () => {

        let resetButton = true;
        const tempValue = state.value.replace('unset', '');

        if (JSON.stringify(tempValue) !== JSON.stringify(defaultValue)) {
            resetButton = false;
        }
        return <span className="customize-control-title">
            <>
                <div className="kmt-color-btn-reset-wrap">
                    <button
                        className="kmt-color-reset"
                        disabled={resetButton} onClick={e => {
                            e.preventDefault();
                            let value = JSON.parse(JSON.stringify(defaultValue));

                            if (undefined === value || '' === value) {
                                value = 'unset';
                            }

                            updateValues(value);
                        }}>
                        <Dashicon icon='image-rotate' />
                    </button>
                </div>
            </>
        </span>;
    };

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


    let labelContent = label ? <span className="customize-control-title">{label}</span> : null;


    return <div className="kmt-control-wrap">
        <label>
            {labelContent}
        </label>
        <div className="kmt-color-picker-alpha color-picker-hex">
            {renderRessetButton()}
            <KemetColorPickerControl
                color={undefined !== state.value && state.value ? state.value : ''}
                onChangeComplete={(color, backgroundType) => handleChangeComplete(color)}
                backgroundType={'color'}
                allowGradient={false}
                allowImage={false}
            />
        </div>
    </div>;

};


ColorComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default ColorComponent;