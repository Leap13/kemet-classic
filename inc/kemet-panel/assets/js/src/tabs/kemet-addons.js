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
    const loadingClass = isLoading ? ' loading' : '';
    return <Container>
        <div className='kmt-addons-tab'>
            <img src={KemetPanelData.images_url + 'kemet-addons-screenshot.jpg'} alt='kemet-addons' />
            <div className="overlay-actions">
                <a
                    onClick={() => updatePluginStatus(action)}
                    className={`kmt-button ${btnClass}${loadingClass}`}>
                    {btnTitle}
                </a>
            </div>
        </div>
    </Container>
}

export default KemetAddons