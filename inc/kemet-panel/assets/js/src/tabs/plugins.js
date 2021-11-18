import { Fragment, useContext } from "@wordpress/element";
import SinglePlugin from '../common/SinglePlugins'
import { __ } from "@wordpress/i18n";
import Container from "../common/Container";
import PanelContext from "../store/panel-store";

const Plugins = () => {
    const { plugins } = useContext(PanelContext);

    return (
        <Container>
            {Object.keys(plugins).length > 0 && (
                <Fragment>
                    <div className="kmt-plugins-list">
                        {Object.keys(plugins).map((plugin) => {
                            return <SinglePlugin slug={plugin} />
                        })}
                    </div>
                </Fragment>
            )}
        </Container>
    )

}

export default Plugins;