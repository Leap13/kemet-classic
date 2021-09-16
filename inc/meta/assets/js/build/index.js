/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/index.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/@babel/runtime/helpers/arrayLikeToArray.js":
/*!*****************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/arrayLikeToArray.js ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _arrayLikeToArray(arr, len) {
  if (len == null || len > arr.length) len = arr.length;

  for (var i = 0, arr2 = new Array(len); i < len; i++) {
    arr2[i] = arr[i];
  }

  return arr2;
}

module.exports = _arrayLikeToArray;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/arrayWithHoles.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/arrayWithHoles.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _arrayWithHoles(arr) {
  if (Array.isArray(arr)) return arr;
}

module.exports = _arrayWithHoles;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/defineProperty.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/defineProperty.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _defineProperty(obj, key, value) {
  if (key in obj) {
    Object.defineProperty(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }

  return obj;
}

module.exports = _defineProperty;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/iterableToArrayLimit.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/iterableToArrayLimit.js ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _iterableToArrayLimit(arr, i) {
  var _i = arr && (typeof Symbol !== "undefined" && arr[Symbol.iterator] || arr["@@iterator"]);

  if (_i == null) return;
  var _arr = [];
  var _n = true;
  var _d = false;

  var _s, _e;

  try {
    for (_i = _i.call(arr); !(_n = (_s = _i.next()).done); _n = true) {
      _arr.push(_s.value);

      if (i && _arr.length === i) break;
    }
  } catch (err) {
    _d = true;
    _e = err;
  } finally {
    try {
      if (!_n && _i["return"] != null) _i["return"]();
    } finally {
      if (_d) throw _e;
    }
  }

  return _arr;
}

module.exports = _iterableToArrayLimit;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/nonIterableRest.js":
/*!****************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/nonIterableRest.js ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}

module.exports = _nonIterableRest;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/slicedToArray.js":
/*!**************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/slicedToArray.js ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayWithHoles = __webpack_require__(/*! ./arrayWithHoles.js */ "./node_modules/@babel/runtime/helpers/arrayWithHoles.js");

var iterableToArrayLimit = __webpack_require__(/*! ./iterableToArrayLimit.js */ "./node_modules/@babel/runtime/helpers/iterableToArrayLimit.js");

var unsupportedIterableToArray = __webpack_require__(/*! ./unsupportedIterableToArray.js */ "./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js");

var nonIterableRest = __webpack_require__(/*! ./nonIterableRest.js */ "./node_modules/@babel/runtime/helpers/nonIterableRest.js");

function _slicedToArray(arr, i) {
  return arrayWithHoles(arr) || iterableToArrayLimit(arr, i) || unsupportedIterableToArray(arr, i) || nonIterableRest();
}

module.exports = _slicedToArray;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js":
/*!***************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayLikeToArray = __webpack_require__(/*! ./arrayLikeToArray.js */ "./node_modules/@babel/runtime/helpers/arrayLikeToArray.js");

function _unsupportedIterableToArray(o, minLen) {
  if (!o) return;
  if (typeof o === "string") return arrayLikeToArray(o, minLen);
  var n = Object.prototype.toString.call(o).slice(8, -1);
  if (n === "Object" && o.constructor) n = o.constructor.name;
  if (n === "Map" || n === "Set") return Array.from(o);
  if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return arrayLikeToArray(o, minLen);
}

module.exports = _unsupportedIterableToArray;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _page_options__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./page-options */ "./src/page-options.js");


/***/ }),

/***/ "./src/options.js":
/*!************************!*\
  !*** ./src/options.js ***!
  \************************/
/*! exports provided: isDisplay, OptionsComponent */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isDisplay", function() { return isDisplay; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "OptionsComponent", function() { return OptionsComponent; });
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);



var isDisplay = function isDisplay(rules, values) {
  if (!values) {
    return;
  }

  var relation = undefined != rules.relation ? rules.relation : "AND",
      isVisible = "AND" === relation ? true : false;

  _.each(rules, function (rule, ruleKey) {
    if ("relation" == ruleKey) {
      return;
    }

    var boolean = false,
        operator = undefined != rule.operator ? rule.operator : "=",
        ruleValue = rule.value;
    var settingValue = values[rule.setting];

    switch (operator) {
      case "in_array":
        boolean = ruleValue.includes(settingValue);
        break;

      case "contain":
        boolean = settingValue.includes(ruleValue);
        break;

      case ">":
        boolean = settingValue > ruleValue;
        break;

      case "<":
        boolean = settingValue < ruleValue;
        break;

      case ">=":
        boolean = settingValue >= ruleValue;
        break;

      case "<=":
        boolean = settingValue <= ruleValue;
        break;

      case "not_empty":
        boolean = typeof settingValue !== "undefined" && undefined !== settingValue && null !== settingValue && "" !== settingValue;
        break;

      case "!=":
        boolean = settingValue !== ruleValue;
        break;

      default:
        boolean = settingValue == ruleValue;
        break;
    }

    isVisible = "OR" === relation ? isVisible || boolean : isVisible && boolean;
  });

  return isVisible;
};

