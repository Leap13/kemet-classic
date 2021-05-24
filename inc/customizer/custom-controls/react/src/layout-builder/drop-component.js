/* jshint esversion: 6 */
import PropTypes from "prop-types";
import classnames from "classnames";
import { ReactSortable } from "react-sortablejs";
import ItemComponent from "./item-component";

const { __ } = wp.i18n;

const { ButtonGroup, Dashicon, Tooltip, Button } = wp.components;

const { Component, Fragment } = wp.element;
class DropComponent extends Component {
  render() {
    return (
      <div
        className={`kmt-builder-area kmt-builder-area-${location}`}
        data-location={this.props.zone}
      ></div>
    );
  }
}
export default DropComponent;
