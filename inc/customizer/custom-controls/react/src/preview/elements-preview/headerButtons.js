import { settingName } from "../helpers";

const buttonsPreview = () => {
    const buttons = [
        ...previewData.buttonItems,
        ...previewData.mobileButtonItems,
    ];
    buttons.map((button) => {
        const btnElement = document.querySelector(`.${button}`);
        if (!btnElement) {
            return;
        }
        const prefix = button;
        wp.customize(settingName(prefix + "-label"), function (setting) {
            setting.bind(function (label) {
                btnElement.textContent = label;
            });
        });

        wp.customize(settingName(prefix + "-url"), function (setting) {
            setting.bind(function (url) {
                btnElement.setAttribute("href", url);
            });
        });

        wp.customize(settingName(prefix + "-open-new-tab"), function (setting) {
            setting.bind(function (newTab) {
                const target = newTab ? "_blank" : "_self";
                btnElement.setAttribute("target", target);
            });
        });

        wp.customize(settingName(prefix + "-link-nofollow"), function (setting) {
            setting.bind(function (noFollow) {
                let rel = btnElement.getAttribute("rel");
                rel = rel ? rel.replace("nofollow", "").replace(/ /g, "") : "";

                if (noFollow) {
                    btnElement.setAttribute("rel", `${rel} nofollow`);
                } else {
                    btnElement.setAttribute("rel", rel);
                }
            });
        });

        wp.customize(settingName(prefix + "-link-sponsored"), function (setting) {
            setting.bind(function (sponsored) {
                let rel = btnElement.getAttribute("rel");
                rel = rel ? rel.replace("sponsored", "").replace(/ /g, "") : "";

                if (sponsored) {
                    btnElement.setAttribute("rel", `${rel} sponsored`);
                } else {
                    btnElement.setAttribute("rel", rel);
                }
            });
        });

        wp.customize(settingName(prefix + "-link-download"), function (setting) {
            setting.bind(function (download) {
                if (download) {
                    btnElement.setAttribute("download", true);
                } else {
                    btnElement.setAttribute("download", false);
                }
            });
        });
    });
};

export default buttonsPreview;