/******/ (function (modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if (installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
      /******/
    }
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
      /******/
    };
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
    /******/
  }
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function (exports, name, getter) {
/******/ 		if (!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
      /******/
    }
    /******/
  };
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function (exports) {
/******/ 		if (typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
      /******/
    }
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
    /******/
  };
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function (value, mode) {
/******/ 		if (mode & 1) value = __webpack_require__(value);
/******/ 		if (mode & 8) return value;
/******/ 		if ((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if (mode & 2 && typeof value != 'string') for (var key in value) __webpack_require__.d(ns, key, function (key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
    /******/
  };
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function (module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
    /******/
  };
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function (object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/index.js");
  /******/
})
/************************************************************************/
/******/({

/***/ "./node_modules/@babel/runtime/helpers/arrayLikeToArray.js":
/*!*****************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/arrayLikeToArray.js ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function (module, exports) {

      function _arrayLikeToArray(arr, len) {
        if (len == null || len > arr.length) len = arr.length;

        for (var i = 0, arr2 = new Array(len); i < len; i++) {
          arr2[i] = arr[i];
        }

        return arr2;
      }

      module.exports = _arrayLikeToArray;
      module.exports["default"] = module.exports, module.exports.__esModule = true;

      /***/
    }),

/***/ "./node_modules/@babel/runtime/helpers/arrayWithHoles.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/arrayWithHoles.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function (module, exports) {

      function _arrayWithHoles(arr) {
        if (Array.isArray(arr)) return arr;
      }

      module.exports = _arrayWithHoles;
      module.exports["default"] = module.exports, module.exports.__esModule = true;

      /***/
    }),

/***/ "./node_modules/@babel/runtime/helpers/arrayWithoutHoles.js":
/*!******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/arrayWithoutHoles.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function (module, exports, __webpack_require__) {

      var arrayLikeToArray = __webpack_require__(/*! ./arrayLikeToArray.js */ "./node_modules/@babel/runtime/helpers/arrayLikeToArray.js");

      function _arrayWithoutHoles(arr) {
        if (Array.isArray(arr)) return arrayLikeToArray(arr);
      }

      module.exports = _arrayWithoutHoles;
      module.exports["default"] = module.exports, module.exports.__esModule = true;

      /***/
    }),

/***/ "./node_modules/@babel/runtime/helpers/assertThisInitialized.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/assertThisInitialized.js ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function (module, exports) {

      function _assertThisInitialized(self) {
        if (self === void 0) {
          throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
        }

        return self;
      }

      module.exports = _assertThisInitialized;
      module.exports["default"] = module.exports, module.exports.__esModule = true;

      /***/
    }),

/***/ "./node_modules/@babel/runtime/helpers/classCallCheck.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/classCallCheck.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function (module, exports) {

      function _classCallCheck(instance, Constructor) {
        if (!(instance instanceof Constructor)) {
          throw new TypeError("Cannot call a class as a function");
        }
      }

      module.exports = _classCallCheck;
      module.exports["default"] = module.exports, module.exports.__esModule = true;

      /***/
    }),

/***/ "./node_modules/@babel/runtime/helpers/createClass.js":
/*!************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/createClass.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function (module, exports) {

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

      /***/
    }),

/***/ "./node_modules/@babel/runtime/helpers/defineProperty.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/defineProperty.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function (module, exports) {

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

      /***/
    }),

/***/ "./node_modules/@babel/runtime/helpers/extends.js":
/*!********************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/extends.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function (module, exports) {

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

      /***/
    }),

/***/ "./node_modules/@babel/runtime/helpers/getPrototypeOf.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/getPrototypeOf.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function (module, exports) {

      function _getPrototypeOf(o) {
        module.exports = _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) {
          return o.__proto__ || Object.getPrototypeOf(o);
        };
        module.exports["default"] = module.exports, module.exports.__esModule = true;
        return _getPrototypeOf(o);
      }

      module.exports = _getPrototypeOf;
      module.exports["default"] = module.exports, module.exports.__esModule = true;

      /***/
    }),

/***/ "./node_modules/@babel/runtime/helpers/inherits.js":
/*!*********************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/inherits.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function (module, exports, __webpack_require__) {

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

      /***/
    }),

/***/ "./node_modules/@babel/runtime/helpers/iterableToArray.js":
/*!****************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/iterableToArray.js ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function (module, exports) {

      function _iterableToArray(iter) {
        if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter);
      }

      module.exports = _iterableToArray;
      module.exports["default"] = module.exports, module.exports.__esModule = true;

      /***/
    }),

/***/ "./node_modules/@babel/runtime/helpers/iterableToArrayLimit.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/iterableToArrayLimit.js ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function (module, exports) {

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

      /***/
    }),

/***/ "./node_modules/@babel/runtime/helpers/nonIterableRest.js":
/*!****************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/nonIterableRest.js ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function (module, exports) {

      function _nonIterableRest() {
        throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
      }

      module.exports = _nonIterableRest;
      module.exports["default"] = module.exports, module.exports.__esModule = true;

      /***/
    }),

/***/ "./node_modules/@babel/runtime/helpers/nonIterableSpread.js":
/*!******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/nonIterableSpread.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function (module, exports) {

      function _nonIterableSpread() {
        throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
      }

      module.exports = _nonIterableSpread;
      module.exports["default"] = module.exports, module.exports.__esModule = true;

      /***/
    }),

/***/ "./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js":
/*!**************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js ***!
  \**************************************************************************/
/*! no static exports found */
/***/ (function (module, exports, __webpack_require__) {

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

      /***/
    }),

/***/ "./node_modules/@babel/runtime/helpers/setPrototypeOf.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/setPrototypeOf.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function (module, exports) {

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

      /***/
    }),

/***/ "./node_modules/@babel/runtime/helpers/slicedToArray.js":
/*!**************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/slicedToArray.js ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function (module, exports, __webpack_require__) {

      var arrayWithHoles = __webpack_require__(/*! ./arrayWithHoles.js */ "./node_modules/@babel/runtime/helpers/arrayWithHoles.js");

      var iterableToArrayLimit = __webpack_require__(/*! ./iterableToArrayLimit.js */ "./node_modules/@babel/runtime/helpers/iterableToArrayLimit.js");

      var unsupportedIterableToArray = __webpack_require__(/*! ./unsupportedIterableToArray.js */ "./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js");

      var nonIterableRest = __webpack_require__(/*! ./nonIterableRest.js */ "./node_modules/@babel/runtime/helpers/nonIterableRest.js");

      function _slicedToArray(arr, i) {
        return arrayWithHoles(arr) || iterableToArrayLimit(arr, i) || unsupportedIterableToArray(arr, i) || nonIterableRest();
      }

      module.exports = _slicedToArray;
      module.exports["default"] = module.exports, module.exports.__esModule = true;

      /***/
    }),

/***/ "./node_modules/@babel/runtime/helpers/toConsumableArray.js":
/*!******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/toConsumableArray.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function (module, exports, __webpack_require__) {

      var arrayWithoutHoles = __webpack_require__(/*! ./arrayWithoutHoles.js */ "./node_modules/@babel/runtime/helpers/arrayWithoutHoles.js");

      var iterableToArray = __webpack_require__(/*! ./iterableToArray.js */ "./node_modules/@babel/runtime/helpers/iterableToArray.js");

      var unsupportedIterableToArray = __webpack_require__(/*! ./unsupportedIterableToArray.js */ "./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js");

      var nonIterableSpread = __webpack_require__(/*! ./nonIterableSpread.js */ "./node_modules/@babel/runtime/helpers/nonIterableSpread.js");

      function _toConsumableArray(arr) {
        return arrayWithoutHoles(arr) || iterableToArray(arr) || unsupportedIterableToArray(arr) || nonIterableSpread();
      }

      module.exports = _toConsumableArray;
      module.exports["default"] = module.exports, module.exports.__esModule = true;

      /***/
    }),

/***/ "./node_modules/@babel/runtime/helpers/typeof.js":
/*!*******************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/typeof.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function (module, exports) {

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

      /***/
    }),

/***/ "./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js":
/*!***************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function (module, exports, __webpack_require__) {

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

      /***/
    }),

/***/ "./node_modules/classnames/index.js":
/*!******************************************!*\
  !*** ./node_modules/classnames/index.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function (module, exports, __webpack_require__) {

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

        if (true && module.exports) {
          classNames.default = classNames;
          module.exports = classNames;
        } else if (true) {
          // register as 'classnames', consistent with npm package name
          !(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function () {
            return classNames;
          }).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
            __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
        } else { }
      }());


      /***/
    }),

/***/ "./node_modules/object-assign/index.js":
/*!*********************************************!*\
  !*** ./node_modules/object-assign/index.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function (module, exports, __webpack_require__) {

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


      /***/
    }),

/***/ "./node_modules/prop-types/checkPropTypes.js":
/*!***************************************************!*\
  !*** ./node_modules/prop-types/checkPropTypes.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function (module, exports, __webpack_require__) {

      "use strict";
      /**
       * Copyright (c) 2013-present, Facebook, Inc.
       *
       * This source code is licensed under the MIT license found in the
       * LICENSE file in the root directory of this source tree.
       */



      var printWarning = function () { };

      if (true) {
        var ReactPropTypesSecret = __webpack_require__(/*! ./lib/ReactPropTypesSecret */ "./node_modules/prop-types/lib/ReactPropTypesSecret.js");
        var loggedTypeFailures = {};
        var has = Function.call.bind(Object.prototype.hasOwnProperty);

        printWarning = function (text) {
          var message = 'Warning: ' + text;
          if (typeof console !== 'undefined') {
            console.error(message);
          }
          try {
            // --- Welcome to debugging React ---
            // This error was thrown as a convenience so that you can use this stack
            // to find the callsite that caused this warning to fire.
            throw new Error(message);
          } catch (x) { }
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
      checkPropTypes.resetWarningCache = function () {
        if (true) {
          loggedTypeFailures = {};
        }
      }

      module.exports = checkPropTypes;


      /***/
    }),

/*!************************************************************!*\
  !*** ./node_modules/prop-types/factoryWithTypeCheckers.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function (module, exports, __webpack_require__) {

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
      var printWarning = function () { };

      if (true) {
        printWarning = function (text) {
          var message = 'Warning: ' + text;
          if (typeof console !== 'undefined') {
            console.error(message);
          }
          try {
            // --- Welcome to debugging React ---
            // This error was thrown as a convenience so that you can use this stack
            // to find the callsite that caused this warning to fire.
            throw new Error(message);
          } catch (x) { }
        };
      }

      function emptyFunctionThatReturnsNull() {
        return null;
      }

      module.exports = function (isValidElement, throwOnDirectAccess) {
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
              } else if (true && typeof console !== 'undefined') {
                // Old behavior for people using React.PropTypes
                var cacheKey = componentName + ':' + propName;
                if (
                  !manualPropTypeCallCache[cacheKey] &&
                  // Avoid spamming the console because they are often not actionable except for lib authors
                  manualPropTypeWarningCount < 3
                ) {
                  printWarning(
                    'You are manually calling a React.PropTypes validation ' +
                    'function for the `' + propFullName + '` prop on `' + componentName + '`. This is deprecated ' +
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
                  '\nValid keys: ' + JSON.stringify(Object.keys(shapeTypes), null, '  ')
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


      /***/
    }),

/***/ "./node_modules/prop-types/index.js":
/*!******************************************!*\
  !*** ./node_modules/prop-types/index.js ***!
  \******************************************/
/*! no static exports found */
/***/(function (module, exports, __webpack_require__) {

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
    } else { }


    /***/
  }),

/***/ "./node_modules/prop-types/lib/ReactPropTypesSecret.js":
/*!*************************************************************!*\
  !*** ./node_modules/prop-types/lib/ReactPropTypesSecret.js ***!
  \*************************************************************/
/*! no static exports found */
/***/(function (module, exports, __webpack_require__) {

    "use strict";
    /**
     * Copyright (c) 2013-present, Facebook, Inc.
     *
     * This source code is licensed under the MIT license found in the
     * LICENSE file in the root directory of this source tree.
     */



    var ReactPropTypesSecret = 'SECRET_DO_NOT_PASS_THIS_OR_YOU_WILL_BE_FIRED';

    module.exports = ReactPropTypesSecret;


    /***/
  }),

/***/ "./node_modules/react-is/cjs/react-is.development.js":
/*!***********************************************************!*\
  !*** ./node_modules/react-is/cjs/react-is.development.js ***!
  \***********************************************************/
/*! no static exports found */
/***/(function (module, exports, __webpack_require__) {

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
      (function () {
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


    /***/
  }),

/***/ "./node_modules/react-is/index.js":
/*!****************************************!*\
  !*** ./node_modules/react-is/index.js ***!
  \****************************************/
/*! no static exports found */
/***/(function (module, exports, __webpack_require__) {

    "use strict";


    if (false) { } else {
      module.exports = __webpack_require__(/*! ./cjs/react-is.development.js */ "./node_modules/react-is/cjs/react-is.development.js");
    }


    /***/
  }),

/***/ "./node_modules/react-sortablejs/dist/index.js":
/*!*****************************************************!*\
  !*** ./node_modules/react-sortablejs/dist/index.js ***!
  \*****************************************************/
/*! no static exports found */
/***/(function (module, exports, __webpack_require__) {

    var e = g(__webpack_require__(/*! tiny-invariant */ "./node_modules/tiny-invariant/dist/tiny-invariant.esm.js")), t = __webpack_require__(/*! react */ "react"), n = t.Children, r = t.cloneElement, o = t.Component, i = t.createElement, l = t.createRef, a = g(__webpack_require__(/*! classnames */ "./node_modules/classnames/index.js")), c = __webpack_require__(/*! sortablejs */ "./node_modules/sortablejs/modular/sortable.esm.js"), s = g(c); exports.Sortable = s; var u = c.Direction; exports.Direction = u; var f = c.DOMRect; exports.DOMRect = f; var p = c.GroupOptions; exports.GroupOptions = p; var d = c.MoveEvent; exports.MoveEvent = d; var b = c.Options; exports.Options = b; var y = c.PullResult; exports.PullResult = y; var v = c.PutResult; exports.PutResult = v; var h = c.SortableEvent; exports.SortableEvent = h; var m = c.SortableOptions; exports.SortableOptions = m; var O = c.Utils; function g(e) { return e && e.__esModule ? e.default : e } function w(e, t) { if (null == e) return {}; var n, r, o = function (e, t) { if (null == e) return {}; var n, r, o = {}, i = Object.keys(e); for (r = 0; r < i.length; r++)n = i[r], t.indexOf(n) >= 0 || (o[n] = e[n]); return o }(e, t); if (Object.getOwnPropertySymbols) { var i = Object.getOwnPropertySymbols(e); for (r = 0; r < i.length; r++)n = i[r], t.indexOf(n) >= 0 || Object.prototype.propertyIsEnumerable.call(e, n) && (o[n] = e[n]) } return o } function S(e) { return function (e) { if (Array.isArray(e)) return j(e) }(e) || function (e) { if ("undefined" != typeof Symbol && Symbol.iterator in Object(e)) return Array.from(e) }(e) || function (e, t) { if (!e) return; if ("string" == typeof e) return j(e, t); var n = Object.prototype.toString.call(e).slice(8, -1); "Object" === n && e.constructor && (n = e.constructor.name); if ("Map" === n || "Set" === n) return Array.from(e); if ("Arguments" === n || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return j(e, t) }(e) || function () { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.") }() } function j(e, t) { (null == t || t > e.length) && (t = e.length); for (var n = 0, r = new Array(t); n < t; n++)r[n] = e[n]; return r } function x(e, t) { var n = Object.keys(e); if (Object.getOwnPropertySymbols) { var r = Object.getOwnPropertySymbols(e); t && (r = r.filter((function (t) { return Object.getOwnPropertyDescriptor(e, t).enumerable }))), n.push.apply(n, r) } return n } function I(e) { for (var t = 1; t < arguments.length; t++) { var n = null != arguments[t] ? arguments[t] : {}; t % 2 ? x(Object(n), !0).forEach((function (t) { P(e, t, n[t]) })) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : x(Object(n)).forEach((function (t) { Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t)) })) } return e } function P(e, t, n) { return t in e ? Object.defineProperty(e, t, { value: n, enumerable: !0, configurable: !0, writable: !0 }) : e[t] = n, e } function E(e) { null !== e.parentElement && e.parentElement.removeChild(e) } function k(e) { e.forEach((function (e) { return E(e.element) })) } function C(e) { e.forEach((function (e) { var t, n, r, o; t = e.parentElement, n = e.element, r = e.oldIndex, o = t.children[r] || null, t.insertBefore(n, o) })) } function D(e, t) { var n = M(e), r = { parentElement: e.from }, o = []; switch (n) { case "normal": o = [{ element: e.item, newIndex: e.newIndex, oldIndex: e.oldIndex, parentElement: e.from }]; break; case "swap": o = [I({ element: e.item, oldIndex: e.oldIndex, newIndex: e.newIndex }, r), I({ element: e.swapItem, oldIndex: e.newIndex, newIndex: e.oldIndex }, r)]; break; case "multidrag": o = e.oldIndicies.map((function (t, n) { return I({ element: t.multiDragElement, oldIndex: t.index, newIndex: e.newIndicies[n].index }, r) })) }return function (e, t) { return e.map((function (e) { return I(I({}, e), {}, { item: t[e.oldIndex] }) })).sort((function (e, t) { return e.oldIndex - t.oldIndex })) }(o, t) } function A(e, t) { var n = S(t); return e.concat().reverse().forEach((function (e) { return n.splice(e.oldIndex, 1) })), n } function R(e, t, n, r) { var o = S(t); return e.forEach((function (e) { var t = r && n && r(e.item, n); o.splice(e.newIndex, 0, t || e.item) })), o } function M(e) { return e.oldIndicies && e.oldIndicies.length > 0 ? "multidrag" : e.swapItem ? "swap" : "normal" } function U(e) { return (U = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) { return typeof e } : function (e) { return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e })(e) } function L(e) { return function (e) { if (Array.isArray(e)) return _(e) }(e) || function (e) { if ("undefined" != typeof Symbol && Symbol.iterator in Object(e)) return Array.from(e) }(e) || function (e, t) { if (!e) return; if ("string" == typeof e) return _(e, t); var n = Object.prototype.toString.call(e).slice(8, -1); "Object" === n && e.constructor && (n = e.constructor.name); if ("Map" === n || "Set" === n) return Array.from(e); if ("Arguments" === n || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _(e, t) }(e) || function () { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.") }() } function _(e, t) { (null == t || t > e.length) && (t = e.length); for (var n = 0, r = new Array(t); n < t; n++)r[n] = e[n]; return r } function H(e, t) { var n = Object.keys(e); if (Object.getOwnPropertySymbols) { var r = Object.getOwnPropertySymbols(e); t && (r = r.filter((function (t) { return Object.getOwnPropertyDescriptor(e, t).enumerable }))), n.push.apply(n, r) } return n } function N(e) { for (var t = 1; t < arguments.length; t++) { var n = null != arguments[t] ? arguments[t] : {}; t % 2 ? H(Object(n), !0).forEach((function (t) { B(e, t, n[t]) })) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : H(Object(n)).forEach((function (t) { Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t)) })) } return e } function q(e, t) { for (var n = 0; n < t.length; n++) { var r = t[n]; r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r) } } function T(e, t) { return (T = Object.setPrototypeOf || function (e, t) { return e.__proto__ = t, e })(e, t) } function F(e) { var t = function () { if ("undefined" == typeof Reflect || !Reflect.construct) return !1; if (Reflect.construct.sham) return !1; if ("function" == typeof Proxy) return !0; try { return Date.prototype.toString.call(Reflect.construct(Date, [], (function () { }))), !0 } catch (e) { return !1 } }(); return function () { var n, r = $(e); if (t) { var o = $(this).constructor; n = Reflect.construct(r, arguments, o) } else n = r.apply(this, arguments); return G(this, n) } } function G(e, t) { return !t || "object" !== U(t) && "function" != typeof t ? function (e) { if (void 0 === e) throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); return e }(e) : t } function $(e) { return ($ = Object.setPrototypeOf ? Object.getPrototypeOf : function (e) { return e.__proto__ || Object.getPrototypeOf(e) })(e) } function B(e, t, n) { return t in e ? Object.defineProperty(e, t, { value: n, enumerable: !0, configurable: !0, writable: !0 }) : e[t] = n, e } exports.Utils = O; var J = { dragging: null }, z = function (t) { !function (e, t) { if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function"); e.prototype = Object.create(t && t.prototype, { constructor: { value: e, writable: !0, configurable: !0 } }), t && T(e, t) }(d, o); var c, u, f, p = F(d); function d(t) { var n; !function (e, t) { if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function") }(this, d), (n = p.call(this, t)).ref = l(); var r = t.list.map((function (e) { return N(N({}, e), {}, { chosen: !1, selected: !1 }) })); return t.setList(r, n.sortable, J), e(!t.plugins, '\nPlugins prop is no longer supported.\nInstead, mount it with "Sortable.mount(new MultiDrag())"\nPlease read the updated README.md at https://github.com/SortableJS/react-sortablejs.\n      '), n } return c = d, (u = [{ key: "componentDidMount", value: function () { if (null !== this.ref.current) { var e = this.makeOptions(); s.create(this.ref.current, e) } } }, { key: "render", value: function () { var e = this.props, t = e.tag, n = { style: e.style, className: e.className, id: e.id }; return i(t && null !== t ? t : "div", N({ ref: this.ref }, n), this.getChildren()) } }, { key: "getChildren", value: function () { var e = this.props, t = e.children, o = e.dataIdAttr, i = e.selectedClass, l = void 0 === i ? "sortable-selected" : i, c = e.chosenClass, s = void 0 === c ? "sortable-chosen" : c, u = (e.dragClass, e.fallbackClass, e.ghostClass, e.swapClass, e.filter), f = void 0 === u ? "sortable-filter" : u, p = e.list; if (!t || null == t) return null; var d = o || "data-id"; return n.map(t, (function (e, t) { var n, o, i = p[t], c = e.props.className, u = "string" == typeof f && B({}, f.replace(".", ""), !!i.filtered), b = a(c, N((B(n = {}, l, i.selected), B(n, s, i.chosen), n), u)); return r(e, (B(o = {}, d, e.key), B(o, "className", b), o)) })) } }, { key: "makeOptions", value: function () { var e, t = this, n = ((e = this.props).list, e.setList, e.children, e.tag, e.style, e.className, e.clone, e.onAdd, e.onChange, e.onChoose, e.onClone, e.onEnd, e.onFilter, e.onRemove, e.onSort, e.onStart, e.onUnchoose, e.onUpdate, e.onMove, e.onSpill, e.onSelect, e.onDeselect, w(e, ["list", "setList", "children", "tag", "style", "className", "clone", "onAdd", "onChange", "onChoose", "onClone", "onEnd", "onFilter", "onRemove", "onSort", "onStart", "onUnchoose", "onUpdate", "onMove", "onSpill", "onSelect", "onDeselect"])); return ["onAdd", "onChoose", "onDeselect", "onEnd", "onRemove", "onSelect", "onSpill", "onStart", "onUnchoose", "onUpdate"].forEach((function (e) { return n[e] = t.prepareOnHandlerPropAndDOM(e) })), ["onChange", "onClone", "onFilter", "onSort"].forEach((function (e) { return n[e] = t.prepareOnHandlerProp(e) })), N(N({}, n), {}, { onMove: function (e, n) { var r = t.props.onMove, o = e.willInsertAfter || -1; if (!r) return o; var i = r(e, n, t.sortable, J); return void 0 !== i && i } }) } }, { key: "prepareOnHandlerPropAndDOM", value: function (e) { var t = this; return function (n) { t.callOnHandlerProp(n, e), t[e](n) } } }, { key: "prepareOnHandlerProp", value: function (e) { var t = this; return function (n) { t.callOnHandlerProp(n, e) } } }, { key: "callOnHandlerProp", value: function (e, t) { var n = this.props[t]; n && n(e, this.sortable, J) } }, { key: "onAdd", value: function (e) { var t = this.props, n = t.list, r = t.setList, o = t.clone, i = D(e, L(J.dragging.props.list)); k(i), r(R(i, n, e, o).map((function (e) { return N(N({}, e), {}, { selected: !1 }) })), this.sortable, J) } }, { key: "onRemove", value: function (t) { var n = this, r = this.props, o = r.list, i = r.setList, l = M(t), a = D(t, o); C(a); var c = L(o); if ("clone" !== t.pullMode) c = A(a, c); else { var s = a; switch (l) { case "multidrag": s = a.map((function (e, n) { return N(N({}, e), {}, { element: t.clones[n] }) })); break; case "normal": s = a.map((function (e) { return N(N({}, e), {}, { element: t.clone }) })); break; case "swap": default: e(!0, 'mode "'.concat(l, '" cannot clone. Please remove "props.clone" from <ReactSortable/> when using the "').concat(l, '" plugin')) }k(s), a.forEach((function (e) { var r = e.oldIndex, o = n.props.clone(e.item, t); c.splice(r, 1, o) })) } i(c = c.map((function (e) { return N(N({}, e), {}, { selected: !1 }) })), this.sortable, J) } }, { key: "onUpdate", value: function (e) { var t = this.props, n = t.list, r = t.setList, o = D(e, n); return k(o), C(o), r(function (e, t) { return R(e, A(e, t)) }(o, n), this.sortable, J) } }, { key: "onStart", value: function () { J.dragging = this } }, { key: "onEnd", value: function () { J.dragging = null } }, { key: "onChoose", value: function (e) { var t = this.props, n = t.list; (0, t.setList)(n.map((function (t, n) { return n === e.oldIndex ? N(N({}, t), {}, { chosen: !0 }) : t })), this.sortable, J) } }, { key: "onUnchoose", value: function (e) { var t = this.props, n = t.list; (0, t.setList)(n.map((function (t, n) { return n === e.oldIndex ? N(N({}, t), {}, { chosen: !1 }) : t })), this.sortable, J) } }, { key: "onSpill", value: function (e) { var t = this.props, n = t.removeOnSpill, r = t.revertOnSpill; n && !r && E(e.item) } }, { key: "onSelect", value: function (e) { var t = this.props, n = t.list, r = t.setList, o = n.map((function (e) { return N(N({}, e), {}, { selected: !1 }) })); e.newIndicies.forEach((function (t) { var n = t.index; if (-1 === n) return console.log('"'.concat(e.type, '" had indice of "').concat(t.index, "\", which is probably -1 and doesn't usually happen here.")), void console.log(e); o[n].selected = !0 })), r(o, this.sortable, J) } }, { key: "onDeselect", value: function (e) { var t = this.props, n = t.list, r = t.setList, o = n.map((function (e) { return N(N({}, e), {}, { selected: !1 }) })); e.newIndicies.forEach((function (e) { var t = e.index; -1 !== t && (o[t].selected = !0) })), r(o, this.sortable, J) } }, { key: "sortable", get: function () { var e = this.ref.current; if (null === e) return null; var t = Object.keys(e).find((function (e) { return e.includes("Sortable") })); return t ? e[t] : null } }]) && q(c.prototype, u), f && q(c, f), d }(); exports.ReactSortable = z, B(z, "defaultProps", { clone: function (e) { return e } });
    //# sourceMappingURL=index.js.map


    /***/
  }),

