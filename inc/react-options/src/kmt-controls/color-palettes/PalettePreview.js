const { __ } = wp.i18n;
import classnames from "classnames";
import ColorComponent from "../color";

const PalettePreview = ({
  renderBefore = () => null,
  value,
  onChange,
  onClick,
  currentPalette,
  className,
  skipModal,
  handleClickReset,
}) => {
  if (!currentPalette) {
    currentPalette = value;
  }
  const handleChangeColor = (color, optionId) => {
    let newColor;
    if (typeof color === "string") {
      newColor = color;
    } else if (
      undefined !== color.rgb &&
      undefined !== color.rgb.a &&
      1 !== color.rgb.a
    ) {
      newColor = `rgba(${color.rgb.r},${color.rgb.g},${color.rgb.b},${color.rgb.a})`;
    } else {
      newColor = color.hex;
    }
    onChange(newColor, optionId);
  };
  const Title = [
    __(`Buttons background  Color,\nHover link color`, "kemet"),
    __("Headings,Links color", "kemet"),
    __("Body text & Meta color", "kemet"),
    __("Borders color", "kemet"),
    __(
      "Body, a tint for Input fields,\n Page title, Widgets background",
      "kemet"
    ),
    __("Footer text color", "kemet"),
    __("Footer background color", "kemet"),
  ];
  const pickers = Object.keys(currentPalette)
    .filter((k) => k.indexOf("color") === 0)
    .map((key, index) => ({
      title: Title[index],
      id: key,
    }));
  return (
    <div
      className={classnames("kmt-single-palette", className)}
      onClick={(e) => {
        if (
          e.target.closest(".kmt-color-picker-modal") ||
          e.target.classList.contains("kmt-color-picker-modal")
        ) {
          return;
        }

        onClick();
      }}
    >
      {renderBefore()}
      <div className={`kmt-color-palette-container`}>
        {pickers.map((picker) => (
          <ColorComponent
            picker={picker}
            onChangeComplete={(color, id) =>
              handleChangeColor(color, picker[`id`])
            }
            value={currentPalette}
            predefined={true}
            className={"kmt-color-palette-modal"}
            skipModal={skipModal}
            resetPalette={true}
            onColorReset={(color) => handleClickReset(picker[`id`])}
          />
        ))}
      </div>
    </div>
  );
};

export default PalettePreview;
