import PropTypes from 'prop-types';
import { __ } from '@wordpress/i18n';
import { Component } from '@wordpress/element';
import classnames from 'classnames'

import { Dashicon, Button, ColorIndicator, TabPanel, __experimentalGradientPicker, SelectControl, ColorPalette, ColorPicker } from '@wordpress/components';
import { MediaUpload } from '@wordpress/media-utils';


class KemetColorPickerControl extends Component {

    constructor(props) {
        super(...arguments);
        this.onChangeComplete = this.onChangeComplete.bind(this);
        this.onPaletteChangeComplete = this.onPaletteChangeComplete.bind(this);
        this.onChangeGradientComplete = this.onChangeGradientComplete.bind(this);
        this.renderImageSettings = this.renderImageSettings.bind(this);
        this.onRemoveImage = this.onRemoveImage.bind(this);
        this.onSelectImage = this.onSelectImage.bind(this);
        this.open = this.open.bind(this);
        this.toggleClose = this.toggleClose.bind(this)

        this.state = {
            isVisible: false,
            refresh: false,
            color: this.props.color,
            text: this.props.text,
            modalCanClose: true,
            backgroundType: this.props.backgroundType,
            supportGradient: (undefined === __experimentalGradientPicker ? false : true),
        };
    }




    onResetRefresh() {
        if (this.state.refresh === true) {
            this.setState({ refresh: false });
        } else {
            this.setState({ refresh: true });
        }
    }

    render() {
        const {
            refresh,
            isVisible,
            supportGradient,
            backgroundType,
        } = this.state

        const {
            allowGradient,
            allowImage
        } = this.props

        const toggleVisible = () => {
            if (refresh === true) {
                this.setState({ refresh: false });
            } else {
                this.setState({ refresh: true });
            }
            this.setState({ isVisible: true });
        };






        const showingGradient = (allowGradient && supportGradient ? true : false);

        let tabs = [
            {
                name: 'color',
                title: __('Color'),
                className: 'kemet-color-background',
            },

        ];

        if (showingGradient) {

            let gradientTab = {
                name: 'gradient',
                title: __('Gradient', 'kemet'),
                className: 'kemet-image-background',
            };

            tabs.push(gradientTab)
        }

        if (allowImage) {

            let imageTab = {
                name: 'image',
                title: __('Image', 'kemet'),
                className: 'kemet-image-background',
            };

            tabs.push(imageTab)
        }



        const defaultColorPalette = [
            '#000000',
            '#ffffff',
            '#dd3333',
            '#dd9933',
            '#eeee22',
            '#81d742',
            '#1e73be',
        ];

        const RenderTopSection = () => {
            return (
                <div className={`kmt-color-picker-top`}>
                    <ul className="kmt-color-picker-skins">
                        {defaultColorPalette.map((color, index) => (
                            <li
                                key={`color-${index}`}
                                style={{
                                    background: color,
                                }}
                                className={classnames({
                                    active:
                                        this.state.color === color,
                                })}
                                onClick={() => this.onPaletteChangeComplete(color)}>
                                <div className="kmt-tooltip-top">
                                    {`Color ${index + 1}`}
                                </div>
                            </li>
                        ))}
                    </ul>
                </div>
            )
        }



        return (
            <>
                <div className="color-button-wrap">
                    <Button className={isVisible ? 'kemet-color-icon-indicate open' : 'kemet-color-icon-indicate'} onClick={() => { isVisible ? this.toggleClose() : toggleVisible() }}>
                        {('color' === backgroundType || 'gradient' === backgroundType) &&
                            <>
                                <ColorIndicator className="kemet-advanced-color-indicate" colorValue={this.state.color} />
                                <i class="kmt-tooltip-top">{this.state.text}</i>
                            </>
                        }
                        {'image' === backgroundType &&
                            <>
                                <ColorIndicator className="kemet-advanced-color-indicate" colorValue='#ffffff' />
                                <Dashicon icon="format-image" />
                            </>
                        }
                    </Button>
                    {isVisible ? (
                        <div className="kemet-color-picker-wrap">
                            <>

                                <div className="kemet-popover-color" onClose={this.toggleClose}>
                                    {
                                        1 < tabs.length &&
                                        <>

                                            <TabPanel className="kemet-popover-tabs kemet-background-tabs"
                                                activeClass="active-tab"
                                                initialTabName={backgroundType}
                                                tabs={tabs}>
                                                {
                                                    (tab) => {
                                                        let tabout;

                                                        if (tab.name) {
                                                            if ('gradient' === tab.name) {
                                                                tabout = (
                                                                    <>
                                                                        <__experimentalGradientPicker
                                                                            className="kmt-gradient-color-picker"
                                                                            value={this.state.color && this.state.color.includes('gradient') ? this.state.color : ''}
                                                                            onChange={(gradient) => this.onChangeGradientComplete(gradient)}
                                                                        />
                                                                    </>
                                                                );
                                                            } if ('image' === tab.name) {
                                                                tabout = (
                                                                    this.renderImageSettings()
                                                                );
                                                            } else if ('color' === tab.name) {
                                                                tabout = (
                                                                    <>
                                                                        {refresh && (
                                                                            <>

                                                                                {RenderTopSection()}
                                                                                <ColorPicker
                                                                                    color={this.state.color}
                                                                                    onChangeComplete={(color) => this(color)}
                                                                                />
                                                                            </>
                                                                        )}
                                                                        {!refresh && (
                                                                            <>
                                                                                {RenderTopSection()}
                                                                                <ColorPicker
                                                                                    color={this.state.color}
                                                                                    onChangeComplete={(color) => this.onChangeComplete(color)}
                                                                                />
                                                                            </>
                                                                        )}

                                                                    </>
                                                                );
                                                            }
                                                        }
                                                        return <div>{tabout}</div>;
                                                    }
                                                }
                                            </TabPanel>
                                        </>
                                    }
                                    {1 === tabs.length &&

                                        <>
                                            {refresh && (
                                                <>
                                                    {RenderTopSection()}

                                                    <ColorPicker
                                                        color={this.state.color}
                                                        onChangeComplete={(color) => this.onChangeComplete(color)}
                                                    />

                                                </>
                                            )}
                                            {!refresh && (
                                                <>
                                                    {RenderTopSection()}
                                                    <ColorPicker
                                                        color={this.state.color}
                                                        onChangeComplete={(color) => this.onChangeComplete(color)}
                                                    />

                                                </>
                                            )}
                                        </>
                                    }
                                </div>

                            </>
                        </div>
                    ) : null}
                </div>

            </>
        );
    }
    toggleClose() {
        if (this.state.modalCanClose) {
            if (this.state.isVisible === true) {
                this.setState({ isVisible: false });
            }
        }
    }

