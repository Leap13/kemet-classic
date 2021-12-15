import { addCss } from "../helpers";

let control = '';
let data = {};
const borderPreview = (controlId, controlData) => {
    wp.customize(controlId, function (valueData) {
        valueData.bind(function (value) {
            const { responsive } = controlData;
            data = controlData;
            control = controlId;
            if (responsive) {
                applyResponsiveValue(value);
            } else {
                applyBorderValue(value);
            }
        })
    })
}

const getBorderCssValue = (value) => {
    const { selector, property } = data;
    const { secondColor, style, width, color } = value;
    let dynamicStyle = '';
    if (style) {
        if (style === 'none') {
            dynamicStyle += `${selector}{${property}: ${style}}`;
        } else {
            dynamicStyle += `${selector}{${property}: ${width || 1}px ${style} ${color || 'var(--borderColor)'}}`;
            if (secondColor) {
                dynamicStyle += `${selector}:hover{${property}-color: ${secondColor} }`;
            }
        }
    }

    return dynamicStyle;
}

const applyBorderValue = (value) => {
    if (value) {
        let dynamicStyle = getBorderCssValue(value);
        addCss(dynamicStyle, control);
    }
}

const applyResponsiveValue = (value) => {
    if (value) {
        const { desktop, tablet, mobile } = value;
        let dynamicStyle = '';

        if (desktop) {
            dynamicStyle += getBorderCssValue(desktop);
        }
        if (tablet) {
            dynamicStyle += `@media (max-width: 768px) { ${getBorderCssValue(tablet)} }`;
        }
        if (mobile) {
            dynamicStyle += `@media (max-width: 544px) { ${getBorderCssValue(mobile)} }`;
        }

        addCss(dynamicStyle, control);
    }
}
export default borderPreview