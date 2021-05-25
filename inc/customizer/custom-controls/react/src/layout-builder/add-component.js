import classnames from "classnames";
import { __ } from "@wordpress/i18n";
import { useState } from "react";

const { ButtonGroup, Dashicon, Popover, Button } = wp.components;
const { Fragment } = wp.element;

const AddComponent = (props) => {
  const [state, setState] = useState({
    isVisible: false,
  });

  const addItem = (item, row, column) => {
    const { setList, list } = props;

    setState((prevState) => ({
      ...prevState,
      isVisible: false,
    }));

    let updateItems = list;
    updateItems.push({
      id: item,
    });
    setList(updateItems);
  };

  const { controlParams, location, choices, row, column, id } = props;

  const renderItems = (item, row, column) => {
    let available = true;
    controlParams.rows.map((zone) => {
      Object.keys(props.settings[zone]).map((area) => {
        if (props.settings[zone][area].includes(item)) {
          available = false;
        }
      });
    });

    let itemIncludesMenu = item.includes("menu");

    if (
      "popup" === row &&
      ((itemIncludesMenu && "mobile-menu" !== item) || "toggle-button" === item)
    ) {
      available = false;
    }

    if ("popup" !== row && "mobile-menu" === item) {
      available = false;
    }

    return (
      <Fragment key={item}>
        {available && (
          <Button
            isTertiary
            className={"builder-add-btn"}
            onClick={() => {
              addItem(item, props.row, props.column);
            }}
          >
            <span className="add-btn-icon">
              {" "}
              <Dashicon
                icon={
                  undefined !== choices[item] &&
                  undefined !== choices[item].icon
                    ? choices[item].icon
                    : ""
                }
              />{" "}
            </span>
            <span className="add-btn-title">
              {undefined !== choices[item] && undefined !== choices[item].name
                ? choices[item].name
                : ""}
            </span>
          </Button>
        )}
      </Fragment>
    );
  };

  const toggleClose = () => {
    if (state.isVisible === true) {
      setState((prevState) => ({
        ...prevState,
        isVisible: false,
      }));
    }
  };

  return (
    <div
      className={classnames(
        "kmt-builder-add-item",
        ("kemet-settings[header-desktop-items]" === controlParams.group ||
          "kemet-settings[footer-desktop-items]" === controlParams.group) &&
          "right" === location
          ? "center-on-left"
          : null,
        ("kemet-settings[header-desktop-items]" === controlParams.group ||
          "kemet-settings[footer-desktop-items]" === controlParams.group) &&
          "left" === location
          ? "center-on-right"
          : null,
        ("kemet-settings[header-desktop-items]" === controlParams.group ||
          "kemet-settings[footer-desktop-items]" === controlParams.group) &&
          "left_center" === location
          ? "right-center-on-right"
          : null,
        ("kemet-settings[header-desktop-items]" === controlParams.group ||
          "kemet-settings[footer-desktop-items]" === controlParams.group) &&
          "right_center" === location
          ? "left-center-on-left"
          : null
      )}
      key={id}
    >
      {state.isVisible && (
        <Popover
          position="top"
          className="kmt-popover-add-builder"
          onClose={toggleClose}
        >
          <div className="kmt-popover-builder-list">
            <ButtonGroup className="kmt-radio-container-control">
              {Object.keys(choices)
                .sort()
                .map((item) => {
                  return renderItems(item, row, column);
                })}
            </ButtonGroup>
          </div>
        </Popover>
      )}
      <Button
        className="kmt-builder-item-add-icon dashicon dashicons-plus-alt2"
        onClick={() => {
          setState((prevState) => ({
            ...prevState,
            isVisible: true,
          }));
        }}
      ></Button>
    </div>
  );
};

export default AddComponent;
