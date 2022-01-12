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
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/preview/preview.js");
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

/***/ "./node_modules/@babel/runtime/helpers/arrayWithoutHoles.js":
/*!******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/arrayWithoutHoles.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayLikeToArray = __webpack_require__(/*! ./arrayLikeToArray.js */ "./node_modules/@babel/runtime/helpers/arrayLikeToArray.js");

function _arrayWithoutHoles(arr) {
  if (Array.isArray(arr)) return arrayLikeToArray(arr);
}

module.exports = _arrayWithoutHoles;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/iterableToArray.js":
/*!****************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/iterableToArray.js ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _iterableToArray(iter) {
  if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter);
}

module.exports = _iterableToArray;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/nonIterableSpread.js":
/*!******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/nonIterableSpread.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}

module.exports = _nonIterableSpread;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/toConsumableArray.js":
/*!******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/toConsumableArray.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayWithoutHoles = __webpack_require__(/*! ./arrayWithoutHoles.js */ "./node_modules/@babel/runtime/helpers/arrayWithoutHoles.js");

var iterableToArray = __webpack_require__(/*! ./iterableToArray.js */ "./node_modules/@babel/runtime/helpers/iterableToArray.js");

var unsupportedIterableToArray = __webpack_require__(/*! ./unsupportedIterableToArray.js */ "./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js");

var nonIterableSpread = __webpack_require__(/*! ./nonIterableSpread.js */ "./node_modules/@babel/runtime/helpers/nonIterableSpread.js");

function _toConsumableArray(arr) {
  return arrayWithoutHoles(arr) || iterableToArray(arr) || unsupportedIterableToArray(arr) || nonIterableSpread();
}

module.exports = _toConsumableArray;
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

/***/ "./src/preview/controls-preivew/background.js":
/*!****************************************************!*\
  !*** ./src/preview/controls-preivew/background.js ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../helpers */ "./src/preview/helpers.js");

var control = '';
var data = {};

var backgroundPreview = function backgroundPreview(controlId, controlData) {
  var responsive = controlData.responsive;
  wp.customize(controlId, function (valueData) {
    valueData.bind(function (value) {
      data = controlData;
      control = controlId;

      if (responsive) {
        applyResponsiveValue(value);
      } else {
        applyBackgroundValue(value);
      }
    });
  });
};

var getBackgroundCssValue = function getBackgroundCssValue(value) {
  var _data = data,
      selector = _data.selector;
  var _value$backgroundTyp = value["background-type"],
      type = _value$backgroundTyp === void 0 ? 'color' : _value$backgroundTyp,
      image = value["background-image"],
      color = value["background-color"],
      gradient = value["background-gradient"],
      position = value["background-position"],
      size = value["background-size"],
      _value$backgroundAtt = value["background-attachment"],
      attachment = _value$backgroundAtt === void 0 ? "inherit" : _value$backgroundAtt,
      _value$backgroundRep = value["background-repeat"],
      repeat = _value$backgroundRep === void 0 ? "repeat" : _value$backgroundRep;
  var dynamicStyle = '';

  switch (type) {
    case 'color':
      dynamicStyle += "background-color: ".concat(color, "; background-image: none;");
      break;

    case 'gradient':
      dynamicStyle += "background-image: ".concat(gradient, ";");
      break;

    case 'image':
      if (image) {
        dynamicStyle += "background-image:  url(".concat(image, ");");

        if (position) {
          if (position.x) {
            dynamicStyle += "background-position-x: ".concat(position.x * 100, "%;");
          }

          if (position.y) {
            dynamicStyle += "background-position-y: ".concat(position.y * 100, "%;");
          }
        }

        if (repeat) {
          dynamicStyle += "background-repeat: ".concat(repeat, ";");
        }

        if (size) {
          dynamicStyle += "background-size: ".concat(size, ";");
        }

        if (attachment) {
          dynamicStyle += "background-attachment: ".concat(attachment, ";");
        }
      }

      if (color) {
        dynamicStyle += "background-color: ".concat(color, ";");
      }

      break;
  }

  dynamicStyle = "".concat(selector, "{ ").concat(dynamicStyle, " }");
  return dynamicStyle;
};

var applyBackgroundValue = function applyBackgroundValue(value) {
  if (value) {
    var dynamicStyle = getBackgroundCssValue(value);
    Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["addCss"])(dynamicStyle, control);
  }
};

var applyResponsiveValue = function applyResponsiveValue(value) {
  if (value) {
    var desktop = value.desktop,
        tablet = value.tablet,
        mobile = value.mobile;
    var dynamicStyle = '';

    if (desktop) {
      dynamicStyle += getBackgroundCssValue(desktop);
    }

    if (tablet) {
      dynamicStyle += "@media (max-width: 768px) { ".concat(getBackgroundCssValue(tablet), " }");
    }

    if (mobile) {
      dynamicStyle += "@media (max-width: 544px) { ".concat(getBackgroundCssValue(mobile), " }");
    }

    Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["addCss"])(dynamicStyle, control);
  }
};

/* harmony default export */ __webpack_exports__["default"] = (backgroundPreview);

/***/ }),

/***/ "./src/preview/controls-preivew/border.js":
/*!************************************************!*\
  !*** ./src/preview/controls-preivew/border.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../helpers */ "./src/preview/helpers.js");

var control = '';
var data = {};

var borderPreview = function borderPreview(controlId, controlData) {
  wp.customize(controlId, function (valueData) {
    valueData.bind(function (value) {
      var responsive = controlData.responsive;
      data = controlData;
      control = controlId;

      if (responsive) {
        applyResponsiveValue(value);
      } else {
        applyBorderValue(value);
      }
    });
  });
};

