import PropTypes from 'prop-types';
import { useEffect, useState } from 'react';
const { Component, Fragment } = wp.element;
class ResponsiveSliderComponent extends Component {
    constructor() {
        super(...arguments);
        this.unit_choices = this.props.control.params.unit_choices;
        this.defaultValues = this.props.control.params.default;
        this.state = {
            currentDevice: 'desktop',
            currentUnit: this.defaultValues['desktop_unit']
        }
        this.values = this.props.control.params.value;
        this.updateValues = this.updateValues.bind(this)
    }

    updateValues(value) {
        this.values[this.state.currentDevice] = value
    }

    render() {
        console.log(this.props.control.params)

        let { label, value, suffix, description } = this.props.control.params;
        let suffixContent = suffix ? <span class="kmt-range-unit">{suffix}</span> : null;
        let descriptionContent = description ? <span class="description customize-control-description">{description}</span> : null;

        let desktop_unit_val,
            tablet_unit_val,
            mobile_unit_val = 'px';



        if (value['desktop-unit']) {
            desktop_unit_val = value['desktop-unit'];
        }

        if (value['tablet-unit']) {
            tablet_unit_val = value['tablet-unit'];
        }

        if (value['mobile-unit']) {
            mobile_unit_val = value['mobile-unit'];
        }

        let desktop_attrs = '',
            tablet_attrs = '',
            mobile_attrs = '';

        let units = [];
        for (const [key, value] of Object.entries(this.unit_choices)) {
            units.push(key)
            if (key == desktop_unit_val) {
                desktop_attrs = { min: value.min, max: value.max, step: value.step };
            }
            if (key == tablet_unit_val) {
                tablet_attrs = { min: value.min, max: value.max, step: value.step };
            }
            if (key == mobile_unit_val) {
                mobile_attrs = { min: value.min, max: value.max, step: value.step };
            }
        }
        let labelContent = label ? (
            <>
                <span className="customize-control-title">{label}</span>
                <ul className="kmt-responsive-control-btns kmt-responsive-slider-btns">
                    <li className="desktop active">
                        <button type="button" className="preview-desktop active" data-device="desktop">
                            <i i class="dashicons dashicons-desktop" onClick={() => this.setState({ currentDevice: 'tablet' })} ></i>
                        </button>
                    </li>
                    <li class="tablet ">
                        <button type="button" className="preview-tablet " data-device="tablet" >
                            <i class="dashicons dashicons-tablet" onClick={() => this.setState({ currentDevice: 'mobile' })} ></i>
                        </button>
                    </li>
                    <li class="mobile">
                        <button type="button" className="preview-mobile" data-device="mobile" >
                            <i className="dashicons dashicons-smartphone" onClick={() => this.setState({ currentDevice: 'desktop' })}></i>
                        </button>
                    </li>
                </ul>
            </>
        ) : null;

        return (
            <label htmlFor="">
                {labelContent}
                <div className="wrapper">
                    {/* Desktop */}
                    <div className={`input-field-wrapper desktop active`}>
                        <input type="range" value={this.values['desktop']} onChange={(value) => this.updateValues(event.target.value)} min={`${desktop_attrs.min}`} max={`${desktop_attrs.max}`} step={`${desktop_attrs.step}`} />
                        <div className="kemet_range_value">
                            <input type="number" data-id='desktop' className="kmt-responsive-range-value-input kmt-responsive-range-desktop-input" value={this.values['desktop']} min={`${desktop_attrs.min}`} max={`${desktop_attrs.max}`} step={`${desktop_attrs.step}`} />
                            {suffixContent}
                        </div>
                        <ul className="kmt-slider-responsive-units kmt-slider-desktop-responsive-units">
                            {units.map((unit) => {
                                let unit_class = '';
                                if (desktop_unit_val === unit) {
                                    unit_class = 'active';
                                }
                                return (<li className={`single-unit  ${unit_class}`} data-unit={unit}  >
                                    <span className="unit-text">{`${unit}`}</span>
                                </li>)

                            })}
                        </ul>
                    </div>
                    {/* Tablet */}
                    <div className={`input-field-wrapper tablet `}>
                        <input type="range" value={this.values['tablet']} onChange={(value) => this.updateValues(event.target.value)} min={`${tablet_attrs.min}`} max={`${tablet_attrs.max}`} step={`${tablet_attrs.step}`} />
                        <div className="kemet_range_value">
                            <input type="number" data-id='tablet' className="kmt-responsive-range-value-input kmt-responsive-range-tablet-input" value={this.values['tablet']} min={`${tablet_attrs.min}`} max={`${tablet_attrs.max}`} step={`${tablet_attrs.step}`} />
                            {suffixContent}
                        </div>
                        <ul className="kmt-slider-responsive-units kmt-slider-desktop-responsive-units">
                            {units.map((unit) => {
                                let unit_class = '';
                                if (tablet_unit_val === unit) {
                                    unit_class = 'active';
                                }
                                return (<li className={`single-unit  ${unit_class}`} data-unit={unit}  >
                                    <span className="unit-text">{`${unit}`}</span>
                                </li>)

                            })}
                        </ul>
                    </div>
                    {/* Mobile */}
                    <div className={`input-field-wrapper mobile `}>
                        <input type="range" value={this.values['mobile']} onChange={(value) => this.updateValues(event.target.value)} min={`${mobile_attrs.min}`} max={`${mobile_attrs.max}`} step={`${mobile_attrs.step}`} />
                        <div className="kemet_range_value">
                            <input type="number" data-id='mobile' className="kmt-responsive-range-value-input kmt-responsive-range-mobile-input" value={this.values['mobile']} min={`${mobile_attrs.min}`} max={`${mobile_attrs.max}`} step={`${mobile_attrs.step}`} />
                            {suffixContent}
                        </div>
                        <ul className="kmt-slider-responsive-units kmt-slider-desktop-responsive-units">
                            {units.map((unit) => {
                                let unit_class = '';
                                if (mobile_unit_val === unit) {
                                    unit_class = 'active';
                                }
                                return (<li className={`single-unit  ${unit_class}`} data-unit={unit}  >
                                    <span className="unit-text">{`${unit}`}</span>
                                </li>)

                            })}
                        </ul>
                    </div>
                    <button className="kmt-responsive-slider-reset" onClick={e => {
                        e.preventDefault();
                        let value = this.defaultValues[this.state.currentDevice];
                        this.updateValues(value);
                    }}  >
                        <span className="dashicons dashicons-image-rotate"></span>
                    </button>
                </div>
                { descriptionContent}
            </label >
        )
    }

}
ResponsiveSliderComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default ResponsiveSliderComponent;