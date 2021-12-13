import { Button } from '@wordpress/components';
import { useState } from '@wordpress/element';
const { __ } = wp.i18n;

const ClearCacheButton = ({ params }) => {
    const [isLoading, setIsLoading] = useState(false);
    const btnTxt = __('Flush Local Font Files', 'kemet');
    const [buttonText, setButtonText] = useState(btnTxt);
    const { label, description } = params;
    let labelContent = label ? <span className="customize-control-title kmt-control-title">{label}</span> : null;

    const clearCache = async () => {
        setIsLoading(true);
        const body = new FormData()
        body.append('action', 'kemet_clear_fonts_folder')
        body.append('nonce', KemetCustomizerData.nonce)

        try {
            const response = await fetch(KemetCustomizerData.ajaxurl, {
                method: 'POST',
                body,
            })

            if (response.status === 200) {
                const { success } = await response.json()
                if (success) {
                    setButtonText(__('Successfully Flushed', 'kemet'));
                    setTimeout(() => {
                        setButtonText(btnTxt);
                        setIsLoading(false);
                    }, 500);
                }
            }
        } catch (e) {
            alert(e);
        }
    }
    return <>
        {labelContent}
        <div className="customize-control-content">
            {description && <p className="description customize-control-description" >{description}</p>}
            <Button isSecondary={true} disabled={isLoading} onClick={clearCache}>{buttonText}</Button>
        </div>
    </>;
}

export default ClearCacheButton
