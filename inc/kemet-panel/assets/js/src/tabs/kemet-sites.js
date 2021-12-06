import Container from "../common/Container"
import { useContext, useState } from "@wordpress/element";
import PanelContext from "../store/panel-store";
import pushHistory from "../common/push-history";

const { __ } = wp.i18n;
const KemetSites = () => {
    const [isLoading, setIsLoading] = useState(false)
    const { pluginsStatus, doAction, pluginActions: actions } = useContext(PanelContext);
    const slug = KemetPanelData.sites_plugin;
    const status = pluginsStatus[slug];
    const updatePluginStatus = async (action) => {
        if (!isLoading) {
            setIsLoading(true);
        }
        await doAction(action, slug);
        if (!action.includes("install")) {
            pushHistory('kemet-sites');
            window.location.reload();
        }
        setIsLoading(false);
    }

    const { title: btnTitle, action, class: btnClass } = actions[status];

    return <Container>
        <div className='kmt-sites-tab'>
            <h1>{__('Kemet Sites', 'kemet')}</h1>
            <p className="description">
                {__('Kemet Sites plugin…', 'kemet')}
            </p>
            <img src={KemetPanelData.images_url + 'kemet-addons-banner.png'} alt='kemet-sites' />
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

export default KemetSites