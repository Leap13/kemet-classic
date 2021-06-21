import SliderComponent from './slider-component.js';

export const SliderControl = wp.customize.kemetControl.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(<SliderComponent control={control} />, control.container[0]);
    }
});