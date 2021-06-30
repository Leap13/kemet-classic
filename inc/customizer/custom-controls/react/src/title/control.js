import TitleComponent from './title-component.js';

export const titleControl = wp.customize.kemetControl.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(<TitleComponent control={control} />, control.container[0]);
    }
});