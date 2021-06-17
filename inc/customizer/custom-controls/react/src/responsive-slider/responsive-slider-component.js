import PropTypes from 'prop-types';
import { useEffect, useState } from 'react';
const ResponsiveSliderComponent = props => {

    let unit_choices = props.control.params.unit_choices;
    console.log(props.control.params)

    let { label, value, suffix, description } = props.control.params;

    let defaultValues = props.control.params.default;
    let suffixContent = suffix ? <span class="kmt-range-unit">{suffix}</span> : null;
    let descriptionContent = description ? <span class="description customize-control-description">{description}</span> : null;

    let desktop_unit_val,
        tablet_unit_val,
        mobile_unit_val = 'px';

    let value_desktop,
        value_tablet,
        value_mobile,
        default_desktop,
        default_tablet,
        default_mobile = '';

    if (value['desktop-unit']) {
        desktop_unit_val = value['desktop-unit'];
    }

    if (value['tablet-unit']) {
        tablet_unit_val = value['tablet-unit'];
    }

    if (value['mobile-unit']) {
        mobile_unit_val = value['mobile-unit'];
    }
    if (value['desktop']) {
        value_desktop = value['desktop'];
    }

    if (value['tablet']) {
        value_tablet = value['tablet'];
    }

    if (value['mobile']) {
        value_mobile = value['mobile'];
    }

    if (defaultValues['desktop']) {
        default_desktop = defaultValues['desktop'];
    }

    if (defaultValues['tablet']) {
        default_tablet = defaultValues['tablet'];
    }

    if (defaultValues['mobile']) {
        default_mobile = defaultValues['mobile'];
    }
    let desktop_attrs = '',
        tablet_attrs = '',
        mobile_attrs = '';

    let units = [];
    for (const [key, value] of Object.entries(unit_choices)) {
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
                        <i i class="dashicons dashicons-desktop" ></i>
                    </button>
                </li>
                <li class="tablet ">
                    <button type="button" className="preview-tablet " data-device="tablet" >
                        <i class="dashicons dashicons-tablet"></i>
                    </button>
                </li>
                <li class="mobile">
                    <button type="button" className="preview-mobile" data-device="mobile" >
                        <i className="dashicons dashicons-smartphone"></i>
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
                    <input type="range" value={value_desktop} />
                    <div className="kemet_range_value">
                        <input type="number" data-id='desktop' className="kmt-responsive-range-value-input kmt-responsive-range-desktop-input" value={value_desktop} min={`${desktop_attrs.min}`} max={`${desktop_attrs.max}`} step={`${desktop_attrs.step}`} />
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
                    <input type="range" value={value_tablet} />
                    <div className="kemet_range_value">
                        <input type="number" data-id='tablet' className="kmt-responsive-range-value-input kmt-responsive-range-tablet-input" value={value_tablet} min={`${tablet_attrs.min}`} max={`${tablet_attrs.max}`} step={`${tablet_attrs.step}`} />
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
                    <input type="range" value={value_mobile} />
                    <div className="kemet_range_value">
                        <input type="number" data-id='mobile' className="kmt-responsive-range-value-input kmt-responsive-range-mobile-input" value={value_mobile} min={`${mobile_attrs.min}`} max={`${mobile_attrs.max}`} step={`${mobile_attrs.step}`} />
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
                <button className="kmt-responsive-slider-reset" >
                    <span className="dashicons dashicons-image-rotate"></span>
                </button>
            </div>
            <div className="kmt-slider-responsive-units-screen-wrap">
                <div className="unit-input-wrapper kmt-slider-unit-wrapper">
                    <input type='hidden' className='kmt-slider-unit-input kmt-slider-desktop-unit' data-device='desktop' value={desktop_unit_val} />
                    <input type='hidden' className='kmt-slider-unit-input kmt-slider-tablet-unit' data-device='tablet' value={tablet_unit_val} />
                    <input type='hidden' className='kmt-slider-unit-input kmt-slider-mobile-unit' data-device='mobile' value={mobile_unit_val} />
                </div>
            </div>
            {descriptionContent}
        </label>
    )


}
ResponsiveSliderComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default ResponsiveSliderComponent;