/***/ "./node_modules/sortablejs/modular/sortable.esm.js":
/*!*********************************************************!*\
  !*** ./node_modules/sortablejs/modular/sortable.esm.js ***!
  \*********************************************************/
/*! exports provided: default, MultiDrag, Sortable, Swap */
/***/(function (module, __webpack_exports__, __webpack_require__) {

    "use strict";
    __webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "MultiDrag", function () { return MultiDragPlugin; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Sortable", function () { return Sortable; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Swap", function () { return SwapPlugin; });
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
            } catch (err) { }
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

        function Revert() { }

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

        function Remove() { }

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



        /***/
      }),

/***/ "./node_modules/tiny-invariant/dist/tiny-invariant.esm.js":
/*!****************************************************************!*\
  !*** ./node_modules/tiny-invariant/dist/tiny-invariant.esm.js ***!
  \****************************************************************/
/*! exports provided: default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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


    /***/
  }),

/***/ "./src/common/color.js":
  /*!*****************************!*\
  !*** ./src/common/color.js ***!
  \*****************************/
/*! exports provided: default */
=======
    return Object(_react_spring_animated__WEBPACK_IMPORTED_MODULE_2__["getAnimated"])(this);
  }

  _onStart() {
    const anim = this.animation;

    if (!anim.changed) {
      anim.changed = true;
      sendEvent(this, 'onStart', getFinishedResult(this, checkFinished(this, anim.to)), this);
    }
  }

  _onChange(value, idle) {
    if (!idle) {
      this._onStart();

      callProp(this.animation.onChange, value, this);
    }

    callProp(this.defaultProps.onChange, value, this);

    super._onChange(value, idle);
  }

  _start() {
    const anim = this.animation;
    Object(_react_spring_animated__WEBPACK_IMPORTED_MODULE_2__["getAnimated"])(this).reset(Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["getFluidValue"])(anim.to));

    if (!anim.immediate) {
      anim.fromValues = anim.values.map(node => node.lastPosition);
    }

    if (!isAnimating(this)) {
      setActiveBit(this, true);

      if (!isPaused(this)) {
        this._resume();
      }
    }
  }

  _resume() {
    if (_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["Globals"].skipAnimation) {
      this.finish();
    } else {
      _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["frameLoop"].start(this);
    }
  }

  _stop(goal, cancel) {
    if (isAnimating(this)) {
      setActiveBit(this, false);
      const anim = this.animation;
      Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(anim.values, node => {
        node.done = true;
      });

      if (anim.toValues) {
        anim.onChange = anim.onPause = anim.onResume = undefined;
      }

      Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["callFluidObservers"])(this, {
        type: 'idle',
        parent: this
      });
      const result = cancel ? getCancelledResult(this.get()) : getFinishedResult(this.get(), checkFinished(this, goal != null ? goal : anim.to));
      Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["flushCalls"])(this._pendingCalls, result);

      if (anim.changed) {
        anim.changed = false;
        sendEvent(this, 'onRest', result, this);
      }
    }
  }

}

function checkFinished(target, to) {
  const goal = computeGoal(to);
  const value = computeGoal(target.get());
  return Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["isEqual"])(value, goal);
}

function createLoopUpdate(props, loop = props.loop, to = props.to) {
  let loopRet = callProp(loop);

  if (loopRet) {
    const overrides = loopRet !== true && inferTo(loopRet);
    const reverse = (overrides || props).reverse;
    const reset = !overrides || overrides.reset;
    return createUpdate(_extends({}, props, {
      loop,
      default: false,
      pause: undefined,
      to: !reverse || isAsyncTo(to) ? to : undefined,
      from: reset ? props.from : undefined,
      reset
    }, overrides));
  }
}
function createUpdate(props) {
  const {
    to,
    from
  } = props = inferTo(props);
  const keys = new Set();
  if (_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].obj(to)) findDefined(to, keys);
  if (_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].obj(from)) findDefined(from, keys);
  props.keys = keys.size ? Array.from(keys) : null;
  return props;
}
function declareUpdate(props) {
  const update = createUpdate(props);

  if (_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].und(update.default)) {
    update.default = getDefaultProps(update);
  }

  return update;
}

function findDefined(values, keys) {
  Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["eachProp"])(values, (value, key) => value != null && keys.add(key));
}

const ACTIVE_EVENTS = ['onStart', 'onRest', 'onChange', 'onPause', 'onResume'];

function mergeActiveFn(target, props, type) {
  target.animation[type] = props[type] !== getDefaultProp(props, type) ? resolveProp(props[type], target.key) : undefined;
}

function sendEvent(target, type, ...args) {
  var _target$animation$typ, _target$animation, _target$defaultProps$, _target$defaultProps;

  (_target$animation$typ = (_target$animation = target.animation)[type]) == null ? void 0 : _target$animation$typ.call(_target$animation, ...args);
  (_target$defaultProps$ = (_target$defaultProps = target.defaultProps)[type]) == null ? void 0 : _target$defaultProps$.call(_target$defaultProps, ...args);
}

const BATCHED_EVENTS = ['onStart', 'onChange', 'onRest'];
let nextId = 1;
class Controller {
  constructor(props, flush) {
    this.id = nextId++;
    this.springs = {};
    this.queue = [];
    this.ref = void 0;
    this._flush = void 0;
    this._initialProps = void 0;
    this._lastAsyncId = 0;
    this._active = new Set();
    this._changed = new Set();
    this._started = false;
    this._item = void 0;
    this._state = {
      paused: false,
      pauseQueue: new Set(),
      resumeQueue: new Set(),
      timeouts: new Set()
    };
    this._events = {
      onStart: new Map(),
      onChange: new Map(),
      onRest: new Map()
    };
    this._onFrame = this._onFrame.bind(this);

    if (flush) {
      this._flush = flush;
    }

    if (props) {
      this.start(_extends({
        default: true
      }, props));
    }
  }

  get idle() {
    return !this._state.asyncTo && Object.values(this.springs).every(spring => spring.idle);
  }

  get item() {
    return this._item;
  }

  set item(item) {
    this._item = item;
  }

  get() {
    const values = {};
    this.each((spring, key) => values[key] = spring.get());
    return values;
  }

  set(values) {
    for (const key in values) {
      const value = values[key];

      if (!_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].und(value)) {
        this.springs[key].set(value);
      }
    }
  }

  update(props) {
    if (props) {
      this.queue.push(createUpdate(props));
    }

    return this;
  }

  start(props) {
    let {
      queue
    } = this;

    if (props) {
      queue = Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["toArray"])(props).map(createUpdate);
    } else {
      this.queue = [];
    }

    if (this._flush) {
      return this._flush(this, queue);
    }

    prepareKeys(this, queue);
    return flushUpdateQueue(this, queue);
  }

  stop(arg, keys) {
    if (arg !== !!arg) {
      keys = arg;
    }

    if (keys) {
      const springs = this.springs;
      Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["toArray"])(keys), key => springs[key].stop(!!arg));
    } else {
      stopAsync(this._state, this._lastAsyncId);
      this.each(spring => spring.stop(!!arg));
    }

    return this;
  }

  pause(keys) {
    if (_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].und(keys)) {
      this.start({
        pause: true
      });
    } else {
      const springs = this.springs;
      Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["toArray"])(keys), key => springs[key].pause());
    }

    return this;
  }

  resume(keys) {
    if (_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].und(keys)) {
      this.start({
        pause: false
      });
    } else {
      const springs = this.springs;
      Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["toArray"])(keys), key => springs[key].resume());
    }

    return this;
  }

  each(iterator) {
    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["eachProp"])(this.springs, iterator);
  }

  _onFrame() {
    const {
      onStart,
      onChange,
      onRest
    } = this._events;
    const active = this._active.size > 0;
    const changed = this._changed.size > 0;

    if (active && !this._started || changed && !this._started) {
      this._started = true;
      Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["flush"])(onStart, ([onStart, result]) => {
        result.value = this.get();
        onStart(result, this, this._item);
      });
    }

    const idle = !active && this._started;
    const values = changed || idle && onRest.size ? this.get() : null;

    if (changed && onChange.size) {
      Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["flush"])(onChange, ([onChange, result]) => {
        result.value = values;
        onChange(result, this, this._item);
      });
    }

    if (idle) {
      this._started = false;
      Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["flush"])(onRest, ([onRest, result]) => {
        result.value = values;
        onRest(result, this, this._item);
      });
    }
  }

  eventObserved(event) {
    if (event.type == 'change') {
      this._changed.add(event.parent);

      if (!event.idle) {
        this._active.add(event.parent);
      }
    } else if (event.type == 'idle') {
      this._active.delete(event.parent);
    } else return;

    _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["raf"].onFrame(this._onFrame);
  }

}
function flushUpdateQueue(ctrl, queue) {
  return Promise.all(queue.map(props => flushUpdate(ctrl, props))).then(results => getCombinedResult(ctrl, results));
}
async function flushUpdate(ctrl, props, isLoop) {
  const {
    keys,
    to,
    from,
    loop,
    onRest,
    onResolve
  } = props;
  const defaults = _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].obj(props.default) && props.default;

  if (loop) {
    props.loop = false;
  }

  if (to === false) props.to = null;
  if (from === false) props.from = null;
  const asyncTo = _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].arr(to) || _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].fun(to) ? to : undefined;

  if (asyncTo) {
    props.to = undefined;
    props.onRest = undefined;

    if (defaults) {
      defaults.onRest = undefined;
    }
  } else {
      Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(BATCHED_EVENTS, key => {
        const handler = props[key];

        if (_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].fun(handler)) {
          const queue = ctrl['_events'][key];

          props[key] = ({
            finished,
            cancelled
          }) => {
            const result = queue.get(handler);

            if (result) {
              if (!finished) result.finished = false;
              if (cancelled) result.cancelled = true;
            } else {
              queue.set(handler, {
                value: null,
                finished: finished || false,
                cancelled: cancelled || false
              });
            }
          };

          if (defaults) {
            defaults[key] = props[key];
          }
        }
      });
    }

  const state = ctrl['_state'];

  if (props.pause === !state.paused) {
    state.paused = props.pause;
    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["flushCalls"])(props.pause ? state.pauseQueue : state.resumeQueue);
  } else if (state.paused) {
      props.pause = true;
    }

  const promises = (keys || Object.keys(ctrl.springs)).map(key => ctrl.springs[key].start(props));
  const cancel = props.cancel === true || getDefaultProp(props, 'cancel') === true;

  if (asyncTo || cancel && state.asyncId) {
    promises.push(scheduleProps(++ctrl['_lastAsyncId'], {
      props,
      state,
      actions: {
        pause: _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["noop"],
        resume: _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["noop"],

        start(props, resolve) {
          if (cancel) {
            stopAsync(state, ctrl['_lastAsyncId']);
            resolve(getCancelledResult(ctrl));
          } else {
            props.onRest = onRest;
            resolve(runAsync(asyncTo, props, state, ctrl));
          }
        }

      }
    }));
  }

  if (state.paused) {
    await new Promise(resume => {
      state.resumeQueue.add(resume);
    });
  }

  const result = getCombinedResult(ctrl, await Promise.all(promises));

  if (loop && result.finished && !(isLoop && result.noop)) {
    const nextProps = createLoopUpdate(props, loop, to);

    if (nextProps) {
      prepareKeys(ctrl, [nextProps]);
      return flushUpdate(ctrl, nextProps, true);
    }
  }

  if (onResolve) {
    _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["raf"].batchedUpdates(() => onResolve(result, ctrl, ctrl.item));
  }

  return result;
}
function getSprings(ctrl, props) {
  const springs = _extends({}, ctrl.springs);

  if (props) {
    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["toArray"])(props), props => {
      if (_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].und(props.keys)) {
        props = createUpdate(props);
      }

      if (!_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].obj(props.to)) {
        props = _extends({}, props, {
          to: undefined
        });
      }

      prepareSprings(springs, props, key => {
        return createSpring(key);
      });
    });
  }

  setSprings(ctrl, springs);
  return springs;
}
function setSprings(ctrl, springs) {
  Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["eachProp"])(springs, (spring, key) => {
    if (!ctrl.springs[key]) {
      ctrl.springs[key] = spring;
      Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["addFluidObserver"])(spring, ctrl);
    }
  });
}

function createSpring(key, observer) {
  const spring = new SpringValue();
  spring.key = key;

  if (observer) {
    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["addFluidObserver"])(spring, observer);
  }

  return spring;
}

function prepareSprings(springs, props, create) {
  if (props.keys) {
    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(props.keys, key => {
      const spring = springs[key] || (springs[key] = create(key));
      spring['_prepareNode'](props);
    });
  }
}

function prepareKeys(ctrl, queue) {
  Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(queue, props => {
    prepareSprings(ctrl.springs, props, key => {
      return createSpring(key, ctrl);
    });
  });
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

const _excluded$3 = ["children"];
const SpringContext = _ref => {
  let {
    children
  } = _ref,
      props = _objectWithoutPropertiesLoose(_ref, _excluded$3);

  const inherited = Object(react__WEBPACK_IMPORTED_MODULE_1__["useContext"])(ctx);
  const pause = props.pause || !!inherited.pause,
        immediate = props.immediate || !!inherited.immediate;
  props = Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["useMemoOne"])(() => ({
    pause,
    immediate
  }), [pause, immediate]);
  const {
    Provider
  } = ctx;
  return react__WEBPACK_IMPORTED_MODULE_1__["createElement"](Provider, {
    value: props
  }, children);
};
const ctx = makeContext(SpringContext, {});
SpringContext.Provider = ctx.Provider;
SpringContext.Consumer = ctx.Consumer;

function makeContext(target, init) {
  Object.assign(target, react__WEBPACK_IMPORTED_MODULE_1__["createContext"](init));
  target.Provider._context = target;
  target.Consumer._context = target;
  return target;
}

const SpringRef = () => {
  const current = [];

  const SpringRef = function SpringRef(props) {
    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["deprecateDirectCall"])();
    const results = [];
    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(current, (ctrl, i) => {
      if (_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].und(props)) {
        results.push(ctrl.start());
      } else {
        const update = _getProps(props, ctrl, i);

        if (update) {
          results.push(ctrl.start(update));
        }
      }
    });
    return results;
  };

  SpringRef.current = current;

  SpringRef.add = function (ctrl) {
    if (!current.includes(ctrl)) {
      current.push(ctrl);
    }
  };

  SpringRef.delete = function (ctrl) {
    const i = current.indexOf(ctrl);
    if (~i) current.splice(i, 1);
  };

  SpringRef.pause = function () {
    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(current, ctrl => ctrl.pause(...arguments));
    return this;
  };

  SpringRef.resume = function () {
    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(current, ctrl => ctrl.resume(...arguments));
    return this;
  };

  SpringRef.set = function (values) {
    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(current, ctrl => ctrl.set(values));
  };

  SpringRef.start = function (props) {
    const results = [];
    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(current, (ctrl, i) => {
      if (_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].und(props)) {
        results.push(ctrl.start());
      } else {
        const update = this._getProps(props, ctrl, i);

        if (update) {
          results.push(ctrl.start(update));
        }
      }
    });
    return results;
  };

  SpringRef.stop = function () {
    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(current, ctrl => ctrl.stop(...arguments));
    return this;
  };

  SpringRef.update = function (props) {
    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(current, (ctrl, i) => ctrl.update(this._getProps(props, ctrl, i)));
    return this;
  };

  const _getProps = function _getProps(arg, ctrl, index) {
    return _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].fun(arg) ? arg(index, ctrl) : arg;
  };

  SpringRef._getProps = _getProps;
  return SpringRef;
};

function useSprings(length, props, deps) {
  const propsFn = _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].fun(props) && props;
  if (propsFn && !deps) deps = [];
  const ref = Object(react__WEBPACK_IMPORTED_MODULE_1__["useMemo"])(() => propsFn || arguments.length == 3 ? SpringRef() : void 0, []);
  const layoutId = Object(react__WEBPACK_IMPORTED_MODULE_1__["useRef"])(0);
  const forceUpdate = Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["useForceUpdate"])();
  const state = Object(react__WEBPACK_IMPORTED_MODULE_1__["useMemo"])(() => ({
    ctrls: [],
    queue: [],

    flush(ctrl, updates) {
      const springs = getSprings(ctrl, updates);
      const canFlushSync = layoutId.current > 0 && !state.queue.length && !Object.keys(springs).some(key => !ctrl.springs[key]);
      return canFlushSync ? flushUpdateQueue(ctrl, updates) : new Promise(resolve => {
        setSprings(ctrl, springs);
        state.queue.push(() => {
          resolve(flushUpdateQueue(ctrl, updates));
        });
        forceUpdate();
      });
    }

  }), []);
  const ctrls = Object(react__WEBPACK_IMPORTED_MODULE_1__["useRef"])([...state.ctrls]);
  const updates = [];
  const prevLength = Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["usePrev"])(length) || 0;
  Object(react__WEBPACK_IMPORTED_MODULE_1__["useMemo"])(() => {
    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(ctrls.current.slice(length, prevLength), ctrl => {
      detachRefs(ctrl, ref);
      ctrl.stop(true);
    });
    ctrls.current.length = length;
    declareUpdates(prevLength, length);
  }, [length]);
  Object(react__WEBPACK_IMPORTED_MODULE_1__["useMemo"])(() => {
    declareUpdates(0, Math.min(prevLength, length));
  }, deps);

  function declareUpdates(startIndex, endIndex) {
    for (let i = startIndex; i < endIndex; i++) {
      const ctrl = ctrls.current[i] || (ctrls.current[i] = new Controller(null, state.flush));
      const update = propsFn ? propsFn(i, ctrl) : props[i];

      if (update) {
        updates[i] = declareUpdate(update);
      }
    }
  }

  const springs = ctrls.current.map((ctrl, i) => getSprings(ctrl, updates[i]));
  const context = Object(react__WEBPACK_IMPORTED_MODULE_1__["useContext"])(SpringContext);
  const prevContext = Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["usePrev"])(context);
  const hasContext = context !== prevContext && hasProps(context);
  Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["useLayoutEffect"])(() => {
    layoutId.current++;
    state.ctrls = ctrls.current;
    const {
      queue
    } = state;

    if (queue.length) {
      state.queue = [];
      Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(queue, cb => cb());
    }

    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(ctrls.current, (ctrl, i) => {
      ref == null ? void 0 : ref.add(ctrl);

      if (hasContext) {
        ctrl.start({
          default: context
        });
      }

      const update = updates[i];

      if (update) {
        replaceRef(ctrl, update.ref);

        if (ctrl.ref) {
          ctrl.queue.push(update);
        } else {
          ctrl.start(update);
        }
      }
    });
  });
  Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["useOnce"])(() => () => {
    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(state.ctrls, ctrl => ctrl.stop(true));
  });
  const values = springs.map(x => _extends({}, x));
  return ref ? [values, ref] : values;
}

function useSpring(props, deps) {
  const isFn = _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].fun(props);
  const [[values], ref] = useSprings(1, isFn ? props : [props], isFn ? deps || [] : deps);
  return isFn || arguments.length == 2 ? [values, ref] : values;
}

const initSpringRef = () => SpringRef();

const useSpringRef = () => Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])(initSpringRef)[0];

