import React, { Component } from 'react'
import PropTypes from 'prop-types';
const { __ } = wp.i18n;


class Responsive extends Component {
    constructor(props) {
        super(props);
        this.state = {
            view: 'desktop'
        };
        this.linkResponsiveButtons();
    }

    render() {
        return (
            <>
                <span className="customize-control-title">{this.props.label}</span>
                <ul className="kmt-responsive-control-btns kmt-responsive-slider-btns">
                    <li className="desktop active">
                        <button type="button" className="preview-desktop active" data-device="desktop">
                            < i class="dashicons dashicons-desktop" onClick={() => {
                                let event = new CustomEvent(
                                    'KemetChangedRepsonsivePreview', {
                                    'detail': 'tablet'
                                });
                                document.dispatchEvent(event);
                            }} ></i>
                        </button>
                    </li>
                    <li class="tablet ">
                        <button type="button" className="preview-tablet " data-device="tablet" >
                            <i class="dashicons dashicons-tablet" onClick={() => {
                                let event = new CustomEvent(
                                    'KemetChangedRepsonsivePreview', {
                                    'detail': 'mobile'
                                });
                                document.dispatchEvent(event);
                            }} ></i>
                        </button>
                    </li>
                    <li class="mobile">
                        <button type="button" className="preview-mobile" data-device="mobile" >
                            <i className="dashicons dashicons-smartphone" onClick={() => {
                                let event = new CustomEvent(
                                    'KemetChangedRepsonsivePreview', {
                                    'detail': 'desktop'
                                });
                                document.dispatchEvent(event);
                            }} ></i>
                        </button>
                    </li>
                </ul>
                {this.props.children}
            </>
        )
    }
    changeViewType(device) {
        this.setState({ view: device });
        wp.customize.previewedDevice(device);
        this.props.onChange(device);
    }

    linkResponsiveButtons() {
        let self = this;
        document.addEventListener('KemetChangedRepsonsivePreview', function (e) {
            self.changeViewType(e.detail);
        });
    }
}

Responsive.propTypes = {
    onChange: PropTypes.func,
    controlLabel: PropTypes.string
};
Responsive.defaultProps = {
    tooltip: true,
};

export default Responsive;
