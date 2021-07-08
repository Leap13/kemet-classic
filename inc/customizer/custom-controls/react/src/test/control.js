import TabsComponent from "./tabs-component.js";

export const TestTabsControl = wp.customize.kemetControl.extend({
  renderContent: function renderContent() {
    let control = this;
    ReactDOM.render(
      <TabsComponent control={control} customizer={wp.customize} />,
      control.container[0]
    );
  },
});
