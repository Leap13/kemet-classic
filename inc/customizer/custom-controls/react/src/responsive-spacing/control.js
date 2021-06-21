import ResponsiveSpacingComponent from './responsive-spacing-component.js';
import { kemetGetResponsiveSpacingJs } from '../common/responsive-helper';

export const responsiveSpacingControl = wp.customize.kemetControl.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(<ResponsiveSpacingComponent control={control} />, control.container[0]);
    },
    ready: function () {
        kemetGetResponsiveSpacingJs(this);
    },
});