function useTrail(length, propsArg, deps) {
  const propsFn = _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].fun(propsArg) && propsArg;
  if (propsFn && !deps) deps = [];
  let reverse = true;
  const result = useSprings(length, (i, ctrl) => {
    const props = propsFn ? propsFn(i, ctrl) : propsArg;
    reverse = reverse && props.reverse;
    return props;
  }, deps || [{}]);
  const ref = result[1];
  Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["useLayoutEffect"])(() => {
    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(ref.current, (ctrl, i) => {
      const parent = ref.current[i + (reverse ? 1 : -1)];
      if (parent) ctrl.start({
        to: parent.springs
      });
    });
  }, deps);

  if (propsFn || arguments.length == 3) {
    ref['_getProps'] = (propsArg, ctrl, i) => {
      const props = _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].fun(propsArg) ? propsArg(i, ctrl) : propsArg;

      if (props) {
        const parent = ref.current[i + (props.reverse ? 1 : -1)];
        if (parent) props.to = parent.springs;
        return props;
      }
    };

    return result;
  }

  return result[0];
}

let TransitionPhase;

(function (TransitionPhase) {
  TransitionPhase["MOUNT"] = "mount";
  TransitionPhase["ENTER"] = "enter";
  TransitionPhase["UPDATE"] = "update";
  TransitionPhase["LEAVE"] = "leave";
})(TransitionPhase || (TransitionPhase = {}));

function useTransition(data, props, deps) {
  const propsFn = _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].fun(props) && props;
  const {
    reset,
    sort,
    trail = 0,
    expires = true,
    onDestroyed,
    ref: propsRef,
    config: propsConfig
  } = propsFn ? propsFn() : props;
  const ref = Object(react__WEBPACK_IMPORTED_MODULE_1__["useMemo"])(() => propsFn || arguments.length == 3 ? SpringRef() : void 0, []);
  const items = Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["toArray"])(data);
  const transitions = [];
  const usedTransitions = Object(react__WEBPACK_IMPORTED_MODULE_1__["useRef"])(null);
  const prevTransitions = reset ? null : usedTransitions.current;
  Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["useLayoutEffect"])(() => {
    usedTransitions.current = transitions;
  });
  Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["useOnce"])(() => () => Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(usedTransitions.current, t => {
    if (t.expired) {
      clearTimeout(t.expirationId);
    }

    detachRefs(t.ctrl, ref);
    t.ctrl.stop(true);
  }));
  const keys = getKeys(items, propsFn ? propsFn() : props, prevTransitions);
  const expired = reset && usedTransitions.current || [];
  Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["useLayoutEffect"])(() => Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(expired, ({
    ctrl,
    item,
    key
  }) => {
    detachRefs(ctrl, ref);
    callProp(onDestroyed, item, key);
  }));
  const reused = [];
  if (prevTransitions) Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(prevTransitions, (t, i) => {
    if (t.expired) {
      clearTimeout(t.expirationId);
      expired.push(t);
    } else {
      i = reused[i] = keys.indexOf(t.key);
      if (~i) transitions[i] = t;
    }
  });
  Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(items, (item, i) => {
    if (!transitions[i]) {
      transitions[i] = {
        key: keys[i],
        item,
        phase: TransitionPhase.MOUNT,
        ctrl: new Controller()
      };
      transitions[i].ctrl.item = item;
    }
  });

  if (reused.length) {
    let i = -1;
    const {
      leave
    } = propsFn ? propsFn() : props;
    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(reused, (keyIndex, prevIndex) => {
      const t = prevTransitions[prevIndex];

      if (~keyIndex) {
        i = transitions.indexOf(t);
        transitions[i] = _extends({}, t, {
          item: items[keyIndex]
        });
      } else if (leave) {
        transitions.splice(++i, 0, t);
      }
    });
  }

  if (_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].fun(sort)) {
    transitions.sort((a, b) => sort(a.item, b.item));
  }

  let delay = -trail;
  const forceUpdate = Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["useForceUpdate"])();
  const defaultProps = getDefaultProps(props);
  const changes = new Map();
  Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(transitions, (t, i) => {
    const key = t.key;
    const prevPhase = t.phase;
    const p = propsFn ? propsFn() : props;
    let to;
    let phase;
    let propsDelay = callProp(p.delay || 0, key);

    if (prevPhase == TransitionPhase.MOUNT) {
      to = p.enter;
      phase = TransitionPhase.ENTER;
    } else {
      const isLeave = keys.indexOf(key) < 0;

      if (prevPhase != TransitionPhase.LEAVE) {
        if (isLeave) {
          to = p.leave;
          phase = TransitionPhase.LEAVE;
        } else if (to = p.update) {
          phase = TransitionPhase.UPDATE;
        } else return;
      } else if (!isLeave) {
        to = p.enter;
        phase = TransitionPhase.ENTER;
      } else return;
    }

    to = callProp(to, t.item, i);
    to = _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].obj(to) ? inferTo(to) : {
      to
    };

    if (!to.config) {
      const config = propsConfig || defaultProps.config;
      to.config = callProp(config, t.item, i, phase);
    }

    delay += trail;

    const payload = _extends({}, defaultProps, {
      delay: propsDelay + delay,
      ref: propsRef,
      immediate: p.immediate,
      reset: false
    }, to);

    if (phase == TransitionPhase.ENTER && _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].und(payload.from)) {
      const _p = propsFn ? propsFn() : props;

      const from = _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].und(_p.initial) || prevTransitions ? _p.from : _p.initial;
      payload.from = callProp(from, t.item, i);
    }

    const {
      onResolve
    } = payload;

    payload.onResolve = result => {
      callProp(onResolve, result);
      const transitions = usedTransitions.current;
      const t = transitions.find(t => t.key === key);
      if (!t) return;

      if (result.cancelled && t.phase != TransitionPhase.UPDATE) {
        return;
      }

      if (t.ctrl.idle) {
        const idle = transitions.every(t => t.ctrl.idle);

        if (t.phase == TransitionPhase.LEAVE) {
          const expiry = callProp(expires, t.item);

          if (expiry !== false) {
            const expiryMs = expiry === true ? 0 : expiry;
            t.expired = true;

            if (!idle && expiryMs > 0) {
              if (expiryMs <= 0x7fffffff) t.expirationId = setTimeout(forceUpdate, expiryMs);
              return;
            }
          }
        }

        if (idle && transitions.some(t => t.expired)) {
          forceUpdate();
        }
      }
    };

    const springs = getSprings(t.ctrl, payload);
    changes.set(t, {
      phase,
      springs,
      payload
    });
  });
  const context = Object(react__WEBPACK_IMPORTED_MODULE_1__["useContext"])(SpringContext);
  const prevContext = Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["usePrev"])(context);
  const hasContext = context !== prevContext && hasProps(context);
  Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["useLayoutEffect"])(() => {
    if (hasContext) Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(transitions, t => {
      t.ctrl.start({
        default: context
      });
    });
  }, [context]);
  Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["useLayoutEffect"])(() => {
    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(changes, ({
      phase,
      payload
    }, t) => {
      const {
        ctrl
      } = t;
      t.phase = phase;
      ref == null ? void 0 : ref.add(ctrl);

      if (hasContext && phase == TransitionPhase.ENTER) {
        ctrl.start({
          default: context
        });
      }

      if (payload) {
        replaceRef(ctrl, payload.ref);

        if (ctrl.ref) {
          ctrl.update(payload);
        } else {
          ctrl.start(payload);
        }
      }
    });
  }, reset ? void 0 : deps);

  const renderTransitions = render => react__WEBPACK_IMPORTED_MODULE_1__["createElement"](react__WEBPACK_IMPORTED_MODULE_1__["Fragment"], null, transitions.map((t, i) => {
    const {
      springs
    } = changes.get(t) || t.ctrl;
    const elem = render(_extends({}, springs), t.item, t, i);
    return elem && elem.type ? react__WEBPACK_IMPORTED_MODULE_1__["createElement"](elem.type, _extends({}, elem.props, {
      key: _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].str(t.key) || _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].num(t.key) ? t.key : t.ctrl.id,
      ref: elem.ref
    })) : elem;
  }));

  return ref ? [renderTransitions, ref] : renderTransitions;
}
let nextKey = 1;

function getKeys(items, {
  key,
  keys = key
}, prevTransitions) {
  if (keys === null) {
    const reused = new Set();
    return items.map(item => {
      const t = prevTransitions && prevTransitions.find(t => t.item === item && t.phase !== TransitionPhase.LEAVE && !reused.has(t));

      if (t) {
        reused.add(t);
        return t.key;
      }

      return nextKey++;
    });
  }

  return _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].und(keys) ? items : _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].fun(keys) ? items.map(keys) : Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["toArray"])(keys);
}

const _excluded$2 = ["children"];
function Spring(_ref) {
  let {
    children
  } = _ref,
      props = _objectWithoutPropertiesLoose(_ref, _excluded$2);

  return children(useSpring(props));
}

const _excluded$1 = ["items", "children"];
function Trail(_ref) {
  let {
    items,
    children
  } = _ref,
      props = _objectWithoutPropertiesLoose(_ref, _excluded$1);

  const trails = useTrail(items.length, props);
  return items.map((item, index) => {
    const result = children(item, index);
    return _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].fun(result) ? result(trails[index]) : result;
  });
}

const _excluded = ["items", "children"];
function Transition(_ref) {
  let {
    items,
    children
  } = _ref,
      props = _objectWithoutPropertiesLoose(_ref, _excluded);

  return useTransition(items, props)(children);
}

class Interpolation extends FrameValue {
  constructor(source, args) {
    super();
    this.key = void 0;
    this.idle = true;
    this.calc = void 0;
    this._active = new Set();
    this.source = source;
    this.calc = Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["createInterpolator"])(...args);

    const value = this._get();

    const nodeType = Object(_react_spring_animated__WEBPACK_IMPORTED_MODULE_2__["getAnimatedType"])(value);
    Object(_react_spring_animated__WEBPACK_IMPORTED_MODULE_2__["setAnimated"])(this, nodeType.create(value));
  }

  advance(_dt) {
    const value = this._get();

    const oldValue = this.get();

    if (!Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["isEqual"])(value, oldValue)) {
      Object(_react_spring_animated__WEBPACK_IMPORTED_MODULE_2__["getAnimated"])(this).setValue(value);

      this._onChange(value, this.idle);
    }

    if (!this.idle && checkIdle(this._active)) {
      becomeIdle(this);
    }
  }

  _get() {
    const inputs = _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["is"].arr(this.source) ? this.source.map(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["getFluidValue"]) : Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["toArray"])(Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["getFluidValue"])(this.source));
    return this.calc(...inputs);
  }

  _start() {
    if (this.idle && !checkIdle(this._active)) {
      this.idle = false;
      Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(Object(_react_spring_animated__WEBPACK_IMPORTED_MODULE_2__["getPayload"])(this), node => {
        node.done = false;
      });

      if (_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["Globals"].skipAnimation) {
        _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["raf"].batchedUpdates(() => this.advance());
        becomeIdle(this);
      } else {
        _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["frameLoop"].start(this);
      }
    }
  }

  _attach() {
    let priority = 1;
    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["toArray"])(this.source), source => {
      if (Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["hasFluidValue"])(source)) {
        Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["addFluidObserver"])(source, this);
      }

      if (isFrameValue(source)) {
        if (!source.idle) {
          this._active.add(source);
        }

        priority = Math.max(priority, source.priority + 1);
      }
    });
    this.priority = priority;

    this._start();
  }

  _detach() {
    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["toArray"])(this.source), source => {
      if (Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["hasFluidValue"])(source)) {
        Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["removeFluidObserver"])(source, this);
      }
    });

    this._active.clear();

    becomeIdle(this);
  }

  eventObserved(event) {
    if (event.type == 'change') {
      if (event.idle) {
        this.advance();
      } else {
        this._active.add(event.parent);

        this._start();
      }
    } else if (event.type == 'idle') {
        this._active.delete(event.parent);
      } else if (event.type == 'priority') {
          this.priority = Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["toArray"])(this.source).reduce((highest, parent) => Math.max(highest, (isFrameValue(parent) ? parent.priority : 0) + 1), 0);
        }
  }

}

function isIdle(source) {
  return source.idle !== false;
}

function checkIdle(active) {
  return !active.size || Array.from(active).every(isIdle);
}

function becomeIdle(self) {
  if (!self.idle) {
    self.idle = true;
    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["each"])(Object(_react_spring_animated__WEBPACK_IMPORTED_MODULE_2__["getPayload"])(self), node => {
      node.done = true;
    });
    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["callFluidObservers"])(self, {
      type: 'idle',
      parent: self
    });
  }
}

const to = (source, ...args) => new Interpolation(source, args);
const interpolate = (source, ...args) => (Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["deprecateInterpolate"])(), new Interpolation(source, args));

_react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["Globals"].assign({
  createStringInterpolator: _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["createStringInterpolator"],
  to: (source, args) => new Interpolation(source, args)
});
const update = _react_spring_shared__WEBPACK_IMPORTED_MODULE_0__["frameLoop"].advance;




/***/ }),

/***/ "./node_modules/@react-spring/rafz/dist/react-spring-rafz.esm.js":
/*!***********************************************************************!*\
  !*** ./node_modules/@react-spring/rafz/dist/react-spring-rafz.esm.js ***!
  \***********************************************************************/
/*! exports provided: __raf, raf */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "__raf", function() { return __raf; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "raf", function() { return raf; });
let updateQueue = makeQueue();
const raf = fn => schedule(fn, updateQueue);
let writeQueue = makeQueue();

raf.write = fn => schedule(fn, writeQueue);

let onStartQueue = makeQueue();

raf.onStart = fn => schedule(fn, onStartQueue);

let onFrameQueue = makeQueue();

raf.onFrame = fn => schedule(fn, onFrameQueue);

let onFinishQueue = makeQueue();

raf.onFinish = fn => schedule(fn, onFinishQueue);

let timeouts = [];

raf.setTimeout = (handler, ms) => {
  let time = raf.now() + ms;

  let cancel = () => {
    let i = timeouts.findIndex(t => t.cancel == cancel);
    if (~i) timeouts.splice(i, 1);
    __raf.count -= ~i ? 1 : 0;
  };

  let timeout = {
    time,
    handler,
    cancel
  };
  timeouts.splice(findTimeout(time), 0, timeout);
  __raf.count += 1;
  start();
  return timeout;
};

let findTimeout = time => ~(~timeouts.findIndex(t => t.time > time) || ~timeouts.length);

raf.cancel = fn => {
  updateQueue.delete(fn);
  writeQueue.delete(fn);
};

raf.sync = fn => {
  sync = true;
  raf.batchedUpdates(fn);
  sync = false;
};

raf.throttle = fn => {
  let lastArgs;

  function queuedFn() {
    try {
      fn(...lastArgs);
    } finally {
      lastArgs = null;
    }
  }

  function throttled(...args) {
    lastArgs = args;
    raf.onStart(queuedFn);
  }

  throttled.handler = fn;

  throttled.cancel = () => {
    onStartQueue.delete(queuedFn);
    lastArgs = null;
  };

  return throttled;
};

let nativeRaf = typeof window != 'undefined' ? window.requestAnimationFrame : () => {};

raf.use = impl => nativeRaf = impl;

raf.now = typeof performance != 'undefined' ? () => performance.now() : Date.now;

raf.batchedUpdates = fn => fn();

raf.catch = console.error;
raf.frameLoop = 'always';

raf.advance = () => {
  if (raf.frameLoop !== 'demand') {
    console.warn('Cannot call the manual advancement of rafz whilst frameLoop is not set as demand');
  } else {
    update();
  }
};

let ts = -1;
let sync = false;

function schedule(fn, queue) {
  if (sync) {
    queue.delete(fn);
    fn(0);
  } else {
    queue.add(fn);
    start();
  }
}

function start() {
  if (ts < 0) {
    ts = 0;

    if (raf.frameLoop !== 'demand') {
      nativeRaf(loop);
    }
  }
}

function loop() {
  if (~ts) {
    nativeRaf(loop);
    raf.batchedUpdates(update);
  }
}

function update() {
  let prevTs = ts;
  ts = raf.now();
  let count = findTimeout(ts);

  if (count) {
    eachSafely(timeouts.splice(0, count), t => t.handler());
    __raf.count -= count;
  }

  onStartQueue.flush();
  updateQueue.flush(prevTs ? Math.min(64, ts - prevTs) : 16.667);
  onFrameQueue.flush();
  writeQueue.flush();
  onFinishQueue.flush();
}

function makeQueue() {
  let next = new Set();
  let current = next;
  return {
    add(fn) {
      __raf.count += current == next && !next.has(fn) ? 1 : 0;
      next.add(fn);
    },

    delete(fn) {
      __raf.count -= current == next && next.has(fn) ? 1 : 0;
      return next.delete(fn);
    },

    flush(arg) {
      if (current.size) {
        next = new Set();
        __raf.count -= current.size;
        eachSafely(current, fn => fn(arg) && next.add(fn));
        __raf.count += next.size;
        current = next;
      }
    }

  };
}

function eachSafely(values, each) {
  values.forEach(value => {
    try {
      each(value);
    } catch (e) {
      raf.catch(e);
    }
  });
}

const __raf = {
  count: 0,

  clear() {
    ts = -1;
    timeouts = [];
    onStartQueue = makeQueue();
    updateQueue = makeQueue();
    onFrameQueue = makeQueue();
    writeQueue = makeQueue();
    onFinishQueue = makeQueue();
    __raf.count = 0;
  }

};




/***/ }),

/***/ "./node_modules/@react-spring/shared/dist/react-spring-shared.esm.js":
/*!***************************************************************************!*\
  !*** ./node_modules/@react-spring/shared/dist/react-spring-shared.esm.js ***!
  \***************************************************************************/
