import SelectControlComponent from './select-component.js';

export const selectControl = wp.customize.kemetControl.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(<SelectControlComponent control={control} />, control.container[0]);
    }
});