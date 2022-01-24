import { addCss } from "../helpers";

let control = '';
let data = {};
const backgroundPreview = (controlId, controlData) => {
    const { responsive } = controlData;
    wp.customize(controlId, function (valueData) {
        valueData.bind(function (value) {
            data = controlData;
            control = controlId;
            if (responsive) {
                applyResponsiveValue(value);
            } else {
                applyBackgroundValue(value);
            }
        })
    })
}

const getBackgroundCssValue = (value) => {
    const { selector } = data;
    const { "background-type": type = 'color', "background-image": image, "background-color": color, "background-gradient": gradient, "background-position": position, "background-size": size, "background-attachment": attachment = "inherit", "background-repeat": repeat = "repeat" } = value;
    let dynamicStyle = '';

    switch (type) {
        case 'color':
            dynamicStyle += `background-color: ${color}; background-image: none;`;
            break;
        case 'gradient':
            dynamicStyle += `background-image: ${gradient};`;
            break;
        case 'image':
            if (image) {
                dynamicStyle += `background-image:  url(${image});`;
                if (position) {
                    if (position.x) {
                        dynamicStyle += `background-position-x: ${(position.x * 100)}%;`;
                    }
                    if (position.y) {
                        dynamicStyle += `background-position-y: ${(position.y * 100)}%;`
                    }
                }
                if (repeat) {
                    dynamicStyle += `background-repeat: ${repeat};`;
                }
                if (size) {
                    dynamicStyle += `background-size: ${size};`;
                }
                if (attachment) {
                    dynamicStyle += `background-attachment: ${attachment};`;
                }
            }
            if (color) {
                dynamicStyle += `background-color: ${color};`;
            }
            break;
    }

    dynamicStyle = `${selector}{ ${dynamicStyle} }`;
    return dynamicStyle;
}

const applyBackgroundValue = (value) => {
    console.log(value);
    if (value) {
        let dynamicStyle = getBackgroundCssValue(value);
        addCss(dynamicStyle, control);
    }
}

const applyResponsiveValue = (value) => {
    if (value) {
        const { desktop, tablet, mobile } = value;
        let dynamicStyle = '';

        if (desktop) {
            dynamicStyle += getBackgroundCssValue(desktop);
        }
        if (tablet) {
            dynamicStyle += `@media (max-width: 768px) { ${getBackgroundCssValue(tablet)} }`;
        }
        if (mobile) {
            dynamicStyle += `@media (max-width: 544px) { ${getBackgroundCssValue(mobile)} }`;
        }

        addCss(dynamicStyle, control);
    }
}
export default backgroundPreview