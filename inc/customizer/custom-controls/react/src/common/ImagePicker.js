
import classnames from 'classnames'
import { __ } from '@wordpress/i18n';
import { MediaUpload } from 'wp-media-utils';
import OptionContainer from './optioncontainer'
import { Button, SelectControl } from '@wordpress/components';


const ImagePicker = ({ media, onSelectImage, onRemoveImage, backgroundAttachment, backgroundPosition, backgroundImage, backgroundRepeat, backgroundSize, onChangeImageOption, open }) => {
    const onChangeImageOptions = (tempKey, mainkey, value) => {
        onChangeImageOption(mainkey, value, 'image');
    }
    return (
        <>
            {(media.url || backgroundImage) &&

                <img src={(media.url) ? media.url : backgroundImage} />
            }
            <div className={`kmt-background-btns-wrap`}>


                <MediaUpload
                    title={__("Select Background Image", 'kemet')}
                    onSelect={(media) => onSelectImage(media)}
                    allowedTypes={["image"]}
                    value={(media && media ? media : 'salma')}
                    render={({ open }) => (
                        <Button className="upload-button button-add-media" isDefault onClick={open}>
                            {(!media && !backgroundImage) ? __("Select Background Image", 'kemet') : __("Replace image", 'kemet')}
                        </Button>
                    )}
                />
                {(media || backgroundImage) &&

                    <Button className="kmt-bg-img-remove" onClick={onRemoveImage} isLink isDestructive>
                        {__("Remove Image", 'kemet')}
                    </Button>

                }
            </div>
            <OptionContainer
                label={__("Background Repeat", 'kemet')}
                value={backgroundRepeat}

                options={{
                    'no-repeat':
                        <svg viewBox="0 0 16 16"><rect x="6" y="6" width="4" height="4" /></svg>,
                    'repeat-x':
                        <svg viewBox="0 0 16 16"><rect y="6" width="4" height="4" /><rect x="6" y="6" width="4" height="4" /><rect x="12" y="6" width="4" height="4" /></svg>,
                    'repeat-y':
                        <svg viewBox="0 0 16 16"><rect x="6" width="4" height="4" /><rect x="6" y="6" width="4" height="4" /><rect x="6" y="12" width="4" height="4" /></svg>,

                    repeat:
                        <svg viewBox="0 0 16 16"><path d="M0,0h4v4H0V0z M6,0h4v4H6V0z M12,0h4v4h-4V0z M0,6h4v4H0V6z M6,6h4v4H6V6z M12,6h4v4h-4V6z M0,12h4v4H0V12z M6,12h4v4H6V12zM12,12h4v4h-4V12z" /></svg>,
                }}
                onChange={(value) => onChangeImageOptions('backgroundRepeat', 'background-repeat', value)}
            />
            <OptionContainer
                label={__("Background Size", 'kemet')}
                value={backgroundSize}
                options={{
                    auto: __('Auto', 'kemet'),
                    cover: __('Cover', 'kemet'),
                    contain: __('Contain', 'kemet'),
                }}

                onChange={(value) => onChangeImageOptions('backgroundSize', 'background-size', value)}
            />
            <OptionContainer
                label={__("Background Attachment", 'kemet')}
                value={backgroundAttachment}

                options={{
                    fixed: "fixed",
                    scroll: "scroll"
                }}
                onChange={(value) => onChangeImageOptions('backgroundAttachment', 'background-attachment', value)}
            />
            <SelectControl
                label={__("Image Position")}
                value={backgroundPosition}
                onChange={(value) => onChangeImageOptions('backgroundPosition', 'background-position', value)}
                options={[
                    { value: "left top", label: __("Left Top", 'astra') },
                    { value: "left center", label: __("Left Center", 'astra') },
                    { value: "left bottom", label: __("Left Bottom", 'astra') },
                    { value: "right top", label: __("Right Top", 'astra') },
                    { value: "right center", label: __("Right Center", 'astra') },
                    { value: "right bottom", label: __("Right Bottom", 'astra') },
                    { value: "center top", label: __("Center Top", 'astra') },
                    { value: "center center", label: __("Center Center", 'astra') },
                    { value: "center bottom", label: __("Center Bottom", 'astra') },
                ]}
            />
        </>
    )
}

export default ImagePicker