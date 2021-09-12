import { Fragment } from "@wordpress/element";
const { __ } = wp.i18n;
import { humanizeVariations } from "../typography/helpers";

const AllFonts = ({
    customFontsSettings,
    onChange,
    moveToUploader,
    editFont,
}) => {
    return (
        <div className="kmt-modal-content kmt-all-fonts">
            <h2>{__("Custom Fonts Settings", "kemet")}</h2>
            <p>
                {__(
                    "Here you can see all your custom fonts that could be used in all typography options across the theme.",
                    "kemet"
                )}
            </p>

            {customFontsSettings.fonts.length > 0 && (
                <div className="kmt-modal-scroll">
                    <ul>
                        {customFontsSettings.fonts.map((font, index) => (
                            <li key={index}>
                                <span>
                                    {font.name}
                                    {font.__custom
                                        ? ` (${__("Dynamic Font", "kemet")})`
                                        : ""}
                                    {font.fontType === "variable" ? (
                                        <i>
                                            {__("Variable font", "kemet")}
                                            :&nbsp;
                                            {font.variations
                                                .filter(({ url }) => !!url)
                                                .map(({ variation }) =>
                                                    humanizeVariations(
                                                        variation,
                                                        true
                                                    )
                                                )
                                                .join(", ")}
                                        </i>
                                    ) : (
                                        <i>
                                            {__("Variations", "kemet")}:&nbsp;
                                            {font.variations
                                                .map(({ variation }) =>
                                                    humanizeVariations(
                                                        variation
                                                    )
                                                )
                                                .join(", ")}
                                        </i>
                                    )}
                                </span>

                                {!font.__custom && (
                                    <Fragment>
                                        <button
                                            className="kmt-edit-font"
                                            onClick={() => editFont(index)}
                                        >
                                            <span className="kmt-tooltip-top">
                                                {__("Edit Font", "kemet")}
                                            </span>
                                        </button>

                                        <button
                                            className="kmt-remove-font"
                                            data-hover="red"
                                            onClick={() => {
                                                onChange({
                                                    ...customFontsSettings,
                                                    fonts: customFontsSettings.fonts.filter(
                                                        ({ name }) =>
                                                            name !== font.name
                                                    ),
                                                });
                                            }}
                                        >
                                            <span className="kmt-tooltip-top">
                                                {__("Remove Font", "kemet")}
                                            </span>
                                        </button>
                                    </Fragment>
                                )}
                            </li>
                        ))}
                    </ul>
                </div>
            )}

            {customFontsSettings.fonts.length === 0 && (
                <div className="kmt-notification">
                    {__(
                        "There are no custom fonts at the moment, hit the button below and upload some.",
                        "kemet"
                    )}
                </div>
            )}
            <div className="kmt-modal-actions has-divider" data-buttons="2">
                <button
                    className="button button-primary"
                    onClick={() => {
                        moveToUploader("regular");
                    }}
                >
                    {__("Upload Simple Font", "kemet")}
                </button>
                <button
                    className="button button-primary"
                    onClick={() => {
                        moveToUploader("variable");
                    }}
                >
                    {__("Upload Variable Font", "kemet")}
                </button>
            </div>
        </div>
    );
};

export default AllFonts;
