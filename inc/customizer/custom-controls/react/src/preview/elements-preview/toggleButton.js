import { settingName, addCss } from "../helpers";

const toggleButtonsPreview = () => {
    const buttons = ["desktop-toggle-button", "mobile-toggle-button"];
    buttons.map((prefix) => {
        const buttonSelector = `.${prefix}`;
        const buttonElement = document.querySelector(buttonSelector);
        if (buttonElement) {
            wp.customize(settingName(prefix + "-float"), function (value) {
                value.bind(function (position) {
                    const floatPosition =
                        wp.customize._value[settingName(prefix + "-float-position")]._value;

                    buttonElement.classList.remove(
                        "toggle-button-fixed",
                        "float-top-left",
                        "float-top-right",
                        "float-bottom-left",
                        "float-bottom-right"
                    );
                    if (position) {
                        buttonElement.classList.add(
                            "toggle-button-fixed",
                            `float-${floatPosition}`
                        );
                    }
                });
            });

            wp.customize(settingName(prefix + "-label"), function (setting) {
                setting.bind(function (label) {
                    const buttonLabel = document.querySelector(
                        `${buttonSelector} .kmt-popup-label`
                    );
                    if (buttonLabel) {
                        buttonLabel.textContent = label;
                    }
                });
            });

            wp.customize(settingName(prefix + "-float-position"), function (value) {
                value.bind(function (floatPosition) {
                    const position = floatPosition.split("-"),
                        vOffset =
                            wp.customize._value[settingName(prefix + "-vertical-offset")]
                                ._value,
                        hOffset =
                            wp.customize._value[settingName(prefix + "-horizontal-offset")]
                                ._value;
                    buttonElement.classList.remove(
                        "float-top-left",
                        "float-top-right",
                        "float-bottom-left",
                        "float-bottom-right"
                    );

                    buttonElement.classList.add(`float-${floatPosition}`);

                    const dynamicStyle = `${buttonSelector}.toggle-button-fixed.float-${floatPosition}{${position[0]
                        }: ${vOffset.value + vOffset.unit}; ${position[1]}: ${hOffset.value + hOffset.unit
                        }; }`;
                    addCss(dynamicStyle, settingName(prefix + "-float-position"));
                });
            });

            wp.customize(settingName(prefix + "-vertical-offset"), function (value) {
                value.bind(function (offset) {
                    const floatPosition =
                        wp.customize._value[settingName(prefix + "-float-position")]
                            ._value,
                        position = floatPosition.split("-");
                    const dynamicStyle = `${buttonSelector}.toggle-button-fixed.float-${floatPosition}{ ${position[0]
                        }: ${offset.value + offset.unit}; }`;
                    addCss(dynamicStyle, settingName(prefix + "-vertical-offset"));
                });
            });

            wp.customize(
                settingName(prefix + "-horizontal-offset"),
                function (value) {
                    value.bind(function (offset) {
                        const floatPosition =
                            wp.customize._value[settingName(prefix + "-float-position")]
                                ._value,
                            position = floatPosition.split("-");
                        const dynamicStyle = `${buttonSelector}.toggle-button-fixed.float-${floatPosition}{ ${position[1]
                            }: ${offset.value + offset.unit}; }`;
                        addCss(dynamicStyle, settingName(prefix + "-vertical-offset"));
                    });
                }
            );
        }
    });
};

export default toggleButtonsPreview;