var exports =
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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

/**
 * Created by carlo on 8-6-2017.
 */
const func  = __webpack_require__(1);
module.exports = {
    handler: function(event, context, callback){
        func.default(event,context, callback);
    }
};


/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

"use strict";

/**
 * Created by carlo on 7-6-2017.
 */
Object.defineProperty(exports, "__esModule", { value: true });
/*
import { ExecHelper } from './src/ExecHelper'
import { S3Helper } from './src/S3Helper'
import * as util from "util"
import {GifCreator} from "./src/GifCreator";
import config from "./config/parameters"
*/
function call(event, context, callback) {
    console.log(event, context);
    /*
        const exec = new ExecHelper();
        const s3 = new S3Helper();
        const gifCreator = new GifCreator();
    
    
    
    
        const srcBucket = event.Records[0].s3.bucket.name;
        const srcKey = decodeURIComponent(event.Records[0].s3.object.key.replace(/\+/g, " "));
        const name = srcKey.split('/')[1];
        const uploadId = srcKey.split('.')[0];
    
        const movieLocation = util.format("%s/%s", config.tmp_folder, name);
    
        //first: copy the ffmpeg binary and the gifsicle binary to the tmp folder and download the file
        Promise.all([
            exec
                .moveFile('ffmpeg', config.ffmpeg_location)
                .then(() => exec.ChmodFile(config.ffmpeg_location)),
    
            exec
                .moveFile('gifsicle', config.gifsicle_location)
                .then(() => exec.ChmodFile(config.gifsicle_location)),
    
            s3.downloadTo(srcKey, srcBucket, movieLocation)
        ])
    
        //second: create the gif
            .then(() => gifCreator.CreateGif(movieLocation))
    
        //third: upload it back to s3
            .then(() => s3.uploadTo(util.format(config.s3_upload_location, uploadId), srcBucket, config.result_gif));
    */
}
;
exports.default = call;


/***/ })
/******/ ]);