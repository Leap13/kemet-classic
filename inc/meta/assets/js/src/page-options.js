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
    }

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
