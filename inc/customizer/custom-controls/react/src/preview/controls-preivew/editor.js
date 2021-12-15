const editorPreview = (controlId, controlData) => {
    wp.customize(controlId, function (valueData) {
        valueData.bind(function (value) {
            const { selector } = controlData;
            const element = document.querySelector(selector);
            if (element) {
                element.innerHTML = value;
            }
        })
    })
}

export default editorPreview