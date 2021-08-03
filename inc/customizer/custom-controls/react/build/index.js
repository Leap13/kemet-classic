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

/***/ "./node_modules/@babel/runtime/helpers/assertThisInitialized.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/assertThisInitialized.js ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _assertThisInitialized(self) {
  if (self === void 0) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }

  return self;
}

module.exports = _assertThisInitialized;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/classCallCheck.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/classCallCheck.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

module.exports = _classCallCheck;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/createClass.js":
/*!************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/createClass.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}

module.exports = _createClass;
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

/***/ "./node_modules/@babel/runtime/helpers/extends.js":
/*!********************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/extends.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _extends() {
  module.exports = _extends = Object.assign || function (target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i];

      for (var key in source) {
        if (Object.prototype.hasOwnProperty.call(source, key)) {
          target[key] = source[key];
        }
      }
    }

    return target;
  };

  module.exports["default"] = module.exports, module.exports.__esModule = true;
  return _extends.apply(this, arguments);
}

module.exports = _extends;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/getPrototypeOf.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/getPrototypeOf.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _getPrototypeOf(o) {
  module.exports = _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) {
    return o.__proto__ || Object.getPrototypeOf(o);
  };
  module.exports["default"] = module.exports, module.exports.__esModule = true;
  return _getPrototypeOf(o);
}

module.exports = _getPrototypeOf;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/inherits.js":
/*!*********************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/inherits.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var setPrototypeOf = __webpack_require__(/*! ./setPrototypeOf.js */ "./node_modules/@babel/runtime/helpers/setPrototypeOf.js");

function _inherits(subClass, superClass) {
  if (typeof superClass !== "function" && superClass !== null) {
    throw new TypeError("Super expression must either be null or a function");
  }

  subClass.prototype = Object.create(superClass && superClass.prototype, {
    constructor: {
      value: subClass,
      writable: true,
      configurable: true
    }
  });
  if (superClass) setPrototypeOf(subClass, superClass);
}

module.exports = _inherits;
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

/***/ "./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js":
/*!**************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js ***!
  \**************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var _typeof = __webpack_require__(/*! @babel/runtime/helpers/typeof */ "./node_modules/@babel/runtime/helpers/typeof.js")["default"];

var assertThisInitialized = __webpack_require__(/*! ./assertThisInitialized.js */ "./node_modules/@babel/runtime/helpers/assertThisInitialized.js");

function _possibleConstructorReturn(self, call) {
  if (call && (_typeof(call) === "object" || typeof call === "function")) {
    return call;
  }

  return assertThisInitialized(self);
}

module.exports = _possibleConstructorReturn;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/setPrototypeOf.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/setPrototypeOf.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _setPrototypeOf(o, p) {
  module.exports = _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) {
    o.__proto__ = p;
    return o;
  };

  module.exports["default"] = module.exports, module.exports.__esModule = true;
  return _setPrototypeOf(o, p);
}

module.exports = _setPrototypeOf;
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

/***/ "./node_modules/@babel/runtime/helpers/typeof.js":
/*!*******************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/typeof.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _typeof(obj) {
  "@babel/helpers - typeof";

  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    module.exports = _typeof = function _typeof(obj) {
      return typeof obj;
    };

    module.exports["default"] = module.exports, module.exports.__esModule = true;
  } else {
    module.exports = _typeof = function _typeof(obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };

    module.exports["default"] = module.exports, module.exports.__esModule = true;
  }

  return _typeof(obj);
}

module.exports = _typeof;
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

/***/ "./node_modules/classnames/index.js":
/*!******************************************!*\
  !*** ./node_modules/classnames/index.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;/*!
  Copyright (c) 2018 Jed Watson.
  Licensed under the MIT License (MIT), see
  http://jedwatson.github.io/classnames
*/
/* global define */

(function () {
	'use strict';

	var hasOwn = {}.hasOwnProperty;

	function classNames() {
		var classes = [];

		for (var i = 0; i < arguments.length; i++) {
			var arg = arguments[i];
			if (!arg) continue;

			var argType = typeof arg;

			if (argType === 'string' || argType === 'number') {
				classes.push(arg);
			} else if (Array.isArray(arg)) {
				if (arg.length) {
					var inner = classNames.apply(null, arg);
					if (inner) {
						classes.push(inner);
					}
				}
			} else if (argType === 'object') {
				if (arg.toString === Object.prototype.toString) {
					for (var key in arg) {
						if (hasOwn.call(arg, key) && arg[key]) {
							classes.push(key);
						}
					}
				} else {
					classes.push(arg.toString());
				}
			}
		}

		return classes.join(' ');
	}

	if ( true && module.exports) {
		classNames.default = classNames;
		module.exports = classNames;
	} else if (true) {
		// register as 'classnames', consistent with npm package name
		!(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function () {
			return classNames;
		}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
	} else {}
}());


/***/ }),

/***/ "./node_modules/lodash/_DataView.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_DataView.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var getNative = __webpack_require__(/*! ./_getNative */ "./node_modules/lodash/_getNative.js"),
    root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js");

/* Built-in method references that are verified to be native. */
var DataView = getNative(root, 'DataView');

module.exports = DataView;


/***/ }),

/***/ "./node_modules/lodash/_Hash.js":
/*!**************************************!*\
  !*** ./node_modules/lodash/_Hash.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var hashClear = __webpack_require__(/*! ./_hashClear */ "./node_modules/lodash/_hashClear.js"),
    hashDelete = __webpack_require__(/*! ./_hashDelete */ "./node_modules/lodash/_hashDelete.js"),
    hashGet = __webpack_require__(/*! ./_hashGet */ "./node_modules/lodash/_hashGet.js"),
    hashHas = __webpack_require__(/*! ./_hashHas */ "./node_modules/lodash/_hashHas.js"),
    hashSet = __webpack_require__(/*! ./_hashSet */ "./node_modules/lodash/_hashSet.js");

/**
 * Creates a hash object.
 *
 * @private
 * @constructor
 * @param {Array} [entries] The key-value pairs to cache.
 */
function Hash(entries) {
  var index = -1,
      length = entries == null ? 0 : entries.length;

  this.clear();
  while (++index < length) {
    var entry = entries[index];
    this.set(entry[0], entry[1]);
  }
}

// Add methods to `Hash`.
Hash.prototype.clear = hashClear;
Hash.prototype['delete'] = hashDelete;
Hash.prototype.get = hashGet;
Hash.prototype.has = hashHas;
Hash.prototype.set = hashSet;

module.exports = Hash;


/***/ }),

/***/ "./node_modules/lodash/_ListCache.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_ListCache.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var listCacheClear = __webpack_require__(/*! ./_listCacheClear */ "./node_modules/lodash/_listCacheClear.js"),
    listCacheDelete = __webpack_require__(/*! ./_listCacheDelete */ "./node_modules/lodash/_listCacheDelete.js"),
    listCacheGet = __webpack_require__(/*! ./_listCacheGet */ "./node_modules/lodash/_listCacheGet.js"),
    listCacheHas = __webpack_require__(/*! ./_listCacheHas */ "./node_modules/lodash/_listCacheHas.js"),
    listCacheSet = __webpack_require__(/*! ./_listCacheSet */ "./node_modules/lodash/_listCacheSet.js");

/**
 * Creates an list cache object.
 *
 * @private
 * @constructor
 * @param {Array} [entries] The key-value pairs to cache.
 */
function ListCache(entries) {
  var index = -1,
      length = entries == null ? 0 : entries.length;

  this.clear();
  while (++index < length) {
    var entry = entries[index];
    this.set(entry[0], entry[1]);
  }
}

// Add methods to `ListCache`.
ListCache.prototype.clear = listCacheClear;
ListCache.prototype['delete'] = listCacheDelete;
ListCache.prototype.get = listCacheGet;
ListCache.prototype.has = listCacheHas;
ListCache.prototype.set = listCacheSet;

module.exports = ListCache;


/***/ }),

/***/ "./node_modules/lodash/_Map.js":
/*!*************************************!*\
  !*** ./node_modules/lodash/_Map.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var getNative = __webpack_require__(/*! ./_getNative */ "./node_modules/lodash/_getNative.js"),
    root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js");

/* Built-in method references that are verified to be native. */
var Map = getNative(root, 'Map');

module.exports = Map;


/***/ }),

/***/ "./node_modules/lodash/_MapCache.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_MapCache.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var mapCacheClear = __webpack_require__(/*! ./_mapCacheClear */ "./node_modules/lodash/_mapCacheClear.js"),
    mapCacheDelete = __webpack_require__(/*! ./_mapCacheDelete */ "./node_modules/lodash/_mapCacheDelete.js"),
    mapCacheGet = __webpack_require__(/*! ./_mapCacheGet */ "./node_modules/lodash/_mapCacheGet.js"),
    mapCacheHas = __webpack_require__(/*! ./_mapCacheHas */ "./node_modules/lodash/_mapCacheHas.js"),
    mapCacheSet = __webpack_require__(/*! ./_mapCacheSet */ "./node_modules/lodash/_mapCacheSet.js");

/**
 * Creates a map cache object to store key-value pairs.
 *
 * @private
 * @constructor
 * @param {Array} [entries] The key-value pairs to cache.
 */
function MapCache(entries) {
  var index = -1,
      length = entries == null ? 0 : entries.length;

  this.clear();
  while (++index < length) {
    var entry = entries[index];
    this.set(entry[0], entry[1]);
  }
}

// Add methods to `MapCache`.
MapCache.prototype.clear = mapCacheClear;
MapCache.prototype['delete'] = mapCacheDelete;
MapCache.prototype.get = mapCacheGet;
MapCache.prototype.has = mapCacheHas;
MapCache.prototype.set = mapCacheSet;

module.exports = MapCache;


/***/ }),

/***/ "./node_modules/lodash/_Promise.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/_Promise.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var getNative = __webpack_require__(/*! ./_getNative */ "./node_modules/lodash/_getNative.js"),
    root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js");

/* Built-in method references that are verified to be native. */
var Promise = getNative(root, 'Promise');

module.exports = Promise;


/***/ }),

/***/ "./node_modules/lodash/_Set.js":
/*!*************************************!*\
  !*** ./node_modules/lodash/_Set.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var getNative = __webpack_require__(/*! ./_getNative */ "./node_modules/lodash/_getNative.js"),
    root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js");

/* Built-in method references that are verified to be native. */
var Set = getNative(root, 'Set');

module.exports = Set;


/***/ }),

/***/ "./node_modules/lodash/_SetCache.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_SetCache.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var MapCache = __webpack_require__(/*! ./_MapCache */ "./node_modules/lodash/_MapCache.js"),
    setCacheAdd = __webpack_require__(/*! ./_setCacheAdd */ "./node_modules/lodash/_setCacheAdd.js"),
    setCacheHas = __webpack_require__(/*! ./_setCacheHas */ "./node_modules/lodash/_setCacheHas.js");

/**
 *
 * Creates an array cache object to store unique values.
 *
 * @private
 * @constructor
 * @param {Array} [values] The values to cache.
 */
function SetCache(values) {
  var index = -1,
      length = values == null ? 0 : values.length;

  this.__data__ = new MapCache;
  while (++index < length) {
    this.add(values[index]);
  }
}

// Add methods to `SetCache`.
SetCache.prototype.add = SetCache.prototype.push = setCacheAdd;
SetCache.prototype.has = setCacheHas;

module.exports = SetCache;


/***/ }),

/***/ "./node_modules/lodash/_Stack.js":
/*!***************************************!*\
  !*** ./node_modules/lodash/_Stack.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var ListCache = __webpack_require__(/*! ./_ListCache */ "./node_modules/lodash/_ListCache.js"),
    stackClear = __webpack_require__(/*! ./_stackClear */ "./node_modules/lodash/_stackClear.js"),
    stackDelete = __webpack_require__(/*! ./_stackDelete */ "./node_modules/lodash/_stackDelete.js"),
    stackGet = __webpack_require__(/*! ./_stackGet */ "./node_modules/lodash/_stackGet.js"),
    stackHas = __webpack_require__(/*! ./_stackHas */ "./node_modules/lodash/_stackHas.js"),
    stackSet = __webpack_require__(/*! ./_stackSet */ "./node_modules/lodash/_stackSet.js");

/**
 * Creates a stack cache object to store key-value pairs.
 *
 * @private
 * @constructor
 * @param {Array} [entries] The key-value pairs to cache.
 */
function Stack(entries) {
  var data = this.__data__ = new ListCache(entries);
  this.size = data.size;
}

// Add methods to `Stack`.
Stack.prototype.clear = stackClear;
Stack.prototype['delete'] = stackDelete;
Stack.prototype.get = stackGet;
Stack.prototype.has = stackHas;
Stack.prototype.set = stackSet;

module.exports = Stack;


/***/ }),

/***/ "./node_modules/lodash/_Symbol.js":
/*!****************************************!*\
  !*** ./node_modules/lodash/_Symbol.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js");

/** Built-in value references. */
var Symbol = root.Symbol;

module.exports = Symbol;


/***/ }),

/***/ "./node_modules/lodash/_Uint8Array.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_Uint8Array.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js");

/** Built-in value references. */
var Uint8Array = root.Uint8Array;

module.exports = Uint8Array;


/***/ }),

/***/ "./node_modules/lodash/_WeakMap.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/_WeakMap.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var getNative = __webpack_require__(/*! ./_getNative */ "./node_modules/lodash/_getNative.js"),
    root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js");

/* Built-in method references that are verified to be native. */
var WeakMap = getNative(root, 'WeakMap');

module.exports = WeakMap;


/***/ }),

/***/ "./node_modules/lodash/_arrayFilter.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_arrayFilter.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * A specialized version of `_.filter` for arrays without support for
 * iteratee shorthands.
 *
 * @private
 * @param {Array} [array] The array to iterate over.
 * @param {Function} predicate The function invoked per iteration.
 * @returns {Array} Returns the new filtered array.
 */
function arrayFilter(array, predicate) {
  var index = -1,
      length = array == null ? 0 : array.length,
      resIndex = 0,
      result = [];

  while (++index < length) {
    var value = array[index];
    if (predicate(value, index, array)) {
      result[resIndex++] = value;
    }
  }
  return result;
}

module.exports = arrayFilter;


/***/ }),

/***/ "./node_modules/lodash/_arrayLikeKeys.js":
/*!***********************************************!*\
  !*** ./node_modules/lodash/_arrayLikeKeys.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var baseTimes = __webpack_require__(/*! ./_baseTimes */ "./node_modules/lodash/_baseTimes.js"),
    isArguments = __webpack_require__(/*! ./isArguments */ "./node_modules/lodash/isArguments.js"),
    isArray = __webpack_require__(/*! ./isArray */ "./node_modules/lodash/isArray.js"),
    isBuffer = __webpack_require__(/*! ./isBuffer */ "./node_modules/lodash/isBuffer.js"),
    isIndex = __webpack_require__(/*! ./_isIndex */ "./node_modules/lodash/_isIndex.js"),
    isTypedArray = __webpack_require__(/*! ./isTypedArray */ "./node_modules/lodash/isTypedArray.js");

/** Used for built-in method references. */
var objectProto = Object.prototype;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/**
 * Creates an array of the enumerable property names of the array-like `value`.
 *
 * @private
 * @param {*} value The value to query.
 * @param {boolean} inherited Specify returning inherited property names.
 * @returns {Array} Returns the array of property names.
 */
function arrayLikeKeys(value, inherited) {
  var isArr = isArray(value),
      isArg = !isArr && isArguments(value),
      isBuff = !isArr && !isArg && isBuffer(value),
      isType = !isArr && !isArg && !isBuff && isTypedArray(value),
      skipIndexes = isArr || isArg || isBuff || isType,
      result = skipIndexes ? baseTimes(value.length, String) : [],
      length = result.length;

  for (var key in value) {
    if ((inherited || hasOwnProperty.call(value, key)) &&
        !(skipIndexes && (
           // Safari 9 has enumerable `arguments.length` in strict mode.
           key == 'length' ||
           // Node.js 0.10 has enumerable non-index properties on buffers.
           (isBuff && (key == 'offset' || key == 'parent')) ||
           // PhantomJS 2 has enumerable non-index properties on typed arrays.
           (isType && (key == 'buffer' || key == 'byteLength' || key == 'byteOffset')) ||
           // Skip index properties.
           isIndex(key, length)
        ))) {
      result.push(key);
    }
  }
  return result;
}

module.exports = arrayLikeKeys;


/***/ }),

/***/ "./node_modules/lodash/_arrayMap.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_arrayMap.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * A specialized version of `_.map` for arrays without support for iteratee
 * shorthands.
 *
 * @private
 * @param {Array} [array] The array to iterate over.
 * @param {Function} iteratee The function invoked per iteration.
 * @returns {Array} Returns the new mapped array.
 */
function arrayMap(array, iteratee) {
  var index = -1,
      length = array == null ? 0 : array.length,
      result = Array(length);

  while (++index < length) {
    result[index] = iteratee(array[index], index, array);
  }
  return result;
}

module.exports = arrayMap;


/***/ }),

/***/ "./node_modules/lodash/_arrayPush.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_arrayPush.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Appends the elements of `values` to `array`.
 *
 * @private
 * @param {Array} array The array to modify.
 * @param {Array} values The values to append.
 * @returns {Array} Returns `array`.
 */
function arrayPush(array, values) {
  var index = -1,
      length = values.length,
      offset = array.length;

  while (++index < length) {
    array[offset + index] = values[index];
  }
  return array;
}

module.exports = arrayPush;


/***/ }),

/***/ "./node_modules/lodash/_arraySome.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_arraySome.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * A specialized version of `_.some` for arrays without support for iteratee
 * shorthands.
 *
 * @private
 * @param {Array} [array] The array to iterate over.
 * @param {Function} predicate The function invoked per iteration.
 * @returns {boolean} Returns `true` if any element passes the predicate check,
 *  else `false`.
 */
function arraySome(array, predicate) {
  var index = -1,
      length = array == null ? 0 : array.length;

  while (++index < length) {
    if (predicate(array[index], index, array)) {
      return true;
    }
  }
  return false;
}

module.exports = arraySome;


/***/ }),

/***/ "./node_modules/lodash/_assocIndexOf.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_assocIndexOf.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var eq = __webpack_require__(/*! ./eq */ "./node_modules/lodash/eq.js");

/**
 * Gets the index at which the `key` is found in `array` of key-value pairs.
 *
 * @private
 * @param {Array} array The array to inspect.
 * @param {*} key The key to search for.
 * @returns {number} Returns the index of the matched value, else `-1`.
 */
function assocIndexOf(array, key) {
  var length = array.length;
  while (length--) {
    if (eq(array[length][0], key)) {
      return length;
    }
  }
  return -1;
}

module.exports = assocIndexOf;


/***/ }),

/***/ "./node_modules/lodash/_baseEach.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_baseEach.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var baseForOwn = __webpack_require__(/*! ./_baseForOwn */ "./node_modules/lodash/_baseForOwn.js"),
    createBaseEach = __webpack_require__(/*! ./_createBaseEach */ "./node_modules/lodash/_createBaseEach.js");

/**
 * The base implementation of `_.forEach` without support for iteratee shorthands.
 *
 * @private
 * @param {Array|Object} collection The collection to iterate over.
 * @param {Function} iteratee The function invoked per iteration.
 * @returns {Array|Object} Returns `collection`.
 */
var baseEach = createBaseEach(baseForOwn);

module.exports = baseEach;


/***/ }),

/***/ "./node_modules/lodash/_baseFor.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/_baseFor.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var createBaseFor = __webpack_require__(/*! ./_createBaseFor */ "./node_modules/lodash/_createBaseFor.js");

/**
 * The base implementation of `baseForOwn` which iterates over `object`
 * properties returned by `keysFunc` and invokes `iteratee` for each property.
 * Iteratee functions may exit iteration early by explicitly returning `false`.
 *
 * @private
 * @param {Object} object The object to iterate over.
 * @param {Function} iteratee The function invoked per iteration.
 * @param {Function} keysFunc The function to get the keys of `object`.
 * @returns {Object} Returns `object`.
 */
var baseFor = createBaseFor();

module.exports = baseFor;


/***/ }),

/***/ "./node_modules/lodash/_baseForOwn.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_baseForOwn.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var baseFor = __webpack_require__(/*! ./_baseFor */ "./node_modules/lodash/_baseFor.js"),
    keys = __webpack_require__(/*! ./keys */ "./node_modules/lodash/keys.js");

/**
 * The base implementation of `_.forOwn` without support for iteratee shorthands.
 *
 * @private
 * @param {Object} object The object to iterate over.
 * @param {Function} iteratee The function invoked per iteration.
 * @returns {Object} Returns `object`.
 */
function baseForOwn(object, iteratee) {
  return object && baseFor(object, iteratee, keys);
}

module.exports = baseForOwn;


/***/ }),

/***/ "./node_modules/lodash/_baseGet.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/_baseGet.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var castPath = __webpack_require__(/*! ./_castPath */ "./node_modules/lodash/_castPath.js"),
    toKey = __webpack_require__(/*! ./_toKey */ "./node_modules/lodash/_toKey.js");

/**
 * The base implementation of `_.get` without support for default values.
 *
 * @private
 * @param {Object} object The object to query.
 * @param {Array|string} path The path of the property to get.
 * @returns {*} Returns the resolved value.
 */
function baseGet(object, path) {
  path = castPath(path, object);

  var index = 0,
      length = path.length;

  while (object != null && index < length) {
    object = object[toKey(path[index++])];
  }
  return (index && index == length) ? object : undefined;
}

module.exports = baseGet;


/***/ }),

/***/ "./node_modules/lodash/_baseGetAllKeys.js":
/*!************************************************!*\
  !*** ./node_modules/lodash/_baseGetAllKeys.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayPush = __webpack_require__(/*! ./_arrayPush */ "./node_modules/lodash/_arrayPush.js"),
    isArray = __webpack_require__(/*! ./isArray */ "./node_modules/lodash/isArray.js");

/**
 * The base implementation of `getAllKeys` and `getAllKeysIn` which uses
 * `keysFunc` and `symbolsFunc` to get the enumerable property names and
 * symbols of `object`.
 *
 * @private
 * @param {Object} object The object to query.
 * @param {Function} keysFunc The function to get the keys of `object`.
 * @param {Function} symbolsFunc The function to get the symbols of `object`.
 * @returns {Array} Returns the array of property names and symbols.
 */
function baseGetAllKeys(object, keysFunc, symbolsFunc) {
  var result = keysFunc(object);
  return isArray(object) ? result : arrayPush(result, symbolsFunc(object));
}

module.exports = baseGetAllKeys;


/***/ }),

/***/ "./node_modules/lodash/_baseGetTag.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_baseGetTag.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var Symbol = __webpack_require__(/*! ./_Symbol */ "./node_modules/lodash/_Symbol.js"),
    getRawTag = __webpack_require__(/*! ./_getRawTag */ "./node_modules/lodash/_getRawTag.js"),
    objectToString = __webpack_require__(/*! ./_objectToString */ "./node_modules/lodash/_objectToString.js");

/** `Object#toString` result references. */
var nullTag = '[object Null]',
    undefinedTag = '[object Undefined]';

/** Built-in value references. */
var symToStringTag = Symbol ? Symbol.toStringTag : undefined;

/**
 * The base implementation of `getTag` without fallbacks for buggy environments.
 *
 * @private
 * @param {*} value The value to query.
 * @returns {string} Returns the `toStringTag`.
 */
function baseGetTag(value) {
  if (value == null) {
    return value === undefined ? undefinedTag : nullTag;
  }
  return (symToStringTag && symToStringTag in Object(value))
    ? getRawTag(value)
    : objectToString(value);
}

module.exports = baseGetTag;


/***/ }),

/***/ "./node_modules/lodash/_baseHasIn.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_baseHasIn.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * The base implementation of `_.hasIn` without support for deep paths.
 *
 * @private
 * @param {Object} [object] The object to query.
 * @param {Array|string} key The key to check.
 * @returns {boolean} Returns `true` if `key` exists, else `false`.
 */
function baseHasIn(object, key) {
  return object != null && key in Object(object);
}

module.exports = baseHasIn;


/***/ }),

/***/ "./node_modules/lodash/_baseIsArguments.js":
/*!*************************************************!*\
  !*** ./node_modules/lodash/_baseIsArguments.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var baseGetTag = __webpack_require__(/*! ./_baseGetTag */ "./node_modules/lodash/_baseGetTag.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js");

/** `Object#toString` result references. */
var argsTag = '[object Arguments]';

/**
 * The base implementation of `_.isArguments`.
 *
 * @private
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is an `arguments` object,
 */
function baseIsArguments(value) {
  return isObjectLike(value) && baseGetTag(value) == argsTag;
}

module.exports = baseIsArguments;


/***/ }),

/***/ "./node_modules/lodash/_baseIsEqual.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_baseIsEqual.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var baseIsEqualDeep = __webpack_require__(/*! ./_baseIsEqualDeep */ "./node_modules/lodash/_baseIsEqualDeep.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js");

/**
 * The base implementation of `_.isEqual` which supports partial comparisons
 * and tracks traversed objects.
 *
 * @private
 * @param {*} value The value to compare.
 * @param {*} other The other value to compare.
 * @param {boolean} bitmask The bitmask flags.
 *  1 - Unordered comparison
 *  2 - Partial comparison
 * @param {Function} [customizer] The function to customize comparisons.
 * @param {Object} [stack] Tracks traversed `value` and `other` objects.
 * @returns {boolean} Returns `true` if the values are equivalent, else `false`.
 */
function baseIsEqual(value, other, bitmask, customizer, stack) {
  if (value === other) {
    return true;
  }
  if (value == null || other == null || (!isObjectLike(value) && !isObjectLike(other))) {
    return value !== value && other !== other;
  }
  return baseIsEqualDeep(value, other, bitmask, customizer, baseIsEqual, stack);
}

module.exports = baseIsEqual;


/***/ }),

/***/ "./node_modules/lodash/_baseIsEqualDeep.js":
/*!*************************************************!*\
  !*** ./node_modules/lodash/_baseIsEqualDeep.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var Stack = __webpack_require__(/*! ./_Stack */ "./node_modules/lodash/_Stack.js"),
    equalArrays = __webpack_require__(/*! ./_equalArrays */ "./node_modules/lodash/_equalArrays.js"),
    equalByTag = __webpack_require__(/*! ./_equalByTag */ "./node_modules/lodash/_equalByTag.js"),
    equalObjects = __webpack_require__(/*! ./_equalObjects */ "./node_modules/lodash/_equalObjects.js"),
    getTag = __webpack_require__(/*! ./_getTag */ "./node_modules/lodash/_getTag.js"),
    isArray = __webpack_require__(/*! ./isArray */ "./node_modules/lodash/isArray.js"),
    isBuffer = __webpack_require__(/*! ./isBuffer */ "./node_modules/lodash/isBuffer.js"),
    isTypedArray = __webpack_require__(/*! ./isTypedArray */ "./node_modules/lodash/isTypedArray.js");

/** Used to compose bitmasks for value comparisons. */
var COMPARE_PARTIAL_FLAG = 1;

/** `Object#toString` result references. */
var argsTag = '[object Arguments]',
    arrayTag = '[object Array]',
    objectTag = '[object Object]';

/** Used for built-in method references. */
var objectProto = Object.prototype;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/**
 * A specialized version of `baseIsEqual` for arrays and objects which performs
 * deep comparisons and tracks traversed objects enabling objects with circular
 * references to be compared.
 *
 * @private
 * @param {Object} object The object to compare.
 * @param {Object} other The other object to compare.
 * @param {number} bitmask The bitmask flags. See `baseIsEqual` for more details.
 * @param {Function} customizer The function to customize comparisons.
 * @param {Function} equalFunc The function to determine equivalents of values.
 * @param {Object} [stack] Tracks traversed `object` and `other` objects.
 * @returns {boolean} Returns `true` if the objects are equivalent, else `false`.
 */
function baseIsEqualDeep(object, other, bitmask, customizer, equalFunc, stack) {
  var objIsArr = isArray(object),
      othIsArr = isArray(other),
      objTag = objIsArr ? arrayTag : getTag(object),
      othTag = othIsArr ? arrayTag : getTag(other);

  objTag = objTag == argsTag ? objectTag : objTag;
  othTag = othTag == argsTag ? objectTag : othTag;

  var objIsObj = objTag == objectTag,
      othIsObj = othTag == objectTag,
      isSameTag = objTag == othTag;

  if (isSameTag && isBuffer(object)) {
    if (!isBuffer(other)) {
      return false;
    }
    objIsArr = true;
    objIsObj = false;
  }
  if (isSameTag && !objIsObj) {
    stack || (stack = new Stack);
    return (objIsArr || isTypedArray(object))
      ? equalArrays(object, other, bitmask, customizer, equalFunc, stack)
      : equalByTag(object, other, objTag, bitmask, customizer, equalFunc, stack);
  }
  if (!(bitmask & COMPARE_PARTIAL_FLAG)) {
    var objIsWrapped = objIsObj && hasOwnProperty.call(object, '__wrapped__'),
        othIsWrapped = othIsObj && hasOwnProperty.call(other, '__wrapped__');

    if (objIsWrapped || othIsWrapped) {
      var objUnwrapped = objIsWrapped ? object.value() : object,
          othUnwrapped = othIsWrapped ? other.value() : other;

      stack || (stack = new Stack);
      return equalFunc(objUnwrapped, othUnwrapped, bitmask, customizer, stack);
    }
  }
  if (!isSameTag) {
    return false;
  }
  stack || (stack = new Stack);
  return equalObjects(object, other, bitmask, customizer, equalFunc, stack);
}

module.exports = baseIsEqualDeep;


/***/ }),

/***/ "./node_modules/lodash/_baseIsMatch.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_baseIsMatch.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var Stack = __webpack_require__(/*! ./_Stack */ "./node_modules/lodash/_Stack.js"),
    baseIsEqual = __webpack_require__(/*! ./_baseIsEqual */ "./node_modules/lodash/_baseIsEqual.js");

/** Used to compose bitmasks for value comparisons. */
var COMPARE_PARTIAL_FLAG = 1,
    COMPARE_UNORDERED_FLAG = 2;

/**
 * The base implementation of `_.isMatch` without support for iteratee shorthands.
 *
 * @private
 * @param {Object} object The object to inspect.
 * @param {Object} source The object of property values to match.
 * @param {Array} matchData The property names, values, and compare flags to match.
 * @param {Function} [customizer] The function to customize comparisons.
 * @returns {boolean} Returns `true` if `object` is a match, else `false`.
 */
function baseIsMatch(object, source, matchData, customizer) {
  var index = matchData.length,
      length = index,
      noCustomizer = !customizer;

  if (object == null) {
    return !length;
  }
  object = Object(object);
  while (index--) {
    var data = matchData[index];
    if ((noCustomizer && data[2])
          ? data[1] !== object[data[0]]
          : !(data[0] in object)
        ) {
      return false;
    }
  }
  while (++index < length) {
    data = matchData[index];
    var key = data[0],
        objValue = object[key],
        srcValue = data[1];

    if (noCustomizer && data[2]) {
      if (objValue === undefined && !(key in object)) {
        return false;
      }
    } else {
      var stack = new Stack;
      if (customizer) {
        var result = customizer(objValue, srcValue, key, object, source, stack);
      }
      if (!(result === undefined
            ? baseIsEqual(srcValue, objValue, COMPARE_PARTIAL_FLAG | COMPARE_UNORDERED_FLAG, customizer, stack)
            : result
          )) {
        return false;
      }
    }
  }
  return true;
}

module.exports = baseIsMatch;


/***/ }),

/***/ "./node_modules/lodash/_baseIsNative.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_baseIsNative.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var isFunction = __webpack_require__(/*! ./isFunction */ "./node_modules/lodash/isFunction.js"),
    isMasked = __webpack_require__(/*! ./_isMasked */ "./node_modules/lodash/_isMasked.js"),
    isObject = __webpack_require__(/*! ./isObject */ "./node_modules/lodash/isObject.js"),
    toSource = __webpack_require__(/*! ./_toSource */ "./node_modules/lodash/_toSource.js");

/**
 * Used to match `RegExp`
 * [syntax characters](http://ecma-international.org/ecma-262/7.0/#sec-patterns).
 */
var reRegExpChar = /[\\^$.*+?()[\]{}|]/g;

/** Used to detect host constructors (Safari). */
var reIsHostCtor = /^\[object .+?Constructor\]$/;

/** Used for built-in method references. */
var funcProto = Function.prototype,
    objectProto = Object.prototype;

/** Used to resolve the decompiled source of functions. */
var funcToString = funcProto.toString;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/** Used to detect if a method is native. */
var reIsNative = RegExp('^' +
  funcToString.call(hasOwnProperty).replace(reRegExpChar, '\\$&')
  .replace(/hasOwnProperty|(function).*?(?=\\\()| for .+?(?=\\\])/g, '$1.*?') + '$'
);

/**
 * The base implementation of `_.isNative` without bad shim checks.
 *
 * @private
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a native function,
 *  else `false`.
 */
function baseIsNative(value) {
  if (!isObject(value) || isMasked(value)) {
    return false;
  }
  var pattern = isFunction(value) ? reIsNative : reIsHostCtor;
  return pattern.test(toSource(value));
}

module.exports = baseIsNative;


/***/ }),

/***/ "./node_modules/lodash/_baseIsTypedArray.js":
/*!**************************************************!*\
  !*** ./node_modules/lodash/_baseIsTypedArray.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var baseGetTag = __webpack_require__(/*! ./_baseGetTag */ "./node_modules/lodash/_baseGetTag.js"),
    isLength = __webpack_require__(/*! ./isLength */ "./node_modules/lodash/isLength.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js");

/** `Object#toString` result references. */
var argsTag = '[object Arguments]',
    arrayTag = '[object Array]',
    boolTag = '[object Boolean]',
    dateTag = '[object Date]',
    errorTag = '[object Error]',
    funcTag = '[object Function]',
    mapTag = '[object Map]',
    numberTag = '[object Number]',
    objectTag = '[object Object]',
    regexpTag = '[object RegExp]',
    setTag = '[object Set]',
    stringTag = '[object String]',
    weakMapTag = '[object WeakMap]';

var arrayBufferTag = '[object ArrayBuffer]',
    dataViewTag = '[object DataView]',
    float32Tag = '[object Float32Array]',
    float64Tag = '[object Float64Array]',
    int8Tag = '[object Int8Array]',
    int16Tag = '[object Int16Array]',
    int32Tag = '[object Int32Array]',
    uint8Tag = '[object Uint8Array]',
    uint8ClampedTag = '[object Uint8ClampedArray]',
    uint16Tag = '[object Uint16Array]',
    uint32Tag = '[object Uint32Array]';

/** Used to identify `toStringTag` values of typed arrays. */
var typedArrayTags = {};
typedArrayTags[float32Tag] = typedArrayTags[float64Tag] =
typedArrayTags[int8Tag] = typedArrayTags[int16Tag] =
typedArrayTags[int32Tag] = typedArrayTags[uint8Tag] =
typedArrayTags[uint8ClampedTag] = typedArrayTags[uint16Tag] =
typedArrayTags[uint32Tag] = true;
typedArrayTags[argsTag] = typedArrayTags[arrayTag] =
typedArrayTags[arrayBufferTag] = typedArrayTags[boolTag] =
typedArrayTags[dataViewTag] = typedArrayTags[dateTag] =
typedArrayTags[errorTag] = typedArrayTags[funcTag] =
typedArrayTags[mapTag] = typedArrayTags[numberTag] =
typedArrayTags[objectTag] = typedArrayTags[regexpTag] =
typedArrayTags[setTag] = typedArrayTags[stringTag] =
typedArrayTags[weakMapTag] = false;

/**
 * The base implementation of `_.isTypedArray` without Node.js optimizations.
 *
 * @private
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a typed array, else `false`.
 */
function baseIsTypedArray(value) {
  return isObjectLike(value) &&
    isLength(value.length) && !!typedArrayTags[baseGetTag(value)];
}

module.exports = baseIsTypedArray;


/***/ }),

/***/ "./node_modules/lodash/_baseIteratee.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_baseIteratee.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var baseMatches = __webpack_require__(/*! ./_baseMatches */ "./node_modules/lodash/_baseMatches.js"),
    baseMatchesProperty = __webpack_require__(/*! ./_baseMatchesProperty */ "./node_modules/lodash/_baseMatchesProperty.js"),
    identity = __webpack_require__(/*! ./identity */ "./node_modules/lodash/identity.js"),
    isArray = __webpack_require__(/*! ./isArray */ "./node_modules/lodash/isArray.js"),
    property = __webpack_require__(/*! ./property */ "./node_modules/lodash/property.js");

/**
 * The base implementation of `_.iteratee`.
 *
 * @private
 * @param {*} [value=_.identity] The value to convert to an iteratee.
 * @returns {Function} Returns the iteratee.
 */
function baseIteratee(value) {
  // Don't store the `typeof` result in a variable to avoid a JIT bug in Safari 9.
  // See https://bugs.webkit.org/show_bug.cgi?id=156034 for more details.
  if (typeof value == 'function') {
    return value;
  }
  if (value == null) {
    return identity;
  }
  if (typeof value == 'object') {
    return isArray(value)
      ? baseMatchesProperty(value[0], value[1])
      : baseMatches(value);
  }
  return property(value);
}

module.exports = baseIteratee;


/***/ }),

/***/ "./node_modules/lodash/_baseKeys.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_baseKeys.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var isPrototype = __webpack_require__(/*! ./_isPrototype */ "./node_modules/lodash/_isPrototype.js"),
    nativeKeys = __webpack_require__(/*! ./_nativeKeys */ "./node_modules/lodash/_nativeKeys.js");

/** Used for built-in method references. */
var objectProto = Object.prototype;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/**
 * The base implementation of `_.keys` which doesn't treat sparse arrays as dense.
 *
 * @private
 * @param {Object} object The object to query.
 * @returns {Array} Returns the array of property names.
 */
function baseKeys(object) {
  if (!isPrototype(object)) {
    return nativeKeys(object);
  }
  var result = [];
  for (var key in Object(object)) {
    if (hasOwnProperty.call(object, key) && key != 'constructor') {
      result.push(key);
    }
  }
  return result;
}

module.exports = baseKeys;


/***/ }),

/***/ "./node_modules/lodash/_baseMap.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/_baseMap.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var baseEach = __webpack_require__(/*! ./_baseEach */ "./node_modules/lodash/_baseEach.js"),
    isArrayLike = __webpack_require__(/*! ./isArrayLike */ "./node_modules/lodash/isArrayLike.js");

/**
 * The base implementation of `_.map` without support for iteratee shorthands.
 *
 * @private
 * @param {Array|Object} collection The collection to iterate over.
 * @param {Function} iteratee The function invoked per iteration.
 * @returns {Array} Returns the new mapped array.
 */
function baseMap(collection, iteratee) {
  var index = -1,
      result = isArrayLike(collection) ? Array(collection.length) : [];

  baseEach(collection, function(value, key, collection) {
    result[++index] = iteratee(value, key, collection);
  });
  return result;
}

module.exports = baseMap;


/***/ }),

/***/ "./node_modules/lodash/_baseMatches.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_baseMatches.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var baseIsMatch = __webpack_require__(/*! ./_baseIsMatch */ "./node_modules/lodash/_baseIsMatch.js"),
    getMatchData = __webpack_require__(/*! ./_getMatchData */ "./node_modules/lodash/_getMatchData.js"),
    matchesStrictComparable = __webpack_require__(/*! ./_matchesStrictComparable */ "./node_modules/lodash/_matchesStrictComparable.js");

/**
 * The base implementation of `_.matches` which doesn't clone `source`.
 *
 * @private
 * @param {Object} source The object of property values to match.
 * @returns {Function} Returns the new spec function.
 */
function baseMatches(source) {
  var matchData = getMatchData(source);
  if (matchData.length == 1 && matchData[0][2]) {
    return matchesStrictComparable(matchData[0][0], matchData[0][1]);
  }
  return function(object) {
    return object === source || baseIsMatch(object, source, matchData);
  };
}

module.exports = baseMatches;


/***/ }),

/***/ "./node_modules/lodash/_baseMatchesProperty.js":
/*!*****************************************************!*\
  !*** ./node_modules/lodash/_baseMatchesProperty.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var baseIsEqual = __webpack_require__(/*! ./_baseIsEqual */ "./node_modules/lodash/_baseIsEqual.js"),
    get = __webpack_require__(/*! ./get */ "./node_modules/lodash/get.js"),
    hasIn = __webpack_require__(/*! ./hasIn */ "./node_modules/lodash/hasIn.js"),
    isKey = __webpack_require__(/*! ./_isKey */ "./node_modules/lodash/_isKey.js"),
    isStrictComparable = __webpack_require__(/*! ./_isStrictComparable */ "./node_modules/lodash/_isStrictComparable.js"),
    matchesStrictComparable = __webpack_require__(/*! ./_matchesStrictComparable */ "./node_modules/lodash/_matchesStrictComparable.js"),
    toKey = __webpack_require__(/*! ./_toKey */ "./node_modules/lodash/_toKey.js");

/** Used to compose bitmasks for value comparisons. */
var COMPARE_PARTIAL_FLAG = 1,
    COMPARE_UNORDERED_FLAG = 2;

/**
 * The base implementation of `_.matchesProperty` which doesn't clone `srcValue`.
 *
 * @private
 * @param {string} path The path of the property to get.
 * @param {*} srcValue The value to match.
 * @returns {Function} Returns the new spec function.
 */
function baseMatchesProperty(path, srcValue) {
  if (isKey(path) && isStrictComparable(srcValue)) {
    return matchesStrictComparable(toKey(path), srcValue);
  }
  return function(object) {
    var objValue = get(object, path);
    return (objValue === undefined && objValue === srcValue)
      ? hasIn(object, path)
      : baseIsEqual(srcValue, objValue, COMPARE_PARTIAL_FLAG | COMPARE_UNORDERED_FLAG);
  };
}

module.exports = baseMatchesProperty;


/***/ }),

/***/ "./node_modules/lodash/_baseProperty.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_baseProperty.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * The base implementation of `_.property` without support for deep paths.
 *
 * @private
 * @param {string} key The key of the property to get.
 * @returns {Function} Returns the new accessor function.
 */
function baseProperty(key) {
  return function(object) {
    return object == null ? undefined : object[key];
  };
}

module.exports = baseProperty;


/***/ }),

/***/ "./node_modules/lodash/_basePropertyDeep.js":
/*!**************************************************!*\
  !*** ./node_modules/lodash/_basePropertyDeep.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var baseGet = __webpack_require__(/*! ./_baseGet */ "./node_modules/lodash/_baseGet.js");

/**
 * A specialized version of `baseProperty` which supports deep paths.
 *
 * @private
 * @param {Array|string} path The path of the property to get.
 * @returns {Function} Returns the new accessor function.
 */
function basePropertyDeep(path) {
  return function(object) {
    return baseGet(object, path);
  };
}

module.exports = basePropertyDeep;


/***/ }),

/***/ "./node_modules/lodash/_baseTimes.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_baseTimes.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * The base implementation of `_.times` without support for iteratee shorthands
 * or max array length checks.
 *
 * @private
 * @param {number} n The number of times to invoke `iteratee`.
 * @param {Function} iteratee The function invoked per iteration.
 * @returns {Array} Returns the array of results.
 */
function baseTimes(n, iteratee) {
  var index = -1,
      result = Array(n);

  while (++index < n) {
    result[index] = iteratee(index);
  }
  return result;
}

module.exports = baseTimes;


/***/ }),

/***/ "./node_modules/lodash/_baseToString.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_baseToString.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var Symbol = __webpack_require__(/*! ./_Symbol */ "./node_modules/lodash/_Symbol.js"),
    arrayMap = __webpack_require__(/*! ./_arrayMap */ "./node_modules/lodash/_arrayMap.js"),
    isArray = __webpack_require__(/*! ./isArray */ "./node_modules/lodash/isArray.js"),
    isSymbol = __webpack_require__(/*! ./isSymbol */ "./node_modules/lodash/isSymbol.js");

/** Used as references for various `Number` constants. */
var INFINITY = 1 / 0;

/** Used to convert symbols to primitives and strings. */
var symbolProto = Symbol ? Symbol.prototype : undefined,
    symbolToString = symbolProto ? symbolProto.toString : undefined;

/**
 * The base implementation of `_.toString` which doesn't convert nullish
 * values to empty strings.
 *
 * @private
 * @param {*} value The value to process.
 * @returns {string} Returns the string.
 */
function baseToString(value) {
  // Exit early for strings to avoid a performance hit in some environments.
  if (typeof value == 'string') {
    return value;
  }
  if (isArray(value)) {
    // Recursively convert values (susceptible to call stack limits).
    return arrayMap(value, baseToString) + '';
  }
  if (isSymbol(value)) {
    return symbolToString ? symbolToString.call(value) : '';
  }
  var result = (value + '');
  return (result == '0' && (1 / value) == -INFINITY) ? '-0' : result;
}

module.exports = baseToString;


/***/ }),

/***/ "./node_modules/lodash/_baseUnary.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_baseUnary.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * The base implementation of `_.unary` without support for storing metadata.
 *
 * @private
 * @param {Function} func The function to cap arguments for.
 * @returns {Function} Returns the new capped function.
 */
function baseUnary(func) {
  return function(value) {
    return func(value);
  };
}

module.exports = baseUnary;


/***/ }),

/***/ "./node_modules/lodash/_cacheHas.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_cacheHas.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Checks if a `cache` value for `key` exists.
 *
 * @private
 * @param {Object} cache The cache to query.
 * @param {string} key The key of the entry to check.
 * @returns {boolean} Returns `true` if an entry for `key` exists, else `false`.
 */
function cacheHas(cache, key) {
  return cache.has(key);
}

module.exports = cacheHas;


/***/ }),

/***/ "./node_modules/lodash/_castPath.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_castPath.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var isArray = __webpack_require__(/*! ./isArray */ "./node_modules/lodash/isArray.js"),
    isKey = __webpack_require__(/*! ./_isKey */ "./node_modules/lodash/_isKey.js"),
    stringToPath = __webpack_require__(/*! ./_stringToPath */ "./node_modules/lodash/_stringToPath.js"),
    toString = __webpack_require__(/*! ./toString */ "./node_modules/lodash/toString.js");

/**
 * Casts `value` to a path array if it's not one.
 *
 * @private
 * @param {*} value The value to inspect.
 * @param {Object} [object] The object to query keys on.
 * @returns {Array} Returns the cast property path array.
 */
function castPath(value, object) {
  if (isArray(value)) {
    return value;
  }
  return isKey(value, object) ? [value] : stringToPath(toString(value));
}

module.exports = castPath;


/***/ }),

/***/ "./node_modules/lodash/_coreJsData.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_coreJsData.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js");

/** Used to detect overreaching core-js shims. */
var coreJsData = root['__core-js_shared__'];

module.exports = coreJsData;


/***/ }),

/***/ "./node_modules/lodash/_createBaseEach.js":
/*!************************************************!*\
  !*** ./node_modules/lodash/_createBaseEach.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var isArrayLike = __webpack_require__(/*! ./isArrayLike */ "./node_modules/lodash/isArrayLike.js");

/**
 * Creates a `baseEach` or `baseEachRight` function.
 *
 * @private
 * @param {Function} eachFunc The function to iterate over a collection.
 * @param {boolean} [fromRight] Specify iterating from right to left.
 * @returns {Function} Returns the new base function.
 */
function createBaseEach(eachFunc, fromRight) {
  return function(collection, iteratee) {
    if (collection == null) {
      return collection;
    }
    if (!isArrayLike(collection)) {
      return eachFunc(collection, iteratee);
    }
    var length = collection.length,
        index = fromRight ? length : -1,
        iterable = Object(collection);

    while ((fromRight ? index-- : ++index < length)) {
      if (iteratee(iterable[index], index, iterable) === false) {
        break;
      }
    }
    return collection;
  };
}

module.exports = createBaseEach;


/***/ }),

/***/ "./node_modules/lodash/_createBaseFor.js":
/*!***********************************************!*\
  !*** ./node_modules/lodash/_createBaseFor.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Creates a base function for methods like `_.forIn` and `_.forOwn`.
 *
 * @private
 * @param {boolean} [fromRight] Specify iterating from right to left.
 * @returns {Function} Returns the new base function.
 */
function createBaseFor(fromRight) {
  return function(object, iteratee, keysFunc) {
    var index = -1,
        iterable = Object(object),
        props = keysFunc(object),
        length = props.length;

    while (length--) {
      var key = props[fromRight ? length : ++index];
      if (iteratee(iterable[key], key, iterable) === false) {
        break;
      }
    }
    return object;
  };
}

module.exports = createBaseFor;


/***/ }),

/***/ "./node_modules/lodash/_equalArrays.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_equalArrays.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var SetCache = __webpack_require__(/*! ./_SetCache */ "./node_modules/lodash/_SetCache.js"),
    arraySome = __webpack_require__(/*! ./_arraySome */ "./node_modules/lodash/_arraySome.js"),
    cacheHas = __webpack_require__(/*! ./_cacheHas */ "./node_modules/lodash/_cacheHas.js");

/** Used to compose bitmasks for value comparisons. */
var COMPARE_PARTIAL_FLAG = 1,
    COMPARE_UNORDERED_FLAG = 2;

/**
 * A specialized version of `baseIsEqualDeep` for arrays with support for
 * partial deep comparisons.
 *
 * @private
 * @param {Array} array The array to compare.
 * @param {Array} other The other array to compare.
 * @param {number} bitmask The bitmask flags. See `baseIsEqual` for more details.
 * @param {Function} customizer The function to customize comparisons.
 * @param {Function} equalFunc The function to determine equivalents of values.
 * @param {Object} stack Tracks traversed `array` and `other` objects.
 * @returns {boolean} Returns `true` if the arrays are equivalent, else `false`.
 */
function equalArrays(array, other, bitmask, customizer, equalFunc, stack) {
  var isPartial = bitmask & COMPARE_PARTIAL_FLAG,
      arrLength = array.length,
      othLength = other.length;

  if (arrLength != othLength && !(isPartial && othLength > arrLength)) {
    return false;
  }
  // Check that cyclic values are equal.
  var arrStacked = stack.get(array);
  var othStacked = stack.get(other);
  if (arrStacked && othStacked) {
    return arrStacked == other && othStacked == array;
  }
  var index = -1,
      result = true,
      seen = (bitmask & COMPARE_UNORDERED_FLAG) ? new SetCache : undefined;

  stack.set(array, other);
  stack.set(other, array);

  // Ignore non-index properties.
  while (++index < arrLength) {
    var arrValue = array[index],
        othValue = other[index];

    if (customizer) {
      var compared = isPartial
        ? customizer(othValue, arrValue, index, other, array, stack)
        : customizer(arrValue, othValue, index, array, other, stack);
    }
    if (compared !== undefined) {
      if (compared) {
        continue;
      }
      result = false;
      break;
    }
    // Recursively compare arrays (susceptible to call stack limits).
    if (seen) {
      if (!arraySome(other, function(othValue, othIndex) {
            if (!cacheHas(seen, othIndex) &&
                (arrValue === othValue || equalFunc(arrValue, othValue, bitmask, customizer, stack))) {
              return seen.push(othIndex);
            }
          })) {
        result = false;
        break;
      }
    } else if (!(
          arrValue === othValue ||
            equalFunc(arrValue, othValue, bitmask, customizer, stack)
        )) {
      result = false;
      break;
    }
  }
  stack['delete'](array);
  stack['delete'](other);
  return result;
}

module.exports = equalArrays;


/***/ }),

/***/ "./node_modules/lodash/_equalByTag.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_equalByTag.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var Symbol = __webpack_require__(/*! ./_Symbol */ "./node_modules/lodash/_Symbol.js"),
    Uint8Array = __webpack_require__(/*! ./_Uint8Array */ "./node_modules/lodash/_Uint8Array.js"),
    eq = __webpack_require__(/*! ./eq */ "./node_modules/lodash/eq.js"),
    equalArrays = __webpack_require__(/*! ./_equalArrays */ "./node_modules/lodash/_equalArrays.js"),
    mapToArray = __webpack_require__(/*! ./_mapToArray */ "./node_modules/lodash/_mapToArray.js"),
    setToArray = __webpack_require__(/*! ./_setToArray */ "./node_modules/lodash/_setToArray.js");

/** Used to compose bitmasks for value comparisons. */
var COMPARE_PARTIAL_FLAG = 1,
    COMPARE_UNORDERED_FLAG = 2;

/** `Object#toString` result references. */
var boolTag = '[object Boolean]',
    dateTag = '[object Date]',
    errorTag = '[object Error]',
    mapTag = '[object Map]',
    numberTag = '[object Number]',
    regexpTag = '[object RegExp]',
    setTag = '[object Set]',
    stringTag = '[object String]',
    symbolTag = '[object Symbol]';

var arrayBufferTag = '[object ArrayBuffer]',
    dataViewTag = '[object DataView]';

/** Used to convert symbols to primitives and strings. */
var symbolProto = Symbol ? Symbol.prototype : undefined,
    symbolValueOf = symbolProto ? symbolProto.valueOf : undefined;

/**
 * A specialized version of `baseIsEqualDeep` for comparing objects of
 * the same `toStringTag`.
 *
 * **Note:** This function only supports comparing values with tags of
 * `Boolean`, `Date`, `Error`, `Number`, `RegExp`, or `String`.
 *
 * @private
 * @param {Object} object The object to compare.
 * @param {Object} other The other object to compare.
 * @param {string} tag The `toStringTag` of the objects to compare.
 * @param {number} bitmask The bitmask flags. See `baseIsEqual` for more details.
 * @param {Function} customizer The function to customize comparisons.
 * @param {Function} equalFunc The function to determine equivalents of values.
 * @param {Object} stack Tracks traversed `object` and `other` objects.
 * @returns {boolean} Returns `true` if the objects are equivalent, else `false`.
 */
function equalByTag(object, other, tag, bitmask, customizer, equalFunc, stack) {
  switch (tag) {
    case dataViewTag:
      if ((object.byteLength != other.byteLength) ||
          (object.byteOffset != other.byteOffset)) {
        return false;
      }
      object = object.buffer;
      other = other.buffer;

    case arrayBufferTag:
      if ((object.byteLength != other.byteLength) ||
          !equalFunc(new Uint8Array(object), new Uint8Array(other))) {
        return false;
      }
      return true;

    case boolTag:
    case dateTag:
    case numberTag:
      // Coerce booleans to `1` or `0` and dates to milliseconds.
      // Invalid dates are coerced to `NaN`.
      return eq(+object, +other);

    case errorTag:
      return object.name == other.name && object.message == other.message;

    case regexpTag:
    case stringTag:
      // Coerce regexes to strings and treat strings, primitives and objects,
      // as equal. See http://www.ecma-international.org/ecma-262/7.0/#sec-regexp.prototype.tostring
      // for more details.
      return object == (other + '');

    case mapTag:
      var convert = mapToArray;

    case setTag:
      var isPartial = bitmask & COMPARE_PARTIAL_FLAG;
      convert || (convert = setToArray);

      if (object.size != other.size && !isPartial) {
        return false;
      }
      // Assume cyclic values are equal.
      var stacked = stack.get(object);
      if (stacked) {
        return stacked == other;
      }
      bitmask |= COMPARE_UNORDERED_FLAG;

      // Recursively compare objects (susceptible to call stack limits).
      stack.set(object, other);
      var result = equalArrays(convert(object), convert(other), bitmask, customizer, equalFunc, stack);
      stack['delete'](object);
      return result;

    case symbolTag:
      if (symbolValueOf) {
        return symbolValueOf.call(object) == symbolValueOf.call(other);
      }
  }
  return false;
}

module.exports = equalByTag;


/***/ }),

/***/ "./node_modules/lodash/_equalObjects.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_equalObjects.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var getAllKeys = __webpack_require__(/*! ./_getAllKeys */ "./node_modules/lodash/_getAllKeys.js");

/** Used to compose bitmasks for value comparisons. */
var COMPARE_PARTIAL_FLAG = 1;

/** Used for built-in method references. */
var objectProto = Object.prototype;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/**
 * A specialized version of `baseIsEqualDeep` for objects with support for
 * partial deep comparisons.
 *
 * @private
 * @param {Object} object The object to compare.
 * @param {Object} other The other object to compare.
 * @param {number} bitmask The bitmask flags. See `baseIsEqual` for more details.
 * @param {Function} customizer The function to customize comparisons.
 * @param {Function} equalFunc The function to determine equivalents of values.
 * @param {Object} stack Tracks traversed `object` and `other` objects.
 * @returns {boolean} Returns `true` if the objects are equivalent, else `false`.
 */
function equalObjects(object, other, bitmask, customizer, equalFunc, stack) {
  var isPartial = bitmask & COMPARE_PARTIAL_FLAG,
      objProps = getAllKeys(object),
      objLength = objProps.length,
      othProps = getAllKeys(other),
      othLength = othProps.length;

  if (objLength != othLength && !isPartial) {
    return false;
  }
  var index = objLength;
  while (index--) {
    var key = objProps[index];
    if (!(isPartial ? key in other : hasOwnProperty.call(other, key))) {
      return false;
    }
  }
  // Check that cyclic values are equal.
  var objStacked = stack.get(object);
  var othStacked = stack.get(other);
  if (objStacked && othStacked) {
    return objStacked == other && othStacked == object;
  }
  var result = true;
  stack.set(object, other);
  stack.set(other, object);

  var skipCtor = isPartial;
  while (++index < objLength) {
    key = objProps[index];
    var objValue = object[key],
        othValue = other[key];

    if (customizer) {
      var compared = isPartial
        ? customizer(othValue, objValue, key, other, object, stack)
        : customizer(objValue, othValue, key, object, other, stack);
    }
    // Recursively compare objects (susceptible to call stack limits).
    if (!(compared === undefined
          ? (objValue === othValue || equalFunc(objValue, othValue, bitmask, customizer, stack))
          : compared
        )) {
      result = false;
      break;
    }
    skipCtor || (skipCtor = key == 'constructor');
  }
  if (result && !skipCtor) {
    var objCtor = object.constructor,
        othCtor = other.constructor;

    // Non `Object` object instances with different constructors are not equal.
    if (objCtor != othCtor &&
        ('constructor' in object && 'constructor' in other) &&
        !(typeof objCtor == 'function' && objCtor instanceof objCtor &&
          typeof othCtor == 'function' && othCtor instanceof othCtor)) {
      result = false;
    }
  }
  stack['delete'](object);
  stack['delete'](other);
  return result;
}

module.exports = equalObjects;


/***/ }),

/***/ "./node_modules/lodash/_freeGlobal.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_freeGlobal.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(global) {/** Detect free variable `global` from Node.js. */
var freeGlobal = typeof global == 'object' && global && global.Object === Object && global;

module.exports = freeGlobal;

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../webpack/buildin/global.js */ "./node_modules/webpack/buildin/global.js")))

/***/ }),

/***/ "./node_modules/lodash/_getAllKeys.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_getAllKeys.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var baseGetAllKeys = __webpack_require__(/*! ./_baseGetAllKeys */ "./node_modules/lodash/_baseGetAllKeys.js"),
    getSymbols = __webpack_require__(/*! ./_getSymbols */ "./node_modules/lodash/_getSymbols.js"),
    keys = __webpack_require__(/*! ./keys */ "./node_modules/lodash/keys.js");

/**
 * Creates an array of own enumerable property names and symbols of `object`.
 *
 * @private
 * @param {Object} object The object to query.
 * @returns {Array} Returns the array of property names and symbols.
 */
function getAllKeys(object) {
  return baseGetAllKeys(object, keys, getSymbols);
}

module.exports = getAllKeys;


/***/ }),

/***/ "./node_modules/lodash/_getMapData.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_getMapData.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var isKeyable = __webpack_require__(/*! ./_isKeyable */ "./node_modules/lodash/_isKeyable.js");

/**
 * Gets the data for `map`.
 *
 * @private
 * @param {Object} map The map to query.
 * @param {string} key The reference key.
 * @returns {*} Returns the map data.
 */
function getMapData(map, key) {
  var data = map.__data__;
  return isKeyable(key)
    ? data[typeof key == 'string' ? 'string' : 'hash']
    : data.map;
}

module.exports = getMapData;


/***/ }),

/***/ "./node_modules/lodash/_getMatchData.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_getMatchData.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var isStrictComparable = __webpack_require__(/*! ./_isStrictComparable */ "./node_modules/lodash/_isStrictComparable.js"),
    keys = __webpack_require__(/*! ./keys */ "./node_modules/lodash/keys.js");

/**
 * Gets the property names, values, and compare flags of `object`.
 *
 * @private
 * @param {Object} object The object to query.
 * @returns {Array} Returns the match data of `object`.
 */
function getMatchData(object) {
  var result = keys(object),
      length = result.length;

  while (length--) {
    var key = result[length],
        value = object[key];

    result[length] = [key, value, isStrictComparable(value)];
  }
  return result;
}

module.exports = getMatchData;


/***/ }),

/***/ "./node_modules/lodash/_getNative.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_getNative.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var baseIsNative = __webpack_require__(/*! ./_baseIsNative */ "./node_modules/lodash/_baseIsNative.js"),
    getValue = __webpack_require__(/*! ./_getValue */ "./node_modules/lodash/_getValue.js");

/**
 * Gets the native function at `key` of `object`.
 *
 * @private
 * @param {Object} object The object to query.
 * @param {string} key The key of the method to get.
 * @returns {*} Returns the function if it's native, else `undefined`.
 */
function getNative(object, key) {
  var value = getValue(object, key);
  return baseIsNative(value) ? value : undefined;
}

module.exports = getNative;


/***/ }),

/***/ "./node_modules/lodash/_getRawTag.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_getRawTag.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var Symbol = __webpack_require__(/*! ./_Symbol */ "./node_modules/lodash/_Symbol.js");

/** Used for built-in method references. */
var objectProto = Object.prototype;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/**
 * Used to resolve the
 * [`toStringTag`](http://ecma-international.org/ecma-262/7.0/#sec-object.prototype.tostring)
 * of values.
 */
var nativeObjectToString = objectProto.toString;

/** Built-in value references. */
var symToStringTag = Symbol ? Symbol.toStringTag : undefined;

/**
 * A specialized version of `baseGetTag` which ignores `Symbol.toStringTag` values.
 *
 * @private
 * @param {*} value The value to query.
 * @returns {string} Returns the raw `toStringTag`.
 */
function getRawTag(value) {
  var isOwn = hasOwnProperty.call(value, symToStringTag),
      tag = value[symToStringTag];

  try {
    value[symToStringTag] = undefined;
    var unmasked = true;
  } catch (e) {}

  var result = nativeObjectToString.call(value);
  if (unmasked) {
    if (isOwn) {
      value[symToStringTag] = tag;
    } else {
      delete value[symToStringTag];
    }
  }
  return result;
}

module.exports = getRawTag;


/***/ }),

/***/ "./node_modules/lodash/_getSymbols.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_getSymbols.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayFilter = __webpack_require__(/*! ./_arrayFilter */ "./node_modules/lodash/_arrayFilter.js"),
    stubArray = __webpack_require__(/*! ./stubArray */ "./node_modules/lodash/stubArray.js");

/** Used for built-in method references. */
var objectProto = Object.prototype;

/** Built-in value references. */
var propertyIsEnumerable = objectProto.propertyIsEnumerable;

/* Built-in method references for those with the same name as other `lodash` methods. */
var nativeGetSymbols = Object.getOwnPropertySymbols;

/**
 * Creates an array of the own enumerable symbols of `object`.
 *
 * @private
 * @param {Object} object The object to query.
 * @returns {Array} Returns the array of symbols.
 */
var getSymbols = !nativeGetSymbols ? stubArray : function(object) {
  if (object == null) {
    return [];
  }
  object = Object(object);
  return arrayFilter(nativeGetSymbols(object), function(symbol) {
    return propertyIsEnumerable.call(object, symbol);
  });
};

module.exports = getSymbols;


/***/ }),

/***/ "./node_modules/lodash/_getTag.js":
/*!****************************************!*\
  !*** ./node_modules/lodash/_getTag.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var DataView = __webpack_require__(/*! ./_DataView */ "./node_modules/lodash/_DataView.js"),
    Map = __webpack_require__(/*! ./_Map */ "./node_modules/lodash/_Map.js"),
    Promise = __webpack_require__(/*! ./_Promise */ "./node_modules/lodash/_Promise.js"),
    Set = __webpack_require__(/*! ./_Set */ "./node_modules/lodash/_Set.js"),
    WeakMap = __webpack_require__(/*! ./_WeakMap */ "./node_modules/lodash/_WeakMap.js"),
    baseGetTag = __webpack_require__(/*! ./_baseGetTag */ "./node_modules/lodash/_baseGetTag.js"),
    toSource = __webpack_require__(/*! ./_toSource */ "./node_modules/lodash/_toSource.js");

/** `Object#toString` result references. */
var mapTag = '[object Map]',
    objectTag = '[object Object]',
    promiseTag = '[object Promise]',
    setTag = '[object Set]',
    weakMapTag = '[object WeakMap]';

var dataViewTag = '[object DataView]';

/** Used to detect maps, sets, and weakmaps. */
var dataViewCtorString = toSource(DataView),
    mapCtorString = toSource(Map),
    promiseCtorString = toSource(Promise),
    setCtorString = toSource(Set),
    weakMapCtorString = toSource(WeakMap);

/**
 * Gets the `toStringTag` of `value`.
 *
 * @private
 * @param {*} value The value to query.
 * @returns {string} Returns the `toStringTag`.
 */
var getTag = baseGetTag;

// Fallback for data views, maps, sets, and weak maps in IE 11 and promises in Node.js < 6.
if ((DataView && getTag(new DataView(new ArrayBuffer(1))) != dataViewTag) ||
    (Map && getTag(new Map) != mapTag) ||
    (Promise && getTag(Promise.resolve()) != promiseTag) ||
    (Set && getTag(new Set) != setTag) ||
    (WeakMap && getTag(new WeakMap) != weakMapTag)) {
  getTag = function(value) {
    var result = baseGetTag(value),
        Ctor = result == objectTag ? value.constructor : undefined,
        ctorString = Ctor ? toSource(Ctor) : '';

    if (ctorString) {
      switch (ctorString) {
        case dataViewCtorString: return dataViewTag;
        case mapCtorString: return mapTag;
        case promiseCtorString: return promiseTag;
        case setCtorString: return setTag;
        case weakMapCtorString: return weakMapTag;
      }
    }
    return result;
  };
}

module.exports = getTag;


/***/ }),

/***/ "./node_modules/lodash/_getValue.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_getValue.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Gets the value at `key` of `object`.
 *
 * @private
 * @param {Object} [object] The object to query.
 * @param {string} key The key of the property to get.
 * @returns {*} Returns the property value.
 */
function getValue(object, key) {
  return object == null ? undefined : object[key];
}

module.exports = getValue;


/***/ }),

/***/ "./node_modules/lodash/_hasPath.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/_hasPath.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var castPath = __webpack_require__(/*! ./_castPath */ "./node_modules/lodash/_castPath.js"),
    isArguments = __webpack_require__(/*! ./isArguments */ "./node_modules/lodash/isArguments.js"),
    isArray = __webpack_require__(/*! ./isArray */ "./node_modules/lodash/isArray.js"),
    isIndex = __webpack_require__(/*! ./_isIndex */ "./node_modules/lodash/_isIndex.js"),
    isLength = __webpack_require__(/*! ./isLength */ "./node_modules/lodash/isLength.js"),
    toKey = __webpack_require__(/*! ./_toKey */ "./node_modules/lodash/_toKey.js");

/**
 * Checks if `path` exists on `object`.
 *
 * @private
 * @param {Object} object The object to query.
 * @param {Array|string} path The path to check.
 * @param {Function} hasFunc The function to check properties.
 * @returns {boolean} Returns `true` if `path` exists, else `false`.
 */
function hasPath(object, path, hasFunc) {
  path = castPath(path, object);

  var index = -1,
      length = path.length,
      result = false;

  while (++index < length) {
    var key = toKey(path[index]);
    if (!(result = object != null && hasFunc(object, key))) {
      break;
    }
    object = object[key];
  }
  if (result || ++index != length) {
    return result;
  }
  length = object == null ? 0 : object.length;
  return !!length && isLength(length) && isIndex(key, length) &&
    (isArray(object) || isArguments(object));
}

module.exports = hasPath;


/***/ }),

/***/ "./node_modules/lodash/_hashClear.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_hashClear.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var nativeCreate = __webpack_require__(/*! ./_nativeCreate */ "./node_modules/lodash/_nativeCreate.js");

/**
 * Removes all key-value entries from the hash.
 *
 * @private
 * @name clear
 * @memberOf Hash
 */
function hashClear() {
  this.__data__ = nativeCreate ? nativeCreate(null) : {};
  this.size = 0;
}

module.exports = hashClear;


/***/ }),

/***/ "./node_modules/lodash/_hashDelete.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_hashDelete.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Removes `key` and its value from the hash.
 *
 * @private
 * @name delete
 * @memberOf Hash
 * @param {Object} hash The hash to modify.
 * @param {string} key The key of the value to remove.
 * @returns {boolean} Returns `true` if the entry was removed, else `false`.
 */
function hashDelete(key) {
  var result = this.has(key) && delete this.__data__[key];
  this.size -= result ? 1 : 0;
  return result;
}

module.exports = hashDelete;


/***/ }),

/***/ "./node_modules/lodash/_hashGet.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/_hashGet.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var nativeCreate = __webpack_require__(/*! ./_nativeCreate */ "./node_modules/lodash/_nativeCreate.js");

/** Used to stand-in for `undefined` hash values. */
var HASH_UNDEFINED = '__lodash_hash_undefined__';

/** Used for built-in method references. */
var objectProto = Object.prototype;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/**
 * Gets the hash value for `key`.
 *
 * @private
 * @name get
 * @memberOf Hash
 * @param {string} key The key of the value to get.
 * @returns {*} Returns the entry value.
 */
function hashGet(key) {
  var data = this.__data__;
  if (nativeCreate) {
    var result = data[key];
    return result === HASH_UNDEFINED ? undefined : result;
  }
  return hasOwnProperty.call(data, key) ? data[key] : undefined;
}

module.exports = hashGet;


/***/ }),

/***/ "./node_modules/lodash/_hashHas.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/_hashHas.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var nativeCreate = __webpack_require__(/*! ./_nativeCreate */ "./node_modules/lodash/_nativeCreate.js");

/** Used for built-in method references. */
var objectProto = Object.prototype;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/**
 * Checks if a hash value for `key` exists.
 *
 * @private
 * @name has
 * @memberOf Hash
 * @param {string} key The key of the entry to check.
 * @returns {boolean} Returns `true` if an entry for `key` exists, else `false`.
 */
function hashHas(key) {
  var data = this.__data__;
  return nativeCreate ? (data[key] !== undefined) : hasOwnProperty.call(data, key);
}

module.exports = hashHas;


/***/ }),

/***/ "./node_modules/lodash/_hashSet.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/_hashSet.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var nativeCreate = __webpack_require__(/*! ./_nativeCreate */ "./node_modules/lodash/_nativeCreate.js");

/** Used to stand-in for `undefined` hash values. */
var HASH_UNDEFINED = '__lodash_hash_undefined__';

/**
 * Sets the hash `key` to `value`.
 *
 * @private
 * @name set
 * @memberOf Hash
 * @param {string} key The key of the value to set.
 * @param {*} value The value to set.
 * @returns {Object} Returns the hash instance.
 */
function hashSet(key, value) {
  var data = this.__data__;
  this.size += this.has(key) ? 0 : 1;
  data[key] = (nativeCreate && value === undefined) ? HASH_UNDEFINED : value;
  return this;
}

module.exports = hashSet;


/***/ }),

/***/ "./node_modules/lodash/_isIndex.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/_isIndex.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/** Used as references for various `Number` constants. */
var MAX_SAFE_INTEGER = 9007199254740991;

/** Used to detect unsigned integer values. */
var reIsUint = /^(?:0|[1-9]\d*)$/;

/**
 * Checks if `value` is a valid array-like index.
 *
 * @private
 * @param {*} value The value to check.
 * @param {number} [length=MAX_SAFE_INTEGER] The upper bounds of a valid index.
 * @returns {boolean} Returns `true` if `value` is a valid index, else `false`.
 */
function isIndex(value, length) {
  var type = typeof value;
  length = length == null ? MAX_SAFE_INTEGER : length;

  return !!length &&
    (type == 'number' ||
      (type != 'symbol' && reIsUint.test(value))) &&
        (value > -1 && value % 1 == 0 && value < length);
}

module.exports = isIndex;


/***/ }),

/***/ "./node_modules/lodash/_isKey.js":
/*!***************************************!*\
  !*** ./node_modules/lodash/_isKey.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var isArray = __webpack_require__(/*! ./isArray */ "./node_modules/lodash/isArray.js"),
    isSymbol = __webpack_require__(/*! ./isSymbol */ "./node_modules/lodash/isSymbol.js");

/** Used to match property names within property paths. */
var reIsDeepProp = /\.|\[(?:[^[\]]*|(["'])(?:(?!\1)[^\\]|\\.)*?\1)\]/,
    reIsPlainProp = /^\w*$/;

/**
 * Checks if `value` is a property name and not a property path.
 *
 * @private
 * @param {*} value The value to check.
 * @param {Object} [object] The object to query keys on.
 * @returns {boolean} Returns `true` if `value` is a property name, else `false`.
 */
function isKey(value, object) {
  if (isArray(value)) {
    return false;
  }
  var type = typeof value;
  if (type == 'number' || type == 'symbol' || type == 'boolean' ||
      value == null || isSymbol(value)) {
    return true;
  }
  return reIsPlainProp.test(value) || !reIsDeepProp.test(value) ||
    (object != null && value in Object(object));
}

module.exports = isKey;


/***/ }),

/***/ "./node_modules/lodash/_isKeyable.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/_isKeyable.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Checks if `value` is suitable for use as unique object key.
 *
 * @private
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is suitable, else `false`.
 */
function isKeyable(value) {
  var type = typeof value;
  return (type == 'string' || type == 'number' || type == 'symbol' || type == 'boolean')
    ? (value !== '__proto__')
    : (value === null);
}

module.exports = isKeyable;


/***/ }),

/***/ "./node_modules/lodash/_isMasked.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_isMasked.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var coreJsData = __webpack_require__(/*! ./_coreJsData */ "./node_modules/lodash/_coreJsData.js");

/** Used to detect methods masquerading as native. */
var maskSrcKey = (function() {
  var uid = /[^.]+$/.exec(coreJsData && coreJsData.keys && coreJsData.keys.IE_PROTO || '');
  return uid ? ('Symbol(src)_1.' + uid) : '';
}());

/**
 * Checks if `func` has its source masked.
 *
 * @private
 * @param {Function} func The function to check.
 * @returns {boolean} Returns `true` if `func` is masked, else `false`.
 */
function isMasked(func) {
  return !!maskSrcKey && (maskSrcKey in func);
}

module.exports = isMasked;


/***/ }),

/***/ "./node_modules/lodash/_isPrototype.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_isPrototype.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/** Used for built-in method references. */
var objectProto = Object.prototype;

/**
 * Checks if `value` is likely a prototype object.
 *
 * @private
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a prototype, else `false`.
 */
function isPrototype(value) {
  var Ctor = value && value.constructor,
      proto = (typeof Ctor == 'function' && Ctor.prototype) || objectProto;

  return value === proto;
}

module.exports = isPrototype;


/***/ }),

/***/ "./node_modules/lodash/_isStrictComparable.js":
/*!****************************************************!*\
  !*** ./node_modules/lodash/_isStrictComparable.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var isObject = __webpack_require__(/*! ./isObject */ "./node_modules/lodash/isObject.js");

/**
 * Checks if `value` is suitable for strict equality comparisons, i.e. `===`.
 *
 * @private
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` if suitable for strict
 *  equality comparisons, else `false`.
 */
function isStrictComparable(value) {
  return value === value && !isObject(value);
}

module.exports = isStrictComparable;


/***/ }),

/***/ "./node_modules/lodash/_listCacheClear.js":
/*!************************************************!*\
  !*** ./node_modules/lodash/_listCacheClear.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Removes all key-value entries from the list cache.
 *
 * @private
 * @name clear
 * @memberOf ListCache
 */
function listCacheClear() {
  this.__data__ = [];
  this.size = 0;
}

module.exports = listCacheClear;


/***/ }),

/***/ "./node_modules/lodash/_listCacheDelete.js":
/*!*************************************************!*\
  !*** ./node_modules/lodash/_listCacheDelete.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var assocIndexOf = __webpack_require__(/*! ./_assocIndexOf */ "./node_modules/lodash/_assocIndexOf.js");

/** Used for built-in method references. */
var arrayProto = Array.prototype;

/** Built-in value references. */
var splice = arrayProto.splice;

/**
 * Removes `key` and its value from the list cache.
 *
 * @private
 * @name delete
 * @memberOf ListCache
 * @param {string} key The key of the value to remove.
 * @returns {boolean} Returns `true` if the entry was removed, else `false`.
 */
function listCacheDelete(key) {
  var data = this.__data__,
      index = assocIndexOf(data, key);

  if (index < 0) {
    return false;
  }
  var lastIndex = data.length - 1;
  if (index == lastIndex) {
    data.pop();
  } else {
    splice.call(data, index, 1);
  }
  --this.size;
  return true;
}

module.exports = listCacheDelete;


/***/ }),

/***/ "./node_modules/lodash/_listCacheGet.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_listCacheGet.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var assocIndexOf = __webpack_require__(/*! ./_assocIndexOf */ "./node_modules/lodash/_assocIndexOf.js");

/**
 * Gets the list cache value for `key`.
 *
 * @private
 * @name get
 * @memberOf ListCache
 * @param {string} key The key of the value to get.
 * @returns {*} Returns the entry value.
 */
function listCacheGet(key) {
  var data = this.__data__,
      index = assocIndexOf(data, key);

  return index < 0 ? undefined : data[index][1];
}

module.exports = listCacheGet;


/***/ }),

/***/ "./node_modules/lodash/_listCacheHas.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_listCacheHas.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var assocIndexOf = __webpack_require__(/*! ./_assocIndexOf */ "./node_modules/lodash/_assocIndexOf.js");

/**
 * Checks if a list cache value for `key` exists.
 *
 * @private
 * @name has
 * @memberOf ListCache
 * @param {string} key The key of the entry to check.
 * @returns {boolean} Returns `true` if an entry for `key` exists, else `false`.
 */
function listCacheHas(key) {
  return assocIndexOf(this.__data__, key) > -1;
}

module.exports = listCacheHas;


/***/ }),

/***/ "./node_modules/lodash/_listCacheSet.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_listCacheSet.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var assocIndexOf = __webpack_require__(/*! ./_assocIndexOf */ "./node_modules/lodash/_assocIndexOf.js");

/**
 * Sets the list cache `key` to `value`.
 *
 * @private
 * @name set
 * @memberOf ListCache
 * @param {string} key The key of the value to set.
 * @param {*} value The value to set.
 * @returns {Object} Returns the list cache instance.
 */
function listCacheSet(key, value) {
  var data = this.__data__,
      index = assocIndexOf(data, key);

  if (index < 0) {
    ++this.size;
    data.push([key, value]);
  } else {
    data[index][1] = value;
  }
  return this;
}

module.exports = listCacheSet;


/***/ }),

/***/ "./node_modules/lodash/_mapCacheClear.js":
/*!***********************************************!*\
  !*** ./node_modules/lodash/_mapCacheClear.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var Hash = __webpack_require__(/*! ./_Hash */ "./node_modules/lodash/_Hash.js"),
    ListCache = __webpack_require__(/*! ./_ListCache */ "./node_modules/lodash/_ListCache.js"),
    Map = __webpack_require__(/*! ./_Map */ "./node_modules/lodash/_Map.js");

/**
 * Removes all key-value entries from the map.
 *
 * @private
 * @name clear
 * @memberOf MapCache
 */
function mapCacheClear() {
  this.size = 0;
  this.__data__ = {
    'hash': new Hash,
    'map': new (Map || ListCache),
    'string': new Hash
  };
}

module.exports = mapCacheClear;


/***/ }),

/***/ "./node_modules/lodash/_mapCacheDelete.js":
/*!************************************************!*\
  !*** ./node_modules/lodash/_mapCacheDelete.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var getMapData = __webpack_require__(/*! ./_getMapData */ "./node_modules/lodash/_getMapData.js");

/**
 * Removes `key` and its value from the map.
 *
 * @private
 * @name delete
 * @memberOf MapCache
 * @param {string} key The key of the value to remove.
 * @returns {boolean} Returns `true` if the entry was removed, else `false`.
 */
function mapCacheDelete(key) {
  var result = getMapData(this, key)['delete'](key);
  this.size -= result ? 1 : 0;
  return result;
}

module.exports = mapCacheDelete;


/***/ }),

/***/ "./node_modules/lodash/_mapCacheGet.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_mapCacheGet.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var getMapData = __webpack_require__(/*! ./_getMapData */ "./node_modules/lodash/_getMapData.js");

/**
 * Gets the map value for `key`.
 *
 * @private
 * @name get
 * @memberOf MapCache
 * @param {string} key The key of the value to get.
 * @returns {*} Returns the entry value.
 */
function mapCacheGet(key) {
  return getMapData(this, key).get(key);
}

module.exports = mapCacheGet;


/***/ }),

/***/ "./node_modules/lodash/_mapCacheHas.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_mapCacheHas.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var getMapData = __webpack_require__(/*! ./_getMapData */ "./node_modules/lodash/_getMapData.js");

/**
 * Checks if a map value for `key` exists.
 *
 * @private
 * @name has
 * @memberOf MapCache
 * @param {string} key The key of the entry to check.
 * @returns {boolean} Returns `true` if an entry for `key` exists, else `false`.
 */
function mapCacheHas(key) {
  return getMapData(this, key).has(key);
}

module.exports = mapCacheHas;


/***/ }),

/***/ "./node_modules/lodash/_mapCacheSet.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_mapCacheSet.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var getMapData = __webpack_require__(/*! ./_getMapData */ "./node_modules/lodash/_getMapData.js");

/**
 * Sets the map `key` to `value`.
 *
 * @private
 * @name set
 * @memberOf MapCache
 * @param {string} key The key of the value to set.
 * @param {*} value The value to set.
 * @returns {Object} Returns the map cache instance.
 */
function mapCacheSet(key, value) {
  var data = getMapData(this, key),
      size = data.size;

  data.set(key, value);
  this.size += data.size == size ? 0 : 1;
  return this;
}

module.exports = mapCacheSet;


/***/ }),

/***/ "./node_modules/lodash/_mapToArray.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_mapToArray.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Converts `map` to its key-value pairs.
 *
 * @private
 * @param {Object} map The map to convert.
 * @returns {Array} Returns the key-value pairs.
 */
function mapToArray(map) {
  var index = -1,
      result = Array(map.size);

  map.forEach(function(value, key) {
    result[++index] = [key, value];
  });
  return result;
}

module.exports = mapToArray;


/***/ }),

/***/ "./node_modules/lodash/_matchesStrictComparable.js":
/*!*********************************************************!*\
  !*** ./node_modules/lodash/_matchesStrictComparable.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * A specialized version of `matchesProperty` for source values suitable
 * for strict equality comparisons, i.e. `===`.
 *
 * @private
 * @param {string} key The key of the property to get.
 * @param {*} srcValue The value to match.
 * @returns {Function} Returns the new spec function.
 */
function matchesStrictComparable(key, srcValue) {
  return function(object) {
    if (object == null) {
      return false;
    }
    return object[key] === srcValue &&
      (srcValue !== undefined || (key in Object(object)));
  };
}

module.exports = matchesStrictComparable;


/***/ }),

/***/ "./node_modules/lodash/_memoizeCapped.js":
/*!***********************************************!*\
  !*** ./node_modules/lodash/_memoizeCapped.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var memoize = __webpack_require__(/*! ./memoize */ "./node_modules/lodash/memoize.js");

/** Used as the maximum memoize cache size. */
var MAX_MEMOIZE_SIZE = 500;

/**
 * A specialized version of `_.memoize` which clears the memoized function's
 * cache when it exceeds `MAX_MEMOIZE_SIZE`.
 *
 * @private
 * @param {Function} func The function to have its output memoized.
 * @returns {Function} Returns the new memoized function.
 */
function memoizeCapped(func) {
  var result = memoize(func, function(key) {
    if (cache.size === MAX_MEMOIZE_SIZE) {
      cache.clear();
    }
    return key;
  });

  var cache = result.cache;
  return result;
}

module.exports = memoizeCapped;


/***/ }),

/***/ "./node_modules/lodash/_nativeCreate.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_nativeCreate.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var getNative = __webpack_require__(/*! ./_getNative */ "./node_modules/lodash/_getNative.js");

/* Built-in method references that are verified to be native. */
var nativeCreate = getNative(Object, 'create');

module.exports = nativeCreate;


/***/ }),

/***/ "./node_modules/lodash/_nativeKeys.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_nativeKeys.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var overArg = __webpack_require__(/*! ./_overArg */ "./node_modules/lodash/_overArg.js");

/* Built-in method references for those with the same name as other `lodash` methods. */
var nativeKeys = overArg(Object.keys, Object);

module.exports = nativeKeys;


/***/ }),

/***/ "./node_modules/lodash/_nodeUtil.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_nodeUtil.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(module) {var freeGlobal = __webpack_require__(/*! ./_freeGlobal */ "./node_modules/lodash/_freeGlobal.js");

/** Detect free variable `exports`. */
var freeExports =  true && exports && !exports.nodeType && exports;

/** Detect free variable `module`. */
var freeModule = freeExports && typeof module == 'object' && module && !module.nodeType && module;

/** Detect the popular CommonJS extension `module.exports`. */
var moduleExports = freeModule && freeModule.exports === freeExports;

/** Detect free variable `process` from Node.js. */
var freeProcess = moduleExports && freeGlobal.process;

/** Used to access faster Node.js helpers. */
var nodeUtil = (function() {
  try {
    // Use `util.types` for Node.js 10+.
    var types = freeModule && freeModule.require && freeModule.require('util').types;

    if (types) {
      return types;
    }

    // Legacy `process.binding('util')` for Node.js < 10.
    return freeProcess && freeProcess.binding && freeProcess.binding('util');
  } catch (e) {}
}());

module.exports = nodeUtil;

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../webpack/buildin/module.js */ "./node_modules/webpack/buildin/module.js")(module)))

/***/ }),

/***/ "./node_modules/lodash/_objectToString.js":
/*!************************************************!*\
  !*** ./node_modules/lodash/_objectToString.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/** Used for built-in method references. */
var objectProto = Object.prototype;

/**
 * Used to resolve the
 * [`toStringTag`](http://ecma-international.org/ecma-262/7.0/#sec-object.prototype.tostring)
 * of values.
 */
var nativeObjectToString = objectProto.toString;

/**
 * Converts `value` to a string using `Object.prototype.toString`.
 *
 * @private
 * @param {*} value The value to convert.
 * @returns {string} Returns the converted string.
 */
function objectToString(value) {
  return nativeObjectToString.call(value);
}

module.exports = objectToString;


/***/ }),

/***/ "./node_modules/lodash/_overArg.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/_overArg.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Creates a unary function that invokes `func` with its argument transformed.
 *
 * @private
 * @param {Function} func The function to wrap.
 * @param {Function} transform The argument transform.
 * @returns {Function} Returns the new function.
 */
function overArg(func, transform) {
  return function(arg) {
    return func(transform(arg));
  };
}

module.exports = overArg;


/***/ }),

/***/ "./node_modules/lodash/_root.js":
/*!**************************************!*\
  !*** ./node_modules/lodash/_root.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var freeGlobal = __webpack_require__(/*! ./_freeGlobal */ "./node_modules/lodash/_freeGlobal.js");

/** Detect free variable `self`. */
var freeSelf = typeof self == 'object' && self && self.Object === Object && self;

/** Used as a reference to the global object. */
var root = freeGlobal || freeSelf || Function('return this')();

module.exports = root;


/***/ }),

/***/ "./node_modules/lodash/_setCacheAdd.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_setCacheAdd.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/** Used to stand-in for `undefined` hash values. */
var HASH_UNDEFINED = '__lodash_hash_undefined__';

/**
 * Adds `value` to the array cache.
 *
 * @private
 * @name add
 * @memberOf SetCache
 * @alias push
 * @param {*} value The value to cache.
 * @returns {Object} Returns the cache instance.
 */
function setCacheAdd(value) {
  this.__data__.set(value, HASH_UNDEFINED);
  return this;
}

module.exports = setCacheAdd;


/***/ }),

/***/ "./node_modules/lodash/_setCacheHas.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_setCacheHas.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Checks if `value` is in the array cache.
 *
 * @private
 * @name has
 * @memberOf SetCache
 * @param {*} value The value to search for.
 * @returns {number} Returns `true` if `value` is found, else `false`.
 */
function setCacheHas(value) {
  return this.__data__.has(value);
}

module.exports = setCacheHas;


/***/ }),

/***/ "./node_modules/lodash/_setToArray.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_setToArray.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Converts `set` to an array of its values.
 *
 * @private
 * @param {Object} set The set to convert.
 * @returns {Array} Returns the values.
 */
function setToArray(set) {
  var index = -1,
      result = Array(set.size);

  set.forEach(function(value) {
    result[++index] = value;
  });
  return result;
}

module.exports = setToArray;


/***/ }),

/***/ "./node_modules/lodash/_stackClear.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/_stackClear.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var ListCache = __webpack_require__(/*! ./_ListCache */ "./node_modules/lodash/_ListCache.js");

/**
 * Removes all key-value entries from the stack.
 *
 * @private
 * @name clear
 * @memberOf Stack
 */
function stackClear() {
  this.__data__ = new ListCache;
  this.size = 0;
}

module.exports = stackClear;


/***/ }),

/***/ "./node_modules/lodash/_stackDelete.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/_stackDelete.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Removes `key` and its value from the stack.
 *
 * @private
 * @name delete
 * @memberOf Stack
 * @param {string} key The key of the value to remove.
 * @returns {boolean} Returns `true` if the entry was removed, else `false`.
 */
function stackDelete(key) {
  var data = this.__data__,
      result = data['delete'](key);

  this.size = data.size;
  return result;
}

module.exports = stackDelete;


/***/ }),

/***/ "./node_modules/lodash/_stackGet.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_stackGet.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Gets the stack value for `key`.
 *
 * @private
 * @name get
 * @memberOf Stack
 * @param {string} key The key of the value to get.
 * @returns {*} Returns the entry value.
 */
function stackGet(key) {
  return this.__data__.get(key);
}

module.exports = stackGet;


/***/ }),

/***/ "./node_modules/lodash/_stackHas.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_stackHas.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Checks if a stack value for `key` exists.
 *
 * @private
 * @name has
 * @memberOf Stack
 * @param {string} key The key of the entry to check.
 * @returns {boolean} Returns `true` if an entry for `key` exists, else `false`.
 */
function stackHas(key) {
  return this.__data__.has(key);
}

module.exports = stackHas;


/***/ }),

/***/ "./node_modules/lodash/_stackSet.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_stackSet.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var ListCache = __webpack_require__(/*! ./_ListCache */ "./node_modules/lodash/_ListCache.js"),
    Map = __webpack_require__(/*! ./_Map */ "./node_modules/lodash/_Map.js"),
    MapCache = __webpack_require__(/*! ./_MapCache */ "./node_modules/lodash/_MapCache.js");

/** Used as the size to enable large array optimizations. */
var LARGE_ARRAY_SIZE = 200;

/**
 * Sets the stack `key` to `value`.
 *
 * @private
 * @name set
 * @memberOf Stack
 * @param {string} key The key of the value to set.
 * @param {*} value The value to set.
 * @returns {Object} Returns the stack cache instance.
 */
function stackSet(key, value) {
  var data = this.__data__;
  if (data instanceof ListCache) {
    var pairs = data.__data__;
    if (!Map || (pairs.length < LARGE_ARRAY_SIZE - 1)) {
      pairs.push([key, value]);
      this.size = ++data.size;
      return this;
    }
    data = this.__data__ = new MapCache(pairs);
  }
  data.set(key, value);
  this.size = data.size;
  return this;
}

module.exports = stackSet;


/***/ }),

/***/ "./node_modules/lodash/_stringToPath.js":
/*!**********************************************!*\
  !*** ./node_modules/lodash/_stringToPath.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var memoizeCapped = __webpack_require__(/*! ./_memoizeCapped */ "./node_modules/lodash/_memoizeCapped.js");

/** Used to match property names within property paths. */
var rePropName = /[^.[\]]+|\[(?:(-?\d+(?:\.\d+)?)|(["'])((?:(?!\2)[^\\]|\\.)*?)\2)\]|(?=(?:\.|\[\])(?:\.|\[\]|$))/g;

/** Used to match backslashes in property paths. */
var reEscapeChar = /\\(\\)?/g;

/**
 * Converts `string` to a property path array.
 *
 * @private
 * @param {string} string The string to convert.
 * @returns {Array} Returns the property path array.
 */
var stringToPath = memoizeCapped(function(string) {
  var result = [];
  if (string.charCodeAt(0) === 46 /* . */) {
    result.push('');
  }
  string.replace(rePropName, function(match, number, quote, subString) {
    result.push(quote ? subString.replace(reEscapeChar, '$1') : (number || match));
  });
  return result;
});

module.exports = stringToPath;


/***/ }),

/***/ "./node_modules/lodash/_toKey.js":
/*!***************************************!*\
  !*** ./node_modules/lodash/_toKey.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var isSymbol = __webpack_require__(/*! ./isSymbol */ "./node_modules/lodash/isSymbol.js");

/** Used as references for various `Number` constants. */
var INFINITY = 1 / 0;

/**
 * Converts `value` to a string key if it's not a string or symbol.
 *
 * @private
 * @param {*} value The value to inspect.
 * @returns {string|symbol} Returns the key.
 */
function toKey(value) {
  if (typeof value == 'string' || isSymbol(value)) {
    return value;
  }
  var result = (value + '');
  return (result == '0' && (1 / value) == -INFINITY) ? '-0' : result;
}

module.exports = toKey;


/***/ }),

/***/ "./node_modules/lodash/_toSource.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/_toSource.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/** Used for built-in method references. */
var funcProto = Function.prototype;

/** Used to resolve the decompiled source of functions. */
var funcToString = funcProto.toString;

/**
 * Converts `func` to its source code.
 *
 * @private
 * @param {Function} func The function to convert.
 * @returns {string} Returns the source code.
 */
function toSource(func) {
  if (func != null) {
    try {
      return funcToString.call(func);
    } catch (e) {}
    try {
      return (func + '');
    } catch (e) {}
  }
  return '';
}

module.exports = toSource;


/***/ }),

/***/ "./node_modules/lodash/eq.js":
/*!***********************************!*\
  !*** ./node_modules/lodash/eq.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Performs a
 * [`SameValueZero`](http://ecma-international.org/ecma-262/7.0/#sec-samevaluezero)
 * comparison between two values to determine if they are equivalent.
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to compare.
 * @param {*} other The other value to compare.
 * @returns {boolean} Returns `true` if the values are equivalent, else `false`.
 * @example
 *
 * var object = { 'a': 1 };
 * var other = { 'a': 1 };
 *
 * _.eq(object, object);
 * // => true
 *
 * _.eq(object, other);
 * // => false
 *
 * _.eq('a', 'a');
 * // => true
 *
 * _.eq('a', Object('a'));
 * // => false
 *
 * _.eq(NaN, NaN);
 * // => true
 */
function eq(value, other) {
  return value === other || (value !== value && other !== other);
}

module.exports = eq;


/***/ }),

/***/ "./node_modules/lodash/get.js":
/*!************************************!*\
  !*** ./node_modules/lodash/get.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var baseGet = __webpack_require__(/*! ./_baseGet */ "./node_modules/lodash/_baseGet.js");

/**
 * Gets the value at `path` of `object`. If the resolved value is
 * `undefined`, the `defaultValue` is returned in its place.
 *
 * @static
 * @memberOf _
 * @since 3.7.0
 * @category Object
 * @param {Object} object The object to query.
 * @param {Array|string} path The path of the property to get.
 * @param {*} [defaultValue] The value returned for `undefined` resolved values.
 * @returns {*} Returns the resolved value.
 * @example
 *
 * var object = { 'a': [{ 'b': { 'c': 3 } }] };
 *
 * _.get(object, 'a[0].b.c');
 * // => 3
 *
 * _.get(object, ['a', '0', 'b', 'c']);
 * // => 3
 *
 * _.get(object, 'a.b.c', 'default');
 * // => 'default'
 */
function get(object, path, defaultValue) {
  var result = object == null ? undefined : baseGet(object, path);
  return result === undefined ? defaultValue : result;
}

module.exports = get;


/***/ }),

/***/ "./node_modules/lodash/hasIn.js":
/*!**************************************!*\
  !*** ./node_modules/lodash/hasIn.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var baseHasIn = __webpack_require__(/*! ./_baseHasIn */ "./node_modules/lodash/_baseHasIn.js"),
    hasPath = __webpack_require__(/*! ./_hasPath */ "./node_modules/lodash/_hasPath.js");

/**
 * Checks if `path` is a direct or inherited property of `object`.
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Object
 * @param {Object} object The object to query.
 * @param {Array|string} path The path to check.
 * @returns {boolean} Returns `true` if `path` exists, else `false`.
 * @example
 *
 * var object = _.create({ 'a': _.create({ 'b': 2 }) });
 *
 * _.hasIn(object, 'a');
 * // => true
 *
 * _.hasIn(object, 'a.b');
 * // => true
 *
 * _.hasIn(object, ['a', 'b']);
 * // => true
 *
 * _.hasIn(object, 'b');
 * // => false
 */
function hasIn(object, path) {
  return object != null && hasPath(object, path, baseHasIn);
}

module.exports = hasIn;


/***/ }),

/***/ "./node_modules/lodash/identity.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/identity.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * This method returns the first argument it receives.
 *
 * @static
 * @since 0.1.0
 * @memberOf _
 * @category Util
 * @param {*} value Any value.
 * @returns {*} Returns `value`.
 * @example
 *
 * var object = { 'a': 1 };
 *
 * console.log(_.identity(object) === object);
 * // => true
 */
function identity(value) {
  return value;
}

module.exports = identity;


/***/ }),

/***/ "./node_modules/lodash/isArguments.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/isArguments.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var baseIsArguments = __webpack_require__(/*! ./_baseIsArguments */ "./node_modules/lodash/_baseIsArguments.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js");

/** Used for built-in method references. */
var objectProto = Object.prototype;

/** Used to check objects for own properties. */
var hasOwnProperty = objectProto.hasOwnProperty;

/** Built-in value references. */
var propertyIsEnumerable = objectProto.propertyIsEnumerable;

/**
 * Checks if `value` is likely an `arguments` object.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is an `arguments` object,
 *  else `false`.
 * @example
 *
 * _.isArguments(function() { return arguments; }());
 * // => true
 *
 * _.isArguments([1, 2, 3]);
 * // => false
 */
var isArguments = baseIsArguments(function() { return arguments; }()) ? baseIsArguments : function(value) {
  return isObjectLike(value) && hasOwnProperty.call(value, 'callee') &&
    !propertyIsEnumerable.call(value, 'callee');
};

module.exports = isArguments;


/***/ }),

/***/ "./node_modules/lodash/isArray.js":
/*!****************************************!*\
  !*** ./node_modules/lodash/isArray.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Checks if `value` is classified as an `Array` object.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is an array, else `false`.
 * @example
 *
 * _.isArray([1, 2, 3]);
 * // => true
 *
 * _.isArray(document.body.children);
 * // => false
 *
 * _.isArray('abc');
 * // => false
 *
 * _.isArray(_.noop);
 * // => false
 */
var isArray = Array.isArray;

module.exports = isArray;


/***/ }),

/***/ "./node_modules/lodash/isArrayLike.js":
/*!********************************************!*\
  !*** ./node_modules/lodash/isArrayLike.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var isFunction = __webpack_require__(/*! ./isFunction */ "./node_modules/lodash/isFunction.js"),
    isLength = __webpack_require__(/*! ./isLength */ "./node_modules/lodash/isLength.js");

/**
 * Checks if `value` is array-like. A value is considered array-like if it's
 * not a function and has a `value.length` that's an integer greater than or
 * equal to `0` and less than or equal to `Number.MAX_SAFE_INTEGER`.
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is array-like, else `false`.
 * @example
 *
 * _.isArrayLike([1, 2, 3]);
 * // => true
 *
 * _.isArrayLike(document.body.children);
 * // => true
 *
 * _.isArrayLike('abc');
 * // => true
 *
 * _.isArrayLike(_.noop);
 * // => false
 */
function isArrayLike(value) {
  return value != null && isLength(value.length) && !isFunction(value);
}

module.exports = isArrayLike;


/***/ }),

/***/ "./node_modules/lodash/isBuffer.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/isBuffer.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(module) {var root = __webpack_require__(/*! ./_root */ "./node_modules/lodash/_root.js"),
    stubFalse = __webpack_require__(/*! ./stubFalse */ "./node_modules/lodash/stubFalse.js");

/** Detect free variable `exports`. */
var freeExports =  true && exports && !exports.nodeType && exports;

/** Detect free variable `module`. */
var freeModule = freeExports && typeof module == 'object' && module && !module.nodeType && module;

/** Detect the popular CommonJS extension `module.exports`. */
var moduleExports = freeModule && freeModule.exports === freeExports;

/** Built-in value references. */
var Buffer = moduleExports ? root.Buffer : undefined;

/* Built-in method references for those with the same name as other `lodash` methods. */
var nativeIsBuffer = Buffer ? Buffer.isBuffer : undefined;

/**
 * Checks if `value` is a buffer.
 *
 * @static
 * @memberOf _
 * @since 4.3.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a buffer, else `false`.
 * @example
 *
 * _.isBuffer(new Buffer(2));
 * // => true
 *
 * _.isBuffer(new Uint8Array(2));
 * // => false
 */
var isBuffer = nativeIsBuffer || stubFalse;

module.exports = isBuffer;

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../webpack/buildin/module.js */ "./node_modules/webpack/buildin/module.js")(module)))

/***/ }),

/***/ "./node_modules/lodash/isFunction.js":
/*!*******************************************!*\
  !*** ./node_modules/lodash/isFunction.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var baseGetTag = __webpack_require__(/*! ./_baseGetTag */ "./node_modules/lodash/_baseGetTag.js"),
    isObject = __webpack_require__(/*! ./isObject */ "./node_modules/lodash/isObject.js");

/** `Object#toString` result references. */
var asyncTag = '[object AsyncFunction]',
    funcTag = '[object Function]',
    genTag = '[object GeneratorFunction]',
    proxyTag = '[object Proxy]';

/**
 * Checks if `value` is classified as a `Function` object.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a function, else `false`.
 * @example
 *
 * _.isFunction(_);
 * // => true
 *
 * _.isFunction(/abc/);
 * // => false
 */
function isFunction(value) {
  if (!isObject(value)) {
    return false;
  }
  // The use of `Object#toString` avoids issues with the `typeof` operator
  // in Safari 9 which returns 'object' for typed arrays and other constructors.
  var tag = baseGetTag(value);
  return tag == funcTag || tag == genTag || tag == asyncTag || tag == proxyTag;
}

module.exports = isFunction;


/***/ }),

/***/ "./node_modules/lodash/isLength.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/isLength.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/** Used as references for various `Number` constants. */
var MAX_SAFE_INTEGER = 9007199254740991;

/**
 * Checks if `value` is a valid array-like length.
 *
 * **Note:** This method is loosely based on
 * [`ToLength`](http://ecma-international.org/ecma-262/7.0/#sec-tolength).
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a valid length, else `false`.
 * @example
 *
 * _.isLength(3);
 * // => true
 *
 * _.isLength(Number.MIN_VALUE);
 * // => false
 *
 * _.isLength(Infinity);
 * // => false
 *
 * _.isLength('3');
 * // => false
 */
function isLength(value) {
  return typeof value == 'number' &&
    value > -1 && value % 1 == 0 && value <= MAX_SAFE_INTEGER;
}

module.exports = isLength;


/***/ }),

/***/ "./node_modules/lodash/isObject.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/isObject.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Checks if `value` is the
 * [language type](http://www.ecma-international.org/ecma-262/7.0/#sec-ecmascript-language-types)
 * of `Object`. (e.g. arrays, functions, objects, regexes, `new Number(0)`, and `new String('')`)
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is an object, else `false`.
 * @example
 *
 * _.isObject({});
 * // => true
 *
 * _.isObject([1, 2, 3]);
 * // => true
 *
 * _.isObject(_.noop);
 * // => true
 *
 * _.isObject(null);
 * // => false
 */
function isObject(value) {
  var type = typeof value;
  return value != null && (type == 'object' || type == 'function');
}

module.exports = isObject;


/***/ }),

/***/ "./node_modules/lodash/isObjectLike.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/isObjectLike.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Checks if `value` is object-like. A value is object-like if it's not `null`
 * and has a `typeof` result of "object".
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is object-like, else `false`.
 * @example
 *
 * _.isObjectLike({});
 * // => true
 *
 * _.isObjectLike([1, 2, 3]);
 * // => true
 *
 * _.isObjectLike(_.noop);
 * // => false
 *
 * _.isObjectLike(null);
 * // => false
 */
function isObjectLike(value) {
  return value != null && typeof value == 'object';
}

module.exports = isObjectLike;


/***/ }),

/***/ "./node_modules/lodash/isSymbol.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/isSymbol.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var baseGetTag = __webpack_require__(/*! ./_baseGetTag */ "./node_modules/lodash/_baseGetTag.js"),
    isObjectLike = __webpack_require__(/*! ./isObjectLike */ "./node_modules/lodash/isObjectLike.js");

/** `Object#toString` result references. */
var symbolTag = '[object Symbol]';

/**
 * Checks if `value` is classified as a `Symbol` primitive or object.
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a symbol, else `false`.
 * @example
 *
 * _.isSymbol(Symbol.iterator);
 * // => true
 *
 * _.isSymbol('abc');
 * // => false
 */
function isSymbol(value) {
  return typeof value == 'symbol' ||
    (isObjectLike(value) && baseGetTag(value) == symbolTag);
}

module.exports = isSymbol;


/***/ }),

/***/ "./node_modules/lodash/isTypedArray.js":
/*!*********************************************!*\
  !*** ./node_modules/lodash/isTypedArray.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var baseIsTypedArray = __webpack_require__(/*! ./_baseIsTypedArray */ "./node_modules/lodash/_baseIsTypedArray.js"),
    baseUnary = __webpack_require__(/*! ./_baseUnary */ "./node_modules/lodash/_baseUnary.js"),
    nodeUtil = __webpack_require__(/*! ./_nodeUtil */ "./node_modules/lodash/_nodeUtil.js");

/* Node.js helper references. */
var nodeIsTypedArray = nodeUtil && nodeUtil.isTypedArray;

/**
 * Checks if `value` is classified as a typed array.
 *
 * @static
 * @memberOf _
 * @since 3.0.0
 * @category Lang
 * @param {*} value The value to check.
 * @returns {boolean} Returns `true` if `value` is a typed array, else `false`.
 * @example
 *
 * _.isTypedArray(new Uint8Array);
 * // => true
 *
 * _.isTypedArray([]);
 * // => false
 */
var isTypedArray = nodeIsTypedArray ? baseUnary(nodeIsTypedArray) : baseIsTypedArray;

module.exports = isTypedArray;


/***/ }),

/***/ "./node_modules/lodash/keys.js":
/*!*************************************!*\
  !*** ./node_modules/lodash/keys.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayLikeKeys = __webpack_require__(/*! ./_arrayLikeKeys */ "./node_modules/lodash/_arrayLikeKeys.js"),
    baseKeys = __webpack_require__(/*! ./_baseKeys */ "./node_modules/lodash/_baseKeys.js"),
    isArrayLike = __webpack_require__(/*! ./isArrayLike */ "./node_modules/lodash/isArrayLike.js");

/**
 * Creates an array of the own enumerable property names of `object`.
 *
 * **Note:** Non-object values are coerced to objects. See the
 * [ES spec](http://ecma-international.org/ecma-262/7.0/#sec-object.keys)
 * for more details.
 *
 * @static
 * @since 0.1.0
 * @memberOf _
 * @category Object
 * @param {Object} object The object to query.
 * @returns {Array} Returns the array of property names.
 * @example
 *
 * function Foo() {
 *   this.a = 1;
 *   this.b = 2;
 * }
 *
 * Foo.prototype.c = 3;
 *
 * _.keys(new Foo);
 * // => ['a', 'b'] (iteration order is not guaranteed)
 *
 * _.keys('hi');
 * // => ['0', '1']
 */
function keys(object) {
  return isArrayLike(object) ? arrayLikeKeys(object) : baseKeys(object);
}

module.exports = keys;


/***/ }),

/***/ "./node_modules/lodash/map.js":
/*!************************************!*\
  !*** ./node_modules/lodash/map.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayMap = __webpack_require__(/*! ./_arrayMap */ "./node_modules/lodash/_arrayMap.js"),
    baseIteratee = __webpack_require__(/*! ./_baseIteratee */ "./node_modules/lodash/_baseIteratee.js"),
    baseMap = __webpack_require__(/*! ./_baseMap */ "./node_modules/lodash/_baseMap.js"),
    isArray = __webpack_require__(/*! ./isArray */ "./node_modules/lodash/isArray.js");

/**
 * Creates an array of values by running each element in `collection` thru
 * `iteratee`. The iteratee is invoked with three arguments:
 * (value, index|key, collection).
 *
 * Many lodash methods are guarded to work as iteratees for methods like
 * `_.every`, `_.filter`, `_.map`, `_.mapValues`, `_.reject`, and `_.some`.
 *
 * The guarded methods are:
 * `ary`, `chunk`, `curry`, `curryRight`, `drop`, `dropRight`, `every`,
 * `fill`, `invert`, `parseInt`, `random`, `range`, `rangeRight`, `repeat`,
 * `sampleSize`, `slice`, `some`, `sortBy`, `split`, `take`, `takeRight`,
 * `template`, `trim`, `trimEnd`, `trimStart`, and `words`
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Collection
 * @param {Array|Object} collection The collection to iterate over.
 * @param {Function} [iteratee=_.identity] The function invoked per iteration.
 * @returns {Array} Returns the new mapped array.
 * @example
 *
 * function square(n) {
 *   return n * n;
 * }
 *
 * _.map([4, 8], square);
 * // => [16, 64]
 *
 * _.map({ 'a': 4, 'b': 8 }, square);
 * // => [16, 64] (iteration order is not guaranteed)
 *
 * var users = [
 *   { 'user': 'barney' },
 *   { 'user': 'fred' }
 * ];
 *
 * // The `_.property` iteratee shorthand.
 * _.map(users, 'user');
 * // => ['barney', 'fred']
 */
function map(collection, iteratee) {
  var func = isArray(collection) ? arrayMap : baseMap;
  return func(collection, baseIteratee(iteratee, 3));
}

module.exports = map;


/***/ }),

/***/ "./node_modules/lodash/memoize.js":
/*!****************************************!*\
  !*** ./node_modules/lodash/memoize.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var MapCache = __webpack_require__(/*! ./_MapCache */ "./node_modules/lodash/_MapCache.js");

/** Error message constants. */
var FUNC_ERROR_TEXT = 'Expected a function';

/**
 * Creates a function that memoizes the result of `func`. If `resolver` is
 * provided, it determines the cache key for storing the result based on the
 * arguments provided to the memoized function. By default, the first argument
 * provided to the memoized function is used as the map cache key. The `func`
 * is invoked with the `this` binding of the memoized function.
 *
 * **Note:** The cache is exposed as the `cache` property on the memoized
 * function. Its creation may be customized by replacing the `_.memoize.Cache`
 * constructor with one whose instances implement the
 * [`Map`](http://ecma-international.org/ecma-262/7.0/#sec-properties-of-the-map-prototype-object)
 * method interface of `clear`, `delete`, `get`, `has`, and `set`.
 *
 * @static
 * @memberOf _
 * @since 0.1.0
 * @category Function
 * @param {Function} func The function to have its output memoized.
 * @param {Function} [resolver] The function to resolve the cache key.
 * @returns {Function} Returns the new memoized function.
 * @example
 *
 * var object = { 'a': 1, 'b': 2 };
 * var other = { 'c': 3, 'd': 4 };
 *
 * var values = _.memoize(_.values);
 * values(object);
 * // => [1, 2]
 *
 * values(other);
 * // => [3, 4]
 *
 * object.a = 2;
 * values(object);
 * // => [1, 2]
 *
 * // Modify the result cache.
 * values.cache.set(object, ['a', 'b']);
 * values(object);
 * // => ['a', 'b']
 *
 * // Replace `_.memoize.Cache`.
 * _.memoize.Cache = WeakMap;
 */
function memoize(func, resolver) {
  if (typeof func != 'function' || (resolver != null && typeof resolver != 'function')) {
    throw new TypeError(FUNC_ERROR_TEXT);
  }
  var memoized = function() {
    var args = arguments,
        key = resolver ? resolver.apply(this, args) : args[0],
        cache = memoized.cache;

    if (cache.has(key)) {
      return cache.get(key);
    }
    var result = func.apply(this, args);
    memoized.cache = cache.set(key, result) || cache;
    return result;
  };
  memoized.cache = new (memoize.Cache || MapCache);
  return memoized;
}

// Expose `MapCache`.
memoize.Cache = MapCache;

module.exports = memoize;


/***/ }),

/***/ "./node_modules/lodash/property.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/property.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var baseProperty = __webpack_require__(/*! ./_baseProperty */ "./node_modules/lodash/_baseProperty.js"),
    basePropertyDeep = __webpack_require__(/*! ./_basePropertyDeep */ "./node_modules/lodash/_basePropertyDeep.js"),
    isKey = __webpack_require__(/*! ./_isKey */ "./node_modules/lodash/_isKey.js"),
    toKey = __webpack_require__(/*! ./_toKey */ "./node_modules/lodash/_toKey.js");

/**
 * Creates a function that returns the value at `path` of a given object.
 *
 * @static
 * @memberOf _
 * @since 2.4.0
 * @category Util
 * @param {Array|string} path The path of the property to get.
 * @returns {Function} Returns the new accessor function.
 * @example
 *
 * var objects = [
 *   { 'a': { 'b': 2 } },
 *   { 'a': { 'b': 1 } }
 * ];
 *
 * _.map(objects, _.property('a.b'));
 * // => [2, 1]
 *
 * _.map(_.sortBy(objects, _.property(['a', 'b'])), 'a.b');
 * // => [1, 2]
 */
function property(path) {
  return isKey(path) ? baseProperty(toKey(path)) : basePropertyDeep(path);
}

module.exports = property;


/***/ }),

/***/ "./node_modules/lodash/stubArray.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/stubArray.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * This method returns a new empty array.
 *
 * @static
 * @memberOf _
 * @since 4.13.0
 * @category Util
 * @returns {Array} Returns the new empty array.
 * @example
 *
 * var arrays = _.times(2, _.stubArray);
 *
 * console.log(arrays);
 * // => [[], []]
 *
 * console.log(arrays[0] === arrays[1]);
 * // => false
 */
function stubArray() {
  return [];
}

module.exports = stubArray;


/***/ }),

/***/ "./node_modules/lodash/stubFalse.js":
/*!******************************************!*\
  !*** ./node_modules/lodash/stubFalse.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * This method returns `false`.
 *
 * @static
 * @memberOf _
 * @since 4.13.0
 * @category Util
 * @returns {boolean} Returns `false`.
 * @example
 *
 * _.times(2, _.stubFalse);
 * // => [false, false]
 */
function stubFalse() {
  return false;
}

module.exports = stubFalse;


/***/ }),

/***/ "./node_modules/lodash/toString.js":
/*!*****************************************!*\
  !*** ./node_modules/lodash/toString.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var baseToString = __webpack_require__(/*! ./_baseToString */ "./node_modules/lodash/_baseToString.js");

/**
 * Converts `value` to a string. An empty string is returned for `null`
 * and `undefined` values. The sign of `-0` is preserved.
 *
 * @static
 * @memberOf _
 * @since 4.0.0
 * @category Lang
 * @param {*} value The value to convert.
 * @returns {string} Returns the converted string.
 * @example
 *
 * _.toString(null);
 * // => ''
 *
 * _.toString(-0);
 * // => '-0'
 *
 * _.toString([1, 2, 3]);
 * // => '1,2,3'
 */
function toString(value) {
  return value == null ? '' : baseToString(value);
}

module.exports = toString;


/***/ }),

/***/ "./node_modules/object-assign/index.js":
/*!*********************************************!*\
  !*** ./node_modules/object-assign/index.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/*
object-assign
(c) Sindre Sorhus
@license MIT
*/


/* eslint-disable no-unused-vars */
var getOwnPropertySymbols = Object.getOwnPropertySymbols;
var hasOwnProperty = Object.prototype.hasOwnProperty;
var propIsEnumerable = Object.prototype.propertyIsEnumerable;

function toObject(val) {
	if (val === null || val === undefined) {
		throw new TypeError('Object.assign cannot be called with null or undefined');
	}

	return Object(val);
}

function shouldUseNative() {
	try {
		if (!Object.assign) {
			return false;
		}

		// Detect buggy property enumeration order in older V8 versions.

		// https://bugs.chromium.org/p/v8/issues/detail?id=4118
		var test1 = new String('abc');  // eslint-disable-line no-new-wrappers
		test1[5] = 'de';
		if (Object.getOwnPropertyNames(test1)[0] === '5') {
			return false;
		}

		// https://bugs.chromium.org/p/v8/issues/detail?id=3056
		var test2 = {};
		for (var i = 0; i < 10; i++) {
			test2['_' + String.fromCharCode(i)] = i;
		}
		var order2 = Object.getOwnPropertyNames(test2).map(function (n) {
			return test2[n];
		});
		if (order2.join('') !== '0123456789') {
			return false;
		}

		// https://bugs.chromium.org/p/v8/issues/detail?id=3056
		var test3 = {};
		'abcdefghijklmnopqrst'.split('').forEach(function (letter) {
			test3[letter] = letter;
		});
		if (Object.keys(Object.assign({}, test3)).join('') !==
				'abcdefghijklmnopqrst') {
			return false;
		}

		return true;
	} catch (err) {
		// We don't expect any of the above to throw, but better to be safe.
		return false;
	}
}

module.exports = shouldUseNative() ? Object.assign : function (target, source) {
	var from;
	var to = toObject(target);
	var symbols;

	for (var s = 1; s < arguments.length; s++) {
		from = Object(arguments[s]);

		for (var key in from) {
			if (hasOwnProperty.call(from, key)) {
				to[key] = from[key];
			}
		}

		if (getOwnPropertySymbols) {
			symbols = getOwnPropertySymbols(from);
			for (var i = 0; i < symbols.length; i++) {
				if (propIsEnumerable.call(from, symbols[i])) {
					to[symbols[i]] = from[symbols[i]];
				}
			}
		}
	}

	return to;
};


/***/ }),

/***/ "./node_modules/prop-types/checkPropTypes.js":
/*!***************************************************!*\
  !*** ./node_modules/prop-types/checkPropTypes.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */



var printWarning = function() {};

if (true) {
  var ReactPropTypesSecret = __webpack_require__(/*! ./lib/ReactPropTypesSecret */ "./node_modules/prop-types/lib/ReactPropTypesSecret.js");
  var loggedTypeFailures = {};
  var has = Function.call.bind(Object.prototype.hasOwnProperty);

  printWarning = function(text) {
    var message = 'Warning: ' + text;
    if (typeof console !== 'undefined') {
      console.error(message);
    }
    try {
      // --- Welcome to debugging React ---
      // This error was thrown as a convenience so that you can use this stack
      // to find the callsite that caused this warning to fire.
      throw new Error(message);
    } catch (x) {}
  };
}

/**
 * Assert that the values match with the type specs.
 * Error messages are memorized and will only be shown once.
 *
 * @param {object} typeSpecs Map of name to a ReactPropType
 * @param {object} values Runtime values that need to be type-checked
 * @param {string} location e.g. "prop", "context", "child context"
 * @param {string} componentName Name of the component for error messages.
 * @param {?Function} getStack Returns the component stack.
 * @private
 */
function checkPropTypes(typeSpecs, values, location, componentName, getStack) {
  if (true) {
    for (var typeSpecName in typeSpecs) {
      if (has(typeSpecs, typeSpecName)) {
        var error;
        // Prop type validation may throw. In case they do, we don't want to
        // fail the render phase where it didn't fail before. So we log it.
        // After these have been cleaned up, we'll let them throw.
        try {
          // This is intentionally an invariant that gets caught. It's the same
          // behavior as without this statement except with a better message.
          if (typeof typeSpecs[typeSpecName] !== 'function') {
            var err = Error(
              (componentName || 'React class') + ': ' + location + ' type `' + typeSpecName + '` is invalid; ' +
              'it must be a function, usually from the `prop-types` package, but received `' + typeof typeSpecs[typeSpecName] + '`.'
            );
            err.name = 'Invariant Violation';
            throw err;
          }
          error = typeSpecs[typeSpecName](values, typeSpecName, componentName, location, null, ReactPropTypesSecret);
        } catch (ex) {
          error = ex;
        }
        if (error && !(error instanceof Error)) {
          printWarning(
            (componentName || 'React class') + ': type specification of ' +
            location + ' `' + typeSpecName + '` is invalid; the type checker ' +
            'function must return `null` or an `Error` but returned a ' + typeof error + '. ' +
            'You may have forgotten to pass an argument to the type checker ' +
            'creator (arrayOf, instanceOf, objectOf, oneOf, oneOfType, and ' +
            'shape all require an argument).'
          );
        }
        if (error instanceof Error && !(error.message in loggedTypeFailures)) {
          // Only monitor this failure once because there tends to be a lot of the
          // same error.
          loggedTypeFailures[error.message] = true;

          var stack = getStack ? getStack() : '';

          printWarning(
            'Failed ' + location + ' type: ' + error.message + (stack != null ? stack : '')
          );
        }
      }
    }
  }
}

/**
 * Resets warning cache when testing.
 *
 * @private
 */
checkPropTypes.resetWarningCache = function() {
  if (true) {
    loggedTypeFailures = {};
  }
}

module.exports = checkPropTypes;


/***/ }),

/***/ "./node_modules/prop-types/factoryWithTypeCheckers.js":
/*!************************************************************!*\
  !*** ./node_modules/prop-types/factoryWithTypeCheckers.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */



var ReactIs = __webpack_require__(/*! react-is */ "./node_modules/react-is/index.js");
var assign = __webpack_require__(/*! object-assign */ "./node_modules/object-assign/index.js");

var ReactPropTypesSecret = __webpack_require__(/*! ./lib/ReactPropTypesSecret */ "./node_modules/prop-types/lib/ReactPropTypesSecret.js");
var checkPropTypes = __webpack_require__(/*! ./checkPropTypes */ "./node_modules/prop-types/checkPropTypes.js");

var has = Function.call.bind(Object.prototype.hasOwnProperty);
var printWarning = function() {};

if (true) {
  printWarning = function(text) {
    var message = 'Warning: ' + text;
    if (typeof console !== 'undefined') {
      console.error(message);
    }
    try {
      // --- Welcome to debugging React ---
      // This error was thrown as a convenience so that you can use this stack
      // to find the callsite that caused this warning to fire.
      throw new Error(message);
    } catch (x) {}
  };
}

function emptyFunctionThatReturnsNull() {
  return null;
}

module.exports = function(isValidElement, throwOnDirectAccess) {
  /* global Symbol */
  var ITERATOR_SYMBOL = typeof Symbol === 'function' && Symbol.iterator;
  var FAUX_ITERATOR_SYMBOL = '@@iterator'; // Before Symbol spec.

  /**
   * Returns the iterator method function contained on the iterable object.
   *
   * Be sure to invoke the function with the iterable as context:
   *
   *     var iteratorFn = getIteratorFn(myIterable);
   *     if (iteratorFn) {
   *       var iterator = iteratorFn.call(myIterable);
   *       ...
   *     }
   *
   * @param {?object} maybeIterable
   * @return {?function}
   */
  function getIteratorFn(maybeIterable) {
    var iteratorFn = maybeIterable && (ITERATOR_SYMBOL && maybeIterable[ITERATOR_SYMBOL] || maybeIterable[FAUX_ITERATOR_SYMBOL]);
    if (typeof iteratorFn === 'function') {
      return iteratorFn;
    }
  }

  /**
   * Collection of methods that allow declaration and validation of props that are
   * supplied to React components. Example usage:
   *
   *   var Props = require('ReactPropTypes');
   *   var MyArticle = React.createClass({
   *     propTypes: {
   *       // An optional string prop named "description".
   *       description: Props.string,
   *
   *       // A required enum prop named "category".
   *       category: Props.oneOf(['News','Photos']).isRequired,
   *
   *       // A prop named "dialog" that requires an instance of Dialog.
   *       dialog: Props.instanceOf(Dialog).isRequired
   *     },
   *     render: function() { ... }
   *   });
   *
   * A more formal specification of how these methods are used:
   *
   *   type := array|bool|func|object|number|string|oneOf([...])|instanceOf(...)
   *   decl := ReactPropTypes.{type}(.isRequired)?
   *
   * Each and every declaration produces a function with the same signature. This
   * allows the creation of custom validation functions. For example:
   *
   *  var MyLink = React.createClass({
   *    propTypes: {
   *      // An optional string or URI prop named "href".
   *      href: function(props, propName, componentName) {
   *        var propValue = props[propName];
   *        if (propValue != null && typeof propValue !== 'string' &&
   *            !(propValue instanceof URI)) {
   *          return new Error(
   *            'Expected a string or an URI for ' + propName + ' in ' +
   *            componentName
   *          );
   *        }
   *      }
   *    },
   *    render: function() {...}
   *  });
   *
   * @internal
   */

  var ANONYMOUS = '<<anonymous>>';

  // Important!
  // Keep this list in sync with production version in `./factoryWithThrowingShims.js`.
  var ReactPropTypes = {
    array: createPrimitiveTypeChecker('array'),
    bool: createPrimitiveTypeChecker('boolean'),
    func: createPrimitiveTypeChecker('function'),
    number: createPrimitiveTypeChecker('number'),
    object: createPrimitiveTypeChecker('object'),
    string: createPrimitiveTypeChecker('string'),
    symbol: createPrimitiveTypeChecker('symbol'),

    any: createAnyTypeChecker(),
    arrayOf: createArrayOfTypeChecker,
    element: createElementTypeChecker(),
    elementType: createElementTypeTypeChecker(),
    instanceOf: createInstanceTypeChecker,
    node: createNodeChecker(),
    objectOf: createObjectOfTypeChecker,
    oneOf: createEnumTypeChecker,
    oneOfType: createUnionTypeChecker,
    shape: createShapeTypeChecker,
    exact: createStrictShapeTypeChecker,
  };

  /**
   * inlined Object.is polyfill to avoid requiring consumers ship their own
   * https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/is
   */
  /*eslint-disable no-self-compare*/
  function is(x, y) {
    // SameValue algorithm
    if (x === y) {
      // Steps 1-5, 7-10
      // Steps 6.b-6.e: +0 != -0
      return x !== 0 || 1 / x === 1 / y;
    } else {
      // Step 6.a: NaN == NaN
      return x !== x && y !== y;
    }
  }
  /*eslint-enable no-self-compare*/

  /**
   * We use an Error-like object for backward compatibility as people may call
   * PropTypes directly and inspect their output. However, we don't use real
   * Errors anymore. We don't inspect their stack anyway, and creating them
   * is prohibitively expensive if they are created too often, such as what
   * happens in oneOfType() for any type before the one that matched.
   */
  function PropTypeError(message) {
    this.message = message;
    this.stack = '';
  }
  // Make `instanceof Error` still work for returned errors.
  PropTypeError.prototype = Error.prototype;

  function createChainableTypeChecker(validate) {
    if (true) {
      var manualPropTypeCallCache = {};
      var manualPropTypeWarningCount = 0;
    }
    function checkType(isRequired, props, propName, componentName, location, propFullName, secret) {
      componentName = componentName || ANONYMOUS;
      propFullName = propFullName || propName;

      if (secret !== ReactPropTypesSecret) {
        if (throwOnDirectAccess) {
          // New behavior only for users of `prop-types` package
          var err = new Error(
            'Calling PropTypes validators directly is not supported by the `prop-types` package. ' +
            'Use `PropTypes.checkPropTypes()` to call them. ' +
            'Read more at http://fb.me/use-check-prop-types'
          );
          err.name = 'Invariant Violation';
          throw err;
        } else if ( true && typeof console !== 'undefined') {
          // Old behavior for people using React.PropTypes
          var cacheKey = componentName + ':' + propName;
          if (
            !manualPropTypeCallCache[cacheKey] &&
            // Avoid spamming the console because they are often not actionable except for lib authors
            manualPropTypeWarningCount < 3
          ) {
            printWarning(
              'You are manually calling a React.PropTypes validation ' +
              'function for the `' + propFullName + '` prop on `' + componentName  + '`. This is deprecated ' +
              'and will throw in the standalone `prop-types` package. ' +
              'You may be seeing this warning due to a third-party PropTypes ' +
              'library. See https://fb.me/react-warning-dont-call-proptypes ' + 'for details.'
            );
            manualPropTypeCallCache[cacheKey] = true;
            manualPropTypeWarningCount++;
          }
        }
      }
      if (props[propName] == null) {
        if (isRequired) {
          if (props[propName] === null) {
            return new PropTypeError('The ' + location + ' `' + propFullName + '` is marked as required ' + ('in `' + componentName + '`, but its value is `null`.'));
          }
          return new PropTypeError('The ' + location + ' `' + propFullName + '` is marked as required in ' + ('`' + componentName + '`, but its value is `undefined`.'));
        }
        return null;
      } else {
        return validate(props, propName, componentName, location, propFullName);
      }
    }

    var chainedCheckType = checkType.bind(null, false);
    chainedCheckType.isRequired = checkType.bind(null, true);

    return chainedCheckType;
  }

  function createPrimitiveTypeChecker(expectedType) {
    function validate(props, propName, componentName, location, propFullName, secret) {
      var propValue = props[propName];
      var propType = getPropType(propValue);
      if (propType !== expectedType) {
        // `propValue` being instance of, say, date/regexp, pass the 'object'
        // check, but we can offer a more precise error message here rather than
        // 'of type `object`'.
        var preciseType = getPreciseType(propValue);

        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + preciseType + '` supplied to `' + componentName + '`, expected ') + ('`' + expectedType + '`.'));
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createAnyTypeChecker() {
    return createChainableTypeChecker(emptyFunctionThatReturnsNull);
  }

  function createArrayOfTypeChecker(typeChecker) {
    function validate(props, propName, componentName, location, propFullName) {
      if (typeof typeChecker !== 'function') {
        return new PropTypeError('Property `' + propFullName + '` of component `' + componentName + '` has invalid PropType notation inside arrayOf.');
      }
      var propValue = props[propName];
      if (!Array.isArray(propValue)) {
        var propType = getPropType(propValue);
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + propType + '` supplied to `' + componentName + '`, expected an array.'));
      }
      for (var i = 0; i < propValue.length; i++) {
        var error = typeChecker(propValue, i, componentName, location, propFullName + '[' + i + ']', ReactPropTypesSecret);
        if (error instanceof Error) {
          return error;
        }
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createElementTypeChecker() {
    function validate(props, propName, componentName, location, propFullName) {
      var propValue = props[propName];
      if (!isValidElement(propValue)) {
        var propType = getPropType(propValue);
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + propType + '` supplied to `' + componentName + '`, expected a single ReactElement.'));
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createElementTypeTypeChecker() {
    function validate(props, propName, componentName, location, propFullName) {
      var propValue = props[propName];
      if (!ReactIs.isValidElementType(propValue)) {
        var propType = getPropType(propValue);
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + propType + '` supplied to `' + componentName + '`, expected a single ReactElement type.'));
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createInstanceTypeChecker(expectedClass) {
    function validate(props, propName, componentName, location, propFullName) {
      if (!(props[propName] instanceof expectedClass)) {
        var expectedClassName = expectedClass.name || ANONYMOUS;
        var actualClassName = getClassName(props[propName]);
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + actualClassName + '` supplied to `' + componentName + '`, expected ') + ('instance of `' + expectedClassName + '`.'));
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createEnumTypeChecker(expectedValues) {
    if (!Array.isArray(expectedValues)) {
      if (true) {
        if (arguments.length > 1) {
          printWarning(
            'Invalid arguments supplied to oneOf, expected an array, got ' + arguments.length + ' arguments. ' +
            'A common mistake is to write oneOf(x, y, z) instead of oneOf([x, y, z]).'
          );
        } else {
          printWarning('Invalid argument supplied to oneOf, expected an array.');
        }
      }
      return emptyFunctionThatReturnsNull;
    }

    function validate(props, propName, componentName, location, propFullName) {
      var propValue = props[propName];
      for (var i = 0; i < expectedValues.length; i++) {
        if (is(propValue, expectedValues[i])) {
          return null;
        }
      }

      var valuesString = JSON.stringify(expectedValues, function replacer(key, value) {
        var type = getPreciseType(value);
        if (type === 'symbol') {
          return String(value);
        }
        return value;
      });
      return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of value `' + String(propValue) + '` ' + ('supplied to `' + componentName + '`, expected one of ' + valuesString + '.'));
    }
    return createChainableTypeChecker(validate);
  }

  function createObjectOfTypeChecker(typeChecker) {
    function validate(props, propName, componentName, location, propFullName) {
      if (typeof typeChecker !== 'function') {
        return new PropTypeError('Property `' + propFullName + '` of component `' + componentName + '` has invalid PropType notation inside objectOf.');
      }
      var propValue = props[propName];
      var propType = getPropType(propValue);
      if (propType !== 'object') {
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type ' + ('`' + propType + '` supplied to `' + componentName + '`, expected an object.'));
      }
      for (var key in propValue) {
        if (has(propValue, key)) {
          var error = typeChecker(propValue, key, componentName, location, propFullName + '.' + key, ReactPropTypesSecret);
          if (error instanceof Error) {
            return error;
          }
        }
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createUnionTypeChecker(arrayOfTypeCheckers) {
    if (!Array.isArray(arrayOfTypeCheckers)) {
       true ? printWarning('Invalid argument supplied to oneOfType, expected an instance of array.') : undefined;
      return emptyFunctionThatReturnsNull;
    }

    for (var i = 0; i < arrayOfTypeCheckers.length; i++) {
      var checker = arrayOfTypeCheckers[i];
      if (typeof checker !== 'function') {
        printWarning(
          'Invalid argument supplied to oneOfType. Expected an array of check functions, but ' +
          'received ' + getPostfixForTypeWarning(checker) + ' at index ' + i + '.'
        );
        return emptyFunctionThatReturnsNull;
      }
    }

    function validate(props, propName, componentName, location, propFullName) {
      for (var i = 0; i < arrayOfTypeCheckers.length; i++) {
        var checker = arrayOfTypeCheckers[i];
        if (checker(props, propName, componentName, location, propFullName, ReactPropTypesSecret) == null) {
          return null;
        }
      }

      return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` supplied to ' + ('`' + componentName + '`.'));
    }
    return createChainableTypeChecker(validate);
  }

  function createNodeChecker() {
    function validate(props, propName, componentName, location, propFullName) {
      if (!isNode(props[propName])) {
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` supplied to ' + ('`' + componentName + '`, expected a ReactNode.'));
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createShapeTypeChecker(shapeTypes) {
    function validate(props, propName, componentName, location, propFullName) {
      var propValue = props[propName];
      var propType = getPropType(propValue);
      if (propType !== 'object') {
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type `' + propType + '` ' + ('supplied to `' + componentName + '`, expected `object`.'));
      }
      for (var key in shapeTypes) {
        var checker = shapeTypes[key];
        if (!checker) {
          continue;
        }
        var error = checker(propValue, key, componentName, location, propFullName + '.' + key, ReactPropTypesSecret);
        if (error) {
          return error;
        }
      }
      return null;
    }
    return createChainableTypeChecker(validate);
  }

  function createStrictShapeTypeChecker(shapeTypes) {
    function validate(props, propName, componentName, location, propFullName) {
      var propValue = props[propName];
      var propType = getPropType(propValue);
      if (propType !== 'object') {
        return new PropTypeError('Invalid ' + location + ' `' + propFullName + '` of type `' + propType + '` ' + ('supplied to `' + componentName + '`, expected `object`.'));
      }
      // We need to check all keys in case some are required but missing from
      // props.
      var allKeys = assign({}, props[propName], shapeTypes);
      for (var key in allKeys) {
        var checker = shapeTypes[key];
        if (!checker) {
          return new PropTypeError(
            'Invalid ' + location + ' `' + propFullName + '` key `' + key + '` supplied to `' + componentName + '`.' +
            '\nBad object: ' + JSON.stringify(props[propName], null, '  ') +
            '\nValid keys: ' +  JSON.stringify(Object.keys(shapeTypes), null, '  ')
          );
        }
        var error = checker(propValue, key, componentName, location, propFullName + '.' + key, ReactPropTypesSecret);
        if (error) {
          return error;
        }
      }
      return null;
    }

    return createChainableTypeChecker(validate);
  }

  function isNode(propValue) {
    switch (typeof propValue) {
      case 'number':
      case 'string':
      case 'undefined':
        return true;
      case 'boolean':
        return !propValue;
      case 'object':
        if (Array.isArray(propValue)) {
          return propValue.every(isNode);
        }
        if (propValue === null || isValidElement(propValue)) {
          return true;
        }

        var iteratorFn = getIteratorFn(propValue);
        if (iteratorFn) {
          var iterator = iteratorFn.call(propValue);
          var step;
          if (iteratorFn !== propValue.entries) {
            while (!(step = iterator.next()).done) {
              if (!isNode(step.value)) {
                return false;
              }
            }
          } else {
            // Iterator will provide entry [k,v] tuples rather than values.
            while (!(step = iterator.next()).done) {
              var entry = step.value;
              if (entry) {
                if (!isNode(entry[1])) {
                  return false;
                }
              }
            }
          }
        } else {
          return false;
        }

        return true;
      default:
        return false;
    }
  }

  function isSymbol(propType, propValue) {
    // Native Symbol.
    if (propType === 'symbol') {
      return true;
    }

    // falsy value can't be a Symbol
    if (!propValue) {
      return false;
    }

    // 19.4.3.5 Symbol.prototype[@@toStringTag] === 'Symbol'
    if (propValue['@@toStringTag'] === 'Symbol') {
      return true;
    }

    // Fallback for non-spec compliant Symbols which are polyfilled.
    if (typeof Symbol === 'function' && propValue instanceof Symbol) {
      return true;
    }

    return false;
  }

  // Equivalent of `typeof` but with special handling for array and regexp.
  function getPropType(propValue) {
    var propType = typeof propValue;
    if (Array.isArray(propValue)) {
      return 'array';
    }
    if (propValue instanceof RegExp) {
      // Old webkits (at least until Android 4.0) return 'function' rather than
      // 'object' for typeof a RegExp. We'll normalize this here so that /bla/
      // passes PropTypes.object.
      return 'object';
    }
    if (isSymbol(propType, propValue)) {
      return 'symbol';
    }
    return propType;
  }

  // This handles more types than `getPropType`. Only used for error messages.
  // See `createPrimitiveTypeChecker`.
  function getPreciseType(propValue) {
    if (typeof propValue === 'undefined' || propValue === null) {
      return '' + propValue;
    }
    var propType = getPropType(propValue);
    if (propType === 'object') {
      if (propValue instanceof Date) {
        return 'date';
      } else if (propValue instanceof RegExp) {
        return 'regexp';
      }
    }
    return propType;
  }

  // Returns a string that is postfixed to a warning about an invalid type.
  // For example, "undefined" or "of type array"
  function getPostfixForTypeWarning(value) {
    var type = getPreciseType(value);
    switch (type) {
      case 'array':
      case 'object':
        return 'an ' + type;
      case 'boolean':
      case 'date':
      case 'regexp':
        return 'a ' + type;
      default:
        return type;
    }
  }

  // Returns class name of the object, if any.
  function getClassName(propValue) {
    if (!propValue.constructor || !propValue.constructor.name) {
      return ANONYMOUS;
    }
    return propValue.constructor.name;
  }

  ReactPropTypes.checkPropTypes = checkPropTypes;
  ReactPropTypes.resetWarningCache = checkPropTypes.resetWarningCache;
  ReactPropTypes.PropTypes = ReactPropTypes;

  return ReactPropTypes;
};


/***/ }),

/***/ "./node_modules/prop-types/index.js":
/*!******************************************!*\
  !*** ./node_modules/prop-types/index.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */

if (true) {
  var ReactIs = __webpack_require__(/*! react-is */ "./node_modules/react-is/index.js");

  // By explicitly using `prop-types` you are opting into new development behavior.
  // http://fb.me/prop-types-in-prod
  var throwOnDirectAccess = true;
  module.exports = __webpack_require__(/*! ./factoryWithTypeCheckers */ "./node_modules/prop-types/factoryWithTypeCheckers.js")(ReactIs.isElement, throwOnDirectAccess);
} else {}


/***/ }),

/***/ "./node_modules/prop-types/lib/ReactPropTypesSecret.js":
/*!*************************************************************!*\
  !*** ./node_modules/prop-types/lib/ReactPropTypesSecret.js ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/**
 * Copyright (c) 2013-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */



var ReactPropTypesSecret = 'SECRET_DO_NOT_PASS_THIS_OR_YOU_WILL_BE_FIRED';

module.exports = ReactPropTypesSecret;


/***/ }),

/***/ "./node_modules/react-is/cjs/react-is.development.js":
/*!***********************************************************!*\
  !*** ./node_modules/react-is/cjs/react-is.development.js ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/** @license React v16.13.1
 * react-is.development.js
 *
 * Copyright (c) Facebook, Inc. and its affiliates.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */





if (true) {
  (function() {
'use strict';

// The Symbol used to tag the ReactElement-like types. If there is no native Symbol
// nor polyfill, then a plain number is used for performance.
var hasSymbol = typeof Symbol === 'function' && Symbol.for;
var REACT_ELEMENT_TYPE = hasSymbol ? Symbol.for('react.element') : 0xeac7;
var REACT_PORTAL_TYPE = hasSymbol ? Symbol.for('react.portal') : 0xeaca;
var REACT_FRAGMENT_TYPE = hasSymbol ? Symbol.for('react.fragment') : 0xeacb;
var REACT_STRICT_MODE_TYPE = hasSymbol ? Symbol.for('react.strict_mode') : 0xeacc;
var REACT_PROFILER_TYPE = hasSymbol ? Symbol.for('react.profiler') : 0xead2;
var REACT_PROVIDER_TYPE = hasSymbol ? Symbol.for('react.provider') : 0xeacd;
var REACT_CONTEXT_TYPE = hasSymbol ? Symbol.for('react.context') : 0xeace; // TODO: We don't use AsyncMode or ConcurrentMode anymore. They were temporary
// (unstable) APIs that have been removed. Can we remove the symbols?

var REACT_ASYNC_MODE_TYPE = hasSymbol ? Symbol.for('react.async_mode') : 0xeacf;
var REACT_CONCURRENT_MODE_TYPE = hasSymbol ? Symbol.for('react.concurrent_mode') : 0xeacf;
var REACT_FORWARD_REF_TYPE = hasSymbol ? Symbol.for('react.forward_ref') : 0xead0;
var REACT_SUSPENSE_TYPE = hasSymbol ? Symbol.for('react.suspense') : 0xead1;
var REACT_SUSPENSE_LIST_TYPE = hasSymbol ? Symbol.for('react.suspense_list') : 0xead8;
var REACT_MEMO_TYPE = hasSymbol ? Symbol.for('react.memo') : 0xead3;
var REACT_LAZY_TYPE = hasSymbol ? Symbol.for('react.lazy') : 0xead4;
var REACT_BLOCK_TYPE = hasSymbol ? Symbol.for('react.block') : 0xead9;
var REACT_FUNDAMENTAL_TYPE = hasSymbol ? Symbol.for('react.fundamental') : 0xead5;
var REACT_RESPONDER_TYPE = hasSymbol ? Symbol.for('react.responder') : 0xead6;
var REACT_SCOPE_TYPE = hasSymbol ? Symbol.for('react.scope') : 0xead7;

function isValidElementType(type) {
  return typeof type === 'string' || typeof type === 'function' || // Note: its typeof might be other than 'symbol' or 'number' if it's a polyfill.
  type === REACT_FRAGMENT_TYPE || type === REACT_CONCURRENT_MODE_TYPE || type === REACT_PROFILER_TYPE || type === REACT_STRICT_MODE_TYPE || type === REACT_SUSPENSE_TYPE || type === REACT_SUSPENSE_LIST_TYPE || typeof type === 'object' && type !== null && (type.$$typeof === REACT_LAZY_TYPE || type.$$typeof === REACT_MEMO_TYPE || type.$$typeof === REACT_PROVIDER_TYPE || type.$$typeof === REACT_CONTEXT_TYPE || type.$$typeof === REACT_FORWARD_REF_TYPE || type.$$typeof === REACT_FUNDAMENTAL_TYPE || type.$$typeof === REACT_RESPONDER_TYPE || type.$$typeof === REACT_SCOPE_TYPE || type.$$typeof === REACT_BLOCK_TYPE);
}

function typeOf(object) {
  if (typeof object === 'object' && object !== null) {
    var $$typeof = object.$$typeof;

    switch ($$typeof) {
      case REACT_ELEMENT_TYPE:
        var type = object.type;

        switch (type) {
          case REACT_ASYNC_MODE_TYPE:
          case REACT_CONCURRENT_MODE_TYPE:
          case REACT_FRAGMENT_TYPE:
          case REACT_PROFILER_TYPE:
          case REACT_STRICT_MODE_TYPE:
          case REACT_SUSPENSE_TYPE:
            return type;

          default:
            var $$typeofType = type && type.$$typeof;

            switch ($$typeofType) {
              case REACT_CONTEXT_TYPE:
              case REACT_FORWARD_REF_TYPE:
              case REACT_LAZY_TYPE:
              case REACT_MEMO_TYPE:
              case REACT_PROVIDER_TYPE:
                return $$typeofType;

              default:
                return $$typeof;
            }

        }

      case REACT_PORTAL_TYPE:
        return $$typeof;
    }
  }

  return undefined;
} // AsyncMode is deprecated along with isAsyncMode

var AsyncMode = REACT_ASYNC_MODE_TYPE;
var ConcurrentMode = REACT_CONCURRENT_MODE_TYPE;
var ContextConsumer = REACT_CONTEXT_TYPE;
var ContextProvider = REACT_PROVIDER_TYPE;
var Element = REACT_ELEMENT_TYPE;
var ForwardRef = REACT_FORWARD_REF_TYPE;
var Fragment = REACT_FRAGMENT_TYPE;
var Lazy = REACT_LAZY_TYPE;
var Memo = REACT_MEMO_TYPE;
var Portal = REACT_PORTAL_TYPE;
var Profiler = REACT_PROFILER_TYPE;
var StrictMode = REACT_STRICT_MODE_TYPE;
var Suspense = REACT_SUSPENSE_TYPE;
var hasWarnedAboutDeprecatedIsAsyncMode = false; // AsyncMode should be deprecated

function isAsyncMode(object) {
  {
    if (!hasWarnedAboutDeprecatedIsAsyncMode) {
      hasWarnedAboutDeprecatedIsAsyncMode = true; // Using console['warn'] to evade Babel and ESLint

      console['warn']('The ReactIs.isAsyncMode() alias has been deprecated, ' + 'and will be removed in React 17+. Update your code to use ' + 'ReactIs.isConcurrentMode() instead. It has the exact same API.');
    }
  }

  return isConcurrentMode(object) || typeOf(object) === REACT_ASYNC_MODE_TYPE;
}
function isConcurrentMode(object) {
  return typeOf(object) === REACT_CONCURRENT_MODE_TYPE;
}
function isContextConsumer(object) {
  return typeOf(object) === REACT_CONTEXT_TYPE;
}
function isContextProvider(object) {
  return typeOf(object) === REACT_PROVIDER_TYPE;
}
function isElement(object) {
  return typeof object === 'object' && object !== null && object.$$typeof === REACT_ELEMENT_TYPE;
}
function isForwardRef(object) {
  return typeOf(object) === REACT_FORWARD_REF_TYPE;
}
function isFragment(object) {
  return typeOf(object) === REACT_FRAGMENT_TYPE;
}
function isLazy(object) {
  return typeOf(object) === REACT_LAZY_TYPE;
}
function isMemo(object) {
  return typeOf(object) === REACT_MEMO_TYPE;
}
function isPortal(object) {
  return typeOf(object) === REACT_PORTAL_TYPE;
}
function isProfiler(object) {
  return typeOf(object) === REACT_PROFILER_TYPE;
}
function isStrictMode(object) {
  return typeOf(object) === REACT_STRICT_MODE_TYPE;
}
function isSuspense(object) {
  return typeOf(object) === REACT_SUSPENSE_TYPE;
}

exports.AsyncMode = AsyncMode;
exports.ConcurrentMode = ConcurrentMode;
exports.ContextConsumer = ContextConsumer;
exports.ContextProvider = ContextProvider;
exports.Element = Element;
exports.ForwardRef = ForwardRef;
exports.Fragment = Fragment;
exports.Lazy = Lazy;
exports.Memo = Memo;
exports.Portal = Portal;
exports.Profiler = Profiler;
exports.StrictMode = StrictMode;
exports.Suspense = Suspense;
exports.isAsyncMode = isAsyncMode;
exports.isConcurrentMode = isConcurrentMode;
exports.isContextConsumer = isContextConsumer;
exports.isContextProvider = isContextProvider;
exports.isElement = isElement;
exports.isForwardRef = isForwardRef;
exports.isFragment = isFragment;
exports.isLazy = isLazy;
exports.isMemo = isMemo;
exports.isPortal = isPortal;
exports.isProfiler = isProfiler;
exports.isStrictMode = isStrictMode;
exports.isSuspense = isSuspense;
exports.isValidElementType = isValidElementType;
exports.typeOf = typeOf;
  })();
}


/***/ }),

/***/ "./node_modules/react-is/index.js":
/*!****************************************!*\
  !*** ./node_modules/react-is/index.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


if (false) {} else {
  module.exports = __webpack_require__(/*! ./cjs/react-is.development.js */ "./node_modules/react-is/cjs/react-is.development.js");
}


/***/ }),

/***/ "./node_modules/react-sortablejs/dist/index.js":
/*!*****************************************************!*\
  !*** ./node_modules/react-sortablejs/dist/index.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var e=g(__webpack_require__(/*! tiny-invariant */ "./node_modules/tiny-invariant/dist/tiny-invariant.esm.js")),t=__webpack_require__(/*! react */ "react"),n=t.Children,r=t.cloneElement,o=t.Component,i=t.createElement,l=t.createRef,a=g(__webpack_require__(/*! classnames */ "./node_modules/classnames/index.js")),c=__webpack_require__(/*! sortablejs */ "./node_modules/sortablejs/modular/sortable.esm.js"),s=g(c);exports.Sortable=s;var u=c.Direction;exports.Direction=u;var f=c.DOMRect;exports.DOMRect=f;var p=c.GroupOptions;exports.GroupOptions=p;var d=c.MoveEvent;exports.MoveEvent=d;var b=c.Options;exports.Options=b;var y=c.PullResult;exports.PullResult=y;var v=c.PutResult;exports.PutResult=v;var h=c.SortableEvent;exports.SortableEvent=h;var m=c.SortableOptions;exports.SortableOptions=m;var O=c.Utils;function g(e){return e&&e.__esModule?e.default:e}function w(e,t){if(null==e)return{};var n,r,o=function(e,t){if(null==e)return{};var n,r,o={},i=Object.keys(e);for(r=0;r<i.length;r++)n=i[r],t.indexOf(n)>=0||(o[n]=e[n]);return o}(e,t);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(e);for(r=0;r<i.length;r++)n=i[r],t.indexOf(n)>=0||Object.prototype.propertyIsEnumerable.call(e,n)&&(o[n]=e[n])}return o}function S(e){return function(e){if(Array.isArray(e))return j(e)}(e)||function(e){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(e))return Array.from(e)}(e)||function(e,t){if(!e)return;if("string"==typeof e)return j(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);"Object"===n&&e.constructor&&(n=e.constructor.name);if("Map"===n||"Set"===n)return Array.from(e);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return j(e,t)}(e)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function j(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}function x(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,r)}return n}function I(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?x(Object(n),!0).forEach((function(t){P(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):x(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function P(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function E(e){null!==e.parentElement&&e.parentElement.removeChild(e)}function k(e){e.forEach((function(e){return E(e.element)}))}function C(e){e.forEach((function(e){var t,n,r,o;t=e.parentElement,n=e.element,r=e.oldIndex,o=t.children[r]||null,t.insertBefore(n,o)}))}function D(e,t){var n=M(e),r={parentElement:e.from},o=[];switch(n){case"normal":o=[{element:e.item,newIndex:e.newIndex,oldIndex:e.oldIndex,parentElement:e.from}];break;case"swap":o=[I({element:e.item,oldIndex:e.oldIndex,newIndex:e.newIndex},r),I({element:e.swapItem,oldIndex:e.newIndex,newIndex:e.oldIndex},r)];break;case"multidrag":o=e.oldIndicies.map((function(t,n){return I({element:t.multiDragElement,oldIndex:t.index,newIndex:e.newIndicies[n].index},r)}))}return function(e,t){return e.map((function(e){return I(I({},e),{},{item:t[e.oldIndex]})})).sort((function(e,t){return e.oldIndex-t.oldIndex}))}(o,t)}function A(e,t){var n=S(t);return e.concat().reverse().forEach((function(e){return n.splice(e.oldIndex,1)})),n}function R(e,t,n,r){var o=S(t);return e.forEach((function(e){var t=r&&n&&r(e.item,n);o.splice(e.newIndex,0,t||e.item)})),o}function M(e){return e.oldIndicies&&e.oldIndicies.length>0?"multidrag":e.swapItem?"swap":"normal"}function U(e){return(U="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function L(e){return function(e){if(Array.isArray(e))return _(e)}(e)||function(e){if("undefined"!=typeof Symbol&&Symbol.iterator in Object(e))return Array.from(e)}(e)||function(e,t){if(!e)return;if("string"==typeof e)return _(e,t);var n=Object.prototype.toString.call(e).slice(8,-1);"Object"===n&&e.constructor&&(n=e.constructor.name);if("Map"===n||"Set"===n)return Array.from(e);if("Arguments"===n||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n))return _(e,t)}(e)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function _(e,t){(null==t||t>e.length)&&(t=e.length);for(var n=0,r=new Array(t);n<t;n++)r[n]=e[n];return r}function H(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,r)}return n}function N(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?H(Object(n),!0).forEach((function(t){B(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):H(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function q(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}function T(e,t){return(T=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e})(e,t)}function F(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var n,r=$(e);if(t){var o=$(this).constructor;n=Reflect.construct(r,arguments,o)}else n=r.apply(this,arguments);return G(this,n)}}function G(e,t){return!t||"object"!==U(t)&&"function"!=typeof t?function(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}(e):t}function $(e){return($=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}function B(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}exports.Utils=O;var J={dragging:null},z=function(t){!function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&T(e,t)}(d,o);var c,u,f,p=F(d);function d(t){var n;!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,d),(n=p.call(this,t)).ref=l();var r=t.list.map((function(e){return N(N({},e),{},{chosen:!1,selected:!1})}));return t.setList(r,n.sortable,J),e(!t.plugins,'\nPlugins prop is no longer supported.\nInstead, mount it with "Sortable.mount(new MultiDrag())"\nPlease read the updated README.md at https://github.com/SortableJS/react-sortablejs.\n      '),n}return c=d,(u=[{key:"componentDidMount",value:function(){if(null!==this.ref.current){var e=this.makeOptions();s.create(this.ref.current,e)}}},{key:"render",value:function(){var e=this.props,t=e.tag,n={style:e.style,className:e.className,id:e.id};return i(t&&null!==t?t:"div",N({ref:this.ref},n),this.getChildren())}},{key:"getChildren",value:function(){var e=this.props,t=e.children,o=e.dataIdAttr,i=e.selectedClass,l=void 0===i?"sortable-selected":i,c=e.chosenClass,s=void 0===c?"sortable-chosen":c,u=(e.dragClass,e.fallbackClass,e.ghostClass,e.swapClass,e.filter),f=void 0===u?"sortable-filter":u,p=e.list;if(!t||null==t)return null;var d=o||"data-id";return n.map(t,(function(e,t){var n,o,i=p[t],c=e.props.className,u="string"==typeof f&&B({},f.replace(".",""),!!i.filtered),b=a(c,N((B(n={},l,i.selected),B(n,s,i.chosen),n),u));return r(e,(B(o={},d,e.key),B(o,"className",b),o))}))}},{key:"makeOptions",value:function(){var e,t=this,n=((e=this.props).list,e.setList,e.children,e.tag,e.style,e.className,e.clone,e.onAdd,e.onChange,e.onChoose,e.onClone,e.onEnd,e.onFilter,e.onRemove,e.onSort,e.onStart,e.onUnchoose,e.onUpdate,e.onMove,e.onSpill,e.onSelect,e.onDeselect,w(e,["list","setList","children","tag","style","className","clone","onAdd","onChange","onChoose","onClone","onEnd","onFilter","onRemove","onSort","onStart","onUnchoose","onUpdate","onMove","onSpill","onSelect","onDeselect"]));return["onAdd","onChoose","onDeselect","onEnd","onRemove","onSelect","onSpill","onStart","onUnchoose","onUpdate"].forEach((function(e){return n[e]=t.prepareOnHandlerPropAndDOM(e)})),["onChange","onClone","onFilter","onSort"].forEach((function(e){return n[e]=t.prepareOnHandlerProp(e)})),N(N({},n),{},{onMove:function(e,n){var r=t.props.onMove,o=e.willInsertAfter||-1;if(!r)return o;var i=r(e,n,t.sortable,J);return void 0!==i&&i}})}},{key:"prepareOnHandlerPropAndDOM",value:function(e){var t=this;return function(n){t.callOnHandlerProp(n,e),t[e](n)}}},{key:"prepareOnHandlerProp",value:function(e){var t=this;return function(n){t.callOnHandlerProp(n,e)}}},{key:"callOnHandlerProp",value:function(e,t){var n=this.props[t];n&&n(e,this.sortable,J)}},{key:"onAdd",value:function(e){var t=this.props,n=t.list,r=t.setList,o=t.clone,i=D(e,L(J.dragging.props.list));k(i),r(R(i,n,e,o).map((function(e){return N(N({},e),{},{selected:!1})})),this.sortable,J)}},{key:"onRemove",value:function(t){var n=this,r=this.props,o=r.list,i=r.setList,l=M(t),a=D(t,o);C(a);var c=L(o);if("clone"!==t.pullMode)c=A(a,c);else{var s=a;switch(l){case"multidrag":s=a.map((function(e,n){return N(N({},e),{},{element:t.clones[n]})}));break;case"normal":s=a.map((function(e){return N(N({},e),{},{element:t.clone})}));break;case"swap":default:e(!0,'mode "'.concat(l,'" cannot clone. Please remove "props.clone" from <ReactSortable/> when using the "').concat(l,'" plugin'))}k(s),a.forEach((function(e){var r=e.oldIndex,o=n.props.clone(e.item,t);c.splice(r,1,o)}))}i(c=c.map((function(e){return N(N({},e),{},{selected:!1})})),this.sortable,J)}},{key:"onUpdate",value:function(e){var t=this.props,n=t.list,r=t.setList,o=D(e,n);return k(o),C(o),r(function(e,t){return R(e,A(e,t))}(o,n),this.sortable,J)}},{key:"onStart",value:function(){J.dragging=this}},{key:"onEnd",value:function(){J.dragging=null}},{key:"onChoose",value:function(e){var t=this.props,n=t.list;(0,t.setList)(n.map((function(t,n){return n===e.oldIndex?N(N({},t),{},{chosen:!0}):t})),this.sortable,J)}},{key:"onUnchoose",value:function(e){var t=this.props,n=t.list;(0,t.setList)(n.map((function(t,n){return n===e.oldIndex?N(N({},t),{},{chosen:!1}):t})),this.sortable,J)}},{key:"onSpill",value:function(e){var t=this.props,n=t.removeOnSpill,r=t.revertOnSpill;n&&!r&&E(e.item)}},{key:"onSelect",value:function(e){var t=this.props,n=t.list,r=t.setList,o=n.map((function(e){return N(N({},e),{},{selected:!1})}));e.newIndicies.forEach((function(t){var n=t.index;if(-1===n)return console.log('"'.concat(e.type,'" had indice of "').concat(t.index,"\", which is probably -1 and doesn't usually happen here.")),void console.log(e);o[n].selected=!0})),r(o,this.sortable,J)}},{key:"onDeselect",value:function(e){var t=this.props,n=t.list,r=t.setList,o=n.map((function(e){return N(N({},e),{},{selected:!1})}));e.newIndicies.forEach((function(e){var t=e.index;-1!==t&&(o[t].selected=!0)})),r(o,this.sortable,J)}},{key:"sortable",get:function(){var e=this.ref.current;if(null===e)return null;var t=Object.keys(e).find((function(e){return e.includes("Sortable")}));return t?e[t]:null}}])&&q(c.prototype,u),f&&q(c,f),d}();exports.ReactSortable=z,B(z,"defaultProps",{clone:function(e){return e}});
//# sourceMappingURL=index.js.map


/***/ }),

/***/ "./node_modules/sortablejs/modular/sortable.esm.js":
/*!*********************************************************!*\
  !*** ./node_modules/sortablejs/modular/sortable.esm.js ***!
  \*********************************************************/
/*! exports provided: default, MultiDrag, Sortable, Swap */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "MultiDrag", function() { return MultiDragPlugin; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Sortable", function() { return Sortable; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Swap", function() { return SwapPlugin; });
/**!
 * Sortable 1.13.0
 * @author	RubaXa   <trash@rubaxa.org>
 * @author	owenm    <owen23355@gmail.com>
 * @license MIT
 */
function _typeof(obj) {
  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    _typeof = function (obj) {
      return typeof obj;
    };
  } else {
    _typeof = function (obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };
  }

  return _typeof(obj);
}

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

function _extends() {
  _extends = Object.assign || function (target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i];

      for (var key in source) {
        if (Object.prototype.hasOwnProperty.call(source, key)) {
          target[key] = source[key];
        }
      }
    }

    return target;
  };

  return _extends.apply(this, arguments);
}

function _objectSpread(target) {
  for (var i = 1; i < arguments.length; i++) {
    var source = arguments[i] != null ? arguments[i] : {};
    var ownKeys = Object.keys(source);

    if (typeof Object.getOwnPropertySymbols === 'function') {
      ownKeys = ownKeys.concat(Object.getOwnPropertySymbols(source).filter(function (sym) {
        return Object.getOwnPropertyDescriptor(source, sym).enumerable;
      }));
    }

    ownKeys.forEach(function (key) {
      _defineProperty(target, key, source[key]);
    });
  }

  return target;
}

function _objectWithoutPropertiesLoose(source, excluded) {
  if (source == null) return {};
  var target = {};
  var sourceKeys = Object.keys(source);
  var key, i;

  for (i = 0; i < sourceKeys.length; i++) {
    key = sourceKeys[i];
    if (excluded.indexOf(key) >= 0) continue;
    target[key] = source[key];
  }

  return target;
}

function _objectWithoutProperties(source, excluded) {
  if (source == null) return {};

  var target = _objectWithoutPropertiesLoose(source, excluded);

  var key, i;

  if (Object.getOwnPropertySymbols) {
    var sourceSymbolKeys = Object.getOwnPropertySymbols(source);

    for (i = 0; i < sourceSymbolKeys.length; i++) {
      key = sourceSymbolKeys[i];
      if (excluded.indexOf(key) >= 0) continue;
      if (!Object.prototype.propertyIsEnumerable.call(source, key)) continue;
      target[key] = source[key];
    }
  }

  return target;
}

function _toConsumableArray(arr) {
  return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _nonIterableSpread();
}

function _arrayWithoutHoles(arr) {
  if (Array.isArray(arr)) {
    for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) arr2[i] = arr[i];

    return arr2;
  }
}

function _iterableToArray(iter) {
  if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") return Array.from(iter);
}

function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance");
}

var version = "1.13.0";

function userAgent(pattern) {
  if (typeof window !== 'undefined' && window.navigator) {
    return !!
    /*@__PURE__*/
    navigator.userAgent.match(pattern);
  }
}

var IE11OrLess = userAgent(/(?:Trident.*rv[ :]?11\.|msie|iemobile|Windows Phone)/i);
var Edge = userAgent(/Edge/i);
var FireFox = userAgent(/firefox/i);
var Safari = userAgent(/safari/i) && !userAgent(/chrome/i) && !userAgent(/android/i);
var IOS = userAgent(/iP(ad|od|hone)/i);
var ChromeForAndroid = userAgent(/chrome/i) && userAgent(/android/i);

var captureMode = {
  capture: false,
  passive: false
};

function on(el, event, fn) {
  el.addEventListener(event, fn, !IE11OrLess && captureMode);
}

function off(el, event, fn) {
  el.removeEventListener(event, fn, !IE11OrLess && captureMode);
}

function matches(
/**HTMLElement*/
el,
/**String*/
selector) {
  if (!selector) return;
  selector[0] === '>' && (selector = selector.substring(1));

  if (el) {
    try {
      if (el.matches) {
        return el.matches(selector);
      } else if (el.msMatchesSelector) {
        return el.msMatchesSelector(selector);
      } else if (el.webkitMatchesSelector) {
        return el.webkitMatchesSelector(selector);
      }
    } catch (_) {
      return false;
    }
  }

  return false;
}

function getParentOrHost(el) {
  return el.host && el !== document && el.host.nodeType ? el.host : el.parentNode;
}

function closest(
/**HTMLElement*/
el,
/**String*/
selector,
/**HTMLElement*/
ctx, includeCTX) {
  if (el) {
    ctx = ctx || document;

    do {
      if (selector != null && (selector[0] === '>' ? el.parentNode === ctx && matches(el, selector) : matches(el, selector)) || includeCTX && el === ctx) {
        return el;
      }

      if (el === ctx) break;
      /* jshint boss:true */
    } while (el = getParentOrHost(el));
  }

  return null;
}

var R_SPACE = /\s+/g;

function toggleClass(el, name, state) {
  if (el && name) {
    if (el.classList) {
      el.classList[state ? 'add' : 'remove'](name);
    } else {
      var className = (' ' + el.className + ' ').replace(R_SPACE, ' ').replace(' ' + name + ' ', ' ');
      el.className = (className + (state ? ' ' + name : '')).replace(R_SPACE, ' ');
    }
  }
}

function css(el, prop, val) {
  var style = el && el.style;

  if (style) {
    if (val === void 0) {
      if (document.defaultView && document.defaultView.getComputedStyle) {
        val = document.defaultView.getComputedStyle(el, '');
      } else if (el.currentStyle) {
        val = el.currentStyle;
      }

      return prop === void 0 ? val : val[prop];
    } else {
      if (!(prop in style) && prop.indexOf('webkit') === -1) {
        prop = '-webkit-' + prop;
      }

      style[prop] = val + (typeof val === 'string' ? '' : 'px');
    }
  }
}

function matrix(el, selfOnly) {
  var appliedTransforms = '';

  if (typeof el === 'string') {
    appliedTransforms = el;
  } else {
    do {
      var transform = css(el, 'transform');

      if (transform && transform !== 'none') {
        appliedTransforms = transform + ' ' + appliedTransforms;
      }
      /* jshint boss:true */

    } while (!selfOnly && (el = el.parentNode));
  }

  var matrixFn = window.DOMMatrix || window.WebKitCSSMatrix || window.CSSMatrix || window.MSCSSMatrix;
  /*jshint -W056 */

  return matrixFn && new matrixFn(appliedTransforms);
}

function find(ctx, tagName, iterator) {
  if (ctx) {
    var list = ctx.getElementsByTagName(tagName),
        i = 0,
        n = list.length;

    if (iterator) {
      for (; i < n; i++) {
        iterator(list[i], i);
      }
    }

    return list;
  }

  return [];
}

function getWindowScrollingElement() {
  var scrollingElement = document.scrollingElement;

  if (scrollingElement) {
    return scrollingElement;
  } else {
    return document.documentElement;
  }
}
/**
 * Returns the "bounding client rect" of given element
 * @param  {HTMLElement} el                       The element whose boundingClientRect is wanted
 * @param  {[Boolean]} relativeToContainingBlock  Whether the rect should be relative to the containing block of (including) the container
 * @param  {[Boolean]} relativeToNonStaticParent  Whether the rect should be relative to the relative parent of (including) the contaienr
 * @param  {[Boolean]} undoScale                  Whether the container's scale() should be undone
 * @param  {[HTMLElement]} container              The parent the element will be placed in
 * @return {Object}                               The boundingClientRect of el, with specified adjustments
 */


function getRect(el, relativeToContainingBlock, relativeToNonStaticParent, undoScale, container) {
  if (!el.getBoundingClientRect && el !== window) return;
  var elRect, top, left, bottom, right, height, width;

  if (el !== window && el.parentNode && el !== getWindowScrollingElement()) {
    elRect = el.getBoundingClientRect();
    top = elRect.top;
    left = elRect.left;
    bottom = elRect.bottom;
    right = elRect.right;
    height = elRect.height;
    width = elRect.width;
  } else {
    top = 0;
    left = 0;
    bottom = window.innerHeight;
    right = window.innerWidth;
    height = window.innerHeight;
    width = window.innerWidth;
  }

  if ((relativeToContainingBlock || relativeToNonStaticParent) && el !== window) {
    // Adjust for translate()
    container = container || el.parentNode; // solves #1123 (see: https://stackoverflow.com/a/37953806/6088312)
    // Not needed on <= IE11

    if (!IE11OrLess) {
      do {
        if (container && container.getBoundingClientRect && (css(container, 'transform') !== 'none' || relativeToNonStaticParent && css(container, 'position') !== 'static')) {
          var containerRect = container.getBoundingClientRect(); // Set relative to edges of padding box of container

          top -= containerRect.top + parseInt(css(container, 'border-top-width'));
          left -= containerRect.left + parseInt(css(container, 'border-left-width'));
          bottom = top + elRect.height;
          right = left + elRect.width;
          break;
        }
        /* jshint boss:true */

      } while (container = container.parentNode);
    }
  }

  if (undoScale && el !== window) {
    // Adjust for scale()
    var elMatrix = matrix(container || el),
        scaleX = elMatrix && elMatrix.a,
        scaleY = elMatrix && elMatrix.d;

    if (elMatrix) {
      top /= scaleY;
      left /= scaleX;
      width /= scaleX;
      height /= scaleY;
      bottom = top + height;
      right = left + width;
    }
  }

  return {
    top: top,
    left: left,
    bottom: bottom,
    right: right,
    width: width,
    height: height
  };
}
/**
 * Checks if a side of an element is scrolled past a side of its parents
 * @param  {HTMLElement}  el           The element who's side being scrolled out of view is in question
 * @param  {String}       elSide       Side of the element in question ('top', 'left', 'right', 'bottom')
 * @param  {String}       parentSide   Side of the parent in question ('top', 'left', 'right', 'bottom')
 * @return {HTMLElement}               The parent scroll element that the el's side is scrolled past, or null if there is no such element
 */


function isScrolledPast(el, elSide, parentSide) {
  var parent = getParentAutoScrollElement(el, true),
      elSideVal = getRect(el)[elSide];
  /* jshint boss:true */

  while (parent) {
    var parentSideVal = getRect(parent)[parentSide],
        visible = void 0;

    if (parentSide === 'top' || parentSide === 'left') {
      visible = elSideVal >= parentSideVal;
    } else {
      visible = elSideVal <= parentSideVal;
    }

    if (!visible) return parent;
    if (parent === getWindowScrollingElement()) break;
    parent = getParentAutoScrollElement(parent, false);
  }

  return false;
}
/**
 * Gets nth child of el, ignoring hidden children, sortable's elements (does not ignore clone if it's visible)
 * and non-draggable elements
 * @param  {HTMLElement} el       The parent element
 * @param  {Number} childNum      The index of the child
 * @param  {Object} options       Parent Sortable's options
 * @return {HTMLElement}          The child at index childNum, or null if not found
 */


function getChild(el, childNum, options) {
  var currentChild = 0,
      i = 0,
      children = el.children;

  while (i < children.length) {
    if (children[i].style.display !== 'none' && children[i] !== Sortable.ghost && children[i] !== Sortable.dragged && closest(children[i], options.draggable, el, false)) {
      if (currentChild === childNum) {
        return children[i];
      }

      currentChild++;
    }

    i++;
  }

  return null;
}
/**
 * Gets the last child in the el, ignoring ghostEl or invisible elements (clones)
 * @param  {HTMLElement} el       Parent element
 * @param  {selector} selector    Any other elements that should be ignored
 * @return {HTMLElement}          The last child, ignoring ghostEl
 */


function lastChild(el, selector) {
  var last = el.lastElementChild;

  while (last && (last === Sortable.ghost || css(last, 'display') === 'none' || selector && !matches(last, selector))) {
    last = last.previousElementSibling;
  }

  return last || null;
}
/**
 * Returns the index of an element within its parent for a selected set of
 * elements
 * @param  {HTMLElement} el
 * @param  {selector} selector
 * @return {number}
 */


function index(el, selector) {
  var index = 0;

  if (!el || !el.parentNode) {
    return -1;
  }
  /* jshint boss:true */


  while (el = el.previousElementSibling) {
    if (el.nodeName.toUpperCase() !== 'TEMPLATE' && el !== Sortable.clone && (!selector || matches(el, selector))) {
      index++;
    }
  }

  return index;
}
/**
 * Returns the scroll offset of the given element, added with all the scroll offsets of parent elements.
 * The value is returned in real pixels.
 * @param  {HTMLElement} el
 * @return {Array}             Offsets in the format of [left, top]
 */


function getRelativeScrollOffset(el) {
  var offsetLeft = 0,
      offsetTop = 0,
      winScroller = getWindowScrollingElement();

  if (el) {
    do {
      var elMatrix = matrix(el),
          scaleX = elMatrix.a,
          scaleY = elMatrix.d;
      offsetLeft += el.scrollLeft * scaleX;
      offsetTop += el.scrollTop * scaleY;
    } while (el !== winScroller && (el = el.parentNode));
  }

  return [offsetLeft, offsetTop];
}
/**
 * Returns the index of the object within the given array
 * @param  {Array} arr   Array that may or may not hold the object
 * @param  {Object} obj  An object that has a key-value pair unique to and identical to a key-value pair in the object you want to find
 * @return {Number}      The index of the object in the array, or -1
 */


function indexOfObject(arr, obj) {
  for (var i in arr) {
    if (!arr.hasOwnProperty(i)) continue;

    for (var key in obj) {
      if (obj.hasOwnProperty(key) && obj[key] === arr[i][key]) return Number(i);
    }
  }

  return -1;
}

function getParentAutoScrollElement(el, includeSelf) {
  // skip to window
  if (!el || !el.getBoundingClientRect) return getWindowScrollingElement();
  var elem = el;
  var gotSelf = false;

  do {
    // we don't need to get elem css if it isn't even overflowing in the first place (performance)
    if (elem.clientWidth < elem.scrollWidth || elem.clientHeight < elem.scrollHeight) {
      var elemCSS = css(elem);

      if (elem.clientWidth < elem.scrollWidth && (elemCSS.overflowX == 'auto' || elemCSS.overflowX == 'scroll') || elem.clientHeight < elem.scrollHeight && (elemCSS.overflowY == 'auto' || elemCSS.overflowY == 'scroll')) {
        if (!elem.getBoundingClientRect || elem === document.body) return getWindowScrollingElement();
        if (gotSelf || includeSelf) return elem;
        gotSelf = true;
      }
    }
    /* jshint boss:true */

  } while (elem = elem.parentNode);

  return getWindowScrollingElement();
}

function extend(dst, src) {
  if (dst && src) {
    for (var key in src) {
      if (src.hasOwnProperty(key)) {
        dst[key] = src[key];
      }
    }
  }

  return dst;
}

function isRectEqual(rect1, rect2) {
  return Math.round(rect1.top) === Math.round(rect2.top) && Math.round(rect1.left) === Math.round(rect2.left) && Math.round(rect1.height) === Math.round(rect2.height) && Math.round(rect1.width) === Math.round(rect2.width);
}

var _throttleTimeout;

function throttle(callback, ms) {
  return function () {
    if (!_throttleTimeout) {
      var args = arguments,
          _this = this;

      if (args.length === 1) {
        callback.call(_this, args[0]);
      } else {
        callback.apply(_this, args);
      }

      _throttleTimeout = setTimeout(function () {
        _throttleTimeout = void 0;
      }, ms);
    }
  };
}

function cancelThrottle() {
  clearTimeout(_throttleTimeout);
  _throttleTimeout = void 0;
}

function scrollBy(el, x, y) {
  el.scrollLeft += x;
  el.scrollTop += y;
}

function clone(el) {
  var Polymer = window.Polymer;
  var $ = window.jQuery || window.Zepto;

  if (Polymer && Polymer.dom) {
    return Polymer.dom(el).cloneNode(true);
  } else if ($) {
    return $(el).clone(true)[0];
  } else {
    return el.cloneNode(true);
  }
}

function setRect(el, rect) {
  css(el, 'position', 'absolute');
  css(el, 'top', rect.top);
  css(el, 'left', rect.left);
  css(el, 'width', rect.width);
  css(el, 'height', rect.height);
}

function unsetRect(el) {
  css(el, 'position', '');
  css(el, 'top', '');
  css(el, 'left', '');
  css(el, 'width', '');
  css(el, 'height', '');
}

var expando = 'Sortable' + new Date().getTime();

function AnimationStateManager() {
  var animationStates = [],
      animationCallbackId;
  return {
    captureAnimationState: function captureAnimationState() {
      animationStates = [];
      if (!this.options.animation) return;
      var children = [].slice.call(this.el.children);
      children.forEach(function (child) {
        if (css(child, 'display') === 'none' || child === Sortable.ghost) return;
        animationStates.push({
          target: child,
          rect: getRect(child)
        });

        var fromRect = _objectSpread({}, animationStates[animationStates.length - 1].rect); // If animating: compensate for current animation


        if (child.thisAnimationDuration) {
          var childMatrix = matrix(child, true);

          if (childMatrix) {
            fromRect.top -= childMatrix.f;
            fromRect.left -= childMatrix.e;
          }
        }

        child.fromRect = fromRect;
      });
    },
    addAnimationState: function addAnimationState(state) {
      animationStates.push(state);
    },
    removeAnimationState: function removeAnimationState(target) {
      animationStates.splice(indexOfObject(animationStates, {
        target: target
      }), 1);
    },
    animateAll: function animateAll(callback) {
      var _this = this;

      if (!this.options.animation) {
        clearTimeout(animationCallbackId);
        if (typeof callback === 'function') callback();
        return;
      }

      var animating = false,
          animationTime = 0;
      animationStates.forEach(function (state) {
        var time = 0,
            target = state.target,
            fromRect = target.fromRect,
            toRect = getRect(target),
            prevFromRect = target.prevFromRect,
            prevToRect = target.prevToRect,
            animatingRect = state.rect,
            targetMatrix = matrix(target, true);

        if (targetMatrix) {
          // Compensate for current animation
          toRect.top -= targetMatrix.f;
          toRect.left -= targetMatrix.e;
        }

        target.toRect = toRect;

        if (target.thisAnimationDuration) {
          // Could also check if animatingRect is between fromRect and toRect
          if (isRectEqual(prevFromRect, toRect) && !isRectEqual(fromRect, toRect) && // Make sure animatingRect is on line between toRect & fromRect
          (animatingRect.top - toRect.top) / (animatingRect.left - toRect.left) === (fromRect.top - toRect.top) / (fromRect.left - toRect.left)) {
            // If returning to same place as started from animation and on same axis
            time = calculateRealTime(animatingRect, prevFromRect, prevToRect, _this.options);
          }
        } // if fromRect != toRect: animate


        if (!isRectEqual(toRect, fromRect)) {
          target.prevFromRect = fromRect;
          target.prevToRect = toRect;

          if (!time) {
            time = _this.options.animation;
          }

          _this.animate(target, animatingRect, toRect, time);
        }

        if (time) {
          animating = true;
          animationTime = Math.max(animationTime, time);
          clearTimeout(target.animationResetTimer);
          target.animationResetTimer = setTimeout(function () {
            target.animationTime = 0;
            target.prevFromRect = null;
            target.fromRect = null;
            target.prevToRect = null;
            target.thisAnimationDuration = null;
          }, time);
          target.thisAnimationDuration = time;
        }
      });
      clearTimeout(animationCallbackId);

      if (!animating) {
        if (typeof callback === 'function') callback();
      } else {
        animationCallbackId = setTimeout(function () {
          if (typeof callback === 'function') callback();
        }, animationTime);
      }

      animationStates = [];
    },
    animate: function animate(target, currentRect, toRect, duration) {
      if (duration) {
        css(target, 'transition', '');
        css(target, 'transform', '');
        var elMatrix = matrix(this.el),
            scaleX = elMatrix && elMatrix.a,
            scaleY = elMatrix && elMatrix.d,
            translateX = (currentRect.left - toRect.left) / (scaleX || 1),
            translateY = (currentRect.top - toRect.top) / (scaleY || 1);
        target.animatingX = !!translateX;
        target.animatingY = !!translateY;
        css(target, 'transform', 'translate3d(' + translateX + 'px,' + translateY + 'px,0)');
        this.forRepaintDummy = repaint(target); // repaint

        css(target, 'transition', 'transform ' + duration + 'ms' + (this.options.easing ? ' ' + this.options.easing : ''));
        css(target, 'transform', 'translate3d(0,0,0)');
        typeof target.animated === 'number' && clearTimeout(target.animated);
        target.animated = setTimeout(function () {
          css(target, 'transition', '');
          css(target, 'transform', '');
          target.animated = false;
          target.animatingX = false;
          target.animatingY = false;
        }, duration);
      }
    }
  };
}

function repaint(target) {
  return target.offsetWidth;
}

function calculateRealTime(animatingRect, fromRect, toRect, options) {
  return Math.sqrt(Math.pow(fromRect.top - animatingRect.top, 2) + Math.pow(fromRect.left - animatingRect.left, 2)) / Math.sqrt(Math.pow(fromRect.top - toRect.top, 2) + Math.pow(fromRect.left - toRect.left, 2)) * options.animation;
}

var plugins = [];
var defaults = {
  initializeByDefault: true
};
var PluginManager = {
  mount: function mount(plugin) {
    // Set default static properties
    for (var option in defaults) {
      if (defaults.hasOwnProperty(option) && !(option in plugin)) {
        plugin[option] = defaults[option];
      }
    }

    plugins.forEach(function (p) {
      if (p.pluginName === plugin.pluginName) {
        throw "Sortable: Cannot mount plugin ".concat(plugin.pluginName, " more than once");
      }
    });
    plugins.push(plugin);
  },
  pluginEvent: function pluginEvent(eventName, sortable, evt) {
    var _this = this;

    this.eventCanceled = false;

    evt.cancel = function () {
      _this.eventCanceled = true;
    };

    var eventNameGlobal = eventName + 'Global';
    plugins.forEach(function (plugin) {
      if (!sortable[plugin.pluginName]) return; // Fire global events if it exists in this sortable

      if (sortable[plugin.pluginName][eventNameGlobal]) {
        sortable[plugin.pluginName][eventNameGlobal](_objectSpread({
          sortable: sortable
        }, evt));
      } // Only fire plugin event if plugin is enabled in this sortable,
      // and plugin has event defined


      if (sortable.options[plugin.pluginName] && sortable[plugin.pluginName][eventName]) {
        sortable[plugin.pluginName][eventName](_objectSpread({
          sortable: sortable
        }, evt));
      }
    });
  },
  initializePlugins: function initializePlugins(sortable, el, defaults, options) {
    plugins.forEach(function (plugin) {
      var pluginName = plugin.pluginName;
      if (!sortable.options[pluginName] && !plugin.initializeByDefault) return;
      var initialized = new plugin(sortable, el, sortable.options);
      initialized.sortable = sortable;
      initialized.options = sortable.options;
      sortable[pluginName] = initialized; // Add default options from plugin

      _extends(defaults, initialized.defaults);
    });

    for (var option in sortable.options) {
      if (!sortable.options.hasOwnProperty(option)) continue;
      var modified = this.modifyOption(sortable, option, sortable.options[option]);

      if (typeof modified !== 'undefined') {
        sortable.options[option] = modified;
      }
    }
  },
  getEventProperties: function getEventProperties(name, sortable) {
    var eventProperties = {};
    plugins.forEach(function (plugin) {
      if (typeof plugin.eventProperties !== 'function') return;

      _extends(eventProperties, plugin.eventProperties.call(sortable[plugin.pluginName], name));
    });
    return eventProperties;
  },
  modifyOption: function modifyOption(sortable, name, value) {
    var modifiedValue;
    plugins.forEach(function (plugin) {
      // Plugin must exist on the Sortable
      if (!sortable[plugin.pluginName]) return; // If static option listener exists for this option, call in the context of the Sortable's instance of this plugin

      if (plugin.optionListeners && typeof plugin.optionListeners[name] === 'function') {
        modifiedValue = plugin.optionListeners[name].call(sortable[plugin.pluginName], value);
      }
    });
    return modifiedValue;
  }
};

function dispatchEvent(_ref) {
  var sortable = _ref.sortable,
      rootEl = _ref.rootEl,
      name = _ref.name,
      targetEl = _ref.targetEl,
      cloneEl = _ref.cloneEl,
      toEl = _ref.toEl,
      fromEl = _ref.fromEl,
      oldIndex = _ref.oldIndex,
      newIndex = _ref.newIndex,
      oldDraggableIndex = _ref.oldDraggableIndex,
      newDraggableIndex = _ref.newDraggableIndex,
      originalEvent = _ref.originalEvent,
      putSortable = _ref.putSortable,
      extraEventProperties = _ref.extraEventProperties;
  sortable = sortable || rootEl && rootEl[expando];
  if (!sortable) return;
  var evt,
      options = sortable.options,
      onName = 'on' + name.charAt(0).toUpperCase() + name.substr(1); // Support for new CustomEvent feature

  if (window.CustomEvent && !IE11OrLess && !Edge) {
    evt = new CustomEvent(name, {
      bubbles: true,
      cancelable: true
    });
  } else {
    evt = document.createEvent('Event');
    evt.initEvent(name, true, true);
  }

  evt.to = toEl || rootEl;
  evt.from = fromEl || rootEl;
  evt.item = targetEl || rootEl;
  evt.clone = cloneEl;
  evt.oldIndex = oldIndex;
  evt.newIndex = newIndex;
  evt.oldDraggableIndex = oldDraggableIndex;
  evt.newDraggableIndex = newDraggableIndex;
  evt.originalEvent = originalEvent;
  evt.pullMode = putSortable ? putSortable.lastPutMode : undefined;

  var allEventProperties = _objectSpread({}, extraEventProperties, PluginManager.getEventProperties(name, sortable));

  for (var option in allEventProperties) {
    evt[option] = allEventProperties[option];
  }

  if (rootEl) {
    rootEl.dispatchEvent(evt);
  }

  if (options[onName]) {
    options[onName].call(sortable, evt);
  }
}

var pluginEvent = function pluginEvent(eventName, sortable) {
  var _ref = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : {},
      originalEvent = _ref.evt,
      data = _objectWithoutProperties(_ref, ["evt"]);

  PluginManager.pluginEvent.bind(Sortable)(eventName, sortable, _objectSpread({
    dragEl: dragEl,
    parentEl: parentEl,
    ghostEl: ghostEl,
    rootEl: rootEl,
    nextEl: nextEl,
    lastDownEl: lastDownEl,
    cloneEl: cloneEl,
    cloneHidden: cloneHidden,
    dragStarted: moved,
    putSortable: putSortable,
    activeSortable: Sortable.active,
    originalEvent: originalEvent,
    oldIndex: oldIndex,
    oldDraggableIndex: oldDraggableIndex,
    newIndex: newIndex,
    newDraggableIndex: newDraggableIndex,
    hideGhostForTarget: _hideGhostForTarget,
    unhideGhostForTarget: _unhideGhostForTarget,
    cloneNowHidden: function cloneNowHidden() {
      cloneHidden = true;
    },
    cloneNowShown: function cloneNowShown() {
      cloneHidden = false;
    },
    dispatchSortableEvent: function dispatchSortableEvent(name) {
      _dispatchEvent({
        sortable: sortable,
        name: name,
        originalEvent: originalEvent
      });
    }
  }, data));
};

function _dispatchEvent(info) {
  dispatchEvent(_objectSpread({
    putSortable: putSortable,
    cloneEl: cloneEl,
    targetEl: dragEl,
    rootEl: rootEl,
    oldIndex: oldIndex,
    oldDraggableIndex: oldDraggableIndex,
    newIndex: newIndex,
    newDraggableIndex: newDraggableIndex
  }, info));
}

var dragEl,
    parentEl,
    ghostEl,
    rootEl,
    nextEl,
    lastDownEl,
    cloneEl,
    cloneHidden,
    oldIndex,
    newIndex,
    oldDraggableIndex,
    newDraggableIndex,
    activeGroup,
    putSortable,
    awaitingDragStarted = false,
    ignoreNextClick = false,
    sortables = [],
    tapEvt,
    touchEvt,
    lastDx,
    lastDy,
    tapDistanceLeft,
    tapDistanceTop,
    moved,
    lastTarget,
    lastDirection,
    pastFirstInvertThresh = false,
    isCircumstantialInvert = false,
    targetMoveDistance,
    // For positioning ghost absolutely
ghostRelativeParent,
    ghostRelativeParentInitialScroll = [],
    // (left, top)
_silent = false,
    savedInputChecked = [];
/** @const */

var documentExists = typeof document !== 'undefined',
    PositionGhostAbsolutely = IOS,
    CSSFloatProperty = Edge || IE11OrLess ? 'cssFloat' : 'float',
    // This will not pass for IE9, because IE9 DnD only works on anchors
supportDraggable = documentExists && !ChromeForAndroid && !IOS && 'draggable' in document.createElement('div'),
    supportCssPointerEvents = function () {
  if (!documentExists) return; // false when <= IE11

  if (IE11OrLess) {
    return false;
  }

  var el = document.createElement('x');
  el.style.cssText = 'pointer-events:auto';
  return el.style.pointerEvents === 'auto';
}(),
    _detectDirection = function _detectDirection(el, options) {
  var elCSS = css(el),
      elWidth = parseInt(elCSS.width) - parseInt(elCSS.paddingLeft) - parseInt(elCSS.paddingRight) - parseInt(elCSS.borderLeftWidth) - parseInt(elCSS.borderRightWidth),
      child1 = getChild(el, 0, options),
      child2 = getChild(el, 1, options),
      firstChildCSS = child1 && css(child1),
      secondChildCSS = child2 && css(child2),
      firstChildWidth = firstChildCSS && parseInt(firstChildCSS.marginLeft) + parseInt(firstChildCSS.marginRight) + getRect(child1).width,
      secondChildWidth = secondChildCSS && parseInt(secondChildCSS.marginLeft) + parseInt(secondChildCSS.marginRight) + getRect(child2).width;

  if (elCSS.display === 'flex') {
    return elCSS.flexDirection === 'column' || elCSS.flexDirection === 'column-reverse' ? 'vertical' : 'horizontal';
  }

  if (elCSS.display === 'grid') {
    return elCSS.gridTemplateColumns.split(' ').length <= 1 ? 'vertical' : 'horizontal';
  }

  if (child1 && firstChildCSS["float"] && firstChildCSS["float"] !== 'none') {
    var touchingSideChild2 = firstChildCSS["float"] === 'left' ? 'left' : 'right';
    return child2 && (secondChildCSS.clear === 'both' || secondChildCSS.clear === touchingSideChild2) ? 'vertical' : 'horizontal';
  }

  return child1 && (firstChildCSS.display === 'block' || firstChildCSS.display === 'flex' || firstChildCSS.display === 'table' || firstChildCSS.display === 'grid' || firstChildWidth >= elWidth && elCSS[CSSFloatProperty] === 'none' || child2 && elCSS[CSSFloatProperty] === 'none' && firstChildWidth + secondChildWidth > elWidth) ? 'vertical' : 'horizontal';
},
    _dragElInRowColumn = function _dragElInRowColumn(dragRect, targetRect, vertical) {
  var dragElS1Opp = vertical ? dragRect.left : dragRect.top,
      dragElS2Opp = vertical ? dragRect.right : dragRect.bottom,
      dragElOppLength = vertical ? dragRect.width : dragRect.height,
      targetS1Opp = vertical ? targetRect.left : targetRect.top,
      targetS2Opp = vertical ? targetRect.right : targetRect.bottom,
      targetOppLength = vertical ? targetRect.width : targetRect.height;
  return dragElS1Opp === targetS1Opp || dragElS2Opp === targetS2Opp || dragElS1Opp + dragElOppLength / 2 === targetS1Opp + targetOppLength / 2;
},

/**
 * Detects first nearest empty sortable to X and Y position using emptyInsertThreshold.
 * @param  {Number} x      X position
 * @param  {Number} y      Y position
 * @return {HTMLElement}   Element of the first found nearest Sortable
 */
_detectNearestEmptySortable = function _detectNearestEmptySortable(x, y) {
  var ret;
  sortables.some(function (sortable) {
    if (lastChild(sortable)) return;
    var rect = getRect(sortable),
        threshold = sortable[expando].options.emptyInsertThreshold,
        insideHorizontally = x >= rect.left - threshold && x <= rect.right + threshold,
        insideVertically = y >= rect.top - threshold && y <= rect.bottom + threshold;

    if (threshold && insideHorizontally && insideVertically) {
      return ret = sortable;
    }
  });
  return ret;
},
    _prepareGroup = function _prepareGroup(options) {
  function toFn(value, pull) {
    return function (to, from, dragEl, evt) {
      var sameGroup = to.options.group.name && from.options.group.name && to.options.group.name === from.options.group.name;

      if (value == null && (pull || sameGroup)) {
        // Default pull value
        // Default pull and put value if same group
        return true;
      } else if (value == null || value === false) {
        return false;
      } else if (pull && value === 'clone') {
        return value;
      } else if (typeof value === 'function') {
        return toFn(value(to, from, dragEl, evt), pull)(to, from, dragEl, evt);
      } else {
        var otherGroup = (pull ? to : from).options.group.name;
        return value === true || typeof value === 'string' && value === otherGroup || value.join && value.indexOf(otherGroup) > -1;
      }
    };
  }

  var group = {};
  var originalGroup = options.group;

  if (!originalGroup || _typeof(originalGroup) != 'object') {
    originalGroup = {
      name: originalGroup
    };
  }

  group.name = originalGroup.name;
  group.checkPull = toFn(originalGroup.pull, true);
  group.checkPut = toFn(originalGroup.put);
  group.revertClone = originalGroup.revertClone;
  options.group = group;
},
    _hideGhostForTarget = function _hideGhostForTarget() {
  if (!supportCssPointerEvents && ghostEl) {
    css(ghostEl, 'display', 'none');
  }
},
    _unhideGhostForTarget = function _unhideGhostForTarget() {
  if (!supportCssPointerEvents && ghostEl) {
    css(ghostEl, 'display', '');
  }
}; // #1184 fix - Prevent click event on fallback if dragged but item not changed position


if (documentExists) {
  document.addEventListener('click', function (evt) {
    if (ignoreNextClick) {
      evt.preventDefault();
      evt.stopPropagation && evt.stopPropagation();
      evt.stopImmediatePropagation && evt.stopImmediatePropagation();
      ignoreNextClick = false;
      return false;
    }
  }, true);
}

var nearestEmptyInsertDetectEvent = function nearestEmptyInsertDetectEvent(evt) {
  if (dragEl) {
    evt = evt.touches ? evt.touches[0] : evt;

    var nearest = _detectNearestEmptySortable(evt.clientX, evt.clientY);

    if (nearest) {
      // Create imitation event
      var event = {};

      for (var i in evt) {
        if (evt.hasOwnProperty(i)) {
          event[i] = evt[i];
        }
      }

      event.target = event.rootEl = nearest;
      event.preventDefault = void 0;
      event.stopPropagation = void 0;

      nearest[expando]._onDragOver(event);
    }
  }
};

var _checkOutsideTargetEl = function _checkOutsideTargetEl(evt) {
  if (dragEl) {
    dragEl.parentNode[expando]._isOutsideThisEl(evt.target);
  }
};
/**
 * @class  Sortable
 * @param  {HTMLElement}  el
 * @param  {Object}       [options]
 */


function Sortable(el, options) {
  if (!(el && el.nodeType && el.nodeType === 1)) {
    throw "Sortable: `el` must be an HTMLElement, not ".concat({}.toString.call(el));
  }

  this.el = el; // root element

  this.options = options = _extends({}, options); // Export instance

  el[expando] = this;
  var defaults = {
    group: null,
    sort: true,
    disabled: false,
    store: null,
    handle: null,
    draggable: /^[uo]l$/i.test(el.nodeName) ? '>li' : '>*',
    swapThreshold: 1,
    // percentage; 0 <= x <= 1
    invertSwap: false,
    // invert always
    invertedSwapThreshold: null,
    // will be set to same as swapThreshold if default
    removeCloneOnHide: true,
    direction: function direction() {
      return _detectDirection(el, this.options);
    },
    ghostClass: 'sortable-ghost',
    chosenClass: 'sortable-chosen',
    dragClass: 'sortable-drag',
    ignore: 'a, img',
    filter: null,
    preventOnFilter: true,
    animation: 0,
    easing: null,
    setData: function setData(dataTransfer, dragEl) {
      dataTransfer.setData('Text', dragEl.textContent);
    },
    dropBubble: false,
    dragoverBubble: false,
    dataIdAttr: 'data-id',
    delay: 0,
    delayOnTouchOnly: false,
    touchStartThreshold: (Number.parseInt ? Number : window).parseInt(window.devicePixelRatio, 10) || 1,
    forceFallback: false,
    fallbackClass: 'sortable-fallback',
    fallbackOnBody: false,
    fallbackTolerance: 0,
    fallbackOffset: {
      x: 0,
      y: 0
    },
    supportPointer: Sortable.supportPointer !== false && 'PointerEvent' in window && !Safari,
    emptyInsertThreshold: 5
  };
  PluginManager.initializePlugins(this, el, defaults); // Set default options

  for (var name in defaults) {
    !(name in options) && (options[name] = defaults[name]);
  }

  _prepareGroup(options); // Bind all private methods


  for (var fn in this) {
    if (fn.charAt(0) === '_' && typeof this[fn] === 'function') {
      this[fn] = this[fn].bind(this);
    }
  } // Setup drag mode


  this.nativeDraggable = options.forceFallback ? false : supportDraggable;

  if (this.nativeDraggable) {
    // Touch start threshold cannot be greater than the native dragstart threshold
    this.options.touchStartThreshold = 1;
  } // Bind events


  if (options.supportPointer) {
    on(el, 'pointerdown', this._onTapStart);
  } else {
    on(el, 'mousedown', this._onTapStart);
    on(el, 'touchstart', this._onTapStart);
  }

  if (this.nativeDraggable) {
    on(el, 'dragover', this);
    on(el, 'dragenter', this);
  }

  sortables.push(this.el); // Restore sorting

  options.store && options.store.get && this.sort(options.store.get(this) || []); // Add animation state manager

  _extends(this, AnimationStateManager());
}

Sortable.prototype =
/** @lends Sortable.prototype */
{
  constructor: Sortable,
  _isOutsideThisEl: function _isOutsideThisEl(target) {
    if (!this.el.contains(target) && target !== this.el) {
      lastTarget = null;
    }
  },
  _getDirection: function _getDirection(evt, target) {
    return typeof this.options.direction === 'function' ? this.options.direction.call(this, evt, target, dragEl) : this.options.direction;
  },
  _onTapStart: function _onTapStart(
  /** Event|TouchEvent */
  evt) {
    if (!evt.cancelable) return;

    var _this = this,
        el = this.el,
        options = this.options,
        preventOnFilter = options.preventOnFilter,
        type = evt.type,
        touch = evt.touches && evt.touches[0] || evt.pointerType && evt.pointerType === 'touch' && evt,
        target = (touch || evt).target,
        originalTarget = evt.target.shadowRoot && (evt.path && evt.path[0] || evt.composedPath && evt.composedPath()[0]) || target,
        filter = options.filter;

    _saveInputCheckedState(el); // Don't trigger start event when an element is been dragged, otherwise the evt.oldindex always wrong when set option.group.


    if (dragEl) {
      return;
    }

    if (/mousedown|pointerdown/.test(type) && evt.button !== 0 || options.disabled) {
      return; // only left button and enabled
    } // cancel dnd if original target is content editable


    if (originalTarget.isContentEditable) {
      return;
    } // Safari ignores further event handling after mousedown


    if (!this.nativeDraggable && Safari && target && target.tagName.toUpperCase() === 'SELECT') {
      return;
    }

    target = closest(target, options.draggable, el, false);

    if (target && target.animated) {
      return;
    }

    if (lastDownEl === target) {
      // Ignoring duplicate `down`
      return;
    } // Get the index of the dragged element within its parent


    oldIndex = index(target);
    oldDraggableIndex = index(target, options.draggable); // Check filter

    if (typeof filter === 'function') {
      if (filter.call(this, evt, target, this)) {
        _dispatchEvent({
          sortable: _this,
          rootEl: originalTarget,
          name: 'filter',
          targetEl: target,
          toEl: el,
          fromEl: el
        });

        pluginEvent('filter', _this, {
          evt: evt
        });
        preventOnFilter && evt.cancelable && evt.preventDefault();
        return; // cancel dnd
      }
    } else if (filter) {
      filter = filter.split(',').some(function (criteria) {
        criteria = closest(originalTarget, criteria.trim(), el, false);

        if (criteria) {
          _dispatchEvent({
            sortable: _this,
            rootEl: criteria,
            name: 'filter',
            targetEl: target,
            fromEl: el,
            toEl: el
          });

          pluginEvent('filter', _this, {
            evt: evt
          });
          return true;
        }
      });

      if (filter) {
        preventOnFilter && evt.cancelable && evt.preventDefault();
        return; // cancel dnd
      }
    }

    if (options.handle && !closest(originalTarget, options.handle, el, false)) {
      return;
    } // Prepare `dragstart`


    this._prepareDragStart(evt, touch, target);
  },
  _prepareDragStart: function _prepareDragStart(
  /** Event */
  evt,
  /** Touch */
  touch,
  /** HTMLElement */
  target) {
    var _this = this,
        el = _this.el,
        options = _this.options,
        ownerDocument = el.ownerDocument,
        dragStartFn;

    if (target && !dragEl && target.parentNode === el) {
      var dragRect = getRect(target);
      rootEl = el;
      dragEl = target;
      parentEl = dragEl.parentNode;
      nextEl = dragEl.nextSibling;
      lastDownEl = target;
      activeGroup = options.group;
      Sortable.dragged = dragEl;
      tapEvt = {
        target: dragEl,
        clientX: (touch || evt).clientX,
        clientY: (touch || evt).clientY
      };
      tapDistanceLeft = tapEvt.clientX - dragRect.left;
      tapDistanceTop = tapEvt.clientY - dragRect.top;
      this._lastX = (touch || evt).clientX;
      this._lastY = (touch || evt).clientY;
      dragEl.style['will-change'] = 'all';

      dragStartFn = function dragStartFn() {
        pluginEvent('delayEnded', _this, {
          evt: evt
        });

        if (Sortable.eventCanceled) {
          _this._onDrop();

          return;
        } // Delayed drag has been triggered
        // we can re-enable the events: touchmove/mousemove


        _this._disableDelayedDragEvents();

        if (!FireFox && _this.nativeDraggable) {
          dragEl.draggable = true;
        } // Bind the events: dragstart/dragend


        _this._triggerDragStart(evt, touch); // Drag start event


        _dispatchEvent({
          sortable: _this,
          name: 'choose',
          originalEvent: evt
        }); // Chosen item


        toggleClass(dragEl, options.chosenClass, true);
      }; // Disable "draggable"


      options.ignore.split(',').forEach(function (criteria) {
        find(dragEl, criteria.trim(), _disableDraggable);
      });
      on(ownerDocument, 'dragover', nearestEmptyInsertDetectEvent);
      on(ownerDocument, 'mousemove', nearestEmptyInsertDetectEvent);
      on(ownerDocument, 'touchmove', nearestEmptyInsertDetectEvent);
      on(ownerDocument, 'mouseup', _this._onDrop);
      on(ownerDocument, 'touchend', _this._onDrop);
      on(ownerDocument, 'touchcancel', _this._onDrop); // Make dragEl draggable (must be before delay for FireFox)

      if (FireFox && this.nativeDraggable) {
        this.options.touchStartThreshold = 4;
        dragEl.draggable = true;
      }

      pluginEvent('delayStart', this, {
        evt: evt
      }); // Delay is impossible for native DnD in Edge or IE

      if (options.delay && (!options.delayOnTouchOnly || touch) && (!this.nativeDraggable || !(Edge || IE11OrLess))) {
        if (Sortable.eventCanceled) {
          this._onDrop();

          return;
        } // If the user moves the pointer or let go the click or touch
        // before the delay has been reached:
        // disable the delayed drag


        on(ownerDocument, 'mouseup', _this._disableDelayedDrag);
        on(ownerDocument, 'touchend', _this._disableDelayedDrag);
        on(ownerDocument, 'touchcancel', _this._disableDelayedDrag);
        on(ownerDocument, 'mousemove', _this._delayedDragTouchMoveHandler);
        on(ownerDocument, 'touchmove', _this._delayedDragTouchMoveHandler);
        options.supportPointer && on(ownerDocument, 'pointermove', _this._delayedDragTouchMoveHandler);
        _this._dragStartTimer = setTimeout(dragStartFn, options.delay);
      } else {
        dragStartFn();
      }
    }
  },
  _delayedDragTouchMoveHandler: function _delayedDragTouchMoveHandler(
  /** TouchEvent|PointerEvent **/
  e) {
    var touch = e.touches ? e.touches[0] : e;

    if (Math.max(Math.abs(touch.clientX - this._lastX), Math.abs(touch.clientY - this._lastY)) >= Math.floor(this.options.touchStartThreshold / (this.nativeDraggable && window.devicePixelRatio || 1))) {
      this._disableDelayedDrag();
    }
  },
  _disableDelayedDrag: function _disableDelayedDrag() {
    dragEl && _disableDraggable(dragEl);
    clearTimeout(this._dragStartTimer);

    this._disableDelayedDragEvents();
  },
  _disableDelayedDragEvents: function _disableDelayedDragEvents() {
    var ownerDocument = this.el.ownerDocument;
    off(ownerDocument, 'mouseup', this._disableDelayedDrag);
    off(ownerDocument, 'touchend', this._disableDelayedDrag);
    off(ownerDocument, 'touchcancel', this._disableDelayedDrag);
    off(ownerDocument, 'mousemove', this._delayedDragTouchMoveHandler);
    off(ownerDocument, 'touchmove', this._delayedDragTouchMoveHandler);
    off(ownerDocument, 'pointermove', this._delayedDragTouchMoveHandler);
  },
  _triggerDragStart: function _triggerDragStart(
  /** Event */
  evt,
  /** Touch */
  touch) {
    touch = touch || evt.pointerType == 'touch' && evt;

    if (!this.nativeDraggable || touch) {
      if (this.options.supportPointer) {
        on(document, 'pointermove', this._onTouchMove);
      } else if (touch) {
        on(document, 'touchmove', this._onTouchMove);
      } else {
        on(document, 'mousemove', this._onTouchMove);
      }
    } else {
      on(dragEl, 'dragend', this);
      on(rootEl, 'dragstart', this._onDragStart);
    }

    try {
      if (document.selection) {
        // Timeout neccessary for IE9
        _nextTick(function () {
          document.selection.empty();
        });
      } else {
        window.getSelection().removeAllRanges();
      }
    } catch (err) {}
  },
  _dragStarted: function _dragStarted(fallback, evt) {

    awaitingDragStarted = false;

    if (rootEl && dragEl) {
      pluginEvent('dragStarted', this, {
        evt: evt
      });

      if (this.nativeDraggable) {
        on(document, 'dragover', _checkOutsideTargetEl);
      }

      var options = this.options; // Apply effect

      !fallback && toggleClass(dragEl, options.dragClass, false);
      toggleClass(dragEl, options.ghostClass, true);
      Sortable.active = this;
      fallback && this._appendGhost(); // Drag start event

      _dispatchEvent({
        sortable: this,
        name: 'start',
        originalEvent: evt
      });
    } else {
      this._nulling();
    }
  },
  _emulateDragOver: function _emulateDragOver() {
    if (touchEvt) {
      this._lastX = touchEvt.clientX;
      this._lastY = touchEvt.clientY;

      _hideGhostForTarget();

      var target = document.elementFromPoint(touchEvt.clientX, touchEvt.clientY);
      var parent = target;

      while (target && target.shadowRoot) {
        target = target.shadowRoot.elementFromPoint(touchEvt.clientX, touchEvt.clientY);
        if (target === parent) break;
        parent = target;
      }

      dragEl.parentNode[expando]._isOutsideThisEl(target);

      if (parent) {
        do {
          if (parent[expando]) {
            var inserted = void 0;
            inserted = parent[expando]._onDragOver({
              clientX: touchEvt.clientX,
              clientY: touchEvt.clientY,
              target: target,
              rootEl: parent
            });

            if (inserted && !this.options.dragoverBubble) {
              break;
            }
          }

          target = parent; // store last element
        }
        /* jshint boss:true */
        while (parent = parent.parentNode);
      }

      _unhideGhostForTarget();
    }
  },
  _onTouchMove: function _onTouchMove(
  /**TouchEvent*/
  evt) {
    if (tapEvt) {
      var options = this.options,
          fallbackTolerance = options.fallbackTolerance,
          fallbackOffset = options.fallbackOffset,
          touch = evt.touches ? evt.touches[0] : evt,
          ghostMatrix = ghostEl && matrix(ghostEl, true),
          scaleX = ghostEl && ghostMatrix && ghostMatrix.a,
          scaleY = ghostEl && ghostMatrix && ghostMatrix.d,
          relativeScrollOffset = PositionGhostAbsolutely && ghostRelativeParent && getRelativeScrollOffset(ghostRelativeParent),
          dx = (touch.clientX - tapEvt.clientX + fallbackOffset.x) / (scaleX || 1) + (relativeScrollOffset ? relativeScrollOffset[0] - ghostRelativeParentInitialScroll[0] : 0) / (scaleX || 1),
          dy = (touch.clientY - tapEvt.clientY + fallbackOffset.y) / (scaleY || 1) + (relativeScrollOffset ? relativeScrollOffset[1] - ghostRelativeParentInitialScroll[1] : 0) / (scaleY || 1); // only set the status to dragging, when we are actually dragging

      if (!Sortable.active && !awaitingDragStarted) {
        if (fallbackTolerance && Math.max(Math.abs(touch.clientX - this._lastX), Math.abs(touch.clientY - this._lastY)) < fallbackTolerance) {
          return;
        }

        this._onDragStart(evt, true);
      }

      if (ghostEl) {
        if (ghostMatrix) {
          ghostMatrix.e += dx - (lastDx || 0);
          ghostMatrix.f += dy - (lastDy || 0);
        } else {
          ghostMatrix = {
            a: 1,
            b: 0,
            c: 0,
            d: 1,
            e: dx,
            f: dy
          };
        }

        var cssMatrix = "matrix(".concat(ghostMatrix.a, ",").concat(ghostMatrix.b, ",").concat(ghostMatrix.c, ",").concat(ghostMatrix.d, ",").concat(ghostMatrix.e, ",").concat(ghostMatrix.f, ")");
        css(ghostEl, 'webkitTransform', cssMatrix);
        css(ghostEl, 'mozTransform', cssMatrix);
        css(ghostEl, 'msTransform', cssMatrix);
        css(ghostEl, 'transform', cssMatrix);
        lastDx = dx;
        lastDy = dy;
        touchEvt = touch;
      }

      evt.cancelable && evt.preventDefault();
    }
  },
  _appendGhost: function _appendGhost() {
    // Bug if using scale(): https://stackoverflow.com/questions/2637058
    // Not being adjusted for
    if (!ghostEl) {
      var container = this.options.fallbackOnBody ? document.body : rootEl,
          rect = getRect(dragEl, true, PositionGhostAbsolutely, true, container),
          options = this.options; // Position absolutely

      if (PositionGhostAbsolutely) {
        // Get relatively positioned parent
        ghostRelativeParent = container;

        while (css(ghostRelativeParent, 'position') === 'static' && css(ghostRelativeParent, 'transform') === 'none' && ghostRelativeParent !== document) {
          ghostRelativeParent = ghostRelativeParent.parentNode;
        }

        if (ghostRelativeParent !== document.body && ghostRelativeParent !== document.documentElement) {
          if (ghostRelativeParent === document) ghostRelativeParent = getWindowScrollingElement();
          rect.top += ghostRelativeParent.scrollTop;
          rect.left += ghostRelativeParent.scrollLeft;
        } else {
          ghostRelativeParent = getWindowScrollingElement();
        }

        ghostRelativeParentInitialScroll = getRelativeScrollOffset(ghostRelativeParent);
      }

      ghostEl = dragEl.cloneNode(true);
      toggleClass(ghostEl, options.ghostClass, false);
      toggleClass(ghostEl, options.fallbackClass, true);
      toggleClass(ghostEl, options.dragClass, true);
      css(ghostEl, 'transition', '');
      css(ghostEl, 'transform', '');
      css(ghostEl, 'box-sizing', 'border-box');
      css(ghostEl, 'margin', 0);
      css(ghostEl, 'top', rect.top);
      css(ghostEl, 'left', rect.left);
      css(ghostEl, 'width', rect.width);
      css(ghostEl, 'height', rect.height);
      css(ghostEl, 'opacity', '0.8');
      css(ghostEl, 'position', PositionGhostAbsolutely ? 'absolute' : 'fixed');
      css(ghostEl, 'zIndex', '100000');
      css(ghostEl, 'pointerEvents', 'none');
      Sortable.ghost = ghostEl;
      container.appendChild(ghostEl); // Set transform-origin

      css(ghostEl, 'transform-origin', tapDistanceLeft / parseInt(ghostEl.style.width) * 100 + '% ' + tapDistanceTop / parseInt(ghostEl.style.height) * 100 + '%');
    }
  },
  _onDragStart: function _onDragStart(
  /**Event*/
  evt,
  /**boolean*/
  fallback) {
    var _this = this;

    var dataTransfer = evt.dataTransfer;
    var options = _this.options;
    pluginEvent('dragStart', this, {
      evt: evt
    });

    if (Sortable.eventCanceled) {
      this._onDrop();

      return;
    }

    pluginEvent('setupClone', this);

    if (!Sortable.eventCanceled) {
      cloneEl = clone(dragEl);
      cloneEl.draggable = false;
      cloneEl.style['will-change'] = '';

      this._hideClone();

      toggleClass(cloneEl, this.options.chosenClass, false);
      Sortable.clone = cloneEl;
    } // #1143: IFrame support workaround


    _this.cloneId = _nextTick(function () {
      pluginEvent('clone', _this);
      if (Sortable.eventCanceled) return;

      if (!_this.options.removeCloneOnHide) {
        rootEl.insertBefore(cloneEl, dragEl);
      }

      _this._hideClone();

      _dispatchEvent({
        sortable: _this,
        name: 'clone'
      });
    });
    !fallback && toggleClass(dragEl, options.dragClass, true); // Set proper drop events

    if (fallback) {
      ignoreNextClick = true;
      _this._loopId = setInterval(_this._emulateDragOver, 50);
    } else {
      // Undo what was set in _prepareDragStart before drag started
      off(document, 'mouseup', _this._onDrop);
      off(document, 'touchend', _this._onDrop);
      off(document, 'touchcancel', _this._onDrop);

      if (dataTransfer) {
        dataTransfer.effectAllowed = 'move';
        options.setData && options.setData.call(_this, dataTransfer, dragEl);
      }

      on(document, 'drop', _this); // #1276 fix:

      css(dragEl, 'transform', 'translateZ(0)');
    }

    awaitingDragStarted = true;
    _this._dragStartId = _nextTick(_this._dragStarted.bind(_this, fallback, evt));
    on(document, 'selectstart', _this);
    moved = true;

    if (Safari) {
      css(document.body, 'user-select', 'none');
    }
  },
  // Returns true - if no further action is needed (either inserted or another condition)
  _onDragOver: function _onDragOver(
  /**Event*/
  evt) {
    var el = this.el,
        target = evt.target,
        dragRect,
        targetRect,
        revert,
        options = this.options,
        group = options.group,
        activeSortable = Sortable.active,
        isOwner = activeGroup === group,
        canSort = options.sort,
        fromSortable = putSortable || activeSortable,
        vertical,
        _this = this,
        completedFired = false;

    if (_silent) return;

    function dragOverEvent(name, extra) {
      pluginEvent(name, _this, _objectSpread({
        evt: evt,
        isOwner: isOwner,
        axis: vertical ? 'vertical' : 'horizontal',
        revert: revert,
        dragRect: dragRect,
        targetRect: targetRect,
        canSort: canSort,
        fromSortable: fromSortable,
        target: target,
        completed: completed,
        onMove: function onMove(target, after) {
          return _onMove(rootEl, el, dragEl, dragRect, target, getRect(target), evt, after);
        },
        changed: changed
      }, extra));
    } // Capture animation state


    function capture() {
      dragOverEvent('dragOverAnimationCapture');

      _this.captureAnimationState();

      if (_this !== fromSortable) {
        fromSortable.captureAnimationState();
      }
    } // Return invocation when dragEl is inserted (or completed)


    function completed(insertion) {
      dragOverEvent('dragOverCompleted', {
        insertion: insertion
      });

      if (insertion) {
        // Clones must be hidden before folding animation to capture dragRectAbsolute properly
        if (isOwner) {
          activeSortable._hideClone();
        } else {
          activeSortable._showClone(_this);
        }

        if (_this !== fromSortable) {
          // Set ghost class to new sortable's ghost class
          toggleClass(dragEl, putSortable ? putSortable.options.ghostClass : activeSortable.options.ghostClass, false);
          toggleClass(dragEl, options.ghostClass, true);
        }

        if (putSortable !== _this && _this !== Sortable.active) {
          putSortable = _this;
        } else if (_this === Sortable.active && putSortable) {
          putSortable = null;
        } // Animation


        if (fromSortable === _this) {
          _this._ignoreWhileAnimating = target;
        }

        _this.animateAll(function () {
          dragOverEvent('dragOverAnimationComplete');
          _this._ignoreWhileAnimating = null;
        });

        if (_this !== fromSortable) {
          fromSortable.animateAll();
          fromSortable._ignoreWhileAnimating = null;
        }
      } // Null lastTarget if it is not inside a previously swapped element


      if (target === dragEl && !dragEl.animated || target === el && !target.animated) {
        lastTarget = null;
      } // no bubbling and not fallback


      if (!options.dragoverBubble && !evt.rootEl && target !== document) {
        dragEl.parentNode[expando]._isOutsideThisEl(evt.target); // Do not detect for empty insert if already inserted


        !insertion && nearestEmptyInsertDetectEvent(evt);
      }

      !options.dragoverBubble && evt.stopPropagation && evt.stopPropagation();
      return completedFired = true;
    } // Call when dragEl has been inserted


    function changed() {
      newIndex = index(dragEl);
      newDraggableIndex = index(dragEl, options.draggable);

      _dispatchEvent({
        sortable: _this,
        name: 'change',
        toEl: el,
        newIndex: newIndex,
        newDraggableIndex: newDraggableIndex,
        originalEvent: evt
      });
    }

    if (evt.preventDefault !== void 0) {
      evt.cancelable && evt.preventDefault();
    }

    target = closest(target, options.draggable, el, true);
    dragOverEvent('dragOver');
    if (Sortable.eventCanceled) return completedFired;

    if (dragEl.contains(evt.target) || target.animated && target.animatingX && target.animatingY || _this._ignoreWhileAnimating === target) {
      return completed(false);
    }

    ignoreNextClick = false;

    if (activeSortable && !options.disabled && (isOwner ? canSort || (revert = !rootEl.contains(dragEl)) // Reverting item into the original list
    : putSortable === this || (this.lastPutMode = activeGroup.checkPull(this, activeSortable, dragEl, evt)) && group.checkPut(this, activeSortable, dragEl, evt))) {
      vertical = this._getDirection(evt, target) === 'vertical';
      dragRect = getRect(dragEl);
      dragOverEvent('dragOverValid');
      if (Sortable.eventCanceled) return completedFired;

      if (revert) {
        parentEl = rootEl; // actualization

        capture();

        this._hideClone();

        dragOverEvent('revert');

        if (!Sortable.eventCanceled) {
          if (nextEl) {
            rootEl.insertBefore(dragEl, nextEl);
          } else {
            rootEl.appendChild(dragEl);
          }
        }

        return completed(true);
      }

      var elLastChild = lastChild(el, options.draggable);

      if (!elLastChild || _ghostIsLast(evt, vertical, this) && !elLastChild.animated) {
        // If already at end of list: Do not insert
        if (elLastChild === dragEl) {
          return completed(false);
        } // assign target only if condition is true


        if (elLastChild && el === evt.target) {
          target = elLastChild;
        }

        if (target) {
          targetRect = getRect(target);
        }

        if (_onMove(rootEl, el, dragEl, dragRect, target, targetRect, evt, !!target) !== false) {
          capture();
          el.appendChild(dragEl);
          parentEl = el; // actualization

          changed();
          return completed(true);
        }
      } else if (target.parentNode === el) {
        targetRect = getRect(target);
        var direction = 0,
            targetBeforeFirstSwap,
            differentLevel = dragEl.parentNode !== el,
            differentRowCol = !_dragElInRowColumn(dragEl.animated && dragEl.toRect || dragRect, target.animated && target.toRect || targetRect, vertical),
            side1 = vertical ? 'top' : 'left',
            scrolledPastTop = isScrolledPast(target, 'top', 'top') || isScrolledPast(dragEl, 'top', 'top'),
            scrollBefore = scrolledPastTop ? scrolledPastTop.scrollTop : void 0;

        if (lastTarget !== target) {
          targetBeforeFirstSwap = targetRect[side1];
          pastFirstInvertThresh = false;
          isCircumstantialInvert = !differentRowCol && options.invertSwap || differentLevel;
        }

        direction = _getSwapDirection(evt, target, targetRect, vertical, differentRowCol ? 1 : options.swapThreshold, options.invertedSwapThreshold == null ? options.swapThreshold : options.invertedSwapThreshold, isCircumstantialInvert, lastTarget === target);
        var sibling;

        if (direction !== 0) {
          // Check if target is beside dragEl in respective direction (ignoring hidden elements)
          var dragIndex = index(dragEl);

          do {
            dragIndex -= direction;
            sibling = parentEl.children[dragIndex];
          } while (sibling && (css(sibling, 'display') === 'none' || sibling === ghostEl));
        } // If dragEl is already beside target: Do not insert


        if (direction === 0 || sibling === target) {
          return completed(false);
        }

        lastTarget = target;
        lastDirection = direction;
        var nextSibling = target.nextElementSibling,
            after = false;
        after = direction === 1;

        var moveVector = _onMove(rootEl, el, dragEl, dragRect, target, targetRect, evt, after);

        if (moveVector !== false) {
          if (moveVector === 1 || moveVector === -1) {
            after = moveVector === 1;
          }

          _silent = true;
          setTimeout(_unsilent, 30);
          capture();

          if (after && !nextSibling) {
            el.appendChild(dragEl);
          } else {
            target.parentNode.insertBefore(dragEl, after ? nextSibling : target);
          } // Undo chrome's scroll adjustment (has no effect on other browsers)


          if (scrolledPastTop) {
            scrollBy(scrolledPastTop, 0, scrollBefore - scrolledPastTop.scrollTop);
          }

          parentEl = dragEl.parentNode; // actualization
          // must be done before animation

          if (targetBeforeFirstSwap !== undefined && !isCircumstantialInvert) {
            targetMoveDistance = Math.abs(targetBeforeFirstSwap - getRect(target)[side1]);
          }

          changed();
          return completed(true);
        }
      }

      if (el.contains(dragEl)) {
        return completed(false);
      }
    }

    return false;
  },
  _ignoreWhileAnimating: null,
  _offMoveEvents: function _offMoveEvents() {
    off(document, 'mousemove', this._onTouchMove);
    off(document, 'touchmove', this._onTouchMove);
    off(document, 'pointermove', this._onTouchMove);
    off(document, 'dragover', nearestEmptyInsertDetectEvent);
    off(document, 'mousemove', nearestEmptyInsertDetectEvent);
    off(document, 'touchmove', nearestEmptyInsertDetectEvent);
  },
  _offUpEvents: function _offUpEvents() {
    var ownerDocument = this.el.ownerDocument;
    off(ownerDocument, 'mouseup', this._onDrop);
    off(ownerDocument, 'touchend', this._onDrop);
    off(ownerDocument, 'pointerup', this._onDrop);
    off(ownerDocument, 'touchcancel', this._onDrop);
    off(document, 'selectstart', this);
  },
  _onDrop: function _onDrop(
  /**Event*/
  evt) {
    var el = this.el,
        options = this.options; // Get the index of the dragged element within its parent

    newIndex = index(dragEl);
    newDraggableIndex = index(dragEl, options.draggable);
    pluginEvent('drop', this, {
      evt: evt
    });
    parentEl = dragEl && dragEl.parentNode; // Get again after plugin event

    newIndex = index(dragEl);
    newDraggableIndex = index(dragEl, options.draggable);

    if (Sortable.eventCanceled) {
      this._nulling();

      return;
    }

    awaitingDragStarted = false;
    isCircumstantialInvert = false;
    pastFirstInvertThresh = false;
    clearInterval(this._loopId);
    clearTimeout(this._dragStartTimer);

    _cancelNextTick(this.cloneId);

    _cancelNextTick(this._dragStartId); // Unbind events


    if (this.nativeDraggable) {
      off(document, 'drop', this);
      off(el, 'dragstart', this._onDragStart);
    }

    this._offMoveEvents();

    this._offUpEvents();

    if (Safari) {
      css(document.body, 'user-select', '');
    }

    css(dragEl, 'transform', '');

    if (evt) {
      if (moved) {
        evt.cancelable && evt.preventDefault();
        !options.dropBubble && evt.stopPropagation();
      }

      ghostEl && ghostEl.parentNode && ghostEl.parentNode.removeChild(ghostEl);

      if (rootEl === parentEl || putSortable && putSortable.lastPutMode !== 'clone') {
        // Remove clone(s)
        cloneEl && cloneEl.parentNode && cloneEl.parentNode.removeChild(cloneEl);
      }

      if (dragEl) {
        if (this.nativeDraggable) {
          off(dragEl, 'dragend', this);
        }

        _disableDraggable(dragEl);

        dragEl.style['will-change'] = ''; // Remove classes
        // ghostClass is added in dragStarted

        if (moved && !awaitingDragStarted) {
          toggleClass(dragEl, putSortable ? putSortable.options.ghostClass : this.options.ghostClass, false);
        }

        toggleClass(dragEl, this.options.chosenClass, false); // Drag stop event

        _dispatchEvent({
          sortable: this,
          name: 'unchoose',
          toEl: parentEl,
          newIndex: null,
          newDraggableIndex: null,
          originalEvent: evt
        });

        if (rootEl !== parentEl) {
          if (newIndex >= 0) {
            // Add event
            _dispatchEvent({
              rootEl: parentEl,
              name: 'add',
              toEl: parentEl,
              fromEl: rootEl,
              originalEvent: evt
            }); // Remove event


            _dispatchEvent({
              sortable: this,
              name: 'remove',
              toEl: parentEl,
              originalEvent: evt
            }); // drag from one list and drop into another


            _dispatchEvent({
              rootEl: parentEl,
              name: 'sort',
              toEl: parentEl,
              fromEl: rootEl,
              originalEvent: evt
            });

            _dispatchEvent({
              sortable: this,
              name: 'sort',
              toEl: parentEl,
              originalEvent: evt
            });
          }

          putSortable && putSortable.save();
        } else {
          if (newIndex !== oldIndex) {
            if (newIndex >= 0) {
              // drag & drop within the same list
              _dispatchEvent({
                sortable: this,
                name: 'update',
                toEl: parentEl,
                originalEvent: evt
              });

              _dispatchEvent({
                sortable: this,
                name: 'sort',
                toEl: parentEl,
                originalEvent: evt
              });
            }
          }
        }

        if (Sortable.active) {
          /* jshint eqnull:true */
          if (newIndex == null || newIndex === -1) {
            newIndex = oldIndex;
            newDraggableIndex = oldDraggableIndex;
          }

          _dispatchEvent({
            sortable: this,
            name: 'end',
            toEl: parentEl,
            originalEvent: evt
          }); // Save sorting


          this.save();
        }
      }
    }

    this._nulling();
  },
  _nulling: function _nulling() {
    pluginEvent('nulling', this);
    rootEl = dragEl = parentEl = ghostEl = nextEl = cloneEl = lastDownEl = cloneHidden = tapEvt = touchEvt = moved = newIndex = newDraggableIndex = oldIndex = oldDraggableIndex = lastTarget = lastDirection = putSortable = activeGroup = Sortable.dragged = Sortable.ghost = Sortable.clone = Sortable.active = null;
    savedInputChecked.forEach(function (el) {
      el.checked = true;
    });
    savedInputChecked.length = lastDx = lastDy = 0;
  },
  handleEvent: function handleEvent(
  /**Event*/
  evt) {
    switch (evt.type) {
      case 'drop':
      case 'dragend':
        this._onDrop(evt);

        break;

      case 'dragenter':
      case 'dragover':
        if (dragEl) {
          this._onDragOver(evt);

          _globalDragOver(evt);
        }

        break;

      case 'selectstart':
        evt.preventDefault();
        break;
    }
  },

  /**
   * Serializes the item into an array of string.
   * @returns {String[]}
   */
  toArray: function toArray() {
    var order = [],
        el,
        children = this.el.children,
        i = 0,
        n = children.length,
        options = this.options;

    for (; i < n; i++) {
      el = children[i];

      if (closest(el, options.draggable, this.el, false)) {
        order.push(el.getAttribute(options.dataIdAttr) || _generateId(el));
      }
    }

    return order;
  },

  /**
   * Sorts the elements according to the array.
   * @param  {String[]}  order  order of the items
   */
  sort: function sort(order, useAnimation) {
    var items = {},
        rootEl = this.el;
    this.toArray().forEach(function (id, i) {
      var el = rootEl.children[i];

      if (closest(el, this.options.draggable, rootEl, false)) {
        items[id] = el;
      }
    }, this);
    useAnimation && this.captureAnimationState();
    order.forEach(function (id) {
      if (items[id]) {
        rootEl.removeChild(items[id]);
        rootEl.appendChild(items[id]);
      }
    });
    useAnimation && this.animateAll();
  },

  /**
   * Save the current sorting
   */
  save: function save() {
    var store = this.options.store;
    store && store.set && store.set(this);
  },

  /**
   * For each element in the set, get the first element that matches the selector by testing the element itself and traversing up through its ancestors in the DOM tree.
   * @param   {HTMLElement}  el
   * @param   {String}       [selector]  default: `options.draggable`
   * @returns {HTMLElement|null}
   */
  closest: function closest$1(el, selector) {
    return closest(el, selector || this.options.draggable, this.el, false);
  },

  /**
   * Set/get option
   * @param   {string} name
   * @param   {*}      [value]
   * @returns {*}
   */
  option: function option(name, value) {
    var options = this.options;

    if (value === void 0) {
      return options[name];
    } else {
      var modifiedValue = PluginManager.modifyOption(this, name, value);

      if (typeof modifiedValue !== 'undefined') {
        options[name] = modifiedValue;
      } else {
        options[name] = value;
      }

      if (name === 'group') {
        _prepareGroup(options);
      }
    }
  },

  /**
   * Destroy
   */
  destroy: function destroy() {
    pluginEvent('destroy', this);
    var el = this.el;
    el[expando] = null;
    off(el, 'mousedown', this._onTapStart);
    off(el, 'touchstart', this._onTapStart);
    off(el, 'pointerdown', this._onTapStart);

    if (this.nativeDraggable) {
      off(el, 'dragover', this);
      off(el, 'dragenter', this);
    } // Remove draggable attributes


    Array.prototype.forEach.call(el.querySelectorAll('[draggable]'), function (el) {
      el.removeAttribute('draggable');
    });

    this._onDrop();

    this._disableDelayedDragEvents();

    sortables.splice(sortables.indexOf(this.el), 1);
    this.el = el = null;
  },
  _hideClone: function _hideClone() {
    if (!cloneHidden) {
      pluginEvent('hideClone', this);
      if (Sortable.eventCanceled) return;
      css(cloneEl, 'display', 'none');

      if (this.options.removeCloneOnHide && cloneEl.parentNode) {
        cloneEl.parentNode.removeChild(cloneEl);
      }

      cloneHidden = true;
    }
  },
  _showClone: function _showClone(putSortable) {
    if (putSortable.lastPutMode !== 'clone') {
      this._hideClone();

      return;
    }

    if (cloneHidden) {
      pluginEvent('showClone', this);
      if (Sortable.eventCanceled) return; // show clone at dragEl or original position

      if (dragEl.parentNode == rootEl && !this.options.group.revertClone) {
        rootEl.insertBefore(cloneEl, dragEl);
      } else if (nextEl) {
        rootEl.insertBefore(cloneEl, nextEl);
      } else {
        rootEl.appendChild(cloneEl);
      }

      if (this.options.group.revertClone) {
        this.animate(dragEl, cloneEl);
      }

      css(cloneEl, 'display', '');
      cloneHidden = false;
    }
  }
};

function _globalDragOver(
/**Event*/
evt) {
  if (evt.dataTransfer) {
    evt.dataTransfer.dropEffect = 'move';
  }

  evt.cancelable && evt.preventDefault();
}

function _onMove(fromEl, toEl, dragEl, dragRect, targetEl, targetRect, originalEvent, willInsertAfter) {
  var evt,
      sortable = fromEl[expando],
      onMoveFn = sortable.options.onMove,
      retVal; // Support for new CustomEvent feature

  if (window.CustomEvent && !IE11OrLess && !Edge) {
    evt = new CustomEvent('move', {
      bubbles: true,
      cancelable: true
    });
  } else {
    evt = document.createEvent('Event');
    evt.initEvent('move', true, true);
  }

  evt.to = toEl;
  evt.from = fromEl;
  evt.dragged = dragEl;
  evt.draggedRect = dragRect;
  evt.related = targetEl || toEl;
  evt.relatedRect = targetRect || getRect(toEl);
  evt.willInsertAfter = willInsertAfter;
  evt.originalEvent = originalEvent;
  fromEl.dispatchEvent(evt);

  if (onMoveFn) {
    retVal = onMoveFn.call(sortable, evt, originalEvent);
  }

  return retVal;
}

function _disableDraggable(el) {
  el.draggable = false;
}

function _unsilent() {
  _silent = false;
}

function _ghostIsLast(evt, vertical, sortable) {
  var rect = getRect(lastChild(sortable.el, sortable.options.draggable));
  var spacer = 10;
  return vertical ? evt.clientX > rect.right + spacer || evt.clientX <= rect.right && evt.clientY > rect.bottom && evt.clientX >= rect.left : evt.clientX > rect.right && evt.clientY > rect.top || evt.clientX <= rect.right && evt.clientY > rect.bottom + spacer;
}

function _getSwapDirection(evt, target, targetRect, vertical, swapThreshold, invertedSwapThreshold, invertSwap, isLastTarget) {
  var mouseOnAxis = vertical ? evt.clientY : evt.clientX,
      targetLength = vertical ? targetRect.height : targetRect.width,
      targetS1 = vertical ? targetRect.top : targetRect.left,
      targetS2 = vertical ? targetRect.bottom : targetRect.right,
      invert = false;

  if (!invertSwap) {
    // Never invert or create dragEl shadow when target movemenet causes mouse to move past the end of regular swapThreshold
    if (isLastTarget && targetMoveDistance < targetLength * swapThreshold) {
      // multiplied only by swapThreshold because mouse will already be inside target by (1 - threshold) * targetLength / 2
      // check if past first invert threshold on side opposite of lastDirection
      if (!pastFirstInvertThresh && (lastDirection === 1 ? mouseOnAxis > targetS1 + targetLength * invertedSwapThreshold / 2 : mouseOnAxis < targetS2 - targetLength * invertedSwapThreshold / 2)) {
        // past first invert threshold, do not restrict inverted threshold to dragEl shadow
        pastFirstInvertThresh = true;
      }

      if (!pastFirstInvertThresh) {
        // dragEl shadow (target move distance shadow)
        if (lastDirection === 1 ? mouseOnAxis < targetS1 + targetMoveDistance // over dragEl shadow
        : mouseOnAxis > targetS2 - targetMoveDistance) {
          return -lastDirection;
        }
      } else {
        invert = true;
      }
    } else {
      // Regular
      if (mouseOnAxis > targetS1 + targetLength * (1 - swapThreshold) / 2 && mouseOnAxis < targetS2 - targetLength * (1 - swapThreshold) / 2) {
        return _getInsertDirection(target);
      }
    }
  }

  invert = invert || invertSwap;

  if (invert) {
    // Invert of regular
    if (mouseOnAxis < targetS1 + targetLength * invertedSwapThreshold / 2 || mouseOnAxis > targetS2 - targetLength * invertedSwapThreshold / 2) {
      return mouseOnAxis > targetS1 + targetLength / 2 ? 1 : -1;
    }
  }

  return 0;
}
/**
 * Gets the direction dragEl must be swapped relative to target in order to make it
 * seem that dragEl has been "inserted" into that element's position
 * @param  {HTMLElement} target       The target whose position dragEl is being inserted at
 * @return {Number}                   Direction dragEl must be swapped
 */


function _getInsertDirection(target) {
  if (index(dragEl) < index(target)) {
    return 1;
  } else {
    return -1;
  }
}
/**
 * Generate id
 * @param   {HTMLElement} el
 * @returns {String}
 * @private
 */


function _generateId(el) {
  var str = el.tagName + el.className + el.src + el.href + el.textContent,
      i = str.length,
      sum = 0;

  while (i--) {
    sum += str.charCodeAt(i);
  }

  return sum.toString(36);
}

function _saveInputCheckedState(root) {
  savedInputChecked.length = 0;
  var inputs = root.getElementsByTagName('input');
  var idx = inputs.length;

  while (idx--) {
    var el = inputs[idx];
    el.checked && savedInputChecked.push(el);
  }
}

function _nextTick(fn) {
  return setTimeout(fn, 0);
}

function _cancelNextTick(id) {
  return clearTimeout(id);
} // Fixed #973:


if (documentExists) {
  on(document, 'touchmove', function (evt) {
    if ((Sortable.active || awaitingDragStarted) && evt.cancelable) {
      evt.preventDefault();
    }
  });
} // Export utils


Sortable.utils = {
  on: on,
  off: off,
  css: css,
  find: find,
  is: function is(el, selector) {
    return !!closest(el, selector, el, false);
  },
  extend: extend,
  throttle: throttle,
  closest: closest,
  toggleClass: toggleClass,
  clone: clone,
  index: index,
  nextTick: _nextTick,
  cancelNextTick: _cancelNextTick,
  detectDirection: _detectDirection,
  getChild: getChild
};
/**
 * Get the Sortable instance of an element
 * @param  {HTMLElement} element The element
 * @return {Sortable|undefined}         The instance of Sortable
 */

Sortable.get = function (element) {
  return element[expando];
};
/**
 * Mount a plugin to Sortable
 * @param  {...SortablePlugin|SortablePlugin[]} plugins       Plugins being mounted
 */


Sortable.mount = function () {
  for (var _len = arguments.length, plugins = new Array(_len), _key = 0; _key < _len; _key++) {
    plugins[_key] = arguments[_key];
  }

  if (plugins[0].constructor === Array) plugins = plugins[0];
  plugins.forEach(function (plugin) {
    if (!plugin.prototype || !plugin.prototype.constructor) {
      throw "Sortable: Mounted plugin must be a constructor function, not ".concat({}.toString.call(plugin));
    }

    if (plugin.utils) Sortable.utils = _objectSpread({}, Sortable.utils, plugin.utils);
    PluginManager.mount(plugin);
  });
};
/**
 * Create sortable instance
 * @param {HTMLElement}  el
 * @param {Object}      [options]
 */


Sortable.create = function (el, options) {
  return new Sortable(el, options);
}; // Export


Sortable.version = version;

var autoScrolls = [],
    scrollEl,
    scrollRootEl,
    scrolling = false,
    lastAutoScrollX,
    lastAutoScrollY,
    touchEvt$1,
    pointerElemChangedInterval;

function AutoScrollPlugin() {
  function AutoScroll() {
    this.defaults = {
      scroll: true,
      scrollSensitivity: 30,
      scrollSpeed: 10,
      bubbleScroll: true
    }; // Bind all private methods

    for (var fn in this) {
      if (fn.charAt(0) === '_' && typeof this[fn] === 'function') {
        this[fn] = this[fn].bind(this);
      }
    }
  }

  AutoScroll.prototype = {
    dragStarted: function dragStarted(_ref) {
      var originalEvent = _ref.originalEvent;

      if (this.sortable.nativeDraggable) {
        on(document, 'dragover', this._handleAutoScroll);
      } else {
        if (this.options.supportPointer) {
          on(document, 'pointermove', this._handleFallbackAutoScroll);
        } else if (originalEvent.touches) {
          on(document, 'touchmove', this._handleFallbackAutoScroll);
        } else {
          on(document, 'mousemove', this._handleFallbackAutoScroll);
        }
      }
    },
    dragOverCompleted: function dragOverCompleted(_ref2) {
      var originalEvent = _ref2.originalEvent;

      // For when bubbling is canceled and using fallback (fallback 'touchmove' always reached)
      if (!this.options.dragOverBubble && !originalEvent.rootEl) {
        this._handleAutoScroll(originalEvent);
      }
    },
    drop: function drop() {
      if (this.sortable.nativeDraggable) {
        off(document, 'dragover', this._handleAutoScroll);
      } else {
        off(document, 'pointermove', this._handleFallbackAutoScroll);
        off(document, 'touchmove', this._handleFallbackAutoScroll);
        off(document, 'mousemove', this._handleFallbackAutoScroll);
      }

      clearPointerElemChangedInterval();
      clearAutoScrolls();
      cancelThrottle();
    },
    nulling: function nulling() {
      touchEvt$1 = scrollRootEl = scrollEl = scrolling = pointerElemChangedInterval = lastAutoScrollX = lastAutoScrollY = null;
      autoScrolls.length = 0;
    },
    _handleFallbackAutoScroll: function _handleFallbackAutoScroll(evt) {
      this._handleAutoScroll(evt, true);
    },
    _handleAutoScroll: function _handleAutoScroll(evt, fallback) {
      var _this = this;

      var x = (evt.touches ? evt.touches[0] : evt).clientX,
          y = (evt.touches ? evt.touches[0] : evt).clientY,
          elem = document.elementFromPoint(x, y);
      touchEvt$1 = evt; // IE does not seem to have native autoscroll,
      // Edge's autoscroll seems too conditional,
      // MACOS Safari does not have autoscroll,
      // Firefox and Chrome are good

      if (fallback || Edge || IE11OrLess || Safari) {
        autoScroll(evt, this.options, elem, fallback); // Listener for pointer element change

        var ogElemScroller = getParentAutoScrollElement(elem, true);

        if (scrolling && (!pointerElemChangedInterval || x !== lastAutoScrollX || y !== lastAutoScrollY)) {
          pointerElemChangedInterval && clearPointerElemChangedInterval(); // Detect for pointer elem change, emulating native DnD behaviour

          pointerElemChangedInterval = setInterval(function () {
            var newElem = getParentAutoScrollElement(document.elementFromPoint(x, y), true);

            if (newElem !== ogElemScroller) {
              ogElemScroller = newElem;
              clearAutoScrolls();
            }

            autoScroll(evt, _this.options, newElem, fallback);
          }, 10);
          lastAutoScrollX = x;
          lastAutoScrollY = y;
        }
      } else {
        // if DnD is enabled (and browser has good autoscrolling), first autoscroll will already scroll, so get parent autoscroll of first autoscroll
        if (!this.options.bubbleScroll || getParentAutoScrollElement(elem, true) === getWindowScrollingElement()) {
          clearAutoScrolls();
          return;
        }

        autoScroll(evt, this.options, getParentAutoScrollElement(elem, false), false);
      }
    }
  };
  return _extends(AutoScroll, {
    pluginName: 'scroll',
    initializeByDefault: true
  });
}

function clearAutoScrolls() {
  autoScrolls.forEach(function (autoScroll) {
    clearInterval(autoScroll.pid);
  });
  autoScrolls = [];
}

function clearPointerElemChangedInterval() {
  clearInterval(pointerElemChangedInterval);
}

var autoScroll = throttle(function (evt, options, rootEl, isFallback) {
  // Bug: https://bugzilla.mozilla.org/show_bug.cgi?id=505521
  if (!options.scroll) return;
  var x = (evt.touches ? evt.touches[0] : evt).clientX,
      y = (evt.touches ? evt.touches[0] : evt).clientY,
      sens = options.scrollSensitivity,
      speed = options.scrollSpeed,
      winScroller = getWindowScrollingElement();
  var scrollThisInstance = false,
      scrollCustomFn; // New scroll root, set scrollEl

  if (scrollRootEl !== rootEl) {
    scrollRootEl = rootEl;
    clearAutoScrolls();
    scrollEl = options.scroll;
    scrollCustomFn = options.scrollFn;

    if (scrollEl === true) {
      scrollEl = getParentAutoScrollElement(rootEl, true);
    }
  }

  var layersOut = 0;
  var currentParent = scrollEl;

  do {
    var el = currentParent,
        rect = getRect(el),
        top = rect.top,
        bottom = rect.bottom,
        left = rect.left,
        right = rect.right,
        width = rect.width,
        height = rect.height,
        canScrollX = void 0,
        canScrollY = void 0,
        scrollWidth = el.scrollWidth,
        scrollHeight = el.scrollHeight,
        elCSS = css(el),
        scrollPosX = el.scrollLeft,
        scrollPosY = el.scrollTop;

    if (el === winScroller) {
      canScrollX = width < scrollWidth && (elCSS.overflowX === 'auto' || elCSS.overflowX === 'scroll' || elCSS.overflowX === 'visible');
      canScrollY = height < scrollHeight && (elCSS.overflowY === 'auto' || elCSS.overflowY === 'scroll' || elCSS.overflowY === 'visible');
    } else {
      canScrollX = width < scrollWidth && (elCSS.overflowX === 'auto' || elCSS.overflowX === 'scroll');
      canScrollY = height < scrollHeight && (elCSS.overflowY === 'auto' || elCSS.overflowY === 'scroll');
    }

    var vx = canScrollX && (Math.abs(right - x) <= sens && scrollPosX + width < scrollWidth) - (Math.abs(left - x) <= sens && !!scrollPosX);
    var vy = canScrollY && (Math.abs(bottom - y) <= sens && scrollPosY + height < scrollHeight) - (Math.abs(top - y) <= sens && !!scrollPosY);

    if (!autoScrolls[layersOut]) {
      for (var i = 0; i <= layersOut; i++) {
        if (!autoScrolls[i]) {
          autoScrolls[i] = {};
        }
      }
    }

    if (autoScrolls[layersOut].vx != vx || autoScrolls[layersOut].vy != vy || autoScrolls[layersOut].el !== el) {
      autoScrolls[layersOut].el = el;
      autoScrolls[layersOut].vx = vx;
      autoScrolls[layersOut].vy = vy;
      clearInterval(autoScrolls[layersOut].pid);

      if (vx != 0 || vy != 0) {
        scrollThisInstance = true;
        /* jshint loopfunc:true */

        autoScrolls[layersOut].pid = setInterval(function () {
          // emulate drag over during autoscroll (fallback), emulating native DnD behaviour
          if (isFallback && this.layer === 0) {
            Sortable.active._onTouchMove(touchEvt$1); // To move ghost if it is positioned absolutely

          }

          var scrollOffsetY = autoScrolls[this.layer].vy ? autoScrolls[this.layer].vy * speed : 0;
          var scrollOffsetX = autoScrolls[this.layer].vx ? autoScrolls[this.layer].vx * speed : 0;

          if (typeof scrollCustomFn === 'function') {
            if (scrollCustomFn.call(Sortable.dragged.parentNode[expando], scrollOffsetX, scrollOffsetY, evt, touchEvt$1, autoScrolls[this.layer].el) !== 'continue') {
              return;
            }
          }

          scrollBy(autoScrolls[this.layer].el, scrollOffsetX, scrollOffsetY);
        }.bind({
          layer: layersOut
        }), 24);
      }
    }

    layersOut++;
  } while (options.bubbleScroll && currentParent !== winScroller && (currentParent = getParentAutoScrollElement(currentParent, false)));

  scrolling = scrollThisInstance; // in case another function catches scrolling as false in between when it is not
}, 30);

var drop = function drop(_ref) {
  var originalEvent = _ref.originalEvent,
      putSortable = _ref.putSortable,
      dragEl = _ref.dragEl,
      activeSortable = _ref.activeSortable,
      dispatchSortableEvent = _ref.dispatchSortableEvent,
      hideGhostForTarget = _ref.hideGhostForTarget,
      unhideGhostForTarget = _ref.unhideGhostForTarget;
  if (!originalEvent) return;
  var toSortable = putSortable || activeSortable;
  hideGhostForTarget();
  var touch = originalEvent.changedTouches && originalEvent.changedTouches.length ? originalEvent.changedTouches[0] : originalEvent;
  var target = document.elementFromPoint(touch.clientX, touch.clientY);
  unhideGhostForTarget();

  if (toSortable && !toSortable.el.contains(target)) {
    dispatchSortableEvent('spill');
    this.onSpill({
      dragEl: dragEl,
      putSortable: putSortable
    });
  }
};

function Revert() {}

Revert.prototype = {
  startIndex: null,
  dragStart: function dragStart(_ref2) {
    var oldDraggableIndex = _ref2.oldDraggableIndex;
    this.startIndex = oldDraggableIndex;
  },
  onSpill: function onSpill(_ref3) {
    var dragEl = _ref3.dragEl,
        putSortable = _ref3.putSortable;
    this.sortable.captureAnimationState();

    if (putSortable) {
      putSortable.captureAnimationState();
    }

    var nextSibling = getChild(this.sortable.el, this.startIndex, this.options);

    if (nextSibling) {
      this.sortable.el.insertBefore(dragEl, nextSibling);
    } else {
      this.sortable.el.appendChild(dragEl);
    }

    this.sortable.animateAll();

    if (putSortable) {
      putSortable.animateAll();
    }
  },
  drop: drop
};

_extends(Revert, {
  pluginName: 'revertOnSpill'
});

function Remove() {}

Remove.prototype = {
  onSpill: function onSpill(_ref4) {
    var dragEl = _ref4.dragEl,
        putSortable = _ref4.putSortable;
    var parentSortable = putSortable || this.sortable;
    parentSortable.captureAnimationState();
    dragEl.parentNode && dragEl.parentNode.removeChild(dragEl);
    parentSortable.animateAll();
  },
  drop: drop
};

_extends(Remove, {
  pluginName: 'removeOnSpill'
});

var lastSwapEl;

function SwapPlugin() {
  function Swap() {
    this.defaults = {
      swapClass: 'sortable-swap-highlight'
    };
  }

  Swap.prototype = {
    dragStart: function dragStart(_ref) {
      var dragEl = _ref.dragEl;
      lastSwapEl = dragEl;
    },
    dragOverValid: function dragOverValid(_ref2) {
      var completed = _ref2.completed,
          target = _ref2.target,
          onMove = _ref2.onMove,
          activeSortable = _ref2.activeSortable,
          changed = _ref2.changed,
          cancel = _ref2.cancel;
      if (!activeSortable.options.swap) return;
      var el = this.sortable.el,
          options = this.options;

      if (target && target !== el) {
        var prevSwapEl = lastSwapEl;

        if (onMove(target) !== false) {
          toggleClass(target, options.swapClass, true);
          lastSwapEl = target;
        } else {
          lastSwapEl = null;
        }

        if (prevSwapEl && prevSwapEl !== lastSwapEl) {
          toggleClass(prevSwapEl, options.swapClass, false);
        }
      }

      changed();
      completed(true);
      cancel();
    },
    drop: function drop(_ref3) {
      var activeSortable = _ref3.activeSortable,
          putSortable = _ref3.putSortable,
          dragEl = _ref3.dragEl;
      var toSortable = putSortable || this.sortable;
      var options = this.options;
      lastSwapEl && toggleClass(lastSwapEl, options.swapClass, false);

      if (lastSwapEl && (options.swap || putSortable && putSortable.options.swap)) {
        if (dragEl !== lastSwapEl) {
          toSortable.captureAnimationState();
          if (toSortable !== activeSortable) activeSortable.captureAnimationState();
          swapNodes(dragEl, lastSwapEl);
          toSortable.animateAll();
          if (toSortable !== activeSortable) activeSortable.animateAll();
        }
      }
    },
    nulling: function nulling() {
      lastSwapEl = null;
    }
  };
  return _extends(Swap, {
    pluginName: 'swap',
    eventProperties: function eventProperties() {
      return {
        swapItem: lastSwapEl
      };
    }
  });
}

function swapNodes(n1, n2) {
  var p1 = n1.parentNode,
      p2 = n2.parentNode,
      i1,
      i2;
  if (!p1 || !p2 || p1.isEqualNode(n2) || p2.isEqualNode(n1)) return;
  i1 = index(n1);
  i2 = index(n2);

  if (p1.isEqualNode(p2) && i1 < i2) {
    i2++;
  }

  p1.insertBefore(n2, p1.children[i1]);
  p2.insertBefore(n1, p2.children[i2]);
}

var multiDragElements = [],
    multiDragClones = [],
    lastMultiDragSelect,
    // for selection with modifier key down (SHIFT)
multiDragSortable,
    initialFolding = false,
    // Initial multi-drag fold when drag started
folding = false,
    // Folding any other time
dragStarted = false,
    dragEl$1,
    clonesFromRect,
    clonesHidden;

function MultiDragPlugin() {
  function MultiDrag(sortable) {
    // Bind all private methods
    for (var fn in this) {
      if (fn.charAt(0) === '_' && typeof this[fn] === 'function') {
        this[fn] = this[fn].bind(this);
      }
    }

    if (sortable.options.supportPointer) {
      on(document, 'pointerup', this._deselectMultiDrag);
    } else {
      on(document, 'mouseup', this._deselectMultiDrag);
      on(document, 'touchend', this._deselectMultiDrag);
    }

    on(document, 'keydown', this._checkKeyDown);
    on(document, 'keyup', this._checkKeyUp);
    this.defaults = {
      selectedClass: 'sortable-selected',
      multiDragKey: null,
      setData: function setData(dataTransfer, dragEl) {
        var data = '';

        if (multiDragElements.length && multiDragSortable === sortable) {
          multiDragElements.forEach(function (multiDragElement, i) {
            data += (!i ? '' : ', ') + multiDragElement.textContent;
          });
        } else {
          data = dragEl.textContent;
        }

        dataTransfer.setData('Text', data);
      }
    };
  }

  MultiDrag.prototype = {
    multiDragKeyDown: false,
    isMultiDrag: false,
    delayStartGlobal: function delayStartGlobal(_ref) {
      var dragged = _ref.dragEl;
      dragEl$1 = dragged;
    },
    delayEnded: function delayEnded() {
      this.isMultiDrag = ~multiDragElements.indexOf(dragEl$1);
    },
    setupClone: function setupClone(_ref2) {
      var sortable = _ref2.sortable,
          cancel = _ref2.cancel;
      if (!this.isMultiDrag) return;

      for (var i = 0; i < multiDragElements.length; i++) {
        multiDragClones.push(clone(multiDragElements[i]));
        multiDragClones[i].sortableIndex = multiDragElements[i].sortableIndex;
        multiDragClones[i].draggable = false;
        multiDragClones[i].style['will-change'] = '';
        toggleClass(multiDragClones[i], this.options.selectedClass, false);
        multiDragElements[i] === dragEl$1 && toggleClass(multiDragClones[i], this.options.chosenClass, false);
      }

      sortable._hideClone();

      cancel();
    },
    clone: function clone(_ref3) {
      var sortable = _ref3.sortable,
          rootEl = _ref3.rootEl,
          dispatchSortableEvent = _ref3.dispatchSortableEvent,
          cancel = _ref3.cancel;
      if (!this.isMultiDrag) return;

      if (!this.options.removeCloneOnHide) {
        if (multiDragElements.length && multiDragSortable === sortable) {
          insertMultiDragClones(true, rootEl);
          dispatchSortableEvent('clone');
          cancel();
        }
      }
    },
    showClone: function showClone(_ref4) {
      var cloneNowShown = _ref4.cloneNowShown,
          rootEl = _ref4.rootEl,
          cancel = _ref4.cancel;
      if (!this.isMultiDrag) return;
      insertMultiDragClones(false, rootEl);
      multiDragClones.forEach(function (clone) {
        css(clone, 'display', '');
      });
      cloneNowShown();
      clonesHidden = false;
      cancel();
    },
    hideClone: function hideClone(_ref5) {
      var _this = this;

      var sortable = _ref5.sortable,
          cloneNowHidden = _ref5.cloneNowHidden,
          cancel = _ref5.cancel;
      if (!this.isMultiDrag) return;
      multiDragClones.forEach(function (clone) {
        css(clone, 'display', 'none');

        if (_this.options.removeCloneOnHide && clone.parentNode) {
          clone.parentNode.removeChild(clone);
        }
      });
      cloneNowHidden();
      clonesHidden = true;
      cancel();
    },
    dragStartGlobal: function dragStartGlobal(_ref6) {
      var sortable = _ref6.sortable;

      if (!this.isMultiDrag && multiDragSortable) {
        multiDragSortable.multiDrag._deselectMultiDrag();
      }

      multiDragElements.forEach(function (multiDragElement) {
        multiDragElement.sortableIndex = index(multiDragElement);
      }); // Sort multi-drag elements

      multiDragElements = multiDragElements.sort(function (a, b) {
        return a.sortableIndex - b.sortableIndex;
      });
      dragStarted = true;
    },
    dragStarted: function dragStarted(_ref7) {
      var _this2 = this;

      var sortable = _ref7.sortable;
      if (!this.isMultiDrag) return;

      if (this.options.sort) {
        // Capture rects,
        // hide multi drag elements (by positioning them absolute),
        // set multi drag elements rects to dragRect,
        // show multi drag elements,
        // animate to rects,
        // unset rects & remove from DOM
        sortable.captureAnimationState();

        if (this.options.animation) {
          multiDragElements.forEach(function (multiDragElement) {
            if (multiDragElement === dragEl$1) return;
            css(multiDragElement, 'position', 'absolute');
          });
          var dragRect = getRect(dragEl$1, false, true, true);
          multiDragElements.forEach(function (multiDragElement) {
            if (multiDragElement === dragEl$1) return;
            setRect(multiDragElement, dragRect);
          });
          folding = true;
          initialFolding = true;
        }
      }

      sortable.animateAll(function () {
        folding = false;
        initialFolding = false;

        if (_this2.options.animation) {
          multiDragElements.forEach(function (multiDragElement) {
            unsetRect(multiDragElement);
          });
        } // Remove all auxiliary multidrag items from el, if sorting enabled


        if (_this2.options.sort) {
          removeMultiDragElements();
        }
      });
    },
    dragOver: function dragOver(_ref8) {
      var target = _ref8.target,
          completed = _ref8.completed,
          cancel = _ref8.cancel;

      if (folding && ~multiDragElements.indexOf(target)) {
        completed(false);
        cancel();
      }
    },
    revert: function revert(_ref9) {
      var fromSortable = _ref9.fromSortable,
          rootEl = _ref9.rootEl,
          sortable = _ref9.sortable,
          dragRect = _ref9.dragRect;

      if (multiDragElements.length > 1) {
        // Setup unfold animation
        multiDragElements.forEach(function (multiDragElement) {
          sortable.addAnimationState({
            target: multiDragElement,
            rect: folding ? getRect(multiDragElement) : dragRect
          });
          unsetRect(multiDragElement);
          multiDragElement.fromRect = dragRect;
          fromSortable.removeAnimationState(multiDragElement);
        });
        folding = false;
        insertMultiDragElements(!this.options.removeCloneOnHide, rootEl);
      }
    },
    dragOverCompleted: function dragOverCompleted(_ref10) {
      var sortable = _ref10.sortable,
          isOwner = _ref10.isOwner,
          insertion = _ref10.insertion,
          activeSortable = _ref10.activeSortable,
          parentEl = _ref10.parentEl,
          putSortable = _ref10.putSortable;
      var options = this.options;

      if (insertion) {
        // Clones must be hidden before folding animation to capture dragRectAbsolute properly
        if (isOwner) {
          activeSortable._hideClone();
        }

        initialFolding = false; // If leaving sort:false root, or already folding - Fold to new location

        if (options.animation && multiDragElements.length > 1 && (folding || !isOwner && !activeSortable.options.sort && !putSortable)) {
          // Fold: Set all multi drag elements's rects to dragEl's rect when multi-drag elements are invisible
          var dragRectAbsolute = getRect(dragEl$1, false, true, true);
          multiDragElements.forEach(function (multiDragElement) {
            if (multiDragElement === dragEl$1) return;
            setRect(multiDragElement, dragRectAbsolute); // Move element(s) to end of parentEl so that it does not interfere with multi-drag clones insertion if they are inserted
            // while folding, and so that we can capture them again because old sortable will no longer be fromSortable

            parentEl.appendChild(multiDragElement);
          });
          folding = true;
        } // Clones must be shown (and check to remove multi drags) after folding when interfering multiDragElements are moved out


        if (!isOwner) {
          // Only remove if not folding (folding will remove them anyways)
          if (!folding) {
            removeMultiDragElements();
          }

          if (multiDragElements.length > 1) {
            var clonesHiddenBefore = clonesHidden;

            activeSortable._showClone(sortable); // Unfold animation for clones if showing from hidden


            if (activeSortable.options.animation && !clonesHidden && clonesHiddenBefore) {
              multiDragClones.forEach(function (clone) {
                activeSortable.addAnimationState({
                  target: clone,
                  rect: clonesFromRect
                });
                clone.fromRect = clonesFromRect;
                clone.thisAnimationDuration = null;
              });
            }
          } else {
            activeSortable._showClone(sortable);
          }
        }
      }
    },
    dragOverAnimationCapture: function dragOverAnimationCapture(_ref11) {
      var dragRect = _ref11.dragRect,
          isOwner = _ref11.isOwner,
          activeSortable = _ref11.activeSortable;
      multiDragElements.forEach(function (multiDragElement) {
        multiDragElement.thisAnimationDuration = null;
      });

      if (activeSortable.options.animation && !isOwner && activeSortable.multiDrag.isMultiDrag) {
        clonesFromRect = _extends({}, dragRect);
        var dragMatrix = matrix(dragEl$1, true);
        clonesFromRect.top -= dragMatrix.f;
        clonesFromRect.left -= dragMatrix.e;
      }
    },
    dragOverAnimationComplete: function dragOverAnimationComplete() {
      if (folding) {
        folding = false;
        removeMultiDragElements();
      }
    },
    drop: function drop(_ref12) {
      var evt = _ref12.originalEvent,
          rootEl = _ref12.rootEl,
          parentEl = _ref12.parentEl,
          sortable = _ref12.sortable,
          dispatchSortableEvent = _ref12.dispatchSortableEvent,
          oldIndex = _ref12.oldIndex,
          putSortable = _ref12.putSortable;
      var toSortable = putSortable || this.sortable;
      if (!evt) return;
      var options = this.options,
          children = parentEl.children; // Multi-drag selection

      if (!dragStarted) {
        if (options.multiDragKey && !this.multiDragKeyDown) {
          this._deselectMultiDrag();
        }

        toggleClass(dragEl$1, options.selectedClass, !~multiDragElements.indexOf(dragEl$1));

        if (!~multiDragElements.indexOf(dragEl$1)) {
          multiDragElements.push(dragEl$1);
          dispatchEvent({
            sortable: sortable,
            rootEl: rootEl,
            name: 'select',
            targetEl: dragEl$1,
            originalEvt: evt
          }); // Modifier activated, select from last to dragEl

          if (evt.shiftKey && lastMultiDragSelect && sortable.el.contains(lastMultiDragSelect)) {
            var lastIndex = index(lastMultiDragSelect),
                currentIndex = index(dragEl$1);

            if (~lastIndex && ~currentIndex && lastIndex !== currentIndex) {
              // Must include lastMultiDragSelect (select it), in case modified selection from no selection
              // (but previous selection existed)
              var n, i;

              if (currentIndex > lastIndex) {
                i = lastIndex;
                n = currentIndex;
              } else {
                i = currentIndex;
                n = lastIndex + 1;
              }

              for (; i < n; i++) {
                if (~multiDragElements.indexOf(children[i])) continue;
                toggleClass(children[i], options.selectedClass, true);
                multiDragElements.push(children[i]);
                dispatchEvent({
                  sortable: sortable,
                  rootEl: rootEl,
                  name: 'select',
                  targetEl: children[i],
                  originalEvt: evt
                });
              }
            }
          } else {
            lastMultiDragSelect = dragEl$1;
          }

          multiDragSortable = toSortable;
        } else {
          multiDragElements.splice(multiDragElements.indexOf(dragEl$1), 1);
          lastMultiDragSelect = null;
          dispatchEvent({
            sortable: sortable,
            rootEl: rootEl,
            name: 'deselect',
            targetEl: dragEl$1,
            originalEvt: evt
          });
        }
      } // Multi-drag drop


      if (dragStarted && this.isMultiDrag) {
        // Do not "unfold" after around dragEl if reverted
        if ((parentEl[expando].options.sort || parentEl !== rootEl) && multiDragElements.length > 1) {
          var dragRect = getRect(dragEl$1),
              multiDragIndex = index(dragEl$1, ':not(.' + this.options.selectedClass + ')');
          if (!initialFolding && options.animation) dragEl$1.thisAnimationDuration = null;
          toSortable.captureAnimationState();

          if (!initialFolding) {
            if (options.animation) {
              dragEl$1.fromRect = dragRect;
              multiDragElements.forEach(function (multiDragElement) {
                multiDragElement.thisAnimationDuration = null;

                if (multiDragElement !== dragEl$1) {
                  var rect = folding ? getRect(multiDragElement) : dragRect;
                  multiDragElement.fromRect = rect; // Prepare unfold animation

                  toSortable.addAnimationState({
                    target: multiDragElement,
                    rect: rect
                  });
                }
              });
            } // Multi drag elements are not necessarily removed from the DOM on drop, so to reinsert
            // properly they must all be removed


            removeMultiDragElements();
            multiDragElements.forEach(function (multiDragElement) {
              if (children[multiDragIndex]) {
                parentEl.insertBefore(multiDragElement, children[multiDragIndex]);
              } else {
                parentEl.appendChild(multiDragElement);
              }

              multiDragIndex++;
            }); // If initial folding is done, the elements may have changed position because they are now
            // unfolding around dragEl, even though dragEl may not have his index changed, so update event
            // must be fired here as Sortable will not.

            if (oldIndex === index(dragEl$1)) {
              var update = false;
              multiDragElements.forEach(function (multiDragElement) {
                if (multiDragElement.sortableIndex !== index(multiDragElement)) {
                  update = true;
                  return;
                }
              });

              if (update) {
                dispatchSortableEvent('update');
              }
            }
          } // Must be done after capturing individual rects (scroll bar)


          multiDragElements.forEach(function (multiDragElement) {
            unsetRect(multiDragElement);
          });
          toSortable.animateAll();
        }

        multiDragSortable = toSortable;
      } // Remove clones if necessary


      if (rootEl === parentEl || putSortable && putSortable.lastPutMode !== 'clone') {
        multiDragClones.forEach(function (clone) {
          clone.parentNode && clone.parentNode.removeChild(clone);
        });
      }
    },
    nullingGlobal: function nullingGlobal() {
      this.isMultiDrag = dragStarted = false;
      multiDragClones.length = 0;
    },
    destroyGlobal: function destroyGlobal() {
      this._deselectMultiDrag();

      off(document, 'pointerup', this._deselectMultiDrag);
      off(document, 'mouseup', this._deselectMultiDrag);
      off(document, 'touchend', this._deselectMultiDrag);
      off(document, 'keydown', this._checkKeyDown);
      off(document, 'keyup', this._checkKeyUp);
    },
    _deselectMultiDrag: function _deselectMultiDrag(evt) {
      if (typeof dragStarted !== "undefined" && dragStarted) return; // Only deselect if selection is in this sortable

      if (multiDragSortable !== this.sortable) return; // Only deselect if target is not item in this sortable

      if (evt && closest(evt.target, this.options.draggable, this.sortable.el, false)) return; // Only deselect if left click

      if (evt && evt.button !== 0) return;

      while (multiDragElements.length) {
        var el = multiDragElements[0];
        toggleClass(el, this.options.selectedClass, false);
        multiDragElements.shift();
        dispatchEvent({
          sortable: this.sortable,
          rootEl: this.sortable.el,
          name: 'deselect',
          targetEl: el,
          originalEvt: evt
        });
      }
    },
    _checkKeyDown: function _checkKeyDown(evt) {
      if (evt.key === this.options.multiDragKey) {
        this.multiDragKeyDown = true;
      }
    },
    _checkKeyUp: function _checkKeyUp(evt) {
      if (evt.key === this.options.multiDragKey) {
        this.multiDragKeyDown = false;
      }
    }
  };
  return _extends(MultiDrag, {
    // Static methods & properties
    pluginName: 'multiDrag',
    utils: {
      /**
       * Selects the provided multi-drag item
       * @param  {HTMLElement} el    The element to be selected
       */
      select: function select(el) {
        var sortable = el.parentNode[expando];
        if (!sortable || !sortable.options.multiDrag || ~multiDragElements.indexOf(el)) return;

        if (multiDragSortable && multiDragSortable !== sortable) {
          multiDragSortable.multiDrag._deselectMultiDrag();

          multiDragSortable = sortable;
        }

        toggleClass(el, sortable.options.selectedClass, true);
        multiDragElements.push(el);
      },

      /**
       * Deselects the provided multi-drag item
       * @param  {HTMLElement} el    The element to be deselected
       */
      deselect: function deselect(el) {
        var sortable = el.parentNode[expando],
            index = multiDragElements.indexOf(el);
        if (!sortable || !sortable.options.multiDrag || !~index) return;
        toggleClass(el, sortable.options.selectedClass, false);
        multiDragElements.splice(index, 1);
      }
    },
    eventProperties: function eventProperties() {
      var _this3 = this;

      var oldIndicies = [],
          newIndicies = [];
      multiDragElements.forEach(function (multiDragElement) {
        oldIndicies.push({
          multiDragElement: multiDragElement,
          index: multiDragElement.sortableIndex
        }); // multiDragElements will already be sorted if folding

        var newIndex;

        if (folding && multiDragElement !== dragEl$1) {
          newIndex = -1;
        } else if (folding) {
          newIndex = index(multiDragElement, ':not(.' + _this3.options.selectedClass + ')');
        } else {
          newIndex = index(multiDragElement);
        }

        newIndicies.push({
          multiDragElement: multiDragElement,
          index: newIndex
        });
      });
      return {
        items: _toConsumableArray(multiDragElements),
        clones: [].concat(multiDragClones),
        oldIndicies: oldIndicies,
        newIndicies: newIndicies
      };
    },
    optionListeners: {
      multiDragKey: function multiDragKey(key) {
        key = key.toLowerCase();

        if (key === 'ctrl') {
          key = 'Control';
        } else if (key.length > 1) {
          key = key.charAt(0).toUpperCase() + key.substr(1);
        }

        return key;
      }
    }
  });
}

function insertMultiDragElements(clonesInserted, rootEl) {
  multiDragElements.forEach(function (multiDragElement, i) {
    var target = rootEl.children[multiDragElement.sortableIndex + (clonesInserted ? Number(i) : 0)];

    if (target) {
      rootEl.insertBefore(multiDragElement, target);
    } else {
      rootEl.appendChild(multiDragElement);
    }
  });
}
/**
 * Insert multi-drag clones
 * @param  {[Boolean]} elementsInserted  Whether the multi-drag elements are inserted
 * @param  {HTMLElement} rootEl
 */


function insertMultiDragClones(elementsInserted, rootEl) {
  multiDragClones.forEach(function (clone, i) {
    var target = rootEl.children[clone.sortableIndex + (elementsInserted ? Number(i) : 0)];

    if (target) {
      rootEl.insertBefore(clone, target);
    } else {
      rootEl.appendChild(clone);
    }
  });
}

function removeMultiDragElements() {
  multiDragElements.forEach(function (multiDragElement) {
    if (multiDragElement === dragEl$1) return;
    multiDragElement.parentNode && multiDragElement.parentNode.removeChild(multiDragElement);
  });
}

Sortable.mount(new AutoScrollPlugin());
Sortable.mount(Remove, Revert);

/* harmony default export */ __webpack_exports__["default"] = (Sortable);



/***/ }),

/***/ "./node_modules/tiny-invariant/dist/tiny-invariant.esm.js":
/*!****************************************************************!*\
  !*** ./node_modules/tiny-invariant/dist/tiny-invariant.esm.js ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var isProduction = "development" === 'production';
var prefix = 'Invariant failed';
function invariant(condition, message) {
    if (condition) {
        return;
    }
    if (isProduction) {
        throw new Error(prefix);
    }
    throw new Error(prefix + ": " + (message || ''));
}

/* harmony default export */ __webpack_exports__["default"] = (invariant);


/***/ }),

/***/ "./node_modules/webfontloader/webfontloader.js":
/*!*****************************************************!*\
  !*** ./node_modules/webfontloader/webfontloader.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_RESULT__;/* Web Font Loader v1.6.28 - (c) Adobe Systems, Google. License: Apache 2.0 */(function(){function aa(a,b,c){return a.call.apply(a.bind,arguments)}function ba(a,b,c){if(!a)throw Error();if(2<arguments.length){var d=Array.prototype.slice.call(arguments,2);return function(){var c=Array.prototype.slice.call(arguments);Array.prototype.unshift.apply(c,d);return a.apply(b,c)}}return function(){return a.apply(b,arguments)}}function p(a,b,c){p=Function.prototype.bind&&-1!=Function.prototype.bind.toString().indexOf("native code")?aa:ba;return p.apply(null,arguments)}var q=Date.now||function(){return+new Date};function ca(a,b){this.a=a;this.o=b||a;this.c=this.o.document}var da=!!window.FontFace;function t(a,b,c,d){b=a.c.createElement(b);if(c)for(var e in c)c.hasOwnProperty(e)&&("style"==e?b.style.cssText=c[e]:b.setAttribute(e,c[e]));d&&b.appendChild(a.c.createTextNode(d));return b}function u(a,b,c){a=a.c.getElementsByTagName(b)[0];a||(a=document.documentElement);a.insertBefore(c,a.lastChild)}function v(a){a.parentNode&&a.parentNode.removeChild(a)}
function w(a,b,c){b=b||[];c=c||[];for(var d=a.className.split(/\s+/),e=0;e<b.length;e+=1){for(var f=!1,g=0;g<d.length;g+=1)if(b[e]===d[g]){f=!0;break}f||d.push(b[e])}b=[];for(e=0;e<d.length;e+=1){f=!1;for(g=0;g<c.length;g+=1)if(d[e]===c[g]){f=!0;break}f||b.push(d[e])}a.className=b.join(" ").replace(/\s+/g," ").replace(/^\s+|\s+$/,"")}function y(a,b){for(var c=a.className.split(/\s+/),d=0,e=c.length;d<e;d++)if(c[d]==b)return!0;return!1}
function ea(a){return a.o.location.hostname||a.a.location.hostname}function z(a,b,c){function d(){m&&e&&f&&(m(g),m=null)}b=t(a,"link",{rel:"stylesheet",href:b,media:"all"});var e=!1,f=!0,g=null,m=c||null;da?(b.onload=function(){e=!0;d()},b.onerror=function(){e=!0;g=Error("Stylesheet failed to load");d()}):setTimeout(function(){e=!0;d()},0);u(a,"head",b)}
function A(a,b,c,d){var e=a.c.getElementsByTagName("head")[0];if(e){var f=t(a,"script",{src:b}),g=!1;f.onload=f.onreadystatechange=function(){g||this.readyState&&"loaded"!=this.readyState&&"complete"!=this.readyState||(g=!0,c&&c(null),f.onload=f.onreadystatechange=null,"HEAD"==f.parentNode.tagName&&e.removeChild(f))};e.appendChild(f);setTimeout(function(){g||(g=!0,c&&c(Error("Script load timeout")))},d||5E3);return f}return null};function B(){this.a=0;this.c=null}function C(a){a.a++;return function(){a.a--;D(a)}}function E(a,b){a.c=b;D(a)}function D(a){0==a.a&&a.c&&(a.c(),a.c=null)};function F(a){this.a=a||"-"}F.prototype.c=function(a){for(var b=[],c=0;c<arguments.length;c++)b.push(arguments[c].replace(/[\W_]+/g,"").toLowerCase());return b.join(this.a)};function G(a,b){this.c=a;this.f=4;this.a="n";var c=(b||"n4").match(/^([nio])([1-9])$/i);c&&(this.a=c[1],this.f=parseInt(c[2],10))}function fa(a){return H(a)+" "+(a.f+"00")+" 300px "+I(a.c)}function I(a){var b=[];a=a.split(/,\s*/);for(var c=0;c<a.length;c++){var d=a[c].replace(/['"]/g,"");-1!=d.indexOf(" ")||/^\d/.test(d)?b.push("'"+d+"'"):b.push(d)}return b.join(",")}function J(a){return a.a+a.f}function H(a){var b="normal";"o"===a.a?b="oblique":"i"===a.a&&(b="italic");return b}
function ga(a){var b=4,c="n",d=null;a&&((d=a.match(/(normal|oblique|italic)/i))&&d[1]&&(c=d[1].substr(0,1).toLowerCase()),(d=a.match(/([1-9]00|normal|bold)/i))&&d[1]&&(/bold/i.test(d[1])?b=7:/[1-9]00/.test(d[1])&&(b=parseInt(d[1].substr(0,1),10))));return c+b};function ha(a,b){this.c=a;this.f=a.o.document.documentElement;this.h=b;this.a=new F("-");this.j=!1!==b.events;this.g=!1!==b.classes}function ia(a){a.g&&w(a.f,[a.a.c("wf","loading")]);K(a,"loading")}function L(a){if(a.g){var b=y(a.f,a.a.c("wf","active")),c=[],d=[a.a.c("wf","loading")];b||c.push(a.a.c("wf","inactive"));w(a.f,c,d)}K(a,"inactive")}function K(a,b,c){if(a.j&&a.h[b])if(c)a.h[b](c.c,J(c));else a.h[b]()};function ja(){this.c={}}function ka(a,b,c){var d=[],e;for(e in b)if(b.hasOwnProperty(e)){var f=a.c[e];f&&d.push(f(b[e],c))}return d};function M(a,b){this.c=a;this.f=b;this.a=t(this.c,"span",{"aria-hidden":"true"},this.f)}function N(a){u(a.c,"body",a.a)}function O(a){return"display:block;position:absolute;top:-9999px;left:-9999px;font-size:300px;width:auto;height:auto;line-height:normal;margin:0;padding:0;font-variant:normal;white-space:nowrap;font-family:"+I(a.c)+";"+("font-style:"+H(a)+";font-weight:"+(a.f+"00")+";")};function P(a,b,c,d,e,f){this.g=a;this.j=b;this.a=d;this.c=c;this.f=e||3E3;this.h=f||void 0}P.prototype.start=function(){var a=this.c.o.document,b=this,c=q(),d=new Promise(function(d,e){function f(){q()-c>=b.f?e():a.fonts.load(fa(b.a),b.h).then(function(a){1<=a.length?d():setTimeout(f,25)},function(){e()})}f()}),e=null,f=new Promise(function(a,d){e=setTimeout(d,b.f)});Promise.race([f,d]).then(function(){e&&(clearTimeout(e),e=null);b.g(b.a)},function(){b.j(b.a)})};function Q(a,b,c,d,e,f,g){this.v=a;this.B=b;this.c=c;this.a=d;this.s=g||"BESbswy";this.f={};this.w=e||3E3;this.u=f||null;this.m=this.j=this.h=this.g=null;this.g=new M(this.c,this.s);this.h=new M(this.c,this.s);this.j=new M(this.c,this.s);this.m=new M(this.c,this.s);a=new G(this.a.c+",serif",J(this.a));a=O(a);this.g.a.style.cssText=a;a=new G(this.a.c+",sans-serif",J(this.a));a=O(a);this.h.a.style.cssText=a;a=new G("serif",J(this.a));a=O(a);this.j.a.style.cssText=a;a=new G("sans-serif",J(this.a));a=
O(a);this.m.a.style.cssText=a;N(this.g);N(this.h);N(this.j);N(this.m)}var R={D:"serif",C:"sans-serif"},S=null;function T(){if(null===S){var a=/AppleWebKit\/([0-9]+)(?:\.([0-9]+))/.exec(window.navigator.userAgent);S=!!a&&(536>parseInt(a[1],10)||536===parseInt(a[1],10)&&11>=parseInt(a[2],10))}return S}Q.prototype.start=function(){this.f.serif=this.j.a.offsetWidth;this.f["sans-serif"]=this.m.a.offsetWidth;this.A=q();U(this)};
function la(a,b,c){for(var d in R)if(R.hasOwnProperty(d)&&b===a.f[R[d]]&&c===a.f[R[d]])return!0;return!1}function U(a){var b=a.g.a.offsetWidth,c=a.h.a.offsetWidth,d;(d=b===a.f.serif&&c===a.f["sans-serif"])||(d=T()&&la(a,b,c));d?q()-a.A>=a.w?T()&&la(a,b,c)&&(null===a.u||a.u.hasOwnProperty(a.a.c))?V(a,a.v):V(a,a.B):ma(a):V(a,a.v)}function ma(a){setTimeout(p(function(){U(this)},a),50)}function V(a,b){setTimeout(p(function(){v(this.g.a);v(this.h.a);v(this.j.a);v(this.m.a);b(this.a)},a),0)};function W(a,b,c){this.c=a;this.a=b;this.f=0;this.m=this.j=!1;this.s=c}var X=null;W.prototype.g=function(a){var b=this.a;b.g&&w(b.f,[b.a.c("wf",a.c,J(a).toString(),"active")],[b.a.c("wf",a.c,J(a).toString(),"loading"),b.a.c("wf",a.c,J(a).toString(),"inactive")]);K(b,"fontactive",a);this.m=!0;na(this)};
W.prototype.h=function(a){var b=this.a;if(b.g){var c=y(b.f,b.a.c("wf",a.c,J(a).toString(),"active")),d=[],e=[b.a.c("wf",a.c,J(a).toString(),"loading")];c||d.push(b.a.c("wf",a.c,J(a).toString(),"inactive"));w(b.f,d,e)}K(b,"fontinactive",a);na(this)};function na(a){0==--a.f&&a.j&&(a.m?(a=a.a,a.g&&w(a.f,[a.a.c("wf","active")],[a.a.c("wf","loading"),a.a.c("wf","inactive")]),K(a,"active")):L(a.a))};function oa(a){this.j=a;this.a=new ja;this.h=0;this.f=this.g=!0}oa.prototype.load=function(a){this.c=new ca(this.j,a.context||this.j);this.g=!1!==a.events;this.f=!1!==a.classes;pa(this,new ha(this.c,a),a)};
function qa(a,b,c,d,e){var f=0==--a.h;(a.f||a.g)&&setTimeout(function(){var a=e||null,m=d||null||{};if(0===c.length&&f)L(b.a);else{b.f+=c.length;f&&(b.j=f);var h,l=[];for(h=0;h<c.length;h++){var k=c[h],n=m[k.c],r=b.a,x=k;r.g&&w(r.f,[r.a.c("wf",x.c,J(x).toString(),"loading")]);K(r,"fontloading",x);r=null;if(null===X)if(window.FontFace){var x=/Gecko.*Firefox\/(\d+)/.exec(window.navigator.userAgent),xa=/OS X.*Version\/10\..*Safari/.exec(window.navigator.userAgent)&&/Apple/.exec(window.navigator.vendor);
X=x?42<parseInt(x[1],10):xa?!1:!0}else X=!1;X?r=new P(p(b.g,b),p(b.h,b),b.c,k,b.s,n):r=new Q(p(b.g,b),p(b.h,b),b.c,k,b.s,a,n);l.push(r)}for(h=0;h<l.length;h++)l[h].start()}},0)}function pa(a,b,c){var d=[],e=c.timeout;ia(b);var d=ka(a.a,c,a.c),f=new W(a.c,b,e);a.h=d.length;b=0;for(c=d.length;b<c;b++)d[b].load(function(b,d,c){qa(a,f,b,d,c)})};function ra(a,b){this.c=a;this.a=b}
ra.prototype.load=function(a){function b(){if(f["__mti_fntLst"+d]){var c=f["__mti_fntLst"+d](),e=[],h;if(c)for(var l=0;l<c.length;l++){var k=c[l].fontfamily;void 0!=c[l].fontStyle&&void 0!=c[l].fontWeight?(h=c[l].fontStyle+c[l].fontWeight,e.push(new G(k,h))):e.push(new G(k))}a(e)}else setTimeout(function(){b()},50)}var c=this,d=c.a.projectId,e=c.a.version;if(d){var f=c.c.o;A(this.c,(c.a.api||"https://fast.fonts.net/jsapi")+"/"+d+".js"+(e?"?v="+e:""),function(e){e?a([]):(f["__MonotypeConfiguration__"+
d]=function(){return c.a},b())}).id="__MonotypeAPIScript__"+d}else a([])};function sa(a,b){this.c=a;this.a=b}sa.prototype.load=function(a){var b,c,d=this.a.urls||[],e=this.a.families||[],f=this.a.testStrings||{},g=new B;b=0;for(c=d.length;b<c;b++)z(this.c,d[b],C(g));var m=[];b=0;for(c=e.length;b<c;b++)if(d=e[b].split(":"),d[1])for(var h=d[1].split(","),l=0;l<h.length;l+=1)m.push(new G(d[0],h[l]));else m.push(new G(d[0]));E(g,function(){a(m,f)})};function ta(a,b){a?this.c=a:this.c=ua;this.a=[];this.f=[];this.g=b||""}var ua="https://fonts.googleapis.com/css";function va(a,b){for(var c=b.length,d=0;d<c;d++){var e=b[d].split(":");3==e.length&&a.f.push(e.pop());var f="";2==e.length&&""!=e[1]&&(f=":");a.a.push(e.join(f))}}
function wa(a){if(0==a.a.length)throw Error("No fonts to load!");if(-1!=a.c.indexOf("kit="))return a.c;for(var b=a.a.length,c=[],d=0;d<b;d++)c.push(a.a[d].replace(/ /g,"+"));b=a.c+"?family="+c.join("%7C");0<a.f.length&&(b+="&subset="+a.f.join(","));0<a.g.length&&(b+="&text="+encodeURIComponent(a.g));return b};function ya(a){this.f=a;this.a=[];this.c={}}
var za={latin:"BESbswy","latin-ext":"\u00e7\u00f6\u00fc\u011f\u015f",cyrillic:"\u0439\u044f\u0416",greek:"\u03b1\u03b2\u03a3",khmer:"\u1780\u1781\u1782",Hanuman:"\u1780\u1781\u1782"},Aa={thin:"1",extralight:"2","extra-light":"2",ultralight:"2","ultra-light":"2",light:"3",regular:"4",book:"4",medium:"5","semi-bold":"6",semibold:"6","demi-bold":"6",demibold:"6",bold:"7","extra-bold":"8",extrabold:"8","ultra-bold":"8",ultrabold:"8",black:"9",heavy:"9",l:"3",r:"4",b:"7"},Ba={i:"i",italic:"i",n:"n",normal:"n"},
Ca=/^(thin|(?:(?:extra|ultra)-?)?light|regular|book|medium|(?:(?:semi|demi|extra|ultra)-?)?bold|black|heavy|l|r|b|[1-9]00)?(n|i|normal|italic)?$/;
function Da(a){for(var b=a.f.length,c=0;c<b;c++){var d=a.f[c].split(":"),e=d[0].replace(/\+/g," "),f=["n4"];if(2<=d.length){var g;var m=d[1];g=[];if(m)for(var m=m.split(","),h=m.length,l=0;l<h;l++){var k;k=m[l];if(k.match(/^[\w-]+$/)){var n=Ca.exec(k.toLowerCase());if(null==n)k="";else{k=n[2];k=null==k||""==k?"n":Ba[k];n=n[1];if(null==n||""==n)n="4";else var r=Aa[n],n=r?r:isNaN(n)?"4":n.substr(0,1);k=[k,n].join("")}}else k="";k&&g.push(k)}0<g.length&&(f=g);3==d.length&&(d=d[2],g=[],d=d?d.split(","):
g,0<d.length&&(d=za[d[0]])&&(a.c[e]=d))}a.c[e]||(d=za[e])&&(a.c[e]=d);for(d=0;d<f.length;d+=1)a.a.push(new G(e,f[d]))}};function Ea(a,b){this.c=a;this.a=b}var Fa={Arimo:!0,Cousine:!0,Tinos:!0};Ea.prototype.load=function(a){var b=new B,c=this.c,d=new ta(this.a.api,this.a.text),e=this.a.families;va(d,e);var f=new ya(e);Da(f);z(c,wa(d),C(b));E(b,function(){a(f.a,f.c,Fa)})};function Ga(a,b){this.c=a;this.a=b}Ga.prototype.load=function(a){var b=this.a.id,c=this.c.o;b?A(this.c,(this.a.api||"https://use.typekit.net")+"/"+b+".js",function(b){if(b)a([]);else if(c.Typekit&&c.Typekit.config&&c.Typekit.config.fn){b=c.Typekit.config.fn;for(var e=[],f=0;f<b.length;f+=2)for(var g=b[f],m=b[f+1],h=0;h<m.length;h++)e.push(new G(g,m[h]));try{c.Typekit.load({events:!1,classes:!1,async:!0})}catch(l){}a(e)}},2E3):a([])};function Ha(a,b){this.c=a;this.f=b;this.a=[]}Ha.prototype.load=function(a){var b=this.f.id,c=this.c.o,d=this;b?(c.__webfontfontdeckmodule__||(c.__webfontfontdeckmodule__={}),c.__webfontfontdeckmodule__[b]=function(b,c){for(var g=0,m=c.fonts.length;g<m;++g){var h=c.fonts[g];d.a.push(new G(h.name,ga("font-weight:"+h.weight+";font-style:"+h.style)))}a(d.a)},A(this.c,(this.f.api||"https://f.fontdeck.com/s/css/js/")+ea(this.c)+"/"+b+".js",function(b){b&&a([])})):a([])};var Y=new oa(window);Y.a.c.custom=function(a,b){return new sa(b,a)};Y.a.c.fontdeck=function(a,b){return new Ha(b,a)};Y.a.c.monotype=function(a,b){return new ra(b,a)};Y.a.c.typekit=function(a,b){return new Ga(b,a)};Y.a.c.google=function(a,b){return new Ea(b,a)};var Z={load:p(Y.load,Y)}; true?!(__WEBPACK_AMD_DEFINE_RESULT__ = (function(){return Z}).call(exports, __webpack_require__, exports, module),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)):undefined;}());


/***/ }),

/***/ "./node_modules/webpack/buildin/global.js":
/*!***********************************!*\
  !*** (webpack)/buildin/global.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var g;

// This works in non-strict mode
g = (function() {
	return this;
})();

try {
	// This works if eval is allowed (see CSP)
	g = g || new Function("return this")();
} catch (e) {
	// This works if the window reference is available
	if (typeof window === "object") g = window;
}

// g can still be undefined, but nothing to do about it...
// We return undefined, instead of nothing here, so it's
// easier to handle this case. if(!global) { ...}

module.exports = g;


/***/ }),

/***/ "./node_modules/webpack/buildin/module.js":
/*!***********************************!*\
  !*** (webpack)/buildin/module.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

module.exports = function(module) {
	if (!module.webpackPolyfill) {
		module.deprecate = function() {};
		module.paths = [];
		// module.parent = undefined by default
		if (!module.children) module.children = [];
		Object.defineProperty(module, "loaded", {
			enumerable: true,
			get: function() {
				return module.l;
			}
		});
		Object.defineProperty(module, "id", {
			enumerable: true,
			get: function() {
				return module.i;
			}
		});
		module.webpackPolyfill = 1;
	}
	return module;
};


/***/ }),

/***/ "./src/Background/background-component.js":
/*!************************************************!*\
  !*** ./src/Background/background-component.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _common_color__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../common/color */ "./src/common/color.js");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_7__);




function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1___default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }







var BackgroundComponent = function BackgroundComponent(props) {
  var value = props.control.setting.get();
  var defaultValue = {
    "background-attachment": '',
    "background-color": '',
    "background-image": '',
    "background-media": '',
    "background-position": '',
    "background-repeat": '',
    "background-size": '',
    "background-type": ""
  };
  var ResDefaultParam = {
    desktop: {
      "background-attachment": '',
      "background-color": '',
      "background-image": '',
      "background-media": '',
      "background-position": '',
      "background-repeat": '',
      "background-size": '',
      "background-type": ""
    },
    tablet: {
      "background-attachment": '',
      "background-color": '',
      "background-image": '',
      "background-media": '',
      "background-position": '',
      "background-repeat": '',
      "background-size": '',
      "background-type": ""
    },
    mobile: {
      "background-attachment": '',
      "background-color": '',
      "background-image": '',
      "background-media": '',
      "background-position": '',
      "background-repeat": '',
      "background-size": '',
      "background-type": ""
    }
  };
  var defaultValues = responsive ? ResDefaultParam : defaultValue;
  var defaultVals = props.control.params.default ? _objectSpread(_objectSpread({}, defaultValues), props.control.params.default) : defaultValues;
  value = value ? _objectSpread(_objectSpread({}, defaultVals), value) : defaultVals;

  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_4__["useState"])(value),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState, 2),
      props_value = _useState2[0],
      setPropsValue = _useState2[1];

  console.log(props_value);

  var renderReset = function renderReset() {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
      className: "customize-control-title"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
      className: "kmt-color-btn-reset-wrap"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("button", {
      className: "kmt-reset-btn components-button components-circular-option-picker__clear is-secondary is-small",
      disabled: JSON.stringify(props_value) === JSON.stringify(props.control.params.default),
      onClick: function onClick(e) {
        e.preventDefault();
        var value = JSON.parse(JSON.stringify(props.control.params.default));

        if (undefined !== value && '' !== value) {
          if (undefined === value['background-color'] || '' === value['background-color']) {
            value['background-color'] = '';
          }

          if (undefined === value['background-image'] || '' === value['background-image']) {
            value['background-image'] = '';
          }

          if (undefined === value['background-media'] || '' === value['background-media']) {
            value['background-media'] = '';
          }
        }

        props.control.setting.set(value);
        setPropsValue(value);
      }
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Dashicon"], {
      icon: "image-rotate"
    }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("label", null, labelHtml, descriptionHtml));
  };

  var _onSelectImage = function onSelectImage(media, backgroundType) {
    var obj = _objectSpread({}, props_value);

    obj['background-media'] = media.id;
    obj['background-image'] = media.url;
    obj['background-type'] = backgroundType;
    props.control.setting.set(obj);
    setPropsValue(obj);
  };

  var _onChangeImageOptions = function onChangeImageOptions(mainKey, value, backgroundType) {
    var obj = _objectSpread({}, props_value);

    obj[mainKey] = value;
    obj['background-type'] = backgroundType;
    props.control.setting.set(obj);
    setPropsValue(obj);
  };

  var renderSettings = function renderSettings() {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_common_color__WEBPACK_IMPORTED_MODULE_6__["default"], {
      color: undefined !== props_value['background-color'] && props_value['background-color'] ? props_value['background-color'] : '',
      onChangeComplete: function onChangeComplete(color, backgroundType) {
        return handleChangeComplete(color, backgroundType);
      },
      media: undefined !== props_value['background-media'] && props_value['background-media'] ? props_value['background-media'] : '',
      backgroundImage: undefined !== props_value['background-image'] && props_value['background-image'] ? props_value['background-image'] : '',
      backgroundAttachment: undefined !== props_value['background-attachment'] && props_value['background-attachment'] ? props_value['background-attachment'] : '',
      backgroundPosition: undefined !== props_value['background-position'] && props_value['background-position'] ? props_value['background-position'] : '',
      backgroundRepeat: undefined !== props_value['background-repeat'] && props_value['background-repeat'] ? props_value['background-repeat'] : '',
      backgroundSize: undefined !== props_value['background-size'] && props_value['background-size'] ? props_value['background-size'] : '',
      onSelectImage: function onSelectImage(media, backgroundType) {
        return _onSelectImage(media, backgroundType);
      },
      onChangeImageOptions: function onChangeImageOptions(mainKey, value, backgroundType) {
        return _onChangeImageOptions(mainKey, value, backgroundType);
      },
      backgroundType: undefined !== props_value['background-type'] && props_value['background-type'] ? props_value['background-type'] : 'color',
      allowGradient: true,
      allowImage: true
    }));
  };

  var handleChangeComplete = function handleChangeComplete(color, backgroundType) {
    var value = '';

    if (color) {
      if (typeof color === 'string' || color instanceof String) {
        value = color;
      } else if (undefined !== color.rgb && undefined !== color.rgb.a && 1 !== color.rgb.a) {
        value = "rgba(".concat(color.rgb.r, ",").concat(color.rgb.g, ",").concat(color.rgb.b, ",").concat(color.rgb.a, ")");
      } else {
        value = color.hex;
      }
    }

    var obj = _objectSpread({}, props_value);

    obj['background-color'] = value;
    obj['background-type'] = backgroundType;
    props.control.setting.set(obj);
    setPropsValue(obj);
  };

  var _props$control$params = props.control.params,
      label = _props$control$params.label,
      description = _props$control$params.description;
  var labelHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
    className: "customize-control-title"
  }, label ? label : Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_7__["__"])('Background'));
  var descriptionHtml = description ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
    className: "description customize-control-description"
  }, description) : null;
  var inputHtml = null;
  inputHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
    className: "background-container"
  }, renderReset(), renderSettings());
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
    className: "customize-control-content"
  }, inputHtml));
};

BackgroundComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_3___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(BackgroundComponent));

/***/ }),

/***/ "./src/common/capitalize-first.js":
/*!****************************************!*\
  !*** ./src/common/capitalize-first.js ***!
  \****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return capitalizeFirstLetter; });
function capitalizeFirstLetter(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
}

/***/ }),

/***/ "./src/common/color.js":
/*!*****************************!*\
  !*** ./src/common/color.js ***!
  \*****************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/assertThisInitialized */ "./node_modules/@babel/runtime/helpers/assertThisInitialized.js");
/* harmony import */ var _babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/inherits */ "./node_modules/@babel/runtime/helpers/inherits.js");
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/possibleConstructorReturn */ "./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js");
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @babel/runtime/helpers/getPrototypeOf */ "./node_modules/@babel/runtime/helpers/getPrototypeOf.js");
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var _wordpress_media_utils__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! @wordpress/media-utils */ "@wordpress/media-utils");
/* harmony import */ var _wordpress_media_utils__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(_wordpress_media_utils__WEBPACK_IMPORTED_MODULE_11__);








function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5___default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5___default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_4___default()(this, result); }; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }








var KemetColorPickerControl = /*#__PURE__*/function (_Component) {
  _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_3___default()(KemetColorPickerControl, _Component);

  var _super = _createSuper(KemetColorPickerControl);

  function KemetColorPickerControl(props) {
    var _this;

    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default()(this, KemetColorPickerControl);

    _this = _super.apply(this, arguments);
    _this.onChangeComplete = _this.onChangeComplete.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2___default()(_this));
    _this.onPaletteChangeComplete = _this.onPaletteChangeComplete.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2___default()(_this));
    _this.onChangeGradientComplete = _this.onChangeGradientComplete.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2___default()(_this));
    _this.renderImageSettings = _this.renderImageSettings.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2___default()(_this));
    _this.onRemoveImage = _this.onRemoveImage.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2___default()(_this));
    _this.onSelectImage = _this.onSelectImage.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2___default()(_this));
    _this.open = _this.open.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2___default()(_this));
    _this.toggleClose = _this.toggleClose.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_2___default()(_this));
    _this.state = {
      isVisible: false,
      refresh: false,
      color: _this.props.color,
      text: _this.props.text,
      modalCanClose: true,
      backgroundType: _this.props.backgroundType,
      supportGradient: undefined === _wordpress_components__WEBPACK_IMPORTED_MODULE_10__["__experimentalGradientPicker"] ? false : true
    };
    return _this;
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default()(KemetColorPickerControl, [{
    key: "onResetRefresh",
    value: function onResetRefresh() {
      if (this.state.refresh === true) {
        this.setState({
          refresh: false
        });
      } else {
        this.setState({
          refresh: true
        });
      }
    }
  }, {
    key: "render",
    value: function render() {
      var _this2 = this;

      var _this$state = this.state,
          refresh = _this$state.refresh,
          isVisible = _this$state.isVisible,
          supportGradient = _this$state.supportGradient,
          backgroundType = _this$state.backgroundType;
      var _this$props = this.props,
          allowGradient = _this$props.allowGradient,
          allowImage = _this$props.allowImage;
      var allGradients = ['linear-gradient(135deg,rgba(6,147,227,1) 0%,rgb(155,81,224) 100%)', 'linear-gradient(135deg,rgb(122,220,180) 0%,rgb(0,208,130) 100%)', 'linear-gradient(135deg,rgba(252,185,0,1) 0%,rgba(255,105,0,1) 100%)', 'linear-gradient(135deg,rgba(255,105,0,1) 0%,rgb(207,46,46) 100%)', 'linear-gradient(135deg,rgb(74,234,220) 0%,rgb(151,120,209) 20%,rgb(207,42,186) 40%,rgb(238,44,130) 60%,rgb(251,105,98) 80%,rgb(254,248,76) 100%)', 'linear-gradient(135deg,rgb(255,206,236) 0%,rgb(152,150,240) 100%)', 'linear-gradient(135deg,rgb(254,205,165) 0%,rgb(254,45,45) 50%,rgb(107,0,62) 100%)', 'linear-gradient(135deg,rgb(255,203,112) 0%,rgb(199,81,192) 50%,rgb(65,88,208) 100%)', 'linear-gradient(135deg,rgb(255,245,203) 0%,rgb(182,227,212) 50%,rgb(51,167,181) 100%)', 'linear-gradient(135deg,rgb(202,248,128) 0%,rgb(113,206,126) 100%)', 'linear-gradient(135deg,rgb(2,3,129) 0%,rgb(40,116,252) 100%)', 'linear-gradient(to right, #ffecd2 0%, #fcb69f 100%)', 'linear-gradient(to right, #ff8177 0%, #ff867a 0%, #ff8c7f 21%, #f99185 52%, #cf556c 78%, #b12a5b 100%)', 'linear-gradient(to right, #fa709a 0%, #fee140 100%)', 'linear-gradient(to top, #30cfd0 0%, #330867 100%)', 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)', 'linear-gradient(15deg, #13547a 0%, #80d0c7 100%)', 'linear-gradient(to top, #ff0844 0%, #ffb199 100%)', 'linear-gradient(to top, #3b41c5 0%, #a981bb 49%, #ffc8a9 100%)', 'linear-gradient(to top, #cc208e 0%, #6713d2 100%)', 'linear-gradient(to right, #0acffe 0%, #495aff 100%)', 'linear-gradient(-225deg, #FF057C 0%, #8D0B93 50%, #321575 100%)', 'linear-gradient(-225deg, #231557 0%, #44107A 29%, #FF1361 67%, #FFF800 100%)', 'radial-gradient(circle 248px at center, #16d9e3 0%, #30c7ec 47%, #46aef7 100%)', 'linear-gradient(180deg, #2af598 0%, #009efd 100%)', 'linear-gradient(to right, #6a11cb 0%, #2575fc 100%)', 'linear-gradient(to right, #f78ca0 0%, #f9748f 19%, #fd868c 60%, #fe9a8b 100%)', 'linear-gradient(to top, #3f51b1 0%, #5a55ae 13%, #7b5fac 25%, #8f6aae 38%, #a86aa4 50%, #cc6b8e 62%, #f18271 75%, #f3a469 87%, #f7c978 100%)', 'linear-gradient(to top, #7028e4 0%, #e5b2ca 100%)', 'linear-gradient(to top, #0c3483 0%, #a2b6df 100%, #6b8cce 100%, #a2b6df 100%)', 'linear-gradient(to right, #868f96 0%, #596164 100%)', 'linear-gradient(to top, #c79081 0%, #dfa579 100%)', 'linear-gradient(to top, #09203f 0%, #537895 100%)', 'linear-gradient(-60deg, #ff5858 0%, #f09819 100%)', 'linear-gradient(to top, #0ba360 0%, #3cba92 100%)', 'linear-gradient(-225deg, #B7F8DB 0%, #50A7C2 100%)', 'linear-gradient(-225deg, #AC32E4 0%, #7918F2 48%, #4801FF 100%)', 'linear-gradient(-225deg, #473B7B 0%, #3584A7 51%, #30D2BE 100%)', 'linear-gradient(-225deg, #FFE29F 0%, #FFA99F 48%, #FF719A 100%)', 'linear-gradient(to top, #e14fad 0%, #f9d423 100%)', 'linear-gradient(to right, #d7d2cc 0%, #304352 100%)', 'linear-gradient(-20deg, #616161 0%, #9bc5c3 100%)', 'linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%)', 'linear-gradient(135deg,rgb(238,238,238) 0%,rgb(169,184,195) 100%)', 'linear-gradient(to top, #c1dfc4 0%, #deecdd 100%)', 'linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%)', 'linear-gradient(135deg, #fdfcfb 0%, #e2d1c3 100%)', 'linear-gradient(-20deg, #e9defa 0%, #fbfcdb 100%)', 'linear-gradient(60deg, #abecd6 0%, #fbed96 100%)', 'linear-gradient(to top, #d5d4d0 0%, #d5d4d0 1%, #eeeeec 31%, #efeeec 75%, #e9e9e7 100%)', 'linear-gradient(45deg, #93a5cf 0%, #e4efe9 100%)', 'linear-gradient(to top, #d299c2 0%, #fef9d7 100%)', 'linear-gradient(to top, #e6e9f0 0%, #eef1f5 100%)', 'linear-gradient(to top, #dad4ec 0%, #dad4ec 1%, #f3e7e9 100%)', 'linear-gradient(to top, #dfe9f3 0%, white 100%)', 'linear-gradient(-225deg, #E3FDF5 0%, #FFE6FA 100%)'];

      var toggleVisible = function toggleVisible() {
        if (refresh === true) {
          _this2.setState({
            refresh: false
          });
        } else {
          _this2.setState({
            refresh: true
          });
        }

        _this2.setState({
          isVisible: true
        });
      };

      var showingGradient = allowGradient && supportGradient ? true : false;
      var tabs = [{
        name: 'color',
        title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Color'),
        className: 'kemet-color-background'
      }];

      if (showingGradient) {
        var gradientTab = {
          name: 'gradient',
          title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Gradient', 'kemet'),
          className: 'kemet-image-background'
        };
        tabs.push(gradientTab);
      }

      if (allowImage) {
        var imageTab = {
          name: 'image',
          title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Image', 'kemet'),
          className: 'kemet-image-background'
        };
        tabs.push(imageTab);
      }

      var defaultColorPalette = ['#000000', '#ffffff', '#dd3333', '#dd9933', '#eeee22', '#81d742', '#1e73be', "#e2e7ed"];

      var RenderTopSection = function RenderTopSection() {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", {
          className: "kmt-color-picker-top"
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("ul", {
          className: "kmt-color-picker-skins"
        }, defaultColorPalette.map(function (color, index) {
          return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("li", {
            key: "color-".concat(index),
            style: {
              background: color
            },
            className: classnames__WEBPACK_IMPORTED_MODULE_9___default()({
              active: _this2.state.color === color
            }),
            onClick: function onClick() {
              return _this2.onPaletteChangeComplete(color);
            }
          }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", {
            className: "kmt-tooltip-top"
          }, "Color ".concat(index + 1)));
        })));
      };

      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", {
        className: "color-button-wrap"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_10__["Button"], {
        className: isVisible ? 'kemet-color-icon-indicate open' : 'kemet-color-icon-indicate',
        onClick: function onClick() {
          isVisible ? _this2.toggleClose() : toggleVisible();
        }
      }, ('color' === backgroundType || 'gradient' === backgroundType) && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_10__["ColorIndicator"], {
        className: "kemet-advanced-color-indicate",
        colorValue: this.state.color
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("i", {
        class: "kmt-tooltip-top"
      }, this.state.text)), 'image' === backgroundType && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_10__["ColorIndicator"], {
        className: "kemet-advanced-color-indicate",
        colorValue: "#ffffff"
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_10__["Dashicon"], {
        icon: "format-image"
      }))), isVisible ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", {
        className: "kemet-color-picker-wrap"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", {
        className: "kemet-popover-color",
        onClose: this.toggleClose
      }, 1 < tabs.length && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_10__["TabPanel"], {
        className: "kemet-popover-tabs kemet-background-tabs",
        activeClass: "active-tab",
        initialTabName: backgroundType,
        tabs: tabs
      }, function (tab) {
        var tabout;

        if (tab.name) {
          if ('gradient' === tab.name) {
            tabout = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_10__["__experimentalGradientPicker"], {
              className: "kmt-gradient-color-picker",
              value: _this2.props.color && _this2.props.color.includes('gradient') ? _this2.props.color : '',
              onChange: function onChange(gradient) {
                return _this2.onChangeGradientComplete(gradient);
              }
            }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("ul", {
              className: 'ct-gradient-swatches'
            }, allGradients.map(function (gradient, slug) {
              return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("li", {
                onClick: function onClick() {
                  return _this2.onChangeGradientComplete(gradient);
                },
                style: {
                  '--background-image': gradient
                },
                key: slug
              });
            })));
          }

          if ('image' === tab.name) {
            tabout = _this2.renderImageSettings();
          } else if ('color' === tab.name) {
            tabout = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, refresh && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, RenderTopSection(), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_10__["ColorPicker"], {
              color: _this2.state.color,
              onChangeComplete: function onChangeComplete(color) {
                return _this2(color);
              }
            })), !refresh && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, RenderTopSection(), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_10__["ColorPicker"], {
              color: _this2.state.color,
              onChangeComplete: function onChangeComplete(color) {
                return _this2.onChangeComplete(color);
              }
            })));
          }
        }

        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", null, tabout);
      })), 1 === tabs.length && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, refresh && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, RenderTopSection(), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_10__["ColorPicker"], {
        color: this.state.color,
        onChangeComplete: function onChangeComplete(color) {
          return _this2.onChangeComplete(color);
        }
      })), !refresh && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, RenderTopSection(), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_10__["ColorPicker"], {
        color: this.state.color,
        onChangeComplete: function onChangeComplete(color) {
          return _this2.onChangeComplete(color);
        }
      })))))) : null));
    }
  }, {
    key: "toggleClose",
    value: function toggleClose() {
      if (this.state.modalCanClose) {
        if (this.state.isVisible === true) {
          this.setState({
            isVisible: false
          });
        }
      }
    }
  }, {
    key: "onChangeState",
    value: function onChangeState(color, palette) {
      var newColor;

      if (palette) {
        newColor = palette;
      } else if (undefined !== color.rgb && undefined !== color.rgb.a && 1 !== color.rgb.a) {
        newColor = 'rgba(' + color.rgb.r + ',' + color.rgb.g + ',' + color.rgb.b + ',' + color.rgb.a + ')';
      } else {
        newColor = color.hex;
      }

      this.setState({
        color: newColor,
        isPalette: palette ? true : false
      });

      if (undefined !== this.props.onChange) {
        this.props.onChange(color, palette);
      }
    }
  }, {
    key: "onChangeGradientComplete",
    value: function onChangeGradientComplete(gradient) {
      this.setState({
        backgroundType: 'gradient'
      });
      this.props.onChangeComplete(gradient, 'gradient');
    }
  }, {
    key: "onChangeComplete",
    value: function onChangeComplete(color) {
      var newColor;

      if (color.rgb && color.rgb.a && 1 !== color.rgb.a) {
        newColor = 'rgba(' + color.rgb.r + ',' + color.rgb.g + ',' + color.rgb.b + ',' + color.rgb.a + ')';
      } else {
        newColor = color.hex;
      }

      this.setState({
        backgroundType: 'color'
      });
      this.setState({
        color: newColor
      });
      this.props.onChangeComplete(color);
    }
  }, {
    key: "onPaletteChangeComplete",
    value: function onPaletteChangeComplete(color) {
      this.setState({
        color: color
      });

      if (this.state.refresh === true) {
        this.setState({
          refresh: false
        });
      } else {
        this.setState({
          refresh: true
        });
      }

      this.props.onChangeComplete(color);
    }
  }, {
    key: "onSelectImage",
    value: function onSelectImage(media) {
      this.setState({
        modalCanClose: true
      });
      this.setState({
        backgroundType: 'image'
      });
      this.props.onSelectImage(media, 'image');
    }
  }, {
    key: "onRemoveImage",
    value: function onRemoveImage() {
      this.setState({
        modalCanClose: true
      });
      this.props.onSelectImage('');
    }
  }, {
    key: "open",
    value: function open(_open) {
      this.setState({
        modalCanClose: false
      });

      _open();
    }
  }, {
    key: "onChangeImageOptions",
    value: function onChangeImageOptions(tempKey, mainkey, value) {
      this.setState({
        backgroundType: 'image'
      });
      this.props.onChangeImageOptions(mainkey, value, 'image');
    }
  }, {
    key: "toggleMoreSettings",
    value: function toggleMoreSettings() {
      var parent = event.target.parentElement.parentElement;
      var trigger = parent.querySelector('.more-settings');
      var wrapper = parent.querySelector('.media-position-setting');
      var dataDirection = trigger.dataset.direction;
      var dataId = trigger.dataset.id;

      if ('down' === dataDirection) {
        trigger.setAttribute('data-direction', 'up');
        parent.querySelector('.message').innerHTML = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])("Less Settings");
        parent.querySelector('.icon').innerHTML = '↑';
      } else {
        trigger.setAttribute('data-direction', 'down');
        parent.querySelector('.message').innerHTML = Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])("More Settings");
        parent.querySelector('.icon').innerHTML = '↓';
      }

      if (wrapper.classList.contains('hide-settings')) {
        wrapper.classList.remove('hide-settings');
      } else {
        wrapper.classList.add('hide-settings');
      }
    }
  }, {
    key: "renderImageSettings",
    value: function renderImageSettings() {
      var _this3 = this;

      var dimensions = {
        width: 400,
        height: 100
      };
      var repeat = {
        'no-repeat': Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("svg", {
          viewBox: "0 0 16 16"
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("rect", {
          x: "6",
          y: "6",
          width: "4",
          height: "4"
        })),
        'repeat-x': Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("svg", {
          viewBox: "0 0 16 16"
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("rect", {
          y: "6",
          width: "4",
          height: "4"
        }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("rect", {
          x: "6",
          y: "6",
          width: "4",
          height: "4"
        }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("rect", {
          x: "12",
          y: "6",
          width: "4",
          height: "4"
        })),
        'repeat-y': Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("svg", {
          viewBox: "0 0 16 16"
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("rect", {
          x: "6",
          width: "4",
          height: "4"
        }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("rect", {
          x: "6",
          y: "6",
          width: "4",
          height: "4"
        }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("rect", {
          x: "6",
          y: "12",
          width: "4",
          height: "4"
        })),
        repeat: Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("svg", {
          viewBox: "0 0 16 16"
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("path", {
          d: "M0,0h4v4H0V0z M6,0h4v4H6V0z M12,0h4v4h-4V0z M0,6h4v4H0V6z M6,6h4v4H6V6z M12,6h4v4h-4V6z M0,12h4v4H0V12z M6,12h4v4H6V12zM12,12h4v4h-4V12z"
        }))
      };
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_media_utils__WEBPACK_IMPORTED_MODULE_11__["MediaUpload"], {
        title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])("Select Background Image", 'astra'),
        onSelect: function onSelect(media) {
          return _this3.onSelectImage(media);
        },
        allowedTypes: ["image"],
        value: this.props.media && this.props.media ? this.props.media : '',
        render: function render(_ref) {
          var open = _ref.open;
          return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, !_this3.props.media && !_this3.props.backgroundImage ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_10__["Button"], {
            className: "upload-button button-add-media",
            isDefault: true,
            onClick: function onClick() {
              return _this3.open(open);
            }
          }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])("Select Background Image", 'Kemet')) : Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", {
            className: "premium-image-actions"
          }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("button", {
            className: "premium-image-button",
            "aria-label": Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])("Edit"),
            onClick: function onClick(e) {
              return _this3.open(open);
            },
            role: "button"
          }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("span", {
            "aria-label": Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])("Edit"),
            className: "dashicons dashicons-edit-large"
          })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("button", {
            className: "premium-image-button",
            "aria-label": Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])("Remove"),
            onClick: _this3.onRemoveImage,
            role: "button"
          }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("span", {
            "aria-label": Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])("Close"),
            className: "dashicons dashicons-trash"
          }))));
        }
      }), (this.props.media || this.props.backgroundImage) && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(FocalPointPicker, {
        url: this.props.media.url ? this.props.media.url : this.props.backgroundImage,
        dimensions: dimensions,
        value: undefined !== this.props.backgroundPosition ? this.props.backgroundPosition : {
          x: 0.5,
          y: 0.5
        },
        onChange: function onChange(focalPoint) {
          return _this3.onChangeImageOptions('backgroundPosition', 'background-position', focalPoint);
        }
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", {
        className: "kmt-control"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("header", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("label", null, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Background Repeat'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("section", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("ul", {
        className: "kmt-radio-option kmt-buttons-group"
      }, Object.keys(repeat).map(function (item) {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("li", {
          isTertiary: true,
          className: "Reart",
          onClick: function onClick() {
            return _this3.onChangeImageOptions('backgroundRepeat', 'background-repeat', item);
          }
        }, repeat[item] && repeat[item]);
      })))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", {
        className: "kmt-control"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("header", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("label", null, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Background Size'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("section", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("ul", {
        className: "kmt-radio-option kmt-buttons-group"
      }, ["auto", "cover", "contain"].map(function (item) {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("li", {
          isTertiary: true,
          className: "Size",
          onClick: function onClick() {
            return _this3.onChangeImageOptions('backgroundSize', 'background-size', item);
          }
        }, item);
      })))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", {
        className: "kmt-control"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("header", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("label", null, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Background Attachment'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("section", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("ul", {
        className: "kmt-radio-option kmt-buttons-group"
      }, ["Fixed", "Scroll"].map(function (item) {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("li", {
          isTertiary: true,
          className: "Size",
          onClick: function onClick() {
            return _this3.onChangeImageOptions('backgroundAttachment', 'background-attachment', item);
          }
        }, item);
      }))))));
    }
  }]);

  return KemetColorPickerControl;
}(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Component"]);

KemetColorPickerControl.propTypes = {
  color: prop_types__WEBPACK_IMPORTED_MODULE_7___default.a.string,
  usePalette: prop_types__WEBPACK_IMPORTED_MODULE_7___default.a.bool,
  palette: prop_types__WEBPACK_IMPORTED_MODULE_7___default.a.string,
  presetColors: prop_types__WEBPACK_IMPORTED_MODULE_7___default.a.object,
  onChangeComplete: prop_types__WEBPACK_IMPORTED_MODULE_7___default.a.func,
  onPaletteChangeComplete: prop_types__WEBPACK_IMPORTED_MODULE_7___default.a.func,
  onChange: prop_types__WEBPACK_IMPORTED_MODULE_7___default.a.func,
  customizer: prop_types__WEBPACK_IMPORTED_MODULE_7___default.a.object
};
/* harmony default export */ __webpack_exports__["default"] = (KemetColorPickerControl);

/***/ }),

/***/ "./src/common/font-loader.js":
/*!***********************************!*\
  !*** ./src/common/font-loader.js ***!
  \***********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/assertThisInitialized */ "./node_modules/@babel/runtime/helpers/assertThisInitialized.js");
/* harmony import */ var _babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/inherits */ "./node_modules/@babel/runtime/helpers/inherits.js");
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @babel/runtime/helpers/possibleConstructorReturn */ "./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js");
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @babel/runtime/helpers/getPrototypeOf */ "./node_modules/@babel/runtime/helpers/getPrototypeOf.js");
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var webfontloader__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! webfontloader */ "./node_modules/webfontloader/webfontloader.js");
/* harmony import */ var webfontloader__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(webfontloader__WEBPACK_IMPORTED_MODULE_8__);








function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6___default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6___default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5___default()(this, result); }; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

if (kadencegooglefonts === undefined) {
  var kadencegooglefonts = [];
}

var Component = wp.element.Component;


var statuses = {
  inactive: 'inactive',
  active: 'active',
  loading: 'loading'
};

var noop = function noop() {};

var KadenceWebfontLoader = /*#__PURE__*/function (_Component) {
  _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4___default()(KadenceWebfontLoader, _Component);

  var _super = _createSuper(KadenceWebfontLoader);

  function KadenceWebfontLoader(props) {
    var _this;

    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default()(this, KadenceWebfontLoader);

    _this = _super.call(this, props);
    _this.handleLoading = _this.handleLoading.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.handleActive = _this.handleActive.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.addFont = _this.addFont.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.handleInactive = _this.handleInactive.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.loadFonts = _this.loadFonts.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.state = {
      status: undefined
    };
    return _this;
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default()(KadenceWebfontLoader, [{
    key: "addFont",
    value: function addFont(font) {
      if (!kadencegooglefonts.includes(font)) {
        kadencegooglefonts.push(font);
      }
    }
  }, {
    key: "handleLoading",
    value: function handleLoading() {
      this.setState({
        status: statuses.loading
      });
    }
  }, {
    key: "handleActive",
    value: function handleActive() {
      this.setState({
        status: statuses.active
      });
    }
  }, {
    key: "handleInactive",
    value: function handleInactive() {
      this.setState({
        status: statuses.inactive
      });
    }
  }, {
    key: "loadFonts",
    value: function loadFonts() {
      //if ( ! this.state.fonts.includes( this.props.config.google.families[ 0 ] ) ) {
      if (!kadencegooglefonts.includes(this.props.config.google.families[0])) {
        webfontloader__WEBPACK_IMPORTED_MODULE_8___default.a.load(_objectSpread(_objectSpread({}, this.props.config), {}, {
          loading: this.handleLoading,
          active: this.handleActive,
          inactive: this.handleInactive
        }));
        this.addFont(this.props.config.google.families[0]);
      }
    }
  }, {
    key: "componentDidMount",
    value: function componentDidMount() {
      this.loadFonts();
    }
  }, {
    key: "componentDidUpdate",
    value: function componentDidUpdate(prevProps, prevState) {
      var _this$props = this.props,
          onStatus = _this$props.onStatus,
          config = _this$props.config;

      if (prevState.status !== this.state.status) {
        onStatus(this.state.status);
      }

      if (prevProps.config !== config) {
        this.loadFonts();
      }
    }
  }, {
    key: "render",
    value: function render() {
      var children = this.props.children;
      return children || null;
    }
  }]);

  return KadenceWebfontLoader;
}(Component);

KadenceWebfontLoader.propTypes = {
  config: prop_types__WEBPACK_IMPORTED_MODULE_7___default.a.object.isRequired,
  children: prop_types__WEBPACK_IMPORTED_MODULE_7___default.a.element,
  onStatus: prop_types__WEBPACK_IMPORTED_MODULE_7___default.a.func.isRequired
};
KadenceWebfontLoader.defaultProps = {
  onStatus: noop
};
/* harmony default export */ __webpack_exports__["default"] = (KadenceWebfontLoader);

/***/ }),

/***/ "./src/common/responsive-helper.js":
/*!*****************************************!*\
  !*** ./src/common/responsive-helper.js ***!
  \*****************************************/
/*! exports provided: kemetGetResponsiveJs, kemetGetResponsiveIconJs, kemetGetResponsiveColorJs, kemetGetResponsiveBgJs, KemetGetResponsiveColorGroupJs */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "kemetGetResponsiveJs", function() { return kemetGetResponsiveJs; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "kemetGetResponsiveIconJs", function() { return kemetGetResponsiveIconJs; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "kemetGetResponsiveColorJs", function() { return kemetGetResponsiveColorJs; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "kemetGetResponsiveBgJs", function() { return kemetGetResponsiveBgJs; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "KemetGetResponsiveColorGroupJs", function() { return KemetGetResponsiveColorGroupJs; });
function kemetGetResponsiveJs(control) {
  'use strict';

  var device = jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device');
  jQuery('.wrapper .input-field-wrapper').removeClass('active');
  jQuery('.wrapper .input-field-wrapper.' + device).addClass('active');
  jQuery('.wrapper .kmt-responsive-control-btns li').removeClass('active');
  jQuery('.wrapper .kmt-responsive-control-btns li.' + device).addClass('active');
  jQuery('.wp-full-overlay-footer .devices button').on('click', function () {
    var device = jQuery(this).attr('data-device');
    jQuery('.customize-control-kmt-responsive-slider .input-field-wrapper, .customize-control .kmt-responsive-slider-btns > li').removeClass('active');
    jQuery('.customize-control-kmt-responsive-slider .input-field-wrapper.' + device + ', .customize-control .kmt-responsive-slider-btns > li.' + device).addClass('active');
  });
  control.container.find('.kmt-responsive-control-btns button i').on('click', function (event) {
    event.preventDefault();
    var device = jQuery(this).parent('button').attr('data-device');

    if ('desktop' == device) {
      device = 'tablet';
    } else if ('tablet' == device) {
      device = 'mobile';
    } else {
      device = 'desktop';
    }

    jQuery('.wp-full-overlay-footer .devices button[data-device="' + device + '"]').trigger('click');
  });
}
function kemetGetResponsiveIconJs(control) {
  'use strict';

  var device = jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device');
  jQuery('.customize-control-kmt-responsive-icon-select .responsive-icon-select').removeClass('active');
  jQuery('.customize-control-kmt-responsive-icon-select .responsive-icon-select.' + device).addClass('active');
  jQuery('.customize-control .kmt-responsive-icon-select-btns li').removeClass('active');
  jQuery('.customize-control .kmt-responsive-icon-select-btns li.' + device).addClass('active');
  jQuery('.wp-full-overlay-footer .devices button').on('click', function () {
    var device = jQuery(this).attr('data-device');
    jQuery('.customize-control-kmt-responsive-icon-select .responsive-icon-select, .customize-control .kmt-spacing-responsive-btns > li').removeClass('active');
    jQuery('.customize-control-kmt-responsive-icon-select .responsive-icon-select.' + device + ', .customize-control .kmt-spacing-responsive-btns > li.' + device).addClass('active');
  });
  control.container.find('.kmt-responsive-icon-select-btns li button').on('click', function (event) {
    event.preventDefault();
    var device = jQuery(this).attr('data-device');

    if ('desktop' == device) {
      device = 'tablet';
    } else if ('tablet' == device) {
      device = 'mobile';
    } else {
      device = 'desktop';
    }

    jQuery('.wp-full-overlay-footer .devices button[data-device="' + device + '"]').trigger('click');
  });
}
function kemetGetResponsiveColorJs(control, child_control_name) {
  'use strict';

  jQuery('html').addClass('responsive-background-color-ready');
  var device = jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device');
  jQuery('.customize-control-kmt-responsive-color .customize-control-content .kmt-color-picker-alpha').removeClass('active');
  jQuery('.customize-control-kmt-responsive-color .customize-control-content .kmt-color-picker-alpha.' + device).addClass('active');
  jQuery('.customize-control-kmt-responsive-color .kmt-color-responsive-btns li').removeClass('active');
  jQuery('.customize-control-kmt-responsive-color .kmt-color-responsive-btns li.' + device).addClass('active');
  jQuery('.wp-full-overlay-footer .devices button').on('click', function () {
    var device = jQuery(this).attr('data-device');
    jQuery('.customize-control-kmt-responsive-color .customize-control-content .kmt-color-picker-alpha').removeClass('active');
    jQuery('.customize-control-kmt-responsive-color .customize-control-content .kmt-responsive-color.' + device).addClass('active');
    jQuery('.customize-control-kmt-responsive-color .kmt-color-responsive-btns li').removeClass('active');
    jQuery('.customize-control-kmt-responsive-color .kmt-color-responsive-btns li.' + device).addClass('active');
  });
  control.container.find('.kmt-color-responsive-btns button').on('click', function (event) {
    event.preventDefault();
    var device = jQuery(this).attr('data-device');

    if ('desktop' == device) {
      device = 'tablet';
    } else if ('tablet' == device) {
      device = 'mobile';
    } else {
      device = 'desktop';
    }

    jQuery('.wp-full-overlay-footer .devices button[data-device="' + device + '"]').trigger('click');
  });

  if (child_control_name) {
    jQuery(document).mouseup(function (e) {
      var container = jQuery(child_control_name);
      var resColorWrap = container.find('.customize-control-content'); // If the target of the click isn't the container nor a descendant of the container.

      if (!resColorWrap.is(e.target) && resColorWrap.has(e.target).length === 0) {
        container.find('.components-button.kemet-color-icon-indicate.open').click();
      }
    });
  }
}
function kemetGetResponsiveBgJs(control, child_control_name) {
  'use strict';

  jQuery('html').addClass('responsive-background-img-ready');
  var device = jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device');
  jQuery('.customize-control-kmt-responsive-background .customize-control-content .background-container').removeClass('active');
  jQuery('.customize-control-kmt-responsive-background .customize-control-content .background-container.' + device).addClass('active');
  jQuery('.customize-control-kmt-responsive-background .kmt-responsive-btns li').removeClass('active');
  jQuery('.customize-control-kmt-responsive-background .kmt-responsive-btns li.' + device).addClass('active');
  jQuery('.wp-full-overlay-footer .devices button').on('click', function () {
    var device = jQuery(this).attr('data-device');
    jQuery('.customize-control-kmt-responsive-background .customize-control-content .background-container').removeClass('active');
    jQuery('.customize-control-kmt-responsive-background .customize-control-content .background-container.' + device).addClass('active');
    jQuery('.customize-control-kmt-responsive-background .kmt-responsive-btns li').removeClass('active');
    jQuery('.customize-control-kmt-responsive-background .kmt-responsive-btns li.' + device).addClass('active');
  });
  control.container.find('.kmt-responsive-btns button').on('click', function (event) {
    event.preventDefault();
    var device = jQuery(this).attr('data-device');

    if ('desktop' == device) {
      device = 'tablet';
    } else if ('tablet' == device) {
      device = 'mobile';
    } else {
      device = 'desktop';
    }

    jQuery('.wp-full-overlay-footer .devices button[data-device="' + device + '"]').trigger('click');
  });

  if (child_control_name) {
    jQuery(document).mouseup(function (e) {
      var container = jQuery(child_control_name);
      var bgWrap = container.find('.background-wrapper'); // If the target of the click isn't the container nor a descendant of the container.

      if (!bgWrap.is(e.target) && bgWrap.has(e.target).length === 0) {
        container.find('.components-button.kemet-color-icon-indicate.open').click();
      }
    });
  }
}
function KemetGetResponsiveColorGroupJs(control, child_control_name) {
  'use strict';

  var device = jQuery('.wp-full-overlay-footer .devices button.active').attr('data-device');
  jQuery('.customize-control-kmt-color-group .kmt-field-color-group-wrap .kmt-color-group-responsive-wrap').removeClass('active');
  jQuery('.customize-control-kmt-color-group .kmt-field-color-group-wrap .kmt-color-group-responsive-wrap.' + device).addClass('active');
  jQuery('.customize-control-kmt-color-group .kmt-responsive-btns li').removeClass('active');
  jQuery('.customize-control-kmt-color-group .kmt-responsive-btns li.' + device).addClass('active');
  jQuery('.wp-full-overlay-footer .devices button').on('click', function () {
    var device = jQuery(this).attr('data-device');
    jQuery('.customize-control-kmt-color-group .kmt-field-color-group-wrap .kmt-color-group-responsive-wrap').removeClass('active');
    jQuery('.customize-control-kmt-color-group .kmt-field-color-group-wrap .kmt-color-group-responsive-wrap.' + device).addClass('active');
    jQuery('.customize-control-kmt-color-group .kmt-responsive-btns li').removeClass('active');
    jQuery('.customize-control-kmt-color-group .kmt-responsive-btns li.' + device).addClass('active');
  });
  control.container.find('.kmt-responsive-btns button').on('click', function (event) {
    event.preventDefault();
    var device = jQuery(this).attr('data-device');

    if ('desktop' == device) {
      device = 'tablet';
    } else if ('tablet' == device) {
      device = 'mobile';
    } else {
      device = 'desktop';
    }

    jQuery('.wp-full-overlay-footer .devices button[data-device="' + device + '"]').trigger('click');
  });

  if (child_control_name) {
    jQuery(document).mouseup(function (e) {
      var container = jQuery(child_control_name);
      var bgWrap = container.find('.background-wrapper'); // If the target of the click isn't the container nor a descendant of the container.

      if (!bgWrap.is(e.target) && bgWrap.has(e.target).length === 0) {
        container.find('.components-button.kemet-color-icon-indicate.open').click();
      }
    });
  }
}

/***/ }),

/***/ "./src/common/responsive.js":
/*!**********************************!*\
  !*** ./src/common/responsive.js ***!
  \**********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/inherits */ "./node_modules/@babel/runtime/helpers/inherits.js");
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/possibleConstructorReturn */ "./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js");
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/getPrototypeOf */ "./node_modules/@babel/runtime/helpers/getPrototypeOf.js");
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_7__);







function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4___default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4___default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3___default()(this, result); }; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }



var __ = wp.i18n.__;

var Responsive = /*#__PURE__*/function (_Component) {
  _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2___default()(Responsive, _Component);

  var _super = _createSuper(Responsive);

  function Responsive(props) {
    var _this;

    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default()(this, Responsive);

    _this = _super.call(this, props);
    _this.state = {
      view: 'desktop'
    };

    _this.linkResponsiveButtons();

    return _this;
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default()(Responsive, [{
    key: "render",
    value: function render() {
      var label = this.props.label;
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["Fragment"], null, label ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("span", {
        className: "customize-control-title"
      }, label) : null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("ul", {
        className: "kmt-responsive-control-btns kmt-responsive-slider-btns"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("li", {
        className: "desktop active"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("button", {
        type: "button",
        className: "preview-desktop active",
        "data-device": "desktop"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("i", {
        class: "dashicons dashicons-desktop",
        onClick: function onClick() {
          var event = new CustomEvent('KemetChangedRepsonsivePreview', {
            'detail': 'tablet'
          });
          document.dispatchEvent(event);
        }
      }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("li", {
        class: "tablet "
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("button", {
        type: "button",
        className: "preview-tablet ",
        "data-device": "tablet"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("i", {
        class: "dashicons dashicons-tablet",
        onClick: function onClick() {
          var event = new CustomEvent('KemetChangedRepsonsivePreview', {
            'detail': 'mobile'
          });
          document.dispatchEvent(event);
        }
      }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("li", {
        class: "mobile"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("button", {
        type: "button",
        className: "preview-mobile",
        "data-device": "mobile"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("i", {
        className: "dashicons dashicons-smartphone",
        onClick: function onClick() {
          var event = new CustomEvent('KemetChangedRepsonsivePreview', {
            'detail': 'desktop'
          });
          document.dispatchEvent(event);
        }
      })))), this.props.children);
    }
  }, {
    key: "changeViewType",
    value: function changeViewType(device) {
      this.setState({
        view: device
      });
      wp.customize.previewedDevice(device);
      this.props.onChange(device);
    }
  }, {
    key: "linkResponsiveButtons",
    value: function linkResponsiveButtons() {
      var self = this;
      document.addEventListener('KemetChangedRepsonsivePreview', function (e) {
        self.changeViewType(e.detail);
      });
    }
  }]);

  return Responsive;
}(react__WEBPACK_IMPORTED_MODULE_6__["Component"]);

Responsive.propTypes = {
  onChange: prop_types__WEBPACK_IMPORTED_MODULE_7___default.a.func,
  controlLabel: prop_types__WEBPACK_IMPORTED_MODULE_7___default.a.string
};
Responsive.defaultProps = {
  tooltip: true
};
/* harmony default export */ __webpack_exports__["default"] = (Responsive);

/***/ }),

/***/ "./src/customizer.js":
/*!***************************!*\
  !*** ./src/customizer.js ***!
  \***************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _options_options_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./options/options-component */ "./src/options/options-component.js");


(function ($, api) {
  var $window = $(window),
      $body = $("body");
  var expandedPanel = "";
  api.bind("ready", function () {
    // Set handler when custom responsive toggle is clicked.
    $("#customize-theme-controls").on("click", ".kmt-build-tabs-button", function (e) {
      e.preventDefault();
      var device = $(this).data("device");
      api.previewedDevice.set(device);
      jQuery('.wp-full-overlay-footer .devices button[data-device="' + device + '"]').trigger('click');
    }); // Set all custom responsive toggles and fieldsets.

    var setBuilderResponsiveDisplay = function setBuilderResponsiveDisplay() {
      var device = api.previewedDevice.get(),
          $tabs = $(".kmt-build-tabs-button.nav-tab");
      $tabs.removeClass("nav-tab-active").filter(".preview-" + device).addClass("nav-tab-active");
    }; // Refresh all responsive elements when previewedDevice is changed.


    api.previewedDevice.bind(setBuilderResponsiveDisplay); // Refresh all responsive elements when any section is expanded.
    // This is required to set responsive elements on newly added controls inside the section.

    api.section.each(function (section) {
      section.expanded.bind(setBuilderResponsiveDisplay);
    });
    /**
     * Resize Preview Frame when show / hide Builder.
     */

    var resizePreviewer = function resizePreviewer() {
      var section = $(".control-section.kmt-header-builder-active");
      var footer = $(".control-section.kmt-footer-builder-active");

      if ($body.hasClass("kmt-header-builder-is-active") || $body.hasClass("kmt-footer-builder-is-active")) {
        if ($body.hasClass("kmt-footer-builder-is-active") && 0 < footer.length && !footer.hasClass("kmt-builder-hide")) {
          api.previewer.container.css("bottom", footer.outerHeight() + "px");
        } else if ($body.hasClass("kmt-header-builder-is-active") && 0 < section.length && !section.hasClass("kmt-builder-hide")) {
          api.previewer.container.css({
            bottom: section.outerHeight() + "px"
          });
        } else {
          api.previewer.container.css("bottom", "");
        }
      } else {
        api.previewer.container.css("bottom", "");
      }
    };

    $window.on("resize", resizePreviewer);
    api.previewedDevice.bind(function (device) {
      api.previewer.container.css({
        bottom: "0px"
      });
      resizePreviewer();
    });
    /**
     * Init Kemet Header & Footer Builder
     */

    var initKmtBuilderPanel = function initKmtBuilderPanel(panel) {
      var builderType = panel.id.includes("-header-") ? "header" : "footer";
      var section = api.section("section-" + builderType + "-builder");

      if (undefined !== section) {
        var $section = section.contentContainer,
            section_layout = api.section("section-" + builderType + "-builder-layout");
        panel.expanded.bind(function (isExpanded) {
          var options = $.merge(section.controls(), section_layout.controls());

          if (isExpanded) {
            _.each(options, function (control) {
              document.dispatchEvent(new CustomEvent("kmtExpandedBuilder", {
                detail: {
                  control: control,
                  isExpanded: true
                }
              }));
            });
          } else {
            _.each(options, function (control) {
              document.dispatchEvent(new CustomEvent("kmtExpandedBuilder", {
                detail: {
                  control: control,
                  isExpanded: false
                }
              }));
            });
          }

          Promise.all([_.each(section.controls(), function (control) {
            if ("resolved" === control.deferred.embedded.state()) {
              return;
            }

            if (isExpanded) {
              $body.addClass("kmt-" + builderType + "-builder-is-active");
              $section.addClass("kmt-" + builderType + "-builder-active");
              $section.css("display", "none").height();
              $section.css("display", "block");
            } else {
              $body.removeClass("kmt-" + builderType + "-builder-is-active");
              $section.removeClass("kmt-" + builderType + "-builder-active");
            }

            control.renderContent();
            control.deferred.embedded.resolve(); // This triggers control.ready().
            // Fire event after control is initialized.

            control.container.trigger("init");
          }), _.each(section_layout.controls(), function (control) {
            if ("resolved" === control.deferred.embedded.state()) {
              return;
            }

            control.renderContent();
            control.deferred.embedded.resolve(); // This triggers control.ready().
            // Fire event after control is initialized.

            control.container.trigger("init");
          })]).then(function () {
            resizePreviewer();
          });

          if (isExpanded) {
            expandedPanel = panel.id;
            $body.addClass("kmt-" + builderType + "-builder-is-active");
            $section.addClass("kmt-" + builderType + "-builder-active");
            $("#sub-accordion-panel-" + expandedPanel + " li.control-section").hide();
          } else {
            $body.removeClass("kmt-" + builderType + "-builder-is-active");
            $section.removeClass("kmt-" + builderType + "-builder-active");
          }
        });
      }

      $section.on("click", ".kmt-builder-tab-toggle", function (e) {
        e.preventDefault();
        api.previewer.container.css({
          bottom: "0"
        });
        setTimeout(function () {
          $section.toggleClass("kmt-builder-hide");
          resizePreviewer();
        }, 120);
      });
    };

    api.panel("panel-header-builder-group", initKmtBuilderPanel);
    api.panel("panel-footer-builder-group", initKmtBuilderPanel);
  }); // Default contexts

  if (KemetCustomizerData && KemetCustomizerData.contexts) {
    var context = KemetCustomizerData.contexts;
    var mobileLogo = Object(_options_options_component__WEBPACK_IMPORTED_MODULE_0__["getSettingId"])('kmt-header-mobile-logo');

    var setupControl = function setupControl(element) {
      var rules = context[element.id];

      var setActiveState = function setActiveState() {
        if (Object(_options_options_component__WEBPACK_IMPORTED_MODULE_0__["isDisplay"])(rules)) {
          element.container.show();
        } else {
          element.container.hide();
        }
      };

      _.each(rules, function (rule, ruleKey) {
        var setting = Object(_options_options_component__WEBPACK_IMPORTED_MODULE_0__["getSetting"])(rule.setting);

        if (undefined != setting) {
          setting.bind(setActiveState);
        }
      });

      element.active.validate = Object(_options_options_component__WEBPACK_IMPORTED_MODULE_0__["isDisplay"])(rules);
      setActiveState();
    };

    api.control(mobileLogo, setupControl);
  }
})(jQuery, wp.customize);

/***/ }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _customizer__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./customizer */ "./src/customizer.js");
/* harmony import */ var _options_control__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./options/control */ "./src/options/control.js");


window.addEventListener('load', function () {
  var deviceButtons = document.querySelector('#customize-footer-actions .devices');
  deviceButtons.addEventListener('click', function (e) {
    var event = new CustomEvent('KemetChangedRepsonsivePreview', {
      'detail': e.target.dataset.device
    });
    document.dispatchEvent(event);
  });
});

/***/ }),

/***/ "./src/kmt-controls/available.js":
/*!***************************************!*\
  !*** ./src/kmt-controls/available.js ***!
  \***************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var react_sortablejs__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! react-sortablejs */ "./node_modules/react-sortablejs/dist/index.js");
/* harmony import */ var react_sortablejs__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(react_sortablejs__WEBPACK_IMPORTED_MODULE_5__);




function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1___default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }




var __ = wp.i18n.__;
var _wp$components = wp.components,
    Dashicon = _wp$components.Dashicon,
    Button = _wp$components.Button;

var AvailableComponent = function AvailableComponent(props) {
  var defaultParams = {};
  var controlParams = props.params.input_attrs ? _objectSpread(_objectSpread({}, defaultParams), props.params.input_attrs) : defaultParams;
  var builderControlId = "kemet-settings[" + controlParams.group + "]";
  var choices = KemetCustomizerData && KemetCustomizerData.choices && KemetCustomizerData.choices[builderControlId] ? KemetCustomizerData.choices[builderControlId] : [];
  var usedItems = wp.customize(builderControlId).get();

  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_4__["useState"])(usedItems),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState, 2),
      items = _useState2[0],
      setItems = _useState2[1];

  var onDrogStart = function onDrogStart() {
    var dragZones = document.querySelectorAll(".kmt-builder-area");

    for (var i = 0; i < dragZones.length; i++) {
      dragZones[i].classList.add("kmt-dragging-dropzones");
    }
  };

  var onDragEnd = function onDragEnd() {
    var dragZones = document.querySelectorAll(".kmt-builder-area");

    for (var i = 0; i < dragZones.length; i++) {
      dragZones[i].classList.remove("kmt-dragging-dropzones");
    }
  };

  var onUpdate = function onUpdate() {
    var newItems = wp.customize(builderControlId).get();
    setItems(newItems);
  };

  var onDragStop = function onDragStop(items) {
    if (items.length != null && items.length === 0) {
      onUpdate();
    }
  };

  var linkRemovingItem = function linkRemovingItem() {
    document.addEventListener("KemetBuilderRemovedBuilderItem", function (e) {
      if (e.detail === controlParams.group) {
        onUpdate();
      }
    });
  };

  linkRemovingItem();

  var focusSection = function focusSection(section) {
    if (undefined !== wp.customize.section(section)) {
      wp.customize.section(section).focus();
    }
  };

  var renderItems = function renderItems(item, type) {
    var available = true;
    controlParams.zones.map(function (zone) {
      Object.keys(items[zone]).map(function (row) {
        if (items[zone][row].includes(item)) {
          available = false;
        }
      });
    });
    var list = [{
      id: item
    }];
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(react__WEBPACK_IMPORTED_MODULE_4__["Fragment"], null, !available && type == "used" && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
      className: "kmt-builder-item-start"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(Button, {
      className: "kmt-builder-item",
      "data-id": item,
      onClick: function onClick() {
        return focusSection(choices[item].section);
      },
      "data-section": choices[item] && choices[item].section ? choices[item].section : "",
      key: item
    }, choices[item] && choices[item].name ? choices[item].name : "", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
      className: "kmt-builder-item-icon"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(Dashicon, {
      icon: "arrow-right-alt2"
    })))), available && type == "available" && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(react_sortablejs__WEBPACK_IMPORTED_MODULE_5__["ReactSortable"], {
      animation: 100,
      className: "kmt-builder-item-start kmt-move-item",
      onStart: function onStart() {
        return onDrogStart();
      },
      setList: function setList(newItems) {
        return onDragStop(newItems);
      },
      onEnd: function onEnd() {
        return onDragEnd();
      },
      group: {
        name: controlParams.group,
        put: false
      },
      list: list
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
      className: "kmt-builder-item",
      key: item
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
      className: "kmt-builder-item-icon kmt-move-icon"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(Dashicon, {
      icon: "move"
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
      className: "kmt-builder-item-text"
    }, undefined !== choices[item] && undefined !== choices[item].name ? choices[item].name : ""))));
  };

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
    className: "kmt-control-field kmt-available-items"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
    className: "kmt-used-items-container"
  }, Object.keys(choices).map(function (item) {
    return renderItems(item, "used");
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
    className: "kmt-available-items-title"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
    className: "customize-control-title"
  }, __("Available Items", "kemet"))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
    className: "kmt-available-items-container"
  }, Object.keys(choices).map(function (item) {
    return renderItems(item, "available");
  })));
};

AvailableComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_3___default.a.object.isRequired,
  customizer: prop_types__WEBPACK_IMPORTED_MODULE_3___default.a.func.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(AvailableComponent));

/***/ }),

/***/ "./src/kmt-controls/background.js":
/*!****************************************!*\
  !*** ./src/kmt-controls/background.js ***!
  \****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _common_color__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../common/color */ "./src/common/color.js");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_7__);




function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1___default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }







var BackgroundComponent = function BackgroundComponent(props) {
  var value = props.control.get();
  var defaultValue = {
    "background-attachment": '',
    "background-color": '',
    "background-image": '',
    "background-media": '',
    "background-position": '',
    "background-repeat": '',
    "background-size": '',
    "background-type": ""
  };
  var ResDefaultParam = {
    desktop: {
      "background-attachment": '',
      "background-color": '',
      "background-image": '',
      "background-media": '',
      "background-position": '',
      "background-repeat": '',
      "background-size": '',
      "background-type": ""
    },
    tablet: {
      "background-attachment": '',
      "background-color": '',
      "background-image": '',
      "background-media": '',
      "background-position": '',
      "background-repeat": '',
      "background-size": '',
      "background-type": ""
    },
    mobile: {
      "background-attachment": '',
      "background-color": '',
      "background-image": '',
      "background-media": '',
      "background-position": '',
      "background-repeat": '',
      "background-size": '',
      "background-type": ""
    }
  };
  var defaultValues = responsive ? ResDefaultParam : defaultValue;
  var defaultVals = props.control.params.default ? _objectSpread(_objectSpread({}, defaultValues), props.control.params.default) : defaultValues;
  value = value ? _objectSpread(_objectSpread({}, defaultVals), value) : defaultVals;

  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_4__["useState"])(value),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState, 2),
      props_value = _useState2[0],
      setPropsValue = _useState2[1];

  console.log(props_value);

  var renderReset = function renderReset() {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
      className: "customize-control-title"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
      className: "kmt-color-btn-reset-wrap"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("button", {
      className: "kmt-reset-btn components-button components-circular-option-picker__clear is-secondary is-small",
      disabled: JSON.stringify(props_value) === JSON.stringify(props.control.params.default),
      onClick: function onClick(e) {
        e.preventDefault();
        var value = JSON.parse(JSON.stringify(props.control.params.default));

        if (undefined !== value && '' !== value) {
          if (undefined === value['background-color'] || '' === value['background-color']) {
            value['background-color'] = '';
          }

          if (undefined === value['background-image'] || '' === value['background-image']) {
            value['background-image'] = '';
          }

          if (undefined === value['background-media'] || '' === value['background-media']) {
            value['background-media'] = '';
          }
        }

        props.control.setting.set(value);
        setPropsValue(value);
      }
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Dashicon"], {
      icon: "image-rotate"
    }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("label", null, labelHtml, descriptionHtml));
  };

  var _onSelectImage = function onSelectImage(media, backgroundType) {
    var obj = _objectSpread({}, props_value);

    obj['background-media'] = media.id;
    obj['background-image'] = media.url;
    obj['background-type'] = backgroundType;
    props.control.setting.set(obj);
    setPropsValue(obj);
  };

  var _onChangeImageOptions = function onChangeImageOptions(mainKey, value, backgroundType) {
    var obj = _objectSpread({}, props_value);

    obj[mainKey] = value;
    obj['background-type'] = backgroundType;
    props.control.setting.set(obj);
    setPropsValue(obj);
  };

  var renderSettings = function renderSettings() {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_common_color__WEBPACK_IMPORTED_MODULE_6__["default"], {
      color: undefined !== props_value['background-color'] && props_value['background-color'] ? props_value['background-color'] : '',
      onChangeComplete: function onChangeComplete(color, backgroundType) {
        return handleChangeComplete(color, backgroundType);
      },
      media: undefined !== props_value['background-media'] && props_value['background-media'] ? props_value['background-media'] : '',
      backgroundImage: undefined !== props_value['background-image'] && props_value['background-image'] ? props_value['background-image'] : '',
      backgroundAttachment: undefined !== props_value['background-attachment'] && props_value['background-attachment'] ? props_value['background-attachment'] : '',
      backgroundPosition: undefined !== props_value['background-position'] && props_value['background-position'] ? props_value['background-position'] : '',
      backgroundRepeat: undefined !== props_value['background-repeat'] && props_value['background-repeat'] ? props_value['background-repeat'] : '',
      backgroundSize: undefined !== props_value['background-size'] && props_value['background-size'] ? props_value['background-size'] : '',
      onSelectImage: function onSelectImage(media, backgroundType) {
        return _onSelectImage(media, backgroundType);
      },
      onChangeImageOptions: function onChangeImageOptions(mainKey, value, backgroundType) {
        return _onChangeImageOptions(mainKey, value, backgroundType);
      },
      backgroundType: undefined !== props_value['background-type'] && props_value['background-type'] ? props_value['background-type'] : 'color',
      allowGradient: true,
      allowImage: true
    }));
  };

  var handleChangeComplete = function handleChangeComplete(color, backgroundType) {
    var value = '';

    if (color) {
      if (typeof color === 'string' || color instanceof String) {
        value = color;
      } else if (undefined !== color.rgb && undefined !== color.rgb.a && 1 !== color.rgb.a) {
        value = "rgba(".concat(color.rgb.r, ",").concat(color.rgb.g, ",").concat(color.rgb.b, ",").concat(color.rgb.a, ")");
      } else {
        value = color.hex;
      }
    }

    var obj = _objectSpread({}, props_value);

    obj['background-color'] = value;
    obj['background-type'] = backgroundType;
    props.control.setting.set(obj);
    setPropsValue(obj);
  };

  var _props$control$params = props.control.params,
      label = _props$control$params.label,
      description = _props$control$params.description;
  var labelHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
    className: "customize-control-title"
  }, label ? label : Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_7__["__"])('Background'));
  var descriptionHtml = description ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
    className: "description customize-control-description"
  }, description) : null;
  var inputHtml = null;
  inputHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
    className: "background-container"
  }, renderReset(), renderSettings());
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
    className: "customize-control-content"
  }, inputHtml));
};

BackgroundComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_3___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(BackgroundComponent));

/***/ }),

/***/ "./src/kmt-controls/builder-tabs.js":
/*!******************************************!*\
  !*** ./src/kmt-controls/builder-tabs.js ***!
  \******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_2__);



var Dashicon = wp.components.Dashicon;
var __ = wp.i18n.__;

var BuilderTabs = function BuilderTabs(_ref) {
  var control = _ref.control;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(react__WEBPACK_IMPORTED_MODULE_2__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "kmt-control-tabs kmt-control-tabs-responsive"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "kmt-build-tabs"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("a", {
    href: "#",
    className: "nav-tab preview-desktop kmt-build-tabs-button nav-tab-active",
    "data-device": "desktop"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
    className: "dashicons dashicons-desktop"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", null, __("Desktop", "kemet"))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("a", {
    href: "#",
    className: "nav-tab preview-tablet preview-mobile kmt-build-tabs-button",
    "data-device": "tablet"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
    className: "dashicons dashicons-smartphone"
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", null, __("Tablet / Mobile", "kemet")))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
    className: "button button-secondary kmt-builder-hide-button kmt-builder-tab-toggle"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Dashicon, {
    icon: "no"
  }), __("Hide", "kemet")), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
    className: "button button-secondary kmt-builder-show-button kmt-builder-tab-toggle"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Dashicon, {
    icon: "edit"
  }), __("Show Builder", "kemet"))));
};

/* harmony default export */ __webpack_exports__["default"] = (React.memo(BuilderTabs));

/***/ }),

/***/ "./src/kmt-controls/color.js":
/*!***********************************!*\
  !*** ./src/kmt-controls/color.js ***!
  \***********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _common_color__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../common/color */ "./src/common/color.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _common_responsive__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../common/responsive */ "./src/common/responsive.js");




function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }





var __ = wp.i18n.__;

var ColorComponent = function ColorComponent(props) {
  var value = props.control.get();
  var responsiveBaseDefault = {
    'desktop': {},
    'tablet': {},
    'mobile': {}
  };
  var _props$params = props.params,
      pickers = _props$params.pickers,
      responsive = _props$params.responsive;
  var baseDefault = responsive ? responsiveBaseDefault : {};
  pickers.map(function (_ref) {
    var id = _ref.id;

    if (responsive) {
      baseDefault['desktop'][id] = '';
      baseDefault['tablet'][id] = '';
      baseDefault['mobile'][id] = '';
    } else {
      baseDefault[id] = '';
    }
  });
  baseDefault = props.params.default ? props.params.default : baseDefault;
  var defaultValue = props.params.default ? props.params.default : baseDefault;
  value = value ? value : defaultValue;

  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_5__["useState"])(value),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_useState, 2),
      state = _useState2[0],
      setState = _useState2[1];

  var _useState3 = Object(react__WEBPACK_IMPORTED_MODULE_5__["useState"])('desktop'),
      _useState4 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_useState3, 2),
      device = _useState4[0],
      setDevice = _useState4[1];

  var responsiveHtml = null;
  var optionsHtml = null;
  var innerOptionsHtml = null;
  Object(react__WEBPACK_IMPORTED_MODULE_5__["useEffect"])(function () {
    // If settings are changed externally.
    if (state.value !== value) {
      setState(value);
    }
  }, []);

  var updateValues = function updateValues(value) {
    var UpdatedState = _objectSpread({}, state);

    if (responsive) {
      UpdatedState[device] = value;
    } else {
      UpdatedState = value;
    }

    props.onChange(props.id, {});
    props.onChange(props.id, UpdatedState);
    setState(UpdatedState);
  };

  var renderOperationButtons = function renderOperationButtons() {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
      className: "kmt-color-btn-reset-wrap"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("button", {
      className: "kmt-reset-btn components-button components-circular-option-picker__clear is-secondary is-small",
      disabled: JSON.stringify(state) === JSON.stringify(defaultValue),
      onClick: function onClick(e) {
        e.preventDefault();
        var value = responsive ? JSON.parse(JSON.stringify(defaultValue[device])) : JSON.parse(JSON.stringify(defaultValue));

        if (undefined === value || '' === value) {
          value = 'unset';
        }

        updateValues(value);
      }
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
      className: "dashicons dashicons-image-rotate"
    }))));
  };

  var handleChangeComplete = function handleChangeComplete(color, id) {
    var value = responsive ? state[device] : state;

    if (typeof color === 'string') {
      value["".concat(id)] = color;
    } else if (undefined !== color.rgb && undefined !== color.rgb.a && 1 !== color.rgb.a) {
      value["".concat(id)] = "rgba(".concat(color.rgb.r, ",").concat(color.rgb.g, ",").concat(color.rgb.b, ",").concat(color.rgb.a, ")");
    } else {
      value["".concat(id)] = color.hex;
    }

    updateValues(value);
  };

  if (responsive) {
    responsiveHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_common_responsive__WEBPACK_IMPORTED_MODULE_6__["default"], {
      onChange: function onChange(currentDevice) {
        return setDevice(currentDevice);
      }
    });
  }

  var renderInputHtml = function renderInputHtml(device) {
    innerOptionsHtml = Object.entries(pickers).map(function (_ref2) {
      var _ref3 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_ref2, 2),
          key = _ref3[0],
          value = _ref3[1];

      if (responsive) {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_common_color__WEBPACK_IMPORTED_MODULE_4__["default"], {
          text: value["title"],
          color: state[device][value["id"]],
          onChangeComplete: function onChangeComplete(color, backgroundType) {
            return handleChangeComplete(color, value["id"]);
          },
          backgroundType: 'color',
          allowGradient: false,
          allowImage: false
        });
      } else {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_common_color__WEBPACK_IMPORTED_MODULE_4__["default"], {
          text: value["title"],
          color: state[value["id"]],
          onChangeComplete: function onChangeComplete(color, backgroundType) {
            return handleChangeComplete(color, value["id"]);
          },
          backgroundType: 'color',
          allowGradient: false,
          allowImage: false
        });
      }
    });
    return innerOptionsHtml;
  };

  if (responsive) {
    optionsHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["Fragment"], null, renderInputHtml(device, 'active'));
  } else {
    optionsHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["Fragment"], null, renderInputHtml(''));
  }

  var _props$params2 = props.params,
      label = _props$params2.label,
      description = _props$params2.description;
  var labelHtml = label ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
    className: "customize-control-title"
  }, label) : null;
  var descriptionHtml = description !== '' && description ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
    className: "description customize-control-description"
  }, " ", description) : null;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
    className: "kmt-control-wrap kmt-color-control-wrap"
  }, renderOperationButtons(), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
    className: "kmt-color-container"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("label", null, labelHtml, descriptionHtml, responsiveHtml), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
    className: "kmt-color-picker-container"
  }, optionsHtml)));
};

ColorComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_3___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (ColorComponent);

/***/ }),

/***/ "./src/kmt-controls/editor.js":
/*!************************************!*\
  !*** ./src/kmt-controls/editor.js ***!
  \************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_4__);




function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }




var EditorComponent = function EditorComponent(props) {
  var editorId = props.id + 'editor';

  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_4__["useState"])({
    value: props.control.get(),
    restoreTextMode: false
  }),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_useState, 2),
      state = _useState2[0],
      setState = _useState2[1];

  var HandleChange = function HandleChange(value) {
    setState(function (prevState) {
      return _objectSpread(_objectSpread({}, prevState), {}, {
        value: value
      });
    });
    props.onChange(props.id, value);
  };

  Object(react__WEBPACK_IMPORTED_MODULE_4__["useEffect"])(function () {
    if (window.tinymce.get(editorId)) {
      setState({
        restoreTextMode: window.tinymce.get(editorId).isHidden()
      });
      window.wp.oldEditor.remove(editorId);
    }

    window.wp.oldEditor.initialize(editorId, {
      tinymce: {
        wpautop: true,
        toolbar1: 'bold,italic,bullist,numlist,link',
        toolbar2: ''
      },
      quicktags: true,
      mediaButtons: true
    });
    var editor = window.tinymce.get(editorId);

    if (editor.initialized) {
      onInit();
    } else {
      editor.on('init', onInit);
    }
  }, []);

  var onInit = function onInit() {
    var editor = window.tinymce.get(editorId);

    if (state.restoreTextMode) {
      window.switchEditors.go(editorId, 'html');
    }

    editor.on('NodeChange', debounce(function () {
      HandleChange(window.wp.oldEditor.getContent(editorId));
    }, 250));
    setState({
      editor: editor
    });
  };

  var debounce = function debounce(fn, delay) {
    var timer = null;
    return function () {
      var context = this,
          args = arguments;
      clearTimeout(timer);
      timer = setTimeout(function () {
        fn.apply(context, args);
      }, delay);
    };
  };

  var label = props.params.label;
  var labelContent = label ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
    className: "customize-control-title"
  }, label) : null;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["Fragment"], null, labelContent, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
    className: "customize-control-content"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("textarea", {
    className: "kmt-control-tinymce-editor wp-editor-area",
    id: editorId,
    value: state.value,
    onChange: function onChange(_ref) {
      var value = _ref.target.value;
      HandleChange(value);
    }
  })));
};

EditorComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_3___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(EditorComponent));

/***/ }),

/***/ "./src/kmt-controls/focus.js":
/*!***********************************!*\
  !*** ./src/kmt-controls/focus.js ***!
  \***********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_1__);


var __ = wp.i18n.__;
var _wp$components = wp.components,
    Dashicon = _wp$components.Dashicon,
    Button = _wp$components.Button;

var FocusComponent = function FocusComponent(props) {
  var controlParams = props.params.button_params ? props.params.button_params : {};

  var focusSection = function focusSection(section) {
    if (undefined !== wp.customize.section(section)) {
      wp.customize.section(section).focus();
    }
  };

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "kmt-control-field kmt-focus-button"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "kmt-builder-item-start"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Button, {
    className: "kmt-builder-item",
    onClick: function onClick() {
      return focusSection(controlParams.section);
    },
    "data-section": controlParams.section ? controlParams.section : ""
  }, controlParams.title ? controlParams.title : "", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
    className: "kmt-builder-item-icon"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Dashicon, {
    icon: "arrow-right-alt2"
  })))));
};

FocusComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_1___default.a.object.isRequired,
  customizer: prop_types__WEBPACK_IMPORTED_MODULE_1___default.a.func.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(FocusComponent));

/***/ }),

/***/ "./src/kmt-controls/font-pair.js":
/*!***************************************!*\
  !*** ./src/kmt-controls/font-pair.js ***!
  \***************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/assertThisInitialized */ "./node_modules/@babel/runtime/helpers/assertThisInitialized.js");
/* harmony import */ var _babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/inherits */ "./node_modules/@babel/runtime/helpers/inherits.js");
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @babel/runtime/helpers/possibleConstructorReturn */ "./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js");
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @babel/runtime/helpers/getPrototypeOf */ "./node_modules/@babel/runtime/helpers/getPrototypeOf.js");
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _common_capitalize_first_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ../common/capitalize-first.js */ "./src/common/capitalize-first.js");
/* harmony import */ var lodash_map__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! lodash/map */ "./node_modules/lodash/map.js");
/* harmony import */ var lodash_map__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(lodash_map__WEBPACK_IMPORTED_MODULE_11__);









function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6___default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6___default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5___default()(this, result); }; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

/* jshint esversion: 6 */




var __ = wp.i18n.__;
var _wp$components = wp.components,
    ButtonGroup = _wp$components.ButtonGroup,
    Dashicon = _wp$components.Dashicon,
    Tooltip = _wp$components.Tooltip,
    TextControl = _wp$components.TextControl,
    Button = _wp$components.Button,
    SelectControl = _wp$components.SelectControl,
    Popover = _wp$components.Popover,
    TabPanel = _wp$components.TabPanel,
    ToggleControl = _wp$components.ToggleControl,
    RangeControl = _wp$components.RangeControl,
    Placeholder = _wp$components.Placeholder;
var _wp$element = wp.element,
    Component = _wp$element.Component,
    Fragment = _wp$element.Fragment;

var FontPairModal = /*#__PURE__*/function (_Component) {
  _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4___default()(FontPairModal, _Component);

  var _super = _createSuper(FontPairModal);

  function FontPairModal() {
    var _this;

    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default()(this, FontPairModal);

    _this = _super.apply(this, arguments);
    _this = _super.apply(this, arguments);
    _this.updateValues = _this.updateValues.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.updateSettings = _this.updateSettings.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.state = {
      isVisible: false,
      confirm: '',
      fonts: kadenceCustomizerControlsData.fontPairs ? kadenceCustomizerControlsData.fontPairs : []
    };
    return _this;
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default()(FontPairModal, [{
    key: "render",
    value: function render() {
      var _this2 = this;

      var toggleVisible = function toggleVisible() {
        _this2.setState({
          isVisible: true
        });
      };

      var toggleClose = function toggleClose() {
        if (_this2.state.isVisible === true) {
          _this2.setState({
            isVisible: false
          });
        }
      };

      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        className: 'kadence-font-pair-wrap'
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Button, {
        className: 'kadence-font-pair-btn',
        label: __('Choose a font', 'kadence'),
        onClick: function onClick() {
          _this2.state.isVisible ? toggleClose() : toggleVisible();
        }
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Dashicon, {
        icon: "portfolio"
      })), this.state.isVisible && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Popover, {
        position: "bottom left",
        className: "kadence-font-pair-popover",
        onClose: toggleClose
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("h2", {
        style: {
          textAlign: 'center'
        }
      }, __('Select a Font Pairing', 'kadence')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(ButtonGroup, {
        className: "kt-font-pair-group",
        "aria-label": __('Select a Font Pair', 'kadence')
      }, lodash_map__WEBPACK_IMPORTED_MODULE_11___default()(this.state.fonts, function (_ref) {
        var hfont = _ref.hfont,
            bfont = _ref.bfont,
            hv = _ref.hv,
            img = _ref.img,
            name = _ref.name;
        return _this2.state.confirm === name ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Button, {
          className: 'kt-font-pair-btn state-confirm',
          onClick: function onClick() {
            _this2.updateSettings(hfont, bfont, hv);
          }
        }, __('Confirm Change Settings?', 'kadence')) : Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Button, {
          className: 'kt-font-pair-btn',
          onClick: function onClick() {
            _this2.setState({
              confirm: name
            });
          }
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("img", {
          src: img,
          className: "font-pairing"
        }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("span", null, name));
      }))));
    }
  }, {
    key: "updateSettings",
    value: function updateSettings(hfont, bfont, hv) {
      var bodyFont = this.props.customizer('base_font').get();
      bodyFont['family'] = bfont;
      bodyFont['weight'] = 'normal';
      bodyFont['google'] = true;
      var headingFont = this.props.customizer('heading_font').get();
      headingFont['family'] = hfont;
      headingFont['variant'] = hv;
      headingFont['google'] = true;
      this.updateValues(bodyFont, headingFont);
    }
  }, {
    key: "updateValues",
    value: function updateValues(bodyFont, headingFont) {
      this.props.customizer('base_font').set(_objectSpread(_objectSpread(_objectSpread({}, this.props.customizer('base_font').get()), bodyFont), {}, {
        flag: !this.props.customizer('base_font').get().flag
      }));
      this.props.customizer('heading_font').set(_objectSpread(_objectSpread(_objectSpread({}, this.props.customizer('heading_font').get()), headingFont), {}, {
        flag: !this.props.customizer('heading_font').get().flag
      }));
      var event = new CustomEvent('kadenceRemoteUpdateFonts', {
        'detail': 'typography'
      });
      document.dispatchEvent(event);
      this.setState({
        isVisible: false,
        confirm: ''
      });
    }
  }]);

  return FontPairModal;
}(Component);

FontPairModal.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_8___default.a.object.isRequired,
  customizer: prop_types__WEBPACK_IMPORTED_MODULE_8___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (FontPairModal);

/***/ }),

/***/ "./src/kmt-controls/layout-builder/add-component.js":
/*!**********************************************************!*\
  !*** ./src/kmt-controls/layout-builder/add-component.js ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_4__);





var _wp$components = wp.components,
    ButtonGroup = _wp$components.ButtonGroup,
    Dashicon = _wp$components.Dashicon,
    Popover = _wp$components.Popover,
    Button = _wp$components.Button;
var Fragment = wp.element.Fragment;

var AddComponent = function AddComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_4__["useState"])(false),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState, 2),
      visible = _useState2[0],
      setVisible = _useState2[1];

  var addItem = function addItem(item, row, column) {
    var setList = props.setList,
        list = props.list;
    setVisible(false);
    var updateItems = list;
    updateItems.push({
      id: item
    });
    setList(updateItems);
  };

  var controlParams = props.controlParams,
      location = props.location,
      choices = props.choices,
      row = props.row,
      column = props.column,
      id = props.id;

  var renderItems = function renderItems(item, row, column) {
    var available = true;
    controlParams.rows.map(function (zone) {
      Object.keys(props.settings[zone]).map(function (area) {
        if (props.settings[zone][area].includes(item)) {
          available = false;
        }
      });
    });
    var itemIncludesMenu = item.includes("menu");
    var itemIncludesToggle = item.includes("toggle");

    if ("popup" === row && (itemIncludesMenu && "offcanvas-menu" !== item || itemIncludesToggle)) {
      available = false;
    }

    if ("popup" !== row && "offcanvas-menu" === item) {
      available = false;
    }

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(Fragment, {
      key: item
    }, available && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(Button, {
      isTertiary: true,
      className: "builder-add-btn",
      onClick: function onClick() {
        addItem(item, props.row, props.column);
      }
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
      className: "add-btn-icon"
    }, " ", Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(Dashicon, {
      icon: undefined !== choices[item] && undefined !== choices[item].icon ? choices[item].icon : ""
    }), " "), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
      className: "add-btn-title"
    }, undefined !== choices[item] && undefined !== choices[item].name ? choices[item].name : "")));
  };

  var toggleClose = function toggleClose() {
    if (visible === true) {
      setVisible(false);
    }
  };

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    className: classnames__WEBPACK_IMPORTED_MODULE_2___default()("kmt-builder-add-item", ("header-desktop-items" === controlParams.group || "kemet-settings[footer-desktop-items]" === controlParams.group) && "right" === location ? "center-on-left" : null, ("header-desktop-items" === controlParams.group || "kemet-settings[footer-desktop-items]" === controlParams.group) && "left" === location ? "center-on-right" : null, ("header-desktop-items" === controlParams.group || "kemet-settings[footer-desktop-items]" === controlParams.group) && "left_center" === location ? "right-center-on-right" : null, ("header-desktop-items" === controlParams.group || "kemet-settings[footer-desktop-items]" === controlParams.group) && "right_center" === location ? "left-center-on-left" : null),
    key: id
  }, visible && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(Popover, {
    position: "top",
    className: "kmt-popover-add-builder",
    onClose: toggleClose
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    className: "kmt-popover-builder-list"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(ButtonGroup, {
    className: "kmt-radio-container-control"
  }, Object.keys(choices).sort().map(function (item) {
    return renderItems(item, row, column);
  })))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(Button, {
    className: "kmt-builder-item-add-icon",
    onClick: function onClick() {
      setVisible(true);
    }
  }));
};

/* harmony default export */ __webpack_exports__["default"] = (React.memo(AddComponent));

/***/ }),

/***/ "./src/kmt-controls/layout-builder/builder-component.js":
/*!**************************************************************!*\
  !*** ./src/kmt-controls/layout-builder/builder-component.js ***!
  \**************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_typeof__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/typeof */ "./node_modules/@babel/runtime/helpers/typeof.js");
/* harmony import */ var _babel_runtime_helpers_typeof__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_typeof__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _row_component__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./row-component */ "./src/kmt-controls/layout-builder/row-component.js");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_6__);





function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it.return != null) it.return(); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }





var BuilderComponent = function BuilderComponent(props) {
  var value = props.control.get();
  var staleValue = {};
  var baseDefault = {};
  var defaultValue = props.params.default ? _objectSpread(_objectSpread({}, baseDefault), props.params.default) : baseDefault;
  value = value ? _objectSpread(_objectSpread({}, defaultValue), value) : defaultValue;
  var defaultParams = {};
  var controlParams = props.params.input_attrs ? _objectSpread(_objectSpread({}, defaultParams), props.params.input_attrs) : defaultParams;
  var choices = props.params.choices ? props.params.choices : [];
  var columns = controlParams.columns ? controlParams.columns : [];
  var prevItems = [];

  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_6__["useState"])({
    value: value,
    columns: columns,
    isPopup: false,
    revertDrag: false,
    prevItems: prevItems
  }),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_useState, 2),
      state = _useState2[0],
      setState = _useState2[1];

  var enablePopup = false;

  if ("header-desktop-items" === controlParams.group || "header-mobile-items" === controlParams.group) {
    staleValue = JSON.parse(JSON.stringify(state.value));
  }

  var updateValues = function updateValues(value, row) {
    var setting = props.control;

    if ("popup" === row) {
      var header = "header-desktop-items" === controlParams.group ? "desktop" : "mobile",
          rowSetting = KemetCustomizerData.setting.replace("setting_name", "header-" + header + "-popup-items"),
          popup_control = props.customizer(rowSetting);
      popup_control.set(!popup_control.get());
    }

    setting.set(_objectSpread(_objectSpread(_objectSpread({}, setting.get()), value), {}, {
      flag: !setting.get().flag
    }));
  };

  var onDragStart = function onDragStart() {
    var dragZones = document.querySelectorAll(".kmt-builder-area");

    for (var i = 0; i < dragZones.length; i++) {
      dragZones[i].classList.add("kmt-dragging-dropzones");
    }
  };

  var onDragStop = function onDragStop() {
    if (state.revertDrag) {
      var controlValue = state.value;
      var prevValue = state.prevItems.value;
      var prevRestrictValue = state.prevItems.restrictValue;
      controlValue[state.prevItems.row][state.prevItems.zone] = prevValue;
      controlValue[state.prevItems.restrictRow][state.prevItems.restrictZone] = prevRestrictValue;
      setState(function (prevState) {
        return _objectSpread(_objectSpread({}, prevState), {}, {
          value: controlValue,
          revertDrag: false
        });
      });
      checkPopupVisibilty(true);
      updateValues(controlValue, state.prevItems.row);
    }

    var dragZones = document.querySelectorAll(".kmt-builder-area");

    for (var i = 0; i < dragZones.length; i++) {
      dragZones[i].classList.remove("kmt-dragging-dropzones");
    }

    checkPopupVisibilty(true);
  };

  var setPreviousItems = function setPreviousItems(item, restrictRow, restrictZone) {
    var prevITems = [];

    for (var _i = 0, _Object$entries = Object.entries(staleValue); _i < _Object$entries.length; _i++) {
      var _Object$entries$_i = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_Object$entries[_i], 2),
          rowKey = _Object$entries$_i[0],
          _value = _Object$entries$_i[1];

      for (var _i2 = 0, _Object$entries2 = Object.entries(_value); _i2 < _Object$entries2.length; _i2++) {
        var _Object$entries2$_i = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_Object$entries2[_i2], 2),
            zoneKey = _Object$entries2$_i[0],
            zoneValue = _Object$entries2$_i[1];

        var _iterator = _createForOfIteratorHelper(zoneValue),
            _step;

        try {
          for (_iterator.s(); !(_step = _iterator.n()).done;) {
            var zoneItem = _step.value;

            if (zoneItem === item.id) {
              prevITems["zone"] = zoneKey;
              prevITems["row"] = rowKey;
              prevITems["value"] = staleValue[rowKey][zoneKey];
              prevITems["restrictRow"] = restrictRow;
              prevITems["restrictZone"] = restrictZone;
              prevITems["restrictValue"] = staleValue[restrictRow][restrictZone];
              setState(function (prevState) {
                return _objectSpread(_objectSpread({}, prevState), {}, {
                  revertDrag: true,
                  prevItems: prevITems
                });
              });
            }
          }
        } catch (err) {
          _iterator.e(err);
        } finally {
          _iterator.f();
        }
      }
    }
  };

  var draggedItem = function draggedItem(item) {
    var dragged = false;

    if ("header-desktop-items" === controlParams.group || "header-mobile-items" === controlParams.group) {
      controlParams.rows.map(function (row) {
        if (inObject(staleValue[row], item)) {
          dragged = true;
        }
      });
    }

    return dragged;
  };

  var onDragEnd = function onDragEnd(row, zone, items) {
    var controlValue = state.value;
    var rowValue = controlValue[row];
    var updateItems = [];
    var dragged = true;
    var revertDrag = false;
    {
      items.length > 0 && items.map(function (item) {
        var itemIncludesMenu = item.id.includes("menu");
        var itemIncludesToggle = item.id.includes("toggle");

        if ("popup" === row && itemIncludesMenu && "offcanvas-menu" !== item.id || "popup" === row && itemIncludesToggle || "popup" !== row && "offcanvas-menu" === item.id) {
          if (!draggedItem(item.id)) {
            dragged = false;
            revertDrag = true;
          } else {
            setPreviousItems(item, row, zone);
          }
        }

        updateItems.push(item.id);
      });
    }

    if (!dragged && revertDrag) {
      updateItems = rowValue[zone];
    }

    if (!arraysEqual(rowValue[zone], updateItems)) {
      rowValue[zone] = updateItems;
      controlValue[row][zone] = updateItems;

      if ("header-desktop-items" === controlParams.group && row + "_center" === zone && updateItems.length === 0) {
        if (rowValue[row + "_left_center"].length > 0) {
          rowValue[row + "_left_center"].map(function (move) {
            controlValue[row][row + "_left"].push(move);
          });
          controlValue[row][row + "_left_center"] = [];
        }

        if (rowValue[row + "_right_center"].length > 0) {
          rowValue[row + "_right_center"].map(function (move) {
            controlValue[row][row + "_right"].push(move);
          });
          controlValue[row][row + "_right_center"] = [];
        }
      }

      checkPopupVisibilty(true);
      setState(function (prevState) {
        return _objectSpread(_objectSpread({}, prevState), {}, {
          value: controlValue
        });
      });
      updateValues(controlValue, row);
    }
  };

  var _onAddItem = function onAddItem(row, zone, items) {
    onDragEnd(row, zone, items);
    var event = new CustomEvent("KemetBuilderRemovedBuilderItem", {
      detail: controlParams.group
    });
    document.dispatchEvent(event);
  };

  var arraysEqual = function arraysEqual(a, b) {
    if (a === b) return true;
    if (a == null || b == null) return false;
    if (a.length != b.length) return false;

    for (var i = 0; i < a.length; ++i) {
      if (a[i] !== b[i]) return false;
    }

    return true;
  };

  var _removeItem = function removeItem(item, row, zone) {
    var updateState = state.value;
    var update = updateState[row];
    var updateItems = [];
    {
      update[zone].length > 0 && update[zone].map(function (old) {
        if (item !== old) {
          updateItems.push(old);
        }
      });
    }

    if ("header-desktop-items" === controlParams.group && row + "_center" === zone && updateItems.length === 0) {
      if (update[row + "_left_center"].length > 0) {
        update[row + "_left_center"].map(function (move) {
          updateState[row][row + "_left"].push(move);
        });
        updateState[row][row + "_left_center"] = [];
      }

      if (update[row + "_right_center"].length > 0) {
        update[row + "_right_center"].map(function (move) {
          updateState[row][row + "_right"].push(move);
        });
        updateState[row][row + "_right_center"] = [];
      }
    }

    update[zone] = updateItems;
    updateState[row][zone] = updateItems;
    checkPopupVisibilty(true);
    setState(function (prevState) {
      return _objectSpread(_objectSpread({}, prevState), {}, {
        value: updateState
      });
    });
    updateValues(updateState, row);
    var event = new CustomEvent("KemetBuilderRemovedBuilderItem", {
      detail: controlParams.group
    });
    document.dispatchEvent(event);
  };

  var _focusSection = function focusSection(item) {
    if (undefined !== wp.customize.section(item)) {
      wp.customize.section(item).focus();
    }
  };

  var checkPopupVisibilty = function checkPopupVisibilty(refresh) {
    var hasPopup = false;

    if ("header-mobile-items" === controlParams.group) {
      controlParams.rows.map(function (row) {
        if (inObject(state.value[row], "mobile-toggle")) {
          hasPopup = true;
        }
      });
    }

    if ("header-desktop-items" === controlParams.group) {
      controlParams.rows.map(function (row) {
        if (inObject(state.value[row], "desktop-toggle")) {
          hasPopup = true;
        }
      });
    }

    if (refresh) {
      setState(function (prevState) {
        return _objectSpread(_objectSpread({}, prevState), {}, {
          isPopup: hasPopup
        });
      });
    }

    enablePopup = hasPopup;
  };

  var inObject = function inObject(object, search) {
    if ("object" === _babel_runtime_helpers_typeof__WEBPACK_IMPORTED_MODULE_0___default()(object) && null !== object) {
      for (var _i3 = 0, _Object$entries3 = Object.entries(object); _i3 < _Object$entries3.length; _i3++) {
        var _Object$entries3$_i = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_Object$entries3[_i3], 2),
            key = _Object$entries3$_i[0],
            _value2 = _Object$entries3$_i[1];

        if (_value2.includes(search)) {
          return true;
        }
      }
    }

    return false;
  };

  checkPopupVisibilty(false);
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])(react__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
    className: "kmt-control-field kmt-builder-items"
  }, (true === state.isPopup || true === enablePopup) && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])(_row_component__WEBPACK_IMPORTED_MODULE_5__["default"], {
    key: "popup",
    row: "popup",
    items: state.value["popup"],
    removeItem: function removeItem(remove, row, zone) {
      return _removeItem(remove, row, zone);
    },
    showDrop: function showDrop() {
      return onDragStart();
    },
    onUpdate: function onUpdate(updateRow, updateZone, updateItems) {
      return onDragEnd(updateRow, updateZone, updateItems);
    },
    onAddItem: function onAddItem(updateRow, updateZone, updateItems) {
      return _onAddItem(updateRow, updateZone, updateItems);
    },
    focusSection: function focusSection(item) {
      return _focusSection(item);
    },
    hideDrop: function hideDrop() {
      return onDragStop();
    },
    controlParams: controlParams,
    choices: choices,
    settings: state.value,
    columns: state.columns["popup"],
    customizer: props.customizer
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
    className: "kmt-builder-row-items"
  }, controlParams.rows.map(function (row) {
    if ("popup" === row) {
      return;
    }

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])(_row_component__WEBPACK_IMPORTED_MODULE_5__["default"], {
      removeItem: function removeItem(remove, row, zone) {
        return _removeItem(remove, row, zone);
      },
      key: row,
      row: row,
      showDrop: function showDrop() {
        return onDragStart();
      },
      onUpdate: function onUpdate(updateRow, updateZone, updateItems) {
        return onDragEnd(updateRow, updateZone, updateItems);
      },
      onAddItem: function onAddItem(updateRow, updateZone, updateItems) {
        return _onAddItem(updateRow, updateZone, updateItems);
      },
      focusSection: function focusSection(item) {
        return _focusSection(item);
      },
      hideDrop: function hideDrop() {
        return onDragStop();
      },
      items: state.value[row],
      controlParams: controlParams,
      choices: choices,
      settings: state.value,
      columns: state.columns[row],
      customizer: props.customizer
    });
  }))));
};

/* harmony default export */ __webpack_exports__["default"] = (React.memo(BuilderComponent));

/***/ }),

/***/ "./src/kmt-controls/layout-builder/drop-component.js":
/*!***********************************************************!*\
  !*** ./src/kmt-controls/layout-builder/drop-component.js ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/toConsumableArray */ "./node_modules/@babel/runtime/helpers/toConsumableArray.js");
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var react_sortablejs__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! react-sortablejs */ "./node_modules/react-sortablejs/dist/index.js");
/* harmony import */ var react_sortablejs__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(react_sortablejs__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _item_component__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./item-component */ "./src/kmt-controls/layout-builder/item-component.js");
/* harmony import */ var _add_component__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./add-component */ "./src/kmt-controls/layout-builder/add-component.js");





var Fragment = wp.element.Fragment;

var DropComponent = function DropComponent(props) {
  var location = props.zone.replace(props.row + "_", "");
  var currentList = typeof props.items != "undefined" && props.items != null && props.items.length != null && props.items.length > 0 ? props.items : [];
  var choices = props.choices,
      filterChoices = Object.keys(choices),
      theItems = [];
  {
    var sortList = _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(currentList);

    currentList.length > 0 && currentList.map(function (item, key) {
      if (filterChoices.includes(item)) {
        theItems.push({
          id: item
        });
      } else {
        sortList.splice(sortList.indexOf(item), 1);
      }
    });
    currentList = sortList;
  }
  var currentCenterList = typeof props.centerItems != "undefined" && props.centerItems != null && props.centerItems.length != null && props.centerItems.length > 0 ? props.centerItems : [];
  var theCenterItems = [];
  {
    var sortCurrentCenterList = _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(currentCenterList);

    currentCenterList.length > 0 && currentCenterList.map(function (item, key) {
      if (filterChoices.includes(item)) {
        theCenterItems.push({
          id: item
        });
      } else {
        sortCurrentCenterList.splice(sortCurrentCenterList.indexOf(item), 1);
      }
    });
    currentCenterList = sortCurrentCenterList;
  }

  var addSortable = function addSortable(items, list, listLocation) {
    var id = listLocation.replace("_", "-");
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(Fragment, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(react_sortablejs__WEBPACK_IMPORTED_MODULE_2__["ReactSortable"], {
      animation: 100,
      onStart: function onStart() {
        return props.showDrop();
      },
      group: props.controlParams.group,
      className: "kmt-builder-drop kmt-builder-sortable-panel kmt-builder-drop-".concat(location + id),
      list: items,
      setList: function setList(newState) {
        return props.onUpdate(props.row, props.zone + listLocation, newState);
      },
      onEnd: function onEnd() {
        return props.hideDrop();
      }
    }, list.length > 0 && list.map(function (item, index) {
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_item_component__WEBPACK_IMPORTED_MODULE_3__["default"], {
        removeItem: function removeItem(remove) {
          return props.removeItem(remove, props.row, props.zone + listLocation);
        },
        focusSection: function focusSection(focus) {
          return props.focusSection(focus);
        },
        key: item,
        index: index,
        item: item,
        controlParams: props.controlParams,
        choices: props.choices
      });
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_add_component__WEBPACK_IMPORTED_MODULE_4__["default"], {
      row: props.row,
      list: items,
      settings: props.settings,
      column: props.zone + listLocation,
      setList: function setList(newState) {
        return props.onAddItem(props.row, props.zone + listLocation, newState);
      },
      key: location,
      location: location + listLocation,
      id: "add" + id + "-" + location,
      controlParams: props.controlParams,
      choices: props.choices
    }));
  };

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    className: "kmt-builder-area kmt-builder-area-".concat(location),
    "data-location": props.zone
  }, "header-desktop-items" === props.controlParams.group && location == "right" && addSortable(theCenterItems, currentCenterList, "_center"), addSortable(theItems, currentList, ""), "header-desktop-items" === props.controlParams.group && location == "left" && addSortable(theCenterItems, currentCenterList, "_center"));
};

/* harmony default export */ __webpack_exports__["default"] = (React.memo(DropComponent));

/***/ }),

/***/ "./src/kmt-controls/layout-builder/item-component.js":
/*!***********************************************************!*\
  !*** ./src/kmt-controls/layout-builder/item-component.js ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);

var _wp$components = wp.components,
    Dashicon = _wp$components.Dashicon,
    Button = _wp$components.Button;
var __ = wp.i18n.__;

var ItemComponent = function ItemComponent(_ref) {
  var item = _ref.item,
      choices = _ref.choices,
      removeItem = _ref.removeItem,
      focusSection = _ref.focusSection;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "kmt-builder-item",
    "data-id": item,
    "data-section": undefined !== choices[item] && undefined !== choices[item].section ? choices[item].section : "",
    key: item
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "kmt-builder-item-actions",
    onClick: function onClick() {
      focusSection(undefined !== choices[item] && undefined !== choices[item].section ? choices[item].section : "");
    }
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
    className: "kmt-builder-item-icon kmt-move-icon"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Dashicon, {
    icon: "move"
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
    className: "kmt-builder-item-text"
  }, undefined !== choices[item] && undefined !== choices[item].name ? choices[item].name : ""), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Button, {
    className: "kmt-builder-item-focus-icon kmt-builder-item-icon",
    "aria-label": __("Settings for", "kemet") + " " + (undefined !== choices[item] && undefined !== choices[item].name ? choices[item].name : "")
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Dashicon, {
    icon: "admin-generic"
  }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Button, {
    className: "kmt-builder-item-icon",
    "aria-label": __("Remove", "kemet") + " " + (undefined !== choices[item] && undefined !== choices[item].name ? choices[item].name : ""),
    onClick: function onClick() {
      removeItem(item);
    }
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Dashicon, {
    icon: "no-alt"
  })));
};

/* harmony default export */ __webpack_exports__["default"] = (React.memo(ItemComponent));

/***/ }),

/***/ "./src/kmt-controls/layout-builder/row-component.js":
/*!**********************************************************!*\
  !*** ./src/kmt-controls/layout-builder/row-component.js ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _drop_component__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./drop-component */ "./src/kmt-controls/layout-builder/drop-component.js");


var __ = wp.i18n.__;
var _wp$components = wp.components,
    Dashicon = _wp$components.Dashicon,
    Button = _wp$components.Button;

var RowComponent = function RowComponent(props) {
  var centerClass = "";
  var mode = props.controlParams.group.indexOf("header") !== -1 ? "header" : "footer";
  var besideItems = [];
  var layout = "";
  var zone_count = 0;
  var enableRow = true;
  var section = "section-" + props.row + "-" + mode + "-builder";

  if ("header" === mode) {
    switch (props.row) {
      case "popup":
        var device = "header-desktop-items" === props.controlParams.group ? "desktop" : "mobile";
        section = "section-" + device + "-popup-header-builder";
        break;
    }
  }

  if ("footer" === mode) {
    layout = "kmt-grid-row-layout-".concat(props.columns, "-equal");
    zone_count = props.columns - 1;
    Object.keys(props.controlParams.zones[props.row]).map(function (zone, index) {
      if (zone_count < index) {
        props.items[zone] = [];
      }
    });
  }

  if ("header-desktop-items" === props.controlParams.group && typeof props.items[props.row + "_center"] != "undefined" && props.items[props.row + "_center"] != null && props.items[props.row + "_center"].length != null && props.items[props.row + "_center"].length > 0) {
    centerClass = "has-center-items";
  } else {
    if ("header-desktop-items" === props.controlParams.group) {
      centerClass = "no-center-items";
    }
  }

  if ("popup" === props.row) {
    centerClass = "popup-vertical-group";
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "kmt-builder-areas kmt-builder-mode-".concat(mode, " ").concat(centerClass),
    "data-row": props.row,
    "data-row-section": "section-" + props.row + "-" + mode + "-builder"
  }, props.row === "popup" && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Button, {
    className: "kmt-fixed-row-actions",
    title: __("Off Canvas", "kemet"),
    onClick: function onClick() {
      return props.focusSection(section);
    }
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Dashicon, {
    icon: "admin-generic"
  }), __("Off Canvas", "kemet")), props.row !== "popup" && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Button, {
    className: "kmt-fixed-row-actions",
    title: (props.row + " " + mode).charAt(0).toUpperCase() + (props.row + " " + mode).slice(1).toLowerCase(),
    onClick: function onClick() {
      return props.focusSection(section);
    }
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Dashicon, {
    icon: "admin-generic"
  }), (props.row + " " + mode).charAt(0).toUpperCase() + (props.row + " " + mode).slice(1).toLowerCase()), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
    className: "kmt-builder-group kmt-builder-group-horizontal ".concat(layout),
    "data-setting": props.row
  }, Object.keys(props.controlParams.zones[props.row]).map(function (zone, index) {
    if (props.row + "_left_center" === zone || props.row + "_right_center" === zone) {
      return;
    }

    if ("header-desktop-items" === props.controlParams.group && props.row + "_left" === zone) {
      besideItems = props.items[props.row + "_left_center"];
    }

    if ("header-desktop-items" === props.controlParams.group && props.row + "_right" === zone) {
      besideItems = props.items[props.row + "_right_center"];
    }

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_drop_component__WEBPACK_IMPORTED_MODULE_1__["default"], {
      removeItem: function removeItem(remove, removeRow, removeZone) {
        return props.removeItem(remove, removeRow, removeZone);
      },
      showDrop: function showDrop() {
        return props.showDrop();
      },
      onUpdate: function onUpdate(updateRow, updateZone, updateItems) {
        return props.onUpdate(updateRow, updateZone, updateItems);
      },
      zone: zone,
      row: props.row,
      choices: props.choices,
      key: zone,
      mode: mode,
      items: props.items[zone],
      centerItems: besideItems,
      controlParams: props.controlParams,
      onAddItem: function onAddItem(updateRow, updateZone, updateItems) {
        return props.onAddItem(updateRow, updateZone, updateItems);
      },
      hideDrop: function hideDrop() {
        return props.hideDrop();
      },
      settings: props.settings,
      focusSection: function focusSection(focus) {
        return props.focusSection(focus);
      }
    });
  })));
};

/* harmony default export */ __webpack_exports__["default"] = (React.memo(RowComponent));

/***/ }),

/***/ "./src/kmt-controls/responsive-slider.js":
/*!***********************************************!*\
  !*** ./src/kmt-controls/responsive-slider.js ***!
  \***********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/assertThisInitialized */ "./node_modules/@babel/runtime/helpers/assertThisInitialized.js");
/* harmony import */ var _babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/inherits */ "./node_modules/@babel/runtime/helpers/inherits.js");
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @babel/runtime/helpers/possibleConstructorReturn */ "./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js");
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @babel/runtime/helpers/getPrototypeOf */ "./node_modules/@babel/runtime/helpers/getPrototypeOf.js");
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _common_responsive__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ../common/responsive */ "./src/common/responsive.js");










function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_7___default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6___default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6___default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5___default()(this, result); }; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }



var _wp$element = wp.element,
    Component = _wp$element.Component,
    Fragment = _wp$element.Fragment;

var ResponsiveSliderComponent = /*#__PURE__*/function (_Component) {
  _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4___default()(ResponsiveSliderComponent, _Component);

  var _super = _createSuper(ResponsiveSliderComponent);

  function ResponsiveSliderComponent() {
    var _this;

    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default()(this, ResponsiveSliderComponent);

    _this = _super.apply(this, arguments);

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_7___default()(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this), "handleUnitChange", function (device, value) {
      var updateState = _objectSpread({}, _this.state.initialState);

      updateState["".concat(device, "-unit")] = value;

      _this.props.onChange(_this.props.id, updateState);

      _this.setState({
        initialState: updateState
      });
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_7___default()(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this), "handleReset", function (e) {
      e.preventDefault();

      var defUnit = _this.state.defaultVal["".concat(_this.state.currentDevice, "-unit")],
          size = _this.state.defaultVal[_this.state.currentDevice];

      var updateState = _objectSpread({}, _this.state.defaultVal);

      updateState["".concat(_this.state.currentDevice, "-unit")] = defUnit;
      updateState[_this.state.currentDevice] = size;

      _this.props.onChange(_this.props.id, updateState);

      _this.setState({
        initialState: updateState
      });
    });

    _this.unit_choices = _this.props.params.unit_choices;
    _this.values = _this.props.params.value;

    var _value = _this.props.control.get();

    var defaultValues = {
      "desktop": '',
      "desktop-unit": 'px',
      'tablet': '',
      'tablet-unit': 'px',
      'mobile': '',
      'mobile-unit': 'px'
    };
    _value = _value ? _objectSpread(_objectSpread({}, defaultValues), _value) : defaultValues;
    _this.state = {
      initialState: _value,
      currentDevice: 'desktop',
      defaultVal: defaultValues
    };
    _this.updateValues = _this.updateValues.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.handleUnitChange = _this.handleUnitChange.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    return _this;
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default()(ResponsiveSliderComponent, [{
    key: "updateValues",
    value: function updateValues(device, value) {
      var updateState = _objectSpread({}, this.state.initialState);

      updateState[device] = value;
      this.props.onChange(this.props.id, updateState);
      this.setState({
        initialState: updateState
      });
    }
  }, {
    key: "render",
    value: function render() {
      var _this2 = this;

      var _this$props$params = this.props.params,
          label = _this$props$params.label,
          suffix = _this$props$params.suffix,
          description = _this$props$params.description;
      var suffixContent = suffix ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("span", {
        class: "kmt-range-unit"
      }, suffix) : null;
      var descriptionContent = description && description !== '' ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("span", {
        class: "description customize-control-description"
      }, description) : null;
      var dataAttributes = '';
      var units = [];

      for (var _i = 0, _Object$entries = Object.entries(this.unit_choices); _i < _Object$entries.length; _i++) {
        var _Object$entries$_i = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_Object$entries[_i], 2),
            key = _Object$entries$_i[0],
            value = _Object$entries$_i[1];

        units.push(key);

        if (key == this.state.initialState["".concat(this.state.currentDevice, "-unit")]) {
          dataAttributes = {
            min: value.min,
            max: value.max,
            step: value.step
          };
        }
      }

      var labelContent = label ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])(_common_responsive__WEBPACK_IMPORTED_MODULE_10__["default"], {
        onChange: function onChange(currentDevice) {
          return _this2.setState({
            currentDevice: currentDevice
          });
        },
        label: label
      }) : null;
      var unitHTML = units.map(function (unit) {
        var unit_class = '';

        if (_this2.state.initialState["".concat(_this2.state.currentDevice, "-unit")] === unit) {
          unit_class = 'active';
        }

        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("li", {
          className: "single-unit  ".concat(unit_class),
          "data-unit": unit
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("span", {
          className: "unit-text",
          onClick: function onClick(value) {
            return _this2.handleUnitChange(_this2.state.currentDevice, unit);
          }
        }, "".concat(unit)));
      });
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("label", {
        htmlFor: ""
      }, labelContent, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("div", {
        className: "wrapper"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("div", {
        className: "input-field-wrapper desktop active"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("input", {
        type: "range",
        value: this.state.initialState['desktop'],
        onChange: function onChange(event) {
          return _this2.updateValues('desktop', event.target.value);
        },
        min: "".concat(dataAttributes.min),
        max: "".concat(dataAttributes.max),
        step: "".concat(dataAttributes.step)
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("div", {
        className: "kemet_range_value"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("input", {
        type: "number",
        "data-id": "desktop",
        className: "kmt-responsive-range-value-input kmt-responsive-range-desktop-input",
        value: this.state.initialState['desktop'],
        min: "".concat(dataAttributes.min),
        max: "".concat(dataAttributes.max),
        step: "".concat(dataAttributes.step),
        onChange: function onChange(event) {
          return _this2.updateValues('desktop', event.target.value);
        }
      }), suffixContent), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("ul", {
        className: "kmt-slider-responsive-units kmt-slider-desktop-responsive-units"
      }, unitHTML)), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("div", {
        className: "input-field-wrapper tablet "
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("input", {
        type: "range",
        value: this.state.initialState['tablet'],
        onChange: function onChange(value) {
          return _this2.updateValues('tablet', event.target.value);
        },
        min: "".concat(dataAttributes.min),
        max: "".concat(dataAttributes.max),
        step: "".concat(dataAttributes.step)
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("div", {
        className: "kemet_range_value"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("input", {
        type: "number",
        "data-id": "tablet",
        className: "kmt-responsive-range-value-input kmt-responsive-range-tablet-input",
        value: this.state.initialState['tablet'],
        min: "".concat(dataAttributes.min),
        max: "".concat(dataAttributes.max),
        step: "".concat(dataAttributes.step),
        onChange: function onChange(value) {
          return _this2.updateValues('tablet', event.target.value);
        }
      }), suffixContent), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("ul", {
        className: "kmt-slider-responsive-units kmt-slider-desktop-responsive-units"
      }, unitHTML)), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("div", {
        className: "input-field-wrapper mobile "
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("input", {
        type: "range",
        value: this.state.initialState['mobile'],
        onChange: function onChange(value) {
          return _this2.updateValues('mobile', event.target.value);
        },
        min: "".concat(dataAttributes.min),
        max: "".concat(dataAttributes.max),
        step: "".concat(dataAttributes.step)
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("div", {
        className: "kemet_range_value"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("input", {
        type: "number",
        "data-id": "mobile",
        className: "kmt-responsive-range-value-input kmt-responsive-range-mobile-input",
        onChange: function onChange(value) {
          return _this2.updateValues('mobile', event.target.value);
        },
        value: this.state.initialState['mobile'],
        min: "".concat(dataAttributes.min),
        max: "".concat(dataAttributes.max),
        step: "".concat(dataAttributes.step)
      }), suffixContent), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("ul", {
        className: "kmt-slider-responsive-units kmt-slider-desktop-responsive-units"
      }, unitHTML)), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("div", {
        className: "kmt-responsive-slider-reset",
        onClick: function onClick(e) {
          return _this2.handleReset(e);
        }
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("span", {
        className: "dashicons dashicons-image-rotate"
      }))), descriptionContent);
    }
  }]);

  return ResponsiveSliderComponent;
}(Component);

ResponsiveSliderComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_9___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (ResponsiveSliderComponent);

/***/ }),

/***/ "./src/kmt-controls/responsive-spacing.js":
/*!************************************************!*\
  !*** ./src/kmt-controls/responsive-spacing.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/extends */ "./node_modules/@babel/runtime/helpers/extends.js");
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _common_responsive__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../common/responsive */ "./src/common/responsive.js");





function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_1___default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }







var ResponsiveSpacingComponent = function ResponsiveSpacingComponent(props) {
  var value = props.control.get();
  var defaultValue = {
    desktop: {
      'top': '',
      'right': '',
      'bottom': '',
      'left': ''
    },
    tablet: {
      'top': '',
      'right': '',
      'bottom': '',
      'left': ''
    },
    mobile: {
      'top': '',
      'right': '',
      'bottom': '',
      'left': ''
    },
    'desktop-unit': 'px',
    'tablet-unit': 'px',
    'mobile-unit': 'px'
  };
  value = value ? value : defaultValue;

  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_6__["useState"])(value),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_2___default()(_useState, 2),
      state = _useState2[0],
      setState = _useState2[1];

  var _useState3 = Object(react__WEBPACK_IMPORTED_MODULE_6__["useState"])('desktop'),
      _useState4 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_2___default()(_useState3, 2),
      device = _useState4[0],
      setDevice = _useState4[1];

  Object(react__WEBPACK_IMPORTED_MODULE_6__["useEffect"])(function () {
    if (state !== value) {
      setState(value);
    }
  }, []);

  var onConnectedClick = function onConnectedClick() {
    var parent = event.target.parentElement.parentElement;
    var inputs = parent.querySelectorAll('.kmt-spacing-input');

    for (var i = 0; i < inputs.length; i++) {
      inputs[i].classList.remove('connected');
      inputs[i].setAttribute('data-element-connect', '');
    }

    event.target.parentElement.classList.remove('disconnected');
  };

  var onDisconnectedClick = function onDisconnectedClick() {
    var elements = event.target.dataset.elementConnect;
    var parent = event.target.parentElement.parentElement;
    var inputs = parent.querySelectorAll('.kmt-spacing-input');

    for (var i = 0; i < inputs.length; i++) {
      inputs[i].classList.add('connected');
      inputs[i].setAttribute('data-element-connect', elements);
    }

    event.target.parentElement.classList.add('disconnected');
  };

  var onSpacingChange = function onSpacingChange(device, choiceID) {
    var choices = props.params.choices;

    var updateState = _objectSpread({}, state);

    var deviceUpdateState = _objectSpread({}, updateState[device]);

    if (!event.target.classList.contains('connected')) {
      deviceUpdateState[choiceID] = event.target.value;
    } else {
      for (var _choiceID in choices) {
        deviceUpdateState[_choiceID] = event.target.value;
      }
    }

    updateState[device] = deviceUpdateState;
    props.onChange(props.id, updateState);
    setState(updateState);
  };

  var onUnitChange = function onUnitChange(device) {
    var unitKey = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';

    var updateState = _objectSpread({}, state);

    updateState["".concat(device, "-unit")] = unitKey;
    props.onChange(props.id, updateState);
    setState(updateState);
  };

  var renderResponsiveInput = function renderResponsiveInput(device) {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("input", {
      key: device,
      type: "hidden",
      onChange: function onChange() {
        return onUnitChange(device, '');
      },
      className: "kmt-spacing-unit-input kmt-spacing-".concat(device, "-unit"),
      "data-device": "".concat(device),
      value: state["".concat(device, "-unit")]
    });
  };

  var renderInputHtml = function renderInputHtml(device) {
    var active = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
    var _props$params = props.params,
        linked_choices = _props$params.linked_choices,
        id = _props$params.id,
        title = _props$params.title,
        choices = _props$params.choices,
        inputAttrs = _props$params.inputAttrs,
        unit_choices = _props$params.unit_choices,
        connected = _props$params.connected;
    var connectedClass = false === connected ? '' : 'connected';
    var disconnectedClass = false === connected ? '' : 'disconnected';
    var htmlChoices = null;

    if (choices) {
      htmlChoices = Object.keys(choices).map(function (choiceID) {
        var html = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("li", _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default()({
          key: choiceID
        }, inputAttrs, {
          className: "kmt-spacing-input-item"
        }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("input", {
          type: "number",
          className: "kmt-spacing-input kmt-spacing-".concat(device, " ").concat(connectedClass),
          "data-id": choiceID,
          value: state[device][choiceID],
          onChange: function onChange() {
            return onSpacingChange(device, choiceID);
          },
          "data-element-connect": id
        }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("span", {
          className: "kmt-spacing-title"
        }, choices[choiceID]));
        return html;
      });
    }

    var linkHtml = linked_choices ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("li", {
      key: 'connect-disconnect' + device,
      className: "kmt-spacing-input-item-link ".concat(disconnectedClass)
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("span", {
      title: title,
      className: "dashicons dashicons-admin-links kmt-spacing-connected ",
      onClick: function onClick() {
        onConnectedClick();
      },
      "data-element-connect": id
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("span", {
      title: title,
      className: "dashicons dashicons-editor-unlink kmt-spacing-disconnected wp-ui-highlight",
      onClick: function onClick() {
        onDisconnectedClick();
      },
      "data-element-connect": id
    })) : null;
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("ul", {
      key: device,
      className: "kmt-spacing-wrapper ".concat(device, " ").concat(active)
    }, htmlChoices, linkHtml);
  };

  var responsiveUnit = null;

  var renderUnit = function renderUnit() {
    var unit_choices = props.params.unit_choices;

    if (unit_choices) {
      responsiveUnit = Object.values(unit_choices).map(function (unitKey) {
        var unitClass = '';

        if (state["".concat(device, "-unit")] === unitKey) {
          unitClass = 'active';
        }

        var html = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("li", {
          key: unitKey,
          className: "single-unit ".concat(unitClass),
          onClick: function onClick() {
            return onUnitChange(device, unitKey);
          },
          "data-unit": unitKey
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("span", {
          className: "unit-text"
        }, unitKey));
        return html;
      });
    }

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("ul", {
      key: 'responsive-units',
      className: "kmt-spacing-responsive-units kmt-spacing-".concat(device, "-responsive-units")
    }, responsiveUnit);
  };

  var _props$params2 = props.params,
      label = _props$params2.label,
      description = _props$params2.description;
  var inputHtml = null;
  var responsiveHtml = null;
  var labelContent = label ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("span", {
    className: "customize-control-title"
  }, label) : null;
  var descriptionContent = description && description !== '' ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("span", {
    className: "description customize-control-description"
  }, description) : null;
  inputHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])(react__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, renderInputHtml(device, 'active'));
  responsiveHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])(react__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
    className: "unit-input-wrapper kmt-spacing-unit-wrapper"
  }, renderResponsiveInput(device)));
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
    key: 'kmt-spacing-responsive',
    className: "kmt-spacing-responsive"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])(_common_responsive__WEBPACK_IMPORTED_MODULE_7__["default"], {
    onChange: function onChange(currentDevice) {
      return setDevice(currentDevice);
    },
    label: label
  }), renderUnit(), descriptionContent, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
    className: "kmt-spacing-responsive-outer-wrapper"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
    className: "input-wrapper kmt-spacing-responsive-wrapper"
  }, inputHtml), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
    className: "kmt-spacing-responsive-units-screen-wrap"
  }, responsiveHtml)));
};

ResponsiveSpacingComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_4___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (ResponsiveSpacingComponent);

/***/ }),

/***/ "./src/kmt-controls/select.js":
/*!************************************!*\
  !*** ./src/kmt-controls/select.js ***!
  \************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_3__);





var SelectComponent = function SelectComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_3__["useState"])(props.control.get()),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState, 2),
      props_value = _useState2[0],
      setPropsValue = _useState2[1];

  var HandleChange = function HandleChange(value) {
    setPropsValue(value);
    props.onChange(props.id, value);
  };

  var _props$params = props.params,
      label = _props$params.label,
      name = _props$params.name,
      choices = _props$params.choices;
  var labelContent = label ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
    className: "customize-control-title"
  }, label) : null;
  var optionsHtml = Object.entries(choices).map(function (key) {
    var html = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("option", {
      key: key[0],
      value: key[0]
    }, key[1]);
    return html;
  });
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null, labelContent, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    className: "customize-control-content"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("select", {
    className: "kmt-select-input",
    "data-name": name,
    "data-value": props_value,
    value: props_value,
    onChange: function onChange() {
      HandleChange(event.target.value);
    }
  }, optionsHtml)));
};

SelectComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_2___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(SelectComponent));

/***/ }),

/***/ "./src/kmt-controls/slider.js":
/*!************************************!*\
  !*** ./src/kmt-controls/slider.js ***!
  \************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_3__);





var SliderComponent = function SliderComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_3__["useState"])(props.control.get()),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState, 2),
      props_value = _useState2[0],
      setPropsValue = _useState2[1];

  var _props$params = props.params,
      label = _props$params.label,
      description = _props$params.description,
      suffix = _props$params.suffix,
      input_attrs = _props$params.input_attrs;
  var inputContent = {};
  var defaultValue = '';
  var labelContent = label ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
    className: "customize-control-title"
  }, label)) : null;
  var descriptionContent = description || description !== '' ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
    className: "description customize-control-description"
  }, description) : null;
  var suffixContent = suffix ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
    className: "kmt-range-unit"
  }, suffix) : null;
  var min = inputContent.min,
      max = inputContent.max,
      step = inputContent.step;

  var onChangInput = function onChangInput(event) {
    if (event.target.value === '') {
      updateValues(undefined);
      return;
    }

    var newValue = Number(event.target.value);

    if (newValue === '') {
      updateValues(undefined);
      return;
    }

    if (min < -0.1) {
      if (newValue > max) {
        updateValues(max);
      } else if (newValue < min && newValue !== '-') {
        updateValues(min);
      } else {
        updateValues(newValue);
      }
    } else {
      if (newValue > max) {
        updateValues(max);
      } else if (newValue < -0.1) {
        updateValues(min);
      } else {
        updateValues(newValue);
      }
    }
  };

  var updateValues = function updateValues(newVal) {
    setPropsValue(newVal);
    props.onChange(props.id, newVal);
  };

  var savedValue = props_value || 0 === props_value ? parseFloat(props_value) : '';

  if (1 === step) {
    savedValue = props_value || 0 === props_value ? parseInt(props_value) : '';
  }

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    className: "kemet-slider-wrap"
  }, labelContent, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    className: "wrapper"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("input", {
    type: "range",
    value: savedValue,
    onChange: function onChange(value) {
      return updateValues(event.target.value);
    },
    min: input_attrs.min,
    max: input_attrs.max,
    step: input_attrs.step
  }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    class: "kemet_range_value"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("input", {
    type: "number",
    className: "value kmt-range-value-input",
    value: "".concat(savedValue),
    onChange: function onChange(value) {
      return onChangInput(event);
    },
    min: input_attrs.min,
    max: input_attrs.max,
    step: input_attrs.step
  }), suffixContent), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    className: "kmt-slider-reset",
    disabled: JSON.stringify(props_value) === JSON.stringify(defaultValue),
    onClick: function onClick(e) {
      e.preventDefault();
      var value = JSON.parse(JSON.stringify(defaultValue));
      updateValues(value);
    }
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
    className: "dashicons dashicons-image-rotate"
  }))), descriptionContent);
};

SliderComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_2___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(SliderComponent));

/***/ }),

/***/ "./src/kmt-controls/sortable.js":
/*!**************************************!*\
  !*** ./src/kmt-controls/sortable.js ***!
  \**************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/extends */ "./node_modules/@babel/runtime/helpers/extends.js");
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_3__);





var SortableComponent = function SortableComponent(props) {
  var labelHtml = null,
      descriptionHtml = null;
  var _props$params = props.params,
      label = _props$params.label,
      description = _props$params.description,
      choices = _props$params.choices,
      inputAttrs = _props$params.inputAttrs;
  var value = props.control.get();
  var list = Object(react__WEBPACK_IMPORTED_MODULE_3__["useRef"])(null);
  Object(react__WEBPACK_IMPORTED_MODULE_3__["useEffect"])(function () {
    var updateValue = function updateValue() {
      var newValue = [];
      jQuery(list.current).find('li').each(function () {
        if (!jQuery(this).is('.invisible')) {
          newValue.push(jQuery(this).data('value'));
        }
      });
      props.control.set(newValue);
    };

    jQuery(list.current).sortable({
      stop: function stop() {
        updateValue();
      }
    }).disableSelection().find('li').each(function () {
      jQuery(this).find('i.visibility').click(function () {
        jQuery(this).toggleClass('dashicons-visibility-faint').parents('li:eq(0)').toggleClass('invisible');
      });
    }).click(function () {
      updateValue();
    });
  }, []); // const updateValue = function () {
  //     'use strict';
  //     let newValue = [];
  //     this.sortableContainer.find('li').each(function () {
  //         if (!jQuery(this).is('.invisible')) {
  //             newValue.push(jQuery(this).data('value'));
  //         }
  //     });
  //     control.set(newValue);
  // }

  if (label) {
    labelHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
      className: "customize-control-title"
    }, label);
  }

  if (description) {
    descriptionHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
      className: "description customize-control-description"
    }, description);
  }

  var visibleMetaHtml = Object.values(value).map(function (choiceID) {
    var html = '';

    if (choices[choiceID]) {
      html = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("li", _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default()({}, inputAttrs, {
        key: choiceID,
        className: "kmt-sortable-item",
        "data-value": choiceID
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("i", {
        className: "dashicons dashicons-visibility visibility"
      }), choices[choiceID], Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("i", {
        class: "dashicons dashicons-menu"
      }));
    }

    return html;
  });
  var invisibleMetaHtml = Object.keys(choices).map(function (choiceID) {
    var html = '';

    if (Array.isArray(value) && -1 === value.indexOf(choiceID)) {
      html = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("li", _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default()({}, inputAttrs, {
        key: choiceID,
        className: "kmt-sortable-item invisible",
        "data-value": choiceID
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("i", {
        className: "dashicons dashicons-visibility visibility"
      }), choices[choiceID], Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("i", {
        class: "dashicons dashicons-menu"
      }));
    }

    return html;
  });
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", {
    className: "kmt-sortable"
  }, labelHtml, descriptionHtml, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("ul", {
    className: "sortable",
    ref: list
  }, visibleMetaHtml, invisibleMetaHtml));
};

SortableComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_2___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(SortableComponent));

/***/ }),

/***/ "./src/kmt-controls/tabs.js":
/*!**********************************!*\
  !*** ./src/kmt-controls/tabs.js ***!
  \**********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _options_options_component__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../options/options-component */ "./src/options/options-component.js");




var Dashicon = wp.components.Dashicon;
var __ = wp.i18n.__;


var TabsComponent = function TabsComponent(props) {
  var tabs = props.params.tabs ? props.params.tabs : {};

  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_3__["useState"])({
    currentTab: 0
  }),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState, 2),
      state = _useState2[0],
      setState = _useState2[1];

  Object(react__WEBPACK_IMPORTED_MODULE_3__["useEffect"])(function () {
    document.dispatchEvent(new CustomEvent("kmtSubOptionsReady"));
  }, [state]);
  var currentTab = tabs[Object.keys(tabs)[state.currentTab]];
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(react__WEBPACK_IMPORTED_MODULE_3__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("ul", {
    className: "tabs"
  }, Object.keys(tabs).map(function (tab, index) {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("li", {
      onClick: function onClick() {
        setState({
          currentTab: index
        });
      },
      className: index === state.currentTab && 'active'
    }, tabs[tab].title);
  })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    className: "kmt-options"
  }, Object(_options_options_component__WEBPACK_IMPORTED_MODULE_4__["renderOptions"])(currentTab.options)));
};

TabsComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_2___default.a.object.isRequired,
  customizer: prop_types__WEBPACK_IMPORTED_MODULE_2___default.a.func.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(TabsComponent));

/***/ }),

/***/ "./src/kmt-controls/text.js":
/*!**********************************!*\
  !*** ./src/kmt-controls/text.js ***!
  \**********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_3__);





var TextComponent = function TextComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_3__["useState"])(props.control.get()),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState, 2),
      props_value = _useState2[0],
      setPropsValue = _useState2[1];

  var HandleChange = function HandleChange(value) {
    setPropsValue(value);
    props.onChange(props.id, value);
  };

  var label = props.params.label;
  var labelContent = label ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
    className: "customize-control-title"
  }, label) : null;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null, labelContent, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    className: "customize-control-content"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("input", {
    type: "text",
    value: props_value,
    onChange: function onChange(event) {
      HandleChange(event.target.value);
    }
  })));
};

TextComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_2___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(TextComponent));

/***/ }),

/***/ "./src/kmt-controls/title.js":
/*!***********************************!*\
  !*** ./src/kmt-controls/title.js ***!
  \***********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_1__);




var TitleComponent = function TitleComponent(props) {
  var captionContent = props.params.caption ? htmlCaption = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
    className: "customize-control-caption"
  }, props.params.caption) : null;
  var labelContent = props.params.label ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
    className: "customize-control-title"
  }, props.params.label) : null;
  var descriptionContent = props.params.description ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("span", {
    className: "description customize-control-description"
  }, props.params.description) : null;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, captionContent, labelContent, descriptionContent);
};

TitleComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_1___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(TitleComponent));

/***/ }),

/***/ "./src/kmt-controls/toggle.js":
/*!************************************!*\
  !*** ./src/kmt-controls/toggle.js ***!
  \************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__);







var ToggleControlComponent = function ToggleControlComponent(props) {
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_3__["useState"])(props.control.get()),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState, 2),
      props_value = _useState2[0],
      setPropsValue = _useState2[1];

  var label = props.params.label;
  var labelContent = label ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
    className: "toggle-control-label"
  }, label) : null;

  var updateValues = function updateValues() {
    setPropsValue(!props_value);
    props.control.set(!props_value);
  };

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    className: "toggleControl-wrapper"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ToggleControl"], {
    label: labelContent,
    checked: props_value,
    onChange: function onChange() {
      return updateValues();
    }
  })));
};

ToggleControlComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_2___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(ToggleControlComponent));

/***/ }),

/***/ "./src/kmt-controls/typo-component.js":
/*!********************************************!*\
  !*** ./src/kmt-controls/typo-component.js ***!
  \********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/defineProperty */ "./node_modules/@babel/runtime/helpers/defineProperty.js");
/* harmony import */ var _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/assertThisInitialized */ "./node_modules/@babel/runtime/helpers/assertThisInitialized.js");
/* harmony import */ var _babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/inherits */ "./node_modules/@babel/runtime/helpers/inherits.js");
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @babel/runtime/helpers/possibleConstructorReturn */ "./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js");
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @babel/runtime/helpers/getPrototypeOf */ "./node_modules/@babel/runtime/helpers/getPrototypeOf.js");
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _common_responsive_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ../common/responsive.js */ "./src/common/responsive.js");
/* harmony import */ var _common_color_js__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ../common/color.js */ "./src/common/color.js");
/* harmony import */ var _common_capitalize_first_js__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ../common/capitalize-first.js */ "./src/common/capitalize-first.js");
/* harmony import */ var _common_font_loader_js__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ../common/font-loader.js */ "./src/common/font-loader.js");
/* harmony import */ var _font_pair__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ./font-pair */ "./src/kmt-controls/font-pair.js");
/* harmony import */ var lodash_map__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! lodash/map */ "./node_modules/lodash/map.js");
/* harmony import */ var lodash_map__WEBPACK_IMPORTED_MODULE_15___default = /*#__PURE__*/__webpack_require__.n(lodash_map__WEBPACK_IMPORTED_MODULE_15__);









function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6___default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_6___default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_5___default()(this, result); }; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

/* jshint esversion: 6 */



 // import Icons from '../common/icons.js';





var __ = wp.i18n.__;
var _wp$components = wp.components,
    ButtonGroup = _wp$components.ButtonGroup,
    Popover = _wp$components.Popover,
    Dashicon = _wp$components.Dashicon,
    Toolbar = _wp$components.Toolbar,
    Tooltip = _wp$components.Tooltip,
    Button = _wp$components.Button,
    TextControl = _wp$components.TextControl,
    TabPanel = _wp$components.TabPanel,
    RangeControl = _wp$components.RangeControl,
    SelectControl = _wp$components.SelectControl;
var _wp$element = wp.element,
    Component = _wp$element.Component,
    Fragment = _wp$element.Fragment;

var TypographyComponent = /*#__PURE__*/function (_Component) {
  _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_4___default()(TypographyComponent, _Component);

  var _super = _createSuper(TypographyComponent);

  function TypographyComponent() {
    var _this;

    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_1___default()(this, TypographyComponent);

    _this = _super.apply(this, arguments);
    _this.updateValues = _this.updateValues.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.getSizeUnitSelect = _this.getSizeUnitSelect.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.getUnitSelect = _this.getUnitSelect.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.setTypographyOptions = _this.setTypographyOptions.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.maybesScroll = _this.maybesScroll.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.onColorChange = _this.onColorChange.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.remoteUpdate = _this.remoteUpdate.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.linkRemoteUpdate = _this.linkRemoteUpdate.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    var value;
    var baseDefault;
    var familyBaseDefault = {
      'family': '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"',
      'google': false,
      'fallback': ''
    };
    var allBaseDefault = {
      'size': {
        'desktop': 18
      },
      'sizeType': 'px',
      'lineHeight': {
        'desktop': 1.65
      },
      'lineType': '-',
      'letterSpacing': {
        'desktop': ''
      },
      'spacingType': 'em',
      'family': '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"',
      'google': false,
      'style': 'normal',
      'weight': 'regular',
      'variant': 'regular',
      'color': 'palette4',
      'transform': '',
      'fallback': ''
    };
    var noColorBaseDefault = {
      'size': {
        'desktop': 18
      },
      'sizeType': 'px',
      'lineHeight': {
        'desktop': 1.65
      },
      'lineType': '-',
      'letterSpacing': {
        'desktop': ''
      },
      'spacingType': 'em',
      'family': '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"',
      'google': false,
      'style': 'normal',
      'weight': 'regular',
      'variant': 'regular',
      'transform': '',
      'fallback': ''
    };
    var sizeBaseDefault = {
      'size': {
        'desktop': 18
      },
      'sizeType': 'px',
      'lineHeight': {
        'desktop': 1.65
      },
      'lineType': '-',
      'letterSpacing': {
        'desktop': ''
      },
      'spacingType': 'em',
      'color': 'palette4',
      'transform': ''
    };
    var defaultParams = {
      min: {
        px: '0',
        em: '0',
        rem: '0',
        '-': '0'
      },
      max: {
        px: '140',
        em: '12',
        rem: '12',
        '-': '12'
      },
      step: {
        px: '1',
        em: '0.01',
        rem: '0.01',
        '-': '0.01'
      },
      sizeUnits: ['px', 'em', 'rem'],
      lineUnits: ['-', 'px', 'em', 'rem'],
      spacingUnits: ['px', 'em', 'rem'],
      canInherit: true,
      transform: ['none', 'capitalize', 'uppercase', 'lowercase'],
      id: 'kadence-general-font',
      options: 'all'
    };
    _this.controlParams = defaultParams;

    if ('family' === _this.controlParams.options) {
      baseDefault = familyBaseDefault;
    } else if ('size' === _this.controlParams.options) {
      baseDefault = sizeBaseDefault;
    } else if ('no-color' === _this.controlParams.options) {
      baseDefault = noColorBaseDefault;
    } else {
      baseDefault = allBaseDefault;
    }

    _this.defaultValue = baseDefault;
    value = value ? _objectSpread(_objectSpread({}, JSON.parse(JSON.stringify(_this.defaultValue))), value) : JSON.parse(JSON.stringify(_this.defaultValue));
    _this.state = {
      currentDevice: 'desktop',
      isVisible: false,
      isPreviewVisible: false,
      openTab: 'size',
      typographyOptions: [],
      typographyVariants: [],
      activeFont: [],
      value: value,
      fontVars: [],
      customFontVars: []
    };

    _this.linkRemoteUpdate();

    return _this;
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default()(TypographyComponent, [{
    key: "componentDidMount",
    value: function componentDidMount() {
      var _this2 = this;

      var base_font;
      var heading_font;
      var fontsarray = Object.keys(this.state.fontVars).map(function (name) {
        return {
          label: name,
          value: name,
          google: true,
          group: 'Google Font'
        };
      });
      var customFonts = false;

      if (this.state.customFontVars) {
        customFonts = Object.keys(this.state.customFontVars).map(function (name) {
          return {
            label: name,
            value: name,
            google: false,
            group: 'Custom Font',
            variants: 'custom'
          };
        });
      }

      var inheritFont = [{
        label: 'Inherit',
        value: 'inherit',
        google: false
      }];
      var systemFonts = [{
        label: 'System Default',
        value: '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"',
        google: false,
        variants: 'systemstack'
      }, {
        label: 'Arial, Helvetica, sans-serif',
        value: 'Arial, Helvetica, sans-serif',
        google: false,
        group: 'System Fonts'
      }, {
        label: '"Arial Black", Gadget, sans-serif',
        value: '"Arial Black", Gadget, sans-serif',
        google: false,
        group: 'System Fonts'
      }, {
        label: 'Helvetica, sans-serif',
        value: 'Helvetica, sans-serif',
        google: false,
        group: 'System Fonts'
      }, {
        label: '"Comic Sans MS", cursive, sans-serif',
        value: '"Comic Sans MS", cursive, sans-serif',
        google: false,
        group: 'System Fonts'
      }, {
        label: 'Impact, Charcoal, sans-serif',
        value: 'Impact, Charcoal, sans-serif',
        google: false,
        group: 'System Fonts'
      }, {
        label: '"Lucida Sans Unicode", "Lucida Grande", sans-serif',
        value: '"Lucida Sans Unicode", "Lucida Grande", sans-serif',
        google: false,
        group: 'System Fonts'
      }, {
        label: 'Tahoma, Geneva, sans-serif',
        value: 'Tahoma, Geneva, sans-serif',
        google: false,
        group: 'System Fonts'
      }, {
        label: '"Trebuchet MS", Helvetica, sans-serif',
        value: '"Trebuchet MS", Helvetica, sans-serif',
        google: false,
        group: 'System Fonts'
      }, {
        label: 'Verdana, Geneva, sans-serif',
        value: 'Verdana, Geneva, sans-serif',
        google: false,
        group: 'System Fonts'
      }, {
        label: 'Georgia, serif',
        value: 'Georgia, serif',
        google: false,
        group: 'System Fonts'
      }, {
        label: '"Palatino Linotype", "Book Antiqua", Palatino, serif',
        value: '"Palatino Linotype", "Book Antiqua", Palatino, serif',
        google: false,
        group: 'System Fonts'
      }, {
        label: '"Times New Roman", Times, serif',
        value: '"Times New Roman", Times, serif',
        google: false,
        group: 'System Fonts'
      }, {
        label: 'Courier, monospace',
        value: 'Courier, monospace',
        google: false,
        group: 'System Fonts'
      }, {
        label: '"Lucida Console", Monaco, monospace',
        value: '"Lucida Console", Monaco, monospace',
        google: false,
        group: 'System Fonts'
      }];

      if (customFonts) {
        systemFonts = customFonts.concat(systemFonts);
      }

      var typographyOptions = systemFonts.concat(fontsarray);

      if (this.controlParams.canInherit) {
        base_font = this.props.customizer.control('base_font').setting.get();
        typographyOptions = inheritFont.concat(typographyOptions);
      }

      if (this.controlParams.headingInherit) {
        heading_font = this.props.customizer.control('heading_font').setting.get();
      }

      this.setState({
        typographyOptions: typographyOptions
      });
      var standardVariants = [{
        value: 'regular',
        label: 'Regular',
        weight: 'regular',
        style: 'normal'
      }, {
        value: 'italic',
        label: 'Regular Italic',
        weight: 'regular',
        style: 'italic'
      }, {
        value: '700',
        label: 'Bold 700',
        weight: '700',
        style: 'normal'
      }, {
        value: '700italic',
        label: 'Bold 700 Italic',
        weight: '700',
        style: 'italic'
      }];
      var systemVariants = [{
        value: '100',
        label: 'Thin 100',
        weight: '100',
        style: 'normal'
      }, {
        value: '100italic',
        label: 'Thin 100 Italic',
        weight: '100',
        style: 'italic'
      }, {
        value: '200',
        label: 'Extra-Light 200',
        weight: '200',
        style: 'normal'
      }, {
        value: '200italic',
        label: 'Extra-Light 200 Italic',
        weight: '200',
        style: 'italic'
      }, {
        value: '300',
        label: 'Light 300',
        weight: '300',
        style: 'normal'
      }, {
        value: '300italic',
        label: 'Light 300 Italic',
        weight: '300',
        style: 'italic'
      }, {
        value: 'regular',
        label: 'Regular',
        weight: 'regular',
        style: 'normal'
      }, {
        value: 'italic',
        label: 'Regular Italic',
        weight: 'regular',
        style: 'italic'
      }, {
        value: '500',
        label: 'Medium 500',
        weight: '500',
        style: 'normal'
      }, {
        value: '500italic',
        label: 'Medium 500 Italic',
        weight: '500',
        style: 'italic'
      }, {
        value: '600',
        label: 'Semi-Bold 600',
        weight: '600',
        style: 'normal'
      }, {
        value: '600italic',
        label: 'Semi-Bold 600 Italic',
        weight: '600',
        style: 'italic'
      }, {
        value: '700',
        label: 'Bold 700',
        weight: '700',
        style: 'normal'
      }, {
        value: '700italic',
        label: 'Bold 700 Italic',
        weight: '700',
        style: 'italic'
      }, {
        value: '800',
        label: 'Extra-Bold 800',
        weight: '800',
        style: 'normal'
      }, {
        value: '800italic',
        label: 'Extra-Bold 800 Italic',
        weight: '800',
        style: 'italic'
      }, {
        value: '900',
        label: 'Ultra-Bold 900',
        weight: '900',
        style: 'normal'
      }, {
        value: '900italic',
        label: 'Ultra-Bold 900 Italic',
        weight: '900',
        style: 'italic'
      }];
      var activeFont = typographyOptions ? typographyOptions.filter(function (_ref) {
        var value = _ref.value;
        return value === _this2.state.value.family;
      }) : [{
        label: 'Inherit',
        value: 'inherit',
        google: false
      }];

      if ('inherit' === this.state.value.family && this.controlParams.headingInherit && undefined !== heading_font.family) {
        activeFont = typographyOptions ? typographyOptions.filter(function (_ref2) {
          var value = _ref2.value;
          return value === heading_font.family;
        }) : activeFont;
      } else if ('inherit' === this.state.value.family && undefined !== base_font.family) {
        activeFont = typographyOptions ? typographyOptions.filter(function (_ref3) {
          var value = _ref3.value;
          return value === base_font.family;
        }) : activeFont;
      }

      var fontStandardVariants = standardVariants;

      if (activeFont && activeFont[0]) {
        if (undefined !== activeFont[0].variants && 'systemstack' === activeFont[0].variants) {
          fontStandardVariants = systemVariants;
        }

        if (undefined !== activeFont[0].variants && 'custom' === activeFont[0].variants && this.state.customFontVars && undefined !== this.state.customFontVars[activeFont[0].value]) {
          fontStandardVariants = this.state.customFontVars[activeFont[0].value].v.map(function (opt) {
            return {
              label: Object(_common_capitalize_first_js__WEBPACK_IMPORTED_MODULE_12__["default"])(opt),
              value: opt
            };
          });
        }

        if (activeFont[0].google && activeFont[0].value) {
          fontStandardVariants = this.state.fontVars[activeFont[0].value].v.map(function (opt) {
            return {
              label: Object(_common_capitalize_first_js__WEBPACK_IMPORTED_MODULE_12__["default"])(opt),
              value: opt
            };
          });
        }
      }

      this.setState({
        typographyVariants: fontStandardVariants
      });
      this.setState({
        activeFont: activeFont
      });
    }
  }, {
    key: "setTypographyOptions",
    value: function setTypographyOptions(typographyOptions) {
      var _this3 = this;

      var base_font;
      var heading_font;
      var standardVariants = [{
        value: 'regular',
        label: 'Regular',
        weight: 'regular',
        style: 'normal'
      }, {
        value: 'italic',
        label: 'Regular Italic',
        weight: 'regular',
        style: 'italic'
      }, {
        value: '700',
        label: 'Bold 700',
        weight: '700',
        style: 'normal'
      }, {
        value: '700italic',
        label: 'Bold 700 Italic',
        weight: '700',
        style: 'italic'
      }];
      var systemVariants = [{
        value: '100',
        label: 'Thin 100',
        weight: '100',
        style: 'normal'
      }, {
        value: '100italic',
        label: 'Thin 100 Italic',
        weight: '100',
        style: 'italic'
      }, {
        value: '200',
        label: 'Extra-Light 200',
        weight: '200',
        style: 'normal'
      }, {
        value: '200italic',
        label: 'Extra-Light 200 Italic',
        weight: '200',
        style: 'italic'
      }, {
        value: '300',
        label: 'Light 300',
        weight: '300',
        style: 'normal'
      }, {
        value: '300italic',
        label: 'Light 300 Italic',
        weight: '300',
        style: 'italic'
      }, {
        value: 'regular',
        label: 'Regular',
        weight: 'regular',
        style: 'normal'
      }, {
        value: 'italic',
        label: 'Regular Italic',
        weight: 'regular',
        style: 'italic'
      }, {
        value: '500',
        label: 'Medium 500',
        weight: '500',
        style: 'normal'
      }, {
        value: '500italic',
        label: 'Medium 500 Italic',
        weight: '500',
        style: 'italic'
      }, {
        value: '600',
        label: 'Semi-Bold 600',
        weight: '600',
        style: 'normal'
      }, {
        value: '600italic',
        label: 'Semi-Bold 600 Italic',
        weight: '600',
        style: 'italic'
      }, {
        value: '700',
        label: 'Bold 700',
        weight: '700',
        style: 'normal'
      }, {
        value: '700italic',
        label: 'Bold 700 Italic',
        weight: '700',
        style: 'italic'
      }, {
        value: '800',
        label: 'Extra-Bold 800',
        weight: '800',
        style: 'normal'
      }, {
        value: '800italic',
        label: 'Extra-Bold 800 Italic',
        weight: '800',
        style: 'italic'
      }, {
        value: '900',
        label: 'Ultra-Bold 900',
        weight: '900',
        style: 'normal'
      }, {
        value: '900italic',
        label: 'Ultra-Bold 900 Italic',
        weight: '900',
        style: 'italic'
      }];

      if (this.controlParams.canInherit) {
        base_font = this.props.customizer.control('base_font').setting.get();
      }

      if (this.controlParams.headingInherit) {
        heading_font = this.props.customizer.control('heading_font').setting.get();
      }

      var activeFont = typographyOptions ? typographyOptions.filter(function (_ref4) {
        var value = _ref4.value;
        return value === _this3.state.value.family;
      }) : [{
        label: 'Inherit',
        value: 'inherit',
        google: false
      }];

      if ('inherit' === this.state.value.family && this.controlParams.headingInherit && undefined !== heading_font.family && 'inherit' !== heading_font.family) {
        activeFont = typographyOptions ? typographyOptions.filter(function (_ref5) {
          var value = _ref5.value;
          return value === heading_font.family;
        }) : activeFont;
      } else if ('inherit' === this.state.value.family && undefined !== base_font.family) {
        activeFont = typographyOptions ? typographyOptions.filter(function (_ref6) {
          var value = _ref6.value;
          return value === base_font.family;
        }) : activeFont;
      }

      var fontStandardVariants = standardVariants;

      if (activeFont && activeFont[0]) {
        if (undefined !== activeFont[0].variants && 'systemstack' === activeFont[0].variants) {
          fontStandardVariants = systemVariants;
        }

        if (undefined !== activeFont[0].variants && 'custom' === activeFont[0].variants && this.state.customFontVars && undefined !== this.state.customFontVars[activeFont[0].value]) {
          fontStandardVariants = this.state.customFontVars[activeFont[0].value].v.map(function (opt) {
            return {
              label: Object(_common_capitalize_first_js__WEBPACK_IMPORTED_MODULE_12__["default"])(opt),
              value: opt
            };
          });
        }

        if (activeFont[0].google && activeFont[0].value) {
          fontStandardVariants = this.state.fontVars[activeFont[0].value].v.map(function (opt) {
            return {
              label: Object(_common_capitalize_first_js__WEBPACK_IMPORTED_MODULE_12__["default"])(opt),
              value: opt
            };
          });
        }
      }

      this.setState({
        typographyVariants: fontStandardVariants
      });
      this.setState({
        activeFont: activeFont
      });
    }
  }, {
    key: "maybesScroll",
    value: function maybesScroll(tab) {
      var self = this;

      if ('font' === tab) {
        setTimeout(function () {
          var myElement = document.getElementById(self.controlParams.id + '-active-font');

          if (myElement) {
            var topPos = myElement.offsetTop - 50;
            document.getElementById(self.controlParams.id).scrollTop = topPos;
          }
        }, 100);
      } else if ('style' === tab) {
        setTimeout(function () {
          var myElement = document.getElementById(self.controlParams.id + '-active-style');

          if (myElement) {
            var topPos = myElement.offsetTop - 50;
            document.getElementById(self.controlParams.id + '-style').scrollTop = topPos;
          }
        }, 100);
      }
    }
  }, {
    key: "onColorChange",
    value: function onColorChange(color, isPalette) {
      var value = this.state.value;

      if (isPalette) {
        value.color = isPalette;
      } else if (undefined !== color.rgb && undefined !== color.rgb.a && 1 !== color.rgb.a) {
        value.color = 'rgba(' + color.rgb.r + ',' + color.rgb.g + ',' + color.rgb.b + ',' + color.rgb.a + ')';
      } else {
        value.color = color.hex;
      }

      this.updateValues(value);
    }
  }, {
    key: "render",
    value: function render() {
      var _this4 = this;

      var typographyOptions = this.state.typographyOptions;
      var deviceIndex = this.state.currentDevice;
      var currentFamily;
      var fontVar = this.controlParams.headingInherit ? 'var(--global-heading-font)' : 'var(--global-base-font)';
      var currentSize;
      var currentLineHeight;
      var currentLetterSpacing;

      if ('all' === this.controlParams.options || 'no-color' === this.controlParams.options || 'family' === this.controlParams.options) {
        currentFamily = this.state.value.family && 'inherit' !== this.state.value.family ? this.state.value.family : fontVar;
      }

      if ('all' === this.controlParams.options || 'no-color' === this.controlParams.options || 'size' === this.controlParams.options) {
        // Size
        if (undefined === this.state.value.size[deviceIndex]) {
          var largerDevice = this.state.currentDevice === 'mobile' ? 'tablet' : 'desktop';

          if (undefined !== this.state.value.size[largerDevice] && this.state.value.size[largerDevice]) {
            currentSize = this.state.value.size[largerDevice];
          } else if ('tablet' === largerDevice && undefined !== this.state.value.size['desktop'] && this.state.value.size['desktop']) {
            currentSize = this.state.value.size['desktop'];
          }
        } else if ('' === this.state.value.size[deviceIndex]) {
          var _largerDevice = this.state.currentDevice === 'mobile' ? 'tablet' : 'desktop';

          if (undefined !== this.state.value.size[_largerDevice] && this.state.value.size[_largerDevice]) {
            currentSize = this.state.value.size[_largerDevice];
          } else if ('tablet' === _largerDevice && undefined !== this.state.value.size['desktop'] && this.state.value.size['desktop']) {
            currentSize = this.state.value.size['desktop'];
          }
        } else if ('' !== this.state.value.size[deviceIndex]) {
          currentSize = this.state.value.size[deviceIndex];
        } // Height


        if (undefined === this.state.value.lineHeight[deviceIndex]) {
          var _largerDevice2 = this.state.currentDevice === 'mobile' ? 'tablet' : 'desktop';

          if (undefined !== this.state.value.lineHeight[_largerDevice2] && this.state.value.lineHeight[_largerDevice2]) {
            currentLineHeight = this.state.value.lineHeight[_largerDevice2];
          } else if ('tablet' === _largerDevice2 && undefined !== this.state.value.lineHeight['desktop'] && this.state.value.lineHeight['desktop']) {
            currentLineHeight = this.state.value.lineHeight['desktop'];
          }
        } else if ('' === this.state.value.lineHeight[deviceIndex]) {
          var _largerDevice3 = this.state.currentDevice === 'mobile' ? 'tablet' : 'desktop';

          if (undefined !== this.state.value.lineHeight[_largerDevice3] && this.state.value.lineHeight[_largerDevice3]) {
            currentLineHeight = this.state.value.lineHeight[_largerDevice3];
          } else if ('tablet' === _largerDevice3 && undefined !== this.state.value.lineHeight['desktop'] && this.state.value.lineHeight['desktop']) {
            currentLineHeight = this.state.value.lineHeight['desktop'];
          }
        } else if ('' !== this.state.value.lineHeight[deviceIndex]) {
          currentLineHeight = this.state.value.lineHeight[deviceIndex];
        } // Spacing


        if (undefined === this.state.value.letterSpacing[deviceIndex]) {
          var _largerDevice4 = this.state.currentDevice === 'mobile' ? 'tablet' : 'desktop';

          if (undefined !== this.state.value.letterSpacing[_largerDevice4] && this.state.value.letterSpacing[_largerDevice4]) {
            currentLetterSpacing = this.state.value.letterSpacing[_largerDevice4];
          } else if ('tablet' === _largerDevice4 && undefined !== this.state.value.letterSpacing['desktop'] && this.state.value.letterSpacing['desktop']) {
            currentLetterSpacing = this.state.value.letterSpacing['desktop'];
          }
        } else if ('' === this.state.value.letterSpacing[deviceIndex]) {
          var _largerDevice5 = this.state.currentDevice === 'mobile' ? 'tablet' : 'desktop';

          if (undefined !== this.state.value.letterSpacing[_largerDevice5] && this.state.value.letterSpacing[_largerDevice5]) {
            currentLetterSpacing = this.state.value.letterSpacing[_largerDevice5];
          } else if ('tablet' === _largerDevice5 && undefined !== this.state.value.letterSpacing['desktop'] && this.state.value.letterSpacing['desktop']) {
            currentLetterSpacing = this.state.value.letterSpacing['desktop'];
          }
        } else if ('' !== this.state.value.letterSpacing[deviceIndex]) {
          currentLetterSpacing = this.state.value.letterSpacing[deviceIndex];
        }
      }

      var fontFamilyTab = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Fragment, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        className: "kadence-font-family-search"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(TextControl, {
        type: "text",
        value: this.state.search,
        placeholder: __('Search'),
        autocomplete: "off",
        onChange: function onChange(value) {
          return _this4.setState({
            search: value
          });
        }
      }), undefined !== this.state.search && '' !== this.state.search && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Button, {
        className: "kadence-clear-search",
        onClick: function onClick() {
          _this4.setState({
            search: ''
          });
        }
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Dashicon, {
        icon: "no"
      }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        className: "kadence-font-family-list-wrapper"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(ButtonGroup, {
        id: this.controlParams.id,
        className: "kadence-font-family-list",
        "aria-label": __('Font Family List')
      }, lodash_map__WEBPACK_IMPORTED_MODULE_15___default()(typographyOptions, function (_ref7, index) {
        var label = _ref7.label,
            value = _ref7.value,
            google = _ref7.google,
            group = _ref7.group;

        if (!_this4.state.search || label && label.toLowerCase().includes(_this4.state.search.toLowerCase())) {
          return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Button, {
            key: index,
            id: value === _this4.state.value.family ? _this4.controlParams.id + '-active-font' : undefined,
            className: (value === _this4.state.value.family ? 'active-radio ' : '') + "kadence-font-family-choice",
            onClick: function onClick() {
              return onTypoFontChange(value, google);
            }
          }, label);
        }
      }))));
      var fontStyleTab = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Fragment, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        className: "kadence-font-variant-list-wrapper"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(ButtonGroup, {
        id: this.controlParams.id + '-style',
        className: "kadence-font-variant-list",
        "aria-label": __('Font Style List')
      }, lodash_map__WEBPACK_IMPORTED_MODULE_15___default()(this.state.typographyVariants, function (_ref8, index) {
        var label = _ref8.label,
            value = _ref8.value;
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Button, {
          key: index,
          id: value === _this4.state.value.variant ? _this4.controlParams.id + '-active-style' : undefined,
          className: (value === _this4.state.value.variant ? 'active-radio ' : '') + "kadence-font-variant-choice",
          style: {
            fontFamily: _this4.state.value.family,
            fontWeight: value === 'italic' || value === 'regular' ? 'normal' : value.replace(/[^0-9]/g, ''),
            fontStyle: value.includes('italic') ? 'italic' : 'regular'
          },
          onClick: function onClick() {
            return onVariantFontChange(value);
          }
        }, label);
      }))));
      var fontSizeTab = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Fragment, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        class: "kadence-range-control"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_common_responsive_js__WEBPACK_IMPORTED_MODULE_10__["default"], {
        onChange: function onChange(currentDevice) {
          return _this4.setState({
            currentDevice: currentDevice
          });
        },
        controlLabel: __('Font Size', 'kadence'),
        tooltip: false
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(RangeControl, {
        initialPosition: currentSize ? currentSize : 17,
        value: currentSize,
        onChange: function onChange(val) {
          var value = _this4.state.value;
          value.size[_this4.state.currentDevice] = val;

          _this4.updateValues(value);
        },
        min: this.controlParams.min[this.state.value.sizeType],
        max: this.controlParams.max[this.state.value.sizeType],
        step: this.controlParams.step[this.state.value.sizeType]
      }), this.controlParams.sizeUnits && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        className: "kadence-select-units"
      }, this.getSizeUnitSelect()))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        class: "kadence-range-control"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_common_responsive_js__WEBPACK_IMPORTED_MODULE_10__["default"], {
        onChange: function onChange(currentDevice) {
          return _this4.setState({
            currentDevice: currentDevice
          });
        },
        controlLabel: __('Line Height', 'kadence'),
        tooltip: false
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(RangeControl, {
        initialPosition: currentLineHeight ? currentLineHeight : 1.4,
        value: currentLineHeight,
        onChange: function onChange(val) {
          var value = _this4.state.value;
          value.lineHeight[_this4.state.currentDevice] = val;

          _this4.updateValues(value);
        },
        min: this.controlParams.min[this.state.value.lineType],
        max: this.controlParams.max[this.state.value.lineType],
        step: this.controlParams.step[this.state.value.lineType]
      }), this.controlParams.lineUnits && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        className: "kadence-select-units"
      }, this.getUnitSelect('lineUnits', 'lineType')))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        class: "kadence-range-control"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_common_responsive_js__WEBPACK_IMPORTED_MODULE_10__["default"], {
        onChange: function onChange(currentDevice) {
          return _this4.setState({
            currentDevice: currentDevice
          });
        },
        controlLabel: __('Letter Spacing', 'kadence'),
        tooltip: false
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(RangeControl, {
        value: currentLetterSpacing,
        initialPosition: currentLetterSpacing ? currentLetterSpacing : 1,
        onChange: function onChange(val) {
          var value = _this4.state.value;
          value.letterSpacing[_this4.state.currentDevice] = val;

          _this4.updateValues(value);
        },
        min: -4,
        max: this.controlParams.max[this.state.value.spacingType],
        step: this.controlParams.step[this.state.value.spacingType]
      }), this.controlParams.spacingUnits && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        className: "kadence-select-units"
      }, this.getUnitSelect('spacingUnits', 'spacingType')))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        class: "kadence-range-control kadence-transform-controls"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("span", {
        className: "customize-control-title"
      }, __('Transform')), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(ButtonGroup, {
        className: "kadence-radio-container-control kadence-radio-icon-container-control"
      }, this.controlParams.transform.map(function (item) {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Fragment, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Button, {
          isTertiary: true,
          className: (item === _this4.state.value.transform ? 'active-radio ' : '') + item,
          onClick: function onClick() {
            var value = _this4.state.value;

            if (item === _this4.state.value.transform) {
              value.transform = '';
            } else {
              value.transform = item;
            }

            _this4.updateValues(value);
          }
        }));
      }))));
      var controlLabel = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Fragment, null, this.props.control.params.label && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("span", {
        className: "customize-control-title"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Tooltip, {
        text: __('Reset Values', 'kadence')
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Button, {
        className: "reset kadence-reset",
        onClick: function onClick() {
          _this4.updateValues(_this4.defaultValue);
        }
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Dashicon, {
        icon: "image-rotate"
      }))), this.props.control.params.label, 'base_font' === this.controlParams.id && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_font_pair__WEBPACK_IMPORTED_MODULE_14__["default"], {
        control: this.props.control,
        customizer: this.props.customizer
      })));

      var onTypoFontChange = function onTypoFontChange(selected, isGoogle) {
        var value = _this4.state.value;
        var variant;
        var weight;
        var style;
        var fallback;

        if (isGoogle) {
          if ('family' === _this4.controlParams.options) {
            variant = _this4.state.fontVars[selected].v;
          } else {
            if (_this4.state.fontVars[selected].v.includes(value.variant)) {
              variant = value.variant;
            } else if (!_this4.state.fontVars[selected].v.includes('regular')) {
              variant = _this4.state.fontVars[selected].v[0];
            } else {
              variant = 'regular';
            }

            if (variant === 'regular' || variant === 'italic') {
              weight = 'normal';
            } else {
              weight = variant.replace(/[^0-9]/g, '');
            }

            if (variant.includes('italic')) {
              style = 'italic';
            } else {
              style = 'normal';
            }
          }

          fallback = _this4.state.fontVars[selected].c && _this4.state.fontVars[selected].c[0] ? _this4.state.fontVars[selected].c[0] : '';
        } else {
          variant = 'regular';
          weight = '400';
          style = 'normal';
          fallback = '';
        }

        value.variant = variant;
        value.family = selected;
        value.google = isGoogle ? true : false;
        value.fallback = fallback;

        if ('family' !== _this4.controlParams.options) {
          value.weight = weight;
          value.style = style;
        }

        _this4.updateValues(value);
      };

      var onVariantFontChange = function onVariantFontChange(variant) {
        var value = _this4.state.value;
        var weight;
        var style;

        if (variant === 'regular' || variant === 'italic') {
          weight = 'normal';
        } else {
          weight = variant.replace(/[^0-9]/g, '');
        }

        if (variant.includes('italic')) {
          style = 'italic';
        } else {
          style = 'normal';
        }

        value.variant = variant;
        value.weight = weight;
        value.style = style;

        _this4.updateValues(value);
      };

      var toggleVisible = function toggleVisible(tab) {
        _this4.setTypographyOptions(_this4.state.typographyOptions);

        _this4.setState({
          openTab: tab
        });

        _this4.setState({
          isVisible: true
        });

        _this4.maybesScroll(tab);
      };

      var toggleClose = function toggleClose() {
        if (_this4.state.isVisible === true) {
          _this4.setState({
            isVisible: false
          });
        }
      };

      var toggleVisiblePreview = function toggleVisiblePreview() {
        _this4.setState({
          isPreviewVisible: true
        });
      };

      var toggleClosePreview = function toggleClosePreview() {
        if (_this4.state.isPreviewVisible === true) {
          _this4.setState({
            isPreviewVisible: false
          });
        }
      };

      var configVariants = {
        google: {
          families: [this.state.value.family + ':' + (this.state.value.google && this.state.fontVars[this.state.value.family] && this.state.fontVars[this.state.value.family].v ? this.state.fontVars[this.state.value.family].v.toString() : '')]
        },
        classes: false,
        events: false
      };
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        className: "kadence-control-field kadence-typography-control-wrap"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        className: "kadence-typography-control"
      }, controlLabel, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        className: "kadence-typography-controls"
      }, this.state.isVisible && 'family' === this.controlParams.options && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Popover, {
        position: "top right",
        className: "kadence-popover-color kadence-popover-typography",
        onClose: toggleClose
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        className: "kadence-popover-typography-single-item"
      }, fontFamilyTab)), this.state.isVisible && ('all' === this.controlParams.options || 'no-color' === this.controlParams.options) && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Popover, {
        position: "top left",
        className: "kadence-popover-color kadence-popover-typography",
        onClose: toggleClose
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(TabPanel, {
        className: "kadence-popover-tabs kadence-typography-tabs kadence-background-tabs",
        activeClass: "active-tab",
        initialTabName: this.state.openTab,
        onSelect: function onSelect(value) {
          return _this4.maybesScroll(value);
        },
        tabs: [{
          name: 'font',
          title: __('Font', 'kadence'),
          className: 'kadence-font-typography'
        }, {
          name: 'style',
          title: __('Style', 'kadence'),
          className: 'kadence-style-typography'
        }, {
          name: 'size',
          title: __('Size', 'kadence'),
          className: 'kadence-size-typography'
        }]
      }, function (tab) {
        var tabout;

        if (tab.name) {
          if ('style' === tab.name) {
            tabout = fontStyleTab;
          } else if ('font' === tab.name) {
            tabout = fontFamilyTab;
          } else {
            tabout = fontSizeTab;
          }
        }

        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", null, tabout);
      })), 'all' === this.controlParams.options && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_common_color_js__WEBPACK_IMPORTED_MODULE_11__["default"], {
        presetColors: this.state.colorPalette,
        color: undefined !== this.state.value.color && this.state.value.color ? this.state.value.color : '',
        usePalette: true,
        onChangeComplete: function onChangeComplete(color, isPalette) {
          return _this4.onColorChange(color, isPalette);
        },
        customizer: this.props.customizer
      }), ('all' === this.controlParams.options || 'family' === this.controlParams.options || 'no-color' === this.controlParams.options) && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Tooltip, {
        text: this.controlParams.tooltip ? this.controlParams.tooltip : __('Select Font', 'kadence')
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        className: "typography-button-wrap"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Button, {
        className: 'kadence-typography-family-indicate',
        onClick: function onClick() {
          _this4.state.isVisible ? toggleClose() : toggleVisible('font');
        }
      }, this.state.value.family === '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"' ? 'System Default' : Object(_common_capitalize_first_js__WEBPACK_IMPORTED_MODULE_12__["default"])(this.state.value.family)))), ('all' === this.controlParams.options || 'no-color' === this.controlParams.options) && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Tooltip, {
        text: this.controlParams.tooltip ? this.controlParams.tooltip : __('Select Style', 'kadence')
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        className: "typography-button-wrap"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Button, {
        className: 'kadence-typography-style-indicate',
        onClick: function onClick() {
          _this4.state.isVisible ? toggleClose() : toggleVisible('style');
        }
      }, this.state.value.variant ? this.state.value.variant : __('inherit', 'kadence')))), ('all' === this.controlParams.options || 'size' === this.controlParams.options || 'no-color' === this.controlParams.options) && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Tooltip, {
        text: this.controlParams.tooltip ? this.controlParams.tooltip : __('Select Size', 'kadence')
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        className: "typography-button-wrap"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Button, {
        className: 'kadence-typography-size-indicate',
        onClick: function onClick() {
          _this4.state.isVisible ? toggleClose() : toggleVisible('size');
        }
      }, currentSize ? currentSize + this.state.value.sizeType : __('inherit', 'kadence')))), ('all' === this.controlParams.options || 'family' === this.controlParams.options || 'no-color' === this.controlParams.options) && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Tooltip, {
        text: __('Show Preview Text', 'kadence')
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        className: "typography-button-wrap"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Button, {
        className: 'kadence-typography-preview-indicate',
        onClick: function onClick() {
          _this4.state.isPreviewVisible ? toggleClosePreview() : toggleVisiblePreview();
        }
      }, this.state.isPreviewVisible ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Dashicon, {
        icon: "arrow-up"
      }) : Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Dashicon, {
        icon: "arrow-down"
      })))))), this.state.value.google && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(_common_font_loader_js__WEBPACK_IMPORTED_MODULE_13__["default"], {
        config: configVariants
      }), this.state.isPreviewVisible && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])("div", {
        className: "kadence-preview-font",
        style: {
          fontFamily: currentFamily,
          fontWeight: 'all' === this.controlParams.options || 'no-color' === this.controlParams.options ? this.state.value.weight : 'bold',
          fontStyle: 'all' === this.controlParams.options || 'no-color' === this.controlParams.options ? this.state.value.style : undefined,
          fontSize: 'all' === this.controlParams.options || 'no-color' === this.controlParams.options ? currentSize + this.state.value.sizeType : undefined,
          lineHeight: 'all' === this.controlParams.options || 'no-color' === this.controlParams.options ? currentLineHeight + ('-' === this.state.value.lineType ? '' : this.state.value.lineType) : 1.3,
          letterSpacing: ('all' === this.controlParams.options || 'no-color' === this.controlParams.options) && currentLetterSpacing ? currentLetterSpacing + this.state.value.spacingType : undefined,
          textTransform: ('all' === this.controlParams.options || 'no-color' === this.controlParams.options) && this.state.value.transform ? this.state.value.transform : undefined,
          color: this.state.value.color && this.state.value.color.includes('palette') ? 'var(--global-' + this.state.value.color + ')' : this.state.value.color
        }
      }, __('Design is not just what it looks like and feels like. Design is how it works.', 'kadence')));
    }
  }, {
    key: "getUnitSelect",
    value: function getUnitSelect(unitType, unitSetting) {
      var _this5 = this;

      var units = this.controlParams[unitType];

      if (this.state.currentDevice !== 'desktop') {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Button, {
          className: "is-single",
          disabled: true
        }, this.state.value[unitSetting]);
      }

      var unitOptions = units.map(function (unit) {
        return {
          label: unit,
          value: unit
        };
      });
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(SelectControl, {
        value: this.state.value[unitSetting],
        options: unitOptions,
        onChange: function onChange(val) {
          var value = _this5.state.value;
          value[unitSetting] = val;

          _this5.updateValues(value);
        }
      });
    }
  }, {
    key: "getSizeUnitSelect",
    value: function getSizeUnitSelect() {
      var _this6 = this;

      var sizeUnits = this.controlParams.sizeUnits;

      if (this.state.currentDevice !== 'desktop') {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(Button, {
          className: "is-single",
          disabled: true
        }, this.state.value.sizeType);
      }

      var unitOptions = sizeUnits.map(function (unit) {
        return {
          label: unit,
          value: unit
        };
      });
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_7__["createElement"])(SelectControl, {
        value: this.state.value.sizeType,
        options: unitOptions,
        onChange: function onChange(val) {
          var value = _this6.state.value;
          value['sizeType'] = val;

          _this6.updateValues(value);
        }
      });
    }
  }, {
    key: "updateValues",
    value: function updateValues(value) {
      this.setTypographyOptions(this.state.typographyOptions);

      if ('base_font' === this.controlParams.id) {
        document.documentElement.style.setProperty('--global-base-font', value.family);
      }

      if ('heading_font' === this.controlParams.id) {
        document.documentElement.style.setProperty('--global-heading-font', value.family);
      }

      this.setState({
        value: value
      });
      this.props.control.setting.set(_objectSpread(_objectSpread(_objectSpread({}, this.props.control.setting.get()), value), {}, {
        flag: !this.props.control.setting.get().flag
      }));
    }
  }, {
    key: "linkRemoteUpdate",
    value: function linkRemoteUpdate() {
      if ('base_font' === this.controlParams.id || 'heading_font' === this.controlParams.id) {
        var self = this;
        document.addEventListener('kadenceRemoteUpdateFonts', function (e) {
          if (e.detail === 'typography') {
            self.remoteUpdate();
          }
        });
      }
    }
  }, {
    key: "remoteUpdate",
    value: function remoteUpdate() {
      var allBaseDefault = {
        'size': {
          'desktop': 18
        },
        'sizeType': 'px',
        'lineHeight': {
          'desktop': 1.65
        },
        'lineType': '-',
        'letterSpacing': {
          'desktop': ''
        },
        'spacingType': 'em',
        'family': '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"',
        'google': false,
        'style': 'normal',
        'weight': 'regular',
        'variant': 'regular',
        'color': 'palette4',
        'transform': '',
        'fallback': ''
      };
      var familyBaseDefault = {
        'family': '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"',
        'google': false,
        'fallback': ''
      };

      if ('heading_font' === this.controlParams.id) {
        allBaseDefault = familyBaseDefault;
      }

      var value = this.props.control.setting.get();
      value = value ? _objectSpread(_objectSpread({}, JSON.parse(JSON.stringify(allBaseDefault))), value) : JSON.parse(JSON.stringify(allBaseDefault));
      this.setState({
        value: value
      });
    }
  }]);

  return TypographyComponent;
}(Component);

TypographyComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_8___default.a.object.isRequired,
  customizer: prop_types__WEBPACK_IMPORTED_MODULE_8___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (TypographyComponent);

/***/ }),

/***/ "./src/options/control.js":
/*!********************************!*\
  !*** ./src/options/control.js ***!
  \********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _options_component__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./options-component */ "./src/options/options-component.js");
/* harmony import */ var _common_responsive_helper__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../common/responsive-helper */ "./src/common/responsive-helper.js");




var renderOptions = function renderOptions(control) {
  Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["render"])(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_options_component__WEBPACK_IMPORTED_MODULE_1__["default"], {
    control: control
  }), control.container[0]);
  document.dispatchEvent(new CustomEvent("kmtOptionsReady", {
    detail: control
  }));
  document.addEventListener('kmtSubOptionsReady', function () {
    document.dispatchEvent(new CustomEvent("kmtOptionsReady", {
      detail: control
    }));
  });
};

document.addEventListener('DOMContentLoaded', function () {
  setTimeout(function () {
    Object.values(wp.customize.control._value).filter(function (_ref) {
      var type = _ref.params.type;
      return type === 'kmt-options';
    }).map(function (control) {
      (wp.customize.panel(control.section()) ? wp.customize.panel : wp.customize.section)(control.section(), function (section) {
        section.expanded.bind(function (value) {
          if (value) {
            renderOptions(control);
            return;
          }

          setTimeout(function () {
            Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["unmountComponentAtNode"])(control.container[0]);
          }, 500);
        });
      });
    });
  });
});
document.addEventListener('kmtExpandedBuilder', function (_ref2) {
  var _ref2$detail = _ref2.detail,
      control = _ref2$detail.control,
      isExpanded = _ref2$detail.isExpanded;

  if (isExpanded) {
    renderOptions(control);
    return;
  }

  setTimeout(function () {
    Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["unmountComponentAtNode"])(control.container[0]);
  }, 500);
});
document.addEventListener('kmtOptionsReady', function (_ref3) {
  var control = _ref3.detail;

  if (control) {
    // Color
    'use strict';

    jQuery(document).mouseup(function (e) {
      var container = jQuery(control.container);
      var colorWrap = container.find('.color-button-wrap');
      var resetBtnWrap = container.find('.kmt-color-btn-reset-wrap');
      var colorContainer = container.find('.kemet-color-picker-wrap'); // If the target of the click isn't the container nor a descendant of the container.

      if (!colorWrap.is(e.target) && colorContainer.has(e.target).length === 0 && resetBtnWrap.has(e.target).length === 0) {
        container.find('.components-button.kemet-color-icon-indicate.open').click();
      }
    }); // Responsive

    Object(_common_responsive_helper__WEBPACK_IMPORTED_MODULE_2__["kemetGetResponsiveJs"])(control);
  }
});

/***/ }),

/***/ "./src/options/options-component.js":
/*!******************************************!*\
  !*** ./src/options/options-component.js ***!
  \******************************************/
/*! exports provided: getSettingId, getSetting, isDisplay, renderOptions, default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getSettingId", function() { return getSettingId; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getSetting", function() { return getSetting; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isDisplay", function() { return isDisplay; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "renderOptions", function() { return renderOptions; });
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _kmt_controls_color__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../kmt-controls/color */ "./src/kmt-controls/color.js");
/* harmony import */ var _kmt_controls_responsive_slider__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../kmt-controls/responsive-slider */ "./src/kmt-controls/responsive-slider.js");
/* harmony import */ var _kmt_controls_slider__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../kmt-controls/slider */ "./src/kmt-controls/slider.js");
/* harmony import */ var _kmt_controls_responsive_spacing__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../kmt-controls/responsive-spacing */ "./src/kmt-controls/responsive-spacing.js");
/* harmony import */ var _kmt_controls_tabs__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ../kmt-controls/tabs */ "./src/kmt-controls/tabs.js");
/* harmony import */ var _kmt_controls_select__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ../kmt-controls/select */ "./src/kmt-controls/select.js");
/* harmony import */ var _kmt_controls_title__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ../kmt-controls/title */ "./src/kmt-controls/title.js");
/* harmony import */ var _kmt_controls_layout_builder_builder_component__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ../kmt-controls/layout-builder/builder-component */ "./src/kmt-controls/layout-builder/builder-component.js");
/* harmony import */ var _kmt_controls_available__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ../kmt-controls/available */ "./src/kmt-controls/available.js");
/* harmony import */ var _kmt_controls_toggle__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ../kmt-controls/toggle */ "./src/kmt-controls/toggle.js");
/* harmony import */ var _kmt_controls_builder_tabs__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ../kmt-controls/builder-tabs */ "./src/kmt-controls/builder-tabs.js");
/* harmony import */ var _kmt_controls_text__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! ../kmt-controls/text */ "./src/kmt-controls/text.js");
/* harmony import */ var _kmt_controls_editor__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! ../kmt-controls/editor */ "./src/kmt-controls/editor.js");
/* harmony import */ var _kmt_controls_focus__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! ../kmt-controls/focus */ "./src/kmt-controls/focus.js");
/* harmony import */ var _kmt_controls_sortable__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! ../kmt-controls/sortable */ "./src/kmt-controls/sortable.js");
/* harmony import */ var _kmt_controls_background__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! ../kmt-controls/background */ "./src/kmt-controls/background.js");
/* harmony import */ var _Background_background_component__WEBPACK_IMPORTED_MODULE_20__ = __webpack_require__(/*! ../Background/background-component */ "./src/Background/background-component.js");
/* harmony import */ var _kmt_controls_typo_component__WEBPACK_IMPORTED_MODULE_21__ = __webpack_require__(/*! ../kmt-controls/typo-component */ "./src/kmt-controls/typo-component.js");






















var wpOptions = ["custom_logo", "blogname", "blogdescription"];

var OptionComponent = function OptionComponent(type) {
  var OptionComponent;

  switch (type) {
    case 'kmt-color':
      OptionComponent = _kmt_controls_color__WEBPACK_IMPORTED_MODULE_4__["default"];
      break;

    case 'kmt-slider':
      OptionComponent = _kmt_controls_slider__WEBPACK_IMPORTED_MODULE_6__["default"];
      break;

    case 'kmt-responsive-slider':
      OptionComponent = _kmt_controls_responsive_slider__WEBPACK_IMPORTED_MODULE_5__["default"];
      break;

    case 'kmt-responsive-spacing':
      OptionComponent = _kmt_controls_responsive_spacing__WEBPACK_IMPORTED_MODULE_7__["default"];
      break;

    case 'kmt-tabs':
      OptionComponent = _kmt_controls_tabs__WEBPACK_IMPORTED_MODULE_8__["default"];
      break;

    case 'kmt-select':
      OptionComponent = _kmt_controls_select__WEBPACK_IMPORTED_MODULE_9__["default"];
      break;

    case 'kmt-title':
      OptionComponent = _kmt_controls_title__WEBPACK_IMPORTED_MODULE_10__["default"];
      break;

    case 'kmt-builder':
      OptionComponent = _kmt_controls_layout_builder_builder_component__WEBPACK_IMPORTED_MODULE_11__["default"];
      break;

    case 'kmt-available':
      OptionComponent = _kmt_controls_available__WEBPACK_IMPORTED_MODULE_12__["default"];
      break;

    case 'kmt-switcher':
      OptionComponent = _kmt_controls_toggle__WEBPACK_IMPORTED_MODULE_13__["default"];
      break;

    case 'kmt-builder-tabs':
      OptionComponent = _kmt_controls_builder_tabs__WEBPACK_IMPORTED_MODULE_14__["default"];
      break;

    case 'kmt-text':
      OptionComponent = _kmt_controls_text__WEBPACK_IMPORTED_MODULE_15__["default"];
      break;

    case 'kmt-editor':
      OptionComponent = _kmt_controls_editor__WEBPACK_IMPORTED_MODULE_16__["default"];
      break;

    case 'kmt-focus-button':
      OptionComponent = _kmt_controls_focus__WEBPACK_IMPORTED_MODULE_17__["default"];
      break;

    case 'kmt-sortable':
      OptionComponent = _kmt_controls_sortable__WEBPACK_IMPORTED_MODULE_18__["default"];
      break;

    case 'kmt-background':
      OptionComponent = _Background_background_component__WEBPACK_IMPORTED_MODULE_20__["default"];
      break;

    case 'kmt-typography':
      OptionComponent = _kmt_controls_typo_component__WEBPACK_IMPORTED_MODULE_21__["default"];
      ;
      break;
  }

  return OptionComponent;
};

var getSettingId = function getSettingId(id) {
  var setting = wpOptions.includes(id) ? id : KemetCustomizerData.setting.replace("setting_name", id);
  return setting;
};
var getSetting = function getSetting(settingName) {
  var setting;

  switch (settingName) {
    case "device":
      setting = wp.customize.previewedDevice;
      break;

    default:
      setting = getSettingId(settingName);
      setting = wp.customize(setting);
      break;
  }

  return setting;
};
var isDisplay = function isDisplay(rules) {
  var setting = '';
  var relation = undefined != rules.relation ? rules.relation : "AND",
      isVisible = "AND" === relation ? true : false;

  _.each(rules, function (rule, ruleKey) {
    if ("relation" == ruleKey) {
      return;
    }

    var boolean = false,
        operator = undefined != rule.operator ? rule.operator : "=",
        ruleValue = rule.value;
    setting = getSetting(rule.setting);
    var settingValue = setting.get();

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
  _.each(rules, function (rule) {
    var setting = getSetting(rule.setting);

    if (undefined != setting) {
      setting.bind(function () {
        onChange(isDisplay(rules));
      });
    }
  });
};

var SingleOptionComponent = function SingleOptionComponent(_ref) {
  var optionId = _ref.optionId,
      option = _ref.option,
      control = _ref.control;
  var context = option.context ? isDisplay(option.context) : true;

  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_3__["useState"])(context),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState, 2),
      isVisible = _useState2[0],
      setVisible = _useState2[1];

  var onChange = function onChange(value) {
    setVisible(value);
  };

  if (option.context) {
    toggleVisible(option.context, onChange);
  }

  var Option = OptionComponent(option.type);
  return isVisible && option.type && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    id: optionId,
    className: "customize-control-".concat(option.type)
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(Option, {
    id: optionId,
    params: option,
    control: control,
    customizer: wp.customize,
    onChange: function onChange(key, value) {
      key = getSettingId(key);
      wp.customize(key).set(value);
    }
  }));
};

var renderOptions = function renderOptions(options) {
  return Object.keys(options).map(function (optionId) {
    var controlName = getSettingId(optionId);
    var control = wp.customize(controlName);
    var option = options[optionId];
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(SingleOptionComponent, {
      optionId: optionId,
      option: option,
      control: control,
      key: optionId
    });
  });
};

var OptionsComponent = function OptionsComponent(_ref2) {
  var control = _ref2.control;
  var options = control.params.data.options;
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
    className: "kmt-options"
  }, renderOptions(options));
};

/* harmony default export */ __webpack_exports__["default"] = (OptionsComponent);

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["components"]; }());

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["element"]; }());

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["i18n"]; }());

/***/ }),

/***/ "@wordpress/media-utils":
/*!************************************!*\
  !*** external ["wp","mediaUtils"] ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["mediaUtils"]; }());

/***/ }),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["React"]; }());

/***/ })

/******/ });
//# sourceMappingURL=index.js.map