var toggleVisible = function toggleVisible(rules, onChange) {
  document.addEventListener('KemetUpdateMeta', function (_ref) {
    var _ref$detail = _ref.detail,
        key = _ref$detail.key,
        values = _ref$detail.values;

    _.each(rules, function (rule) {
      if (rule.setting === key) {
        onChange(isDisplay(rules, values));
      }
    });
  });
  document.addEventListener('KemetInitMeta', function (_ref2) {
    var values = _ref2.detail.values;

    _.each(rules, function (rule) {
      if (values[rule.setting]) {
        onChange(isDisplay(rules, values));
      }
    });
  });
};

var SingleOptionComponent = function SingleOptionComponent(_ref3) {
  var value = _ref3.value,
      optionId = _ref3.optionId,
      option = _ref3.option,
      onChange = _ref3.onChange;
  var OptionComponent = window.KmtOptionComponent.OptionComponent;
  var Option = OptionComponent(option.type);
  return option.type && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    id: optionId,
    className: "customize-control-".concat(option.type)
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(Option, {
    id: optionId,
    value: value,
    params: option,
    onChange: onChange
  }));
};

var RenderOptions = function RenderOptions(_ref4) {
  var options = _ref4.options,
      _onChange = _ref4.onChange,
      values = _ref4.values;
  return Object.keys(options).map(function (optionId) {
    var value = values[optionId];
    var option = options[optionId];
    var context = option.context ? isDisplay(option.context) : true;

    var _useState = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["useState"])(context),
        _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState, 2),
        isVisible = _useState2[0],
        setVisible = _useState2[1];

    var onChangeVisible = function onChangeVisible(value) {
      setVisible(value);
    };

    if (option.context) {
      toggleVisible(option.context, onChangeVisible);
    }

    Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["useEffect"])(function () {
      kemetGetResponsiveJs();
      jQuery(document).mouseup(function (e) {
        var container = jQuery(document);
        var colorWrap = container.find('.kemet-color-picker-wrap');
        var resetBtnWrap = container.find('.kmt-color-btn-reset-wrap'); // If the target of the click isn't the container nor a descendant of the container.

        if (colorWrap.has(e.target).length === 0 && resetBtnWrap.has(e.target).length === 0) {
          container.find('.components-button.kemet-color-icon-indicate.open').click();
        }
      });
      var event = new CustomEvent("KemetInitMeta", {
        detail: {
          values: values
        }
      });
      document.dispatchEvent(event);
    }, []);
    return isVisible && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(SingleOptionComponent, {
      value: value,
      optionId: optionId,
      option: option,
      onChange: function onChange(newVal) {
        _onChange(newVal, optionId);
      },
      key: optionId
    });
  });
};

function kemetGetResponsiveJs() {
  'use strict';

  var device = 'desktop';

  if (wp.data && wp.data.select && wp.data.select('core/edit-post') && wp.data.select('core/edit-post').__experimentalGetPreviewDeviceType) {
    device = wp.data.select('core/edit-post').__experimentalGetPreviewDeviceType().toLowerCase();
  }

  jQuery(document).find('.kmt-responsive-control-btns > li').removeClass('active');
  jQuery(document).find('.kmt-responsive-control-btns > li.' + device).addClass('active');
  jQuery(document).find('.kmt-responsive-control-btns button i').on('click', function (event) {
    event.preventDefault();
    var device = jQuery(this).parent('button').attr('data-device');

    if ('desktop' == device) {
      device = 'tablet';
    } else if ('tablet' == device) {
      device = 'mobile';
    } else {
      device = 'desktop';
    }

    jQuery(document).find('.kmt-responsive-control-btns > li').removeClass('active');
    jQuery(document).find('.kmt-responsive-control-btns > li.' + device).addClass('active');
  });
}

var OptionsComponent = function OptionsComponent(_ref5) {
  var options = _ref5.options,
      onChange = _ref5.onChange,
      values = _ref5.values;
  Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["useEffect"])(function () {
    var event = new CustomEvent("KemetInitOptionsMeta");
    document.dispatchEvent(event);
  }, []);
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    className: "kmt-options"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(RenderOptions, {
    options: options,
    onChange: onChange,
    values: values
  }));
};

