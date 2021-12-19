import { addCss, settingName } from "./helpers";
import buttonsPreview from './elements-preview/headerButtons';
import popupPreview from './elements-preview/headerPopup';
import toggleButtonsPreview from './elements-preview/toggleButton';
import headerRowsPreview from './elements-preview/headerRows';

let btnSelector =
    'button, .button, .kmt-button, input[type=button], input[type=reset], input[type="submit"], .wp-block-button a.wp-block-button__link, .wp-block-search button.wp-block-search__button';
let btnHoverSelector =
    'button:focus, .button:hover, button:hover, .kmt-button:hover, .button:hover, input[type=reset]:hover, input[type=reset]:focus, input#submit:hover, input#submit:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="submit"]:hover, input[type="submit"]:focus, .button:focus, .button:focus, .wp-block-button a.wp-block-button__link:hover, .wp-block-search button.wp-block-search__button:hover';
wp.customize(settingName("button-effect"), function (value) {
    value.bind(function (newValue) {
        let dynamicStyle = "";
        if (newValue) {
            dynamicStyle = `${btnSelector}{ --buttonShadow: 2px 2px 10px -3px var(--buttonBackgroundColor) !important; }`;
        } else {
            dynamicStyle = `${btnSelector}{ --buttonShadow: none; }`;
        }
        addCss(dynamicStyle, settingName("button-effect"));
    });
});

wp.customize(settingName("button-hover-effect"), function (value) {
    value.bind(function (newValue) {
        var dynamicStyle = "";
        if (newValue) {
            dynamicStyle = `${btnHoverSelector}{ --buttonShadow: 2px 2px 10px -3px var(--buttonBackgroundHoverColor,var(--buttonBackgroundColor)) !important; }`;
        } else {
            dynamicStyle = `${btnHoverSelector}{ --buttonShadow: none; }`;
        }
        addCss(dynamicStyle, settingName("button-hover-effect"));
    });
});

wp.customize(settingName("readmore-as-button"), function (value) {
    value.bind(function (newValue) {
        const allReadMore = Array.from(document.querySelectorAll(".kmt-read-more"));
        if (allReadMore.length > 0) {
            allReadMore.map((element) => {
                element.classList.remove("button");
                element.parentElement.removeAttribute("data-align");
                if (newValue) {
                    var alignControl = settingName("readmore-button-align"),
                        align = wp.customize._value[alignControl]._value;
                    element.parentElement.setAttribute("data-align", align);
                    element.classList.add("button");
                }
            });
        }
    });
});

wp.customize(settingName("divider-item-style"), function (value) {
    value.bind(function (newValue) {
        const allDivider = Array.from(
            document.querySelectorAll(".kmt-divider-container")
        );
        if (allDivider.length > 0) {
            allDivider.map((element) => {
                element.classList.remove("divider-vertical");
                element.classList.remove("divider-horizontal");
                if (newValue) {
                    element.classList.add(newValue);
                }
            });
        }
    });
});

wp.customize.bind("preview-ready", function () {
    wp.customize.selectiveRefresh.bind(
        "partial-content-rendered",
        function (response) {
            if (
                response.partial.id.includes("header-desktop-items") ||
                response.partial.id.includes("header-mobile-items") ||
                response.partial.id.includes("footer-items")
            ) {
                document.dispatchEvent(
                    new CustomEvent("kmtPartialContentRendered", {
                        detail: { response: response },
                    })
                );
            }
        }
    );
});

const editBtn = function () {
    setTimeout(() => {
        const allEditButtons = Array.from(
            document.querySelectorAll(
                ".customize-partial-edit-shortcut:not(.kmt-custom-partial-edit-shortcut):not(.kmt-custom-partial-edit)"
            )
        );
        if (allEditButtons.length > 0) {
            allEditButtons.map((element) => {
                element.remove();
            });
        }
    }, 0);

    const defaultTarget = window.parent === window ? null : window.parent;
    const allButtons = Array.from(
        document.querySelectorAll(
            ".site-builder-focus-item .item-customizer-focus, .kmt-item-focus .edit-buidler-item"
        )
    );
    if (allButtons.length > 0) {
        allButtons.map((element) => {
            element.addEventListener("click", (e) => {
                e.preventDefault();
                e.stopPropagation();

                const item = e.target.classList.contains("item-customizer-focus")
                    ? e.target.closest(".site-builder-focus-item")
                    : e.target.closest(".kmt-item-focus");

                const sectionId = item.getAttribute("data-section") || "";
                if (sectionId) {
                    if (defaultTarget.wp.customize.section(sectionId)) {
                        defaultTarget.wp.customize.section(sectionId).focus();
                    }
                }
            });
        });
    }
};
wp.customize.bind("preview-ready", function () {
    editBtn();
});
document.addEventListener("kmtPartialContentRendered", function () {
    editBtn();
});

document.addEventListener("DOMContentLoaded", () => {
    buttonsPreview();
    popupPreview();
    toggleButtonsPreview();
    headerRowsPreview();
});