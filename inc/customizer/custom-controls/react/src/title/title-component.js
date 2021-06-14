import PropTypes from 'prop-types';
import { Fragment } from '@wordpress/element';

const TitleComponent = props => {

    let captionContent = props.control.params.caption ? htmlCaption = <span className="customize-control-caption">{props.control.params.caption}</span> : null;
    let labelContent = props.control.params.label ? <span className="customize-control-title">{props.control.params.label}</span> : null;
    let descriptionContent = props.control.params.description ? <span className="description customize-control-description">{props.control.params.description}</span> : null;

    return <Fragment>
        {captionContent}
        {labelContent}
        {descriptionContent}
    </Fragment>;
};

TitleComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(TitleComponent);