/*! exports provided: raf, FluidValue, Globals, addFluidObserver, callFluidObserver, callFluidObservers, colorToRgba, colors, createInterpolator, createStringInterpolator, defineHidden, deprecateDirectCall, deprecateInterpolate, each, eachProp, flush, flushCalls, frameLoop, getFluidObservers, getFluidValue, hasFluidValue, hex3, hex4, hex6, hex8, hsl, hsla, is, isAnimatedString, isEqual, noop, removeFluidObserver, rgb, rgba, setFluidGetter, toArray, useForceUpdate, useLayoutEffect, useMemoOne, useOnce, usePrev */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "FluidValue", function() { return FluidValue; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "Globals", function() { return globals; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "addFluidObserver", function() { return addFluidObserver; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "callFluidObserver", function() { return callFluidObserver; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "callFluidObservers", function() { return callFluidObservers; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "colorToRgba", function() { return colorToRgba; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "colors", function() { return colors; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "createInterpolator", function() { return createInterpolator; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "createStringInterpolator", function() { return createStringInterpolator; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "defineHidden", function() { return defineHidden; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "deprecateDirectCall", function() { return deprecateDirectCall; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "deprecateInterpolate", function() { return deprecateInterpolate; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "each", function() { return each; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "eachProp", function() { return eachProp; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "flush", function() { return flush; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "flushCalls", function() { return flushCalls; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "frameLoop", function() { return frameLoop; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getFluidObservers", function() { return getFluidObservers; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getFluidValue", function() { return getFluidValue; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "hasFluidValue", function() { return hasFluidValue; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "hex3", function() { return hex3; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "hex4", function() { return hex4; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "hex6", function() { return hex6; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "hex8", function() { return hex8; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "hsl", function() { return hsl; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "hsla", function() { return hsla; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "is", function() { return is; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isAnimatedString", function() { return isAnimatedString; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isEqual", function() { return isEqual; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "noop", function() { return noop; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "removeFluidObserver", function() { return removeFluidObserver; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "rgb", function() { return rgb; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "rgba", function() { return rgba; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "setFluidGetter", function() { return setFluidGetter; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "toArray", function() { return toArray; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "useForceUpdate", function() { return useForceUpdate; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "useLayoutEffect", function() { return useLayoutEffect; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "useMemoOne", function() { return useMemoOne; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "useOnce", function() { return useOnce; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "usePrev", function() { return usePrev; });
/* harmony import */ var _react_spring_rafz__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @react-spring/rafz */ "./node_modules/@react-spring/rafz/dist/react-spring-rafz.esm.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "raf", function() { return _react_spring_rafz__WEBPACK_IMPORTED_MODULE_0__["raf"]; });

/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_1__);





function noop() {}
const defineHidden = (obj, key, value) => Object.defineProperty(obj, key, {
  value,
  writable: true,
  configurable: true
});
const is = {
  arr: Array.isArray,
  obj: a => !!a && a.constructor.name === 'Object',
  fun: a => typeof a === 'function',
  str: a => typeof a === 'string',
  num: a => typeof a === 'number',
  und: a => a === undefined
};
function isEqual(a, b) {
  if (is.arr(a)) {
    if (!is.arr(b) || a.length !== b.length) return false;

    for (let i = 0; i < a.length; i++) {
      if (a[i] !== b[i]) return false;
    }

    return true;
  }

  return a === b;
}
const each = (obj, fn) => obj.forEach(fn);
function eachProp(obj, fn, ctx) {
  for (const key in obj) {
    if (obj.hasOwnProperty(key)) {
      fn.call(ctx, obj[key], key);
    }
  }
}
const toArray = a => is.und(a) ? [] : is.arr(a) ? a : [a];
function flush(queue, iterator) {
  if (queue.size) {
    const items = Array.from(queue);
    queue.clear();
    each(items, iterator);
  }
}
const flushCalls = (queue, ...args) => flush(queue, fn => fn(...args));

let createStringInterpolator$1;
let to;
let colors$1 = null;
let skipAnimation = false;
let willAdvance = noop;
const assign = globals => {
  if (globals.to) to = globals.to;
  if (globals.now) _react_spring_rafz__WEBPACK_IMPORTED_MODULE_0__["raf"].now = globals.now;
  if (globals.colors !== undefined) colors$1 = globals.colors;
  if (globals.skipAnimation != null) skipAnimation = globals.skipAnimation;
  if (globals.createStringInterpolator) createStringInterpolator$1 = globals.createStringInterpolator;
  if (globals.requestAnimationFrame) _react_spring_rafz__WEBPACK_IMPORTED_MODULE_0__["raf"].use(globals.requestAnimationFrame);
  if (globals.batchedUpdates) _react_spring_rafz__WEBPACK_IMPORTED_MODULE_0__["raf"].batchedUpdates = globals.batchedUpdates;
  if (globals.willAdvance) willAdvance = globals.willAdvance;
  if (globals.frameLoop) _react_spring_rafz__WEBPACK_IMPORTED_MODULE_0__["raf"].frameLoop = globals.frameLoop;
};

var globals = /*#__PURE__*/Object.freeze({
  __proto__: null,
  get createStringInterpolator () { return createStringInterpolator$1; },
  get to () { return to; },
  get colors () { return colors$1; },
  get skipAnimation () { return skipAnimation; },
  get willAdvance () { return willAdvance; },
  assign: assign
});

const startQueue = new Set();
let currentFrame = [];
let prevFrame = [];
let priority = 0;
const frameLoop = {
  get idle() {
    return !startQueue.size && !currentFrame.length;
  },

  start(animation) {
    if (priority > animation.priority) {
      startQueue.add(animation);
      _react_spring_rafz__WEBPACK_IMPORTED_MODULE_0__["raf"].onStart(flushStartQueue);
    } else {
      startSafely(animation);
      Object(_react_spring_rafz__WEBPACK_IMPORTED_MODULE_0__["raf"])(advance);
    }
  },

  advance,

  sort(animation) {
    if (priority) {
      _react_spring_rafz__WEBPACK_IMPORTED_MODULE_0__["raf"].onFrame(() => frameLoop.sort(animation));
    } else {
      const prevIndex = currentFrame.indexOf(animation);

      if (~prevIndex) {
        currentFrame.splice(prevIndex, 1);
        startUnsafely(animation);
      }
    }
  },

  clear() {
    currentFrame = [];
    startQueue.clear();
  }

};

function flushStartQueue() {
  startQueue.forEach(startSafely);
  startQueue.clear();
  Object(_react_spring_rafz__WEBPACK_IMPORTED_MODULE_0__["raf"])(advance);
}

function startSafely(animation) {
  if (!currentFrame.includes(animation)) startUnsafely(animation);
}

function startUnsafely(animation) {
  currentFrame.splice(findIndex(currentFrame, other => other.priority > animation.priority), 0, animation);
}

function advance(dt) {
  const nextFrame = prevFrame;

  for (let i = 0; i < currentFrame.length; i++) {
    const animation = currentFrame[i];
    priority = animation.priority;

    if (!animation.idle) {
      willAdvance(animation);
      animation.advance(dt);

      if (!animation.idle) {
        nextFrame.push(animation);
      }
    }
  }

  priority = 0;
  prevFrame = currentFrame;
  prevFrame.length = 0;
  currentFrame = nextFrame;
  return currentFrame.length > 0;
}

function findIndex(arr, test) {
  const index = arr.findIndex(test);
  return index < 0 ? arr.length : index;
}

const colors = {
  transparent: 0x00000000,
  aliceblue: 0xf0f8ffff,
  antiquewhite: 0xfaebd7ff,
  aqua: 0x00ffffff,
  aquamarine: 0x7fffd4ff,
  azure: 0xf0ffffff,
  beige: 0xf5f5dcff,
  bisque: 0xffe4c4ff,
  black: 0x000000ff,
  blanchedalmond: 0xffebcdff,
  blue: 0x0000ffff,
  blueviolet: 0x8a2be2ff,
  brown: 0xa52a2aff,
  burlywood: 0xdeb887ff,
  burntsienna: 0xea7e5dff,
  cadetblue: 0x5f9ea0ff,
  chartreuse: 0x7fff00ff,
  chocolate: 0xd2691eff,
  coral: 0xff7f50ff,
  cornflowerblue: 0x6495edff,
  cornsilk: 0xfff8dcff,
  crimson: 0xdc143cff,
  cyan: 0x00ffffff,
  darkblue: 0x00008bff,
  darkcyan: 0x008b8bff,
  darkgoldenrod: 0xb8860bff,
  darkgray: 0xa9a9a9ff,
  darkgreen: 0x006400ff,
  darkgrey: 0xa9a9a9ff,
  darkkhaki: 0xbdb76bff,
  darkmagenta: 0x8b008bff,
  darkolivegreen: 0x556b2fff,
  darkorange: 0xff8c00ff,
  darkorchid: 0x9932ccff,
  darkred: 0x8b0000ff,
  darksalmon: 0xe9967aff,
  darkseagreen: 0x8fbc8fff,
  darkslateblue: 0x483d8bff,
  darkslategray: 0x2f4f4fff,
  darkslategrey: 0x2f4f4fff,
  darkturquoise: 0x00ced1ff,
  darkviolet: 0x9400d3ff,
  deeppink: 0xff1493ff,
  deepskyblue: 0x00bfffff,
  dimgray: 0x696969ff,
  dimgrey: 0x696969ff,
  dodgerblue: 0x1e90ffff,
  firebrick: 0xb22222ff,
  floralwhite: 0xfffaf0ff,
  forestgreen: 0x228b22ff,
  fuchsia: 0xff00ffff,
  gainsboro: 0xdcdcdcff,
  ghostwhite: 0xf8f8ffff,
  gold: 0xffd700ff,
  goldenrod: 0xdaa520ff,
  gray: 0x808080ff,
  green: 0x008000ff,
  greenyellow: 0xadff2fff,
  grey: 0x808080ff,
  honeydew: 0xf0fff0ff,
  hotpink: 0xff69b4ff,
  indianred: 0xcd5c5cff,
  indigo: 0x4b0082ff,
  ivory: 0xfffff0ff,
  khaki: 0xf0e68cff,
  lavender: 0xe6e6faff,
  lavenderblush: 0xfff0f5ff,
  lawngreen: 0x7cfc00ff,
  lemonchiffon: 0xfffacdff,
  lightblue: 0xadd8e6ff,
  lightcoral: 0xf08080ff,
  lightcyan: 0xe0ffffff,
  lightgoldenrodyellow: 0xfafad2ff,
  lightgray: 0xd3d3d3ff,
  lightgreen: 0x90ee90ff,
  lightgrey: 0xd3d3d3ff,
  lightpink: 0xffb6c1ff,
  lightsalmon: 0xffa07aff,
  lightseagreen: 0x20b2aaff,
  lightskyblue: 0x87cefaff,
  lightslategray: 0x778899ff,
  lightslategrey: 0x778899ff,
  lightsteelblue: 0xb0c4deff,
  lightyellow: 0xffffe0ff,
  lime: 0x00ff00ff,
  limegreen: 0x32cd32ff,
  linen: 0xfaf0e6ff,
  magenta: 0xff00ffff,
  maroon: 0x800000ff,
  mediumaquamarine: 0x66cdaaff,
  mediumblue: 0x0000cdff,
  mediumorchid: 0xba55d3ff,
  mediumpurple: 0x9370dbff,
  mediumseagreen: 0x3cb371ff,
  mediumslateblue: 0x7b68eeff,
  mediumspringgreen: 0x00fa9aff,
  mediumturquoise: 0x48d1ccff,
  mediumvioletred: 0xc71585ff,
  midnightblue: 0x191970ff,
  mintcream: 0xf5fffaff,
  mistyrose: 0xffe4e1ff,
  moccasin: 0xffe4b5ff,
  navajowhite: 0xffdeadff,
  navy: 0x000080ff,
  oldlace: 0xfdf5e6ff,
  olive: 0x808000ff,
  olivedrab: 0x6b8e23ff,
  orange: 0xffa500ff,
  orangered: 0xff4500ff,
  orchid: 0xda70d6ff,
  palegoldenrod: 0xeee8aaff,
  palegreen: 0x98fb98ff,
  paleturquoise: 0xafeeeeff,
  palevioletred: 0xdb7093ff,
  papayawhip: 0xffefd5ff,
  peachpuff: 0xffdab9ff,
  peru: 0xcd853fff,
  pink: 0xffc0cbff,
  plum: 0xdda0ddff,
  powderblue: 0xb0e0e6ff,
  purple: 0x800080ff,
  rebeccapurple: 0x663399ff,
  red: 0xff0000ff,
  rosybrown: 0xbc8f8fff,
  royalblue: 0x4169e1ff,
  saddlebrown: 0x8b4513ff,
  salmon: 0xfa8072ff,
  sandybrown: 0xf4a460ff,
  seagreen: 0x2e8b57ff,
  seashell: 0xfff5eeff,
  sienna: 0xa0522dff,
  silver: 0xc0c0c0ff,
  skyblue: 0x87ceebff,
  slateblue: 0x6a5acdff,
  slategray: 0x708090ff,
  slategrey: 0x708090ff,
  snow: 0xfffafaff,
  springgreen: 0x00ff7fff,
  steelblue: 0x4682b4ff,
  tan: 0xd2b48cff,
  teal: 0x008080ff,
  thistle: 0xd8bfd8ff,
  tomato: 0xff6347ff,
  turquoise: 0x40e0d0ff,
  violet: 0xee82eeff,
  wheat: 0xf5deb3ff,
  white: 0xffffffff,
  whitesmoke: 0xf5f5f5ff,
  yellow: 0xffff00ff,
  yellowgreen: 0x9acd32ff
};

const NUMBER = '[-+]?\\d*\\.?\\d+';
const PERCENTAGE = NUMBER + '%';

function call(...parts) {
  return '\\(\\s*(' + parts.join(')\\s*,\\s*(') + ')\\s*\\)';
}

const rgb = new RegExp('rgb' + call(NUMBER, NUMBER, NUMBER));
const rgba = new RegExp('rgba' + call(NUMBER, NUMBER, NUMBER, NUMBER));
const hsl = new RegExp('hsl' + call(NUMBER, PERCENTAGE, PERCENTAGE));
const hsla = new RegExp('hsla' + call(NUMBER, PERCENTAGE, PERCENTAGE, NUMBER));
const hex3 = /^#([0-9a-fA-F]{1})([0-9a-fA-F]{1})([0-9a-fA-F]{1})$/;
const hex4 = /^#([0-9a-fA-F]{1})([0-9a-fA-F]{1})([0-9a-fA-F]{1})([0-9a-fA-F]{1})$/;
const hex6 = /^#([0-9a-fA-F]{6})$/;
const hex8 = /^#([0-9a-fA-F]{8})$/;

function normalizeColor(color) {
  let match;

  if (typeof color === 'number') {
    return color >>> 0 === color && color >= 0 && color <= 0xffffffff ? color : null;
  }

  if (match = hex6.exec(color)) return parseInt(match[1] + 'ff', 16) >>> 0;

  if (colors$1 && colors$1[color] !== undefined) {
    return colors$1[color];
  }

  if (match = rgb.exec(color)) {
    return (parse255(match[1]) << 24 | parse255(match[2]) << 16 | parse255(match[3]) << 8 | 0x000000ff) >>> 0;
  }

  if (match = rgba.exec(color)) {
    return (parse255(match[1]) << 24 | parse255(match[2]) << 16 | parse255(match[3]) << 8 | parse1(match[4])) >>> 0;
  }

  if (match = hex3.exec(color)) {
    return parseInt(match[1] + match[1] + match[2] + match[2] + match[3] + match[3] + 'ff', 16) >>> 0;
  }

  if (match = hex8.exec(color)) return parseInt(match[1], 16) >>> 0;

  if (match = hex4.exec(color)) {
    return parseInt(match[1] + match[1] + match[2] + match[2] + match[3] + match[3] + match[4] + match[4], 16) >>> 0;
  }

  if (match = hsl.exec(color)) {
    return (hslToRgb(parse360(match[1]), parsePercentage(match[2]), parsePercentage(match[3])) | 0x000000ff) >>> 0;
  }

  if (match = hsla.exec(color)) {
    return (hslToRgb(parse360(match[1]), parsePercentage(match[2]), parsePercentage(match[3])) | parse1(match[4])) >>> 0;
  }

  return null;
}

function hue2rgb(p, q, t) {
  if (t < 0) t += 1;
  if (t > 1) t -= 1;
  if (t < 1 / 6) return p + (q - p) * 6 * t;
  if (t < 1 / 2) return q;
  if (t < 2 / 3) return p + (q - p) * (2 / 3 - t) * 6;
  return p;
}

function hslToRgb(h, s, l) {
  const q = l < 0.5 ? l * (1 + s) : l + s - l * s;
  const p = 2 * l - q;
  const r = hue2rgb(p, q, h + 1 / 3);
  const g = hue2rgb(p, q, h);
  const b = hue2rgb(p, q, h - 1 / 3);
  return Math.round(r * 255) << 24 | Math.round(g * 255) << 16 | Math.round(b * 255) << 8;
}

function parse255(str) {
  const int = parseInt(str, 10);
  if (int < 0) return 0;
  if (int > 255) return 255;
  return int;
}

function parse360(str) {
  const int = parseFloat(str);
  return (int % 360 + 360) % 360 / 360;
}

function parse1(str) {
  const num = parseFloat(str);
  if (num < 0) return 0;
  if (num > 1) return 255;
  return Math.round(num * 255);
}

function parsePercentage(str) {
  const int = parseFloat(str);
  if (int < 0) return 0;
  if (int > 100) return 1;
  return int / 100;
}

function colorToRgba(input) {
  let int32Color = normalizeColor(input);
  if (int32Color === null) return input;
  int32Color = int32Color || 0;
  let r = (int32Color & 0xff000000) >>> 24;
  let g = (int32Color & 0x00ff0000) >>> 16;
  let b = (int32Color & 0x0000ff00) >>> 8;
  let a = (int32Color & 0x000000ff) / 255;
  return `rgba(${r}, ${g}, ${b}, ${a})`;
}

const createInterpolator = (range, output, extrapolate) => {
  if (is.fun(range)) {
    return range;
  }

  if (is.arr(range)) {
    return createInterpolator({
      range,
      output: output,
      extrapolate
    });
  }

  if (is.str(range.output[0])) {
    return createStringInterpolator$1(range);
  }

  const config = range;
  const outputRange = config.output;
  const inputRange = config.range || [0, 1];
  const extrapolateLeft = config.extrapolateLeft || config.extrapolate || 'extend';
  const extrapolateRight = config.extrapolateRight || config.extrapolate || 'extend';

  const easing = config.easing || (t => t);

  return input => {
    const range = findRange(input, inputRange);
    return interpolate(input, inputRange[range], inputRange[range + 1], outputRange[range], outputRange[range + 1], easing, extrapolateLeft, extrapolateRight, config.map);
  };
};

function interpolate(input, inputMin, inputMax, outputMin, outputMax, easing, extrapolateLeft, extrapolateRight, map) {
  let result = map ? map(input) : input;

  if (result < inputMin) {
    if (extrapolateLeft === 'identity') return result;else if (extrapolateLeft === 'clamp') result = inputMin;
  }

  if (result > inputMax) {
    if (extrapolateRight === 'identity') return result;else if (extrapolateRight === 'clamp') result = inputMax;
  }

  if (outputMin === outputMax) return outputMin;
  if (inputMin === inputMax) return input <= inputMin ? outputMin : outputMax;
  if (inputMin === -Infinity) result = -result;else if (inputMax === Infinity) result = result - inputMin;else result = (result - inputMin) / (inputMax - inputMin);
  result = easing(result);
  if (outputMin === -Infinity) result = -result;else if (outputMax === Infinity) result = result + outputMin;else result = result * (outputMax - outputMin) + outputMin;
  return result;
}

function findRange(input, inputRange) {
  for (var i = 1; i < inputRange.length - 1; ++i) if (inputRange[i] >= input) break;

  return i - 1;
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

const $get = Symbol.for('FluidValue.get');
const $observers = Symbol.for('FluidValue.observers');

const hasFluidValue = arg => Boolean(arg && arg[$get]);

const getFluidValue = arg => arg && arg[$get] ? arg[$get]() : arg;

const getFluidObservers = target => target[$observers] || null;

function callFluidObserver(observer, event) {
  if (observer.eventObserved) {
    observer.eventObserved(event);
  } else {
    observer(event);
  }
}

function callFluidObservers(target, event) {
  let observers = target[$observers];

  if (observers) {
    observers.forEach(observer => {
      callFluidObserver(observer, event);
    });
  }
}

class FluidValue {
  constructor(get) {
    this[$get] = void 0;
    this[$observers] = void 0;

    if (!get && !(get = this.get)) {
      throw Error('Unknown getter');
    }

    setFluidGetter(this, get);
  }

}

const setFluidGetter = (target, get) => setHidden(target, $get, get);

function addFluidObserver(target, observer) {
  if (target[$get]) {
    let observers = target[$observers];

    if (!observers) {
      setHidden(target, $observers, observers = new Set());
    }

    if (!observers.has(observer)) {
      observers.add(observer);

      if (target.observerAdded) {
        target.observerAdded(observers.size, observer);
      }
    }
  }

  return observer;
}

function removeFluidObserver(target, observer) {
  let observers = target[$observers];

  if (observers && observers.has(observer)) {
    const count = observers.size - 1;

    if (count) {
      observers.delete(observer);
    } else {
      target[$observers] = null;
    }

    if (target.observerRemoved) {
      target.observerRemoved(count, observer);
    }
  }
}

const setHidden = (target, key, value) => Object.defineProperty(target, key, {
  value,
  writable: true,
  configurable: true
});

const numberRegex = /[+\-]?(?:0|[1-9]\d*)(?:\.\d*)?(?:[eE][+\-]?\d+)?/g;
const colorRegex = /(#(?:[0-9a-f]{2}){2,4}|(#[0-9a-f]{3})|(rgb|hsl)a?\((-?\d+%?[,\s]+){2,3}\s*[\d\.]+%?\))/gi;
let namedColorRegex;
const rgbaRegex = /rgba\(([0-9\.-]+), ([0-9\.-]+), ([0-9\.-]+), ([0-9\.-]+)\)/gi;

const rgbaRound = (_, p1, p2, p3, p4) => `rgba(${Math.round(p1)}, ${Math.round(p2)}, ${Math.round(p3)}, ${p4})`;

const createStringInterpolator = config => {
  if (!namedColorRegex) namedColorRegex = colors$1 ? new RegExp(`(${Object.keys(colors$1).join('|')})(?!\\w)`, 'g') : /^\b$/;
  const output = config.output.map(value => getFluidValue(value).replace(colorRegex, colorToRgba).replace(namedColorRegex, colorToRgba));
  const keyframes = output.map(value => value.match(numberRegex).map(Number));
  const outputRanges = keyframes[0].map((_, i) => keyframes.map(values => {
    if (!(i in values)) {
      throw Error('The arity of each "output" value must be equal');
    }

    return values[i];
  }));
  const interpolators = outputRanges.map(output => createInterpolator(_extends({}, config, {
    output
  })));
  return input => {
    let i = 0;
    return output[0].replace(numberRegex, () => String(interpolators[i++](input))).replace(rgbaRegex, rgbaRound);
  };
};

const prefix = 'react-spring: ';

const once = fn => {
  const func = fn;
  let called = false;

  if (typeof func != 'function') {
    throw new TypeError(`${prefix}once requires a function parameter`);
  }

  return (...args) => {
    if (!called) {
      func(...args);
      called = true;
    }
  };
};

const warnInterpolate = once(console.warn);
function deprecateInterpolate() {
  warnInterpolate(`${prefix}The "interpolate" function is deprecated in v9 (use "to" instead)`);
}
const warnDirectCall = once(console.warn);
function deprecateDirectCall() {
  warnDirectCall(`${prefix}Directly calling start instead of using the api object is deprecated in v9 (use ".start" instead), this will be removed in later 0.X.0 versions`);
}

function isAnimatedString(value) {
  return is.str(value) && (value[0] == '#' || /\d/.test(value) || value in (colors$1 || {}));
}

const useOnce = effect => Object(react__WEBPACK_IMPORTED_MODULE_1__["useEffect"])(effect, emptyDeps);
const emptyDeps = [];

function useForceUpdate() {
  const update = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])()[1];
  const mounted = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])(makeMountedRef)[0];
  useOnce(mounted.unmount);
  return () => {
    if (mounted.current) {
      update({});
    }
  };
}

function makeMountedRef() {
  const mounted = {
    current: true,
    unmount: () => () => {
      mounted.current = false;
    }
  };
  return mounted;
}

function useMemoOne(getResult, inputs) {
  const [initial] = Object(react__WEBPACK_IMPORTED_MODULE_1__["useState"])(() => ({
    inputs,
    result: getResult()
  }));
  const committed = Object(react__WEBPACK_IMPORTED_MODULE_1__["useRef"])();
  const prevCache = committed.current;
  let cache = prevCache;

  if (cache) {
    const useCache = Boolean(inputs && cache.inputs && areInputsEqual(inputs, cache.inputs));

    if (!useCache) {
      cache = {
        inputs,
        result: getResult()
      };
    }
  } else {
    cache = initial;
  }

  Object(react__WEBPACK_IMPORTED_MODULE_1__["useEffect"])(() => {
    committed.current = cache;

    if (prevCache == initial) {
      initial.inputs = initial.result = undefined;
    }
  }, [cache]);
  return cache.result;
}

function areInputsEqual(next, prev) {
  if (next.length !== prev.length) {
    return false;
  }

  for (let i = 0; i < next.length; i++) {
    if (next[i] !== prev[i]) {
      return false;
    }
  }

  return true;
}

function usePrev(value) {
  const prevRef = Object(react__WEBPACK_IMPORTED_MODULE_1__["useRef"])();
  Object(react__WEBPACK_IMPORTED_MODULE_1__["useEffect"])(() => {
    prevRef.current = value;
  });
  return prevRef.current;
}

const useLayoutEffect = typeof window !== 'undefined' && window.document && window.document.createElement ? react__WEBPACK_IMPORTED_MODULE_1__["useLayoutEffect"] : react__WEBPACK_IMPORTED_MODULE_1__["useEffect"];




/***/ }),

/***/ "./node_modules/@react-spring/types/animated.js":
/*!******************************************************!*\
  !*** ./node_modules/@react-spring/types/animated.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {



/***/ }),

/***/ "./node_modules/@react-spring/types/interpolation.js":
/*!***********************************************************!*\
  !*** ./node_modules/@react-spring/types/interpolation.js ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {



/***/ }),

/***/ "./node_modules/@react-spring/web/dist/react-spring-web.esm.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@react-spring/web/dist/react-spring-web.esm.js ***!
  \*********************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "a", function() { return animated; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "animated", function() { return animated; });
/* harmony import */ var _react_spring_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @react-spring/core */ "./node_modules/@react-spring/core/dist/react-spring-core.esm.js");
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _react_spring_core__WEBPACK_IMPORTED_MODULE_0__) if(["default","a","animated"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _react_spring_core__WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react-dom */ "react-dom");
/* harmony import */ var react_dom__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react_dom__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _react_spring_shared__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @react-spring/shared */ "./node_modules/@react-spring/shared/dist/react-spring-shared.esm.js");
/* harmony import */ var _react_spring_animated__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @react-spring/animated */ "./node_modules/@react-spring/animated/dist/react-spring-animated.esm.js");






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

const _excluded$2 = ["style", "children", "scrollTop", "scrollLeft"];
const isCustomPropRE = /^--/;

function dangerousStyleValue(name, value) {
  if (value == null || typeof value === 'boolean' || value === '') return '';
  if (typeof value === 'number' && value !== 0 && !isCustomPropRE.test(name) && !(isUnitlessNumber.hasOwnProperty(name) && isUnitlessNumber[name])) return value + 'px';
  return ('' + value).trim();
}

const attributeCache = {};
function applyAnimatedValues(instance, props) {
  if (!instance.nodeType || !instance.setAttribute) {
    return false;
  }

  const isFilterElement = instance.nodeName === 'filter' || instance.parentNode && instance.parentNode.nodeName === 'filter';

  const _ref = props,
        {
    style,
    children,
    scrollTop,
    scrollLeft
  } = _ref,
        attributes = _objectWithoutPropertiesLoose(_ref, _excluded$2);

  const values = Object.values(attributes);
  const names = Object.keys(attributes).map(name => isFilterElement || instance.hasAttribute(name) ? name : attributeCache[name] || (attributeCache[name] = name.replace(/([A-Z])/g, n => '-' + n.toLowerCase())));

  if (children !== void 0) {
    instance.textContent = children;
  }

  for (let name in style) {
    if (style.hasOwnProperty(name)) {
      const value = dangerousStyleValue(name, style[name]);

      if (isCustomPropRE.test(name)) {
        instance.style.setProperty(name, value);
      } else {
        instance.style[name] = value;
      }
    }
  }

  names.forEach((name, i) => {
    instance.setAttribute(name, values[i]);
  });

  if (scrollTop !== void 0) {
    instance.scrollTop = scrollTop;
  }

  if (scrollLeft !== void 0) {
    instance.scrollLeft = scrollLeft;
  }
}
let isUnitlessNumber = {
  animationIterationCount: true,
  borderImageOutset: true,
  borderImageSlice: true,
  borderImageWidth: true,
  boxFlex: true,
  boxFlexGroup: true,
  boxOrdinalGroup: true,
  columnCount: true,
  columns: true,
  flex: true,
  flexGrow: true,
  flexPositive: true,
  flexShrink: true,
  flexNegative: true,
  flexOrder: true,
  gridRow: true,
  gridRowEnd: true,
  gridRowSpan: true,
  gridRowStart: true,
  gridColumn: true,
  gridColumnEnd: true,
  gridColumnSpan: true,
  gridColumnStart: true,
  fontWeight: true,
  lineClamp: true,
  lineHeight: true,
  opacity: true,
  order: true,
  orphans: true,
  tabSize: true,
  widows: true,
  zIndex: true,
  zoom: true,
  fillOpacity: true,
  floodOpacity: true,
  stopOpacity: true,
  strokeDasharray: true,
  strokeDashoffset: true,
  strokeMiterlimit: true,
  strokeOpacity: true,
  strokeWidth: true
};

const prefixKey = (prefix, key) => prefix + key.charAt(0).toUpperCase() + key.substring(1);

const prefixes = ['Webkit', 'Ms', 'Moz', 'O'];
isUnitlessNumber = Object.keys(isUnitlessNumber).reduce((acc, prop) => {
  prefixes.forEach(prefix => acc[prefixKey(prefix, prop)] = acc[prop]);
  return acc;
}, isUnitlessNumber);

const _excluded$1 = ["x", "y", "z"];
const domTransforms = /^(matrix|translate|scale|rotate|skew)/;
const pxTransforms = /^(translate)/;
const degTransforms = /^(rotate|skew)/;

const addUnit = (value, unit) => _react_spring_shared__WEBPACK_IMPORTED_MODULE_2__["is"].num(value) && value !== 0 ? value + unit : value;

const isValueIdentity = (value, id) => _react_spring_shared__WEBPACK_IMPORTED_MODULE_2__["is"].arr(value) ? value.every(v => isValueIdentity(v, id)) : _react_spring_shared__WEBPACK_IMPORTED_MODULE_2__["is"].num(value) ? value === id : parseFloat(value) === id;

class AnimatedStyle extends _react_spring_animated__WEBPACK_IMPORTED_MODULE_3__["AnimatedObject"] {
  constructor(_ref) {
    let {
      x,
      y,
      z
    } = _ref,
        style = _objectWithoutPropertiesLoose(_ref, _excluded$1);

    const inputs = [];
    const transforms = [];

    if (x || y || z) {
      inputs.push([x || 0, y || 0, z || 0]);
      transforms.push(xyz => [`translate3d(${xyz.map(v => addUnit(v, 'px')).join(',')})`, isValueIdentity(xyz, 0)]);
    }

    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_2__["eachProp"])(style, (value, key) => {
      if (key === 'transform') {
        inputs.push([value || '']);
        transforms.push(transform => [transform, transform === '']);
      } else if (domTransforms.test(key)) {
        delete style[key];
        if (_react_spring_shared__WEBPACK_IMPORTED_MODULE_2__["is"].und(value)) return;
        const unit = pxTransforms.test(key) ? 'px' : degTransforms.test(key) ? 'deg' : '';
        inputs.push(Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_2__["toArray"])(value));
        transforms.push(key === 'rotate3d' ? ([x, y, z, deg]) => [`rotate3d(${x},${y},${z},${addUnit(deg, unit)})`, isValueIdentity(deg, 0)] : input => [`${key}(${input.map(v => addUnit(v, unit)).join(',')})`, isValueIdentity(input, key.startsWith('scale') ? 1 : 0)]);
      }
    });

    if (inputs.length) {
      style.transform = new FluidTransform(inputs, transforms);
    }

    super(style);
  }

}

class FluidTransform extends _react_spring_shared__WEBPACK_IMPORTED_MODULE_2__["FluidValue"] {
  constructor(inputs, transforms) {
    super();
    this._value = null;
    this.inputs = inputs;
    this.transforms = transforms;
  }

  get() {
    return this._value || (this._value = this._get());
  }

  _get() {
    let transform = '';
    let identity = true;
    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_2__["each"])(this.inputs, (input, i) => {
      const arg1 = Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_2__["getFluidValue"])(input[0]);
      const [t, id] = this.transforms[i](_react_spring_shared__WEBPACK_IMPORTED_MODULE_2__["is"].arr(arg1) ? arg1 : input.map(_react_spring_shared__WEBPACK_IMPORTED_MODULE_2__["getFluidValue"]));
      transform += ' ' + t;
      identity = identity && id;
    });
    return identity ? 'none' : transform;
  }

  observerAdded(count) {
    if (count == 1) Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_2__["each"])(this.inputs, input => Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_2__["each"])(input, value => Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_2__["hasFluidValue"])(value) && Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_2__["addFluidObserver"])(value, this)));
  }

  observerRemoved(count) {
    if (count == 0) Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_2__["each"])(this.inputs, input => Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_2__["each"])(input, value => Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_2__["hasFluidValue"])(value) && Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_2__["removeFluidObserver"])(value, this)));
  }

  eventObserved(event) {
    if (event.type == 'change') {
      this._value = null;
    }

    Object(_react_spring_shared__WEBPACK_IMPORTED_MODULE_2__["callFluidObservers"])(this, event);
  }

}

const primitives = ['a', 'abbr', 'address', 'area', 'article', 'aside', 'audio', 'b', 'base', 'bdi', 'bdo', 'big', 'blockquote', 'body', 'br', 'button', 'canvas', 'caption', 'cite', 'code', 'col', 'colgroup', 'data', 'datalist', 'dd', 'del', 'details', 'dfn', 'dialog', 'div', 'dl', 'dt', 'em', 'embed', 'fieldset', 'figcaption', 'figure', 'footer', 'form', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'head', 'header', 'hgroup', 'hr', 'html', 'i', 'iframe', 'img', 'input', 'ins', 'kbd', 'keygen', 'label', 'legend', 'li', 'link', 'main', 'map', 'mark', 'menu', 'menuitem', 'meta', 'meter', 'nav', 'noscript', 'object', 'ol', 'optgroup', 'option', 'output', 'p', 'param', 'picture', 'pre', 'progress', 'q', 'rp', 'rt', 'ruby', 's', 'samp', 'script', 'section', 'select', 'small', 'source', 'span', 'strong', 'style', 'sub', 'summary', 'sup', 'table', 'tbody', 'td', 'textarea', 'tfoot', 'th', 'thead', 'time', 'title', 'tr', 'track', 'u', 'ul', 'var', 'video', 'wbr', 'circle', 'clipPath', 'defs', 'ellipse', 'foreignObject', 'g', 'image', 'line', 'linearGradient', 'mask', 'path', 'pattern', 'polygon', 'polyline', 'radialGradient', 'rect', 'stop', 'svg', 'text', 'tspan'];

const _excluded = ["scrollTop", "scrollLeft"];
_react_spring_core__WEBPACK_IMPORTED_MODULE_0__["Globals"].assign({
  batchedUpdates: react_dom__WEBPACK_IMPORTED_MODULE_1__["unstable_batchedUpdates"],
  createStringInterpolator: _react_spring_shared__WEBPACK_IMPORTED_MODULE_2__["createStringInterpolator"],
  colors: _react_spring_shared__WEBPACK_IMPORTED_MODULE_2__["colors"]
});
const host = Object(_react_spring_animated__WEBPACK_IMPORTED_MODULE_3__["createHost"])(primitives, {
  applyAnimatedValues,
  createAnimatedStyle: style => new AnimatedStyle(style),
  getComponentProps: _ref => {
    let props = _objectWithoutPropertiesLoose(_ref, _excluded);

    return props;
  }
});
const animated = host.animated;




/***/ }),

/***/ "./node_modules/bezier-easing/src/index.js":
/*!*************************************************!*\
  !*** ./node_modules/bezier-easing/src/index.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * https://github.com/gre/bezier-easing
 * BezierEasing - use bezier curve for transition easing function
 * by Gaëtan Renaudeau 2014 - 2015 – MIT License
 */

// These values are established by empiricism with tests (tradeoff: performance VS precision)
var NEWTON_ITERATIONS = 4;
var NEWTON_MIN_SLOPE = 0.001;
var SUBDIVISION_PRECISION = 0.0000001;
var SUBDIVISION_MAX_ITERATIONS = 10;

var kSplineTableSize = 11;
var kSampleStepSize = 1.0 / (kSplineTableSize - 1.0);

var float32ArraySupported = typeof Float32Array === 'function';

function A (aA1, aA2) { return 1.0 - 3.0 * aA2 + 3.0 * aA1; }
function B (aA1, aA2) { return 3.0 * aA2 - 6.0 * aA1; }
function C (aA1)      { return 3.0 * aA1; }

// Returns x(t) given t, x1, and x2, or y(t) given t, y1, and y2.
function calcBezier (aT, aA1, aA2) { return ((A(aA1, aA2) * aT + B(aA1, aA2)) * aT + C(aA1)) * aT; }

// Returns dx/dt given t, x1, and x2, or dy/dt given t, y1, and y2.
function getSlope (aT, aA1, aA2) { return 3.0 * A(aA1, aA2) * aT * aT + 2.0 * B(aA1, aA2) * aT + C(aA1); }

function binarySubdivide (aX, aA, aB, mX1, mX2) {
  var currentX, currentT, i = 0;
  do {
    currentT = aA + (aB - aA) / 2.0;
    currentX = calcBezier(currentT, mX1, mX2) - aX;
    if (currentX > 0.0) {
      aB = currentT;
    } else {
      aA = currentT;
    }
  } while (Math.abs(currentX) > SUBDIVISION_PRECISION && ++i < SUBDIVISION_MAX_ITERATIONS);
  return currentT;
}

function newtonRaphsonIterate (aX, aGuessT, mX1, mX2) {
 for (var i = 0; i < NEWTON_ITERATIONS; ++i) {
   var currentSlope = getSlope(aGuessT, mX1, mX2);
   if (currentSlope === 0.0) {
     return aGuessT;
   }
   var currentX = calcBezier(aGuessT, mX1, mX2) - aX;
   aGuessT -= currentX / currentSlope;
 }
 return aGuessT;
}

function LinearEasing (x) {
  return x;
}

module.exports = function bezier (mX1, mY1, mX2, mY2) {
  if (!(0 <= mX1 && mX1 <= 1 && 0 <= mX2 && mX2 <= 1)) {
    throw new Error('bezier x values must be in [0, 1] range');
  }

  if (mX1 === mY1 && mX2 === mY2) {
    return LinearEasing;
  }

  // Precompute samples table
  var sampleValues = float32ArraySupported ? new Float32Array(kSplineTableSize) : new Array(kSplineTableSize);
  for (var i = 0; i < kSplineTableSize; ++i) {
    sampleValues[i] = calcBezier(i * kSampleStepSize, mX1, mX2);
  }

  function getTForX (aX) {
    var intervalStart = 0.0;
    var currentSample = 1;
    var lastSample = kSplineTableSize - 1;

    for (; currentSample !== lastSample && sampleValues[currentSample] <= aX; ++currentSample) {
      intervalStart += kSampleStepSize;
    }
    --currentSample;

    // Interpolate to provide an initial guess for t
    var dist = (aX - sampleValues[currentSample]) / (sampleValues[currentSample + 1] - sampleValues[currentSample]);
    var guessForT = intervalStart + dist * kSampleStepSize;

    var initialSlope = getSlope(guessForT, mX1, mX2);
    if (initialSlope >= NEWTON_MIN_SLOPE) {
      return newtonRaphsonIterate(aX, guessForT, mX1, mX2);
    } else if (initialSlope === 0.0) {
      return guessForT;
    } else {
      return binarySubdivide(aX, intervalStart, intervalStart + kSampleStepSize, mX1, mX2);
    }
  }

  return function BezierEasing (x) {
    // Because JavaScript number are imprecise, we should guarantee the extremes are right.
    if (x === 0) {
      return 0;
    }
    if (x === 1) {
      return 1;
    }
    return calcBezier(getTForX(x), mY1, mY2);
  };
};


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

/***/ "./node_modules/memoize-one/dist/memoize-one.esm.js":
/*!**********************************************************!*\
  !*** ./node_modules/memoize-one/dist/memoize-one.esm.js ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var safeIsNaN = Number.isNaN ||
    function ponyfill(value) {
        return typeof value === 'number' && value !== value;
    };
function isEqual(first, second) {
    if (first === second) {
        return true;
    }
    if (safeIsNaN(first) && safeIsNaN(second)) {
        return true;
    }
    return false;
}
function areInputsEqual(newInputs, lastInputs) {
    if (newInputs.length !== lastInputs.length) {
        return false;
    }
    for (var i = 0; i < newInputs.length; i++) {
        if (!isEqual(newInputs[i], lastInputs[i])) {
            return false;
        }
    }
    return true;
}

function memoizeOne(resultFn, isEqual) {
    if (isEqual === void 0) { isEqual = areInputsEqual; }
    var lastThis;
    var lastArgs = [];
    var lastResult;
    var calledOnce = false;
    function memoized() {
        var newArgs = [];
        for (var _i = 0; _i < arguments.length; _i++) {
            newArgs[_i] = arguments[_i];
        }
        if (calledOnce && lastThis === this && isEqual(newArgs, lastArgs)) {
            return lastResult;
        }
        lastResult = resultFn.apply(this, newArgs);
        calledOnce = true;
        lastThis = this;
        lastArgs = newArgs;
        return lastResult;
    }
    return memoized;
}

/* harmony default export */ __webpack_exports__["default"] = (memoizeOne);


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

/***/ "./node_modules/react-virtualized-auto-sizer/dist/index.esm.js":
/*!*********************************************************************!*\
  !*** ./node_modules/react-virtualized-auto-sizer/dist/index.esm.js ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* WEBPACK VAR INJECTION */(function(global) {/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_0__);


var classCallCheck = function (instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
};

var createClass = function () {
  function defineProperties(target, props) {
    for (var i = 0; i < props.length; i++) {
      var descriptor = props[i];
      descriptor.enumerable = descriptor.enumerable || false;
      descriptor.configurable = true;
      if ("value" in descriptor) descriptor.writable = true;
      Object.defineProperty(target, descriptor.key, descriptor);
    }
  }

  return function (Constructor, protoProps, staticProps) {
    if (protoProps) defineProperties(Constructor.prototype, protoProps);
    if (staticProps) defineProperties(Constructor, staticProps);
    return Constructor;
  };
}();

var _extends = Object.assign || function (target) {
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

var inherits = function (subClass, superClass) {
  if (typeof superClass !== "function" && superClass !== null) {
    throw new TypeError("Super expression must either be null or a function, not " + typeof superClass);
  }

  subClass.prototype = Object.create(superClass && superClass.prototype, {
    constructor: {
      value: subClass,
      enumerable: false,
      writable: true,
      configurable: true
    }
  });
  if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass;
};

var possibleConstructorReturn = function (self, call) {
  if (!self) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }

  return call && (typeof call === "object" || typeof call === "function") ? call : self;
};

var slicedToArray = function () {
  function sliceIterator(arr, i) {
    var _arr = [];
    var _n = true;
    var _d = false;
    var _e = undefined;

    try {
      for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) {
        _arr.push(_s.value);

        if (i && _arr.length === i) break;
      }
    } catch (err) {
      _d = true;
      _e = err;
    } finally {
      try {
        if (!_n && _i["return"]) _i["return"]();
      } finally {
        if (_d) throw _e;
      }
    }

    return _arr;
  }

  return function (arr, i) {
    if (Array.isArray(arr)) {
      return arr;
    } else if (Symbol.iterator in Object(arr)) {
      return sliceIterator(arr, i);
    } else {
      throw new TypeError("Invalid attempt to destructure non-iterable instance");
    }
  };
}();

/**
 * Detect Element Resize.
 * https://github.com/sdecima/javascript-detect-element-resize
 * Sebastian Decima
 *
 * Forked from version 0.5.3; includes the following modifications:
 * 1) Guard against unsafe 'window' and 'document' references (to support SSR).
 * 2) Defer initialization code via a top-level function wrapper (to support SSR).
 * 3) Avoid unnecessary reflows by not measuring size for scroll events bubbling from children.
 * 4) Add nonce for style element.
 **/

// Check `document` and `window` in case of server-side rendering
var windowObject = void 0;
if (typeof window !== 'undefined') {
  windowObject = window;

  // eslint-disable-next-line no-restricted-globals
} else if (typeof self !== 'undefined') {
  // eslint-disable-next-line no-restricted-globals
  windowObject = self;
} else {
  windowObject = global;
}

var cancelFrame = null;
var requestFrame = null;

var TIMEOUT_DURATION = 20;

var clearTimeoutFn = windowObject.clearTimeout;
var setTimeoutFn = windowObject.setTimeout;

var cancelAnimationFrameFn = windowObject.cancelAnimationFrame || windowObject.mozCancelAnimationFrame || windowObject.webkitCancelAnimationFrame;

var requestAnimationFrameFn = windowObject.requestAnimationFrame || windowObject.mozRequestAnimationFrame || windowObject.webkitRequestAnimationFrame;

if (cancelAnimationFrameFn == null || requestAnimationFrameFn == null) {
  // For environments that don't support animation frame,
  // fallback to a setTimeout based approach.
  cancelFrame = clearTimeoutFn;
  requestFrame = function requestAnimationFrameViaSetTimeout(callback) {
    return setTimeoutFn(callback, TIMEOUT_DURATION);
  };
} else {
  // Counter intuitively, environments that support animation frames can be trickier.
  // Chrome's "Throttle non-visible cross-origin iframes" flag can prevent rAFs from being called.
  // In this case, we should fallback to a setTimeout() implementation.
  cancelFrame = function cancelFrame(_ref) {
    var _ref2 = slicedToArray(_ref, 2),
        animationFrameID = _ref2[0],
        timeoutID = _ref2[1];

    cancelAnimationFrameFn(animationFrameID);
    clearTimeoutFn(timeoutID);
  };
  requestFrame = function requestAnimationFrameWithSetTimeoutFallback(callback) {
    var animationFrameID = requestAnimationFrameFn(function animationFrameCallback() {
      clearTimeoutFn(timeoutID);
      callback();
    });

    var timeoutID = setTimeoutFn(function timeoutCallback() {
      cancelAnimationFrameFn(animationFrameID);
      callback();
    }, TIMEOUT_DURATION);

    return [animationFrameID, timeoutID];
  };
}

function createDetectElementResize(nonce) {
  var animationKeyframes = void 0;
  var animationName = void 0;
  var animationStartEvent = void 0;
  var animationStyle = void 0;
  var checkTriggers = void 0;
  var resetTriggers = void 0;
  var scrollListener = void 0;

  var attachEvent = typeof document !== 'undefined' && document.attachEvent;
  if (!attachEvent) {
    resetTriggers = function resetTriggers(element) {
      var triggers = element.__resizeTriggers__,
          expand = triggers.firstElementChild,
          contract = triggers.lastElementChild,
          expandChild = expand.firstElementChild;
      contract.scrollLeft = contract.scrollWidth;
      contract.scrollTop = contract.scrollHeight;
      expandChild.style.width = expand.offsetWidth + 1 + 'px';
      expandChild.style.height = expand.offsetHeight + 1 + 'px';
      expand.scrollLeft = expand.scrollWidth;
      expand.scrollTop = expand.scrollHeight;
    };

    checkTriggers = function checkTriggers(element) {
      return element.offsetWidth !== element.__resizeLast__.width || element.offsetHeight !== element.__resizeLast__.height;
    };

    scrollListener = function scrollListener(e) {
      // Don't measure (which forces) reflow for scrolls that happen inside of children!
      if (e.target.className && typeof e.target.className.indexOf === 'function' && e.target.className.indexOf('contract-trigger') < 0 && e.target.className.indexOf('expand-trigger') < 0) {
        return;
      }

      var element = this;
      resetTriggers(this);
      if (this.__resizeRAF__) {
        cancelFrame(this.__resizeRAF__);
      }
      this.__resizeRAF__ = requestFrame(function animationFrame() {
        if (checkTriggers(element)) {
          element.__resizeLast__.width = element.offsetWidth;
          element.__resizeLast__.height = element.offsetHeight;
          element.__resizeListeners__.forEach(function forEachResizeListener(fn) {
            fn.call(element, e);
          });
        }
      });
    };

    /* Detect CSS Animations support to detect element display/re-attach */
    var animation = false;
    var keyframeprefix = '';
    animationStartEvent = 'animationstart';
    var domPrefixes = 'Webkit Moz O ms'.split(' ');
    var startEvents = 'webkitAnimationStart animationstart oAnimationStart MSAnimationStart'.split(' ');
    var pfx = '';
    {
      var elm = document.createElement('fakeelement');
      if (elm.style.animationName !== undefined) {
        animation = true;
      }

      if (animation === false) {
        for (var i = 0; i < domPrefixes.length; i++) {
          if (elm.style[domPrefixes[i] + 'AnimationName'] !== undefined) {
            pfx = domPrefixes[i];
            keyframeprefix = '-' + pfx.toLowerCase() + '-';
            animationStartEvent = startEvents[i];
            animation = true;
            break;
          }
        }
      }
    }

    animationName = 'resizeanim';
    animationKeyframes = '@' + keyframeprefix + 'keyframes ' + animationName + ' { from { opacity: 0; } to { opacity: 0; } } ';
    animationStyle = keyframeprefix + 'animation: 1ms ' + animationName + '; ';
  }

  var createStyles = function createStyles(doc) {
    if (!doc.getElementById('detectElementResize')) {
      //opacity:0 works around a chrome bug https://code.google.com/p/chromium/issues/detail?id=286360
      var css = (animationKeyframes ? animationKeyframes : '') + '.resize-triggers { ' + (animationStyle ? animationStyle : '') + 'visibility: hidden; opacity: 0; } ' + '.resize-triggers, .resize-triggers > div, .contract-trigger:before { content: " "; display: block; position: absolute; top: 0; left: 0; height: 100%; width: 100%; overflow: hidden; z-index: -1; } .resize-triggers > div { background: #eee; overflow: auto; } .contract-trigger:before { width: 200%; height: 200%; }',
          head = doc.head || doc.getElementsByTagName('head')[0],
          style = doc.createElement('style');

      style.id = 'detectElementResize';
      style.type = 'text/css';

      if (nonce != null) {
        style.setAttribute('nonce', nonce);
      }

      if (style.styleSheet) {
        style.styleSheet.cssText = css;
      } else {
        style.appendChild(doc.createTextNode(css));
      }

      head.appendChild(style);
    }
  };

  var addResizeListener = function addResizeListener(element, fn) {
    if (attachEvent) {
      element.attachEvent('onresize', fn);
    } else {
      if (!element.__resizeTriggers__) {
        var doc = element.ownerDocument;
        var elementStyle = windowObject.getComputedStyle(element);
        if (elementStyle && elementStyle.position === 'static') {
          element.style.position = 'relative';
        }
        createStyles(doc);
        element.__resizeLast__ = {};
        element.__resizeListeners__ = [];
        (element.__resizeTriggers__ = doc.createElement('div')).className = 'resize-triggers';
        var expandTrigger = doc.createElement('div');
        expandTrigger.className = 'expand-trigger';
        expandTrigger.appendChild(doc.createElement('div'));
        var contractTrigger = doc.createElement('div');
        contractTrigger.className = 'contract-trigger';
        element.__resizeTriggers__.appendChild(expandTrigger);
        element.__resizeTriggers__.appendChild(contractTrigger);
        element.appendChild(element.__resizeTriggers__);
        resetTriggers(element);
        element.addEventListener('scroll', scrollListener, true);

        /* Listen for a css animation to detect element display/re-attach */
        if (animationStartEvent) {
          element.__resizeTriggers__.__animationListener__ = function animationListener(e) {
            if (e.animationName === animationName) {
              resetTriggers(element);
            }
          };
          element.__resizeTriggers__.addEventListener(animationStartEvent, element.__resizeTriggers__.__animationListener__);
        }
      }
      element.__resizeListeners__.push(fn);
    }
  };

  var removeResizeListener = function removeResizeListener(element, fn) {
    if (attachEvent) {
      element.detachEvent('onresize', fn);
    } else {
      element.__resizeListeners__.splice(element.__resizeListeners__.indexOf(fn), 1);
      if (!element.__resizeListeners__.length) {
        element.removeEventListener('scroll', scrollListener, true);
        if (element.__resizeTriggers__.__animationListener__) {
          element.__resizeTriggers__.removeEventListener(animationStartEvent, element.__resizeTriggers__.__animationListener__);
          element.__resizeTriggers__.__animationListener__ = null;
        }
        try {
          element.__resizeTriggers__ = !element.removeChild(element.__resizeTriggers__);
        } catch (e) {
          // Preact compat; see developit/preact-compat/issues/228
        }
      }
    }
  };

  return {
    addResizeListener: addResizeListener,
    removeResizeListener: removeResizeListener
  };
}

var AutoSizer = function (_React$PureComponent) {
  inherits(AutoSizer, _React$PureComponent);

  function AutoSizer() {
    var _ref;

    var _temp, _this, _ret;

    classCallCheck(this, AutoSizer);

    for (var _len = arguments.length, args = Array(_len), _key = 0; _key < _len; _key++) {
      args[_key] = arguments[_key];
    }

    return _ret = (_temp = (_this = possibleConstructorReturn(this, (_ref = AutoSizer.__proto__ || Object.getPrototypeOf(AutoSizer)).call.apply(_ref, [this].concat(args))), _this), _this.state = {
      height: _this.props.defaultHeight || 0,
      width: _this.props.defaultWidth || 0
    }, _this._onResize = function () {
      var _this$props = _this.props,
          disableHeight = _this$props.disableHeight,
          disableWidth = _this$props.disableWidth,
          onResize = _this$props.onResize;


      if (_this._parentNode) {
        // Guard against AutoSizer component being removed from the DOM immediately after being added.
        // This can result in invalid style values which can result in NaN values if we don't handle them.
        // See issue #150 for more context.

        var _height = _this._parentNode.offsetHeight || 0;
        var _width = _this._parentNode.offsetWidth || 0;

        var _style = window.getComputedStyle(_this._parentNode) || {};
        var paddingLeft = parseInt(_style.paddingLeft, 10) || 0;
        var paddingRight = parseInt(_style.paddingRight, 10) || 0;
        var paddingTop = parseInt(_style.paddingTop, 10) || 0;
        var paddingBottom = parseInt(_style.paddingBottom, 10) || 0;

        var newHeight = _height - paddingTop - paddingBottom;
        var newWidth = _width - paddingLeft - paddingRight;

        if (!disableHeight && _this.state.height !== newHeight || !disableWidth && _this.state.width !== newWidth) {
          _this.setState({
            height: _height - paddingTop - paddingBottom,
            width: _width - paddingLeft - paddingRight
          });

          onResize({ height: _height, width: _width });
        }
      }
    }, _this._setRef = function (autoSizer) {
      _this._autoSizer = autoSizer;
    }, _temp), possibleConstructorReturn(_this, _ret);
  }

  createClass(AutoSizer, [{
    key: 'componentDidMount',
    value: function componentDidMount() {
      var nonce = this.props.nonce;

      if (this._autoSizer && this._autoSizer.parentNode && this._autoSizer.parentNode.ownerDocument && this._autoSizer.parentNode.ownerDocument.defaultView && this._autoSizer.parentNode instanceof this._autoSizer.parentNode.ownerDocument.defaultView.HTMLElement) {
        // Delay access of parentNode until mount.
        // This handles edge-cases where the component has already been unmounted before its ref has been set,
        // As well as libraries like react-lite which have a slightly different lifecycle.
        this._parentNode = this._autoSizer.parentNode;

        // Defer requiring resize handler in order to support server-side rendering.
        // See issue #41
        this._detectElementResize = createDetectElementResize(nonce);
        this._detectElementResize.addResizeListener(this._parentNode, this._onResize);

        this._onResize();
      }
    }
  }, {
    key: 'componentWillUnmount',
    value: function componentWillUnmount() {
      if (this._detectElementResize && this._parentNode) {
        this._detectElementResize.removeResizeListener(this._parentNode, this._onResize);
      }
    }
  }, {
    key: 'render',
    value: function render() {
      var _props = this.props,
          children = _props.children,
          className = _props.className,
          disableHeight = _props.disableHeight,
          disableWidth = _props.disableWidth,
          style = _props.style;
      var _state = this.state,
          height = _state.height,
          width = _state.width;

      // Outer div should not force width/height since that may prevent containers from shrinking.
      // Inner component should overflow and use calculated width/height.
      // See issue #68 for more information.

      var outerStyle = { overflow: 'visible' };
      var childParams = {};

      // Avoid rendering children before the initial measurements have been collected.
      // At best this would just be wasting cycles.
      var bailoutOnChildren = false;

      if (!disableHeight) {
        if (height === 0) {
          bailoutOnChildren = true;
        }
        outerStyle.height = 0;
        childParams.height = height;
      }

      if (!disableWidth) {
        if (width === 0) {
          bailoutOnChildren = true;
        }
        outerStyle.width = 0;
        childParams.width = width;
      }

      return Object(react__WEBPACK_IMPORTED_MODULE_0__["createElement"])(
        'div',
        {
          className: className,
          ref: this._setRef,
          style: _extends({}, outerStyle, style)
        },
        !bailoutOnChildren && children(childParams)
      );
    }
  }]);
  return AutoSizer;
}(react__WEBPACK_IMPORTED_MODULE_0__["PureComponent"]);

AutoSizer.defaultProps = {
  onResize: function onResize() {},
  disableHeight: false,
  disableWidth: false,
  style: {}
};

/* harmony default export */ __webpack_exports__["default"] = (AutoSizer);

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../webpack/buildin/global.js */ "./node_modules/webpack/buildin/global.js")))

/***/ }),

/***/ "./node_modules/react-window/dist/index.esm.js":
/*!*****************************************************!*\
  !*** ./node_modules/react-window/dist/index.esm.js ***!
  \*****************************************************/
/*! exports provided: VariableSizeGrid, VariableSizeList, FixedSizeGrid, FixedSizeList, areEqual, shouldComponentUpdate */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _wordpress_media_utils__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! @wordpress/media-utils */ "@wordpress/media-utils");
/* harmony import */ var _wordpress_media_utils__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(_wordpress_media_utils__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_11__);








    function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5___default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_5___default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_4___default()(this, result); }; }

    function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () { })); return true; } catch (e) { return false; } }








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
          supportGradient: undefined === _wordpress_components__WEBPACK_IMPORTED_MODULE_9__["__experimentalGradientPicker"] ? false : true
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

          var onSelect = function onSelect(tabName) {
            _this2.props.onSelect(tabName);
          };

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
                className: classnames__WEBPACK_IMPORTED_MODULE_11___default()({
                  active: _this2.props.color === color
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
          }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_9__["Button"], {
            className: isVisible ? 'kemet-color-icon-indicate open' : 'kemet-color-icon-indicate',
            "data-background-type": this.props.backgroundType,
            onClick: function onClick() {
              isVisible ? _this2.toggleClose() : toggleVisible();
            },
            style: {
              backgroundColor: this.props.color,
              '--background-position': this.props.backgroundPosition ? " ".concat(Math.round(parseFloat(this.props.backgroundPosition.x) * 100), "% ").concat(Math.round(parseFloat(this.props.backgroundPosition.y) * 100), "%") : null,
              '--background-image': this.props.backgroundType === 'gradient' ? this.props.gradient : this.props.backgroundImage ? "url(".concat(this.props.backgroundImage, ")") : 'none'
            }
          }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("i", {
            className: "kmt-tooltip-top"
          }, this.state.text)), isVisible ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", {
            className: "kemet-color-picker-wrap"
          }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", {
            className: "kemet-popover-color",
            onClose: this.toggleClose
          }, 1 < tabs.length && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_9__["TabPanel"], {
            className: "kemet-popover-tabs kemet-background-tabs",
            activeClass: "active-tab",
            initialTabName: this.props.backgroundType,
            onSelect: onSelect,
            tabs: tabs
          }, function (tab) {
            var tabout;

            if (tab.name) {
              if ('gradient' === tab.name) {
                tabout = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_9__["__experimentalGradientPicker"], {
                  className: "kmt-gradient-color-picker",
                  value: _this2.props.gradient && _this2.props.backgroundType === "gradient" ? _this2.props.gradient : '',
                  onChange: function onChange(gradient) {
                    return _this2.onChangeGradientComplete(gradient);
                  }
                }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("ul", {
                  className: 'kmt-gradient-swatches'
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
                tabout = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, refresh && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, RenderTopSection(), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_9__["ColorPicker"], {
                  color: _this2.props.color,
                  onChangeComplete: function onChangeComplete(color) {
                    return _this2.onChangeComplete(color);
                  }
                })), !refresh && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, RenderTopSection(), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_9__["ColorPicker"], {
                  color: _this2.props.color,
                  onChangeComplete: function onChangeComplete(color) {
                    return _this2.onChangeComplete(color);
                  }
                })));
              }
            }

            return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", null, tabout);
          })), 1 === tabs.length && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, refresh && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, RenderTopSection(), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_9__["ColorPicker"], {
            color: this.props.color,
            onChangeComplete: function onChangeComplete(color) {
              return _this2.onChangeComplete(color);
            }
          })), !refresh && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, RenderTopSection(), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_9__["ColorPicker"], {
            color: this.props.color,
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
            color: gradient
          });
          this.props.onChangeGradient(gradient);
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
          this.props.onSelectImage(media);
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
          event.preventDefault();
          this.setState({
            modalCanClose: false
          });

          _open();
        }
      }, {
        key: "onChangeImageOptions",
        value: function onChangeImageOptions(tempKey, mainkey, value) {
          this.props.onChangeImageOptions(mainkey, value);
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
          return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_media_utils__WEBPACK_IMPORTED_MODULE_10__["MediaUpload"], {
            title: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])("Select Background Image", 'astra'),
            onSelect: function onSelect(media) {
              return _this3.onSelectImage(media);
            },
            allowedTypes: ["image"],
            value: this.props.media && this.props.media ? this.props.media : '',
            render: function render(_ref) {
              var open = _ref.open;
              return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, !_this3.props.media && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", {
                className: "kmt-control kmt-image-actions"
              }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_9__["Button"], {
                className: "upload-button button-add-media",
                isDefault: true,
                onClick: function onClick() {
                  return _this3.open(open);
                }
              }, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])("Select Background Image", 'Kemet'))), _this3.props.media && _this3.props.backgroundType === "image" && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", {
                className: " kmt-image-actions"
              }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", {
                className: "actions"
              }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_9__["Button"], {
                type: "button",
                className: "button remove-image",
                onClick: _this3.onRemoveImage
              }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_9__["Button"], {
                type: "button",
                className: "button edit-image",
                onClick: function onClick() {
                  return _this3.open(open);
                }
              }))));
            }
          }), this.props.media && this.props.backgroundType === "image" && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", {
            className: "kmt-control"
          }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", {
            className: "thumbnail thumbnail-image"
          }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_9__["FocalPointPicker"], {
            url: this.props.media.url ? this.props.media.url : this.props.backgroundImage,
            dimensions: dimensions,
            value: undefined !== this.props.backgroundPosition ? this.props.backgroundPosition : {
              x: 0.5,
              y: 0.5
            },
            onChange: function onChange(focalPoint) {
              return _this3.onChangeImageOptions('backgroundPosition', 'background-position', focalPoint);
            }
          })))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", {
            className: "kmt-control"
          }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("header", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("label", null, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Background Repeat'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("section", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("ul", {
            className: "kmt-radio-option kmt-buttons-group"
          }, Object.keys(repeat).map(function (item) {
            var classActive = '';

            if (item === _this3.props.backgroundRepeat) {
              classActive = "active";
            }

            return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("li", {
              isTertiary: true,
              className: "".concat(classActive),
              onClick: function onClick() {
                return _this3.onChangeImageOptions('backgroundRepeat', 'background-repeat', item);
              }
            }, repeat[item] && repeat[item]);
          })))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", {
            className: "kmt-control"
          }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("header", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("label", null, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Background Size'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("section", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("ul", {
            className: "kmt-radio-option kmt-buttons-group"
          }, ["auto", "cover", "contain"].map(function (item) {
            var classActive = '';

            if (item === _this3.props.backgroundSize) {
              classActive = "active";
            }

            return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("li", {
              isTertiary: true,
              className: "".concat(classActive),
              onClick: function onClick() {
                return _this3.onChangeImageOptions('backgroundSize', 'background-size', item);
              }
            }, item);
          })))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("div", {
            className: "kmt-control"
          }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("header", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("label", null, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_8__["__"])('Background Attachment'))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("section", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("ul", {
            className: "kmt-radio-option kmt-buttons-group"
          }, ["fixed", "scroll", "inherit"].map(function (item) {
            var classActive = '';

            if (item === _this3.props.backgroundAttachment) {
              classActive = "active";
            }

            return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_6__["createElement"])("li", {
              isTertiary: true,
              className: "".concat(classActive),
              onClick: function onClick() {
                return _this3.onChangeImageOptions('backgroundAttachment', 'background-attachment', item);
              }
            }, item);
          })))));
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

    /***/
  }),

