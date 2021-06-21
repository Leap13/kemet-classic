import ToggleControlComponent from './toggle-component.js';

export const sliderControl = wp.customize.kemetControl.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(<ToggleControlComponent control={control} />, control.container[0]);
    }
});