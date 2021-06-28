
import classnames from 'classnames'
import { __ } from '@wordpress/i18n';

const ImagePicker = ({ media, backgroundAttachment, backgroundImage, backgroundRepeat, backgroundSize, onChangeImageOption }) => {
    const onChangeImageOptions = (tempKey, mainkey, value) => {
        this.setState({ backgroundType: 'image' });
        onChangeImageOption(mainkey, value, 'image');
    }
    return (
        <>
            <MediaUpload
                title={__("Select Background Image", 'kemet')}
                onSelect={(media) => this.onSelectImage('https://www.nomadfoods.com/wp-content/uploads/2018/08/placeholder-1-e1533569576673-960x960.png')}
                allowedTypes={["image"]}
                value={(media && media ? media : '')}
                render={({ open }) => (
                    <Button className="upload-button button-add-media" isDefault onClick={() => this.open(open)}>
                        { (!media && !backgroundImage) ? __("Select Background Image", 'kemet') : __("Replace image", 'kemet')}
                    </Button>
                )}
            />
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
        </>
    )
}

export default ImagePicker
