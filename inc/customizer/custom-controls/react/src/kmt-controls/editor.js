import PropTypes from 'prop-types';
import { useState, useEffect } from 'react';


const EditorComponent = props => {
    const editorId = props.id + 'editor';
    const [state, setState] = useState({
        value: props.control.get(),
        restoreTextMode: false,
    });

    const HandleChange = (value) => {
        setState((prevState) => ({
            ...prevState,
            value: value
        }));
        props.onChange(props.id, value);
    };

    useEffect(() => {
        if (window.tinymce.get(editorId)) {
            setState({ restoreTextMode: window.tinymce.get(editorId).isHidden() });
            window.wp.oldEditor.remove(editorId);
        }
        window.wp.oldEditor.initialize(editorId, {
            tinymce: {
                wpautop: true,
                toolbar1: 'bold,italic,bullist,numlist,link',
                toolbar2: '',
            },
            quicktags: true,
            mediaButtons: true,
        });
        const editor = window.tinymce.get(editorId);
        if (editor.initialized) {
            onInit();
        } else {
            editor.on('init', onInit);
        }
    }, [])

    const onInit = () => {
        const editor = window.tinymce.get(editorId);
        if (state.restoreTextMode) {
            window.switchEditors.go(editorId, 'html');
        }
        editor.on('NodeChange', debounce(() => {
            HandleChange(window.wp.oldEditor.getContent(editorId));
        }, 250));

        setState({ editor: editor });
    }

    const debounce = (fn, delay) => {
        var timer = null;
        return function () {
            var context = this,
                args = arguments;
            clearTimeout(timer);
            timer = setTimeout(function () {
                fn.apply(context, args);
            }, delay);
        };
    }

    const {
        label,
    } = props.params;

    let labelContent = label ? <span className="customize-control-title">{label}</span> : null;

    return <>
        {labelContent}
        <div className="customize-control-content">
            <textarea
                className="kmt-control-tinymce-editor wp-editor-area"
                id={editorId}
                value={state.value}
                onChange={({ target: { value } }) => {
                    HandleChange(value);
                }}
            />
        </div>
    </>;

};

EditorComponent.propTypes = {
    control: PropTypes.object.isRequired
};

export default React.memo(EditorComponent);