var getBorderCssValue = function getBorderCssValue(value) {
  var _data = data,
      selector = _data.selector,
      property = _data.property;
  var secondColor = value.secondColor,
      style = value.style,
      width = value.width,
      color = value.color;
  var dynamicStyle = '';

  if (style) {
    if (style === 'none') {
      dynamicStyle += "".concat(selector, "{").concat(property, ": ").concat(style, "}");
    } else {
      dynamicStyle += "".concat(selector, "{").concat(property, ": ").concat(width || 1, "px ").concat(style, " ").concat(color || 'var(--borderColor)', "}");

      if (secondColor) {
        dynamicStyle += "".concat(selector, ":hover{").concat(property, "-color: ").concat(secondColor, " }");
      }
    }
  }

  return dynamicStyle;
};

var applyBorderValue = function applyBorderValue(value) {
  if (value) {
    var dynamicStyle = getBorderCssValue(value);
    Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["addCss"])(dynamicStyle, control);
  }
};

var applyResponsiveValue = function applyResponsiveValue(value) {
  if (value) {
    var desktop = value.desktop,
        tablet = value.tablet,
        mobile = value.mobile;
    var dynamicStyle = '';

    if (desktop) {
      dynamicStyle += getBorderCssValue(desktop);
    }

    if (tablet) {
      dynamicStyle += "@media (max-width: 768px) { ".concat(getBorderCssValue(tablet), " }");
    }

    if (mobile) {
      dynamicStyle += "@media (max-width: 544px) { ".concat(getBorderCssValue(mobile), " }");
    }

    Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["addCss"])(dynamicStyle, control);
  }
};

/* harmony default export */ __webpack_exports__["default"] = (borderPreview);

/***/ }),

/***/ "./src/preview/controls-preivew/box-shadow.js":
/*!****************************************************!*\
  !*** ./src/preview/controls-preivew/box-shadow.js ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../helpers */ "./src/preview/helpers.js");

var control = '';
var data = {};

var boxShadowPreview = function boxShadowPreview(controlId, controlData) {
  wp.customize(controlId, function (valueData) {
    valueData.bind(function (value) {
      data = controlData;
      control = controlId;
      applyboxShadowValue(value);
    });
  });
};

var applyboxShadowValue = function applyboxShadowValue(value) {
  if (value) {
    var offsetX = value.offsetX,
        offsetY = value.offsetY,
        blur = value.blur,
        spread = value.spread,
        color = value.color;
    var dynamicStyle = '';

    if (color && (offsetX || offsetY || blur || spread)) {
      var _data = data,
          selector = _data.selector,
          property = _data.property;
      dynamicStyle += "".concat(selector, "{").concat(property, ":").concat(getShadowSliderValues(value, 'desktop'), " ").concat(color, "}");
      dynamicStyle += "@media (max-width: 768px) { ".concat(selector, "{").concat(property, ":").concat(getShadowSliderValues(value, 'tablet'), " ").concat(color, "} }");
      dynamicStyle += "@media (max-width: 544px) { ".concat(selector, "{").concat(property, ":").concat(getShadowSliderValues(value, 'mobile'), " ").concat(color, "} }");
    }

    Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["addCss"])(dynamicStyle, control);
  }
};

var getShadowSliderValues = function getShadowSliderValues(value, device) {
  var offsetX = value.offsetX,
      offsetY = value.offsetY,
      blur = value.blur,
      spread = value.spread;
  return "".concat(getSliderValue(offsetX, device), " ").concat(getSliderValue(offsetY, device), " ").concat(getSliderValue(blur, device), " ").concat(getSliderValue(spread, device));
};

var getSliderValue = function getSliderValue(value, device) {
  if (value && value[device]) {
    return "".concat(value[device]).concat(value["".concat(device, "-unit")]);
  }

  return '0px';
};

/* harmony default export */ __webpack_exports__["default"] = (boxShadowPreview);

/***/ }),

/***/ "./src/preview/controls-preivew/changeAttr.js":
/*!****************************************************!*\
  !*** ./src/preview/controls-preivew/changeAttr.js ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var changeAttr = function changeAttr(value, data) {
  if (value) {
    var selector = data.selector,
        attr = data.attr;
    var elements = Array.from(document.querySelectorAll(selector));

    if (elements.length > 0) {
      elements.map(function (element) {
        element.setAttribute(attr, value);
      });
    }
  }
};

/* harmony default export */ __webpack_exports__["default"] = (changeAttr);

/***/ }),

/***/ "./src/preview/controls-preivew/color.js":
/*!***********************************************!*\
  !*** ./src/preview/controls-preivew/color.js ***!
  \***********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../helpers */ "./src/preview/helpers.js");

var control = '';
var data = {};

var colorPreview = function colorPreview(controlId, controlData) {
  var responsive = controlData.responsive;
  wp.customize(controlId, function (valueData) {
    valueData.bind(function (value) {
      data = controlData;
      control = controlId;

      if (responsive) {
        applyResponsiveValue(value);
      } else {
        applyColorValue(value);
      }
    });
  });
};

var applyColorValue = function applyColorValue(value) {
  if (value) {
    var controlData = data;
    delete controlData.type;
    var dynamicStyle = '';
    Object.keys(controlData).map(function (colorId) {
      var _controlData$colorId = controlData[colorId],
          property = _controlData$colorId.property,
          selector = _controlData$colorId.selector;
      dynamicStyle += "".concat(selector, "{").concat(property, ": ").concat(value[colorId], "}");
    });
    Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["addCss"])(dynamicStyle, control);
  }
};

var applyResponsiveValue = function applyResponsiveValue(value) {
  if (value) {
    var controlData = data;
    delete controlData.type;
    delete controlData.responsive;
    var desktop = value.desktop,
        tablet = value.tablet,
        mobile = value.mobile;
    var dynamicStyle = '';

    if (desktop) {
      Object.keys(controlData).map(function (colorId) {
        var _controlData$colorId2 = controlData[colorId],
            property = _controlData$colorId2.property,
            selector = _controlData$colorId2.selector;

        if (desktop[colorId]) {
          dynamicStyle += "".concat(selector, "{").concat(property, ": ").concat(desktop[colorId], "}");
        }
      });
    }

    if (tablet) {
      dynamicStyle += "@media (max-width: 768px) {";
      Object.keys(controlData).map(function (colorId) {
        var _controlData$colorId3 = controlData[colorId],
            property = _controlData$colorId3.property,
            selector = _controlData$colorId3.selector;

        if (tablet[colorId]) {
          dynamicStyle += "".concat(selector, "{").concat(property, ": ").concat(tablet[colorId], "}");
        }
      });
      dynamicStyle += '}';
    }

    if (mobile) {
      dynamicStyle += "@media (max-width: 544px) {";
      Object.keys(controlData).map(function (colorId) {
        var _controlData$colorId4 = controlData[colorId],
            property = _controlData$colorId4.property,
            selector = _controlData$colorId4.selector;

        if (mobile[colorId]) {
          dynamicStyle += "".concat(selector, "{").concat(property, ": ").concat(mobile[colorId], "}");
        }
      });
      dynamicStyle += '}';
    }

    Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["addCss"])(dynamicStyle, control);
  }
};

