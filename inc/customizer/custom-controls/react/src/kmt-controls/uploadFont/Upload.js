import {
    createElement,
    Component,
    useEffect,
    useState,
    Fragment,
} from "@wordpress/element";

import classnames from "classnames";
const { __, sprintf } = wp.i18n;
import Overlay from "./Overlay";
import { getAllVariations, humanizeVariations } from './helpers'


const preloadAttachment = (ID, callback) => {
    if (wp.media.attachment(ID).get("url")) {
        wp.media
            .attachment(ID)
            .fetch()
            .then(() => callback(wp.media.attachment(ID)));

        return;
    }

    callback(wp.media.attachment(ID));
};

const getDefaultVariation = (prefill) => ({
    variation: "n4",
    attachment_id: null,
    url: "",
    filename: "",

    ...prefill,
});

export const getDefaultFutureFont = (fontType = "regular") => ({
    name: "",
    // regular | variable
    fontType,
    variations: [
        getDefaultVariation({ variation: "n4" }),
        ...(fontType === "variable"
            ? [getDefaultVariation({ variation: "i4" })]
            : []),
    ],
});

const AddVariation = ({ futureFont, setFutureFont }) => {
    const itemsThatAreNotAdded = Object.keys(getAllVariations())
        .filter(
            (variation) =>
                !futureFont.variations.find((v) => v.variation === variation)
        )
        .reduce(
            (all, currentVariation) => ({
                ...all,
                [currentVariation]: humanizeVariations(currentVariation),
            }),
            {}
        );

    if (itemsThatAreNotAdded.length === 0) {
        return null;
    }

    return (
        <button
            className="button"
            onClick={() => {
                setFutureFont({
                    ...futureFont,
                    variations: [
                        ...futureFont.variations,
                        getDefaultVariation({
                            variation: "",
                        }),
                    ],
                });
            }}
        >
            {__("Add Variation", "kemet")}
        </button>
    );
};

const SingleVariation = ({ futureFont, variation, onChange, onRemove }) => {
    const itemsThatAreNotAdded = {
        ...Object.keys(getAllVariations())
            .filter(
                (singleVariation) =>
                    variation.variation === singleVariation ||
                    !futureFont.variations.find(
                        (v) => v.variation === singleVariation
                    )
            )
            .reduce(
                (all, currentVariation) => ({
                    ...all,
                    [currentVariation]: humanizeVariations(currentVariation),
                }),
                {}
            ),
    };

    return (
        <li>
            <button
                className="button button-primary"
                onClick={() => {
                    let frame = wp.media({
                        button: {
                            text: "Select",
                        },
                        states: [
                            new wp.media.controller.Library({
                                title: "Select font",
                                multiple: false,
                                date: false,
                                priority: 20,
                            }),
                        ],
                    });

                    if (variation.attachment_id) {
                        frame.on("open", () => {
                            frame.reset();

                            preloadAttachment(variation.attachment_id, () => {
                                frame
                                    .state()
                                    .get("selection")
                                    .add(
                                        wp.media.attachment(
                                            variation.attachment_id
                                        )
                                    );
                            });
                        });
                    }

                    frame.setState("library").open();

                    frame.on("select", () => {
                        var attachment = frame
                            .state()
                            .get("selection")
                            .first()
                            .toJSON();

                        onChange({
                            ...variation,
                            attachment_id: attachment.id,
                            url: wp.media.attachment(attachment.id).get("url"),
                            filename: attachment.filename,
                        });
                    });
                }}
            >
                {variation.attachment_id
                    ? __("Change", "kemet")
                    : __("Choose", "kemet")}
            </button>

            {variation.attachment_id && (
                <span className="kmt-font-preview">{variation.filename}</span>
            )}

            {futureFont.fontType === "variable" &&
                variation.variation === "n4" && (
                    <span className="kmt-variation-name">
                        {__("Regular", "kemet")}
                    </span>
                )}

            {futureFont.fontType === "variable" &&
                variation.variation === "i4" && (
                    <span className="kmt-variation-name">
                        {__("Italic", "kemet")}
                    </span>
                )}

            {futureFont.fontType === "regular" &&
                futureFont.variations.length > 1 && (
                    <button className="kmt-remove" onClick={() => onRemove()}>
                        ×
                    </button>
                )}
        </li>
    );
};

