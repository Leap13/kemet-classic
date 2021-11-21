import OptionsTab from './tabs/options'
import Plugins from './tabs/plugins'
import System from './tabs/system'
import Support from './tabs/support'
import KemetAddons from './tabs/kemet-addons'
import { render, Fragment, useContext } from '@wordpress/element'
import Header from './layout/Header';
import Card from './common/Card';
import Container from './common/Container';
import PanelContext, { PanelProvider } from './store/panel-store'
import pushHistory from './common/push-history'

const { __ } = wp.i18n;
const { TabPanel, Panel, PanelBody } = wp.components;

const RendeTabs = ({ options }) => {
    let { tabs } = useContext(PanelContext);
    const compare = (a, b) => {
        if (a.priority < b.priority) {
            return -1;
        }
        if (a.priority > b.priority) {
            return 1;
        }
        return 0;
    }
    let defaultTabs = [
        {
            name: 'customizer-options',
            title: __('Customization', 'kemet'),
            className: 'customizer-options',
            priority: 5,
            data: {
                Component: OptionsTab,
                props: { 'customize-options': options.customize }
            }
        },
        {
            name: 'kemet-addons',
            title: __('Kemet Addons', 'kemet'),
            className: 'kemet-addons',
            priority: 10,
            data: {
                Component: KemetAddons,
                props: {}
            }
        },
        {
            name: 'plugins',
            title: __('Recommended Plugins', 'kemet'),
            className: 'plugins',
            priority: 15,
            data: {
                Component: Plugins,
                props: {}
            }
        },
        {
            name: 'support',
            title: __('Support', 'kemet'),
            className: 'support',
            priority: 25,
            data: {
                Component: Support,
                props: {}
            }
        },
        {
            name: 'system',
            title: __('System Info', 'kemet'),
            className: 'system',
            priority: 25,
            data: {
                Component: System,
                props: {}
            }
        },
    ];
    let names = new Set(tabs.map(d => d.name));
    let mergedTabs = [...tabs, ...defaultTabs.filter(d => !names.has(d.name))];
    tabs = mergedTabs;
    const onSelectHandler = (tabName) => {
        pushHistory(tabName);
    }
    return <Fragment>
        <Header />
        <TabPanel className="kemet-dashboard-tab-panel"
            activeClass="active-tab"
            initialTabName={KemetPanelData.kemet_addons_redirect}
            onSelect={onSelectHandler}
            tabs={tabs.sort(compare)}>
            {
                (tab) => {
                    const { Component, props } = tab.data;
                    return <Panel className={`tab-section ${tab.name}`}>
                        <PanelBody
                            opened={true}
                        >
                            <Component {...props} />
                        </PanelBody>
                    </Panel>
                }
            }
        </TabPanel>
    </Fragment>
};

document.addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('kmt-dashboard')) {
        let sidebar = document.getElementById("adminmenuwrap"),
            sidebarHeight = sidebar.offsetHeight + 'px';
        document.getElementById("wpbody").style.minHeight = sidebarHeight
        render(<PanelProvider><RendeTabs options={KemetPanelData.options} /></PanelProvider>, document.getElementById('kmt-dashboard'))
    }
})


window.KmtAdminComponents = {
    Card,
    Container
}