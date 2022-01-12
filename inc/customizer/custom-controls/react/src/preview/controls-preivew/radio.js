import { applyCssValue, applyResponsiveCssValue } from "./kemet-css";
import changeAttr from "./changeAttr";

let control = '';
let data = {};

const radioPreview = (controlId, controlData) => {
    const { responsive, attr } = controlData;
    wp.customize(controlId, function (valueData) {
        valueData.bind(function (value) {
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