import ColorComponent from './color-component';
export const colorComponent = wp.customize.kemetControl.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(<ColorComponent control={control} />, control.container[0]);
    },
    ready: function () {
        'use strict';
        let control = this;
        jQuery(document).mouseup(function (e) {
            var container = jQuery(control.container);
            var colorWrap = container.find('.kmt-control-wrap');
            var resetBtnWrap = container.find('.kmt-color-btn-reset-wrap');

            // If the target of the click isn't the container nor a descendant of the container.
            if (!colorWrap.is(e.target) && !resetBtnWrap.is(e.target) && colorWrap.has(e.target).length === 0 && resetBtnWrap.has(e.target).length === 0) {
                container.find('.components-button.kemet-color-icon-indicate.open').click();
            }
        });

    }

});