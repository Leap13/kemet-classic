import PropTypes from "prop-types";
import { Fragment, useState, useEffect } from "react";

const TabsComponent = (props) => {
    let tabs = props.params.tabs
        ? props.params.tabs
        : {};
    const [state, setState] = useState({
        currentTab: 0,
    });

    const currentTab = tabs[Object.keys(tabs)[state.currentTab]];
    const currentClass = props.currentClass ? ' ' + props.currentClass : '';
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
            <div className={`current-tab-options${currentClass}`}>
                {props.renderOptions(currentTab.options)}
            </div>
        </Fragment >
    );
};

TabsComponent.propTypes = {
    control: PropTypes.object.isRequired,
    customizer: PropTypes.func.isRequired,
};

export default React.memo(TabsComponent);
