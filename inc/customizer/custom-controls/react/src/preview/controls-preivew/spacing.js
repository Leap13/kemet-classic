import { addCss } from "../helpers";

let control = '';
let data = {};
const spacingPreview = (controlId, controlData) => {
    wp.customize(controlId, function (valueData) {
        valueData.bind(function (value) {
            const { responsive } = controlData;
            data = controlData;
            control = controlId;
            if (responsive) {
                applyResponsiveValue(value);
            } else {
                applySpacingValue(value);
            }
        })
    })
}

const allEmpty = arr => arr.every(e => e === "");

const applySpacingValue = (value) => {
    if (value) {
        const { selector, property } = data;
        const { value: newValue, unit = 'px' } = value;
        let dynamicStyle = '';

        dynamicStyle += `${selector}{`;
        Object.keys(newValue).map(side => {
            if (newValue[side] !== '') {
                dynamicStyle += `${property}-${side}: ${newValue[side] + unit};`;
            }
        })
        dynamicStyle += '}';

        addCss(dynamicStyle, control);
    }
}

const applyResponsiveValue = (value) => {
    if (value) {
        const defaultUnit = 'px';
        const { desktop, tablet, mobile, 'desktop-unit': desktopUnit, 'tablet-unit': tabletUnit, 'mobile-unit': mobileUnit } = value;
        const { selector, property } = data;

        let dynamicStyle = '';

        if (desktop && !allEmpty(Object.values(desktop))) {
            dynamicStyle += `${selector}{`
            Object.keys(desktop).map(side => {
                if (desktop[side] !== '') {
                    dynamicStyle += `${property}-${side}: ${desktop[side] + (desktopUnit || defaultUnit)};`;
                }
            })
            dynamicStyle += '}';
        }
        if (tablet && !allEmpty(Object.values(tablet))) {
            dynamicStyle += `@media (max-width: 768px) { ${selector}{${Object.keys(tablet).map(side => {
                if (tablet[side] !== '') {
                    dynamicStyle += `${property}-${side}: ${tablet[side] + (tabletUnit || defaultUnit)};`;
                }
            })}} }`;
        }
        if (mobile && !allEmpty(Object.values(mobile))) {
            dynamicStyle += `@media (max-width: 544px) {${selector}{ ${Object.keys(mobile).map(side => {
                if (mobile[side] !== '') {
                    dynamicStyle += `${property}-${side}: ${mobile[side] + (mobileUnit || defaultUnit)};`;
                }
            })}} }`;
        }


        addCss(dynamicStyle, control);
    }
}
export default spacingPreview