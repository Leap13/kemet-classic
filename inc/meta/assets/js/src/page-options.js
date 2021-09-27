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
            <PluginSidebarMoreMenuItem target="kemet" className="kmt-sidebar" icon={
                <svg className="kmt-svg-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 23 58.04"><path d="M1,28V44H2.59c7.46,0,12.71-7.16,14.79-20.15l.3-1.85H1v3H13.15C12,30.68,9.54,38.37,4,39.55V28Z" transform="translate(-1 0.04)" /><path d="M4,12.36A8.32,8.32,0,0,1,5.79,7.2l5.11,5.32a2.56,2.56,0,0,0,1.65,1,1.5,1.5,0,0,0,1-.39l.14-.13L19.21,7.2A8.32,8.32,0,0,1,21,12.36V13h3v-.64A11.59,11.59,0,0,0,21.28,4.9L23.9,2.13,21.64,0,19,2.8A11.43,11.43,0,0,0,6,2.8C4.54,1.2,3.4,0,3.36,0L1.1,2.13,3.72,4.9A11.59,11.59,0,0,0,1,12.36V13H4Zm8.81-8.71A8.34,8.34,0,0,1,17.1,4.83L12.81,9.34,8.53,4.83A8.31,8.31,0,0,1,12.81,3.65Z" transform="translate(-1 0.04)" /><path d="M18,55,14.64,44.92a29.1,29.1,0,0,0,6.53-11.44A60.5,60.5,0,0,0,24,17.59L24,16H1v3H20.92c-.45,6.17-3.13,28-18.35,28H1v3H2.55a18,18,0,0,0,3.78-.4L8.14,55H1v3H24V55ZM9.64,48.56A16.38,16.38,0,0,0,12.41,47l2.67,8H11.8Z" transform="translate(-1 0.04)" /></svg>
            }>
                {KemetMetaData.post_type_name + ' ' + __('Settings', 'kemet')}
            </PluginSidebarMoreMenuItem>
            <PluginSidebar
                className="kmt-post-options"
                isPinnable={true}
                icon={
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 23 58.04"><path d="M1,28V44H2.59c7.46,0,12.71-7.16,14.79-20.15l.3-1.85H1v3H13.15C12,30.68,9.54,38.37,4,39.55V28Z" transform="translate(-1 0.04)" /><path d="M4,12.36A8.32,8.32,0,0,1,5.79,7.2l5.11,5.32a2.56,2.56,0,0,0,1.65,1,1.5,1.5,0,0,0,1-.39l.14-.13L19.21,7.2A8.32,8.32,0,0,1,21,12.36V13h3v-.64A11.59,11.59,0,0,0,21.28,4.9L23.9,2.13,21.64,0,19,2.8A11.43,11.43,0,0,0,6,2.8C4.54,1.2,3.4,0,3.36,0L1.1,2.13,3.72,4.9A11.59,11.59,0,0,0,1,12.36V13H4Zm8.81-8.71A8.34,8.34,0,0,1,17.1,4.83L12.81,9.34,8.53,4.83A8.31,8.31,0,0,1,12.81,3.65Z" transform="translate(-1 0.04)" /><path d="M18,55,14.64,44.92a29.1,29.1,0,0,0,6.53-11.44A60.5,60.5,0,0,0,24,17.59L24,16H1v3H20.92c-.45,6.17-3.13,28-18.35,28H1v3H2.55a18,18,0,0,0,3.78-.4L8.14,55H1v3H24V55ZM9.64,48.56A16.38,16.38,0,0,0,12.41,47l2.67,8H11.8Z" transform="translate(-1 0.04)" /></svg>
                }
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
