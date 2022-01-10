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
        let defaultValue = {
            value: '',
            unit: 'px'
        }
        let ResDefaultParam = {
            "desktop": defaultValue.value,
            "desktop-unit": defaultValue.unit,
            'tablet': defaultValue.value,
            'tablet-unit': '',
            'mobile': defaultValue.value,
            'mobile-unit': ''
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
            currentDevice: wp.customize && wp.customize.previewedDevice(),
            defaultVal: defaultVals
        }

        this.updateValues = this.updateValues.bind(this)

        this.handleUnitChange = this.handleUnitChange.bind(this)

        this.getCurrentDeviceValue = this.getCurrentDeviceValue.bind(this)
    }

    updateValues = (value) => {
        let updateState = this.getCurrentDeviceValue();
        (this.responsive) ? updateState[this.state.currentDevice] = value : updateState[`value`] = value;
        this.props.onChange(updateState);
        this.setState({ initialState: updateState });
    }

    handleUnitChange = (device, value) => {
        let updateState = this.getCurrentDeviceValue();
        this.responsive ? updateState[`${device}-unit`] = value : updateState[`unit`] = value;
        this.props.onChange(updateState);
        this.setState({ initialState: updateState });
    }

    getCurrentDeviceValue = () => {
        let initialState = { ...this.state.initialState };

        if (this.responsive) {
            const largerDevice = this.state.currentDevice === 'mobile' ? this.state.initialState['tablet'] ? 'tablet' : 'desktop' : 'desktop';
            if (!initialState[this.state.currentDevice]) {
                initialState[this.state.currentDevice] = initialState[largerDevice]
            }
            if (!initialState[`${this.state.currentDevice}-unit`]) {
                initialState[`${this.state.currentDevice}-unit`] = initialState[`${largerDevice}-unit`];
            }
        }

        return initialState;
    }

    render() {
        let { label, suffix, description } = this.props.params;
        let suffixContent = suffix ? <span class="kmt-range-unit">{suffix}</span> : null;
        let descriptionContent = (description || description !== '') ? <span class="description customize-control-description">{description}</span> : null;
        let dataAttributes = ''
        let units = [];
        let initialState = this.getCurrentDeviceValue();

        if (this.unit_choices) {
            for (const [key, value] of Object.entries(this.unit_choices)) {
                units.push(key)
                if (this.responsive) {
                    if (key == initialState[`${this.state.currentDevice}-unit`]) {
                        dataAttributes = { min: value.min, max: value.max, step: value.step };
                    }
                } else {
                    if (key == initialState[`unit`]) {
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
        ) : <span className="customize-control-title kmt-control-title">{label}</span>;

        let unitHTML = units.map((unit) => {
            let unit_class;
            if (this.responsive) {
                (initialState[`${this.state.currentDevice}-unit`] === unit) ?
                    unit_class = 'active' : unit_class = ""

            } else {
                (initialState[`unit`] === unit) ?
                    unit_class = 'active' : unit_class = ""

            }

            return (<li className={`single-unit ${unit_class}`} data-unit={unit}  >
                <span className="unit-text" onClick={value => this.handleUnitChange(this.state.currentDevice, unit)} >{`${unit}`}</span>
            </li>)

        })

        let sliderValue = this.responsive ? initialState[this.state.currentDevice] : initialState[`value`]
        return (
            <Fragment>
                <header>
                    <div className={`kmt-slider-title-wrap`}>
                        {labelContent}
                    </div>
                    <ul className="kmt-slider-units">
                        {unitHTML}
                    </ul>
                </header>

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
                            <input type="number"
                                value={sliderValue}
                                step={dataAttributes.step}
                                max={dataAttributes.max}
                                min={dataAttributes.min}
                                onChange={({ target: { value } }) => this.updateValues(Number(value))} />
                            {suffixContent}
                        </div>

                    </div>

                    <button className="kmt-slider-reset" disabled={JSON.stringify(initialState) === JSON.stringify(this.state.defaultVal)} onClick={e => {
                        e.preventDefault()
                        this.props.onChange({ ...this.state.defaultVal });
                        this.setState({ initialState: { ...this.state.defaultVal } });
                    }}  >

                    </button>
                </div>
                {descriptionContent}
            </Fragment >
        )
    }

}
ResponsiveSliderComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default ResponsiveSliderComponent;
