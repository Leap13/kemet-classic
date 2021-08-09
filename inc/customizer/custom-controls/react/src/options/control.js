import {
    createElement,
    render,
    unmountComponentAtNode,
} from '@wordpress/element'

import OptionsComponent from './options-component';
import { kemetGetResponsiveJs } from '../common/responsive-helper';

const renderOptions = (control) => {
    render(
        <OptionsComponent control={control} />,

        control.container[0]
    )
    document.dispatchEvent(new CustomEvent("kmtOptionsReady", {
        detail: control
    }));

    document.addEventListener('kmtSubOptionsReady', () => {
        document.dispatchEvent(new CustomEvent("kmtOptionsReady", {
            detail: control
        }));
    });
}
document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
        Object.values(wp.customize.control._value)
            .filter(({ params: { type } }) => type === 'kmt-options')
            .map((control) => {
                (wp.customize.panel(control.section())
                    ? wp.customize.panel
                    : wp.customize.section)(control.section(), (section) => {
                        section.expanded.bind((value) => {
                            if (value) {
                                renderOptions(control)
                                return
                            }

                            setTimeout(() => {
                                unmountComponentAtNode(control.container[0])
                            }, 500)
                        })
                    })
            })
    })
})

document.addEventListener('kmtExpandedBuilder', ({ detail: { control, isExpanded } }) => {
    if (isExpanded) {
        renderOptions(control)
        return
    }
    setTimeout(() => {
        unmountComponentAtNode(control.container[0])
    }, 500)
});

document.addEventListener('kmtOptionsReady', ({ detail: control }) => {
    if (control) {
        // Color
        'use strict';
        jQuery(document).mouseup(function (e) {
            var container = jQuery(control.container);
            var colorWrap = container.find('.kemet-color-picker-wrap');
            var resetBtnWrap = container.find('.kmt-color-btn-reset-wrap');
            var colorButton = container.find('.color-button-wrap')

            // If the target of the click isn't the container nor a descendant of the container.
            if ((!colorWrap.has(e.target)) || (colorWrap.has(e.target).length === 0 && resetBtnWrap.has(e.target).length === 0)) {
                container.find('.components-button.kemet-color-icon-indicate.open').click();
            }
        });
        // Responsive
        kemetGetResponsiveJs(control);
    }
});