const Uploader = ({
    customFontsSettings,
    onChange,
    futureFont,
    moveToAllFonts,
    setFutureFont,
    editedIndex,
}) => {
    const { name, variations } = futureFont;

    const isDisabled =
        !name ||
        variations.length === 0 ||
        (futureFont.fontType === "regular" &&
            variations.length > 0 &&
            variations.some(
                ({ attachment_id, variation }) => !attachment_id || !variation
            )) ||
        (futureFont.fontType === "variable" &&
            variations.length > 0 &&
            variations.find(
                ({ attachment_id, variation }) =>
                    (!attachment_id || !variation) && variation === "n4"
            ));

    return (
        <div className="kmt-modal-content kmt-upload-fonts">
            {futureFont.fontType === "regular" && (
                <Fragment>
                    <h2>{__("Upload Simple Font", "kemet")}</h2>
                    <p
                        dangerouslySetInnerHTML={{
                            __html: sprintf(
                                __(
                                    "Upload only the %s.woff2%s or %s.ttf%s font file formats (see browser coverage %shere%s). Use %sthis converter tool%s if you don't have these font formats.",
                                    "kemet"
                                ),
                                "<code>",
                                "</code>",
                                "<code>",
                                "</code>",
                                '<a href="https://caniuse.com/#search=woff2" target="_blank">',
                                "</a>",
                                '<a href="https://transfonter.org/" target="_blank">',
                                "</a>"
                            ),
                        }}
                    />
                </Fragment>
            )}

            {futureFont.fontType === "variable" && (
                <Fragment>
                    <h2>{__("Upload Variable Font", "kemet")}</h2>
                    <p
                        dangerouslySetInnerHTML={{
                            __html: sprintf(
                                __(
                                    "Upload only the %s.woff2%s or %s.ttf%s font file formats. Please don't convert non-woff variable fonts by yourself. Instead, just ask the font provider to hand a correct file otherwise the %svariable%s font will loose its capabilities.",
                                    "kemet"
                                ),
                                "<code>",
                                "</code>",
                                "<code>",
                                "</code>",
                                '<a href="https://web.dev/variable-fonts/" target="_blank">',
                                "</a>"
                            ),
                        }}
                    />
                </Fragment>
            )}

            <div className="kmt-font-name">
                <div className="kmt-option-input">
                    <input
                        onChange={({ target: { value: name } }) => {
                            setFutureFont({
                                ...futureFont,
                                name,
                            });
                        }}
                        type="text"
                        placeholder={__("Font Name", "kemet")}
                        value={name}
                        style={{ width: "100%" }}
                    />
                </div>
            </div>

            <div className="kmt-modal-scroll">
                <ul>
                    {variations.map((variation, index) => (
                        <SingleVariation
                            futureFont={futureFont}
                            key={index}
                            variation={variation}
                            onChange={(newVariation) =>
                                setFutureFont({
                                    ...futureFont,
                                    variations: variations.map(
                                        (v, nestedIndex) =>
                                            nestedIndex === index
                                                ? newVariation
                                                : v
                                    ),
                                })
                            }
                            onRemove={() =>
                                setFutureFont({
                                    ...futureFont,
                                    variations: variations
                                        .slice(0, index)
                                        .concat(
                                            variations.slice(
                                                index + 1,
                                                variations.length
                                            )
                                        ),
                                })
                            }
                        />
                    ))}

                    {futureFont.fontType === "regular" && (
                        <li className="kmt-add-variation">
                            <span className="kmt-notification">
                                {__(
                                    "Add/upload another font variation",
                                    "kemet"
                                )}
                            </span>
                            <AddVariation
                                futureFont={futureFont}
                                setFutureFont={setFutureFont}
                            />
                        </li>
                    )}
                </ul>
            </div>

            <div className="kmt-modal-actions has-divider" data-buttons="2">
                <button
                    className="button"
                    onClick={() => {
                        moveToAllFonts();
                        setFutureFont(getDefaultFutureFont());
                    }}
                >
                    &#8592; {__("Back to All Fonts", "kemet")}
                </button>
                <button
                    className="button button-primary"
                    disabled={isDisabled}
                    onClick={() => {
                        onChange({
                            ...customFontsSettings,
                            fonts:
                                editedIndex || editedIndex === 0
                                    ? customFontsSettings.fonts.map(
                                        (f, index) =>
                                            index === editedIndex
                                                ? futureFont
                                                : f
                                    )
                                    : [
                                        ...customFontsSettings.fonts,
                                        futureFont,
                                    ],
                        });

                        setFutureFont(getDefaultFutureFont());
                        moveToAllFonts();
                    }}
                >
                    {__("Save Custom Font", "kemet")}
                </button>
            </div>
        </div>
    );
};

export default Uploader;
