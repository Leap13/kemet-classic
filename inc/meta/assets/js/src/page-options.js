import {
    createElement,
    Fragment,
    Component,
    useCallback,
    useRef,
    useEffect,
    useState,
} from '@wordpress/element'
import { registerPlugin, withPluginContext } from '@wordpress/plugins'
import { PluginSidebar, PluginSidebarMoreMenuItem } from '@wordpress/edit-post'
import { withSelect, withDispatch } from '@wordpress/data'
import { compose } from '@wordpress/compose'
import { IconButton, Button } from '@wordpress/components'
const { __ } = wp.i18n;
import { OptionsComponent } from './options'

const kemetPageOptions = (props) => {
    const metaValue = props.meta.kemet_meta ? JSON.parse(props.meta.kemet_meta) : {};
    const [values, setValue] = useState(metaValue);
    const onChange = (value, key) => {
        const newValues = values;
        newValues[key] = value;
        props.onChange(JSON.stringify({ ...newValues, flag: !metaValue.flag }), 'kemet_meta')
        setValue(newValues);
        let event = new CustomEvent("KemetUpdateMeta", {
            detail: {
                key,
                value,
                values: newValues
            },
        });
        document.dispatchEvent(event);
    }
    const optionsPreview = () => {
        document.addEventListener('KemetUpdateMeta', function ({ detail: { key, value } }) {
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
                let dynamicStyle = get_background_css(value);
                dynamicStyle = '.edit-post-visual-editor__content-area, .block-editor-writing-flow{' + dynamicStyle + '}';
                let css = dynamicStyle,
                    head = document.head || document.getElementsByTagName('head')[0],
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
            if ('boxed-background' === key) {
                let dynamicStyle = get_background_css(value);
                dynamicStyle = '.kmt-separate-container .block-editor-writing-flow, .kmt-two-container .block-editor-writing-flow{' + dynamicStyle + '}';
                let css = dynamicStyle,
                    head = document.head || document.getElementsByTagName('head')[0],
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
        });
    }
    optionsPreview();
    return (
        <Fragment>
            <PluginSidebarMoreMenuItem target="kemet" icon="admin-customizer">
                {KemetMetaData.post_type_name + ' ' + __('Settings', 'kemet')}
            </PluginSidebarMoreMenuItem>
            <PluginSidebar
                className="kmt-post-options"
                isPinnable={true}
                name="theme-meta-panel"
                title={__('Kemet Settings', 'kemet')}
            >
                <OptionsComponent options={props.options} onChange={onChange} values={values} />
            </PluginSidebar>
        </Fragment>
    )
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
const KemetOptionsComposed = compose(
    withSelect((select) => {
        const postMeta = select('core/editor').getEditedPostAttribute('meta');
        const oldPostMeta = select('core/editor').getCurrentPostAttribute('meta');
        return {
            meta: { ...oldPostMeta, ...postMeta },
            oldMeta: oldPostMeta,
            options: KemetMetaData.options
        };
    }),
    withDispatch((dispatch) => ({
        onChange: (value, field) => dispatch('core/editor').editPost(
            { meta: { [field]: value } }
        ),
    })),
)(kemetPageOptions);

if (KemetMetaData) {
    registerPlugin('kemet', {
        render: () => <KemetOptionsComposed name="kemet" />,
    })
}
