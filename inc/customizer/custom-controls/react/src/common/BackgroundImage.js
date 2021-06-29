import React from 'react'
import { Dashicon, Button, ColorIndicator, TabPanel, __experimentalGradientPicker, SelectControl, ColorPalette } from '@wordpress/components';

import PatternPicker from './pattern';
import ImagePicker from './ImagePicker';
import classnames from 'classnames'

export default function BackgroundImage(props) {
    return (
        <div className={`kmt-image-background-wrap`}>
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
                                        open={props.open}
                                        media={props.media}
                                        backgroundAttachment={props.backgroundAttachment}
                                        backgroundRepeat={props.backgroundRepeat}
                                        backgroundSize={props.backgroundSize}
                                        backgroundImage={props.backgroundImage}
                                        onChangeImageOption={props.onChangeImageOptions}
                                        onSelectImage={props.onSelectImage}
                                    />

                                )
                            }
                            else {
                                tabout = (
                                    <>
                                        <PatternPicker />
                                    </>
                                )
                            }
                        }
                        return <div>{tabout}</div>;
                    }
                }

            </TabPanel>

        </div>
    )
}
