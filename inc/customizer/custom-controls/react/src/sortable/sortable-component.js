import PropTypes from 'prop-types';

const SortableComponent = props => {

    let labelHtml = null,
        descriptionHtml = null;


    const {
        label,
        description,
        value,
        choices,
        inputAttrs
    } = props.control.params;

    if (label) {
        labelHtml = <span className="customize-control-title">{label}</span>;
    }

    if (description) {
        descriptionHtml = <span className="description customize-control-description">{description}</span>;
    }

    let visibleMetaHtml = Object.values(value).map(choiceID => {
        let html = '';
        if (choices[choiceID]) {
            html = <li {...inputAttrs} key={choiceID} className='kmt-sortable-item' data-value={choiceID}>

                <i className="dashicons dashicons-visibility visibility"></i>
                {choices[choiceID]}
                <i class="dashicons dashicons-menu"></i>
            </li>;
        }
        return html;
    });

    let invisibleMetaHtml = Object.keys(choices).map(choiceID => {
        let html = '';
        if (Array.isArray(value) && -1 === value.indexOf(choiceID)) {
            html = <li {...inputAttrs} key={choiceID} className='kmt-sortable-item invisible' data-value={choiceID}>

                <i className="dashicons dashicons-visibility visibility"></i>
                {choices[choiceID]}
                <i class="dashicons dashicons-menu"></i>
            </li>;
        }
        return html;
    });

    return <label className='kmt-sortable'>
        {labelHtml}
        {descriptionHtml}
        <ul className="sortable">
            {visibleMetaHtml}
            {invisibleMetaHtml}
        </ul>
    </label>;

};

SortableComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(SortableComponent);