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
    __(`Buttons Background Color & Hover Link Color`, "kemet"),
    __("Headings & Links Color", "kemet"),
    __("Body Text & Meta Color", "kemet"),
    __("Borders Color", "kemet"),
    __(
      "Body & tint from it for input," +
      "page title, and widgets background",
      "kemet"
    ),
    __("Footer text color", "kemet"),
    __("Footer Background Color", "kemet"),
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