/***/ "./src/common/responsive-helper.js":
/*!*****************************************!*\
  !*** ./src/common/responsive-helper.js ***!
  \*****************************************/
/*! exports provided: kemetGetResponsiveJs, kemetGetResponsiveIconJs, kemetGetResponsiveColorJs, kemetGetResponsiveBgJs, KemetGetResponsiveColorGroupJs */
/***/(function (module, __webpack_exports__, __webpack_require__) {

    "use strict";
    __webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "kemetGetResponsiveJs", function () { return kemetGetResponsiveJs; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "kemetGetResponsiveIconJs", function () { return kemetGetResponsiveIconJs; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "kemetGetResponsiveColorJs", function () { return kemetGetResponsiveColorJs; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "kemetGetResponsiveBgJs", function () { return kemetGetResponsiveBgJs; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "KemetGetResponsiveColorGroupJs", function () { return KemetGetResponsiveColorGroupJs; });
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

    /***/
  }),

/***/ "./src/common/responsive.js":
/*!**********************************!*\
  !*** ./src/common/responsive.js ***!
  \**********************************/
/*! exports provided: default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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

    function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () { })); return true; } catch (e) { return false; } }



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

    /***/
  }),

/***/ "./src/customizer.js":
/*!***************************!*\
  !*** ./src/customizer.js ***!
  \***************************/
/*! no exports provided */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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

    /***/
  }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/*! no exports provided */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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

    /***/
  }),

