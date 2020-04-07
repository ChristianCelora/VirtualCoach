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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/workout.js":
/*!*********************************!*\
  !*** ./resources/js/workout.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $("#start-workout").click(function () {
    $("#step-0").show();
    $("#card-start").hide();
  }); // $(".next-step").click(function(){
  //    let step = $(this).data("step");
  //    next_step = step + 1;
  //    $("#step-".step).hide();
  //    $("#step-".next_step).show();
  //    startTimer();
  // });

  $(".show-rest").click(function () {
    var step = $(this).data("step");
    $("#step-" + step).hide();
    $("#rest-" + step).show();
    initTimer(step);
    startTimer();
  });
  var isRunning = false;
  var timerTime = 0;
  var elem;

  function initTimer(step) {
    elem = $("#timer-" + step);

    if (typeof elem != "undefined") {
      var seconds = elem.data("second");
      timerTime = seconds;
      var min = Math.floor(seconds / 60);
      var sec = seconds % 60;
      printTimer(elem, min, sec);
    }
  }

  function decrementTimer() {
    timerTime--;
    var min = Math.floor(timerTime / 60);
    var sec = timerTime % 60;
    printTimer(elem, min, sec);
    if (timerTime <= 0) stopTimer();
  }

  function printTimer(elemn, min, sec) {
    if (min < 10) {
      min = "0" + min;
    }

    if (sec < 10) {
      sec = "0" + sec;
    }

    elem.find(".minutes").html(min);
    elem.find(".seconds").html(sec);
  } // function resetTimer(elem, seconds){
  //    timerTime = seconds
  //    const min = Math.floor(timerTime / 60);
  //    const sec = timerTime % 60;
  //    elem.find(".minutes").html(min);
  //    elem.find(".seconds").html(sec);
  // }


  function startTimer() {
    if (isRunning) return;
    isRunning = true;
    interval = setInterval(decrementTimer, 1000);
  }

  function stopTimer() {
    if (!isRunning) return;
    isRunning = false;
    clearInterval(interval);
  }
});

/***/ }),

/***/ 5:
/*!***************************************!*\
  !*** multi ./resources/js/workout.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/vcoach/VirtualCoach/resources/js/workout.js */"./resources/js/workout.js");


/***/ })

/******/ });