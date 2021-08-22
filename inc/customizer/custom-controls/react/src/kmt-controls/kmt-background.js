import { useRef, createPortal, useState } from "@wordpress/element";
import cls from "classnames";
import BackgroundModal from "./background/BackgroundModal";
import OutsideClickHandler from "./react-outside-click-handler";
const { __ } = wp.i18n;
import usePopoverMaker from "../helpers/usePopoverMaker";

/**
 * Support color picker values inside the background picker.
 * Which means transitions from ct-color-picker are made possible thanks to
 * this logic.
 */

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
      className={cls("ct-background", {
        active: isOpen,
      })}
    >
      <div
        className={cls("ct-background-preview")}
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
        <i className="ct-tooltip-top">
          {
            {
              gradient: __("Gradient", "blocksy"),
              color: __("Color", "blocksy"),
              image: __("Image", "blocksy"),
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
            onOutsideClick={() => {
              setTimeout(() => setIsOpen(false));
            }}
            wrapperProps={{
              style: styles,
              ...popoverProps,
              className: cls("ct-option-modal ct-background-modal", {
                active: isOpen,
              }),
            }}
          >
            <BackgroundModal props={props} />
          </OutsideClickHandler>,
          document.body
        )}
    </div>
  );
};

export default Background;
