import { Fragment, useState } from "@wordpress/element";
import classnames from "classnames";
import {
    Button,
    FocalPointPicker,
    __experimentalGradientPicker,
    ColorPicker,
} from "@wordpress/components";
import { MediaUpload } from "@wordpress/media-utils";
const { __ } = wp.i18n;

const BackgroundModal = (props) => {
    const defaultColorPalette = [
        "#000000",
        "#ffffff",
        "#dd3333",
        "#dd9933",
        "#eeee22",
        "#81d742",
        "#1e73be",
        "#e2e7ed",
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
                                active: props.props.color === color,
                            })}
                            onClick={() => onChangeComplete(color)}
                        >
                            <div className="kmt-tooltip-top">{`Color ${
                                index + 1
                            }`}</div>
                        </li>
                    ))}
                </ul>
            </div>
        );
    };
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
                <div className="kmt-control kmt-image-actions">
                    <MediaUpload
                        title={__("Select Background Image", "astra")}
                        onSelect={(media) => onSelectImage(media)}
                        allowedTypes={["image"]}
                        value={
                            props.props.media && props.props.media
                                ? props.props.media
                                : ""
                        }
                        render={({ open }) => (
                            <>
                                {!props.props.media && (
                                    <Button
                                        className="upload-button button-add-media"
                                        isDefault
                                        onClick={() => open(open)}
                                    >
                                        {__("Select Background Image", "Kemet")}
                                    </Button>
                                )}
                                {props.props.media &&
                                    props.props.backgroundType === "image" && (
                                        <div className="actions">
                                            <Button
                                                type="button"
                                                className="button remove-image"
                                                onClick={onRemoveImage}
                                            ></Button>
                                            <Button
                                                type="button"
                                                className="button edit-image"
                                                onClick={() => open(open)}
                                            ></Button>
                                        </div>
                                    )}
                            </>
                        )}
                    />
                </div>

                {props.props.media && props.props.backgroundType === "image" && (
                    <>
                        <div className="kmt-control">
                            <div className={`thumbnail thumbnail-image`}>
                                <FocalPointPicker
                                    url={
                                        props.props.media.url
                                            ? props.props.media.url
                                            : props.props.backgroundImage
                                    }
                                    dimensions={dimensions}
                                    value={
                                        undefined !==
                                        props.props.backgroundPosition
                                            ? props.props.backgroundPosition
                                            : { x: 0.5, y: 0.5 }
                                    }
                                    onChange={(focalPoint) =>
                                        onChangeImageOptions(
                                            "backgroundPosition",
                                            "background-position",
                                            focalPoint
                                        )
                                    }
                                />
                            </div>
                        </div>
                    </>
                )}
                <div className="kmt-control">
                    <header>
                        <label>{__("Background Repeat")}</label>
                    </header>
                    <section>
                        <ul className="kmt-radio-option kmt-buttons-group">
                            {Object.keys(repeat).map((item) => {
                                let classActive = "";
                                if (item === props.props.backgroundRepeat) {
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
                                if (item === props.props.backgroundSize) {
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
                                if (item === props.props.backgroundAttachment) {
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

    const [toggle, setToggle] = useState(false);

    const onSelectImage = (media) => {
        props.props.onSelectImage(media, "image");
    };
    const onSelect = (tabName) => {
        props.props.onSelect(tabName);
    };
    const onRemoveImage = () => {
        props.props.onSelectImage("");
    };

    const open = (open) => {
        event.preventDefault();
        open();
    };

    const onChangeImageOptions = (tempKey, mainkey, value) => {
        props.props.onChangeImageOptions(mainkey, value, "image");
    };

    const onChangeComplete = (newValue) => {
        if (toggle) {
            setToggle(false);
        } else {
            setToggle(true);
        }
        props.props.onChangeComplete(newValue);
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
                            active: type === props.props.backgroundType,
                        })}
                        onClick={() => props.props.onSelect(type)}
                    >
                        {
                            {
                                color: __("Color", "blocksy"),
                                gradient: __("Gradient", "blocksy"),
                                image: __("Image", "blocksy"),
                            }[type]
                        }
                    </li>
                ))}
            </ul>

            <div
                className={classnames({
                    "kmt-image-tab kmt-options-container":
                        props.props.backgroundType === "image",
                    "kmt-gradient-tab kmt-color-picker-modal":
                        props.props.backgroundType === "gradient",
                    "kmt-color-tab": props.props.backgroundType === "color",
                })}
            >
                {props.props.backgroundType === "image" &&
                    renderImageSettings()}

                {props.props.backgroundType === "gradient" && (
                    <>
                        <__experimentalGradientPicker
                            className="kmt-gradient-color-picker"
                            value={
                                props.props.gradient &&
                                props.props.backgroundType === "gradient"
                                    ? props.props.gradient
                                    : ""
                            }
                            onChange={(gradient) =>
                                props.props.onChangeGradient(
                                    gradient,
                                    "gradient"
                                )
                            }
                        />
                    </>
                )}

                {props.props.backgroundType == "color" && toggle && (
                    <>
                        {RenderTopSection()}
                        <ColorPicker
                            color={props.props.color}
                            onChangeComplete={(color) =>
                                props.props.onChangeComplete(color)
                            }
                        />
                    </>
                )}
                {props.props.backgroundType == "color" && !toggle && (
                    <>
                        {RenderTopSection()}
                        <ColorPicker
                            color={props.props.color}
                            onChangeComplete={(color) =>
                                props.props.onChangeComplete(color)
                            }
                        />
                    </>
                )}
            </div>
        </Fragment>
    );
};

export default BackgroundModal;
