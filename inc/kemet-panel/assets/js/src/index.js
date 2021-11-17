import OptionsTab from './tabs/options'
import Plugins from './tabs/plugins'
import System from './tabs/system'
import KemetAddons from './tabs/kemet-addons'
import { render, Fragment } from '@wordpress/element'
import Header from './layout/Header';
import Card from './common/Card';
import Container from './common/Container';
const { __ } = wp.i18n;
const { TabPanel, Panel, PanelBody } = wp.components;
const { kmtEvents } = window.KmtOptionComponent;
let tabs = {
    tabs: [],
    data: {}
};

kmtEvents.on('kmt:dashboard:customtabs', function ({ detail: customtabs }) {
    if (customtabs) {
        tabs = {
            tabs: [...tabs.tabs, ...customtabs.tabs],
            data: { ...tabs.data, ...customtabs.data }
        };
    }
})

const RendeTabs = ({ options }) => {
    const compare = (a, b) => {
        if (a.priority < b.priority) {
            return -1;
        }
        if (a.priority > b.priority) {
            return 1;
        }
        return 0;
    }
    let defaultTabs = {
        tabs: [
            {
                name: 'customizer-options',
                title: __('Customization', 'kemet'),
                className: 'customizer-options',
                priority: 5,
            },
            {
                name: 'kemet-addons',
                title: __('Kemet Addons', 'kemet'),
                className: 'kemet-addons',
                priority: 10,
            },
            {
                name: 'plugins',
                title: __('Recommended Plugins', 'kemet'),
                className: 'plugins',
                priority: 10
            },
            {
                name: 'system',
                title: __('System Info', 'kemet'),
                className: 'system',
                priority: 15
            },
        ],
        data: {
            'customizer-options': { Component: OptionsTab, props: { 'customize-options': options.customize } },
            'plugins': { Component: Plugins, props: {} },
            'system': { Component: System, props: {} },
            'kemet-addons': { Component: KemetAddons, props: {} },
        }
    };
    var names = new Set(defaultTabs.tabs.map(d => d.name));
    var mergedTabs = [...defaultTabs.tabs, ...tabs.tabs.filter(d => !names.has(d.name))];

    tabs = {
        tabs: mergedTabs,
        data: Object.assign(defaultTabs.data, tabs.data)
    };
    return <Fragment>
        <Header />
        <TabPanel className="kemet-dashboard-tab-panel"
            activeClass="active-tab"
            tabs={tabs.tabs.sort(compare)}>
            {
                (tab) => {
                    const { Component, props } = tabs.data[tab.name];
                    return <Panel className="tab-section">
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
        render(<RendeTabs options={KemetPanelData.options} />, document.getElementById('kmt-dashboard'))
    }
})


window.KmtAdminComponents = {
    Card,
    Container
}