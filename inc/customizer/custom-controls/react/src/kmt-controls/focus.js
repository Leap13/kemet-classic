import PropTypes from "prop-types";
const { __ } = wp.i18n;
const { Dashicon, Button } = wp.components;
const FocusComponent = (props) => {
    let controlParams = props.params.button_params
        ? props.params.button_params
        : {};
    const focusSection = (section) => {
        if (undefined !== wp.customize.section(section)) {
            wp.customize.section(section).focus();
        }
    };
    return (
        <div className="kmt-control-field kmt-focus-button">
            <div className={"kmt-builder-item-start"}>
                <Button
                    className="kmt-builder-item"
                    onClick={() => focusSection(controlParams.section)}
                    data-section={
                        controlParams.section ? controlParams.section : ""
                    }
                >
                    {controlParams.title ? controlParams.title : ""}
                    <span className="kmt-builder-item-icon">
                        <Dashicon icon="arrow-right-alt2" />
                    </span>
                </Button>
            </div>
        </div>
    );
};

FocusComponent.propTypes = {
    control: PropTypes.object.isRequired,
    customizer: PropTypes.func.isRequired,
};

export default React.memo(FocusComponent);
