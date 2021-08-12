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
        const allGradients = [
            'linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)',
            'linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%)',
            'linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%)',
            'linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%)',
            'linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%)',
            'linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%)',
            'linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%)',
            'linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%)',
            'linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%)',
            'linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%)',
            'linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%)',
            'linear-gradient(to right, #ffecd2 0%, #fcb69f 100%)',
            'linear-gradient(to right, #ff8177 0%, #ff867a 0%, #ff8c7f 21%, #f99185 52%, #cf556c 78%, #b12a5b 100%)',
            'linear-gradient(to right, #fa709a 0%, #fee140 100%)',
            'linear-gradient(to top, #30cfd0 0%, #330867 100%)',
            'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
            'linear-gradient(15deg, #13547a 0%, #80d0c7 100%)',
            'linear-gradient(to top, #ff0844 0%, #ffb199 100%)',
            'linear-gradient(to top, #3b41c5 0%, #a981bb 49%, #ffc8a9 100%)',
            'linear-gradient(to top, #cc208e 0%, #6713d2 100%)',
            'linear-gradient(to right, #0acffe 0%, #495aff 100%)',
            'linear-gradient(-225deg, #FF057C 0%, #8D0B93 50%, #321575 100%)',
            'linear-gradient(-225deg, #231557 0%, #44107A 29%, #FF1361 67%, #FFF800 100%)',
            'radial-gradient(circle 248px at center, #16d9e3 0%, #30c7ec 47%, #46aef7 100%)',
            'linear-gradient(180deg, #2af598 0%, #009efd 100%)',
            'linear-gradient(to right, #6a11cb 0%, #2575fc 100%)',
            'linear-gradient(to right, #f78ca0 0%, #f9748f 19%, #fd868c 60%, #fe9a8b 100%)',
            'linear-gradient(to top, #3f51b1 0%, #5a55ae 13%, #7b5fac 25%, #8f6aae 38%, #a86aa4 50%, #cc6b8e 62%, #f18271 75%, #f3a469 87%, #f7c978 100%)',
            'linear-gradient(to top, #7028e4 0%, #e5b2ca 100%)',
            'linear-gradient(to top, #0c3483 0%, #a2b6df 100%, #6b8cce 100%, #a2b6df 100%)',
            'linear-gradient(to right, #868f96 0%, #596164 100%)',
            'linear-gradient(to top, #c79081 0%, #dfa579 100%)',
            'linear-gradient(to top, #09203f 0%, #537895 100%)', 'linear-gradient(-60deg, #ff5858 0%, #f09819 100%)',
            'linear-gradient(to top, #0ba360 0%, #3cba92 100%)',
            'linear-gradient(-225deg, #B7F8DB 0%, #50A7C2 100%)',
            'linear-gradient(-225deg, #AC32E4 0%, #7918F2 48%, #4801FF 100%)',
            'linear-gradient(-225deg, #473B7B 0%, #3584A7 51%, #30D2BE 100%)',
            'linear-gradient(-225deg, #FFE29F 0%, #FFA99F 48%, #FF719A 100%)',
            'linear-gradient(to top, #e14fad 0%, #f9d423 100%)',
            'linear-gradient(to right, #d7d2cc 0%, #304352 100%)',
            'linear-gradient(-20deg, #616161 0%, #9bc5c3 100%)',
            'linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%)',
            'linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%)',
            'linear-gradient(to top, #c1dfc4 0%, #deecdd 100%)',
            'linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%)',
            'linear-gradient(135deg, #fdfcfb 0%, #e2d1c3 100%)',
            'linear-gradient(-20deg, #e9defa 0%, #fbfcdb 100%)',
            'linear-gradient(60deg, #abecd6 0%, #fbed96 100%)',
            'linear-gradient(to top, #d5d4d0 0%, #d5d4d0 1%, #eeeeec 31%, #efeeec 75%, #e9e9e7 100%)',
            'linear-gradient(45deg, #93a5cf 0%, #e4efe9 100%)',
            'linear-gradient(to top, #d299c2 0%, #fef9d7 100%)',
            'linear-gradient(to top, #e6e9f0 0%, #eef1f5 100%)',
            'linear-gradient(to top, #dad4ec 0%, #dad4ec 1%, #f3e7e9 100%)',
            'linear-gradient(to top, #dfe9f3 0%, white 100%)',
            'linear-gradient(-225deg, #E3FDF5 0%, #FFE6FA 100%)',
        ]
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
                                                                        <ul className={'kmt-gradient-swatches'}>
                                                                            {allGradients.map((gradient, slug) => (
                                                                                <li
                                                                                    onClick={() => this.onChangeGradientComplete(gradient)}
                                                                                    style={{
                                                                                        '--background-image': gradient,
                                                                                    }}
                                                                                    key={slug}></li>
                                                                            ))}
                                                                        </ul>
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


                <MediaUpload
                    title={__("Select Background Image", 'astra')}
                    onSelect={(media) => this.onSelectImage(media)}
                    allowedTypes={["image"]}
                    value={(this.props.media && this.props.media ? this.props.media : '')}
                    render={({ open }) => (
                        <>
                            {!this.props.media &&
                                <div className="kmt-control kmt-image-actions">
                                    < Button className="upload-button button-add-media" isDefault onClick={() => this.open(open)}>
                                        {__("Select Background Image", 'Kemet')}
                                    </Button>
                                </div>
                            }
                            {(this.props.media && this.props.backgroundType === "image") &&
                                <div className=" kmt-image-actions">
                                    <div className="actions">
                                        <Button type="button" className="button remove-image" onClick={this.onRemoveImage} >
                                        </Button>
                                        <Button type="button" className="button edit-image" onClick={() => this.open(open)}>
                                        </Button>
                                    </div>
                                </div>}

                        </>
                    )}
                />

                {
                    (this.props.media && this.props.backgroundType === "image") &&
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