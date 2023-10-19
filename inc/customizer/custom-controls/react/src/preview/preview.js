import sliderPreview from "./controls-preivew/slider";
import spacingPreview from "./controls-preivew/spacing";
import colorPreview from "./controls-preivew/color";
import radioPreview from "./controls-preivew/radio";
import numberPreview from "./controls-preivew/number";
import borderPreview from "./controls-preivew/border";
import backgroundPreview from "./controls-preivew/background";
import editorPreview from "./controls-preivew/editor";
import typographyPreview from "./controls-preivew/typography";
import boxShadowPreview from "./controls-preivew/box-shadow";
import './extra-preview';

if (previewData.preview) {
    Object.keys(previewData.preview).forEach(function (control) {
        const data = previewData.preview[control];
        const { type } = previewData.preview[control];
        switch (type) {
            case "kmt-slider":
                sliderPreview(control, data);
                break;
            case "kmt-spacing":
                spacingPreview(control, data);
                break;
            case "kmt-color":
                colorPreview(control, data);
                break;
            case "kmt-radio":
            case "kmt-icon-select":
            case "kmt-select":
                radioPreview(control, data);
                break;
            case "kmt-number":
                numberPreview(control, data);
                break;
            case "kmt-border":
                borderPreview(control, data);
                break;
            case "kmt-background":
                backgroundPreview(control, data);
                break;
            case 'kmt-editor':
                editorPreview(control, data);
                break;
            case 'kmt-typography':
                typographyPreview(control, data);
                break;
            case 'kmt-box-shadow':
                boxShadowPreview(control, data);
                break;
        }
    })
}
