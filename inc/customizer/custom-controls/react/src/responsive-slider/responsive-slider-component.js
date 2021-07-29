import PropTypes from 'prop-types';
import Responsive from '../common/responsive';

const { Component, Fragment } = wp.element;
class ResponsiveSliderComponent extends Component {
    constructor() {
        super(...arguments);
        this.unit_choices = this.props.control.params.unit_choices;
        this.values = this.props.control.params.value;
        this.responsive = this.props.control.params.responsive;
        let value = this.props.control.setting.get()
        this.defaultValue = this.props.control.params.default
        let ResDefaultParam = {
            "desktop": '',
            "desktop-unit": 'px',
            'tablet': '',
            'tablet-unit': 'px',
            'mobile': '',
            'mobile-unit': ''
        }
        let defaultValue = {
            value: '',
            unit: 'px'
        }
        let defaultValues;
        defaultValues = this.responsive ? ResDefaultParam : defaultValue;

        let defaultVals = this.props.control.params.default
            ? {
                ...defaultValues,
                ...this.props.control.params.default,
            }
            : defaultValues;

        value = value
            ? {
                ...defaultVals,
                ...value,
            }
            : defaultValues
            ;

        this.state = {
            initialState: value,
            currentDevice: 'desktop',
            defaultVal: defaultVals,


        }

        this.updateValues = this.updateValues.bind(this)

        this.handleUnitChange = this.handleUnitChange.bind(this)
    }


    updateValues(device, value) {
        let updateState = {
            ...this.state.initialState
        };
        if (this.responsive) {
            updateState[device] = value;
        } else {
            updateState[`value`] = value;
        }
        console.log(updateState);
        this.props.control.setting.set(updateState);
        this.setState({ initialState: updateState });
    }
    handleUnitChange = (device, value) => {

        let updateState = {
            ...this.state.initialState
        };
        if (this.responsive) {
            updateState[`${device}-unit`] = value;

        } else {
            updateState[`unit`] = value;
        }

        this.props.control.setting.set(updateState);
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
            this.props.control.setting.set(updateState);
            this.setState({ initialState: updateState });
        } else {
            let defUnit = this.state.defaultVal[`unit`],
                size = this.state.defaultVal[`value`];
            let updateState = {
                ...this.state.defaultVal
            };
            updateState[`unit`] = defUnit;
            updateState[`value`] = size;
            this.props.control.setting.set(updateState);
            this.setState({ initialState: updateState });
        }
    }

    render() {
        let { label, suffix, description } = this.props.control.params;

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

            return (<li className={`single-unit  ${unit_class}`} data-unit={unit}  >
                <span className="unit-text" onClick={value => this.handleUnitChange(this.state.currentDevice, unit)} >{`${unit}`}</span>
            </li>)

        })

        let sliderValue = this.responsive ? this.state.initialState[this.state.currentDevice] : this.state.initialState[`value`]

        return (
            <label htmlFor="">
                {labelContent}

                <div className="wrapper">

                    <div className={`input-field-wrapper ${this.state.currentDevice} active`}>
                        <input type="range" value={sliderValue} onChange={(event) => this.updateValues(this.state.currentDevice, event.target.value)} min={`${dataAttributes.min}`} max={`${dataAttributes.max}`} step={`${dataAttributes.step}`} />
                        <div className="kemet_range_value">
                            <input type="number" data-id='desktop' className="kmt-responsive-range-value-input kmt-responsive-range-desktop-input" value={sliderValue} min={`${dataAttributes.min}`} max={`${dataAttributes.max}`} step={`${dataAttributes.step}`} onChange={(event) => this.updateValues(this.state.currentDevice, event.target.value)} />
                            {suffixContent}
                        </div>
                        <ul className="kmt-slider-responsive-units kmt-slider-desktop-responsive-units">
                            {unitHTML}
                        </ul>
                    </div>

                    <div className="kmt-responsive-slider-reset" onClick={e => this.handleReset(e)}  >
                        <span className="dashicons dashicons-image-rotate"></span>
                    </div>
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