/* harmony default export */ __webpack_exports__["default"] = (colorPreview);

/***/ }),

/***/ "./src/preview/controls-preivew/editor.js":
/*!************************************************!*\
  !*** ./src/preview/controls-preivew/editor.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var editorPreview = function editorPreview(controlId, controlData) {
  wp.customize(controlId, function (valueData) {
    valueData.bind(function (value) {
      var selector = controlData.selector;
      var element = document.querySelector(selector);

      if (element) {
        element.innerHTML = value;
      }
    });
  });
};

/* harmony default export */ __webpack_exports__["default"] = (editorPreview);

/***/ }),

/***/ "./src/preview/controls-preivew/kemet-css.js":
/*!***************************************************!*\
  !*** ./src/preview/controls-preivew/kemet-css.js ***!
  \***************************************************/
/*! exports provided: applyCssValue, applyResponsiveCssValue */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "applyCssValue", function() { return applyCssValue; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "applyResponsiveCssValue", function() { return applyResponsiveCssValue; });
/* harmony import */ var _helpers__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../helpers */ "./src/preview/helpers.js");

var applyCssValue = function applyCssValue(value, data, control) {
  if (value) {
    var selector = data.selector,
        property = data.property;
    var dynamicStyle = "".concat(selector, "{").concat(property, ": ").concat(value, "}");
    Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["addCss"])(dynamicStyle, control);
  }
};
var applyResponsiveCssValue = function applyResponsiveCssValue(value, data, control) {
  if (value) {
    var desktop = value.desktop,
        tablet = value.tablet,
        mobile = value.mobile;
    var selector = data.selector,
        property = data.property;
    var dynamicStyle = '';

    if (desktop) {
      dynamicStyle += "".concat(selector, "{").concat(property, ": ").concat(desktop, "}");
    }

    if (tablet) {
      dynamicStyle += "@media (max-width: 768px) { ".concat(selector, "{").concat(property, ": ").concat(tablet, "} }");
    }

    if (mobile) {
      dynamicStyle += "@media (max-width: 544px) { ".concat(selector, "{").concat(property, ": ").concat(mobile, "} }");
    }

    Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["addCss"])(dynamicStyle, control);
  }
};

/***/ }),

/***/ "./src/preview/controls-preivew/number.js":
/*!************************************************!*\
  !*** ./src/preview/controls-preivew/number.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _kemet_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./kemet-css */ "./src/preview/controls-preivew/kemet-css.js");

var control = '';
var data = {};

var numberPreview = function numberPreview(controlId, controlData) {
  wp.customize(controlId, function (valueData) {
    valueData.bind(function (value) {
      data = controlData;
      control = controlId;
      Object(_kemet_css__WEBPACK_IMPORTED_MODULE_0__["applyCssValue"])(value, data, control);
    });
  });
};

/* harmony default export */ __webpack_exports__["default"] = (numberPreview);

/***/ }),

/***/ "./src/preview/controls-preivew/radio.js":
/*!***********************************************!*\
  !*** ./src/preview/controls-preivew/radio.js ***!
  \***********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _kemet_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./kemet-css */ "./src/preview/controls-preivew/kemet-css.js");
/* harmony import */ var _changeAttr__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./changeAttr */ "./src/preview/controls-preivew/changeAttr.js");


var control = '';
var data = {};

var radioPreview = function radioPreview(controlId, controlData) {
  var responsive = controlData.responsive,
      attr = controlData.attr;
  wp.customize(controlId, function (valueData) {
    valueData.bind(function (value) {
      data = controlData;
      control = controlId;

      if (attr) {
        Object(_changeAttr__WEBPACK_IMPORTED_MODULE_1__["default"])(value, data);
        return;
      }

      if (responsive) {
        Object(_kemet_css__WEBPACK_IMPORTED_MODULE_0__["applyResponsiveCssValue"])(value, data, control);
      } else {
        Object(_kemet_css__WEBPACK_IMPORTED_MODULE_0__["applyCssValue"])(value, data, control);
      }
    });
  });
};

/* harmony default export */ __webpack_exports__["default"] = (radioPreview);

/***/ }),

/***/ "./src/preview/controls-preivew/slider.js":
/*!************************************************!*\
  !*** ./src/preview/controls-preivew/slider.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../helpers */ "./src/preview/helpers.js");

var control = '';
var data = {};

var sliderPreview = function sliderPreview(controlId, controlData) {
  var responsive = controlData.responsive;
  wp.customize(controlId, function (valueData) {
    valueData.bind(function (value) {
      data = controlData;
      control = controlId;

      if (responsive) {
        applyResponsiveValue(value);
      } else {
        applySliderValue(value);
      }
    });
  });
};

var applySliderValue = function applySliderValue(value) {
  if (value) {
    var _data = data,
        selector = _data.selector,
        property = _data.property;
    var newValue = value.value,
        unit = value.unit;
    var dynamicStyle = "".concat(selector, "{").concat(property, ": ").concat(newValue + unit, "}");
    Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["addCss"])(dynamicStyle, control);
  }
};

