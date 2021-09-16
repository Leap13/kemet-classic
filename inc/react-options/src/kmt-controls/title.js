import PropTypes from 'prop-types';
import { Fragment } from '@wordpress/element';

const TitleComponent = ({ params: { caption, label, description } }) => {

    let captionContent = caption ? htmlCaption = <span className="customize-control-caption">{caption}</span> : null;
    let labelContent = label ? <span className="customize-control-title ">{label}</span> : null;
    let descriptionContent = description ? <span className="description customize-control-description" dangerouslySetInnerHTML={{
        __html: description
    }}></span> : null;

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