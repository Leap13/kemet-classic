import PropTypes from 'prop-types';
import Responsive from '../common/responsive';

const { Component, Fragment } = wp.element;
class ResponsiveSliderComponent extends Component {
    constructor() {
        super(...arguments);
        this.unit_choices = this.props.control.params.unit_choices;
        this.values = this.props.control.params.value;
        let value = this.props.control.setting.get()
        let defaultParam = {
            "desktop": '',
            "desktop-unit": 'px',
            'tablet': '',
            'tablet-unit': 'px',
            'mobile': '',
            'mobile-unit': ''
        }
        let defaultValues = this.props.control.params.default
            ? {
                ...defaultParam,
                ...this.props.control.params.default,
            }
            : defaultParam;
        value = value
            ? {
                ...defaultValues,
                ...value,
            }
            : defaultValues;
        this.state = {
            initialState: value,
            currentDevice: 'desktop',
            defaultVal: defaultValues

        }

        this.updateValues = this.updateValues.bind(this)

        this.handleUnitChange = this.handleUnitChange.bind(this)
    }


    updateValues(device, value) {
        let updateState = {
            ...this.state.initialState
        };
        updateState[device] = value;
        this.props.control.setting.set(updateState);
        this.setState({ initialState: updateState });
    }
    handleUnitChange = (device, value) => {

        let updateState = {
            ...this.state.initialState
        };
        updateState[`${device}-unit`] = value;
        this.props.control.setting.set(updateState);
        this.setState({ initialState: updateState });
    }
    handleReset = (e) => {
        e.preventDefault();

        let defUnit = this.state.defaultVal[`${this.state.currentDevice}-unit`],
            size = this.state.defaultVal[this.state.currentDevice];
        let updateState = {
            ...this.state.defaultVal
        };
        updateState[`${this.state.currentDevice}-unit`] = defUnit;
        updateState[this.state.currentDevice] = size;
        this.props.control.setting.set(updateState);
        this.setState({ initialState: updateState });
    }

    render() {
        let { label, suffix, description } = this.props.control.params;
        let suffixContent = suffix ? <span class="kmt-range-unit">{suffix}</span> : null;
        let descriptionContent = (description || description !== '') ? <span class="description customize-control-description">{description}</span> : null;
        let dataAttributes = ''
        let units = [];
        for (const [key, value] of Object.entries(this.unit_choices)) {
            units.push(key)
            if (key == this.state.initialState[`${this.state.currentDevice}-unit`]) {
                dataAttributes = { min: value.min, max: value.max, step: value.step };
            }
        }
        let labelContent = label ? (
            <Responsive
                onChange={(currentDevice) => this.setState({ currentDevice })}
                label={label}
            />
        ) : null;
        let unitHTML = units.map((unit) => {
            let unit_class = '';
            if (this.state.initialState[`${this.state.currentDevice}-unit`] === unit) {
                unit_class = 'active';
            }
            return (<li className={`single-unit  ${unit_class}`} data-unit={unit}  >
                <span className="unit-text" onClick={value => this.handleUnitChange(this.state.currentDevice, unit)} >{`${unit}`}</span>
            </li>)

        })
        return (
            <label htmlFor="">
                {labelContent}
                <div className="wrapper">
                    {/* Desktop */}
                    <div className={`input-field-wrapper desktop active`}>
                        <input type="range" value={this.state.initialState['desktop']} onChange={(event) => this.updateValues('desktop', event.target.value)} min={`${dataAttributes.min}`} max={`${dataAttributes.max}`} step={`${dataAttributes.step}`} />
                        <div className="kemet_range_value">
                            <input type="number" data-id='desktop' className="kmt-responsive-range-value-input kmt-responsive-range-desktop-input" value={this.state.initialState['desktop']} min={`${dataAttributes.min}`} max={`${dataAttributes.max}`} step={`${dataAttributes.step}`} onChange={(event) => this.updateValues('desktop', event.target.value)} />
                            {suffixContent}
                        </div>
                        <ul className="kmt-slider-responsive-units kmt-slider-desktop-responsive-units">
                            {unitHTML}
                        </ul>
                    </div>
                    {/* Tablet */}
                    <div className={`input-field-wrapper tablet `}>
                        <input type="range" value={this.state.initialState['tablet']} onChange={(value) => this.updateValues('tablet', event.target.value)} min={`${dataAttributes.min}`} max={`${dataAttributes.max}`} step={`${dataAttributes.step}`} />
                        <div className="kemet_range_value">
                            <input type="number" data-id='tablet' className="kmt-responsive-range-value-input kmt-responsive-range-tablet-input" value={this.state.initialState['tablet']} min={`${dataAttributes.min}`} max={`${dataAttributes.max}`} step={`${dataAttributes.step}`} onChange={(value) => this.updateValues('tablet', event.target.value)} />
                            {suffixContent}
                        </div>
                        <ul className="kmt-slider-responsive-units kmt-slider-desktop-responsive-units">
                            {unitHTML}
                        </ul>
                    </div>
                    {/* Mobile */}
                    <div className={`input-field-wrapper mobile `}>
                        <input type="range" value={this.state.initialState['mobile']} onChange={(value) => this.updateValues('mobile', event.target.value)} min={`${dataAttributes.min}`} max={`${dataAttributes.max}`} step={`${dataAttributes.step}`} />
                        <div className="kemet_range_value">
                            <input type="number" data-id='mobile' className="kmt-responsive-range-value-input kmt-responsive-range-mobile-input" onChange={(value) => this.updateValues('mobile', event.target.value)} value={this.state.initialState['mobile']} min={`${dataAttributes.min}`} max={`${dataAttributes.max}`} step={`${dataAttributes.step}`} />
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