import { addCss } from "../helpers";

let control = '';
let data = {};
const colorPreview = (controlId, controlData) => {
    wp.customize(controlId, function (valueData) {
        valueData.bind(function (value) {
            const { responsive } = controlData;
            data = controlData;
            control = controlId;
            if (responsive) {
                applyResponsiveValue(value);
            } else {
                applyColorValue(value);
            }
        })
    })
}

const applyColorValue = (value) => {
    if (value) {
        let controlData = data;
        delete controlData.type;
        let dynamicStyle = '';
        Object.keys(controlData).map(colorId => {
            const { property, selector } = controlData[colorId];
            dynamicStyle += `${selector}{${property}: ${value[colorId]}}`;
        })
        addCss(dynamicStyle, control);
    }
}

const applyResponsiveValue = (value) => {
    if (value) {
        let controlData = data;
        delete controlData.type;
        delete controlData.responsive;
        const { desktop, tablet, mobile } = value;
        let dynamicStyle = '';

        if (desktop) {
            Object.keys(controlData).map(colorId => {
                const { property, selector } = controlData[colorId];
                dynamicStyle += `${selector}{${property}: ${desktop[colorId]}}`;
            })
        }
        if (tablet) {
            dynamicStyle += `@media (max-width: 768px) { ${Object.keys(controlData).map(colorId => {
                const { property, selector } = controlData[colorId];
                dynamicStyle += `${selector}{${property}: ${tablet[colorId]}}`;
            })} }`;
        }
        if (mobile) {
            dynamicStyle += `@media (max-width: 544px) { ${Object.keys(controlData).map(colorId => {
                const { property, selector } = controlData[colorId];
                dynamicStyle += `${selector}{${property}: ${mobile[colorId]}}`;
            })} }`;
        }

        addCss(dynamicStyle, control);
    }
}
export default colorPreview