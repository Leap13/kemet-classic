import { settingName, addCss } from "../helpers";

const headerRowsPreview = () => {
    const rows = ["top", "main", "bottom"];

    rows.map(row => {
        const prefix = `${row}-header`;
        const rowSelector = `.kmt-${row}-header-wrap .${row}-header-bar`;
        const rowElement = document.querySelector(rowSelector);
        wp.customize(settingName(prefix + "-layout"), function (value) {
            value.bind(function (layout) {
                let dynamicStyle = "";

                if (rowElement) {
                    const innerRow = document.querySelector(`${rowSelector} .${row}-header-inner`);
                    innerRow.classList.remove("header-bar-content");
                    if ("full" === layout) {
                        dynamicStyle += `@media (min-width: 921px){ ${rowSelector} .kmt-container{ max-width: 100%; padding-left: 35px; padding-right: 35px; } }`;
                    } else if ("stretched" === layout) {
                        dynamicStyle += `@media (min-width: 921px){ ${rowSelector} .kmt-container{ max-width: 100%; padding-left: 0; padding-right: 0; } }`;
                    } else {
                        dynamicStyle += `@media (min-width: 769px){ ${rowSelector} .kmt-container{ max-width: 1240px; padding-left: 20px; padding-right: 20px; } }`;
                    }

                    if ("stretched" === layout || "boxed" === layout) {
                        innerRow.classList.add(
                            "header-bar-content"
                        );
                    }
                }

                addCss(dynamicStyle, settingName(prefix + "-layout"));
            });
        });

        wp.customize(settingName(prefix + "-min-height"), function (value) {
            value.bind(function (value) {
                document.dispatchEvent(new CustomEvent("kmtHeaderBarHeightChanged"));
            });
        });
    })
};

export default headerRowsPreview;