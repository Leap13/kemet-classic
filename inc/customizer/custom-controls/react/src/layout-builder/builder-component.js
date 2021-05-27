import PropTypes from "prop-types";
import RowComponent from "./row-component";
import { useState } from "react";

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

  let choices = props.control.params.choices
    ? props.control.params.choices
    : [];

  const [state, setState] = useState({
    value: value,
    isPopup: false,
  });
  let enablePopup = false;

  const updateValues = (value) => {
    let setting = props.control.setting;

    setting.set({ ...setting.get(), ...value, flag: !setting.get().flag });
  };
  const onDragStart = () => {
    let dragZones = document.querySelectorAll(".kmt-builder-area");

    for (let i = 0; i < dragZones.length; i++) {
      dragZones[i].classList.add("kmt-dragging-dropzones");
    }
  };
  const onDragStop = () => {
    let dragZones = document.querySelectorAll(".kmt-builder-area");

    for (let i = 0; i < dragZones.length; i++) {
      dragZones[i].classList.remove("kmt-dragging-dropzones");
    }

    checkPopupVisibilty(true);
  };
  const onDragEnd = (row, zone, items) => {
    let controlValue = state.value;
    let rowValue = controlValue[row];
    let updateItems = [];
    {
      items.length > 0 &&
        items.map((item) => {
          updateItems.push(item.id);
        });
    }

    if (!arraysEqual(rowValue[zone], updateItems)) {
      rowValue[zone] = updateItems;
      controlValue[row][zone] = updateItems;

      if (
        "header-desktop-items" === controlParams.group &&
        row + "_center" === zone &&
        updateItems.length === 0
      ) {
        console.log("Center");
        if (rowValue[row + "_left_center"].length > 0) {
          rowValue[row + "_left_center"].map((move) => {
            controlValue[row][row + "_left"].push(move);
          });
          controlValue[row][row + "_left_center"] = [];
        }

        if (rowValue[row + "_right_center"].length > 0) {
          rowValue[row + "_right_center"].map((move) => {
            controlValue[row][row + "_right"].push(move);
          });
          controlValue[row][row + "_right_center"] = [];
        }
      }
      checkPopupVisibilty(true);
      setState((prevState) => ({
        ...prevState,
        value: controlValue,
      }));

      updateValues(controlValue);
    }
  };

  const onAddItem = (row, zone, items) => {
    onDragEnd(row, zone, items);
    let event = new CustomEvent("KemetBuilderRemovedBuilderItem", {
      detail: controlParams.group,
    });
    document.dispatchEvent(event);
  };
  const arraysEqual = (a, b) => {
    if (a === b) return true;
    if (a == null || b == null) return false;
    if (a.length != b.length) return false;
    for (var i = 0; i < a.length; ++i) {
      if (a[i] !== b[i]) return false;
    }
    return true;
  };
  const removeItem = (item, row, zone) => {
    let updateState = state.value;
    let update = updateState[row];
    let updateItems = [];
    {
      update[zone].length > 0 &&
        update[zone].map((old) => {
          if (item !== old) {
            updateItems.push(old);
          }
        });
    }

    if (
      "header-desktop-items" === controlParams.group &&
      row + "_center" === zone &&
      updateItems.length === 0
    ) {
      if (update[row + "_left_center"].length > 0) {
        update[row + "_left_center"].map((move) => {
          updateState[row][row + "_left"].push(move);
        });
        updateState[row][row + "_left_center"] = [];
      }

      if (update[row + "_right_center"].length > 0) {
        update[row + "_right_center"].map((move) => {
          updateState[row][row + "_right"].push(move);
        });
        updateState[row][row + "_right_center"] = [];
      }
    }

    update[zone] = updateItems;
    updateState[row][zone] = updateItems;

    checkPopupVisibilty(true);

    setState((prevState) => ({
      ...prevState,
      value: updateState,
    }));

    updateValues(updateState);
    let event = new CustomEvent("KemetBuilderRemovedBuilderItem", {
      detail: controlParams.group,
    });
    document.dispatchEvent(event);
  };

  const focusSection = (item) => {
    if (undefined !== props.customizer.section(item)) {
      props.customizer.section(item).focus();
    }
  };
  const checkPopupVisibilty = (refresh) => {
    let hasPopup = false;
    if ("header-mobile-items" === controlParams.group) {
      controlParams.rows.map((row) => {
        if (inObject(state.value[row], "toggle-mobile")) {
          hasPopup = true;
        }
      });
    }
    if (refresh) {
      setState((prevState) => ({
        ...prevState,
        isPopup: hasPopup,
      }));
    }

    enablePopup = hasPopup;
  };
  const inObject = (object, search) => {
    for (const [key, value] of Object.entries(object)) {
      if (value.includes(search)) {
        return true;
      }
    }
    return false;
  };

  checkPopupVisibilty(false);
  return (
    <div className="kmt-control-field kmt-builder-items">
      {(true === state.isPopup || true === enablePopup) && (
        <RowComponent
          key={"popup"}
          row={"popup"}
          removeItem={(remove, row, zone) => removeItem(remove, row, zone)}
          controlParams={controlParams}
          choices={choices}
          items={state.value["popup"]}
          showDrop={() => onDragStart()}
          onUpdate={(updateRow, updateZone, updateItems) =>
            onDragEnd(updateRow, updateZone, updateItems)
          }
          onAddItem={(updateRow, updateZone, updateItems) =>
            onAddItem(updateRow, updateZone, updateItems)
          }
          focusSection={(item) => focusSection(item)}
          hideDrop={() => onDragStop()}
          settings={state.value}
        />
      )}
      <div className="kmt-builder-row-items">
        {controlParams.rows.map((row) => {
          if ("popup" === row) {
            return;
          }

          return (
            <RowComponent
              removeItem={(remove, row, zone) => removeItem(remove, row, zone)}
              key={row}
              row={row}
              showDrop={() => onDragStart()}
              onUpdate={(updateRow, updateZone, updateItems) =>
                onDragEnd(updateRow, updateZone, updateItems)
              }
              onAddItem={(updateRow, updateZone, updateItems) =>
                onAddItem(updateRow, updateZone, updateItems)
              }
              focusSection={(item) => focusSection(item)}
              hideDrop={() => onDragStop()}
              items={state.value[row]}
              controlParams={controlParams}
              choices={choices}
              settings={state.value}
            />
          );
        })}
      </div>
    </div>
  );
};

BuilderComponent.propTypes = {
  control: PropTypes.object.isRequired,
  customizer: PropTypes.func.isRequired,
};

export default React.memo(BuilderComponent);
