const { __ } = wp.i18n;
import { MediaUpload } from "@wordpress/media-utils";
import { Button } from "@wordpress/components";
const openSelect = (open) => {
    open();
};
const CustomIcon = ({ onChange, value }) => {
    return (
        <div className=" kmt-upload-icon-container">
            <MediaUpload
                title={__("Select Icon", "Kemet")}
                onSelect={(data) => {
                    onChange({
                        ...value,
                        ...data,
                    });
                }}
                allowedTypes={["image/svg+xml"]}
                value={value.icon ? value.icon : ""}
                render={({ open }) => (
                    <>
                        {!value.url && (
                            <Button
                                className="upload-button button-add-media"
                                isDefault
                                onClick={() => openSelect(open)}
                            >
                                {__("Select Background Image", "Kemet")}
                            </Button>
                        )}
                        {value.url && (
                            <div class="attachment-media-view ">
                                <div class="thumbnail thumbnail-image">
                                    <img
                                        class="thumbnail-attachment"
                                        src={value.url}
                                        draggable="false"
                                        alt=""
                                    />
                                    <div class="actions">
                                        <button
                                            type="button"
                                            class="button edit-button "
                                            title="Edit"
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
                    </>
                )}
            />
            <p className="kmt-option-description">
                {__(
                    "For performance and customization reasons, only SVG files are allowed.",
                    "Kemet"
                )}
            </p>
        </div>
    );
};

export default CustomIcon;
