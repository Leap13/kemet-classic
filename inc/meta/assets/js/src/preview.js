const preview = (key, value) => {
    if ('content-layout' === key) {
        let className = '';
        document.body.classList.remove('kmt-separate-container', 'kmt-two-container', 'kmt-page-builder-template', 'kmt-plain-container');
        if ('content-boxed-container' == value) {
            className = 'kmt-separate-container';
        } else if ('boxed-container' == value) {
            className = 'kmt-separate-container';
        } else if ('page-builder' == value) {
            className = 'kmt-page-builder-template';
        } else if ('plain-container' == value) {
            className = 'kmt-plain-container';
        }
        document.body.classList.add(className);
    }
    if ('background' === key) {
        let selector = '.edit-post-visual-editor__content-area, .block-editor-writing-flow';
        let background = {
            desktop: "",
            tablet: "",
            mobile: "",
        };
        if ("" != value["desktop"]) {
            background.desktop = get_background_css(value["desktop"]);
        }

        if ("" != value["tablet"]) {
            background.tablet = get_background_css(value["tablet"]);
        }

        if ("" != value["mobile"]) {
            background.mobile = get_background_css(value["mobile"]);
        }
        let dynamicStyle =
            selector +
            "	{ " +
            background.desktop +
            " }" +
            "@media (max-width: 768px) {" +
            selector +
            "	{ " +
            background.tablet +
            " } }" +
            "@media (max-width: 544px) {" +
            selector +
            "	{ " +
            background.mobile +
            " } }";
        addCss(dynamicStyle);
    }
    if ('boxed-background' === key) {
        let background = {
            desktop: "",
            tablet: "",
            mobile: "",
        };
        if ("" != value["desktop"]) {
            background.desktop = get_background_css(value["desktop"]);
        }

        if ("" != value["tablet"]) {
            background.tablet = get_background_css(value["tablet"]);
        }

        if ("" != value["mobile"]) {
            background.mobile = get_background_css(value["mobile"]);
        }
        let selector = '.kmt-separate-container .block-editor-writing-flow, .kmt-two-container .block-editor-writing-flow';
        let dynamicStyle =
            selector +
            "	{ " +
            background.desktop +
            " }" +
            "@media (max-width: 768px) {" +
            selector +
            "	{ " +
            background.tablet +
            " } }" +
            "@media (max-width: 544px) {" +
            selector +
            "	{ " +
            background.mobile +
            " } }";
        addCss(dynamicStyle);
    }
}

const get_background_css = (bg_obj) => {
    var gen_bg_css = "";
    var bg_type = bg_obj["background-type"];
    var bg_img = bg_obj["background-image"];
    var bg_color = bg_obj["background-color"];
    var bg_gradient = bg_obj["background-gradient"];

    if (!bg_color && !bg_img && !bg_gradient) {
        return '';
    } else {
        switch (bg_type) {
            case 'color':
                if (bg_color) {
                    gen_bg_css = "background-color: " + bg_color + ";";
                    gen_bg_css += "background-image: none;";
                }
                break;
            case 'gradient':
                if (bg_gradient) {
                    gen_bg_css += "background-image: " + bg_gradient + ";";
                }
                break;
            case 'image':
                if (bg_img) {
                    gen_bg_css = "background-image: url(" + bg_img + ");";
                    var backgroundRepeat =
                        "undefined" != typeof bg_obj["background-repeat"]
                            ? bg_obj["background-repeat"]
                            : "repeat",
                        backgroundPosition =
                            "undefined" != typeof bg_obj["background-position"]

                            && bg_obj["background-position"],
                        backgroundSize =
                            "undefined" != typeof bg_obj["background-size"]
                                ? bg_obj["background-size"]
                                : "auto",
                        backgroundAttachment =
                            "undefined" != typeof bg_obj["background-attachment"]
                                ? bg_obj["background-attachment"]
                                : "inherit";

                    if (backgroundPosition) {
                        if (backgroundPosition.x) {
                            gen_bg_css += "background-position-x: " + (backgroundPosition.x * 100) + "%;";
                        }
                        if (backgroundPosition.y) {
                            gen_bg_css += "background-position-y: " + (backgroundPosition.y * 100) + "%;";
                        }
                    }
                    if (backgroundRepeat) {
                        gen_bg_css += "background-repeat: " + backgroundRepeat + ";";
                    }
                    if (backgroundSize) {
                        gen_bg_css += "background-size: " + backgroundSize + ";";
                    }
                    if (backgroundAttachment) {
                        gen_bg_css += "background-attachment: " + backgroundAttachment + ";";
                    }
                }
                if (bg_color) {
                    gen_bg_css += "background-color: " + bg_color + ";";
                }
                break;
        }

        return gen_bg_css;
    }
}

const addCss = (css) => {
    let head = document.head || document.getElementsByTagName('head')[0],
        style = document.createElement('style');

    head.appendChild(style);
    style.type = 'text/css';
    if (style.styleSheet) {
        // This is required for IE8 and below.
        style.styleSheet.cssText = css;
    } else {
        style.appendChild(document.createTextNode(css));
    }
}

export default preview