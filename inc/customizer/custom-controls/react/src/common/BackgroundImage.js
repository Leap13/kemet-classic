import React from 'react'
import { Dashicon, Button, ColorIndicator, TabPanel, __experimentalGradientPicker, SelectControl, ColorPalette } from '@wordpress/components';

import { PatternPicker } from './pattern';
import { ImagePicker } from './ImagePicker';
import classnames from 'classnames'

export default function BackgroundImage(props) {
    return (
        <>
            <TabPanel className="kemet-popover-tabs kemet-background-tabs"
                activeClass="active-tab"
                initialTabName={'image'}
                tabs={[{
                    name: 'image',
                    title: __('Image'),
                    className: 'kemet-color-background',
                },
                {
                    name: 'pattern',
                    title: __('Pattern'),
                    className: 'kemet-color-background',
                }]}>
                {
                    (tab) => {
                        let tabout;

                        if (tab.name) {
                            if ('image' === tab.name) {
                                tabout = (

                                    <ImagePicker
                                        media={props.media}
                                        backgroundAttachment={props.backgroundAttachment}
                                        backgroundRepeat={props.backgroundRepeat}
                                        backgroundSize={props.backgroundSize}
                                        backgroundImage={props.backgroundImage}
                                        onChangeImageOption={props.onChangeImageOptions}
                                    />

                                )
                            }
                            else {
                                tabout = (
                                    <>
                                        <span>Salma</span>
                                    </>
                                )
                            }
                        }
                        return <div>{tabout}</div>;
                    }
                }

            </TabPanel>

        </>
    )
}
