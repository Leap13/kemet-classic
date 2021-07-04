import ResponsiveSliderComponent from './responsive-slider-component.js';
import { kemetGetResponsiveJs } from '../common/responsive-helper';
export const responsiveSliderControl = wp.customize.kemetControl.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(<ResponsiveSliderComponent control={control} />, control.container[0]);
    },
    ready: function () {
        kemetGetResponsiveJs(this);
    }
});