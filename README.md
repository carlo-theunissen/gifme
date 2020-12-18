# Gifme.eu
Gifme.eu is a hobby project to create GIFs out of Videos. 
Gifme offers a web interface where users can upload a video. These videos are processed through FFMPEG and when completed, send to the user. 
The frontend offers a simple "File Upload"-bar. The back-end uses serverless AWS Lambda Functions with FFMPEG to convert the videos. 

<img width="421" alt="screen shot 2018-09-29 at 16 17 17" src="https://user-images.githubusercontent.com/7584025/46246781-32248400-c403-11e8-8b06-da5dfac02d16.png">
<img width="416" alt="screen shot 2018-09-29 at 16 17 32" src="https://user-images.githubusercontent.com/7584025/46246782-32bd1a80-c403-11e8-996e-c76c6f888f74.png">

## Back-end
The Back-end is fully operational in Amazone Web Services. It uses the CDS to deliver the static front-end to the end users. This frontend is dynamic with API calls to the PHP-backend. 
All API calls are redirected through a load balancer to two servers. 
<img width="726" alt="screenshot 2018-09-29 at 16 08 36" src="https://user-images.githubusercontent.com/7584025/46246687-01901a80-c402-11e8-8158-7ccb32eb7263.png">
