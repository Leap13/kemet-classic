import PropTypes from "prop-types";
import { Fragment, useState } from "react";
import { ReactSortable, Sortable } from "react-sortablejs";
const { __ } = wp.i18n;
const { Dashicon, Button } = wp.components;
const { kmtEvents } = window.KmtOptionComponent;
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
    kmtEvents.on("KemetBuilderRemovedBuilderItem", function (e) {
      if (e.detail === controlParams.group) {
        onUpdate();
      }
    })
  };

  linkRemovingItem();

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
      <div className="kmt-available-items-title">
        <span className="customize-control-title">
          {__("Available Elements", "kemet")}
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
