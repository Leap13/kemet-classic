export const addCss = (css, control) => {
    const prevStyleSheet = document.getElementById(control);
    if (prevStyleSheet) {
        prevStyleSheet.remove();
    }

    let head = document.head || document.getElementsByTagName('head')[0],
        style = document.createElement('style');

    style.setAttribute("id", control);
    head.appendChild(style);
    style.type = 'text/css';
    if (style.styleSheet) {
        // This is required for IE8 and below.
        style.styleSheet.cssText = css;
    } else {
        style.appendChild(document.createTextNode(css));
    }
}

export const settingName = (settingName) => {
    const setting = previewData.setting.replace("setting_name", settingName);

    return setting;
}