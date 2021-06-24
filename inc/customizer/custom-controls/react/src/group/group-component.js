import PropTypes from 'prop-types';

const GroupComponent = props => {

    let htmlLabel = null;
    let htmlHelp = null;
    const {
        label,
        help,
        id
    } = props.control.params;

    if (label) {
        htmlLabel = <span className="customize-control-title">{label}</span>;
    }

    if (help) {
        htmlHelp = <span className="kmt-description">{help}</span>;
    }

    return <>
        <div className="kmt-toggle-desc-wrap">
            <label className="customizer-text">
                {htmlLabel}
                {htmlHelp}
                <span className="kmt-adv-toggle-icon dashicons" data-control={id}></span>
            </label>
        </div>
        <div className="kmt-field-settings-wrap">
        </div>
    </>;
};

GroupComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(GroupComponent);