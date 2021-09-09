import { useEffect, useState, Fragment } from '@wordpress/element'
const { __ } = wp.i18n
import Overlay from './uploadFont/Overlay'
import AllFonts from './uploadFont/AllFonts'
import Uploader, { getDefaultFutureFont } from './uploadFont/Upload'

let customFontsSettingsCache = {
    fonts: [],
}

const EditSettings = () => {
    const [isEditing, setIsEditing] = useState(false)
    const [futureFont, setFutureFont] = useState(getDefaultFutureFont())
    const [openView, setOpenView] = useState('all')

    const [customFontsSettings, setCustomFontsSettings] = useState(
        customFontsSettingsCache
    )
    useEffect(() => {
        if (isEditing) {
            setFutureFont(getDefaultFutureFont())
        }
    }, [isEditing])

    return (
        <Fragment>
            <button
                className="kmt-button kmt-config-btn"
                data-button="white"
                title={__('Settings', 'kemet')}
                onClick={() => {
                    event.preventDefault()
                    setIsEditing(true)
                }}>
                {__('Settings', 'kemet')}
            </button>

            <Overlay
                items={isEditing}
                onDismiss={() => setIsEditing(false)}
                className={'kmt-custom-fonts-modal'}
                render={() => (
                    <Fragment>
                        {openView.indexOf('edit:') > -1 && (
                            <Uploader
                                futureFont={futureFont}
                                setFutureFont={setFutureFont}
                                onChange={(e) => {
                                    setCustomFontsSettings(e)
                                }}
                                moveToAllFonts={() => {
                                    setOpenView('all')
                                }}
                                customFontsSettings={customFontsSettings}
                                editedIndex={parseInt(
                                    openView.split(':')[1],
                                    10
                                )}
                            />
                        )}
                        {openView === 'all' && (
                            <AllFonts
                                onChange={(e) => {
                                    setCustomFontsSettings(e)
                                }}
                                customFontsSettings={customFontsSettings}
                                editFont={(index) => {
                                    setFutureFont(
                                        customFontsSettings.fonts[index]
                                    )
                                    setOpenView(`edit:${index}`)
                                }}
                                moveToUploader={(type) => {
                                    setFutureFont(getDefaultFutureFont(type))
                                    setOpenView('upload')
                                }}
                            />
                        )}
                        {openView === 'upload' && (
                            <Uploader
                                futureFont={futureFont}
                                setFutureFont={setFutureFont}
                                onChange={(e) => {
                                    setCustomFontsSettings(e)
                                }}
                                moveToAllFonts={() => {
                                    setOpenView('all')
                                }}
                                customFontsSettings={customFontsSettings}
                            />
                        )}
                    </Fragment>
                )}
            />
        </Fragment>
    )
}
export default EditSettings
