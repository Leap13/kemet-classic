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
            <div>Kemettttt</div>
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
    withPluginContext((context, { name }) => ({
        sidebarName: `${context.name}/${name}`,
    })),
    withSelect((select, { sidebarName }) => {
        const { getActiveGeneralSidebarName, isPluginItemPinned } = select(
            'core/edit-post'
        )
        const postMeta = select('core/editor').getEditedPostAttribute('meta');
        const oldPostMeta = select('core/editor').getCurrentPostAttribute('meta');
        return {
            isActive: getActiveGeneralSidebarName() === sidebarName,
            isPinned: isPluginItemPinned(sidebarName),
            meta: { ...oldPostMeta, ...postMeta },
            oldMeta: oldPostMeta,
        };
    }),
    withDispatch((dispatch, { sidebarName }) => {
        const {
            closeGeneralSidebar,
            openGeneralSidebar,
            togglePinnedPluginItem,
        } = dispatch('core/edit-post')
        return {
            closeGeneralSidebar,
            togglePin: () => {
                togglePinnedPluginItem(sidebarName)
            },
            setMetaFieldValue: (value, field) => dispatch('core/editor').editPost(
                { meta: { [field]: value } }
            ),
        }
    }),
)(kemetPageOptions);

if (KemetMetaData.version) {
    registerPlugin('kemet', {
        render: () => <KemetOptionsComposed name="kemet" />,
    })
}
