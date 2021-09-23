import PropTypes from 'prop-types';
import { useState, useEffect, useRef } from 'react';
const SelectComponent = ({ onChange, params, value }) => {

    const [props_value, setPropsValue] = useState(value);

    const HandleChange = (value) => {
        setPropsValue(value);
        onChange(value);
    };

    useEffect(() => {
        select.current.addEventListener('onCustomChange', function (e) {
            HandleChange(e.detail.value);
        })
    });

    const {
        label,
        name,
        choices,
        multiple,
        description,
        class: customClass
    } = params;
    const select = useRef(null);

    return <>
        {label ? <span className="customize-control-title kmt-control-title">{label}</span> : null}
        <div className="customize-control-content">
            <select ref={select} className={`kmt-select-input${customClass ? ' ' + customClass : ''}`} data-name={name} data-value={props_value} value={props_value}
                onChange={({ target: { value: item } }) => {
                    HandleChange(item);
                }}
                multiple={multiple ? true : false}>
                {Object.entries(choices).map(([value, key]) => <option key={key} value={value} dangerouslySetInnerHTML={{
                    __html: key
                }}></option>
                )}
            </select>
            {(description && "" !== description) && <p className="description customize-control-description" >{description}</p>}
        </div>
    </>;

};

SelectComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(SelectComponent);