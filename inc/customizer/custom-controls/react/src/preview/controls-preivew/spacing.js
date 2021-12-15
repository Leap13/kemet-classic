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
        const { selector, property, sides } = data;
        const { value: newValue, unit = 'px' } = value;
        let dynamicStyle = '';
        if (sides) {
            Object.keys(newValue).map(side => {
                if (newValue[side]) {
                    dynamicStyle += `${selector}{${property + side}: ${newValue[side] + unit}}`;
                }
            })
        } else {
            if (!allEmpty(Object.values(newValue))) {
                dynamicStyle += `${selector}{${property}: ${Object.values(newValue).map(value => value + unit).join(" ")}}`;
            }
        }

        addCss(dynamicStyle, control);
    }
}

const applyResponsiveValue = (value) => {
    if (value) {
        const defaultUnit = 'px';
        const { desktop, tablet, mobile, 'desktop-unit': desktopUnit, 'tablet-unit': tabletUnit, 'mobile-unit': mobileUnit } = value;
        const { selector, property, sides } = data;

        let dynamicStyle = '';

        if (sides) {
            if (desktop && !allEmpty(Object.values(desktop))) {
                dynamicStyle += `${selector}{`
                Object.keys(desktop).map(side => {
                    if (desktop[side]) {
                        dynamicStyle += `${property}-${side}: ${desktop[side] + (desktopUnit || defaultUnit)};`;
                    }
                })
                dynamicStyle += '}';
            }
            if (tablet && !allEmpty(Object.values(tablet))) {
                dynamicStyle += `@media (max-width: 768px) { ${selector}{${Object.keys(tablet).map(side => {
                    if (tablet[side]) {
                        dynamicStyle += `${property}-${side}: ${tablet[side] + (tabletUnit || defaultUnit)};`;
                    }
                })}} }`;
            }
            if (mobile && !allEmpty(Object.values(mobile))) {
                dynamicStyle += `@media (max-width: 544px) {${selector}{ ${Object.keys(mobile).map(side => {
                    if (mobile[side]) {
                        dynamicStyle += `${property}-${side}: ${mobile[side] + (mobileUnit || defaultUnit)};`;
                    }
                })}} }`;
            }
        } else {
            if (desktop && !allEmpty(Object.values(desktop))) {
                console.log(desktop);
                dynamicStyle += `${selector}{${property}: ${Object.values(desktop).map(value => value + (desktopUnit || defaultUnit)).join(" ")}}`;
            }
            if (tablet && !allEmpty(Object.values(tablet))) {
                dynamicStyle += `@media (max-width: 768px) { ${selector}{${property}: ${Object.values(tablet).map(value => value + (tabletUnit || defaultUnit)).join(" ")}} }`;
            }
            if (mobile && !allEmpty(Object.values(mobile))) {
                dynamicStyle += `@media (max-width: 544px) { ${selector}{${property}: ${Object.values(mobile).map(value => value + (mobileUnit || defaultUnit)).join(" ")}} }`;
            }
        }


        addCss(dynamicStyle, control);
    }
}
export default spacingPreview