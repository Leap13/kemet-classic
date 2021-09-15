import PropTypes from 'prop-types';
import { __ } from '@wordpress/i18n';
import { Component } from '@wordpress/element';
import { Dashicon, Button, Tooltip, ColorIndicator, FocalPointPicker, TabPanel, __experimentalGradientPicker, SelectControl, ColorPalette, ColorPicker, ButtonGroup } from '@wordpress/components';
import { MediaUpload } from '@wordpress/media-utils';
import classnames from 'classnames'


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
            "#e2e7ed"
        ];

        const onSelect = (tabName) => {
            this.props.onSelect(tabName)
        }

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
                                        this.props.color === color,
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
                    <Button className={isVisible ? 'kemet-color-icon-indicate open' : 'kemet-color-icon-indicate'} data-background-type={this.props.backgroundType} onClick={() => { isVisible ? this.toggleClose() : toggleVisible() }} style={{
                        backgroundColor: this.props.color,
                        '--background-position': this.props.backgroundPosition ? ` ${Math.round(
                            parseFloat(this.props.backgroundPosition.x) * 100
                        )}% ${Math.round(
                            parseFloat(this.props.backgroundPosition.y) * 100
                        )}%` : null,
                        '--background-image':
                            this.props.backgroundType === 'gradient'
                                ? this.props.gradient
                                : this.props.backgroundImage
                                    ? `url(${this.props.backgroundImage})`
                                    : 'none',


                    }}>
                        <i className="kmt-tooltip-top">
                            {this.state.text}
                        </i>
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
                                                initialTabName={this.props.backgroundType}
                                                onSelect={onSelect}
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
                                                                            value={this.props.gradient && this.props.backgroundType === "gradient" ? this.props.gradient : ''}
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
                                                                                    color={this.props.color}
                                                                                    onChangeComplete={(color) => this.onChangeComplete(color)}
                                                                                />
                                                                            </>
                                                                        )}
                                                                        {!refresh && (
                                                                            <>
                                                                                {RenderTopSection()}
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
                                                    {RenderTopSection()}

                                                    <ColorPicker
                                                        color={this.props.color}
                                                        onChangeComplete={(color) => this.onChangeComplete(color)}
                                                    />

                                                </>
                                            )}
                                            {!refresh && (
                                                <>
                                                    {RenderTopSection()}
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

        this.setState({ color: gradient })
        this.props.onChangeGradient(gradient)
    }

    onChangeComplete(color) {
        let newColor;
        if (color.rgb && color.rgb.a && 1 !== color.rgb.a) {
            newColor = 'rgba(' + color.rgb.r + ',' + color.rgb.g + ',' + color.rgb.b + ',' + color.rgb.a + ')';
        } else {
            newColor = color.hex;
        }
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

        this.props.onSelectImage(media);
    }

    onRemoveImage() {

        this.setState({ modalCanClose: true });
        this.props.onSelectImage('');
    }

    open(open) {
        event.preventDefault()
        this.setState({ modalCanClose: false });
        open()
    }

    onChangeImageOptions(tempKey, mainkey, value) {

        this.props.onChangeImageOptions(mainkey, value);
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

                <div className="kmt-control kmt-image-actions">
                    <MediaUpload
                        title={__("Select Background Image", 'astra')}
                        onSelect={(media) => this.onSelectImage(media)}
                        allowedTypes={["image"]}
                        value={(this.props.media && this.props.media ? this.props.media : '')}
                        render={({ open }) => (
                            <>
                                {!this.props.media &&

                                    < Button className="upload-button button-add-media" isDefault onClick={() => this.open(open)}>
                                    {__("Select Background Image", 'kemet')}
                                    </Button>
                                }
                                {(this.props.media && this.props.backgroundType === "image") &&
                                    <div className="actions">
                                        <Button type="button" className="button remove-image" onClick={this.onRemoveImage} >
                                        </Button>
                                        <Button type="button" className="button edit-image" onClick={() => this.open(open)}>
                                        </Button>
                                    </div>}

                            </>
                        )}
                    />
                </div>

                {(this.props.media && this.props.backgroundType === "image") &&
                    <>
                        <div className='kmt-control'>
                            <div className={`thumbnail thumbnail-image`}>
                                <FocalPointPicker
                                    url={(this.props.media.url) ? this.props.media.url : this.props.backgroundImage}
                                    dimensions={dimensions}
                                    value={(undefined !== this.props.backgroundPosition ? this.props.backgroundPosition : { x: 0.5, y: 0.5 })}
                                    onChange={(focalPoint) => this.onChangeImageOptions('backgroundPosition', 'background-position', focalPoint)}
                                />

                            </div>

                        </div>

                    </>
                }
                <div className='kmt-control'>
                    <header><label>{__('Background Repeat')}</label></header>
                    <section>
                        <ul className="kmt-radio-option kmt-buttons-group">
                            {Object.keys(repeat).map((item) => {
                                let classActive = '';
                                if (item === this.props.backgroundRepeat) {
                                    classActive = "active"
                                }
                                return (
                                    <li
                                        isTertiary
                                        className={`${classActive}`}
                                        onClick={() => this.onChangeImageOptions('backgroundRepeat', 'background-repeat', item)}
                                    >
                                        {repeat[item] &&
                                            repeat[item]
                                        }

                                    </li>
                                );
                            })}
                        </ul>
                    </section>
                </div>
                <div className='kmt-control'>
                    <header><label>{__('Background Size')}</label></header>
                    <section>
                        <ul className="kmt-radio-option kmt-buttons-group">
                            {["auto", "cover", "contain"].map((item) => {
                                let classActive = '';
                                if (item === this.props.backgroundSize) {
                                    classActive = "active"
                                }
                                return (
                                    <li
                                        isTertiary
                                        className={`${classActive}`}
                                        onClick={() => this.onChangeImageOptions('backgroundSize', 'background-size', item)}
                                    >
                                        {item}
                                    </li>
                                );
                            })}
                        </ul>
                    </section>
                </div>
                <div className='kmt-control'>
                    <header><label>{__('Background Attachment')}</label></header>
                    <section>
                        <ul className="kmt-radio-option kmt-buttons-group">
                            {["fixed", "scroll", "inherit"].map((item) => {
                                let classActive = '';
                                if (item === this.props.backgroundAttachment) {
                                    classActive = "active"
                                }
                                return (
                                    <li
                                        isTertiary
                                        className={`${classActive}`}
                                        onClick={() => this.onChangeImageOptions('backgroundAttachment', 'background-attachment', item)}
                                    >
                                        {item}
                                    </li>
                                );
                            })}
                        </ul>
                    </section>
                </div>



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