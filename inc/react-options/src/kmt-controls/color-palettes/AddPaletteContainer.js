import React, { useState } from "react";
import { animated } from "@react-spring/web";
import classnames from "classnames";
const { __ } = wp.i18n;

export default function AddPaletteContainer({
  value,
  onChange,
  wrapperProps = {},
  handleAddPalette,
}) {
  const [data, setPaletteData] = useState({
    name: "",
    type: "light",
  });

  return (
    <animated.div
      className="kmt-option-modal kmt-palettes-modal"
      {...wrapperProps}
    >
      <div className={`kmt-palette-info`}>
        <input
          type="text "
          className={`kmt-add-palette-title`}
          placeholder={__("Palette Title")}
          onChange={(e) => setPaletteData({ ...data, name: e.target.value })}
        />
        <div className={`kmt-Palette-type-container`}>
          <p>{__("Type ")}</p>
          <div className={`kmt-Palette-type-wrapper`}>
            {["light", "dark"].map((type) => (
              <button
                type="button"
                className={classnames(
                  "kmt-button-palette-type components-button is-tertiary",
                  {
                    active: type === data.type,
                  }
                )}
                onClick={(e) => {
                  setPaletteData({ ...data, type: type });
                }}
              >
                {type}
              </button>
            ))}
          </div>
        </div>
      </div>
      <button
        className="button button-primary save  kmt-save-palette"
        disabled={data.name === ""}
        onClick={(e) => {
          e.preventDefault();
          e.stopPropagation();
          handleAddPalette(data);
        }}
      >
        Save Palette
      </button>
    </animated.div>
  );
}
