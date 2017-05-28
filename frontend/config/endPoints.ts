/**
 * Created by carlotheunissen on 16/05/2017.
 */
let frontController = "/gifcreator/html/app_dev.php/"; //frontcontroller

export default {
    fileUpload : frontController + "_uploader/gallery/upload",
    fileSize: frontController + "api/video/filesize",
    supportedFormats: frontController + "api/video/formats",
    tags: frontController + "api/tags",
    gifs: frontController + "api/gifs",
}