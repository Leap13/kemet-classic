import IconSelectComponent from "./icon-select-component";
export const iconSelect = wp.customize.kemetControl.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(
            <IconSelectComponent control={control} />,
            control.container[0]
        );
    },
});
