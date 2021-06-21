import RadioComponent from './radio-image-component.js';

export const radioImageControl = wp.customize.kemetControl.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(
            <RadioComponent control={control} customizer={wp.customize} />,
            control.container[0]
        );
    },
});