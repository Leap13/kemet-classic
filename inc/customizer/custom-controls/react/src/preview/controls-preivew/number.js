import { applyCssValue } from "./kemet-css";
let control = '';
let data = {};

const numberPreview = (controlId, controlData) => {
    wp.customize(controlId, function (valueData) {
        valueData.bind(function (value) {
            data = controlData;
            control = controlId;

            applyCssValue(value, data, control);
        })
    })
}

export default numberPreview