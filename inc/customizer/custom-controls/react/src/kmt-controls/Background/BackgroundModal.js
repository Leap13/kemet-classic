import { Fragment, useState } from "@wordpress/element";
import classnames from "classnames";
import PickerModal from '../color-picker/picker-modal'
import {
    Button,
    FocalPointPicker,
    __experimentalGradientPicker,
} from "@wordpress/components";
import { MediaUpload } from "@wordpress/media-utils";
const { __ } = wp.i18n;

const BackgroundModal = (props) => {


    const renderImageSettings = () => {
        const dimensions = {
            width: 400,
            height: 100,
        };
        const repeat = {
            "no-repeat": (
                <svg viewBox="0 0 16 16">
                    <rect x="6" y="6" width="4" height="4" />
                </svg>
            ),
            "repeat-x": (
                <svg viewBox="0 0 16 16">
                    <rect y="6" width="4" height="4" />
                    <rect x="6" y="6" width="4" height="4" />
                    <rect x="12" y="6" width="4" height="4" />
                </svg>
            ),
            "repeat-y": (
                <svg viewBox="0 0 16 16">
                    <rect x="6" width="4" height="4" />
                    <rect x="6" y="6" width="4" height="4" />
                    <rect x="6" y="12" width="4" height="4" />
                </svg>
            ),
            repeat: (
                <svg viewBox="0 0 16 16">
                    <path d="M0,0h4v4H0V0z M6,0h4v4H6V0z M12,0h4v4h-4V0z M0,6h4v4H0V6z M6,6h4v4H6V6z M12,6h4v4h-4V6z M0,12h4v4H0V12z M6,12h4v4H6V12zM12,12h4v4h-4V12z" />
                </svg>
            ),
        };

        return (
            <>
                <div className='kmt-control kmt-image-actions'>
                    <MediaUpload
                        title={__("Select Background Image", 'Kemet')}
                        onSelect={(media) => onSelectImage(media)}
                        allowedTypes={["image"]}
                        value={(props.media && props.media ? props.media : '')}
                        render={({ open }) => (
                            <>
                                {!props.media &&
                                    <div className="kmt-control kmt-image-actions">
                                        < Button className="upload-button button-add-media" isDefault onClick={() => open(open)}>
                                            {__("Select Background Image", 'Kemet')}
                                        </Button>
                                    </div>
                                }
                                {(props.media && props.backgroundType === "image") &&
                                    <div className="actions">
                                        <Button type="button" className="button remove-image" onClick={onRemoveImage} >
                                        </Button>
                                        <Button type="button" className="button edit-image" onClick={() => open(open)}>
                                        </Button>
                                    </div>}
                            </>
                        )}
                    />
                    {(props.media && props.backgroundType === "image") &&
                        <>
                            <div className={`thumbnail thumbnail-image`}>
                                <FocalPointPicker
                                    url={(props.media.url) ? props.media.url : props.backgroundImage}
                                    dimensions={dimensions}
                                    value={(undefined !== props.backgroundPosition ? props.backgroundPosition : { x: 0.5, y: 0.5 })}
                                    onChange={(focalPoint) => onChangeImageOptions('backgroundPosition', 'background-position', focalPoint)}
                                />

                            </div>
                        </>
                    }
                </div>
                <div className="kmt-control">
                    <header>
                        <label>{__("Background Repeat")}</label>
                    </header>
                    <section>
                        <ul className="kmt-radio-option kmt-buttons-group">
                            {Object.keys(repeat).map((item) => {
                                let classActive = "";
                                if (item === props.backgroundRepeat) {
                                    classActive = "active";
                                }
                                return (
                                    <li
                                        isTertiary
                                        className={`${classActive}`}
                                        onClick={() =>
                                            onChangeImageOptions(
                                                "backgroundRepeat",
                                                "background-repeat",
                                                item
                                            )
                                        }
                                    >
                                        {repeat[item] && repeat[item]}
                                    </li>
                                );
                            })}
                        </ul>
                    </section>
                </div>
                <div className="kmt-control">
                    <header>
                        <label>{__("Background Size")}</label>
                    </header>
                    <section>
                        <ul className="kmt-radio-option kmt-buttons-group">
                            {["auto", "cover", "contain"].map((item) => {
                                let classActive = "";
                                if (item === props.backgroundSize) {
                                    classActive = "active";
                                }
                                return (
                                    <li
                                        isTertiary
                                        className={`${classActive}`}
                                        onClick={() =>
                                            onChangeImageOptions(
                                                "backgroundSize",
                                                "background-size",
                                                item
                                            )
                                        }
                                    >
                                        {item}
                                    </li>
                                );
                            })}
                        </ul>
                    </section>
                </div>

                <div className="kmt-control">
                    <header>
                        <label>{__("Background Attachment")}</label>
                    </header>
                    <section>
                        <ul className="kmt-radio-option kmt-buttons-group">
                            {["fixed", "scroll", "inherit"].map((item) => {
                                let classActive = "";
                                if (item === props.backgroundAttachment) {
                                    classActive = "active";
                                }
                                return (
                                    <li
                                        isTertiary
                                        className={`${classActive}`}
                                        onClick={() =>
                                            onChangeImageOptions(
                                                "backgroundAttachment",
                                                "background-attachment",
                                                item
                                            )
                                        }
                                    >
                                        {item}
                                    </li>
                                );
                            })}
                        </ul>
                    </section>
                </div>
            </>
        );
    };

    const [toggle, setToggle] = useState(false)

    const onSelectImage = (media) => {
        props.onSelectImage(media, "image");
    };
    const onSelect = (tabName) => {

        props.onSelect(tabName);
    };
    const onRemoveImage = () => {
        props.onSelectImage("");
    };

    const open = (open) => {
        event.preventDefault();
        open();
    };

    const onChangeImageOptions = (tempKey, mainkey, value) => {
        props.onChangeImageOptions(mainkey, value, "image");
    };


    return (
        <Fragment>
            <ul
                className="kmt-modal-tabs"
                onMouseUp={(e) => {
                    e.preventDefault();
                }}
            >
                {["color", "gradient", "image"].map((type) => (
                    <li
                        data-type={type}
                        key={type}
                        className={classnames({
                            active: type === props.backgroundType,
                        })}
                        onClick={() => props.onSelect(type)}
                    >
                        {
                            {
                                color: __("Color", "Kemet"),
                                gradient: __("Gradient", "Kemet"),
                                image: __("Image", "Kemet"),
                            }[type]
                        }
                    </li>
                ))}
            </ul>

            <div
                className={classnames({
                    "kmt-image-tab kmt-options-container":
                        props.backgroundType === "image",
                    "kmt-gradient-tab kmt-color-picker-modal":
                        props.backgroundType === "gradient",
                    "kmt-color-tab": props.backgroundType === "color",
                })}
            >
                {props.backgroundType === "image" && renderImageSettings()}

                {props.backgroundType === "gradient" && (
                    <>
                        <__experimentalGradientPicker
                            className="kmt-gradient-color-picker"
                            value={
                                props.gradient &&
                                    props.backgroundType === "gradient"
                                    ? props.gradient
                                    : ""
                            }
                            onChange={(gradient) =>
                                props.onChangeGradient(gradient, "gradient")
                            }
                        />

                    </>
                )}

                {props.backgroundType == "color" &&
                    (
                        <PickerModal
                            design=
                            {props.backgroundType === 'color'
                                ? 'none'
                                : 'inline'}
                            value={props.color}
                            pickers={[
                                {
                                    title: __('Initial', 'Kemet'),
                                    id: 'default',
                                },
                            ]}
                            inline_modal={props.backgroundType === 'color'}
                            skipArrow={true}
                            appendToBody={false}
                            onChange={(color) => props.onChangeComplete(color)}

                        />
                    )
                }
            </div>
        </Fragment >
    );
};

export default BackgroundModal;