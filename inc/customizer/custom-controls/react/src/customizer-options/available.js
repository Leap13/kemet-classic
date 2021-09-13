import PropTypes from "prop-types";
import { Fragment, useState } from "react";
import { ReactSortable, Sortable } from "react-sortablejs";
const { __ } = wp.i18n;
const { Dashicon, Button } = wp.components;
const AvailableComponent = (props) => {
  let defaultParams = {};

  let controlParams = props.params.input_attrs
    ? {
      ...defaultParams,
      ...props.params.input_attrs,
    }
    : defaultParams;
  const builderControlId = "kemet-settings[" + controlParams.group + "]";
  let choices =
    KemetCustomizerData &&
      KemetCustomizerData.choices &&
      KemetCustomizerData.choices[builderControlId]
      ? KemetCustomizerData.choices[builderControlId]
      : [];
  let usedItems = wp.customize(builderControlId).get();
  const [items, setItems] = useState(usedItems);
  const handleDrag = () => {
    let dragZones = document.querySelectorAll(".kmt-builder-area");

    for (let i = 0; i < dragZones.length; i++) {
      dragZones[i].classList.toggle("kmt-dragging-dropzones");
    }
  };
  const onUpdate = () => {
    const newItems = wp.customize(builderControlId).get();
    setItems(newItems);
  };
  const onDragStop = (items) => {
    if (items.length != null && items.length === 0) {
      onUpdate();
    }
  };

  const linkRemovingItem = () => {
    document.addEventListener("KemetBuilderRemovedBuilderItem", function (e) {
      if (e.detail === controlParams.group) {
        onUpdate();
      }
    });
  };

  linkRemovingItem();
  const focusSection = (section) => {
    if (undefined !== wp.customize.section(section)) {
      wp.customize.section(section).focus();
    }
  };
  const renderItems = (item, type) => {
    let available = true;

    controlParams.zones.map((zone) => {
      Object.keys(items[zone]).map((row) => {
        if (items[zone][row].includes(item)) {
          available = false;
        }
      });
    });
    let list = [{ id: item }];
    return (
      <Fragment>
        {!available && type == "used" && (
          <div className={"kmt-builder-item-start"}>
            <Button
              className="kmt-builder-item"
              data-id={item}
              onClick={() => focusSection(choices[item].section)}
              data-section={
                choices[item] && choices[item].section
                  ? choices[item].section
                  : ""
              }
              key={item}
            >
              {choices[item] && choices[item].name ? choices[item].name : ""}
              <span className="kmt-builder-item-icon">
                <Dashicon icon="arrow-right-alt2" />
              </span>
            </Button>
          </div>
        )}
        {available && type == "available" && (
          <ReactSortable
            animation={100}
            className={"kmt-builder-item-start kmt-move-item"}
            onStart={() => handleDrag()}
            setList={(newItems) => onDragStop(newItems)}
            onEnd={() => handleDrag()}
            group={{ name: controlParams.group, put: false }}
            list={list}
          >
            <div className="kmt-builder-item" key={item}>
              <span className="kmt-builder-item-icon kmt-move-icon">
                <Dashicon icon="move" />
              </span>
              <span className="kmt-builder-item-text">
                {undefined !== choices[item] && undefined !== choices[item].name
                  ? choices[item].name
                  : ""}
              </span>
            </div>
          </ReactSortable>
        )}
      </Fragment>
    );
  };
  return (
    <div className="kmt-control-field kmt-available-items">
      <div className="kmt-used-items-container">
        {Object.keys(choices).map((item) => {
          return renderItems(item, "used");
        })}
      </div>
      <div className="kmt-available-items-title">
        <span className="customize-control-title">
          {__("Available Items", "kemet")}
        </span>
      </div>
      <div className="kmt-available-items-container">
        {Object.keys(choices).map((item) => {
          return renderItems(item, "available");
        })}
      </div>
    </div>
  );
};

AvailableComponent.propTypes = {
  control: PropTypes.object.isRequired,
  customizer: PropTypes.func.isRequired,
};

export default React.memo(AvailableComponent);
