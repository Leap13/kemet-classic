import ColorComponent from './color-component';
export const colorComponent = wp.customize.kemetControl.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(<ColorComponent control={control} />, control.container[0]);
    }
});