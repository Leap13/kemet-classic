const { Dashicon, Button } = wp.components;
const { __ } = wp.i18n;

const ItemComponent = (props) => {
  let choices =
    KemetCustomizerData &&
    KemetCustomizerData.choices &&
    KemetCustomizerData.choices[props.controlParams.group]
      ? KemetCustomizerData.choices[props.controlParams.group]
      : [];
  return (
    <div
      className="kmt-builder-item"
      data-id={props.item}
      data-section={
        undefined !== choices[props.item] &&
        undefined !== choices[props.item].section
          ? choices[props.item].section
          : ""
      }
      key={props.item}
    >
      <span className="kmt-builder-item-icon kmt-move-icon">
        <Dashicon icon="move" />
      </span>
      <span className="kmt-builder-item-text">
        {undefined !== choices[props.item] &&
        undefined !== choices[props.item].name
          ? choices[props.item].name
          : ""}
      </span>
      <Button
        className="kmt-builder-item-focus-icon kmt-builder-item-icon"
        aria-label={
          __("Setting settings for", "kemet") +
          " " +
          (undefined !== choices[props.item] &&
          undefined !== choices[props.item].name
            ? choices[props.item].name
            : "")
        }
        onClick={() => {
          props.focusItem(
            undefined !== choices[props.item] &&
              undefined !== choices[props.item].section
              ? choices[props.item].section
              : ""
          );
        }}
      >
        <Dashicon icon="admin-generic" />
      </Button>
      <Button
        className="kmt-builder-item-icon"
        aria-label={
          __("Remove", "kemet") +
          " " +
          (undefined !== choices[props.item] &&
          undefined !== choices[props.item].name
            ? choices[props.item].name
            : "")
        }
        onClick={() => {
          props.removeItem(props.item);
        }}
      >
        <Dashicon icon="no-alt" />
      </Button>
    </div>
  );
};
export default React.memo(ItemComponent);
