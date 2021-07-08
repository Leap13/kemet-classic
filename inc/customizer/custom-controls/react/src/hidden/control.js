import HiddenComponent from "./hidden-component.js";

export const HiddenControl = wp.customize.kemetControl.extend({
  renderContent: function renderContent() {
    let control = this;
    ReactDOM.render(
      <HiddenComponent control={control} customizer={wp.customize} />,
      control.container[0]
    );
  },
});
