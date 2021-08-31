import PropTypes from 'prop-types';
import { useRef, useEffect, useState } from 'react';
import { ReactSortable } from "react-sortablejs";

const SortableComponent = props => {

    let labelHtml = null,
        descriptionHtml = null;


    const {
        label,
        description,
        choices,
        inputAttrs
    } = props.params;

    const [value, setValue] = useState([choices])

    console.log(value)

    if (label) {
        labelHtml = <span className="customize-control-title">{label}</span>;
    }

    if (description) {
        descriptionHtml = <span className="description customize-control-description">{description}</span>;
    }

    console.log(props.params, props.value)

    return <label className='kmt-sortable'>
        {labelHtml}
        {descriptionHtml}
        <ReactSortable animation={100} className="sortable" list={value} setList={(newValue) => setValue(newValue)}>
            {value.map((item, index) => {
                return (
                    <div
                        key={item}
                        style={{ border: "1px solid black", padding: "20px 20px" }}
                        data-item={item}
                    >
                        { item['author']}
                    </div>
                );
            })}
        </ReactSortable>
    </label>;

};

SortableComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(SortableComponent);