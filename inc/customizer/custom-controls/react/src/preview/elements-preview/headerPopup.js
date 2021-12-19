import { settingName, addCss } from "../helpers";

const popupPreview = () => {
    const devices = ["desktop", "mobile"];

    devices.map((device) => {
        const prefix = device;
        const popupSelector = `#kmt-${prefix}-popup`;
        const popupElement = document.querySelector(popupSelector);
        if (popupElement) {
            const popupContentSelector = `.kmt-${prefix}-popup-content`;
            wp.customize(
                settingName(prefix + "-popup-slide-width"),
                function (value) {
                    value.bind(function (width) {
                        if (width == "") {
                            wp.customize.preview.send("refresh");
                            return;
                        }
                        if (width) {
                            const { value, unit } = width;
                            const dynamicStyle = `.kmt-popup-left ${popupContentSelector}, .kmt-popup-right ${popupContentSelector}{ max-width: ${value + unit
                                } }`;
                            addCss(dynamicStyle, settingName(prefix + "-popup-slide-width"));
                        }
                    });
                }
            );

            wp.customize(settingName(prefix + "-popup-layout"), function (value) {
                value.bind(function (layout) {
                    if (layout == "") {
                        wp.customize.preview.send("refresh");
                        return;
                    }
                    if ("full" === layout) {
                        popupElement.classList.remove("kmt-popup-left", "kmt-popup-right");
                        popupElement.classList.add("kmt-popup-full-width");
                    } else {
                        var popupSideControl = settingName(prefix + "-popup-slide-side"),
                            popupSide = wp.customize._value[popupSideControl]._value;
                        popupElement.classList.remove(
                            "kmt-popup-left",
                            "kmt-popup-right",
                            "kmt-popup-full-width"
                        );
                        popupElement.classList.add("kmt-popup-" + popupSide);
                    }
                });
            });

            wp.customize(settingName(prefix + "-popup-slide-side"), function (value) {
                value.bind(function (side) {
                    if (side == "") {
                        wp.customize.preview.send("refresh");
                        return;
                    }
                    popupElement.classList.remove("kmt-popup-left", "kmt-popup-right");
                    popupElement.classList.add(`kmt-popup-${side}`);
                });
            });

            wp.customize(
                settingName(prefix + "-popup-content-align"),
                function (value) {
                    value.bind(function (contentAlign) {
                        if (contentAlign == "") {
                            wp.customize.preview.send("refresh");
                            return;
                        }
                        popupElement.classList.remove(
                            "kmt-popup-align-left",
                            "kmt-popup-align-center",
                            "kmt-popup-align-right"
                        );
                        popupElement.classList.add(`kmt-popup-align-${contentAlign}`);
                    });
                }
            );

            wp.customize(
                settingName(prefix + "-popup-content-vertical-align"),
                function (value) {
                    value.bind(function (contentAlign) {
                        if (contentAlign == "") {
                            wp.customize.preview.send("refresh");
                            return;
                        }
                        popupElement.classList.remove(
                            "kmt-popup-valign-top",
                            "kmt-popup-valign-center",
                            "kmt-popup-valign-bottom"
                        );
                        popupElement.classList.add(`kmt-popup-valign-${contentAlign}`);
                    });
                }
            );
        }
    });
};

export default popupPreview;