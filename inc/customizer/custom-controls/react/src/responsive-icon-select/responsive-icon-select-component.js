import PropTypes from 'prop-types';
import { Component } from '@wordpress/element';

class ResponsiveIconSelect extends Component {

    constructor(props) {

        super(...arguments);

        this.choices = this.props.control.params.choices;
        let defaultValues = this.props.control.params.default;
        this.values = this.props.control.params.value;


        let value = this.props.control.params.value;
        this.state = {
            initialState: value,
            currentDevice: 'desktop',


        }
        this.onLayoutChange = this.onLayoutChange.bind(this)
    }


    onLayoutChange(device, key) {

        let updateState = {
            ...this.state.initialState
        };
        updateState[device] = key;
        this.props.control.setting.set(updateState);
        this.setState({ initialState: updateState });
    }

    render() {
        const { label, id, description } = this.props.control.params;

        let html = []
        for (const [key, icon] of Object.entries(this.choices)) {
            html.push(<label>
                <input className={`icon-select-input kmt-responsive-${this.state.currentDevice}-input`} type="radio" checked={this.state.initialState[this.state.currentDevice] === key} value={key} name={`${id}-${this.state.currentDevice}`} onChange={() => this.onLayoutChange(this.state.currentDevice, key)} />
                <span className="icon-select-label">
                    <div className={`dashicons ${icon['icon']}`}></div>
                </span>
            </label>)
        }

        let labelContent = label ? <span className="customize-control-title">{label}</span> : null;
        let descriptionContent = (description || description !== '') ? <span className="customize-control-title">{label}</span> : null;
        const responsiveHtml = (

            <ul className="kmt-responsive-control-btns kmt-responsive-icon-select-btns">
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
            </ul>)

        return (
            <>
                {labelContent}
                {responsiveHtml}
                {descriptionContent}
                {/* Desktop */}
                <div id={`input_${id}`} className="responsive-icon-select desktop active" data-device="desktop">
                    {html.map(elem => elem)}
                </div>
                {/* Tablet */}
                <div id={`input_${id}`} className="responsive-icon-select tablet" data-device="tablet">
                    {html.map(elem => elem)}
                </div>
                {/* Mobile */}
                <div id={`input_${id}`} className=" responsive-icon-select mobile" data-device="mobile">
                    {html.map(elem => elem)}
                </div>
            </>
        );
    }

    updateValues(updateState) {
        this.setState({ value: updateState })
        this.props.control.setting.set(updateState);
    }
}

ResponsiveIconSelect.propTypes = {
    control: PropTypes.object.isRequired
};

export default ResponsiveIconSelect;