/***/ "./src/kmt-controls/available.js":
/*!***************************************!*\
  !*** ./src/kmt-controls/available.js ***!
  \***************************************/
/*! exports provided: default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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

    /***/
  }),

/***/ "./src/kmt-controls/background.js":
/*!****************************************!*\
  !*** ./src/kmt-controls/background.js ***!
  \****************************************/
/*! exports provided: default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _common_color__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../common/color */ "./src/common/color.js");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _common_responsive__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ../common/responsive */ "./src/common/responsive.js");




    function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

    function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }








    var BackgroundComponent = function BackgroundComponent(props) {
      var value = props.value;
      var responsive = props.params.responsive;
      var defaultValue = {
        "background-attachment": '',
        "background-color": '',
        "background-image": '',
        "background-media": '',
        "background-position": '',
        "background-repeat": '',
        "background-size": '',
        "background-type": "color",
        "background-gradient": ''
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
          "background-type": "color",
          "background-gradient": ''
        },
        tablet: {
          "background-attachment": '',
          "background-color": '',
          "background-image": '',
          "background-media": '',
          "background-position": '',
          "background-repeat": '',
          "background-size": '',
          "background-type": "",
          "background-gradient": ''
        },
        mobile: {
          "background-attachment": '',
          "background-color": '',
          "background-image": '',
          "background-media": '',
          "background-position": '',
          "background-repeat": '',
          "background-size": '',
          "background-type": "color",
          "background-gradient": ''
        }
      };
      var defaultValues = responsive ? ResDefaultParam : defaultValue;
      var defaultVals = props.params.default ? props.params.default : defaultValues;
      value = value ? value : defaultVals;

      var _useState = Object(react__WEBPACK_IMPORTED_MODULE_4__["useState"])(value),
        _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_useState, 2),
        props_value = _useState2[0],
        setPropsValue = _useState2[1];

      var _useState3 = Object(react__WEBPACK_IMPORTED_MODULE_4__["useState"])('desktop'),
        _useState4 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_useState3, 2),
        device = _useState4[0],
        setDevice = _useState4[1];

      var updateValue = function updateValue(obj) {
        setPropsValue(obj);
        props.onChange(_objectSpread(_objectSpread({}, obj), {}, {
          flag: !value.flag
        }));
      };

      var responsiveHtml;

      if (responsive) {
        responsiveHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_common_responsive__WEBPACK_IMPORTED_MODULE_8__["default"], {
          onChange: function onChange(device) {
            return setDevice(device);
          }
        });
      }

      var renderReset = function renderReset() {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
          className: "customize-control-title"
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
          className: "kmt-color-btn-reset-wrap"
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("button", {
          className: "kmt-reset-btn components-button components-circular-option-picker__clear  is-small",
          disabled: JSON.stringify(props_value) === JSON.stringify(defaultVals),
          onClick: function onClick(e) {
            e.preventDefault();
            updateValue(defaultVals);
          }
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__["Dashicon"], {
          icon: "image-rotate"
        }))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("label", null, labelHtml, descriptionHtml), responsiveHtml);
      };

      var _onSelectImage = function onSelectImage(media) {
        var obj = _objectSpread({}, props_value);

        if (responsive) {
          obj[device]['background-media'] = media.id;
          obj[device]['background-image'] = media.url;
        } else {
          obj['background-media'] = media.id;
          obj['background-image'] = media.url;
        }

        updateValue(obj);
      };

      var _onChangeImageOptions = function onChangeImageOptions(mainKey, value) {
        var obj = _objectSpread({}, props_value);

        if (responsive) {
          obj[device][mainKey] = value;
        } else {
          obj[mainKey] = value;
        }

        updateValue(obj);
      };

      var onSelectType = function onSelectType(type) {
        var obj = _objectSpread({}, props_value);

        if (responsive) {
          obj[device]['background-type'] = type;
        } else {
          obj['background-type'] = type;
        }

        updateValue(obj);
      };

      var renderSettings = function renderSettings() {
        var renderBackground = responsive ? props_value[device] : props_value;
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_common_color__WEBPACK_IMPORTED_MODULE_6__["default"], {
          text: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_7__["__"])('Background', 'Kemet'),
          onSelect: function onSelect(type) {
            return onSelectType(type);
          },
          color: undefined !== renderBackground['background-color'] && renderBackground['background-color'] ? renderBackground['background-color'] : '',
          gradient: undefined !== renderBackground['background-gradient'] && renderBackground['background-gradient'] ? renderBackground['background-gradient'] : '',
          onChangeComplete: function onChangeComplete(color) {
            return handleChangeComplete(color);
          },
          onChangeGradient: function onChangeGradient(gradient) {
            return handleChangeGradient(gradient);
          },
          media: undefined !== renderBackground['background-media'] && renderBackground['background-media'] ? renderBackground['background-media'] : '',
          backgroundImage: undefined !== renderBackground['background-image'] && renderBackground['background-image'] ? renderBackground['background-image'] : '',
          backgroundAttachment: undefined !== renderBackground['background-attachment'] && renderBackground['background-attachment'] ? renderBackground['background-attachment'] : '',
          backgroundPosition: undefined !== renderBackground['background-position'] && renderBackground['background-position'] ? renderBackground['background-position'] : '',
          backgroundRepeat: undefined !== renderBackground['background-repeat'] && renderBackground['background-repeat'] ? renderBackground['background-repeat'] : '',
          backgroundSize: undefined !== renderBackground['background-size'] && renderBackground['background-size'] ? renderBackground['background-size'] : '',
          onSelectImage: function onSelectImage(media) {
            return _onSelectImage(media);
          },
          onChangeImageOptions: function onChangeImageOptions(mainKey, value) {
            return _onChangeImageOptions(mainKey, value);
          },
          backgroundType: undefined !== renderBackground['background-type'] && renderBackground['background-type'] ? renderBackground['background-type'] : 'color',
          allowGradient: true,
          allowImage: true
        }));
      };

      var handleChangeGradient = function handleChangeGradient(gradient) {
        var obj = _objectSpread({}, props_value);

        if (responsive) {
          obj[device]['background-gradient'] = gradient;
        } else {
          obj['background-gradient'] = gradient;
        }

        updateValue(obj);
      };

      var handleChangeComplete = function handleChangeComplete(color) {
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

        if (responsive) {
          obj[device]['background-color'] = value;
        } else {
          obj['background-color'] = value;
        }

        updateValue(obj);
      };

      var _props$params = props.params,
        label = _props$params.label,
        description = _props$params.description;
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
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["Fragment"], null, inputHtml);
    };

    BackgroundComponent.propTypes = {
      control: prop_types__WEBPACK_IMPORTED_MODULE_3___default.a.object.isRequired
    };
/* harmony default export */ __webpack_exports__["default"] = (React.memo(BackgroundComponent));

    /***/
  }),

/***/ "./src/kmt-controls/builder-tabs.js":
/*!******************************************!*\
  !*** ./src/kmt-controls/builder-tabs.js ***!
  \******************************************/
/*! exports provided: default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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
      var control = _ref.control,
        params = _ref.params;
      var responsive = params.responsive;
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(react__WEBPACK_IMPORTED_MODULE_2__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
        className: "kmt-control-tabs kmt-control-tabs-responsive"
      }, responsive && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
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

    /***/
  }),

/***/ "./src/kmt-controls/color.js":
/*!***********************************!*\
  !*** ./src/kmt-controls/color.js ***!
  \***********************************/
