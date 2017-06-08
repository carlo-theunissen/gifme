/**
 * Created by carlo on 8-6-2017.
 */
const func  = require("./main");
module.exports = {
    handler: function(event, context, callback){
        func.default(event,context, callback);
    }
};
