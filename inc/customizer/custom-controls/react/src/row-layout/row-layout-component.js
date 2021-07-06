import PropTypes from 'prop-types';
import ResponsiveDeviceControl from '../common/responsive-device';

const { __ } = wp.i18n;
const { ButtonGroup, Dashicon, Button } = wp.components;
const { Component } = wp.element;

class RowLayoutComponent extends Component {
    constructor() {

        super(...arguments);

        this.updateValues = this.updateValues.bind(this);
        this.onFooterUpdate = this.onFooterUpdate.bind(this);
        this.onColumnUpdate();
        let value = this.props.control.setting.get();
        let defaultParams = this.props.control.params.input_attrs.layout;
        this.controlParams = this.props.control.params.input_attrs ? {
            ...defaultParams,
            ...this.props.control.params.input_attrs,
        } : defaultParams;
        let responsiveDefault = {
            'mobile': 'row',
            'tablet': '',
            'desktop': 'equal'
        };
        let nonResponsiveDefault = 'equal';
        let baseDefault;
        let type = this.props.control.id.replace('kemet-settings[', '').replace('-footer-layout]', '');
        this.type = type;
        this.footer_type = (this.type === 'fb') ? 'main' : ((this.type === 'fbt') ? 'top' : 'bottom');
        if (this.controlParams.responsive) {
            baseDefault = responsiveDefault;
            this.defaultValue = this.props.control.params.default ? {
                ...baseDefault,
                ...this.props.control.params.default
            } : baseDefault;
        } else {
            baseDefault = nonResponsiveDefault;
            this.defaultValue = this.props.control.params.default ? this.props.control.params.default : baseDefault;
        }
        if (this.controlParams.responsive) {
            value = value ? {
                ...JSON.parse(JSON.stringify(this.defaultValue)),
                ...value
            } : JSON.parse(JSON.stringify(this.defaultValue));
        } else {
            value = value ? value : this.defaultValue;
        }
        let columns = 0;
        columns = parseInt(this.props.customizer.control('kemet-settings[' + this.type + '-footer-column]').setting.get(), 10);
        this.state = {
            currentDevice: 'desktop',
            columns: columns,
            value: value,
            is_updated: false
        };
    }
    render() {

        const Icons = window.svgIcons;
        const responsiveControlLabel = (
            <>
                { this.props.control.params.label &&
                    this.props.control.params.label
                }
            </>
        );

        let controlMap = {}
        if (this.state.currentDevice !== 'desktop') {
            controlMap = this.controlParams.mobile[this.state.columns];
        } else {
            controlMap = this.controlParams.desktop[this.state.columns];
        }

        return (
            <div className="kmt-control-field kmt-radio-icon-control kmt-row-layout-control">
                { this.controlParams.responsive && (
                    <ResponsiveDeviceControl
                        onChange={(currentDevice) => this.setState({ currentDevice })}
                        controlLabel={responsiveControlLabel}
                        device={this.props.device}
                    >
                        <ButtonGroup className="kmt-radio-container-control">
                            {Object.keys(controlMap).map((item, key) => {
                                return (
                                    <Button
                                        key={key}
                                        isTertiary
                                        className={(item === this.state.value[this.state.currentDevice] ?
                                            'active-radio ' :
                                            '') + 'kmt-radio-img-svg kmt-btn-item-' + key}
                                        onClick={() => {
                                            let value = this.state.value;
                                            value[this.state.currentDevice] = item;
                                            this.setState({ value: value });
                                            this.updateValues();
                                        }}
                                    >
                                        { controlMap[item].icon && (
                                            <span
                                                className="kmt-radio-icon"
                                                dangerouslySetInnerHTML={{ __html: Icons[controlMap[item].icon] }}
                                            >
                                            </span>
                                        )}
                                        { controlMap[item].dashicon && (
                                            <span className="kmt-radio-icon kmt-radio-dashicon">
                                                <Dashicon icon={controlMap[item].dashicon} />
                                            </span>
                                        )}
                                        { controlMap[item].name && (
                                            controlMap[item].name
                                        )}
                                    </Button>
                                );
                            })}
                        </ButtonGroup>
                    </ResponsiveDeviceControl>
                )}
            </div>
        );
    }

    onFooterUpdate() {
        const columns = parseInt(this.props.customizer.control('kemet-settings[' + this.type + '-footer-column]').setting.get(), 10);
        let value = this.state.value;
        if (this.state.columns !== columns) {
            this.setState({ columns: columns });
            let defaults = {
                '1': 'full',
                '2': '2-equal',
                '3': '3-equal',
                '4': '4-equal',
                '5': '5-equal',
                '6': '6-equal'
            }
            value.desktop = defaults[columns];
            value.tablet = defaults[columns];
            value.mobile = 'full';
            this.setState({ value: value });
            this.updateValues();
        }
    }

    onColumnUpdate() {
        let self = this;
        document.addEventListener('KemetBuilderChangeRowLayout', function (e) {
            if (e.detail.columns) {
                self.onFooterUpdate();
            }
        });
    }

    updateValues() {

        let event = new CustomEvent(
            'KemetBuilderChangeRowLayout', {
            'detail': {
                'columns': wp.customize.value('kemet-settings[' + this.type + '-footer-column]').get(),
                'layout': this.state.value,
                'type': this.footer_type
            },
        }
        );

        let value = this.state.value;

        document.dispatchEvent(event);
        this.props.control.setting.set({
            ...this.props.control.setting.get(),
            ...value,
            flag: !this.props.control.setting.get().flag
        });
    }
}

RowLayoutComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default RowLayoutComponent;