var applyResponsiveValue = function applyResponsiveValue(value) {
  if (value) {
    var defaultUnit = 'px';
    var desktop = value.desktop,
        tablet = value.tablet,
        mobile = value.mobile,
        desktopUnit = value['desktop-unit'],
        tabletUnit = value['tablet-unit'],
        mobileUnit = value['mobile-unit'];
    var _data2 = data,
        selector = _data2.selector,
        property = _data2.property;
    var dynamicStyle = '';

    if (desktop) {
      dynamicStyle += "".concat(selector, "{").concat(property, ": ").concat(desktop + (desktopUnit || defaultUnit), "}");
    }

    if (tablet) {
      dynamicStyle += "@media (max-width: 768px) { ".concat(selector, "{").concat(property, ": ").concat(tablet + (tabletUnit || defaultUnit), "} }");
    }

    if (mobile) {
      dynamicStyle += "@media (max-width: 544px) { ".concat(selector, "{").concat(property, ": ").concat(mobile + (mobileUnit || defaultUnit), "} }");
    }

    Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["addCss"])(dynamicStyle, control);
  }
};

/* harmony default export */ __webpack_exports__["default"] = (sliderPreview);

/***/ }),

/***/ "./src/preview/controls-preivew/spacing.js":
/*!*************************************************!*\
  !*** ./src/preview/controls-preivew/spacing.js ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../helpers */ "./src/preview/helpers.js");

var control = '';
var data = {};

var spacingPreview = function spacingPreview(controlId, controlData) {
  var responsive = controlData.responsive;
  wp.customize(controlId, function (valueData) {
    valueData.bind(function (value) {
      data = controlData;
      control = controlId;

      if (responsive) {
        applyResponsiveValue(value);
      } else {
        applySpacingValue(value);
      }
    });
  });
};

var allEmpty = function allEmpty(arr) {
  return arr.every(function (e) {
    return e === "";
  });
};

var applySpacingValue = function applySpacingValue(value) {
  if (value) {
    var _data = data,
        selector = _data.selector,
        property = _data.property;
    var newValue = value.value,
        _value$unit = value.unit,
        unit = _value$unit === void 0 ? 'px' : _value$unit;
    var dynamicStyle = '';
    dynamicStyle += "".concat(selector, "{");
    Object.keys(newValue).map(function (side) {
      if (newValue[side] !== '') {
        dynamicStyle += "".concat(property, "-").concat(side, ": ").concat(newValue[side] + unit, ";");
      }
    });
    dynamicStyle += '}';
    Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["addCss"])(dynamicStyle, control);
  }
};

var applyResponsiveValue = function applyResponsiveValue(value) {
  if (value) {
    var defaultUnit = 'px';
    var desktop = value.desktop,
        tablet = value.tablet,
        mobile = value.mobile,
        desktopUnit = value['desktop-unit'],
        tabletUnit = value['tablet-unit'],
        mobileUnit = value['mobile-unit'];
    var _data2 = data,
        selector = _data2.selector,
        property = _data2.property;
    var dynamicStyle = '';

    if (desktop && !allEmpty(Object.values(desktop))) {
      dynamicStyle += "".concat(selector, "{");
      Object.keys(desktop).map(function (side) {
        if (desktop[side] !== '') {
          dynamicStyle += "".concat(property, "-").concat(side, ": ").concat(desktop[side] + (desktopUnit || defaultUnit), ";");
        }
      });
      dynamicStyle += '}';
    }

    console.log(allEmpty(Object.values(tablet)), 'tablet');

    if (tablet && !allEmpty(Object.values(tablet))) {
      dynamicStyle += "@media (max-width: 768px) { ".concat(selector, "{");
      Object.keys(tablet).map(function (side) {
        if (tablet[side] !== '') {
          dynamicStyle += "".concat(property, "-").concat(side, ": ").concat(tablet[side] + (tabletUnit || defaultUnit), ";");
        }
      });
      dynamicStyle += '} }';
    }

    if (mobile && !allEmpty(Object.values(mobile))) {
      dynamicStyle += "@media (max-width: 544px) { ".concat(selector, "{");
      Object.keys(mobile).map(function (side) {
        if (mobile[side] !== '') {
          dynamicStyle += "".concat(property, "-").concat(side, ": ").concat(mobile[side] + (mobileUnit || defaultUnit), ";");
        }
      });
      dynamicStyle += '} }';
    }

    Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["addCss"])(dynamicStyle, control);
  }
};

/* harmony default export */ __webpack_exports__["default"] = (spacingPreview);

/***/ }),

/***/ "./src/preview/controls-preivew/typography.js":
/*!****************************************************!*\
  !*** ./src/preview/controls-preivew/typography.js ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../helpers */ "./src/preview/helpers.js");


var typographyPreview = function typographyPreview(controlId, controlData) {
  wp.customize(controlId, function (valueData) {
    valueData.bind(function (value) {
      var selector = controlData.selector;
      var dynamicStyle = '';
      var family = value.family,
          variation = value.variation,
          size = value.size,
          letterSpacing = value["letter-spacing"],
          lineHeight = value["line-height"],
          textTransform = value["text-transform"],
          textDecoration = value["text-decoration"];

      if (family) {
        var fontName = family;
        var weight = '';
        var style = '';

        if (variation) {
          weight = "".concat(variation[1], "00");
          style = 'i' === variation[0] ? 'italic' : 'normal';

          if (fontName in previewData.googleFonts) {
            fontName = fontName.split(" ").join("+");
            var weightLink = 'italic' === style ? weight + variation[0] : weight;
            weightLink = weightLink ? weightLink : 400;
            var href = "https://fonts.googleapis.com/css?family=".concat(fontName, ":").concat(weightLink, "&display=swap");
            appendFontLink(href, controlId);
          }
        }

        if (family === 'Default') {
          var element = document.querySelector(selector);

          if (element) {
            element.style.removeProperty('--fontFamily');
          }
        } else {
          dynamicStyle += "--fontFamily: ".concat(family, ";");
        }

        dynamicStyle += "--fontWeight: ".concat(weight, ";");
        dynamicStyle += "--fontStyle: ".concat(style, ";");
      }

      if (textTransform) {
        dynamicStyle += "--textTransform: ".concat(textTransform, ";");
      }

      if (textDecoration) {
        dynamicStyle += "--textDecoration: ".concat(textDecoration, ";");
      }

      dynamicStyle = "".concat(selector, "{ ").concat(dynamicStyle, " }");
      console.log(dynamicStyle);

      if (size) {
        dynamicStyle += applyResponsiveValue(selector, '--fontSize', size);
      }

      if (letterSpacing) {
        dynamicStyle += applyResponsiveValue(selector, '--letterSpacing', letterSpacing);
      }

      if (lineHeight) {
        dynamicStyle += applyResponsiveValue(selector, '--lineHeight', lineHeight);
      }

      Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["addCss"])(dynamicStyle, controlId);
    });
  });
};

