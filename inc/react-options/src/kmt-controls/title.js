import PropTypes from 'prop-types';
import { Fragment } from '@wordpress/element';
const { Dashicon } = wp.components;

const TitleComponent = ({ params: { caption, label, description, infoLink } }) => {

    let captionContent = caption ? htmlCaption = <span className="customize-control-caption">{caption}</span> : null;
    let labelContent = label ? <span className="customize-control-title">{label} {infoLink && <a href={infoLink} target='_blank'><Dashicon icon='editor-help' /></a>}</span> : null;
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