/*! exports provided: default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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
      var value = props.value;
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

      var updateValues = function updateValues(obj) {
        var UpdatedState = _objectSpread({}, state);

        if (responsive) {
          UpdatedState[device] = obj;
        } else {
          UpdatedState = obj;
        }

        props.onChange(_objectSpread(_objectSpread({}, UpdatedState), {}, {
          flag: !value.flag
        }));
        setState(UpdatedState);
      };

      var renderOperationButtons = function renderOperationButtons() {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
          className: "kmt-color-btn-reset-wrap"
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("button", {
          className: "kmt-reset-btn components-button components-circular-option-picker__clear is-small",
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

    /***/
  }),

/***/ "./src/kmt-controls/editor.js":
/*!************************************!*\
  !*** ./src/kmt-controls/editor.js ***!
  \************************************/
/*! exports provided: default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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
        value: props.value,
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
        props.onChange(value);
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

    /***/
  }),

/***/ "./src/kmt-controls/focus.js":
/*!***********************************!*\
  !*** ./src/kmt-controls/focus.js ***!
  \***********************************/
/*! exports provided: default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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

    /***/
  }),

/***/ "./src/kmt-controls/icon-select.js":
/*!*****************************************!*\
  !*** ./src/kmt-controls/icon-select.js ***!
  \*****************************************/
/*! exports provided: default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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





    var IconSelectComponent = function IconSelectComponent(props) {
      var _useState = Object(react__WEBPACK_IMPORTED_MODULE_3__["useState"])(props.value),
        _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState, 2),
        value = _useState2[0],
        setValue = _useState2[1];

      var onLayoutChange = function onLayoutChange(value) {
        setValue(value);
        props.onChange(value);
      };

      var _props$params = props.params,
        label = _props$params.label,
        description = _props$params.description,
        id = _props$params.id,
        choices = _props$params.choices;
      var ContentHTML = [];
      var labelContent = label ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
        className: "customize-control-title"
      }, label) : null;
      var descriptionContent = description || description !== '' ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
        className: "description customize-control-description"
      }, description) : null;

      var _loop = function _loop() {
        var _Object$entries$_i = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_Object$entries[_i], 2),
          key = _Object$entries$_i[0],
          icon = _Object$entries$_i[1];

        ContentHTML.push(Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("input", {
          className: "icon-select-input",
          type: "radio",
          value: key,
          name: "_customize-icon-select-".concat(id),
          checked: value === key,
          onChange: function onChange() {
            return onLayoutChange(key);
          }
        }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
          className: "icon-select-label"
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
          className: "dashicons ".concat(icon['icon'])
        }))));
      };

      for (var _i = 0, _Object$entries = Object.entries(choices); _i < _Object$entries.length; _i++) {
        _loop();
      }

      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("label", {
        className: "customizer-text"
      }, labelContent, descriptionContent, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("div", {
        id: id,
        className: "icon-select "
      }, ContentHTML.map(function (elem) {
        return elem;
      })));
    };

    IconSelectComponent.propTypes = {
      control: prop_types__WEBPACK_IMPORTED_MODULE_2___default.a.object.isRequired
    };
/* harmony default export */ __webpack_exports__["default"] = (React.memo(IconSelectComponent));

    /***/
  }),

/***/ "./src/kmt-controls/layout-builder/add-component.js":
/*!**********************************************************!*\
  !*** ./src/kmt-controls/layout-builder/add-component.js ***!
  \**********************************************************/
/*! exports provided: default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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

    /***/
  }),

/***/ "./src/kmt-controls/layout-builder/builder-component.js":
/*!**************************************************************!*\
  !*** ./src/kmt-controls/layout-builder/builder-component.js ***!
  \**************************************************************/
/*! exports provided: default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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
/* harmony import */ var _options_options_component__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../../options/options-component */ "./src/options/options-component.js");





    function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() { }; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it.return != null) it.return(); } finally { if (didErr) throw err; } } }; }

    function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

    function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

    function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

    function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_2___default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }






    var BuilderComponent = function BuilderComponent(props) {
      var value = props.value;
      var staleValue = {};
      var baseDefault = {};
      var defaultValue = props.params.default ? _objectSpread(_objectSpread({}, baseDefault), props.params.default) : baseDefault;
      value = value ? _objectSpread(_objectSpread({}, defaultValue), value) : defaultValue;
      var defaultParams = {};
      var controlParams = props.params.input_attrs ? _objectSpread(_objectSpread({}, defaultParams), props.params.input_attrs) : defaultParams;
      var choices = props.params.choices ? props.params.choices : [];
      var columns = controlParams.columns ? controlParams.columns : [];
      var layouts = controlParams.layouts ? controlParams.layouts : [];
      var prevItems = [];

      var _useState = Object(react__WEBPACK_IMPORTED_MODULE_6__["useState"])({
        value: value,
        columns: columns,
        isPopup: false,
        revertDrag: false,
        prevItems: prevItems,
        layout: layouts
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

        props.onChange(_objectSpread(_objectSpread(_objectSpread({}, setting.get()), value), {}, {
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

      var updateRowLayout = function updateRowLayout() {
        document.addEventListener('KemetUpdateFooterColumns', function (e) {
          if ("footer-items" !== controlParams.group) {
  return;
}

if ('' === e.detail) {
  return;
}

var newParams = controlParams;

if (newParams.layouts[e.detail] !== undefined) {
  newParams.layouts[e.detail] = wp.customize(Object(_options_options_component__WEBPACK_IMPORTED_MODULE_7__["getSettingId"])(e.detail + '-footer-layout')).get();
  newParams.columns[e.detail] = wp.customize(Object(_options_options_component__WEBPACK_IMPORTED_MODULE_7__["getSettingId"])(e.detail + '-footer-columns')).get();
  setState(function (prevState) {
    return _objectSpread(_objectSpread({}, prevState), {}, {
      layout: newParams.layouts,
      columns: newParams.columns
    });
  });
  updateValues(newParams);
}
        });
      };

Object(react__WEBPACK_IMPORTED_MODULE_6__["useEffect"])(function () {
  updateRowLayout();
}, []);
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
  layout: state.layout["popup"],
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
    customizer: props.customizer,
    layout: state.layout[row]
  });
}))));
    };

/* harmony default export */ __webpack_exports__["default"] = (React.memo(BuilderComponent));

    /***/
  }),

/***/ "./src/kmt-controls/layout-builder/drop-component.js":
/*!***********************************************************!*\
  !*** ./src/kmt-controls/layout-builder/drop-component.js ***!
  \***********************************************************/
/*! exports provided: default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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

    /***/
  }),

/***/ "./src/kmt-controls/layout-builder/item-component.js":
/*!***********************************************************!*\
  !*** ./src/kmt-controls/layout-builder/item-component.js ***!
  \***********************************************************/
/*! exports provided: default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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
    }))), KemetCustomizerData.has_widget_editor && item.includes('widget') && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Button, {
      className: "kmt-builder-item-focus-icon kmt-builder-item-icon",
      "aria-label": __("Design for", "kemet") + " " + (undefined !== choices[item] && undefined !== choices[item].name ? choices[item].name : ""),
      onClick: function onClick() {
        focusSection(undefined !== choices[item] && undefined !== choices[item].section ? 'kemet-' + choices[item].section : "");
      }
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Dashicon, {
      icon: "admin-appearance"
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Button, {
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

  /***/
}),

/***/ "./src/kmt-controls/layout-builder/row-component.js":
/*!**********************************************************!*\
  !*** ./src/kmt-controls/layout-builder/row-component.js ***!
  \**********************************************************/
/*! exports provided: default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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
        layout = "footer-row-columns-".concat(props.columns, " footer-row-layout-").concat(props.layout.desktop);
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
        if ('footer' === mode && zone_count < index) {
          return;
        }

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

    /***/
  }),

/***/ "./src/kmt-controls/radio-image.js":
/*!*****************************************!*\
  !*** ./src/kmt-controls/radio-image.js ***!
  \*****************************************/
/*! exports provided: default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

    "use strict";
    __webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/extends */ "./node_modules/@babel/runtime/helpers/extends.js");
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_4__);





    var __ = wp.i18n.__;


    var RadioImageComponent = function RadioImageComponent(props) {
      var _useState = Object(react__WEBPACK_IMPORTED_MODULE_4__["useState"])(props.value),
        _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_useState, 2),
        props_value = _useState2[0],
        setPropsValue = _useState2[1];

      var onLayoutChange = function onLayoutChange(value) {
        setPropsValue(value);
        props.onChange(value);
      };

      var _props$params = props.params,
        label = _props$params.label,
        description = _props$params.description,
        id = _props$params.id,
        choices = _props$params.choices,
        inputAttrs = _props$params.inputAttrs,
        link = _props$params.link,
        labelStyle = _props$params.labelStyle;
      var inputContent = [];
      var labelContent = label ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
        className: "customize-control-title"
      }, label) : null;
      var descriptionContent = description || description !== '' ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
        className: "description customize-control-description"
      }, description) : null;

      var HandleRepeat = function HandleRepeat(item) {
        var splitedItems = item.split(" ").map(function (item, i) {
          var item_values = item.split("=");

          if (undefined !== item_values[1]) {
            inputContent[item_values[0]] = item_values[1].replace(/"/g, "");
          }
        });
        return splitedItems;
      };

      if (inputAttrs) {
        HandleRepeat(inputAttrs);
      }

      if (link) {
        HandleRepeat(link);
      }

      var radioContent = Object.entries(choices).map(function (_ref) {
        var _ref2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_ref, 2),
          key = _ref2[0],
          value = _ref2[1];

        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(react__WEBPACK_IMPORTED_MODULE_4__["Fragment"], {
          key: key
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("input", _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default()({}, inputContent, {
          className: "image-select",
          type: "radio",
          value: key,
          name: "_customize-radio-".concat(id),
          id: id + key,
          checked: props_value === key ? true : false,
          onChange: function onChange() {
            return onLayoutChange(key);
          }
        })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("label", _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default()({
          htmlFor: id + key
        }, labelStyle, {
          className: "image"
        }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("img", {
          className: "wp-ui-highlight",
          src: choices[key].path
        }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
          className: "image-clickable",
          title: choices[key].label
        })));
      });
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(react__WEBPACK_IMPORTED_MODULE_4__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("label", {
        className: "customizer-text"
      }, labelContent, descriptionContent), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("div", {
        id: "input_".concat(id),
        className: "image"
      }, radioContent));
    };

    RadioImageComponent.propTypes = {
      control: prop_types__WEBPACK_IMPORTED_MODULE_3___default.a.object.isRequired
    };
/* harmony default export */ __webpack_exports__["default"] = (React.memo(RadioImageComponent));

    /***/
  }),

/***/ "./src/kmt-controls/radio.js":
/*!***********************************!*\
  !*** ./src/kmt-controls/radio.js ***!
  \***********************************/
/*! exports provided: default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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
/* harmony import */ var _common_responsive__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../common/responsive */ "./src/common/responsive.js");




  function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

    function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }




    var __ = wp.i18n.__;
var _wp$components = wp.components,
  ButtonGroup = _wp$components.ButtonGroup,
  Dashicon = _wp$components.Dashicon,
  Tooltip = _wp$components.Tooltip,
  Button = _wp$components.Button;

var RadioComponent = function RadioComponent(props) {
  var value = props.value;

  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_4__["useState"])('desktop'),
    _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_useState, 2),
    device = _useState2[0],
    setDevice = _useState2[1];

  var HandleChange = function HandleChange(value) {
    console.log(value);

    if (responsive) {
      props.onChange(_objectSpread(_objectSpread({}, value), {}, {
        flag: !props.value.flag
      }));
    } else {
      props.onChange(value);
    }

    if (props.id.includes('footer-columns')) {
      var row = props.id.replace('-footer-columns', '');
      var event = new CustomEvent('KemetUpdateFooterColumns', {
        'detail': row
      });
      document.dispatchEvent(event);
    }

    setState(function (prevState) {
      return _objectSpread(_objectSpread({}, prevState), {}, {
        value: value
      });
    });
  };

  var _props$params = props.params,
    label = _props$params.label,
    name = _props$params.name,
    choices = _props$params.choices,
    responsive = _props$params.responsive,
    defaultValue = _props$params.defaultValue;
  var defaultVal = responsive ? {
    desktop: '',
    tablet: '',
    mobile: ''
  } : '';
  defaultVal = defaultValue ? defaultValue : defaultVal;
  value = value ? value : defaultVal;

  var _useState3 = Object(react__WEBPACK_IMPORTED_MODULE_4__["useState"])({
    value: value
  }),
    _useState4 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_useState3, 2),
    state = _useState4[0],
    setState = _useState4[1];

  var renderButtons = function renderButtons() {
    var currentChoices = choices;
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(react__WEBPACK_IMPORTED_MODULE_4__["Fragment"], null, Object.keys(currentChoices).map(function (choice) {
      var currentValue = responsive ? state.value[device] : state.value;
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(Button, {
        isTertiary: true,
        className: choice === currentValue ? 'active-radio' : '',
        onClick: function onClick() {
          var newValue = state.value;

          if (responsive) {
            newValue[device] = choice;
          } else {
            newValue = choice;
          }

          HandleChange(newValue);
        }
      }, currentChoices[choice]);
    }));
  };

  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(react__WEBPACK_IMPORTED_MODULE_4__["Fragment"], null, responsive ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_common_responsive__WEBPACK_IMPORTED_MODULE_5__["default"], {
    onChange: function onChange(currentDevice) {
      return setDevice(currentDevice);
    },
    label: label
  }) : Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])("span", {
    className: "customize-control-title"
  }, label), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(ButtonGroup, {
    className: "kmt-radio-container-control"
  }, renderButtons()));
};

RadioComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_3___default.a.object.isRequired,
  customizer: prop_types__WEBPACK_IMPORTED_MODULE_3___default.a.func.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (React.memo(RadioComponent));

    /***/
  }),

/***/ "./src/kmt-controls/row-layout.js":
/*!****************************************!*\
  !*** ./src/kmt-controls/row-layout.js ***!
  \****************************************/
/*! exports provided: default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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
/* harmony import */ var _common_responsive__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../common/responsive */ "./src/common/responsive.js");
/* harmony import */ var _options_options_component__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../options/options-component */ "./src/options/options-component.js");




  function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

  function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_0___default()(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }





  var __ = wp.i18n.__;
  var _wp$components = wp.components,
    ButtonGroup = _wp$components.ButtonGroup,
    Dashicon = _wp$components.Dashicon,
    Tooltip = _wp$components.Tooltip,
    Button = _wp$components.Button;

  var RowLayoutComponent = function RowLayoutComponent(props) {
    var defaultParams = {
      desktop: {
        '5': {
          'equal': {
            tooltip: __('Equal Width Columns', 'kemet'),
            icon: 'fivecol'
          },
          'left-five-forty': {
            tooltip: __('Left Heavy 40/15/15/15/15', 'kemet'),
            icon: 'lfiveforty'
          },
          'center-five-forty': {
            tooltip: __('Center Heavy 15/15/40/15/15', 'kemet'),
            icon: 'cfiveforty'
          },
          'right-five-forty': {
            tooltip: __('Right Heavy 15/15/15/15/40', 'kemet'),
            icon: 'rfiveforty'
          }
        },
        '4': {
          'equal': {
            tooltip: __('Equal Width Columns', 'kemet'),
            icon: 'fourcol'
          },
          'left-forty': {
            tooltip: __('Left Heavy 40/20/20/20', 'kemet'),
            icon: 'lfourforty'
          },
          'center-forty': {
            tooltip: __('Center Heavy 10/40/40/10', 'kemet'),
            icon: 'cfourforty'
          },
          'right-forty': {
            tooltip: __('Right Heavy 20/20/20/40', 'kemet'),
            icon: 'rfourforty'
          }
        },
        '3': {
          'equal': {
            tooltip: __('Equal Width Columns', 'kemet'),
            icon: 'threecol'
          },
          'left-half': {
            tooltip: __('Left Heavy 50/25/25', 'kemet'),
            icon: 'lefthalf'
          },
          'right-half': {
            tooltip: __('Right Heavy 25/25/50', 'kemet'),
            icon: 'righthalf'
          },
          'center-half': {
            tooltip: __('Center Heavy 25/50/25', 'kemet'),
            icon: 'centerhalf'
          },
          'center-wide': {
            tooltip: __('Wide Center 20/60/20', 'kemet'),
            icon: 'widecenter'
          }
        },
        '2': {
          'equal': {
            tooltip: __('Equal Width Columns', 'kemet'),
            icon: 'twocol'
          },
          'left-golden': {
            tooltip: __('Left Heavy 66/33', 'kemet'),
            icon: 'twoleftgolden'
          },
          'right-golden': {
            tooltip: __('Right Heavy 33/66', 'kemet'),
            icon: 'tworightgolden'
          }
        },
        '1': {
          'row': {
            tooltip: __('Equal Width Columns', 'kemet'),
            icon: 'row'
          }
        }
      },
      mobile: {
        '5': {
          'equal': {
            tooltip: __('Equal Width Columns', 'kemet'),
            icon: 'fivecol'
          },
          'row': {
            tooltip: __('Collapse to Rows', 'kemet'),
            icon: 'collapserowfive'
          }
        },
        '4': {
          'equal': {
            tooltip: __('Equal Width Columns', 'kemet'),
            icon: 'fourcol'
          },
          'two-grid': {
            tooltip: __('Two Column Grid', 'kemet'),
            icon: 'grid'
          },
          'row': {
            tooltip: __('Collapse to Rows', 'kemet'),
            icon: 'collapserowfour'
          }
        },
        '3': {
          'equal': {
            tooltip: __('Equal Width Columns', 'kemet'),
            icon: 'threecol'
          },
          'left-half': {
            tooltip: __('Left Heavy 50/25/25', 'kemet'),
            icon: 'lefthalf'
          },
          'right-half': {
            tooltip: __('Right Heavy 25/25/50', 'kemet'),
            icon: 'righthalf'
          },
          'center-half': {
            tooltip: __('Center Heavy 25/50/25', 'kemet'),
            icon: 'centerhalf'
          },
          'center-wide': {
            tooltip: __('Wide Center 20/60/20', 'kemet'),
            icon: 'widecenter'
          },
          'first-row': {
            tooltip: __('First Row, Next Columns 100 - 50/50', 'kemet'),
            icon: 'firstrow'
          },
          'last-row': {
            tooltip: __('Last Row, Previous Columns 50/50 - 100', 'kemet'),
            icon: 'lastrow'
          },
          'row': {
            tooltip: __('Collapse to Rows', 'kemet'),
            icon: 'collapserowthree'
          }
        },
        '2': {
          'equal': {
            tooltip: __('Equal Width Columns', 'kemet'),
            icon: 'twocol'
          },
          'left-golden': {
            tooltip: __('Left Heavy 66/33', 'kemet'),
            icon: 'twoleftgolden'
          },
          'right-golden': {
            tooltip: __('Right Heavy 33/66', 'kemet'),
            icon: 'tworightgolden'
          },
          'row': {
            tooltip: __('Collapse to Rows', 'kemet'),
            icon: 'collapserow'
          }
        },
        '1': {
          'row': {
            tooltip: __('Single Row', 'kemet'),
            icon: 'row'
          }
        }
      }
    };
    var _props$params = props.params,
      label = _props$params.label,
      row = _props$params.row;
    var columns = parseInt(wp.customize(Object(_options_options_component__WEBPACK_IMPORTED_MODULE_6__["getSettingId"])(row + '-footer-columns')).get(), 10);
    var layouts = props.params.layouts ? props.params.layouts : defaultParams;
    var defaultValue = {
      'desktop': '',
      'tablet': '',
      'mobile': ''
    };
    var value = props.value ? props.value : defaultValue;

    var _useState = Object(react__WEBPACK_IMPORTED_MODULE_4__["useState"])({
      value: value,
      columns: columns
    }),
      _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_useState, 2),
      state = _useState2[0],
      setState = _useState2[1];

    var _useState3 = Object(react__WEBPACK_IMPORTED_MODULE_4__["useState"])('desktop'),
      _useState4 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_1___default()(_useState3, 2),
      device = _useState4[0],
      setDevice = _useState4[1];

    var HandleChange = function HandleChange(value) {
      props.onChange(value);
      var event = new CustomEvent("KemetUpdateFooterColumns", {
        detail: row
      });
      document.dispatchEvent(event);
      setState(function (prevState) {
        return _objectSpread(_objectSpread({}, prevState), {}, {
          value: value
        });
      });
    };

    var onFooterUpdate = function onFooterUpdate() {
      var newColumns = parseInt(wp.customize(Object(_options_options_component__WEBPACK_IMPORTED_MODULE_6__["getSettingId"])(row + '-footer-columns')).get(), 10);

      if (state.columns !== newColumns) {
        setState(function (prevState) {
          return _objectSpread(_objectSpread({}, prevState), {}, {
            columns: newColumns
          });
        });
        var _value = state.value;

        if (newColumns === 1) {
          _value.desktop = 'row';
        } else {
          _value.desktop = 'equal';
        }

        _value.tablet = '';
        _value.mobile = 'row';
        debounce(function () {
          HandleChange(_value);
        }, 200);
      }
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

    var linkColumns = function linkColumns() {
      document.addEventListener('KemetUpdateFooterColumns', function (e) {
        if (e.detail === row) {
          onFooterUpdate();
        }
      });
    };

    linkColumns();
    var controlMap = device === 'mobile' || device === 'tablet' ? layouts['mobile'][columns] : layouts[device][columns];
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(react__WEBPACK_IMPORTED_MODULE_4__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(_common_responsive__WEBPACK_IMPORTED_MODULE_5__["default"], {
      onChange: function onChange(currentDevice) {
        return setDevice(currentDevice);
      },
      label: label
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(ButtonGroup, {
      className: "kmt-radio-container-control"
    }, Object.keys(controlMap).map(function (item) {
      var currentValue = state.value[device] ? state.value[device] : '';
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(Tooltip, {
        text: controlMap[item].tooltip
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_2__["createElement"])(Button, {
        isTertiary: true,
        className: item === currentValue ? 'active-radio' : '',
        onClick: function onClick() {
          var newValue = _objectSpread({}, state.value);

          newValue[device] = item;
          HandleChange(newValue);
        }
      }, item));
    })));
  };

  RowLayoutComponent.propTypes = {
    control: prop_types__WEBPACK_IMPORTED_MODULE_3___default.a.object.isRequired,
    customizer: prop_types__WEBPACK_IMPORTED_MODULE_3___default.a.func.isRequired
  };
/* harmony default export */ __webpack_exports__["default"] = (React.memo(RowLayoutComponent));

  /***/
}),

/***/ "./src/kmt-controls/select.js":
/*!************************************!*\
  !*** ./src/kmt-controls/select.js ***!
  \************************************/
/*! exports provided: default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_3__["useState"])(props.value),
    _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState, 2),
    props_value = _useState2[0],
    setPropsValue = _useState2[1];

  var HandleChange = function HandleChange(value) {
    setPropsValue(value);
    props.onChange(value);
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

    /***/
  }),

/***/ "./src/kmt-controls/slider.js":
/*!************************************!*\
  !*** ./src/kmt-controls/slider.js ***!
  \************************************/
