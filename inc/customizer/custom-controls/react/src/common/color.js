import PropTypes from 'prop-types';
import { __ } from '@wordpress/i18n';
import { Component } from '@wordpress/element';
import { Dashicon, Button, Tooltip, ColorIndicator, FocalPointPicker, TabPanel, __experimentalGradientPicker, SelectControl, ColorPalette, ColorPicker, ButtonGroup } from '@wordpress/components';
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
    // componentDidUpdate() {
    //     document.addEventListener('mouseup', this.toggleClose());
    // }


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

        // const dimensions = {
        //     desktop: {
        //         width: (undefined !== this.controlParams.attachments && 'object' === typeof this.controlParams.attachments && undefined !== this.controlParams.attachments.desktop && 'object' === typeof this.controlParams.attachments.desktop && this.controlParams.attachments.desktop && undefined !== this.controlParams.attachments.desktop.width ? this.controlParams.attachments.desktop.width : 400),
        //         height: (undefined !== this.controlParams.attachments && 'object' === typeof this.controlParams.attachments && undefined !== this.controlParams.attachments.desktop && 'object' === typeof this.controlParams.attachments.desktop && this.controlParams.attachments.desktop && undefined !== this.controlParams.attachments.desktop.height ? this.controlParams.attachments.desktop.height : 400),
        //     },
        //     tablet: {
        //         width: (undefined !== this.controlParams.attachments && 'object' === typeof this.controlParams.attachments && undefined !== this.controlParams.attachments.tablet && 'object' === typeof this.controlParams.attachments.tablet && this.controlParams.attachments.tablet && undefined !== this.controlParams.attachments.tablet.width ? this.controlParams.attachments.tablet.width : 400),
        //         height: (undefined !== this.controlParams.attachments && 'object' === typeof this.controlParams.attachments && undefined !== this.controlParams.attachments.tablet && 'object' === typeof this.controlParams.attachments.tablet && this.controlParams.attachments.tablet && undefined !== this.controlParams.attachments.tablet.height ? this.controlParams.attachments.tablet.height : 400),
        //     },
        //     mobile: {
        //         width: (undefined !== this.controlParams.attachments && 'object' === typeof this.controlParams.attachments && undefined !== this.controlParams.attachments.mobile && 'object' === typeof this.controlParams.attachments.mobile && this.controlParams.attachments.mobile && undefined !== this.controlParams.attachments.mobile.width ? this.controlParams.attachments.mobile.width : 400),
        //         height: (undefined !== this.controlParams.attachments && 'object' === typeof this.controlParams.attachments && undefined !== this.controlParams.attachments.mobile && 'object' === typeof this.controlParams.attachments.mobile && this.controlParams.attachments.mobile && undefined !== this.controlParams.attachments.mobile.height ? this.controlParams.attachments.mobile.height : 400),
        //     },
        // }

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

        let finalpaletteColors = [];
        let count = 0;

        const defaultColorPalette = [
            '#000000',
            '#ffffff',
            '#dd3333',
            '#dd9933',
            '#eeee22',
            '#81d742',
            '#1e73be',
        ];

        defaultColorPalette.forEach(singleColor => {
            let paletteColors = {};
            Object.assign(paletteColors, { name: count + '_' + singleColor });
            Object.assign(paletteColors, { color: singleColor });
            finalpaletteColors.push(paletteColors);
            count++;
        });

        return (
            <>
                <div className="color-button-wrap">
                    <Button className={isVisible ? 'kemet-color-icon-indicate open' : 'kemet-color-icon-indicate'} onClick={() => { isVisible ? this.toggleClose() : toggleVisible() }}>
                        {('color' === backgroundType || 'gradient' === backgroundType) &&
                            <>
                                <ColorIndicator className="kemet-advanced-color-indicate" colorValue={this.props.color} />
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
                                                                            value={this.props.color && this.props.color.includes('gradient') ? this.props.color : ''}
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
                                                                                <div className={`kmt-color-picker-top`}>
                                                                                    <ColorPalette
                                                                                        colors={finalpaletteColors}
                                                                                        value={this.props.color}
                                                                                        clearable={false}
                                                                                        disableCustomColors={true}
                                                                                        className="kmt-color-palette"
                                                                                        onChange={(color) => this.onPaletteChangeComplete(color)}
                                                                                    />
                                                                                </div>

                                                                                <ColorPicker
                                                                                    color={this.state.color}
                                                                                    onChangeComplete={(color) => this(color)}
                                                                                />
                                                                            </>
                                                                        )}
                                                                        {!refresh && (
                                                                            <>
                                                                                <div className={`kmt-color-picker-top`}>
                                                                                    <ColorPalette
                                                                                        colors={finalpaletteColors}
                                                                                        value={this.props.color}
                                                                                        clearable={false}
                                                                                        disableCustomColors={true}
                                                                                        className="kmt-color-palette"
                                                                                        onChange={(color) => this.onPaletteChangeComplete(color)}
                                                                                    />
                                                                                </div>
                                                                                <ColorPicker
                                                                                    color={this.props.color}
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
                                                    <div className={`kmt-color-picker-top`}>
                                                        <ColorPalette
                                                            colors={finalpaletteColors}
                                                            value={this.props.color}
                                                            clearable={false}
                                                            disableCustomColors={true}
                                                            className="kmt-color-palette"
                                                            onChange={(color) => this.onPaletteChangeComplete(color)}
                                                        />
                                                    </div>
                                                    <ColorPicker
                                                        color={this.props.color}
                                                        onChangeComplete={(color) => this.onChangeComplete(color)}
                                                    />

                                                </>
                                            )}
                                            {!refresh && (
                                                <>
                                                    <div className={`kmt-color-picker-top`}>
                                                        <ColorPalette
                                                            colors={finalpaletteColors}
                                                            value={this.props.color}
                                                            clearable={false}
                                                            disableCustomColors={true}
                                                            className="kmt-color-palette"
                                                            onChange={(color) => this.onPaletteChangeComplete(color)}
                                                        />
                                                    </div>
                                                    <ColorPicker
                                                        color={this.props.color}
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
        const dimensions = {
            width: 400,
            height: 100,
        };
        const repeat = {
            'no-repeat':
                <svg viewBox="0 0 16 16"><rect x="6" y="6" width="4" height="4" /></svg>,
            'repeat-x':
                <svg viewBox="0 0 16 16"><rect y="6" width="4" height="4" /><rect x="6" y="6" width="4" height="4" /><rect x="12" y="6" width="4" height="4" /></svg>,
            'repeat-y':
                <svg viewBox="0 0 16 16"><rect x="6" width="4" height="4" /><rect x="6" y="6" width="4" height="4" /><rect x="6" y="12" width="4" height="4" /></svg>,

            repeat:
                <svg viewBox="0 0 16 16"><path d="M0,0h4v4H0V0z M6,0h4v4H6V0z M12,0h4v4h-4V0z M0,6h4v4H0V6z M6,6h4v4H6V6z M12,6h4v4h-4V6z M0,12h4v4H0V12z M6,12h4v4H6V12zM12,12h4v4h-4V12z" /></svg>,
        }

        return (
            <>

                <MediaUpload
                    title={__("Select Background Image", 'astra')}
                    onSelect={(media) => this.onSelectImage(media)}
                    allowedTypes={["image"]}
                    value={(this.props.media && this.props.media ? this.props.media : '')}
                    render={({ open }) => (
                        <>
                            <Button className="upload-button button-add-media" isDefault onClick={() => this.open(open)}>
                                {(!this.props.media && !this.props.backgroundImage) ? __("Select Background Image", 'astra') : __("Replace image", 'astra')}
                            </Button>


                        </>
                    )}
                />

                {(this.props.media || this.props.backgroundImage) &&
                    <>
                        {/* <div className="premium-image-actions">
                            <Tooltip text={__("Edit")}>
                                <button
                                    className="premium-image-button"
                                    aria-label={__("Edit")}
                                    onClick={open}
                                    role="button"
                                >
                                    <span
                                        aria-label={__("Edit")}
                                        className="fa fa-pencil"
                                    />
                                </button>
                            </Tooltip>
                            <Tooltip text={__("Remove")}>
                                <button
                                    className="premium-image-button"
                                    aria-label={__("Remove")}
                                    onClick={this.onRemoveImage}
                                    role="button"
                                >
                                    <span
                                        aria-label={__("Close")}
                                        className="fa fa-trash-o"
                                    />
                                </button>
                            </Tooltip>
                        </div> */}
                        <FocalPointPicker
                            url={(this.props.media.url) ? this.props.media.url : this.props.backgroundImage}
                            dimensions={dimensions}
                            value={({ x: 0.5, y: 0.5 })}
                            onChange={(focalPoint) => this.onChangeImageOptions('backgroundPosition', 'background-position', focalPoint)}
                        />



                        <ul className="kmt-radio-option kmt-buttons-group">
                            {["Fixed", "Scroll"].map((item) => {
                                return (
                                    <li
                                        isTertiary
                                        className={"Size"}
                                        onClick={() => this.onChangeImageOptions('backgroundAttachment', 'background-attachment', item)}
                                    >
                                        {item}
                                    </li>
                                );
                            })}
                        </ul>

                        <ul className="kmt-radio-option kmt-buttons-group">
                            {Object.keys(repeat).map((item) => {
                                return (
                                    <li
                                        isTertiary
                                        className={"Reart"}
                                        onClick={() => this.onChangeImageOptions('backgroundRepeat', 'background-repeat', item)}
                                    >
                                        {/* {repeat[item] &&
                                                repeat[item]
                                            } */}
                                        "Salma"
                                    </li>
                                );
                            })}
                        </ul>

                        <ul className="kmt-radio-option kmt-buttons-group">
                            {["auto", "cover", "contain"].map((item) => {
                                return (
                                    <li
                                        isTertiary
                                        className={"Size"}
                                        onClick={() => this.onChangeImageOptions('backgroundSize', 'background-size', item)}
                                    >
                                        {item}
                                    </li>
                                );
                            })}
                        </ul>
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