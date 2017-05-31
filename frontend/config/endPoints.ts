/**
 * Created by carlotheunissen on 16/05/2017.
 */
let frontController = "http://gifcreator-1835133625.us-east-1.elb.amazonaws.com/"; //frontcontroller
let websocket = "ws://gifcreator-1835133625.us-east-1.elb.amazonaws.com/ws";
if(location.href.indexOf("localhost") >= 0){
    frontController = "http://localhost:8888/gifcreator/php/html/app_dev.php/";
}


export default {
    fileUpload : frontController + "_uploader/gallery/upload",
    fileSize: frontController + "api/video/filesize",
    supportedFormats: frontController + "api/video/formats",
    tags: frontController + "api/tags",
    gifs: frontController + "api/gifs",
    webSocketGifs: websocket,
    gifLocation: "https://s3.eu-central-1.amazonaws.com/gifcreatoruat/"
}