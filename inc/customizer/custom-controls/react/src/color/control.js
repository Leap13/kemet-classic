import ColorComponent from './color-component';
import { kemetGetResponsiveJs } from '../common/responsive-helper';

export const colorComponent = wp.customize.kemetControl.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(<ColorComponent control={control} />, control.container[0]);
    },
    ready: function () {
        kemetGetResponsiveJs(this)


    }

});