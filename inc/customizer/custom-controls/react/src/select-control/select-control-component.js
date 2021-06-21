import PropTypes from 'prop-types';
import { useState } from 'react';


const SelectControlComponent = props => {

    const [props_value, setPropsValue] = useState(props.control.setting.get());

    const HandleChange = (value) => {
        setPropsValue(value);
        props.control.setting.set(value);
    };

    const {
        label,
        name,
        choices
    } = props.control.params;




    let labelContent = label ? <span className="customize-control-title">{label}</span> : null;


    let optionsHtml = Object.entries(choices).map(key => {
        let html = <option key={key[0]} value={key[0]}>{key[1]}</option>;
        return html;
    });

    return <>
        {htmlLabel}
        <div className="customize-control-content">
            <select className="kmt-select-input" data-name={name} data-value={props_value} value={props_value}
                onChange={() => {
                    HandleChange(event.target.value);
                }}>
                {optionsHtml}
            </select>
        </div>
    </>;

};

SelectControlComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(SelectControlComponent);