const { __ } = wp.i18n;
import { MediaUpload } from "@wordpress/media-utils";
import { Button } from "@wordpress/components";
import { Fragment } from "react";
const openSelect = (open) => {
    open();
};
const CustomIcon = ({ onChange, value }) => {
    return (
        <div className=" kmt-upload-icon-container">
            <MediaUpload
                title={__("Select Icon", "kemet")}
                allowedTypes={["image/svg+xml"]}
                value={value}
                onSelect={(data) => {
                    onChange({
                        ...value,
                        ...data,
                    })
                }}
                render={({ open }) => (
                    <Fragment>
                        {!value.url && (
                            <Button
                                className="upload-button button-add-media"
                                onClick={() => openSelect(open)}
                                isSecondary
                            >
                                {__("Upload Icon", "kemet")}
                            </Button>
                        )}
                        {value.url && (
                            <div class="attachment-media-view kmt-attachment ">
                                <div class="thumbnail thumbnail-image">
                                    <img
                                        class="thumbnail-attachment"
                                        src={value.url}
                                        draggable="false"
                                        alt=""
                                    />
                                    <div class="actions">
                                        <button
                                            title="Edit"
                                            type="button"
                                            class="button edit-button "
                                            onClick={() => openSelect(open)}
                                        ></button>
                                        <button
                                            title="Remove"
                                            type="button"
                                            class="button remove-button"
                                            onClick={() =>
                                                onChange({
                                                    ...value,
                                                    url: "",
                                                })
                                            }
                                        ></button>
                                    </div>
                                </div>
                            </div>
                        )}
                    </Fragment>
                )}
            />
            <p className="kmt-option-description">
                {__(
                    "For performance and customization reasons, only SVG files are allowed.",
                    "kemet"
                )}
            </p>
        </div>
    );
};

export default CustomIcon;
