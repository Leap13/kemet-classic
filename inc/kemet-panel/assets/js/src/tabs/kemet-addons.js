import Container from "../common/Container"
import { useContext, useState } from "@wordpress/element";
import PanelContext from "../store/panel-store";
import pushHistory from "../common/push-history";

const { __ } = wp.i18n;
const KemetAddons = () => {
    const [isLoading, setIsLoading] = useState(false)
    const { pluginsStatus, doAction, pluginActions: actions } = useContext(PanelContext);
    const slug = KemetPanelData.addons_plugin;
    const status = pluginsStatus[slug];
    const updatePluginStatus = async (action) => {
        if (!isLoading) {
            setIsLoading(true);
        }
        await doAction(action, slug);
        if (!action.includes("install")) {
            pushHistory('kemet-addons');
            window.location.reload();
        }
        setIsLoading(false);
    }

    const { title: btnTitle, action, class: btnClass } = actions[status];

    return <Container>
        <div className='kmt-addons-tab'>
            <h1>{__('Kemet Addons', 'kemet')}</h1>
            <p className="description">
                {__('Kemet Addons plugin adds more features to Kemet WordPress Theme like metaboxes, activate/deactivate the customizer…', 'kemet')}
            </p>
            <img src={KemetPanelData.images_url + 'kemet-addons-banner.png'} alt='kemet-addons' />
            <div className="actions">
                <a
                    onClick={() => updatePluginStatus(action)}
                    className={`kmt-button ${btnClass}`}>
                    {btnTitle}
                </a>
            </div>
        </div>
    </Container>
}

export default KemetAddons