var applyResponsiveValue = function applyResponsiveValue(selector, property, value) {
  if (value) {
    var defaultUnit = 'px';
    var desktop = value.desktop,
        tablet = value.tablet,
        mobile = value.mobile,
        desktopUnit = value['desktop-unit'],
        tabletUnit = value['tablet-unit'],
        mobileUnit = value['mobile-unit'];
    var dynamicStyle = '';

    if (desktop) {
      dynamicStyle += "".concat(selector, "{").concat(property, ": ").concat(desktop + (desktopUnit || defaultUnit), "}");
    }

    if (tablet) {
      dynamicStyle += "@media (max-width: 768px) { ".concat(selector, "{").concat(property, ": ").concat(tablet + (tabletUnit || defaultUnit), "} }");
    }

    if (mobile) {
      dynamicStyle += "@media (max-width: 544px) { ".concat(selector, "{").concat(property, ": ").concat(mobile + (mobileUnit || defaultUnit), "} }");
    }

    return dynamicStyle;
  }
};

var appendFontLink = function appendFontLink(href, controlId) {
  var prevLink = document.getElementById(controlId + '-font');

  if (prevLink) {
    prevLink.remove();
  }

  var head = document.head || document.getElementsByTagName('head')[0],
      style = document.createElement('link');
  style.setAttribute("id", controlId + '-font');
  style.setAttribute("href", href);
  style.setAttribute("rel", "stylesheet");
  style.setAttribute("media", "all");
  head.appendChild(style);
};

/* harmony default export */ __webpack_exports__["default"] = (typographyPreview);

/***/ }),

/***/ "./src/preview/elements-preview/headerButtons.js":
/*!*******************************************************!*\
  !*** ./src/preview/elements-preview/headerButtons.js ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/toConsumableArray */ "./node_modules/@babel/runtime/helpers/toConsumableArray.js");
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _helpers__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../helpers */ "./src/preview/helpers.js");



var buttonsPreview = function buttonsPreview() {
  var buttons = [].concat(_babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(previewData.buttonItems), _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(previewData.mobileButtonItems));
  buttons.map(function (button) {
    var btnElement = document.querySelector(".".concat(button));

    if (!btnElement) {
      return;
    }

    var prefix = button;
    wp.customize(Object(_helpers__WEBPACK_IMPORTED_MODULE_1__["settingName"])(prefix + "-label"), function (setting) {
      setting.bind(function (label) {
        btnElement.textContent = label;
      });
    });
    wp.customize(Object(_helpers__WEBPACK_IMPORTED_MODULE_1__["settingName"])(prefix + "-url"), function (setting) {
      setting.bind(function (url) {
        btnElement.setAttribute("href", url);
      });
    });
    wp.customize(Object(_helpers__WEBPACK_IMPORTED_MODULE_1__["settingName"])(prefix + "-open-new-tab"), function (setting) {
      setting.bind(function (newTab) {
        var target = newTab ? "_blank" : "_self";
        btnElement.setAttribute("target", target);
      });
    });
    wp.customize(Object(_helpers__WEBPACK_IMPORTED_MODULE_1__["settingName"])(prefix + "-link-nofollow"), function (setting) {
      setting.bind(function (noFollow) {
        var rel = btnElement.getAttribute("rel");
        rel = rel ? rel.replace("nofollow", "").replace(/ /g, "") : "";

        if (noFollow) {
          btnElement.setAttribute("rel", "".concat(rel, " nofollow"));
        } else {
          btnElement.setAttribute("rel", rel);
        }
      });
    });
    wp.customize(Object(_helpers__WEBPACK_IMPORTED_MODULE_1__["settingName"])(prefix + "-link-sponsored"), function (setting) {
      setting.bind(function (sponsored) {
        var rel = btnElement.getAttribute("rel");
        rel = rel ? rel.replace("sponsored", "").replace(/ /g, "") : "";

        if (sponsored) {
          btnElement.setAttribute("rel", "".concat(rel, " sponsored"));
        } else {
          btnElement.setAttribute("rel", rel);
        }
      });
    });
    wp.customize(Object(_helpers__WEBPACK_IMPORTED_MODULE_1__["settingName"])(prefix + "-link-download"), function (setting) {
      setting.bind(function (download) {
        if (download) {
          btnElement.setAttribute("download", true);
        } else {
          btnElement.setAttribute("download", false);
        }
      });
    });
  });
};

/* harmony default export */ __webpack_exports__["default"] = (buttonsPreview);

/***/ }),

/***/ "./src/preview/elements-preview/headerPopup.js":
/*!*****************************************************!*\
  !*** ./src/preview/elements-preview/headerPopup.js ***!
  \*****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../helpers */ "./src/preview/helpers.js");


