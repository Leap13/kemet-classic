import { addCss } from "../helpers";

export const applyCssValue = (value, data, control) => {
    if (value) {
        const { selector, property } = data;
        const dynamicStyle = `${selector}{${property}: ${value}}`;
        addCss(dynamicStyle, control);
    }
}

export const applyResponsiveCssValue = (value, data, control) => {
    if (value) {
        const { desktop, tablet, mobile } = value;
        const { selector, property } = data;
        let dynamicStyle = '';

        if (desktop) {
            dynamicStyle += `${selector}{${property}: ${desktop}}`;
        }
        if (tablet) {
            dynamicStyle += `@media (max-width: 768px) { ${selector}{${property}: ${tablet}} }`;
        }
        if (mobile) {
            dynamicStyle += `@media (max-width: 544px) { ${selector}{${property}: ${mobile}} }`;
        }

        addCss(dynamicStyle, control);
    }
}
