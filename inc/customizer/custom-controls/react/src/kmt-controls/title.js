import PropTypes from "prop-types";
import { Fragment } from "@wordpress/element";

const TitleComponent = (props) => {
    let captionContent = props.params.caption
        ? (htmlCaption = (
              <span className="customize-control-caption">
                  {props.params.caption}
              </span>
          ))
        : null;
    let labelContent = props.params.label ? (
        <span className="customize-control-title">{props.params.label}</span>
    ) : null;
    let descriptionContent = props.params.description ? (
        <span className="description customize-control-description">
            {props.params.description}
        </span>
    ) : null;

    return (
        <Fragment>
            {captionContent}
            {labelContent}
            {descriptionContent}
        </Fragment>
    );
};

TitleComponent.propTypes = {
    control: PropTypes.object.isRequired,
};

export default React.memo(TitleComponent);
