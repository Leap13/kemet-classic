import { useEffect, useState, Fragment } from "@wordpress/element";
const { __ } = wp.i18n;
import Overlay from "./uploadFont/Overlay";
import AllFonts from "./uploadFont/AllFonts";
import Uploader, { getDefaultFutureFont } from "./uploadFont/Upload";

let customSettingsCache = {
    fonts: [],
};

const EditSettings = () => {
    const [isEditing, setIsEditing] = useState(false);
    const [futureFont, setFutureFont] = useState(getDefaultFutureFont());
    const [currentView, setcurrentView] = useState("all");

    const [customSettings, setcustomSettings] = useState(
        customSettingsCache
    );
    useEffect(() => {
        if (isEditing) {
            setFutureFont(getDefaultFutureFont());
        }
    }, [isEditing]);

    return (
        <Fragment>
            <button
                className="kmt-button kmt-config-btn"
                data-button="white"
                title={__("Settings", "kemet")}
                onClick={() => {
                    event.stopPropagation()
                    event.preventDefault()
                    setIsEditing(true)
                }}
            >
                {__("Settings", "kemet")}
            </button>

            <Overlay
                items={isEditing}
                onDismiss={() => setIsEditing(false)}
                className={"kmt-custom-fonts-modal"}
                render={() => (
                    <Fragment>
                        {currentView.indexOf("edit:") > -1 && (
                            <Uploader
                                futureFont={futureFont}
                                setFutureFont={setFutureFont}
                                onChange={(e) => {
                                    setcustomSettings(e);
                                }}
                                moveToAllFonts={() => {
                                    setcurrentView("all");
                                }}
                                customSettings={customSettings}
                                editedIndex={parseInt(
                                    currentView.split(":")[1],
                                    10
                                )}
                            />
                        )}
                        {currentView === "all" && (
                            <AllFonts
                                onChange={(e) => {
                                    setcustomSettings(e);
                                }}
                                customSettings={customSettings}
                                editFont={(index) => {
                                    setFutureFont(
                                        customSettings.fonts[index]
                                    );
                                    setcurrentView(`edit:${index}`);
                                }}
                                moveToUploader={(type) => {
                                    setFutureFont(getDefaultFutureFont(type));
                                    setcurrentView("upload");
                                }}
                            />
                        )}
                        {currentView === "upload" && (
                            <Uploader
                                futureFont={futureFont}
                                setFutureFont={setFutureFont}
                                onChange={(e) => {
                                    setcustomSettings(e);
                                }}
                                moveToAllFonts={() => {
                                    setcurrentView("all");
                                }}
                                customSettings={customSettings}
                            />
                        )}
                    </Fragment>
                )}
            />
        </Fragment >
    );
};
export default EditSettings;