    onChangeState(color, palette) {
        let newColor;
        if (palette) {
            newColor = palette;
        } else if (undefined !== color.rgb && undefined !== color.rgb.a && 1 !== color.rgb.a) {
            newColor = 'rgba(' + color.rgb.r + ',' + color.rgb.g + ',' + color.rgb.b + ',' + color.rgb.a + ')';
        } else {
            newColor = color.hex;
        }
        this.setState({ color: newColor, isPalette: (palette ? true : false) });
        if (undefined !== this.props.onChange) {
            this.props.onChange(color, palette);
        }
    }


    onChangeGradientComplete(gradient) {

        this.setState({ backgroundType: 'gradient' });
        this.props.onChangeComplete(gradient, 'gradient');
    }

    onChangeComplete(color) {
        let newColor;
        if (color.rgb && color.rgb.a && 1 !== color.rgb.a) {
            newColor = 'rgba(' + color.rgb.r + ',' + color.rgb.g + ',' + color.rgb.b + ',' + color.rgb.a + ')';
        } else {
            newColor = color.hex;
        }
        this.setState({ backgroundType: 'color' });
        this.setState({ color: newColor })
        this.props.onChangeComplete(color);
    }

    onPaletteChangeComplete(color) {
        this.setState({ color: color });
        if (this.state.refresh === true) {
            this.setState({ refresh: false });
        } else {
            this.setState({ refresh: true });
        }
        this.props.onChangeComplete(color);
    }

    onSelectImage(media) {

        this.setState({ modalCanClose: true });
        this.setState({ backgroundType: 'image' });
        this.props.onSelectImage(media, 'image');
    }
    onRemoveImage() {

        this.setState({ modalCanClose: true });
        this.props.onSelectImage('');
    }

    open(open) {
        this.setState({ modalCanClose: false });
        open()
    }

    onChangeImageOptions(tempKey, mainkey, value) {
        this.setState({ backgroundType: 'image' });
        this.props.onChangeImageOptions(mainkey, value, 'image');
    }