/***/ }),

/***/ "./src/page-options.js":
/*!*****************************!*\
  !*** ./src/page-options.js ***!
  \*****************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_plugins__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/plugins */ "@wordpress/plugins");
/* harmony import */ var _wordpress_plugins__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_plugins__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_edit_post__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/edit-post */ "@wordpress/edit-post");
/* harmony import */ var _wordpress_edit_post__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_edit_post__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/data */ "@wordpress/data");
/* harmony import */ var _wordpress_data__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_data__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _options__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./options */ "./src/options.js");



function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }







var __ = wp.i18n.__;


var kemetPageOptions = function kemetPageOptions(props) {
  var metaValue = props.meta.kemet_meta ? JSON.parse(props.meta.kemet_meta) : {};

  var _useState = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["useState"])(metaValue),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_useState, 2),
      values = _useState2[0],
      setValue = _useState2[1];

  var onChange = function onChange(value, key) {
    var newValues = values;
    newValues[key] = value;
    props.onChange(JSON.stringify(_objectSpread(_objectSpread({}, newValues), {}, {
      flag: !metaValue.flag
    })), 'kemet_meta');
    setValue(newValues);
    var event = new CustomEvent("KemetUpdateMeta", {
      detail: {
        key: key,
        value: value,
        values: newValues
      }
    });
    document.dispatchEvent(event);
  };

  var optionsPreview = function optionsPreview() {
    document.addEventListener('KemetUpdateMeta', function (_ref) {
      var _ref$detail = _ref.detail,
          key = _ref$detail.key,
          value = _ref$detail.value;

      if ('content-layout' === key) {
        var className = '';
        document.body.classList.remove('kmt-separate-container', 'kmt-two-container', 'kmt-page-builder-template', 'kmt-plain-container');

        if ('content-boxed-container' == value) {
          className = 'kmt-separate-container';
        } else if ('boxed-container' == value) {
          className = 'kmt-separate-container';
        } else if ('page-builder' == value) {
          className = 'kmt-page-builder-template';
        } else if ('plain-container' == value) {
          className = 'kmt-plain-container';
        }

        document.body.classList.add(className);
      }

      if ('background' === key) {
        var selector = '.edit-post-visual-editor__content-area, .block-editor-writing-flow';
        var background = {
          desktop: "",
          tablet: "",
          mobile: ""
        };

        if ("" != value["desktop"]) {
          background.desktop = get_background_css(value["desktop"]);
        }

        if ("" != value["tablet"]) {
          background.tablet = get_background_css(value["tablet"]);
        }

        if ("" != value["mobile"]) {
          background.mobile = get_background_css(value["mobile"]);
        }

        var dynamicStyle = selector + "	{ " + background.desktop + " }" + "@media (max-width: 768px) {" + selector + "	{ " + background.tablet + " } }" + "@media (max-width: 544px) {" + selector + "	{ " + background.mobile + " } }";
        var css = dynamicStyle,
            head = document.head || document.getElementsByTagName('head')[0],
            style = document.createElement('style');
        head.appendChild(style);
        style.type = 'text/css';

        if (style.styleSheet) {
          // This is required for IE8 and below.
          style.styleSheet.cssText = css;
        } else {
          style.appendChild(document.createTextNode(css));
        }
      }

      if ('boxed-background' === key) {
        var _background = {
          desktop: "",
          tablet: "",
          mobile: ""
        };

        if ("" != value["desktop"]) {
          _background.desktop = get_background_css(value["desktop"]);
        }

        if ("" != value["tablet"]) {
          _background.tablet = get_background_css(value["tablet"]);
        }

        if ("" != value["mobile"]) {
          _background.mobile = get_background_css(value["mobile"]);
        }

        var _selector = '.kmt-separate-container .block-editor-writing-flow, .kmt-two-container .block-editor-writing-flow';

        var _dynamicStyle = _selector + "	{ " + _background.desktop + " }" + "@media (max-width: 768px) {" + _selector + "	{ " + _background.tablet + " } }" + "@media (max-width: 544px) {" + _selector + "	{ " + _background.mobile + " } }";

        var _css = _dynamicStyle,
            _head = document.head || document.getElementsByTagName('head')[0],
            _style = document.createElement('style');

        _head.appendChild(_style);

        _style.type = 'text/css';

        if (_style.styleSheet) {
          // This is required for IE8 and below.
          _style.styleSheet.cssText = _css;
        } else {
          _style.appendChild(document.createTextNode(_css));
        }
      }
    });
  };

  optionsPreview();
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_edit_post__WEBPACK_IMPORTED_MODULE_4__["PluginSidebarMoreMenuItem"], {
    target: "kemet",
    icon: "admin-customizer"
  }, KemetMetaData.post_type_name + ' ' + __('Settings', 'kemet')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_edit_post__WEBPACK_IMPORTED_MODULE_4__["PluginSidebar"], {
    className: "kmt-post-options",
    isPinnable: true,
    name: "theme-meta-panel",
    title: __('Kemet Settings', 'kemet')
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_options__WEBPACK_IMPORTED_MODULE_8__["OptionsComponent"], {
    options: props.options,
    onChange: onChange,
    values: values
  })));
};

