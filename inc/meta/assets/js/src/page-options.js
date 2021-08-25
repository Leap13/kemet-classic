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

const kemetPageOptions = (props) => {
    return (
        <Fragment>
            <PluginSidebarMoreMenuItem target="kemet" icon="admin-customizer">
                Kemet Page Settings
            </PluginSidebarMoreMenuItem>
            <PluginSidebar
                isPinnable={true}
                name="theme-meta-panel"
                title="Kemet Settings"
            >
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
        };
    }),
    withDispatch((dispatch) => ({
        onChange: (value, field) => dispatch('core/editor').editPost(
            { meta: { [field]: value } }
        ),
    })),
)(kemetPageOptions);

if (KemetMetaData.version) {
    registerPlugin('kemet', {
        render: () => <KemetOptionsComposed name="kemet" />,
    })
}
