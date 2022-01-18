import { addCss } from "../helpers";

const typographyPreview = (controlId, controlData) => {
    wp.customize(controlId, function (valueData) {
        valueData.bind(function (value) {
            const { selector } = controlData;
            let dynamicStyle = '';
            const { family, variation, size, "letter-spacing": letterSpacing, "line-height": lineHeight, "text-transform": textTransform, "text-decoration": textDecoration } = value;

            if (family && family !== 'System Default') {
                let fontName = family;
                let weight = '';
                let style = '';
                if (variation) {
                    weight = variation[0] === 'regular' ? '400' : `${variation[1]}00`;
                    style = 'i' === variation[0] ? 'italic' : 'normal';
                    if (fontName in previewData.googleFonts) {
                        fontName = fontName.split(" ").join("+");
                        let weightLink = 'italic' === style ? weight + variation[0] : weight;
                        weightLink = weightLink ? weightLink : 400;
                        const href = `https://fonts.googleapis.com/css?family=${fontName}:${weightLink}&display=swap`;
                        appendFontLink(href, controlId);
                    }
                }
                if (family === 'Default') {
                    wp.customize.preview.send("refresh");
                } else {
                    dynamicStyle += `--fontFamily: ${family};`;
                }
                dynamicStyle += `--fontWeight: ${weight};`;
                dynamicStyle += `--fontStyle: ${style};`;
            }
            if (textTransform) {
                dynamicStyle += `--textTransform: ${textTransform};`;
            }
            if (textDecoration) {
                dynamicStyle += `--textDecoration: ${textDecoration};`;
            }
            dynamicStyle = `${selector}{ ${dynamicStyle} }`;

            if (size) {
                dynamicStyle += applyResponsiveValue(selector, '--fontSize', size);
            } else if (!size || (size && !size.desktop && !size.tablet && !size.mobile)) {
                wp.customize.preview.send("refresh");
            }

            if (letterSpacing) {
                dynamicStyle += applyResponsiveValue(selector, '--letterSpacing', letterSpacing);
            } else if (!letterSpacing || (letterSpacing && !letterSpacing.desktop && !letterSpacing.tablet && !letterSpacing.mobile)) {
                wp.customize.preview.send("refresh");
            }

            if (lineHeight) {
                dynamicStyle += applyResponsiveValue(selector, '--lineHeight', lineHeight);
            } else if (!lineHeight || (lineHeight && !lineHeight.desktop && !lineHeight.tablet && !lineHeight.mobile)) {
                wp.customize.preview.send("refresh");
            }

            addCss(dynamicStyle, controlId);
        })
    })
}


const applyResponsiveValue = (selector, property, value) => {
    if (value) {
        const defaultUnit = 'px';
        const { desktop, tablet, mobile, 'desktop-unit': desktopUnit, 'tablet-unit': tabletUnit, 'mobile-unit': mobileUnit } = value;
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

        return dynamicStyle;
    }
}

const appendFontLink = (href, controlId) => {
    const prevLink = document.getElementById(controlId + '-font');
    if (prevLink) {
        prevLink.remove();
    }

    let head = document.head || document.getElementsByTagName('head')[0],
        style = document.createElement('link');

    style.setAttribute("id", controlId + '-font');
    style.setAttribute("href", href);
    style.setAttribute("rel", "stylesheet");
    style.setAttribute("media", "all");
    head.appendChild(style);
}
export default typographyPreview