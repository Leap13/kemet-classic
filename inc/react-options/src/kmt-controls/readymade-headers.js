import { Fragment } from "@wordpress/element";
import {
    __experimentalGrid as Grid,
} from '@wordpress/components';
const { __ } = wp.i18n;
import kmtEvents from '../common/events';

const ReadymadeHeaders = props => {
    const value = props.value ? props.value : {};
    const { label, ref } = props.params;
    const defaultHeaderValue = {
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

    const headers = {
        header1: {
            title: __('Header 1', 'kemet'),
            image: kemetReactControls.theme_url + 'assets/images/page-title-layout-01.png',
            value: {
                top: {
                    top_left: ['search']
                },
                main: {
                    main_left: ['logo'],
                    main_right: ['primary-menu']
                },
            }
        },
        header2: {
            title: __('Header 2', 'kemet'),
            image: kemetReactControls.theme_url + 'assets/images/page-title-layout-02.png',
            value: {
                top: {
                    top_left: ['search-box']
                },
                main: {
                    main_left: ['logo'],
                    main_right: ['desktop-toggle']
                },
            }
        },
        header3: {
            title: __('Header 3', 'kemet'),
            image: kemetReactControls.theme_url + 'assets/images/page-title-layout-02.png',
            value: {
                bottom: {
                    bottom_center: ['logo'],
                },
            }
        }
    };

    const getReadymadeHeader = (headerValue) => {
        const ReadymadeHeader = defaultHeaderValue;
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
        } else {
            props.onChange(values);
        }
    }

    return <Fragment>
        <span className="customize-control-title kmt-control-title">{label}</span>
        <div className='customize-control-content'>
            <Grid columns={1} gap={1}>
                {Object.keys(headers).map(headerKey => {
                    const headerData = headers[headerKey];
                    return <label className={`header-image`} onClick={() => {
                        let updatedvalue = getReadymadeHeader(headerData.value);
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