const changeAttr = (value, data) => {
    if (value) {
        const { selector, attr } = data;
        const elements = Array.from(document.querySelectorAll(selector));
        if (elements.length > 0) {
            elements.map(element => {
                element.setAttribute(attr, value)
            })
        }
    }
}

export default changeAttr