    toggleMoreSettings() {

        let parent = event.target.parentElement.parentElement;
        let trigger = parent.querySelector('.more-settings');
        let wrapper = parent.querySelector('.media-position-setting');

        let dataDirection = trigger.dataset.direction;
        let dataId = trigger.dataset.id;

        if ('down' === dataDirection) {
            trigger.setAttribute('data-direction', 'up');
            parent.querySelector('.message').innerHTML = __("Less Settings");
            parent.querySelector('.icon').innerHTML = '↑';
        } else {
            trigger.setAttribute('data-direction', 'down');
            parent.querySelector('.message').innerHTML = __("More Settings");
            parent.querySelector('.icon').innerHTML = '↓';
        }

        if (wrapper.classList.contains('hide-settings')) {
            wrapper.classList.remove('hide-settings');
        } else {
            wrapper.classList.add('hide-settings');
        }
    }

    renderImageSettings() {

        return (
            <>
                {(this.props.media.url || this.props.backgroundImage) &&

                    <img src={(this.props.media.url) ? this.props.media.url : this.props.backgroundImage} />
                }
                <MediaUpload
                    title={__("Select Background Image", 'kemet')}
                    onSelect={(media) => this.onSelectImage(media)}
                    allowedTypes={["image"]}
                    value={(this.props.media && this.props.media ? this.props.media : '')}
                    render={({ open }) => (
                        <Button className="upload-button button-add-media" isDefault onClick={() => this.open(open)}>
                            {(!this.props.media && !this.props.backgroundImage) ? __("Select Background Image", 'kemet') : __("Replace image", 'kemet')}
                        </Button>
                    )}
                />

                {(this.props.media || this.props.backgroundImage) &&
                    <>
                        <Button className="kmt-bg-img-remove" onClick={this.onRemoveImage} isLink isDestructive>
                            {__("Remove Image", 'kemet')}
                        </Button>

                        <a href="#" className="more-settings" onClick={this.toggleMoreSettings} data-direction="down" data-id="desktop">
                            <span className="message"> {__("More Settings")} </span>
                            <span className="icon"> ↓ </span>
                        </a>

                        <div className="media-position-setting hide-settings">
                            <SelectControl
                                label={__("Image Position")}
                                value={this.props.backgroundPosition}
                                onChange={(value) => this.onChangeImageOptions('backgroundPosition', 'background-position', value)}
                                options={[
                                    { value: "left top", label: __("Left Top", 'kemet') },
                                    { value: "left center", label: __("Left Center", 'kemet') },
                                    { value: "left bottom", label: __("Left Bottom", 'kemet') },
                                    { value: "right top", label: __("Right Top", 'kemet') },
                                    { value: "right center", label: __("Right Center", 'kemet') },
                                    { value: "right bottom", label: __("Right Bottom", 'kemet') },
                                    { value: "center top", label: __("Center Top", 'kemet') },
                                    { value: "center center", label: __("Center Center", 'kemet') },
                                    { value: "center bottom", label: __("Center Bottom", 'kemet') },
                                ]}
                            />
                            <SelectControl
                                label={__("Attachment", 'kemet')}
                                value={this.props.backgroundAttachment}
                                onChange={(value) => this.onChangeImageOptions('backgroundAttachment', 'background-attachment', value)}
                                options={[
                                    { value: "fixed", label: __("Fixed", 'kemet') },
                                    { value: "scroll", label: __("Scroll", 'kemet') }
                                ]}
                            />
                            <SelectControl
                                label={__("Repeat", 'kemet')}
                                value={this.props.backgroundRepeat}
                                onChange={(value) => this.onChangeImageOptions('backgroundRepeat', 'background-repeat', value)}
                                options={[
                                    { value: "no-repeat", label: __("No Repeat", 'kemet') },
                                    { value: "repeat", label: __("Repeat All", 'kemet') },
                                    { value: "repeat-x", label: __("Repeat Horizontally", 'kemet') },
                                    { value: "repeat-y", label: __("Repeat Vertically", 'kemet') }
                                ]}
                            />
                            <SelectControl
                                label={__("Size", 'kemet')}
                                value={this.props.backgroundSize}
                                onChange={(value) => this.onChangeImageOptions('backgroundSize', 'background-size', value)}
                                options={[
                                    { value: "auto", label: __("Auto", 'kemet') },
                                    { value: "cover", label: __("Cover", 'kemet') },
                                    { value: "contain", label: __("Contain", 'kemet') }
                                ]}
                            />
                        </div>
                    </>
                }
            </>
        )
    }
}

KemetColorPickerControl.propTypes = {
    color: PropTypes.string,
    usePalette: PropTypes.bool,
    palette: PropTypes.string,
    presetColors: PropTypes.object,
    onChangeComplete: PropTypes.func,
    onPaletteChangeComplete: PropTypes.func,
    onChange: PropTypes.func,
    customizer: PropTypes.object
};

export default KemetColorPickerControl;