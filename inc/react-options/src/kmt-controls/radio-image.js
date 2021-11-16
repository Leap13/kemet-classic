import PropTypes from "prop-types";
import { Fragment } from "react";
const { __ } = wp.i18n;
import { useState } from 'react';
const RadioImageComponent = (props) => {
    const [props_value, setPropsValue] = useState(props.value);

    const onLayoutChange = (value) => {
        setPropsValue(value);
        props.onChange(value);
    };

    const {
        label,
        description,
        choices,
        inputAttrs,
        link,
        labelStyle
    } = props.params;
    let inputContent = [];
    let labelContent = label ? <span className="customize-control-title kmt-control-title">{label}</span> : null;

    let descriptionContent = (description && description !== '') ? <span className="description customize-control-description">{description}</span> : null;

    const HandleRepeat = (item) => {
        let splitedItems = item.split(" ").map((item, i) => {
            let item_values = item.split("=");
            if (undefined !== item_values[1]) {
                inputContent[item_values[0]] = item_values[1].replace(/"/g, "");
            }
        })
        return splitedItems;
    }

    inputAttrs ? HandleRepeat(inputAttrs) : null

    link ? HandleRepeat(link) : null

    let radioContent = Object.entries(choices).map(([key, value]) => {
        return (
            <Fragment key={key}>
                <input {...inputContent} className="image-select" type="radio" value={key}
                    checked={props_value === key ? true : false} onChange={() => onLayoutChange(key)} id={key} />

                <label htmlFor={key} {...labelStyle} className="image">
                    <img className="wp-ui-highlight" src={choices[key].path} />
                    <span className="image-clickable" title={choices[key].label}></span>
                </label>
            </Fragment>
        );
    });
    return (
        <Fragment>
            <label className="customizer-text">
                {labelContent}
                {descriptionContent}
            </label>
            <div id={`input_${props.id}`} className="image">
                {radioContent}
            </div>
        </Fragment>
    )
}
RadioImageComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(RadioImageComponent);