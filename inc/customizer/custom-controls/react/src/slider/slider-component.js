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
        let responsiveDefaultValues = this.props.control.params.default
            ? {
                ...ResDefaultParam,
                ...this.props.control.params.default,
            }
            : ResDefaultParam;
        value = value
            ? {
                ...responsiveDefaultValues,
                ...value,
            }
            : responsiveDefaultValues;
        this.state = {
            initialState: value,
            currentDevice: 'desktop',
            ResponsiveDefaultVal: responsiveDefaultValues,


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
            updateState = value;
        }
        this.props.control.setting.set(updateState);
        this.setState({ initialState: updateState });
    }
    handleUnitChange = (device, value) => {

        let updateState = {
            ...this.state.initialState
        };

        updateState[`${device}-unit`] = value;

        updateState[`${device}-unit`] = value;
        this.props.control.setting.set(updateState);
        this.setState({ initialState: updateState });
    }
    handleReset = (e) => {
        e.preventDefault();
        if (this.responsive) {
            let defUnit = this.state.ResponsiveDefaultVal[`${this.state.currentDevice}-unit`],
                size = this.state.ResponsiveDefaultVal[this.state.currentDevice];
            let updateState = {
                ...this.state.ResponsiveDefaultVal
            };
            updateState[`${this.state.currentDevice}-unit`] = defUnit;
            updateState[this.state.currentDevice] = size;
            this.props.control.setting.set(updateState);
            this.setState({ initialState: updateState });
        } else {
            let value = JSON.parse(JSON.stringify(this.defaultValue));
            this.setState({ initialState: value });
        }
    }

    render() {
        let input_attrs = ''
        let { label, suffix, description } = this.props.control.params;
        if (!this.responsive) {
            input_attrs = this.props.control.params.input_attrs;

        }
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
                    dataAttributes = { min: input_attrs.min, max: input_attrs.max, step: input_attrs.step };

                }
            }
        } else {
            dataAttributes = { min: input_attrs.min, max: input_attrs.max, step: input_attrs.step };

        }
        let labelContent = this.responsive ? (
            <Responsive
                onChange={(currentDevice) => this.setState({ currentDevice })}
                label={label}
            />
        ) : <span className="customize-control-title">{label}</span>;
        let unitHTML = units.map((unit) => {
            let unit_class = '';
            if (this.state.initialState[`${this.state.currentDevice}-unit`] === unit) {
                unit_class = 'active';
            }
            return (<li className={`single-unit  ${unit_class}`} data-unit={unit}  >
                <span className="unit-text" onClick={value => this.handleUnitChange(this.state.currentDevice, unit)} >{`${unit}`}</span>
            </li>)

        })

        let sliderValue = this.responsive ? this.state.initialState[this.state.currentDevice] : this.state.initialState

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
