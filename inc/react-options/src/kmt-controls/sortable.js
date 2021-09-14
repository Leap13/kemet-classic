import PropTypes from 'prop-types';
import { useState } from 'react';
import { SortableContainer, SortableElement } from 'react-sortable-hoc';
import { arrayMoveImmutable } from 'array-move';

const SortableItem = SortableElement(({ value, handleClick, indexValue, values }) => {
    let invisibleClass = values.includes(indexValue) ? " " : 'invisible';
    return (
        <li tabIndex={0} key={value} className={`kmt-sortable-item ${invisibleClass} `} data-value={indexValue} >

            <i className="dashicons dashicons-visibility visibility" onClick={() => { handleClick(value, indexValue) }}></i>
            {value}
            <i class="dashicons dashicons-menu"></i>
        </li>
    )
});
const SortableList = SortableContainer(({ items, onChange, values }) => {
    return (
        <ul>
            {Object.values(items).map((value, index) => (
                <SortableItem key={`${value[0]}`} index={index} indexValue={value[0]} value={value[1]} handleClick={onChange} values={values} style={{ zIndex: 99999999 }} />
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
    const [isDragging, setDragging] = useState(false)

    const [sortItems, setSortItems] = useState(Object.entries(choices))

    let labelHtml = label ? <span className="customize-control-title kmt-control-title">{label}</span> : null;

    let descriptionHtml = description ? <span className="description customize-control-description">{description}</span> : null;

    const onSortEnd = ({ oldIndex, newIndex }) => {
        setSortItems(arrayMoveImmutable(sortItems, oldIndex, newIndex));
        setDragging(false)
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
    const updateBeforeSortStart = () => {
        setDragging(true)
    }

    return <label className='kmt-sortable'>
        {labelHtml}
        {descriptionHtml}
        <SortableList
            items={sortItems}
            values={value}
            onSortEnd={onSortEnd}
            onChange={(item, index) => updateValues(item, index)}
            updateBeforeSortStart={updateBeforeSortStart}
            isDragging={isDragging}
            hideSortableGhost={false}
            helperClass="sortable-list-tab"
        />
    </label>;

};

SortableComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(SortableComponent);
