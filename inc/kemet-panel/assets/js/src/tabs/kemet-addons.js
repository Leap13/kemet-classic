import Container from "../common/Container"
import { useContext, useState } from "@wordpress/element";
import PanelContext from "../store/panel-store";

const { Dashicon } = wp.components;
const KemetAddons = () => {
    const [isLoading, setIsLoading] = useState(false)
    const { plugins, pluginsStatus, doAction, pluginActions: actions } = useContext(PanelContext);
    const slug = KemetPanelData.addons_plugin;
    const { name, description, banner } = plugins[slug];
    const status = pluginsStatus[slug];
    const updatePluginStatus = async (action) => {
        if (!isLoading) {
            setIsLoading(true);
        }
        await doAction(action, slug);
        if (!action.includes("install")) {
            window.location.reload();
        }
        setIsLoading(false);
    }

    const { title: btnTitle, action, class: btnClass } = actions[status];

    return <Container>
        <div className='kmt-addons-tab'>
            <h1>{name}</h1>
            <p className="description" dangerouslySetInnerHTML={{
                __html: description
            }}>
            </p>
            <img src={banner} alt='kemet-addons' />
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