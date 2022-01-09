import { addCss } from "../helpers";

let control = '';
let data = {};
const boxShadowPreview = (controlId, controlData) => {
    wp.customize(controlId, function (valueData) {
        valueData.bind(function (value) {
            data = controlData;
            control = controlId;
            applyboxShadowValue(value);
        })
    })
}

const applyboxShadowValue = (value) => {
    if (value) {
        const { offsetX, offsetY, blur, spread, color } = value;
        let dynamicStyle = '';
        if (color && (offsetX || offsetY || blur || spread)) {
            const { selector, property } = data;
            dynamicStyle += `${selector}{${property}:${getShadowSliderValues(value, 'desktop')} ${color}}`;
            dynamicStyle += `@media (max-width: 768px) { ${selector}{${property}:${getShadowSliderValues(value, 'tablet')} ${color}} }`;
            dynamicStyle += `@media (max-width: 544px) { ${selector}{${property}:${getShadowSliderValues(value, 'mobile')} ${color}} }`;
        }
        addCss(dynamicStyle, control);
    }
}

const getShadowSliderValues = (value, device) => {
    const { offsetX, offsetY, blur, spread } = value;
    return `${getSliderValue(offsetX, device)} ${getSliderValue(offsetY, device)} ${getSliderValue(blur, device)} ${getSliderValue(spread, device)}`;
}

const getSliderValue = (value, device) => {
    if (value && value[device]) {
        return `${value[device]}${value[`${device}-unit`]}`;
    }
    return '0px';
}

export default boxShadowPreview