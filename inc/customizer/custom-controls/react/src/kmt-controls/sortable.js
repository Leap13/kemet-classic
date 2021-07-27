import PropTypes from 'prop-types';
import { useRef, useEffect } from 'react';

const SortableComponent = props => {

    let labelHtml = null,
        descriptionHtml = null;


    const {
        label,
        description,
        choices,
        inputAttrs
    } = props.params;

    const value = props.control.get();
    const list = useRef(null);

    useEffect(() => {
        const updateValue = () => {
            let newValue = [];

            jQuery(list.current).find('li').each(function () {
                if (!jQuery(this).is('.invisible')) {
                    newValue.push(jQuery(this).data('value'));
                }
            });
            props.control.set(newValue);
        }
        jQuery(list.current).sortable({
            stop: function () {
                updateValue();
            }
        }).disableSelection().find('li').each(function () {

            jQuery(this).find('i.visibility').click(function () {
                jQuery(this).toggleClass('dashicons-visibility-faint').parents('li:eq(0)').toggleClass('invisible');
            });
        }).click(function () {
            updateValue();
        });
    }, [])

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
        <ul className="sortable" ref={list}>
            {visibleMetaHtml}
            {invisibleMetaHtml}
        </ul>
    </label>;

};

SortableComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(SortableComponent);