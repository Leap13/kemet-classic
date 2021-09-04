import PropTypes from 'prop-types';
import Responsive from '../common/responsive';
const { RangeControl } = wp.components;
const { Component, Fragment } = wp.element;
class ResponsiveSliderComponent extends Component {
    constructor() {
        super(...arguments);
        this.unit_choices = this.props.params.unit_choices;
        this.values = this.props.params.value;
        this.responsive = this.props.params.responsive;
        let value = this.props.value
        this.defaultValue = this.props.params.default
        let ResDefaultParam = ['destop', 'tablet', 'mobile'].map((device) => (
            {
                [`${device}`]: '',
                [`${device}-unit`]: 'px'
            }
        ))

        let defaultValue = {
            value: '',
            unit: 'px'
        }

        let defaultValues = this.responsive ? ResDefaultParam : defaultValue;

        let defaultVals = this.props.params.default
            ? {
                ...defaultValues,
                ...this.props.params.default,
            }
            : defaultValues;

        value = value
            ? {
                ...defaultVals,
                ...value,
            }
            : defaultVals
            ;

        this.state = {
            initialState: value,
            currentDevice: 'desktop',
            defaultVal: defaultVals
        }

        this.updateValues = this.updateValues.bind(this)

        this.handleUnitChange = this.handleUnitChange.bind(this)
    }

    updateValues(value) {
        let updateState = { ...this.state.initialState };
        if (this.responsive) {
            updateState[this.state.currentDevice] = value;
        } else {
            updateState[`value`] = value;
        }
        this.props.onChange(updateState);
        this.setState({ initialState: updateState });
    }

    handleUnitChange = (device, value) => {

        let updateState = { ...this.state.initialState };
        if (this.responsive) {
            updateState[`${device}-unit`] = value;
        } else {
            updateState[`unit`] = value;
        }
        this.props.onChange(updateState);
        this.setState({ initialState: updateState });
    }

    handleReset = (e) => {
        e.preventDefault();
        if (this.responsive) {
            let defUnit = this.state.defaultVal[`${this.state.currentDevice}-unit`],
                size = this.state.defaultVal[this.state.currentDevice];
            let updateState = {
                ...this.state.defaultVal
            };
            updateState[`${this.state.currentDevice}-unit`] = defUnit;
            updateState[this.state.currentDevice] = size;

        } else {
            let defUnit = this.state.defaultVal[`unit`],
                size = this.state.defaultVal[`value`];
            let updateState = {
                ...this.state.defaultVal
            };
            updateState[`unit`] = defUnit;
            updateState[`value`] = size;
        }
        this.props.onChange(updateState);
        this.setState({ initialState: updateState });
    }

    render() {
        let { label, suffix, description } = this.props.params;

        let suffixContent = suffix ? <span class="kmt-range-unit">{suffix}</span> : null;
        let descriptionContent = (description || description !== '') ? <span class="description customize-control-description">{description}</span> : null;
        let dataAttributes = ''
        let units = [];
        if (this.unit_choices) {
            for (const [key, value] of Object.entries(this.unit_choices)) {
                units.push(key)
                if (this.responsive) {
                    if (key == this.state.initialState[`${this.state.currentDevice}-unit`]) {
                        dataAttributes = { min: value.min, max: value.max, step: value.step };
                    }
                } else {
                    if (key == this.state.initialState[`unit`]) {
                        dataAttributes = { min: value.min, max: value.max, step: value.step };
                    }
                }
            }
        }
        let labelContent = this.responsive ? (
            <Responsive
                onChange={(currentDevice) => this.setState({ currentDevice })}
                label={label}
            />
        ) : <span className="customize-control-title">{label}</span>;

        let unitHTML = units.map((unit) => {
            let unit_class = '';
            if (this.responsive) {
                if (this.state.initialState[`${this.state.currentDevice}-unit`] === unit) {
                    unit_class = 'active';
                }
            } else {
                if (this.state.initialState[`unit`] === unit) {
                    unit_class = 'active';
                }
            }

            return (<li className={`single-unit ${unit_class}`} data-unit={unit}  >
                <span className="unit-text" onClick={value => this.handleUnitChange(this.state.currentDevice, unit)} >{`${unit}`}</span>
            </li>)

        })
        const onChangeInput = (event) => {
            if (event.target.value === '') {
                this.updateValues(undefined);
                return;
            }
            const newValue = Number(event.target.value);
            if (newValue === '') {
                this.updateValues(undefined);
                return;
            }
            if (dataAttributes.min < -0.1) {
                if (newValue > dataAttributes.max) {
                    this.updateValues(dataAttributes.max);
                } else if (newValue < dataAttributes.min && newValue !== '-') {
                    this.updateValues(dataAttributes.min);
                } else {
                    this.updateValues(newValue);
                }
            } else {
                if (newValue > dataAttributes.max) {
                    this.updateValues(dataAttributes.max);
                } else if (newValue < -0.1) {
                    this.updateValues(dataAttributes.min);
                } else {
                    this.updateValues(newValue);
                }
            }
        }
        let sliderValue = this.responsive ? this.state.initialState[this.state.currentDevice] : this.state.initialState[`value`]
        return (
            <label htmlFor="">
                {labelContent}
                <div className="wrapper">
                    <div className={`input-field-wrapper active`}>
                        <RangeControl
                            className={'kmt-range-value-input'}
                            value={sliderValue}
                            onChange={(newVal) => this.updateValues(newVal)}
                            min={`${dataAttributes.min}`}
                            max={`${dataAttributes.max}`}
                            step={`${dataAttributes.step}`}
                            withInputField={false}
                        />
                        <div className="kemet_range_value">
                            <input type="number" className="kmt-range-value__input" value={sliderValue} min={`${dataAttributes.min}`} max={`${dataAttributes.max}`} step={`${dataAttributes.step}`} onChange={onChangeInput} />
                            {suffixContent}
                        </div>
                        <ul className="kmt-slider-units">
                            {unitHTML}
                        </ul>
                    </div>

                    <button className="kmt-slider-reset" disabled={this.state.initialState === this.state.defaultVal ? true : false} onClick={e => this.handleReset(e)}  >
                        <span className="dashicons dashicons-image-rotate"></span>
                    </button>
                </div>
                {descriptionContent}
            </label >
        )
    }

}
ResponsiveSliderComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default ResponsiveSliderComponent;