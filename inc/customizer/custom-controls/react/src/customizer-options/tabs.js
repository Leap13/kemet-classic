import PropTypes from "prop-types";
import { Fragment, useState, useEffect } from "react";
const { Dashicon } = wp.components;
const { __ } = wp.i18n;
import { renderOptions } from '../options/options-component'

const TabsComponent = ({ params: { tabs } }) => {

    tabs = tabs ? tabs : {}
    const [state, setState] = useState({
        currentTab: 0,
    });

    useEffect(() => {
        document.dispatchEvent(new CustomEvent("kmtSubOptionsReady"));
    }, [state]);

    const currentTab = tabs[Object.keys(tabs)[state.currentTab]];

    return (
        <Fragment>
            <ul className="tabs">
                {Object.keys(tabs).map((tab, index) => {
                    return <li
                        onClick={() => {
                            setState({ currentTab: index });
                        }
                        }
                        className={index === state.currentTab && 'active'}>
                        {tabs[tab].title}
                    </li>
                })}
            </ul>
            <div className="current-tab-options">
                {renderOptions(currentTab.options)}
            </div>
        </Fragment >
    );
};

TabsComponent.propTypes = {
    control: PropTypes.object.isRequired,
    customizer: PropTypes.func.isRequired,
};

export default React.memo(TabsComponent);