var get_background_css = function get_background_css(bg_obj) {
  var gen_bg_css = "";
  var bg_type = bg_obj["background-type"];
  var bg_img = bg_obj["background-image"];
  var bg_color = bg_obj["background-color"];
  var bg_gradient = bg_obj["background-gradient"];

  if (!bg_color && !bg_img && !bg_gradient) {
    return '';
  } else {
    switch (bg_type) {
      case 'color':
        if (bg_color) {
          gen_bg_css = "background-color: " + bg_color + ";";
          gen_bg_css += "background-image: none;";
        }

        break;

      case 'gradient':
        if (bg_gradient) {
          gen_bg_css += "background-image: " + bg_gradient + ";";
        }

        break;

      case 'image':
        if (bg_img) {
          gen_bg_css = "background-image: url(" + bg_img + ");";
          var backgroundRepeat = "undefined" != typeof bg_obj["background-repeat"] ? bg_obj["background-repeat"] : "repeat",
              backgroundPosition = "undefined" != typeof bg_obj["background-position"] && bg_obj["background-position"],
              backgroundSize = "undefined" != typeof bg_obj["background-size"] ? bg_obj["background-size"] : "auto",
              backgroundAttachment = "undefined" != typeof bg_obj["background-attachment"] ? bg_obj["background-attachment"] : "inherit";

          if (backgroundPosition) {
            if (backgroundPosition.x) {
              gen_bg_css += "background-position-x: " + backgroundPosition.x * 100 + "%;";
            }

            if (backgroundPosition.y) {
              gen_bg_css += "background-position-y: " + backgroundPosition.y * 100 + "%;";
            }
          }

          if (backgroundRepeat) {
            gen_bg_css += "background-repeat: " + backgroundRepeat + ";";
          }

          if (backgroundSize) {
            gen_bg_css += "background-size: " + backgroundSize + ";";
          }

          if (backgroundAttachment) {
            gen_bg_css += "background-attachment: " + backgroundAttachment + ";";
          }
        }

        if (bg_color) {
          gen_bg_css += "background-color: " + bg_color + ";";
        }

        break;
    }

    return gen_bg_css;
  }
};

var KemetOptionsComposed = Object(_wordpress_compose__WEBPACK_IMPORTED_MODULE_6__["compose"])(Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_5__["withSelect"])(function (select) {
  var postMeta = select('core/editor').getEditedPostAttribute('meta');
  var oldPostMeta = select('core/editor').getCurrentPostAttribute('meta');
  return {
    meta: _objectSpread(_objectSpread({}, oldPostMeta), postMeta),
    oldMeta: oldPostMeta,
    options: KemetMetaData.options
  };
}), Object(_wordpress_data__WEBPACK_IMPORTED_MODULE_5__["withDispatch"])(function (dispatch) {
  return {
    onChange: function onChange(value, field) {
      return dispatch('core/editor').editPost({
        meta: _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()({}, field, value)
      });
    }
  };
}))(kemetPageOptions);

if (KemetMetaData) {
  Object(_wordpress_plugins__WEBPACK_IMPORTED_MODULE_3__["registerPlugin"])('kemet', {
    render: function render() {
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(KemetOptionsComposed, {
        name: "kemet"
      });
    }
  });
}

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["components"]; }());

/***/ }),

/***/ "@wordpress/compose":
/*!*********************************!*\
  !*** external ["wp","compose"] ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["compose"]; }());

/***/ }),

/***/ "@wordpress/data":
/*!******************************!*\
  !*** external ["wp","data"] ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["data"]; }());

/***/ }),

/***/ "@wordpress/edit-post":
/*!**********************************!*\
  !*** external ["wp","editPost"] ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["editPost"]; }());

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["element"]; }());

/***/ }),

/***/ "@wordpress/plugins":
/*!*********************************!*\
  !*** external ["wp","plugins"] ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["plugins"]; }());

/***/ })

/******/ });
//# sourceMappingURL=index.js.map