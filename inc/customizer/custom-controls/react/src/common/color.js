import PropTypes from 'prop-types';
import { __ } from '@wordpress/i18n';
import { Component } from '@wordpress/element';
import { Dashicon, Button, ColorIndicator, TabPanel, __experimentalGradientPicker, ColorPicker, SelectControl, ColorPalette } from '@wordpress/components';
import KemetColorPicker from './colorPicker';
import GradientPicker from '../common/gradientPicker';
import BackgroundImage from './BackgroundImage';

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

        this.state = {
            isVisible: false,
            refresh: false,
            color: this.props.color,
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
            modalCanClose,
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

        const toggleClose = () => {
            if (modalCanClose) {
                if (isVisible === true) {
                    this.setState({ isVisible: false });
                }
            }
        };

        const showingGradient = (allowGradient && supportGradient ? true : false);

        let tabs = [
            {
                name: 'color',
                title: __('Color', 'kemet'),
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
                    <Button className={isVisible ? 'kemet-color-icon-indicate open' : 'kemet-color-icon-indicate'} onClick={() => { isVisible ? toggleClose() : toggleVisible() }}>
                        {('color' === backgroundType || 'gradient' === backgroundType) &&
                            <ColorIndicator className="kemet-advanced-color-indicate" colorValue={this.props.color} />
                        }
                        {'image' === backgroundType &&
                            <>
                                <ColorIndicator className="kemet-advanced-color-indicate" colorValue='#ffffff' />
                                <Dashicon icon="format-image" />
                            </>
                        }
                    </Button>
                </div>
                <div className="kemet-color-picker-wrap">
                    <>
                        {isVisible && (
                            <div className="kemet-popover-color" onClose={toggleClose}>
                                { 1 < tabs.length &&
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
                                                                <GradientPicker
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
                                                                        <KemetColorPicker
                                                                            color={(this.state.isPalette && this.state.palette.palette && this.state.palette.palette[parseInt(this.state.color.slice(-1), 10) - 1] ? this.state.palette.palette[parseInt(this.state.color.slice(-1), 10) - 1].color : this.state.color)}
                                                                            onChange={(color) => this.onChangeState(color, '')}
                                                                            onChangeComplete={(color) => this.onChangeComplete(color, '')}
                                                                        />
                                                                    </>
                                                                )}
                                                                {!refresh && (
                                                                    <>
                                                                        <KemetColorPicker
                                                                            color={(this.state.isPalette && this.state.palette.palette && this.state.palette.palette[parseInt(this.state.color.slice(-1), 10) - 1] ? this.state.palette.palette[parseInt(this.state.color.slice(-1), 10) - 1].color : this.state.color)}
                                                                            onChange={(color) => this.onChangeState(color, '')}
                                                                            onChangeComplete={(color) => this.onChangeComplete(color, '')}
                                                                        />
                                                                    </>
                                                                )}
                                                                <ColorPalette
                                                                    colors={finalpaletteColors}
                                                                    value={this.props.color}
                                                                    clearable={false}
                                                                    disableCustomColors={true}
                                                                    className="kmt-color-palette"
                                                                    onChange={(color) => this.onPaletteChangeComplete(color)}
                                                                />
                                                            </>
                                                        );
                                                    }
                                                }
                                                return <div>{tabout}</div>;
                                            }
                                        }
                                    </TabPanel>
                                }
                                { 1 === tabs.length &&

                                    <>
                                        {refresh && (
                                            <>
                                                <KemetColorPicker
                                                    color={(this.state.isPalette && this.state.palette.palette && this.state.palette.palette[parseInt(this.state.color.slice(-1), 10) - 1] ? this.state.palette.palette[parseInt(this.state.color.slice(-1), 10) - 1].color : this.state.color)}
                                                    onChange={(color) => this.onChangeState(color, '')}
                                                    onChangeComplete={(color) => this.onChangeComplete(color, '')}
                                                />
                                            </>
                                        )}
                                        {!refresh && (
                                            <>
                                                <KemetColorPicker
                                                    color={(this.state.isPalette && this.state.palette.palette && this.state.palette.palette[parseInt(this.state.color.slice(-1), 10) - 1] ? this.state.palette.palette[parseInt(this.state.color.slice(-1), 10) - 1].color : this.state.color)}
                                                    onChange={(color) => this.onChangeState(color, '')}
                                                    onChangeComplete={(color) => this.onChangeComplete(color, '')}
                                                />

                                            </>
                                        )}
                                        <ColorPalette
                                            colors={finalpaletteColors}
                                            value={this.props.color}
                                            clearable={false}
                                            disableCustomColors={true}
                                            className="kmt-color-palette"
                                            onChange={(color) => this.onPaletteChangeComplete(color)}
                                        />
                                    </>
                                }
                            </div>
                        )}
                    </>
                </div>
            </>
        );
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
        this.props.onChangeComplete(color, 'color');
    }

    onPaletteChangeComplete(color) {
        this.setState({ color: color });
        if (this.state.refresh === true) {
            this.setState({ refresh: false });
        } else {
            this.setState({ refresh: true });
        }
        this.props.onChangeComplete(color, 'color');
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

    renderImageSettings() {

        return (
            <>
                {(this.props.media || this.props.backgroundImage) &&
                    <img src={(this.props.media.url) ? this.props.media.url : this.props.backgroundImage} />
                }
                <BackgroundImage
                    open={this.open}
                    onChange
                    media={this.props.media}
                    backgroundAttachment={this.props.backgroundAttachment}
                    backgroundRepeat={this.props.backgroundRepeat}
                    backgroundSize={this.props.backgroundSize}
                    backgroundImage={this.props.backgroundImage}
                    onChangeImageOption={() => this.onChangeImageOptions}
                    onSelectImage={this.onSelectImage}
                    onRemoveImage={this.onRemoveImage}
                />
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
};

export default KemetColorPickerControl;