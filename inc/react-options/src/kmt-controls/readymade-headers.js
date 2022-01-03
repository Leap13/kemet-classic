import { Fragment } from "@wordpress/element";
import {
    __experimentalGrid as Grid,
} from '@wordpress/components';
const { __ } = wp.i18n;
import kmtEvents from '../common/events';

const ReadymadeHeaders = props => {
    const value = props.value ? props.value : {};
    const { label, ref } = props.params;

    const headers = {
        header1: {
            title: __('1-Default Main Header', 'kemet'),
            image: kemetReactControls.theme_url + 'assets/images/headers/header-layout-01.svg',
            value: {
                main: {
                    main_left: ['logo'],
                    main_right: ['primary-menu', 'search']
                },
            }
        },
        header2: {
            title: __('2-Main Header', 'kemet'),
            image: kemetReactControls.theme_url + 'assets/images/headers/header-layout-02.svg',
            value: {
                main: {
                    main_left: ['logo'],
                    main_center: ['primary-menu'],
                    main_right: ['header-button-1']
                },
            }
        },
        header3: {
            title: __('3-Main Header', 'kemet'),
            image: kemetReactControls.theme_url + 'assets/images/headers/header-layout-03.svg',
            value: {
                main: {
                    main_left: ['logo', 'divider', 'primary-menu'],
                    main_right: ['header-button-1']
                },
            }
        },
        header4: {
            title: __('4-Top Main Bottom', 'kemet'),
            image: kemetReactControls.theme_url + 'assets/images/headers/header-layout-04.svg',
            value: {
                top: {
                    top_left: ['header-widget-1'],
                    top_right: ['header-widget-2']
                },
                main: {
                    main_center: ['logo']
                },
                bottom: {
                    bottom_center: ['primary-menu']
                },
            }
        },
        header5: {
            title: __('5-Top Main Bottom', 'kemet'),
            image: kemetReactControls.theme_url + 'assets/images/headers/header-layout-05.svg',
            value: {
                top: {
                    top_left: ['header-html-1'],
                    top_right: ['header-widget-2']
                },
                main: {
                    main_center: ['logo']
                },
                bottom: {
                    bottom_left: ['desktop-toggle'],
                    bottom_center: ['primary-menu'],
                    bottom_right: ['search']
                },
                popup: {
                    popup_content: ['offcanvas-menu']
                },
            }
        },
        header6: {
            title: __('6-Top Main', 'kemet'),
            image: kemetReactControls.theme_url + 'assets/images/headers/header-layout-06.svg',
            value: {
                top: {
                    top_left: ['header-html-1'],
                    top_right: ['header-widget-1']
                },
                main: {
                    main_left: ['logo'],
                    main_center: ['primary-menu'],
                    main_right: ['header-button-1']
                },
            }
        },
        header7: {
            title: __('7-Top Main', 'kemet'),
            image: kemetReactControls.theme_url + 'assets/images/headers/header-layout-07.svg',
            value: {
                top: {
                    top_left: ['header-html-1'],
                    top_right: ['secondary-menu', 'search']
                },
                main: {
                    main_left: ['logo'],
                    main_right: ['primary-menu', 'header-button-1'],
                },
            }
        },
        header8: {
            title: __('8-Top Main', 'kemet'),
            image: kemetReactControls.theme_url + 'assets/images/headers/header-layout-08.svg',
            value: {
                main: {
                    main_left: ['header-widget-1'],
                    main_center: ['logo'],
                    main_right: ['search-box']
                },
                bottom: {
                    bottom_center: ['primary-menu']
                },
            }
        },
        header9: {
            title: __('9-Main Bottom', 'kemet'),
            image: kemetReactControls.theme_url + 'assets/images/headers/header-layout-09.svg',
            value: {
                main: {
                    main_left: ['logo'],
                    main_right: ['header-widget-1']
                },
                bottom: {
                    bottom_left: ['primary-menu'],
                    bottom_right: ['search-box']
                },
            }
        },
        header10: {
            title: __('10-Main Bottom', 'kemet'),
            image: kemetReactControls.theme_url + 'assets/images/headers/header-layout-10.svg',
            value: {
                main: {
                    main_left: ['logo'],
                    main_right: ['secondary-menu', 'search']
                },
                bottom: {
                    bottom_center: ['primary-menu']
                },
            }
        }

    };

    const getReadymadeHeader = (headerValue) => {
        const ReadymadeHeader = {
            popup: { popup_content: [] },
            top: {
                top_left: [],
                top_left_center: [],
                top_center: [],
                top_right_center: [],
                top_right: [],
            },
            main: {
                main_left: [],
                main_left_center: [],
                main_center: [],
                main_right_center: [],
                main_right: [],
            },
            bottom: {
                bottom_left: [],
                bottom_left_center: [],
                bottom_center: [],
                bottom_right_center: [],
                bottom_right: [],
            },
        };
        Object.keys(headerValue).map(row => {
            Object.keys(headerValue[row]).map(zone => {
                ReadymadeHeader[row][zone] = headerValue[row][zone];
            })
        })
        return ReadymadeHeader;
    }

    const onChangeHandler = (values) => {
        if (wp.customize) {
            kmtEvents.trigger('UpdateBuilderValues', { values, id: ref });
        }
        props.onChange(values);
    }

    return <Fragment>
        <span className="customize-control-title kmt-control-title">{label}</span>
        <div className='customize-control-content'>
            <Grid columns={1} gap={1}>
                {Object.keys(headers).map(headerKey => {
                    const headerData = headers[headerKey];
                    const headerValue = getReadymadeHeader(headerData.value);
                    const activeClass = JSON.stringify(value) === JSON.stringify(headerValue) ? ' active' : '';
                    return <label title={headerData.title} className={`header-image${activeClass}`} onClick={() => {
                        let updatedvalue = headerValue;
                        onChangeHandler(updatedvalue);
                    }}>
                        <img src={headerData.image} alt={headerData.title} />
                    </label>
                })}
            </Grid>
        </div>
    </Fragment>
}

export default ReadymadeHeaders