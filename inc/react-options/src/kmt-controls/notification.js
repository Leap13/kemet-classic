import { Button } from '@wordpress/components';
import { useState } from 'react';
const { __ } = wp.i18n;

const NotificationComponent = ({ params }) => {
    const { content, action } = params;
    const [isLoading, setIsLoading] = useState(false)
    let actionMarkup;

    const doAction = async (action, plugin) => {
        setIsLoading(true);
        const { path } = kemetReactControls.plugins_data[plugin];
        const body = new FormData()
        body.append('action', action)
        body.append('nonce', kemetReactControls.plugin_manager_nonce)
        body.append('path', path)
        body.append('slug', plugin)

        try {
            const response = await fetch(kemetReactControls.ajaxurl, {
                method: 'POST',
                body,
            })

            if (response.status === 200) {
                const { success } = await response.json()

                if (success) {
                    if (action === 'kemet-install-plugin') {
                        await doAction('kemet-activate-plugin', plugin);
                    }
                    if (action === 'kemet-activate-plugin') {
                        window.location.replace(kemetReactControls.kemet_addons_url);
                    }
                }
            }
        } catch (e) {
            alert(e);
        }
    }

    const pluginActions = {
        deactivate: {
            title: __('Deactivate', 'kemet'),
            action: 'kemet-deactivate-plugin'
        },
        activate: {
            title: __('Activate', 'kemet'),
            action: 'kemet-activate-plugin'
        },
        install: {
            title: __('Install and Activate', 'kemet'),
            action: 'kemet-install-plugin'
        }
    }

    if (action) {
        const buttonClass = isLoading ? ' loading' : '';
        switch (action.type) {
            case 'plugin':
                const { slug } = action;
                const pluginStatus = kemetReactControls.plugins_status[slug];
                const pluginData = pluginActions[pluginStatus];
                actionMarkup = <Button className={`kmt-notification-action${buttonClass}`} isPrimary={true} onClick={() => doAction(pluginData.action, slug)}>{pluginData.title}</Button>
                break;
            case 'link':
                const { title, url } = action;
                actionMarkup = <Button className={`kmt-notification-action${buttonClass}`} isPrimary={true}><a href={url}>{title}</a></Button>
                break;
        }
    }
    return <div className="kmt-notification">
        {content}
        {actionMarkup && <div>{actionMarkup}</div>}
    </div>
}

export default NotificationComponent