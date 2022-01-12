import { addCss } from "../helpers";

let control = '';
let data = {};
const sliderPreview = (controlId, controlData) => {
    const { responsive } = controlData;
    wp.customize(controlId, function (valueData) {
        valueData.bind(function (value) {
            data = controlData;
            control = controlId;
            if (responsive) {
                applyResponsiveValue(value);
            } else {
                applySliderValue(value);
            }
        })
    })
}

const applySliderValue = (value) => {
    if (value) {
        const { selector, property } = data;
        const { value: newValue, unit } = value;
        const dynamicStyle = `${selector}{${property}: ${newValue + unit}}`;
        addCss(dynamicStyle, control);
    }
}

const applyResponsiveValue = (value) => {
    if (value) {
        const defaultUnit = 'px';
        const { desktop, tablet, mobile, 'desktop-unit': desktopUnit, 'tablet-unit': tabletUnit, 'mobile-unit': mobileUnit } = value;
        const { selector, property } = data;
        let dynamicStyle = '';

        if (desktop) {
            dynamicStyle += `${selector}{${property}: ${desktop + (desktopUnit || defaultUnit)}}`;
        }
        if (tablet) {
            dynamicStyle += `@media (max-width: 768px) { ${selector}{${property}: ${tablet + (tabletUnit || defaultUnit)}} }`;
        }
        if (mobile) {
            dynamicStyle += `@media (max-width: 544px) { ${selector}{${property}: ${mobile + (mobileUnit || defaultUnit)}} }`;
        }

        addCss(dynamicStyle, control);
    }
}
export default sliderPreview