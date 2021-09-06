import PropTypes from 'prop-types';
import { useState } from 'react';
import { SortableContainer, SortableElement } from 'react-sortable-hoc';
import { arrayMoveImmutable } from 'array-move';

const SortableItem = SortableElement(({ value, handleClick, newIndex, values }) => {
    let invisibleClass = values.includes(newIndex) ? " " : 'invisible';
    return (
        <li key={value} className={`kmt-sortable-item ${invisibleClass} `} data-value={newIndex} >

            <i className="dashicons dashicons-visibility visibility" onClick={() => { handleClick(value, newIndex) }}></i>
            {value}
            <i class="dashicons dashicons-menu"></i>
        </li>
    )
});
const SortableList = SortableContainer(({ items, onChange, values }) => {
    return (
        <ul>
            {Object.values(items).map((value, index) => (
                <SortableItem key={`item-${value[0]}`} distance={10} index={index} newIndex={value[0]} value={value[1]} handleClick={onChange} values={values} />
            ))}
        </ul>
    )
});

const SortableComponent = props => {
    const {
        label,
        description,
        choices,
    } = props.params;
    const [value, setValue] = useState(props.value);

    const [sortItems, setSortItems] = useState(Object.entries(choices))

    let labelHtml = label ? <span className="customize-control-title">{label}</span> : null;

    let descriptionHtml = description ? <span className="description customize-control-description">{description}</span> : null;

    const onSortEnd = ({ oldIndex, newIndex }) => {
        setSortItems(arrayMoveImmutable(sortItems, oldIndex, newIndex));
    };

    const updateValues = (val, thisIndex) => {
        let newValue = [];
        if (value.includes(thisIndex)) {
            newValue = value.filter((item) => {
                return item !== thisIndex
            })
        } else {
            newValue = [...value, thisIndex]
        }
        setValue(newValue)
        props.onChange(newValue)
    }

    return <label className='kmt-sortable'>
        {labelHtml}
        {descriptionHtml}
        <SortableList
            items={sortItems}
            values={value}
            onSortEnd={onSortEnd}
            onChange={(item, index) => updateValues(item, index)}
            distance={1}
            lockAxis="y"
        />
    </label>;

};

SortableComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(SortableComponent);