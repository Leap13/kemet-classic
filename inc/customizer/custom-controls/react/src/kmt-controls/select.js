import PropTypes from 'prop-types';
import { useState } from 'react';


const SelectComponent = props => {

    const [props_value, setPropsValue] = useState(props.value);

    const HandleChange = (value) => {
        setPropsValue(value);
        props.onChange(value);
    };

    const {
        label,
        name,
        choices,
        multiple,
        class: customClass
    } = props.params;

    let labelContent = label ? <span className="customize-control-title">{label}</span> : null;

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
            <select className={`kmt-select-input${customClass ? ' ' + customClass : ''}`} data-name={name} data-value={props_value} value={props_value}
                onChange={() => {
                    HandleChange(event.target.value);
                }} multiple={multiple ? true : false}>
                {optionsHtml}
            </select>
        </div>
    </>;

};

SelectComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(SelectComponent);