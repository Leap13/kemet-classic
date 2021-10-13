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
    }, []);

    const {
        label,
        name,
        choices,
        multiple,
        description,
        class: customClass
    } = params;

    let labelContent = label ? <span className="customize-control-title kmt-control-title">{label}</span> : null;
    const select = useRef(null);
    let optionsHtml = Object.entries(choices).map(key => {
        let html;
        if (typeof key[1] === 'object') {
            html = <optgroup label={key[0]}>
                {Object.entries(key[1]).map(key => {
                    let html = <option key={key[0]} value={key[0]} dangerouslySetInnerHTML={{
                        __html: key[1]
                    }}></option>;
                    return html;
                })}
            </optgroup>
        } else {
            html = <option key={key[0]} value={key[0]}>{key[1]}</option>;
        }
        return html;
    });
    return <>
        {labelContent}
        <div className="customize-control-content">
            <select ref={select} className={`kmt-select-input${customClass ? ' ' + customClass : ''}`} data-name={name} data-value={props_value} value={props_value}
                onChange={() => {
                    HandleChange(event.target.value);
                }} multiple={multiple ? true : false}>
                {optionsHtml}
            </select>
            {description && <p className="description customize-control-description" >{description}</p>}
        </div>
    </>;

};

SelectComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(SelectComponent);