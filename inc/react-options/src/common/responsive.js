import React, { Component } from 'react'
import PropTypes, { instanceOf } from 'prop-types';
const { __ } = wp.i18n;
import classnames from 'classnames'
class Responsive extends Component {
    constructor(props) {
        super(props);
        this.state = {
            view: 'desktop'
        };
        this.linkResponsiveButtons();
    }

    render() {
        const { label } = this.props;

        const handleEvent = (device) => {
            let event;

            switch (device) {
                case 'desktop':
                    event = new CustomEvent(
                        'KemetChangedRepsonsivePreview', {
                        'detail': 'tablet'
                    });
                    break;
                case 'tablet':
                    event = new CustomEvent(
                        'KemetChangedRepsonsivePreview', {
                        'detail': 'mobile'
                    });
                    break;
                case 'mobile':
                    event = new CustomEvent(
                        'KemetChangedRepsonsivePreview', {
                        'detail': 'desktop'
                    });
                    break;
            }
            document.dispatchEvent(event);
        }

        return (
            <>
                { label ? <span className="customize-control-title">{label}</span> : null}
                <ul className="kmt-responsive-control-btns kmt-responsive-slider-btns">
                    {
                        ['desktop', 'tablet', 'mobile'].map((device,) => <li className={classnames(
                            `${device}`, {
                            'active': this.state.view === device
                        }
                        )}>
                            <button type="button" className={classnames(`preview-${device}`, {
                                'active': this.state.view === device
                            })} data-device={`${device}`}>
                                < i class={classnames(`dashicons`,
                                    {
                                        'dashicons-desktop': device === "desktop",
                                        'dashicons-tablet': device === "tablet",
                                        'dashicons-smartphone': device === "mobile",
                                    })} onClick={() => handleEvent(device)} ></i>
                            </button>
                        </li>)
                    }

                </ul>
                { this.props.children}
            </>
        )
    }
    changeViewType(device) {
        this.setState({ view: device });
        wp.customize && wp.customize.previewedDevice(device);
        if (
            wp.data &&
            wp.data.dispatch &&
            wp.data.dispatch('core/edit-post') &&
            wp.data.dispatch('core/edit-post')
                .__experimentalSetPreviewDeviceType
        ) {
            wp.data
                .dispatch('core/edit-post')
                .__experimentalSetPreviewDeviceType(
                    device.replace(/\w/, (c) => c.toUpperCase())
                )
        }
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
