# Gifme.eu
Gifme.eu is a hobby project of mine. 
It offers a web interface where users can upload a video.
All videos are processed through FFMPEG and by WebSockets the user receives their video as a gif. 
The user interface is really intuitive and eases the way how to create a gif. The back-end though. is quite complected with load balancers and serverless lambdas to maximize 

<img width="421" alt="screen shot 2018-09-29 at 16 17 17" src="https://user-images.githubusercontent.com/7584025/46246781-32248400-c403-11e8-8b06-da5dfac02d16.png">
<img width="416" alt="screen shot 2018-09-29 at 16 17 32" src="https://user-images.githubusercontent.com/7584025/46246782-32bd1a80-c403-11e8-996e-c76c6f888f74.png">

## Back-end
The Back-end is fully operational in Amazone Web Services. It uses the CDS to deliver the static front-end to the end users. This frontend is dynamic with API calls to the PHP-backend. 
All API calls are redirected through a load balancer to two servers. 
When a user uploads a video, it's also processed by one of these servers. The server submits it to the AWS S3 Bucket. Where a lambda server is launched.
This lambda server starts FFMPEG to convert the video into a gif. 
Meanwhile, the front-end opens a WebSocket connection to listen when the lambda server is done converting. When this happens, the gif is shown to the end user.
<img width="726" alt="screenshot 2018-09-29 at 16 08 36" src="https://user-images.githubusercontent.com/7584025/46246687-01901a80-c402-11e8-8158-7ccb32eb7263.png">
