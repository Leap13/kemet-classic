import { useState } from "@wordpress/element";
const { kmtEvents } = window.KmtOptionComponent;
import { __ } from "@wordpress/i18n";
const PanelContext = React.createContext({
    tabs: [],
    plugins: {},
    pluginsStatus: {},
    doAction: (action, plugin) => { }
})

export const PanelProvider = (props) => {
    const tabs = [];
    kmtEvents.trigger('kmt:dashboard:customtabs', tabs);
    const plugins = KemetPanelData.plugins_data;
    const pluginsCache = KemetPanelData.plugins_cache;
    const [pluginsStatus, setPluginStatus] = useState(pluginsCache || []);

    const updatePluginsStatus = async () => {
        const body = new FormData()
        body.append('action', 'kemet-plugins-status')
        body.append('nonce', KemetPanelData.nonce)

        try {
            const response = await fetch(KemetPanelData.ajaxurl, {
                method: 'POST',
                body,
            })

            if (response.status === 200) {
                const { success, data } = await response.json()
                if (success) {
                    setPluginStatus(data)
                }
            }
        } catch (e) {
            alert(e);
        }
    }

    const doAction = async (action, plugin) => {
        const { path } = plugins[plugin];
        const body = new FormData()
        body.append('action', action)
        body.append('nonce', KemetPanelData.plugin_manager_nonce)
        body.append('path', path)
        body.append('slug', plugin)

        try {
            const response = await fetch(KemetPanelData.ajaxurl, {
                method: 'POST',
                body,
            })

            if (response.status === 200) {
                const { success } = await response.json()

                if (success) {
                    await updatePluginsStatus();
                }
            }
        } catch (e) {
            alert(e);
        }
    }

    const pluginActions = {
        deactivate: {
            title: __('Deactivate', 'kemet-addons'),
            class: 'secondary',
            action: 'kemet-deactivate-plugin'
        },
        activate: {
            title: __('Activate', 'kemet-addons'),
            class: 'primary',
            action: 'kemet-activate-plugin'
        },
        install: {
            title: __('Install', 'kemet-addons'),
            class: 'primary',
            action: 'kemet-install-plugin'
        }
    }

    const pluginsContext = {
        tabs,
        plugins,
        pluginsStatus,
        pluginActions,
        doAction: doAction,
    };
    return <PanelContext.Provider value={pluginsContext}>
        {props.children}
    </PanelContext.Provider>
}

export default PanelContext