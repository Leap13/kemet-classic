/* jshint esversion: 6 */
import PropTypes from "prop-types";
import classnames from "classnames";

const { __ } = wp.i18n;

const { ButtonGroup, Dashicon, Tooltip, Button } = wp.components;

const { Component, Fragment } = wp.element;
class ItemComponent extends Component {
  constructor() {
    super(...arguments);
    this.choices = "";
  }
  render() {
    return (
      <div></div>
    );
  }
}
export default ItemComponent;
