import React, { useState } from "react";
import { animated } from "@react-spring/web";
import classnames from "classnames";
import { Fragment } from "react";
const { __ } = wp.i18n;

export default function AddPaletteContainer({
  value,
  handleCloseModal,
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
      <div className={`kmt-add-palette-container`}>
        <button
          className={`button-close-modal`}
          onClick={(e) => {
            e.preventDefault();
            handleCloseModal();
          }}
        ></button>
        <div className={`kmt-palette-info`}>
          <div className={`kmt-palette-name`}>
            <p className={`kmt-palette-type-label`}>{__("palette name")}</p>
            <input
              type="text"
              className={`kmt-add-palette-title`}
              placeholder={__("name your palette")}
              onChange={(e) =>
                setPaletteData({ ...data, name: e.target.value })
              }
            />
          </div>
          <div className={`kmt-Palette-type-container`}>
            <p className={`kmt-palette-type-label`}>{__("palette type")}</p>
            <div className={`kmt-Palette-type-wrapper`}>
              <span>
                <input
                  type="radio"
                  checked={data.type === "light"}
                  name="type"
                  onChange={() => setPaletteData({ ...data, type: "light" })}
                />
                Light
              </span>
              <span>
                {" "}
                <input
                  type="radio"
                  checked={data.type === "dark"}
                  name="type"
                  onChange={() => setPaletteData({ ...data, type: "dark" })}
                />
                Dark{" "}
              </span>
            </div>
          </div>
          <button
            className=" kmt-save-palette"
            disabled={data.name === ""}
            onClick={(e) => {
              e.preventDefault();
              e.stopPropagation();
              handleAddPalette(data);
            }}
          >
            Save Palette
          </button>
        </div>
      </div>
    </animated.div>
  );
}
