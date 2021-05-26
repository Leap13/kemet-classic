import DropComponent from "./drop-component";

const { __ } = wp.i18n;
const { Dashicon, Button } = wp.components;

const RowComponent = (props) => {
  let centerClass = "no-center-items";
  let mode =
    props.controlParams.group.indexOf("header") !== -1 ? "header" : "footer";
  let besideItems = [];
  let layout = "";
  let zone_count = 0;
  let enableRow = true;
  let section = "";
  if ("header" === mode) {
    switch (props.row) {
      case "top":
        section = "section-topbar-header";
        break;
      case "main":
        section = "section-header";
        break;
      case "bottom":
        section = "section-header";
        break;
    }
  }
  if ("footer" === mode) {
    layout = `kmt-grid-row-layout-${props.layout[props.row].layout.desktop}`;
    zone_count = props.layout[props.row].column - 1;
    Object.keys(props.controlParams.zones[props.row]).map((zone, index) => {
      if (zone_count < index) {
        props.items[zone] = [];
      }
    });
  }
  if (
    "popup" !== props.row &&
    "header-desktop-items" === props.controlParams.group &&
    typeof props.items[props.row + "_center"] != "undefined" &&
    props.items[props.row + "_center"] != null &&
    props.items[props.row + "_center"].length != null &&
    props.items[props.row + "_center"].length > 0
  ) {
    centerClass = "has-center-items";
  }

  if ("popup" === props.row) {
    centerClass = "popup-vertical-group";
  }

  if (props.controlParams.hasOwnProperty("status")) {
    switch (props.row) {
      case "top":
        if (!props.controlParams.status.top) {
          enableRow = false;
        }

        break;

      case "main":
        if (!props.controlParams.status.main) {
          enableRow = false;
        }

        break;

      case "bottom":
        if (!props.controlParams.status.bottom) {
          enableRow = false;
        }

        break;
    }
  }
  return (
    <div
      className={`kmt-builder-areas kmt-builder-mode-${mode} ${centerClass}`}
      data-row={props.row}
      data-row-section={"section-" + props.row + "-" + mode + "-builder"}
    >
      <Button
        className="kmt-row-actions"
        title={
          props.row === "popup"
            ? __("Off Canvas", "kemet")
            : (props.row + " " + mode).charAt(0).toUpperCase() +
              (props.row + " " + mode).slice(1).toLowerCase()
        }
        onClick={() => props.focusSection(section)}
      >
        <Dashicon icon="admin-generic" />
        {props.row === "popup" && <>{__("Off Canvas", "kemet")}</>}
      </Button>

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
