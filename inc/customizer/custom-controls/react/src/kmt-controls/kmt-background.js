import { useRef, createPortal, useState } from "@wordpress/element";
import cls from "classnames";
import BackgroundModal from "./background/BackgroundModal";
import OutsideClickHandler from "../common/outside-component";
const { __ } = wp.i18n;
import usePopoverMaker from "../common/popover-component";


const Background = (props) => {
    const [isOpen, setIsOpen] = useState(false);
    const backgroundWrapper = useRef();

    const { styles, popoverProps } = usePopoverMaker({
        ref: backgroundWrapper,
        defaultHeight: 434,
        shouldCalculate: backgroundWrapper && backgroundWrapper.current,
    });

    return (
        <div
            ref={backgroundWrapper}
            className={cls("kmt-background", {
                active: isOpen,
            })}
        >
            <div
                className={cls("kmt-background-preview")}
                onClick={(e) => {
                    e.preventDefault();
                    setIsOpen(!isOpen);
                }}
                data-background-type={props.backgroundType}
                style={{
                    backgroundColor: props.color,
                    "--background-position": props.backgroundPosition
                        ? ` ${Math.round(
                            parseFloat(props.backgroundPosition.x) * 100
                        )}% ${Math.round(parseFloat(props.backgroundPosition.y) * 100)}%`
                        : null,
                    "--background-image":
                        props.backgroundType === "gradient"
                            ? props.gradient
                            : props.backgroundImage
                                ? `url(${props.backgroundImage})`
                                : "none",
                }}
            >
                <i className="kmt-tooltip-top">
                    {
                        {
                            gradient: __("Gradient", "kemet"),
                            color: __("Color", "kemet"),
                            image: __("Image", "kemet"),
                        }[props.backgroundType]
                    }
                </i>
            </div>

            {backgroundWrapper &&
                backgroundWrapper.current &&
                createPortal(
                    <OutsideClickHandler
                        useCapture={false}
                        display="block"
                        disabled={!isOpen}
                        onOutsideClick={(e) => {
                            if (e.target.closest('.media-modal-content')) {
                                return
                            }
                            setTimeout(() => setIsOpen(false));
                        }}
                        wrapperProps={{
                            style: styles,
                            ...popoverProps,
                            className: cls("kmt-option-modal kmt-background-modal", {
                                active: isOpen,
                            }),
                        }}
                    >
                        <BackgroundModal {...props} />
                    </OutsideClickHandler>,
                    document.body
                )}
        </div>
    );
};

export default Background;