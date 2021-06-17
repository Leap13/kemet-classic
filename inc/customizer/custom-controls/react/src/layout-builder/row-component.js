import DropComponent from "./drop-component";

const { __ } = wp.i18n;
const { Dashicon, Button } = wp.components;

const RowComponent = (props) => {
  let centerClass = "";
  let mode =
    props.controlParams.group.indexOf("header") !== -1 ? "header" : "footer";
  let besideItems = [];
  let layout = "";
  let zone_count = 0;
  let enableRow = true;
  let section = "section-" + props.row + "-" + mode + "-builder";
  if ("header" === mode) {
    switch (props.row) {
      case "main":
        section = "section-header";
        break;
      case "popup":
        let device =
          "header-desktop-items" === props.controlParams.group
            ? "desktop"
            : "mobile";
        section = "section-" + device + "-popup-header-builder";
        break;
    }
  }
  if ("footer" === mode) {
    layout = `kmt-grid-row-layout-${props.columns}-equal`;
    zone_count = props.columns - 1;
    Object.keys(props.controlParams.zones[props.row]).map((zone, index) => {
      if (zone_count < index) {
        props.items[zone] = [];
      }
    });
  }
  if (
    "header-desktop-items" === props.controlParams.group &&
    typeof props.items[props.row + "_center"] != "undefined" &&
    props.items[props.row + "_center"] != null &&
    props.items[props.row + "_center"].length != null &&
    props.items[props.row + "_center"].length > 0
  ) {
    centerClass = "has-center-items";
  } else {
    if ("header-desktop-items" === props.controlParams.group) {
      centerClass = "no-center-items";
    }
  }

  if ("popup" === props.row) {
    centerClass = "popup-vertical-group";
  }

  return (
    <div
      className={`kmt-builder-areas kmt-builder-mode-${mode} ${centerClass}`}
      data-row={props.row}
      data-row-section={"section-" + props.row + "-" + mode + "-builder"}
    >
      {props.row === "popup" && (
        <Button
          className="kmt-row-actions"
          title={__("Off Canvas", "kemet")}
          onClick={() => props.focusSection(section)}
        >
          <Dashicon icon="admin-generic" />
          {__("Off Canvas", "kemet")}
        </Button>
      )}
      {props.row !== "popup" && (
        <Button
          className="kmt-fixed-row-actions"
          title={
            (props.row + " " + mode).charAt(0).toUpperCase() +
            (props.row + " " + mode).slice(1).toLowerCase()
          }
          onClick={() => props.focusSection(section)}
        >
          <Dashicon icon="admin-generic" />
          {(props.row + " " + mode).charAt(0).toUpperCase() +
            (props.row + " " + mode).slice(1).toLowerCase()}
        </Button>
      )}

      <div
        className={`kmt-builder-group kmt-builder-group-horizontal ${layout}`}
        data-setting={props.row}
      >
        {Object.keys(props.controlParams.zones[props.row]).map(
          (zone, index) => {
            if (
              props.row + "_left_center" === zone ||
              props.row + "_right_center" === zone
            ) {
              return;
            }
            if (
              "header-desktop-items" === props.controlParams.group &&
              props.row + "_left" === zone
            ) {
              besideItems = props.items[props.row + "_left_center"];
            }
            if (
              "header-desktop-items" === props.controlParams.group &&
              props.row + "_right" === zone
            ) {
              besideItems = props.items[props.row + "_right_center"];
            }
            return (
              <DropComponent
                removeItem={(remove, removeRow, removeZone) =>
                  props.removeItem(remove, removeRow, removeZone)
                }
                showDrop={() => props.showDrop()}
                onUpdate={(updateRow, updateZone, updateItems) =>
                  props.onUpdate(updateRow, updateZone, updateItems)
                }
                zone={zone}
                row={props.row}
                choices={props.choices}
                key={zone}
                mode={mode}
                items={props.items[zone]}
                centerItems={besideItems}
                controlParams={props.controlParams}
                onAddItem={(updateRow, updateZone, updateItems) =>
                  props.onAddItem(updateRow, updateZone, updateItems)
                }
                hideDrop={() => props.hideDrop()}
                settings={props.settings}
                focusSection={(focus) => props.focusSection(focus)}
              />
            );
          }
        )}
      </div>
    </div>
  );
};

export default React.memo(RowComponent);
