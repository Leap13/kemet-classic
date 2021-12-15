import { applyCssValue, applyResponsiveCssValue } from "./kemet-css";
import changeAttr from "./changeAttr";

let control = '';
let data = {};

const radioPreview = (controlId, controlData) => {
    wp.customize(controlId, function (valueData) {
        valueData.bind(function (value) {
            const { responsive, attr } = controlData;
            data = controlData;
            control = controlId;
            if (attr) {
                changeAttr(value, data);
                return;
            }
            if (responsive) {
                applyResponsiveCssValue(value, data, control);
            } else {
                applyCssValue(value, data, control);
            }
        })
    })
}

export default radioPreview