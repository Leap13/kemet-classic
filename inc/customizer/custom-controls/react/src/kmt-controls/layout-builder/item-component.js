const { Dashicon, Button } = wp.components;
const { __ } = wp.i18n;

const ItemComponent = ({ item, choices, removeItem, focusSection }) => {
    return (
        <div
            className="kmt-builder-item"
            data-id={item}
            data-section={
                undefined !== choices[item] &&
                undefined !== choices[item].section
                    ? choices[item].section
                    : ""
            }
            key={item}
        >
            <div
                className="kmt-builder-item-actions"
                onClick={() => {
                    focusSection(
                        undefined !== choices[item] &&
                            undefined !== choices[item].section
                            ? choices[item].section
                            : ""
                    );
                }}
            >
                <span className="kmt-builder-item-icon kmt-move-icon">
                    <Dashicon icon="move" />
                </span>
                <span className="kmt-builder-item-text">
                    {undefined !== choices[item] &&
                    undefined !== choices[item].name
                        ? choices[item].name
                        : ""}
                </span>
                <Button
                    className="kmt-builder-item-focus-icon kmt-builder-item-icon"
                    aria-label={
                        __("Settings for", "kemet") +
                        " " +
                        (undefined !== choices[item] &&
                        undefined !== choices[item].name
                            ? choices[item].name
                            : "")
                    }
                >
                    <Dashicon icon="admin-generic" />
                </Button>
            </div>
            {KemetCustomizerData.has_widget_editor && item.includes("widget") && (
                <Button
                    className="kmt-builder-item-focus-icon kmt-builder-item-icon"
                    aria-label={
                        __("Design for", "kemet") +
                        " " +
                        (undefined !== choices[item] &&
                        undefined !== choices[item].name
                            ? choices[item].name
                            : "")
                    }
                    onClick={() => {
                        focusSection(
                            undefined !== choices[item] &&
                                undefined !== choices[item].section
                                ? "kemet-" + choices[item].section
                                : ""
                        );
                    }}
                >
                    <Dashicon icon="admin-appearance" />
                </Button>
            )}
            <Button
                className="kmt-builder-item-icon"
                aria-label={
                    __("Remove", "kemet") +
                    " " +
                    (undefined !== choices[item] &&
                    undefined !== choices[item].name
                        ? choices[item].name
                        : "")
                }
                onClick={() => {
                    removeItem(item);
                }}
            >
                <Dashicon icon="no-alt" />
            </Button>
        </div>
    );
};
export default React.memo(ItemComponent);
