import { DialogOverlay, DialogContent } from "./dialog";
import { Transition } from "@react-spring/web";
const { __ } = wp.i18n;
import classnames from "classnames";

const defaultIsVisible = (i) => !!i;

const Overlay = ({
    items,
    isVisible = defaultIsVisible,
    render,
    className,
    onDismiss,
}) => {
    return (
        <Transition
            items={items}
            onStart={() =>
                document.body.classList[items ? "add" : "remove"](
                    "kmt-dashboard-overlay-open"
                )
            }
            config={{ duration: 200 }}
            from={{ opacity: 0, y: -10 }}
            enter={{ opacity: 1, y: 0 }}
            leave={{ opacity: 0, y: 10 }}
        >
            {(visable) =>
                isVisible(items) && (
                    <DialogOverlay
                        container={document.querySelector(
                            ".wp-full-overlay.section-open #customize-preview "
                        )}
                        items={items}
                        onDismiss={() => onDismiss()}
                    >
                        <DialogContent
                            className={classnames("kmt-admin-modal", className)}
                            style={{
                                transform: `translate3d(0px, 0px, 0px)`,
                            }}
                        >
                            <button
                                className="close-button"
                                onClick={() => onDismiss()}
                            >
                                ×
                            </button>

                            {render(visable)}
                        </DialogContent>
                    </DialogOverlay>
                )
            }
        </Transition>
    );
};

export default Overlay;
