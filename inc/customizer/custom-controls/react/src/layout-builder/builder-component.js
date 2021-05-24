/* jshint esversion: 6 */
import PropTypes from "prop-types";
import RowComponent from "./row-component";
import { useEffect, useState } from "react";

const BuilderComponent = (props) => {
  let value = props.control.setting.get();
  let staleValue = {};

  let baseDefault = {};
  let defaultValue = props.control.params.default
    ? {
        ...baseDefault,
        ...props.control.params.default,
      }
    : baseDefault;

  value = value
    ? {
        ...defaultValue,
        ...value,
      }
    : defaultValue;

  let defaultParams = {};

  let controlParams = props.control.params.input_attrs
    ? {
        ...defaultParams,
        ...props.control.params.input_attrs,
      }
    : defaultParams;

  let choices =
    KemetCustomizerData &&
    KemetCustomizerData.choices &&
    KemetCustomizerData.choices[controlParams.group]
      ? KemetCustomizerData.choices[controlParams.group]
      : [];
  const prevItems = [];
  prevItems["revertDrag"] = false;
  const [state, setState] = useState({
    value: value,
    prevItems: prevItems,
    isPopup: false,
  });
  let contFlag = false;

  if (props.control.container) {
    contFlag = props.control.container[0].getAttribute("isPopup");
  }
  if (
    "kemet-settings[header-desktop-items]" === controlParams.group ||
    "kemet-settings[header-mobile-items]" === controlParams.group
  ) {
    staleValue = JSON.parse(JSON.stringify(state.value));
  }

  const updateValues = (value, row = "") => {
    let setting = props.control.setting;

    // If popup updated, partial refresh contents.
    if ("popup" === row) {
      let popup_control = props.customizer(
        "kemet-settings[header-mobile-popup-items]"
      );
      popup_control.set(!popup_control.get());
    }

    setting.set({ ...setting.get(), ...value, flag: !setting.get().flag });
  };

  const setPopupFlag = (refresh) => {
    let is_popup_flag = false;
    if ("kemet-settings[header-desktop-items]" === props.control.id) {
      controlParams.rows.map((row) => {
        var rowContents = state.value[row];

        for (const [key, value] of Object.entries(rowContents)) {
          if (value.includes("mobile-trigger")) {
            is_popup_flag = true;
            return;
          }
        }
      });
    }
    if ("kemet-settings[header-mobile-items]" === props.control.id) {
      controlParams.rows.map((row) => {
        var rowContents = state.value[row];

        for (const [key, value] of Object.entries(rowContents)) {
          if (value.includes("mobile-trigger")) {
            is_popup_flag = true;
            return;
          }
        }
      });
    }

    if (refresh) {
      setState((prevState) => ({
        ...prevState,
        isPopup: is_popup_flag,
      }));
    }

    if (props.control.container) {
      props.control.container[0].setAttribute("isPopup", is_popup_flag);
      contFlag = is_popup_flag;
    }
  };

  setPopupFlag(false);

  return (
    <div className="kmt-control-field kmt-builder-items">
      {(true === state.isPopup || true === contFlag) && (
        <RowComponent
          key={"popup"}
          row={"popup"}
          controlParams={controlParams}
          choices={choices}
          items={state.value["popup"]}
        />
      )}
      <div className="kmt-builder-row-items">
        {controlParams.rows.map((row) => {
          if ("popup" === row) {
            return;
          }

          return (
            <RowComponent
              key={row}
              row={row}
              items={state.value[row]}
              controlParams={controlParams}
              choices={choices}
            />
          );
        })}
      </div>
    </div>
  );
};

export default React.memo(BuilderComponent);
