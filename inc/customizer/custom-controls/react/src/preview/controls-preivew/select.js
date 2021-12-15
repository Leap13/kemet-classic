import { applyCssValue, applyResponsiveCssValue } from "./kemet-css";
let control = '';
let data = {};

const selectPreview = (controlId, controlData) => {
    wp.customize(controlId, function (valueData) {
        valueData.bind(function (value) {
            const { responsive } = controlData;
            data = controlData;
            control = controlId;

            if (responsive) {
                applyResponsiveCssValue(value, data, control);
            } else {
                applyCssValue(value, data, control);
            }
        })
    })
}

export default selectPreview