var popupPreview = function popupPreview() {
  var devices = ["desktop", "mobile"];
  devices.map(function (device) {
    var prefix = device;
    var popupSelector = "#kmt-".concat(prefix, "-popup");
    var popupElement = document.querySelector(popupSelector);

    if (popupElement) {
      var popupContentSelector = ".kmt-".concat(prefix, "-popup-content");
      wp.customize(Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])(prefix + "-popup-slide-width"), function (value) {
        value.bind(function (width) {
          if (width == "") {
            wp.customize.preview.send("refresh");
            return;
          }

          if (width) {
            var _value = width.value,
                unit = width.unit;
            var dynamicStyle = ".kmt-popup-left ".concat(popupContentSelector, ", .kmt-popup-right ").concat(popupContentSelector, "{ max-width: ").concat(_value + unit, " }");
            Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["addCss"])(dynamicStyle, Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])(prefix + "-popup-slide-width"));
          }
        });
      });
      wp.customize(Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])(prefix + "-popup-layout"), function (value) {
        value.bind(function (layout) {
          if (layout == "") {
            wp.customize.preview.send("refresh");
            return;
          }

          if ("full" === layout) {
            popupElement.classList.remove("kmt-popup-left", "kmt-popup-right");
            popupElement.classList.add("kmt-popup-full-width");
          } else {
            var popupSideControl = Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])(prefix + "-popup-slide-side"),
                popupSide = wp.customize._value[popupSideControl]._value;
            popupElement.classList.remove("kmt-popup-left", "kmt-popup-right", "kmt-popup-full-width");
            popupElement.classList.add("kmt-popup-" + popupSide);
          }
        });
      });
      wp.customize(Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])(prefix + "-popup-slide-side"), function (value) {
        value.bind(function (side) {
          if (side == "") {
            wp.customize.preview.send("refresh");
            return;
          }

          popupElement.classList.remove("kmt-popup-left", "kmt-popup-right");
          popupElement.classList.add("kmt-popup-".concat(side));
        });
      });
      wp.customize(Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])(prefix + "-popup-content-align"), function (value) {
        value.bind(function (contentAlign) {
          if (contentAlign == "") {
            wp.customize.preview.send("refresh");
            return;
          }

          popupElement.classList.remove("kmt-popup-align-left", "kmt-popup-align-center", "kmt-popup-align-right");
          popupElement.classList.add("kmt-popup-align-".concat(contentAlign));
        });
      });
      wp.customize(Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])(prefix + "-popup-content-vertical-align"), function (value) {
        value.bind(function (contentAlign) {
          if (contentAlign == "") {
            wp.customize.preview.send("refresh");
            return;
          }

          popupElement.classList.remove("kmt-popup-valign-top", "kmt-popup-valign-center", "kmt-popup-valign-bottom");
          popupElement.classList.add("kmt-popup-valign-".concat(contentAlign));
        });
      });
    }
  });
};

/* harmony default export */ __webpack_exports__["default"] = (popupPreview);

/***/ }),

/***/ "./src/preview/elements-preview/headerRows.js":
/*!****************************************************!*\
  !*** ./src/preview/elements-preview/headerRows.js ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../helpers */ "./src/preview/helpers.js");


var headerRowsPreview = function headerRowsPreview() {
  var rows = ["top", "main", "bottom"];
  rows.map(function (row) {
    var prefix = "".concat(row, "-header");
    var rowSelector = ".kmt-".concat(row, "-header-wrap .").concat(row, "-header-bar");
    var rowElement = document.querySelector(rowSelector);
    wp.customize(Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])(prefix + "-layout"), function (value) {
      value.bind(function (layout) {
        var dynamicStyle = "";

        if (rowElement) {
          var innerRow = document.querySelector("".concat(rowSelector, " .").concat(row, "-header-inner"));
          innerRow.classList.remove("header-bar-content");

          if ("full" === layout) {
            dynamicStyle += "@media (min-width: 921px){ ".concat(rowSelector, " .kmt-container{ max-width: 100%; padding-left: 35px; padding-right: 35px; } }");
          } else if ("stretched" === layout) {
            dynamicStyle += "@media (min-width: 921px){ ".concat(rowSelector, " .kmt-container{ max-width: 100%; padding-left: 0; padding-right: 0; } }");
          } else {
            dynamicStyle += "@media (min-width: 769px){ ".concat(rowSelector, " .kmt-container{ max-width: 1240px; padding-left: 20px; padding-right: 20px; } }");
          }

          if ("stretched" === layout || "boxed" === layout) {
            innerRow.classList.add("header-bar-content");
          }
        }

        Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["addCss"])(dynamicStyle, Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])(prefix + "-layout"));
      });
    });
    wp.customize(Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])(prefix + "-min-height"), function (value) {
      value.bind(function (value) {
        document.dispatchEvent(new CustomEvent("kmtHeaderBarHeightChanged"));
      });
    });
  });
};

/* harmony default export */ __webpack_exports__["default"] = (headerRowsPreview);

/***/ }),

/***/ "./src/preview/elements-preview/toggleButton.js":
/*!******************************************************!*\
  !*** ./src/preview/elements-preview/toggleButton.js ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../helpers */ "./src/preview/helpers.js");


var toggleButtonsPreview = function toggleButtonsPreview() {
  var buttons = ["desktop-toggle-button", "mobile-toggle-button"];
  buttons.map(function (prefix) {
    var buttonSelector = ".".concat(prefix);
    var buttonElement = document.querySelector(buttonSelector);

    if (buttonElement) {
      wp.customize(Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])(prefix + "-float"), function (value) {
        value.bind(function (position) {
          var floatPosition = wp.customize._value[Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])(prefix + "-float-position")]._value;

          buttonElement.classList.remove("toggle-button-fixed", "float-top-left", "float-top-right", "float-bottom-left", "float-bottom-right");

          if (position) {
            buttonElement.classList.add("toggle-button-fixed", "float-".concat(floatPosition));
          }
        });
      });
      wp.customize(Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])(prefix + "-label"), function (setting) {
        setting.bind(function (label) {
          var buttonLabel = document.querySelector("".concat(buttonSelector, " .kmt-popup-label"));

          if (buttonLabel) {
            buttonLabel.textContent = label;
          }
        });
      });
      wp.customize(Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])(prefix + "-float-position"), function (value) {
        value.bind(function (floatPosition) {
          var position = floatPosition.split("-"),
              vOffset = wp.customize._value[Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])(prefix + "-vertical-offset")]._value,
              hOffset = wp.customize._value[Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])(prefix + "-horizontal-offset")]._value;

          buttonElement.classList.remove("float-top-left", "float-top-right", "float-bottom-left", "float-bottom-right");
          buttonElement.classList.add("float-".concat(floatPosition));
          var dynamicStyle = "".concat(buttonSelector, ".toggle-button-fixed.float-").concat(floatPosition, "{").concat(position[0], ": ").concat(vOffset.value + vOffset.unit, "; ").concat(position[1], ": ").concat(hOffset.value + hOffset.unit, "; }");
          Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["addCss"])(dynamicStyle, Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])(prefix + "-float-position"));
        });
      });
      wp.customize(Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])(prefix + "-vertical-offset"), function (value) {
        value.bind(function (offset) {
          var floatPosition = wp.customize._value[Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])(prefix + "-float-position")]._value,
              position = floatPosition.split("-");

          var dynamicStyle = "".concat(buttonSelector, ".toggle-button-fixed.float-").concat(floatPosition, "{ ").concat(position[0], ": ").concat(offset.value + offset.unit, "; }");
          Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["addCss"])(dynamicStyle, Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])(prefix + "-vertical-offset"));
        });
      });
      wp.customize(Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])(prefix + "-horizontal-offset"), function (value) {
        value.bind(function (offset) {
          var floatPosition = wp.customize._value[Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])(prefix + "-float-position")]._value,
              position = floatPosition.split("-");

          var dynamicStyle = "".concat(buttonSelector, ".toggle-button-fixed.float-").concat(floatPosition, "{ ").concat(position[1], ": ").concat(offset.value + offset.unit, "; }");
          Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["addCss"])(dynamicStyle, Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])(prefix + "-vertical-offset"));
        });
      });
    }
  });
};

