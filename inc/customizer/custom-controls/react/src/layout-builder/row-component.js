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

  if ("footer" === mode) {
    layout = `kmt-grid-row-layout-${props.layout[props.row].layout.desktop}`;
    zone_count = props.layout[props.row].column - 1;
    Object.keys(props.controlParams.zones[props.row]).map((zone, index) => {
      if (zone_count < index) {
        props.items[zone] = [];
      }
    });
  }
  console.log(props.row + " " + mode);
  if (
    "popup" !== props.row &&
    "kemet-settings[header-desktop-items]" === props.controlParams.group &&
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
      case "above":
        if (!props.controlParams.status.above) {
          enableRow = false;
        }

        break;

      case "primary":
        if (!props.controlParams.status.primary) {
          enableRow = false;
        }

        break;

      case "below":
        if (!props.controlParams.status.below) {
          enableRow = false;
        }

        break;
    }
  }
  return (
    <div
      className={`kmt-builder-area kmt-builder-mode-${mode} ${centerClass}`}
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
        // onClick={() => props.focusPanel(props.row + "-" + mode)}
      >
        <Dashicon icon="admin-generic" />
        {props.row === "popup" && <>{__("Off Canvas", "kemet")}</>}
      </Button>
    </div>
  );
};

export default React.memo(RowComponent);
