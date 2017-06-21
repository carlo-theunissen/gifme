/**
 * Created by carlotheunissen on 16/05/2017.
 */

let frontController = "https://"+window.location.hostname+"/"; //frontcontroller
let websocket = "wss://socket.gifme.eu/ws";
if(location.href.indexOf("localhost") >= 0){
    frontController = window.location.protocol + "//localhost:8888/gifcreator/php/html/app_dev.php/";
}

export default {
    fileUpload : frontController + "_uploader/gallery/upload",
    fileSize: frontController + "api/video/filesize",
    supportedFormats: frontController + "api/video/formats",
    gifInfo: frontController + "api/gifs/",
    tags: frontController + "api/tags",
    gifs: frontController + "api/gifs",
    popularTags: frontController + "api/tags/popular",
    webSocketGifs: websocket,
    gifLocation: "https://gifme.eu/",


}