/*! exports provided: default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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

    function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () { })); return true; } catch (e) { return false; } }



    var RangeControl = wp.components.RangeControl;
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

      if (_this.responsive) {
        updateState["".concat(device, "-unit")] = value;
      } else {
        updateState["unit"] = value;
      }

      _this.props.onChange(updateState);

      _this.setState({
        initialState: updateState
      });
    });

    _babel_runtime_helpers_defineProperty__WEBPACK_IMPORTED_MODULE_7___default()(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this), "handleReset", function (e) {
      e.preventDefault();

      if (_this.responsive) {
        var defUnit = _this.state.defaultVal["".concat(_this.state.currentDevice, "-unit")],
          size = _this.state.defaultVal[_this.state.currentDevice];

        var updateState = _objectSpread({}, _this.state.defaultVal);

        updateState["".concat(_this.state.currentDevice, "-unit")] = defUnit;
        updateState[_this.state.currentDevice] = size;

        _this.props.onChange(updateState);

        _this.setState({
          initialState: updateState
        });
      } else {
        var _defUnit = _this.state.defaultVal["unit"],
          _size = _this.state.defaultVal["value"];

        var _updateState = _objectSpread({}, _this.state.defaultVal);

        _updateState["unit"] = _defUnit;
        _updateState["value"] = _size;

        _this.props.onChange(_updateState);

        _this.setState({
          initialState: _updateState
        });
      }
    });

    _this.unit_choices = _this.props.params.unit_choices;
    _this.values = _this.props.params.value;
    _this.responsive = _this.props.params.responsive;
    var _value = _this.props.value;
    _this.defaultValue = _this.props.params.default;
    var ResDefaultParam = {
      "desktop": '',
      "desktop-unit": 'px',
      'tablet': '',
      'tablet-unit': 'px',
      'mobile': '',
      'mobile-unit': ''
    };
    var defaultValue = {
      value: '',
      unit: 'px'
    };
    var defaultValues;
    defaultValues = _this.responsive ? ResDefaultParam : defaultValue;
    var defaultVals = _this.props.params.default ? _objectSpread(_objectSpread({}, defaultValues), _this.props.params.default) : defaultValues;
    _value = _value ? _objectSpread(_objectSpread({}, defaultVals), _value) : defaultVals;
    _this.state = {
      initialState: _value,
      currentDevice: 'desktop',
      defaultVal: defaultVals
    };
    _this.updateValues = _this.updateValues.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    _this.handleUnitChange = _this.handleUnitChange.bind(_babel_runtime_helpers_assertThisInitialized__WEBPACK_IMPORTED_MODULE_3___default()(_this));
    return _this;
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_2___default()(ResponsiveSliderComponent, [{
    key: "updateValues",
    value: function updateValues(value) {
      var updateState = _objectSpread({}, this.state.initialState);

      if (this.responsive) {
        updateState[this.state.currentDevice] = value;
      } else {
        updateState["value"] = value;
      }

      this.props.onChange(updateState);
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
      var descriptionContent = description || description !== '' ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("span", {
        class: "description customize-control-description"
      }, description) : null;
      var dataAttributes = '';
      var units = [];

      if (this.unit_choices) {
        for (var _i = 0, _Object$entries = Object.entries(this.unit_choices); _i < _Object$entries.length; _i++) {
          var _Object$entries$_i = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_Object$entries[_i], 2),
            key = _Object$entries$_i[0],
            value = _Object$entries$_i[1];

          units.push(key);

          if (this.responsive) {
            if (key == this.state.initialState["".concat(this.state.currentDevice, "-unit")]) {
              dataAttributes = {
                min: value.min,
                max: value.max,
                step: value.step
              };
            }
          } else {
            if (key == this.state.initialState["unit"]) {
              dataAttributes = {
                min: value.min,
                max: value.max,
                step: value.step
              };
            }
          }
        }
      }

      var labelContent = this.responsive ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])(_common_responsive__WEBPACK_IMPORTED_MODULE_10__["default"], {
        onChange: function onChange(currentDevice) {
          return _this2.setState({
            currentDevice: currentDevice
          });
        },
        label: label
      }) : Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("span", {
        className: "customize-control-title"
      }, label);
      var unitHTML = units.map(function (unit) {
        var unit_class = '';

        if (_this2.responsive) {
          if (_this2.state.initialState["".concat(_this2.state.currentDevice, "-unit")] === unit) {
            unit_class = 'active';
          }
        } else {
          if (_this2.state.initialState["unit"] === unit) {
            unit_class = 'active';
          }
        }

        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("li", {
          className: "single-unit ".concat(unit_class),
          "data-unit": unit
        }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("span", {
          className: "unit-text",
          onClick: function onClick(value) {
            return _this2.handleUnitChange(_this2.state.currentDevice, unit);
          }
        }, "".concat(unit)));
      });
      var sliderValue = this.responsive ? this.state.initialState[this.state.currentDevice] : this.state.initialState["value"];
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("label", {
        htmlFor: ""
      }, labelContent, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("div", {
        className: "wrapper"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("div", {
        className: "input-field-wrapper ".concat(this.state.currentDevice, " active")
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])(RangeControl, {
        className: 'kmt-range-value-input',
        value: sliderValue,
        onChange: function onChange(newVal) {
          return _this2.updateValues(newVal);
        },
        min: "".concat(dataAttributes.min),
        max: "".concat(dataAttributes.max),
        step: "".concat(dataAttributes.step),
        withInputField: false
      }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("div", {
        className: "kemet_range_value"
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("input", {
        type: "number",
        className: "kmt-range-value__input",
        value: sliderValue,
        min: "".concat(dataAttributes.min),
        max: "".concat(dataAttributes.max),
        step: "".concat(dataAttributes.step),
        onChange: function onChange(event) {
          return _this2.updateValues(event.target.value);
        }
      }), suffixContent), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("ul", {
        className: "kmt-slider-units"
      }, unitHTML)), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_8__["createElement"])("button", {
        className: "kmt-slider-reset",
        disabled: this.state.initialState === this.state.defaultVal ? true : false,
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

    /***/
  }),

/***/ "./src/kmt-controls/sortable.js":
/*!**************************************!*\
  !*** ./src/kmt-controls/sortable.js ***!
  \**************************************/
/*! exports provided: default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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
  var value = props.value;
  var list = Object(react__WEBPACK_IMPORTED_MODULE_3__["useRef"])(null);
  Object(react__WEBPACK_IMPORTED_MODULE_3__["useEffect"])(function () {
    var updateValue = function updateValue() {
      var newValue = [];
      jQuery(list.current).find('li').each(function () {
        if (!jQuery(this).is('.invisible')) {
          newValue.push(jQuery(this).data('value'));
        }
      });
      props.onChange(newValue);
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
  }, []);

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

    /***/
  }),

/***/ "./src/kmt-controls/spacing.js":
/*!*************************************!*\
  !*** ./src/kmt-controls/spacing.js ***!
  \*************************************/
/*! exports provided: default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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







    var SpacingComponent = function SpacingComponent(props) {
  var value = props.value;

  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_6__["useState"])('desktop'),
    _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_2___default()(_useState, 2),
    device = _useState2[0],
    setDevice = _useState2[1];

  var responsive = props.params.responsive;
  var ResDefaultParam = {
    "desktop": {
      'top': '',
      'right': '',
      'bottom': '',
      'left': ''
    },
    "tablet": {
      'top': '',
      'right': '',
      'bottom': '',
      'left': ''
    },
    "mobile": {
      'top': '',
      'right': '',
      'bottom': '',
      'left': ''
    },
    "desktop-unit": 'px',
    'tablet-unit': 'px',
    'mobile-unit': ''
  };
  var defaultValue = {
    value: {
      'top': '',
      'right': '',
      'bottom': '',
      'left': ''
    },
    unit: 'px'
  };
  var defaultValues;
  defaultValues = responsive ? ResDefaultParam : defaultValue;
  var defaultVals = props.params.default ? _objectSpread(_objectSpread({}, defaultValues), props.params.default) : defaultValues;
  value = value ? _objectSpread(_objectSpread({}, defaultVals), value) : defaultVals;

  var _useState3 = Object(react__WEBPACK_IMPORTED_MODULE_6__["useState"])(value),
    _useState4 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_2___default()(_useState3, 2),
    state = _useState4[0],
    setState = _useState4[1];

  Object(react__WEBPACK_IMPORTED_MODULE_6__["useEffect"])(function () {
    if (state !== value) {
      setState(value);
    }
  }, [props]);

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

  var onSpacingChange = function onSpacingChange(choiceID) {
    var choices = props.params.choices;

    var updateState = _objectSpread({}, state);

    var deviceUpdateState = responsive ? _objectSpread({}, updateState[device]) : _objectSpread({}, updateState["value"]);

    if (!event.target.classList.contains('connected')) {
      deviceUpdateState[choiceID] = event.target.value;
    } else {
      for (var _choiceID in choices) {
        deviceUpdateState[_choiceID] = event.target.value;
      }
    }

    if (responsive) {
      updateState[device] = deviceUpdateState;
    } else {
      updateState["value"] = deviceUpdateState;
    }

    props.onChange(updateState);
    setState(updateState);
  };

  var onUnitChange = function onUnitChange(device) {
    var unitKey = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';

    var updateState = _objectSpread({}, state);

    if (responsive) {
      updateState["".concat(device, "-unit")] = unitKey;
    } else {
      updateState["unit"] = unitKey;
    }

    props.onChange(updateState);
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
        var inputValue = responsive ? state[device][choiceID] : state["value"][choiceID];
        var html = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("li", _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0___default()({
          key: choiceID
        }, inputAttrs, {
          className: "kmt-spacing-input-item"
        }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("input", {
          type: "number",
          className: "kmt-spacing-input kmt-spacing-".concat(device, " ").concat(connectedClass),
          "data-id": choiceID,
          value: inputValue,
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
      className: "dashicons  dashicons-editor-unlink  kmt-spacing-disconnected ",
      onClick: function onClick() {
        onDisconnectedClick();
      },
      "data-element-connect": id
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("span", {
      title: title,
      className: "dashicons dashicons-admin-links kmt-spacing-connected ",
      onClick: function onClick() {
        onConnectedClick();
      },
      "data-element-connect": id
    }, " ")) : null;
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

        if (responsive) {
          if (state["".concat(device, "-unit")] === unitKey) {
            unitClass = 'active';
          }
        } else {
          if (state["unit"] === unitKey) {
            unitClass = 'active';
          }
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
  var descriptionContent = description || description !== '' ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("span", {
    className: "description customize-control-description"
  }, description) : null;
  inputHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])(react__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, renderInputHtml(device, 'active'));
  responsiveHtml = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])(react__WEBPACK_IMPORTED_MODULE_6__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
    className: "unit-input-wrapper kmt-spacing-unit-wrapper"
  }, renderResponsiveInput(device)));
  return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
    key: 'kmt-spacing-responsive',
    className: "kmt-spacing-responsive"
  }, responsive ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])(_common_responsive__WEBPACK_IMPORTED_MODULE_7__["default"], {
    onChange: function onChange(currentDevice) {
      return setDevice(currentDevice);
    },
    label: label
  }) : Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("span", {
    className: "customize-control-title"
  }, label), renderUnit(), descriptionContent, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
    className: "kmt-spacing-responsive-outer-wrapper"
  }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
    className: "input-wrapper kmt-spacing-responsive-wrapper"
  }, inputHtml), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_3__["createElement"])("div", {
    className: "kmt-spacing-responsive-units-screen-wrap"
  }, responsiveHtml)));
};

SpacingComponent.propTypes = {
  control: prop_types__WEBPACK_IMPORTED_MODULE_4___default.a.object.isRequired
};
/* harmony default export */ __webpack_exports__["default"] = (SpacingComponent);

    /***/
  }),

/***/ "./src/kmt-controls/tabs.js":
/*!**********************************!*\
  !*** ./src/kmt-controls/tabs.js ***!
  \**********************************/
/*! exports provided: default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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
        className: "current-tab-options"
      }, Object(_options_options_component__WEBPACK_IMPORTED_MODULE_4__["renderOptions"])(currentTab.options)));
    };

    TabsComponent.propTypes = {
      control: prop_types__WEBPACK_IMPORTED_MODULE_2___default.a.object.isRequired,
      customizer: prop_types__WEBPACK_IMPORTED_MODULE_2___default.a.func.isRequired
    };
/* harmony default export */ __webpack_exports__["default"] = (React.memo(TabsComponent));

    /***/
  }),

/***/ "./src/kmt-controls/text.js":
/*!**********************************!*\
  !*** ./src/kmt-controls/text.js ***!
  \**********************************/
/*! exports provided: default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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
      var _useState = Object(react__WEBPACK_IMPORTED_MODULE_3__["useState"])(props.value),
        _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState, 2),
        props_value = _useState2[0],
        setPropsValue = _useState2[1];

      var HandleChange = function HandleChange(value) {
        setPropsValue(value);
        props.onChange(value);
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

    /***/
  }),

/***/ "./src/kmt-controls/title.js":
/*!***********************************!*\
  !*** ./src/kmt-controls/title.js ***!
  \***********************************/
/*! exports provided: default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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

    /***/
  }),

/***/ "./src/kmt-controls/toggle.js":
/*!************************************!*\
  !*** ./src/kmt-controls/toggle.js ***!
  \************************************/
/*! exports provided: default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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
  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_3__["useState"])(props.value),
    _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState, 2),
    props_value = _useState2[0],
    setPropsValue = _useState2[1];

  var label = props.params.label;
  var labelContent = label ? Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])("span", {
    className: "toggle-control-label"
  }, label) : null;

  var updateValues = function updateValues() {
    setPropsValue(!props_value);
    props.onChange(!props_value);
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

    /***/
  }),

/***/ "./src/options/control.js":
/*!********************************!*\
  !*** ./src/options/control.js ***!
  \********************************/
/*! no exports provided */
/***/(function (module, __webpack_exports__, __webpack_require__) {

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

      jQuery(document).ready(function ($) {
        $(".wp-full-overlay-sidebar-content, .wp-picker-container").click(function (e) {
          if (!$(e.target).closest(".kemet-color-picker-wrap").length && !$(e.target).closest(".color-button-wrap").length) {
            $(".components-button.kemet-color-icon-indicate.open").trigger("click");
          }
        });
        control.container.on("click", ".components-button.kemet-color-icon-indicate", function () {
          var $this = $(this),
            parentWrap = $this.closest(".customize-control-kmt-color"),
            Section = parentWrap.parents(".control-section");

          if ($this.hasClass("open")) {
            parentWrap.find(".kemet-color-picker-wrap").hide();
          } else {
            var getOpenPopup = Section.find(".components-button.kemet-color-icon-indicate.open");

            if (getOpenPopup.length > 0) {
              getOpenPopup.trigger("click");
            }

            parentWrap.find(".kemet-color-picker-wrap").show();
          }

          $(this).toggleClass("open");
        });
      }); // Responsive

Object(_common_responsive_helper__WEBPACK_IMPORTED_MODULE_2__["kemetGetResponsiveJs"])(control);
    }
  });

  /***/
}),

/***/ "./src/options/options-component.js":
/*!******************************************!*\
  !*** ./src/options/options-component.js ***!
  \******************************************/
/*! exports provided: getSettingId, getSetting, isDisplay, renderOptions, default */
/***/(function (module, __webpack_exports__, __webpack_require__) {

  "use strict";
  __webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getSettingId", function () { return getSettingId; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getSetting", function () { return getSetting; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isDisplay", function () { return isDisplay; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "renderOptions", function () { return renderOptions; });
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/slicedToArray */ "./node_modules/@babel/runtime/helpers/slicedToArray.js");
/* harmony import */ var _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! prop-types */ "./node_modules/prop-types/index.js");
/* harmony import */ var prop_types__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(prop_types__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react */ "react");
/* harmony import */ var react__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(react__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _kmt_controls_color__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../kmt-controls/color */ "./src/kmt-controls/color.js");
/* harmony import */ var _kmt_controls_slider__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../kmt-controls/slider */ "./src/kmt-controls/slider.js");
/* harmony import */ var _kmt_controls_spacing__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../kmt-controls/spacing */ "./src/kmt-controls/spacing.js");
/* harmony import */ var _kmt_controls_tabs__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../kmt-controls/tabs */ "./src/kmt-controls/tabs.js");
/* harmony import */ var _kmt_controls_select__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ../kmt-controls/select */ "./src/kmt-controls/select.js");
/* harmony import */ var _kmt_controls_title__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ../kmt-controls/title */ "./src/kmt-controls/title.js");
/* harmony import */ var _kmt_controls_layout_builder_builder_component__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ../kmt-controls/layout-builder/builder-component */ "./src/kmt-controls/layout-builder/builder-component.js");
/* harmony import */ var _kmt_controls_available__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ../kmt-controls/available */ "./src/kmt-controls/available.js");
/* harmony import */ var _kmt_controls_toggle__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ../kmt-controls/toggle */ "./src/kmt-controls/toggle.js");
/* harmony import */ var _kmt_controls_builder_tabs__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ../kmt-controls/builder-tabs */ "./src/kmt-controls/builder-tabs.js");
/* harmony import */ var _kmt_controls_text__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ../kmt-controls/text */ "./src/kmt-controls/text.js");
/* harmony import */ var _kmt_controls_editor__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! ../kmt-controls/editor */ "./src/kmt-controls/editor.js");
/* harmony import */ var _kmt_controls_focus__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! ../kmt-controls/focus */ "./src/kmt-controls/focus.js");
/* harmony import */ var _kmt_controls_sortable__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! ../kmt-controls/sortable */ "./src/kmt-controls/sortable.js");
/* harmony import */ var _kmt_controls_radio__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! ../kmt-controls/radio */ "./src/kmt-controls/radio.js");
/* harmony import */ var _kmt_controls_row_layout__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! ../kmt-controls/row-layout */ "./src/kmt-controls/row-layout.js");
/* harmony import */ var _kmt_controls_background__WEBPACK_IMPORTED_MODULE_20__ = __webpack_require__(/*! ../kmt-controls/background */ "./src/kmt-controls/background.js");
/* harmony import */ var _kmt_controls_icon_select__WEBPACK_IMPORTED_MODULE_21__ = __webpack_require__(/*! ../kmt-controls/icon-select */ "./src/kmt-controls/icon-select.js");
/* harmony import */ var _kmt_controls_radio_image__WEBPACK_IMPORTED_MODULE_22__ = __webpack_require__(/*! ../kmt-controls/radio-image */ "./src/kmt-controls/radio-image.js");























  var wpOptions = ["custom_logo", "blogname", "blogdescription"];

var OptionComponent = function OptionComponent(type) {
  var OptionComponent;

  switch (type) {
    case 'kmt-color':
      OptionComponent = _kmt_controls_color__WEBPACK_IMPORTED_MODULE_4__["default"];
      break;

    case 'kmt-slider':
      OptionComponent = _kmt_controls_slider__WEBPACK_IMPORTED_MODULE_5__["default"];
      break;

    case 'kmt-spacing':
      OptionComponent = _kmt_controls_spacing__WEBPACK_IMPORTED_MODULE_6__["default"];
      break;

    case 'kmt-tabs':
      OptionComponent = _kmt_controls_tabs__WEBPACK_IMPORTED_MODULE_7__["default"];
      break;

    case 'kmt-select':
      OptionComponent = _kmt_controls_select__WEBPACK_IMPORTED_MODULE_8__["default"];
      break;

    case 'kmt-title':
      OptionComponent = _kmt_controls_title__WEBPACK_IMPORTED_MODULE_9__["default"];
      break;

    case 'kmt-builder':
      OptionComponent = _kmt_controls_layout_builder_builder_component__WEBPACK_IMPORTED_MODULE_10__["default"];
      break;

    case 'kmt-available':
      OptionComponent = _kmt_controls_available__WEBPACK_IMPORTED_MODULE_11__["default"];
      break;

    case 'kmt-switcher':
      OptionComponent = _kmt_controls_toggle__WEBPACK_IMPORTED_MODULE_12__["default"];
      break;

    case 'kmt-builder-tabs':
      OptionComponent = _kmt_controls_builder_tabs__WEBPACK_IMPORTED_MODULE_13__["default"];
      break;

    case 'kmt-text':
      OptionComponent = _kmt_controls_text__WEBPACK_IMPORTED_MODULE_14__["default"];
      break;

    case 'kmt-editor':
      OptionComponent = _kmt_controls_editor__WEBPACK_IMPORTED_MODULE_15__["default"];
      break;

    case 'kmt-focus-button':
      OptionComponent = _kmt_controls_focus__WEBPACK_IMPORTED_MODULE_16__["default"];
      break;

    case 'kmt-sortable':
      OptionComponent = _kmt_controls_sortable__WEBPACK_IMPORTED_MODULE_17__["default"];
      break;

    case 'kmt-radio':
      OptionComponent = _kmt_controls_radio__WEBPACK_IMPORTED_MODULE_18__["default"];
      break;

    case 'kmt-row-layout':
      OptionComponent = _kmt_controls_row_layout__WEBPACK_IMPORTED_MODULE_19__["default"];
      break;

    case 'kmt-background':
      OptionComponent = _kmt_controls_background__WEBPACK_IMPORTED_MODULE_20__["default"];
      break;

    case 'kmt-radio-image':
      OptionComponent = _kmt_controls_radio_image__WEBPACK_IMPORTED_MODULE_22__["default"];
      break;

    case 'kmt-icon-select':
      OptionComponent = _kmt_controls_icon_select__WEBPACK_IMPORTED_MODULE_21__["default"];
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
  var value = _ref.value,
    optionId = _ref.optionId,
    option = _ref.option,
    control = _ref.control;
  var context = option.context ? isDisplay(option.context) : true;

  var _useState = Object(react__WEBPACK_IMPORTED_MODULE_3__["useState"])(context),
    _useState2 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState, 2),
    isVisible = _useState2[0],
    setVisible = _useState2[1];

  var _useState3 = Object(react__WEBPACK_IMPORTED_MODULE_3__["useState"])(value),
    _useState4 = _babel_runtime_helpers_slicedToArray__WEBPACK_IMPORTED_MODULE_0___default()(_useState3, 2),
    settingVal = _useState4[0],
    setValue = _useState4[1];

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
    value: settingVal,
    params: option,
    control: control,
    customizer: wp.customize,
    onChange: function onChange(value) {
      var key = getSettingId(optionId);
      setValue(value);
      wp.customize(key).set(value);
    }
  }));
};

var renderOptions = function renderOptions(options) {
  return Object.keys(options).map(function (optionId) {
    var controlName = getSettingId(optionId);
    var control = wp.customize(controlName);
    var value = control && control.get();
    var option = options[optionId];
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__["createElement"])(SingleOptionComponent, {
      value: value,
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

  /***/
}),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/*! no static exports found */
/***/(function (module, exports) {

  (function () { module.exports = window["wp"]["components"]; }());

  /***/
}),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/*! no static exports found */
/***/(function (module, exports) {

  (function () { module.exports = window["wp"]["element"]; }());

  /***/
}),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/*! no static exports found */
/***/(function (module, exports) {

  (function () { module.exports = window["wp"]["i18n"]; }());

  /***/
}),

/***/ "@wordpress/media-utils":
/*!************************************!*\
  !*** external ["wp","mediaUtils"] ***!
  \************************************/
/*! no static exports found */
/***/(function (module, exports) {

  (function () { module.exports = window["wp"]["mediaUtils"]; }());

  /***/
}),

/***/ "react":
/*!************************!*\
  !*** external "React" ***!
  \************************/
/*! no static exports found */
/***/(function (module, exports) {

  (function () { module.exports = window["React"]; }());

  /***/
})

  /******/
});
//# sourceMappingURL=index.js.map