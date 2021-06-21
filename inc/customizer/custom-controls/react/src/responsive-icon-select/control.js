import ResponsiveIconSelect from './responsive-icon-select-component';
import { kemetGetResponsiveIconJs } from '../common/responsive-helper';

export const responsiveSpacingControl = wp.customize.kemetControl.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(<ResponsiveIconSelect control={control} />, control.container[0]);
    },
    ready: function () {
        kemetGetResponsiveIconJs(this);
    },
});