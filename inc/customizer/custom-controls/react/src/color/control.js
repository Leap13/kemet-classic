import ColorComponent from './color-component';
import { kemetGetResponsiveJs } from '../common/responsive-helper';

export const colorComponent = wp.customize.kemetControl.extend({
    renderContent: function renderContent() {
        let control = this;
        ReactDOM.render(<ColorComponent control={control} />, control.container[0]);
    },
    ready: function () {
        kemetGetResponsiveJs(this)
        'use strict';
        let control = this;
        jQuery(document).mouseup(function (e) {
            var container = jQuery(control.container);
            var colorWrap = container.find('.kemet-color-picker-wrap');
            var resetBtnWrap = container.find('.kmt-color-btn-reset-wrap');
            var colorContainer = container.find('.color-button-wrap')

            // If the target of the click isn't the container nor a descendant of the container.
            if ((!colorWrap.is(e.target) && !resetBtnWrap.is(e.target) && colorContainer.is(e.target)) && colorWrap.has(e.target).length === 0 && resetBtnWrap.has(e.target).length === 0) {

                container.find('.components-button.kemet-color-icon-indicate.open').click();

            }
        });
    }

});