/* harmony default export */ __webpack_exports__["default"] = (toggleButtonsPreview);

/***/ }),

/***/ "./src/preview/extra-preview.js":
/*!**************************************!*\
  !*** ./src/preview/extra-preview.js ***!
  \**************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./helpers */ "./src/preview/helpers.js");
/* harmony import */ var _elements_preview_headerButtons__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./elements-preview/headerButtons */ "./src/preview/elements-preview/headerButtons.js");
/* harmony import */ var _elements_preview_headerPopup__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./elements-preview/headerPopup */ "./src/preview/elements-preview/headerPopup.js");
/* harmony import */ var _elements_preview_toggleButton__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./elements-preview/toggleButton */ "./src/preview/elements-preview/toggleButton.js");
/* harmony import */ var _elements_preview_headerRows__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./elements-preview/headerRows */ "./src/preview/elements-preview/headerRows.js");





var btnSelector = 'button, .button, .kmt-button, input[type=button], input[type=reset], input[type="submit"], .wp-block-button a.wp-block-button__link, .wp-block-search button.wp-block-search__button';
var btnHoverSelector = 'button:focus, .button:hover, button:hover, .kmt-button:hover, .button:hover, input[type=reset]:hover, input[type=reset]:focus, input#submit:hover, input#submit:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="submit"]:hover, input[type="submit"]:focus, .button:focus, .button:focus, .wp-block-button a.wp-block-button__link:hover, .wp-block-search button.wp-block-search__button:hover';
wp.customize(Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])("button-effect"), function (value) {
  value.bind(function (newValue) {
    var dynamicStyle = "";

    if (newValue) {
      dynamicStyle = "".concat(btnSelector, "{ --buttonShadow: 2px 2px 10px -3px var(--buttonBackgroundColor) !important; }");
    } else {
      dynamicStyle = "".concat(btnSelector, "{ --buttonShadow: none; }");
    }

    Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["addCss"])(dynamicStyle, Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])("button-effect"));
  });
});
wp.customize(Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])("button-hover-effect"), function (value) {
  value.bind(function (newValue) {
    var dynamicStyle = "";

    if (newValue) {
      dynamicStyle = "".concat(btnHoverSelector, "{ --buttonShadow: 2px 2px 10px -3px var(--buttonBackgroundHoverColor,var(--buttonBackgroundColor)) !important; }");
    } else {
      dynamicStyle = "".concat(btnHoverSelector, "{ --buttonShadow: none; }");
    }

    Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["addCss"])(dynamicStyle, Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])("button-hover-effect"));
  });
});
wp.customize(Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])("readmore-as-button"), function (value) {
  value.bind(function (newValue) {
    var allReadMore = Array.from(document.querySelectorAll(".kmt-read-more"));

    if (allReadMore.length > 0) {
      allReadMore.map(function (element) {
        element.classList.remove("button");
        element.parentElement.removeAttribute("data-align");

        if (newValue) {
          var alignControl = Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])("readmore-button-align"),
              align = wp.customize._value[alignControl]._value;
          element.parentElement.setAttribute("data-align", align);
          element.classList.add("button");
        }
      });
    }
  });
});
wp.customize(Object(_helpers__WEBPACK_IMPORTED_MODULE_0__["settingName"])("divider-item-style"), function (value) {
  value.bind(function (newValue) {
    var allDivider = Array.from(document.querySelectorAll(".kmt-divider-container"));

    if (allDivider.length > 0) {
      allDivider.map(function (element) {
        element.classList.remove("divider-vertical");
        element.classList.remove("divider-horizontal");

        if (newValue) {
          element.classList.add(newValue);
        }
      });
    }
  });
});
wp.customize.bind("preview-ready", function () {
  wp.customize.selectiveRefresh.bind("partial-content-rendered", function (response) {
    if (response.partial.id.includes("header-desktop-items") || response.partial.id.includes("header-mobile-items") || response.partial.id.includes("footer-items")) {
      document.dispatchEvent(new CustomEvent("kmtPartialContentRendered", {
        detail: {
          response: response
        }
      }));
    }
  });
});

var editBtn = function editBtn() {
  setTimeout(function () {
    var allEditButtons = Array.from(document.querySelectorAll(".customize-partial-edit-shortcut:not(.kmt-custom-partial-edit-shortcut):not(.kmt-custom-partial-edit)"));

    if (allEditButtons.length > 0) {
      allEditButtons.map(function (element) {
        element.remove();
      });
    }
  }, 0);
  var defaultTarget = window.parent === window ? null : window.parent;
  var allButtons = Array.from(document.querySelectorAll(".site-builder-focus-item .item-customizer-focus, .kmt-item-focus .edit-buidler-item"));

  if (allButtons.length > 0) {
    allButtons.map(function (element) {
      element.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();
        var item = e.target.classList.contains("item-customizer-focus") ? e.target.closest(".site-builder-focus-item") : e.target.closest(".kmt-item-focus");
        var sectionId = item.getAttribute("data-section") || "";

        if (sectionId) {
          if (defaultTarget.wp.customize.section(sectionId)) {
            defaultTarget.wp.customize.section(sectionId).focus();
          }
        }
      });
    });
  }
};

