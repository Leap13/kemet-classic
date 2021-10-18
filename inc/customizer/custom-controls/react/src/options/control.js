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
        jQuery(document).ready(function ($) {
            $(".wp-full-overlay-sidebar-content, .wp-picker-container").click(
                function (e) {
                    if (
                        !$(e.target).closest(".kemet-color-picker-wrap").length &&
                        !$(e.target).closest(".color-button-wrap").length
                    ) {
                        $(".components-button.kemet-color-icon-indicate.open").trigger("click");
                    }
                }
            );
            control.container.on(
                "click",
                ".components-button.kemet-color-icon-indicate",
                function () {
                    var $this = $(this),
                        parentWrap = $this.closest(".customize-control-kmt-color"),
                        Section = parentWrap.parents(".control-section");

                    if ($this.hasClass("open")) {
                        parentWrap.find(".kemet-color-picker-wrap").hide();
                    } else {
                        var getOpenPopup = Section.find(".components-button.kemet-color-icon-indicate.open");
                        if (getOpenPopup.length > 0) {
                            getOpenPopup.trigger("click");
                        }
                        parentWrap.find(".kemet-color-picker-wrap").show();
                    }
                    $(this).toggleClass("open");
                }
            );

        });
    }
    // Responsive
    kemetGetResponsiveJs();
});
