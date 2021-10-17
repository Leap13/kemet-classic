import { Fragment, useState } from "@wordpress/element";
import classnames from "classnames";
import PickerModal from '../color-picker/picker-modal'
import {
    SlotFillProvider,
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
                        title={__("Select Background Image", 'kemet')}
                        onSelect={(media) => props.onSelectImg(media)}
                        allowedTypes={["image"]}
                        value={(props.media && props.media ? props.media : '')}
                        render={({ open }) => (
                            <>
                                {!props.media &&
                                    <div className="kmt-control kmt-image-actions">
                                        < Button className="upload-button button-add-media" isDefault onClick={() => open(open)}>
                                            {__("Select Background Image", 'kemet')}
                                        </Button>
                                    </div>
                                }
                                {(props.media && props.backgroundType === "image") &&
                                    <div className="actions">
                                        <Button type="button" className="button remove-image" onClick={(e) => {
                                            e.preventDefault();
                                            props.onSelectImg("")
                                        }} >
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
                                    onChange={(focalPoint) => props.onChangeImageOptions('background-position', focalPoint, "image")}
                                />

                            </div>
                        </>
                    }
                </div>
                <div className="kmt-control">
                    <header>
                        <label>{__("Background Repeat", "kemet")}</label>
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
                                            props.onChangeImageOptions(
                                                "background-repeat",
                                                item,
                                                "image"
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
                        <label>{__("Background Size", "kemet")}</label>
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
                                            props.onChangeImageOptions(
                                                "background-size",
                                                item, "image"
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
                        <label>{__("Background Attachment", "kemet")}</label>
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
                                            props.onChangeImageOptions(
                                                "background-attachment",
                                                item,
                                                "image"
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
    const allGradients = [
        'linear-gradient(to right, #8e2de2, #4a00e0)',
        'linear-gradient(to right, #654ea3, #eaafc8)',
        'linear-gradient(to right, #ff416c, #ff4b2b)',
        'linear-gradient(to right, #009fff, #ec2f4b)',
        'linear-gradient(to right, #544a7d, #ffd452)',
        'linear-gradient(to right, #8360c3, #2ebf91)',
        'linear-gradient(to right, #f12711, #f5af19)',
        'linear-gradient(to right, #c31432, #240b36)',
        'linear-gradient(to right, #7f7fd5, #86a8e7, #91eae4)',
        'linear-gradient(to right, #f953c6, #b91d73)',
        'linear-gradient(to right, #1f4037, #99f2c8)',
        'linear-gradient(to right, #373b44, #4286f4)',
        'linear-gradient(to right, #2980b9, #6dd5fa, #ffffff)',
        'linear-gradient(to right, #12c2e9, #c471ed, #f64f59)',
        'linear-gradient(to right, #0f2027, #203a43, #2c5364)',
        'linear-gradient(to right, #c6ffdd, #fbd786, #f7797d)',
        'linear-gradient(to right, #2193b0, #6dd5ed)',
        'linear-gradient(to right, #ee9ca7, #ffdde1)',
        'linear-gradient(to right, #bdc3c7, #2c3e50)',
        'linear-gradient(to right, #ffe000, #799f0c)',
        'linear-gradient(to right, #00416a, #799f0c, #ffe000)',
        'linear-gradient(to right, #0052d4, #4364f7, #6fb1fc)',
        'linear-gradient(to right, #5433ff, #20bdff, #a5fecb)',
        'linear-gradient(to right, #ffe259, #ffa751)',
        'linear-gradient(to right, #acb6e5, #86fde8)',
        'linear-gradient(to right, #536976, #292e49)',
        'linear-gradient(to right, #b79891, #94716b)',
        'linear-gradient(to right, #9796f0, #fbc7d4)',
        'linear-gradient(to right, #e52d27, #b31217)',
        'linear-gradient(to right, #ec008c, #fc6767)',
    ]
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
                    <SlotFillProvider>
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
                        <ul className={'kmt-gradient-swatches'}>
                            {allGradients.map((gradient, slug) => (
                                <li
                                    onClick={() => props.onChangeGradient(gradient, "gradient")}
                                    style={{
                                        '--background-image': gradient,
                                    }}
                                    key={slug}></li>
                            ))}
                        </ul>


                    </SlotFillProvider>
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
                                    title: __('Initial', 'kemet'),
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