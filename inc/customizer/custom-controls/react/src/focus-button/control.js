import Button from "./button-component.js";

export const FocusButtonControl = wp.customize.kemetControl.extend({
  renderContent: function renderContent() {
    let control = this;
    ReactDOM.render(
      <Button control={control} customizer={wp.customize} />,
      control.container[0]
    );
  },
});