wp.customize.bind("preview-ready", function () {
  editBtn();
});
document.addEventListener("kmtPartialContentRendered", function () {
  editBtn();
});
document.addEventListener("DOMContentLoaded", function () {
  Object(_elements_preview_headerButtons__WEBPACK_IMPORTED_MODULE_1__["default"])();
  Object(_elements_preview_headerPopup__WEBPACK_IMPORTED_MODULE_2__["default"])();
  Object(_elements_preview_toggleButton__WEBPACK_IMPORTED_MODULE_3__["default"])();
  Object(_elements_preview_headerRows__WEBPACK_IMPORTED_MODULE_4__["default"])();
});
document.addEventListener("kmtPartialContentRendered", function () {
  Object(_elements_preview_headerButtons__WEBPACK_IMPORTED_MODULE_1__["default"])();
  Object(_elements_preview_headerPopup__WEBPACK_IMPORTED_MODULE_2__["default"])();
  Object(_elements_preview_toggleButton__WEBPACK_IMPORTED_MODULE_3__["default"])();
  Object(_elements_preview_headerRows__WEBPACK_IMPORTED_MODULE_4__["default"])();
});

/***/ }),

/***/ "./src/preview/helpers.js":
/*!********************************!*\
  !*** ./src/preview/helpers.js ***!
  \********************************/
/*! exports provided: addCss, settingName */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addCss", function() { return addCss; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "settingName", function() { return settingName; });
var addCss = function addCss(css, control) {
  var prevStyleSheet = document.getElementById(control);

  if (prevStyleSheet) {
    prevStyleSheet.remove();
  }

  var head = document.head || document.getElementsByTagName('head')[0],
      style = document.createElement('style');
  style.setAttribute("id", control);
  head.appendChild(style);
  style.type = 'text/css';

  if (style.styleSheet) {
    // This is required for IE8 and below.
    style.styleSheet.cssText = css;
  } else {
    style.appendChild(document.createTextNode(css));
  }
};
var settingName = function settingName(_settingName) {
  var setting = previewData.setting.replace("setting_name", _settingName);
  return setting;
};

/***/ }),

/***/ "./src/preview/preview.js":
/*!********************************!*\
  !*** ./src/preview/preview.js ***!
  \********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _controls_preivew_slider__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./controls-preivew/slider */ "./src/preview/controls-preivew/slider.js");
/* harmony import */ var _controls_preivew_spacing__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./controls-preivew/spacing */ "./src/preview/controls-preivew/spacing.js");
/* harmony import */ var _controls_preivew_color__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./controls-preivew/color */ "./src/preview/controls-preivew/color.js");
/* harmony import */ var _controls_preivew_radio__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./controls-preivew/radio */ "./src/preview/controls-preivew/radio.js");
/* harmony import */ var _controls_preivew_number__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./controls-preivew/number */ "./src/preview/controls-preivew/number.js");
/* harmony import */ var _controls_preivew_border__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./controls-preivew/border */ "./src/preview/controls-preivew/border.js");
/* harmony import */ var _controls_preivew_background__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./controls-preivew/background */ "./src/preview/controls-preivew/background.js");
/* harmony import */ var _controls_preivew_editor__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./controls-preivew/editor */ "./src/preview/controls-preivew/editor.js");
/* harmony import */ var _controls_preivew_typography__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./controls-preivew/typography */ "./src/preview/controls-preivew/typography.js");
/* harmony import */ var _controls_preivew_box_shadow__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./controls-preivew/box-shadow */ "./src/preview/controls-preivew/box-shadow.js");
/* harmony import */ var _extra_preview__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./extra-preview */ "./src/preview/extra-preview.js");












if (previewData.preview) {
  Object.keys(previewData.preview).forEach(function (control) {
    var data = previewData.preview[control];
    var type = previewData.preview[control].type;

    switch (type) {
      case "kmt-slider":
        Object(_controls_preivew_slider__WEBPACK_IMPORTED_MODULE_0__["default"])(control, data);
        break;

      case "kmt-spacing":
        Object(_controls_preivew_spacing__WEBPACK_IMPORTED_MODULE_1__["default"])(control, data);
        break;

      case "kmt-color":
        Object(_controls_preivew_color__WEBPACK_IMPORTED_MODULE_2__["default"])(control, data);
        break;

      case "kmt-radio":
      case "kmt-icon-select":
      case "kmt-select":
        Object(_controls_preivew_radio__WEBPACK_IMPORTED_MODULE_3__["default"])(control, data);
        break;

      case "kmt-number":
        Object(_controls_preivew_number__WEBPACK_IMPORTED_MODULE_4__["default"])(control, data);
        break;

      case "kmt-border":
        Object(_controls_preivew_border__WEBPACK_IMPORTED_MODULE_5__["default"])(control, data);
        break;

      case "kmt-background":
        Object(_controls_preivew_background__WEBPACK_IMPORTED_MODULE_6__["default"])(control, data);
        break;

      case 'kmt-editor':
        Object(_controls_preivew_editor__WEBPACK_IMPORTED_MODULE_7__["default"])(control, data);
        break;

      case 'kmt-typography':
        Object(_controls_preivew_typography__WEBPACK_IMPORTED_MODULE_8__["default"])(control, data);
        break;

      case 'kmt-box-shadow':
        Object(_controls_preivew_box_shadow__WEBPACK_IMPORTED_MODULE_9__["default"])(control, data);
        break;
    }
  });
}

/***/ })

/******/ });
//# sourceMappingURL=preview.js.map