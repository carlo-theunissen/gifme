
/**
 * This is a really simple application
 * It listens to the SQS from amazon and lets users known when an SQS has happened
 */

var WebSocketServer = require('websocket').server;
var http = require('http');
var server = http.createServer(function(request, response) {
});
server.listen(3001, function() { });



// create the server
var wsServer = new WebSocketServer({
    httpServer: server
});


var clients = [ ];

// WebSocket server
wsServer.on('request', function(request) {
    var connection = request.accept(null, request.origin);
    var index = - 1;
    // This is the most important callback for us, we'll handle
    // all messages from users here.
    connection.on('message', function(message) {
        if (message.type === 'utf8') {
            const regex = /^all|\d+$/;

            if (regex.exec(message.utf8Data) !== null) { //only allow numbers or the word "all"
                console.log("Client want "+ message.utf8Data);
                index = clients.push({
                    connection: connection,
                    find: message.utf8Data
                }) - 1;
            }
        }
    });

    connection.on('close', function(connection) {
        if(index > 0){
            clients.splice(index, 1);
        }
    });
});


// Load the AWS SDK for Node.js
var AWS = require('aws-sdk');
AWS.config.loadFromPath('./config.json');

function broadcastCreatedImage(key){
    const regex = /.*\/(\d+)\./g;
    var result = regex.exec(key);
    if(result.length > 0) {
        for (var i = 0; i < clients.length; i++) {
            if (clients[i].find === result[1] || clients[i].find === 'all') {
                clients[i].connection.sendUTF(key);
            }
        }
    }
}

// Create an SQS service object
var sqs = new AWS.SQS({apiVersion: '2012-11-05'});
function readMessages(){
    sqs.receiveMessage({
        QueueUrl: "https://sqs.eu-central-1.amazonaws.com/685756058443/UAT_GifCreator_Gifs",
        WaitTimeSeconds: 20
    }, function (err, data) {
        if(data !== null && data.Messages) {
            for(var i =0; i< data.Messages.length; i++ ){
                var body = JSON.parse(data.Messages[i][0].Body);
                broadcastCreatedImage(body.Records[0].s3.object.key);
            }
        }
        readMessages();
    });
}

readMessages();