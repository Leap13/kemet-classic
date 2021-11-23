import PropTypes from "prop-types";
import RowComponent from "./row-component";
import { Fragment, useState, useEffect } from "react";
import { getSettingId } from '../../options/options-component';
const { kmtEvents } = window.KmtOptionComponent;

const BuilderComponent = (props) => {
  let value = props.value;
  let staleValue = {};
  let baseDefault = {};
  let defaultValue = props.params.default
    ? {
      ...baseDefault,
      ...props.params.default,
    }
    : baseDefault;

  value = value
    ? {
      ...defaultValue,
      ...value,
    }
    : defaultValue;

  let defaultParams = {};

  let controlParams = props.params.input_attrs
    ? {
      ...defaultParams,
      ...props.params.input_attrs,
    }
    : defaultParams;

  let choices = props.params.choices
    ? props.params.choices
    : [];

  let columns = controlParams.columns ? controlParams.columns : [];
  let layouts = controlParams.layouts ? controlParams.layouts : [];

  const prevItems = [];

  const [state, setState] = useState({
    value: value,
    columns: columns,
    isPopup: false,
    revertDrag: false,
    prevItems: prevItems,
    layout: layouts
  });
  let enablePopup = false;

  if (
    "header-desktop-items" === controlParams.group ||
    "header-mobile-items" === controlParams.group
  ) {
    staleValue = JSON.parse(JSON.stringify(state.value));
  }
  const updateValues = (value, row) => {
    let setting = props.control;
    if ("popup" === row) {
      let header =
        "header-desktop-items" === controlParams.group ? "desktop" : "mobile",
        rowSetting = KemetCustomizerData.setting.replace(
          "setting_name",
          "header-" + header + "-popup-items"
        ),
        popup_control = props.customizer(rowSetting);
      popup_control.set(!popup_control.get());
    }
    props.onChange({ ...setting.get(), ...value, flag: !setting.get().flag });
  };
  const onDragStart = () => {
    let dragZones = document.querySelectorAll(".kmt-builder-area");

    for (let i = 0; i < dragZones.length; i++) {
      dragZones[i].classList.add("kmt-dragging-dropzones");
    }
  };
  const onDragStop = () => {
    if (state.revertDrag) {
      let controlValue = state.value;
      let prevValue = state.prevItems.value;
      let prevRestrictValue = state.prevItems.restrictValue;
      controlValue[state.prevItems.row][state.prevItems.zone] = prevValue;
      controlValue[state.prevItems.restrictRow][
        state.prevItems.restrictZone
      ] = prevRestrictValue;

      setState((prevState) => ({
        ...prevState,
        value: controlValue,
        revertDrag: false,
      }));
      checkPopupVisibilty(true);
      updateValues(controlValue, state.prevItems.row);
    }
    let dragZones = document.querySelectorAll(".kmt-builder-area");

    for (let i = 0; i < dragZones.length; i++) {
      dragZones[i].classList.remove("kmt-dragging-dropzones");
    }

    checkPopupVisibilty(true);
  };

  const setPreviousItems = (item, restrictRow, restrictZone) => {
    let prevITems = [];
    for (const [rowKey, value] of Object.entries(staleValue)) {
      for (const [zoneKey, zoneValue] of Object.entries(value)) {
        for (let zoneItem of zoneValue) {
          if (zoneItem === item.id) {
            prevITems["zone"] = zoneKey;
            prevITems["row"] = rowKey;
            prevITems["value"] = staleValue[rowKey][zoneKey];
            prevITems["restrictRow"] = restrictRow;
            prevITems["restrictZone"] = restrictZone;
            prevITems["restrictValue"] = staleValue[restrictRow][restrictZone];
            setState((prevState) => ({
              ...prevState,
              revertDrag: true,
              prevItems: prevITems,
            }));
          }
        }
      }
    }
  };
  const draggedItem = (item) => {
    let dragged = false;
    if (
      "header-desktop-items" === controlParams.group ||
      "header-mobile-items" === controlParams.group
    ) {
      controlParams.rows.map((row) => {
        if (inObject(staleValue[row], item)) {
          dragged = true;
        }
      });
    }

    return dragged;
  };
  const onDragEnd = (row, zone, items) => {
    let controlValue = state.value;
    let rowValue = controlValue[row];
    let updateItems = [];
    let dragged = true;
    let revertDrag = false;
    {
      items.length > 0 &&
        items.map((item) => {
          const itemIncludesMenu = item.id.includes("menu");
          const itemIncludesToggle = item.id.includes("toggle");

          if (
            ("popup" === row &&
              itemIncludesMenu &&
              "offcanvas-menu" !== item.id) ||
            ("popup" === row && itemIncludesToggle) ||
            ("popup" !== row && "offcanvas-menu" === item.id)
          ) {
            if (!draggedItem(item.id)) {
              dragged = false;
              revertDrag = true;
            } else {
              setPreviousItems(item, row, zone);
            }
          }

          updateItems.push(item.id);
        });
    }
    if (!dragged && revertDrag) {
      updateItems = rowValue[zone];
    }
    if (!arraysEqual(rowValue[zone], updateItems)) {
      rowValue[zone] = updateItems;
      controlValue[row][zone] = updateItems;

      if (
        "header-desktop-items" === controlParams.group &&
        row + "_center" === zone &&
        updateItems.length === 0
      ) {
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

      updateValues(controlValue, row);
    }
  };

  const onAddItem = (row, zone, items) => {
    onDragEnd(row, zone, items);
    kmtEvents.trigger("KemetBuilderRemovedBuilderItem", controlParams.group);
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

    updateValues(updateState, row);
    kmtEvents.trigger("KemetBuilderRemovedBuilderItem", controlParams.group);
  };

  const focusSection = (item) => {
    if (undefined !== wp.customize.section(item)) {
      wp.customize.section(item).focus();
    }
  };
  const checkPopupVisibilty = (refresh) => {
    let hasPopup = false;
    if ("header-mobile-items" === controlParams.group) {
      controlParams.rows.map((row) => {
        if (inObject(state.value[row], "mobile-toggle")) {
          hasPopup = true;
        }
      });
    }
    if ("header-desktop-items" === controlParams.group) {
      controlParams.rows.map((row) => {
        if (inObject(state.value[row], "desktop-toggle")) {
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
    if ("object" === typeof object && null !== object) {
      for (const [key, value] of Object.entries(object)) {
        if (value.includes(search)) {
          return true;
        }
      }
    }
    return false;
  };

  const updateRowLayout = () => {
    kmtEvents.on('KemetUpdateFooterColumns', function (e) {

      if ("footer-items" !== controlParams.group) {
        return;
      }

      if ('' === e.detail) {
        return;
      }

      let newParams = controlParams;

      if (newParams.layouts[e.detail] !== undefined) {
        newParams.layouts[e.detail] = wp.customize(getSettingId(e.detail + '-footer-layout')).get()
        newParams.columns[e.detail] = wp.customize(getSettingId(e.detail + '-footer-columns')).get()

        setState(prevState => ({
          ...prevState,
          layout: newParams.layouts,
          columns: newParams.columns
        }));

        updateValues(newParams);
      }
    })
  };

  const handleOutsideUpdate = () => {
    kmtEvents.on('UpdateBuilderValues', ({ detail: { values, id } }) => {
      if (!controlParams.group === id) {
        return;
      }
      setState(prevState => ({
        ...prevState,
        value: values,
      }));
      updateValues(values);
    })
  }
  useEffect(() => {
    handleOutsideUpdate();
    updateRowLayout();
  }, [])
  checkPopupVisibilty(false);

  return (
    <Fragment>
      <div className="kmt-control-field kmt-builder-items">
        {(true === state.isPopup || true === enablePopup) && (
          <RowComponent
            key={"popup"}
            row={"popup"}
            items={state.value["popup"]}
            removeItem={(remove, row, zone) => removeItem(remove, row, zone)}
            showDrop={() => onDragStart()}
            onUpdate={(updateRow, updateZone, updateItems) =>
              onDragEnd(updateRow, updateZone, updateItems)
            }
            onAddItem={(updateRow, updateZone, updateItems) =>
              onAddItem(updateRow, updateZone, updateItems)
            }
            focusSection={(item) => focusSection(item)}
            hideDrop={() => onDragStop()}
            controlParams={controlParams}
            choices={choices}
            settings={state.value}
            columns={state.columns["popup"]}
            layout={state.layout["popup"]}
            customizer={props.customizer}
          />
        )}
        <div className="kmt-builder-row-items">
          {controlParams.rows.map((row) => {
            if ("popup" === row) {
              return;
            }
            return (
              <RowComponent
                removeItem={(remove, row, zone) =>
                  removeItem(remove, row, zone)
                }
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
                columns={state.columns[row]}
                customizer={props.customizer}
                layout={state.layout[row]}
              />
            );
          })}
        </div>
      </div>
    </Fragment>
  );
};

export default React.memo(BuilderComponent);
